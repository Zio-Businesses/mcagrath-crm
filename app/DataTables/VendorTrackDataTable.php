<?php

namespace App\DataTables;

use App\Helper\Common;
use App\Scopes\ActiveScope;
use Carbon\Carbon;
use App\Models\Vendor;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Database\Eloquent\Builder;

class VendorTrackDataTable extends BaseDataTable
{


    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {

        $datatables = datatables()->eloquent($query);
        $datatables->addIndexColumn();
        $datatables->addColumn('check', fn($row) => $this->checkBox($row));
        $datatables->addColumn('action', function ($row) {

            $action = '<div class="task_view">

                    <div class="dropdown">
                        <a class="task_view_more d-flex align-items-center justify-content-center dropdown-toggle" type="link"
                            id="dropdownMenuLink-' . $row->id . '" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="icon-options-vertical icons"></i>
                        </a>            
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink-' . $row->id . '" tabindex="0">';
                    if ($row->v_status=='rejected'||$row->v_status=='email_not_send') {
                        $action .= '<a class="dropdown-item send-proposal" href="javascript:;" data-user-send="' . $row->id . '">
                        <i class="fa fa-paper-plane mr-2"></i>
                        ' . trans('app.send_proposal') . '
                        </a>';
                    }
            // if (in_array('admin', user_roles()) && !$row->admin_approval) {
            //     $action .= '<a href="javascript:;" class="dropdown-item verify-user" data-user-id="' . $row->id . '"><i class="fa fa-check mr-2"></i>' . __('app.approve') . '</a>';
            // }

          //  if ($this->editClientPermission == 'all' || ($this->editClientPermission == 'added' && user()->id == $row->added_by) || ($this->editClientPermission == 'both' && user()->id == $row->added_by)) {
                $action .= '<a class="dropdown-item openRightModal" href="' . route('vendortrack.edit', [$row->id]) . '">
                                <i class="fa fa-edit mr-2"></i>
                                ' . trans('app.edit') . '
                            </a>';
           // }

            // if ($this->deleteClientPermission == 'all' || ($this->deleteClientPermission == 'added' && user()->id == $row->added_by) || ($this->deleteClientPermission == 'both' && user()->id == $row->added_by)) {
                $action .= '<a class="dropdown-item delete-table-row" href="javascript:;" data-user-id="' . $row->id . '">
                                <i class="fa fa-trash mr-2"></i>
                                ' . trans('app.delete') . '
                            </a>';
            // }

            //   if (!$row->company_sign) {
            //     $action .= '<a class="dropdown-item companysign" href="javascript:;" data-user-row="' . $row->id . '" data-toggle="modal" data-target="#signature-modal">
            //                     <i class="fa fa-edit mr-2"></i>
            //                     ' . trans('app.companysign') . '
            //                 </a>';
            //  }

            $action .= '</div>
                    </div>
                </div>';

            return $action;
        });
      
        $datatables->editColumn('id', fn($row) => $row->id);

        $datatables->editColumn('vendor_name', fn($row) => $row->vendor_name);
        $datatables->editColumn('vendor_email', fn($row) => $row->vendor_email);
        $datatables->editColumn('vendor_number', fn($row) => $row->vendor_number);
        $datatables->editColumn('created_at', fn($row) => Carbon::parse($row->created_at)->translatedFormat($this->company->date_format));
        $datatables->editColumn('created_by', fn($row) => $row->created_by);
        $datatables->editColumn('status', fn($row) => $row->v_status);
        $datatables->addIndexColumn();
        $datatables->smart(false);
        $datatables->setRowId(fn($row) => 'row-' . $row->id);
        // Add Custom Field to datatable

        $datatables->rawColumns(array_merge(['name', 'action', 'status', 'check']));

        return $datatables;
    }

    /**
     * @param User $model
     * @return User|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder
     */
    public function query(Vendor $model)
    {
        $request = $this->request();
        $users = Vendor::query();
        if ($request->searchText != '') {
            $users = $users->where(function ($query) {
                $query->where('vendor_name', 'like', '%' . request('searchText') . '%')
                    ->orWhere('vendor_email', 'like', '%' . request('searchText') . '%')
                    ->orWhere('vendor_number', 'like', '%' . request('searchText') . '%')
                    ->orWhere('created_by', 'like', '%' . request('searchText') . '%');
            });
        }

        return $users;
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        $dataTable = $this->setBuilder('vendorstrack-table', 2)
            ->parameters([
                'initComplete' => 'function () {
                   window.LaravelDataTables["vendorstrack-table"].buttons().container()
                    .appendTo("#table-actions")
                }',
                'fnDrawCallback' => 'function( oSettings ) {
                  //
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
                'title' => '<input type="checkbox" name="select_alField as $customField) {
                    $data[] = [$customField->name => l_table" id="select-all-table" onclick="selectAllTable(this)">',
                'exportable' => false,
                'orderable' => false,
                'searchable' => false
            ],
            '#' => ['data' => 'DT_RowIndex', 'orderable' => false, 'searchable' => false, 'visible' => !showId(), 'title' => '#'],
            __('app.id') => ['data' => 'id', 'name' => 'id', 'title' => __('app.id'), 'visible' => showId()],
            __('app.name') => ['data' => 'vendor_name', 'name' => 'vendor_name', 'title' => __('app.name')],
            __('app.email') => ['data' => 'vendor_email', 'name' => 'vendor_email', 'title' => __('app.email')],
            __('app.cell') => ['data' => 'vendor_number', 'name' => 'vendor_number', 'title' => __('app.cell')],
            
            __('app.createdAt') => ['data' => 'created_at', 'name' => 'created_at', 'title' => __('app.createdAt')],
             __('app.createdby') => ['data' => 'created_by', 'name' => 'created_by', 'title' => __('app.createdby')],
             __('app.csd') => ['data' => 'contract_start', 'name' => 'contract_start', 'title' => __('app.csd')],
             __('app.ced') => ['data' => 'contract_end', 'name' => 'contract_end', 'title' => __('app.ced')],
            __('app.status') => ['data' => 'v_status', 'name' => 'v_status', 'title' => __('app.status')],
        ];

        $action = [
            Column::computed('action', __('app.action'))
                ->exportable(false)
                ->printable(false)
                ->orderable(false)
                ->searchable(false)
                ->addClass('text-right pr-20')
        ];

        return array_merge($data, $action);
    }

}
