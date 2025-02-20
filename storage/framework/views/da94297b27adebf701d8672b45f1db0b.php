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
        /* Reset styles */
        html, body, div, span, applet, object, iframe,
        h1, h2, h3, h4, h5, h6, p, blockquote, pre,
        a, abbr, acronym, address, big, cite, code,
        del, dfn, em, img, ins, kbd, q, s, samp,
        small, strike, strong, sub, sup, tt, var,
        b, u, i, center,
        dl, dt, dd
        fieldset, form, label, legend,
        table, caption, tbody, tfoot, thead, tr, th, td,
        article, aside, canvas, details, embed,
        figure, figcaption, footer, header, hgroup,
        menu, nav, output, ruby, section, summary,
        time, mark, audio, video {
            margin: 0;
            padding: 0;
            border: 0;
            /* font-family: Verdana, Arial, Helvetica, sans-serif; */
            /* font-size: 80%; */
            vertical-align: baseline;
        }

        html {
            line-height: 1;
        }

        table {
            border-collapse: collapse;
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

        .hidden {
            display: none;
        }

        b, strong, .bold {
            font-weight: bold;
        }

        #container {
            font: normal 13px/1.4em 'Open Sans', Sans-serif;
            margin: 0 auto;
        }

        .invoice-top {
            color: #000000;
            padding: 40px 40px 10px 40px;
        }

        .invoice-body {
            padding: 10px 40px 40px 40px;
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
        }

        #memo .company-info .company-name {
            font-size: 20px;
            text-align: right;
        }

        #memo .company-info .spacer {
            height: 15px;
            display: block;
        }

        #memo .company-info div {
            font-size: 12px;
            text-align: right;
            line-height: 18px;
        }

        #memo:after {
            content: '';
            display: block;
            clear: both;
        }

        #invoice-info {
            text-align: left;
            margin-top: 20px;
            line-height: 18px;
        }

        #invoice-info table {
            width: 30%;
        }

        #invoice-info > div {
            float: left;
        }

        #invoice-info > div > span {
            display: block;
            min-width: 100px;
            min-height: 18px;
            margin-bottom: 3px;
        }

        #invoice-info:after {
            content: '';
            display: block;
            clear: both;
        }

        #client-info {
            text-align: right;
            min-width: 220px;
            line-height: 18px;
        }

        #client-info > div {
            margin-bottom: 3px;
        }

        #client-info span {
            display: block;
        }

        #client-info > span {
            margin-bottom: 3px;
        }

        #invoice-title-number {
            margin-top: 30px;
        }

        #invoice-title-number #title {
            font-size: 35px;
        }

        #invoice-title-number #number {
            text-align: left;
            font-size: 20px;
        }

        table {
            table-layout: fixed;
        }

        table th, table td {
            vertical-align: top;
            word-break: keep-all;
            word-wrap: break-word;
        }

        #items .first-cell, #items table th:first-child, #items table td:first-child {
            width: 18px;
            text-align: right;
        }

        #items table {
            border-collapse: collapse;
            width: 100%;
            border: 1px solid #000000
        }

        #items table th {
            font-weight: bold;
            padding: 12px 10px;
            text-align: right;
            border-bottom: 1px solid #444;
        }

        #items table th:nth-child(2) {
            width: 30%;
            text-align: left;
        }

        #items table th:last-child {
            text-align: right;
        }

        #items table td {
            border-right: 1px solid #b6b6b6;
            padding: 7px 10px;
            text-align: right;
        }

        #items table td:first-child {
            text-align: left;
        }

        #items table td:nth-child(2) {
            text-align: left;
        }

        #items table td:last-child {
            border-right: none !important;
        }

        #terms > div {
            min-height: 30px;
        }

        .payment-info {
            color: #707070;
            font-size: 12px;
        }

        .payment-info div {
            display: inline-block;
            min-width: 10px;
        }

        .ib_drop_zone {
            color: #F8ED31 !important;
            border-color: #F8ED31 !important;
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

        table td.text-right {
            text-align: right;
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
            font-weight: bold;
            padding: 12px 10px;
            text-align: right;
            border-bottom: 1px solid #444;
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
            border-right: 1px solid #b6b6b6;
            padding: 15px 10px;
            text-align: right;
        }

        #itemsPayment table td:first-child {
            text-align: left;
            /*border-right: none !important;*/
        }

        #itemsPayment table td:nth-child(2) {
            text-align: left;
        }

        #itemsPayment table td:last-child {
            border-right: none !important;
        }

        .word-break {
            word-wrap: break-word;
            word-break: break-all;
        }

        .description {
            line-height: 12px;
        }

        <?php if($invoiceSetting->locale == 'th'): ?>

            table td {
            font-weight: bold !important;
            font-size: 20px !important;
        }

        .descriptionFont {
            font-weight: bold !important;
            font-size: 16px !important;
        }
        <?php endif; ?>
    </style>
</head>
<body>
<div id="container" class="descriptionFont">
    <div class="invoice-top">
        <section id="memo">
            <div class="logo">
                <img src="<?php echo e($invoiceSetting->logo_url); ?>" alt="<?php echo e($company->company_name); ?>"/>

            </div>

            <div class="company-info descriptionFont">
                <span class="company-name descriptionFont">
                    <?php echo e($company->company_name); ?>

                </span>

                <span class="spacer"></span>

                <div><?php echo nl2br($company->defaultAddress->address); ?></div>


                <span class="clearfix"></span>

                <div><?php echo e($company->company_phone); ?></div>

                <span class="clearfix"></span>

                <?php if($invoiceSetting->show_gst == 'yes' && !is_null($invoiceSetting->gst_number)): ?>
                    <div><?php echo app('translator')->get('app.gstIn'); ?>: <?php echo e($invoiceSetting->gst_number); ?></div>
                <?php endif; ?>
            </div>

        </section>

        <section id="invoice-info" class="descriptionFont">
            <table class="descriptionFont">
                <tr>
                    <td><?php echo app('translator')->get('modules.lead.proposal'); ?>:</td>
                    <td>#<?php echo e($proposal->id); ?></td>
                </tr>
                <tr>
                    <td><?php echo app('translator')->get('app.status'); ?>:</td>
                    <td><?php echo e($proposal->status); ?></td>
                </tr>
                <tr>
                    <td><?php echo app('translator')->get('modules.estimates.validTill'); ?>:</td>
                    <td><?php echo e($proposal->valid_till->translatedFormat($company->date_format)); ?></td>
                </tr>
            </table>


            <div class="clearfix"></div>

            <section id="invoice-title-number">

                <span id="number"><?php echo app('translator')->get('modules.lead.proposal'); ?>#<?php echo e($proposal->id); ?></span>

            </section>
        </section>

        <?php if($proposal->lead->contact && ($proposal->lead->contact->client_name || $proposal->lead->contact->client_email || $proposal->lead->contact->mobile || $proposal->lead->contact->company_name || $proposal->lead->contact->address) && ($invoiceSetting->show_client_name == 'yes' || $invoiceSetting->show_client_email == 'yes' || $invoiceSetting->show_client_phone == 'yes' || $invoiceSetting->show_client_company_name == 'yes' || $invoiceSetting->show_client_company_address == 'yes')): ?>
            <section id="client-info">
                <span class="descriptionFont"><?php echo app('translator')->get('modules.invoices.billedTo'); ?></span>
                <div class="descriptionFont">
                    <?php if($proposal->deal && !empty($proposal->deal->name)): ?>
                        <div class="descriptionFont"><?php echo e($proposal->deal->name); ?></div>
                    <?php endif; ?>
                    <?php if($proposal->lead->contact && $proposal->lead->contact->client_name && $invoiceSetting->show_client_name == 'yes'): ?>
                        <span class="bold descriptionFont"><?php echo e($proposal->lead->contact->client_name_salutation); ?></span>
                    <?php endif; ?>
                    <?php if($proposal->lead->contact && $proposal->lead->email && $invoiceSetting->show_client_email == 'yes'): ?>
                        <div class="descriptionFont"><?php echo e($proposal->lead->contact->client_email); ?></div>
                    <?php endif; ?>
                    <?php if($proposal->lead->contact && $proposal->lead->contact->mobile && $invoiceSetting->show_client_phone == 'yes'): ?>
                        <div class="descriptionFont"><?php echo e($proposal->lead->contact->mobile); ?></div>
                    <?php endif; ?>
                    <?php if($proposal->lead->contact && $proposal->lead->contact->company_name && $invoiceSetting->show_client_company_name == 'yes'): ?>
                        <div class="descriptionFont"><?php echo e($proposal->lead->contact->company_name); ?></div>
                    <?php endif; ?>
                    <?php if($proposal->lead->contact && $proposal->lead->contact->address && $invoiceSetting->show_client_company_address == 'yes'): ?>
                        <div class="descriptionFont"><?php echo nl2br($proposal->lead->contact->address); ?></div>
                    <?php endif; ?>
                </div>
            </section>
        <?php endif; ?>

        <div class="clearfix"></div>
    </div>

    <div class="invoice-body descriptionFont">

        <?php if($proposal->description): ?>
            <div class="f-13 mb-3 description descriptionFont"><?php echo nl2br(pdfStripTags($proposal->description)); ?></div>
        <?php endif; ?>

        <?php if(count($proposal->items) > 0): ?>

            <section id="items">

                <table cellpadding="0" cellspacing="0">

                    <tr>
                        <th class="descriptionFont">#</th> <!-- Dummy cell for the row number and row commands -->
                        <th class="descriptionFont"><?php echo app('translator')->get("modules.invoices.item"); ?></th>
                        <?php if($invoiceSetting->hsn_sac_code_show): ?>
                            <th class="descriptionFont"><?php echo app('translator')->get("app.hsnSac"); ?></th>
                        <?php endif; ?>
                        <th class="descriptionFont"><?php echo app('translator')->get('modules.invoices.qty'); ?></th>
                        <th class="descriptionFont"><?php echo app('translator')->get("modules.invoices.unitPrice"); ?></th>
                        <th class="descriptionFont"><?php echo app('translator')->get("modules.invoices.tax"); ?></th>
                        <th class="descriptionFont"><?php echo app('translator')->get("modules.invoices.price"); ?>
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
                                        <p class="item-summary descriptionFont word-break"><?php echo nl2br(pdfStripTags($item->item_summary)); ?></p>
                                    <?php endif; ?>
                                    <?php if($item->proposalItemImage): ?>
                                        <p class="mt-2">
                                            <img src="<?php echo e($item->proposalItemImage->file_url); ?>" width="60" height="60"
                                                 class="img-thumbnail">
                                        </p>
                                    <?php endif; ?>
                                </td>
                                <?php if($invoiceSetting->hsn_sac_code_show): ?>
                                    <td><?php echo e($item->hsn_sac_code ? $item->hsn_sac_code : '--'); ?></td>
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

                <table cellpadding="0" cellspacing="0">
                    <tr>
                        <td colspan="<?php echo e($invoiceSetting->hsn_sac_code_show ? '5' : '4'); ?>"><?php echo app('translator')->get("modules.invoices.subTotal"); ?>
                            :
                        </td>
                        <td><?php echo e(currency_format($proposal->sub_total, $proposal->currency_id, false)); ?></td>
                    </tr>
                    <?php if($discount != 0 && $discount != ''): ?>
                        <tr data-iterate="tax">
                            <td colspan="<?php echo e($invoiceSetting->hsn_sac_code_show ? '5': '4'); ?>"><?php echo app('translator')->get("modules.invoices.discount"); ?>
                                :
                            </td>
                            <td>-<?php echo e(currency_format($discount, $proposal->currency_id, false)); ?></td>
                        </tr>
                    <?php endif; ?>
                    <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr data-iterate="tax">
                            <td colspan="<?php echo e($invoiceSetting->hsn_sac_code_show ? '5': '4'); ?>"><?php echo e($key); ?>:</td>
                            <td><?php echo e(currency_format($tax, $proposal->currency_id, false)); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <tr class="amount-total">
                        <td colspan="<?php echo e($invoiceSetting->hsn_sac_code_show ? '5': '4'); ?>">
                            <?php echo app('translator')->get("modules.invoices.total"); ?>:
                        </td>
                        <td>
                            <?php echo e(currency_format($proposal->total, $proposal->currency_id, false)); ?> <?php echo htmlentities($proposal->currency->currency_code); ?>

                        </td>
                    </tr>
                </table>


            </section>

        <?php endif; ?>


        <section id="terms" class="descriptionFont">
            <?php if(!is_null($proposal->note)): ?>
                <div class="word-break item-summary"><?php echo app('translator')->get('app.note'); ?> <br><?php echo nl2br($proposal->note); ?></div>
            <?php endif; ?>

            <div class="word-break item-summary"><?php echo app('translator')->get('modules.invoiceSettings.invoiceTerms'); ?>
                <br><?php echo nl2br($invoiceSetting->invoice_terms); ?></div>

            <?php if(isset($invoiceSetting->other_info)): ?>
                <div class="word-break item-summary description">
                    <?php echo nl2br($invoiceSetting->other_info); ?>

                </div>
            <?php endif; ?>
        </section>

        <?php if(isset($taxes) && $invoiceSetting->tax_calculation_msg == 1): ?>
            <p class="text-dark-grey descriptionFont">
                <?php if($proposal->calculate_tax == 'after_discount'): ?>
                    <?php echo app('translator')->get('messages.calculateTaxAfterDiscount'); ?>
                <?php else: ?>
                    <?php echo app('translator')->get('messages.calculateTaxBeforeDiscount'); ?>
                <?php endif; ?>
            </p>
        <?php endif; ?>

        <div class="clearfix"></div>
        <br><br>
        <section>
            <?php if($proposal->signature): ?>
                <?php if(!is_null($proposal->signature->signature)): ?>
                    <img src="<?php echo e($proposal->signature->signature); ?>" style="width: 200px;">
                    <h6 class="descriptionFont"><?php echo app('translator')->get('modules.estimates.signature'); ?></h6>
                <?php else: ?>
                    <h6 class="descriptionFont"><?php echo app('translator')->get('modules.estimates.signedBy'); ?></h6>
                <?php endif; ?>
                <p class="descriptionFont">(<?php echo e($proposal->signature->full_name); ?>)</p>
            <?php endif; ?>
        </section>
    </div>

</div>

</body>
</html>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/proposals/pdf/invoice-2.blade.php ENDPATH**/ ?>