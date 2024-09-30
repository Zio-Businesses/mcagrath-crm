<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\VendorEstimatesDataTable;
use App\Models\vendor_estimates;
use App\Models\EstimateTemplateItemImage;
use App\Models\EstimateTemplate;
use App\Models\UnitType;
use App\Models\Project;
use App\Helper\Reply;
use App\Models\Currency;
use App\Http\Requests\StoreVendorEstimates;
use App\Models\vendor_estimates_items;
use Exception;
use Illuminate\Support\Facades\App;
use Carbon\Carbon;


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

    public function index(VendorEstimatesDataTable $dataTable)
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

    public function store(StoreVendorEstimates $request)
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

    public function edit($id)
    {
        $this->estimate = vendor_estimates::findOrFail($id);

        $this->editPermission = user()->permission('edit_estimates');

        abort_403(!(
            $this->editPermission == 'all'
            || ($this->editPermission == 'added' && $this->estimate->added_by == user()->id)
            || ($this->editPermission == 'owned' && $this->estimate->client_id == user()->id)
            || ($this->editPermission == 'both' && ($this->estimate->client_id == user()->id || $this->estimate->added_by == user()->id))
        ));

        $this->pageTitle = $this->estimate->estimate_number;

        $this->units = UnitType::all();
        $this->currencies = Currency::all();
        $this->projects = Project::all();
        $this->invoiceSetting = invoice_setting();

        $this->view = 'estimates-vendor.ajax.edit';

        if (request()->ajax()) {
            return $this->returnAjax($this->view);
        }

        return view('estimates-vendor.create', $this->data);
    }
    
    public function update(Request $request, $id)
    {
        $items = $request->item_name;
        $itemsSummary = $request->item_summary;
        $hsn_sac_code = $request->hsn_sac_code;
        $unitId = request()->unit_id;
        // $product = request()->product_id;
        // $tax = $request->taxes;
        $quantity = $request->quantity;
        $cost_per_item = $request->cost_per_item;
        $amount = $request->amount;
        // $invoice_item_image = $request->invoice_item_image;
        // $invoice_item_image_url = $request->invoice_item_image_url;
        $item_ids = $request->item_ids;
        if (trim($items[0]) == '' || trim($items[0]) == '' || trim($cost_per_item[0]) == '') {
            return Reply::error(__('messages.addItem'));
        }

        foreach ($quantity as $qty) {
            if (!is_numeric($qty) && $qty < 1) {
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

        $estimate = vendor_estimates::findOrFail($id);
        $estimate->valid_till = companyToYmd($request->valid_till);
        $estimate->vendor_id=$request->vendor_id;
        $estimate->sub_total = round($request->sub_total, 2);
        $estimate->project_id=$request->project_id;
        $estimate->total = round($request->total, 2);
        $estimate->discount = round($request->discount_value, 2);
        $estimate->discount_type = $request->discount_type;
        $estimate->currency_id = $request->currency_id;
        $estimate->status = $request->status;
        $estimate->note = trim_editor($request->note);
        $estimate->description = trim_editor($request->description);
        $estimate->estimate_number = $request->estimate_number;
        $estimate->save();

        /*
            Step1 - Delete all items which are not avaialable
            Step2 - Find old items, update it and check if images are newer or older
            Step3 - Insert new items with images
        */

        if (!empty($request->item_name) && is_array($request->item_name)) {
            // Step1 - Delete all invoice items which are not avaialable
            if (!empty($item_ids)) {
                vendor_estimates_items::whereNotIn('id', $item_ids)->where('vendor_estimate_id', $estimate->id)->delete();
            }

            // Step2&3 - Find old invoices items, update it and check if images are newer or older
            foreach ($items as $key => $item) {
                $invoice_item_id = isset($item_ids[$key]) ? $item_ids[$key] : 0;
                try {
                    $estimateItem = vendor_estimates_items::findOrFail($invoice_item_id);

                }
                catch (Exception) {
                    // Handles the case where the item is not found
                    $estimateItem = new vendor_estimates_items();

                }
                // if($invoice_item_id==0)
                // {
                //     $estimateItem = new vendor_estimates_items();
                // }
                // else{
                //     $estimateItem = vendor_estimates_items::findOrFail($invoice_item_id);
                // }

                $estimateItem->vendor_estimate_id = $estimate->id;
                $estimateItem->item_name = $item;
                $estimateItem->item_summary = $itemsSummary[$key];
                $estimateItem->type = 'item';
                $estimateItem->unit_id = (isset($unitId[$key]) && !is_null($unitId[$key])) ? $unitId[$key] : null;
                // $estimateItem->product_id = (isset($product[$key]) && !is_null($product[$key])) ? $product[$key] : null;
                $estimateItem->hsn_sac_code = (isset($hsn_sac_code[$key]) && !is_null($hsn_sac_code[$key])) ? $hsn_sac_code[$key] : null;
                $estimateItem->quantity = $quantity[$key];
                $estimateItem->unit_price = round($cost_per_item[$key], 2);
                $estimateItem->amount = round($amount[$key], 2);
                // $estimateItem->taxes = ($tax ? (array_key_exists($key, $tax) ? json_encode($tax[$key]) : null) : null);
                $estimateItem->save();

            }
        }

        
        $redirectUrl = route('vendor-estimates.index');
        
        return Reply::successWithData(__('messages.updateSuccess'), ['estimateId' => $estimate->id, 'redirectUrl' => $redirectUrl]);
    }

    public function show($id)
    {
        $this->invoice = vendor_estimates::findOrFail($id);


        $this->pageTitle = $this->invoice->estimate_number;

        $this->discount = 0;

        if ($this->invoice->discount > 0) {
            if ($this->invoice->discount_type == 'percent') {
                $this->discount = (($this->invoice->discount / 100) * $this->invoice->sub_total);
            }
            else {
                $this->discount = $this->invoice->discount;
            }
        }


        $this->firstEstimate = vendor_estimates::orderBy('id', 'desc')->first();

        $items = vendor_estimates_items::where('vendor_estimate_id', $this->invoice->id)->get();


        $this->settings = company();
        $this->invoiceSetting = invoice_setting();

        return view('estimates-vendor.show', $this->data);

    }
    public function download($id)
    {
        $this->estimate = vendor_estimates::findOrFail($id);
        $this->company = company();
        $this->invoiceSetting = invoice_setting();
        $this->discount = 0;

        if ($this->estimate->discount > 0) {
            if ($this->estimate->discount_type == 'percent') {
                $this->discount = (($this->estimate->discount / 100) * $this->estimate->sub_total);
            }
            else {
                $this->discount = $this->estimate->discount;
            }
        }

        $pdf = app('dompdf.wrapper');

        $pdf->setOption('enable_php', true);
        $pdf->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);

        App::setLocale('en');
        Carbon::setLocale('en');
        $pdf->loadView('estimates-vendor.pdf.invoice-5', $this->data);

        $filename = $this->estimate->estimate_number;

        return $pdf->download($filename . '.pdf');

    }
    public function changecbid($id, Request $request)
    {
        $estimate = vendor_estimates::findOrFail($id);
        $estimate->cbid = $request->value=='yes' ? 1 : 0;
        $estimate->save();
        return Reply::success(__('messages.updateSuccess'));
    }
    public function destroy($id)
    {
        vendor_estimates::destroy($id);
        return Reply::success(__('messages.deleteSuccess'));

    }

}
