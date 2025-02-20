<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo e($company->favicon_url); ?>">
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
        @font-face {
            font-family: 'DejaVuSans';
            font-style: normal;
            font-weight: normal;
            src: url("<?php echo e(storage_path('fonts/DejaVuSans-Oblique.ttf')); ?>") format('truetype');
        }
        

       body {
            margin: 0;
            font-family: DejaVu Sans, sans-serif;
            font-size: 14px;

        }
        
        .heading-table-left {
            padding: 6px;
            font-weight: bold;
            border-right: 0;
        }

        .heading-table-right {
            padding: 6px;
            border-left: 0;
        }

        .light-grey-border-div {
        border: 2px solid lightgrey; 
        }
        .custom-line {
            border: 0;
            height: 2px;
            background: black;
            margin: 20px 0;
        }
        .pl-2{
            padding-left:100px;
        }
        .pt-2
        {
            padding-top:10px;
        }
        ol {
            line-height: 1;
            position: relative;
        }
        ol > li > p {
            margin-top: 0;
            position: relative;
            top: 7px;
        }
        .watermark-center {
            
            position: absolute;
            z-index: -1;
            text-align: center;
            opacity: 0.3;
            font-size: 3rem;
            pointer-events: none;
            top: 25%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        .page-break {
            page-break-after: always;
        }

    </style>

</head>

<body id="body" class="h-100">

            <div class="content-wrapper">
                <div>
                    <table style="width: 100%;">
                        <tr>
                            <td>
                                <img src="<?php echo e($company->dark_logo_url); ?>" alt="<?php echo e($company->company_name); ?>" style="height:80px; width:80px;" class="rounded-left" />
                            </td>
                            <td>
                                <p class="">
                                            <?php echo e($company->company_name); ?><br>
                                            <?php echo nl2br($company->defaultAddress->address); ?><br>
                                            Phone #: <?php echo e($company->company_phone); ?><br>
                                            Email: <a href="<?php echo e($company->website); ?>"><?php echo e($company->company_email); ?></a><br>
                                            Website: <a href="<?php echo e($company->website); ?>"><?php echo e($company->website); ?></a>
                                </p> 
                            </td>
                            <td align="right" class="pl-2">
                            <table>
                                <tr>
                                    <td class="heading-table-left">
                                        <?php echo app('translator')->get('Assigned Date'); ?></td>
                                    <td class="heading-table-right"><?php echo e($projectvendor->created_at->translatedFormat($company->date_format)); ?></td>
                                </tr>
                                <tr >
                                    <td class="heading-table-left">
                                        <?php echo app('translator')->get('Project Coordinator'); ?></td>
                                    <td class="heading-table-right">
                                    <?php $__currentLoopData = $projectid->members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php echo e($item->user->name); ?> <br/>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="heading-table-left">
                                        <?php echo app('translator')->get('Vendor'); ?></td>
                                    <td class="heading-table-right"><?php echo e($projectvendor->vendor_name); ?></td>
                                </tr>
                                <tr>
                                    <td class=" heading-table-left">
                                        <?php echo app('translator')->get('Phone'); ?></td>
                                    <td class="border-left-0 heading-table-right"><?php echo e($projectvendor->vendor_phone); ?></td>
                                </tr>
                                <tr>
                                    <td class="heading-table-left">
                                        Email</td>
                                    <td class="heading-table-right"><?php echo e($projectvendor->vendor_email_address); ?></td>
                                </tr>
                                
                            </table>
                            </td> 
                        <tr>
                    </table>     
                    
                </div>
                <div class="pt-2" style="position:relative;">
                    <?php if($projectvendor->accepted_date): ?>
                    <div class="watermark-center">
                        <img src="<?php echo e($base64StringCheck); ?>" width="50" height="50"/>
                        <span style="color:green;">Accepted</span>
                    </div>
                    <?php endif; ?>
                    <?php if($projectvendor->rejected_date): ?>
                    <div class="watermark-center">
                        <img src="<?php echo e($base64StringTimes); ?>" width="50" height="50"/>
                        <span style="color:red;">Accepted</span>
                    </div>
                    <?php endif; ?>
                    <table style="border-collapse: collapse; width: 100%;" >
                        <thead>
                            <tr>
                                <th style="padding: 10px;  text-align: left; width:12.5%;">Work Order #</th>
                                <th style="padding: 10px;  text-align: left; width:12.5%;">Priority</th>
                                <th style="padding: 10px;  text-align: left; width:12.5%;">Project Type</th>
                                <th style="padding: 10px;  text-align: left; width:12.5%;">Street Address</th>
                                <?php if($projectid->propertyDetails->optional): ?>
                                        <th style="padding: 10px;  text-align: left; width:12.5%;">Suite # / House #</th>
                                <?php endif; ?>
                                <th style="padding: 10px;  text-align: left; width:12.5%;">City</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="padding: 10px;  width:12.5%;"><?php echo e($projectid->project_short_code); ?></td>
                                <td style="padding: 10px;  width:12.5%;"><?php echo e($projectid->priority); ?></td>
                                <td style="padding: 10px;  width:12.5%;"><?php echo e($projectvendor->project_type); ?></td>
                                <td style="padding: 10px;  width:12.5%;"><?php echo e($projectid->propertyDetails->street_address); ?></td>
                                <?php if($projectid->propertyDetails->optional): ?>
                                        <td style="padding: 10px;  width:12.5%;"><?php echo e($projectid->propertyDetails->optional); ?></td>
                                <?php endif; ?>
                                <td style="padding: 10px;  width:12.5%;"><?php echo e($projectid->propertyDetails->city); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                    
                    <!-- Second row with 2 columns -->
                    <div class="pt-2">
                        <table style="border-collapse: collapse; width: 100%;">
                            <thead>
                                <tr>
                                    <th style="padding: 10px;  text-align: left; width:12.5%;">State</th>
                                    <th style="padding: 10px;  text-align: left; width:12.5%;">Zipcode</th>
                                    <th style="padding: 10px;  text-align: left; width:12.5%;">County</th>
                                    <th style="padding: 10px;  text-align: left; width:12.5%;">Project Category</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="padding: 10px;  width:12.5%;"><?php echo e($projectid->propertyDetails->state); ?></td>
                                    <td style="padding: 10px;  width:12.5%;"><?php echo e($projectid->propertyDetails->zipcode); ?></td>
                                    <td style="padding: 10px;  width:12.5%;"><?php echo e($projectid->propertyDetails->county); ?></td>
                                    <td style="padding: 10px;  width:12.5%;"><?php echo e($projectid->category?->category_name); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="pt-2">
                        <table style="border-collapse: collapse; width: 100%;">
                            <thead>
                                <tr>
                                    <th style="padding: 10px;  text-align: left; width:12.5%;">Project Sub-Category</th>
                                    <th style="padding: 10px;  text-align: left; width:12.5%;">Property Type</th>
                                    <th style="padding: 10px;  text-align: left; width: 12.5%;">Bedrooms</th>
                                    <th style="padding: 10px;  text-align: left; width: 12.5%;">Bathrooms</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="padding: 10px;  width:12.5%;"><?php echo e($projectid->sub_category); ?></td>
                                    <td style="padding: 10px;  width:12.5%;"><?php echo e($projectid->propertyDetails->property_type); ?></td>
                                    <td style="padding: 10px; "><?php echo e($projectid->propertyDetails->bedrooms); ?></td>
                                    <td style="padding: 10px; "><?php echo e($projectid->propertyDetails->bathrooms); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <hr class="custom-line">
                    <div class="row">
                        <table style="border-collapse: collapse; width: 100%; margin-top: 5px;">
                            <thead>
                                <tr>
                                    <th style="padding: 10px;  text-align: left; width: 33.33%;">Project Date</th>
                                    <th style="padding: 10px;  text-align: left; width: 33.33%;">Due Date</th>
                                    <th style="padding: 10px;  text-align: left; width: 33.33%;">Project Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="padding: 10px; "><?php echo e($projectid->start_date->translatedFormat($company->date_format)); ?></td>
                                    <td style="padding: 10px; "><?php echo e($projectvendor->due_date->translatedFormat($company->date_format)); ?></td>
                                    <td style="padding: 10px; "><?php echo e(currency_format($projectvendor->project_amount, $contractid->currency->id)); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row mt-2" style="border-collapse: collapse; width: 100%; margin-top: 20px;">
                        <table>
                            <tr>
                                <td class="heading-table-left">Comments</td>
                                <td style="padding: 10px; "><?php echo e($projectvendor->add_notes); ?></td>
                            </tr>
                        </table>
                    </div>
                   
                    <hr class="custom-line">
                    <h5 class="f-13 font-weight-bold mb-4">Scope Of Work:</h5>
                    <?php $__currentLoopData = $projectvendor->sow_id; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div>
                        <table style="border-collapse: collapse; width: 100%; margin-top: 20px;">
                            <thead>
                                <tr>
                                    <th style="padding: 10px; border: 1px solid #ddd; text-align: left; width: 25%;">Category</th>
                                    <th style="padding: 10px; border: 1px solid #ddd; text-align: left; width: 25%;">Sub-Category</th>
                                    <th style="padding: 10px; border: 1px solid #ddd; text-align: left; width: 50%;">Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="padding: 10px; border: 1px solid #ddd;"><?php echo e($projectvendor->sowcategory($sow)); ?></td>
                                    <td style="padding: 10px; border: 1px solid #ddd;"><?php echo e($projectvendor->sowsubcategory($sow)); ?></td>
                                    <td style="padding: 10px; border: 1px solid #ddd;"><?php echo e($projectvendor->sowdescription($sow)); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="page-break"></div>
                    <?php if($projectvendor->changenotification): ?>
                        <?php $__currentLoopData = $projectvendor->changenotification; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $changenotify): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <hr class="custom-line">
                            <h4 class="f-14 font-weight-bold">Change Order - <?php echo e($key+1); ?></h4>
                            <div style="border: 1px solid #000; border-radius: 4px; padding: 0.5rem; position: relative;">
                                 <?php if($changenotify->accepted_date): ?>
                                    <div class="watermark-center">
                                        <img src="<?php echo e($base64StringCheck); ?>" width="50" height="50"/>
                                        <span style="color: green;">Accepted</span>
                                    </div>
                                    <?php endif; ?>
                                    <?php if($changenotify->link_status=='Rejected'): ?>
                                    <div class="watermark-center">
                                        <img src="<?php echo e($base64StringTimes); ?>" width="50" height="50"/>
                                        <span style="color: red;">Rejected</span>
                                    </div>
                                    <?php endif; ?>
                                <table style="border-collapse: collapse; width: 100%; margin-top: 20px;">
                                    <thead style="z-index:1; position:relative;">
                                        <tr>
                                            <th style="padding: 10px;  text-align: left; width: 33.33%;">Project Type</th>
                                            <th style="padding: 10px;  text-align: left; width: 33.33%;">Project Amount</th>
                                            <th style="padding: 10px;  text-align: left; width: 33.33%;">Due Date</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody style="z-index:1; position:relative;">
                                        <tr>
                                            <td style="padding: 10px; "><?php echo e($changenotify->project_type); ?></td>
                                            <td style="padding: 10px; "><?php echo e(currency_format($changenotify->project_amount, $contractid->currency->id)); ?></td>
                                            <td style="padding: 10px; "><?php echo e($changenotify->due_date->translatedFormat($company->date_format)); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                               
                                <h5 class="f-14 font-weight-bold">Scope Of Work:</h5>
                                <?php $__currentLoopData = $changenotify->sow_id; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <table style="border-collapse: collapse; width: 100%; margin-top: 20px;">
                                    <thead>
                                        <tr>
                                            <th style="padding: 10px; border: 1px solid #ddd; text-align: left; width: 25%;">Category</th>
                                            <th style="padding: 10px; border: 1px solid #ddd; text-align: left; width: 25%;">Sub-Category</th>
                                            <th style="padding: 10px; border: 1px solid #ddd; text-align: left; width: 50%;">Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="padding: 10px; border: 1px solid #ddd;"><?php echo e($changenotify->sow($sow)->category); ?></td>
                                            <td style="padding: 10px; border: 1px solid #ddd;"><?php echo e($changenotify->sow($sow)->sub_category); ?></td>
                                            <td style="padding: 10px; border: 1px solid #ddd;"><?php echo e($changenotify->sow($sow)->description); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <div class="row mt-2">
                                    <div class="col-md-2 col-12 grid-item">
                                        <h5 class="f-13 font-weight-bold">Comments</h5>
                                    </div>
                                    <div class="col-md-5 col-12 grid-item">
                                        <p>
                                            <?php echo e($changenotify->add_notes); ?>

                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    <hr class="custom-line">
                    <h5 class="f-13 font-weight-bold mb-4">WORK ORDER INSTRUCTIONS: PLEASE READ CAREFULLY:</h5>
                    <div><?php echo $contractid->contract_detail; ?></div>

                    <hr class="mt-1 mb-1">
                    <?php if($vendorid->contract_sign&&$projectvendor->accepted_date): ?>
                        <div style="text-align: left; margin-top: 10px">
                            <h4 class="name" style="margin-bottom: 20px;"><?php echo app('translator')->get('Vendor Signature'); ?></h4>
                            <img src="<?php echo e($vendorid->secondary_image_url); ?>" style="width: 200px;">
                            <p>Vendor Name:- <?php echo e($vendorid->vendor_name); ?><br>
                            Company Name:- <?php echo e($vendorid->company_name); ?><br>
                            Date:- <?php echo e($projectvendor->accepted_date->translatedFormat($company->date_format)); ?>

                            </p>
                        </div>
                    <?php endif; ?>

                    <?php if($vendorid->company_sign&&$projectvendor->accepted_date): ?>
                        <div style="text-align: right; margin-top: -240px">
                            <h4 class="name" style="margin-bottom: 20px;"><?php echo app('translator')->get('Company Signature'); ?></h4>
                            <img src="<?php echo e($vendorid->tertiary_image_url); ?>" style="width: 200px;"><br>
                            <p>Company Name:- <?php echo e($company->company_name); ?><br>
                                Date:- <?php echo e($projectvendor->accepted_date->translatedFormat($company->date_format)); ?><br>
                            </p>
                        </div>
                    <?php endif; ?>
                
            </div>

</body>

</html>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/projects/vendors/contract-pdf.blade.php ENDPATH**/ ?>