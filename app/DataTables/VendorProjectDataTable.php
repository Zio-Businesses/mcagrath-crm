<?php

namespace App\DataTables;

use App\Helper\Common;
use App\Scopes\ActiveScope;
use Carbon\Carbon;
use App\Models\ProjectVendor;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Database\Eloquent\Builder;
use App\Models\ProjectStatusSetting;
class VendorProjectDataTable extends BaseDataTable
{


    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $sow_name=[];
        $datatables = datatables()->eloquent($query);
        $datatables->addIndexColumn();
      
        
        $datatables->editColumn('id', fn($row) => $row->id);
        $datatables->editColumn('client_id', fn($row) => $row->client?->id? view('components.client', ['user' => $row->client]) : '');
        $datatables->editColumn('property_address', fn($row) => $row->project->propertyDetails?$row->project->propertyDetails->property_address:'N/A');
        $datatables->editColumn('created_at', fn($row) => $row->created_at?Carbon::parse($row->created_at)->translatedFormat($this->company->date_format):'N/A');
        $datatables->editColumn('updated_at', fn($row) => $row->updated_at?Carbon::parse($row->updated_at)->translatedFormat($this->company->date_format):'N/A');
        $datatables->editColumn('inspection_date', fn($row) => $row->inspection_date?Carbon::parse($row->inspection_date)->translatedFormat($this->company->date_format):'N/A');
        $datatables->editColumn('inspection_time', fn($row) => $row->inspection_time?Carbon::parse($row->inspection_time)->translatedFormat($this->company->time_format):'N/A');
        $datatables->editColumn('re_inspection_date', fn($row) => $row->re_inspection_date?Carbon::parse($row->re_inspection_date)->translatedFormat($this->company->date_format):'N/A');
        $datatables->editColumn('re_inspection_time', fn($row) => $row->re_inspection_time?Carbon::parse($row->re_inspection_time)->translatedFormat($this->company->time_format):'N/A');
        $datatables->editColumn('bid_ecd', fn($row) => $row->bid_ecd?Carbon::parse($row->bid_ecd)->translatedFormat($this->company->date_format):'N/A');
        $datatables->editColumn('bid_submitted_date', fn($row) => $row->bid_submitted_date?Carbon::parse($row->bid_submitted_date)->translatedFormat($this->company->date_format):'N/A');
        $datatables->editColumn('bid_rejected_date', fn($row) => $row->bid_rejected_date?Carbon::parse($row->bid_rejected_date)->translatedFormat($this->company->date_format):'N/A');
        $datatables->editColumn('bid_approval_date', fn($row) => $row->bid_approval_date?Carbon::parse($row->bid_approval_date)->translatedFormat($this->company->date_format):'N/A');
        $datatables->editColumn('work_schedule_date', fn($row) => $row->work_schedule_date?Carbon::parse($row->work_schedule_date)->translatedFormat($this->company->date_format):'N/A');
        $datatables->editColumn('work_schedule_time', fn($row) => $row->work_schedule_time?Carbon::parse($row->work_schedule_time)->translatedFormat($this->company->time_format):'N/A');
        $datatables->editColumn('work_schedule_re_date', fn($row) => $row->work_schedule_re_date?Carbon::parse($row->work_schedule_re_date)->translatedFormat($this->company->date_format):'N/A');
        $datatables->editColumn('work_schedule_re_time', fn($row) => $row->work_schedule_re_time?Carbon::parse($row->work_schedule_re_time)->translatedFormat($this->company->time_format):'N/A');
        $datatables->editColumn('work_completion_date', fn($row) => $row->work_completion_date?Carbon::parse($row->work_completion_date)->translatedFormat($this->company->date_format):'N/A');
        $datatables->editColumn('work_ecd', fn($row) => $row->work_ecd?Carbon::parse($row->work_ecd)->translatedFormat($this->company->date_format):'N/A');
        $datatables->editColumn('due_date', fn($row) => $row->due_date?Carbon::parse($row->due_date)->translatedFormat($this->company->date_format):'N/A');
        $datatables->editColumn('project', function ($row) {
            if($row->project_id){
            return '<a href="' . route('projects.show', $row->project_id) . '" style="color:black;">' . $row->projectshort($row->project_id) . '</a>';
            }
            else{
                return null;
            }
        });

        $datatables->editColumn('sow_name', function ($row) {
            if($row->sow_id){
                foreach($row->sow_id as $sow){
                    $sowname[]= $row->sowname($sow);
                }
            }
            return $sowname;
        });
        $datatables->editColumn('wo_status', function ($row) {
            if($row->wo_status==null){
               return ProjectStatusSetting::where('default_status', true)->value('status_name');
            }
            else{
                return $row->wo_status;
            }
        });
        
        $datatables->addIndexColumn();
        $datatables->smart(false);
        $datatables->setRowId(fn($row) => 'row-' . $row->id);
       
        $datatables->rawColumns(array_merge(['project']));
        return $datatables;
    }

    /**
     * @param User $model
     * @return User|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder
     */
    public function query(ProjectVendor $model)
    {
        $request = $this->request();
        $users = ProjectVendor::query()
        ->leftJoin('projects', 'projects.id', '=', 'project_vendors.project_id')
        ->leftJoin('property_details', 'property_details.id', '=', 'projects.property_details_id') // Join projects table
        ->with(['client', 'project']) // Eager load client and project relationships for better performance
        ->select('project_vendors.*', 'projects.project_short_code','property_details.property_address');

        if ($request->searchText != '') {
            $users = $users->where(function ($query) {
                $query->where('projects.project_short_code', 'like', '%' . request('searchText') . '%')
                ->orWhere('vendor_name', 'like', '%' . request('searchText') . '%')
                ->orWhere('vendor_email_address', 'like', '%' . request('searchText') . '%')
                ->orWhere('property_details.property_address', 'like', '%' . request('searchText') . '%')
                ->orWhere('vendor_phone', 'like', '%' . request('searchText') . '%');
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
        $dataTable = $this->setBuilder('vendors-projects-table', 2)
            ->parameters([
                'initComplete' => 'function () {
                   window.LaravelDataTables["vendors-projects-table"].buttons().container()
                    .appendTo("#table-actions")
                }',
                'fnDrawCallback' => 'function( oSettings ) {
                  //
                }',
            ]);

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
            
            '#' => ['data' => 'DT_RowIndex', 'orderable' => false, 'searchable' => false, 'visible' => !showId(), 'title' => '#'],
            __('app.id') => ['data' => 'id', 'name' => 'id', 'title' => __('app.id'), 'visible' => showId()],
            __('Work Order #') => ['data' => 'project', 'name' => 'project_id', 'title' => __('Work Order #')],
            __('app.client') => ['data' => 'client_id', 'name' => 'client_id', 'width' => '65%', 'exportable' => false, 'title' => __('app.client')],
            __('Property Address') => ['data' => 'property_address', 'name' => 'property_address', 'title' => __('Property Address')],
            __('Vendor Name') => ['data' => 'vendor_name', 'name' => 'vendor_name', 'title' => __('Vendor Name')],
            __('Vendor Phone') => ['data' => 'vendor_phone', 'name' => 'vendor_phone', 'title' => __('Vendor Phone')],
            __('Vendor Email Address') => ['data' => 'vendor_email_address', 'name' => 'vendor_email_address', 'title' => __('Vendor Email Address')],
            __('SOW') => ['data' => 'sow_name', 'name' => 'sow_id', 'title' => __('SOW')],
            __('Project Category') => ['data' => 'project_type', 'name' => 'project_type', 'title' => __('Project Category')],
            __('Project Amount') => ['data' => 'project_amount', 'name' => 'project_amount', 'title' => __('Project Amount')],
            __('Bid Approved Amount') => ['data' => 'bid_approved_amount', 'name' => 'bid_approved_amount', 'title' => __('Bid Approved Amount')],
            __('Link Status') => ['data' => 'link_status', 'name' => 'link_status', 'title' => __('Link Status')],   
            __('Link Sent Date') => ['data' => 'created_at', 'name' => 'created_at', 'title' => __('Link Sent Date')],
            __('Due Date') => ['data' => 'due_date', 'name' => 'due_date', 'title' => __('Due Date')],
            __('Wo Status') => ['data' => 'wo_status', 'name' => 'wo_status', 'title' => __('Wo Status')],
            __('Inspection Date') => ['data' => 'inspection_date', 'name' => 'inspection_date', 'title' => __('Inspection Date')],
            __('Inspection Time') => ['data' => 'inspection_time', 'name' => 'inspection_time', 'title' => __('Inspection Time')],
            __('Re Inspection Date') => ['data' => 're_inspection_date', 'name' => 're_inspection_date', 'title' => __('Re Inspection Date')],
            __('Re Inspection Time') => ['data' => 're_inspection_time', 'name' => 're_inspection_time', 'title' => __('Re Inspection Time')],
            __('Bid ECD') => ['data' => 'bid_ecd', 'name' => 'bid_ecd', 'title' => __('Bid ECD')],
            __('Bid Submitted Date') => ['data' => 'bid_submitted_date', 'name' => 'bid_submitted_date', 'title' => __('Bid Submitted Date')],
            __('Bid Rejected Date') => ['data' => 'bid_rejected_date', 'name' => 'bid_rejected_date', 'title' => __('Bid Rejected Date')],
            __('Bid Approval Date') => ['data' => 'bid_approval_date', 'name' => 'bid_approval_date', 'title' => __('Bid Approval Date')],
            __('Work Schedule Date') => ['data' => 'work_schedule_date', 'name' => 'work_schedule_date', 'title' => __('Work Schedule Date')],
            __('Work Schedule Time') => ['data' => 'work_schedule_time', 'name' => 'work_schedule_time', 'title' => __('Work Schedule Time')],
            __('Work Schedule Re Date') => ['data' => 'work_schedule_re_date', 'name' => 'work_schedule_re_date', 'title' => __('Work Schedule Re Date')],
            __('Work Schedule Re Time') => ['data' => 'work_schedule_re_time', 'name' => 'work_schedule_re_time', 'title' => __('Work Schedule Re Time')],
            __('Work Completion Date') => ['data' => 'work_completion_date', 'name' => 'work_completion_date', 'title' => __('Work Completion Date')],
            __('Work ECD') => ['data' => 'work_ecd', 'name' => 'work_ecd', 'title' => __('Work ECD')],
            

        ];

        

        return array_merge($data);
    }

}
