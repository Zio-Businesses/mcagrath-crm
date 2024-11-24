<?php if($multiple): ?>
    <div <?php echo e($attributes); ?>></div>
    <script>
        var data = {
            labels: [
                <?php $__currentLoopData = $chartData['labels']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    "<?php echo e($label); ?>",
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            ],
            datasets: [
                <?php $__currentLoopData = $chartData['values']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    {
                    name: "<?php echo e($chartData['name'][$key]); ?>",
                    values: [
                    <?php $__currentLoopData = $value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e($val); ?>,
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    ],
                    chartType: 'line'
                    },
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            ]

        };

    </script>

    <script>
        var chart = new frappe.Chart("#<?php echo e($attributes['id']); ?>", { // or a DOM element,
            data: data,
            type: 'line', // or 'bar', 'line', 'scatter', 'pie', 'percentage'
            height: <?php echo e($attributes['height']); ?>,
            barOptions: {
                stacked: false,
                spaceRatio: 0.2,
            },
            valuesOverPoints: 1,
            axisOptions: {
                yAxisMode: 'tick',
                xAxisMode: 'tick',
                xIsSeries: 0
            },
            colors: [
                <?php $__currentLoopData = $chartData['colors']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    "<?php echo e($color); ?>",
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            ]
        });

    </script>

<?php else: ?>
    <?php
    $valuesTotal = array_sum($chartData['values']);
    ?>
    <?php if($valuesTotal > 1): ?>
        <div <?php echo e($attributes); ?>></div>
        <script>
            var data = {
                labels: [
                    <?php $__currentLoopData = $chartData['labels']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        "<?php echo e($label); ?>",
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                ],
                datasets: [{
                    name: "<?php echo e($chartData['name']); ?>",
                    values: [
                        <?php $__currentLoopData = $chartData['values']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo e($value); ?>,
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    ],
                    chartType: 'line'
                }]
            };

        </script>

        <script>
            var chart = new frappe.Chart("#<?php echo e($attributes['id']); ?>", { // or a DOM element,
                data: data,
                type: 'line', // or 'bar', 'line', 'scatter', 'pie', 'percentage'
                height: <?php echo e($attributes['height']); ?>,
                lineOptions: {
                    dotSize: 4,
                    hideLine: 0,
                    hideDots: 0,
                    heatline: 1,
                    regionFill: 1,
                },
                valuesOverPoints: 1,
                axisOptions: {
                    yAxisMode: 'tick',
                    xAxisMode: 'tick',
                    xIsSeries: 0
                },
                colors: [
                    <?php $__currentLoopData = $chartData['colors']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        "<?php echo e($color); ?>",
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                ]
            });

        </script>

    <?php else: ?>
        <div class="align-items-center d-flex flex-column text-lightest p-20"
            style="height: <?php echo e($attributes['height']); ?>px">
            <i class="side-icon bi bi-bar-chart"></i>

            <div class="f-15 mt-4">
                - <?php echo app('translator')->get('messages.notEnoughData'); ?> -
            </div>
        </div>
    <?php endif; ?>
<?php endif; ?>
<?php /**PATH D:\Coding\crm-main\resources\views/components/line-chart.blade.php ENDPATH**/ ?>