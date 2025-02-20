<?php $__env->startComponent('mail::message'); ?>
# <?php echo app('translator')->get('email.hello'); ?><?php if(!empty($notifiableName)): ?><?php echo e(' '.$notifiableName); ?><?php endif; ?>!

<?php echo app('translator')->get('email.newTask.mentionSubject'); ?>

# <?php echo app('translator')->get('app.taskDetails'); ?>

<?php $__env->startComponent('mail::text', ['text' => $content]); ?>

<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('mail::button', ['url' => $url, 'themeColor' => $themeColor]); ?>
<?php echo app('translator')->get('app.viewTask'); ?>
<?php echo $__env->renderComponent(); ?>

<?php echo app('translator')->get('email.regards'); ?>,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/mail/task/mention.blade.php ENDPATH**/ ?>