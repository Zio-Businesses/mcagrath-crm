<div class="modal-header">
    <h5 class="modal-title"><?php echo app('translator')->get('app.leavesDetails'); ?></h5>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<div class="modal-body px-0 pt-0">
    <div id="task-detail-section">
         <!-- TASK TABS START -->
         <div class="bg-additional-grey">

            <div class="s-b-inner s-b-notifications bg-white">

                <?php if (isset($component)) { $__componentOriginal9a1e00e4c4ff0df2940f717a54345f9e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9a1e00e4c4ff0df2940f717a54345f9e = $attributes; } ?>
<?php $component = App\View\Components\TabSection::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tab-section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\TabSection::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'task-tabs']); ?>
                    <?php if (isset($component)) { $__componentOriginal8b6db9cf13c4d9d2400b577641e961c1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8b6db9cf13c4d9d2400b577641e961c1 = $attributes; } ?>
<?php $component = App\View\Components\TabItem::resolve(['active' => (request('view') === 'approved' || !request('view')),'link' => route('leave-report.show', $userId).'?view=approved&startDate='.urlencode($startDate).'&endDate='.urlencode($endDate)] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tab-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\TabItem::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'ajax-tab']); ?>
                        <?php echo app('translator')->get('app.approved'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8b6db9cf13c4d9d2400b577641e961c1)): ?>
<?php $attributes = $__attributesOriginal8b6db9cf13c4d9d2400b577641e961c1; ?>
<?php unset($__attributesOriginal8b6db9cf13c4d9d2400b577641e961c1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8b6db9cf13c4d9d2400b577641e961c1)): ?>
<?php $component = $__componentOriginal8b6db9cf13c4d9d2400b577641e961c1; ?>
<?php unset($__componentOriginal8b6db9cf13c4d9d2400b577641e961c1); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal8b6db9cf13c4d9d2400b577641e961c1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8b6db9cf13c4d9d2400b577641e961c1 = $attributes; } ?>
<?php $component = App\View\Components\TabItem::resolve(['active' => (request('view') === 'pending'),'link' => route('leave-report.show', $userId).'?view=pending&startDate='.urlencode($startDate).'&endDate='.urlencode($endDate)] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tab-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\TabItem::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'ajax-tab']); ?>
                        <?php echo app('translator')->get('app.pending'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8b6db9cf13c4d9d2400b577641e961c1)): ?>
<?php $attributes = $__attributesOriginal8b6db9cf13c4d9d2400b577641e961c1; ?>
<?php unset($__attributesOriginal8b6db9cf13c4d9d2400b577641e961c1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8b6db9cf13c4d9d2400b577641e961c1)): ?>
<?php $component = $__componentOriginal8b6db9cf13c4d9d2400b577641e961c1; ?>
<?php unset($__componentOriginal8b6db9cf13c4d9d2400b577641e961c1); ?>
<?php endif; ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9a1e00e4c4ff0df2940f717a54345f9e)): ?>
<?php $attributes = $__attributesOriginal9a1e00e4c4ff0df2940f717a54345f9e; ?>
<?php unset($__attributesOriginal9a1e00e4c4ff0df2940f717a54345f9e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9a1e00e4c4ff0df2940f717a54345f9e)): ?>
<?php $component = $__componentOriginal9a1e00e4c4ff0df2940f717a54345f9e; ?>
<?php unset($__componentOriginal9a1e00e4c4ff0df2940f717a54345f9e); ?>
<?php endif; ?>


                <div class="s-b-n-content">
                    <div class="tab-content" id="nav-tabContent">
                        <?php echo $__env->make('reports.leave.ajax.show', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>


        </div>
        <!-- TASK TABS END -->
    </div>
</div>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/reports/leave/show.blade.php ENDPATH**/ ?>