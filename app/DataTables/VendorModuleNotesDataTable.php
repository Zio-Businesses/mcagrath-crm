<?php

namespace App\DataTables;

use App\Helper\Common;
use App\Scopes\ActiveScope;
use Carbon\Carbon;
use App\Models\VendorModuleNotes;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Database\Eloquent\Builder;

class VendorModuleNotesDataTable extends BaseDataTable
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

            $action .= '<a href="' . route('vendor-module-notes.show', [$row->id]) . '" class="dropdown-item openRightModal"><i class="fa fa-eye mr-2"></i>' . __('app.view') . '</a>';

            // if (in_array('admin', user_roles()) && !$row->admin_approval) {
            //     $action .= '<a href="javascript:;" class="dropdown-item verify-user" data-user-id="' . $row->id . '"><i class="fa fa-check mr-2"></i>' . __('app.approve') . '</a>';
            // }

          //  if ($this->editClientPermission == 'all' || ($this->editClientPermission == 'added' && user()->id == $row->added_by) || ($this->editClientPermission == 'both' && user()->id == $row->added_by)) {
                $action .= '<a class="dropdown-item openRightModal" href="' . route('vendor-module-notes.edit', [$row->id]) . '">
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
            $action .= '</div>
                    </div>
                </div>';

            return $action;
        });
        // $datatables->addColumn('client_name', fn($row) => $row->vendor_name);
        // $datatables->addColumn('added_by', fn($row) => optional($row->clientDetails)->addedBy ? $row->clientDetails->addedBy->name : '--');
        $datatables->editColumn('id', fn($row) => $row->id);
        $datatables->editColumn('created_at', fn($row) => Carbon::parse($row->created_at)->translatedFormat($this->company->date_format));
        $datatables->editColumn('updated_at', fn($row) => Carbon::parse($row->updated_at)->translatedFormat($this->company->date_format));
        $datatables->editColumn('company_name', fn($row) => $row->company_name);
        $datatables->editColumn('created_by', fn($row) => $row->created_by);
        $datatables->editColumn('notes_title', function ($row) {

            return '<a href="' . route('vendor-module-notes.show', $row->id) . '" class="openRightModal" style="color:black;">' . $row->notes_title . '</a>';
        });
        $datatables->addIndexColumn();
        $datatables->smart(false);
        $datatables->setRowId(fn($row) => 'row-' . $row->id);
        // Add Custom Field to datatable

        $datatables->rawColumns(array_merge(['action', 'check', 'notes_title']));

        return $datatables;
    }

    /**
     * @param User $model
     * @return User|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder
     */
    public function query(VendorModuleNotes $model)
    {
        $request = $this->request();
        $users = $model->where('vendor_module_id', $request->vendorID);

        // if ($request->searchText != '') {
        //     $users = $users->where(function ($query) {
        //         $query->where('vendor_name', 'like', '%' . request('searchText') . '%')
        //             ->orWhere('vendor_email', 'like', '%' . request('searchText') . '%')
        //             ->orWhere('cell', 'like', '%' . request('searchText') . '%')
        //             ->orWhere('company_name', 'like', '%' . request('searchText') . '%')
        //             ->orWhere('contractor_type', 'like', '%' . request('searchText') . '%')
        //             ->orWhere('status', 'like', '%' . request('searchText') . '%')
        //             ->orWhere('created_by', 'like', '%' . request('searchText') . '%');
        //     });
        // }

        return $users;
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        $dataTable = $this->setBuilder('vendor-module-note-table', 2)
            ->parameters([
                'initComplete' => 'function () {
                   window.LaravelDataTables["vendor-module-note-table"].buttons().container()
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
            __('app.ntitle') => ['data' => 'notes_title', 'name' => 'notes_title', 'title' => __('app.ntitle')],
            __('app.createdby') => ['data' => 'created_by', 'name' => 'created_by', 'title' => __('app.createdby')],
            __('app.createddate') => ['data' => 'created_at', 'name' => 'created_at', 'title' => __('app.createddate')],
            __('app.editedby') => ['data' => 'edited_by', 'name' => 'edited_by', 'title' => __('app.editedby')],
            __('app.updatedat') => ['data' => 'updated_at', 'name' => 'updated_at', 'title' => __('app.updatedat')],
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
