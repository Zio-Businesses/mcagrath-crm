<?php $__env->startComponent('mail::message'); ?>
# <?php echo app('translator')->get('email.hello'); ?><?php if(!empty($notifiableName)): ?><?php echo e(' ' . $notifiableName); ?><?php endif; ?>! <br>
# <?php echo app('translator')->get('modules.tasks.newTask'); ?>

<?php $__env->startComponent('mail::text', ['text' => $content]); ?>

<?php echo $__env->renderComponent(); ?>


<?php echo app('translator')->get('email.regards'); ?>,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/mail/task/task-created-client-notification.blade.php ENDPATH**/ ?>