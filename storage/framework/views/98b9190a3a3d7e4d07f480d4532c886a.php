<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <title><?php echo app('translator')->get('app.invoice'); ?></title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="Invoice">
    <?php if ($__env->exists('invoices.pdf.invoice_pdf_css')) echo $__env->make('invoices.pdf.invoice_pdf_css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<style>
        /*! Invoice Templates @author: Invoicebus @email: info@invoicebus.com @web: https://invoicebus.com @version: 1.0.0 @updated: 2015-02-27 16:02:34 @license: Invoicebus */
        /* Reset styles */
        /*@import url("https://fonts.googleapis.com/css?family=Open+Sans:400,700&subset=cyrillic,cyrillic-ext,latin,greek-ext,greek,latin-ext,vietnamese");*/
        html,
        body,
        div,
        span,
        applet,
        object,
        iframe,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p,
        blockquote,
        pre,
        a,
        abbr,
        acronym,
        address,
        big,
        cite,
        code,
        del,
        dfn,
        em,
        img,
        ins,
        kbd,
        q,
        s,
        samp,
        small,
        strike,
        strong,
        sub,
        sup,
        tt,
        var,
        b,
        u,
        i,
        center,
        dl,
        dt,
        dd,
        ol,
        ul,
        li,
        fieldset,
        form,
        label,
        legend,
        table,
        caption,
        tbody,
        tfoot,
        thead,
        tr,
        th,
        td,
        article,
        aside,
        canvas,
        details,
        embed,
        figure,
        figcaption,
        footer,
        header,
        hgroup,
        menu,
        nav,
        output,
        ruby,
        section,
        summary,
        time,
        mark,
        audio,
        video {
            margin: 0;
            padding: 0;
            border: 0;
            /* font-family: Verdana, Arial, Helvetica, sans-serif; */
            vertical-align: baseline;
            font-size: 12px;
        }

        html {
            line-height: 1;
        }

        ol,
        ul {
            list-style: none;
        }

        table {
            border-collapse: collapse;
            border-spacing: 0;
        }

        caption,
        th,
        td {
            text-align: left;
            font-weight: normal;
            vertical-align: middle;
        }

        q,
        blockquote {
            quotes: none;
        }

        q:before,
        q:after,
        blockquote:before,
        blockquote:after {
            content: "";
            content: none;
        }

        a img {
            border: none;
        }

        article,
        aside,
        details,
        figcaption,
        figure,
        footer,
        header,
        hgroup,
        main,
        menu,
        nav,
        section,
        summary {
            display: block;
        }

        /* Invoice styles */
        /**
         * DON'T override any styles for the <html> and <body> tags, as this may break the layout.
         * Instead wrap everything in one main <div id="container"> element where you may change
         * something like the font or the background of the invoice
         */
        html,
        body {
            /* MOVE ALONG, NOTHING TO CHANGE HERE! */
        }

        /**
         * IMPORTANT NOTICE: DON'T USE '!important' otherwise this may lead to broken print layout.
         * Some browsers may require '!important' in oder to work properly but be careful with it.
         */
        .clearfix {
            display: block;
            clear: both;
        }

        .hidden {
            display: none;
        }

        b,
        strong,
        .bold {
            font-weight: bold;
        }

        #container {
            font: normal 13px/1.4em 'Open Sans', Sans-serif;
            margin: 0 auto;
            color: #5B6165;
            position: relative;
        }

        #memo {
            padding-top: 40px;
            margin: 0 30px;
            border-bottom: 1px solid #ddd;
            height: 85px;
        }

        #memo .logo {
            float: left;
            margin-right: 20px;
        }

        #memo .logo img {
            height: 50px;
        }

        #memo .company-info {
            /*float: right;*/
            text-align: right;
            line-height: 18px;
        }

        #memo .company-info>div:first-child {
            line-height: 1em;
            font-size: 20px;
            color: #B32C39;
        }

        #memo .company-info span {
            font-size: 11px;
            display: inline-block;
            min-width: 20px;
            width: 100%;
        }

        #memo:after {
            content: '';
            display: block;
            clear: both;
        }

        #invoice-title-number {
            font-weight: bold;
            margin: 30px 0;
        }

        #invoice-title-number span {
            line-height: 0.88em;
            display: inline-block;
            min-width: 20px;
        }

        #invoice-title-number #title {
            text-transform: uppercase;
            padding: 8px 5px 8px 30px;
            font-size: 30px;
            background: #F4846F;
            color: white;
        }

        #invoice-title-number #number {
            margin-left: 10px;
            padding: 8px 0;
            font-size: 30px;
        }

        #client-info {
            float: left;
            margin-left: 30px;
            min-width: 220px;
            line-height: 18px;
        }

        #client-info>div {
            margin-bottom: 3px;
            min-width: 20px;
        }

        #client-info span {
            display: block;
            min-width: 20px;
        }

        #client-info>span {
            text-transform: uppercase;
        }

        table {
            table-layout: fixed;
        }

        table th,
        table td {
            vertical-align: top;
            word-break: keep-all;
            word-wrap: break-word;
        }

        #items {
            margin: 25px 30px 0 30px;
        }

        #items .first-cell,
        #items table th:first-child,
        #items table td:first-child {
            width: 40px !important;
            padding-left: 0 !important;
            padding-right: 0 !important;
            text-align: right;
        }

        #items table {
            border-collapse: separate;
            width: 100%;
        }

        #items table th {
            font-weight: bold;
            padding: 5px 8px;
            text-align: right;
            background: #B32C39;
            color: white;
            text-transform: uppercase;
            font-size: 10px;
        }

        #items table th:nth-child(2) {
            width: 30%;
            text-align: left;
        }

        #items table th:last-child {
            text-align: right;
        }

        #items table td {
            padding: 9px 8px;
            text-align: right;
            border-bottom: 1px solid #ddd;
        }

        #items table td:nth-child(2) {
            text-align: left;
        }

        #sums table {
            width: 50%;
            float: right;
            margin-right: 30px;
        }

        #sums table tr th,
        #sums table tr td {
            min-width: 100px;
            padding: 9px 8px;
            text-align: right;
        }

        #sums table tr th {
            width: 70%;
            font-weight: bold;
            padding-right: 35px;
        }

        #sums table tr td.last {
            min-width: 0 !important;
            max-width: 0 !important;
            width: 0 !important;
            padding: 0 !important;
            border: none !important;
        }

        #sums table tr.amount-total th {
            text-transform: uppercase;
        }

        #sums table tr.amount-total th,
        #sums table tr.amount-total td {
            font-size: 15px;
            font-weight: bold;
        }

        #invoice-info {
            margin: 10px 30px;
            line-height: 18px;
        }

        #invoice-info>div>span {
            display: inline-block;
            min-width: 20px;
            min-height: 18px;
            margin-bottom: 3px;
        }

        #invoice-info>div>span:first-child {
            color: black;
        }

        #invoice-info>div>span:last-child {
            color: #aaa;
        }

        #invoice-info:after {
            content: '';
            display: block;
            clear: both;
        }

        #terms .notes {
            min-height: 30px;
            min-width: 50px;
            margin: 0 30px;
        }

        #calculate_tax .calculate_tax {
            min-height: 30px;
            min-width: 50px;
            margin: 10px 0 0 30px;
        }

        #terms .payment-info div {
            margin-bottom: 3px;
            min-width: 20px;
        }

        .thank-you {
            margin: 10px 0 30px 0;
            display: inline-block;
            min-width: 20px;
            text-transform: uppercase;
            font-weight: bold;
            line-height: 0.88em;
            float: right;
            padding: 5px 30px 0 2px;
            font-size: 20px;
            background: #F4846F;
            color: white;
        }

        .ib_bottom_row_commands {
            margin-left: 30px !important;
        }

        .item-summary {
            font-size: 10px
        }

        .mb-3 {
            margin-bottom: 1rem;
        }

        .text-white {
            color: white;
        }

        /**
         * If the printed invoice is not looking as expected you may tune up
         * the print styles (you can use !important to override styles)
         */
        @media print {
            /* Here goes your print styles */
        }

        .page_break {
            page-break-before: always;
        }

        .h3-border {
            border-bottom: 1px solid #AAAAAA;
        }

        table td.text-center {
            text-align: center;
        }

        #itemsPayment,
        .box-title {
            margin: 25px 30px 0 30px;
        }

        #itemsPayment .first-cell,
        #itemsPayment table th:first-child,
        #itemsPayment table td:first-child {
            width: 40px !important;
            padding-left: 0 !important;
            padding-right: 0 !important;
            text-align: right;
        }

        #itemsPayment table {
            border-collapse: separate;
            width: 100%;
        }

        #itemsPayment table th {
            font-weight: bold;
            padding: 5px 8px;
            text-align: right;
            background: #B32C39;
            color: white;
            text-transform: uppercase;
        }

        #itemsPayment table th:nth-child(2) {
            width: 30%;
            text-align: left;
        }

        #itemsPayment table th:last-child {
            text-align: right;
        }

        #itemsPayment table td {
            padding: 9px 8px;
            text-align: right;
            border-bottom: 1px solid #ddd;
        }

        #itemsPayment table td:nth-child(2) {
            text-align: left;
        }

        table th,
        table td {
            vertical-align: top;
            word-break: keep-all;
            word-wrap: break-word;
        }

        .word-break {
            word-wrap: break-word;
            word-break: break-all;
        }

        #notes {
            color: #767676;
            font-size: 11px;
            margin-top: 10px;
            margin-left: 40px;
        }

        #signatory img {
            height:95px;
            margin-bottom: -50px;
            margin-top: 5px;
            margin-right: 20;
        }

        #field-title {
            font-size: 13px;
            margin-top: 10px;
            margin-left: 40px;
        }

        <?php if($invoiceSetting->locale == 'th'): ?>
            table td {
            font-weight: bold !important;
            font-size: 20px !important;
            }

            .description
            {
                font-weight: bold !important;
                font-size: 16px !important;
            }
        <?php endif; ?>

        .client-logo {
            float: right !important;
            height: 80px
        }

        .client-logo-div{
            position: absolute;
            right: 0;
            margin-top: -150px;
            margin-right: 20px
        }

        .f-11 {
            font-size: 11px;
        }


</style>
</head>

<body>
    <div id="container">
        <section id="memo" class="description">
            <div class="logo">
                <img src="<?php echo e($invoiceSetting->logo_url); ?>" />
            </div>

            <div class="company-info">
                <div class="description">
                    <?php echo e($company->company_name); ?>

                </div>

                <br />

                <?php if($company->company_email): ?>
                <span><?php echo e($company->company_email); ?></span>
                <br />
                <?php endif; ?>

                <?php if($company->company_phone): ?>
                <span><?php echo e($company->company_phone); ?></span>
                <br />
                <?php endif; ?>

                <?php if($invoice->address): ?>
                    <span><?php echo nl2br($invoice->address->address); ?></span>
                    <br />
                <?php endif; ?>


                <?php if($invoiceSetting->show_gst == 'yes' && $invoice->address->tax_number): ?>
                    <div><?php echo e($invoice->address->tax_name); ?>: <?php echo e($invoice->address->tax_number); ?></div>
                <?php endif; ?>
            </div>

        </section>

        <section id="invoice-title-number" class="description">

            <span id="title"><?php echo e(str($invoice->invoice_number)->replace($invoice->original_invoice_number, '')); ?></span>
            <span id="number"><?php echo e($invoice->original_invoice_number); ?></span>

        </section>


        <div class="clearfix"></div>
        <?php if($invoice->project && $invoice->project->client && $invoice->project->client->clientDetails && ($invoice->project->client->name || $invoice->project->client->email || $invoice->project->client->mobile || $invoice->project->client->clientDetails->company_name || $invoice->project->client->clientDetails->address) && ($invoiceSetting->show_client_name == 'yes' || $invoiceSetting->show_client_email == 'yes' || $invoiceSetting->show_client_phone == 'yes' || $invoiceSetting->show_client_company_name == 'yes' || $invoiceSetting->show_client_company_address == 'yes')): ?>
            <section id="client-info" class="description">

                <span class="description"><?php echo app('translator')->get('modules.invoices.billedTo'); ?>:</span>

                <?php if($invoice->project->client->name && $invoiceSetting->show_client_name == 'yes'): ?>
                    <div>
                        <span class="bold"><?php echo e($invoice->project->client->name_salutation); ?></span>
                    </div>
                <?php endif; ?>

                <?php if($invoice->project->client->email && $invoiceSetting->show_client_email == 'yes'): ?>
                    <div>
                        <span class=""><?php echo e($invoice->project->client->email); ?></span>
                    </div>
                <?php endif; ?>

                <?php if($invoice->project->client->mobile && $invoiceSetting->show_client_phone == 'yes'): ?>
                    <div>
                        <span class=""><?php echo e($invoice->project->client->mobile_with_phonecode); ?></span>
                    </div>
                <?php endif; ?>
                <?php if($invoice->project->client->clientDetails->company_name && $invoiceSetting->show_client_company_name == 'yes'): ?>
                    <div>
                        <span><?php echo e($invoice->project->client->clientDetails->company_name); ?></span>
                    </div>
                <?php endif; ?>

                <?php if($invoice->project->client->clientDetails->address && $invoiceSetting->show_client_company_address == 'yes'): ?>
                    <div class="mb-3">
                        <b><?php echo app('translator')->get('app.address'); ?> :</b>
                        <div><?php echo nl2br($invoice->project->clientDetails->address); ?></div>
                    </div>
                <?php endif; ?>

                <?php if($invoice->show_shipping_address === 'yes'): ?>
                    <div>
                        <b><?php echo app('translator')->get('app.shippingAddress'); ?> :</b>
                        <div><?php echo nl2br($invoice->project->clientDetails->shipping_address); ?></div>
                    </div>
                <?php endif; ?>

                <?php if($invoiceSetting->show_gst == 'yes' && !is_null($invoice->project->client->clientDetails) && !is_null($invoice->project->client->clientDetails->gst_number)): ?>
                    <div>
                        <?php if($invoice->project->client->clientDetails->tax_name): ?>
                            <span> <?php echo e($invoice->project->client->clientDetails->tax_name); ?>: <?php echo e($invoice->project->client->clientDetails->gst_number); ?></span>
                        <?php else: ?>
                            <span> <?php echo app('translator')->get('app.gstIn'); ?>: <?php echo e($invoice->project->client->clientDetails->gst_number); ?> </span>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <?php if($invoice->clientDetails->company_logo): ?>
                    <div class="client-logo-div">
                        <img src="<?php echo e($invoice->clientDetails->image_url); ?>"
                            alt="<?php echo e($invoice->clientDetails->company_name); ?>" class="client-logo"/>
                    </div>
                <?php endif; ?>


            </section>
        <?php elseif($invoice->client && $invoice->clientDetails && ($invoice->client->name || $invoice->client->email || $invoice->client->mobile || $invoice->clientDetails->company_name || $invoice->clientDetails->address) && ($invoiceSetting->show_client_name == 'yes' || $invoiceSetting->show_client_email == 'yes' || $invoiceSetting->show_client_phone == 'yes' || $invoiceSetting->show_client_company_name == 'yes' || $invoiceSetting->show_client_company_address == 'yes')): ?>
            <section id="client-info" class="description">
                <span><?php echo app('translator')->get('modules.invoices.billedTo'); ?>:</span>

                <?php if($invoice->client->name && $invoiceSetting->show_client_name == 'yes'): ?>
                    <div>
                        <span class="bold"><?php echo e($invoice->client->name_salutation); ?></span>
                    </div>
                <?php endif; ?>

                <?php if($invoice->client->email && $invoiceSetting->show_client_email == 'yes'): ?>
                    <div>
                        <span class=""><?php echo e($invoice->client->email); ?></span>
                    </div>
                <?php endif; ?>

                <?php if($invoice->client->mobile && $invoiceSetting->show_client_phone == 'yes'): ?>
                    <div>
                        <span class=""><?php echo e($invoice->client->mobile_with_phonecode); ?></span>
                    </div>
                <?php endif; ?>

                <?php if($invoice->clientDetails->company_name && $invoiceSetting->show_client_company_name == 'yes'): ?>
                    <div>
                        <span><?php echo e($invoice->clientDetails->company_name); ?></span>
                    </div>
                <?php endif; ?>

                <?php if($invoice->clientDetails->address && $invoiceSetting->show_client_company_address == 'yes'): ?>
                    <div class="mb-3">
                        <b><?php echo app('translator')->get('app.address'); ?> :</b>
                        <div><?php echo nl2br($invoice->clientDetails->address); ?></div>
                    </div>
                <?php endif; ?>

                <?php if($invoice->show_shipping_address === 'yes'): ?>
                    <div>
                        <b><?php echo app('translator')->get('app.shippingAddress'); ?> :</b>
                        <div><?php echo nl2br($invoice->clientDetails->shipping_address); ?></div>
                    </div>
                <?php endif; ?>

                <?php if($invoiceSetting->show_gst == 'yes' && !is_null($invoice->clientDetails) && !is_null($invoice->clientDetails->gst_number)): ?>
                    <div>
                        <?php if($invoice->clientDetails->tax_name): ?>
                            <span> <?php echo e($invoice->clientDetails->tax_name); ?>: <?php echo e($invoice->clientDetails->gst_number); ?></span>
                        <?php else: ?>
                            <span> <?php echo app('translator')->get('app.gstIn'); ?>: <?php echo e($invoice->clientDetails->gst_number); ?> </span>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </section>
        <?php endif; ?>



        <?php if(is_null($invoice->project) && $invoice->estimate && $invoice->estimate->client && $invoice->estimate->client->clientDetails && ($invoiceSetting->show_client_name == 'yes' || $invoiceSetting->show_client_email == 'yes' || $invoiceSetting->show_client_phone == 'yes' || $invoiceSetting->show_client_company_name == 'yes' || $invoiceSetting->show_client_company_address == 'yes')): ?>
            <section id="client-info" class="description">
                <span><?php echo app('translator')->get('modules.invoices.billedTo'); ?>:</span>
                <?php if($invoice->estimate->client->name && $invoiceSetting->show_client_name == 'yes'): ?>
                    <div>
                        <span class="bold"><?php echo e($invoice->estimate->client->name_salutation); ?></span>
                    </div>
                <?php endif; ?>

                <?php if($invoice->estimate->client->email && $invoiceSetting->show_client_email == 'yes'): ?>
                    <div>
                        <span class=""><?php echo e($invoice->estimate->client->email); ?></span>
                    </div>
                <?php endif; ?>

                <?php if($invoice->estimate->client->mobile && $invoiceSetting->show_client_phone == 'yes'): ?>
                    <div>
                        <span class=""><?php echo e($invoice->estimate->client->mobile_with_phonecode); ?></span>
                    </div>
                <?php endif; ?>

                <?php if($invoice->estimate->client->clientDetails->company_name && $invoiceSetting->show_client_company_name == 'yes'): ?>
                    <div>
                        <span
                            class=""><?php echo e($invoice->estimate->client->clientDetails->company_name); ?></span>
                    </div>
                <?php endif; ?>

                <?php if($invoice->estimate->client->clientDetails->address && $invoiceSetting->show_client_company_address == 'yes'): ?>
                    <div class="mb-3">
                        <b><?php echo app('translator')->get('app.address'); ?> :</b>
                        <div><?php echo nl2br($invoice->estimate->client->clientDetails->address); ?></div>
                    </div>
                <?php endif; ?>

                <?php if($invoice->show_shipping_address === 'yes'): ?>
                    <div>
                        <b><?php echo app('translator')->get('app.shippingAddress'); ?> :</b>
                        <div><?php echo nl2br($invoice->estimate->client->clientDetails->shipping_address); ?></div>
                    </div>
                <?php endif; ?>

                <?php if($invoiceSetting->show_gst == 'yes' && !is_null($invoice->estimate->client->clientDetails->gst_number)): ?>
                    <div>
                        <?php if($invoice->estimate->client->clientDetails->tax_name): ?>
                            <span> <?php echo e($invoice->estimate->client->clientDetails->tax_name); ?>: <?php echo e($invoice->estimate->client->clientDetails->gst_number); ?></span>
                        <?php else: ?>
                            <span> <?php echo app('translator')->get('app.gstIn'); ?>: <?php echo e($invoice->estimate->client->clientDetails->gst_number); ?> </span>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

            </section>
        <?php endif; ?>
        <div class="clearfix"></div>

        <br>
        <?php if($invoiceSetting->show_project == 1 && isset($invoice->project->project_name)): ?>
            <section id="client-info" class="description">
                <span><?php echo app('translator')->get('modules.invoices.projectName'); ?></span>
                    <?php echo e($invoice->project->project_name); ?>

            </section>
            <br><br>
        <?php endif; ?>

        <section id="items">

            <table cellpadding="0" cellspacing="0">

                <tr>
                    <th>#</th> <!-- Dummy cell for the row number and row commands -->
                    <th class="description"><?php echo app('translator')->get('modules.invoices.item'); ?></th>
                    <?php if($invoiceSetting->hsn_sac_code_show): ?>
                        <th><?php echo app('translator')->get('app.hsnSac'); ?></th>
                    <?php endif; ?>
                    <th class="description"><?php echo app('translator')->get('modules.invoices.qty'); ?></th>
                    <th class="description"><?php echo app('translator')->get('modules.invoices.unitPrice'); ?></th>
                    <th class="description"><?php echo app('translator')->get('modules.invoices.tax'); ?></th>
                    <th class="description"><?php echo app('translator')->get('modules.invoices.price'); ?> (<?php echo htmlentities($invoice->currency->currency_code); ?>)</th>
                </tr>

                <?php $count = 0; ?>
                <?php $__currentLoopData = $invoice->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($item->type == 'item'): ?>
                        <tr data-iterate="item">
                            <td><?php echo e(++$count); ?></td>
                            <!-- Don't remove this column as it's needed for the row commands -->
                            <td class="word-break">
                                <?php echo e($item->item_name); ?>

                                <?php if(!is_null($item->item_summary)): ?>
                                    <p class="item-summary  mb-3 word-break"><?php echo nl2br(pdfStripTags($item->item_summary)); ?></p>
                                <?php endif; ?>
                                <?php if($item->invoiceItemImage): ?>
                                    <p class="mt-2">
                                        <img src="<?php echo e($item->invoiceItemImage->file_url); ?>" width="60" height="60"
                                            class="img-thumbnail">
                                    </p>
                                <?php endif; ?>
                            </td>
                            <?php if($invoiceSetting->hsn_sac_code_show): ?>
                                <td><?php echo e($item->hsn_sac_code ? $item->hsn_sac_code : '--'); ?></td>
                            <?php endif; ?>
                            <td><?php echo e($item->quantity); ?> <br><span class="item-summary"><?php echo e($item->unit->unit_type); ?></td>
                            <td><?php echo e(currency_format($item->unit_price, $invoice->currency_id, false)); ?></td>
                            <td><?php echo e($item->tax_list); ?></td>
                            <td><?php echo e(currency_format($item->amount, $invoice->currency_id, false)); ?></td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </table>

        </section>

        <section id="sums" class="description">

            <table cellpadding="0" cellspacing="0">
                <tr>
                    <th><?php echo app('translator')->get('modules.invoices.subTotal'); ?>:</th>
                    <td><?php echo e(currency_format($invoice->sub_total, $invoice->currency_id, false)); ?></td>
                </tr>
                <?php if($discount != 0 && $discount != ''): ?>
                    <tr data-iterate="tax">
                        <th><?php echo app('translator')->get('modules.invoices.discount'); ?>:</th>
                        <td>-<?php echo e(currency_format($discount, $invoice->currency_id, false)); ?></td>
                    </tr>
                <?php endif; ?>
                <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr data-iterate="tax">
                        <th><?php echo e($key); ?>:</th>
                        <td><?php echo e(currency_format($tax, $invoice->currency_id, false)); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tr class="amount-total">
                    <th><?php echo app('translator')->get('modules.invoices.total'); ?>:</th>
                    <td><?php echo e(currency_format($invoice->total, $invoice->currency_id, false)); ?></td>
                </tr>
                <?php if($invoice->creditNotes()->count() > 0): ?>
                    <tr>
                        <th>
                            <?php echo app('translator')->get('modules.invoices.appliedCredits'); ?>:</th>
                        <td>
                            <?php echo e(currency_format($invoice->appliedCredits(), $invoice->currency_id, false)); ?>

                        </td>
                    </tr>
                <?php endif; ?>
                <tr>
                    <th><?php echo app('translator')->get('app.totalPaid'); ?> :</th>
                    <td> <?php echo e(currency_format($invoice->getPaidAmount(), $invoice->currency_id, false)); ?></td>
                </tr>
                <?php if($invoice->amountDue()): ?>
                <tr>
                    <th><?php echo app('translator')->get('app.totalDue'); ?>:</th>
                    <td> <?php echo e(currency_format($invoice->amountDue(), $invoice->currency_id, false)); ?></td>
                </tr>
                <?php endif; ?>
                <?php if($invoiceSetting->authorised_signatory && $invoiceSetting->authorised_signatory_signature && $invoice->status == 'paid'): ?>
                    <tr>
                        <td id="signatory" colspan="2" style="font-size:15px" align="right">
                            <img src="<?php echo e($invoiceSetting->authorised_signatory_signature_url); ?>" alt="<?php echo e($company->company_name); ?>"/><br>
                            <?php echo app('translator')->get('modules.invoiceSettings.authorisedSignatory'); ?>
                        </td>
                    </tr>
                    <?php endif; ?>
            </table>

            <div class="clearfix"></div>

        </section>

        <section id="invoice-info" class="description">
            <div class="description">
                <span><?php echo app('translator')->get('modules.invoices.invoiceDate'); ?>:</span>
                <span><?php echo e($invoice->issue_date->translatedFormat($company->date_format)); ?></span>
            </div>
            <?php if(empty($invoice->order_id) && $invoice->status === 'unpaid' && $invoice->due_date->year > 1): ?>
                <div class="description">
                    <span><?php echo app('translator')->get('app.dueDate'); ?>:</span>
                    <span><?php echo e($invoice->due_date->translatedFormat($company->date_format)); ?></span>
                </div>
            <?php endif; ?>
            <?php if($invoiceSetting->show_status): ?>
            <div>
                <span><?php echo app('translator')->get('app.status'); ?>:</span> <span><?php echo app('translator')->get('modules.invoices.' . $invoice->status); ?></span>
            </div>
            <?php endif; ?>
            <?php if($creditNote): ?>
                <div>
                    <span><?php echo app('translator')->get('app.credit-note'); ?>:</span> <span><?php echo e($creditNote->cn_number); ?></span>
                </div>
            <?php endif; ?>

        </section>

        <section id="terms">
            <div class="notes word-break description">
                <?php if($invoice->note): ?>
                    <br><br><b><?php echo app('translator')->get('app.note'); ?></b><br><?php echo nl2br($invoice->note); ?>

                <?php endif; ?>
                <br><br><b><?php echo app('translator')->get('modules.invoiceSettings.invoiceTerms'); ?></b><br><?php echo nl2br($invoiceSetting->invoice_terms); ?>

                <?php if(isset($invoiceSetting->other_info)): ?>
                    <br><br><?php echo nl2br($invoiceSetting->other_info); ?>

                <?php endif; ?>
            </div>

        </section>

        <?php if(isset($taxes) && $invoiceSetting->tax_calculation_msg == 1): ?>
            <section id="calculate_tax" class="description">
                <p class="text-dark-grey calculate_tax">
                    <?php if($invoice->calculate_tax == 'after_discount'): ?>
                        <?php echo app('translator')->get('messages.calculateTaxAfterDiscount'); ?>
                    <?php else: ?>
                        <?php echo app('translator')->get('messages.calculateTaxBeforeDiscount'); ?>
                    <?php endif; ?>
                </p>
            </section>
        <?php endif; ?>

        
        <?php if(isset($fields) && count($fields) > 0): ?>
            <div class="page_break"></div>
            <h3 class="box-title m-t-20 text-center h3-border"> <?php echo app('translator')->get('modules.projects.otherInfo'); ?></h3>
            <table  style="background: none" border="0" cellspacing="0" cellpadding="0" width="100%">
                <?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td style="text-align: left;background: none;" >
                            <div id="field-title"><?php echo e($field->label); ?></div>
                            <p id="notes">
                                <?php if( $field->type == 'text' || $field->type == 'password' || $field->type == 'number' || $field->type == 'textarea'): ?>
                                    <?php echo e($invoice->custom_fields_data['field_'.$field->id] ?? '-'); ?>

                                <?php elseif($field->type == 'radio'): ?>
                                    <?php echo e(!is_null($invoice->custom_fields_data['field_'.$field->id]) ? $invoice->custom_fields_data['field_'.$field->id] : '-'); ?>

                                <?php elseif($field->type == 'select'): ?>
                                    <?php echo e((!is_null($invoice->custom_fields_data['field_'.$field->id]) && $invoice->custom_fields_data['field_'.$field->id] != '') ? $field->values[$invoice->custom_fields_data['field_'.$field->id]] : '-'); ?>

                                <?php elseif($field->type == 'checkbox'): ?>
                                    <?php echo e(!is_null($invoice->custom_fields_data['field_'.$field->id]) ? $invoice->custom_fields_data['field_'.$field->id] : '-'); ?>

                                <?php elseif($field->type == 'date'): ?>
                                    <?php echo e(!is_null($invoice->custom_fields_data['field_'.$field->id]) ? \Carbon\Carbon::parse($invoice->custom_fields_data['field_'.$field->id])->translatedFormat($invoice->company->date_format) : '--'); ?>

                                <?php endif; ?>
                            </p>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
        <?php endif; ?>

        <?php if(count($payments) > 0): ?>
            <div class="page_break"></div>
            <div class="clearfix"></div>
            <div class="invoice-body b-all m-t-20 m-b-20">

                <div class="row description">
                    <div class="col-sm-12">
                        <h3 class="box-title m-t-20 text-center h3-border"><?php echo app('translator')->get('app.menu.payments'); ?></h3>
                        <div class="table-responsive m-t-40" id="itemsPayment" style="clear: both;">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center"><?php echo app('translator')->get('modules.payments.amount'); ?></th>
                                        <th class="text-center"><?php echo app('translator')->get('modules.invoices.paymentMethod'); ?></th>
                                        <th class="text-center"><?php echo app('translator')->get('modules.invoices.paidOn'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count = 0; ?>
                                    <?php $__empty_1 = true; $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td class="text-center"><?php echo e($key + 1); ?></td>
                                            <td class="text-center">
                                                <?php echo e(number_format((float) $payment->amount, 2, '.', '')); ?>

                                                <?php echo $invoice->currency->currency_code; ?></td>
                                            <td class="text-center">
                                                <?php
                                                    $method = '--';

                                                    if (!is_null($payment->offline_method_id)) {
                                                        $method = $payment->offlineMethod->name;
                                                    } elseif (isset($payment->gateway)) {
                                                        $method = $payment->gateway;
                                                    }
                                                ?>

                                                <?php echo e($method); ?>

                                            </td>
                                            <td class="text-center">
                                                <?php echo e($payment->paid_on->translatedFormat($company->date_format)); ?> </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

    </div>
</body>

</html>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/invoices/pdf/invoice-3.blade.php ENDPATH**/ ?>