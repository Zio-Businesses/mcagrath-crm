<nav class="mb-3">
    <ul class="pagination pagination-sm week-pagination">
        <?php $__currentLoopData = $weekPeriod->toArray(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $date): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li
            class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                'page-item',
                'week-timelog-day',
                'active' => ($timelogDate->toDateString() == $date->toDateString()),
            ]); ?>"
            data-toggle="tooltip" data-original-title="<?php echo e($date->translatedFormat(company()->date_format)); ?>" data-date="<?php echo e($date->toDateString()); ?>">
                <a class="page-link" href="javascript:;"><?php echo e($date->isoFormat('dd')); ?></a>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</nav>
<div class="progress" style="height: 20px;">
    <?php
        $totalDayMinutes = $dateWiseTimelogs->sum('total_minutes');
        $totalDayBreakMinutes = $dateWiseTimelogBreak->sum('total_minutes');
        $totalDayMinutesPercent = ($totalDayMinutes > 0) ? floatval((floatval($totalDayMinutes - $totalDayBreakMinutes)/$totalDayMinutes) * 100) : 0;
    ?>
    <div class="progress-bar bg-primary" role="progressbar" style="width: <?php echo e($totalDayMinutesPercent); ?>%" aria-valuenow="<?php echo e($totalDayMinutesPercent); ?>" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-original-title="<?php echo e(minute_to_hour($totalDayMinutes - $totalDayBreakMinutes)); ?>"></div>

    <div class="progress-bar bg-grey" role="progressbar" style="width: <?php echo e((100 - $totalDayMinutesPercent)); ?>%" aria-valuenow="<?php echo e($totalDayMinutesPercent); ?>" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-original-title="<?php echo e(minute_to_hour($totalDayBreakMinutes)); ?>"></div>
</div>

<div class="d-flex justify-content-between mt-1 text-dark-grey f-12">
    <small><?php echo app('translator')->get('app.duration'); ?>: <?php echo e(minute_to_hour($dateWiseTimelogs->sum('total_minutes') - $dateWiseTimelogBreak->sum('total_minutes'))); ?></small>
    <small><?php echo app('translator')->get('modules.timeLogs.break'); ?>: <?php echo e(minute_to_hour($dateWiseTimelogBreak->sum('total_minutes'))); ?></small>
</div>
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\dashboard\employee\week_timelog.blade.php ENDPATH**/ ?>