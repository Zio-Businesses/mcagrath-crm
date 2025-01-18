<a <?php if($active): ?>
    <?php echo e($attributes->merge(['class' => 'nav-item nav-link f-15 active'])); ?>

<?php else: ?>
    <?php echo e($attributes->merge(['class' => 'nav-item nav-link f-15'])); ?>

    <?php endif; ?>
    href="<?php echo e($link); ?>" role="tab" aria-selected="true">
    <?php echo e($slot); ?>

</a>
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\components\tab-item.blade.php ENDPATH**/ ?>