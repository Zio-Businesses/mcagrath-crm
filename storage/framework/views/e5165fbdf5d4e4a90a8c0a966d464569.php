<div class="chartHeading mt-3 bg-white text-capitalize d-flex justify-content-between p-20 rounded-top">
    <h3 class="f-21 f-w-500 mb-0"><?php echo app('translator')->get('modules.department.dragAndDrop'); ?></h3>
</div>

<div id="dragRoot" class="pt-3 rounded-bottom">
    <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <ul>
            <li value="<?php echo e($department->id); ?>" >
                <span id="<?php echo e($department->id); ?>" class="node-cpe">&rightarrow; <?php echo e($department->team_name); ?></span>
                <?php if($department->childs): ?>
                    <?php echo $__env->make('departments-hierarchy.manage_hierarchy', [
                        'childs' => $department->childs,'parent_id' => $department->id
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
            </li>
        </ul>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <ul id="pre-state"></ul>
    <ul id="drophere" ondragstart="return false;" ondrop="return false;">
        <li><span id="NewNode" class="node-cpe"><?php echo app('translator')->get('app.newHierarchy'); ?></span></span></li>
    </ul>
</div>
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\departments-hierarchy\chart_tree.blade.php ENDPATH**/ ?>