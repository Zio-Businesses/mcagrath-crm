<script src="<?php echo e(asset('vendor/jquery/frappe-charts.min.iife.js')); ?>"></script>
<script src="<?php echo e(asset('vendor/jquery/Chart.min.js')); ?>"></script>
<style>
    .pipeline {
        width: 20% !important;
    }
</style>

<div class="row">
    <?php if(in_array('clients', user_modules()) && in_array('total_clients', $activeWidgets)): ?>
        <div class="col-xl-4 col-lg-6 col-md-6 mb-3">
            <a href="javascript:;" id="totalClients">
                <?php if (isset($component)) { $__componentOriginale1233a330800208b0e743068470d1bf4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale1233a330800208b0e743068470d1bf4 = $attributes; } ?>
<?php $component = App\View\Components\Cards\Widget::resolve(['title' => __('modules.dashboard.totalClients'),'value' => $totalClient,'icon' => 'users'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.widget'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Widget::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale1233a330800208b0e743068470d1bf4)): ?>
<?php $attributes = $__attributesOriginale1233a330800208b0e743068470d1bf4; ?>
<?php unset($__attributesOriginale1233a330800208b0e743068470d1bf4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale1233a330800208b0e743068470d1bf4)): ?>
<?php $component = $__componentOriginale1233a330800208b0e743068470d1bf4; ?>
<?php unset($__componentOriginale1233a330800208b0e743068470d1bf4); ?>
<?php endif; ?>
            </a>
        </div>
    <?php endif; ?>

    <?php if(in_array('leads', user_modules()) && in_array('total_leads', $activeWidgets)): ?>
        <div class="col-xl-4 col-lg-6 col-md-6 mb-3">
            <a href="javascript:;" id="totalLeads">
                <?php if (isset($component)) { $__componentOriginale1233a330800208b0e743068470d1bf4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale1233a330800208b0e743068470d1bf4 = $attributes; } ?>
<?php $component = App\View\Components\Cards\Widget::resolve(['title' => __('modules.dashboard.totalLeads'),'value' => $totalLead,'icon' => 'users'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.widget'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Widget::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale1233a330800208b0e743068470d1bf4)): ?>
<?php $attributes = $__attributesOriginale1233a330800208b0e743068470d1bf4; ?>
<?php unset($__attributesOriginale1233a330800208b0e743068470d1bf4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale1233a330800208b0e743068470d1bf4)): ?>
<?php $component = $__componentOriginale1233a330800208b0e743068470d1bf4; ?>
<?php unset($__componentOriginale1233a330800208b0e743068470d1bf4); ?>
<?php endif; ?>
            </a>
        </div>
    <?php endif; ?>

    <?php if(in_array('leads', user_modules()) && in_array('total_deals', $activeWidgets)): ?>
        <div class="col-xl-4 col-lg-6 col-md-6 mb-3">
            <a href="javascript:;" id="totalDeals">
                <?php if (isset($component)) { $__componentOriginale1233a330800208b0e743068470d1bf4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale1233a330800208b0e743068470d1bf4 = $attributes; } ?>
<?php $component = App\View\Components\Cards\Widget::resolve(['title' => __('modules.deal.totalDeals'),'value' => $totalDeals,'icon' => 'file-contract','info' => __('messages.totalDealWidget')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.widget'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Widget::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale1233a330800208b0e743068470d1bf4)): ?>
<?php $attributes = $__attributesOriginale1233a330800208b0e743068470d1bf4; ?>
<?php unset($__attributesOriginale1233a330800208b0e743068470d1bf4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale1233a330800208b0e743068470d1bf4)): ?>
<?php $component = $__componentOriginale1233a330800208b0e743068470d1bf4; ?>
<?php unset($__componentOriginale1233a330800208b0e743068470d1bf4); ?>
<?php endif; ?>
            </a>
        </div>
    <?php endif; ?>

    <?php if(in_array('leads', user_modules()) && in_array('total_lead_conversions', $activeWidgets)): ?>
        <div class="col-xl-4 col-lg-6 col-md-6 mb-3">
            <a href="javascript:;" id="totalLeadConversions">
                <div class="bg-white p-20 rounded b-shadow-4 d-flex justify-content-between align-items-center">
                    <div class="d-block text-capitalize">
                        <h5 class="f-15 f-w-500 mb-20 text-darkest-grey"> <?php echo app('translator')->get('modules.deal.dealConversions'); ?>
                            <i class="fa fa-question-circle" data-toggle="popover" data-placement="top"
                               data-content="<?php echo app('translator')->get('messages.leadConversion'); ?>" data-html="true"
                               data-trigger="hover"></i>
                        </h5>
                        <div class="d-flex">
                            <p class="mb-0 f-15 font-weight-bold text-blue text-primary d-grid"><span
                                    id="total_lead_conversions"><?php echo e($convertedDeals); ?>/<?php echo e($totalLeadConversions->count()); ?>  <span
                                        class="text-dark-grey f-11 text-wrap ql-editor p-0"> <?php echo e($convertDealPercentage); ?>%</span></span>
                            </p>
                        </div>
                    </div>
                    <div class="d-block">
                        <i class="fa fa-check text-lightest f-18"></i>
                    </div>
                </div>
            </a>
        </div>
    <?php endif; ?>

    <?php if(in_array('contracts', user_modules()) && in_array('total_contracts_generated', $activeWidgets)): ?>
        <div class="col-xl-4 col-lg-6 col-md-6 mb-3">
            <a href="javascript:;" id="totalContractsGenerated">
                <?php if (isset($component)) { $__componentOriginale1233a330800208b0e743068470d1bf4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale1233a330800208b0e743068470d1bf4 = $attributes; } ?>
<?php $component = App\View\Components\Cards\Widget::resolve(['title' => __('modules.dashboard.totalContractsGenerated'),'value' => $totalContractsGenerated,'icon' => 'file-contract'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.widget'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Widget::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale1233a330800208b0e743068470d1bf4)): ?>
<?php $attributes = $__attributesOriginale1233a330800208b0e743068470d1bf4; ?>
<?php unset($__attributesOriginale1233a330800208b0e743068470d1bf4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale1233a330800208b0e743068470d1bf4)): ?>
<?php $component = $__componentOriginale1233a330800208b0e743068470d1bf4; ?>
<?php unset($__componentOriginale1233a330800208b0e743068470d1bf4); ?>
<?php endif; ?>
            </a>
        </div>
    <?php endif; ?>

    <?php if(in_array('contracts', user_modules()) && in_array('total_contracts_signed', $activeWidgets)): ?>
        <div class="col-xl-4 col-lg-6 col-md-6 mb-3">
            <a href="javascript:;" id="totalContractsSigned">
                <?php if (isset($component)) { $__componentOriginale1233a330800208b0e743068470d1bf4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale1233a330800208b0e743068470d1bf4 = $attributes; } ?>
<?php $component = App\View\Components\Cards\Widget::resolve(['title' => __('modules.dashboard.totalContractsSigned'),'value' => $totalContractsSigned,'icon' => 'file-signature'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.widget'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Widget::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale1233a330800208b0e743068470d1bf4)): ?>
<?php $attributes = $__attributesOriginale1233a330800208b0e743068470d1bf4; ?>
<?php unset($__attributesOriginale1233a330800208b0e743068470d1bf4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale1233a330800208b0e743068470d1bf4)): ?>
<?php $component = $__componentOriginale1233a330800208b0e743068470d1bf4; ?>
<?php unset($__componentOriginale1233a330800208b0e743068470d1bf4); ?>
<?php endif; ?>
            </a>
        </div>
    <?php endif; ?>

</div>

<div class="row">
    <?php if(in_array('payments', user_modules()) && in_array('client_wise_earnings', $activeWidgets)): ?>
        <div class="col-sm-12 col-lg-6 mt-3">
            <?php if (isset($component)) { $__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9 = $attributes; } ?>
<?php $component = App\View\Components\Cards\Data::resolve(['title' => __('modules.dashboard.clientWiseEarnings').' <i class=\'fa fa-question-circle\' data-toggle=\'popover\' data-placement=\'top\' data-content=\''.__('messages.earningChartNote').'\' data-trigger=\'hover\'></i>'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Data::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <?php if (isset($component)) { $__componentOriginal186b6b67364273b38dd03324ee751423 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal186b6b67364273b38dd03324ee751423 = $attributes; } ?>
<?php $component = App\View\Components\BarChart::resolve(['chartData' => $clientEarningChart] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('bar-chart'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\BarChart::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'task-chart1','height' => '300']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal186b6b67364273b38dd03324ee751423)): ?>
<?php $attributes = $__attributesOriginal186b6b67364273b38dd03324ee751423; ?>
<?php unset($__attributesOriginal186b6b67364273b38dd03324ee751423); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal186b6b67364273b38dd03324ee751423)): ?>
<?php $component = $__componentOriginal186b6b67364273b38dd03324ee751423; ?>
<?php unset($__componentOriginal186b6b67364273b38dd03324ee751423); ?>
<?php endif; ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9)): ?>
<?php $attributes = $__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9; ?>
<?php unset($__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9)): ?>
<?php $component = $__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9; ?>
<?php unset($__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9); ?>
<?php endif; ?>
        </div>
    <?php endif; ?>

    <?php if(in_array('timelogs', user_modules()) && in_array('client_wise_timelogs', $activeWidgets)): ?>
        <div class="col-sm-12 col-lg-6 mt-3">
            <?php if (isset($component)) { $__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9 = $attributes; } ?>
<?php $component = App\View\Components\Cards\Data::resolve(['title' => __('modules.dashboard.clientWiseTimelogs')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Data::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <?php if (isset($component)) { $__componentOriginale9ccd694a97cd317c729537be76f531b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale9ccd694a97cd317c729537be76f531b = $attributes; } ?>
<?php $component = App\View\Components\LineChart::resolve(['chartData' => $clientTimelogChart] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('line-chart'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\LineChart::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'task-chart2','height' => '300']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale9ccd694a97cd317c729537be76f531b)): ?>
<?php $attributes = $__attributesOriginale9ccd694a97cd317c729537be76f531b; ?>
<?php unset($__attributesOriginale9ccd694a97cd317c729537be76f531b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale9ccd694a97cd317c729537be76f531b)): ?>
<?php $component = $__componentOriginale9ccd694a97cd317c729537be76f531b; ?>
<?php unset($__componentOriginale9ccd694a97cd317c729537be76f531b); ?>
<?php endif; ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9)): ?>
<?php $attributes = $__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9; ?>
<?php unset($__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9)): ?>
<?php $component = $__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9; ?>
<?php unset($__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9); ?>
<?php endif; ?>
        </div>
    <?php endif; ?>

    <?php if(in_array('leads', user_modules()) && in_array('lead_vs_status', $activeWidgets)): ?>
        <div class="col-sm-12 col-lg-6 mt-3">
            <div class="card bg-white border-0 b-shadow-4" id="lead_vs_status">

                <?php if (isset($component)) { $__componentOriginal0c73ff97aa079a7141aada4278327d8b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0c73ff97aa079a7141aada4278327d8b = $attributes; } ?>
<?php $component = App\View\Components\Cards\CardHeader::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.card-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\CardHeader::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                    <?php echo app('translator')->get('modules.deal.dealVsStatus'); ?>
                     <?php $__env->slot('action', null, []); ?> 
                        <select name="pipeline" id="pipeline" class="form-control pipeline select-picker w-30 mw-30">
                            <?php $__currentLoopData = $leadPipelines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pipeline): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option <?php if($pipeline->default == 1): ?> selected <?php endif; ?>  value="<?php echo e($pipeline->id); ?>">
                                    <?php echo e($pipeline->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                     <?php $__env->endSlot(); ?>

                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0c73ff97aa079a7141aada4278327d8b)): ?>
<?php $attributes = $__attributesOriginal0c73ff97aa079a7141aada4278327d8b; ?>
<?php unset($__attributesOriginal0c73ff97aa079a7141aada4278327d8b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0c73ff97aa079a7141aada4278327d8b)): ?>
<?php $component = $__componentOriginal0c73ff97aa079a7141aada4278327d8b; ?>
<?php unset($__componentOriginal0c73ff97aa079a7141aada4278327d8b); ?>
<?php endif; ?>

                <div class="card-body p-0 " id="leadStageData">
                    <?php if (isset($component)) { $__componentOriginalb982231180e038d497f4b363f639c469 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb982231180e038d497f4b363f639c469 = $attributes; } ?>
<?php $component = App\View\Components\PieChart::resolve(['labels' => $leadStatusChart['labels'],'values' => $leadStatusChart['values'],'colors' => $leadStatusChart['colors']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('pie-chart'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\PieChart::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'task-chart3','height' => '300','width' => '300']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb982231180e038d497f4b363f639c469)): ?>
<?php $attributes = $__attributesOriginalb982231180e038d497f4b363f639c469; ?>
<?php unset($__attributesOriginalb982231180e038d497f4b363f639c469); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb982231180e038d497f4b363f639c469)): ?>
<?php $component = $__componentOriginalb982231180e038d497f4b363f639c469; ?>
<?php unset($__componentOriginalb982231180e038d497f4b363f639c469); ?>
<?php endif; ?>
                </div>

            </div>

        </div>
    <?php endif; ?>

    <?php if(in_array('leads', user_modules()) && in_array('lead_vs_source', $activeWidgets)): ?>
        <div class="col-sm-12 col-lg-6 mt-3">
            <?php if (isset($component)) { $__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9 = $attributes; } ?>
<?php $component = App\View\Components\Cards\Data::resolve(['title' => __('modules.dashboard.leadVsSource')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Data::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <?php if (isset($component)) { $__componentOriginalb982231180e038d497f4b363f639c469 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb982231180e038d497f4b363f639c469 = $attributes; } ?>
<?php $component = App\View\Components\PieChart::resolve(['labels' => $leadSourceChart['labels'],'values' => $leadSourceChart['values'],'colors' => $leadSourceChart['colors']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('pie-chart'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\PieChart::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'task-chart4','height' => '300','width' => '300']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb982231180e038d497f4b363f639c469)): ?>
<?php $attributes = $__attributesOriginalb982231180e038d497f4b363f639c469; ?>
<?php unset($__attributesOriginalb982231180e038d497f4b363f639c469); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb982231180e038d497f4b363f639c469)): ?>
<?php $component = $__componentOriginalb982231180e038d497f4b363f639c469; ?>
<?php unset($__componentOriginalb982231180e038d497f4b363f639c469); ?>
<?php endif; ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9)): ?>
<?php $attributes = $__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9; ?>
<?php unset($__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9)): ?>
<?php $component = $__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9; ?>
<?php unset($__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9); ?>
<?php endif; ?>
        </div>
    <?php endif; ?>

    <?php if(in_array('clients', user_modules()) && in_array('latest_client', $activeWidgets)): ?>
        <div class="col-sm-12 col-lg-6 mt-3">
            <?php if (isset($component)) { $__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9 = $attributes; } ?>
<?php $component = App\View\Components\Cards\Data::resolve(['title' => __('modules.dashboard.latestClient'),'padding' => 'false','otherClasses' => 'h-200'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Data::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <?php if (isset($component)) { $__componentOriginal7d9f6e0b9001f5841f72577781b2d17f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7d9f6e0b9001f5841f72577781b2d17f = $attributes; } ?>
<?php $component = App\View\Components\Table::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Table::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'border-0 pb-3 admin-dash-table table-hover']); ?>
                     <?php $__env->slot('thead', null, []); ?> 
                        <th class="pl-20"><?php echo app('translator')->get('app.client'); ?></th>
                        <th><?php echo app('translator')->get('app.email'); ?></th>
                        <th class="pr-20 text-right"><?php echo app('translator')->get('app.createdOn'); ?></th>
                     <?php $__env->endSlot(); ?>
                    <?php $__empty_1 = true; $__currentLoopData = $latestClient->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td class="pl-20">
                                <?php if (isset($component)) { $__componentOriginal2ccf36a322409b76566b65fcab70ed9d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2ccf36a322409b76566b65fcab70ed9d = $attributes; } ?>
<?php $component = App\View\Components\Client::resolve(['user' => $item] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('client'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Client::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2ccf36a322409b76566b65fcab70ed9d)): ?>
<?php $attributes = $__attributesOriginal2ccf36a322409b76566b65fcab70ed9d; ?>
<?php unset($__attributesOriginal2ccf36a322409b76566b65fcab70ed9d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2ccf36a322409b76566b65fcab70ed9d)): ?>
<?php $component = $__componentOriginal2ccf36a322409b76566b65fcab70ed9d; ?>
<?php unset($__componentOriginal2ccf36a322409b76566b65fcab70ed9d); ?>
<?php endif; ?>
                            </td>
                            <td>
                                <?php echo e($item->email); ?>

                            </td>
                            <td class="pr-20"
                                align="right"><?php echo e($item->created_at->translatedFormat(company()->date_format)); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="3" class="shadow-none">
                                <?php if (isset($component)) { $__componentOriginal269164c77d9d34462c34359c03da6a68 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal269164c77d9d34462c34359c03da6a68 = $attributes; } ?>
<?php $component = App\View\Components\Cards\NoRecord::resolve(['icon' => 'ticket-alt','message' => __('messages.noRecordFound')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.no-record'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\NoRecord::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal269164c77d9d34462c34359c03da6a68)): ?>
<?php $attributes = $__attributesOriginal269164c77d9d34462c34359c03da6a68; ?>
<?php unset($__attributesOriginal269164c77d9d34462c34359c03da6a68); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal269164c77d9d34462c34359c03da6a68)): ?>
<?php $component = $__componentOriginal269164c77d9d34462c34359c03da6a68; ?>
<?php unset($__componentOriginal269164c77d9d34462c34359c03da6a68); ?>
<?php endif; ?>
                            </td>
                        </tr>
                    <?php endif; ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7d9f6e0b9001f5841f72577781b2d17f)): ?>
<?php $attributes = $__attributesOriginal7d9f6e0b9001f5841f72577781b2d17f; ?>
<?php unset($__attributesOriginal7d9f6e0b9001f5841f72577781b2d17f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7d9f6e0b9001f5841f72577781b2d17f)): ?>
<?php $component = $__componentOriginal7d9f6e0b9001f5841f72577781b2d17f; ?>
<?php unset($__componentOriginal7d9f6e0b9001f5841f72577781b2d17f); ?>
<?php endif; ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9)): ?>
<?php $attributes = $__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9; ?>
<?php unset($__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9)): ?>
<?php $component = $__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9; ?>
<?php unset($__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9); ?>
<?php endif; ?>
        </div>
    <?php endif; ?>

    <?php if(in_array('clients', user_modules()) && in_array('recent_login_activities', $activeWidgets)): ?>
        <div class="col-sm-12 col-lg-6 mt-3">
            <?php if (isset($component)) { $__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9 = $attributes; } ?>
<?php $component = App\View\Components\Cards\Data::resolve(['title' => __('modules.dashboard.recentLoginActivities'),'padding' => 'false','otherClasses' => 'h-200'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Data::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <?php if (isset($component)) { $__componentOriginal7d9f6e0b9001f5841f72577781b2d17f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7d9f6e0b9001f5841f72577781b2d17f = $attributes; } ?>
<?php $component = App\View\Components\Table::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Table::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'border-0 pb-3 admin-dash-table table-hover']); ?>

                     <?php $__env->slot('thead', null, []); ?> 
                        <th class="pl-20"><?php echo app('translator')->get('app.client'); ?></th>
                        <th><?php echo app('translator')->get('app.email'); ?></th>
                        <th class="pr-20 text-right"><?php echo app('translator')->get('app.lastLogin'); ?></th>
                     <?php $__env->endSlot(); ?>
                    <?php $__empty_1 = true; $__currentLoopData = $recentLoginActivities->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td class="pl-20">
                                <?php if (isset($component)) { $__componentOriginal2ccf36a322409b76566b65fcab70ed9d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2ccf36a322409b76566b65fcab70ed9d = $attributes; } ?>
<?php $component = App\View\Components\Client::resolve(['user' => $item] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('client'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Client::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2ccf36a322409b76566b65fcab70ed9d)): ?>
<?php $attributes = $__attributesOriginal2ccf36a322409b76566b65fcab70ed9d; ?>
<?php unset($__attributesOriginal2ccf36a322409b76566b65fcab70ed9d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2ccf36a322409b76566b65fcab70ed9d)): ?>
<?php $component = $__componentOriginal2ccf36a322409b76566b65fcab70ed9d; ?>
<?php unset($__componentOriginal2ccf36a322409b76566b65fcab70ed9d); ?>
<?php endif; ?>
                            </td>
                            <td>
                                <?php echo e($item->email); ?>

                            </td>
                            <td align="right" class="pr-20">
                                <?php echo e($item->last_login ? $item->last_login->timezone(company()->timezone)->translatedFormat(company()->date_format . ' ' . company()->time_format) : '--'); ?>

                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="3" class="shadow-none">
                                <?php if (isset($component)) { $__componentOriginal269164c77d9d34462c34359c03da6a68 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal269164c77d9d34462c34359c03da6a68 = $attributes; } ?>
<?php $component = App\View\Components\Cards\NoRecord::resolve(['icon' => 'ticket-alt','message' => __('messages.noRecordFound')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.no-record'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\NoRecord::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal269164c77d9d34462c34359c03da6a68)): ?>
<?php $attributes = $__attributesOriginal269164c77d9d34462c34359c03da6a68; ?>
<?php unset($__attributesOriginal269164c77d9d34462c34359c03da6a68); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal269164c77d9d34462c34359c03da6a68)): ?>
<?php $component = $__componentOriginal269164c77d9d34462c34359c03da6a68; ?>
<?php unset($__componentOriginal269164c77d9d34462c34359c03da6a68); ?>
<?php endif; ?>
                            </td>
                        </tr>
                    <?php endif; ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7d9f6e0b9001f5841f72577781b2d17f)): ?>
<?php $attributes = $__attributesOriginal7d9f6e0b9001f5841f72577781b2d17f; ?>
<?php unset($__attributesOriginal7d9f6e0b9001f5841f72577781b2d17f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7d9f6e0b9001f5841f72577781b2d17f)): ?>
<?php $component = $__componentOriginal7d9f6e0b9001f5841f72577781b2d17f; ?>
<?php unset($__componentOriginal7d9f6e0b9001f5841f72577781b2d17f); ?>
<?php endif; ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9)): ?>
<?php $attributes = $__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9; ?>
<?php unset($__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9)): ?>
<?php $component = $__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9; ?>
<?php unset($__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9); ?>
<?php endif; ?>
        </div>
    <?php endif; ?>

</div>

<script>
    $('#save-dashboard-widget').click(function () {
        $.easyAjax({
            url: "<?php echo e(route('dashboard.widget', 'admin-client-dashboard')); ?>",
            container: '#dashboardWidgetForm',
            blockUI: true,
            type: "POST",
            redirect: true,
            data: $('#dashboardWidgetForm').serialize(),
            success: function () {
                window.location.reload();
            }
        })
    });


    $('#totalClients').click(function () {
        var dateRange = getDateRange();
        var url = `<?php echo e(route('clients.index')); ?>`;

        string = `?start=${dateRange.startDate}&end=${dateRange.endDate}`;
        url += string;

        window.location.href = url;
    });

    $('#totalLeads').click(function () {
        var dateRange = getDateRange();
        var url = `<?php echo e(route('lead-contact.index')); ?>`;

        string = `?start=${dateRange.startDate}&end=${dateRange.endDate}`;
        url += string;

        window.location.href = url;
    });

    $('#totalLeadConversions').click(function () {
        var dateRange = getDateRange();
        var url = `<?php echo e(route('deals.index')); ?>`;

        string = `?start=${dateRange.startDate}&end=${dateRange.endDate}`;
        url += string;

        window.location.href = url;
    });

    $('#totalDeals').click(function () {
        var url = `<?php echo e(route('deals.index')); ?>`;
        window.location.href = url;
    });

    $('#totalContractsGenerated').click(function () {
        var dateRange = getDateRange();
        var url = `<?php echo e(route('contracts.index')); ?>`;

        string = `?start=${dateRange.startDate}&end=${dateRange.endDate}`;
        url += string;

        window.location.href = url;
    });

    $('#totalContractsSigned').click(function () {
        var dateRange = getDateRange();
        var url = `<?php echo e(route('contracts.index')); ?>`;

        string = `?signed=yes&start=${dateRange.startDate}&end=${dateRange.endDate}`;
        url += string;

        window.location.href = url;
    });

    function getDateRange() {
        var dateRange = $('#datatableRange2').data('daterangepicker');
        var startDate = dateRange.startDate.format('<?php echo e(company()->moment_date_format); ?>');
        var endDate = dateRange.endDate.format('<?php echo e(company()->moment_date_format); ?>');

        startDate = encodeURIComponent(startDate);
        endDate = encodeURIComponent(endDate);
        var pipelineId = $('#pipeline').val();

        var data = [];
        data['startDate'] = startDate;
        data['endDate'] = endDate;
        data['pipelineId'] = pipelineId;

        return data;
    }

    $('#pipeline').on('change keyup', function () {
        var dateRange = $('#datatableRange2').data('daterangepicker');
        var startDate = dateRange.startDate.format('<?php echo e(company()->moment_date_format); ?>');
        var endDate = dateRange.endDate.format('<?php echo e(company()->moment_date_format); ?>');

        startDate = encodeURIComponent(startDate);
        endDate = encodeURIComponent(endDate);

        var pipelineId = $('#pipeline').val();
        var url = "<?php echo e(route('dashboard.deal-stage-data', ':id')); ?>?startDate=" + startDate + "&endDate=" + endDate;
        url = url.replace(':id', pipelineId);

        $.easyAjax({

            url: url,
            container: '#dashboardWidgetForm',
            blockUI: true,
            type: "GET",
            redirect: true,
            data: $('#dashboardWidgetForm').serialize(),
            success: function (response) {
                $('#leadStageData').html(response.html);
            }
        })
    });
</script>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/dashboard/ajax/client.blade.php ENDPATH**/ ?>