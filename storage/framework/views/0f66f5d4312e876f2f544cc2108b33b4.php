<?php $__env->startComponent('mail::message'); ?>
# <?php echo app('translator')->get('email.leave.applied'); ?>

<?php $__env->startComponent('mail::text', ['text' => $content]); ?>

<?php echo $__env->renderComponent(); ?>

<?php if(!empty($url)): ?>
    <?php $__env->startComponent('mail::button', ['url' => $url, 'themeColor' => ((!empty($themeColor)) ? $themeColor : '#1f75cb')]); ?>
    <?php echo e($actionText); ?>

    <?php echo $__env->renderComponent(); ?>
<?php endif; ?>

<?php echo app('translator')->get('email.regards'); ?>,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/mail/leaves/multiple.blade.php ENDPATH**/ ?>