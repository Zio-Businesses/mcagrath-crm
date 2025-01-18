<?php $__env->startComponent('mail::message'); ?>
# <?php echo app('translator')->get('email.hello'); ?><?php if(!empty($notifiableName)): ?><?php echo e(' '.$notifiableName); ?><?php endif; ?>!

<?php $__env->startComponent('mail::text', ['text' => $content]); ?>

<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('mail::button', ['url' => $url, 'themeColor' => $themeColor]); ?>
<?php echo app('translator')->get('app.viewProject'); ?>
<?php echo $__env->renderComponent(); ?>

<?php echo app('translator')->get('email.regards'); ?>,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\mail\project\created.blade.php ENDPATH**/ ?>