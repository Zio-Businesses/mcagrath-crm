<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?php echo e(asset('vendor/css/all.min.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('vendor/css/select2.min.css')); ?>">

    <!-- Simple Line Icons -->
    <link rel="stylesheet" href="<?php echo e(asset('vendor/css/simple-line-icons.css')); ?>">

    <!-- Template CSS -->
    <link type="text/css" rel="stylesheet" media="all" href="<?php echo e(asset('css/main.css')); ?>">
    <link rel='stylesheet' href="<?php echo e(asset('vendor/css/dragula.css')); ?>" type='text/css' />
    <link rel='stylesheet' href="<?php echo e(asset('vendor/css/drag.css')); ?>" type='text/css' />

    <title><?php echo app('translator')->get($pageTitle); ?></title>
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo e(isset($company)?$company->favicon_url:global_setting()->favicon_url); ?>">
    <meta name="theme-color" content="#ffffff">
    <link rel="icon" type="image/png" sizes="16x16"
          href="<?php echo e(isset($company)?$company->favicon_url:global_setting()->favicon_url); ?>">

    <?php echo $__env->make('sections.theme_css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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

        .b-p-tasks {
            min-height: 90%;
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


<body id="body">


<!-- BODY WRAPPER START -->
<div class="body-wrapper clearfix">

    <!-- MAIN CONTAINER START -->
    <section class="bg-additional-grey" id="fullscreen">

        <div class="preloader-container d-flex justify-content-center align-items-center">
            <div class="spinner-border" role="status" aria-hidden="true"></div>
        </div>


        <?php if (isset($component)) { $__componentOriginal000fcba1c6c5a1e4a2897e45738ec35e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal000fcba1c6c5a1e4a2897e45738ec35e = $attributes; } ?>
<?php $component = App\View\Components\AppTitle::resolve(['pageTitle' => $pageTitle] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-title'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppTitle::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'd-block d-lg-none']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal000fcba1c6c5a1e4a2897e45738ec35e)): ?>
<?php $attributes = $__attributesOriginal000fcba1c6c5a1e4a2897e45738ec35e; ?>
<?php unset($__attributesOriginal000fcba1c6c5a1e4a2897e45738ec35e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal000fcba1c6c5a1e4a2897e45738ec35e)): ?>
<?php $component = $__componentOriginal000fcba1c6c5a1e4a2897e45738ec35e; ?>
<?php unset($__componentOriginal000fcba1c6c5a1e4a2897e45738ec35e); ?>
<?php endif; ?>

        <!-- CONTENT WRAPPER START -->
        <div class="content-wrapper">

            <div class="row">
                <div class="col-12 mb-4">
                    <img src="<?php echo e(isset($company)?$company->light_logo_url:global_setting()->light_logo_url); ?>" class="height-35 rounded">
                    <div class="mt-2 f-12 text-dark-grey"><?php echo e(isset($company)?$company->company_name:global_setting()->global_app_name); ?></div>
                </div>
            </div>


            <?php echo $__env->yieldContent('content'); ?>

            <div class="row">
                <div class="col-12 f-11 text-dark-grey">
                    &copy; <?php echo e(now()->year); ?> | <?php echo e(isset($company)?$company->company_name:global_setting()->global_app_name); ?>

                </div>
            </div>
        </div>

    </section>
    <!-- MAIN CONTAINER END -->
</div>
<!-- BODY WRAPPER END -->

<?php if (isset($component)) { $__componentOriginale0a8262e6150e7d50a6bde92df5745d6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale0a8262e6150e7d50a6bde92df5745d6 = $attributes; } ?>
<?php $component = App\View\Components\RightModal::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('right-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\RightModal::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale0a8262e6150e7d50a6bde92df5745d6)): ?>
<?php $attributes = $__attributesOriginale0a8262e6150e7d50a6bde92df5745d6; ?>
<?php unset($__attributesOriginale0a8262e6150e7d50a6bde92df5745d6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale0a8262e6150e7d50a6bde92df5745d6)): ?>
<?php $component = $__componentOriginale0a8262e6150e7d50a6bde92df5745d6; ?>
<?php unset($__componentOriginale0a8262e6150e7d50a6bde92df5745d6); ?>
<?php endif; ?>


<!-- also the modal itself -->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog d-flex justify-content-center align-items-center modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modelHeading">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <?php echo e(__('app.loading')); ?>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn-cancel rounded mr-3" data-dismiss="modal">Close</button>
                <button type="button" class="btn-primary rounded">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Global Required Javascript -->
<script src="<?php echo e(asset('js/main.js')); ?>"></script>

<script>
    const MODAL_DEFAULT = '#myModalDefault';
    const MODAL_LG = '#myModal';
    const MODAL_XL = '#myModalXl';
    const MODAL_HEADING = '#modelHeading';
    const RIGHT_MODAL = '#task-detail-1';
    const RIGHT_MODAL_CONTENT = '#right-modal-content';
    const RIGHT_MODAL_TITLE = '#right-modal-title';
    const company = <?php echo json_encode($company??global_setting(), 15, 512) ?>;
    document.loading = '<?php echo app('translator')->get('app.loading'); ?>';

    const datepickerConfig = {
        formatter: (input, date, instance) => {
            const value = moment(date).format('<?php echo e(global_setting()->moment_date_format); ?>')
            input.value = value
        },
        showAllDates: true,
        customDays: <?php echo json_encode(\App\Models\GlobalSetting::getDaysOfWeek()); ?>,
        customMonths: <?php echo json_encode(\App\Models\GlobalSetting::getMonthsOfYear()); ?>,
        customOverlayMonths: <?php echo json_encode(\App\Models\GlobalSetting::getMonthsOfYear()); ?>,
        overlayButton: "<?php echo app('translator')->get('app.submit'); ?>",
        overlayPlaceholder: "<?php echo app('translator')->get('app.enterYear'); ?>"
    };

    const dropifyMessages = {
        default: '<?php echo app('translator')->get("app.dragDrop"); ?>',
        replace: '<?php echo app('translator')->get("app.dragDropReplace"); ?>',
        remove: '<?php echo app('translator')->get("app.remove"); ?>',
        error: '<?php echo app('translator')->get("app.largeFile"); ?>'
    };
</script>
<script>
    var allowDrag = 'false';
</script>

<?php echo $__env->yieldPushContent('scripts'); ?>

<script>
    $(window).on('load', function() {
        // Animate loader off screen
        init();
        $(".preloader-container").fadeOut("slow", function() {
            $(this).removeClass("d-flex");
        });
    });
</script>

</body>

</html>
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\layouts\public.blade.php ENDPATH**/ ?>