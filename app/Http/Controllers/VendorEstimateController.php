<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\EstimatesDataTable;
use App\Models\vendor_estimates;
use App\Models\EstimateTemplateItemImage;
use App\Models\EstimateTemplate;
use App\Models\UnitType;
use App\Models\Project;
use App\Helper\Reply;
use App\Models\Currency;

class VendorEstimateController extends AccountBaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->pageTitle = 'Vendor Estimates';
        $this->pageIcon = 'ti-file';
        $this->middleware(function ($request, $next) {
            abort_403(!in_array('estimates', $this->user->modules));
            return $next($request);
        });
    }

    public function index(EstimatesDataTable $dataTable)
    {
        abort_403(!in_array(user()->permission('view_estimates'), ['all', 'added', 'owned', 'both']));

        return $dataTable->render('estimates-vendor.index', $this->data);

    }
    public function create()
    {
        $this->addPermission = user()->permission('add_estimates');

        abort_403(!in_array($this->addPermission, ['all', 'added']));

        // if (request('estimate') != '') {
        //     $this->estimateId = request('estimate');
        //     $this->type = 'estimate';
        //     $this->estimate = Estimate::with('items', 'items.estimateItemImage', 'client', 'unit', 'client.projects' )->findOrFail($this->estimateId);
        // }

        $this->pageTitle = __('modules.estimates.createEstimate');
        $this->currencies = Currency::all();
        $this->lastEstimate = vendor_estimates::lastEstimateNumber() + 1;
        $this->invoiceSetting = invoice_setting();
        $this->zero = '';
        $this->projecttab = request('project_id') ? Project::findOrFail(request('project_id')) : null;
        $this->projects=Project::all();
        if (strlen($this->lastEstimate) < $this->invoiceSetting->estimate_digit) {
            $condition = $this->invoiceSetting->estimate_digit - strlen($this->lastEstimate);

            for ($i = 0; $i < $condition; $i++) {
                $this->zero = '0' . $this->zero;
            }
        }

        // $this->taxes = Tax::all();
        // $this->products = Product::all();
        // $this->categories = ProductCategory::all();
        // $this->template = EstimateTemplate::all();
        $this->units = UnitType::all();

        $this->estimateTemplate = request('template') ? EstimateTemplate::findOrFail(request('template')) : null;


        $this->estimateTemplateItem = request('template') ? EstimateTemplateItem::with('estimateTemplateItemImage')->where('estimate_template_id', request('template'))->get() : null;

        $this->view = 'estimates-vendor.ajax.create';

        if (request()->ajax()) {
            return $this->returnAjax($this->view);
        }

        return view('estimates-vendor.create', $this->data);

    }

    public function store(Request $request)
    {
        $items = $request->item_name;
        $cost_per_item = $request->cost_per_item;
        $quantity = $request->quantity;
        $amount = $request->amount;

        if (trim($items[0]) == '' || trim($cost_per_item[0]) == '') {
            return Reply::error(__('messages.addItem'));
        }

        foreach ($quantity as $qty) {
            if (!is_numeric($qty) && (intval($qty) < 1)) {
                return Reply::error(__('messages.quantityNumber'));
            }
        }

        foreach ($cost_per_item as $rate) {
            if (!is_numeric($rate)) {
                return Reply::error(__('messages.unitPriceNumber'));
            }
        }

        foreach ($amount as $amt) {
            if (!is_numeric($amt)) {
                return Reply::error(__('messages.amountNumber'));
            }
        }

        foreach ($items as $itm) {
            if (is_null($itm)) {
                return Reply::error(__('messages.itemBlank'));
            }
        }

        $estimate = new vendor_estimates();
        $estimate->vendor_id = $request->vendor_id;
        $estimate->valid_till = companyToYmd($request->valid_till);
        $estimate->project_id=$request->project_id;
        $estimate->sub_total = round($request->sub_total, 2);
        $estimate->total = round($request->total, 2);
        $estimate->currency_id = $request->currency_id;
        $estimate->note = trim_editor($request->note);
        $estimate->discount = round($request->discount_value, 2);
        $estimate->discount_type = $request->discount_type;
        $estimate->status = 'waiting';
        $estimate->description = trim_editor($request->description);
        $estimate->estimate_number = $request->estimate_number;
        $estimate->save();

        $this->logSearchEntry($estimate->id, $estimate->estimate_number, 'estimates-vendor.show', 'estimates-vendor');

        $redirectUrl = urldecode($request->redirect_url);

        if ($redirectUrl == '') {
            $redirectUrl = route('vendor-estimates.index');
        }

        return Reply::successWithData(__('messages.recordSaved'), ['estimateId' => $estimate->id, 'redirectUrl' => $redirectUrl]);
    }
}
