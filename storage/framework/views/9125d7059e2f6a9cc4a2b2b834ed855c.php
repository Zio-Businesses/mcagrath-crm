<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?php echo e(asset('vendor/css/all.min.css')); ?>">

    <!-- Simple Line Icons -->
    <link rel="stylesheet" href="<?php echo e(asset('vendor/css/simple-line-icons.css')); ?>">

    <!-- Template CSS -->
    <link type="text/css" rel="stylesheet" media="all" href="<?php echo e(asset('css/main.css')); ?>">

    <title><?php echo app('translator')->get($pageTitle); ?></title>
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo e(global_setting()->favicon_url); ?>">
    <meta name="theme-color" content="#ffffff">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(global_setting()->favicon_url); ?>">

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
    <style>
        #logo {
            height: 50px;
        }
    </style>

    <?php echo $__env->make('sections.theme_css', ['company' => $company], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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

            <div class="card border-0 invoice">
                <!-- CARD BODY START -->
                <div class="card-body">
                    <div class="invoice-table-wrapper">
                        <table width="100%" class="">
                            <tr class="inv-logo-heading">
                                <td><img src="<?php echo e($invoiceSetting->logo_url); ?>"
                                         alt="<?php echo e($company->company_name); ?>" id="logo"/></td>
                                <td align="right"
                                    class="font-weight-bold f-21 text-dark text-uppercase mt-4 mt-lg-0 mt-md-0">
                                    <?php echo app('translator')->get('app.menu.proposal'); ?></td>
                            </tr>
                            <tr class="inv-num">
                                <td class="f-14 text-dark">
                                    <p class="mt-3 mb-0">
                                        <?php echo e($company->company_name); ?><br>
                                        <?php if(!is_null($company)): ?>
                                            <?php echo nl2br($company->defaultAddress->address); ?><br>
                                            <?php echo e($company->company_phone); ?>

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
                                                <?php echo app('translator')->get('app.menu.proposal'); ?></td>
                                            <td class="border-left-0">#<?php echo e($proposal->id); ?></td>
                                        </tr>
                                        <tr>
                                            <td class="bg-light-grey border-right-0 f-w-500">
                                                <?php echo app('translator')->get('modules.proposal.validTill'); ?></td>
                                            <td class="border-left-0">
                                                <?php echo e($proposal->valid_till->translatedFormat($company->date_format)); ?>

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
                                    <?php if($proposal->lead->contact && ($proposal->lead->contact->client_name || $proposal->lead->contact->client_email || $proposal->lead->contact->mobile || $proposal->lead->contact->company_name || $proposal->lead->contact->address) && ($invoiceSetting->show_client_name == 'yes' || $invoiceSetting->show_client_email == 'yes' || $invoiceSetting->show_client_phone == 'yes' || $invoiceSetting->show_client_company_name == 'yes' || $invoiceSetting->show_client_company_address == 'yes')): ?>
                                        <p class="mb-0 text-left">
                                            <span class="text-dark-grey text-capitalize">
                                                <?php echo app('translator')->get("modules.invoices.billedTo"); ?>
                                            </span><br>
                                            <?php if($proposal->deal && !empty($proposal->deal->name)): ?>
                                                <?php echo e($proposal->deal->name); ?><br>
                                            <?php endif; ?>
                                            <?php if($proposal->lead->contact && $proposal->lead->contact->client_name && $invoiceSetting->show_client_name == 'yes'): ?>
                                                <?php echo e($proposal->lead->contact->client_name_salutation); ?><br>
                                            <?php endif; ?>
                                            <?php if($proposal->lead->contact && $proposal->lead->contact->client_email && $invoiceSetting->show_client_email == 'yes'): ?>
                                                <?php echo e($proposal->lead->contact->client_email); ?><br>
                                            <?php endif; ?>
                                            <?php if($proposal->lead->contact && $proposal->lead->contact->mobile && $invoiceSetting->show_client_phone == 'yes'): ?>
                                                <?php echo e($proposal->lead->contact->mobile); ?><br>
                                            <?php endif; ?>
                                            <?php if($proposal->lead->contact && $proposal->lead->contact->company_name && $invoiceSetting->show_client_company_name == 'yes'): ?>
                                                <?php echo e($proposal->lead->contact->company_name); ?><br>
                                            <?php endif; ?>
                                            <?php if($proposal->lead->contact && $proposal->lead->contact->address && $invoiceSetting->show_client_company_address == 'yes'): ?>
                                                <?php echo nl2br($proposal->lead->contact->address); ?>

                                            <?php endif; ?>
                                        </p>
                                    <?php endif; ?>
                                </td>

                                <td align="right" class="mt-4 mt-lg-0 mt-md-0">
                                        <span
                                            class="unpaid <?php echo e($proposal->status == 'waiting' ? 'text-warning border-warning' : ''); ?> <?php echo e($proposal->status == 'accepted' ? 'text-success border-success' : ''); ?> rounded f-15 "><?php echo app('translator')->get('modules.estimates.'.$proposal->status); ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td height="30" colspan="2"></td>
                            </tr>
                        </table>
                        <div class="row">
                            <div class="col-sm-12 ql-editor">
                                <?php echo $proposal->description; ?>

                            </div>
                        </div>
                        <?php if(count($proposal->items) > 0): ?>
                            <table width="100%" class="inv-desc d-none d-lg-table d-md-table">
                                <tr>
                                    <td colspan="2">
                                        <table class="inv-detail f-14 table-responsive-sm" width="100%">
                                            <tr class="i-d-heading bg-light-grey text-dark-grey font-weight-bold">
                                                <td class="border-right-0"><?php echo app('translator')->get('app.description'); ?></td>
                                                <?php if($invoiceSetting->hsn_sac_code_show == 1): ?>
                                                    <td class="border-right-0 border-left-0" align="right">
                                                        <?php echo app('translator')->get("app.hsnSac"); ?></td>
                                                <?php endif; ?>
                                                <td class="border-right-0 border-left-0" align="right">
                                                    <?php echo app('translator')->get('modules.invoices.qty'); ?>
                                                </td>
                                                <td class="border-right-0 border-left-0" align="right">
                                                    <?php echo app('translator')->get("modules.invoices.unitPrice"); ?>
                                                    (<?php echo e($proposal->currency->currency_code); ?>)
                                                </td>
                                                <td class="border-right-0 border-left-0" align="right">
                                                    <?php echo app('translator')->get("modules.invoices.tax"); ?>
                                                </td>
                                                <td class="border-left-0" align="right">
                                                    <?php echo app('translator')->get("modules.invoices.amount"); ?>
                                                    (<?php echo e($proposal->currency->currency_code); ?>)
                                                </td>
                                            </tr>
                                            <?php $__currentLoopData = $proposal->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($item->type == 'item'): ?>
                                                    <tr class="text-dark font-weight-semibold f-13">
                                                        <td><?php echo e($item->item_name); ?></td>
                                                        <?php if($invoiceSetting->hsn_sac_code_show == 1): ?>
                                                            <td align="right"><?php echo e($item->hsn_sac_code); ?></td>
                                                        <?php endif; ?>
                                                        <td align="right"><?php echo e($item->quantity); ?><?php if($item->unit): ?>
                                                                <br><span
                                                                    class="f-11 text-dark-grey"><?php echo e($item->unit->unit_type); ?></span>
                                                            <?php endif; ?></td>
                                                        <td align="right">
                                                            <?php echo e(currency_format($item->unit_price, $proposal->currency_id, false)); ?>

                                                        </td>
                                                        <td align="right">
                                                            <?php echo e($item->tax_list); ?>

                                                        </td>
                                                        <td align="right">
                                                            <?php echo e(currency_format($item->amount, $proposal->currency_id, false)); ?>

                                                        </td>
                                                    </tr>
                                                    <?php if($item->item_summary || $item->proposalItemImage): ?>
                                                        <tr class="text-dark f-12">
                                                            <td colspan="<?php echo e(($invoiceSetting->hsn_sac_code_show == 1) ? '6' : '5'); ?>"
                                                                class="border-bottom-0">
                                                                <?php echo nl2br(strip_tags($item->item_summary)); ?>

                                                                <?php if($item->proposalItemImage): ?>
                                                                    <p class="mt-2">
                                                                        <a href="javascript:;" class="img-lightbox"
                                                                           data-image-url="<?php echo e($item->proposalItemImage->file_url); ?>">
                                                                            <img
                                                                                src="<?php echo e($item->proposalItemImage->file_url); ?>"
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
                                                <td colspan="<?php echo e($invoiceSetting->hsn_sac_code_show == 1 ? '4' : '3'); ?> "
                                                    class="blank-td border-bottom-0 border-left-0 border-right-0"></td>
                                                <td colspan="2" class="p-0 ">
                                                    <table width="100%">
                                                        <tr class="text-dark-grey" align="right">
                                                            <td class="w-50 border-top-0 border-left-0">
                                                                <?php echo app('translator')->get("modules.invoices.subTotal"); ?></td>
                                                            <td class="border-top-0 border-right-0">
                                                                <?php echo e(currency_format($proposal->sub_total, $proposal->currency_id, false)); ?>

                                                            </td>
                                                        </tr>
                                                        <?php if($discount != 0 && $discount != ''): ?>
                                                            <tr class="text-dark-grey" align="right">
                                                                <td class="w-50 border-top-0 border-left-0">
                                                                    <?php echo app('translator')->get("modules.invoices.discount"); ?></td>
                                                                <td class="border-top-0 border-right-0">
                                                                    <?php echo e(currency_format($discount, $proposal->currency_id, false)); ?>

                                                                </td>
                                                            </tr>
                                                        <?php endif; ?>
                                                        <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <tr class="text-dark-grey" align="right">
                                                                <td class="w-50 border-top-0 border-left-0">
                                                                    <?php echo e($key); ?></td>
                                                                <td class="border-top-0 border-right-0">
                                                                    <?php echo e(currency_format($tax, $proposal->currency_id, false)); ?>

                                                                </td>
                                                            </tr>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                        <tr class="bg-light-grey text-dark f-w-500 f-16" align="right">
                                                            <td class="w-50 border-bottom-0 border-left-0">
                                                                <?php echo app('translator')->get("modules.invoices.total"); ?>
                                                            </td>
                                                            <td class="border-bottom-0 border-right-0">
                                                                <?php echo e(currency_format($proposal->total, $proposal->currency_id, false)); ?>

                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>

                                </tr>
                            </table>
                            <table width="100%" class="inv-desc-mob d-block d-lg-none d-md-none">

                                <?php $__currentLoopData = $proposal->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                                    <?php if($item->item_summary != '' || $item->proposalItemImage): ?>
                                                        <tr>
                                                            <td class="border-left-0 border-right-0 border-bottom-0 f-12">
                                                                <?php echo nl2br(strip_tags($item->item_summary)); ?>

                                                                <?php if($item->proposalItemImage): ?>
                                                                    <p class="mt-2">
                                                                        <a href="javascript:;" class="img-lightbox"
                                                                           data-image-url="<?php echo e($item->proposalItemImage->file_url); ?>">
                                                                            <img
                                                                                src="<?php echo e($item->proposalItemImage->file_url); ?>"
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
                                                <?php echo app('translator')->get('modules.invoices.qty'); ?>
                                            </th>
                                            <td width="50%"><?php echo e($item->quantity); ?></td>
                                        </tr>
                                        <tr>
                                            <th width="50%" class="bg-light-grey text-dark-grey font-weight-bold">
                                                <?php echo app('translator')->get("modules.invoices.unitPrice"); ?>
                                                (<?php echo e($proposal->currency->currency_code); ?>)
                                            </th>
                                            <td width="50%">
                                                <?php echo e(currency_format($item->unit_price, $proposal->currency_id, false)); ?></td>
                                        </tr>
                                        <tr>
                                            <th width="50%" class="bg-light-grey text-dark-grey font-weight-bold">
                                                <?php echo app('translator')->get("modules.invoices.amount"); ?>
                                                (<?php echo e($proposal->currency->currency_code); ?>)
                                            </th>
                                            <td width="50%"><?php echo e(currency_format($item->amount, $proposal->currency_id, false)); ?>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td height="3" class="p-0 " colspan="2"></td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <tr>
                                    <th width="50%" class="text-dark-grey font-weight-normal">
                                        <?php echo app('translator')->get("modules.invoices.subTotal"); ?>
                                    </th>
                                    <td width="50%" class="text-dark-grey font-weight-normal">
                                        <?php echo e(currency_format($proposal->sub_total, $proposal->currency_id, false)); ?></td>
                                </tr>
                                <?php if($discount != 0 && $discount != ''): ?>
                                    <tr>
                                        <th width="50%" class="text-dark-grey font-weight-normal">
                                            <?php echo app('translator')->get("modules.invoices.discount"); ?>
                                        </th>
                                        <td width="50%" class="text-dark-grey font-weight-normal">
                                            <?php echo e(currency_format($discount, $proposal->currency_id, false)); ?></td>
                                    </tr>
                                <?php endif; ?>

                                <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <th width="50%" class="text-dark-grey font-weight-normal">
                                            <?php echo e($key); ?></th>
                                        <td width="50%" class="text-dark-grey font-weight-normal">
                                            <?php echo e(currency_format($tax, $proposal->currency_id, false)); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <tr>
                                    <th width="50%" class="f-16 bg-light-grey text-dark font-weight-bold">
                                        <?php echo app('translator')->get("modules.invoices.total"); ?>
                                        <?php echo app('translator')->get("modules.invoices.due"); ?></th>
                                    <td width="50%" class="f-16 bg-light-grey text-dark font-weight-bold">
                                        <?php echo e(currency_format($proposal->total, $proposal->currency_id, false)); ?></td>
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
                                                <p class="text-dark-grey"><?php echo !empty($proposal->note) ? nl2br($proposal->note) : '--'; ?></p>
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
                                <tr>
                                    <td>
                                        <?php if(isset($taxes) && $invoiceSetting->tax_calculation_msg == 1): ?>
                                            <p class="text-dark-grey">
                                                <?php if($proposal->calculate_tax == 'after_discount'): ?>
                                                    <?php echo app('translator')->get('messages.calculateTaxAfterDiscount'); ?>
                                                <?php else: ?>
                                                    <?php echo app('translator')->get('messages.calculateTaxBeforeDiscount'); ?>
                                                <?php endif; ?>
                                            </p>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            </table>
                        <?php endif; ?>
                    </div>

                    <?php if($proposal->signature): ?>
                        <div class="col-sm-12 mt-4">
                            <?php if(!is_null($proposal->signature->signature)): ?>
                                <h6><?php echo app('translator')->get('modules.estimates.signature'); ?></h6>
                                <img src="<?php echo e($proposal->signature->signature); ?>" style="width: 200px;">
                            <?php else: ?>
                                <h6><?php echo app('translator')->get('modules.estimates.signedBy'); ?></h6>
                            <?php endif; ?>
                            <p>(<?php echo e($proposal->signature->full_name); ?>)</p>
                        </div>
                    <?php endif; ?>

                    <?php if($proposal->client_comment): ?>
                        <div class="row">
                            <div class="col-md-12">
                                <hr>
                                <h4 class="name heading-h4" style="margin-bottom: 20px;"><?php echo app('translator')->get('app.rejectReason'); ?></h4>
                                <p> <?php echo e($proposal->client_comment); ?> </p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>


                <!-- CARD BODY END -->
                <!-- CARD FOOTER START -->
                <div
                    class="card-footer bg-white border-0 d-flex justify-content-end py-0 py-lg-4 py-md-4 mb-4 mb-lg-3 mb-md-3 ">

                    <div class="d-flex">

                        <?php if (isset($component)) { $__componentOriginal29acd9b76240152ae380821b082bd629 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal29acd9b76240152ae380821b082bd629 = $attributes; } ?>
<?php $component = App\View\Components\Forms\LinkSecondary::resolve(['link' => route('front.download_proposal', $proposal->hash),'icon' => 'download'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.link-secondary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\LinkSecondary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-3']); ?><?php echo app('translator')->get('app.download'); ?>
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

                        <?php if(!$proposal->signature && $proposal->status == 'waiting'): ?>
                            <?php if (isset($component)) { $__componentOriginal29acd9b76240152ae380821b082bd629 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal29acd9b76240152ae380821b082bd629 = $attributes; } ?>
<?php $component = App\View\Components\Forms\LinkSecondary::resolve(['link' => 'javascript:;','icon' => 'times'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.link-secondary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\LinkSecondary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-3','data-toggle' => 'modal','data-target' => '#decline-modal']); ?><?php echo app('translator')->get('app.decline'); ?>
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

                            <?php if (isset($component)) { $__componentOriginaldbb84df4c3a5cbdd95fb35d18ba6410f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldbb84df4c3a5cbdd95fb35d18ba6410f = $attributes; } ?>
<?php $component = App\View\Components\Forms\LinkPrimary::resolve(['link' => 'javascript:;','icon' => 'check'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.link-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\LinkPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['data-toggle' => 'modal','data-target' => '#signature-modal']); ?><?php echo app('translator')->get('app.accept'); ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldbb84df4c3a5cbdd95fb35d18ba6410f)): ?>
<?php $attributes = $__attributesOriginaldbb84df4c3a5cbdd95fb35d18ba6410f; ?>
<?php unset($__attributesOriginaldbb84df4c3a5cbdd95fb35d18ba6410f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldbb84df4c3a5cbdd95fb35d18ba6410f)): ?>
<?php $component = $__componentOriginaldbb84df4c3a5cbdd95fb35d18ba6410f; ?>
<?php unset($__componentOriginaldbb84df4c3a5cbdd95fb35d18ba6410f); ?>
<?php endif; ?>
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

<div id="signature-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog d-flex justify-content-center align-items-center modal-lg">
        <div class="modal-content">
            <?php echo $__env->make('proposals.ajax.accept-proposal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</div>

<div id="decline-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog d-flex justify-content-center align-items-center modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modelHeading"><?php echo app('translator')->get('modules.proposal.rejectConfirm'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">

                <?php if (isset($component)) { $__componentOriginal18ad2e0d264f9740dc73fff715357c28 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal18ad2e0d264f9740dc73fff715357c28 = $attributes; } ?>
<?php $component = App\View\Components\Form::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Form::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'acceptEstimate']); ?>
                    <div class="row">
                        <div class="col-sm-12">
                            <?php if (isset($component)) { $__componentOriginal2f60389a9e230471cd863683376c182f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2f60389a9e230471cd863683376c182f = $attributes; } ?>
<?php $component = App\View\Components\Forms\Textarea::resolve(['fieldId' => 'comment','fieldLabel' => __('app.reason'),'fieldName' => 'comment'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Textarea::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2f60389a9e230471cd863683376c182f)): ?>
<?php $attributes = $__attributesOriginal2f60389a9e230471cd863683376c182f; ?>
<?php unset($__attributesOriginal2f60389a9e230471cd863683376c182f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2f60389a9e230471cd863683376c182f)): ?>
<?php $component = $__componentOriginal2f60389a9e230471cd863683376c182f; ?>
<?php unset($__componentOriginal2f60389a9e230471cd863683376c182f); ?>
<?php endif; ?>
                        </div>
                    </div>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal18ad2e0d264f9740dc73fff715357c28)): ?>
<?php $attributes = $__attributesOriginal18ad2e0d264f9740dc73fff715357c28; ?>
<?php unset($__attributesOriginal18ad2e0d264f9740dc73fff715357c28); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal18ad2e0d264f9740dc73fff715357c28)): ?>
<?php $component = $__componentOriginal18ad2e0d264f9740dc73fff715357c28; ?>
<?php unset($__componentOriginal18ad2e0d264f9740dc73fff715357c28); ?>
<?php endif; ?>
            </div>
            <div class="modal-footer">
                <?php if (isset($component)) { $__componentOriginalc35c79ed7e812580313ad04118477974 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc35c79ed7e812580313ad04118477974 = $attributes; } ?>
<?php $component = App\View\Components\Forms\ButtonCancel::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-cancel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonCancel::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['data-dismiss' => 'modal','class' => 'border-0 mr-3']); ?><?php echo app('translator')->get('app.cancel'); ?>
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
                <?php if (isset($component)) { $__componentOriginalcf8d12533ff890e0d6573daf32b7618d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcf8d12533ff890e0d6573daf32b7618d = $attributes; } ?>
<?php $component = App\View\Components\Forms\ButtonPrimary::resolve(['icon' => 'times'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'decline-proposal']); ?><?php echo app('translator')->get('app.decline'); ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcf8d12533ff890e0d6573daf32b7618d)): ?>
<?php $attributes = $__attributesOriginalcf8d12533ff890e0d6573daf32b7618d; ?>
<?php unset($__attributesOriginalcf8d12533ff890e0d6573daf32b7618d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcf8d12533ff890e0d6573daf32b7618d)): ?>
<?php $component = $__componentOriginalcf8d12533ff890e0d6573daf32b7618d; ?>
<?php unset($__componentOriginalcf8d12533ff890e0d6573daf32b7618d); ?>
<?php endif; ?>
            </div>

        </div>
    </div>
</div>
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
<script>
    document.loading = '<?php echo app('translator')->get('app.loading'); ?>';
    const MODAL_DEFAULT = '#myModalDefault';
    const MODAL_LG = '#myModal';
    const MODAL_XL = '#myModalXl';
    const MODAL_HEADING = '#modelHeading';
    const RIGHT_MODAL = '#task-detail-1';
    const RIGHT_MODAL_CONTENT = '#right-modal-content';
    const RIGHT_MODAL_TITLE = '#right-modal-title';
</script>
<script>
    const datepickerConfig = {
        formatter: (input, date, instance) => {
            input.value = moment(date).format('<?php echo e($company->moment_format); ?>')
        },
        showAllDates: true,
        customDays: <?php echo json_encode(\App\Models\GlobalSetting::getDaysOfWeek()); ?>,
        customMonths: <?php echo json_encode(\App\Models\GlobalSetting::getMonthsOfYear()); ?>,
        customOverlayMonths: <?php echo json_encode(\App\Models\GlobalSetting::getMonthsOfYear()); ?>,
        overlayButton: "<?php echo app('translator')->get('app.submit'); ?>",
        overlayPlaceholder: "<?php echo app('translator')->get('app.enterYear'); ?>"
    };

    const dropifyMessages = {
        default: '<?php echo app('translator')->get("app.dragDrop"); ?>',
        replace: '<?php echo app('translator')->get("app.dragDropReplace"); ?>',
        remove: '<?php echo app('translator')->get("app.remove"); ?>',
        error: '<?php echo app('translator')->get("app.largeFile"); ?>'
    };
</script>
<script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
<script>
    const canvas = document.getElementById('signature-pad');

    const signaturePad = new SignaturePad(canvas, {
        backgroundColor: 'rgb(255, 255, 255)' // necessary for saving image as JPEG; can be removed is only saving as PNG or SVG
    });

    document.getElementById('clear-signature').addEventListener('click', function (e) {
        e.preventDefault();
        signaturePad.clear();
    });

    document.getElementById('undo-signature').addEventListener('click', function (e) {
        e.preventDefault();
        const data = signaturePad.toData();
        if (data) {
            data.pop(); // remove the last dot or line
            signaturePad.fromData(data);
        }
    });
</script>

<script>

    $('#toggle-pad-uploader').click(function () {
        const text = $('.signature').hasClass('d-none') ? '<?php echo e(__("modules.estimates.uploadSignature")); ?>' : '<?php echo e(__("app.sign")); ?>';

        $(this).html(text);

        $('.signature').toggleClass('d-none');
        $('.upload-image').toggleClass('d-none');
    });

    $('#save-signature').click(function () {
        const name = $('#full_name').val();
        const email = $('#email').val();
        const action_type = $('#action_type').val();
        const id = '<?php echo e($proposal->id); ?>';
        const isSignatureNull = signaturePad.isEmpty();
        const image = $('#image').val();
        const signature = signaturePad.toDataURL('image/png');
        const signatureApproval = <?php echo e($proposal->signature_approval); ?>;

        // this parameter is used for type of signature used and will be used on validation and upload signature image
        const signature_type = !$('.signature').hasClass('d-none') ? 'signature' : 'upload';

        if (signaturePad.isEmpty() && signatureApproval && !$('.signature').hasClass('d-none')) {
            Swal.fire({
                icon: 'error',
                text: '<?php echo e(__("messages.signatureRequired")); ?>',

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
            url: "<?php echo e(route('front.proposal_action', $proposal->id)); ?>",
            container: '#acceptEstimate',
            type: "POST",
            blockUI: true,
            file: true,
            disableButton: true,
            buttonSelector: '#save-signature',
            data: {
                _token: '<?php echo e(csrf_token()); ?>',
                id: id,
                full_name: name,
                email: email,
                type: action_type,
                signature_type: signature_type,
                isSignatureNull: isSignatureNull,
                signature: signature,
                image: image,
            },
            success: function (data) {
                if (data.status == 'success') {
                    window.location.reload();
                }
            }
        })
    });

    $('#decline-proposal').click(function () {
        const comment = $('#comment').val();

        $.easyAjax({
            url: "<?php echo e(route('front.proposal_action', $proposal->id)); ?>",
            type: "POST",
            blockUI: true,
            data: {
                type: 'decline',
                comment: comment,
                _token: '<?php echo e(csrf_token()); ?>'
            },
            success: function (data) {
                if (data.status == 'success') {
                    window.location.reload();
                }
            }
        })
    });

    $('body').on('click', '.img-lightbox', function () {
        const imageUrl = $(this).data('image-url');
        const url = "<?php echo e(route('front.public.show_image').'?image_url='); ?>" + imageUrl;
        $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
        $.ajaxModal(MODAL_LG, url);
    });

</script>

<script>
    $(window).on('load', function () {
        // Animate loader off screen
        init();
        $(".preloader-container").fadeOut("slow", function () {
            $(this).removeClass("d-flex");
        });
    });
</script>

</body>

</html>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/proposal.blade.php ENDPATH**/ ?>