<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo e(trans('installer_messages.title')); ?></title>
    <link rel="icon" type="image/png" href="<?php echo e(asset('favicon.png')); ?>" sizes="16x16"/>

    <link href="<?php echo e(asset('installer/css/style.min.css')); ?>" rel="stylesheet"/>
    <?php echo $__env->yieldContent('style'); ?>


</head>
<body>
<div class="master">
    <div class="box">
        <div class="header">
           <img src="<?php echo e(asset('img/worksuite-logo.png')); ?>" height="40px" alt="">
            <h1 class="header__title"><?php echo $__env->yieldContent('title'); ?></h1>
        </div>
        <ul class="step">
            <li class="step__divider"></li>
            <li class="step__item <?php echo e(isActive('LaravelInstaller::final')); ?>"><i class="step__icon fa fa-check"></i></li>
            <li class="step__divider"></li>
            <li class="step__item <?php echo e(isActive('LaravelInstaller::permissions')); ?>"><i class="step__icon fa fa-key"></i></li>
            <li class="step__divider"></li>
            <li class="step__item <?php echo e(isActive('LaravelInstaller::requirements')); ?>"><i class="step__icon fa fa-gear"></i></li>
            <li class="step__divider"></li>
            <li class="step__item <?php echo e(isActive('LaravelInstaller::environment')); ?>"><i class="step__icon fa fa-database"></i></li>
            <li class="step__divider"></li>
            <li class="step__item <?php echo e(isActive('LaravelInstaller::welcome')); ?>"><i class="step__icon fa fa-home"></i></li>
            <li class="step__divider"></li>
        </ul>
        <div class="main">
            <?php echo $__env->yieldContent('container'); ?>
        </div>
    </div>
</div>
</body>
<?php echo $__env->yieldContent('scripts'); ?>
</html>
<?php /**PATH C:\laragon\www\public_html\resources\views/vendor/installer/layouts/master.blade.php ENDPATH**/ ?>