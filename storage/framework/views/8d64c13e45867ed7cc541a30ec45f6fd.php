<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?php echo e(asset('vendor/css/all.min.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('vendor/css/select2.min.css')); ?>">

    <!-- Simple Line Icons -->
    <link rel="stylesheet" href="<?php echo e(asset('vendor/css/simple-line-icons.css')); ?>">

    <!-- Template CSS -->
    <link type="text/css" rel="stylesheet" media="all" href="<?php echo e(asset('css/main.css')); ?>">

    <title><?php echo app('translator')->get($pageTitle); ?></title>
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo e($company->favicon_url); ?>">
    <meta name="theme-color" content="#ffffff">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e($company->favicon_url); ?>">

    <?php echo $__env->make('sections.theme_css', ['company' => $company], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php if(isset($activeSettingMenu)): ?>
        <style>
            .preloader-container {
                margin-left: 510px;
                width: calc(100% - 510px)
            }

        </style>
    <?php endif; ?>

    <?php echo $__env->yieldPushContent('styles'); ?>

    <style>
        :root {
            --fc-border-color: #E8EEF3;
            --fc-button-text-color: #99A5B5;
            --fc-button-border-color: #99A5B5;
            --fc-button-bg-color: #ffffff;
            --fc-button-active-bg-color: #171f29;
            --fc-today-bg-color: #f2f4f7;
        }

        .preloader-container {
            height: 100vh;
            width: 100%;
            margin-left: 0;
            margin-top: 0;
        }

        .fc a[data-navlink] {
            color: #99a5b5;
        }

    </style>
    <style>
        #logo {
            height: 50px;
        }

    </style>


    <script src="<?php echo e(asset('vendor/jquery/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/jquery/modernizr.min.js')); ?>"></script>

    <script>
        var checkMiniSidebar = localStorage.getItem("mini-sidebar");
    </script>

</head>

<body id="body" class="h-100 bg-additional-grey">

<!-- BODY WRAPPER START -->
<div class="body-wrapper clearfix">

    <!-- MAIN CONTAINER START -->
    <section class="bg-additional-grey" id="fullscreen">

        <div class="preloader-container d-flex justify-content-center align-items-center">
            <div class="spinner-border" role="status" aria-hidden="true"></div>
        </div>

        <?php if (isset($component)) { $__componentOriginal000fcba1c6c5a1e4a2897e45738ec35e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal000fcba1c6c5a1e4a2897e45738ec35e = $attributes; } ?>
<?php $component = App\View\Components\AppTitle::resolve(['pageTitle' => $pageTitle] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-title'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppTitle::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'd-block d-lg-none']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal000fcba1c6c5a1e4a2897e45738ec35e)): ?>
<?php $attributes = $__attributesOriginal000fcba1c6c5a1e4a2897e45738ec35e; ?>
<?php unset($__attributesOriginal000fcba1c6c5a1e4a2897e45738ec35e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal000fcba1c6c5a1e4a2897e45738ec35e)): ?>
<?php $component = $__componentOriginal000fcba1c6c5a1e4a2897e45738ec35e; ?>
<?php unset($__componentOriginal000fcba1c6c5a1e4a2897e45738ec35e); ?>
<?php endif; ?>

        <!-- CONTENT WRAPPER START -->
        <div class="content-wrapper container">
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
            <div class="card border-0 invoice">
                <!-- CARD BODY START -->
                <div class="card-body">

                    <?php if($message = Session::get('success')): ?>
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true"></button>
                            <i class="fa fa-check"></i> <?php echo $message; ?>

                        </div>
                            <?php Session::forget('success'); ?>
                    <?php endif; ?>

                    <?php if($message = Session::get('error')): ?>
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true"></button>
                            <?php echo $message; ?>

                        </div>
                            <?php Session::forget('error'); ?>
                    <?php endif; ?>

                    <div class="invoice-table-wrapper">
                        <table width="100%" class="___class_+?14___">
                            <tr class="inv-logo-heading">
                                <td><img src="<?php echo e($company->invoiceSetting->logo_url); ?>"
                                         alt="<?php echo e($company->company_name); ?>" id="logo"/></td>
                                <td align="right"
                                    class="font-weight-bold f-21 text-dark text-uppercase mt-4 mt-lg-0 mt-md-0">
                                    <?php echo app('translator')->get('app.invoice'); ?></td>
                            </tr>
                            <tr class="inv-num">
                                <td class="f-14 text-dark">
                                    <p class="mt-3 mb-0">
                                        <?php echo e($company->company_name); ?><br>
                                        <?php if(!is_null($company)): ?>
                                            <?php echo $invoice->address ? nl2br($invoice->address->address) : ''; ?><br>
                                            <?php echo e($company->company_phone); ?>

                                        <?php endif; ?>
                                        <?php if($invoiceSetting->show_gst == 'yes' && $invoice->address->tax_number): ?>
                                            <br><?php echo e($invoice->address->tax_name); ?>:
                                            <?php echo e($invoice->address->tax_number); ?>

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
                                        <tr>
                                            <td class="bg-light-grey border-right-0 f-w-500">
                                                <?php echo app('translator')->get('modules.invoices.invoiceDate'); ?></td>
                                            <td class="border-left-0">
                                                <?php echo e($invoice->issue_date->translatedFormat($company->date_format)); ?>

                                            </td>
                                        </tr>
                                        <?php if(empty($invoice->order_id) && $invoice->status === 'unpaid' && $invoice->due_date->year > 1): ?>
                                            <tr>
                                                <td class="bg-light-grey border-right-0 f-w-500"><?php echo app('translator')->get('app.dueDate'); ?>
                                                </td>
                                                <td class="border-left-0">
                                                    <?php echo e($invoice->due_date->translatedFormat($company->date_format)); ?>

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

                                        <span
                                            class="text-dark-grey text-capitalize"><?php echo app('translator')->get('modules.invoices.billedTo'); ?></span><br>

                                        <?php if($invoice->client && $invoice->client->name && $invoice->company->invoiceSetting->show_client_name == 'yes'): ?>
                                            <?php echo e($invoice->client->name_salutation); ?><br>
                                        <?php endif; ?>

                                        <?php if($invoice->client && $invoice->client->email && $invoice->company->invoiceSetting->show_client_email == 'yes'): ?>
                                            <?php echo e($invoice->client->email); ?><br>
                                        <?php endif; ?>

                                        <?php if($invoice->client && $invoice->client->mobile && $invoice->company->invoiceSetting->show_client_phone == 'yes'): ?>
                                            <?php echo e($invoice->client->mobile_with_phonecode); ?><br>
                                        <?php endif; ?>

                                        <?php if($invoice->clientDetails && $invoice->clientDetails->company_name && $invoice->company->invoiceSetting->show_client_company_name == 'yes'): ?>
                                            <?php echo e($invoice->clientDetails->company_name); ?><br>
                                        <?php endif; ?>

                                        <?php if($invoice->clientDetails && $invoice->clientDetails->address && $invoice->company->invoiceSetting->show_client_company_address == 'yes'): ?>
                                            <?php echo nl2br($invoice->clientDetails->address); ?>

                                        <?php endif; ?>


                                        <?php if($invoiceSetting->show_gst == 'yes' && !is_null($client->clientDetails->gst_number)): ?>
                                            <br>
                                            <?php if($client->clientDetails->tax_name): ?>
                                                <?php echo e($client->clientDetails->tax_name); ?>

                                                : <?php echo e($client->clientDetails->gst_number); ?>

                                            <?php else: ?>
                                                <?php echo app('translator')->get('app.gstIn'); ?>: <?php echo e($client->clientDetails->gst_number); ?>

                                            <?php endif; ?>
                                        <?php endif; ?>

                                    </p>
                                </td>

                                <?php if($invoice->shipping_address): ?>
                                    <td class="f-14 text-black">
                                        <p class="mb-0 text-left"><span
                                                class="text-dark-grey text-capitalize"><?php echo app('translator')->get('app.shippingAddress'); ?></span><br>
                                            <?php echo nl2br($client->clientDetails->address); ?></p>
                                    </td>
                                <?php endif; ?>

                                <td align="right" class="mt-4 mt-lg-0 mt-md-0">
                                    <?php if($invoice->clientDetails->company_logo): ?>
                                        <img src="<?php echo e($invoice->clientDetails->image_url); ?>"
                                             alt="<?php echo e($invoice->clientDetails->company_name); ?>" class="logo"
                                             style="height:50px;"/>
                                        <br><br><br>
                                    <?php endif; ?>
                                    <span
                                        class="unpaid <?php echo e($invoice->status == 'partial' ? 'text-primary border-primary' : ''); ?> <?php echo e($invoice->status == 'paid' ? 'text-success border-success' : ''); ?> rounded f-15 "><?php echo app('translator')->get('modules.invoices.' . $invoice->status); ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td height="30" colspan="2"></td>
                            </tr>
                        </table>

                        <p class="mb-0">
                            <?php if(($invoiceSetting->show_project == 1) && isset($invoice->project->project_name)): ?>
                                <span
                                    class="text-dark-grey text-capitalize"><?php echo app('translator')->get('modules.invoices.projectName'); ?></span>
                                <br>
                                <?php echo e($invoice->project->project_name); ?>

                            <?php endif; ?>
                        </p>
                        <br><br>

                        <table width="100%" class="inv-desc d-none d-lg-table d-md-table">
                            <tr>
                                <td colspan="2">
                                    <table class="inv-detail f-14 table-responsive-sm" width="100%">
                                        <tr class="i-d-heading bg-light-grey text-dark-grey font-weight-bold">
                                            <td class="border-right-0"><?php echo app('translator')->get('app.description'); ?></td>
                                            <?php if($invoiceSetting->hsn_sac_code_show): ?>
                                                <td class="border-right-0 border-left-0"
                                                    align="right"><?php echo app('translator')->get('app.hsnSac'); ?></td>
                                            <?php endif; ?>
                                            <td class="border-right-0 border-left-0" align="right">
                                                <?php echo app('translator')->get('modules.invoices.qty'); ?>
                                            </td>
                                            <td class="border-right-0 border-left-0" align="right">
                                                <?php echo app('translator')->get('modules.invoices.unitPrice'); ?>
                                                (<?php echo e($invoice->currency->currency_code); ?>)
                                            </td>
                                            <td class="border-left-0 border-right-0 "
                                                align="right"><?php echo app('translator')->get('modules.invoices.tax'); ?></td>
                                            <td class="border-left-0" align="right">
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
                                                        <?php echo e(currency_format($item->unit_price, $invoice->currency_id, false)); ?>

                                                    </td>
                                                    <td align="right"><?php echo e($item->tax_list); ?></td>
                                                    <td align="right">
                                                        <?php echo e(currency_format($item->amount, $invoice->currency_id, false)); ?>

                                                    </td>
                                                </tr>
                                                <?php if($item->item_summary || $item->invoiceItemImage): ?>
                                                    <tr class="text-dark f-12">
                                                        <td colspan="<?php echo e($invoiceSetting->hsn_sac_code_show ? '6' : '5'); ?>"
                                                            class="border-bottom-0">
                                                            <?php echo nl2br(strip_tags($item->item_summary)); ?>

                                                            <?php if($item->invoiceItemImage): ?>
                                                                <p class="mt-2">
                                                                    <a href="javascript:;" class="img-lightbox"
                                                                       data-image-url="<?php echo e($item->invoiceItemImage->file_url); ?>">
                                                                        <img
                                                                            src="<?php echo e($item->invoiceItemImage->file_url); ?>"
                                                                            width="80" height="80"
                                                                            class="img-thumbnail">
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
                                                        <td
                                                            class="border-left-0 border-right-0 border-bottom-0 f-12">
                                                            <?php echo nl2br(strip_tags($item->item_summary)); ?>

                                                            <?php if($item->invoiceItemImage): ?>
                                                                <p class="mt-2">
                                                                    <a href="javascript:;" class="img-lightbox"
                                                                       data-image-url="<?php echo e($item->invoiceItemImage->file_url); ?>">
                                                                        <img
                                                                            src="<?php echo e($item->invoiceItemImage->file_url); ?>"
                                                                            width="80" height="80"
                                                                            class="img-thumbnail">
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
                                        <td width="50%">
                                            <?php echo e(currency_format($item->unit_price, $invoice->currency_id, false)); ?></td>
                                    </tr>
                                    <tr>
                                        <th width="50%" class="bg-light-grey text-dark-grey font-weight-bold">
                                            <?php echo app('translator')->get('modules.invoices.amount'); ?>
                                            (<?php echo e($invoice->currency->currency_code); ?>)
                                        </th>
                                        <td width="50%"><?php echo e(currency_format($item->amount, $invoice->currency_id, false)); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td height="3" class="p-0 " colspan="2"></td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <tr>
                                <th width="50%" class="text-dark-grey font-weight-normal">
                                    <?php echo app('translator')->get('modules.invoices.subTotal'); ?>
                                </th>
                                <td width="50%" class="text-dark-grey font-weight-normal">
                                    <?php echo e(currency_format($invoice->sub_total, $invoice->currency_id, false)); ?></td>
                            </tr>
                            <?php if($discount != 0 && $discount != ''): ?>
                                <tr>
                                    <th width="50%" class="text-dark-grey font-weight-normal">
                                        <?php echo app('translator')->get('modules.invoices.discount'); ?>
                                    </th>
                                    <td width="50%" class="text-dark-grey font-weight-normal">
                                        <?php echo e(currency_format($discount, $invoice->currency_id, false)); ?></td>
                                </tr>
                            <?php endif; ?>

                            <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th width="50%" class="text-dark-grey font-weight-normal">
                                        <?php echo e($key); ?></th>
                                    <td width="50%" class="text-dark-grey font-weight-normal">
                                        <?php echo e(currency_format($tax, $invoice->currency_id, false)); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th width="50%" class="text-dark-grey font-weight-bold">
                                    <?php echo app('translator')->get('modules.invoices.total'); ?></th>
                                <td width="50%" class="text-dark-grey font-weight-bold">
                                    <?php echo e(currency_format($invoice->total, $invoice->currency_id, false)); ?></td>
                            </tr>
                            <tr>
                                <th width="50%" class="f-16 bg-light-grey text-dark font-weight-bold">
                                    <?php echo app('translator')->get('modules.invoices.total'); ?>
                                    <?php echo app('translator')->get('modules.invoices.due'); ?></th>
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
                                            <p class="text-dark-grey"><?php echo nl2br($invoiceSetting->invoice_terms); ?>

                                            </p>
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
                <div
                    class="card-footer bg-white border-0 d-flex justify-content-end py-0 py-lg-4 py-md-4 mb-4 mb-lg-3 mb-md-3 ">


                    <div class="d-flex">

                        <?php if (isset($component)) { $__componentOriginal29acd9b76240152ae380821b082bd629 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal29acd9b76240152ae380821b082bd629 = $attributes; } ?>
<?php $component = App\View\Components\Forms\LinkSecondary::resolve(['icon' => 'download','link' => route('front.invoice_download', [md5($invoice->id)])] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.link-secondary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\LinkSecondary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-3']); ?>
                            <?php echo app('translator')->get('app.download'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal29acd9b76240152ae380821b082bd629)): ?>
<?php $attributes = $__attributesOriginal29acd9b76240152ae380821b082bd629; ?>
<?php unset($__attributesOriginal29acd9b76240152ae380821b082bd629); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal29acd9b76240152ae380821b082bd629)): ?>
<?php $component = $__componentOriginal29acd9b76240152ae380821b082bd629; ?>
<?php unset($__componentOriginal29acd9b76240152ae380821b082bd629); ?>
<?php endif; ?>

                        <?php if($invoice->total > 0 && $invoice->status != 'paid' && $credentials->show_pay): ?>
                            <div class="inv-action mr-3 mr-lg-3 mr-md-3 dropup">


                                <button class="dropdown-toggle btn-secondary" type="button" id="dropdownMenuButton"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php echo app('translator')->get('modules.invoices.payNow'); ?>
                                    <span><i class="fa fa-chevron-down f-15"></i></span>
                                </button>
                                <!-- DROPDOWN - INFORMATION -->
                                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton"
                                    tabindex="0">
                                    <?php if($credentials->paypal_status == 'active'): ?>
                                        <li>
                                            <a class="dropdown-item f-14 text-dark"
                                               href="<?php echo e(route('paypal_public', [$invoice->id])); ?>">
                                                <i class="fab fa-paypal f-w-500 mr-2 f-11"></i>
                                                <?php echo app('translator')->get('modules.invoices.payPaypal'); ?>
                                            </a>
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
                                                <img style="height: 15px;" src="<?php echo e(asset('img/paystack.jpg')); ?>">
                                                <?php echo app('translator')->get('modules.invoices.payPaystack'); ?></a>
                                        </li>
                                    <?php endif; ?>

                                    <?php if($credentials->flutterwave_status == 'active'): ?>
                                        <li>
                                            <a class="dropdown-item f-14 text-dark" href="javascript:void(0);"
                                               data-invoice-id="<?php echo e($invoice->id); ?>" id="flutterwaveModal">
                                                <img style="height: 15px;"
                                                     src="<?php echo e(asset('img/flutterwave.png')); ?>">
                                                <?php echo app('translator')->get('modules.invoices.payFlutterwave'); ?></a>
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
                                               data-invoice-id="<?php echo e($invoice->id); ?>" id="authorizeModal">
                                                <img style="height: 15px;"
                                                     src="<?php echo e(asset('img/authorize.png')); ?>">
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
                                </ul>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- CARD FOOTER END -->
            </div>
            <!-- INVOICE CARD END -->

        </div>
        <!-- CONTENT WRAPPER END -->


    </section>
    <!-- MAIN CONTAINER END -->
</div>
<!-- BODY WRAPPER END -->

<!-- also the modal itself -->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog d-flex justify-content-center align-items-center modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modelHeading">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <?php echo e(__('app.loading')); ?>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn-cancel rounded mr-3" data-dismiss="modal">Close</button>
                <button type="button" class="btn-primary rounded">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Global Required Javascript -->
<script src="<?php echo e(asset('js/main.js')); ?>"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script src="https://js.stripe.com/v3/"></script>

<script>
    const MODAL_LG = '#myModal';
    const MODAL_HEADING = '#modelHeading';
    document.loading = '<?php echo app('translator')->get('app.loading'); ?>';
    const dropifyMessages = {
        default: '<?php echo app('translator')->get('app.dragDrop'); ?>',
        replace: '<?php echo app('translator')->get('app.dragDropReplace'); ?>',
        remove: '<?php echo app('translator')->get('app.remove'); ?>',
        error: '<?php echo app('translator')->get('app.largeFile'); ?>'
    };

    $('body').on('click', '.img-lightbox', function () {
        var imageUrl = $(this).data('image-url');
        const url = "<?php echo e(route('front.public.show_image') . '?image_url='); ?>" + imageUrl;

        $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
        $.ajaxModal(MODAL_LG, url);
    });

    $(window).on('load', function () {
        // Animate loader off screen
        init();
        $(".preloader-container").fadeOut("slow", function () {
            $(this).removeClass("d-flex");
        });
    });

    <?php if($credentials->stripe_status == 'active'): ?>
    $('body').on('click', '#stripeModal', function () {
        let invoiceId = $(this).data('invoice-id');
        let queryString = "?invoice_id=" + invoiceId;
        let url = "<?php echo e(route('front.stripe_modal')); ?>" + queryString;

        $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
        $.ajaxModal(MODAL_LG, url);
    })
    <?php endif; ?>

    <?php if($credentials->paystack_status == 'active'): ?>
    $('body').on('click', '#paystackModal', function () {
        let id = $(this).data('invoice-id');
        let queryString = "?id=" + id + "&type=invoice";
        let url = "<?php echo e(route('front.paystack_modal')); ?>" + queryString;

        $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
        $.ajaxModal(MODAL_LG, url);
    })
    <?php endif; ?>

    <?php if($credentials->flutterwave_status == 'active'): ?>
    $('body').on('click', '#flutterwaveModal', function () {
        let id = $(this).data('invoice-id');
        let queryString = "?id=" + id + "&type=invoice";
        let url = "<?php echo e(route('front.flutterwave_modal')); ?>" + queryString;

        $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
        $.ajaxModal(MODAL_LG, url);
    })
    <?php endif; ?>

    <?php if($credentials->authorize_status == 'active'): ?>
    $('body').on('click', '#authorizeModal', function () {
        let id = $(this).data('invoice-id');
        let queryString = "?id=" + id + "&type=invoice";
        let url = "<?php echo e(route('front.authorize_modal')); ?>" + queryString;

        $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
        $.ajaxModal(MODAL_LG, url);
    })
    <?php endif; ?>

    <?php if($credentials->mollie_status == 'active'): ?>
    $('body').on('click', '#mollieModal', function () {
        let id = $(this).data('invoice-id');
        let queryString = "?id=" + id + "&type=invoice";
        let url = "<?php echo e(route('front.mollie_modal')); ?>" + queryString;

        $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
        $.ajaxModal(MODAL_LG, url);
    })
    <?php endif; ?>

    <?php if($credentials->payfast_status == 'active'): ?>
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
    })
    <?php endif; ?>

    <?php if($credentials->square_status == 'active'): ?>
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
    <?php endif; ?>

    <?php if($credentials->razorpay_status == 'active'): ?>
    $('body').on('click', '#razorpayPaymentButton', function () {
        var amount = <?php echo e(number_format((float) $invoice->amountDue(), 2, '.', '') * 100); ?>;

        var invoiceId = <?php echo e($invoice->id); ?>;
        <?php if($invoice->project && $invoice->project->client): ?>
        var clientEmail = "<?php echo e($invoice->project->client->email); ?>";
        <?php else: ?>
        var clientEmail = "<?php echo e($invoice->client->email); ?>";
        <?php endif; ?>

        var options = {
            "key": "<?php echo e($credentials->razorpay_mode == 'test' ? $credentials->test_razorpay_key : $credentials->live_razorpay_key); ?>",
            "amount": amount,
            "currency": '<?php echo e($invoice->currency->currency_code); ?>',
            "name": "<?php echo e($companyName); ?>",
            "description": "Invoice Payment",
            "image": "<?php echo e($company->logo_url); ?>",
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

        /* Make an entry to payment table when payment fails */
        rzp1.on('payment.failed', function (response) {
            /* Payment Failed Response will be something like this - code: "BAD_REQUEST_ERROR", reason: "payment_failed"
                , description: "Payment failed"
            */
            url = "<?php echo e(route('front.invoice_payment_failed', ':id')); ?>";
            url = url.replace(':id', invoiceId);

            $.easyAjax({
                url: url,
                type: "POST",
                data: {
                    errorMessage: response.error,
                    gateway: 'Razorpay',
                    "_token": "<?php echo e(csrf_token()); ?>"
                },
            })
        });

        rzp1.open();

    })

    //Confirmation after transaction
    function confirmRazorpayPayment(id, invoiceId) {

        // Block model UI until payment happens
        $.easyBlockUI();

        $.easyAjax({
            type: 'POST',
            url: "<?php echo e(route('pay_with_razorpay',[$invoice->company->hash])); ?>",
            data: {
                paymentId: id,
                invoiceId: invoiceId,
                _token: '<?php echo e(csrf_token()); ?>'
            },
            success: function (response) {
                // Unblock Modal UI when got error response
                $.easyUnblockUI('#stripeAddress');
            }
        });
    }
    <?php endif; ?>
</script>

</body>

</html>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/invoice.blade.php ENDPATH**/ ?>