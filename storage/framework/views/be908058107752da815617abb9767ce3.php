<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title><?php echo app('translator')->get('app.invoice'); ?> - <?php echo e($invoice->invoice_number); ?></title>
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo e($company->favicon_url); ?>">
    <meta name="theme-color" content="#ffffff">
    <?php if ($__env->exists('invoices.pdf.invoice_pdf_css')) echo $__env->make('invoices.pdf.invoice_pdf_css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
            line-height: 15px;
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
            color: #d30000;
            border: 1px solid #d30000;
            position: relative;
            padding: 5px 10px;
            font-size: 14px;
            border-radius: 0.25rem;
            width: 100px;
            text-align: center;
            margin-top: 50px;
        }

        .other {
            color: #000000;
            border: 1px solid #000000;
            position: relative;
            padding: 5px 10px;
            font-size: 14px;
            border-radius: 0.25rem;
            width: 120px;
            text-align: center;
            margin-top: 50px;
        }

        .paid {
            color: #28a745 !important;
            border: 1px solid #28a745;
            position: relative;
            padding: 6px 12px;
            font-size: 14px;
            border-radius: 0.25rem;
            width: 100px;
            text-align: center;
            margin-top: 50px;
        }

        .main-table-heading {
            border: 1px solid #DBDBDB;
            background-color: #f1f1f3;
            font-weight: 700;
        }

        .main-table-heading td {
            padding: 5px 8px;
            border: 1px solid #DBDBDB;
            font-size: 13px;
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
            border-left: 0;
            border-right: 0;
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
        .h3-border {
            border-bottom: 1px solid #AAAAAA;
        }

        .word-break {
            word-wrap: break-word;
            word-break: break-all;
        }

</style>
    <?php if($invoiceSetting->locale == 'th'): ?>
    <style>

            table td {
            font-weight: bold !important;
            font-size: 20px !important;
        }

        .description {
            font-weight: bold !important;
            font-size: 16px !important;
        }


    </style>
<?php endif; ?>
</head>

<body class="content-wrapper">

<table class="bg-white" border="0" cellpadding="0" cellspacing="0" width="100%" role="presentation">


    <tbody>
    <!-- Table Row Start -->
    <tr>
        <td><img src="<?php echo e($invoiceSetting->logo_url); ?>" alt="<?php echo e($company->company_name); ?>"
                 id="logo"/></td>
        <td align="right" class="f-21 text-black font-weight-700 text-uppercase"><?php echo app('translator')->get('app.invoice'); ?><br>
            <table class="text-black mt-1 f-11 b-collapse rightaligned">
                <tr>
                    <td class="heading-table-left"><?php echo app('translator')->get('modules.invoices.invoiceNumber'); ?></td>
                    <td class="heading-table-right"><?php echo e(str_replace(['INV#'], '', $invoice->invoice_number)); ?></td>
                </tr>
                <?php if($creditNote): ?>
                    <tr>
                        <td class="heading-table-left"><?php echo app('translator')->get('app.credit-note'); ?></td>
                        <td class="heading-table-right"><?php echo e($creditNote->cn_number); ?></td>
                    </tr>
                <?php endif; ?>
                <tr>
                    <td class="heading-table-left"><?php echo app('translator')->get('modules.invoices.invoiceDate'); ?></td>
                    <td class="heading-table-right">
                        <?php echo e($invoice->issue_date->translatedFormat($invoice->company->date_format)); ?>

                    </td>
                </tr>
                <?php if(empty($invoice->order_id) && $invoice->status === 'unpaid' && $invoice->due_date->year > 1): ?>
                    <tr>
                        <td class="heading-table-left"><?php echo app('translator')->get('app.dueDate'); ?></td>
                        <td class="heading-table-right">
                            <?php echo e($invoice->due_date->translatedFormat($invoice->company->date_format)); ?>

                        </td>
                    </tr>
                <?php endif; ?>
                <?php if($invoice->project): ?>
                    <tr>
                        <td class="heading-table-left">Project Date</td>
                        <td class="heading-table-right"><?php if($invoice->project->start_date): ?><?php echo e($invoice->project->start_date->translatedFormat($company->date_format)??''); ?><?php endif; ?></td>
                    </tr>
                
               
                    <tr>
                        <td class="heading-table-left">Work Completion Date</td>
                        <td class="heading-table-right"><?php if($invoice->project->work_completion_date): ?><?php echo e($invoice->project->work_completion_date->translatedFormat($company->date_format)??''); ?><?php endif; ?></td>
                    </tr>
                <?php endif; ?>
            </table>
        </td>
    </tr>
    <!-- Table Row End -->
    <!-- Table Row Start -->
    <tr>
        <td class="f-12 text-black">
            <p class="line-height mb-0 ">
                <span class="text-grey text-capitalize"><?php echo app('translator')->get('modules.invoices.billedFrom'); ?></span><br>
                <?php echo e($company->company_name); ?><br>
                <?php if(!is_null($company) && $invoice->address): ?>
                    <?php echo nl2br($invoice->address->address); ?><br>
                <?php endif; ?>
                <?php if($company->company_phone): ?>
                    <?php echo e($company->company_phone); ?><br>
                <?php endif; ?>
                <?php if($company->company_email): ?>
                    <?php echo e($company->company_email); ?><br>
                <?php endif; ?>
                <?php if($company->website): ?>
                    <?php echo e($company->website); ?> <br>
                <?php endif; ?>
                <?php if($invoiceSetting->show_gst == 'yes' && $invoice->address->tax_number): ?>
                    <?php echo e($invoice->address->tax_name); ?>: <?php echo e($invoice->address->tax_number); ?>

                <?php endif; ?>
            </p>
            <?php if($invoiceSetting->show_project == 1 && isset($invoice->project->project_name)): ?>
                <br>
                <p class="line-height mb-0"></p>
            <?php endif; ?>
        </td>
        <td class="f-12 text-black" align="right">
            <?php if(!is_null($invoice->project) && !is_null($invoice->project->client) && !is_null($invoice->project->client->clientDetails)): ?>
                <?php
                    $client = $invoice->project->client;
                ?>
            <?php elseif(!is_null($invoice->client_id) && !is_null($invoice->clientDetails)): ?>
                <?php
                    $client = $invoice->client;
                ?>
            <?php endif; ?>

            <?php if(($invoiceSetting->show_client_name == 'yes' || $invoiceSetting->show_client_email == 'yes' || $invoiceSetting->show_client_phone == 'yes' || $invoiceSetting->show_client_company_name == 'yes' || $invoiceSetting->show_client_company_address == 'yes') && $client): ?>
                <p class="line-height mb-0">
                            <span class="text-grey text-capitalize">
                                <?php echo app('translator')->get('modules.invoices.billedTo'); ?></span><br>

                    <?php if($client->name && $invoiceSetting->show_client_name == 'yes'): ?>
                        <?php echo e($client->name_salutation); ?><br>
                    <?php endif; ?>

                    <?php if($client->email && $invoiceSetting->show_client_email == 'yes'): ?>
                        <?php echo e($client->email); ?><br>
                    <?php endif; ?>

                    <?php if($client->mobile && $invoiceSetting->show_client_phone == 'yes'): ?>
                        <?php echo e($client->mobile_with_phonecode); ?><br>
                    <?php endif; ?>

                    <?php if($client->clientDetails->company_name && $invoiceSetting->show_client_company_name == 'yes'): ?>
                        <?php echo e($client->clientDetails->company_name); ?><br>
                    <?php endif; ?>

                    <?php if($client->clientDetails->address && $invoiceSetting->show_client_company_address == 'yes'): ?>
                        <?php echo nl2br($client->clientDetails->address); ?>

                    <?php endif; ?>

                    <?php if($invoiceSetting->show_gst == 'yes' && !is_null($client->clientDetails->gst_number)): ?>
                        <?php if($client->clientDetails->tax_name): ?>
                            <br><?php echo e($client->clientDetails->tax_name); ?>: <?php echo e($client->clientDetails->gst_number); ?>

                        <?php else: ?>
                            <br><?php echo app('translator')->get('app.gstIn'); ?>: <?php echo e($client->clientDetails->gst_number); ?>

                        <?php endif; ?>
                    <?php endif; ?>
                </p>
            <?php endif; ?>

            <?php if($invoiceSetting->show_project == 1 && isset($invoice->project->project_name)): ?>
                <br>
                <p class="line-height mb-0">
                    <span class="text-grey text-capitalize"><?php echo app('translator')->get('modules.invoices.projectName'); ?></span>:
                    <?php echo e($invoice->project->project_name); ?>

                </p>
            <?php endif; ?>

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
                        <?php if($invoice->show_shipping_address == 'yes'): ?>
                            <p class="line-height"><span
                                    class="text-grey text-capitalize"><?php echo app('translator')->get('app.shippingAddress'); ?></span><br>
                                <?php echo nl2br($client->clientDetails->shipping_address); ?></p>
                        <?php endif; ?>
                    </td>
                    <?php if($invoiceSetting->show_status): ?>
                        <td align="right">
                            <div style="margin: 0 0 auto auto"
                                 class="text-uppercase bg-white <?php echo e($invoice->status =='paid'|| $invoice->status=='unpaid'?$invoice->status:'other'); ?> rightaligned">
                                <?php if($invoice->credit_note): ?>
                                    <?php echo app('translator')->get('app.credit-note'); ?>
                                <?php else: ?>
                                    <?php echo app('translator')->get('modules.invoices.' . $invoice->status); ?>
                                <?php endif; ?>
                            </div>
                        </td>
                    <?php endif; ?>
                </tr>
            </table>
        </td>
    </tr>
    </tbody>
</table>
<?php if($invoice->project): ?>
<table width="100%" class="f-14 b-collapse">
    <tr>
        <td height="10" colspan=<?php echo e($invoiceSetting->hsn_sac_code_show ? '6' : '5'); ?>></td>
    </tr>
    <tr class="main-table-heading text-grey">
        <td width="40%">Work Order #</td>
        <td colspan=4>Property Address</td>
        <!-- <td align="right"><?php echo app('translator')->get('modules.invoices.tax'); ?></td> -->
    </tr>
    <tr class="f-12 main-table-items text-black">
        <td width="40%"><?php echo e($invoice->project->project_short_code??''); ?></td>
        <td colspan=4><?php echo e($invoice->project->propertyDetails->property_address??''); ?></td>
    </tr>
</table>
<?php endif; ?>
<table width="100%" class="f-14 b-collapse">
    <tr>
        <td height="10" colspan=<?php echo e($invoiceSetting->hsn_sac_code_show ? '6' : '5'); ?>></td>
    </tr>
    <!-- Table Row Start -->
    <tr class="main-table-heading text-grey">
        <td width="40%"><?php echo app('translator')->get('app.description'); ?></td>
        <?php if($invoiceSetting->hsn_sac_code_show): ?>
            <td align="right"><?php echo app('translator')->get('app.hsnSac'); ?></td>
        <?php endif; ?>
        <td align="right"><?php echo app('translator')->get('modules.invoices.qty'); ?></td>
        <td align="right"><?php echo app('translator')->get('modules.invoices.unitPrice'); ?></td>
        <!-- <td align="right"><?php echo app('translator')->get('modules.invoices.tax'); ?></td> -->
        <td align="right"
            colspan=2><?php echo app('translator')->get('modules.invoices.amount'); ?>
            (<?php echo e($invoice->currency->currency_code); ?>)
        </td>
    </tr>
    <!-- Table Row End -->
    <?php $__currentLoopData = $invoice->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($item->type == 'item'): ?>
        <!-- Table Row Start -->
            <tr class="f-12 main-table-items text-black">
                <td width="40%" class="border-bottom-0 word-break">
                    <?php echo e($item->item_name); ?>

                </td>
                <?php if($invoiceSetting->hsn_sac_code_show): ?>
                    <td align="right" width="10%" class="border-bottom-0">
                        <?php echo e($item->hsn_sac_code ?  : '--'); ?></td>
                <?php endif; ?>
                <td align="right" width="10%" class="border-bottom-0"><?php echo e($item->quantity); ?><?php if($item->unit): ?><br><span class="f-11 text-dark-grey"><?php echo e($item->unit->unit_type); ?></span><?php endif; ?></td>
                <td align="right"
                    class="border-bottom-0"><?php echo e(currency_format($item->unit_price, $invoice->currency_id, false)); ?></td>
                    <!-- <td align="right" class="border-bottom-0"><?php echo e($item->tax_list); ?></td> -->
                <td align="right" class="border-bottom-0"
                    colspan=2>
                    <?php echo e(currency_format($item->amount, $invoice->currency_id, false)); ?></td>
            </tr>
            <!-- Table Row End -->
            <?php if($item->item_summary != '' || $item->invoiceItemImage): ?>
                
                <tr>
                    <td colspan="<?php echo e($invoiceSetting->hsn_sac_code_show ? '6' : '5'); ?>" class="f-13 summary text-black border-bottom-0 description word-break">
                        <?php echo nl2br(pdfStripTags($item->item_summary)); ?>

                        <?php if($item->invoiceItemImage): ?>
                            <p class="mt-2">
                                <img src="<?php echo e($item->invoiceItemImage->file_url); ?>" width="60" height="60" class="img-thumbnail">
                            </p>
                        <?php endif; ?>
                    </td>
                </tr>
                
            <?php endif; ?>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <!-- Table Row Start -->
     
    <tr>
        <td class="total-box" align="right" colspan="<?php echo e($invoiceSetting->hsn_sac_code_show ? '5' : '4'); ?>">
            <table width="100%" border="0" class="b-collapse">
                <!-- Table Row Start -->
                <tr align="right" class="text-grey">
                
                    <td width="50%" class="subtotal"><?php echo app('translator')->get('modules.invoices.subTotal'); ?></td>
                </tr>
                <!-- Table Row End -->
            <?php if($discount != 0 && $discount != ''): ?>
                <!-- Table Row Start -->
                    <tr align="right" class="text-grey">
                        <td width="50%" class="subtotal"><?php echo app('translator')->get('modules.invoices.discount'); ?>
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
                <tr align="right" class="text-grey">
                    <td width="50%" class="total"><?php echo app('translator')->get('modules.invoices.total'); ?></td>
                </tr>
                <!-- Table Row End -->
            <?php if($invoice->amountDue()): ?>
                <!-- Table Row Start -->
                    <tr align="right" class="balance text-black">
                        <td width="50%" class="balance-left"><?php echo app('translator')->get('modules.invoices.total'); ?>
                            <?php echo app('translator')->get('modules.invoices.due'); ?></td>
                    </tr>
                    <!-- Table Row End -->
                <?php endif; ?>

            </table>
        </td>
        <td class="total-box" align="right"
            width="<?php echo e($invoiceSetting->hsn_sac_code_show ? '20%' : '23%'); ?>">
            <table width="100%" class="b-collapse">
                <!-- Table Row Start -->
                <tr align="right" class="text-grey">
                    <td class="subtotal-amt">
                        <?php echo e(currency_format($invoice->sub_total, $invoice->currency_id, false)); ?></td>
                </tr>
                <!-- Table Row End -->
            <?php if($discount != 0 && $discount != ''): ?>
                <!-- Table Row Start -->
                    <tr align="right" class="text-grey">
                        <td class="subtotal-amt">
                            <?php echo e(currency_format($discount, $invoice->currency_id, false)); ?></td>
                    </tr>
                    <!-- Table Row End -->
            <?php endif; ?>
            <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <!-- Table Row Start -->
                    <tr align="right" class="text-grey">
                        <td class="subtotal-amt"><?php echo e(currency_format($tax, $invoice->currency_id, false)); ?>

                        </td>
                    </tr>
                    <!-- Table Row End -->
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <!-- Table Row Start -->
                <tr align="right" class="text-grey">
                    <td class="total-amt f-15">
                        <?php echo e(currency_format($invoice->total, $invoice->currency_id, false)); ?></td>
                </tr>
                <!-- Table Row End -->
            <?php if($invoice->amountDue()): ?>
                <!-- Table Row Start -->
                    <tr align="right" class="balance text-black">
                        <td class="balance-right">
                            <?php echo e(currency_format($invoice->amountDue(), $invoice->currency_id, false)); ?>

                            <?php echo e($invoice->currency->currency_code); ?></td>
                    </tr>
                    <!-- Table Row End -->
                <?php endif; ?>
            </table>
        </td>
    </tr>
</table>

<table class="bg-white" border="0" cellpadding="0" cellspacing="0" width="100%" role="presentation">
    <tbody>
    <tr class="text-grey">
        <?php if($invoiceSetting->authorised_signatory && $invoiceSetting->authorised_signatory_signature && $invoice->status == 'paid'): ?>
            <td class="" align="right">
                <img style="height:95px; margin-bottom: -50px; margin-top: 5px; margin-right: 20"
                     src="<?php echo e($invoiceSetting->authorised_signatory_signature_url); ?>"
                     alt="<?php echo e($company->company_name); ?>"
                     id="logo"/><br>
                <?php echo app('translator')->get('modules.invoiceSettings.authorisedSignatory'); ?>
            </td>
        <?php endif; ?>

    </tr>
    <!-- Table Row Start -->
    <?php if(!($invoiceSetting->authorised_signatory && $invoiceSetting->authorised_signatory_signature && $invoice->status == 'paid')): ?>
        <tr>
            <td height="10"></td>
        </tr>
    <?php endif; ?>
    <?php if($invoice->note): ?>
        <tr>
            <td height="10"></td>
        </tr>
        <tr>
            <td class="f-11"><?php echo app('translator')->get('app.note'); ?></td>
        </tr>
        <!-- Table Row End -->
        <!-- Table Row Start -->
        <tr class="text-grey">
            <td class="f-11 line-height word-break"><?php echo $invoice->note ? nl2br($invoice->note) : '--'; ?></td>
        </tr>
    <?php endif; ?>
    <tr>
        <td height="10"></td>
    </tr>
    
    <!-- Table Row End -->

    <?php if(isset($taxes) && $invoiceSetting->tax_calculation_msg == 1): ?>
        <!-- Table Row Start -->
        <tr class="text-grey">
            <td width="100%" class="f-11 line-height">
                <p class="text-dark-grey">
                    <?php if($invoice->calculate_tax == 'after_discount'): ?>
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
    </tbody>
</table>

<p>
    <div style="margin-top: 10px;" class="f-11 line-height text-grey">
        <?php echo nl2br($invoiceSetting->invoice_terms); ?>

    </div>
</p>

<?php if(isset($invoiceSetting->other_info)): ?>
    <p>
        <div style="margin-top: 10px;" class="f-11 line-height text-grey">
            <br><?php echo nl2br($invoiceSetting->other_info); ?>

        </div>
    </p>
<?php endif; ?>


<?php if(isset($fields) && count($fields) > 0): ?>
    <div class="page_break"></div>
    <h3 class="box-title m-t-20 text-center h3-border"> <?php echo app('translator')->get('modules.projects.otherInfo'); ?></h3>
    <table class="bg-white" border="0" cellspacing="0" cellpadding="0" width="100%" role="presentation">
        <?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td style="text-align: left;background: none;">
                    <div class="f-14"><?php echo e($field->label); ?></div>
                    <p class="f-14 line-height text-grey" id="notes">
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

<?php endif; ?>

<?php if(count($payments) > 0): ?>
    <div class="page_break"></div>
    <h3><?php echo app('translator')->get('app.menu.payments'); ?> (<?php echo e($invoice->invoice_number); ?>)</h3>
    <table class="f-14 b-collapse" width="100%">
        <tr class="main-table-heading text-grey">
            <td class="text-center">#</td>
            <td class="text-center"><?php echo app('translator')->get('modules.invoices.price'); ?></td>
            <td class="text-center"><?php echo app('translator')->get('modules.invoices.paymentMethod'); ?></td>
            <td class="text-center"><?php echo app('translator')->get('modules.invoices.paidOn'); ?></td>
        </tr>

        <?php $__empty_1 = true; $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr class="main-table-items">
                <td class="text-center"><?php echo e($key + 1); ?></td>
                <td class="text-center"><?php echo e(currency_format($payment->amount, $invoice->currency_id, false)); ?>

                    <?php echo e($invoice->currency->currency_code); ?></td>
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
                <td class="text-center"> <?php echo e($payment->paid_on->translatedFormat($company->date_format)); ?> </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="4"><?php echo app('translator')->get('messages.noRecordFound'); ?> </td>
            </tr>
        <?php endif; ?>
    </table>
<?php endif; ?>
<br/>
<?php
function downloadImageLocally($url) {
    // Create a temporary file name
    $tempPath = storage_path('app/tmp/' . uniqid() . '.jpg');

    // Download the file from S3 to the temporary path
    $imageContent = file_get_contents($url);
    if ($imageContent !== false) {
        file_put_contents($tempPath, $imageContent);
        return $tempPath;
    }

    return false;
}

function correctImageOrientation($path) {
    if (function_exists('exif_read_data')) {
        $exif = @exif_read_data($path);
        if ($exif && isset($exif['Orientation'])) {
            $orientation = $exif['Orientation'];
            $image = imagecreatefromjpeg($path); // Assume the image is JPEG
            switch ($orientation) {
                case 3:
                    $image = imagerotate($image, 180, 0);
                    break;
                case 6:
                    $image = imagerotate($image, -90, 0);
                    break;
                case 8:
                    $image = imagerotate($image, 90, 0);
                    break;
            }
            // Save the corrected image temporarily
            imagejpeg($image, $path); // Overwrite the original file
            imagedestroy($image);
        }
    }
    return $path;
}

?>

<!-- Inside the rendering section -->
<?php if($invoice->files): ?>
<table width="100%" class="f-14 b-collapse" cellspacing="0" cellpadding="5" style="width: 100%; border-collapse: collapse;">
    <tr>
    <?php
        $counter = 0;
        $tempFiles = []; // Array to keep track of temporary files
    ?>
    <?php $__currentLoopData = $invoice->files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($file->icon == 'images'): ?>
            <?php if($counter % 4 == 0 && $counter != 0): ?> <!-- Close the row after every 4th image -->
                </tr><tr>
            <?php endif; ?>
            <?php
                // Download the image locally from S3
                $localImagePath = downloadImageLocally($file->file_url);
                
                if ($localImagePath) {
                    // Correct the orientation if needed
                    $correctedImageUrl = correctImageOrientation($localImagePath);
                    $tempFiles[] = $correctedImageUrl; // Track the temporary file
                }
            ?>
            <td style="padding: 5px; text-align: center; vertical-align: top; border: 1px solid #ddd;">
                <?php if(isset($correctedImageUrl)): ?>
                    <img src="<?php echo e($correctedImageUrl); ?>" width="150" height="150" style="margin: 0 auto; display: inline-block;">
                <?php else: ?>
                    <span>Image not available</span>
                <?php endif; ?>
                <div class="f-11" style="width: 150px; word-wrap: break-word; text-align: center; margin-top: 5px;"><?php echo e($file->filename); ?></div>
            </td>
            <?php $counter++; ?>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tr>
</table>

<?php endif; ?>

</body>

</html>
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\invoices\pdf\invoice-5.blade.php ENDPATH**/ ?>