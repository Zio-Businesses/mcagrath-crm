

<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
<div class="d-flex flex-column w-tables rounded mt-4 bg-white">
    <div id="chartContainer"></div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('filter-section'); ?>

    <div class="d-flex filter-box project-header bg-white border-bottom">

        <div class="mobile-close-overlay w-100 h-100" id="close-client-overlay"></div>
        <div class="project-menu d-lg-flex" id="mob-client-detail">
            <a class="d-none close-it" href="javascript:;" id="close-client-detail">
                <i class="fa fa-times"></i>
            </a>
            <?php if (isset($component)) { $__componentOriginal4b0c45ee1a38bb46a01c2a25edd749ab = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4b0c45ee1a38bb46a01c2a25edd749ab = $attributes; } ?>
<?php $component = App\View\Components\Tab::resolve(['href' => route('lead-report.index'). '?tab=profile','text' => __('modules.deal.profile')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tab'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Tab::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'profile']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4b0c45ee1a38bb46a01c2a25edd749ab)): ?>
<?php $attributes = $__attributesOriginal4b0c45ee1a38bb46a01c2a25edd749ab; ?>
<?php unset($__attributesOriginal4b0c45ee1a38bb46a01c2a25edd749ab); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4b0c45ee1a38bb46a01c2a25edd749ab)): ?>
<?php $component = $__componentOriginal4b0c45ee1a38bb46a01c2a25edd749ab; ?>
<?php unset($__componentOriginal4b0c45ee1a38bb46a01c2a25edd749ab); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginal4b0c45ee1a38bb46a01c2a25edd749ab = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4b0c45ee1a38bb46a01c2a25edd749ab = $attributes; } ?>
<?php $component = App\View\Components\Tab::resolve(['href' => route('lead-report.chart'). '?tab=chart','text' => __('modules.leadContact.leadReport')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tab'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Tab::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'chart']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4b0c45ee1a38bb46a01c2a25edd749ab)): ?>
<?php $attributes = $__attributesOriginal4b0c45ee1a38bb46a01c2a25edd749ab; ?>
<?php unset($__attributesOriginal4b0c45ee1a38bb46a01c2a25edd749ab); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4b0c45ee1a38bb46a01c2a25edd749ab)): ?>
<?php $component = $__componentOriginal4b0c45ee1a38bb46a01c2a25edd749ab; ?>
<?php unset($__componentOriginal4b0c45ee1a38bb46a01c2a25edd749ab); ?>
<?php endif; ?>


        </div>
    </div>

<?php if (isset($component)) { $__componentOriginald1a72e1108842d163a80559e15f530b4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald1a72e1108842d163a80559e15f530b4 = $attributes; } ?>
<?php $component = App\View\Components\Filters\FilterBox::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filters.filter-box'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Filters\FilterBox::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <!-- DATE START -->
    <div class="select-box d-flex py-2 px-lg-2 px-md-2 px-0 border-right-grey border-right-grey-sm-0">
        <p class="mb-0 pr-2 f-14 text-dark-grey d-flex align-items-center"><?php echo app('translator')->get('modules.deal.pipeline'); ?></p>
        <div class="select-year">
            <select class="form-control select-picker" name="pipeline" id="pipeline" data-live-search="true" data-size="8">
                <?php $__currentLoopData = $pipelines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pipeline): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($pipeline->id); ?>" <?php if($pipeline->default == 1): ?> selected <?php endif; ?>><?php echo e($pipeline->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>

        </div>


    </div>

    <div class="select-box d-flex py-2 px-lg-2 px-md-2 px-0 border-right-grey border-right-grey-sm-0">
        <p class="mb-0 pr-2 f-14 text-dark-grey d-flex align-items-center"><?php echo app('translator')->get('app.year'); ?></p>
        <div class="select-status">
            <select class="form-control select-picker" name="year" id="year" data-live-search="true" data-size="8">
    <?php $__currentLoopData = $years; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($year); ?>"><?php echo e($year); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
    </div>



 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald1a72e1108842d163a80559e15f530b4)): ?>
<?php $attributes = $__attributesOriginald1a72e1108842d163a80559e15f530b4; ?>
<?php unset($__attributesOriginald1a72e1108842d163a80559e15f530b4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald1a72e1108842d163a80559e15f530b4)): ?>
<?php $component = $__componentOriginald1a72e1108842d163a80559e15f530b4; ?>
<?php unset($__componentOriginald1a72e1108842d163a80559e15f530b4); ?>
<?php endif; ?>



<?php $__env->stopSection(); ?>


<?php $__env->startPush('scripts'); ?>
<script>
    $(document).ready(function() {

        $('.project-menu a').on('click', function() {

            $(this).addClass('active-tab');
        });
    });
</script>
<script src="<?php echo e(asset('vendor/graph/frappechart.js')); ?>"></script>
<script>

     var currencyCode = "<?php echo e(company()->currency->currency_code); ?>"

     const activeTab = "<?php echo e($activeTab); ?>";
        $('.project-menu .' + activeTab).addClass('active');

    $(document).ready(function() {

    var datasetsData = <?php echo json_encode($datasets, 15, 512) ?>;
    chart(datasetsData);

    function chart(datasetsData)
    {

        var monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];


        var datasets = [];

        const chart = new frappe.Chart("#chartContainer", {
            data: {
                labels: monthNames,
                datasets: datasetsData.map(function(dataset) {
                    return {
                        name: dataset.name.substr(0, 12),
                        values: dataset.values,
                        chartType: dataset.chartType,
                        color: dataset.color || '#d4f542'
                    };
                })
            },
            title: "Monthly Values by Stage",
            type: "axis-mixed",
            height: 300,

                    axisOptions: {
                        yAxisMode: 'tick',
                        xAxisMode: 'tick',
                        xIsSeries: 0
                    },
            barOptions: {
                stacked: true,
                spaceRatio: 0.5
            },
            tooltipOptions: {
                formatTooltipX: (d) => (d + "").toUpperCase(),
                formatTooltipY: (d) => d+' '+currencyCode
            }
        });

    }


            $('#pipeline, #year').on('change', function() {
                var year = $('#year').val();
                var pipeline = $('#pipeline').val();

                $.easyAjax({
                    url: "<?php echo e(route('lead-report.chart')); ?>",
                    type: "GET",
                    data: {
                        year: year,
                        pipeline: pipeline
                    },
                    success: function(response) {
                        chart(response.datasets);
                    },
                });
            });
        });



</script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/reports/lead/report-chart.blade.php ENDPATH**/ ?>