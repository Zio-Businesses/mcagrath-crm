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
    <?php if($invoiceSetting->locale !== 'th'): ?>
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
            font: inherit;
            font-size: 12px;
            vertical-align: baseline;
            /* font-family: Verdana, Arial, Helvetica, sans-serif; */
        }

        html {
            line-height: 1;
        }

        <?php endif; ?>

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

        .x-hidden {
            display: none !important;
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
            margin: 0 auto;
            position: relative;
        }

        .right-invoice {
            padding: 40px 30px;
        }

        #memo .company-info {
            float: left;
        }

        #memo .company-info {
            font-size: 12px;
            min-width: 20px;
            line-height: 15px;
        }

        #memo .company-info span {
            font-size: 12px;
            display: inline-block;
            min-width: 20px;
        }

        #memo .logo {
            float: right;
            margin-left: 15px;
        }

        #memo .logo img {
            height: 50px;
        }

        #memo:after {
            content: '';
            display: block;
            clear: both;
        }

        #invoice-title-number {
            margin: 20px 0 20px 0;
            display: inline-block;
            float: left;
        }

        #invoice-title-number .title-top {
            font-size: 15px;
            margin-bottom: 5px;
        }

        #invoice-title-number .title-top span {
            display: inline-block;
            min-width: 20px;
        }

        #invoice-title-number .title-top #number {
            text-align: right;
            float: right;
            color: #858585;
        }

        #invoice-title-number .title-top:after {
            content: '';
            display: block;
            clear: both;
        }

        #invoice-title-number #title {
            display: inline-block;
            background: #415472;
            color: white;
            font-size: 25px !important;
            padding: 8px 13px;
        }

        #client-info {
            text-align: right;
            min-width: 220px;
            line-height: 15px;
            font-size: 12px;
        }

        #client-info>div {
            margin-bottom: 3px;
            min-width: 20px;
        }

        #client-info span {
            display: block;
            min-width: 20px;
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

        #invoice-info {
            float: left;
            margin-top: 10px;
            line-height: 18px;
        }

        #invoice-info div {
            margin-bottom: 3px;
        }

        #invoice-info div span {
            display: inline-block;
            min-width: 20px;
            min-height: 18px;
        }

        #invoice-info div span:first-child {
            font-weight: bold;
            margin-right: 10px;
        }

        .currency {
            margin-top: 20px;
            text-align: right;
            color: #858585;
            font-style: italic;
            font-size: 12px;
        }

        .currency span {
            display: inline-block;
            min-width: 20px;
        }

        #items {
            margin-top: 10px;
        }

        #items .first-cell,
        #items table th:first-child,
        #items table td:first-child {
            width: 18px;
            text-align: right;
        }

        #items table {
            border-collapse: separate;
            width: 100%;
        }

        #items table th {
            font-size: 12px;
            padding: 5px 3px;
            text-align: center;
            background: #b0b4b3;
            color: white;
        }

        #items table th:nth-child(2) {
            width: 30%;
            text-align: left;
        }

        #items table th:last-child {
            /*text-align: right;*/
        }

        #items table td {
            padding: 10px 3px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        #items table td:first-child {
            text-align: left;
        }

        #items table td:nth-child(2) {
            text-align: left;
        }

        #sums {
            margin: 25px 30px 0 0;
            width: 100%;
        }

        #sums table {
            width: 70%;
            float: right;
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
        }

        #sums table tr td.last {
            min-width: 0 !important;
            max-width: 0 !important;
            width: 0 !important;
            padding: 0 !important;
            border: none !important;
        }

        #sums table tr.amount-total td,
        #sums table tr.amount-total th {
            font-size: 20px !important;
        }

        #sums table tr.due-amount th,
        #sums table tr.due-amount td {
            font-weight: bold;
        }

        #sums:after {
            content: '';
            display: block;
            clear: both;
        }

        #terms {
            margin-top: 20px !important;
            font-size: 12px;
        }

        .calculate_tax {
            margin-top: 20px !important;
            font-size: 12px;
        }

        #terms>span {
            font-weight: bold;
            display: inline-block;
            min-width: 20px;
        }

        #terms>div {
            min-height: 50px;
            min-width: 50px;
        }

        #terms .notes {
            min-height: 30px;
            min-width: 50px;
        }

        .item-summary {
            font-size: 11px;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .mb-3 {
            margin-bottom: 1rem;
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

        #itemsPayment {
            margin-top: 10px;
        }

        #itemsPayment .first-cell,
        #itemsPayment table th:first-child,
        #itemsPayment table td:first-child {
            width: 18px;
            text-align: right;
        }

        #itemsPayment table {
            border-collapse: separate;
            width: 100%;
        }

        #itemsPayment table th {
            font-size: 12px;
            padding: 5px 3px;
            text-align: center;
            background: #b0b4b3;
            color: white;
        }

        #itemsPayment table th:nth-child(2) {
            width: 30%;
            text-align: left;
        }

        #itemsPayment table th:last-child {
            /*text-align: right;*/
        }

        #itemsPayment table td {
            padding: 10px 3px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        #itemsPayment table td:first-child {
            text-align: left;
        }

        #itemsPayment table td:nth-child(2) {
            text-align: left;
        }

        #itemsPayment,
        .box-title {
            margin: 25px 30px 0 30px;
        }

        .word-break {
            word-wrap: break-word;
            word-break: break-all;
        }

        .left-stripes {
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            width: 100px;
            background: url("<?php echo e(asset("img/stripe-bg.jpg")); ?>") repeat;
        }
        .left-stripes .circle {
            -moz-border-radius: 50%;
            -webkit-border-radius: 50%;
            border-radius: 50%;
            background: #415472;
            width: 30px;
            height: 30px;
            position: absolute;
            left: 33%;
        }
        .left-stripes .circle.c-upper {
            top: 440px;
        }
        .left-stripes .circle.c-lower {
            top: 690px;
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
            margin-right: 10;
        }

        #field-title {
            color: #504f4f;
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

        #memo .client-logo {
        float:left;
        display: flex !important;
        flex-direction: column !important;
        position: absolute;
        /* margin-bottom: 15px; */
        }

        #memo .client-logo img {
            height: 50px;
            margin-bottom: 10px;
        }

        .f-11 {
            font-size: 11px;
        }


    </style>

</head>

<body>
    <div id="container">
        <div class="right-invoice">
            <section id="memo" class="description">
                <div class="client-logo">
                    <div>
                        <img style="height:50px;" src="<?php echo e($invoiceSetting->logo_url); ?>" />
                    </div>
                    <div class="company-info description">
                            <br>
                        <div class="description">
                            <?php echo e($company->company_name); ?>

                        </div>
                        <?php if($company->company_email): ?>
                        <span class="description"><?php echo e($company->company_email); ?></span>
                            <br>
                        <?php endif; ?>
                        <?php if($company->company_phone): ?>
                        <span><?php echo e($company->company_phone); ?></span>
                            <br>
                        <?php endif; ?>
                        <?php if($invoice->address): ?>
                            <span class="description"><?php echo nl2br($invoice->address->address); ?></span>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="logo" id="client-info" >
                    <?php if($invoice->clientDetails->company_logo): ?>
                        <div>
                            <img src="<?php echo e($invoice->clientDetails->image_url); ?>"
                                alt="<?php echo e($invoice->clientDetails->company_name); ?>" />
                        </div>
                    <?php endif; ?>

                    <?php if($invoice->project && $invoice->project->client && $invoice->project->client->clientDetails && ($invoice->project->client->name || $invoice->project->client->email || $invoice->project->client->mobile || $invoice->project->client->clientDetails->company_name || $invoice->project->client->clientDetails->address) && ($invoiceSetting->show_client_name == 'yes' || $invoiceSetting->show_client_email == 'yes' || $invoiceSetting->show_client_phone == 'yes' || $invoiceSetting->show_client_company_name == 'yes' || $invoiceSetting->show_client_company_address == 'yes')): ?>
                        <section class="description">
                            <div class="description"><?php echo app('translator')->get('modules.invoices.billedTo'); ?>:</div>
                            <?php if($invoice->project->client->name && $invoiceSetting->show_client_name == 'yes'): ?>
                                <div class="client-name">
                                    <strong><?php echo e($invoice->project->client->name_salutation); ?></strong>
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
                                    <span><?php echo nl2br($invoice->project->clientDetails->address); ?></span>
                                </div>
                            <?php endif; ?>

                            <?php if($invoice->show_shipping_address === 'yes'): ?>
                                <div>
                                    <span>
                                        <b><?php echo app('translator')->get('app.shippingAddress'); ?> :</b><br>
                                        <?php echo nl2br($invoice->project->client->clientDetails->shipping_address); ?>

                                    </span>
                                </div>
                            <?php endif; ?>

                            <div>
                                <span><?php echo e($invoice->project->client->email); ?></span>
                            </div>
                            <?php if($invoiceSetting->show_gst == 'yes' && !is_null($invoice->project->client->clientDetails) && !is_null($invoice->project->client->clientDetails->gst_number)): ?>
                                <div>
                                    <?php if($invoice->project->client->clientDetails->tax_name): ?>
                                        <span> <?php echo e($invoice->project->client->clientDetails->tax_name); ?>: <?php echo e($invoice->project->client->clientDetails->gst_number); ?></span>
                                    <?php else: ?>
                                        <span> <?php echo app('translator')->get('app.gstIn'); ?>: <?php echo e($invoice->project->client->clientDetails->gst_number); ?></span>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </section>
                    <?php elseif(!is_null($invoice->client_id)): ?>
                        <section id="client-info" class="description">
                            <span class="description"><?php echo app('translator')->get('modules.invoices.billedTo'); ?>: </span>
                            <div class="client-name">
                                <?php echo e($invoice->client->name_salutation); ?>

                            </div>

                            <?php if($invoice->clientDetails): ?>
                                <div>
                                    <span><?php echo e($invoice->clientDetails->company_name); ?></span>
                                </div>
                                <div class="mb-3">
                                    <span>
                                        <?php echo app('translator')->get('app.address'); ?> :
                                        <?php echo nl2br($invoice->clientDetails->address); ?>

                                    </span>
                                </div>
                                <?php if($invoice->show_shipping_address === 'yes'): ?>
                                    <div>
                                        <span>
                                            <b><?php echo app('translator')->get('app.shippingAddress'); ?> :</b><br>
                                            <?php echo nl2br($invoice->clientDetails->shipping_address); ?>

                                        </span>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>

                            <div>
                                <span><?php echo e($invoice->client->email); ?></span>
                            </div>
                            <?php if($invoiceSetting->show_gst == 'yes' && !is_null($invoice->clientDetails) && !is_null($invoice->clientDetails->gst_number)): ?>
                                <div>
                                    <?php if($invoice->clientDetails->tax_name): ?>
                                        <span> <?php echo e($invoice->clientDetails->tax_name); ?>: <?php echo e($invoice->clientDetails->gst_number); ?></span>
                                    <?php else: ?>
                                        <span> <?php echo app('translator')->get('app.gstIn'); ?>: <?php echo e($invoice->clientDetails->gst_number); ?></span>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </section>
                    <?php endif; ?>



                    <?php if(is_null($invoice->project) && !is_null($invoice->estimate) && !is_null($invoice->estimate->client)): ?>
                        <section id="client-info">
                            <span><?php echo app('translator')->get('modules.invoices.billedTo'); ?>:</span>
                            <div class="client-name">
                                <strong><?php echo e($invoice->estimate->client->name_salutation); ?></strong>
                            </div>

                            <div>
                                <span><?php echo e($invoice->estimate->client->clientDetails->company_name); ?></span>
                            </div>
                            <div class="mb-3">
                                <span>
                                    <b><?php echo app('translator')->get('app.address'); ?> :</b><br>
                                    <?php echo nl2br($invoice->estimate->client->clientDetails->address); ?>

                                </span>
                            </div>
                            <?php if($invoice->show_shipping_address === 'yes'): ?>
                                <div>
                                    <span>
                                        <b><?php echo app('translator')->get('app.shippingAddress'); ?> :</b><br>
                                        <?php echo nl2br($invoice->estimate->client->clientDetails->shipping_address); ?>

                                    </span>
                                </div>
                            <?php endif; ?>
                            <div>
                                <span><?php echo e($invoice->estimate->client->email); ?></span>
                            </div>
                            <?php if($invoiceSetting->show_gst == 'yes' && !is_null($invoice->estimate->client->clientDetails->gst_number)): ?>
                                <div>
                                    <?php if($invoice->estimate->client->clientDetails->tax_name): ?>
                                        <span> <?php echo e($invoice->estimate->client->clientDetails->tax_name); ?>: <?php echo e($invoice->estimate->client->clientDetails->gst_number); ?></span>
                                    <?php else: ?>
                                        <span> <?php echo app('translator')->get('app.gstIn'); ?>: <?php echo e($invoice->estimate->client->clientDetails->gst_number); ?></span>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </section>
                    <?php endif; ?>

                </div>
            </section>

            <section id="invoice-title-number">

                <div class="title-top description" >
                    <span><?php echo app('translator')->get('modules.invoices.invoiceDate'); ?>:</span>
                    <span><?php echo e($invoice->issue_date->translatedFormat($company->date_format)); ?></span>
                </div>

                <div id="title"><?php echo e($invoice->invoice_number); ?></div>

            </section>



            <div class="clearfix"></div>

            <section id="invoice-info">
                <?php if(empty($invoice->order_id) && $invoice->status === 'unpaid' && $invoice->due_date->year > 1): ?>
                    <div>
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

                <?php if($invoiceSetting->show_project == 1 && isset($invoice->project->project_name)): ?>
                <div>
                    <span><?php echo app('translator')->get('modules.invoices.projectName'); ?>:</span> <span> <?php echo e($invoice->project->project_name); ?> </span>
                </div>
                <?php endif; ?>

            </section>

            <div class="clearfix"></div>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>

            <section id="items">

                <table cellpadding="0" cellspacing="0" >

                    <tr>
                        <th>#</th> <!-- Dummy cell for the row number and row commands -->
                        <th class="description"><?php echo app('translator')->get('modules.invoices.item'); ?></th>
                        <?php if($invoiceSetting->hsn_sac_code_show): ?>
                            <th><?php echo app('translator')->get('app.hsnSac'); ?></th>
                        <?php endif; ?>
                        <th class="description" style="text-align: right;"><?php echo app('translator')->get('modules.invoices.qty'); ?></th>
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
                                        <p class="item-summary mb-3 word-break"><?php echo nl2br(pdfStripTags($item->item_summary)); ?></p>
                                    <?php endif; ?>
                                    <?php if($item->invoiceItemImage): ?>
                                        <p>
                                            <img src="<?php echo e($item->invoiceItemImage->file_url); ?>" width="80" height="80"
                                                class="img-thumbnail">
                                        </p>
                                    <?php endif; ?>
                                </td>
                                <?php if($invoiceSetting->hsn_sac_code_show): ?>
                                    <td><?php echo e($item->hsn_sac_code ? $item->hsn_sac_code : '--'); ?></td>
                                <?php endif; ?>
                                <td style="text-align: right;"><?php echo e($item->quantity); ?> <br><span class="item-summary"><?php echo e($item->unit->unit_type); ?></td>
                                <td><?php echo e(currency_format($item->unit_price, $invoice->currency_id, false)); ?></td>
                                <td><?php echo e($item->tax_list); ?></td>
                                <td><?php echo e(currency_format($item->amount, $invoice->currency_id, false)); ?></td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </table>

            </section>

            <section id="sums">

                <table cellpadding="0" cellspacing="0">
                    <tr>
                        <th><?php echo app('translator')->get('modules.invoices.subTotal'); ?>:</th>
                        <td><?php echo e(currency_format($invoice->sub_total, $invoice->currency_id, false)); ?></td>
                    </tr>
                    <?php if($discount != 0 && $discount != ''): ?>
                        <tr data-iterate="tax">
                            <th><?php echo app('translator')->get('modules.invoices.discount'); ?>:</th>
                            <td><?php echo e(currency_format($discount, $invoice->currency_id, false)); ?></td>
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

            </section>


            <div class="clearfix"></div>

            <section id="terms">

                <div class="notes word-break description">
                    <?php if($invoice->note): ?>
                        <b><?php echo app('translator')->get('app.note'); ?></b> <br><?php echo nl2br($invoice->note); ?><br>
                    <?php endif; ?>
                    <br><br><b><?php echo app('translator')->get('modules.invoiceSettings.invoiceTerms'); ?></b><br><?php echo nl2br($invoiceSetting->invoice_terms); ?>

                    <?php if(isset($invoiceSetting->other_info)): ?>
                        <br><br><?php echo nl2br($invoiceSetting->other_info); ?>

                    <?php endif; ?>
                </div>

            </section>
            <?php if(isset($taxes) && $invoiceSetting->tax_calculation_msg == 1): ?>
                <div class="clearfix"></div>
                <section class="calculate_tax" >
                    <div class="description">
                        <?php if($invoice->calculate_tax == 'after_discount'): ?>
                            <?php echo app('translator')->get('messages.calculateTaxAfterDiscount'); ?>
                        <?php else: ?>
                            <?php echo app('translator')->get('messages.calculateTaxBeforeDiscount'); ?>
                        <?php endif; ?>
                    </div>
                </section>
            <?php endif; ?>
        </div>
    </div>

    
    <?php if(isset($fields) && count($fields) > 0): ?>
        <div class="page_break"></div>
        <div id="container">
            <div class="invoice-body right-invoice b-all m-b-20">
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
            </div>

        </div>

    <?php endif; ?>

    <?php if(count($payments) > 0): ?>
        <div class="page_break"></div>
        <div id="container">
            <div class="invoice-body right-invoice b-all m-b-20">
                <h3 class="box-title m-t-20 text-center h3-border description"><?php echo app('translator')->get('app.menu.payments'); ?></h3>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="table-responsive m-t-40" id="itemsPayment" style="clear: both;">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center description"><?php echo app('translator')->get('modules.payments.amount'); ?></th>
                                        <th class="text-center description"><?php echo app('translator')->get('modules.invoices.paymentMethod'); ?></th>
                                        <th class="text-center description"><?php echo app('translator')->get('modules.invoices.paidOn'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count = 0; ?>
                                    <?php $__empty_1 = true; $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td class="text-center"><?php echo e($key + 1); ?></td>
                                            <td class="text-center">
                                                <?php echo e(number_format((float) $payment->amount, 2, '.', '')); ?>

                                                <?php echo $invoice->currency->currency_code; ?> </td>
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
                                            <td class="text-center description">
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
        </div>
    <?php endif; ?>

</body>

</html>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/invoices/pdf/invoice-4.blade.php ENDPATH**/ ?>