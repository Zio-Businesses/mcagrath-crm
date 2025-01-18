<style>
    #logo {
        height: 50px;
    }
</style>

<!-- INVOICE CARD START -->
<?php if(!is_null($order->client_id) && !is_null($order->clientDetails)): ?>
    <?php
        $client = $order->client;
    ?>
<?php endif; ?>
<?php
$editOrderPermission = user()->permission('edit_order');
$deleteOrderPermission = user()->permission('delete_order');
?>

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
            <table width="100%" class="">
                <tr class="inv-logo-heading">
                    <td><img src="<?php echo e(invoice_setting()->logo_url); ?>" alt="<?php echo e(company()->company_name); ?>"
                            id="logo" /></td>
                    <td align="right" class="font-weight-bold f-21 text-dark text-uppercase mt-4 mt-lg-0 mt-md-0">
                        <?php echo app('translator')->get('app.order'); ?></td>
                </tr>
                <tr class="inv-num">
                    <td class="f-14 text-dark">
                        <p class="mt-3 mb-0">
                            <?php echo e(company()->company_name); ?><br>
                            <?php if(!is_null($settings) && $order->address): ?>
                                <?php echo nl2br($order->address->address); ?><br>
                            <?php endif; ?>
                            <?php echo e(company()->company_phone); ?><br>
                            <?php if($invoiceSetting && $invoiceSetting->show_gst == 'yes' && $order->address->tax_name): ?>
                                <br><?php echo e($order->address->tax_name); ?>: <?php echo e($order->address->tax_number); ?>

                            <?php endif; ?>
                        </p><br>
                    </td>
                    <td align="right">
                        <table class="inv-num-date text-dark f-13 mt-3">
                            <tr>
                                <td class="bg-light-grey border-right-0 f-w-500">
                                    <?php echo app('translator')->get('modules.orders.orderNumber'); ?></td>
                                <td class="border-left-0"><?php echo e($pageTitle); ?></td>
                            </tr>
                            <tr>
                                <td class="bg-light-grey border-right-0 f-w-500">
                                    <?php echo app('translator')->get('modules.orders.orderDate'); ?></td>
                                <td class="border-left-0">
                                    <?php echo e(\Carbon\Carbon::parse($order->order_date)->translatedFormat(company()->date_format)); ?>

                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <table width="100%">
                <?php if($order->project): ?>
                    <tr>
                        <td class="f-14 text-dark">
                            <?php echo app('translator')->get('modules.invoices.project'); ?>:
                            <p class="mb-3">
                                <?php if($order->project): ?>
                                    <?php echo e($order->project->project_name); ?>

                                <?php endif; ?>
                            </p>
                        </td>
                    </tr>
                <?php endif; ?>
                <tr class="inv-unpaid">

                    <td class="f-14 text-dark">
                        <p><?php echo app('translator')->get("modules.invoices.billedTo"); ?>:</p>
                        <p class="mt-3 mb-0">
                        <?php if($order->client->name && $invoiceSetting->show_client_name == 'yes'): ?>
                            <?php echo e($order->client->name_salutation); ?><br>
                        <?php endif; ?>

                        <?php if($order->client->email && $invoiceSetting->show_client_email == 'yes'): ?>
                            <?php echo e($order->client->email); ?><br>
                        <?php endif; ?>

                        <?php if($order->client->mobile && $invoiceSetting->show_client_phone == 'yes'): ?>
                            <?php echo e($order->client->mobile_with_phonecode); ?><br>
                        <?php endif; ?>

                        <?php if($order->client->clientDetails->company_name && $invoiceSetting->show_client_company_name == 'yes'): ?>
                            <?php echo e($order->client->clientDetails->company_name); ?><br>
                        <?php endif; ?>

                        <?php if($order->client->clientDetails->address && $invoiceSetting->show_client_company_address == 'yes'): ?>
                            <?php echo nl2br($order->client->clientDetails->address); ?>

                        <?php endif; ?>
                        </p>
                    </td>

                    <td align="right" class="mt-lg-0 mt-md-0">
                        <?php if($order->credit_note): ?>
                            <span class="unpaid text-warning border-warning"><?php echo app('translator')->get('app.credit-note'); ?></span>
                        <?php else: ?>

                            <span
                                class="unpaid <?php switch($order->status):
                                case ('pending'): ?> text-warning border-warning <?php break; ?>
                                <?php case ('on-hold'): ?> text-info border-info <?php break; ?>
                                <?php case ('failed'): ?> text-dark border-dark <?php break; ?>
                                <?php case ('processing'): ?> text-primary border-primary <?php break; ?>
                                <?php case ('completed'): ?> text-success border-success <?php break; ?>
                                <?php case ('canceled'): ?> text-red border-red <?php break; ?>
                                <?php case ('refunded'): ?> text-body border-dark <?php break; ?>
                                <?php default: ?> <?php endswitch; ?> rounded f-15 "><?php echo app('translator')->get('modules.invoices.'.$order->status); ?></span>
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
                                    <td class="border-right-0 border-left-0" align="right"><?php echo app('translator')->get("app.hsnSac"); ?></td>
                                <?php endif; ?>
                                <td class="border-right-0 border-left-0" align="right">
                                    <?php echo app('translator')->get('modules.invoices.qty'); ?>
                                </td>
                                <td class="border-right-0 border-left-0" align="right">
                                    <?php echo app('translator')->get('app.sku'); ?>
                                </td>
                                <td class="border-right-0 border-left-0" align="right">
                                    <?php echo app('translator')->get("modules.invoices.unitPrice"); ?> (<?php echo e($order->currency->currency_code); ?>)
                                </td>
                                <td class="border-right-0 border-left-0" align="right"><?php echo app('translator')->get("modules.invoices.tax"); ?></td>
                                <td class="border-left-0" align="right">
                                    <?php echo app('translator')->get("modules.invoices.amount"); ?>
                                    (<?php echo e($order->currency->currency_code); ?>)</td>
                            </tr>

                            <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="text-dark">
                                    <td><?php echo e($item->item_name); ?></td>
                                    <?php if($invoiceSetting->hsn_sac_code_show): ?>
                                        <td align="right"><?php echo e($item->hsn_sac_code); ?></td>
                                    <?php endif; ?>
                                    <td align="right"><?php echo e($item->quantity); ?><?php if($item->unit): ?><br><span class="f-11 text-dark-grey"><?php echo e($item->unit->unit_type); ?></span><?php endif; ?></td>
                                    <td align="right"><?php echo e($item->sku); ?></td>
                                    <td align="right">
                                        <?php echo e(currency_format($item->unit_price, $order->currency_id, false)); ?></td>
                                    <td align="right"><?php echo e($item->tax_list); ?></td>
                                    <td align="right"><?php echo e(currency_format($item->amount, $order->currency_id, false)); ?>

                                    </td>
                                </tr>
                                <?php if($item->item_summary != '' || $item->orderItemImage): ?>
                                    <tr class="text-dark">
                                        <td colspan="<?php echo e($invoiceSetting->hsn_sac_code_show ? '7' : '6'); ?>" class="border-bottom-0">
                                            <?php echo nl2br(pdfStripTags($item->item_summary)); ?>

                                            <?php if($item->orderItemImage): ?>
                                                <p class="mt-2">
                                                    <a href="javascript:;" class="img-lightbox" data-image-url="<?php echo e($item->orderItemImage->file_url); ?>">
                                                        <img src="<?php echo e($item->orderItemImage->file_url); ?>" width="80" height="80" class="img-thumbnail">
                                                    </a>
                                                </p>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                                <?php if($item->has('product') && $item->product && $item->product->downloadable && $item->product->download_file_url && $order->status == 'completed'): ?>
                                    <tr class="text-dark">
                                        <td colspan="<?php echo e($invoiceSetting->hsn_sac_code_show ? '7' : '6'); ?>" class="border-bottom-0">
                                            <p class="mt-2">
                                                <?php if (isset($component)) { $__componentOriginal29acd9b76240152ae380821b082bd629 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal29acd9b76240152ae380821b082bd629 = $attributes; } ?>
<?php $component = App\View\Components\Forms\LinkSecondary::resolve(['icon' => 'download','link' => $item->product->download_file_url] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.link-secondary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\LinkSecondary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-3','download' => ''.e($item->product->name).'']); ?><?php echo app('translator')->get('app.download'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal29acd9b76240152ae380821b082bd629)): ?>
<?php $attributes = $__attributesOriginal29acd9b76240152ae380821b082bd629; ?>
<?php unset($__attributesOriginal29acd9b76240152ae380821b082bd629); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal29acd9b76240152ae380821b082bd629)): ?>
<?php $component = $__componentOriginal29acd9b76240152ae380821b082bd629; ?>
<?php unset($__componentOriginal29acd9b76240152ae380821b082bd629); ?>
<?php endif; ?>
                                            </p>
                                        </td>
                                    </tr>

                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                            <tr>
                                <td colspan="<?php echo e($invoiceSetting->hsn_sac_code_show ? '5' : '4'); ?>" class="blank-td border-bottom-0 border-left-0 border-right-0"></td>
                                <td class="p-0 border-right-0">
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
                                                <?php echo e(currency_format($order->sub_total, $order->currency_id, false)); ?></td>
                                        </tr>
                                        <?php if($discount != 0 && $discount != ''): ?>
                                            <tr class="text-dark-grey" align="right">
                                                <td class="border-top-0 border-left-0">
                                                    <?php echo e(currency_format($discount, $order->currency_id, false)); ?></td>
                                            </tr>
                                        <?php endif; ?>
                                        <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr class="text-dark-grey" align="right">
                                                <td class="border-top-0 border-left-0">
                                                    <?php echo e(currency_format($tax, $order->currency_id, false)); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="bg-light-grey text-dark f-w-500 f-16" align="right">
                                            <td class="border-bottom-0 border-left-0">
                                                <?php echo e(currency_format($order->total, $order->currency_id, false)); ?>

                                                <?php echo e($order->currency->currency_code); ?></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>

                </tr>
            </table>
            <table width="100%" class="inv-desc-mob d-block d-lg-none d-md-none">

                <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                    <?php if($item->item_summary != '' || $item->orderItemImage): ?>
                                        <tr>
                                            <td class="border-left-0 border-right-0 border-bottom-0">
                                                <?php echo nl2br(pdfStripTags($item->item_summary)); ?>

                                                <?php if($item->orderItemImage): ?>
                                                    <p class="mt-2">
                                                        <a href="javascript:;" class="img-lightbox" data-image-url="<?php echo e($item->orderItemImage->file_url); ?>">
                                                            <img src="<?php echo e($item->orderItemImage->file_url); ?>" width="80" height="80" class="img-thumbnail">
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
                                <?php echo e($order->unit->unit_type ?? ''); ?></th>
                            <td width="50%"><?php echo e($item->quantity); ?></td>
                        </tr>
                        <tr>
                            <th width="50%" class="bg-light-grey text-dark-grey font-weight-bold">
                                <?php echo app('translator')->get("modules.invoices.unitPrice"); ?>
                                (<?php echo e($order->currency->currency_code); ?>)</th>
                            <td width="50%"><?php echo e(currency_format($item->unit_price, $order->currency_id, false)); ?></td>
                        </tr>
                        <tr>
                            <th width="50%" class="bg-light-grey text-dark-grey font-weight-bold">
                                <?php echo app('translator')->get("modules.invoices.amount"); ?>
                                (<?php echo e($order->currency->currency_code); ?>)</th>
                            <td width="50%"><?php echo e(currency_format($item->amount, $order->currency_id, false)); ?></td>
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
                        <?php echo e(currency_format($order->sub_total, $order->currency_id, false)); ?></td>
                </tr>
                <?php if($discount != 0 && $discount != ''): ?>
                    <tr>
                        <th width="50%" class="text-dark-grey font-weight-normal"><?php echo app('translator')->get("modules.invoices.discount"); ?>
                        </th>
                        <td width="50%" class="text-dark-grey font-weight-normal">
                            <?php echo e(currency_format($discount, $order->currency_id, false)); ?></td>
                    </tr>
                <?php endif; ?>

                <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th width="50%" class="text-dark-grey font-weight-normal"><?php echo e($key); ?></th>
                        <td width="50%" class="text-dark-grey font-weight-normal">
                            <?php echo e(currency_format($tax, $order->currency_id, false)); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <th width="50%" class="text-dark-grey font-weight-bold"><?php echo app('translator')->get("modules.invoices.total"); ?></th>
                    <td width="50%" class="text-dark-grey font-weight-bold">
                        <?php echo e(currency_format($order->total, $order->currency_id, false)); ?></td>
                </tr>
            </table>
            <table class="inv-note">
                <tr>
                    <td height="30" colspan="2"></td>
                </tr>
                <tr>
                    <td>
                        <table>
                            <tr><?php echo app('translator')->get('app.clientNote'); ?></tr>
                            <tr>
                                <p class="text-dark-grey"><?php echo !empty($order->note) ? nl2br($order->note) : '--'; ?></p>
                            </tr>
                        </table>
                    </td>
                </tr>
                <?php if($invoiceSetting->other_info): ?>
                    <tr>
                        <td>
                            <p class="text-dark-grey"><?php echo nl2br($invoiceSetting->other_info); ?></p>
                        </td>
                    </tr>
                <?php endif; ?>
            </table>
        </div>
    </div>
    <!-- CARD BODY END -->
    <!-- CARD FOOTER START -->
    <div class="card-footer bg-white border-0 d-flex justify-content-start py-0 py-lg-4 py-md-4 mb-4 mb-lg-3 mb-md-3 ">

        <div class="d-flex">


                <div class="inv-action mr-3 mr-lg-3 mr-md-3 dropup">
                    <button class="dropdown-toggle btn-primary" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"><?php echo app('translator')->get('app.action'); ?>
                        <span><i class="fa fa-chevron-up f-15"></i></span>
                    </button>
                    <!-- DROPDOWN - INFORMATION -->
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" tabindex="0">
                        <li><a href="<?php echo e(route('orders.download', $order->id)); ?>" class="dropdown-item"><i class="fa fa-download f-w-500 mr-2 f-11"></i> <?php echo app('translator')->get('app.download'); ?></a></li>
                        <?php if(
                            (in_array('admin', user_roles()) || in_array('employee', user_roles()))
                        ): ?>
                        <?php if(($editOrderPermission == 'all' || ($editOrderPermission == 'added' && $order->added_by == user()->id)) && $order->status == 'completed'): ?>
                            <li>
                                <a class="dropdown-item f-14 text-dark orderStatus" data-status="refunded"
                                href="javascript:;">
                                    <i class="fa fa-money-bill f-w-500 mr-2 f-11"></i> <?php echo app('translator')->get('app.refund'); ?>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if(($editOrderPermission == 'all' || (in_array($editOrderPermission, ['added', 'both']) && $order->added_by == user()->id)) && in_array($order->status, ['pending', 'on-hold', 'failed', 'processing'])): ?>
                            <li>
                                <a class="dropdown-item f-14 text-dark orderStatus" data-status="completed"
                                href="javascript:;">
                                    <i class="fa fa-check f-w-500 mr-2 f-11"></i> <?php echo app('translator')->get('app.orderMarkAsComplete'); ?>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if(in_array($order->status, ['completed', 'refunded']) && $order->invoice): ?>
                            <li>
                                <a class="dropdown-item f-14 text-dark"
                                href="<?php echo e(route('invoices.show', $order->invoice->id)); ?>">
                                    <i class="fa fa-receipt f-w-500 mr-2 f-11"></i> <?php echo app('translator')->get('app.viewInvoice'); ?>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if(!in_array($order->status, ['completed', 'canceled', 'refunded']) && ($editOrderPermission == 'all'|| ($editOrderPermission == 'both' && ($order->added_by == user()->id || $order->client_id == user()->id)) || ($editOrderPermission == 'added' && $order->added_by == user()->id) || ($editOrderPermission == 'owned' && $order->client_id == user()->id)) && (!is_null($order->project) && is_null($order->project->deleted_at)) ): ?>
                            <li>
                                <a class="dropdown-item f-14 text-dark openRightModal" href="<?php echo e(route('orders.edit', $order->id)); ?>">
                                    <i class="fa fa-edit f-w-500 mr-2 f-11"></i> <?php echo app('translator')->get('app.edit'); ?>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if(!in_array($order->status, ['completed', 'refunded']) && ($deleteOrderPermission == 'all'|| ($deleteOrderPermission == 'both' && ($order->added_by == user()->id || $order->client_id == user()->id)) || ($deleteOrderPermission == 'added' && $order->added_by == user()->id) || ($deleteOrderPermission == 'owned' && $order->client_id == user()->id))): ?>
                            <li>
                                <a class="dropdown-item f-14 text-dark deleteOrder" data-order-id="<?php echo e($order->id); ?>"
                                href="javascript:;">
                                    <i class="fa fa-trash f-w-500 mr-2 f-11"></i> <?php echo app('translator')->get('app.delete'); ?>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php endif; ?>
                    </ul>
                </div>

            
            <?php if(in_array('client', user_roles()) && $order->total > 0 && in_array($order->status, ['pending', 'failed'])
            && ($credentials->show_pay || ($methods->count() > 0 && $offlinePayemntDone === 'no'))): ?>
                <div class="inv-action mr-3 mr-lg-3 mr-md-3 dropup">
                    <button class="dropdown-toggle btn-primary rounded mr-3 mr-lg-0 mr-md-0 f-15" type="button"
                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"><?php echo app('translator')->get('modules.invoices.payNow'); ?>
                        <span><i class="fa fa-chevron-down f-15"></i></span>
                    </button>
                    <!-- DROPDOWN - INFORMATION -->
                    <ul class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuButton" tabindex="0">
                        <?php if($credentials->stripe_status == 'active'): ?>
                            <li>
                                <a class="dropdown-item f-14 text-dark" href="javascript:;"
                                    data-order-id="<?php echo e($order->id); ?>" id="stripeModal">
                                    <i class="fab fa-stripe-s f-w-500 mr-2 f-11"></i>
                                    <?php echo app('translator')->get('modules.invoices.payStripe'); ?>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if($credentials->paystack_status == 'active'): ?>
                            <li>
                                <a class="dropdown-item f-14 text-dark" href="javascript:void(0);" data-order-id="<?php echo e($order->id); ?>"  id="paystackModal">
                                    <img style="height: 15px;" src="https://s3-eu-west-1.amazonaws.com/pstk-integration-logos/paystack.jpg"> <?php echo app('translator')->get('modules.invoices.payPaystack'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if($credentials->flutterwave_status == 'active'): ?>
                            <li>
                                <a class="dropdown-item f-14 text-dark" href="javascript:void(0);" data-order-id="<?php echo e($order->id); ?>"  id="flutterwaveModal">
                                    <img style="height: 15px;" src="<?php echo e(asset('img/flutterwave.png')); ?>"> <?php echo app('translator')->get('modules.invoices.payFlutterwave'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if($credentials->payfast_status == 'active'): ?>
                            <li>
                                <a class="dropdown-item f-14 text-dark" href="javascript:void(0);"
                                    id="payfastModal">
                                    <img style="height: 15px;" src="<?php echo e(asset('img/payfast-logo.png')); ?>">
                                    <?php echo app('translator')->get('modules.invoices.payPayfast'); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if($credentials->square_status == 'active'): ?>
                            <li>
                                <a class="dropdown-item f-14 text-dark" href="javascript:void(0);"
                                    id="squareModal">
                                    <img style="height: 15px;" src="<?php echo e(asset('img/square.svg')); ?>">
                                    <?php echo app('translator')->get('modules.invoices.paySquare'); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if($credentials->authorize_status == 'active'): ?>
                        <li>
                            <a class="dropdown-item f-14 text-dark" href="javascript:void(0);"
                                data-order-id="<?php echo e($order->id); ?>" id="authorizeModal">
                                <img style="height: 15px;" src="<?php echo e(asset('img/authorize.png')); ?>">
                                <?php echo app('translator')->get('modules.invoices.payAuthorize'); ?></a>
                        </li>
                        <?php endif; ?>

                        <?php if($credentials->mollie_status == 'active'): ?>
                            <li>
                                <a class="dropdown-item f-14 text-dark" href="javascript:void(0);" data-order-id="<?php echo e($order->id); ?>"  id="mollieModal">
                                    <img style="height: 20px;" src="<?php echo e(asset('img/mollie.png')); ?>"> <?php echo app('translator')->get('modules.invoices.payMollie'); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if($credentials->razorpay_status == 'active'): ?>
                            <li>
                                <a class="dropdown-item f-14 text-dark" href="javascript:;" id="razorpayPaymentButton">
                                    <i class="fa fa-credit-card f-w-500 mr-2 f-11"></i>
                                    <?php echo app('translator')->get('modules.invoices.payRazorpay'); ?>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if($credentials->paypal_status == 'active'): ?>
                            <li>
                                <a class="dropdown-item f-14 text-dark" href="<?php echo e(route('paypal', [$order->id])); ?>?type=order">
                                    <i class="fab fa-paypal f-w-500 mr-2 f-11"></i> <?php echo app('translator')->get('modules.invoices.payPaypal'); ?>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if($methods->count() > 0 && $offlinePayemntDone === 'no'): ?>
                            <li>
                                <a class="dropdown-item f-14 text-dark" href="javascript:;" id="offlinePaymentModal"
                                    data-order-id="<?php echo e($order->id); ?>">
                                    <i class="fa fa-money-bill f-w-500 mr-2 f-11"></i>
                                    <?php echo app('translator')->get('modules.invoices.payOffline'); ?>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
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
                <?php if (isset($component)) { $__componentOriginalc7faf3da9dd03559633827985b4aafa9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc7faf3da9dd03559633827985b4aafa9 = $attributes; } ?>
<?php $component = App\View\Components\Forms\CustomFieldShow::resolve(['fields' => $fields,'model' => $order] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<?php if($bankDetails != null): ?>
    <script>
        var bankAccounts = <?php echo json_encode($bankDetails->mapWithKeys(function ($account) {
            return [$account['id'] => $account['bank_name'] . ' | ' . $account['account_name']];
        }), 15, 512) ?>;
    </script>
<?php else: ?>
    <script>
        var bankAccounts = {};
    </script>
<?php endif; ?>

<script>

    $('body').on('click', '.orderStatus', function() {
        var url = "<?php echo e(route('orders.change_status')); ?>";
        var token = "<?php echo e(csrf_token()); ?>";
        var status = $(this).data('status');
        var statusMessage;

        switch (status) {
            case 'pending':
                statusMessage = "<?php echo app('translator')->get('messages.orderStatus.pending'); ?>";
                break;
            case 'on-hold':
                statusMessage = "<?php echo app('translator')->get('messages.orderStatus.onHold'); ?>";
                break;
            case 'failed':
                statusMessage = "<?php echo app('translator')->get('messages.orderStatus.failed'); ?>";
                break;
            case 'processing':
                statusMessage = "<?php echo app('translator')->get('messages.orderStatus.processing'); ?>";
                break;
            case 'completed':
                statusMessage = "<?php echo app('translator')->get('messages.orderStatus.completed'); ?>";
                break;
            case 'canceled':
                statusMessage = "<?php echo app('translator')->get('messages.orderStatus.canceled'); ?>";
                break;
            case 'refunded':
                statusMessage = "<?php echo app('translator')->get('messages.orderStatus.refunded'); ?>";
                break;

            default:
                statusMessage = "<?php echo app('translator')->get('messages.orderStatus.pending'); ?>";
                break;
        }

        Swal.fire({
            title: "<?php echo app('translator')->get('messages.confirmation.orderStatusChange'); ?>",
            text: statusMessage,
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
                if (status === 'completed' && Object.keys(bankAccounts).length > 0) {
                    Swal.fire({
                        title: "<?php echo app('translator')->get('messages.selectBank'); ?>",
                        input: 'select',
                        inputOptions: bankAccounts,
                        inputPlaceholder: "<?php echo app('translator')->get('messages.selectBank'); ?>",
                        showCancelButton: true,
                        inputValidator: (value) => {
                                    return new Promise((resolve) => {
                                        resolve();
                                    });
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            let selectedBankAccount = result.value;
                    
                            $.easyAjax({
                                url: url,
                                type: "POST",
                                container: '.content-wrapper',
                                blockUI: true,
                                data: {
                                    '_token': token,
                                    orderId: <?php echo e($order->id); ?>,
                                    status: status,
                                    bank_account_id: selectedBankAccount
                                },
                                success: function(data) {
                                    if (data.status == 'success') {
                                        $.unblockUI();
                                        window.location.reload();
                                    }
                                }
                            });
                        }
                    });
                } else {
                    $.easyAjax({
                        url: url,
                        type: "POST",
                        container: '.content-wrapper',
                        blockUI: true,
                        data: {
                            '_token': token,
                            orderId: <?php echo e($order->id); ?>,
                            status: status
                        },
                        success: function(data) {
                            if (data.status == 'success') {
                                $.unblockUI();
                                window.location.reload();
                            }
                        }
                    });
                }
            }
        });

    });

    $('body').on('click', '.deleteOrder', function() {
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
                var url = "<?php echo e(route('orders.destroy', $order->id)); ?>";

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
                            window.location.href = "<?php echo e(route('orders.index')); ?>";
                        }
                    }
                });
            }
        });
    });

    $('body').on('click', '#stripeModal', function() {
        let orderId = $(this).data('order-id');
        let queryString = "?order_id=" + orderId;
        let url = "<?php echo e(route('orders.stripe_modal')); ?>" + queryString;

        $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
        $.ajaxModal(MODAL_LG, url);
    });


    $('body').on('click', '#paystackModal', function() {
        let id = $(this).data('order-id');
        let queryString = "?id="+id+"&type=order";
        let url = "<?php echo e(route('front.paystack_modal')); ?>"+queryString;

        $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
        $.ajaxModal(MODAL_LG, url);
    });

    $('body').on('click', '#flutterwaveModal', function() {
        let id = $(this).data('order-id');
        let queryString = "?id="+id+"&type=order";
        let url = "<?php echo e(route('front.flutterwave_modal')); ?>"+queryString;

        $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
        $.ajaxModal(MODAL_LG, url);
    });

    $('body').on('click', '#authorizeModal', function() {
        let id = $(this).data('order-id');
        let queryString = "?id="+id+"&type=order";
        let url = "<?php echo e(route('front.authorize_modal')); ?>"+queryString;

        $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
        $.ajaxModal(MODAL_LG, url);
    })

    $('body').on('click', '#mollieModal', function() {
        let id = $(this).data('order-id');
        let queryString = "?id="+id+"&type=order";
        let url = "<?php echo e(route('front.mollie_modal')); ?>"+queryString;

        $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
        $.ajaxModal(MODAL_LG, url);
    });

    $('body').on('click', '#payfastModal', function() {
        // Block model UI until payment happens
        $.easyBlockUI();

        $.easyAjax({
            url: "<?php echo e(route('payfast_public')); ?>",
            type: "POST",
            blockUI: true,
            data: {
                id:'<?php echo e($order->id); ?>',
                type:'order',
                _token: '<?php echo e(csrf_token()); ?>'
            },
            success: function(response) {
                if(response.status == 'success'){
                    $('body').append(response.form);
                    $('#payfast-pay-form').submit();
                }
            }
        });
    });

    $('body').on('click', '#squareModal', function() {
        // Block model UI until payment happens
        $.easyBlockUI();

        $.easyAjax({
            url: "<?php echo e(route('square_public')); ?>",
            type: "POST",
            blockUI: true,
            data: {
                id:'<?php echo e($order->id); ?>',
                type:'order',
                _token: '<?php echo e(csrf_token()); ?>'
            }
        });
    });

    $('body').on('click', '#offlinePaymentModal', function() {
        let orderId = $(this).data('order-id');
        let queryString = "?order_id=" + orderId;
        let url = "<?php echo e(route('orders.offline_payment_modal')); ?>" + queryString;

        $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
        $.ajaxModal(MODAL_LG, url);
    });

    <?php if($credentials->razorpay_status == 'active'): ?>
        $('body').on('click', '#razorpayPaymentButton', function() {
        var amount = "<?php echo e(number_format((float) $order->total, 2, '.', '') * 100); ?>";
        var orderId = "<?php echo e($order->id); ?>";
        var clientEmail = "<?php echo e($user->email); ?>";

        var options = {
            "key": "<?php echo e($credentials->razorpay_mode == 'test' ? $credentials->test_razorpay_key : $credentials->live_razorpay_key); ?>",
            "amount": amount,
            "currency": '<?php echo e($order->currency->currency_code); ?>',
            "name": "<?php echo e($companyName); ?>",
            "description": "Invoice Payment",
            "image": "<?php echo e(company()->logo_url); ?>",
            "handler": function (response) {
                confirmRazorpayPayment(response.razorpay_payment_id, orderId);
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
                "purchase_id": orderId, //invoice ID
                "type": "order"
            }
        };
        var rzp1 = new Razorpay(options);

        /* Make an entry to payment table when payment fails */
        rzp1.on('payment.failed', function (response){
            /* Response will be like this - code: "BAD_REQUEST_ERROR", reason: "payment_failed"
                , description: "Payment failed"
            */
            url = "<?php echo e(route('orders.payment_failed', ':id')); ?>";
            url = url.replace(':id', orderId);

            $.easyAjax({
                url: url,
                type: "POST",
                data: {errorMessage: response.error, gateway: 'Razorpay',  "_token" : "<?php echo e(csrf_token()); ?>"},
            })
        });

        rzp1.open();

        });

        // Confirmation after transaction
        function confirmRazorpayPayment(id, orderId) {
            // Block UI immediatly after payment modal disappear
            $.easyBlockUI();

            $.easyAjax({
                type: 'POST',
                url: "<?php echo e(route('pay_with_razorpay',[$order->company->hash])); ?>",
                data: {_token:'<?php echo e(csrf_token()); ?>', paymentId: id, orderId: orderId, type: 'order'}
            })
        }

    <?php endif; ?>

</script>
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\orders\ajax\show.blade.php ENDPATH**/ ?>