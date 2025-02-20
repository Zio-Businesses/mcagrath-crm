<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Template CSS -->
    <title><?php echo app('translator')->get('modules.lead.proposalTemplate'); ?> - <?php echo e($proposalTemplate->id); ?></title>
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo e($invoiceSetting->company->favicon_url); ?>">
    <meta name="theme-color" content="#ffffff">

    <?php if(invoice_setting()->locale == 'ru'): ?>
        <style>
            body {
                margin: 0;
                font-family: dejavu sans;
                font-size: 13px;
            }
        </style>
    <?php else: ?>
        <style>
            body {
                margin: 0;
                font-family: Verdana, Arial, Helvetica, sans-serif;
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
    </style>
</head>

<body class="content-wrapper">
    <table class="bg-white" border="0" cellpadding="0" cellspacing="0" width="100%" role="presentation">
        <tbody>
            <!-- Table Row Start -->
            <tr>
                <td><img src="<?php echo e(invoice_setting()->logo_url); ?>" alt="<?php echo e($invoiceSetting->company->company_name); ?>"
                        id="logo" /></td>
                <td align="right" class="f-21 text-black font-weight-700 text-uppercase"><?php echo app('translator')->get('modules.lead.proposalTemplate'); ?>
                </td>
            </tr>
            <!-- Table Row End -->
            <!-- Table Row Start -->
            <tr>
                <td>
                    <p class="line-height mt-1 mb-0 f-14 text-black">
                        <?php echo e($invoiceSetting->company->company_name); ?><br>
                        <?php if(!is_null($settings)): ?>
                            <?php echo nl2br(default_address()->address); ?><br>
                            <?php echo e($invoiceSetting->company->company_phone); ?>

                        <?php endif; ?>
                        <?php if($invoiceSetting->show_gst == 'yes' && !is_null($invoiceSetting->gst_number)): ?>
                            <br><?php echo app('translator')->get('app.gstIn'); ?>: <?php echo e($invoiceSetting->gst_number); ?>

                        <?php endif; ?>
                    </p>
                </td>
                <td>
                    <table class="text-black mt-1 f-13 b-collapse rightaligned">
                        <tr>
                            <td class="heading-table-left"><?php echo app('translator')->get('modules.lead.proposalTemplate'); ?></td>
                            <td class="heading-table-right">#<?php echo e($proposalTemplate->id); ?></td>
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
                <td height="20"></td>
            </tr>
        </tbody>
    </table>

    <?php if($proposalTemplate->description): ?>
        <div class="f-13 description"><?php echo pdfStripTags($proposalTemplate->description); ?></div>
    <?php endif; ?>

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
            <td align="right" width="<?php echo e($invoiceSetting->hsn_sac_code_show ? '17%' : '20%'); ?>"><?php echo app('translator')->get("modules.invoices.amount"); ?>
                (<?php echo e($proposalTemplate->currency->currency_code); ?>)</td>
        </tr>
        <!-- Table Row End -->
        <?php $__currentLoopData = $proposalTemplate->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($item->type == 'item'): ?>
                <!-- Table Row Start -->
                <tr class="main-table-items text-black f-14">
                    <td width="40%" class="border-bottom-0 word-break"><?php echo e($item->item_name); ?></td>
                    <?php if($invoiceSetting->hsn_sac_code_show): ?>
                        <td align="right" class="border-bottom-0" width="10%"><?php echo e($item->hsn_sac_code ? $item->hsn_sac_code : '--'); ?></td>
                    <?php endif; ?>
                    <td align="right" class="border-bottom-0" width="10%"><?php echo e($item->quantity); ?><br><span class="f-11 text-grey"><?php echo e($item->unit->unit_type); ?></td>
                    <td align="right" class="border-bottom-0"><?php echo e(currency_format($item->unit_price, $proposalTemplate->currency_id, false)); ?></td>
                    <td align="right" class="border-bottom-0"><?php echo e($item->tax_list); ?></td>
                    <td align="right" class="border-bottom-0"><?php echo e(currency_format($item->amount, $proposalTemplate->currency_id, false)); ?></td>
                </tr>
                <?php if($item->item_summary != '' || $item->proposalTemplateItemImage): ?>
                    </table>
                    <div class="f-13 summary text-black border-bottom-0 word-break">
                        <?php echo nl2br(pdfStripTags($item->item_summary)); ?>

                        <?php if($item->proposalTemplateItemImage): ?>
                            <p class="mt-2">
                                <img src="<?php echo e($item->proposalTemplateItemImage->file_url); ?>" width="60" height="60"
                                    class="img-thumbnail">
                            </p>
                        <?php endif; ?>
                    </div>
                    <table class="bg-white" border="0" cellpadding="0" cellspacing="0" width="100%" role="presentation">
                <?php endif; ?>

            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                            <?php echo e(currency_format($proposalTemplate->sub_total, $proposalTemplate->currency_id, false)); ?></td>
                    </tr>
                    <!-- Table Row End -->
                    <?php if($discount != 0 && $discount != ''): ?>
                        <!-- Table Row Start -->
                        <tr align="right" class="text-grey">
                            <td class="subtotal-amt">
                                <?php echo e(currency_format($discount, $proposalTemplate->currency_id, false)); ?></td>
                        </tr>
                        <!-- Table Row End -->
                    <?php endif; ?>
                    <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <!-- Table Row Start -->
                        <tr align="right" class="text-grey">
                            <td class="subtotal-amt"><?php echo e(currency_format($tax, $proposalTemplate->currency_id, false)); ?>

                            </td>
                        </tr>
                        <!-- Table Row End -->
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <!-- Table Row Start -->
                    <tr align="right" class="balance text-black">
                        <td class="balance-right">
                            <?php echo e(currency_format($proposalTemplate->total, $proposalTemplate->currency_id, false)); ?>

                            <?php echo e($proposalTemplate->currency->currency_code); ?></td>
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
                    <td height="10">&nbsp;</td>
                </tr>
                <tr>
                    <td class="f-11"><?php echo app('translator')->get('app.note'); ?></td>
                </tr>
                <!-- Table Row End -->
                <!-- Table Row Start -->
                <tr class="text-grey">
                    <td class="f-11 line-height word-break note-text"></td>
                </tr>
                <?php if($invoiceSetting->other_info): ?>
                    <tr class="text-grey">
                        <td class="f-11 line-height word-break note-text">
                            <br><?php echo nl2br($invoiceSetting->other_info); ?>

                        </td>
                    </tr>
                <?php endif; ?>

            <!-- Table Row End -->
        </tbody>
    </table>

</body>

</html>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/proposal-template/pdf/invoice-5.blade.php ENDPATH**/ ?>