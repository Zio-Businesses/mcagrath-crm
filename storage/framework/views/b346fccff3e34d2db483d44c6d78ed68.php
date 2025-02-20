<!DOCTYPE html>
<!--
  Invoice template by invoicebus.com
  To customize this template consider following this guide https://invoicebus.com/how-to-create-invoice-template/
  This template is under Invoicebus Template License, see https://invoicebus.com/templates/license/
-->
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title><?php echo app('translator')->get('app.proposal'); ?></title>
    <?php if ($__env->exists('invoices.pdf.invoice_pdf_css')) echo $__env->make('invoices.pdf.invoice_pdf_css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="Invoice">

    <style>
        /*! Invoice Templates @author: Invoicebus @email: info@invoicebus.com @web: https://invoicebus.com @version: 1.0.0 @updated: 2015-03-27 14:03:24 @license: Invoicebus */
        /* Reset styles */
        /*@import url("https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,700&subset=cyrillic,cyrillic-ext,latin,greek-ext,greek,latin-ext,vietnamese");*/
        /*@import url("https://fonts.googleapis.com/css?family=Sanchez&subset=latin,latin-ext");*/
        html, body, div, span, applet, object, iframe,
        h1, h2, h3, h4, h5, h6, p, blockquote, pre,
        a, abbr, acronym, address, big, cite, code,
        del, dfn, em, img, ins, kbd, q, s, samp,
        small, strike, strong, sub, sup, tt, var,
        b, u, i, center,
        dl, dt, dd,
        fieldset, form, label, legend,
        table, caption, tbody, tfoot, thead, tr, th, td,
        article, aside, canvas, details, embed,
        figure, figcaption, footer, header, hgroup,
        menu, nav, output, ruby, section, summary,
        time, mark, audio, video {
            margin: 0;
            padding: 0;
            border: 0;
            <?php if($invoiceSetting->locale != 'th'): ?>
   font: inherit;
            font-size: 12px;
            vertical-align: baseline;
        <?php endif; ?>
   /* font-family: Verdana, Arial, Helvetica, sans-serif; */
        }

        html {
            line-height: 1;
        }

        table {
            border-collapse: collapse;
            border-spacing: 0;
        }

        caption, th, td {
            text-align: left;
            font-weight: normal;
            vertical-align: middle;
        }

        q, blockquote {
            quotes: none;
        }

        q:before, q:after, blockquote:before, blockquote:after {
            content: "";
            content: none;
        }

        a img {
            border: none;
        }

        article, aside, details, figcaption, figure, footer, header, hgroup, main, menu, nav, section, summary {
            display: block;
        }

        /* Invoice styles */
        /**
         * DON'T override any styles for the <html> and <body> tags, as this may break the layout.
         * Instead wrap everything in one main <div id="container"> element where you may change
         * something like the font or the background of the invoice
         */
        html, body {
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

        b, strong, .bold {
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

        #memo .company-info div {
            font-size: 12px;
            text-transform: uppercase;
            min-width: 20px;
            line-height: 1em;
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
            margin: 50px 0 20px 0;
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
            line-height: 21px;
            font-size: 12px;
        }

        .client-name {
            font-weight: bold !important;
            font-size: 15px !important;
            text-transform: uppercase;
            margin: 7px 0;
        }

        #client-info > div {
            margin-bottom: 3px;
            min-width: 20px;
        }

        #client-info span {
            display: block;
            min-width: 20px;
        }

        #client-info > span {
            text-transform: uppercase;
            color: #858585;
            font-size: 15px;
        }

        table {
            table-layout: fixed;
        }

        table th, table td {
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

        #items .first-cell, #items table th:first-child, #items table td:first-child {
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

        #sums table tr th, #sums table tr td {
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

        #sums table tr.amount-total td, #sums table tr.amount-total th {
            font-size: 17px !important;
        }

        #sums table tr.due-amount th, #sums table tr.due-amount td {
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

        #terms > span {
            font-weight: bold;
            display: inline-block;
            min-width: 20px;
        }

        #terms > div {
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

        #itemsPayment .first-cell, #itemsPayment table th:first-child, #itemsPayment table td:first-child {
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

        #itemsPayment, .box-title {
            margin: 25px 30px 0 30px;
        }

        .word-break {
            word-wrap: break-word;
        }

        <?php if($invoiceSetting->locale == 'th'): ?>

            table td {
            font-weight: bold !important;
            font-size: 20px !important;
        }

        .description {
            font-weight: bold !important;
            font-size: 16px !important;
        }
        <?php endif; ?>
    </style>

</head>
<body>
<div id="container">

    <div class="right-invoice description">
        <section id="memo">
            <div class="company-info description">
                <div class="description">
                    <?php echo e($company->company_name); ?>

                </div>
                <br>
                <span><?php echo nl2br($company->defaultAddress->address); ?></span>
                <br>
                <span><?php echo e($company->company_phone); ?></span>

            </div>

            <div class="logo">
                <img src="<?php echo e($invoiceSetting->logo_url); ?>"/>
            </div>
        </section>

        <?php if($proposal->lead->contact && ($proposal->lead->contact->client_name || $proposal->lead->contact->client_email || $proposal->lead->contact->mobile || $proposal->lead->contact->company_name || $proposal->lead->contact->address) && ($invoiceSetting->show_client_name == 'yes' || $invoiceSetting->show_client_email == 'yes' || $invoiceSetting->show_client_phone == 'yes' || $invoiceSetting->show_client_company_name == 'yes' || $invoiceSetting->show_client_company_address == 'yes')): ?>
            <section id="client-info" class="description">
                <span><?php echo app('translator')->get('modules.invoices.billedTo'); ?>:</span>
                <div>
                    <?php if($proposal->deal && !empty($proposal->deal->name)): ?>
                        <div><?php echo e($proposal->deal->name); ?></div>
                    <?php endif; ?>
                    <?php if($proposal->lead->contact && $proposal->lead->contact->client_name && $invoiceSetting->show_client_name == 'yes'): ?>
                        <span class="bold"><?php echo e($proposal->lead->contact->client_name_salutation); ?></span>
                    <?php endif; ?>
                    <?php if($proposal->lead->contact && $proposal->lead->contact->client_email && $invoiceSetting->show_client_email == 'yes'): ?>
                        <div><?php echo e($proposal->lead->contact->client_email); ?></div>
                    <?php endif; ?>
                    <?php if($proposal->lead->contact && $proposal->lead->contact->mobile && $invoiceSetting->show_client_phone == 'yes'): ?>
                        <div><?php echo e($proposal->lead->contact->mobile); ?></div>
                    <?php endif; ?>
                    <?php if($proposal->lead->contact && $proposal->lead->contact->company_name && $invoiceSetting->show_client_company_name == 'yes'): ?>
                        <div><?php echo e($proposal->lead->contact->company_name); ?></div>
                    <?php endif; ?>
                    <?php if($proposal->lead->contact && $proposal->lead->contact->address && $invoiceSetting->show_client_company_address == 'yes'): ?>
                        <div><?php echo nl2br($proposal->lead->contact->address); ?></div>
                    <?php endif; ?>
                </div>
            </section>
        <?php endif; ?>

        <div class="clearfix"></div>

        <section id="invoice-info" class="description">
            <div>
                <span><?php echo app('translator')->get('modules.lead.proposal'); ?>:</span>
                <span>#<?php echo e($proposal->id); ?></span>
            </div>
            <div>
                <span><?php echo app('translator')->get('app.status'); ?>:</span>
                <span><?php echo e($proposal->status); ?></span>
            </div>
            <div>
                <span><?php echo app('translator')->get('modules.estimates.validTill'); ?>:</span>
                <span><?php echo e($proposal->valid_till->translatedFormat($company->date_format)); ?></span>
            </div>
        </section>

        <div class="clearfix"></div>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>

        <section id="items" class="description">
            <?php if($proposal->description): ?>
                <div class="f-13 mb-3"><?php echo nl2br(pdfStripTags($proposal->description)); ?></div>
            <?php endif; ?>

            <?php if(count($proposal->items) > 0): ?>
                <table cellpadding="0" cellspacing="0">

                    <tr>
                        <th>#</th> <!-- Dummy cell for the row number and row commands -->
                        <th class="description"><?php echo app('translator')->get("modules.invoices.item"); ?></th>
                        <?php if($invoiceSetting->hsn_sac_code_show): ?>
                            <th class="description"><?php echo app('translator')->get("app.hsnSac"); ?></th>
                        <?php endif; ?>
                        <th class="description"><?php echo app('translator')->get('modules.invoices.qty'); ?></th>
                        <th class="description"><?php echo app('translator')->get("modules.invoices.unitPrice"); ?></th>
                        <th class="description"><?php echo app('translator')->get("modules.invoices.tax"); ?></th>
                        <th class="description"><?php echo app('translator')->get("modules.invoices.price"); ?>
                            (<?php echo htmlentities($proposal->currency->currency_code); ?>)
                        </th>
                    </tr>

                        <?php $count = 0; ?>
                    <?php $__currentLoopData = $proposal->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($item->type == 'item'): ?>
                            <tr data-iterate="item">
                                <td><?php echo e(++$count); ?></td>
                                <!-- Don't remove this column as it's needed for the row commands -->
                                <td class="word-break">
                                    <?php echo e($item->item_name); ?>

                                    <?php if(!is_null($item->item_summary)): ?>
                                        <p class="item-summary  mb-3 description word-break"><?php echo nl2br(pdfStripTags($item->item_summary)); ?></p>
                                    <?php endif; ?>
                                    <?php if($item->proposalItemImage): ?>
                                        <p class="mt-2">
                                            <img src="<?php echo e($item->proposalItemImage->file_url); ?>" width="80" height="80"
                                                 class="img-thumbnail">
                                        </p>
                                    <?php endif; ?>
                                </td>
                                <?php if($invoiceSetting->hsn_sac_code_show): ?>
                                    <td><?php echo e($item->hsn_sac_code ?  : '--'); ?></td>
                                <?php endif; ?>
                                <td><?php echo e($item->quantity); ?><?php if($item->unit): ?>
                                        <br><span class="f-11 text-dark-grey"><?php echo e($item->unit->unit_type); ?></span>
                                    <?php endif; ?></td>
                                <td><?php echo e(currency_format($item->unit_price, $proposal->currency_id, false)); ?></td>
                                <td><?php echo e($item->tax_list); ?></td>
                                <td><?php echo e(currency_format($item->amount, $proposal->currency_id, false)); ?></td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
            <?php endif; ?>
        </section>

        <?php if(count($proposal->items) > 0): ?>
            <section id="sums" class="description">

                <table cellpadding="0" cellspacing="0">
                    <tr>
                        <th><?php echo app('translator')->get("modules.invoices.subTotal"); ?>:</th>
                        <td><?php echo e(currency_format($proposal->sub_total, $proposal->currency_id, false)); ?></td>
                    </tr>
                    <?php if($discount != 0 && $discount != ''): ?>
                        <tr data-iterate="tax">
                            <th><?php echo app('translator')->get("modules.invoices.discount"); ?>:</th>
                            <td><?php echo e(currency_format($discount, $proposal->currency_id, false)); ?></td>
                        </tr>
                    <?php endif; ?>
                    <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr data-iterate="tax">
                            <th><?php echo e($key); ?>:</th>
                            <td><?php echo e(currency_format($tax, $proposal->currency_id, false)); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <tr class="amount-total">
                        <th><?php echo app('translator')->get("modules.invoices.total"); ?>:</th>
                        <td><?php echo e(currency_format($proposal->total, $proposal->currency_id, false)); ?> <?php echo htmlentities($proposal->currency->currency_code); ?></td>
                    </tr>
                </table>

            </section>

            <div class="clearfix"></div>
            <p>&nbsp;</p>

            <section id="terms" class="description">

                <div class="notes description">
                    <?php if(!is_null($proposal->note)): ?>
                        <br><?php echo app('translator')->get('app.note'); ?>
                        <br> <?php echo nl2br($proposal->note); ?>

                    <?php endif; ?>
                    <br><br><?php echo app('translator')->get('modules.invoiceSettings.invoiceTerms'); ?>
                    <br><?php echo nl2br($invoiceSetting->invoice_terms); ?>

                    <?php if(isset($invoiceSetting->other_info)): ?>
                        <br><br><?php echo nl2br($invoiceSetting->other_info); ?>

                    <?php endif; ?>
                </div>
                <br>
                <div class="description">
                    <?php if($proposal->signature): ?>
                        <?php if(!is_null($proposal->signature->signature)): ?>
                            <img src="<?php echo e($proposal->signature->signature); ?>" style="width: 200px;">
                            <h6><?php echo app('translator')->get('modules.estimates.signature'); ?></h6>
                        <?php else: ?>
                            <h6><?php echo app('translator')->get('modules.estimates.signedBy'); ?></h6>
                        <?php endif; ?>
                        <p>(<?php echo e($proposal->signature->full_name); ?>)</p>
                    <?php endif; ?>
                </div>

            </section>

            <?php if(isset($taxes) && $invoiceSetting->tax_calculation_msg == 1): ?>
                <div class="clearfix"></div>
                <br>
                <section id="terms1" class="description">
                    <p class="text-dark-grey">
                        <?php if($proposal->calculate_tax == 'after_discount'): ?>
                            <?php echo app('translator')->get('messages.calculateTaxAfterDiscount'); ?>
                        <?php else: ?>
                            <?php echo app('translator')->get('messages.calculateTaxBeforeDiscount'); ?>
                        <?php endif; ?>
                    </p>
                </section>
            <?php endif; ?>
        <?php endif; ?>

    </div>
</div>
</body>
</html>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/proposals/pdf/invoice-4.blade.php ENDPATH**/ ?>