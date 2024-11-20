<label <?php echo e($attributes->merge(['class' => 'f-14 text-dark-grey mb-12'])); ?> data-label="<?php echo e($fieldRequired); ?>" for="<?php echo e($fieldId); ?>"><?php echo $fieldLabel ?? '&nbsp;'; ?>

    <?php if($fieldRequired == 'true'): ?>
        <sup class="f-14 mr-1">*</sup>
    <?php endif; ?>

    <?php if(!is_null($popover)): ?>
        <i class="fa fa-question-circle" data-toggle="popover" data-placement="top" data-content="<?php echo e($popover); ?>" data-html="true" data-trigger="hover"></i>
    <?php endif; ?>
</label>
<?php /**PATH C:\xampp\htdocs\public_html\resources\views/components/forms/label.blade.php ENDPATH**/ ?>