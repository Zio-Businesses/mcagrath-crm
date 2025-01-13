<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?php echo e(asset('vendor/css/all.min.css')); ?>">

    <!-- Simple Line Icons -->
    <link rel="stylesheet" href="<?php echo e(asset('vendor/css/simple-line-icons.css')); ?>">

    <!-- Template CSS -->
    <link type="text/css" rel="stylesheet" media="all" href="<?php echo e(asset('css/main.css')); ?>">

    <title><?php echo app('translator')->get($pageTitle); ?></title>
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e($company->favicon_url); ?>">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo e($company->favicon_url); ?>">
    <meta name="theme-color" content="#ffffff">

    <?php echo $__env->make('sections.theme_css', ['company' => $company], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php if(isset($activeSettingMenu)): ?>
        <style>
            .preloader-container {
                margin-left: 510px;
                width: calc(100% - 510px)
            }

        </style>
    <?php endif; ?>

    <?php echo $__env->yieldPushContent('styles'); ?>

    <style>
        :root {
            --fc-border-color: #E8EEF3;
            --fc-button-text-color: #99A5B5;
            --fc-button-border-color: #99A5B5;
            --fc-button-bg-color: #ffffff;
            --fc-button-active-bg-color: #171f29;
            --fc-today-bg-color: #f2f4f7;
        }

        .preloader-container {
            height: 100vh;
            width: 100%;
            margin-left: 0;
            margin-top: 0;
        }

        .fc a[data-navlink] {
            color: #99a5b5;
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
        
        .watermark-center {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            opacity: 0.2;
            font-size: 3rem;
            pointer-events: none;
            
        }
        .watermark-center i {
            font-size: 4rem; /* Make the tick symbol larger */
            display: block;
        }
        .btn-xs {
            padding: .50rem .4rem;
            font-size: .875rem;
            border-radius: .2rem;
        }

    </style>
    


    <script src="<?php echo e(asset('vendor/jquery/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/jquery/modernizr.min.js')); ?>"></script>

    <script>
        var checkMiniSidebar = localStorage.getItem("mini-sidebar");

    </script>

</head>

<body id="body" class="h-100 bg-additional-grey">

<div class="content-wrapper container">

    <div class="card border-0 invoice">
        <!-- CARD BODY START -->
        <div class="card-body">
            <div class="d-lg-flex flex-col">
                <div class="d-lg-flex flex-col col-lg-8 pl-0">
                    <div class="d-flex justify-content-center align-items-center ">
                        <img src="<?php echo e($company->dark_logo_url); ?>" alt="<?php echo e($company->company_name); ?>" style="height:160px; width:120px;" class="rounded-left" />
                    </div>
                    <div class="d-flex justify-content-center align-items-center ml-lg-2 rounded light-grey-border-div mt-2 mt-sm-0">
                        <p class="py-2 ml-3 pr-5 mb-0 font-weight-bold lh-base">
                            <?php echo e($company->company_name); ?><br>
                            <?php echo nl2br($company->defaultAddress->address); ?><br>
                            Phone #: <?php echo e($company->company_phone); ?><br>
                            Email: <a href="<?php echo e($company->website); ?>"><?php echo e($company->company_email); ?></a><br>
                            Website: <a href="<?php echo e($company->website); ?>"><?php echo e($company->website); ?></a>
                        </p>
                    </div>
                </div>
                <table class="text-dark f-13 mt-3 mt-sm-0 table-borderless pb-3 mr-4 w-sm-100 w-50" style="height:100px;">
                    <tr class="">
                        <td class="border-right-0 font-weight-bold">
                            <?php echo app('translator')->get('Assigned Date'); ?></td>
                        <td class="border-left-0 pl-2"><?php echo e($projectvendor->created_at->translatedFormat($company->date_format)); ?></td>
                    </tr>
                    <tr >
                        <td class="border-right-0 font-weight-bold">
                            <?php echo app('translator')->get('Project Coordinator'); ?></td>
                        <td class="border-left-0 pl-2 py-2">
                        <?php $__currentLoopData = $projectid->members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo e($item->user->name); ?> <br/>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="border-right-0 font-weight-bold">
                            <?php echo app('translator')->get('Vendor'); ?></td>
                        <td class="border-left-0 pl-2"><?php echo e($projectvendor->vendor_name); ?></td>
                    </tr>
                    <tr>
                        <td class="border-right-0 font-weight-bold">
                            <?php echo app('translator')->get('Phone'); ?></td>
                        <td class="border-left-0 pl-2"><?php echo e($projectvendor->vendor_phone); ?></td>
                    </tr>
                    <tr>
                        <td class="border-right-0 font-weight-bold">
                            Email</td>
                        <td class="border-left-0 pl-2"><?php echo e($projectvendor->vendor_email_address); ?></td>
                    </tr>
                    
                </table>
            </div>
            <div class="mt-3 position-relative">
                <?php if($projectvendor->accepted_date): ?>
                <div class="watermark-center">
                    <i class="fa fa-check-circle"></i> 
                    <span>Accepted</span>
                </div>
                <?php endif; ?>
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-12 grid-item">
                        <h5 class="f-13 font-weight-bold">Work Order #</h5>
                        <p><?php echo e($projectid->project_short_code); ?></p>
                    </div>
                    <div class="col-md-3 col-sm-6 col-12 grid-item">
                        <h5 class="f-13 font-weight-bold">Priority</h5>
                        <p><?php echo e($projectid->priority); ?></p>
                    </div>
                    <div class="col-md-3 col-sm-6 col-12 grid-item">
                        <h5 class="f-13 font-weight-bold">Project Type</h5>
                        <p><?php echo e($projectvendor->project_type); ?></p>
                    </div>
                    <div class="col-md-3 col-sm-6 col-12 grid-item">
                        <h5 class="f-13 font-weight-bold">Street Address</h5>
                        <p><?php echo e($projectid->propertyDetails->street_address); ?></p>
                    </div>
                </div>
                
                <!-- Second row with 2 columns -->
                <div class="row">
                    <?php if($projectid->propertyDetails->optional): ?>
                        <div class="col-md-3 col-12 grid-item">
                            <h5 class="f-13 font-weight-bold">Suite # / House #</h5>
                            <p><?php echo e($projectid->propertyDetails->optional); ?></p>
                        </div>
                    <?php endif; ?>
                    <div class="col-md-3 col-12 grid-item">
                        <h5 class="f-13 font-weight-bold">City</h5>
                        <p><?php echo e($projectid->propertyDetails->city); ?></p>
                    </div>
                    <div class="col-md-3 col-12 grid-item">
                        <h5 class="f-13 font-weight-bold">State</h5>
                        <p><?php echo e($projectid->propertyDetails->state); ?></p>
                    </div>    
                    <div class="col-md-3 col-12 grid-item">
                        <h5 class="f-13 font-weight-bold">Zipcode</h5>
                        <p><?php echo e($projectid->propertyDetails->zipcode); ?></p>
                    </div>
                    <div class="col-md-3 col-12 grid-item">
                        <h5 class="f-13 font-weight-bold">County</h5>
                        <p><?php echo e($projectid->propertyDetails->county); ?></p>
                    </div>
                    <div class="col-md-3 col-12 grid-item">
                        <h5 class="f-13 font-weight-bold">Project Category</h5>
                        <p><?php echo e($projectid->category->category_name); ?></p>
                    </div>
                    <div class="col-md-3 col-12 grid-item">
                        <h5 class="f-13 font-weight-bold">Project Sub-Category</h5>
                        <p><?php echo e($projectid->sub_category); ?></p>
                    </div>
                    <div class="col-md-3 col-sm-6 col-12 grid-item">
                        <h5 class="f-13 font-weight-bold">Property Type</h5>
                        <p><?php echo e($projectid->propertyDetails->property_type); ?></p>
                    </div>
                </div>
                
                <!-- Third row with 3 columns -->
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-12 grid-item">
                        <h5 class="f-13 font-weight-bold">Bedrooms</h5>
                        <p><?php echo e($projectid->propertyDetails->bedrooms); ?></p>
                    </div>
                    <div class="col-md-3 col-sm-6 col-12 grid-item">
                        <h5 class="f-13 font-weight-bold">Bathrooms</h5>
                        <p><?php echo e($projectid->propertyDetails->bathrooms); ?></p>
                    </div>
                </div>
                <hr class="custom-line">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-12 grid-item">
                        <h5 class="f-13 font-weight-bold">Project Date</h5>
                        <p><?php echo e($projectid->start_date->translatedFormat($company->date_format)); ?></p>
                    </div>
                    <div class="col-md-3 col-sm-6 col-12 grid-item">
                        <h5 class="f-13 font-weight-bold">Due Date</h5>
                        <p><?php echo e($projectvendor->due_date->translatedFormat($company->date_format)); ?></p>
                    </div>
                    <div class="col-md-3 col-sm-6 col-12 grid-item">
                        <h5 class="f-13 font-weight-bold">Project Amount</h5>
                        <p><?php echo e(currency_format($projectvendor->project_amount, $contractid->currency->id)); ?></p>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-2 col-12 grid-item">
                        <h5 class="f-13 font-weight-bold">Comments</h5>
                    </div>
                    <div class="col-md-5 col-12 grid-item">
                        <p>
                        <?php echo e($projectvendor->add_notes); ?>

                        </p>
                    </div>
                </div>
                <hr class="custom-line">
                <h5 class="f-13 font-weight-bold mb-4">Scope Of Work:</h5>
                <?php $__currentLoopData = $projectvendor->sow_id; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-12 grid-item">
                        <h5 class="f-13 font-weight-bold">Catgeory</h5>
                        <p><?php echo e($projectvendor->sowcategory($sow)); ?></p>
                    </div>
                    <div class="col-md-3 col-sm-6 col-12 grid-item">
                        <h5 class="f-13 font-weight-bold">Sub-Category</h5>
                        <p><?php echo e($projectvendor->sowsubcategory($sow)); ?></p>
                    </div>
                    <div class="col-md-6 col-sm-6 col-12 grid-item">
                        <h5 class="f-13 font-weight-bold">Description</h5>
                        <p><?php echo e($projectvendor->sowdescription($sow)); ?></p>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div>
                <?php if($projectvendor->changenotification): ?>
                    <?php $__currentLoopData = $projectvendor->changenotification; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $changenotify): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <hr class="custom-line">
                        <h4 class="f-14 font-weight-bold">Change Order - <?php echo e($key+1); ?></h4>
                        <div class="border rounded border-dark p-2 position-relative">
                            <!-- Watermark -->
                            <?php if($changenotify->accepted_date): ?>
                            <div class="watermark-center">
                                <i class="fa fa-check-circle" style="color: green;"></i> 
                                <span style="color: green;">Accepted</span>
                            </div>
                            <?php endif; ?>
                            <?php if($changenotify->link_status=='Rejected'): ?>
                            <div class="watermark-center">
                                <i class="fa fa-times-circle" style="color: red;"></i> 
                                <span style="color: red;">Rejected</span>
                            </div>
                            <?php endif; ?>
                            <!-- Content Layer -->
                            <div class="row">
                                <div class="col-md-3 col-sm-6 col-12 grid-item">
                                    <h5 class="f-13 font-weight-bold">Project Type</h5>
                                    <p><?php echo e($changenotify->project_type); ?></p>
                                </div>
                                <div class="col-md-3 col-sm-6 col-12 grid-item">
                                    <h5 class="f-13 font-weight-bold">Project Amount</h5>
                                    <p><?php echo e(currency_format($changenotify->project_amount, $contractid->currency->id)); ?></p>
                                </div>
                                <div class="col-md-3 col-sm-6 col-12 grid-item">
                                    <h5 class="f-13 font-weight-bold">Due Date</h5>
                                    <p><?php echo e($changenotify->due_date->translatedFormat($company->date_format)); ?></p>
                                </div>
                            </div>
                            <h5 class="f-13 font-weight-bold mb-4">Scope Of Work:</h5>
                            <?php $__currentLoopData = $changenotify->sow_id; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="row">
                                <div class="col-md-3 col-sm-6 col-12 grid-item">
                                    <h5 class="f-13 font-weight-bold">Category</h5>
                                    <p><?php echo e($changenotify->sow($sow)->category); ?></p>
                                </div>
                                <div class="col-md-3 col-sm-6 col-12 grid-item">
                                    <h5 class="f-13 font-weight-bold">Sub-Category</h5>
                                    <p><?php echo e($changenotify->sow($sow)->sub_category); ?></p>
                                </div>
                                <div class="col-md-6 col-sm-6 col-12 grid-item">
                                    <h5 class="f-13 font-weight-bold">Description</h5>
                                    <p><?php echo e($changenotify->sow($sow)->description); ?></p>
                                </div>
                            </div>
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
                            <?php if(!($changenotify->rejected_date) && !($changenotify->accepted_date)): ?>
                            <div class="card-footer bg-white border-0 d-flex justify-content-end py-0 py-lg-4 py-md-4 mb-4 mb-lg-3 mb-md-3 ">
                                <a class="btn btn-success m-2 accept-notify btn-xs" href="javascript:;"
                                    data-row-id="<?php echo e($changenotify->id); ?>">
                                    <i class="fa fa-check mr-2"></i>
                                    <?php echo app('translator')->get('Accept'); ?>
                                </a>
                                <a class="btn btn-danger m-2 reject-notify btn-xs" href="javascript:;"
                                    data-row-id="<?php echo e($changenotify->id); ?>">
                                    <i class="fa fa-times mr-2"></i>
                                    <?php echo app('translator')->get('Reject'); ?>
                                </a>
                            </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                <hr class="custom-line">
                <!--<h5 class="f-13 font-weight-bold mb-4">WORK ORDER INSTRUCTIONS: PLEASE READ CAREFULLY:</h5>-->
                <div class="ql-editor p-0 pb-3"><?php echo $contractid->contract_detail; ?></div>
            </div>
            
        </div>
        <!-- CARD BODY END -->

        <!-- CARD FOOTER START -->
        
        <div class="card-footer bg-white border-0 d-flex justify-content-end py-0 py-lg-4 py-md-4 mb-4 mb-lg-3 mb-md-3 ">
            <?php if(!($projectvendor->rejected_date) && !($projectvendor->accepted_date)): ?>
            <?php if (isset($component)) { $__componentOriginal5586a837a5f7371c36d53423ae34c509 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5586a837a5f7371c36d53423ae34c509 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.button-success','data' => ['class' => 'border-0 mr-3 mb-2','id' => 'accept','icon' => 'check']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-success'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'border-0 mr-3 mb-2','id' => 'accept','icon' => 'check']); ?>Accept
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5586a837a5f7371c36d53423ae34c509)): ?>
<?php $attributes = $__attributesOriginal5586a837a5f7371c36d53423ae34c509; ?>
<?php unset($__attributesOriginal5586a837a5f7371c36d53423ae34c509); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5586a837a5f7371c36d53423ae34c509)): ?>
<?php $component = $__componentOriginal5586a837a5f7371c36d53423ae34c509; ?>
<?php unset($__componentOriginal5586a837a5f7371c36d53423ae34c509); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginal5586a837a5f7371c36d53423ae34c509 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5586a837a5f7371c36d53423ae34c509 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.button-success','data' => ['id' => 'cancel','class' => 'border-0 mr-3 mb-2 btn btn-danger','icon' => 'times']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-success'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'cancel','class' => 'border-0 mr-3 mb-2 btn btn-danger','icon' => 'times']); ?>Reject
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5586a837a5f7371c36d53423ae34c509)): ?>
<?php $attributes = $__attributesOriginal5586a837a5f7371c36d53423ae34c509; ?>
<?php unset($__attributesOriginal5586a837a5f7371c36d53423ae34c509); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5586a837a5f7371c36d53423ae34c509)): ?>
<?php $component = $__componentOriginal5586a837a5f7371c36d53423ae34c509; ?>
<?php unset($__componentOriginal5586a837a5f7371c36d53423ae34c509); ?>
<?php endif; ?>
            <?php endif; ?>
          
        </div>
       
        <!-- CARD FOOTER END -->
    </div>
    <!-- INVOICE CARD END -->

</div>

<!-- Global Required Javascript -->
<script src="<?php echo e(asset('js/main.js')); ?>"></script>

<script>

    $('#accept').click(function () {
    var token="<?php echo e(csrf_token()); ?>";
    var data="<?php echo e($projectvendor->id); ?>";
    $.easyAjax({
        url: "<?php echo e(route('front.wo.store')); ?>",
        type: "POST",
        blockUI: true,
        data: {
                '_token': token,
                'data':data,
                'action':'accept'
              },
        success: function(response) {
            setTimeout(() => {
                    window.location.reload();
                   }, 1000);
        },
    });
    });
    $('body').on('click', '.accept-notify', function() {
    var token="<?php echo e(csrf_token()); ?>";
    var id = $(this).data('row-id');
        $.easyAjax({
            url: "<?php echo e(route('front.wo.changenotifystore')); ?>",
            type: "POST",
            blockUI: true,
            data: {
                    '_token': token,
                    'data':id,
                    'action':'accept'
                },
            success: function(response) {
                setTimeout(() => {
                        window.location.reload();
                    }, 1000);
            },
        });
    });
    $('body').on('click', '.reject-notify', function() {
    var token="<?php echo e(csrf_token()); ?>";
    var id = $(this).data('row-id');
    $.easyAjax({
        url: "<?php echo e(route('front.wo.changenotifystore')); ?>",
        type: "POST",
        blockUI: true,
        data: {
                '_token': token,
                'data':id,
                'action':'reject'
              },
        success: function(response) {
            setTimeout(() => {
                    window.location.reload();
                   }, 1000);
        },
    });
    });
    $('#cancel').click(function () {
    var token="<?php echo e(csrf_token()); ?>";
    var data="<?php echo e($projectvendor->id); ?>";
    $.easyAjax({
        url: "<?php echo e(route('front.wo.store')); ?>",
        type: "POST",
        blockUI: true,
        data: {
                '_token': token,
                'data':data,
                'action':'reject'
              },
        success: function(response) {
            setTimeout(() => {
                    window.location.reload();
                   }, 1000);
        },
    });
    });
</script>


</body>

</html>
<?php /**PATH C:\laragon\www\public_html\resources\views/workorder.blade.php ENDPATH**/ ?>