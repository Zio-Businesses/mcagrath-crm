<style>
    #logo {
        height: 50px;
    }
    #signatory img {
        height:95px;
        margin-bottom: -40px;
        margin-top: 5px;
        margin-right: 15px;
    }
</style>

<?php
    $addPaymentPermission = user()->permission('add_payments');
    $deleteInvoicePermission = user()->permission('delete_invoices');
    $editInvoicePermission = user()->permission('edit_invoices');
?>

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
            <?php echo e($invoice->client->name_salutation); ?> <?php echo app('translator')->get('app.viewedOn'); ?> <?php echo e($invoice->last_viewed->timezone($settings->timezone)->translatedFormat($settings->date_format)); ?>

            <?php echo app('translator')->get('app.at'); ?> <?php echo e($invoice->last_viewed->timezone($settings->timezone)->translatedFormat($settings->time_format)); ?>

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
<?php if(!is_null($invoice->client_id) && !is_null($invoice->clientDetails)): ?>
    <?php
        $client = $invoice->client;
    ?>
<?php elseif(
    !is_null($invoice->project) &&
        !is_null($invoice->project->client) &&
        !is_null($invoice->project->client->clientDetails)): ?>
    <?php
        $client = $invoice->project->client;
    ?>
<?php endif; ?>

<?php if(!$invoice->send_status && $invoice->status != 'canceled' && $invoice->amountDue() > 0): ?>
    <?php if (isset($component)) { $__componentOriginal5194778a3a7b899dcee5619d0610f5cf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5194778a3a7b899dcee5619d0610f5cf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.alert','data' => ['icon' => 'info-circle','type' => 'warning']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'info-circle','type' => 'warning']); ?>
        <?php echo app('translator')->get('messages.unsentInvoiceInfo'); ?>
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

<div class="card border-0 invoice">
    <!-- CARD BODY START -->
    <div class="card-body">

        <?php if($message = Session::get('success')): ?>
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                <i class="fa fa-check"></i> <?php echo $message; ?>

            </div>
                <?php Session::forget('success'); ?>
        <?php endif; ?>

        <?php if($message = Session::get('error')): ?>
            <div class="custom-alerts alert alert-danger fade in">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                <?php echo $message; ?>

            </div>
                <?php Session::forget('error'); ?>
        <?php endif; ?>

        <div class="invoice-table-wrapper">
            <table width="100%">
                <tr class="inv-logo-heading">
                    <td><img src="<?php echo e(invoice_setting()->logo_url); ?>" alt="<?php echo e(company()->company_name); ?>"
                             id="logo"/></td>
                    <td align="right" class="font-weight-bold f-21 text-dark text-uppercase mt-4 mt-lg-0 mt-md-0">
                        <?php echo app('translator')->get('app.invoice'); ?></td>
                </tr>
                <tr class="inv-num">
                    <td class="f-14 text-dark">
                        <p class="mt-3 mb-0">
                            <?php echo e(company()->company_name); ?><br>
                            <?php if(!is_null($settings) && $invoice->address): ?>
                                <?php echo nl2br($invoice->address->address); ?><br>
                            <?php endif; ?>
                            <?php echo e(company()->company_phone); ?>

                            <?php if($invoiceSetting->show_gst == 'yes' && $invoice->address->tax_number): ?>
                                <br><?php echo e($invoice->address->tax_name); ?>: <?php echo e($invoice->address->tax_number); ?>

                            <?php endif; ?>
                        </p><br>
                    </td>
                    <td align="right">
                        <table class="inv-num-date text-dark f-13 mt-3">
                            <tr>
                                <td class="bg-light-grey border-right-0 f-w-500">
                                    <?php echo app('translator')->get('modules.invoices.invoiceNumber'); ?></td>
                                <td class="border-left-0"><?php echo e($invoice->invoice_number); ?></td>
                            </tr>
                            <?php if($creditNote): ?>
                                <tr>
                                    <td class="bg-light-grey border-right-0 f-w-500"><?php echo app('translator')->get('app.credit-note'); ?></td>
                                    <td class="border-left-0"><?php echo e($creditNote->cn_number); ?></td>
                                </tr>
                            <?php endif; ?>
                            <tr>
                                <td class="bg-light-grey border-right-0 f-w-500">
                                    <?php echo app('translator')->get('modules.invoices.invoiceDate'); ?></td>
                                <td class="border-left-0"><?php echo e($invoice->issue_date->translatedFormat(company()->date_format)); ?>

                                </td>
                            </tr>

                            <?php if(empty($invoice->order_id) && $invoice->status === 'unpaid' && $invoice->due_date->year > 1): ?>
                                <tr>
                                    <td class="bg-light-grey border-right-0 f-w-500"><?php echo app('translator')->get('app.dueDate'); ?></td>
                                    <td class="border-left-0"><?php echo e($invoice->due_date->translatedFormat(company()->date_format)); ?>

                                    </td>
                                </tr>
                            <?php endif; ?>
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
                        <p class="mb-0 text-left">
                            <?php if($invoice->client || $invoice->clientDetails): ?>
                                <span class="text-dark-grey text-capitalize"><?php echo app('translator')->get('modules.invoices.billedTo'); ?></span>
                                <br>

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

                            <?php endif; ?>

                            <?php if($invoiceSetting->show_project == 1 && isset($invoice->project)): ?>
                                <br><br>
                                <span
                                    class="text-dark-grey text-capitalize"><?php echo app('translator')->get('modules.invoices.projectName'); ?></span>
                                <br>
                                <?php echo e($invoice->project->project_name); ?>

                            <?php endif; ?>

                            <?php if($invoiceSetting->show_gst == 'yes' && !is_null($client->clientDetails->gst_number)): ?>
                                <?php if($client->clientDetails->tax_name): ?>
                                    <br><?php echo e($client->clientDetails->tax_name); ?>: <?php echo e($client->clientDetails->gst_number); ?>

                                <?php else: ?>
                                    <br><?php echo app('translator')->get('app.gstIn'); ?>: <?php echo e($client->clientDetails->gst_number); ?>

                                <?php endif; ?>
                            <?php endif; ?>
                        </p>
                    </td>
                    <?php if($invoice->show_shipping_address == 'yes'): ?>
                        <td class="f-14 text-black">
                            <p class="mb-0 text-left"><span
                                    class="text-dark-grey text-capitalize"><?php echo app('translator')->get('app.shippingAddress'); ?></span><br>
                                <?php echo nl2br($client->clientDetails->shipping_address); ?></p>
                        </td>
                    <?php endif; ?>
                    <td align="right" class="mt-2 mt-lg-0 mt-md-0">
                        <?php if($invoice->clientDetails->company_logo): ?>
                            <img src="<?php echo e($invoice->clientDetails->image_url); ?>"
                                 alt="<?php echo e($invoice->clientDetails->company_name); ?>" class="logo"
                                 style="height:50px;"/>
                            <br><br><br>
                        <?php endif; ?>
                        <?php if($invoice->credit_note): ?>
                            <span class="unpaid text-warning border-warning rounded"><?php echo app('translator')->get('app.credit-note'); ?></span>
                        <?php else: ?>
                            <span
                                class="unpaid <?php echo e($invoice->status == 'partial' ? 'text-primary border-primary' : ''); ?> <?php echo e($invoice->status == 'paid' ? 'text-success border-success' : ''); ?> rounded f-15 "><?php echo app('translator')->get('modules.invoices.' . $invoice->status); ?></span>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td height="30" colspan="2"></td>
                </tr>
            </table>
            <table width="100%" class="inv-desc d-none d-lg-table d-md-table">
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
                                <!-- <td class="border-right-0 border-left-0"
                                    align="right"><?php echo app('translator')->get('modules.invoices.tax'); ?></td> -->
                                <td class="border-left-0" align="right"
                                    colspan=2>
                                    <?php echo app('translator')->get('modules.invoices.amount'); ?>
                                    (<?php echo e($invoice->currency->currency_code); ?>)
                                </td>
                            </tr>
                            <?php $__currentLoopData = $invoice->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($item->type == 'item'): ?>
                                    <tr class="text-dark font-weight-semibold f-13">
                                        <td><?php echo e($item->item_name); ?></td>
                                        <?php if($invoiceSetting->hsn_sac_code_show): ?>
                                            <td align="right"><?php echo e($item->hsn_sac_code); ?></td>
                                        <?php endif; ?>
                                        <td align="right"><?php echo e($item->quantity); ?> <?php if($item->unit): ?>
                                                <br><span
                                                    class="f-11 text-dark-grey"><?php echo e($item->unit->unit_type); ?></span>
                                            <?php endif; ?></td>
                                        <td align="right">
                                            <?php echo e(currency_format($item->unit_price, $invoice->currency_id, false)); ?></td>
                                        <!-- <td align="right"><?php echo e($item->tax_list); ?></td> -->
                                        <td align="right" colspan=2>
                                            <?php echo e(currency_format($item->amount, $invoice->currency_id, false)); ?>

                                        </td>
                                    </tr>
                                    <?php if($item->item_summary || $item->invoiceItemImage): ?>
                                        <tr class="text-dark f-12">
                                            <td colspan="<?php echo e($invoiceSetting->hsn_sac_code_show ? '6' : '5'); ?>"
                                                class="border-bottom-0">
                                                <?php echo nl2br($item->item_summary); ?>

                                                <?php if($item->invoiceItemImage): ?>
                                                    <p class="mt-2">
                                                        <a href="javascript:;" class="img-lightbox"
                                                           data-image-url="<?php echo e($item->invoiceItemImage->file_url); ?>">
                                                            <img src="<?php echo e($item->invoiceItemImage->file_url); ?>"
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
                                        <tr class=" text-dark-grey font-weight-bold" align="right">
                                            <td class="w-50 border-bottom-0 border-left-0">
                                                <?php echo app('translator')->get('modules.invoices.total'); ?></td>
                                        </tr>
                                        <tr class="bg-light-grey text-dark f-w-500 f-16" align="right">
                                            <td class="w-50 border-bottom-0 border-left-0">
                                                <?php echo app('translator')->get('modules.invoices.total'); ?>
                                                <?php echo app('translator')->get('modules.invoices.due'); ?></td>
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
                                        <tr class=" text-dark-grey font-weight-bold" align="right">
                                            <td class="border-bottom-0 border-right-0">
                                                <?php echo e(currency_format($invoice->total, $invoice->currency_id, false)); ?>

                                            </td>
                                        </tr>
                                        <tr class="bg-light-grey text-dark f-w-500 f-16" align="right">
                                            <td class="border-bottom-0 border-right-0">
                                                <?php echo e(currency_format($invoice->amountDue(), $invoice->currency_id, false)); ?>

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
                                    <?php if($item->item_summary != '' || $item->invoiceItemImage): ?>
                                        <tr>
                                            <td class="border-left-0 border-right-0 border-bottom-0 f-12">
                                                <?php echo nl2br(pdfStripTags($item->item_summary)); ?>

                                                <?php if($item->invoiceItemImage): ?>
                                                    <p class="mt-2">
                                                        <a href="javascript:;" class="img-lightbox"
                                                           data-image-url="<?php echo e($item->invoiceItemImage->file_url); ?>">
                                                            <img src="<?php echo e($item->invoiceItemImage->file_url); ?>"
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
                            <td width="50%"><?php echo e($item->quantity); ?></td>
                        </tr>
                        <tr>
                            <th width="50%" class="bg-light-grey text-dark-grey font-weight-bold">
                                <?php echo app('translator')->get('modules.invoices.unitPrice'); ?>
                                (<?php echo e($invoice->currency->currency_code); ?>)
                            </th>
                            <td width="50%"><?php echo e(currency_format($item->unit_price, $invoice->currency_id, false)); ?>

                            </td>
                        </tr>
                        <tr>
                            <th width="50%" class="bg-light-grey text-dark-grey font-weight-bold">
                                <?php echo app('translator')->get('modules.invoices.amount'); ?>
                                (<?php echo e($invoice->currency->currency_code); ?>)
                            </th>
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
                        <?php echo e(currency_format($invoice->sub_total, $invoice->currency_id, false)); ?></td>
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
                <tr>
                    <th width="50%" class="f-16 bg-light-grey text-dark font-weight-bold">
                        <?php echo app('translator')->get('app.totalDue'); ?>
                    </th>
                    <td width="50%" class="f-16 bg-light-grey text-dark font-weight-bold">
                        <?php echo e(currency_format($invoice->amountDue(), $invoice->currency_id, false)); ?>

                        <?php echo e($invoice->currency->currency_code); ?></td>
                </tr>
            </table>
            <table class="inv-note">
                <tr>
                    <td height="30" colspan="2"></td>
                </tr>
                <tr>
                    <!-- <td><?php echo app('translator')->get('app.note'); ?></td> -->
                    <td style="text-align: right;"><?php echo app('translator')->get('modules.invoiceSettings.invoiceTerms'); ?></td>
                </tr>
                <tr>
                    <!-- <td style="vertical-align: text-top">
                        <p class="text-dark-grey"><?php echo !empty($invoice->note) ? nl2br($invoice->note) : '--'; ?></p>
                    </td> -->
                    <td style="text-align: right;">
                        <p class="text-dark-grey"><?php echo nl2br($invoiceSetting->invoice_terms); ?></p>
                    </td>
                </tr>
                <?php if($invoiceSetting->other_info): ?>
                    <tr>
                        <td>
                            <p class="text-dark-grey"><?php echo nl2br($invoiceSetting->other_info); ?></p>
                        </td>
                    </tr>
                <?php endif; ?>

                <tr>
                    <td colspan="2" align="right">
                        <table>

                            <?php if($invoiceSetting->authorised_signatory && $invoiceSetting->authorised_signatory_signature && $invoice->status == 'paid'): ?>
                                <tr align="right">
                                    <td id="signatory">
                                        <img src="<?php echo e($invoiceSetting->authorised_signatory_signature_url); ?>"
                                             alt="<?php echo e($company->company_name); ?>"/><br>
                                        <?php echo app('translator')->get('modules.invoiceSettings.authorisedSignatory'); ?>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table>
                            <tr>
                                <?php if(isset($taxes) && invoice_setting()->tax_calculation_msg == 1): ?>
                                    <p class="text-dark-grey">
                                        <?php if($invoice->calculate_tax == 'after_discount'): ?>
                                            <?php echo app('translator')->get('messages.calculateTaxAfterDiscount'); ?>
                                        <?php else: ?>
                                            <?php echo app('translator')->get('messages.calculateTaxBeforeDiscount'); ?>
                                        <?php endif; ?>
                                    </p>
                                <?php endif; ?>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <!-- CARD BODY END -->
    <!-- CARD FOOTER START -->
    <div class="card-footer bg-white border-0 d-flex justify-content-start py-0 py-lg-4 py-md-4 mb-4 mb-lg-3 mb-md-3 ">

        <div class="d-flex">
            <div class="inv-action mr-3 mr-lg-3 mr-md-3 dropup">
                <button class="dropdown-toggle btn-primary" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo app('translator')->get('app.action'); ?>
                    <span><i class="fa fa-chevron-up f-15"></i></span>
                </button>
                <!-- DROPDOWN - INFORMATION -->
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" tabindex="0">

                    <?php if($invoice->status == 'paid' && !in_array('client', user_roles()) && $invoice->amountPaid() == 0): ?>
                        <li>
                            <a class="dropdown-item f-14 text-dark"
                               href="<?php echo e(route('invoices.edit', [$invoice->id])); ?>">
                                <i class="fa fa-edit f-w-500 mr-2 f-11"></i> <?php echo app('translator')->get('app.edit'); ?>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php
                        $trashBtn = (!is_null($invoice->project) && is_null($invoice->project->deleted_at)) ? true : (is_null($invoice->project) ? true : false) ;
                    ?>

                    <?php if(
                        $trashBtn &&
                        $invoice->status != 'paid' &&
                            $invoice->status != 'canceled' &&
                            is_null($invoice->invoice_recurring_id) &&
                            ($editInvoicePermission == 'all' ||
                                ($editInvoicePermission == 'added' && $invoice->added_by == user()->id) ||
                                ($editInvoicePermission == 'owned' && $invoice->client_id == user()->id) ||
                                ($editInvoicePermission == 'both' &&
                                    ($invoice->client_id == user()->id || $invoice->added_by == user()->id)))): ?>
                        <li>
                            <a class="dropdown-item f-14 text-dark"
                               href="<?php echo e(route('invoices.edit', [$invoice->id])); ?>">
                                <i class="fa fa-edit f-w-500 mr-2 f-11"></i> <?php echo app('translator')->get('app.edit'); ?>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php if(
                        ($firstInvoice->id == $invoice->id && $invoice->status == 'unpaid' && $deleteInvoicePermission == 'all') ||
                            ($deleteInvoicePermission == 'added' && $invoice->added_by == user()->id && $firstInvoice->id == $invoice->id)): ?>
                        <li>
                            <a class="dropdown-item f-14 text-dark delete-invoice" href="javascript:;"
                               data-invoice-id="<?php echo e($invoice->id); ?>">
                                <i class="fa fa-trash f-w-500 mr-2 f-11"></i> <?php echo app('translator')->get('app.delete'); ?>
                            </a>
                        </li>
                    <?php endif; ?>

                    <li>
                        <a class="dropdown-item f-14 text-dark"
                           href="<?php echo e(route('invoices.download', [$invoice->id])); ?>">
                            <i class="fa fa-download f-w-500 mr-2 f-11"></i> <?php echo app('translator')->get('app.download'); ?>
                        </a>
                    </li>

                    <?php if($invoice->status != 'canceled' && !$invoice->credit_note && !in_array('client', user_roles())): ?>
                        <li>
                            <a class="dropdown-item f-14 text-dark sendButton" href="javascript:;"
                               data-invoice-id="<?php echo e($invoice->id); ?>" data-type="send">
                                <i class="fa fa-paper-plane f-w-500 mr-2 f-11"></i> <?php echo app('translator')->get('app.send'); ?>
                            </a>
                        </li>
                        <?php if($invoice->send_status == 0): ?>
                            <li>
                                <a class="dropdown-item f-14 text-dark sendButton" href="javascript:;"
                                   data-toggle="tooltip" data-original-title="<?php echo app('translator')->get('messages.markSentInfo'); ?>"
                                   data-invoice-id="<?php echo e($invoice->id); ?>" data-type="mark_as_send">
                                    <i class="fa fa-paper-plane f-w-500 mr-2 f-11"></i> <?php echo app('translator')->get('app.markSent'); ?>
                                </a>
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php if($invoice->status == 'paid' && !in_array('client', user_roles()) && $invoice->credit_note == 0): ?>
                        <a class="dropdown-item invoice-upload" href="javascript:;" data-toggle="tooltip"
                           data-invoice-id="<?php echo e($invoice->id); ?>">
                            <i class="fa fa-upload mr-2"></i><?php echo app('translator')->get('app.upload'); ?>
                        </a>
                    <?php endif; ?>

                    <?php if($invoice->status != 'canceled'): ?>
                        <?php if($invoice->clientDetails): ?>
                            <?php if(!is_null($invoice->clientDetails->shipping_address)): ?>
                                <?php if($invoice->show_shipping_address == 'yes'): ?>
                                    <li>
                                        <a class="dropdown-item f-14 text-dark toggle-shipping-address"
                                           href="javascript:;" data-invoice-id="<?php echo e($invoice->id); ?>">
                                            <i class="fa fa-eye-slash f-w-500 mr-2 f-11"></i> <?php echo app('translator')->get('app.hideShippingAddress'); ?>
                                        </a>
                                    </li>
                                <?php else: ?>
                                    <li>
                                        <a class="dropdown-item f-14 text-dark toggle-shipping-address"
                                           href="javascript:;" data-invoice-id="<?php echo e($invoice->id); ?>">
                                            <i class="fa fa-eye f-w-500 mr-2 f-11"></i> <?php echo app('translator')->get('app.showShippingAddress'); ?>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            <?php else: ?>
                                <li>
                                    <a class="dropdown-item f-14 text-dark add-shipping-address" href="javascript:;"
                                       data-invoice-id="<?php echo e($invoice->id); ?>">
                                        <i class="fa fa-plus f-w-500 mr-2 f-11"></i> <?php echo app('translator')->get('app.addShippingAddress'); ?>
                                    </a>
                                </li>
                            <?php endif; ?>
                        <?php else: ?>
                            <?php if($invoice->project->clientDetails): ?>
                                <?php if(!is_null($invoice->project->clientDetails->shipping_address)): ?>
                                    <?php if($invoice->show_shipping_address == 'yes'): ?>
                                        <li>
                                            <a class="dropdown-item f-14 text-dark toggle-shipping-address"
                                               href="javascript:;" data-invoice-id="<?php echo e($invoice->id); ?>">
                                                <i class="fa fa-eye-slash f-w-500 mr-2 f-11"></i> <?php echo app('translator')->get('app.hideShippingAddress'); ?>
                                            </a>
                                        </li>
                                    <?php else: ?>
                                        <li>
                                            <a class="dropdown-item f-14 text-dark toggle-shipping-address"
                                               href="javascript:;" data-invoice-id="<?php echo e($invoice->id); ?>">
                                                <i class="fa fa-eye f-w-500 mr-2 f-11"></i> <?php echo app('translator')->get('app.showShippingAddress'); ?>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <li>
                                        <a class="dropdown-item f-14 text-dark add-shipping-address"
                                           href="javascript:;" data-invoice-id="<?php echo e($invoice->id); ?>">
                                            <i class="fa plus f-w-500 mr-2 f-11"></i> <?php echo app('translator')->get('app.addShippingAddress'); ?>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php if(
                        $invoice->status != 'paid' &&
                            $invoice->status != 'draft' &&
                            $invoice->status != 'canceled' &&
                            !in_array('client', user_roles()) &&
                            $invoice->send_status == 1): ?>
                        <li>
                            <a class="dropdown-item f-14 text-dark reminderButton" href="javascript:;"
                               data-invoice-id="<?php echo e($invoice->id); ?>">
                                <i class="fa fa-bell f-w-500 mr-2 f-11"></i> <?php echo app('translator')->get('app.paymentReminder'); ?>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php if(
                        !in_array('client', user_roles()) &&
                            in_array('payments', $user->modules) &&
                            $invoice->credit_note == 0 &&
                            $invoice->status != 'draft' &&
                            $invoice->status != 'paid' &&
                            $invoice->status != 'canceled' &&
                            $invoice->send_status): ?>
                        <?php if($addPaymentPermission == 'all' || ($addPaymentPermission == 'added' && $invoice->added_by == user()->id)): ?>
                            <li>
                                <a class="dropdown-item f-14 text-dark openRightModal"
                                   data-redirect-url="<?php echo e(route('invoices.show', $invoice->id)); ?>"
                                   href="<?php echo e(route('payments.create') . '?invoice_id=' . $invoice->id . '&default_client=' . $invoice->client_id); ?>"
                                   data-invoice-id="<?php echo e($invoice->id); ?>">
                                    <i class="fa fa-plus f-w-500 mr-2 f-11"></i> <?php echo app('translator')->get('modules.payments.addPayment'); ?>
                                </a>
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php if(
                        $invoice->credit_note == 0 &&
                            $invoice->status != 'draft' &&
                            $invoice->status != 'canceled' &&
                            $invoice->status != 'unpaid' &&
                            !in_array('client', user_roles())): ?>
                        <?php if($invoice->amountPaid() > 0): ?>
                            <?php if($invoice->status == 'paid'): ?>
                                <a class="dropdown-item"
                                   href="<?php echo e(route('creditnotes.create') . '?invoice=' . $invoice->id); ?>"><i
                                        class="fa fa-plus mr-2"></i><?php echo app('translator')->get('modules.credit-notes.addCreditNote'); ?></a>
                            <?php else: ?>
                                <a class="dropdown-item unpaidAndPartialPaidCreditNote" data-toggle="tooltip"
                                   data-invoice-id="<?php echo e($invoice->id); ?>" href="javascript:;"><i
                                        class="fa fa-plus mr-2"></i><?php echo app('translator')->get('modules.credit-notes.addCreditNote'); ?></a>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php if(!in_array($invoice->status, ['canceled', 'draft']) && !$invoice->credit_note && $invoice->send_status): ?>
                        <li>
                            <a class="dropdown-item f-14 text-dark btn-copy" href="javascript:;"
                               data-clipboard-text="<?php echo e(url()->temporarySignedRoute('front.invoice', now()->addDays(\App\Models\GlobalSetting::SIGNED_ROUTE_EXPIRY), $invoice->hash)); ?>">
                                <i class="fa fa-copy f-w-500  mr-2 f-12"></i>
                                <?php echo app('translator')->get('modules.invoices.copyPaymentLink'); ?>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item f-14 text-dark"
                               href="<?php echo e(url()->temporarySignedRoute('front.invoice', now()->addDays(\App\Models\GlobalSetting::SIGNED_ROUTE_EXPIRY), $invoice->hash)); ?>"
                               target="_blank">
                                <i class="fa fa-external-link-alt f-w-500  mr-2 f-12"></i>
                                <?php echo app('translator')->get('modules.payments.paymentLink'); ?>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php if($addInvoicesPermission == 'all' || $addInvoicesPermission == 'added'): ?>
                        <a href="<?php echo e(route('invoices.create') . '?invoice=' . $invoice->id); ?>"
                           class="dropdown-item"><i class="fa fa-copy mr-2"></i> <?php echo app('translator')->get('app.createDuplicate'); ?>
                        </a>
                    <?php endif; ?>

                    <?php if(
                        $firstInvoice->id != $invoice->id &&
                            ($invoice->status == 'unpaid' || $invoice->status == 'draft') &&
                            !in_array('client', user_roles())): ?>
                        <li>
                            <a class="dropdown-item f-14 text-dark cancel-invoice"
                               data-invoice-id="<?php echo e($invoice->id); ?>" href="javascript:;">
                                <i class="fa fa-times f-w-500  mr-2 f-12"></i>
                                <?php echo app('translator')->get('app.cancel'); ?>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php if($invoice->appliedCredits() > 0): ?>
                        <li>
                            <a class="dropdown-item f-14 text-dark openRightModal"
                               href="<?php echo e(route('invoices.applied_credits', $invoice->id)); ?>">
                                <i class="fa fa-money-bill-alt f-w-500  mr-2 f-12"></i>
                                <?php echo app('translator')->get('app.viewInvoicePayments'); ?>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>

            
            <?php if(in_array('client', user_roles()) &&
                    $invoice->total > 0 &&
                    in_array($invoice->status, ['unpaid', 'partial']) &&
                    ($credentials->show_pay || $methods->count() > 0)): ?>

                <div class="inv-action mr-3 mr-lg-3 mr-md-3 dropup">
                    <button class="dropdown-toggle btn-primary rounded mr-3 mr-lg-0 mr-md-0 f-15" type="button"
                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"><?php echo app('translator')->get('modules.invoices.payNow'); ?>
                        <span><i class="fa fa-chevron-down f-15"></i></span>
                    </button>
                    <!-- DROPDOWN - INFORMATION -->
                    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton"
                        tabindex="0">
                        <?php if($credentials->stripe_status == 'active'): ?>
                            <li>
                                <a class="dropdown-item f-14 text-dark" href="javascript:;"
                                   data-invoice-id="<?php echo e($invoice->id); ?>" id="stripeModal">
                                    <i class="fab fa-stripe-s f-w-500 mr-2 f-11"></i>
                                    <?php echo app('translator')->get('modules.invoices.payStripe'); ?>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if($credentials->paystack_status == 'active'): ?>
                            <li>
                                <a class="dropdown-item f-14 text-dark" href="javascript:void(0);"
                                   data-invoice-id="<?php echo e($invoice->id); ?>" id="paystackModal">
                                    <img style="height: 15px;"
                                         src="https://s3-eu-west-1.amazonaws.com/pstk-integration-logos/paystack.jpg">
                                    <?php echo app('translator')->get('modules.invoices.payPaystack'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if($credentials->flutterwave_status == 'active'): ?>
                            <li>
                                <a class="dropdown-item f-14 text-dark" href="javascript:void(0);"
                                   data-invoice-id="<?php echo e($invoice->id); ?>" id="flutterwaveModal">
                                    <img style="height: 15px;" src="<?php echo e(asset('img/flutterwave.png')); ?>">
                                    <?php echo app('translator')->get('modules.invoices.payFlutterwave'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if($credentials->payfast_status == 'active'): ?>
                            <li>
                                <a class="dropdown-item f-14 text-dark" href="javascript:void(0);" id="payfastModal">
                                    <img style="height: 15px;" src="<?php echo e(asset('img/payfast-logo.png')); ?>">
                                    <?php echo app('translator')->get('modules.invoices.payPayfast'); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if($credentials->square_status == 'active'): ?>
                            <li>
                                <a class="dropdown-item f-14 text-dark" href="javascript:void(0);" id="squareModal">
                                    <img style="height: 15px;" src="<?php echo e(asset('img/square.svg')); ?>">
                                    <?php echo app('translator')->get('modules.invoices.paySquare'); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if($credentials->authorize_status == 'active'): ?>
                            <li>
                                <a class="dropdown-item f-14 text-dark" href="javascript:void(0);"
                                   data-invoice-id="<?php echo e($invoice->id); ?>" id="authorizeModal">
                                    <img style="height: 15px;" src="<?php echo e(asset('img/authorize.png')); ?>">
                                    <?php echo app('translator')->get('modules.invoices.payAuthorize'); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if($credentials->mollie_status == 'active'): ?>
                            <li>
                                <a class="dropdown-item f-14 text-dark" href="javascript:void(0);"
                                   data-invoice-id="<?php echo e($invoice->id); ?>" id="mollieModal">
                                    <img style="height: 20px;" src="<?php echo e(asset('img/mollie.png')); ?>">
                                    <?php echo app('translator')->get('modules.invoices.payMollie'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if($credentials->razorpay_status == 'active'): ?>
                            <li>
                                <a class="dropdown-item f-14 text-dark" href="javascript:;"
                                   id="razorpayPaymentButton">
                                    <i class="fa fa-credit-card f-w-500 mr-2 f-11"></i>
                                    <?php echo app('translator')->get('modules.invoices.payRazorpay'); ?>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if($credentials->paypal_status == 'active'): ?>
                            <li>
                                <a class="dropdown-item f-14 text-dark" href="<?php echo e(route('paypal', [$invoice->id])); ?>">
                                    <i class="fab fa-paypal f-w-500 mr-2 f-11"></i> <?php echo app('translator')->get('modules.invoices.payPaypal'); ?>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if($methods->count() > 0): ?>
                            <li>
                                <a class="dropdown-item f-14 text-dark" href="javascript:;" id="offlinePaymentModal"
                                   data-invoice-id="<?php echo e($invoice->id); ?>">
                                    <i class="fa fa-money-bill f-w-500 mr-2 f-11"></i>
                                    <?php echo app('translator')->get('modules.invoices.payOffline'); ?>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            <?php endif; ?>
            

            <?php if (isset($component)) { $__componentOriginalc35c79ed7e812580313ad04118477974 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc35c79ed7e812580313ad04118477974 = $attributes; } ?>
<?php $component = App\View\Components\Forms\ButtonCancel::resolve(['link' => route('invoices.index')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-cancel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonCancel::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'border-0 mr-3']); ?><?php echo app('translator')->get('app.cancel'); ?>
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

<?php if(count($invoice->files) > 0): ?>
    <div class="bg-white mt-4 pl-3 pt-3">
        <h5><?php echo e(__('modules.invoiceFiles')); ?></h5>
        <div class="d-flex flex-wrap" id="invoice-file-list">
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

                    <?php if($viewPermission == 'all' || ($viewPermission == 'added' && $file->added_by == user()->id)): ?>
                         <?php $__env->slot('action', null, []); ?> 
                            <div class="dropdown ml-auto file-action">
                                <button
                                    class="btn btn-lg f-14 p-0 text-lightest text-capitalize rounded  dropdown-toggle"
                                    type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-h"></i>
                                </button>

                                <div class="dropdown-menu dropdown-menu-right border-grey rounded b-shadow-4 p-0"
                                     aria-labelledby="dropdownMenuLink" tabindex="0">
                                    <?php if($viewPermission == 'all' || ($viewPermission == 'added' && $file->added_by == user()->id)): ?>
                                        <?php if($file->icon = 'images'): ?>
                                            <a class="cursor-pointer d-block text-dark-grey f-13 pt-3 px-3 "
                                               target="_blank"
                                               href="<?php echo e($file->file_url); ?>"><?php echo app('translator')->get('app.view'); ?></a>
                                        <?php endif; ?>
                                        <a class="cursor-pointer d-block text-dark-grey f-13 py-3 px-3 "
                                           href="<?php echo e(route('invoice-files.download', md5($file->id))); ?>"><?php echo app('translator')->get('app.download'); ?></a>
                                    <?php endif; ?>

                                    <?php if($deletePermission == 'all' || ($deletePermission == 'added' && $file->added_by == user()->id)): ?>
                                        <a class="cursor-pointer d-block text-dark-grey f-13 pb-3 px-3 delete-file"
                                           data-row-id="<?php echo e($file->id); ?>" href="javascript:;"><?php echo app('translator')->get('app.delete'); ?></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                         <?php $__env->endSlot(); ?>
                    <?php endif; ?>

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

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script src="<?php echo e(asset('vendor/jquery/clipboard.min.js')); ?>"></script>

<script>
    var clipboard = new ClipboardJS('.btn-copy');

    clipboard.on('success', function (e) {
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

    $('body').on('click', '#stripeModal', function () {
        let invoiceId = $(this).data('invoice-id');
        let queryString = "?invoice_id=" + invoiceId;
        let url = "<?php echo e(route('invoices.stripe_modal')); ?>" + queryString;

        $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
        $.ajaxModal(MODAL_LG, url);
    });

    $('body').on('click', '#paystackModal', function () {
        let id = $(this).data('invoice-id');
        let queryString = "?id=" + id + "&type=invoice";
        let url = "<?php echo e(route('front.paystack_modal')); ?>" + queryString;

        $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
        $.ajaxModal(MODAL_LG, url);
    })

    $('body').on('click', '#flutterwaveModal', function () {
        let id = $(this).data('invoice-id');
        let queryString = "?id=" + id + "&type=invoice";
        let url = "<?php echo e(route('front.flutterwave_modal')); ?>" + queryString;

        $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
        $.ajaxModal(MODAL_LG, url);
    })

    $('body').on('click', '#authorizeModal', function () {
        let id = $(this).data('invoice-id');
        let queryString = "?id=" + id + "&type=invoice";
        let url = "<?php echo e(route('front.authorize_modal')); ?>" + queryString;

        $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
        $.ajaxModal(MODAL_LG, url);
    })

    $('body').on('click', '#mollieModal', function () {
        let id = $(this).data('invoice-id');
        let queryString = "?id=" + id + "&type=invoice";
        let url = "<?php echo e(route('front.mollie_modal')); ?>" + queryString;

        $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
        $.ajaxModal(MODAL_LG, url);
    })

    $('body').on('click', '#payfastModal', function () {
        // Block model UI until payment happens
        $.easyBlockUI();

        $.easyAjax({
            url: "<?php echo e(route('payfast_public')); ?>",
            type: "POST",
            blockUI: true,
            data: {
                id: '<?php echo e($invoice->id); ?>',
                type: 'invoice',
                _token: '<?php echo e(csrf_token()); ?>'
            },
            success: function (response) {
                if (response.status == 'success') {
                    $('body').append(response.form);
                    $('#payfast-pay-form').submit();
                }
            }
        });
    });

    $('body').on('click', '#squareModal', function () {
        // Block model UI until payment happens
        $.easyBlockUI();

        $.easyAjax({
            url: "<?php echo e(route('square_public')); ?>",
            type: "POST",
            blockUI: true,
            data: {
                id: '<?php echo e($invoice->id); ?>',
                type: 'invoice',
                _token: '<?php echo e(csrf_token()); ?>'
            }
        });
    });

    $('body').on('click', '#offlinePaymentModal', function () {
        let invoiceId = $(this).data('invoice-id');
        let queryString = "?invoice_id=" + invoiceId;
        let url = "<?php echo e(route('invoices.offline_payment_modal')); ?>" + queryString;

        $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
        $.ajaxModal(MODAL_LG, url);
    });

    <?php if($credentials->razorpay_status == 'active'): ?>
    $('body').on('click', '#razorpayPaymentButton', function () {
        var amount = <?php echo e(number_format((float) $invoice->amountDue(), 2, '.', '') * 100); ?>;
        var invoiceId = <?php echo e($invoice->id); ?>;
        var clientEmail = "<?php echo e($user->email); ?>";

        var options = {
            "key": "<?php echo e($credentials->razorpay_mode == 'test' ? $credentials->test_razorpay_key : $credentials->live_razorpay_key); ?>",
            "amount": amount,
            "currency": '<?php echo e($invoice->currency->currency_code); ?>',
            "name": "<?php echo e($companyName); ?>",
            "description": "Invoice Payment",
            "image": "<?php echo e(company()->logo_url); ?>",
            "handler": function (response) {
                confirmRazorpayPayment(response.razorpay_payment_id, invoiceId);
            },
            "modal": {
                "ondismiss": function () {
                    // On dismiss event
                }
            },
            "prefill": {
                "email": clientEmail
            },
            "notes": {
                "purchase_id": invoiceId, //invoice ID
                "type": "invoice"
            }
        };
        var rzp1 = new Razorpay(options);

        rzp1.open();
    })

    //Confirmation after transaction
    function confirmRazorpayPayment(id, invoiceId) {
        // Block UI immediatly after payment modal disappear
        $.easyBlockUI();

        $.easyAjax({
            type: 'POST',
            url: "<?php echo e(route('pay_with_razorpay', [$invoice->company->hash])); ?>",
            data: {
                paymentId: id,
                invoiceId: invoiceId,
                _token: '<?php echo e(csrf_token()); ?>'
            }
        });
    }

    <?php endif; ?>

    $('body').on('click', '.sendButton', function () {
        var id = $(this).data('invoice-id');
        var token = "<?php echo e(csrf_token()); ?>";
        var type = $(this).data('type');

        var url = "<?php echo e(route('invoices.send_invoice', ':id')); ?>";
        url = url.replace(':id', id);

        $.easyAjax({
            type: 'POST',
            url: url,
            container: '.content-wrapper',
            blockUI: true,
            data: {
                '_token': token,
                'data_type': type,
                'type': 'send'
            },
            success: function (response) {
                if (response.status == "success") {
                    window.location.reload();
                }
            }
        });
    });

    $('body').on('click', '.reminderButton', function () {
        var id = $(this).data('invoice-id');
        var token = "<?php echo e(csrf_token()); ?>";

        var url = "<?php echo e(route('invoices.payment_reminder', ':id')); ?>";
        url = url.replace(':id', id);

        $.easyAjax({
            type: 'GET',
            container: '#invoices-table',
            blockUI: true,
            url: url,
            success: function (response) {
                if (response.status == "success") {
                    $.unblockUI();
                }
            }
        });
    });

    $('body').on('click', '.cancel-invoice', function () {
        var id = $(this).data('invoice-id');
        Swal.fire({
            title: "<?php echo app('translator')->get('messages.sweetAlertTitle'); ?>",
            text: "<?php echo app('translator')->get('messages.invoiceText'); ?>",
            icon: 'warning',
            showCancelButton: true,
            focusConfirm: false,
            confirmButtonText: "<?php echo app('translator')->get('app.yes'); ?>",
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
                var token = "<?php echo e(csrf_token()); ?>";

                var url = "<?php echo e(route('invoices.update_status', ':id')); ?>";
                url = url.replace(':id', id);

                $.easyAjax({
                    type: 'GET',
                    url: url,
                    container: '#invoices-table',
                    blockUI: true,
                    success: function (response) {
                        if (response.status == "success") {
                            window.location.reload();
                        }
                    }
                });
            }
        });
    });

    $('body').on('click', '.delete-invoice', function () {
        var id = $(this).data('invoice-id');
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
                var token = "<?php echo e(csrf_token()); ?>";

                var url = "<?php echo e(route('invoices.destroy', ':id')); ?>";
                url = url.replace(':id', id);

                $.easyAjax({
                    type: 'POST',
                    url: url,
                    blockUI: true,
                    data: {
                        '_token': token,
                        '_method': 'DELETE'
                    },
                    success: function (response) {
                        if (response.status == "success") {
                            window.location.href = "<?php echo e(route('invoices.index')); ?>";
                        }
                    }
                });
            }
        });
    });

    $('body').on('click', '.toggle-shipping-address', function () {
        let invoiceId = $(this).data('invoice-id');

        let url = "<?php echo e(route('invoices.toggle_shipping_address', ':id')); ?>";
        url = url.replace(':id', invoiceId);

        $.easyAjax({
            url: url,
            type: 'GET',
            container: '#invoices-table',
            blockUI: true,
            success: function (response) {
                if (response.status === 'success') {
                    window.location.reload();
                }
            }
        });
    });

    $('body').on('click', '.add-shipping-address', function () {
        let invoiceId = $(this).data('invoice-id');

        var url = "<?php echo e(route('invoices.shipping_address_modal', [':id'])); ?>";
        url = url.replace(':id', invoiceId);

        $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
        $.ajaxModal(MODAL_LG, url);
    });

    $('body').on('click', '.invoice-upload', function () {
        var invoiceId = $(this).data('invoice-id');
        const url = "<?php echo e(route('invoices.file_upload')); ?>?invoice_id=" + invoiceId;
        $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
        $.ajaxModal(MODAL_LG, url);
    });

    $('body').on('click', '.unpaidAndPartialPaidCreditNote', function () {
        var id = $(this).data('invoice-id');

        Swal.fire({
            title: "<?php echo app('translator')->get('messages.confirmation.createCreditNotes'); ?>",
            text: "<?php echo app('translator')->get('messages.creditText'); ?>",
            icon: 'warning',
            showCancelButton: true,
            focusConfirm: false,
            confirmButtonText: "<?php echo app('translator')->get('app.yes'); ?>",
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
                var url = "<?php echo e(route('creditnotes.create')); ?>?invoice=:id";
                url = url.replace(':id', id);

                location.href = url;
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
                var url = "<?php echo e(route('invoice-files.destroy', ':id')); ?>";
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
                            $('#invoice-file-list').html(response.view);
                        }
                    }
                });
            }
        });
    });
</script>
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\invoices\ajax\show.blade.php ENDPATH**/ ?>