window.<?php echo e(config('datatables-html.namespace', 'LaravelDataTables')); ?> = window.<?php echo e(config('datatables-html.namespace', 'LaravelDataTables')); ?> || {};
window.<?php echo e(config('datatables-html.namespace', 'LaravelDataTables')); ?>.options = %2$s
window.<?php echo e(config('datatables-html.namespace', 'LaravelDataTables')); ?>.editors = [];
<?php $__currentLoopData = $editors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $editor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
window.<?php echo e(config('datatables-html.namespace', 'LaravelDataTables')); ?>.editors["<?php echo e($editor->instance); ?>"] = <?php echo $editor->toJson(); ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/vendor/datatables/options.blade.php ENDPATH**/ ?>