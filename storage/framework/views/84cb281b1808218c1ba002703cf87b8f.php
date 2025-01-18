
<?php
    $viewEstimatePermission = user()->permission('view_estimates');
    $addEstimatePermission = user()->permission('add_estimates');
    $editEstimatePermission = user()->permission('edit_estimates');
    $deleteEstimatePermission = user()->permission('delete_estimates');
    $addInvoicePermission = user()->permission('add_invoices');
?>

<style>
    #logo {
        height: 50px;
    }

    .signature_wrap {
        position: relative;
        height: 150px;
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
        user-select: none;
        width: 400px;
    }

    .signature-pad {
        position: absolute;
        left: 0;
        top: 0;
        width: 400px;
        height: 150px;
    }

</style>

<?php if(!in_array('client', user_roles())): ?>
    <?php if(!is_null($invoice->last_viewed)): ?>
        <?php if (isset($component)) { $__componentOriginal5194778a3a7b899dcee5619d0610f5cf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5194778a3a7b899dcee5619d0610f5cf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.alert','data' => ['type' => 'info']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'info']); ?>
            <?php echo e($invoice->client->name_salutation); ?> <?php echo app('translator')->get('app.viewedOn'); ?>
            <?php echo e($invoice->last_viewed->timezone($settings->timezone)->translatedFormat($settings->date_format)); ?>

            <?php echo app('translator')->get('app.at'); ?>
            <?php echo e($invoice->last_viewed->timezone($settings->timezone)->translatedFormat($settings->time_format)); ?>

            <?php echo app('translator')->get('app.usingIpAddress'); ?>:<?php echo e($invoice->ip_address); ?>

         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5194778a3a7b899dcee5619d0610f5cf)): ?>
<?php $attributes = $__attributesOriginal5194778a3a7b899dcee5619d0610f5cf; ?>
<?php unset($__attributesOriginal5194778a3a7b899dcee5619d0610f5cf); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5194778a3a7b899dcee5619d0610f5cf)): ?>
<?php $component = $__componentOriginal5194778a3a7b899dcee5619d0610f5cf; ?>
<?php unset($__componentOriginal5194778a3a7b899dcee5619d0610f5cf); ?>
<?php endif; ?>
    <?php endif; ?>
<?php endif; ?>

<!-- INVOICE CARD START -->

<div class="card border-0 invoice">
    <!-- CARD BODY START -->
    <div class="card-body">
        <div class="invoice-table-wrapper">
            <table width="100%" class="">
                <tr class="inv-logo-heading">
                    <td><img src="<?php echo e(invoice_setting()->logo_url); ?>" alt="<?php echo e(company()->company_name); ?>"
                            id="logo" /></td>
                    <td align="right" class="font-weight-bold f-21 text-dark text-uppercase mt-4 mt-lg-0 mt-md-0">
                        <?php echo app('translator')->get('app.estimate'); ?></td>
                </tr>
                <tr class="inv-num">
                    <td class="f-14 text-dark">
                        <p class="mt-3 mb-0">
                            <?php echo e(company()->company_name); ?><br>
                            <?php if(!is_null($settings)): ?>
                                <?php echo nl2br(default_address()->address); ?><br>
                                <?php echo e(company()->company_phone); ?>

                            <?php endif; ?>
                            <?php if($invoiceSetting->show_gst == 'yes' && !is_null($invoiceSetting->gst_number)): ?>
                                <br><?php echo app('translator')->get('app.gstIn'); ?>: <?php echo e($invoiceSetting->gst_number); ?>

                            <?php endif; ?>
                        </p><br>
                    </td>
                    <td align="right">
                        <table class="inv-num-date text-dark f-13 mt-3">
                            <tr>
                                <td class="bg-light-grey border-right-0 f-w-500">
                                    <?php echo app('translator')->get('modules.estimates.estimatesNumber'); ?></td>
                                <td class="border-left-0"><?php echo e($invoice->estimate_number); ?></td>
                            </tr>
                            <tr>
                                <td class="bg-light-grey border-right-0 f-w-500">
                                    <?php echo app('translator')->get('modules.estimates.validTill'); ?></td>
                                <td class="border-left-0">
                                    <?php echo e($invoice->valid_till->translatedFormat(company()->date_format)); ?>

                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td height="20"></td>
                </tr>
            </table>
            <table width="100%">
                <tr class="inv-unpaid">
                    <td class="f-14 text-dark">
                        <?php if($invoice->client || $invoice->clientDetails): ?>
                        <p class="mb-0 text-left">
                            <span class="text-dark-grey text-capitalize">
                                <?php echo app('translator')->get("modules.invoices.billedTo"); ?>
                            </span><br>

                            <?php if($invoice->client && $invoice->client->name && invoice_setting()->show_client_name == 'yes'): ?>
                                <?php echo e($invoice->client->name_salutation); ?><br>
                            <?php endif; ?>
                            <?php if($invoice->client && $invoice->client->email && invoice_setting()->show_client_email == 'yes'): ?>
                                <?php echo e($invoice->client->email); ?><br>
                            <?php endif; ?>
                            <?php if($invoice->client && $invoice->client->mobile && invoice_setting()->show_client_phone == 'yes'): ?>
                                <?php echo e($invoice->client->mobile_with_phonecode); ?><br>
                            <?php endif; ?>
                            <?php if($invoice->clientDetails && $invoice->clientDetails->company_name && invoice_setting()->show_client_company_name == 'yes'): ?>
                                <?php echo e($invoice->clientDetails->company_name); ?><br>
                            <?php endif; ?>
                            <?php if($invoice->clientDetails && $invoice->clientDetails->address && invoice_setting()->show_client_company_address == 'yes'): ?>
                                <?php echo nl2br($invoice->clientDetails->address); ?>

                            <?php endif; ?>
                        </p>
                        <?php endif; ?>
                    </td>
                    <td align="right" class="mt-2 mt-lg-0 mt-md-0">
                        <?php if($invoice->clientDetails->company_logo): ?>
                            <img src="<?php echo e($invoice->clientDetails->image_url); ?>"
                                alt="<?php echo e($invoice->clientDetails->company_name); ?>" class="logo"
                                style="height:50px;" />
                            <br><br><br>
                        <?php endif; ?>
                        <span
                            class="unpaid <?php echo e($invoice->status == 'draft' ? 'text-primary border-primary' : ''); ?> <?php echo e($invoice->status == 'accepted' ? 'text-success border-success' : ''); ?> rounded f-15 "><?php echo app('translator')->get('modules.estimates.' . $invoice->status); ?></span>
                    </td>
                </tr>
                <tr>
                    <td height="30" colspan="2"></td>
                </tr>
            </table>
            <br><br>
            <div class="row">
                <span class="text-dark-grey text-capitalize ml-3 mb-2">
                    <?php echo app('translator')->get('modules.invoices.description'); ?>
                </span><br>
                <div class="col-sm-12 ql-editor2">
                    <?php echo $invoice->description; ?>

                </div>
            </div>
            <table width="100%" class="inv-desc d-none d-lg-table d-md-table mt-3">
                <tr>
                    <td colspan="2">
                        <table class="inv-detail f-14 table-responsive-sm" width="100%">
                            <tr class="i-d-heading bg-light-grey text-dark-grey font-weight-bold">
                                <td class="border-right-0" width="35%"><?php echo app('translator')->get('app.description'); ?></td>
                                <?php if($invoiceSetting->hsn_sac_code_show): ?>
                                    <td class="border-right-0 border-left-0" align="right"><?php echo app('translator')->get('app.hsnSac'); ?></td>
                                <?php endif; ?>
                                <td class="border-right-0 border-left-0" align="right">
                                <?php echo app('translator')->get('modules.invoices.qty'); ?>
                                </td>
                                <td class="border-right-0 border-left-0" align="right">
                                    <?php echo app('translator')->get('modules.invoices.unitPrice'); ?> (<?php echo e($invoice->currency->currency_code); ?>)
                                </td>
                                <td class="border-left-0" align="right"><?php echo app('translator')->get('modules.invoices.tax'); ?></td>
                                <td class="border-left-0" align="right">
                                    <?php echo app('translator')->get('modules.invoices.amount'); ?>
                                    (<?php echo e($invoice->currency->currency_code); ?>)</td>
                            </tr>

                            <?php $__currentLoopData = $invoice->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($item->type == 'item'): ?>
                                    <tr class="font-weight-semibold f-13">
                                        <td><?php echo e($item->item_name); ?></td>
                                        <?php if($invoiceSetting->hsn_sac_code_show): ?>
                                            <td align="right"><?php echo e($item->hsn_sac_code ? $item->hsn_sac_code : '--'); ?>

                                            </td>
                                        <?php endif; ?>
                                        <td align="right"><?php echo e($item->quantity); ?> <?php if($item->unit): ?><br><span class="f-11 text-dark-grey"><?php echo e($item->unit->unit_type); ?></span><?php endif; ?></td>
                                        <td align="right"> <?php echo e(currency_format($item->unit_price, $invoice->currency_id, false)); ?></td>
                                        <td align="right"> <?php echo e($item->tax_list); ?> </td>
                                        <td align="right"><?php echo e(currency_format($item->amount, $invoice->currency_id, false)); ?></td>
                                    </tr>
                                    <?php if($item->item_summary || $item->estimateItemImage): ?>
                                        <tr class="text-dark f-12">
                                            <td colspan="<?php echo e($invoiceSetting->hsn_sac_code_show ? '6' : '5'); ?>"" class="border-bottom-0">
                                                <?php echo nl2br(strip_tags($item->item_summary)); ?>

                                                <?php if($item->estimateItemImage): ?>
                                                    <p class="mt-2">
                                                        <a href="javascript:;" class="img-lightbox"
                                                            data-image-url="<?php echo e($item->estimateItemImage->file_url); ?>">
                                                            <img src="<?php echo e($item->estimateItemImage->file_url); ?>"
                                                                width="80" height="80" class="img-thumbnail">
                                                        </a>
                                                    </p>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <tr>
                                <td colspan="<?php echo e($invoiceSetting->hsn_sac_code_show ? '4' : '3'); ?>"
                                    class="blank-td border-bottom-0 border-left-0 border-right-0"></td>
                                <td class="p-0 border-right-0" align="right">
                                    <table width="100%">
                                        <tr class="text-dark-grey" align="right">
                                            <td class="w-50 border-top-0 border-left-0">
                                                <?php echo app('translator')->get('modules.invoices.subTotal'); ?></td>
                                        </tr>
                                        <?php if($discount != 0 && $discount != ''): ?>
                                            <tr class="text-dark-grey" align="right">
                                                <td class="w-50 border-top-0 border-left-0">
                                                    <?php echo app('translator')->get('modules.invoices.discount'); ?></td>
                                            </tr>
                                        <?php endif; ?>
                                        <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr class="text-dark-grey" align="right">
                                                <td class="w-50 border-top-0 border-left-0">
                                                    <?php echo e($key); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="bg-light-grey text-dark f-w-500 f-16" align="right">
                                            <td class="w-50 border-bottom-0 border-left-0">
                                                <?php echo app('translator')->get('modules.invoices.total'); ?></td>
                                        </tr>
                                    </table>
                                </td>
                                <td class="p-0 border-left-0" align="right">
                                    <table width="100%">
                                        <tr class="text-dark-grey" align="right">
                                            <td class="border-top-0 border-right-0">
                                                <?php echo e(currency_format($invoice->sub_total, $invoice->currency_id, false)); ?>

                                            </td>
                                        </tr>
                                        <?php if($discount != 0 && $discount != ''): ?>
                                            <tr class="text-dark-grey" align="right">
                                                <td class="border-top-0 border-right-0">
                                                    <?php echo e(currency_format($discount, $invoice->currency_id, false)); ?></td>
                                            </tr>
                                        <?php endif; ?>
                                        <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr class="text-dark-grey" align="right">
                                                <td class="border-top-0 border-right-0">
                                                    <?php echo e(currency_format($tax, $invoice->currency_id, false)); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="bg-light-grey text-dark f-w-500 f-16" align="right">
                                            <td class="border-bottom-0 border-right-0">
                                                <?php echo e(currency_format($invoice->total, $invoice->currency_id, false)); ?>

                                                <?php echo e($invoice->currency->currency_code); ?></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>

                </tr>
            </table>
            <table width="100%" class="inv-desc-mob d-block d-lg-none d-md-none">

                <?php $__currentLoopData = $invoice->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($item->type == 'item'): ?>
                        <tr>
                            <th width="50%" class="bg-light-grey text-dark-grey font-weight-bold">
                                <?php echo app('translator')->get('app.description'); ?></th>
                            <td class="p-0 ">
                                <table>
                                    <tr width="100%" class="font-weight-semibold f-13">
                                        <td class="border-left-0 border-right-0 border-top-0">
                                            <?php echo e($item->item_name); ?></td>
                                    </tr>
                                    <?php if($item->item_summary != '' || $item->estimateItemImage): ?>
                                        <tr>
                                            <td class="border-left-0 border-right-0 border-bottom-0 f-12">
                                                <?php echo nl2br(strip_tags($item->item_summary)); ?>

                                                <?php if($item->estimateItemImage): ?>
                                                    <p class="mt-2">
                                                        <a href="javascript:;" class="img-lightbox"
                                                            data-image-url="<?php echo e($item->estimateItemImage->file_url); ?>">
                                                            <img src="<?php echo e($item->estimateItemImage->file_url); ?>"
                                                                width="80" height="80" class="img-thumbnail">
                                                        </a>
                                                    </p>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <th width="50%" class="bg-light-grey text-dark-grey font-weight-bold">
                                <?php echo app('translator')->get('modules.invoices.qty'); ?></th>
                            <td width="50%"><?php echo e($item->quantity); ?> <?php if($item->unit): ?><br><span class="f-11 text-dark-grey"><?php echo e($item->unit->unit_type); ?></span><?php endif; ?></td>
                        </tr>
                        <tr>
                            <th width="50%" class="bg-light-grey text-dark-grey font-weight-bold">
                                <?php echo app('translator')->get('modules.invoices.unitPrice'); ?>
                                (<?php echo e($invoice->currency->currency_code); ?>)</th>
                            <td width="50%"><?php echo e(currency_format($item->unit_price, $invoice->currency_id, false)); ?>

                            </td>
                        </tr>
                        <tr>
                            <th width="50%" class="bg-light-grey text-dark-grey font-weight-bold">
                                <?php echo app('translator')->get('modules.invoices.amount'); ?>
                                (<?php echo e($invoice->currency->currency_code); ?>)</th>
                            <td width="50%"><?php echo e(currency_format($item->amount, $invoice->currency_id, false)); ?></td>
                        </tr>
                        <tr>
                            <td height="3" class="p-0 " colspan="2"></td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <tr>
                    <th width="50%" class="text-dark-grey font-weight-normal"><?php echo app('translator')->get('modules.invoices.subTotal'); ?>
                    </th>
                    <td width="50%" class="text-dark-grey font-weight-normal">
                        <?php echo e(currency_format($item->sub_total, $invoice->currency_id, false)); ?></td>
                </tr>
                <?php if($discount != 0 && $discount != ''): ?>
                    <tr>
                        <th width="50%" class="text-dark-grey font-weight-normal"><?php echo app('translator')->get('modules.invoices.discount'); ?>
                        </th>
                        <td width="50%" class="text-dark-grey font-weight-normal">
                            <?php echo e(currency_format($discount, $invoice->currency_id, false)); ?></td>
                    </tr>
                <?php endif; ?>

                <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th width="50%" class="text-dark-grey font-weight-normal"><?php echo e($key); ?></th>
                        <td width="50%" class="text-dark-grey font-weight-normal">
                            <?php echo e(currency_format($tax, $invoice->currency_id, false)); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <th width="50%" class="text-dark-grey font-weight-bold"><?php echo app('translator')->get('modules.invoices.total'); ?></th>
                    <td width="50%" class="text-dark-grey font-weight-bold">
                        <?php echo e(currency_format($invoice->total, $invoice->currency_id, false)); ?></td>
                </tr>
            </table>
            <table class="inv-note">
                <tr>
                    <td height="30" colspan="2"></td>
                </tr>
                <tr>
                    <td style="vertical-align: text-top">
                        <table>
                            <tr><?php echo app('translator')->get('app.note'); ?></tr>
                            <tr>
                                <p class="text-dark-grey"><?php echo !empty($invoice->note) ? nl2br($invoice->note) : '--'; ?></p>
                            </tr>
                        </table>
                    </td>
                    <td align="right">
                        <table>
                            <tr><?php echo app('translator')->get('modules.invoiceSettings.invoiceTerms'); ?></tr>
                            <tr>
                                <p class="text-dark-grey"><?php echo nl2br($invoiceSetting->invoice_terms); ?></p>
                            </tr>
                        </table>
                    </td>
                </tr>
                <?php if(isset($invoiceSetting->other_info)): ?>
                    <tr>
                        <td align="vertical-align: text-top">
                            <table>
                                <tr>
                                    <p class="text-dark-grey"><?php echo nl2br($invoiceSetting->other_info); ?>

                                    </p>
                                </tr>
                            </table>
                        </td>
                    </tr>
                <?php endif; ?>
                <?php if(isset($taxes) && invoice_setting()->tax_calculation_msg == 1): ?>
                    <tr>
                        <td>
                            <p class="text-dark-grey">
                                <?php if($invoice->calculate_tax == 'after_discount'): ?>
                                    <?php echo app('translator')->get('messages.calculateTaxAfterDiscount'); ?>
                                <?php else: ?>
                                    <?php echo app('translator')->get('messages.calculateTaxBeforeDiscount'); ?>
                                <?php endif; ?>
                            </p>
                        </td>
                    </tr>
                <?php endif; ?>
            </table>
        </div>

        <?php if($invoice->sign): ?>
            <div class="row">
                <div class="col-sm-12 mt-4">
                    <h6><?php echo app('translator')->get('modules.estimates.signature'); ?></h6>
                    <img src="<?php echo e($invoice->sign->signature); ?>" style="width: 200px;">
                    <p>(<?php echo e($invoice->sign->full_name); ?>)</p>
                </div>
            </div>
        <?php endif; ?>

    </div>
    <!-- CARD BODY END -->
    <!-- CARD FOOTER START -->
    <div class="card-footer bg-white border-0 d-flex justify-content-start py-0 py-lg-4 py-md-4 mb-4 mb-lg-3 mb-md-3 ">

        <div class="d-flex">
            <div class="inv-action dropup">
                <button class="dropdown-toggle btn-secondary" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo app('translator')->get('app.action'); ?>
                    <span><i class="fa fa-chevron-up f-15 text-dark-grey"></i></span>
                </button>
                <!-- DROPDOWN - INFORMATION -->
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" tabindex="0">
                    <?php if($invoice->status == 'waiting' && $invoice->client_id == user()->id): ?>
                        <li>
                            <a class="dropdown-item f-14 text-dark" data-toggle="modal"
                                data-target="#signature-modal" href="javascript:;">
                                <i class="fa fa-check f-w-500 mr-2 f-11"></i> <?php echo app('translator')->get('app.accept'); ?>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item f-14 text-dark" id="decline-estimate" href="javascript:;">
                                <i class="fa fa-times f-w-500 mr-2 f-11"></i> <?php echo app('translator')->get('app.decline'); ?>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if($invoice->status == 'waiting' || $invoice->status == 'draft'): ?>
                        <?php if(
                            $editEstimatePermission == 'all' ||
                                ($editEstimatePermission == 'added' && $invoice->added_by == user()->id) ||
                                ($editEstimatePermission == 'owned' && $invoice->client_id == user()->id) ||
                                ($editEstimatePermission == 'both' && ($invoice->client_id == user()->id || $invoice->added_by == user()->id))): ?>
                            <li>
                                <a class="dropdown-item openRightModal"
                                    href="<?php echo e(route('estimates.edit', [$invoice->id])); ?>">
                                    <i class="fa fa-edit f-w-500 mr-2 f-11"></i> <?php echo app('translator')->get('app.edit'); ?>
                                </a>
                            </li>
                        <?php endif; ?>
                        <li>
                            <a class="dropdown-item btn-copy"
                                data-clipboard-text="<?php echo e(url()->temporarySignedRoute('front.estimate.show', now()->addDays(\App\Models\GlobalSetting::SIGNED_ROUTE_EXPIRY), $invoice->hash)); ?>">
                                <i class="fa fa-copy mr-2"></i> <?php echo app('translator')->get('modules.estimates.copyLink'); ?></a>
                        </li>
                        <?php if($invoice->status != 'canceled' && $invoice->status != 'accepted' && !in_array('client', user_roles())): ?>
                            <li>
                                <a href="javascript:;" data-toggle="tooltip" data-estimate-id="<?php echo e($invoice->id); ?>"
                                    class="dropdown-item sendButton"><i class="fa fa-paper-plane mr-2"></i>
                                    <?php echo app('translator')->get('app.send'); ?></a>
                            </li>
                        <?php endif; ?>
                        <li>

                            <a class="dropdown-item f-14 text-dark"
                                href="<?php echo e(route('estimates.download', [$invoice->id])); ?>">
                                <i class="fa fa-download f-w-500 mr-2 f-11"></i> <?php echo app('translator')->get('app.download'); ?>
                            </a>
                        </li>
                        <?php if($invoice->status == 'waiting'): ?>
                            <?php if($addInvoicePermission == 'all' || $addInvoicePermission == 'added'): ?>
                                <li>
                                    <a class="dropdown-item"
                                        href="<?php echo e(route('invoices.create') . '?estimate=' . $invoice->id); ?>">
                                        <i class="fa fa-plus f-w-500 mr-2 f-11"></i> <?php echo app('translator')->get('app.create'); ?>
                                        <?php echo app('translator')->get('app.invoice'); ?>
                                    </a>
                                </li>
                            <?php endif; ?>

                            <?php if($editEstimatePermission == 'all' || ($editEstimatePermission == 'added' && $invoice->added_by == user()->id)): ?>
                                <li>
                                    <a class="dropdown-item change-status" href="javascript:;"
                                        data-estimate-id="<?php echo e($invoice->id); ?>">
                                        <i class="fa fa-times f-w-500 mr-2 f-11"></i> <?php echo app('translator')->get('app.cancelEstimate'); ?>
                                    </a>
                                </li>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endif; ?>
                    <?php if($addEstimatePermission == 'all' || $addEstimatePermission == 'added'): ?>
                        <li>
                            <a href="<?php echo e(route('estimates.create') . '?estimate=' . $invoice->id); ?>"
                                class="dropdown-item"><i class="fa fa-copy mr-2"></i> <?php echo app('translator')->get('app.createDuplicate'); ?>
                                </a>
                        </li>
                    <?php endif; ?>
                    <?php if($firstEstimate->id == $invoice->id): ?>
                        <?php if(
                            $deleteEstimatePermission == 'all' ||
                                ($deleteEstimatePermission == 'added' && $invoice->added_by == user()->id) ||
                                ($deleteEstimatePermission == 'owned' && $invoice->client_id == user()->id) ||
                                ($deleteEstimatePermission == 'both' &&
                                    ($invoice->client_id == user()->id || $invoice->added_by == user()->id))): ?>
                            <li>
                                <a class="dropdown-item delete-table-row" href="javascript:;"
                                    data-estimate-id="<?php echo e($invoice->id); ?>">
                                    <i class="fa fa-trash mr-2"></i><?php echo app('translator')->get('app.delete'); ?>
                                </a>
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>
                </ul>
            </div>

            <?php if (isset($component)) { $__componentOriginalc35c79ed7e812580313ad04118477974 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc35c79ed7e812580313ad04118477974 = $attributes; } ?>
<?php $component = App\View\Components\Forms\ButtonCancel::resolve(['link' => route('estimates.index')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-cancel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonCancel::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'border-0 ml-3']); ?><?php echo app('translator')->get('app.cancel'); ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc35c79ed7e812580313ad04118477974)): ?>
<?php $attributes = $__attributesOriginalc35c79ed7e812580313ad04118477974; ?>
<?php unset($__attributesOriginalc35c79ed7e812580313ad04118477974); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc35c79ed7e812580313ad04118477974)): ?>
<?php $component = $__componentOriginalc35c79ed7e812580313ad04118477974; ?>
<?php unset($__componentOriginalc35c79ed7e812580313ad04118477974); ?>
<?php endif; ?>

        </div>
    </div>
    <!-- CARD FOOTER END -->
</div>
<!-- INVOICE CARD END -->


<?php if(isset($fields) && count($fields) > 0): ?>
    <div class="row mt-4">
        <!-- TASK STATUS START -->
        <div class="col-md-12">
            <?php if (isset($component)) { $__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9 = $attributes; } ?>
<?php $component = App\View\Components\Cards\Data::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Data::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <h5 class="mb-3"> <?php echo app('translator')->get('modules.projects.otherInfo'); ?></h5>
                <?php if (isset($component)) { $__componentOriginalc7faf3da9dd03559633827985b4aafa9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc7faf3da9dd03559633827985b4aafa9 = $attributes; } ?>
<?php $component = App\View\Components\Forms\CustomFieldShow::resolve(['fields' => $fields,'model' => $invoice] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.custom-field-show'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\CustomFieldShow::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc7faf3da9dd03559633827985b4aafa9)): ?>
<?php $attributes = $__attributesOriginalc7faf3da9dd03559633827985b4aafa9; ?>
<?php unset($__attributesOriginalc7faf3da9dd03559633827985b4aafa9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc7faf3da9dd03559633827985b4aafa9)): ?>
<?php $component = $__componentOriginalc7faf3da9dd03559633827985b4aafa9; ?>
<?php unset($__componentOriginalc7faf3da9dd03559633827985b4aafa9); ?>
<?php endif; ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9)): ?>
<?php $attributes = $__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9; ?>
<?php unset($__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9)): ?>
<?php $component = $__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9; ?>
<?php unset($__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9); ?>
<?php endif; ?>
        </div>
    </div>
<?php endif; ?>


<div id="signature-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog d-flex justify-content-center align-items-center modal-xl">
        <div class="modal-content">
            <?php echo $__env->make('estimates.ajax.accept-estimate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</div>
<?php if(count($invoice->files) > 0): ?>
    <div class="bg-white mt-4 pl-3 pt-3">
        <h5><?php echo e(__('modules.invoiceFiles')); ?></h5>
        <div class="d-flex flex-wrap" id="estimates-file-list">
            <?php $__empty_1 = true; $__currentLoopData = $invoice->files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <?php if (isset($component)) { $__componentOriginalcc3eadf431dc104666da55af50a04915 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcc3eadf431dc104666da55af50a04915 = $attributes; } ?>
<?php $component = App\View\Components\FileCard::resolve(['fileName' => $file->filename,'dateAdded' => $file->created_at->diffForHumans()] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('file-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\FileCard::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                    <?php if($file->icon == 'images'): ?>
                        <img src="<?php echo e($file->file_url); ?>">
                    <?php else: ?>
                        <i class="fa <?php echo e($file->icon); ?> text-lightest"></i>
                    <?php endif; ?>

                   
                         <?php $__env->slot('action', null, []); ?> 
                            <div class="dropdown ml-auto file-action">
                                <button
                                    class="btn btn-lg f-14 p-0 text-lightest text-capitalize rounded  dropdown-toggle"
                                    type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-h"></i>
                                </button>

                                <div class="dropdown-menu dropdown-menu-right border-grey rounded b-shadow-4 p-0"
                                     aria-labelledby="dropdownMenuLink" tabindex="0">
                                   
                                        <?php if($file->icon = 'images'): ?>
                                            <a class="cursor-pointer d-block text-dark-grey f-13 pt-3 px-3 "
                                               target="_blank"
                                               href="<?php echo e($file->file_url); ?>"><?php echo app('translator')->get('app.view'); ?></a>
                                        <?php endif; ?>
                                        <a class="cursor-pointer d-block text-dark-grey f-13 py-3 px-3 "
                                           href="<?php echo e(route('client-estimates-files.download', md5($file->id))); ?>"><?php echo app('translator')->get('app.download'); ?></a>
                                 

                                   
                                        <a class="cursor-pointer d-block text-dark-grey f-13 pb-3 px-3 delete-file"
                                           data-row-id="<?php echo e($file->id); ?>" href="javascript:;"><?php echo app('translator')->get('app.delete'); ?></a>
                                   
                                </div>
                            </div>
                         <?php $__env->endSlot(); ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcc3eadf431dc104666da55af50a04915)): ?>
<?php $attributes = $__attributesOriginalcc3eadf431dc104666da55af50a04915; ?>
<?php unset($__attributesOriginalcc3eadf431dc104666da55af50a04915); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcc3eadf431dc104666da55af50a04915)): ?>
<?php $component = $__componentOriginalcc3eadf431dc104666da55af50a04915; ?>
<?php unset($__componentOriginalcc3eadf431dc104666da55af50a04915); ?>
<?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <?php if (isset($component)) { $__componentOriginal269164c77d9d34462c34359c03da6a68 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal269164c77d9d34462c34359c03da6a68 = $attributes; } ?>
<?php $component = App\View\Components\Cards\NoRecord::resolve(['message' => __('messages.noFileUploaded'),'icon' => 'file'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.no-record'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\NoRecord::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal269164c77d9d34462c34359c03da6a68)): ?>
<?php $attributes = $__attributesOriginal269164c77d9d34462c34359c03da6a68; ?>
<?php unset($__attributesOriginal269164c77d9d34462c34359c03da6a68); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal269164c77d9d34462c34359c03da6a68)): ?>
<?php $component = $__componentOriginal269164c77d9d34462c34359c03da6a68; ?>
<?php unset($__componentOriginal269164c77d9d34462c34359c03da6a68); ?>
<?php endif; ?>
            <?php endif; ?>

        </div>
    </div>
<?php endif; ?>


<?php $__env->startPush('scripts'); ?>
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
    <script>
        var canvas = document.getElementById('signature-pad');

        var signaturePad = new SignaturePad(canvas, {
            backgroundColor: 'rgb(255, 255, 255)' // necessary for saving image as JPEG; can be removed is only saving as PNG or SVG
        });

        document.getElementById('clear-signature').addEventListener('click', function(e) {
            e.preventDefault();
            signaturePad.clear();
        });

        document.getElementById('undo-signature').addEventListener('click', function(e) {
            e.preventDefault();
            var data = signaturePad.toData();
            if (data) {
                data.pop(); // remove the last dot or line
                signaturePad.fromData(data);
            }
        });

        $('body').on('click', '.change-status', function() {
            var id = $(this).data('estimate-id');
            Swal.fire({
                title: "<?php echo app('translator')->get('messages.sweetAlertTitle'); ?>",
                text: "<?php echo app('translator')->get('messages.estimateCancelText'); ?>",
                icon: 'warning',
                showCancelButton: true,
                focusConfirm: false,
                confirmButtonText: "<?php echo app('translator')->get('messages.confirmCancel'); ?>",
                cancelButtonText: "<?php echo app('translator')->get('app.cancel'); ?>",
                customClass: {
                    confirmButton: 'btn btn-primary mr-3',
                    cancelButton: 'btn btn-secondary'
                },
                showClass: {
                    popup: 'swal2-noanimation',
                    backdrop: 'swal2-noanimation'
                },
                buttonsStyling: false
            }).then((result) => {
                if (result.isConfirmed) {
                    var url = "<?php echo e(route('estimates.change_status', ':id')); ?>";
                    url = url.replace(':id', id);

                    var token = "<?php echo e(csrf_token()); ?>";

                    $.easyAjax({
                        type: 'GET',
                        url: url,
                        container: '#invoices-table',
                        blockUI: true,
                        success: function(response) {
                            if (response.status == "success") {
                                window.location.reload();
                            }
                        }
                    });
                }
            });
        });

        $('#decline-estimate').click(function() {
            $.easyAjax({
                type: 'POST',
                url: "<?php echo e(route('estimates.decline', $invoice->id)); ?>",
                blockUI: true,
                data: {
                    _token: '<?php echo e(csrf_token()); ?>'
                },
                success: function(response) {
                    if (response.status == 'success') {
                        window.location.reload();
                    }
                }
            })
        });

        $('#toggle-pad-uploader').click(function() {
            var text = $('.signature').hasClass('d-none') ? '<?php echo e(__('modules.estimates.uploadSignature')); ?>' :
                '<?php echo e(__('app.sign')); ?>';

            $(this).html(text);

            $('.signature').toggleClass('d-none');
            $('.upload-image').toggleClass('d-none');
        });

        $('#save-signature').click(function() {
            var first_name = $('#first_name').val();
            var last_name = $('#last_name').val();
            var email = $('#email').val();
            var signature = signaturePad.toDataURL('image/png');

            var image = $('#image').val();

            // this parameter is used for type of signature used and will be used on validation and upload signature image
            var signature_type = !$('.signature').hasClass('d-none') ? 'signature' : 'upload';

            if (signaturePad.isEmpty() && !$('.signature').hasClass('d-none')) {
                Swal.fire({
                    icon: 'error',
                    text: '<?php echo e(__('messages.signatureRequired')); ?>',

                    customClass: {
                        confirmButton: 'btn btn-primary',
                    },
                    showClass: {
                        popup: 'swal2-noanimation',
                        backdrop: 'swal2-noanimation'
                    },
                    buttonsStyling: false
                });
                return false;
            }


            $.easyAjax({
                url: "<?php echo e(route('estimates.accept', $invoice->id)); ?>",
                container: '#acceptEstimate',
                type: "POST",
                blockUI: true,
                file: true,
                disableButton: true,
                buttonSelector: '#save-signature',
                data: {
                    first_name: first_name,
                    last_name: last_name,
                    email: email,
                    signature: signature,
                    image: image,
                    signature_type: signature_type,
                    _token: '<?php echo e(csrf_token()); ?>'
                },
            })
        });

        $('body').on('click', '.sendButton', function() {
            var id = $(this).data('estimate-id');
            var url = "<?php echo e(route('estimates.send_estimate', ':id')); ?>";
            url = url.replace(':id', id);

            var token = "<?php echo e(csrf_token()); ?>";

            $.easyAjax({
                type: 'POST',
                url: url,
                container: '#invoices-table',
                blockUI: true,
                data: {
                    '_token': token
                },
                success: function(response) {
                    if (response.status == "success") {
                        window.LaravelDataTables["invoices-table"].draw(false);
                    }
                }
            });
        });

        var clipboard = new ClipboardJS('.btn-copy');

        clipboard.on('success', function(e) {
            Swal.fire({
                icon: 'success',
                text: '<?php echo app('translator')->get('app.copied'); ?>',
                toast: true,
                position: 'top-end',
                timer: 3000,
                timerProgressBar: true,
                showConfirmButton: false,
                customClass: {
                    confirmButton: 'btn btn-primary',
                },
                showClass: {
                    popup: 'swal2-noanimation',
                    backdrop: 'swal2-noanimation'
                },
            })
        });

        $('body').on('click', '.delete-table-row', function() {
            var id = $(this).data('estimate-id');

            Swal.fire({
                title: "<?php echo app('translator')->get('messages.sweetAlertTitle'); ?>",
                text: "<?php echo app('translator')->get('messages.recoverRecord'); ?>",
                icon: 'warning',
                showCancelButton: true,
                focusConfirm: false,
                confirmButtonText: "<?php echo app('translator')->get('messages.confirmDelete'); ?>",
                cancelButtonText: "<?php echo app('translator')->get('app.cancel'); ?>",
                customClass: {
                    confirmButton: 'btn btn-primary mr-3',
                    cancelButton: 'btn btn-secondary'
                },
                showClass: {
                    popup: 'swal2-noanimation',
                    backdrop: 'swal2-noanimation'
                },
                buttonsStyling: false
            }).then((result) => {
                if (result.isConfirmed) {
                    var url = "<?php echo e(route('estimates.destroy', ':id')); ?>";
                    url = url.replace(':id', id);

                    var token = "<?php echo e(csrf_token()); ?>";

                    $.easyAjax({
                        type: 'POST',
                        url: url,
                        blockUI: true,
                        data: {
                            '_token': token,
                            '_method': 'DELETE'
                        },
                        success: function(response) {
                            if (response.status == "success") {
                                window.location.href = "<?php echo e(route('estimates.index')); ?>";
                            }
                        }
                    });
                }
            });
        });
        $('body').on('click', '.delete-file', function () {
        let id = $(this).data('row-id');
        Swal.fire({
            title: "<?php echo app('translator')->get('messages.sweetAlertTitle'); ?>",
            text: "<?php echo app('translator')->get('messages.recoverRecord'); ?>",
            icon: 'warning',
            showCancelButton: true,
            focusConfirm: false,
            confirmButtonText: "<?php echo app('translator')->get('messages.confirmDelete'); ?>",
            cancelButtonText: "<?php echo app('translator')->get('app.cancel'); ?>",
            customClass: {
                confirmButton: 'btn btn-primary mr-3',
                cancelButton: 'btn btn-secondary'
            },
            showClass: {
                popup: 'swal2-noanimation',
                backdrop: 'swal2-noanimation'
            },
            buttonsStyling: false
        }).then((result) => {
            if (result.isConfirmed) {
                var url = "<?php echo e(route('client-estimates-files.destroy', ':id')); ?>";
                url = url.replace(':id', id);

                var token = "<?php echo e(csrf_token()); ?>";

                $.easyAjax({
                    type: 'POST',
                    url: url,
                    data: {
                        '_token': token,
                        '_method': 'DELETE'
                    },
                    success: function(response) {
                        if (response.status == "success") {
                            window.location.reload();
                        }
                    }
                });
            }
        });
    });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\estimates\ajax\show.blade.php ENDPATH**/ ?>