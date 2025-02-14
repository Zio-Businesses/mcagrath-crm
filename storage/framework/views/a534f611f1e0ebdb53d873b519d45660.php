<button type="button" <?php if($disabled): ?>
    disabled
    <?php endif; ?>
    <?php echo e($attributes->merge(['class' => 'btn-secondary rounded f-14 p-2'])); ?>>
    <?php if(!is_null($icon)): ?>
        <i class="fa fa-<?php echo e($icon); ?> mr-1"></i>
    <?php endif; ?>
    <?php echo e($slot); ?>

</button>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/components/forms/button-secondary.blade.php ENDPATH**/ ?>