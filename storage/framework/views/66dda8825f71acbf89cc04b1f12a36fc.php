<style>
    #logo {
        height: 50px;
    }

</style>

<!-- INVOICE CARD START -->
<?php if(!is_null($creditNote->project_id) && isset($creditNote->project->clientDetails)): ?>
    <?php
        $client = $creditNote->project->client;
    ?>
<?php elseif(!is_null($creditNote->client_id)): ?>
    <?php
        $client = $creditNote->client;
    ?>
<?php endif; ?>
<div class="card border-0 invoice">
    <!-- CARD BODY START -->
    <div class="card-body">
        <div class="invoice-table-wrapper">
            <table width="100%" class="">
                <tr class="inv-logo-heading">
                    <td><img src="<?php echo e(invoice_setting()->logo_url); ?>" alt="<?php echo e(company()->company_name); ?>"
                            id="logo" /></td>
                    <td align="right" class="font-weight-bold f-21 text-dark text-uppercase mt-4 mt-lg-0 mt-md-0">
                        <?php echo app('translator')->get('app.credit-note'); ?></td>
                </tr>
                <tr class="inv-num">
                    <td class="f-14 text-dark">
                        <p class="mt-3 mb-0">
                            <?php echo e(company()->company_name); ?><br>
                            <?php if(!is_null($settings)): ?>
                                <?php echo nl2br(default_address()->address); ?><br>
                                <?php echo e(company()->company_phone); ?>

                            <?php endif; ?>
                            <?php if($creditNoteSetting->show_gst == 'yes' && !is_null($creditNoteSetting->gst_number)): ?>
                                <br><?php echo app('translator')->get('app.gstIn'); ?>: <?php echo e($creditNoteSetting->gst_number); ?>

                            <?php endif; ?>



                        </p><br>
                    </td>
                    <td align="right">
                        <table class="inv-num-date text-dark f-13 mt-3">
                            <tr>
                                <td class="bg-light-grey border-right-0 f-w-500"><?php echo app('translator')->get('app.credit-note'); ?></td>
                                <td class="border-left-0"><?php echo e($creditNote->cn_number); ?></td>
                            </tr>
                            <?php if($invoiceExist && $creditNote->invoice_id): ?>
                                <tr>
                                    <td class="bg-light-grey border-right-0 f-w-500">
                                        <?php echo app('translator')->get('modules.invoices.invoiceNumber'); ?></td>
                                    <td class="border-left-0"><?php echo e($creditNote->invoice->invoice_number); ?></td>
                                </tr>
                            <?php endif; ?>
                            <tr>
                                <td class="bg-light-grey border-right-0 f-w-500">
                                    <?php echo app('translator')->get('app.creditNoteDate'); ?></td>
                                <td class="border-left-0"><?php echo e($creditNote->issue_date->translatedFormat(company()->date_format)); ?>

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
                                class="text-dark-grey text-capitalize"><?php echo app('translator')->get("modules.invoices.billedTo"); ?></span><br>
                            <?php echo e($client->name_salutation); ?><br>
                            <?php echo e($client->clientDetails->company_name); ?><br>
                            <?php echo nl2br($client->clientDetails->address); ?>


                            <?php if(($invoiceSetting->show_project == 1) && (isset($creditNote->project))): ?>
                            <br><br>
                            <span class="text-dark-grey text-capitalize"><?php echo app('translator')->get("modules.invoices.projectName"); ?></span><br>
                            <?php echo e($creditNote->project->project_name); ?>

                            <?php endif; ?>
                        </p>
                    </td>

                    <td align="right" class="mt-4 mt-lg-0 mt-md-0">
                        <span
                            class="unpaid <?php echo e($creditNote->status == 'open' ? 'text-success border-success' : ''); ?> rounded f-15 "><?php echo app('translator')->get('modules.credit-notes.'.$creditNote->status); ?></span>
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
                                <?php if($creditNoteSetting->hsn_sac_code_show): ?>
                                    <td class="border-right-0 border-left-0" align="right"><?php echo app('translator')->get("app.hsnSac"); ?>
                                <?php endif; ?>
                                <td class="border-right-0 border-left-0" align="right">
                                    <?php echo app('translator')->get('modules.invoices.qty'); ?>
                                </td>
                                <td class="border-right-0 border-left-0" align="right">
                                    <?php echo app('translator')->get("modules.invoices.unitPrice"); ?>
                                </td>
                                <td class="border-left-0" align="right"><?php echo app('translator')->get("modules.invoices.tax"); ?></td>
                                <td class="border-left-0" align="right" width="20%">
                                    <?php echo app('translator')->get("modules.invoices.amount"); ?>
                                    (<?php echo e($creditNote->currency->currency_code); ?>)</td>
                            </tr>
                            <?php $__currentLoopData = $creditNote->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($item->type == 'item'): ?>
                                    <tr class="text-dark font-weight-semibold f-13">
                                        <td><?php echo e($item->item_name); ?></td>
                                        <?php if($creditNoteSetting->hsn_sac_code_show): ?>
                                            <td align="right"><?php echo e($item->hsn_sac_code ? $item->hsn_sac_code : '--'); ?></td>
                                        <?php endif; ?>
                                        <td align="right"><?php echo e($item->quantity); ?><?php if($item->unit): ?><br><span class="f-11 text-dark-grey"><?php echo e($item->unit->unit_type); ?></span><?php endif; ?></td>
                                        <td align="right">
                                            <?php echo e(currency_format($item->unit_price, $creditNote->currency_id, false)); ?></td>
                                        <td align="right"><?php echo e($item->tax_list); ?></td>
                                        <td align="right"><?php echo e(currency_format($item->amount, $creditNote->currency_id, false)); ?>

                                        </td>
                                    </tr>
                                    <?php if($item->item_summary || $item->creditNoteItemImage): ?>
                                        <tr class="text-dark f-12">
                                            <td colspan="<?php echo e($creditNoteSetting->hsn_sac_code_show ? '6' : '5'); ?>" class="border-bottom-0">
                                                <?php echo nl2br(strip_tags($item->item_summary)); ?>

                                                <?php if($item->creditNoteItemImage): ?>
                                                    <p class="mt-2">
                                                        <a href="javascript:;" class="img-lightbox" data-image-url="<?php echo e($item->creditNoteItemImage->file_url); ?>">
                                                            <img src="<?php echo e($item->creditNoteItemImage->file_url); ?>" width="80" height="80" class="img-thumbnail">
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
                                        <tr class=" text-dark-grey " align="right">
                                            <td class="w-50 border-bottom-0 border-left-0">
                                                <?php echo app('translator')->get('app.adjustmentAmount'); ?></td>
                                        </tr>
                                        <tr class=" text-dark-grey font-weight-bold" align="right">
                                            <td class="w-50 border-bottom-0 border-left-0">
                                                <?php echo app('translator')->get("modules.invoices.total"); ?></td>
                                        </tr>
                                        <tr class=" text-dark-grey " align="right">
                                            <td class="w-50 border-bottom-0 border-left-0">
                                                <?php echo app('translator')->get("modules.credit-notes.creditAmountUsed"); ?></td>
                                        </tr>
                                        <tr class="bg-light-grey text-dark f-w-500 f-16" align="right">
                                            <td class="w-50 border-bottom-0 border-left-0">
                                                <?php echo app('translator')->get('modules.credit-notes.creditAmountRemaining'); ?></td>
                                        </tr>
                                    </table>
                                </td>
                                <td class="p-0 border-right-0" align="right">
                                    <table width="100%">
                                        <tr class="text-dark-grey" align="right">
                                            <td class="border-top-0 border-left-0">
                                                <?php echo e(currency_format($creditNote->sub_total, $creditNote->currency_id, false)); ?></td>
                                        </tr>
                                        <?php if($discount != 0 && $discount != ''): ?>
                                            <tr class="text-dark-grey" align="right">
                                                <td class="border-top-0 border-left-0">
                                                    <?php echo e(currency_format($discount, $creditNote->currency_id, false)); ?></td>
                                            </tr>
                                        <?php endif; ?>
                                        <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr class="text-dark-grey" align="right">
                                                <td class="border-top-0 border-left-0">
                                                    <?php echo e(currency_format($tax, $creditNote->currency_id, false)); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <tr class=" text-dark-grey " align="right">
                                            <td class="border-bottom-0 border-left-0">
                                                <?php echo e(currency_format($creditNote->adjustment_amount, $creditNote->currency_id, false)); ?>

                                            </td>
                                        </tr>
                                        <tr class=" text-dark-grey font-weight-bold" align="right">
                                            <td class="border-bottom-0 border-left-0">
                                                <?php echo e(currency_format($creditNote->total, $creditNote->currency_id, false)); ?></td>
                                        </tr>
                                        <tr class=" text-dark-grey " align="right">
                                            <td class="border-bottom-0 border-left-0">
                                                <?php echo e(currency_format($creditNote->creditAmountUsed(), $creditNote->currency_id, false)); ?>

                                            </td>
                                        </tr>
                                        <tr class="bg-light-grey text-dark f-w-500 f-16" align="right">
                                            <td class="border-bottom-0 border-left-0">
                                                <?php echo e(currency_format($creditNote->creditAmountRemaining(), $creditNote->currency_id, false)); ?>

                                                <?php echo e($creditNote->currency->currency_code); ?></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>

                </tr>
            </table>
            <table width="100%" class="inv-desc-mob d-block d-lg-none d-md-none">

                <?php $__currentLoopData = $creditNote->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                    <?php if($item->item_summary != '' || $item->creditNoteItemImage): ?>
                                        <tr>
                                            <td class="border-left-0 border-right-0 border-bottom-0 f-12">
                                                <?php echo nl2br(strip_tags($item->item_summary)); ?>

                                                <?php if($item->creditNoteItemImage): ?>
                                                    <p class="mt-2">
                                                        <a href="javascript:;" class="img-lightbox" data-image-url="<?php echo e($item->creditNoteItemImage->file_url); ?>">
                                                            <img src="<?php echo e($item->creditNoteItemImage->file_url); ?>" width="80" height="80" class="img-thumbnail">
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
                                <?php echo app('translator')->get("modules.invoices.unitPrice"); ?>
                                (<?php echo e($creditNote->currency->currency_code); ?>)</th>
                            <td width="50%"><?php echo e(currency_format($item->unit_price, $creditNote->currency_id, false)); ?></td>
                        </tr>
                        <tr>
                            <th width="50%" class="bg-light-grey text-dark-grey font-weight-bold">
                                <?php echo app('translator')->get("modules.invoices.amount"); ?>
                                (<?php echo e($creditNote->currency->currency_code); ?>)</th>
                            <td width="50%"><?php echo e(currency_format($item->amount, $creditNote->currency_id, false)); ?></td>
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
                        <?php echo e(currency_format($creditNote->sub_total, $creditNote->currency_id, false)); ?></td>
                </tr>
                <?php if($discount != 0 && $discount != ''): ?>
                    <tr>
                        <th width="50%" class="text-dark-grey font-weight-normal"><?php echo app('translator')->get("modules.invoices.discount"); ?>
                        </th>
                        <td width="50%" class="text-dark-grey font-weight-normal">
                            <?php echo e(currency_format($discount, $creditNote->currency_id, false)); ?></td>
                    </tr>
                <?php endif; ?>

                <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th width="50%" class="text-dark-grey font-weight-normal"><?php echo e($key); ?></th>
                        <td width="50%" class="text-dark-grey font-weight-normal">
                            <?php echo e(currency_format($tax, $creditNote->currency_id, false)); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <th width="50%" class="text-dark-grey font-weight-bold"><?php echo app('translator')->get("modules.invoices.total"); ?></th>
                    <td width="50%" class="text-dark-grey font-weight-bold">
                        <?php echo e(currency_format($creditNote->total, $creditNote->currency_id, false)); ?></td>
                </tr>
                <tr>
                    <th width="50%" class="text-dark-grey font-weight-bold">
                        <?php echo app('translator')->get('modules.credit-notes.creditAmountUsed'); ?></th>
                    <td width="50%" class="text-dark-grey font-weight-bold">
                        <?php echo e(currency_format($creditNote->creditAmountUsed(), $creditNote->currency_id, false)); ?></td>
                </tr>
                <tr>
                    <th width="50%" class="f-16 bg-light-grey text-dark font-weight-bold">
                        <?php echo app('translator')->get("modules.invoices.total"); ?>
                        <?php echo app('translator')->get("modules.invoices.due"); ?></th>
                    <td width="50%" class="f-16 bg-light-grey text-dark font-weight-bold">
                        <?php echo e(currency_format($creditNote->creditAmountRemaining(), $creditNote->currency_id, false)); ?>

                        <?php echo e($creditNote->currency->currency_code); ?></td>
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
                                <p class="text-dark-grey"><?php echo $creditNote->note ? nl2br($creditNote->note) : '--'; ?></p>
                            </tr>
                        </table>
                    </td>
                    <td align="right">
                        <table>
                            <tr><?php echo app('translator')->get('modules.invoiceSettings.invoiceTerms'); ?></tr>
                            <tr>
                                <p class="text-dark-grey"><?php echo nl2br($creditNoteSetting->invoice_terms); ?></p>
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
            </table>
        </div>
    </div>
    <!-- CARD BODY END -->
    <!-- CARD FOOTER START -->
    <div class="card-footer bg-white border-0 d-flex justify-content-start py-0 py-lg-4 py-md-4 mb-4 mb-lg-3 mb-md-3 ">


        <div class="d-flex mb-4">
            <div class="inv-action mr-3 mr-lg-3 mr-md-3 dropup">
                <button class="dropdown-toggle btn-primary" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false"><?php echo app('translator')->get('app.action'); ?>
                    <span><i class="fa fa-chevron-down f-15"></i></span>
                </button>
                <!-- DROPDOWN - INFORMATION -->
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" tabindex="0">
                    <li>
                        <a class="dropdown-item f-14 text-dark"
                            href="<?php echo e(route('creditnotes.download', [$creditNote->id])); ?>">
                            <i class="fa fa-download f-w-500 mr-2 f-11"></i> <?php echo app('translator')->get('app.download'); ?>
                        </a>
                    </li>
                    <?php if($creditNote->status == 'open' && !in_array('client', user_roles())): ?>
                        <li>
                            <a class="dropdown-item f-14 text-dark openRightModal"
                                href="<?php echo e(route('creditnotes.apply_to_invoice', [$creditNote->id])); ?>">
                                <i class="fa fa-receipt f-w-500 mr-2 f-11"></i> <?php echo app('translator')->get('app.applyToInvoice'); ?>
                            </a>
                        </li>
                    <?php endif; ?>

                </ul>
            </div>
        </div>

        <?php if($invoiceExist && $creditNote->invoice_id): ?>
            <?php if (isset($component)) { $__componentOriginal29acd9b76240152ae380821b082bd629 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal29acd9b76240152ae380821b082bd629 = $attributes; } ?>
<?php $component = App\View\Components\Forms\LinkSecondary::resolve(['icon' => 'receipt','link' => route('invoices.show', [$creditNote->invoice_id])] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.link-secondary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\LinkSecondary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-3 mb-4']); ?>
                <?php echo app('translator')->get('app.viewInvoice'); ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal29acd9b76240152ae380821b082bd629)): ?>
<?php $attributes = $__attributesOriginal29acd9b76240152ae380821b082bd629; ?>
<?php unset($__attributesOriginal29acd9b76240152ae380821b082bd629); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal29acd9b76240152ae380821b082bd629)): ?>
<?php $component = $__componentOriginal29acd9b76240152ae380821b082bd629; ?>
<?php unset($__componentOriginal29acd9b76240152ae380821b082bd629); ?>
<?php endif; ?>
        <?php endif; ?>

        <?php if($creditNote->payment->count() > 0): ?>
            <?php if (isset($component)) { $__componentOriginal29acd9b76240152ae380821b082bd629 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal29acd9b76240152ae380821b082bd629 = $attributes; } ?>
<?php $component = App\View\Components\Forms\LinkSecondary::resolve(['icon' => 'eye','link' => route('creditnotes.credited_invoices', $creditNote->id)] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.link-secondary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\LinkSecondary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-3 openRightModal mb-4']); ?>
                <?php echo app('translator')->get('app.creditedInvoices'); ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal29acd9b76240152ae380821b082bd629)): ?>
<?php $attributes = $__attributesOriginal29acd9b76240152ae380821b082bd629; ?>
<?php unset($__attributesOriginal29acd9b76240152ae380821b082bd629); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal29acd9b76240152ae380821b082bd629)): ?>
<?php $component = $__componentOriginal29acd9b76240152ae380821b082bd629; ?>
<?php unset($__componentOriginal29acd9b76240152ae380821b082bd629); ?>
<?php endif; ?>
        <?php endif; ?>

        <?php if (isset($component)) { $__componentOriginalc35c79ed7e812580313ad04118477974 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc35c79ed7e812580313ad04118477974 = $attributes; } ?>
<?php $component = App\View\Components\Forms\ButtonCancel::resolve(['link' => route('creditnotes.index')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-cancel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonCancel::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'border-0 mr-3 mb-4']); ?><?php echo app('translator')->get('app.cancel'); ?>
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
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/credit-notes/ajax/show.blade.php ENDPATH**/ ?>