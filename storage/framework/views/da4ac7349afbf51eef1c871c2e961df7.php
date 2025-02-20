<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?php echo app('translator')->get('app.invoice'); ?></title>
    <?php if ($__env->exists('invoices.pdf.invoice_pdf_css')) echo $__env->make('invoices.pdf.invoice_pdf_css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <style>
        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }

        a {
            color: #0087C3;
            text-decoration: none;
        }

        body {
            position: relative;
            width: 100%;
            height: auto;
            margin: 0 auto;
            color: #555555;
            background: #FFFFFF;
            font-size: 14px;
            font-family: Verdana, Arial, Helvetica, sans-serif;
        }

        h2 {
            font-weight: normal;
        }

        header {
            padding: 10px 0;
            margin-bottom: 20px;
            border-bottom: 1px solid #AAAAAA;
        }

        #logo {
            float: left;
            margin-top: 11px;
        }

        #logo img {
            height: 55px;
            margin-bottom: 15px;
        }

        #company {}

        #details {
            margin-bottom: 50px;
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

        #invoice {}

        #invoice h1 {
            color: #0087C3;
            font-size: 2.4em;
            line-height: 1em;
            font-weight: normal;
            margin: 0 0 10px 0;
        }

        #invoice .date {
            font-size: 1.1em;
            color: #777777;
        }

        table {
            width: 100%;
            border-spacing: 0;
            margin-bottom: 20px;
        }

        table th,
        table td {
            padding: 5px 10px 7px 10px;
            background: #EEEEEE;
            text-align: center;
            border-bottom: 1px solid #FFFFFF;
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
            color: #57B223;
            font-size: 1.2em;
            font-weight: normal;
            margin: 0 0 0 0;
        }

        table .no {
            color: #FFFFFF;
            font-size: 1.6em;
            background: #57B223;
            width: 10%;
        }

        table .desc {
            text-align: left;
        }

        table .unit {
            background: #DDDDDD;
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
            color: #fff;
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
            color: #1BA39C;
        }

        table tr.discount .desc {
            text-align: right;
            color: #E43A45;
        }

        table tr.subtotal .desc {
            text-align: right;
            color: #1d0707;
        }

        table tbody tr:last-child td {
            border: none;
        }

        table tfoot td {
            padding: 10px 10px 20px 10px;
            background: #FFFFFF;
            border-bottom: none;
            font-size: 1.2em;
            white-space: nowrap;
            border-bottom: 1px solid #AAAAAA;
        }

        table tfoot tr:first-child td {
            border-top: none;
        }

        table tfoot tr td:first-child {
            border: none;
        }

        #thanks {
            font-size: 2em;
            margin-bottom: 50px;
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
            border-top: 1px solid #AAAAAA;
            padding: 8px 0;
            text-align: center;
        }

        table.billing td {
            background-color: #fff;
        }

        table td div#invoiced_to {
            text-align: left;
        }

        #notes {
            color: #767676;
            font-size: 11px;
        }

        .item-summary {
            font-size: 12px
        }

        .mb-3 {
            margin-bottom: 1rem;
        }

        .logo {
            text-align: right;
        }

        .logo img {
            max-width: 150px !important;
        }

        .word-break {
            word-wrap: break-word;
            word-break: break-all;
        }
    </style>
</head>

<body>
    <header class="clearfix">

        <table cellpadding="0" cellspacing="0" class="billing">
            <tr>
                <td>
                    <div id="invoiced_to">
                        <?php if($invoice->project && $invoice->project->client && $invoice->project->client->clientDetails && ($invoice->project->client->name || $invoice->project->client->email || $invoice->project->client->mobile || $invoice->project->client->clientDetails->company_name || $invoice->project->client->clientDetails->address) && ($invoiceSetting->show_client_name == 'yes' || $invoiceSetting->show_client_email == 'yes' || $invoiceSetting->show_client_phone == 'yes' || $invoiceSetting->show_client_company_name == 'yes' || $invoiceSetting->show_client_company_address == 'yes')): ?>

                            <small><?php echo app('translator')->get('modules.invoices.billedTo'); ?>:</small>

                            <?php if($invoice->project->client->name && $invoiceSetting->show_client_name == 'yes'): ?>
                                <h3 class="name"><?php echo e($invoice->project->client->name_salutation); ?></h3>
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
                                <h3 class="name">
                                    <?php echo e($invoice->project->client->clientDetails->company_name); ?></h3>
                            <?php endif; ?>

                            <?php if($invoice->project->client->clientDetails->address && $invoiceSetting->show_client_company_address == 'yes'): ?>
                                <div class="mb-3">
                                    <b><?php echo app('translator')->get('app.address'); ?></b>
                                    <div><?php echo nl2br($invoice->project->clientDetails->address); ?></div>
                                </div>
                            <?php endif; ?>

                            <?php if($invoice->show_shipping_address === 'yes'): ?>
                                <div>
                                    <b><?php echo app('translator')->get('app.shippingAddress'); ?> :</b>
                                    <div><?php echo nl2br($invoice->project->clientDetails->shipping_address); ?></div>
                                </div>
                            <?php endif; ?>

                            <?php if($invoiceSetting->show_gst == 'yes' && !is_null($invoice->project->client->clientDetails->gst_number)): ?>
                                <div> <?php echo app('translator')->get('app.gstIn'); ?>: <?php echo e($invoice->project->client->clientDetails->gst_number); ?>

                                </div>
                            <?php endif; ?>
                        <?php elseif($invoice->client && $invoice->clientDetails && ($invoice->client->name || $invoice->client->email || $invoice->client->mobile || $invoice->clientDetails->company_name || $invoice->clientDetails->address) && ($invoiceSetting->show_client_name == 'yes' || $invoiceSetting->show_client_email == 'yes' || $invoiceSetting->show_client_phone == 'yes' || $invoiceSetting->show_client_company_name == 'yes' || $invoiceSetting->show_client_company_address == 'yes')): ?>
                            <small><?php echo app('translator')->get('modules.invoices.billedTo'); ?>:</small>

                            <?php if($invoice->client->name && $invoiceSetting->show_client_name == 'yes'): ?>
                                <h3 class="name"><?php echo e($invoice->client->name_salutation); ?></h3>
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
                                <h3 class="name"><?php echo e($invoice->clientDetails->company_name); ?></h3>
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

                            <?php if($invoiceSetting->show_gst == 'yes' && !is_null($invoice->clientDetails->gst_number)): ?>
                                <div> <?php echo app('translator')->get('app.gstIn'); ?>: <?php echo e($invoice->clientDetails->gst_number); ?> </div>
                            <?php endif; ?>
                        <?php endif; ?>

                        <?php if(is_null($invoice->project) && $invoice->estimate && $invoice->estimate->client && $invoice->estimate->client->clientDetails && ($invoiceSetting->show_client_name == 'yes' || $invoiceSetting->show_client_email == 'yes' || $invoiceSetting->show_client_phone == 'yes' || $invoiceSetting->show_client_company_name == 'yes' || $invoiceSetting->show_client_company_address == 'yes')): ?>
                            <small><?php echo app('translator')->get('modules.invoices.billedTo'); ?>:</small>
                            <?php if($invoice->estimate->client->name && $invoiceSetting->show_client_name == 'yes'): ?>
                                <h3 class="name"><?php echo e($invoice->estimate->client->name_salutation); ?></h3>
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
                                <h3 class="name">
                                    <?php echo e($invoice->estimate->client->clientDetails->company_name); ?></h3>
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
                                <div> <?php echo app('translator')->get('app.gstIn'); ?>: <?php echo e($invoice->estimate->client->clientDetails->gst_number); ?>

                                </div>
                            <?php endif; ?>
                        <?php endif; ?>

                        <?php if(($invoiceSetting->show_project == 1) && (isset($invoice->project->project_name))): ?>
                                <small><?php echo app('translator')->get('modules.invoices.projectName'); ?></small><br>
                                <?php echo e($invoice->project->project_name); ?>

                        <?php endif; ?>
                    </div>
                </td>
                <td>
                    <div id="company">
                        <div class="logo">
                            <img src="<?php echo e($invoiceSetting->logo_url); ?>" alt="home" class="dark-logo" />
                        </div>
                        <small><?php echo app('translator')->get('modules.invoices.generatedBy'); ?>:</small>
                        <h3 class="name"><?php echo e($company->company_name); ?></h3>
                        <?php if(!is_null($company)): ?>
                            <div><?php echo nl2br($defaultAddress->address); ?></div>
                            <div><?php echo e($company->company_phone); ?></div>
                        <?php endif; ?>
                        <?php if($invoiceSetting->show_gst == 'yes' && $invoice->address): ?>
                            <div><?php echo e($invoice->address->tax_name); ?>: <?php echo e($invoice->address->tax_number); ?></div>
                        <?php endif; ?>
                    </div>
                </td>
            </tr>
        </table>
    </header>
    <main>
        <div id="details" class="clearfix">

            <div id="invoice">
                <h1><?php echo e($invoice->invoice_number); ?></h1>
                <?php if($creditNote): ?>
                    <div class=""><?php echo app('translator')->get('app.credit-note'); ?>: <?php echo e($creditNote->cn_number); ?></div>
                <?php endif; ?>
                <div class="date"><?php echo app('translator')->get('app.issuesDate'); ?>:
                    <?php echo e($invoice->issue_date->translatedFormat($company->date_format)); ?></div>
                <?php if($invoice->status === 'unpaid'): ?>
                    <div class="date"><?php echo app('translator')->get('app.dueDate'); ?>:
                        <?php echo e($invoice->due_date->translatedFormat($company->date_format)); ?></div>
                <?php endif; ?>
                <div class=""><?php echo app('translator')->get('app.status'); ?>: <?php echo e($invoice->status); ?></div>
            </div>

        </div>
        <table border="0" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th class="no">#</th>
                    <th class="desc"><?php echo app('translator')->get('modules.invoices.item'); ?></th>
                    <th class="qty"><?php echo app('translator')->get('modules.invoices.qty'); ?></th>
                    <th class="qty"><?php echo app('translator')->get('modules.invoices.unitPrice'); ?> (<?php echo htmlentities($invoice->currency->currency_code); ?>)</th>
                    <th class="unit"><?php echo app('translator')->get('modules.invoices.price'); ?> (<?php echo htmlentities($invoice->currency->currency_code); ?>)</th>
                </tr>
            </thead>
            <tbody>
                <?php $count = 0; ?>
                <?php $__currentLoopData = $invoice->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($item->type == 'item'): ?>
                        <tr style="page-break-inside: avoid;">
                            <td class="no"><?php echo e(++$count); ?></td>
                            <td class="desc">
                                <h3 class="word-break"><?php echo e($item->item_name); ?></h3>
                                <?php if(!is_null($item->item_summary)): ?>
                                    <p class="item-summary word-break"><?php echo nl2br(pdfStripTags($item->item_summary)); ?></p>
                                <?php endif; ?>
                            </td>
                            <td class="qty">
                                <h3><?php echo e($item->quantity); ?></h3>
                            </td>
                            <td class="qty">
                                <h3><?php echo e(number_format((float) $item->unit_price, 2, '.', '')); ?></h3>
                            </td>
                            <td class="unit"><?php echo e(number_format((float) $item->amount, 2, '.', '')); ?></td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tr style="page-break-inside: avoid;" class="subtotal">
                    <td class="no">&nbsp;</td>
                    <td class="qty">&nbsp;</td>
                    <td class="qty">&nbsp;</td>
                    <td class="desc"><?php echo app('translator')->get('modules.invoices.subTotal'); ?></td>
                    <td class="unit"><?php echo e(number_format((float) $invoice->sub_total, 2, '.', '')); ?></td>
                </tr>
                <?php if($discount != 0 && $discount != ''): ?>
                    <tr style="page-break-inside: avoid;" class="discount">
                        <td class="no">&nbsp;</td>
                        <td class="qty">&nbsp;</td>
                        <td class="qty">&nbsp;</td>
                        <td class="desc"><?php echo app('translator')->get('modules.invoices.discount'); ?></td>
                        <td class="unit"><?php echo e(number_format((float) $discount, 2, '.', '')); ?></td>
                    </tr>
                <?php endif; ?>
                <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr style="page-break-inside: avoid;" class="tax">
                        <td class="no">&nbsp;</td>
                        <td class="qty">&nbsp;</td>
                        <td class="qty">&nbsp;</td>
                        <td class="desc"><?php echo e($key); ?></td>
                        <td class="unit"><?php echo e(number_format((float) $tax, 2, '.', '')); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
            <tfoot>
                <tr dontbreak="true">
                    <td colspan="4"><?php echo app('translator')->get('modules.invoices.total'); ?></td>
                    <td style="text-align: center"><?php echo e(number_format((float) $invoice->total, 2, '.', '')); ?></td>
                </tr>
                <?php if($invoice->appliedCredits() > 0): ?>
                    <tr dontbreak="true">
                        <td colspan="4"><?php echo app('translator')->get('modules.invoices.appliedCredits'); ?></td>
                        <td style="text-align: center">
                            <?php echo e(number_format((float) $invoice->appliedCredits(), 2, '.', '')); ?></td>
                    </tr>
                <?php endif; ?>
                <tr dontbreak="true">
                    <td colspan="4"><?php echo app('translator')->get('app.totalPaid'); ?></td>
                    <td style="text-align: center"><?php echo e(number_format((float) $invoice->getPaidAmount(), 2, '.', '')); ?>

                    </td>
                </tr>
                <tr dontbreak="true">
                    <td colspan="4"><?php echo app('translator')->get('app.totalDue'); ?></td>
                    <td style="text-align: center"><?php echo e(number_format((float) $invoice->amountDue(), 2, '.', '')); ?>

                    </td>
                </tr>
            </tfoot>
        </table>
        <p>&nbsp;</p>
        <hr>
        <p id="notes">
            <?php if(!is_null($invoice->note)): ?>
                <?php echo app('translator')->get('app.note'); ?> <br><?php echo nl2br($invoice->note); ?><br>
            <?php endif; ?>
            <?php if($invoice->status == 'unpaid'): ?>
                <?php echo app('translator')->get('modules.invoiceSettings.invoiceTerms'); ?> <br><?php echo nl2br($invoiceSetting->invoice_terms); ?>

            <?php endif; ?>
            <?php if(isset($invoiceSetting->other_info)): ?>
                <br><?php echo nl2br($invoiceSetting->other_info); ?>

            <?php endif; ?>
        </p>

    </main>
</body>

</html>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/invoices/pdf/invoice-recurring.blade.php ENDPATH**/ ?>