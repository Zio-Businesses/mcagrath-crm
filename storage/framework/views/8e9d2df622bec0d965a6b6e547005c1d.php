<?php $__env->startComponent('mail::message'); ?>
# <?php echo app('translator')->get('email.hello'); ?><?php if(!empty($notifiableName)): ?><?php echo e(' '.$notifiableName); ?><?php endif; ?>!

<?php if(!empty($content)): ?>

<?php $__env->startComponent('mail::text', ['text' => $content]); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>

<?php if(!empty($url)): ?>
    <?php $__env->startComponent('mail::button', ['url' => $url, 'themeColor' => ((!empty($themeColor)) ? $themeColor : '#1f75cb')]); ?>
    <?php echo e($actionText); ?>

    <?php echo $__env->renderComponent(); ?>
<?php endif; ?>

<?php echo app('translator')->get('email.regards'); ?>,<br>
<?php echo e(config('app.name')); ?><br>
<?php echo e($phone); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\mail\email.blade.php ENDPATH**/ ?>