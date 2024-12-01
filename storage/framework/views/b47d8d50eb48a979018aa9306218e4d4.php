<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e($globalSetting->favicon_url); ?>">
    <link rel="manifest" href="<?php echo e($globalSetting->favicon_url); ?>">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo e($globalSetting->favicon_url); ?>">
    <meta name="theme-color" content="#ffffff">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?php echo e(asset('vendor/css/all.min.css')); ?>" defer="defer">

    <!-- Template CSS -->
    <link href="<?php echo e(asset('vendor/froiden-helper/helper.css')); ?>" rel="stylesheet" defer="defer">
    <link type="text/css" rel="stylesheet" media="all" href="<?php echo e(asset('css/main.css')); ?>">

    <title><?php echo e($globalSetting->global_app_name); ?></title>


    <?php echo $__env->yieldPushContent('styles'); ?>
    <script src="<?php echo e(asset('vendor/jquery/jquery.min.js')); ?>"></script>

    <style defer="defer">
        .login_header {
            background-color: <?php echo e($globalSetting->logo_background_color); ?>      !important;
        }

    </style>
    <?php echo $__env->make('sections.theme_css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if(file_exists(public_path().'/css/login-custom.css')): ?>
        <link href="<?php echo e(asset('css/login-custom.css')); ?>" rel="stylesheet">
    <?php endif; ?>

    <?php if($globalSetting->sidebar_logo_style == 'full'): ?>
        <style>
            .login_header img {
                max-width: unset;
            }
        </style>
    <?php endif; ?>

</head>

<body class="<?php echo e($globalSetting->auth_theme == 'dark' ? 'dark-theme' : ''); ?>">

<header class="sticky-top d-flex justify-content-center align-items-center login_header bg-white px-4">
    <img class="mr-2 rounded" src="<?php echo e($globalSetting->logo_url); ?>" alt="Logo"/>
    <?php if($globalSetting->sidebar_logo_style != 'full'): ?>
        <h3 class="mb-0 pl-1 <?php echo e($globalSetting->auth_theme_text == 'light' ? ($globalSetting->auth_theme == 'dark' ? 'text-dark' : 'text-white') : ''); ?>"><?php echo e($globalSetting->global_app_name ?? $globalSetting->app_name); ?></h3>
    <?php endif; ?>
</header>


<section class="bg-grey py-5 login_section"  <?php if($globalSetting->login_background_url): ?> style="background: url('<?php echo e($globalSetting->login_background_url); ?>') center center/cover no-repeat;" <?php endif; ?>>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">

                <div class="login_box mx-auto rounded bg-white text-center">
                    <?php echo e($slot); ?>

                </div>

                <?php echo e($outsideLoginBox ?? ''); ?>


                <?php if($languages->count() >1): ?>
                    <div class="my-3 d-flex flex-column flex-grow-1">
                        <div class="align-items-center flex-grow-1">
                            <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span class="my-10 f-12 mx-1 ">
                                <a href="javascript:;" class="text-dark-grey my-2 change-lang"
                                   data-lang="<?php echo e($language->language_code); ?>">
                                    <span
                                        class='flag-icon flag-icon-<?php echo e(($language->flag_code == 'en') ? 'gb' : $language->flag_code); ?> flag-icon-squared'></span>
                                    <?php echo e(\App\Models\LanguageSetting::LANGUAGES_TRANS[$language->language_code] ?? $language->language_name); ?>

                                </a>
                            </span>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                <?php endif; ?>


            </div>
        </div>

    </div>

</section>
<!-- Global Required Javascript -->
<script src="<?php echo e(asset('vendor/bootstrap/javascript/bootstrap-native.js')); ?>" defer="defer"></script>

<!-- Font Awesome -->
<script src="<?php echo e(asset('vendor/jquery/all.min.js')); ?>" defer="defer"></script>

<!-- Template JS -->
<script src="<?php echo e(asset('js/main.js')); ?>"></script>
<script>
    document.loading = '<?php echo app('translator')->get('app.loading'); ?>';
    const MODAL_DEFAULT = '#myModalDefault';
    const MODAL_LG = '#myModal';
    const MODAL_XL = '#myModalXl';
    const MODAL_HEADING = '#modelHeading';
    const RIGHT_MODAL = '#task-detail-1';
    const RIGHT_MODAL_CONTENT = '#right-modal-content';
    const RIGHT_MODAL_TITLE = '#right-modal-title';

    const dropifyMessages = {
        default: "<?php echo app('translator')->get('app.dragDrop'); ?>",
        replace: "<?php echo app('translator')->get('app.dragDropReplace'); ?>",
        remove: "<?php echo app('translator')->get('app.remove'); ?>",
        error: "<?php echo app('translator')->get('messages.errorOccured'); ?>",
    };
    $('.change-lang').click(function (event) {
        const locale = $(this).data("lang");
        event.preventDefault();
        let url = "<?php echo e(route('front.changeLang', ':locale')); ?>";
        url = url.replace(':locale', locale);
        $.easyAjax({
            url: url,
            container: '#login-form',
            blockUI:true,
            type: "GET",
            success: function (response) {
                if (response.status === 'success') {
                    window.location.reload();
                }
            }
        })
    });
</script>

<?php echo e($scripts); ?>


</body>

</html>
<?php /**PATH D:\project\main2\crm-main\resources\views/components/auth.blade.php ENDPATH**/ ?>