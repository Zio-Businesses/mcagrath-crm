<table <?php echo e($attributes->merge(['class' => 'table', 'id' => 'example' ])); ?>>
    <?php if(isset($thead)): ?>
        <thead class="<?php echo e($headType); ?>">
            <tr>
                <?php echo $thead; ?>

            </tr>
        </thead>
    <?php endif; ?>
    <tbody>
        <?php echo e($slot); ?>

    </tbody>
</table>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/components/table.blade.php ENDPATH**/ ?>