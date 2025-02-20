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

    .mt{
        margin-top: -8px;
    }

    .ml{
    padding: 8px!important;
    border-radius: 4px;
    margin-top: -9px!important
}

</style>

<!-- INVOICE CARD START -->

<div class="card border-0 invoice">
    <!-- CARD BODY START -->
    <div class="card-body">
        <div class="invoice-table-wrapper">
            <table width="100%" class="">
                <tr class="inv-logo-heading">
                    <td><img src="<?php echo e(invoice_setting()->logo_url); ?>" alt="<?php echo e(global_setting()->company_name); ?>"
                            id="logo" /></td>
                    <td align="right" class="font-weight-bold f-21 text-dark text-uppercase mt-4 mt-lg-0 mt-md-0">
                        <?php echo app('translator')->get('modules.proposal.proposalTemplate'); ?></td>
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
                                    <?php echo app('translator')->get('modules.lead.proposalTemplate'); ?></td>
                                <td class="border-left-0">#<?php echo e($invoice->id); ?></td>
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
                        <?php if($invoice->lead && ($invoice->lead->client_name || $invoice->lead->client_email || $invoice->lead->mobile || $invoice->lead->company_name || $invoice->lead->address) && (invoice_setting()->show_client_name == 'yes' || invoice_setting()->show_client_email == 'yes' || invoice_setting()->show_client_phone == 'yes' || invoice_setting()->show_client_company_name == 'yes' || invoice_setting()->show_client_company_address == 'yes')): ?>
                        <p class="mb-0 text-left">
                            <span class="text-dark-grey text-capitalize">
                                <?php echo app('translator')->get("modules.invoices.billedTo"); ?>
                            </span><br>

                            <?php if($invoice->lead && $invoice->lead->client_name && invoice_setting()->show_client_name == 'yes'): ?>
                                <?php echo e($invoice->lead->client_name_salutation); ?><br>
                            <?php endif; ?>
                            <?php if($invoice->lead && $invoice->lead->client_email && invoice_setting()->show_client_email == 'yes'): ?>
                                <?php echo e($invoice->lead->client_email); ?><br>
                            <?php endif; ?>
                            <?php if($invoice->lead && $invoice->lead->mobile && invoice_setting()->show_client_phone == 'yes'): ?>
                                <?php echo e($invoice->lead->mobile); ?><br>
                            <?php endif; ?>
                            <?php if($invoice->lead && $invoice->lead->company_name && invoice_setting()->show_client_company_name == 'yes'): ?>
                                <?php echo e($invoice->lead->company_name); ?><br>
                            <?php endif; ?>
                            <?php if($invoice->lead && $invoice->lead->address && invoice_setting()->show_client_company_address == 'yes'): ?>
                                <?php echo nl2br($invoice->lead->address); ?>

                            <?php endif; ?>
                        </p>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td height="30" colspan="2"></td>
                </tr>
            </table>
            <div class="row">
                <div class="col-sm-12 ql-editor">
                    <?php echo $invoice->description; ?>

                </div>
            </div>
            <table width="100%" class="inv-desc d-none d-lg-table d-md-table">
                <tr>
                    <td colspan="2">
                        <table class="inv-detail f-14 table-responsive-sm" width="100%">
                            <tr class="i-d-heading bg-light-grey text-dark-grey font-weight-bold">
                                <td class="border-right-0" width="35%"><?php echo app('translator')->get('app.description'); ?></td>
                                <?php if($invoiceSetting->hsn_sac_code_show == 1): ?>
                                    <td class="border-right-0 border-left-0" align="right"><?php echo app('translator')->get("app.hsnSac"); ?></td>
                                <?php endif; ?>
                                <td class="border-right-0 border-left-0" align="right"><?php echo app('translator')->get('modules.invoices.qty'); ?></td>
                                <td class="border-right-0 border-left-0" align="right">
                                    <?php echo app('translator')->get("modules.invoices.unitPrice"); ?> (<?php echo e($invoice->currency->currency_code); ?>)
                                </td>
                                <td class="border-right-0 border-left-0" align="right">
                                    <?php echo app('translator')->get("modules.invoices.tax"); ?>
                                </td>
                                <td class="border-left-0" align="right">
                                    <?php echo app('translator')->get("modules.invoices.amount"); ?>
                                    (<?php echo e($invoice->currency->currency_code); ?>)</td>
                            </tr>
                            <?php $__currentLoopData = $invoice->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($item->type == 'item'): ?>
                                    <tr class="text-dark font-weight-semibold f-13">
                                        <td><?php echo e($item->item_name); ?></td>
                                        <?php if($invoiceSetting->hsn_sac_code_show == 1): ?>
                                            <td align="right"><?php echo e($item->hsn_sac_code); ?></td>
                                        <?php endif; ?>
                                        <td align="right"><?php echo e($item->quantity); ?><?php if($item->unit): ?><br><span class="f-11 text-dark-grey"><?php echo e($item->unit->unit_type); ?></span><?php endif; ?></td>
                                        <td align="right">
                                            <?php echo e(currency_format($item->unit_price, $invoice->currency_id, false)); ?>

                                        </td>
                                        <td align="right">
                                            <?php echo e($item->tax_list); ?>

                                        </td>
                                        <td align="right"><?php echo e(currency_format($item->amount, $invoice->currency_id, false)); ?>

                                        </td>
                                    </tr>
                                    <?php if($item->item_summary || $item->proposalTemplateItemImage): ?>
                                        <tr class="text-dark f-12">
                                            <td colspan="6" class="border-bottom-0">
                                                <?php echo nl2br(strip_tags($item->item_summary)); ?>

                                                <?php if($item->proposalTemplateItemImage): ?>
                                                    <p class="mt-2">
                                                        <a href="javascript:;" class="img-lightbox" data-image-url="<?php echo e($item->proposalTemplateItemImage->file_url); ?>">
                                                            <img src="<?php echo e($item->proposalTemplateItemImage->file_url); ?>" width="80" height="80" class="img-thumbnail">
                                                        </a>
                                                    </p>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <tr>
                                <td colspan="<?php echo e($invoiceSetting->hsn_sac_code_show ? '4' : '3'); ?>" class="blank-td border-bottom-0 border-left-0 border-right-0"></td>
                                <td class="p-0 border-right-0" align="right">
                                    <table width="100%">
                                        <tr class="text-dark-grey" align="right">
                                            <td class="w-50 border-top-0 border-left-0">
                                                <?php echo app('translator')->get("modules.invoices.subTotal"); ?></td>
                                        </tr>
                                        <?php if($discount != 0 && $discount != ''): ?>
                                            <tr class="text-dark-grey" align="right">
                                                <td class="w-50 border-top-0 border-left-0">
                                                    <?php echo app('translator')->get("modules.invoices.discount"); ?></td>
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
                                                <?php echo app('translator')->get("modules.invoices.total"); ?></td>
                                        </tr>
                                    </table>
                                </td>
                                <td class="p-0 border-right-0" align="right">
                                    <table width="100%">
                                        <tr class="text-dark-grey" align="right">
                                            <td class="border-top-0 border-left-0">
                                                <?php echo e(currency_format($invoice->sub_total, $invoice->currency_id, false)); ?></td>
                                        </tr>
                                        <?php if($discount != 0 && $discount != ''): ?>
                                            <tr class="text-dark-grey" align="right">
                                                <td class="border-top-0 border-left-0">
                                                    <?php echo e(currency_format($discount, $invoice->currency_id, false)); ?></td>
                                            </tr>
                                        <?php endif; ?>
                                        <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr class="text-dark-grey" align="right">
                                                <td class="border-top-0 border-left-0">
                                                    <?php echo e(currency_format($tax, $invoice->currency_id, false)); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="bg-light-grey text-dark f-w-500 f-16" align="right">
                                            <td class="border-bottom-0 border-left-0">
                                                <?php echo e(currency_format($invoice->total, $invoice->currency_id, false)); ?></td>
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
                                    <?php if($item->item_summary != '' || $item->proposalTemplateItemImage): ?>
                                        <tr>
                                            <td class="border-left-0 border-right-0 border-bottom-0 f-12">
                                                <?php echo nl2br(strip_tags($item->item_summary)); ?>

                                                <?php if($item->proposalTemplateItemImage): ?>
                                                    <p class="mt-2">
                                                        <a href="javascript:;" class="img-lightbox" data-image-url="<?php echo e($item->proposalTemplateItemImage->file_url); ?>">
                                                            <img src="<?php echo e($item->proposalTemplateItemImage->file_url); ?>" width="80" height="80" class="img-thumbnail">
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
                                <?php echo app('translator')->get('modules.invoices.qty'); ?>
                            </th>
                            <td width="50%"><?php echo e($item->quantity); ?><?php if($item->unit): ?><br><span class="f-11 text-dark-grey"><?php echo e($item->unit->unit_type); ?></span><?php endif; ?></td>
                        </tr>
                        <tr>
                            <th width="50%" class="bg-light-grey text-dark-grey font-weight-bold">
                                <?php echo app('translator')->get("modules.invoices.unitPrice"); ?>
                                (<?php echo e($invoice->currency->currency_code); ?>)</th>
                            <td width="50%"><?php echo e(currency_format($item->unit_price, $invoice->currency_id, false)); ?></td>
                        </tr>
                        <tr>
                            <th width="50%" class="bg-light-grey text-dark-grey font-weight-bold">
                                <?php echo app('translator')->get("modules.invoices.amount"); ?>
                                (<?php echo e($invoice->currency->currency_code); ?>)</th>
                            <td width="50%"><?php echo e(currency_format($item->amount, $invoice->currency_id, false)); ?></td>
                        </tr>
                        <tr>
                            <td height="3" class="p-0 " colspan="2"></td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <tr>
                    <th width="50%" class="text-dark-grey font-weight-normal"><?php echo app('translator')->get("modules.invoices.subTotal"); ?>
                    </th>
                    <td width="50%" class="text-dark-grey font-weight-normal">
                        <?php echo e(currency_format($invoice->sub_total, $invoice->currency_id, false)); ?></td>
                </tr>
                <?php if($discount != 0 && $discount != ''): ?>
                    <tr>
                        <th width="50%" class="text-dark-grey font-weight-normal"><?php echo app('translator')->get("modules.invoices.discount"); ?>
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
                    <th width="50%" class="text-dark-grey font-weight-bold"><?php echo app('translator')->get("modules.invoices.total"); ?></th>
                    <td width="50%" class="text-dark-grey font-weight-bold">
                        <?php echo e(currency_format( $invoice->total, $invoice->currency_id, false)); ?></td>
                </tr>
            </table>
            <table class="inv-note">
                <tr>
                    <td height="30" colspan="2"></td>
                </tr>
                <tr>
                    <td align="right">
                        <table>
                            <tr><?php echo app('translator')->get('modules.invoiceSettings.invoiceTerms'); ?></tr>
                            <tr>
                                <p class="text-dark-grey"><?php echo nl2br($invoiceSetting->invoice_terms); ?></p>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php if(isset($taxes) && invoice_setting()->tax_calculation_msg == 1): ?>
                            <p class="text-dark-grey">
                                <?php if($invoice->calculate_tax == 'after_discount'): ?>
                                    <?php echo app('translator')->get('messages.calculateTaxAfterDiscount'); ?>
                                <?php else: ?>
                                    <?php echo app('translator')->get('messages.calculateTaxBeforeDiscount'); ?>
                                <?php endif; ?>
                            </p>
                        <?php endif; ?>
                    </td>
                </tr>
            </table>
        </div>

        <?php if($invoice->signature): ?>
            <div class="row">
                <div class="col-sm-12 mt-4">
                    <?php if(!is_null($invoice->signature->signature)): ?>
                        <img src="<?php echo e($invoice->signature->signature); ?>" style="width: 200px;">
                        <h6><?php echo app('translator')->get('modules.estimates.signature'); ?></h6>
                    <?php else: ?>
                        <h6><?php echo app('translator')->get('modules.estimates.signedBy'); ?></h6>
                    <?php endif; ?>
                    <p>(<?php echo e($invoice->signature->full_name); ?>)</p>
                </div>
            </div>
        <?php endif; ?>

         <?php if($invoice->client_comment): ?>
            <hr>
            <div class="col-md-12">
                <h4 class="name" style="margin-bottom: 20px;"><?php echo app('translator')->get('app.rejectReason'); ?></h4>
                <p> <?php echo e($invoice->client_comment); ?> </p>
            </div>
        <?php endif; ?>

    </div>
    <!-- CARD BODY END -->
    <!-- CARD FOOTER START -->
    <div class="card-footer bg-white border-0 d-flex justify-content-start py-0 py-lg-4 py-md-4 mb-4 mb-lg-3 mb-md-3 ">
        <a class="f-14 text-light mt-2 ml btn-primary"
            href="<?php echo e(route('proposal-template.download', [$invoice->id])); ?>">
            <i class="fa fa-download f-w-500 mr-1 f-11"></i> <?php echo app('translator')->get('app.download'); ?>
        </a>

        <?php if (isset($component)) { $__componentOriginalc35c79ed7e812580313ad04118477974 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc35c79ed7e812580313ad04118477974 = $attributes; } ?>
<?php $component = App\View\Components\Forms\ButtonCancel::resolve(['link' => route('proposal-template.index')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-cancel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonCancel::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'border-0 ml-2 mt']); ?>
            <?php echo app('translator')->get('app.cancel'); ?>
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
    <!-- CARD FOOTER END -->
</div>
<!-- INVOICE CARD END -->
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/proposal-template/ajax/show.blade.php ENDPATH**/ ?>