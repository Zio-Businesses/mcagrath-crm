<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title><?php echo app('translator')->get('app.menu.timeLogReport'); ?></title>
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
        <td align="right"><?php echo app('translator')->get('email.dailyTimelogReport.subject'); ?> <?php echo e(\Carbon\Carbon::parse($date)->translatedFormat('Y-m-d')); ?></td>
    </tr>
</table>

<table class="content">
    <thead>
    <tr>
        <th style="vertical-align: middle; text-align: left; max-width: 150px;"><?php echo app('translator')->get('app.employee'); ?></th>
        <th><?php echo app('translator')->get('modules.timeLogs.totalHours'); ?></th>
    </tr>
    </thead>

    <tbody>

    <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            $totalMinute = $employee['timelog'];
            $breakMinute = $employee['timelogBreaks'];

            $totalMinutes = $totalMinute - $breakMinute;

            $timeLog = \Carbon\CarbonInterval::formatHuman($totalMinutes);
            if($timeLog == '1s'){
                $timeLog = 0;
            }
        ?>
        <tr>
            <td style="text-align: left;"> <?php echo ($key); ?> </td>
            <td><?php echo e($timeLog); ?></td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
</body>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/timelog-report.blade.php ENDPATH**/ ?>