<table>
    <tr>
        <th><?php echo app('translator')->get('app.date'); ?></th>
        <th><?php echo e($startDate . ' ' .__('app.to') . ' ' . $endDate); ?></th>
    </tr>
</table>
<table>
    <tr>
        <th><?php echo app('translator')->get('app.name'); ?></th>
        <th align="right"><?php echo app('translator')->get('modules.timeLogs.totalHours'); ?></th>
    </tr>
    <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($item->name); ?></td>
            <td><?php echo e(intdiv($item->total_minutes, 60)); ?></td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\exports\employee_timelogs.blade.php ENDPATH**/ ?>