<!-- ROW START -->
<div class="row py-3 py-lg-5 py-md-5">
    <div class="col-lg-12 col-md-12 mb-4 mb-xl-0 mb-lg-4">
        <!-- Task Box Start -->
        <div class="d-flex flex-column w-tables rounded mt-3 bg-white">
            <div class="d-flex px-2">
                <!-- START ASSIGN START -->
                <div class="select-box py-2 px-lg-2 px-md-2 px-0">
                    <div class="select-status mr-3">
                        <?php if (isset($component)) { $__componentOriginalf704f069031d81dfb7cf95f6709a6a66 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf704f069031d81dfb7cf95f6709a6a66 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Datepicker::resolve(['fieldId' => 'start_date','fieldLabel' => __('app.startDate'),'fieldName' => 'start_date','fieldPlaceholder' => __('placeholders.date'),'fieldValue' => ''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.datepicker'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Datepicker::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf704f069031d81dfb7cf95f6709a6a66)): ?>
<?php $attributes = $__attributesOriginalf704f069031d81dfb7cf95f6709a6a66; ?>
<?php unset($__attributesOriginalf704f069031d81dfb7cf95f6709a6a66); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf704f069031d81dfb7cf95f6709a6a66)): ?>
<?php $component = $__componentOriginalf704f069031d81dfb7cf95f6709a6a66; ?>
<?php unset($__componentOriginalf704f069031d81dfb7cf95f6709a6a66); ?>
<?php endif; ?>
                    </div>
                </div>
                <!-- START ASSIGN END -->

                <!-- END ASSIGN START -->
                <div class="select-box py-2 px-lg-2 px-md-2 px-0">
                    <div class="select-status">
                        <?php if (isset($component)) { $__componentOriginalf704f069031d81dfb7cf95f6709a6a66 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf704f069031d81dfb7cf95f6709a6a66 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Datepicker::resolve(['fieldId' => 'end_date','fieldLabel' => __('app.endDate'),'fieldName' => 'end_date','fieldPlaceholder' => __('placeholders.date'),'fieldValue' => ''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.datepicker'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Datepicker::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf704f069031d81dfb7cf95f6709a6a66)): ?>
<?php $attributes = $__attributesOriginalf704f069031d81dfb7cf95f6709a6a66; ?>
<?php unset($__attributesOriginalf704f069031d81dfb7cf95f6709a6a66); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf704f069031d81dfb7cf95f6709a6a66)): ?>
<?php $component = $__componentOriginalf704f069031d81dfb7cf95f6709a6a66; ?>
<?php unset($__componentOriginalf704f069031d81dfb7cf95f6709a6a66); ?>
<?php endif; ?>
                    </div>
                </div>
                <!-- END ASSIGN END -->
            </div>

            <!-- Burndown chart render here -->
            <canvas id="burndown"></canvas>

        </div>
        <!-- Task Box End -->
    </div>
</div>
<!-- ROW END -->

<script src="<?php echo e(asset('vendor/jquery/Chart.min.js')); ?>"></script>
<script>
    $(document).ready(function() {

        datepicker('#start_date', {
            position: 'bl',
            dateSelected: new Date("<?php echo e(str_replace('-', '/', $fromDate)); ?>"),
            onSelect: (instance, date) => {
                loadChart();
            },
            ...datepickerConfig
        });

        datepicker('#end_date', {
            position: 'bl',
            dateSelected: new Date("<?php echo e(str_replace('-', '/', $toDate)); ?>"),
            onSelect: (instance, date) => {
                loadChart();
            },
            ...datepickerConfig
        });

        var lineChart = null;

        function showBurnDown(elementId, burndownData, scopeChange = [], dates) {
            var speedCanvas = document.getElementById(elementId);

            if(lineChart){
                lineChart.destroy();
            }

            Chart.defaults.font.size = 14;

            var speedData = {
                labels: JSON.parse(dates),
                datasets: [
                    {
                        label: "<?php echo app('translator')->get('modules.burndown.actual'); ?>",
                        borderColor: "#1d82f5",
                        backgroundColor: "#1d82f5",
                        lineTension: 0,
                        borderDash: [5, 5],
                        fill: false,
                        data: scopeChange,
                        steppedLine: true
                    },
                    {
                        label: "<?php echo app('translator')->get('modules.burndown.ideal'); ?>",
                        data: burndownData,
                        fill: false,
                        borderColor: "#ccc",
                        backgroundColor: "#ccc",
                        lineTension: 0,
                    },
                ]
            };

            var chartOptions = {
                legend: {
                    display: true,
                    position: 'top',
                    labels: {
                        boxWidth: 80,
                        fontColor: 'black'
                    }
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: Math.round(burndownData[0] * 2)
                        }
                    }]
                },
                responsive: true
            };

            lineChart = new Chart(speedCanvas, {
                type: 'line',
                data: speedData,
                options: chartOptions
            });

        }

        function loadChart() {
            var startDate = $('#start_date').val();
            if (startDate == '') { startDate = null; }

            var endDate = $('#end_date').val();
            if (endDate == '') { endDate = null; }

            var token = "<?php echo e(csrf_token()); ?>";
            $.easyAjax({
                url: "<?php echo e(route('projects.burndown', [$project->id])); ?>",
                container: '#burndown',
                type: "GET",
                redirect: false,
                data: {'_token': token, startDate: startDate, endDate: endDate},
                success: function (data) {
                    showBurnDown("burndown", JSON.parse(data.deadlineTasks), JSON.parse(data.uncompletedTasks), data.datesArray);
                }
            });
        }

        loadChart();

    }); // end of document.ready()
</script>
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\projects\ajax\burndown.blade.php ENDPATH**/ ?>