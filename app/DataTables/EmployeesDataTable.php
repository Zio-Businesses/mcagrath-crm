<?php

namespace App\DataTables;

use App\Helper\Common;
use App\Models\EmployeeDetails;
use App\Scopes\ActiveScope;
use Carbon\Carbon;
use App\Models\Role;
use App\Models\User;
use App\Models\CustomField;
use App\Models\CustomFieldGroup;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Illuminate\Support\Facades\DB;

class EmployeesDataTable extends BaseDataTable
{

    private $editEmployeePermission;
    private $deleteEmployeePermission;
    private $viewEmployeePermission;
    private $changeEmployeeRolePermission;

    public function __construct()
    {
        parent::__construct();
        $this->editEmployeePermission = user()->permission('edit_employees');
        $this->deleteEmployeePermission = user()->permission('delete_employees');
        $this->viewEmployeePermission = user()->permission('view_employees');
        $this->changeEmployeeRolePermission = user()->permission('change_employee_role');
    }

    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {

        $roles = Role::whereNotIn('name', ['client'])->get();
        $datatables = datatables()->eloquent($query);
        $datatables->addColumn('check', function ($row) {
            if (!$row->hasRole('admin') && $row->id != user()->id) {
                return $this->checkBox($row);
            }

            return '--';
        });


        $datatables->editColumn('current_role_name', function ($row) {
            $userRole = $row->roles->pluck('name')->toArray();

            if (in_array('admin', $userRole)) {
                return $row->roles()->withoutGlobalScopes()->latest()->first()->display_name;
            }

            return $row->current_role_name;
        });
        $datatables->addColumn('role', function ($row) use ($roles) {
            $userRole = $row->roles->pluck('name')->toArray();

            if (in_array('admin', $userRole)) {
                $uRole = $row->roles()->withoutGlobalScopes()->latest()->first()->display_name;
            }
            else {
                $uRole = $row->current_role_name;
            }

            if (in_array('admin', $userRole) && !in_array('admin', user_roles())) {
                return $uRole . ' <i data-toggle="tooltip" data-original-title="' . __('messages.roleCannotChange') . '" class="fa fa-info-circle"></i>';
            }

            if ($row->id == user()->id) {
                return $uRole . ' <i data-toggle="tooltip" data-original-title="' . __('messages.roleCannotChange') . '" class="fa fa-info-circle"></i>';
            }

            $role = '<select class="form-control select-picker assign_role" data-user-id="' . $row->id . '">';

            foreach ($roles as $item) {
                if (
                    $item->name != 'admin'
                    || ($item->name == 'admin' && in_array('admin', user_roles()))
                ) {

                    $role .= '<option ';

                    if (
                        (in_array($item->name, $userRole) && $item->name == 'admin')
                        || (in_array($item->name, $userRole) && !in_array('admin', $userRole))
                    ) {
                        $role .= 'selected';
                    }

                    $role .= ' value="' . $item->id . '">' . $item->display_name . '</option>';

                }
            }

            $role .= '</select>';

            return $role;
        });
        $datatables->addColumn('action', function ($row) {
            $userRole = $row->roles->pluck('name')->toArray();
            $action = '<div class="task_view">

                    <div class="dropdown">
                        <a class="task_view_more d-flex align-items-center justify-content-center dropdown-toggle" type="link"
                            id="dropdownMenuLink-' . $row->id . '" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="icon-options-vertical icons"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink-' . $row->id . '" tabindex="0">';

            $action .= '<a href="' . route('employees.show', [$row->id]) . '" class="dropdown-item"><i class="fa fa-eye mr-2"></i>' . __('app.view') . '</a>';

            if ($this->editEmployeePermission == 'all'
                || ($this->editEmployeePermission == 'added' && user()->id == $row->added_by)
                || ($this->editEmployeePermission == 'owned' && user()->id == $row->id)
                || ($this->editEmployeePermission == 'both' && (user()->id == $row->id || user()->id == $row->added_by))) {
                if (!in_array('admin', $userRole) || (in_array('admin', $userRole) && in_array('admin', user_roles()))) {
                    $action .= '<a class="dropdown-item openRightModal" href="' . route('employees.edit', [$row->id]) . '">
                                <i class="fa fa-edit mr-2"></i>
                                ' . trans('app.edit') . '
                            </a>';
                }
            }

            if ($this->deleteEmployeePermission == 'all' || ($this->deleteEmployeePermission == 'added' && user()->id == $row->added_by)) {
                if ((!in_array('admin', $userRole) && user()->id !== $row->id) || (user()->id !== $row->id && in_array('admin', $userRole) && in_array('admin', user_roles()))) {
                    $action .= '<a class="dropdown-item delete-table-row" href="javascript:;" data-user-id="' . $row->id . '">
                                <i class="fa fa-trash mr-2"></i>
                                ' . trans('app.delete') . '
                            </a>';
                }
            }

            $action .= '</div>
                    </div>
                </div>';

            return $action;
        });
        $datatables->addColumn('employee_name', fn($row) => $row->name);
        $datatables->editColumn('created_at', fn($row) => Carbon::parse($row->created_at)->translatedFormat($this->company->date_format));
        $datatables->editColumn('status', fn($row) => $row->status == 'active' ? Common::active() : Common::inactive());

        $datatables->editColumn('name', function ($row) {
            $employmentTypeBadge = '';

            if ($row->employeeDetail->probation_end_date > now()->toDateString()) {
                $employmentTypeBadge .= '<span class="badge badge-info">' . __('app.onProbation') . '</span> ';
            }
            if ($row->employeeDetail->employment_type == 'internship' || $row->employeeDetail->internship_end_date > now()->toDateString()) {
                $employmentTypeBadge .= '<span class="badge badge-info">' . __('app.onInternship') . '</span> ';
            }
            if ($row->employeeDetail->notice_period_end_date > now()->toDateString()) {
                $employmentTypeBadge .= '<span class="badge badge-info">' . __('app.onNoticePeriod') . '</span> ';
            }
            if ($row->employeeDetail->joining_date >= now()->subDays(30)->toDateString() && $row->employeeDetail->joining_date <= now()->addDay()->toDateString()) {
                $employmentTypeBadge .= '<span class="badge badge-info">' . __('app.newHires') . '</span> ';
            }
            if ($row->employeeDetail->joining_date <= now()->subYears(2)->toDateString()) {
                $employmentTypeBadge .= '<span class="badge badge-info">' . __('app.longStanding') . '</span> ';
            }

            $view = view('components.employee', ['user' => $row])->render();
            $view .= $employmentTypeBadge;

            return $view;
        });

        $datatables->addColumn('employment_type', function ($row) {
            $employmentType = '';

            if ($row->employeeDetail->probation_end_date > now()->toDateString()) {
                $employmentType .= __('app.onProbation') . ' ';
            }
            if ($row->employeeDetail->employment_type == 'internship' || $row->employeeDetail->internship_end_date > now()->toDateString()) {
                $employmentType .= __('app.onInternship') . ' ';
            }
            if ($row->employeeDetail->notice_period_end_date > now()->toDateString()) {
                $employmentType .= __('app.onNoticePeriod') . ' ';
            }
            if ($row->employeeDetail->joining_date >= now()->subDays(30)->toDateString() && $row->employeeDetail->joining_date <= now()->addDay()->toDateString()) {
                $employmentType .= __('app.newHires') . ' ';
            }
            if ($row->employeeDetail->joining_date <= now()->subYears(2)->toDateString()) {
                $employmentType .= __('app.longStanding') . ' ';
            }

            return $employmentType;
        });

        $datatables->editColumn('employee_id', fn($row) => '<a href="' . route('employees.show', [$row->id]) . '" class="text-darkest-grey">' . $row->employee_id . '</a>');
        $datatables->editColumn('joining_date', fn($row) => Carbon::parse($row->joining_date)->translatedFormat('Y-m-d'));

        $datatables->addColumn('reporting_to', function ($row) {
            return $row->employeeDetail->reportingTo->name ?? '--';
        });

        $datatables->addIndexColumn();
        $datatables->setRowId(fn($row) => 'row-' . $row->id);
        $datatables->removeColumn('roleId');
        $datatables->removeColumn('roleName');
        $datatables->removeColumn('current_role');

        // Custom Fields For export
        $customFieldColumns = CustomField::customFieldData($datatables, EmployeeDetails::CUSTOM_FIELD_MODEL, 'employeeDetail');

        $datatables->rawColumns(array_merge(['name', 'action', 'role', 'status', 'check', 'employee_id'], $customFieldColumns));

        return $datatables;
    }

    /**
     * @param User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        $request = $this->request();

        $userRoles = '';

        if ($request->role != 'all' && $request->role != '') {
            $userRoles = Role::findOrFail($request->role);
        }

        $users = $model->with('role', 'roles', 'employeeDetail', 'session', 'employeeDetail.reportingTo')
            ->withoutGlobalScope(ActiveScope::class)
            ->join('role_user', 'role_user.user_id', '=', 'users.id')
            ->leftJoin('employee_details', 'employee_details.user_id', '=', 'users.id')
            ->leftJoin('designations', 'employee_details.designation_id', '=', 'designations.id')
            ->join('roles', 'roles.id', '=', 'role_user.role_id')
            ->select('users.id', 'employee_details.added_by', 'users.salutation', 'users.name', 'users.email', 'users.created_at', 'roles.name as roleName', 'roles.id as roleId', 'users.image', 'users.gender', 'users.inactive_date', DB::raw('(select user_roles.role_id from role_user as user_roles where user_roles.user_id = users.id ORDER BY user_roles.role_id DESC limit 1) as `current_role`'), DB::raw('(select roles.name from roles as roles where roles.id = current_role limit 1) as `current_role_name`'), 'designations.name as designation_name', 'employee_details.employee_id', 'employee_details.joining_date', DB::raw('CASE WHEN users.status = "deactive" THEN "inactive" WHEN users.inactive_date IS NULL THEN "active" WHEN users.inactive_date <= CURDATE() THEN "inactive" ELSE "active" END as status'))
            ->onlyEmployee();

        if ($request->status != 'all' && $request->status != '') {
            if ($request->status == 'active') {
                // Check if the inactive_date is today or in the past
                $expireDate = now()->toDateString();
                $users = $users->where('users.status', 'active');

                $users = $users->where(function ($query) use ($expireDate) {
                    $query->orWhereNull('users.inactive_date') // Consider users with null inactive_date
                        ->orWhere('users.inactive_date', '>', $expireDate); // Or users with inactive_date in the future
                });
            } elseif ($request->status == 'deactive') {
                // Check if the inactive_date is in the past
                $expireDate = now()->toDateString();
                $users = $users->where('users.status', 'deactive')
                    ->orWhere('users.inactive_date', '<=', $expireDate);
            }
        }


        if ($request->gender != 'all' && $request->gender != '') {
            $users = $users->where('users.gender', $request->gender);
        }

        if ($request->employee != 'all' && $request->employee != '') {
            $users = $users->where('users.id', $request->employee);
        }

        if ($request->designation != 'all' && $request->designation != '') {
            $users = $users->where('employee_details.designation_id', $request->designation);
        }

        if ($request->department != 'all' && $request->department != '') {
            $users = $users->where('employee_details.department_id', $request->department);
        }

        if ($request->role != 'all' && $request->role != '' && $userRoles) {
            if ($userRoles->name == 'admin') {
                $users = $users->where('roles.id', $request->role);
            }
            elseif ($userRoles->name == 'employee') {
                $users = $users->where(DB::raw('(select user_roles.role_id from role_user as user_roles where user_roles.user_id = users.id ORDER BY user_roles.role_id DESC limit 1)'), $request->role)
                    ->having('roleName', '<>', 'admin');
            }
            else {
                $users = $users->where(DB::raw('(select user_roles.role_id from role_user as user_roles where user_roles.user_id = users.id ORDER BY user_roles.role_id DESC limit 1)'), $request->role);
            }
        }

        if ((is_array($request->skill) && $request->skill[0] != 'all') && $request->skill != '' && $request->skill != null && $request->skill != 'null') {
            $users = $users->join('employee_skills', 'employee_skills.user_id', '=', 'users.id')
                ->whereIn('employee_skills.skill_id', $request->skill);
        }

        if ($this->viewEmployeePermission == 'added') {
            $users = $users->where('employee_details.added_by', user()->id);
        }

        if ($this->viewEmployeePermission == 'owned') {
            $users = $users->where('employee_details.user_id', user()->id);
        }

        if ($this->viewEmployeePermission == 'both') {
            $users = $users->where(function ($q) {
                $q->where('employee_details.user_id', user()->id);
                $q->orWhere('employee_details.added_by', user()->id);
            });
        }

        if ($request->startDate != '' && $request->endDate != '') {
            $startDate = companyToDateString($request->startDate);
            $endDate = companyToDateString($request->endDate);

            $users = $users->whereRaw('Date(employee_details.joining_date) >= ?', [$startDate])->whereRaw('Date(employee_details.joining_date) <= ?', [$endDate]);
        }

        if ($request->searchText != '') {
            $users = $users->where(function ($query) {
                $query->where('users.name', 'like', '%' . request('searchText') . '%')
                    ->orWhere('users.email', 'like', '%' . request('searchText') . '%')
                    ->orWhere('employee_details.employee_id', 'like', '%' . request('searchText') . '%');
            });
        }

        if ($request->employmentType != 'all' && $request->employmentType != '') {

            if ($request->employmentType == 'probation') {
                $today = now()->toDateString();
                $users = $users->where('employee_details.probation_end_date', '>', $today);
            }
            if($request->employmentType == 'internship'){
                $today = now()->toDateString();
                $users = $users->where('employee_details.employment_type', $request->employmentType)
                    ->orWhere('employee_details.internship_end_date', '>', $today);
            }
            if ($request->employmentType == 'notice_period') {
                $today = now()->toDateString();
                $users = $users->where('employee_details.notice_period_end_date', '>', $today);
            }
            if ($request->employmentType == 'new_hires') {
                $thirtyDaysAgo = now()->subDays(30)->toDateString();
                $today = now()->toDateString();
                $users = $users->whereBetween('employee_details.joining_date', [$thirtyDaysAgo, $today]);
            }
            if($request->employmentType == 'long_standing'){
                $twoYearsAgo = now()->subYears(2)->toDateString();
                $users = $users->where('employee_details.joining_date', '<=', $twoYearsAgo);
            }

        }


        return $users->groupBy('users.id');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        $dataTable = $this->setBuilder('employees-table', 2)
            ->parameters([
                'initComplete' => 'function () {
                    window.LaravelDataTables["employees-table"].buttons().container()
                     .appendTo( "#table-actions")
                 }',
                'fnDrawCallback' => 'function( oSettings ) {
                   $(".select-picker").selectpicker();
                 }',
            ]);

        if (canDataTableExport()) {
            $dataTable->buttons(Button::make(['extend' => 'excel', 'text' => '<i class="fa fa-file-export"></i> ' . trans('app.exportExcel')]));
        }

        return $dataTable;
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {

        $data = [
            'check' => [
                'title' => '<input type="checkbox" name="select_all_table" id="select-all-table" onclick="selectAllTable(this)">',
                'exportable' => false,
                'orderable' => false,
                'searchable' => false
            ],
            '#' => ['data' => 'DT_RowIndex', 'orderable' => false, 'searchable' => false, 'visible' => false, 'title' => '#'],
            __('app.id') => ['data' => 'id', 'name' => 'id', 'title' => __('app.id'), 'visible' => false],
            __('modules.employees.employeeId') => ['data' => 'employee_id', 'name' => 'employee_id', 'title' => __('modules.employees.employeeId')],
            __('app.name') => ['data' => 'name', 'name' => 'name', 'exportable' => false, 'title' => __('app.name')],
            __('modules.employees.employmentType') => ['data' => 'employment_type', 'name' => 'employment_type', 'visible' => false, 'title' => __('modules.employees.employmentType')],
            __('app.employee') => ['data' => 'employee_name', 'name' => 'name', 'visible' => false, 'title' => __('app.employee')],
            __('app.email') => ['data' => 'email', 'name' => 'email', 'title' => __('app.email')],
            __('app.role') => ['data' => 'role', 'name' => 'role', 'width' => '20%', 'orderable' => false, 'exportable' => false, 'title' => __('app.role'), 'visible' => ($this->changeEmployeeRolePermission == 'all')],
            __('modules.employees.role') => ['data' => 'current_role_name', 'name' => 'current_role_name', 'visible' => false, 'title' => __('modules.employees.role')],
            __('modules.employees.reportingTo') => ['data' => 'reporting_to', 'name' => 'reporting_to', 'title' => __('modules.employees.reportingTo')],
            __('modules.employees.joiningDate') => ['data' => 'joining_date', 'name' => 'joining_date', 'visible' => false, 'title' => __('modules.employees.joiningDate')],
            __('app.status') => ['data' => 'status', 'name' => 'status', 'title' => __('app.status')]
        ];

        $action = [
            Column::computed('action', __('app.action'))
                ->exportable(false)
                ->printable(false)
                ->orderable(false)
                ->searchable(false)
                ->addClass('text-right pr-20')
        ];

        return array_merge($data, CustomFieldGroup::customFieldsDataMerge(new EmployeeDetails()), $action);

    }

}
