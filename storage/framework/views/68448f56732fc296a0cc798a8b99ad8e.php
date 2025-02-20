<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo app('translator')->get('app.order'); ?> - <?php echo e($order->order_number); ?></title>
    <?php if ($__env->exists('invoices.pdf.invoice_pdf_css')) echo $__env->make('invoices.pdf.invoice_pdf_css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo e(global_setting()->favicon_url); ?>">
    <meta name="theme-color" content="#ffffff">

    <?php if(invoice_setting()->locale == 'ru'): ?>
        <style>
            body {
                margin: 0;
                /*font-family: dejavu sans;*/
                font-size: 13px;
            }
        </style>
    <?php else: ?>
        <style>
            body {
                margin: 0;
                /*font-family: Verdana, Arial, Helvetica, sans-serif;*/
                font-size: 13px;
            }
        </style>
    <?php endif; ?>

    <style>

        .bg-grey {
            background-color: #F2F4F7;
        }

        .bg-white {
            background-color: #fff;
        }

        .border-radius-25 {
            border-radius: 0.25rem;
        }

        .p-25 {
            padding: 1.25rem;
        }

        .f-11 {
            font-size: 11px;
        }

        .f-13 {
            font-size: 13px;
        }

        .f-14 {
            font-size: 13px;
        }

        .f-15 {
            font-size: 13px;
        }

        .f-21 {
            font-size: 17px;
        }

        .text-black {
            color: #28313c;
        }

        .text-grey {
            color: #616e80;
        }

        .font-weight-700 {
            font-weight: 700;
        }

        .text-uppercase {
            text-transform: uppercase;
        }

        .text-capitalize {
            text-transform: capitalize;
        }

        .line-height {
            line-height: 20px;
        }

        .mt-1 {
            margin-top: 1rem;
        }

        .mb-0 {
            margin-bottom: 0px;
        }

        .b-collapse {
            border-collapse: collapse;
        }

        .heading-table-left {
            padding: 6px;
            border: 1px solid #DBDBDB;
            font-weight: bold;
            background-color: #f1f1f3;
            border-right: 0;
        }

        .heading-table-right {
            padding: 6px;
            border: 1px solid #DBDBDB;
            border-left: 0;
        }

        .unpaid {
            color: #000000;
            border: 1px solid #000000;
            position: relative;
            padding: 11px 22px;
            font-size: 14px;
            border-radius: 0.25rem;
            width: 120px;
            text-align: center;
            margin-top: 50px;
        }

        .main-table-heading {
            border: 1px solid #DBDBDB;
            background-color: #f1f1f3;
            font-weight: 700;
        }

        .main-table-heading td {
            padding: 5px 8px;
            border: 1px solid #DBDBDB;
        }

        .main-table-items td {
            padding: 5px 8px;
            border: 1px solid #e7e9eb;
        }

        .total-box {
            border: 1px solid #e7e9eb;
            padding: 0px;
            border-bottom: 0px;
        }

        .subtotal {
            padding: 5px 8px;
            border: 1px solid #e7e9eb;
            border-top: 0;
            border-left: 0;
            border-right: 0;
        }

        .subtotal-amt {
            padding: 5px 8px;
            border: 1px solid #e7e9eb;
            border-top: 0;
            border-left: 0;
            border-right: 0;
        }

        .total {
            padding: 5px 8px;
            border: 1px solid #e7e9eb;
            border-top: 0;
            font-weight: 700;
            border-left: 0;
            border-right: 0;
        }

        .total-amt {
            padding: 5px 8px;
            border: 1px solid #e7e9eb;
            border-top: 0;
            border-left: 0;
            border-right: 0;
            font-weight: 700;
        }

        .balance {
            font-size: 14px;
            font-weight: bold;
            background-color: #f1f1f3;
        }

        .balance-left {
            padding: 5px 8px;
            border: 1px solid #e7e9eb;
            border-top: 0;
            border-left: 0;
            border-right: 0;
        }

        .balance-right {
            padding: 5px 8px;
            border: 1px solid #e7e9eb;
            border-top: 0;
            border-left: 0;
            border-right: 0;
        }

        .centered {
            margin: 0 auto;
        }

        .rightaligned {
            margin-right: 0;
            margin-left: auto;
        }

        .leftaligned {
            margin-left: 0;
            margin-right: auto;
        }

        .page_break {
            page-break-before: always;
        }

        #logo {
            height: 50px;
        }

        .note-text {
            max-width:175px;
        }

        .word-break {
            word-wrap:break-word;
            word-break: break-all;
        }

        .summary {
            padding: 11px 10px;
            border: 1px solid #e7e9eb;
            font-size: 11px;
        }

        .border-left-0 {
            border-left: 0 !important;
        }

        .border-right-0 {
            border-right: 0 !important;
        }

        .border-top-0 {
            border-top: 0 !important;
        }

        .border-bottom-0 {
            border-bottom: 0 !important;
        }


    </style>
</head>

<body class="content-wrapper">
    <table class="bg-white" border="0" cellpadding="0" cellspacing="0" width="100%" role="presentation">
        <tbody>
            <!-- Table Row Start -->
            <tr>
                <td><img src="<?php echo e(invoice_setting()->logo_url); ?>" alt="<?php echo e(company()->company_name); ?>"
                        id="logo" /></td>
                <td align="right" class="f-21 text-black font-weight-700 text-uppercase"><?php echo app('translator')->get('app.order'); ?></td>
            </tr>
            <!-- Table Row End -->
            <!-- Table Row Start -->
            <tr>
                <td>
                    <p class="line-height mt-1 mb-0 f-14 text-black">
                        <?php echo e(company()->company_name); ?><br>
                        <?php if(!is_null($settings) && $order->address): ?>
                            <?php echo nl2br($order->address->address); ?><br>
                        <?php endif; ?>
                        <?php echo e(company()->company_phone); ?><br>
                        <?php if($invoiceSetting->show_gst == 'yes' && $order->address): ?>
                            <br><?php echo e($order->address->tax_name); ?>: <?php echo e($order->address->tax_number); ?>

                        <?php endif; ?>
                    </p>
                </td>
                <td>
                    <table class="text-black mt-1 f-13 b-collapse rightaligned">
                        <tr>
                            <td class="heading-table-left"><?php echo app('translator')->get('modules.orders.orderNumber'); ?></td>
                            <td class="heading-table-right"><?php echo e($order->order_number); ?></td>
                        </tr>
                        <tr>
                            <td class="heading-table-left"><?php echo app('translator')->get('modules.orders.orderDate'); ?></td>
                            <td class="heading-table-right"><?php echo e(\Carbon\Carbon::parse($order->order_date)->translatedFormat(company()->date_format)); ?>

                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <!-- Table Row End -->
            <!-- Table Row Start -->
            <tr>
                <td height="10"></td>
            </tr>
            <!-- Table Row End -->
            <!-- Table Row Start -->
            <tr>
                <td colspan="2">
                    <?php
                        $client = $order->client;
                    ?>

                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                        <?php if($order->project): ?>
                            <tr>
                                <td class="f-14 text-black">
                                    <p class="line-height mb-0">
                                        <span class="text-grey text-capitalize">
                                            <?php echo app('translator')->get('modules.invoices.project'); ?></span><br>
                                        <?php if($order->project): ?>
                                        <?php echo e($order->project->project_name); ?>

                                        <?php endif; ?>
                                    </p>
                                </td>
                            </tr>
                        <?php endif; ?>
                        <tr>
                            <td class="f-14 text-black">
                                <?php if(($invoiceSetting->show_client_name == 'yes' || $invoiceSetting->show_client_email == 'yes' || $invoiceSetting->show_client_phone == 'yes' || $invoiceSetting->show_client_company_name == 'yes' || $invoiceSetting->show_client_company_address == 'yes') && $client): ?>
                                    <p class="line-height mb-0">
                                        <span class="text-grey text-capitalize">
                                            <?php echo app('translator')->get("modules.invoices.billedTo"); ?></span><br>

                                            <?php if($client->name && $invoiceSetting->show_client_name == 'yes'): ?>
                                                <?php echo e($client->name_salutation); ?><br>
                                            <?php endif; ?>

                                            <?php if($client->email && $invoiceSetting->show_client_email == 'yes'): ?>
                                                <?php echo e($client->email); ?><br>
                                            <?php endif; ?>

                                            <?php if($client->mobile && $invoiceSetting->show_client_phone == 'yes'): ?>
                                                <?php echo e($client->mobile_with_phonecode); ?><br>
                                            <?php endif; ?>

                                            <?php if($client->clientDetails->company_name && $invoiceSetting->show_client_company_name == 'yes'): ?>
                                                <?php echo e($client->clientDetails->company_name); ?><br>
                                            <?php endif; ?>

                                            <?php if($client->clientDetails->address && $invoiceSetting->show_client_company_address == 'yes'): ?>
                                                <?php echo nl2br($client->clientDetails->address); ?>

                                            <?php endif; ?>
                                    </p>
                                <?php endif; ?>

                                <?php if($invoiceSetting->show_gst == 'yes' && !is_null($client->clientDetails->gst_number)): ?>
                                    <br><?php echo app('translator')->get('app.gstIn'); ?>:
                                    <?php echo e($client->clientDetails->gst_number); ?>

                                <?php endif; ?>
                            </td>
                            <td class="f-14 text-black">
                                <?php if($order->show_shipping_address == 'yes' && $client->clientDetails->shipping_address && $invoiceSetting->show_client_company_address == 'yes'): ?>
                                    <p class="line-height"><span
                                            class="text-grey text-capitalize"><?php echo app('translator')->get('app.shippingAddress'); ?></span><br>
                                        <?php echo nl2br($client->clientDetails->shipping_address); ?></p>
                                <?php endif; ?>
                            </td>
                            <td align="right">
                                <br />
                                <div class="text-uppercase bg-white unpaid rightaligned">
                                    <?php echo app('translator')->get('modules.invoices.'.$order->status); ?>
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>

    <table width="100%" class="f-14 b-collapse">
        <tr>
            <td height="10" colspan="<?php echo e($invoiceSetting->hsn_sac_code_show ? '7' : '6'); ?>"></td>
        </tr>
        <!-- Table Row Start -->
        <tr class="main-table-heading text-grey">
            <td width="40%"><?php echo app('translator')->get('app.description'); ?></td>
            <?php if($invoiceSetting->hsn_sac_code_show): ?>
                <td align="right"><?php echo app('translator')->get("app.hsnSac"); ?></td>
            <?php endif; ?>
            <th class="qty"><?php echo app('translator')->get('modules.invoices.qty'); ?></th>
            s<td align="right"><?php echo app('translator')->get('app.sku'); ?></td>
            <td align="right"><?php echo app('translator')->get("modules.invoices.unitPrice"); ?></td>
            <td align="right"><?php echo app('translator')->get("modules.invoices.tax"); ?></td>
            <td align="right" width="<?php echo e($invoiceSetting->hsn_sac_code_show ? '17%' : '20%'); ?>"><?php echo app('translator')->get("modules.invoices.amount"); ?>
                (<?php echo e($order->currency->currency_code); ?>)</td>
        </tr>
        <!-- Table Row End -->
        <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($item->type == 'item'): ?>
                <!-- Table Row Start -->
                <tr class="main-table-items text-black">
                    <td width="40%" class="border-bottom-0 word-break">
                        <?php echo e($item->item_name); ?>

                    </td>
                    <?php if($invoiceSetting->hsn_sac_code_show): ?>
                        <td align="right" width="10%" class="border-bottom-0"><?php echo e($item->hsn_sac_code ? $item->hsn_sac_code : '--'); ?></td>
                    <?php endif; ?>
                    <td align="right" width="10%" class="border-bottom-0"><?php echo e($item->quantity); ?><?php if($item->unit): ?><br><span class="f-11 text-dark-grey"><?php echo e($item->unit->unit_type); ?></span><?php endif; ?></td>
                    <td align="right" width="10%" class="border-bottom-0"><span class="f-11 text-grey"><?php echo e($item->sku); ?></td>
                    <td align="right" class="border-bottom-0"><?php echo e(currency_format($item->unit_price, $order->currency_id, false)); ?></td>
                    <td align="right" class="border-bottom-0"><?php echo e($item->tax_list); ?></td>
                    <td align="right" class="border-bottom-0" width="<?php echo e($invoiceSetting->hsn_sac_code_show ? '17%' : '20%'); ?>"><?php echo e(currency_format($item->amount, $order->currency_id, false)); ?></td>
                </tr>
                <!-- Table Row End -->
                <?php if($item->item_summary != '' || $item->orderItemImage): ?>
                
                </table>
                    <div class="f-13 summary text-black border-bottom-0 word-break">
                        <?php echo nl2br(pdfStripTags($item->item_summary)); ?>

                        <?php if($item->orderItemImage): ?>
                            <p class="mt-2">
                                <img src="<?php echo e($item->orderItemImage->file_url); ?>" width="60" height="60"
                                    class="img-thumbnail">
                            </p>
                        <?php endif; ?>
                    </div>
                
                <table class="bg-white" border="0" cellpadding="0" cellspacing="0" width="100%" role="presentation">
                <?php endif; ?>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <!-- Table Row Start -->
        <tr>
            <td class="total-box" align="right" colspan="<?php echo e($invoiceSetting->hsn_sac_code_show ? '6' : '5'); ?>">
                <table width="100%" border="0" class="b-collapse">
                    <!-- Table Row Start -->
                    <tr align="right" class="text-grey">
                        <td width="50%" class="subtotal"><?php echo app('translator')->get("modules.invoices.subTotal"); ?></td>
                    </tr>
                    <!-- Table Row End -->
                    <?php if($discount != 0 && $discount != ''): ?>
                        <!-- Table Row Start -->
                        <tr align="right" class="text-grey">
                            <td width="50%" class="subtotal"><?php echo app('translator')->get("modules.invoices.discount"); ?>
                            </td>
                        </tr>
                        <!-- Table Row End -->
                    <?php endif; ?>
                    <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <!-- Table Row Start -->
                        <tr align="right" class="text-grey">
                            <td width="50%" class="subtotal"><?php echo e($key); ?></td>
                        </tr>
                        <!-- Table Row End -->
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <!-- Table Row Start -->
                    <tr align="right" class="balance text-black">
                        <td width="50%" class="balance-left"><?php echo app('translator')->get("modules.invoices.total"); ?></td>
                    </tr>
                    <!-- Table Row End -->

                </table>
            </td>
            <td class="total-box" align="right" width="<?php echo e($invoiceSetting->hsn_sac_code_show ? '17%' : '20%'); ?>">
                <table width="100%" class="b-collapse">
                    <!-- Table Row Start -->
                    <tr align="right" class="text-grey">
                        <td class="subtotal-amt">
                            <?php echo e(currency_format($order->sub_total, $order->currency_id, false)); ?></td>
                    </tr>
                    <!-- Table Row End -->
                    <?php if($discount != 0 && $discount != ''): ?>
                        <!-- Table Row Start -->
                        <tr align="right" class="text-grey">
                            <td class="subtotal-amt">
                                <?php echo e(currency_format($discount, $order->currency_id, false)); ?></td>
                        </tr>
                        <!-- Table Row End -->
                    <?php endif; ?>
                    <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <!-- Table Row Start -->
                        <tr align="right" class="text-grey">
                            <td class="subtotal-amt"><?php echo e(currency_format($tax, $order->currency_id, false)); ?>

                            </td>
                        </tr>
                        <!-- Table Row End -->
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <!-- Table Row Start -->
                    <tr align="right" class="balance text-black">
                        <td class="balance-right">
                            <?php echo e(currency_format($order->total, $order->currency_id, false)); ?></td>
                    </tr>
                    <!-- Table Row End -->
                </table>
            </td>
        </tr>
    </table>
    <?php if($order->note != ''): ?>
    <table class="bg-white" border="0" cellpadding="0" cellspacing="0" width="100%" role="presentation">
        <tbody>
            <!-- Table Row Start -->
                <tr>
                    <td height="10">&nbsp;</td>
                </tr>
                <tr>
                    <td class="f-11"><?php echo app('translator')->get('app.note'); ?></td>
                </tr>
                <!-- Table Row End -->
                <!-- Table Row Start -->
                <tr class="text-grey">
                    <td class="f-11 line-height word-break note-text"><?php echo $order->note ? nl2br($order->note) : '--'; ?></td>
                </tr>
                <?php if($invoiceSetting->other_info): ?>
                    <tr class="text-grey">
                        <td class="f-11 line-height word-break note-text">
                            <br><?php echo nl2br($invoiceSetting->other_info); ?>

                        </td>
                    </tr>
                <?php endif; ?>

            <!-- Table Row End -->
        </tbody>
    </table>
    <?php endif; ?>
</body>

</html>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/orders/pdf/invoice-5.blade.php ENDPATH**/ ?>