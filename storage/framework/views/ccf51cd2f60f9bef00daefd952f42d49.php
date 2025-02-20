<!DOCTYPE html>
<!--
  Invoice template by invoicebus.com
  To customize this template consider following this guide https://invoicebus.com/how-to-create-invoice-template/
  This template is under Invoicebus Template License, see https://invoicebus.com/templates/license/
-->
<html lang="en">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo app('translator')->get('app.estimate'); ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="Invoice">
    <?php if ($__env->exists('estimates.pdf.estimate_pdf_css')) echo $__env->make('estimates.pdf.estimate_pdf_css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <style>
        /**
         * IMPORTANT NOTICE: DON'T USE '!important' otherwise this may lead to broken print layout.
         * Some browsers may require '!important' in oder to work properly but be careful with it.
         */
        <?php if($invoiceSetting->locale != 'th'): ?>
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

        html,
        body {
            /* MOVE ALONG, NOTHING TO CHANGE HERE! */
        }
        <?php endif; ?>

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
            color: #858585;
            font-size: 15px;
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
            font-size: 17px !important;
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
        }

        .f-13 {
            font-size: 13px;
        }

        #notes {
            color: #767676;
            font-size: 11px;
            margin-top: 10px;
            margin-left: 10px;
        }

        #field-title {
            color: #504f4f;
            font-size: 13px;
            margin-top: 10px;
            margin-left: 10px;
        }
        .description {
            line-height: 12px;
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

    </style>

</head>

<body>
    <div id="container">
        <div class="right-invoice description">
            <section id="memo" class="description">
                <div class="client-logo description">
                    <div>
                        <img src="<?php echo e($invoiceSetting->logo_url); ?>" />
                    </div>
                    <div class="company-info description">
                        <div class="description">
                            <?php echo e($company->company_name); ?>

                        </div>
                        <br>
                        <span class="description"><?php echo nl2br($company->defaultAddress->address); ?></span>
                        <br>
                        <span  class="description"><?php echo e($company->company_phone); ?></span>

                    </div>
                </div>
                <div class="logo">
                    <?php if($estimate->clientDetails->company_logo): ?>
                        <img src="<?php echo e($estimate->clientDetails->image_url); ?>"
                            alt="<?php echo e($estimate->clientDetails->company_name); ?>" class="logo"/>
                    <?php endif; ?>
                </div>
            </section>

            <section id="invoice-title-number">

                <div id="title"><?php echo e($estimate->estimate_number); ?></div>

            </section>

            <section id="client-info" class="description">
                <?php if(
                    ($estimate->client || $estimate->clientDetails)
                    && ($estimate->client->name
                        || $estimate->client->email
                        || $estimate->client->mobile
                        || $estimate->clientDetails->company_name
                        || $estimate->clientDetails->address
                        )
                    && ($invoiceSetting->show_client_name == 'yes'
                    || $invoiceSetting->show_client_email == 'yes'
                    || $invoiceSetting->show_client_phone == 'yes'
                    || $invoiceSetting->show_client_company_name == 'yes'
                    || $invoiceSetting->show_client_company_address == 'yes')
                ): ?>
                    <span class="description"><?php echo app('translator')->get('modules.invoices.billedTo'); ?>:</span>

                    <?php if($estimate->client && $estimate->client->name && $invoiceSetting->show_client_name == 'yes'): ?>
                    <div>
                        <span class="bold"><?php echo e($estimate->client->name_salutation); ?></span>
                    </div>
                    <?php endif; ?>

                    <?php if($estimate->client && $estimate->client->email && $invoiceSetting->show_client_email == 'yes'): ?>
                    <div>
                        <span><?php echo e($estimate->client->email); ?></span>
                    </div>
                    <?php endif; ?>

                    <?php if($estimate->client && $estimate->client->mobile && $invoiceSetting->show_client_phone == 'yes'): ?>
                    <div>
                        <span><?php echo e($estimate->client->mobile_with_phonecode); ?></span>
                    </div>
                    <?php endif; ?>

                    <?php if($estimate->clientDetails && $estimate->clientDetails->company_name && $invoiceSetting->show_client_company_name == 'yes'): ?>
                    <div>
                        <span><?php echo e($estimate->clientDetails->company_name); ?></span>
                    </div>
                    <?php endif; ?>

                    <?php if($estimate->clientDetails && $estimate->clientDetails->address && $invoiceSetting->show_client_company_address == 'yes'): ?>
                    <div class="mb-3">
                        <b><?php echo app('translator')->get('app.address'); ?> :</b>
                        <div><?php echo nl2br($estimate->clientDetails->address); ?></div>
                    </div>
                    <?php endif; ?>

                <?php endif; ?>

                <?php if($invoiceSetting->show_gst == 'yes' && !is_null($estimate->client->clientDetails->gst_number)): ?>
                    <div>
                        <span> <?php echo app('translator')->get('app.gstIn'); ?>: <?php echo e($estimate->client->clientDetails->gst_number); ?> </span>
                    </div>
                <?php endif; ?>
            </section>

            <div class="clearfix"></div>

            <section id="invoice-info">
                <?php if($estimate->status == 'unpaid'): ?>
                    <div>
                        <span><?php echo app('translator')->get('app.dueDate'); ?>:</span>
                        <span><?php echo e($estimate->due_date ? $estimate->due_date->translatedFormat($company->date_format) : '--'); ?></span>
                    </div>
                <?php endif; ?>
                <div>
                    <span><?php echo app('translator')->get('app.status'); ?>:</span> <span><?php echo e($estimate->status); ?></span>
                </div>

            </section>

            <div class="clearfix"></div>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>

            <section id="items">

                <?php if($estimate->description): ?>
                    <div class="f-13 mb-3"><?php echo nl2br(pdfStripTags($estimate->description)); ?></div>
                <?php endif; ?>

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
                        <th class="description"><?php echo app('translator')->get("modules.invoices.price"); ?> (<?php echo htmlentities($estimate->currency->currency_code); ?>)</th>
                    </tr>

                    <?php $count = 0; ?>
                    <?php $__currentLoopData = $estimate->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($item->type == 'item'): ?>
                            <tr data-iterate="item">
                                <td><?php echo e(++$count); ?></td>
                                <!-- Don't remove this column as it's needed for the row commands -->
                                <td>
                                    <?php echo e($item->item_name); ?>

                                    <?php if(!is_null($item->item_summary)): ?>
                                        <p class="item-summary mb-3 note-text"><?php echo nl2br(pdfStripTags($item->item_summary)); ?></p>
                                    <?php endif; ?>
                                    <?php if($item->estimateItemImage): ?>
                                        <p class="mt-2">
                                            <img src="<?php echo e($item->estimateItemImage->file_url); ?>" width="80"
                                                height="80" class="img-thumbnail">
                                        </p>
                                    <?php endif; ?>
                                </td>
                                <?php if($invoiceSetting->hsn_sac_code_show): ?>
                                    <td><?php echo e($item->hsn_sac_code ?  : '--'); ?></td>
                                <?php endif; ?>
                                <td><?php echo e($item->quantity); ?><?php if($item->unit): ?><br><span class="f-11 text-dark-grey"><?php echo e($item->unit->unit_type); ?></span><?php endif; ?></td>
                                <td><?php echo e(currency_format($item->unit_price, $estimate->currency_id, false)); ?></td>
                                <td><?php echo e($item->tax_list); ?></td>
                                <td><?php echo e(currency_format($item->amount, $estimate->currency_id, false)); ?></td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </table>

            </section>

            <section id="sums">

                <table cellpadding="0" cellspacing="0">
                    <tr>
                        <th><?php echo app('translator')->get("modules.invoices.subTotal"); ?>:</th>
                        <td><?php echo e(currency_format($estimate->sub_total, $estimate->currency_id, false)); ?></td>
                    </tr>
                    <?php if($discount != 0 && $discount != ''): ?>
                        <tr data-iterate="tax">
                            <th><?php echo app('translator')->get("modules.invoices.discount"); ?>:</th>
                            <td><?php echo e(currency_format($discount, $estimate->currency_id, false)); ?></td>
                        </tr>
                    <?php endif; ?>
                    <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr data-iterate="tax">
                            <th><?php echo e($key); ?>:</th>
                            <td><?php echo e(currency_format($tax, $estimate->currency_id, false)); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <tr class="amount-total">
                        <th><?php echo app('translator')->get("modules.invoices.total"); ?>:</th>
                        <td><?php echo e(currency_format($estimate->total, $estimate->currency_id, false)); ?> <?php echo htmlentities($estimate->currency->currency_code); ?></td>
                    </tr>
                </table>

            </section>

            <div class="clearfix"></div>
            <br>
            <section class="terms description">
                <div class="notes description">
                    <?php if(!is_null($estimate->note)): ?>
                        <br><?php echo app('translator')->get('app.note'); ?> <br> <?php echo nl2br($estimate->note); ?>

                    <?php endif; ?>
                    <br><br><?php echo app('translator')->get('modules.invoiceSettings.invoiceTerms'); ?> <br><?php echo nl2br($invoiceSetting->invoice_terms); ?>

                    <?php if(isset($invoiceSetting->other_info)): ?>
                        <br><br><?php echo nl2br($invoiceSetting->other_info); ?>

                    <?php endif; ?>
                </div>
            </section>
            <?php if(isset($taxes) && $invoiceSetting->tax_calculation_msg == 1): ?>
                <div class="clearfix"></div>
                <br>
                <section class="terms description">
                    <div class="notes">
                        <?php if($estimate->calculate_tax == 'after_discount'): ?>
                            <?php echo app('translator')->get('messages.calculateTaxAfterDiscount'); ?>
                        <?php else: ?>
                            <?php echo app('translator')->get('messages.calculateTaxBeforeDiscount'); ?>
                        <?php endif; ?>
                    </div>
                </section>
            <?php endif; ?>
            <br>
            <section class="terms description">
                <div class="notes description">
                    <?php if($estimate->sign): ?>
                        <h5 style="margin-bottom: 20px;"><?php echo app('translator')->get('app.signature'); ?></h5>
                        <img src="<?php echo e($estimate->sign->signature); ?>" style="height: 75px;">
                        <p>(<?php echo e($estimate->sign->full_name); ?>)</p>
                    <?php endif; ?>
                </div>
            </section>

            
            <?php if(isset($fields) && count($fields) > 0): ?>
                <div class="page_break"></div>
                <div id="container">
                    <div class="invoice-body right-invoice b-all m-b-20">
                        <h3 class="m-t-20 text-center h3-border"> <?php echo app('translator')->get('modules.projects.otherInfo'); ?></h3>
                        <table  style="background: none" border="0" cellspacing="0" cellpadding="0" width="100%">
                            <?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td style="text-align: left;background: none;" >
                                        <div id="field-title"><?php echo e($field->label); ?></div>
                                        <p id="notes">
                                            <?php if( $field->type == 'text' || $field->type == 'password' || $field->type == 'number' || $field->type == 'textarea'): ?>
                                                <?php echo e($estimate->custom_fields_data['field_'.$field->id] ?? '-'); ?>

                                            <?php elseif($field->type == 'radio'): ?>
                                                <?php echo e(!is_null($estimate->custom_fields_data['field_'.$field->id]) ? $estimate->custom_fields_data['field_'.$field->id] : '-'); ?>

                                            <?php elseif($field->type == 'select'): ?>
                                                <?php echo e((!is_null($estimate->custom_fields_data['field_'.$field->id]) && $estimate->custom_fields_data['field_'.$field->id] != '') ? $field->values[$estimate->custom_fields_data['field_'.$field->id]] : '-'); ?>

                                            <?php elseif($field->type == 'checkbox'): ?>
                                                <?php echo e(!is_null($estimate->custom_fields_data['field_'.$field->id]) ? $estimate->custom_fields_data['field_'.$field->id] : '-'); ?>

                                            <?php elseif($field->type == 'date'): ?>
                                                <?php echo e(!is_null($estimate->custom_fields_data['field_'.$field->id]) ? \Carbon\Carbon::parse($estimate->custom_fields_data['field_'.$field->id])->translatedFormat($estimate->company->date_format) : '--'); ?>

                                            <?php endif; ?>
                                        </p>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                    </div>

                </div>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>

<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/estimates/pdf/invoice-4.blade.php ENDPATH**/ ?>