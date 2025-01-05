<ul id="node-ul-<?php echo e($parent_id); ?>">
    <?php $__currentLoopData = $childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li class="node-sibling-li" value="<?php echo e($child->id); ?>"><i class="icon-hdd"></i> <span id="<?php echo e($child->id); ?>"  class="node-cpe"><?php echo e($child->name); ?></span>

        <?php if($child->childs): ?>
                <?php echo $__env->make('designations-hierarchy.manage_hierarchy',['childs' => $child->childs,'parent_id' => $child->id], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
    </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>

<?php /**PATH C:\laragon\www\public_html\resources\views/designations-hierarchy/manage_hierarchy.blade.php ENDPATH**/ ?>