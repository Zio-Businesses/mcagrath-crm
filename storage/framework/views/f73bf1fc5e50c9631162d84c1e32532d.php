<style>
    .note {
        margin-bottom: 15px;
        padding: 15px;
        background-color: #e7f3fe;
        border-left: 6px solid #2196F3;
    }

    ul,
    li {
        list-style: inherit;
        line-height: 20px;
    }

    .note ul {
        margin-bottom: 20px;
        margin-top: 2px;
        margin-left: 10px;
    }

    .version-update-heading {
        color: #39bee6;
    }

    .update-summary-title {
        border-bottom: 1px solid black;
        padding-bottom: 8px
    }

</style>
<div class="row">
    <div class="col-sm-12">
        <?php ($envatoUpdateCompanySetting = \Froiden\Envato\Functions\EnvatoUpdate::companySetting()); ?>

        <?php echo $__env->make('vendor.froiden-envato.update.support-extend-renewal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php if(isset($updateVersionInfo['lastVersion'])): ?>

            <?php if (isset($component)) { $__componentOriginal5194778a3a7b899dcee5619d0610f5cf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5194778a3a7b899dcee5619d0610f5cf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.alert','data' => ['type' => 'danger']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'danger']); ?>
                <ol class="mb-0">
                    <li><?php echo app('translator')->get('messages.updateAlert'); ?></li>
                    <li><?php echo app('translator')->get('messages.updateBackupNotice'); ?></li>
                </ol>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5194778a3a7b899dcee5619d0610f5cf)): ?>
<?php $attributes = $__attributesOriginal5194778a3a7b899dcee5619d0610f5cf; ?>
<?php unset($__attributesOriginal5194778a3a7b899dcee5619d0610f5cf); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5194778a3a7b899dcee5619d0610f5cf)): ?>
<?php $component = $__componentOriginal5194778a3a7b899dcee5619d0610f5cf; ?>
<?php unset($__componentOriginal5194778a3a7b899dcee5619d0610f5cf); ?>
<?php endif; ?>

            <div id="update-area" class="mt-20 mb-20 col-md-12 white-box d-none">
                <?php echo e(__('app.loading')); ?>

            </div>

            <div class="note alert alert-primary">
                <div class="row p-20" style="line-height: 22px">
                    <div class="col-md-8">
                        <h6 class="f-24">
                            <i class="fa fa-gift f-20"></i> <?php echo app('translator')->get('modules.update.newUpdate'); ?> <span
                                class="badge badge-success"><?php echo e($updateVersionInfo['lastVersion']); ?></span>
                        </h6>
                        <div class="mt-3"><span class="font-weight-bold text-red">Note:</span> You will get
                            logged
                            out after update. Login again to use the application.
                        </div>
                        <div class="font-12 mt-3"><?php echo app('translator')->get('modules.update.updateAlternate'); ?></div>
                    </div>
                    <div class="col-md-4 text-right mt-3">
                        <?php if (isset($component)) { $__componentOriginaldbb84df4c3a5cbdd95fb35d18ba6410f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldbb84df4c3a5cbdd95fb35d18ba6410f = $attributes; } ?>
<?php $component = App\View\Components\Forms\LinkPrimary::resolve(['link' => 'javascript:;','icon' => 'download'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.link-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\LinkPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'update-app']); ?>
                            <?php echo app('translator')->get('modules.update.updateNow'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldbb84df4c3a5cbdd95fb35d18ba6410f)): ?>
<?php $attributes = $__attributesOriginaldbb84df4c3a5cbdd95fb35d18ba6410f; ?>
<?php unset($__attributesOriginaldbb84df4c3a5cbdd95fb35d18ba6410f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldbb84df4c3a5cbdd95fb35d18ba6410f)): ?>
<?php $component = $__componentOriginaldbb84df4c3a5cbdd95fb35d18ba6410f; ?>
<?php unset($__componentOriginaldbb84df4c3a5cbdd95fb35d18ba6410f); ?>
<?php endif; ?>
                    </div>
                </div>

                <div class="col-md-12 mt-5">
                    <h6 class="update-summary-title"><i class="fa fa-history f-20"></i> Update Summary</h6>
                    <div><?php echo $updateVersionInfo['updateInfo']; ?></div>
                </div>
            </div>

        <?php else: ?>
            <?php if (isset($component)) { $__componentOriginal5194778a3a7b899dcee5619d0610f5cf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5194778a3a7b899dcee5619d0610f5cf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.alert','data' => ['type' => 'info','icon' => 'info-circle']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'info','icon' => 'info-circle']); ?>
                You have the latest version of this app.
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5194778a3a7b899dcee5619d0610f5cf)): ?>
<?php $attributes = $__attributesOriginal5194778a3a7b899dcee5619d0610f5cf; ?>
<?php unset($__attributesOriginal5194778a3a7b899dcee5619d0610f5cf); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5194778a3a7b899dcee5619d0610f5cf)): ?>
<?php $component = $__componentOriginal5194778a3a7b899dcee5619d0610f5cf; ?>
<?php unset($__componentOriginal5194778a3a7b899dcee5619d0610f5cf); ?>
<?php endif; ?>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/vendor/froiden-envato/update/update_blade.blade.php ENDPATH**/ ?>