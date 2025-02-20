<?php $__env->startComponent('mail::message'); ?>
# <?php echo app('translator')->get('email.hello'); ?> <?php echo e($name); ?>,
<?php echo app('translator')->get('email.dailyTimelogReport.subject'); ?> <?php echo e(\Carbon\Carbon::parse($date)->translatedFormat('Y-m-d')); ?>


<?php $__env->startComponent('mail::text', ['text' => __('email.dailyTimelogReport.text')]); ?>

<?php echo $__env->renderComponent(); ?>

<?php echo app('translator')->get('email.regards'); ?>,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/mail/timelog/timelog-report.blade.php ENDPATH**/ ?>