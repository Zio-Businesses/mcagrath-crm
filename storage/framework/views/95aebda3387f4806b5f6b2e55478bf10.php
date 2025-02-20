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

        .logo {
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
                                    <?php echo app('translator')->get('app.estimate'); ?></td>
                            </tr>
                            <tr class="inv-num">
                                <td class="f-14 text-dark">
                                    <p class="mt-3 mb-0">
                                        <?php echo e($company->company_name); ?><br>
                                        <?php if(!is_null($company)): ?>
                                            <?php echo nl2br($defaultAddress->address); ?><br>
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
                                                <?php echo app('translator')->get('modules.estimates.estimatesNumber'); ?></td>
                                            <td class="border-left-0"><?php echo e($estimate->estimate_number); ?></td>
                                        </tr>
                                        <tr>
                                            <td class="bg-light-grey border-right-0 f-w-500">
                                                <?php echo app('translator')->get('modules.estimates.validTill'); ?></td>
                                            <td class="border-left-0">
                                                <?php echo e($estimate->valid_till->translatedFormat($company->date_format)); ?>

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
                                    <?php if(($estimate->client || $estimate->clientDetails) && ($estimate->client->name || $estimate->client->email || $estimate->client->mobile || $estimate->clientDetails->company_name || $estimate->clientDetails->address) && ($invoiceSetting->show_client_name == 'yes' || $invoiceSetting->show_client_email == 'yes' || $invoiceSetting->show_client_phone == 'yes' || $invoiceSetting->show_client_company_name == 'yes' || $invoiceSetting->show_client_company_address == 'yes')): ?>
                                        <p class="mb-0 text-left">
                                            <span class="text-dark-grey text-capitalize">
                                                <?php echo app('translator')->get("modules.invoices.billedTo"); ?>
                                            </span><br>

                                            <?php if($estimate->client && $estimate->client->name && $invoiceSetting->show_client_name == 'yes'): ?>
                                                <?php echo e($estimate->client->name_salutation); ?><br>
                                            <?php endif; ?>
                                            <?php if($estimate->client && $estimate->client->email && $invoiceSetting->show_client_email == 'yes'): ?>
                                                <?php echo e($estimate->client->email); ?><br>
                                            <?php endif; ?>
                                            <?php if($estimate->client && $estimate->client->mobile && $invoiceSetting->show_client_phone == 'yes'): ?>
                                                <?php echo e($estimate->client->mobile_with_phonecode); ?>

                                                <br>
                                            <?php endif; ?>
                                            <?php if($estimate->clientDetails && $estimate->clientDetails->company_name && $invoiceSetting->show_client_company_name == 'yes'): ?>
                                                <?php echo e($estimate->clientDetails->company_name); ?><br>
                                            <?php endif; ?>
                                            <?php if($estimate->clientDetails && $estimate->clientDetails->address && $invoiceSetting->show_client_company_address == 'yes'): ?>
                                                <?php echo nl2br($estimate->clientDetails->address); ?>

                                            <?php endif; ?>
                                        </p>
                                    <?php endif; ?>
                                </td>

                                <td align="right" class="mt-4 mt-lg-0 mt-md-0">
                                    <?php if($estimate->clientDetails->company_logo): ?>
                                        <img src="<?php echo e($estimate->clientDetails->image_url); ?>"
                                             alt="<?php echo e($estimate->clientDetails->company_name); ?>" class="logo"/>
                                        <br><br><br>
                                    <?php endif; ?>
                                    <span
                                        class="unpaid <?php echo e($estimate->status == 'draft' ? 'text-primary border-primary' : ''); ?> <?php echo e($estimate->status == 'accepted' ? 'text-success border-success' : ''); ?> rounded f-15 "><?php echo app('translator')->get('modules.estimates.'.$estimate->status); ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td height="30" colspan="2"></td>
                            </tr>
                        </table>
                        <div class="row">
                            <div class="col-sm-12 ql-editor">
                                <?php echo $estimate->description; ?>

                            </div>
                        </div>
                        <table width="100%" class="inv-desc d-none d-lg-table d-md-table">
                            <tr>
                                <td colspan="2">
                                    <table class="inv-detail f-14 table-responsive-sm" width="100%">
                                        <tr class="i-d-heading bg-light-grey text-dark-grey font-weight-bold">
                                            <td class="border-right-0"><?php echo app('translator')->get('app.description'); ?></td>
                                            <?php if($invoiceSetting->hsn_sac_code_show): ?>
                                                <td class="border-right-0 border-left-0" align="right">
                                                    <?php echo app('translator')->get("app.hsnSac"); ?></td>
                                            <?php endif; ?>
                                            <td class="border-right-0 border-left-0"
                                                align="right"><?php echo app('translator')->get('modules.invoices.qty'); ?></td>
                                            <td class="border-right-0 border-left-0" align="right">
                                                <?php echo app('translator')->get("modules.invoices.unitPrice"); ?>
                                                (<?php echo e($estimate->currency->currency_code); ?>)
                                            </td>
                                            <!-- <td class="border-left-0" align="right"><?php echo app('translator')->get("modules.invoices.tax"); ?></td> -->
                                            <td class="border-left-0" align="right">
                                                <?php echo app('translator')->get("modules.invoices.amount"); ?>
                                                (<?php echo e($estimate->currency->currency_code); ?>)
                                            </td>
                                        </tr>
                                        <?php $__currentLoopData = $estimate->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($item->type == 'item'): ?>
                                                <tr class="text-dark font-weight-semibold f-13">
                                                    <td><?php echo e($item->item_name); ?></td>
                                                    <?php if($invoiceSetting->hsn_sac_code_show): ?>
                                                        <td align="right"><?php echo e($item->hsn_sac_code); ?></td>
                                                    <?php endif; ?>
                                                    <td align="right"><?php echo e($item->quantity); ?><?php if($item->unit): ?>
                                                            <br><span
                                                                class="f-11 text-dark-grey"><?php echo e($item->unit->unit_type); ?></span>
                                                        <?php endif; ?></td>
                                                    <td align="right">
                                                        <?php echo e(currency_format($item->unit_price, $estimate->currency_id, false)); ?>

                                                    </td>
                                                    <!-- <td align="right"><?php echo e($item->tax_list); ?></td> -->
                                                    <td align="right">
                                                        <?php echo e(currency_format($item->amount, $estimate->currency_id, false)); ?>

                                                    </td>
                                                </tr>

                                                <?php if($item->item_summary || $item->estimateItemImage): ?>
                                                    <tr class="text-dark f-12">
                                                        <td colspan="<?php echo e($invoiceSetting->hsn_sac_code_show ? '6' : '5'); ?>"
                                                            class="border-bottom-0">
                                                            <?php echo nl2br(strip_tags($item->item_summary)); ?>

                                                            <?php if($item->estimateItemImage): ?>
                                                                <p class="mt-2">
                                                                    <a href="javascript:;" class="img-lightbox"
                                                                       data-image-url="<?php echo e($item->estimateItemImage->file_url); ?>">
                                                                        <img
                                                                            src="<?php echo e($item->estimateItemImage->file_url); ?>"
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
                                            <td colspan="3"
                                                class="blank-td border-bottom-0 border-left-0 border-right-0"></td>
                                            <td colspan="<?php echo e($invoiceSetting->hsn_sac_code_show ? 4 : 3); ?>"
                                                class="p-0 ">
                                                <table width="100%">
                                                    <tr class="text-dark-grey" align="right">
                                                        <td class="border-top-0 border-left-0">
                                                            <?php echo app('translator')->get("modules.invoices.subTotal"); ?></td>
                                                        <td class="border-top-0 border-right-0">
                                                            <?php echo e(currency_format($estimate->sub_total, $estimate->currency_id, false)); ?>

                                                        </td>
                                                    </tr>
                                                    <?php if($discount != 0 && $discount != ''): ?>
                                                        <tr class="text-dark-grey" align="right">
                                                            <td class="border-top-0 border-left-0">
                                                                <?php echo app('translator')->get("modules.invoices.discount"); ?></td>
                                                            <td class="border-top-0 border-right-0">
                                                                <?php echo e(currency_format($discount, $estimate->currency_id, false)); ?>

                                                            </td>
                                                        </tr>
                                                    <?php endif; ?>
                                                    <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr class="text-dark-grey" align="right">
                                                            <td class="border-top-0 border-left-0">
                                                                <?php echo e($key); ?></td>
                                                            <td class="border-top-0 border-right-0">
                                                                <?php echo e(currency_format($tax, $estimate->currency_id, false)); ?>

                                                            </td>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <tr class=" text-dark-grey font-weight-bold" align="right">
                                                        <td class="border-bottom-0 border-left-0">
                                                            <?php echo app('translator')->get("modules.invoices.total"); ?></td>
                                                        <td class="border-bottom-0 border-right-0">
                                                            <?php echo e(currency_format($estimate->total, $estimate->currency_id, false)); ?>

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

                            <?php $__currentLoopData = $estimate->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                                                        <img
                                                                            src="<?php echo e($item->estimateItemImage->file_url); ?>"
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
                                            <?php echo app('translator')->get("modules.invoices.unitPrice"); ?>
                                            (<?php echo e($estimate->currency->currency_code); ?>)
                                        </th>
                                        <td width="50%">
                                            <?php echo e(currency_format($item->unit_price, $estimate->currency_id, false)); ?></td>
                                    </tr>
                                    <tr>
                                        <th width="50%" class="bg-light-grey text-dark-grey font-weight-bold">
                                            <?php echo app('translator')->get("modules.invoices.amount"); ?>
                                            (<?php echo e($estimate->currency->currency_code); ?>)
                                        </th>
                                        <td width="50%"><?php echo e(currency_format($item->amount, $estimate->currency_id, false)); ?>

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
                                    <?php echo e(currency_format($estimate->sub_total, $estimate->currency_id, false)); ?></td>
                            </tr>
                            <?php if($discount != 0 && $discount != ''): ?>
                                <tr>
                                    <th width="50%" class="text-dark-grey font-weight-normal">
                                        <?php echo app('translator')->get("modules.invoices.discount"); ?>
                                    </th>
                                    <td width="50%" class="text-dark-grey font-weight-normal">
                                        <?php echo e(currency_format($discount, $estimate->currency_id, false)); ?></td>
                                </tr>
                            <?php endif; ?>

                            <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th width="50%" class="text-dark-grey font-weight-normal">
                                        <?php echo e($key); ?></th>
                                    <td width="50%" class="text-dark-grey font-weight-normal">
                                        <?php echo e(currency_format($tax, $estimate->currency_id, false)); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th width="50%" class="text-dark-grey font-weight-bold">
                                    <?php echo app('translator')->get("modules.invoices.total"); ?></th>
                                <td width="50%" class="text-dark-grey font-weight-bold">
                                    <?php echo e(currency_format($estimate->total, $estimate->currency_id, false)); ?></td>
                            </tr>
                        </table>
                        <table class="inv-note">
                            <tr>
                                <td height="30" colspan="2"></td>
                            </tr>
                            <tr>
                                <!-- <td style="vertical-align: text-top">
                                    <table>
                                        <tr><?php echo app('translator')->get('app.note'); ?></tr>
                                        <tr>
                                            <p class="text-dark-grey"><?php echo $estimate->note ?? '--'; ?></p>
                                        </tr>
                                    </table>
                                </td> -->
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
                            <?php if(isset($taxes) && $invoiceSetting->tax_calculation_msg == 1): ?>
                                <tr>
                                    <td>
                                        <p class="text-dark-grey">
                                            <?php if($estimate->calculate_tax == 'after_discount'): ?>
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
                    <?php
                    function downloadImageLocally($url) {
                        // Create a temporary file name
                        $tempPath = storage_path('app/tmp/' . uniqid() . '.jpg');

                        // Download the file from S3 to the temporary path
                        $imageContent = file_get_contents($url);
                        if ($imageContent !== false) {
                            file_put_contents($tempPath, $imageContent);
                            return $tempPath;
                        }

                        return false;
                    }

                    function correctImageOrientation($path) {
                        if (function_exists('exif_read_data')) {
                            $exif = @exif_read_data($path);
                            if ($exif && isset($exif['Orientation'])) {
                                $orientation = $exif['Orientation'];
                                $image = imagecreatefromjpeg($path); // Assume the image is JPEG
                                switch ($orientation) {
                                    case 3:
                                        $image = imagerotate($image, 180, 0);
                                        break;
                                    case 6:
                                        $image = imagerotate($image, -90, 0);
                                        break;
                                    case 8:
                                        $image = imagerotate($image, 90, 0);
                                        break;
                                }
                                // Save the corrected image temporarily
                                imagejpeg($image, $path); // Overwrite the original file
                                imagedestroy($image);
                            }
                        }
                        return $path;
                    }

                    ?>

                    <!-- Inside the rendering section -->
                    <?php if($estimate->files): ?>
                    <table width="100%" class="f-14 b-collapse" cellspacing="0" cellpadding="5" style="width: 100%; border-collapse: collapse;">
                        <tr>
                        <?php
                            $counter = 0;
                            $tempFiles = []; // Array to keep track of temporary files
                        ?>
                        <?php $__currentLoopData = $estimate->files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($file->icon == 'images'): ?>
                                <?php if($counter % 4 == 0 && $counter != 0): ?> <!-- Close the row after every 4th image -->
                                    </tr><tr>
                                <?php endif; ?>
                                <?php
                                    // Download the image locally from S3
                                    $localImagePath = downloadImageLocally($file->file_url);
                                    
                                    if ($localImagePath) {
                                        // Correct the orientation if needed
                                        $correctedImageUrl = correctImageOrientation($localImagePath);
                    
                                    }
                                ?>
                                <td style="padding: 5px; text-align: center; vertical-align: top; border: 1px solid #ddd;">
                                    <?php if(isset($correctedImageUrl)): ?>
                                        <img src="data:image/png;base64,<?php echo e(base64_encode(file_get_contents( "$correctedImageUrl" ))); ?>" width="150" height="150" style="margin: 0 auto; display: inline-block;"/>
                                    <?php else: ?>
                                        <span>Image not available</span>
                                    <?php endif; ?>
                                    <div class="f-11" style="width: 150px; word-wrap: break-word; text-align: center; margin-top: 5px;"><?php echo e($file->filename); ?></div>
                                </td>
                                <?php $counter++; ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tr>
                    </table>
                    <?php endif; ?>
                    
                    <?php if($estimate->sign): ?>
                        <div class="row">
                            <div class="col-sm-12 mt-4">
                                <h6><?php echo app('translator')->get('modules.estimates.signature'); ?></h6>
                                <img src="<?php echo e($estimate->sign->signature); ?>" style="width: 200px;">
                                <p>(<?php echo e($estimate->sign->full_name); ?>)</p>
                            </div>
                        </div>
                    <?php endif; ?>

                </div>
                <!-- CARD BODY END -->
                <!-- CARD FOOTER START -->
                <div
                    class="card-footer bg-white border-0 d-flex justify-content-end py-0 py-lg-4 py-md-4 mb-4 mb-lg-3 mb-md-3 ">

                    <div class="d-flex">

                        <?php if (isset($component)) { $__componentOriginalc35c79ed7e812580313ad04118477974 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc35c79ed7e812580313ad04118477974 = $attributes; } ?>
<?php $component = App\View\Components\Forms\ButtonCancel::resolve(['link' => route('estimates.index')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-cancel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonCancel::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'border-0 mr-3']); ?>
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

                        <?php if (isset($component)) { $__componentOriginal29acd9b76240152ae380821b082bd629 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal29acd9b76240152ae380821b082bd629 = $attributes; } ?>
<?php $component = App\View\Components\Forms\LinkSecondary::resolve(['link' => route('front.estimate.download', [$estimate->hash]),'icon' => 'download'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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

                        <?php if($estimate->status == 'waiting'): ?>
                            <?php if (isset($component)) { $__componentOriginal29acd9b76240152ae380821b082bd629 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal29acd9b76240152ae380821b082bd629 = $attributes; } ?>
<?php $component = App\View\Components\Forms\LinkSecondary::resolve(['link' => 'javascript:;','icon' => 'times'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.link-secondary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\LinkSecondary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-3','id' => 'decline-estimate']); ?><?php echo app('translator')->get('app.decline'); ?>
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

            <div id="signature-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog d-flex justify-content-center align-items-center modal-xl">
                    <div class="modal-content">
                        <?php echo $__env->make('estimates.ajax.accept-estimate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>

        </div>
    </section>
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
    const MODAL_LG = '#myModal';
    const MODAL_HEADING = '#modelHeading';
    const dropifyMessages = {
        default: '<?php echo app('translator')->get("app.dragDrop"); ?>',
        replace: '<?php echo app('translator')->get("app.dragDropReplace"); ?>',
        remove: '<?php echo app('translator')->get("app.remove"); ?>',
        error: '<?php echo app('translator')->get("app.largeFile"); ?>'
    };

    $(window).on('load', function () {
        // Animate loader off screen
        init();
        $(".preloader-container").fadeOut("slow", function () {
            $(this).removeClass("d-flex");
        });
    });

    $(body).on('click', '#download-invoice', function () {
        window.location.href = "<?php echo e(route('invoices.download', [$estimate->id])); ?>";
    })
</script>

<script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
<script>
    var canvas = document.getElementById('signature-pad');

    var signaturePad = new SignaturePad(canvas, {
        backgroundColor: 'rgb(255, 255, 255)' // necessary for saving image as JPEG; can be removed is only saving as PNG or SVG
    });

    document.getElementById('clear-signature').addEventListener('click', function (e) {
        e.preventDefault();
        signaturePad.clear();
    });

    document.getElementById('undo-signature').addEventListener('click', function (e) {
        e.preventDefault();
        var data = signaturePad.toData();
        if (data) {
            data.pop(); // remove the last dot or line
            signaturePad.fromData(data);
        }
    });

    $('#decline-estimate').click(function () {
        $.easyAjax({
            type: 'POST',
            url: "<?php echo e(route('front.estimate.decline', $estimate->id)); ?>",
            blockUI: true,
            data: {
                _token: '<?php echo e(csrf_token()); ?>'
            },
            success: function (response) {
                if (response.status == 'success') {
                    window.location.reload();
                }
            }
        })
    });

    $('#toggle-pad-uploader').click(function () {
        var text = $('.signature').hasClass('d-none') ? '<?php echo e(__("modules.estimates.uploadSignature")); ?>' : '<?php echo e(__("app.sign")); ?>';

        $(this).html(text);

        $('.signature').toggleClass('d-none');
        $('.upload-image').toggleClass('d-none');
    });

    $('#save-signature').click(function () {
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
            url: "<?php echo e(route('front.estimate.accept', $estimate->id)); ?>",
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
            success: function (response) {
                if (response.status == 'success') {
                    window.location.reload();
                }
            }
        })
    });

    $('body').on('click', '.img-lightbox', function () {
        var imageUrl = $(this).data('image-url');
        const url = "<?php echo e(route('front.public.show_image').'?image_url='); ?>" + imageUrl;
        $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
        $.ajaxModal(MODAL_LG, url);
    });
</script>

</body>

</html>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/estimate.blade.php ENDPATH**/ ?>