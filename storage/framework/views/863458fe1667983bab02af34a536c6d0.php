

<?php $__env->startSection('content'); ?>

    <!-- CONTENT WRAPPER START -->
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 text-center mt-4">
                <h2 class="heading-h2"><?php echo app('translator')->get('app.welcome'); ?> <?php echo e(user()->name); ?></h2>
                <p><?php echo app('translator')->get('modules.checklist.checklistInfo'); ?></p>
            </div>

            <div class="col-md-12 mt-4">

                <?php if (isset($component)) { $__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9 = $attributes; } ?>
<?php $component = App\View\Components\Cards\Data::resolve(['title' => 'To Do List'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Data::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

                    <?php if (isset($component)) { $__componentOriginala6a6b9c713941f8a7be83325cb6f4704 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala6a6b9c713941f8a7be83325cb6f4704 = $attributes; } ?>
<?php $component = App\View\Components\Cards\OnboardingItem::resolve(['title' => __('modules.checklist.installation'),'summary' => __('modules.checklist.installationInfo'),'completed' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.onboarding-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\OnboardingItem::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala6a6b9c713941f8a7be83325cb6f4704)): ?>
<?php $attributes = $__attributesOriginala6a6b9c713941f8a7be83325cb6f4704; ?>
<?php unset($__attributesOriginala6a6b9c713941f8a7be83325cb6f4704); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala6a6b9c713941f8a7be83325cb6f4704)): ?>
<?php $component = $__componentOriginala6a6b9c713941f8a7be83325cb6f4704; ?>
<?php unset($__componentOriginala6a6b9c713941f8a7be83325cb6f4704); ?>
<?php endif; ?>

                    <?php if (isset($component)) { $__componentOriginala6a6b9c713941f8a7be83325cb6f4704 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala6a6b9c713941f8a7be83325cb6f4704 = $attributes; } ?>
<?php $component = App\View\Components\Cards\OnboardingItem::resolve(['title' => __('modules.checklist.accountSetup'),'summary' => __('modules.checklist.accountSetupInfo'),'completed' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.onboarding-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\OnboardingItem::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala6a6b9c713941f8a7be83325cb6f4704)): ?>
<?php $attributes = $__attributesOriginala6a6b9c713941f8a7be83325cb6f4704; ?>
<?php unset($__attributesOriginala6a6b9c713941f8a7be83325cb6f4704); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala6a6b9c713941f8a7be83325cb6f4704)): ?>
<?php $component = $__componentOriginala6a6b9c713941f8a7be83325cb6f4704; ?>
<?php unset($__componentOriginala6a6b9c713941f8a7be83325cb6f4704); ?>
<?php endif; ?>

                    <?php if (isset($component)) { $__componentOriginala6a6b9c713941f8a7be83325cb6f4704 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala6a6b9c713941f8a7be83325cb6f4704 = $attributes; } ?>
<?php $component = App\View\Components\Cards\OnboardingItem::resolve(['title' => __('modules.checklist.emailSetup'),'summary' => __('modules.checklist.configureEmailSetting'),'completed' => smtp_setting()->mail_from_email != 'from@email.com','link' => route('notifications.index')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.onboarding-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\OnboardingItem::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala6a6b9c713941f8a7be83325cb6f4704)): ?>
<?php $attributes = $__attributesOriginala6a6b9c713941f8a7be83325cb6f4704; ?>
<?php unset($__attributesOriginala6a6b9c713941f8a7be83325cb6f4704); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala6a6b9c713941f8a7be83325cb6f4704)): ?>
<?php $component = $__componentOriginala6a6b9c713941f8a7be83325cb6f4704; ?>
<?php unset($__componentOriginala6a6b9c713941f8a7be83325cb6f4704); ?>
<?php endif; ?>

                    <?php if (isset($component)) { $__componentOriginala6a6b9c713941f8a7be83325cb6f4704 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala6a6b9c713941f8a7be83325cb6f4704 = $attributes; } ?>
<?php $component = App\View\Components\Cards\OnboardingItem::resolve(['title' => __('modules.checklist.crontSetup'),'summary' => __('modules.checklist.cronSetupInfo'),'completed' => global_setting()->last_cron_run,'link' => route('app-settings.index')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.onboarding-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\OnboardingItem::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala6a6b9c713941f8a7be83325cb6f4704)): ?>
<?php $attributes = $__attributesOriginala6a6b9c713941f8a7be83325cb6f4704; ?>
<?php unset($__attributesOriginala6a6b9c713941f8a7be83325cb6f4704); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala6a6b9c713941f8a7be83325cb6f4704)): ?>
<?php $component = $__componentOriginala6a6b9c713941f8a7be83325cb6f4704; ?>
<?php unset($__componentOriginala6a6b9c713941f8a7be83325cb6f4704); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginala6a6b9c713941f8a7be83325cb6f4704 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala6a6b9c713941f8a7be83325cb6f4704 = $attributes; } ?>
<?php $component = App\View\Components\Cards\OnboardingItem::resolve(['title' => __('modules.checklist.companyLogo'),'summary' => __('modules.checklist.companyLogoInfo'),'completed' => company()->logo,'link' => route('theme-settings.index')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.onboarding-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\OnboardingItem::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala6a6b9c713941f8a7be83325cb6f4704)): ?>
<?php $attributes = $__attributesOriginala6a6b9c713941f8a7be83325cb6f4704; ?>
<?php unset($__attributesOriginala6a6b9c713941f8a7be83325cb6f4704); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala6a6b9c713941f8a7be83325cb6f4704)): ?>
<?php $component = $__componentOriginala6a6b9c713941f8a7be83325cb6f4704; ?>
<?php unset($__componentOriginala6a6b9c713941f8a7be83325cb6f4704); ?>
<?php endif; ?>

                    <?php if (isset($component)) { $__componentOriginala6a6b9c713941f8a7be83325cb6f4704 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala6a6b9c713941f8a7be83325cb6f4704 = $attributes; } ?>
<?php $component = App\View\Components\Cards\OnboardingItem::resolve(['title' => __('modules.checklist.favicon'),'summary' => __('modules.checklist.faviconInfo'),'completed' => global_setting()->favicon,'link' => route('theme-settings.index')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.onboarding-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\OnboardingItem::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala6a6b9c713941f8a7be83325cb6f4704)): ?>
<?php $attributes = $__attributesOriginala6a6b9c713941f8a7be83325cb6f4704; ?>
<?php unset($__attributesOriginala6a6b9c713941f8a7be83325cb6f4704); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala6a6b9c713941f8a7be83325cb6f4704)): ?>
<?php $component = $__componentOriginala6a6b9c713941f8a7be83325cb6f4704; ?>
<?php unset($__componentOriginala6a6b9c713941f8a7be83325cb6f4704); ?>
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
        </div>
    </div>
    <!-- CONTENT WRAPPER END -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/dashboard/checklist.blade.php ENDPATH**/ ?>