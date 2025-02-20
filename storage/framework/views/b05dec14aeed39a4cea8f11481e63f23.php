<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?php echo app('translator')->get('app.order'); ?></title>
    <?php if ($__env->exists('invoices.pdf.invoice_pdf_css')) echo $__env->make('invoices.pdf.invoice_pdf_css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <style>
        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }

        a {
            text-decoration: none;
        }

        body {
            position: relative;
            width: 100%;
            height: auto;
            margin: 0 auto;
            color: #555555;
            background: #FFFFFF;
            font-size: 13px;
            /*font-family: Verdana, Arial, Helvetica, sans-serif;*/
        }

        h2 {
            font-weight: normal;
        }

        header {
            padding: 10px 0;
        }

        #logo img {
            height: 50px;
            margin-bottom: 15px;
        }

        #details {
            margin-bottom: 25px;
        }

        #client {
            padding-left: 6px;
            float: left;
        }

        #client .to {
            color: #777777;
        }

        h2.name {
            font-size: 1.2em;
            font-weight: normal;
            margin: 0;
        }

        #invoice h1 {
            color: #0087C3;
            line-height: 2em;
            font-weight: normal;
            margin: 0 0 10px 0;
            font-size: 20px;
        }

        #invoice .date {
            font-size: 1.1em;
            color: #777777;
        }

        table {
            width: 100%;
            border-spacing: 0;
            /* margin-bottom: 20px; */
        }

        table th,
        table td {
            padding: 5px 8px;
            text-align: center;
        }

        table th {
            background: #EEEEEE;
        }

        table th {
            white-space: nowrap;
            font-weight: normal;
        }

        table td {
            text-align: right;
        }

        table td.desc h3,
        table td.qty h3 {
            font-size: 0.9em;
            font-weight: normal;
            margin: 0 0 0 0;
        }

        table .no {
            font-size: 1.2em;
            width: 10%;
            text-align: center;
            border-left: 1px solid #e7e9eb;
        }

        table .desc, table .item-summary  {
            text-align: left;
        }

        table .unit {
            /* background: #DDDDDD; */
            border: 1px solid #e7e9eb;
        }


        table .total {
            background: #57B223;
            color: #FFFFFF;
        }

        table td.unit,
        table td.qty,
        table td.total {
            font-size: 1.2em;
            text-align: center;
        }

        table td.unit {
            width: 35%;
        }

        table td.desc {
            width: 45%;
        }

        table td.qty {
            width: 5%;
        }

        .status {
            margin-top: 15px;
            padding: 1px 8px 5px;
            font-size: 1.3em;
            width: 80px;
            float: right;
            text-align: center;
            display: inline-block;
        }

        .status.unpaid {
            background-color: #E7505A;
        }

        .status.paid {
            background-color: #26C281;
        }

        .status.cancelled {
            background-color: #95A5A6;
        }

        .status.error {
            background-color: #F4D03F;
        }

        table tr.tax .desc {
            text-align: right;
        }

        table tr.discount .desc {
            text-align: right;
            color: #E43A45;
        }

        table tr.subtotal .desc {
            text-align: right;
        }


        table tfoot td {
            padding: 10px;
            font-size: 1.2em;
            white-space: nowrap;
            border-bottom: 1px solid #e7e9eb;
            font-weight: 700;
        }

        table tfoot tr:first-child td {
            border-top: none;
        }

        table tfoot tr td:first-child {
            /* border: none; */
        }


        #notices {
            padding-left: 6px;
            border-left: 6px solid #0087C3;
        }

        #notices .notice {
            font-size: 1.2em;
        }

        footer {
            color: #777777;
            width: 100%;
            height: 30px;
            position: absolute;
            bottom: 0;
            border-top: 1px solid #e7e9eb;
            padding: 8px 0;
            text-align: center;
        }

        table.billing td {
            background-color: #fff;
        }

        table td#invoiced_to {
            text-align: left;
            padding-left: 0;
        }

        #notes {
            color: #767676;
            font-size: 11px;
        }

        .item-summary {
            font-size: 11px;
            padding-left: 0;
        }


        .page_break {
            page-break-before: always;
        }


        table td.text-center {
            text-align: center;
        }

        .word-break {
            word-wrap:break-word;
            word-break: break-all;
        }

        #invoice-table td {
            border: 1px solid #e7e9eb;
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

<body>
    <header class="clearfix">

        <table cellpadding="0" cellspacing="0" class="billing">
            <tr>
                <td colspan="2"><h1><?php echo app('translator')->get('app.order'); ?></h1></td>
            </tr>
            <tr>
                <td id="invoiced_to">
                    <div>
                        <?php if($order->client && $order->clientDetails): ?>
                            <?php if(($order->client->name || $order->client->email || $order->client->mobile || $order->clientDetails->company_name || $order->clientDetails->address )
                            && ($invoiceSetting->show_client_name == 'yes' || $invoiceSetting->show_client_email == 'yes' || $invoiceSetting->show_client_phone == 'yes' || $invoiceSetting->show_client_company_name == 'yes' || $invoiceSetting->show_client_company_address == 'yes')): ?>
                                <?php if($order->project): ?>
                                <small><?php echo app('translator')->get('modules.invoices.project'); ?>:</small>
                                <div>
                                    <?php echo e($order->project->project_name); ?>

                                </div>
                                <?php endif; ?>

                                <small><?php echo app('translator')->get("modules.invoices.billedTo"); ?>:</small>
                                <?php if($order->client->name && $invoiceSetting->show_client_name == 'yes'): ?>
                                    <div><?php echo e($order->client->name_salutation); ?></div>
                                <?php endif; ?>

                                <?php if($order->client->email && $invoiceSetting->show_client_email == 'yes'): ?>
                                    <div><?php echo e($order->client->email); ?></div>
                                <?php endif; ?>

                                <?php if($order->client->mobile && $invoiceSetting->show_client_phone == 'yes'): ?>
                                    <div><?php echo e($order->client->mobile_with_phonecode); ?></div>
                                <?php endif; ?>

                                <?php if($order->clientDetails->company_name && $invoiceSetting->show_client_company_name == 'yes'): ?>
                                    <div><?php echo e($order->clientDetails->company_name); ?></div>
                                <?php endif; ?>

                                <?php if($order->client->clientDetails->address && $invoiceSetting->show_client_company_address == 'yes'): ?>
                                    <div class="mb-3">
                                        <div><?php echo app('translator')->get('app.address'); ?> :</div>
                                        <div><?php echo nl2br($order->clientDetails->address); ?></div>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>

                            <?php if($order->show_shipping_address === 'yes' && $client->clientDetails->shipping_address && $invoiceSetting->show_client_company_address == 'yes'): ?>
                                <div>
                                    <div><?php echo app('translator')->get('app.shippingAddress'); ?> :</div>
                                    <div><?php echo nl2br($order->clientDetails->shipping_address); ?></div>
                                </div>
                            <?php endif; ?>
                            <?php if($invoiceSetting->show_gst == 'yes' && !is_null($order->clientDetails->gst_number)): ?>
                                <div> <?php echo app('translator')->get('app.gstIn'); ?>: <?php echo e($order->clientDetails->gst_number); ?> </div>
                            <?php endif; ?>
                        <?php endif; ?>


                    </div>
                </td>
                <td>
                    <div id="company">
                        <div id="logo">
                            <img src="<?php echo e(invoice_setting()->logo_url); ?>" alt="home" class="dark-logo" />
                        </div>
                            <small><?php echo app('translator')->get("modules.invoices.generatedBy"); ?>:</small>
                        <div><?php echo e(company()->company_name); ?></div>
                        <?php if(!is_null($settings) && $order->address): ?>
                            <div><?php echo nl2br($order->address->address); ?></div>
                        <?php endif; ?>
                        <div><?php echo e(company()->company_phone); ?></div>

                        <?php if($invoiceSetting->show_gst == 'yes' && $order->address): ?>
                            <div><?php echo e($order->address->tax_name); ?>: <?php echo e($order->address->tax_number); ?></div>
                        <?php endif; ?>
                    </div>
                </td>
            </tr>
        </table>
    </header>
    <main>
        <div id="details">

            <div id="invoice">
                <h1><?php echo e($order->order_number); ?></h1>

                <div class="date"><?php echo app('translator')->get('modules.orders.orderDate'); ?>:
                    <?php echo e(\Carbon\Carbon::parse($order->order_date)->translatedFormat(company()->date_format)); ?></div>

                <div class=""><?php echo app('translator')->get('app.status'); ?>: <?php echo app('translator')->get('modules.invoices.'.$order->status); ?></div>
            </div>

        </div>
        <table cellspacing="0" cellpadding="0" id="invoice-table">
            <thead>
                <tr>
                    <th class="no">#</th>
                    <th class="desc"><?php echo app('translator')->get("modules.invoices.item"); ?></th>
                    <?php if($invoiceSetting->hsn_sac_code_show): ?>
                        <td class="qty"><?php echo app('translator')->get("app.hsnSac"); ?></td>
                    <?php endif; ?>
                    <?php if($order->unit != null): ?>
                    <th class="qty"><?php echo app('translator')->get('modules.invoices.qty'); ?></th>
                    <?php else: ?>
                    <th class="qty"> </th>
                    <?php endif; ?>
                    
                    <th class="description"><?php echo app('translator')->get("app.sku"); ?></th>
                    <th class="qty"><?php echo app('translator')->get("modules.invoices.unitPrice"); ?></th>
                    <th class="qty"><?php echo app('translator')->get("modules.invoices.tax"); ?></th>
                    <th class="unit"><?php echo app('translator')->get("modules.invoices.price"); ?> (<?php echo htmlentities($order->currency->currency_code); ?>)</th>
                </tr>
            </thead>
            <tbody>
                <?php $count = 0; ?>
                <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($item->type == 'item'): ?>
                        <tr style="page-break-inside: avoid;">
                            <td class="no"><?php echo e(++$count); ?></td>
                            <td class="desc">
                                <h3 class="word-break"><?php echo e($item->item_name); ?></h3>
                                <?php if(!is_null($item->item_summary)): ?>
                                <table>
                                    <tr>
                                        <td class="item-summary word-break border-top-0 border-right-0 border-left-0 border-bottom-0"><?php echo nl2br(pdfStripTags($item->item_summary)); ?></td>
                                    </tr>
                                </table>
                                <?php endif; ?>
                                <?php if($item->orderItemImage): ?>
                                    <p class="mt-2">
                                        <img src="<?php echo e($item->orderItemImage->file_url); ?>" width="60" height="60" class="img-thumbnail">
                                    </p>
                                <?php endif; ?>
                            </td>
                            <?php if($invoiceSetting->hsn_sac_code_show): ?>
                                <td class="qty">
                                    <h3><?php echo e($item->hsn_sac_code ? $item->hsn_sac_code : '--'); ?></h3>
                                </td>
                            <?php endif; ?>
                            <td class="qty">
                                <h3><?php echo e($item->quantity); ?><?php if($item->unit): ?><br><span class="f-11 text-dark-grey"><?php echo e($item->unit->unit_type); ?></span><?php endif; ?></span></h3>
                            </td>
                            <td><?php echo e($item->sku); ?></td>
                            <td class="qty">
                                <h3><?php echo e(currency_format($item->unit_price, $order->currency_id, false)); ?></h3>
                            </td>
                            <td><?php echo e($item->tax_list); ?></td>
                            <td class="unit"><?php echo e(currency_format($item->amount, $order->currency_id, false)); ?></td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tr style="page-break-inside: avoid;" class="subtotal">
                    <td class="no">&nbsp;</td>
                    <td class="qty">&nbsp;</td>
                    <td class="qty">&nbsp;</td>
                    <td class="qty">&nbsp;</td>
                    <td class="qty">&nbsp;</td>
                    <?php if($invoiceSetting->hsn_sac_code_show): ?>
                        <td class="qty">&nbsp;</td>
                    <?php endif; ?>
                    <td class="desc"><?php echo app('translator')->get("modules.invoices.subTotal"); ?></td>
                    <td class="unit"><?php echo e(currency_format($order->sub_total, $order->currency_id, false)); ?></td>
                </tr>
                <?php if($discount != 0 && $discount != ''): ?>
                    <tr style="page-break-inside: avoid;" class="discount">
                        <td class="no">&nbsp;</td>
                        <td class="qty">&nbsp;</td>
                        <td class="qty">&nbsp;</td>
                        <?php if($invoiceSetting->hsn_sac_code_show): ?>
                            <td class="qty">&nbsp;</td>
                        <?php endif; ?>
                        <td class="qty">&nbsp;</td>
                        <td class="desc"><?php echo app('translator')->get("modules.invoices.discount"); ?></td>
                        <td class="unit"><?php echo e(currency_format($discount, $order->currency_id, false)); ?></td>
                    </tr>
                <?php endif; ?>
                <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr style="page-break-inside: avoid;" class="tax">
                        <td class="no">&nbsp;</td>
                        <td class="qty">&nbsp;</td>
                        <td class="qty">&nbsp;</td>
                        <?php if($invoiceSetting->hsn_sac_code_show): ?>
                            <td class="qty">&nbsp;</td>
                        <?php endif; ?>
                        <td class="qty">&nbsp;</td>
                        <td class="desc"><?php echo e($key); ?></td>
                        <td class="unit"><?php echo e(currency_format($tax, $order->currency_id, false)); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
            <tfoot>
                <tr dontbreak="true">
                    <td colspan="<?php echo e($invoiceSetting->hsn_sac_code_show ? '7' : '6'); ?>">
                        <?php echo app('translator')->get("modules.invoices.total"); ?></td>
                    <td style="text-align: center"><?php echo e(currency_format($order->total, $order->currency_id, false)); ?></td>
                </tr>
            </tfoot>
        </table>

        <p id="notes" class="word-break">
            <?php if(!is_null($order->note)): ?>
                <?php echo nl2br($order->note); ?><br>
            <?php endif; ?>
            <?php if(!is_null($invoiceSetting->other_info)): ?>
                <br><?php echo nl2br($invoiceSetting->other_info); ?>

            <?php endif; ?>
        </p>



    </main>
</body>

</html>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/orders/pdf/invoice-1.blade.php ENDPATH**/ ?>