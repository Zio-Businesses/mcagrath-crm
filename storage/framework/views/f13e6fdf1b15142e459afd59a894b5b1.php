<!-- ROW START -->
<div class="row py-0 py-md-0 py-lg-3">
    <div class="col-lg-12 col-md-12 mb-4 mb-xl-0 mb-lg-4">
        <!-- ACTIVITY DETAIL START -->
        <div class="p-activity-detail cal-info b-shadow-4" data-menu-vertical="1" data-menu-scroll="1"
            data-menu-dropdown-timeout="500" id="projectActivityDetail">

            <?php $__empty_1 = true; $__currentLoopData = $activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="card border-0 b-shadow-4 p-20 rounded-0">
                    <div class="card-horizontal">
                        <div class="card-header m-0 p-0 bg-white rounded">
                            <?php if (isset($component)) { $__componentOriginalf5a72a6c92f224d4750fab85bf5244ff = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf5a72a6c92f224d4750fab85bf5244ff = $attributes; } ?>
<?php $component = App\View\Components\DateBadge::resolve(['month' => $activity->created_at->timezone(company()->timezone)->translatedFormat('M'),'date' => $activity->created_at->timezone(company()->timezone)->translatedFormat('d')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('date-badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\DateBadge::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf5a72a6c92f224d4750fab85bf5244ff)): ?>
<?php $attributes = $__attributesOriginalf5a72a6c92f224d4750fab85bf5244ff; ?>
<?php unset($__attributesOriginalf5a72a6c92f224d4750fab85bf5244ff); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf5a72a6c92f224d4750fab85bf5244ff)): ?>
<?php $component = $__componentOriginalf5a72a6c92f224d4750fab85bf5244ff; ?>
<?php unset($__componentOriginalf5a72a6c92f224d4750fab85bf5244ff); ?>
<?php endif; ?>
                        </div>
                        <div class="card-body border-0 p-0 ml-3">
                            <h4 class="card-title f-14 font-weight-normal text-capitalize"><?php echo __($activity->activity); ?>

                            </h4>
                            <p class="card-text f-12 text-dark-grey">
                                <?php echo e($activity->created_at->timezone(company()->timezone)->translatedFormat(company()->time_format)); ?>

                            </p>
                        </div>
                    </div>
                </div><!-- card end -->
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="card border-0 b-shadow-4 p-20 rounded-0">
                    <div class="card-horizontal">

                        <div class="card-body border-0 p-0 ml-3">
                            <h4 class="card-title f-14 font-weight-normal">
                                <?php echo app('translator')->get('messages.noActivityByThisUser'); ?></h4>
                            <p class="card-text f-12 text-dark-grey"></p>
                        </div>
                    </div>
                </div><!-- card end -->
            <?php endif; ?>

        </div>
        <!-- ACTIVITY DETAIL END -->
    </div>
</div>
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\projects\ajax\activity.blade.php ENDPATH**/ ?>