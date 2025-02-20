<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title><?php echo app('translator')->get('app.estimate'); ?></title>
    <?php if ($__env->exists('estimates.pdf.estimate_pdf_css')) echo $__env->make('estimates.pdf.estimate_pdf_css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
            font-family: Verdana, Arial, Helvetica, sans-serif;
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
            font-size: 0.9em;
            width: 10%;
            text-align: center;
            border-left: 1px solid #e7e9eb;
        }

        table .desc,
        table .item-summary {
            text-align: left;
        }

        table .unit {
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

        table tbody tr:last-child td {
            border: none;
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
            word-wrap: break-word;
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

        .f-13 {
            font-size: 13px;
        }

        .h3-border {
            border-bottom: 1px solid #AAAAAA;
        }

        .client-logo {
            height: 50px;
            margin-bottom: 20px;
        }

        <?php if($invoiceSetting->locale=='th'): ?> table td {
            font-weight: bold !important;
            font-size: 20px !important;
        }

        .description {
            line-height: 12px;
            font-weight: bold !important;
            font-size: 16px !important;
        }
        <?php endif; ?>

    </style>

</head>
<body>
<header class="clearfix" class="description">

    <table cellpadding="0" cellspacing="0" class="billing">
        <tr>
            <td colspan="2"><h1><?php echo app('translator')->get('app.estimate'); ?></h1></td>
        </tr>
        <tr>
            <td id="invoiced_to">
                <div class="description">
                    <div>
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

                            <?php if($estimate->clientDetails->company_logo): ?>
                                <div class="client-logo-div">
                                    <img src="<?php echo e($estimate->clientDetails->image_url); ?>"
                                         alt="<?php echo e($estimate->clientDetails->company_name); ?>" class="client-logo"/>
                                </div>
                            <?php endif; ?>


                            <small><?php echo app('translator')->get("modules.invoices.billedTo"); ?>:</small>
                            <div class="mb-3">
                                <?php if($estimate->client && $estimate->client->name && $invoiceSetting->show_client_name == 'yes'): ?>
                                    <b><?php echo e($estimate->client->name_salutation); ?></b>
                                <?php endif; ?>
                                <?php if($estimate->client && $estimate->client->email && $invoiceSetting->show_client_email == 'yes'): ?>
                                    <div><?php echo e($estimate->client->email); ?></div>
                                <?php endif; ?>
                                <?php if($estimate->client && $estimate->client->mobile && $invoiceSetting->show_client_phone == 'yes'): ?>
                                    <div><?php echo e($estimate->client->mobile_with_phonecode); ?></div>
                                <?php endif; ?>
                                <?php if($estimate->clientDetails && $estimate->clientDetails->company_name && $invoiceSetting->show_client_company_name == 'yes'): ?>
                                    <div><?php echo e($estimate->clientDetails->company_name); ?></div>
                                <?php endif; ?>
                                <?php if($estimate->clientDetails && $estimate->clientDetails->address && $invoiceSetting->show_client_company_address == 'yes'): ?>
                                    <div><?php echo nl2br($estimate->clientDetails->address); ?></div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>

                        <?php if($invoiceSetting->show_gst == 'yes' && !is_null($estimate->client->clientDetails->gst_number)): ?>
                            <div> <?php echo app('translator')->get('app.gstIn'); ?>: <?php echo e($estimate->client->clientDetails->gst_number); ?> </div>
                        <?php endif; ?>

                    </div>
            </td>
            <td>
                <div id="company" class="description">
                    <div id="logo">
                        <img src="<?php echo e($invoiceSetting->logo_url); ?>" alt="home" class="dark-logo"/>
                    </div>
                    <small><?php echo app('translator')->get("modules.invoices.generatedBy"); ?>:</small>
                    <div><?php echo e($company->company_name); ?></div>
                    <?php if(!is_null($company)): ?>
                        <div><?php echo nl2br($company->defaultAddress->address); ?></div>
                        <div><?php echo e($company->company_phone); ?></div>
                    <?php endif; ?>
                    <?php if($invoiceSetting->show_gst == 'yes' && !is_null($invoiceSetting->gst_number)): ?>
                        <div><?php echo app('translator')->get('app.gstIn'); ?>: <?php echo e($invoiceSetting->gst_number); ?></div>
                    <?php endif; ?>
                </div>
            </td>
        </tr>
    </table>
</header>
<main>
    <div id="details">

        <div id="invoice" class="description">
            <h1><?php echo e($estimate->estimate_number); ?></h1>
        </div>

    </div>
    <?php if($estimate->description): ?>
        <div class="f-13 mb-3 description"><?php echo nl2br(pdfStripTags($estimate->description)); ?></div>
    <?php endif; ?>
    <table cellspacing="0" cellpadding="0" id="invoice-table">
        <thead>
        <tr>
            <th class="no">#</th>
            <th class="desc description"><?php echo app('translator')->get("modules.invoices.item"); ?></th>
            <?php if($invoiceSetting->hsn_sac_code_show): ?>
                <th class="qty description"><?php echo app('translator')->get("app.hsnSac"); ?></th>
            <?php endif; ?>
            <th class="qty description"><?php echo app('translator')->get('modules.invoices.qty'); ?></th>
            <th class="qty description"><?php echo app('translator')->get("modules.invoices.unitPrice"); ?></th>
            <th class="qty description"><?php echo app('translator')->get("modules.invoices.tax"); ?></th>
            <th class="unit description"><?php echo app('translator')->get("modules.invoices.price"); ?>
                (<?php echo htmlentities($estimate->currency->currency_code); ?>)
            </th>
        </tr>
        </thead>
        <tbody>
        <?php $count = 0; ?>
        <?php $__currentLoopData = $estimate->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($item->type == 'item'): ?>
                <tr style="page-break-inside: avoid;">
                    <td class="no"><?php echo e(++$count); ?></td>
                    <td class="desc" width="40%">
                        <div style="width: 280px !important" class="word-break">
                            <h3 class="description word-break"><?php echo e($item->item_name); ?></h3>
                            <?php if(!is_null($item->item_summary)): ?>
                                <div class="item-summary description word-break">
                                    <?php echo nl2br(pdfStripTags($item->item_summary)); ?>

                                </div>
                            <?php endif; ?>
                            <?php if($item->estimateItemImage): ?>
                                <p class="mt-2">
                                    <img src="<?php echo e($item->estimateItemImage->file_url); ?>" width="60" height="60"
                                         class="img-thumbnail">
                                </p>
                            <?php endif; ?>
                        </div>
                    </td>
                    <?php if($invoiceSetting->hsn_sac_code_show): ?>
                        <td class="qty"><h3><?php echo e($item->hsn_sac_code ? $item->hsn_sac_code : '--'); ?></h3></td>
                    <?php endif; ?>
                    <td class="qty"><h3><?php echo e($item->quantity); ?><?php if($item->unit): ?>
                                <br><span class="f-11 text-dark-grey"><?php echo e($item->unit->unit_type); ?></span>
                            <?php endif; ?></h3></td>
                    <td class="qty"><h3><?php echo e(currency_format($item->unit_price, $estimate->currency_id, false)); ?></h3>
                    </td>
                    <td><?php echo e($item->tax_list); ?></td>
                    <td class="unit"><?php echo e(currency_format($item->amount, $estimate->currency_id, false)); ?></td>
                </tr>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <tr style="page-break-inside: avoid;" class="subtotal">
            <td class="no">&nbsp;</td>
            <td class="qty">&nbsp;</td>
            <td class="qty">&nbsp;</td>
            <td class="qty">&nbsp;</td>
            <?php if($invoiceSetting->hsn_sac_code_show): ?>
                <td class="qty">&nbsp;</td>
            <?php endif; ?>
            <td class="desc"><?php echo app('translator')->get("modules.invoices.subTotal"); ?></td>
            <td class="unit"><?php echo e(currency_format($estimate->sub_total, $estimate->currency_id, false)); ?></td>
        </tr>
        <?php if($discount != 0 && $discount != ''): ?>
            <tr style="page-break-inside: avoid;" class="discount">
                <td class="no">&nbsp;</td>
                <td class="qty">&nbsp;</td>
                <td class="qty">&nbsp;</td>
                <td class="qty">&nbsp;</td>
                <?php if($invoiceSetting->hsn_sac_code_show): ?>
                    <td class="qty">&nbsp;</td>
                <?php endif; ?>
                <td class="desc"><?php echo app('translator')->get("modules.invoices.discount"); ?></td>
                <td class="unit"><?php echo e(currency_format($discount, $estimate->currency_id, false)); ?></td>
            </tr>
        <?php endif; ?>
        <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr style="page-break-inside: avoid;" class="tax">
                <td class="no">&nbsp;</td>
                <td class="qty">&nbsp;</td>
                <td class="qty">&nbsp;</td>
                <td class="qty">&nbsp;</td>
                <?php if($invoiceSetting->hsn_sac_code_show): ?>
                    <td class="qty">&nbsp;</td>
                <?php endif; ?>
                <td class="desc"><?php echo e($key); ?></td>
                <td class="unit"><?php echo e(currency_format($tax, $estimate->currency_id, false)); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
        <tfoot>
        <tr dontbreak="true">
            <td colspan="5"><?php echo app('translator')->get("modules.invoices.total"); ?></td>
            <td style="text-align: center"><?php echo e(currency_format($estimate->total, $estimate->currency_id, false)); ?> <?php echo htmlentities($estimate->currency->currency_code); ?></td>
        </tr>
        </tfoot>
    </table>
    <p id="notes" class="word-break description">
        <?php if(!is_null($estimate->note)): ?>
            <?php echo app('translator')->get('app.note'); ?>
            <br>
            <?php echo nl2br($estimate->note); ?><br>
        <?php endif; ?>
        <br><?php echo app('translator')->get('modules.invoiceSettings.invoiceTerms'); ?>
        <br>
        <?php echo nl2br($invoiceSetting->invoice_terms); ?>

    </p>

    <?php if(isset($invoiceSetting->other_info)): ?>
        <p id="notes" class="word-break description">
            <?php echo nl2br($invoiceSetting->other_info); ?>

        </p>
    <?php endif; ?>

    <?php if(isset($taxes) && $invoiceSetting->tax_calculation_msg == 1): ?>
        <p class="text-dark-grey description">
            <?php if($estimate->calculate_tax == 'after_discount'): ?>
                <?php echo app('translator')->get('messages.calculateTaxAfterDiscount'); ?>
            <?php else: ?>
                <?php echo app('translator')->get('messages.calculateTaxBeforeDiscount'); ?>
            <?php endif; ?>
        </p>
    <?php endif; ?>
    <div class="notes">
        <?php if($estimate->sign): ?>
            <h5 style="margin-bottom: 20px;"><?php echo app('translator')->get('app.signature'); ?></h5>
            <img src="<?php echo e($estimate->sign->signature); ?>" style="height: 75px;">
            <p>(<?php echo e($estimate->sign->full_name); ?>)</p>
        <?php endif; ?>
    </div>
    
    <?php if(isset($fields) && count($fields) > 0): ?>
        <div class="page_break"></div>
        <h3 class="box-title m-t-20 text-center h3-border "> <?php echo app('translator')->get('modules.projects.otherInfo'); ?></h3>
        <table style="background: none" border="0" cellspacing="0" cellpadding="0" width="100%">
            <?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td style="text-align: left;background: none;">
                        <div class="desc"><?php echo e($field->label); ?> </div>
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
    <?php endif; ?>
</main>
</body>
</html>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/estimates/pdf/invoice-1.blade.php ENDPATH**/ ?>