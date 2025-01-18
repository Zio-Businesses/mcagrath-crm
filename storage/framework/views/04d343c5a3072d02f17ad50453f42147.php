
<div class="bg-white rounded p-2"><table class="table table-bordered table-striped table-hover table-condensed" id="import_table_body">
    <thead>
        <tr>
            <th><?php echo app('translator')->get('app.exceptions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $exceptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exception): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($exception->exception); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table></div>
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\import\import_exception.blade.php ENDPATH**/ ?>