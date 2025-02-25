<div class="ml-auto d-flex align-items-center">
    <?php if(isset($extraSlot)): ?>
        <?php echo e($extraSlot); ?>

    <?php endif; ?>

    <div class="more-filters py-2 pl-0 pl-lg-2 pl-md-2 position-relative">

        <a onclick="openMoreFilter()" class="mb-0 d-none d-lg-block  f-14 text-dark-grey"><i
                class="fa fa-filter f-13 text-dark-grey mt-1 mr-1"></i><?php echo app('translator')->get('app.moreFilters'); ?></a>

        <a onclick="openMoreFilter()" class="mb-0 d-block d-lg-none  text-dark-grey"><i
                class="fa fa-filter filter_icon mr-2"></i><?php echo app('translator')->get('app.moreFilters'); ?></a>

        <div class="more-filter-tab" id="more_filter">
            <div class="filter-inner">
                <div class="sticky-top bg-white">
                    <h3 class="pb-3 mb-2 f-18 f-w-500 text-capitalize text-dark"><?php echo app('translator')->get('app.filters'); ?></h3>
                    <!-- <i onclick="closeMoreFilter()" class="close-more-filter fa fa-times f-16 cursor-pointer text-lightest"></i> -->
                    <button type="button" class="close " onclick="closeMoreFilter()" aria-label="Close">
                        <span aria-hidden="true" class="f-22 close-more-filter">&times;</span>
                    </button>
                </div>
                <div class="filter-detail">
                    <?php echo e($slot); ?>

                </div>
            </div>
            <div class="clear-all bg-white">
                <?php if (isset($component)) { $__componentOriginal5e57c6582b8a883148a28bb7ee46d2ad = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5e57c6582b8a883148a28bb7ee46d2ad = $attributes; } ?>
<?php $component = App\View\Components\Forms\ButtonSecondary::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-secondary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonSecondary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'reset-filters-2','class' => 'float-right my-3 mr-0']); ?><?php echo app('translator')->get('app.clearFilters'); ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5e57c6582b8a883148a28bb7ee46d2ad)): ?>
<?php $attributes = $__attributesOriginal5e57c6582b8a883148a28bb7ee46d2ad; ?>
<?php unset($__attributesOriginal5e57c6582b8a883148a28bb7ee46d2ad); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5e57c6582b8a883148a28bb7ee46d2ad)): ?>
<?php $component = $__componentOriginal5e57c6582b8a883148a28bb7ee46d2ad; ?>
<?php unset($__componentOriginal5e57c6582b8a883148a28bb7ee46d2ad); ?>
<?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views/components/filters/more-filter-box.blade.php ENDPATH**/ ?>