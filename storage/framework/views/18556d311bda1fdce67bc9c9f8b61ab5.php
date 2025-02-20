$(function(){
    window.<?php echo e(config('datatables-html.namespace', 'LaravelDataTables')); ?> = window.<?php echo e(config('datatables-html.namespace', 'LaravelDataTables')); ?> || {};
    $.ajaxSetup({headers: {'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'}});
    <?php $__currentLoopData = $editors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $editor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        var <?php echo e($editor->instance); ?> = window.<?php echo e(config('datatables-html.namespace', 'LaravelDataTables')); ?>["%1$s-<?php echo e($editor->instance); ?>"] = new $.fn.dataTable.Editor(<?php echo $editor->toJson(); ?>);
        <?php echo $editor->scripts; ?>

        <?php $__currentLoopData = (array) $editor->events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo e($editor->instance); ?>.on('<?php echo $event['event']; ?>', <?php echo $event['script']; ?>);
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    window.<?php echo e(config('datatables-html.namespace', 'LaravelDataTables')); ?>["%1$s"] = $("#%1$s").DataTable(%2$s);
});<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/vendor/datatables/editor.blade.php ENDPATH**/ ?>