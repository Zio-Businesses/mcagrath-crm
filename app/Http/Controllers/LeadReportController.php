<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Deal;
use App\Models\Lead;
use App\Models\User;
use App\Helper\Reply;
use App\Models\Company;
use Carbon\CarbonPeriod;
use App\Models\LeadAgent;
use App\Models\LeadSource;
use App\Models\LeadCategory;
use App\Models\LeadPipeline;
use Illuminate\Http\Request;
use App\Models\PipelineStage;
use Illuminate\Support\Facades\DB;
use App\DataTables\LeadReportDataTable;
use App\DataTables\LeadContactDataTable;
use App\Http\Controllers\AccountBaseController;

class LeadReportController extends AccountBaseController
{

    public function __construct()
    {
        parent::__construct();


    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $tab = request('tab');
        $this->view = 'reports.lead.profile';

        switch ($tab) {
        case 'profile':
            $this->pageTitle = 'app.menu.deal';
            return $this->profile();


            break;
        case 'lead':

            return $this->leadContact();

        case 'chart':

            return $this->averageDealSizeReport();

        default:

        return $this->profile();
            break;
        }
        if (request()->ajax()) {
            return $this->returnAjax($this->view);
        }

        $this->activeTab = $tab ?: 'profile';


        return view('reports.lead.index', $this->data);
    }

   public function profile()
    {
        $this->pageTitle = 'modules.lead.profile';

    if (!request()->ajax()) {
        $this->fromDate = now($this->company->timezone)->startOfMonth();
        $this->toDate = now($this->company->timezone);

        $this->agents = LeadAgent::with('user')
            ->join('users', 'users.id', 'lead_agents.user_id')->get();
    }
    $tab = request('tab');

    $this->activeTab = $tab ?: 'profile';

    $dataTable = new LeadReportDataTable();

    return $dataTable->render('reports.lead.profile', $this->data);
}


    public function leadContact( )
    {
        $this->employees = User::allEmployees();
        $this->pageTitle = 'modules.leadContact.title';

        $this->viewLeadPermission = $viewPermission = user()->permission('view_lead');

        abort_403(!in_array($viewPermission, ['all', 'added', 'both', 'owned']));

        if (!request()->ajax()) {
            $this->categories = LeadCategory::get();
            $this->sources = LeadSource::get();

        }
        $getTotal = 'withDatatable';

        $dataTable = new LeadContactDataTable();
        $tab = request('tab');
        $this->activeTab = $tab ?: 'lead';

        return $dataTable->render('reports.lead.lead-report', $this->data);

    }

    public function totalContact()
    {
        $request = request();
        $this->viewLeadPermission = $viewPermission = user()->permission('view_lead');
        $this->startDate = (request('start_date') != '') ? Carbon::createFromFormat($this->company->date_format, request('start_date')) : now($this->company->timezone)->startOfMonth();
        $this->endDate = (request('end_date') != '') ? Carbon::createFromFormat($this->company->date_format, request('end_date')) : now($this->company->timezone);
        $startDate = $this->startDate->toDateString();
        $endDate = $this->endDate->toDateString();
        $totalCount = Lead::whereDate('created_at', '>=', $startDate)
        ->whereDate('created_at', '<=', $endDate)
        ->count();

        return Reply::dataOnly(['totalCount' => $totalCount]);

    }


    public function averageDealSizeReport()
    {
        $this->pageTitle = 'app.menu.dealReport';
        $request = request();

        $this->currentYear = now()->format('Y');
        $this->currentMonth = now()->month;
        $this->pipelines = LeadPipeline::all();

        $defaultPipelineId = $this->pipelines->filter(function ($value, $key) {
            return $value->default == 1;
        })->first()->id;


        $selectedYear = $request->year ? $request->year : now()->format('Y');
        $pipelineId = $request->pipeline ? $request->pipeline : $defaultPipelineId;


        $startDate = Carbon::createFromFormat('Y-m-d', $selectedYear.'-01-'.'01')->startOfYear();
        $endDate = Carbon::createFromFormat('Y-m-d', $selectedYear.'-12-'.'31')->endOfYear();


        $deals = Deal::select('pipeline_stages.name as stage_name', 'deals.value', 'deals.close_date')
            ->join('pipeline_stages', 'deals.pipeline_stage_id', '=', 'pipeline_stages.id')
            ->join('lead_pipelines', 'lead_pipelines.id', '=', 'pipeline_stages.lead_pipeline_id')
            ->where('lead_pipelines.id',$pipelineId)
            ->whereBetween('deals.close_date', [$startDate, $endDate])
            ->get();

            $dealsByStageAndMonth = $deals->groupBy(function ($deal) {
                return Carbon::parse($deal->close_date)->format('m');
            });



            $pipelineStages = PipelineStage::where('lead_pipeline_id', $pipelineId)->get();

            $monthlyTotals = [];
            $stageColors = [];

            // Fetch stage colors from the database
            foreach ($pipelineStages as $stage) {
                $stageColors[$stage->name] = $stage->label_color;
            }


            // Loop through each month of the year
            for ($month = 1; $month <= 12; $month++) {
                $monthKey = str_pad($month, 2, '0', STR_PAD_LEFT);

                foreach ($pipelineStages as $stage) {
                    $monthlyTotals[$monthKey][$stage->name] = 0;

            }


            if (isset($dealsByStageAndMonth[$monthKey])) {
                foreach ($dealsByStageAndMonth[$monthKey] as $deal) {
                    $monthlyTotals[$monthKey][$deal->stage_name] += $deal->value;
                }
            }
        }

        $lastYear = Carbon::now()->subYear()->format('Y');

        $this->years = range(Carbon::now()->year, $lastYear);


            $startMonth = $startDate->format('M');
            $endMonth = $endDate->format('M');


        $monthRange = CarbonPeriod::create($startMonth, '1 month', $endMonth);

        $dealsByMonth = $deals->groupBy(function($deal) {
                    return $deal->close_date->format('m');
                });
                $monthlyDealCounts = [];
                foreach ($dealsByMonth as $month => $dealsInMonth) {
                    $monthlyDealCounts[$month] = $dealsInMonth->count();
                }

                $stages = PipelineStage::with('deals')->get();



                $label = [];
                foreach ($monthRange as $month){
                            $formattedMonth = Carbon::parse($month)->format('M');
                            $numMonth = Carbon::parse($month)->format('m');

                                $totalValue = $deals->filter(function ($value, $key) use($numMonth, $selectedYear) {
                                    return $value->close_date->format('m') == $numMonth && $value->close_date->format('Y') == $selectedYear;
                                })->sum('value');
                                $count = $monthlyDealCounts[$numMonth] ?? 0;
                                $averageValue = $count > 0 ? $totalValue / $count : 0;
                                $averageValue1 = round($averageValue, 1);
     
                                $monthlyData[] = [
                                    'label' => $formattedMonth,
                                    'value' => $averageValue1,

                                ];
                                $value[]= $averageValue1;
                                $value = $value;

            $lineChartDataset = [
                'name' => 'Average',
                'chartType' => 'line',
                'values' => array_column($monthlyData, 'value'),
                'color' => 'black',
            ];
        }
        $datasets = [];


        foreach ($pipelineStages as $stage) {
            $dataset = [
                'name' => $stage->name,
                'chartType' => 'bar',
                'values' => [],
                'color' => $stageColors[$stage->name] ?? '#d4f542'
            ];


            for ($month = 1; $month <= 12; $month++) {
                $monthKey = str_pad($month, 2, '0', STR_PAD_LEFT);
                $dataset['values'][] = $monthlyTotals[$monthKey][$stage->name] ?? 0;
            }


            $datasets[] = $dataset;
        }
        $datasets[] = $lineChartDataset;


      $this->data['datasets'] = $datasets;

      $tab = request('tab');
      $this->activeTab = $tab ?: 'chart';
        if ($request->ajax()) {
            return response()->json(['datasets' => $datasets]);
        } else {
            return view('reports.lead.report-chart', $this->data);
        }
}


}
