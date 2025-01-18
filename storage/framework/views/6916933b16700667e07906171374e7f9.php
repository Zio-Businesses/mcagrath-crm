<?php $__env->startComponent('mail::message'); ?>
# <?php echo app('translator')->get('email.taskReminder.subject'); ?>

<?php echo app('translator')->get('email.reminder.subject'); ?>

<h5><?php echo app('translator')->get('app.taskDetails'); ?></h5>

<?php $__env->startComponent('mail::text', ['text' => $content]); ?>

<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('mail::button', ['url' => $url, 'themeColor' => $themeColor]); ?>
<?php echo app('translator')->get('app.viewTask'); ?>
<?php echo $__env->renderComponent(); ?>

<?php echo app('translator')->get('email.regards'); ?>,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\mail\task\reminder.blade.php ENDPATH**/ ?>