<?php

namespace App\Observers;

use File;
use Carbon\Carbon;
use App\Helper\Files;
use App\Models\Invoice;
use App\Models\vendor_estimates;
use Illuminate\Support\Str;
use App\Models\vendor_estimates_items;

use App\Traits\UnitTypeSaveTrait;

use function user;
use App\Traits\EmployeeActivityTrait;

class VendorEstimateObserver
{
    use EmployeeActivityTrait;


    use UnitTypeSaveTrait;

    public function saving(vendor_estimates $estimate)
    {
        if (!isRunningInConsoleOrSeeding()) {

            if (user()) {
                $estimate->last_updated_by = user()->id;
            }

            if (request()->has('calculate_tax')) {
                $estimate->calculate_tax = request()->calculate_tax;
            }
        }

    }

    public function creating(vendor_estimates $estimate)
    {
        $estimate->hash = md5(microtime());

        if (user()) {
            $estimate->added_by = user()->id;
        }


        if (company()) {
            $estimate->company_id = company()->id;
        }


        if (is_numeric($estimate->estimate_number)) {
            $estimate->estimate_number = $estimate->formatEstimateNumber();
        }

        $invoiceSettings = (company()) ? company()->invoiceSetting : $estimate->company->invoiceSetting;
        $estimate->original_estimate_number = str($estimate->estimate_number)->replace($invoiceSettings->estimate_prefix . $invoiceSettings->estimate_number_separator, '');

    }

    public function created(vendor_estimates $estimate)
    {

        if (!isRunningInConsoleOrSeeding()) {
            if (user()) {
                self::createEmployeeActivity(user()->id, 'estimate-created', $estimate->id, 'estimate');
            }

            if (!empty(request()->item_name)) {

                $itemsSummary = request()->item_summary;
                $cost_per_item = request()->cost_per_item;
                $hsn_sac_code = request()->hsn_sac_code;
                $quantity = request()->quantity;
                $unitId = request()->unit_id;
                $product = request()->product_id;
                $amount = request()->amount;
                // $tax = request()->taxes;
                // $invoice_item_image = request()->invoice_item_image;
                // $invoice_item_image_delete = request()->invoice_item_image_delete;
                // $invoice_item_image_url = request()->invoice_item_image_url;
                // $invoiceOldImage = request()->image_id;
                // $invoiceTemplateImage = request()->templateImage_id;

                foreach (request()->item_name as $key => $item) :
                    if (!is_null($item)) {
                        $estimateItem = vendor_estimates_items::create(
                            [
                                'vendor_estimate_id' => $estimate->id,
                                'item_name' => $item,
                                'item_summary' => $itemsSummary[$key],
                                'type' => 'item',
                                'unit_id' => (isset($unitId[$key]) && !is_null($unitId[$key])) ? $unitId[$key] : null,
                                'hsn_sac_code' => (isset($hsn_sac_code[$key]) && !is_null($hsn_sac_code[$key])) ? $hsn_sac_code[$key] : null,
                                'quantity' => $quantity[$key],
                                'unit_price' => round($cost_per_item[$key], 2),
                                'amount' => round($amount[$key], 2),
                                
                            ]
                        );


                        /* Invoice file save here */

                        // if ((isset($invoice_item_image[$key]) && $invoice_item_image[$key] != 'yes') || isset($invoice_item_image_url[$key])) {
                        //     EstimateItemImage::create(
                        //         [
                        //             'estimate_item_id' => $estimateItem->id,
                        //             'filename' => isset($invoice_item_image[$key]) ? $invoice_item_image[$key]->getClientOriginalName() : null,
                        //             'hashname' => isset($invoice_item_image[$key]) ? Files::uploadLocalOrS3($invoice_item_image[$key], EstimateItemImage::FILE_PATH . '/' . $estimateItem->id . '/') : null,
                        //             'size' => isset($invoice_item_image[$key]) ? $invoice_item_image[$key]->getSize() : null,
                        //             'external_link' => isset($invoice_item_image[$key]) ? null : ($invoice_item_image_url[$key] ?? null),
                        //         ]
                        //     );

                        // }

                        // $image = true;

                        // if (isset($invoice_item_image_delete[$key])) {
                        //     $image = false;
                        // }

                        // if ($image && (isset(request()->image_id[$key]) && $invoiceOldImage[$key] != '')) {
                        //     $estimateOldImg = EstimateItemImage::with('item')->where('id', request()->image_id[$key])->first();

                        //     $this->duplicateImageStore($estimateOldImg, $estimateItem);
                        // }

                        // if ($image && (isset(request()->templateImage_id[$key]) && $invoiceTemplateImage[$key] != '')) {
                        //     $estimateTemplateImg = EstimateTemplateItemImage::where('id', request()->templateImage_id[$key])->first();

                        //     $this->duplicateTemplateImageStore($estimateTemplateImg, $estimateItem);
                        // }

                    }

                endforeach;
            }

        }
    }



}
