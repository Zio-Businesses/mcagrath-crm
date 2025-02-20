

<?php $__env->startSection('filter-section'); ?>
    <!-- FILTER START -->
    <!-- PROJECT HEADER START -->
    <div class="d-flex filter-box project-header bg-white">

        <div class="mobile-close-overlay w-100 h-100" id="close-client-overlay"></div>
        <div class="project-menu d-lg-flex" id="mob-client-detail">

            <a class="d-none close-it" href="javascript:;" id="close-client-detail">
                <i class="fa fa-times"></i>
            </a>

            <?php if (isset($component)) { $__componentOriginal4b0c45ee1a38bb46a01c2a25edd749ab = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4b0c45ee1a38bb46a01c2a25edd749ab = $attributes; } ?>
<?php $component = App\View\Components\Tab::resolve(['href' => route('projects.show', $project->id),'text' => __('modules.projects.overview')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tab'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Tab::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'overview']); ?>
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
<?php $component = App\View\Components\Tab::resolve(['href' => route('projects.show', $project->id).'?tab=members','text' => __('modules.projects.members')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tab'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Tab::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'members']); ?>
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

        <a class="mb-0 d-block d-lg-none text-dark-grey ml-auto mr-2 border-left-grey"
            onclick="openClientDetailSidebar()"><i class="fa fa-ellipsis-v "></i></a>

    </div>
    <!-- FILTER END -->
    <!-- PROJECT HEADER END -->

<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
    <script src="<?php echo e(asset('vendor/jquery/frappe-charts.min.iife.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <div class="project-wrapper border-top-0 d-lg-flex">
        <?php echo $__env->make($view, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>

    <script>
        const activeTab = "<?php echo e($activeTab); ?>";
        $('.project-menu .' + activeTab).addClass('active');

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/tasks/show.blade.php ENDPATH**/ ?>