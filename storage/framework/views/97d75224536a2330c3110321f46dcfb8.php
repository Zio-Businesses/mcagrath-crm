<table>
    <thead>
    <tr>
        <th><b>Employee</b></th>
        <?php for($i = 0;$i < count($period);$i++): ?>
            <th colspan="3" style="text-align: center;"  ><b><?php echo e($period[$i]); ?></b></th>
        <?php endfor; ?>
    </tr>
    <tr>
            <th></th>
        <?php $__currentLoopData = $period; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $date): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <th><b>Status</b></th>
            <th><b>Clock In</b></th>
            <th><b>Clock Out</b></th>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tr>
    </thead>
    <tbody>
    <?php for($i = 0;$i < count($a);$i++): ?>
        <tr >
            <?php for($j = 0;$j < count($a[$i]);$j++): ?>
            <td><?php echo e($a[$i][$j]); ?></td>
            <?php endfor; ?>
        </tr>
    <?php endfor; ?>
    </tbody>
</table>
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\exports\attendancebymember.blade.php ENDPATH**/ ?>