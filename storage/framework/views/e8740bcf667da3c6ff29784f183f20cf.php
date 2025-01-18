<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Template CSS -->
    <!-- <link type="text/css" rel="stylesheet" media="all" href="css/main.css"> -->

    <title><?php echo app('translator')->get('modules.contracts.contractNumber'); ?> - #<?php echo e($contract->contract_number); ?></title>
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo e($contract->company->favicon_url); ?>">
    <meta name="theme-color" content="#ffffff">

    <style>

@font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: normal;
            src: url("<?php echo e(storage_path('fonts/THSarabunNew.ttf')); ?>") format('truetype');
        }
        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: bold;
            src: url("<?php echo e(storage_path('fonts/THSarabunNew_Bold.ttf')); ?>") format('truetype');
        }
        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: bold;
            src: url("<?php echo e(storage_path('fonts/THSarabunNew_Bold_Italic.ttf')); ?>") format('truetype');
        }
        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: bold;
            src: url("<?php echo e(storage_path('fonts/THSarabunNew_Italic.ttf')); ?>") format('truetype');
        }

        @font-face {
            font-family: 'BeVietnamPro';
            font-style: normal;
            font-weight: normal;
            src: url("<?php echo e(storage_path('fonts/BeVietnamPro-Black.ttf')); ?>") format('truetype');
        }
        @font-face {
            font-family: 'BeVietnamPro';
            font-style: italic;
            font-weight: normal;
            src: url("<?php echo e(storage_path('fonts/BeVietnamPro-BlackItalic.ttf')); ?>") format('truetype');
        }
        @font-face {
            font-family: 'BeVietnamPro';
            font-style: italic;
            font-weight: bold;
            src: url("<?php echo e(storage_path('fonts/BeVietnamPro-bold.ttf')); ?>") format('truetype');
        }

        <?php if($invoiceSetting->is_chinese_lang): ?>
            @font-face {
            font-family: SimHei;
            /*font-style: normal;*/
            font-weight: bold;
            src: url('<?php echo e(asset('fonts/simhei.ttf')); ?>') format('truetype');
        }

        <?php endif; ?>

    <?php
        $font = '';
        if($invoiceSetting->locale == 'ja') {
            $font = 'ipag';
        } else if($invoiceSetting->locale == 'hi') {
            $font = 'hindi';
        } else if($invoiceSetting->locale == 'th') {
            $font = 'THSarabunNew';
        } else if($invoiceSetting->is_chinese_lang) {
            $font = 'SimHei';
        } else if($invoiceSetting->locale == 'vi') {
            $font = 'BeVietnamPro';
        }else {
            $font = 'Verdana';
        }
    ?>

    <?php if($invoiceSetting->is_chinese_lang): ?>
        body {
            font-weight: normal !important;
        }
    <?php endif; ?>

       body {
            margin: 0;
            font-family: <?php echo e($font); ?>, DejaVu Sans, sans-serif;
        }

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

        .f-13 {
            font-size: 13px;
        }

        .f-14 {
            font-size: 14px;
        }

        .f-15 {
            font-size: 15px;
        }

        .f-21 {
            font-size: 21px;
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
            line-height: 24px;
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
            position: relative;
            padding: 11px 22px;
            font-size: 15px;
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
            padding: 11px 10px;
            border: 1px solid #DBDBDB;
        }

        .main-table-items td {
            padding: 11px 10px;
            border: 1px solid #e7e9eb;
        }

        .total-box {
            border: 1px solid #e7e9eb;
            padding: 0px;
            border-bottom: 0px;
        }

        .subtotal {
            padding: 11px 10px;
            border: 1px solid #e7e9eb;
            border-top: 0;
            border-left: 0;
        }

        .subtotal-amt {
            padding: 11px 10px;
            border: 1px solid #e7e9eb;
            border-top: 0;
            border-right: 0;
        }

        .total {
            padding: 11px 10px;
            border: 1px solid #e7e9eb;
            border-top: 0;
            font-weight: 700;
            border-left: 0;
        }

        .total-amt {
            padding: 11px 10px;
            border: 1px solid #e7e9eb;
            border-top: 0;
            border-right: 0;
            font-weight: 700;
        }

        .balance {
            font-size: 16px;
            font-weight: bold;
            background-color: #f1f1f3;
        }

        .balance-left {
            padding: 11px 10px;
            border: 1px solid #e7e9eb;
            border-top: 0;
            border-left: 0;
        }

        .balance-right {
            padding: 11px 10px;
            border: 1px solid #e7e9eb;
            border-top: 0;
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

        .logo {
            height: 50px;
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
                <td><img src="<?php echo e($contract->company->invoiceSetting->logo_url); ?>" alt="<?php echo e($contract->company->company_name); ?>"
                        class="logo" /></td>
                <td align="right" class="f-21 text-black font-weight-700 text-uppercase"><?php echo app('translator')->get('app.menu.contract'); ?></td>
            </tr>
            <!-- Table Row End -->
            <!-- Table Row Start -->
            <tr>
                <td>
                    <p class="line-height mt-1 mb-0 f-14 text-black">
                        <?php echo e($contract->company->company_name); ?><br>
                        <?php if(!is_null($contract->company)): ?>
                            <?php echo nl2br($contract->company->defaultAddress->address); ?><br>
                            <?php echo e($contract->company->company_phone); ?>

                        <?php endif; ?>

                    </p>
                </td>
                <td>
                    <table class="text-black mt-1 f-13 b-collapse rightaligned">
                        <tr>
                            <td class="heading-table-left"><?php echo app('translator')->get('modules.contracts.contractNumber'); ?></td>
                            <td class="heading-table-right">#<?php echo e($contract->contract_number); ?></td>
                        </tr>
                        <tr>
                            <td class="heading-table-left"><?php echo app('translator')->get('modules.projects.startDate'); ?></td>
                            <td class="heading-table-right"><?php echo e($contract->start_date->translatedFormat($contract->company->date_format)); ?>

                            </td>
                        </tr>
                        <?php if($contract->end_date != null): ?>
                            <tr>
                                <td class="heading-table-left"><?php echo app('translator')->get('modules.contracts.endDate'); ?></td>
                                <td class="heading-table-right">
                                    <?php echo e($contract->end_date->translatedFormat($contract->company->date_format)); ?>

                                </td>
                            </tr>
                        <?php endif; ?>
                        <tr class="description">
                            <td class="heading-table-left description"><?php echo app('translator')->get('modules.contracts.contractType'); ?></td>
                            <td class="heading-table-right description"><?php echo e($contract->contractType->name); ?>

                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <!-- Table Row End -->
            <!-- Table Row Start -->
            <tr>
                <td height="30"></td>
            </tr>
            <!-- Table Row End -->
            <!-- Table Row Start -->
            <tr>
                <td colspan="2">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tr>
                            <td class="f-14 text-black">

                                <p class="line-height mb-0">
                                    <span class="text-grey text-capitalize"><?php echo app('translator')->get('app.client'); ?></span><br>
                                    <?php echo e($contract->client->name_salutation); ?><br>
                                    <?php echo e($contract->client->clientDetails->company_name); ?>

                                    <?php echo nl2br($contract->client->clientDetails->address); ?>

                                </p>

                            </td>

                            <td align="right">
                                <?php if($contract->client->clientDetails->company_logo): ?>
                                    <div class="text-uppercase bg-white unpaid rightaligned">
                                        <img src="<?php echo e($contract->client->clientDetails->image_url); ?>"
                                            alt="<?php echo e($contract->client->clientDetails->company_name); ?>"
                                            class="logo" />
                                    </div>
                                <?php endif; ?>
                            </td>
                        </tr>
                    </table>
                </td>


            </tr>
            <!-- Table Row End -->
            <!-- Table Row Start -->
            <tr>
                <td height="20" colspan="2"></td>
            </tr>
            <!-- Table Row End -->

        </tbody>
    </table>

    <div>
        <h5 class="text-grey text-capitalize"><?php echo app('translator')->get('app.subject'); ?></h5>
        <p class="f-15 text-black"><?php echo e($contract->subject); ?></p>

        <h5 class="text-grey text-capitalize"><?php echo app('translator')->get('modules.contracts.notes'); ?></h5>
        <p class="f-15 text-black"><?php echo e($contract->contract_note); ?></p>

        <h5 class="text-grey text-capitalize"><?php echo app('translator')->get('app.description'); ?></h5>
        <p class="f-15 text-black"><?php echo nl2br(pdfStripTags($contract->contract_detail)); ?></p>

        <?php if($contract->amount != 0): ?>
            <div class="text-right pt-3 border-top description">
                <h4><?php echo app('translator')->get('modules.contracts.contractValue'); ?>:
                    <?php echo e($contract->amount . ' ' . $contract->currency->currency_code); ?></h4>
            </div>
        <?php endif; ?>

        <hr class="mt-1 mb-1">
        <?php if($contract->signature): ?>
            <div style="text-align: left; margin-top: 10px">
                <h4 class="name" style="margin-bottom: 20px;"><?php echo app('translator')->get('modules.estimates.clientsignature'); ?></h4>
                <?php echo Html::image($contract->signature->signature, '', ['class' => '', 'height' => '75px']); ?>

                <p>Client Name:- <?php echo e($contract->signature->full_name); ?><br>
                    Place:- <?php echo e($contract->signature->place); ?><br>
                    Date:- <?php echo e($contract->signature->date); ?>

                </p>
            </div>
        <?php endif; ?>

        <?php if($contract->company_sign): ?>
            <div style="text-align: right; margin-top: -260px">
                <h4 class="name" style="margin-bottom: 20px;"><?php echo app('translator')->get('modules.estimates.companysignature'); ?></h4>
                <img src="<?php echo e($contract->company_signature); ?>" style="width: 200px;">
                <p>Date:- <?php echo e($contract->sign_date); ?></p>
            </div>
        <?php endif; ?>
    </div>

   
   <?php if(isset($fields) && count($fields) > 0): ?>
   <div class="page_break"></div>
       <h3 class="box-title m-t-20 text-center h3-border"> <?php echo app('translator')->get('modules.projects.otherInfo'); ?></h3>
       <table class="bg-white" border="0" cellspacing="0" cellpadding="0" width="100%" role="presentation">
           <?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <tr>
                   <td style="text-align: left;background: none;" >
                       <div class="f-14"><?php echo e($field->label); ?></div>
                       <p  class="f-14 line-height text-grey">
                           <?php if( $field->type == 'text' || $field->type == 'password' || $field->type == 'number' || $field->type == 'textarea'): ?>
                               <?php echo e($contract->custom_fields_data['field_'.$field->id] ?? '-'); ?>

                           <?php elseif($field->type == 'radio'): ?>
                               <?php echo e(!is_null($contract->custom_fields_data['field_'.$field->id]) ? $contract->custom_fields_data['field_'.$field->id] : '-'); ?>

                           <?php elseif($field->type == 'select'): ?>
                               <?php echo e((!is_null($contract->custom_fields_data['field_'.$field->id]) && $contract->custom_fields_data['field_'.$field->id] != '') ? $field->values[$contract->custom_fields_data['field_'.$field->id]] : '-'); ?>

                           <?php elseif($field->type == 'checkbox'): ?>
                               <?php echo e(!is_null($contract->custom_fields_data['field_'.$field->id]) ? $contract->custom_fields_data['field_'.$field->id] : '-'); ?>

                           <?php elseif($field->type == 'date'): ?>
                               <?php echo e(!is_null($contract->custom_fields_data['field_'.$field->id]) ? \Carbon\Carbon::parse($contract->custom_fields_data['field_'.$field->id])->translatedFormat($contract->company->date_format) : '--'); ?>

                           <?php endif; ?>
                       </p>
                   </td>
               </tr>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       </table>
   </div>

    <?php endif; ?>

</body>

</html>
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\contracts\contract-pdf.blade.php ENDPATH**/ ?>