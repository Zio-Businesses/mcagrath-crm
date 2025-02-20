<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Template CSS -->
    <title><?php echo app('translator')->get('modules.lead.proposal'); ?> - <?php echo e($proposal->id); ?></title>
    <?php if ($__env->exists('invoices.pdf.invoice_pdf_css')) echo $__env->make('invoices.pdf.invoice_pdf_css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo e($company->favicon_url); ?>">
    <meta name="theme-color" content="#ffffff">

    <?php if($invoiceSetting->locale == 'ru'): ?>
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
                /* font-family: Verdana, Arial, Helvetica, sans-serif; */
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

        .f-12 {
            font-size: 12px;
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

        .description {
            line-height: 12px;
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
            width: 100px;
            text-align: center;
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
            border-right: 0;
            border-left: 0;
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

        .word-break {
            max-width: 175px;
            word-wrap: break-word;
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

        .word-break {
            word-wrap: break-word;
            word-break: break-all;
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

<body class="content-wrapper">
<table class="bg-white" border="0" cellpadding="0" cellspacing="0" width="100%" role="presentation">
    <tbody>
    <!-- Table Row Start -->
    <tr>
        <td><img src="<?php echo e($invoiceSetting->logo_url); ?>" alt="<?php echo e($company->company_name); ?>"
                 id="logo"/></td>
        <td align="right" class="f-21 text-black font-weight-700 text-uppercase"><?php echo app('translator')->get('modules.lead.proposal'); ?>
        </td>
    </tr>
    <!-- Table Row End -->
    <!-- Table Row Start -->
    <tr>
        <td>
            <p class="line-height mt-1 mb-0 f-14 text-black description">
                <?php echo e($company->company_name); ?><br>
                <?php if(!is_null($company)): ?>
                    <?php echo nl2br($company->defaultAddress->address); ?><br>
                    <?php echo e($company->company_phone); ?>

                <?php endif; ?>
                <?php if($invoiceSetting->show_gst == 'yes' && !is_null($invoiceSetting->gst_number)): ?>
                    <br><?php echo app('translator')->get('app.gstIn'); ?>: <?php echo e($invoiceSetting->gst_number); ?>

                <?php endif; ?>
            </p>
        </td>
        <td>
            <table class="text-black mt-1 f-13 b-collapse rightaligned">
                <tr>
                    <td class="heading-table-left"><?php echo app('translator')->get('modules.lead.proposal'); ?></td>
                    <td class="heading-table-right">#<?php echo e($proposal->id); ?></td>
                </tr>
                <tr>
                    <td class="heading-table-left"><?php echo app('translator')->get('modules.estimates.validTill'); ?></td>
                    <td class="heading-table-right"><?php echo e($proposal->valid_till->translatedFormat($company->date_format)); ?>

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
            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td class="f-14 text-black">
                        <?php if($proposal->lead->contact && ($proposal->lead->contact->client_name || $proposal->lead->contact->client_email || $proposal->lead->contact->mobile || $proposal->lead->contact->company_name || $proposal->lead->contact->address) && ($invoiceSetting->show_client_name == 'yes' || $invoiceSetting->show_client_email == 'yes' || $invoiceSetting->show_client_phone == 'yes' || $invoiceSetting->show_client_company_name == 'yes' || $invoiceSetting->show_client_company_address == 'yes')): ?>
                            <p class="line-height mb-0">
                                <span class="text-grey text-capitalize"><?php echo app('translator')->get("modules.invoices.billedTo"); ?></span><br>
                                <?php if($proposal->deal && !empty($proposal->deal->name)): ?>
                                    <?php echo e($proposal->deal->name); ?><br>
                                <?php endif; ?>
                                <?php if($proposal->lead->contact && $proposal->lead->contact->client_name && $invoiceSetting->show_client_name == 'yes'): ?>
                                    <?php echo e($proposal->lead->contact->client_name_salutation); ?><br>
                                <?php endif; ?>
                                <?php if($proposal->lead->contact && $proposal->lead->contact->client_email && $invoiceSetting->show_client_email == 'yes'): ?>
                                    <?php echo e($proposal->lead->contact->client_email); ?><br>
                                <?php endif; ?>
                                <?php if($proposal->lead->contact && $proposal->lead->contact->mobile && $invoiceSetting->show_client_phone == 'yes'): ?>
                                    <?php echo e($proposal->lead->contact->mobile); ?><br>
                                <?php endif; ?>
                                <?php if($proposal->lead->contact && $proposal->lead->contact->company_name && $invoiceSetting->show_client_company_name == 'yes'): ?>
                                    <?php echo e($proposal->lead->contact->company_name); ?><br>
                                <?php endif; ?>
                                <?php if($proposal->lead->contact && $proposal->lead->contact->address && $invoiceSetting->show_client_company_address == 'yes'): ?>
                                    <?php echo nl2br($proposal->lead->contact->address); ?>

                                <?php endif; ?>
                            </p>
                        <?php endif; ?>
                    </td>

                    <td align="right">
                        <div class="text-uppercase bg-white unpaid rightaligned">
                            <?php echo app('translator')->get('modules.proposal.'. $proposal->status); ?></div>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td height="20"></td>
    </tr>
    </tbody>
</table>

<?php if($proposal->description): ?>
    <div class="f-13 description"><?php echo pdfStripTags($proposal->description); ?></div>
<?php endif; ?>

<?php if(count($proposal->items) > 0): ?>
    <table width="100%" class="f-14 b-collapse">
        <tr>
            <td height="10" colspan="<?php echo e($invoiceSetting->hsn_sac_code_show ? '6' : '5'); ?>"></td>
        </tr>
        <!-- Table Row Start -->
        <tr class="main-table-heading text-grey">
            <td width="40%"><?php echo app('translator')->get('app.description'); ?></td>
            <?php if($invoiceSetting->hsn_sac_code_show): ?>
                <td align="right" width="10%"><?php echo app('translator')->get("app.hsnSac"); ?></td>
            <?php endif; ?>
            <td align="right" width="10%"><?php echo app('translator')->get('modules.invoices.qty'); ?></td>
            <td align="right"><?php echo app('translator')->get("modules.invoices.unitPrice"); ?></td>
            <td align="right"><?php echo app('translator')->get("modules.invoices.tax"); ?></td>
            <td align="right"
                width="<?php echo e($invoiceSetting->hsn_sac_code_show ? '17%' : '20%'); ?>"><?php echo app('translator')->get("modules.invoices.amount"); ?>
                (<?php echo e($proposal->currency->currency_code); ?>)
            </td>
        </tr>
        <!-- Table Row End -->
        <?php $__currentLoopData = $proposal->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($item->type == 'item'): ?>
                <!-- Table Row Start -->
                <tr class="main-table-items text-black">
                    <td width="40%" class="description word-break"><?php echo e($item->item_name); ?></td>
                    <?php if($invoiceSetting->hsn_sac_code_show): ?>
                        <td align="right" class="border-bottom-0"
                            width="10%"><?php echo e($item->hsn_sac_code ?  : '--'); ?></td>
                    <?php endif; ?>
                    <td align="right" class="border-bottom-0" width="10%"><?php echo e($item->quantity); ?><br><span
                            class="f-11 text-grey"><?php echo e($item->unit->unit_type); ?></td>
                    <td align="right"
                        class="border-bottom-0"><?php echo e(currency_format($item->unit_price, $proposal->currency_id, false)); ?></td>
                    <td align="right" class="border-bottom-0"><?php echo e($item->tax_list); ?></td>
                    <td align="right"
                        class="border-bottom-0"><?php echo e(currency_format($item->amount, $proposal->currency_id, false)); ?></td>
                </tr>
                <?php if($item->item_summary != '' || $item->proposalItemImage): ?>
                    <tr class="main-table-items text-black">
                        <td class="f-13 text-black description word-break" colspan="<?php echo e($invoiceSetting->hsn_sac_code_show ? '6' : '5'); ?>">
                            <?php echo nl2br(pdfStripTags($item->item_summary)); ?>

                            <?php if($item->proposalItemImage): ?>
                                <p class="mt-2 description">
                                    <img src="<?php echo e($item->proposalItemImage->file_url); ?>" width="60" height="60"
                                        class="img-thumbnail">
                                </p>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endif; ?>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>

    <table class="bg-white" border="0" cellpadding="0" cellspacing="0" width="100%" role="presentation">

        <!-- Table Row Start -->
        <tr>
            <td class="total-box" align="right" colspan="<?php echo e($invoiceSetting->hsn_sac_code_show ? '5' : '4'); ?>">
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
                            <?php echo e(currency_format($proposal->sub_total, $proposal->currency_id, false)); ?></td>
                    </tr>
                    <!-- Table Row End -->
                    <?php if($discount != 0 && $discount != ''): ?>
                        <!-- Table Row Start -->
                        <tr align="right" class="text-grey">
                            <td class="subtotal-amt">
                                <?php echo e(currency_format($discount, $proposal->currency_id, false)); ?></td>
                        </tr>
                        <!-- Table Row End -->
                    <?php endif; ?>
                    <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <!-- Table Row Start -->
                        <tr align="right" class="text-grey">
                            <td class="subtotal-amt"><?php echo e(currency_format($tax, $proposal->currency_id, false)); ?>

                            </td>
                        </tr>
                        <!-- Table Row End -->
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <!-- Table Row Start -->
                    <tr align="right" class="balance text-black">
                        <td class="balance-right">
                            <?php echo e(currency_format($proposal->total, $proposal->currency_id, false)); ?>

                            <?php echo e($proposal->currency->currency_code); ?></td>
                    </tr>
                    <!-- Table Row End -->

                </table>
            </td>
        </tr>

        <!-- Table Row End -->
    </table>
    <table class="bg-white" border="0" cellpadding="0" cellspacing="0" width="100%" role="presentation">
        <tbody>
        <!-- Table Row Start -->
        <tr>
            <td height="10"></td>
        </tr>
        <?php if($proposal->note != ''): ?>
            <tr>
                <td height="10"></td>
            </tr>
            <tr>
                <td class="f-11"><?php echo app('translator')->get('app.note'); ?></td>
            </tr>
            <!-- Table Row End -->
            <!-- Table Row Start -->
            <tr class="text-grey">
                <td class="f-11 line-height word-break"><?php echo $proposal->note ? nl2br($proposal->note) : '--'; ?></td>
            </tr>
        <?php endif; ?>
        <!-- Table Row End -->
        <?php if(isset($taxes) && $invoiceSetting->tax_calculation_msg == 1): ?>
            <!-- Table Row Start -->
            <tr class="text-grey">
                <td width="100%" class="f-11 line-height">
                    <p class="text-dark-grey">
                        <?php if($proposal->calculate_tax == 'after_discount'): ?>
                            <?php echo app('translator')->get('messages.calculateTaxAfterDiscount'); ?>
                        <?php else: ?>
                            <?php echo app('translator')->get('messages.calculateTaxBeforeDiscount'); ?>
                        <?php endif; ?>
                    </p>
                </td>
            </tr>
            <!-- Table Row End -->
        <?php endif; ?>
        <!-- Table Row End -->
        <!-- Table Row Start -->
        <tr class="text-grey">
            <td colspan="2" class="f-14 line-height">
                <?php if($proposal->signature): ?>
                    <?php if(!is_null($proposal->signature->signature)): ?>
                        <img src="<?php echo e($proposal->signature->signature); ?>" style="width: 200px;">
                        <h6><?php echo app('translator')->get('modules.estimates.signature'); ?></h6>
                    <?php else: ?>
                        <h6><?php echo app('translator')->get('modules.estimates.signedBy'); ?></h6>
                    <?php endif; ?>
                    <p>(<?php echo e($proposal->signature->full_name); ?>)</p>
                <?php endif; ?>
            </td>
        </tr>
        <!-- Table Row End -->
        </tbody>
    </table>
    <p>
    <div style="margin-top: 10px;" class="f-11 line-height text-grey">
        <b><?php echo app('translator')->get('modules.invoiceSettings.invoiceTerms'); ?></b><br><?php echo nl2br($invoiceSetting->invoice_terms); ?>

    </div>
    </p>
    <?php if(isset($invoiceSetting->other_info)): ?>
        <p>
        <div style="margin-top: 10px;" class="f-11 line-height text-grey">
            <?php echo nl2br($invoiceSetting->other_info); ?>

        </div>
        </p>
    <?php endif; ?>

<?php endif; ?>

</body>

</html>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/proposals/pdf/invoice-5.blade.php ENDPATH**/ ?>