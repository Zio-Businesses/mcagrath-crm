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

    <style>
        .logo {
            height: 50px;
        }

    </style>

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

    </style>
    <style>
        #logo {
            height: 50px;
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
            <div class="invoice-table-wrapper">
                <table width="100%" class="">
                    <tr class="inv-logo-heading">
                        <td><img src="<?php echo e($company->logo_url); ?>" alt="<?php echo e($company->company_name); ?>"
                                 class="logo"/></td>
                        <td align="right" class="font-weight-bold f-21 text-dark text-uppercase mt-4 mt-lg-0 mt-md-0">
                            <?php echo app('translator')->get('Wc Waiver Form'); ?></td>
                    </tr>
                    <tr class="inv-num">
                        <td class="f-14 text-dark">
                            <p class="mt-3 mb-0">
                            <?php echo e($company->company_name); ?><br>
                            <?php echo nl2br($company->defaultAddress->address); ?><br>
                            Phone #: <?php echo e($company->company_phone); ?><br>
                            Email: <a href="<?php echo e($company->website); ?>"><?php echo e($company->company_email); ?></a><br>
                            Website: <a href="<?php echo e($company->website); ?>"><?php echo e($company->website); ?></a>
                            </p><br>
                        </td>
                    </tr>
                    <tr>
                        <td height="20"></td>
                    </tr>
                </table>
                <table width="100%">
                    <tr class="inv-unpaid">
                        <td class="f-14 text-dark">
                            <p class="mb-0 text-left"><span
                                    class="text-dark-grey text-capitalize"><?php echo app('translator')->get("app.menu.vendor"); ?></span><br>
                                    <strong><?php echo e($vendorid->vendor_name); ?></strong>
                                <br>
                                <br>
                            </p>
                        </td>
                        <td align="right">
                            
                        </td>
                    </tr>
                    <tr>
                        <td height="30"></td>
                    </tr>
                </table>
            </div>

            <div class="d-flex flex-column">
                <h5><?php echo app('translator')->get('app.subject'); ?></h5>
                <p class="f-15">Wc Waiver Form</p>
                <h5><?php echo app('translator')->get('modules.contracts.notes'); ?></h5>
                <p class="f-15"></p>
                <h5><?php echo app('translator')->get('app.description'); ?></h5>
                <div class="ql-editor p-0 pb-3">
                    <?php echo $templateid->waiver_template; ?>

                    
                </div>
            </div>
        </div>
        <!-- CARD BODY END -->

        <!-- CARD FOOTER START -->
         <?php if($vendorid->waiver_form_status=='Pending'): ?>
        <div class="card-footer bg-white border-0 d-flex justify-content-end py-0 py-lg-4 py-md-4 mb-4 mb-lg-3 mb-md-3 ">
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.button-success','data' => ['id' => 'reject','class' => 'border-0 mr-3 mb-2 btn btn-danger','icon' => 'times']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-success'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'reject','class' => 'border-0 mr-3 mb-2 btn btn-danger','icon' => 'times']); ?>Reject
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
        </div>
        <?php endif; ?>
        <!-- CARD FOOTER END -->
    </div>
</div>

<!-- Global Required Javascript -->
<script src="<?php echo e(asset('js/main.js')); ?>"></script>

<script>
    $('#accept').click(function () {
    var token="<?php echo e(csrf_token()); ?>";
    var data="<?php echo e($vendorid->id); ?>";
    $.easyAjax({
        url: "<?php echo e(route('front.waiver.store')); ?>",
        type: "POST",
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
    $('#reject').click(function () {
    var token="<?php echo e(csrf_token()); ?>";
    var data="<?php echo e($vendorid->id); ?>";
    $.easyAjax({
        url: "<?php echo e(route('front.waiver.store')); ?>",
        type: "POST",
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
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/vendorwaiver.blade.php ENDPATH**/ ?>