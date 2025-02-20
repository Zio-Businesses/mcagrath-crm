<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title><?php echo app('translator')->get('app.proposal'); ?></title>
    <?php if ($__env->exists('invoices.pdf.invoice_pdf_css')) echo $__env->make('invoices.pdf.invoice_pdf_css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <style>
        body {
            position: relative;
            width: 100%;
            height: auto;
            margin: 0 auto;
            color: #555555;
            background: #FFFFFF;
            font-size: 13px;
            /* font-family: Verdana, Arial, Helvetica, sans-serif; */
        }

        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }

        a {
            text-decoration: none;
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

        table .desc, table .item-summary {
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
<header class="description clearfix">

    <table cellpadding="0" cellspacing="0" class="billing">
        <tr>
            <td colspan="2"><h1><?php echo app('translator')->get('app.proposal'); ?></h1></td>
        </tr>
        <tr>
            <td id="invoiced_to">
                <?php if($proposal->lead->contact && ($proposal->lead->contact->client_name || $proposal->lead->contact->client_email || $proposal->lead->contact->mobile || $proposal->lead->contact->company_name || $proposal->lead->contact->address) && ($invoiceSetting->show_client_name == 'yes' || $invoiceSetting->show_client_email == 'yes' || $invoiceSetting->show_client_phone == 'yes' || $invoiceSetting->show_client_company_name == 'yes' || $invoiceSetting->show_client_company_address == 'yes')): ?>
                    <div>
                        <small><?php echo app('translator')->get("modules.invoices.billedTo"); ?>:</small>
                        <div class="mb-3 description">
                            <?php if($proposal->deal && !empty($proposal->deal->name)): ?>
                                <div><?php echo e($proposal->deal->name); ?></div>
                            <?php endif; ?>
                            <?php if($proposal->lead->contact && $proposal->lead->contact->client_name && $invoiceSetting->show_client_name == 'yes'): ?>
                                <b><?php echo e($proposal->lead->contact->client_name_salutation); ?></b>
                            <?php endif; ?>
                            <?php if($proposal->lead && $proposal->lead->contact->client_email && $invoiceSetting->show_client_email == 'yes'): ?>
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
                    </div>
                <?php endif; ?>
            </td>
            <td>
                <div id="company" class="description">
                    <div id="logo">
                        <img src="<?php echo e($invoiceSetting->logo_url); ?>" alt="home" class="dark-logo"/>
                    </div>
                    <small><?php echo app('translator')->get("modules.invoices.generatedBy"); ?>:</small>
                    <div id="logo" class="description">
                        <h3 class="name"><?php echo e($company->company_name); ?></h3>
                        <?php if(!is_null($company)): ?>
                            <div><?php echo nl2br($company->defaultAddress->address); ?></div>
                            <div><?php echo e($company->company_phone); ?></div>
                        <?php endif; ?>
                        <?php if($invoiceSetting->show_gst == 'yes' && !is_null($invoiceSetting->gst_number)): ?>
                            <div class="description"><?php echo app('translator')->get('app.gstIn'); ?>: <?php echo e($invoiceSetting->gst_number); ?></div>
                        <?php endif; ?>
                    </div>
                </div>
            </td>
        </tr>
    </table>
</header>
<main>
    <div id="details">

        <div id="invoice" class="description">
            <h1 class="description"><?php echo app('translator')->get('modules.lead.proposal'); ?>#<?php echo e($proposal->id); ?></h1>
            <div class="description"><?php echo app('translator')->get('app.status'); ?>: <?php echo e($proposal->status); ?></div>
            <div class="description"><?php echo app('translator')->get('modules.estimates.validTill'); ?>:
                <?php echo e($proposal->valid_till->translatedFormat($company->date_format)); ?></div>
        </div>

    </div>
    <?php if($proposal->description): ?>
        <div class="description">
            <?php echo pdfStripTags($proposal->description); ?>

        </div>
    <?php endif; ?>

    <?php if(count($proposal->items) > 0): ?>
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
                    (<?php echo htmlentities($proposal->currency->currency_code); ?>)
                </th>
            </tr>
            </thead>
            <tbody>
                <?php $count = 0; ?>
            <?php $__currentLoopData = $proposal->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($item->type == 'item'): ?>
                    <tr style="page-break-inside: avoid;">
                        <td class="no"><?php echo e(++$count); ?></td>
                        <td class="desc">
                            <h3 class="description word-break"><?php echo e($item->item_name); ?></h3>
                            <?php if(!is_null($item->item_summary)): ?>
                                <table>
                                    <tr>
                                        <td class="item-summary word-break border-top-0 border-right-0 border-left-0 border-bottom-0 description"><?php echo nl2br(pdfStripTags($item->item_summary)); ?></td>
                                    </tr>
                                </table>
                            <?php endif; ?>
                            <?php if($item->proposalItemImage): ?>
                                <p class="mt-2">
                                    <img src="<?php echo e($item->proposalItemImage->file_url); ?>" width="60" height="60"
                                         class="img-thumbnail"/>
                                </p>
                            <?php endif; ?>
                        </td>
                        <?php if($invoiceSetting->hsn_sac_code_show): ?>
                            <td class="qty">
                                <h3><?php echo e($item->hsn_sac_code ?  : '--'); ?></h3>
                            </td>
                        <?php endif; ?>
                        <td class="qty">
                            <h3><?php echo e($item->quantity); ?><?php if($item->unit): ?><br><span
                                    class="f-11 text-dark-grey"><?php echo e($item->unit->unit_type); ?></span><?php endif; ?></span></h3>
                        </td>
                        <td class="qty">
                            <h3><?php echo e(currency_format($item->unit_price, $proposal->currency_id, false)); ?></h3>
                        </td>
                        <td>
                            <?php echo e($item->tax_list); ?>

                        </td>
                        <td class="unit"><?php echo e(currency_format($item->amount, $proposal->currency_id, false)); ?></td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <tr style="page-break-inside: avoid;" class="subtotal">
                <td class="no">&nbsp;</td>
                <td class="qty">&nbsp;</td>
                <td class="qty">&nbsp;</td>
                <?php if($invoiceSetting->hsn_sac_code_show): ?>
                    <td class="qty">&nbsp;</td>
                <?php endif; ?>
                <td class="qty">&nbsp;</td>
                <td class="desc"><?php echo app('translator')->get("modules.invoices.subTotal"); ?></td>
                <td class="unit"><?php echo e(currency_format($proposal->sub_total, $proposal->currency_id, false)); ?></td>
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
                    <td class="unit"><?php echo e(currency_format($discount, $proposal->currency_id, false)); ?></td>
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
                    <td class="unit"><?php echo e(currency_format($tax, $proposal->currency_id, false)); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
            <tfoot>
            <tr dontbreak="true">
                <td colspan="<?php echo e($invoiceSetting->hsn_sac_code_show ? '6' : '5'); ?>">
                    <?php echo app('translator')->get("modules.invoices.subTotal"); ?></td>
                <td style="text-align: center"><?php echo e(currency_format($proposal->sub_total, $proposal->currency_id, false)); ?></td>
            </tr>
            <tr dontbreak="true">
                <td colspan="<?php echo e($invoiceSetting->hsn_sac_code_show ? '6' : '5'); ?>">
                    <?php echo app('translator')->get("modules.invoices.discount"); ?></td>
                <td style="text-align: center"><?php echo e(currency_format($discount, $proposal->currency_id, false)); ?></td>
            </tr>
            <tr dontbreak="true">
                <td colspan="<?php echo e($invoiceSetting->hsn_sac_code_show ? '6' : '5'); ?>">
                    <?php echo app('translator')->get("modules.invoices.total"); ?></td>
                <td style="text-align: center"><?php echo e(currency_format($proposal->total, $proposal->currency_id, false)); ?> <?php echo htmlentities($proposal->currency->currency_code); ?></td>
            </tr>
            </tfoot>
        </table>


        <p id="notes" class="word-break description">
            <?php if(!is_null($proposal->note)): ?>
                <?php echo app('translator')->get('app.note'); ?> <br><?php echo nl2br($proposal->note); ?><br>
            <?php endif; ?>
            <br><?php echo app('translator')->get('modules.invoiceSettings.invoiceTerms'); ?> <br><?php echo nl2br($invoiceSetting->invoice_terms); ?>

        </p>

        <?php if(isset($invoiceSetting->other_info)): ?>
            <p id="notes" class="word-break description">
                <?php echo nl2br($invoiceSetting->other_info); ?>

            </p>
        <?php endif; ?>

        <?php if(isset($taxes) && $invoiceSetting->tax_calculation_msg == 1): ?>
            <p class="text-dark-grey description">
                <?php if($proposal->calculate_tax == 'after_discount'): ?>
                    <?php echo app('translator')->get('messages.calculateTaxAfterDiscount'); ?>
                <?php else: ?>
                    <?php echo app('translator')->get('messages.calculateTaxBeforeDiscount'); ?>
                <?php endif; ?>
            </p>
        <?php endif; ?>

        <?php if($proposal->signature): ?>
            <br>
            <span>
                <?php if(!is_null($proposal->signature->signature)): ?>
                    <img src="<?php echo e($proposal->signature->signature); ?>" style="width: 200px;" alt="Signature">
                    <h6 class="description"><?php echo app('translator')->get('modules.estimates.signature'); ?></h6>
                <?php else: ?>
                    <h6><?php echo app('translator')->get('modules.estimates.signedBy'); ?></h6>
                <?php endif; ?>
                <p class="description">(<?php echo e($proposal->signature->full_name); ?>)</p>
            </span>
        <?php endif; ?>

    <?php endif; ?>
</main>
</body>

</html>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/proposals/pdf/invoice-1.blade.php ENDPATH**/ ?>