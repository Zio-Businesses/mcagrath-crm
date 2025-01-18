<?php $__env->startComponent('mail::message'); ?>
# <center> <?php echo app('translator')->get('email.paymentReminder.subject'); ?> </center>

# <?php echo app('translator')->get('app.invoiceDetails'); ?> -

<?php $__env->startComponent('mail::text', ['text' => $content]); ?>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('mail::button', ['url' => $paymentUrl, 'themeColor' => $themeColor]); ?>
    <?php echo app('translator')->get('app.viewInvoices'); ?>
<?php echo $__env->renderComponent(); ?>

<?php echo app('translator')->get('email.regards'); ?>,<br>
    <?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\mail\payment\reminder.blade.php ENDPATH**/ ?>