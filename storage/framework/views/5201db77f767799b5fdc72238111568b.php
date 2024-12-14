<?php if(!is_null($gender)): ?>
    <?php if($gender != 'others'): ?>
        <i class="bi bi-gender-<?php echo e($gender); ?>"></i> <?php echo app('translator')->get('app.'.$gender); ?>
    <?php else: ?>
        <i class="bi bi-gender-ambiguous"></i> <?php echo app('translator')->get('app.'.$gender); ?>
    <?php endif; ?>
<?php else: ?>
    --
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\public_html\resources\views/components/gender.blade.php ENDPATH**/ ?>