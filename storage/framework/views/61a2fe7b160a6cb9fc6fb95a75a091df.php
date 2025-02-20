<?php $__env->startComponent('mail::message'); ?>
# <?php echo e(\Carbon\Carbon::parse('01-' . $month . '-' . now()->year)->translatedFormat('F-Y')); ?> <?php echo app('translator')->get('app.menu.attendanceReport'); ?>

<?php $__env->startComponent('mail::text', ['text' => __('email.attendanceReport.text')]); ?>

<?php echo $__env->renderComponent(); ?>

<?php echo app('translator')->get('email.regards'); ?>,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/mail/attendance/monthly-report.blade.php ENDPATH**/ ?>