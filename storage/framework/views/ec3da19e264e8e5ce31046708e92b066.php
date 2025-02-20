<?php $__env->startComponent('mail::message'); ?>
# <?php echo app('translator')->get('email.shiftScheduled.subject'); ?>

<?php $__env->startComponent('mail::table'); ?>
| <?php echo app('translator')->get('app.date'); ?>         | <?php echo app('translator')->get('modules.attendance.shift'); ?>  |
|:------------- | --------:|
<?php $__currentLoopData = $employeeShifts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
| <?php echo e($item->date->translatedFormat($company->date_format) .' ('.$item->date->translatedFormat('l').')'); ?>      | <?php echo e($item->shift->shift_name); ?>      |
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php echo $__env->renderComponent(); ?>

<?php echo app('translator')->get('email.regards'); ?>,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/mail/bulk-shift-email.blade.php ENDPATH**/ ?>