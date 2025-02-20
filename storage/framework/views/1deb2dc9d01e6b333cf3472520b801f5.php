<style>
    #logo {
        height: 50px;
    }

</style>

<!-- INVOICE CARD START -->
<?php if(!is_null($invoice->project) && !is_null($invoice->project->client) && !is_null($invoice->project->client->clientDetails)): ?>
    <?php
        $client = $invoice->project->client;
    ?>
<?php elseif(!is_null($invoice->client_id) && !is_null($invoice->clientDetails)): ?>
    <?php
        $client = $invoice->client;
    ?>
<?php endif; ?>

<div class="d-lg-flex">
    <div class="w-100 py-0 py-md-0 ">
        <?php if (isset($component)) { $__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9 = $attributes; } ?>
<?php $component = App\View\Components\Cards\Data::resolve(['title' => __('app.recurring') . ' ' . __('app.details')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Data::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => ' mt-4']); ?>
            <div class="col-12 px-0 pb-3 d-block d-lg-flex d-md-flex">
                <p class="mb-0 text-lightest f-14 w-30 d-inline-block text-capitalize">
                    <?php echo app('translator')->get('modules.recurringInvoice.completedTotalInvoice'); ?></p>
                <p class="mb-0 text-dark-grey f-14 ">
                    <?php if(!is_null($invoice->billing_cycle)): ?>
                        <?php echo e($invoice->recurrings->count()); ?>/<?php echo e($invoice->billing_cycle); ?>

                    <?php else: ?>
                        <?php echo e($invoice->recurrings->count()); ?>/<span class="px-1"><label class="badge badge-primary"><?php echo app('translator')->get('app.infinite'); ?></label></span>
                    <?php endif; ?>
                </p>
            </div>
            <?php if(count($invoice->recurrings) > 0): ?>
                <?php if (isset($component)) { $__componentOriginalfc012cd47eee5094db538668bc6edefd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfc012cd47eee5094db538668bc6edefd = $attributes; } ?>
<?php $component = App\View\Components\Cards\DataRow::resolve(['label' => __('modules.recurringInvoice.lastInvoiceDate'),'value' => $invoice->recurrings->last()->issue_date->translatedFormat(company()->date_format)] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data-row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\DataRow::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfc012cd47eee5094db538668bc6edefd)): ?>
<?php $attributes = $__attributesOriginalfc012cd47eee5094db538668bc6edefd; ?>
<?php unset($__attributesOriginalfc012cd47eee5094db538668bc6edefd); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfc012cd47eee5094db538668bc6edefd)): ?>
<?php $component = $__componentOriginalfc012cd47eee5094db538668bc6edefd; ?>
<?php unset($__componentOriginalfc012cd47eee5094db538668bc6edefd); ?>
<?php endif; ?>
            <?php else: ?>
                <?php if (isset($component)) { $__componentOriginalfc012cd47eee5094db538668bc6edefd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfc012cd47eee5094db538668bc6edefd = $attributes; } ?>
<?php $component = App\View\Components\Cards\DataRow::resolve(['label' => __('modules.recurringInvoice.firstInvoiceDate'),'value' => $invoice->issue_date ? $invoice->issue_date->translatedFormat(company()->date_format) : '----'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data-row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\DataRow::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfc012cd47eee5094db538668bc6edefd)): ?>
<?php $attributes = $__attributesOriginalfc012cd47eee5094db538668bc6edefd; ?>
<?php unset($__attributesOriginalfc012cd47eee5094db538668bc6edefd); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfc012cd47eee5094db538668bc6edefd)): ?>
<?php $component = $__componentOriginalfc012cd47eee5094db538668bc6edefd; ?>
<?php unset($__componentOriginalfc012cd47eee5094db538668bc6edefd); ?>
<?php endif; ?>
            <?php endif; ?>

            <?php if (isset($component)) { $__componentOriginalfc012cd47eee5094db538668bc6edefd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfc012cd47eee5094db538668bc6edefd = $attributes; } ?>
<?php $component = App\View\Components\Cards\DataRow::resolve(['label' => __('modules.recurringInvoice.nextInvoice').' '.__('app.date'),'value' => $invoice->next_invoice_date ? $invoice->next_invoice_date->translatedFormat(company()->date_format) : '----'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data-row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\DataRow::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfc012cd47eee5094db538668bc6edefd)): ?>
<?php $attributes = $__attributesOriginalfc012cd47eee5094db538668bc6edefd; ?>
<?php unset($__attributesOriginalfc012cd47eee5094db538668bc6edefd); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfc012cd47eee5094db538668bc6edefd)): ?>
<?php $component = $__componentOriginalfc012cd47eee5094db538668bc6edefd; ?>
<?php unset($__componentOriginalfc012cd47eee5094db538668bc6edefd); ?>
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
<div class="d-lg-flex">

    <div class="w-100 py-0 py-lg-4 py-md-0 ">

        <div class="card border-0 invoice">
            <!-- CARD BODY START -->
            <div class="card-body">

                <div class="invoice-table-wrapper">
                    <table width="100%" class="">
                        <tr class="inv-logo-heading">
                            <td><img src="<?php echo e(invoice_setting()->logo_url); ?>"
                                    alt="<?php echo e(company()->company_name); ?>" id="logo" /></td>
                            <td align="right"
                                class="font-weight-bold f-21 text-dark text-uppercase mt-4 mt-lg-0 mt-md-0">
                                <?php echo app('translator')->get('app.invoice'); ?></td>
                        </tr>
                        <tr class="inv-num">
                            <td class="f-14 text-dark">
                                <p class="mt-3 mb-0">
                                    <?php echo e(company()->company_name); ?><br>
                                    <?php if(!is_null($settings)): ?>
                                        <?php echo nl2br(default_address()->address); ?><br>
                                        <?php echo e(company()->company_phone); ?>

                                    <?php endif; ?>
                                    <?php if($invoiceSetting->show_gst == 'yes' && $invoice->address): ?>
                                        <br><?php echo e($invoice->address->tax_name); ?>: <?php echo e($invoice->address->tax_number); ?>

                                    <?php endif; ?>
                                </p><br>
                            </td>
                            <td align="right">
                                <table class="inv-num-date text-dark f-13 mt-3">
                                    <tr>
                                        <td class="bg-light-grey border-right-0 f-w-500">
                                            <?php echo app('translator')->get('modules.invoices.invoiceDate'); ?></td>
                                        <td class="border-left-0">
                                            <?php echo e($invoice->issue_date->translatedFormat(company()->date_format)); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bg-light-grey border-right-0 f-w-500"><?php echo app('translator')->get('app.dueDate'); ?></td>
                                        <td class="border-left-0">
                                            --
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
                                <p class="mb-0 text-left"><span
                                        class="text-dark-grey text-capitalize"><?php echo app('translator')->get('modules.invoices.billedTo'); ?></span><br>

                                    <?php
                                        if ($invoice->project && $invoice->project->client) {
                                            $client = $invoice->project->client;
                                        } elseif ($invoice->client_id != '') {
                                            $client = $invoice->client;
                                        } elseif ($invoice->estimate && $invoice->estimate->client) {
                                            $client = $invoice->estimate->client;
                                        }
                                    ?>

                                    <?php echo e($client->name_salutation); ?><br>
                                    <?php echo e($client->clientDetails->company_name); ?><br>
                                    <?php echo nl2br($client->clientDetails->address); ?></p>
                            </td>
                            <?php if($invoice->shipping_address): ?>
                                <td class="f-14 text-black">
                                    <p class="mb-0 text-left"><span
                                            class="text-dark-grey text-capitalize"><?php echo app('translator')->get('app.shippingAddress'); ?></span><br>
                                        <?php echo nl2br($client->clientDetails->address); ?></p>
                                </td>
                            <?php endif; ?>
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
                                        <td class="border-right-0"><?php echo app('translator')->get('app.description'); ?></td>
                                        <?php if($invoiceSetting->hsn_sac_code_show): ?>
                                            <td class="border-right-0 border-left-0" align="right"><?php echo app('translator')->get('app.hsnSac'); ?>
                                        <?php endif; ?>
                                        <td class="border-right-0 border-left-0" align="right"><?php echo app('translator')->get('modules.invoices.qty'); ?>
                                        </td>
                                        <td class="border-right-0 border-left-0" align="right">
                                            <?php echo app('translator')->get('modules.invoices.unitPrice'); ?> (<?php echo e($invoice->currency->currency_code); ?>)
                                        </td>
                                        <td class="border-left-0" align="right">
                                            <?php echo app('translator')->get('modules.invoices.amount'); ?>
                                            (<?php echo e($invoice->currency->currency_code); ?>)</td>
                                    </tr>
                                    <?php $__currentLoopData = $invoice->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($item->type == 'item'): ?>
                                            <tr class="text-dark">
                                                <td><?php echo e($item->item_name); ?></td>
                                                <?php if($invoiceSetting->hsn_sac_code_show): ?>
                                                    <td align="right"><?php echo e($item->hsn_sac_code); ?></td>
                                                <?php endif; ?>
                                                <td align="right"><?php echo e($item->quantity); ?><?php if($item->unit): ?><br><span class="f-11 text-dark-grey"><?php echo e($item->unit->unit_type); ?></span><?php endif; ?></td>
                                                <td align="right">
                                                    <?php echo e(number_format((float) $item->unit_price, 2, '.', '')); ?></td>
                                                <td align="right">
                                                    <?php echo e(number_format((float) $item->amount, 2, '.', '')); ?>

                                                </td>
                                            </tr>
                                            <?php if($item->item_summary != '' || $item->recurringInvoiceItemImage): ?>
                                                <tr class="text-dark">
                                                    <td colspan="<?php echo e($invoiceSetting->hsn_sac_code_show ? '5' : '4'); ?>"
                                                        class="border-bottom-0"><?php echo nl2br(strip_tags($item->item_summary)); ?>

                                                        <?php if($item->recurringInvoiceItemImage): ?>
                                                            <p class="mt-2">
                                                                <a href="javascript:;" class="img-lightbox"
                                                                    data-image-url="<?php echo e($item->recurringInvoiceItemImage->file_url); ?>">
                                                                    <img src="<?php echo e($item->recurringInvoiceItemImage->file_url); ?>"
                                                                        width="80" height="80" class="img-thumbnail">
                                                                </a>
                                                            </p>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <p class="mb-0">
                                        <?php if($invoiceSetting->show_project == 1 && isset($invoice->project->project_name)): ?>
                                            <span class="text-dark-grey text-capitalize"><?php echo app('translator')->get('modules.invoices.projectName'); ?></span><br>
                                            <?php echo e($invoice->project->project_name); ?>

                                        <?php endif; ?>
                                        <br><br>
                                    </p>
                                    <tr>
                                        <td colspan="2" class="blank-td border-bottom-0 border-left-0 border-right-0">
                                        </td>
                                        <td colspan="3" class="p-0 ">
                                            <table width="100%">
                                                <tr class="text-dark-grey" align="right">
                                                    <td class="w-50 border-top-0 border-left-0">
                                                        <?php echo app('translator')->get('modules.invoices.subTotal'); ?></td>
                                                    <td class="border-top-0 border-right-0">
                                                        <?php echo e(number_format((float) $invoice->sub_total, 2, '.', '')); ?>

                                                    </td>
                                                </tr>
                                                <?php if($discount != 0 && $discount != ''): ?>
                                                    <tr class="text-dark-grey" align="right">
                                                        <td class="w-50 border-top-0 border-left-0">
                                                            <?php echo app('translator')->get('modules.invoices.discount'); ?></td>
                                                        <td class="border-top-0 border-right-0">
                                                            <?php echo e(number_format((float) $discount, 2, '.', '')); ?></td>
                                                    </tr>
                                                <?php endif; ?>
                                                <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr class="text-dark-grey" align="right">
                                                        <td class="w-50 border-top-0 border-left-0">
                                                            <?php echo e($key); ?></td>
                                                        <td class="border-top-0 border-right-0">
                                                            <?php echo e(number_format((float) $tax, 2, '.', '')); ?></td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <tr class=" text-dark-grey font-weight-bold" align="right">
                                                    <td class="w-50 border-bottom-0 border-left-0">
                                                        <?php echo app('translator')->get('modules.invoices.total'); ?></td>
                                                    <td class="border-bottom-0 border-right-0">
                                                        <?php echo e(number_format((float) $invoice->total, 2, '.', '')); ?></td>
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
                                            <tr width="100%">
                                                <td class="border-left-0 border-right-0 border-top-0">
                                                    <?php echo e($item->item_name); ?></td>
                                            </tr>
                                            <?php if($item->item_summary != ''): ?>
                                                <tr>
                                                    <td class="border-left-0 border-right-0 border-bottom-0">
                                                        <?php echo nl2br(strip_tags($item->item_summary)); ?></td>
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
                                        <?php echo app('translator')->get('modules.invoices.unitPrice'); ?>
                                        (<?php echo e($invoice->currency->currency_code); ?>)</th>
                                    <td width="50%"><?php echo e(number_format((float) $item->unit_price, 2, '.', '')); ?></td>
                                </tr>
                                <tr>
                                    <th width="50%" class="bg-light-grey text-dark-grey font-weight-bold">
                                        <?php echo app('translator')->get('modules.invoices.amount'); ?>
                                        (<?php echo e($invoice->currency->currency_code); ?>)</th>
                                    <td width="50%"><?php echo e(number_format((float) $item->amount, 2, '.', '')); ?></td>
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
                                <?php echo e(number_format((float) $invoice->sub_total, 2, '.', '')); ?></td>
                        </tr>
                        <?php if($discount != 0 && $discount != ''): ?>
                            <tr>
                                <th width="50%" class="text-dark-grey font-weight-normal"><?php echo app('translator')->get('modules.invoices.discount'); ?>
                                </th>
                                <td width="50%" class="text-dark-grey font-weight-normal">
                                    <?php echo e(number_format((float) $discount, 2, '.', '')); ?></td>
                            </tr>
                        <?php endif; ?>

                        <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th width="50%" class="text-dark-grey font-weight-normal"><?php echo e($key); ?></th>
                                <td width="50%" class="text-dark-grey font-weight-normal">
                                    <?php echo e(number_format((float) $tax, 2, '.', '')); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <th width="50%" class="text-dark-grey font-weight-bold"><?php echo app('translator')->get('modules.invoices.total'); ?></th>
                            <td width="50%" class="text-dark-grey font-weight-bold">
                                <?php echo e(number_format((float) $invoice->total, 2, '.', '')); ?></td>
                        </tr>
                    </table>
                    <table class="inv-note">
                        <tr>
                            <td height="30" colspan="2"></td>
                        </tr>
                        <tr>
                            <td>
                                <table>
                                    <tr><?php echo app('translator')->get('app.note'); ?></tr>
                                    <tr>
                                        <p class="text-dark-grey"><?php echo $invoice->note ?? '--'; ?></p>
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
                    </table>
                </div>
            </div>
            <!-- CARD BODY END -->

        </div>

    </div>
</div>
<!-- INVOICE CARD END -->
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/recurring-invoices/ajax/overview.blade.php ENDPATH**/ ?>