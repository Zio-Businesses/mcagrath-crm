<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>Attendace Report</title>
    <meta name="author" content="Andrés Herrera García">
    <meta name="description" content="PDF de una fotomulta">
    <meta name="keywords" content="fotomulta, comparendo">
    <style>
        table.header {
            width: 100%;
            padding: 0px;
            margin: 0px;
            font-family: 'noto-sans, DejaVu Sans , sans-serif';
            font-size: 12px;
            line-height: 1.4;
            color: #28313c;
            margin-bottom: 20px;
        }

        table.content {
            width: 100%;
            border-spacing: 0;
            padding: 0px;
            margin: 0px;
            font-family: 'noto-sans, DejaVu Sans , sans-serif';
            font-size: 10px;
            line-height: 1.4;
            color: #28313c;
            margin-bottom: 20px;
        }

        .content th, .content td {
            border: 1px solid #cccccc;
            padding: 1px 3px;
            text-align: center;
        }

        .content .row {
            border: 1px solid #DBDBDB;
        }

        #logo {
            height: 50px;
        }

    </style>
</head>

<body>
<table class="header">
    <tr>
        <td><img src="<?php echo e($company->logo_url); ?>" alt="<?php echo e($company->company_name); ?>"
                 id="logo"/></td>
        <td align="right"><?php echo e(\Carbon\Carbon::parse('01-' . $month . '-' . $year)->translatedFormat('F-Y')); ?> <?php echo app('translator')->get('app.menu.attendanceReport'); ?></td>
    </tr>
</table>

<table class="content">
    <thead>
    <tr>
        <th style="vertical-align: middle; text-align: left; max-width: 150px;"><?php echo app('translator')->get('app.employee'); ?></th>
        <?php for($i = 1; $i <= $daysInMonth; $i++): ?>
            <th><?php echo e($i); ?>

                <br> <?php echo e($weekMap[\Carbon\Carbon::parse(\Carbon\Carbon::parse($i . '-' . $month . '-' . $year))->dayOfWeek]); ?>

            </th>
        <?php endfor; ?>
        <th><?php echo app('translator')->get('app.total'); ?></th>
    </tr>
    </thead>

    <tbody>
    <?php
        $totalAbsent = 0;
        $totalLeaves = 0;
        $totalHalfDay = 0;
        $totalHoliday = 0;
        $allPresent = 0;
    ?>
    <?php $__currentLoopData = $employeeAttendence; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $attendance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            $totalPresent = 0;
            $userId = explode('#', $key);
            $userId = $userId[0];
        ?>
        <tr>
            <td style="text-align: left;"> <?php echo end($attendance); ?> </td>
            <?php $__currentLoopData = $attendance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key2 => $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($key2 + 1 <= count($attendance)): ?>
                    <?php
                        $attendanceDate = \Carbon\Carbon::parse($year.'-'.$month.'-'.$key2);
                    ?>
                    <td>
                        <?php if($day == 'Leave'): ?>
                            L
                            <?php
                                $totalLeaves = $totalLeaves + 1;
                            ?>
                        <?php elseif($day == 'Half Day'): ?>
                            HD
                            <?php
                                $totalHalfDay = $totalHalfDay + 1;
                            ?>
                        <?php elseif($day == 'Absent'): ?>
                            <span style="color: #c50909">&times;</span>
                            <?php
                                $totalAbsent = $totalAbsent + 1;
                            ?>
                        <?php elseif($day == 'Holiday'): ?>
                            <span style="color: #FCBD01">&bigstar;</span>
                            <?php
                                $totalHoliday = $totalHoliday + 1;
                            ?>
                        <?php else: ?>
                            <?php if($day != '-'): ?>
                                <?php
                                    $totalPresent = $totalPresent + 1;
                                    $allPresent = $allPresent + 1;
                                ?>
                            <?php endif; ?>

                            <span style="color: green"><?php echo $day; ?></span>
                        <?php endif; ?>
                    </td>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <td><?php echo $totalPresent . ' / ' . (count($attendance) - 1); ?></td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>

<table class="content">
    <tr>
        <td><span style="color: green">&check;</span> &rightarrow; <?php echo app('translator')->get('app.present'); ?></td>
        <td><span style="color: #c50909">&times;</span> &rightarrow; <?php echo app('translator')->get('app.absent'); ?></td>
        <td><span style="color: #FCBD01">&bigstar;</span> &rightarrow; <?php echo app('translator')->get('app.menu.holiday'); ?></td>
    </tr>
    <tr>
        <td><?php echo app('translator')->get('app.totalDays'); ?>: <?php echo e($daysInMonth); ?></td>
        <td><?php echo app('translator')->get('modules.attendance.daysPresent'); ?>: <?php echo e($allPresent); ?></td>
        <td><?php echo app('translator')->get('app.totalAbsent'); ?>: <?php echo e($totalAbsent); ?></td>
    </tr>
    <tr>
        <td><?php echo app('translator')->get('app.totalLeave'); ?> : <?php echo e($totalLeaves); ?></td>
        <td><?php echo app('translator')->get('app.totalHalfDayLeave'); ?> : <?php echo e($totalHalfDay); ?></td>
        <td>
            <span>L</span> &rightarrow; <?php echo app('translator')->get('app.menu.leaves'); ?>
        </td>
    </tr>
</table>

<table class="content">
    <thead>
    <tr>
        <th style="vertical-align: middle; text-align: left; max-width: 150px;"><?php echo app('translator')->get('app.employee'); ?></th>
        <th><?php echo app('translator')->get('app.totalAbsent'); ?></th>
    </tr>
    </thead>

    <tbody>
    <?php
        $totalAbsent = 0;
        $totalHalfDay = 0;
    ?>
    <?php $__currentLoopData = $employeeAttendence; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $attendance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            $totalAbsent = 0;
            $userId = explode('#', $key);
            $userId = $userId[0];
        ?>
        <tr>
            <td style="text-align: left;"> <?php echo end($attendance); ?> </td>
            <?php $__currentLoopData = $attendance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key2 => $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($key2 + 1 <= count($attendance)): ?>
                    <?php if($day == 'Absent'): ?>
                        <?php
                            $totalAbsent = $totalAbsent + 1;
                        ?>
                    <?php elseif($day == 'Half Day'): ?>
                        <?php
                            $totalHalfDay = $totalHalfDay + 0.5;
                        ?>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php
                // Add half-day absences as fractions of full days
                $totalAbsent += $totalHalfDay;
            ?>
            <td><?php echo $totalAbsent . ' / ' . (count($attendance) - 1); ?></td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>

</body>
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\attendance-report.blade.php ENDPATH**/ ?>