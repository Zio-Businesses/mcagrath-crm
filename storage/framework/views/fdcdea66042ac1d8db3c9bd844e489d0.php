<div class="chartHeading mt-3 bg-white text-capitalize d-flex justify-content-between p-20 rounded-top">
    <h3 class="f-21 f-w-500 mb-0"><?php echo app('translator')->get('modules.department.dragAndDrop'); ?></h3>
</div>

<div id="dragRoot" >
    <?php $__currentLoopData = $designations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $designation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <ul>
                <li value="<?php echo e($designation->id); ?>" >
                        <span id="<?php echo e($designation->id); ?>" class="node-cpe">&rightarrow; <?php echo e($designation->name); ?></span>
                    <?php if($designation->childs): ?>
                        <?php echo $__env->make('designations-hierarchy.manage_hierarchy', [
                            'childs' => $designation->childs,'parent_id' => $designation->id
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                </li>
            </ul>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <ul id="pre-state"></ul>
    <ul id="drophere" ondragstart="return false;" ondrop="return false;">
        <li ><span id="NewNode" class="node-cpe"><?php echo app('translator')->get('app.newHierarchy'); ?></span></span></li>
    </ul>
</div>
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\designations-hierarchy\chart_tree.blade.php ENDPATH**/ ?>