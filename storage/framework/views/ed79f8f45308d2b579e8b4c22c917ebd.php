<style>

    .e-btn--3d.-color-primary {
        -webkit-box-shadow: 0 2px 0 #6f9a37;
        box-shadow: 0 2px 0 #6f9a37;
        position: relative;
    }

</style>


<div class="support-div mb-2">
    <?php if(!is_null($envatoUpdateCompanySetting->supported_until)): ?>

        <?php
            $expired = Carbon\Carbon::parse($envatoUpdateCompanySetting->supported_until)->isPast();
            $support = Carbon\Carbon::parse($envatoUpdateCompanySetting->supported_until);
        ?>


        <div class="<?php echo \Illuminate\Support\Arr::toCssClasses(['alert-success' => !$expired,'alert-danger' => $expired,'alert']); ?>">
            <div class="row">
                <div class="col-md-8">
                    <h2 class="mb-0 f-21 font-weight-normal text-capitalize">
                        <strong>Support <?php if($expired): ?> Expired <?php endif; ?>
                        </strong>
                    </h2>
                </div>
                <div class="col-md-4 text-right">
                    <span class="text-center">
                         <?php if($expired): ?>
                            <?php echo e($support->diffForHumans(now(),Carbon\CarbonInterface::DIFF_ABSOLUTE)); ?> ago
                        <?php else: ?>
                            <?php echo e($support->diffForHumans(now(),Carbon\CarbonInterface::DIFF_ABSOLUTE)); ?> left
                        <?php endif; ?>
                    </span>

                    </div>
                <div class="col-md-12 mt-3">
                    <div class="item-support-extension__row1 mb-2">
                        <div class="item-support-extension__label">
                            <?php if($expired): ?>
                                <p>Renew support to get help from <a href="https://1.envato.market/froiden" target="_blank">Author</a>
                                    for 6 months</p>
                            <?php elseif($support->diffInDays() < 90): ?>
                                <p>Get an extra 6 months of support now and save <strong>62.5%</strong> of item price.</p>
                            <?php endif; ?>
                            <?php echo $__env->make('custom-modules.sections.support-date',['fetchSetting' => $envatoUpdateCompanySetting], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>


                    <?php if($expired): ?>
                        <?php if (isset($component)) { $__componentOriginaldbb84df4c3a5cbdd95fb35d18ba6410f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldbb84df4c3a5cbdd95fb35d18ba6410f = $attributes; } ?>
<?php $component = App\View\Components\Forms\LinkPrimary::resolve(['link' => Froiden\Envato\Helpers\FroidenApp::renewSupportUrl(config('froiden_envato.envato_item_id')),'icon' => 'shopping-cart'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.link-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\LinkPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-2 e-btn--3d -color-primary -size-m -width-full h-mt','data-toggle' => 'tooltip','data-original-title' => 'Extend the support of main app now. It will take you to codecanyon website to renew support','target' => '_blank']); ?>Renew support now
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldbb84df4c3a5cbdd95fb35d18ba6410f)): ?>
<?php $attributes = $__attributesOriginaldbb84df4c3a5cbdd95fb35d18ba6410f; ?>
<?php unset($__attributesOriginaldbb84df4c3a5cbdd95fb35d18ba6410f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldbb84df4c3a5cbdd95fb35d18ba6410f)): ?>
<?php $component = $__componentOriginaldbb84df4c3a5cbdd95fb35d18ba6410f; ?>
<?php unset($__componentOriginaldbb84df4c3a5cbdd95fb35d18ba6410f); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginal29acd9b76240152ae380821b082bd629 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal29acd9b76240152ae380821b082bd629 = $attributes; } ?>
<?php $component = App\View\Components\Forms\LinkSecondary::resolve(['link' => 'javascript:;','icon' => 'sync-alt'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.link-secondary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\LinkSecondary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'e-btn--3d -color-primary -size-m -width-full h-mt','onclick' => 'getPurchaseData();','data-toggle' => 'tooltip','data-original-title' => 'This will fetch the latest support date from codecanyon. Click on this button only when you have renewed the support and the new support date is not reflecting']); ?>Refresh
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal29acd9b76240152ae380821b082bd629)): ?>
<?php $attributes = $__attributesOriginal29acd9b76240152ae380821b082bd629; ?>
<?php unset($__attributesOriginal29acd9b76240152ae380821b082bd629); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal29acd9b76240152ae380821b082bd629)): ?>
<?php $component = $__componentOriginal29acd9b76240152ae380821b082bd629; ?>
<?php unset($__componentOriginal29acd9b76240152ae380821b082bd629); ?>
<?php endif; ?>
                    <?php elseif($support->diffInDays() < 90): ?>
                        <?php if (isset($component)) { $__componentOriginaldbb84df4c3a5cbdd95fb35d18ba6410f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldbb84df4c3a5cbdd95fb35d18ba6410f = $attributes; } ?>
<?php $component = App\View\Components\Forms\LinkPrimary::resolve(['link' => Froiden\Envato\Helpers\FroidenApp::extendSupportUrl(config('froiden_envato.envato_item_id')),'icon' => 'shopping-cart'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.link-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\LinkPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-2 e-btn--3d -color-primary -size-m -width-full h-mt','target' => '_blank','data-toggle' => 'tooltip','data-original-title' => 'Extend the support of main app now. It will take you to codecanyon website to renew support']); ?>Extend now and save
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldbb84df4c3a5cbdd95fb35d18ba6410f)): ?>
<?php $attributes = $__attributesOriginaldbb84df4c3a5cbdd95fb35d18ba6410f; ?>
<?php unset($__attributesOriginaldbb84df4c3a5cbdd95fb35d18ba6410f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldbb84df4c3a5cbdd95fb35d18ba6410f)): ?>
<?php $component = $__componentOriginaldbb84df4c3a5cbdd95fb35d18ba6410f; ?>
<?php unset($__componentOriginaldbb84df4c3a5cbdd95fb35d18ba6410f); ?>
<?php endif; ?>

                        <?php if (isset($component)) { $__componentOriginal29acd9b76240152ae380821b082bd629 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal29acd9b76240152ae380821b082bd629 = $attributes; } ?>
<?php $component = App\View\Components\Forms\LinkSecondary::resolve(['link' => 'javascript:;','icon' => 'sync-alt'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.link-secondary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\LinkSecondary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'e-btn--3d -color-primary -size-m -width-full h-mt','onclick' => 'getPurchaseData();','data-toggle' => 'tooltip','data-original-title' => 'This will fetch the latest support date from codecanyon. Click on this button only when you have renewed the support and the new support date is not reflecting']); ?>Refresh
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal29acd9b76240152ae380821b082bd629)): ?>
<?php $attributes = $__attributesOriginal29acd9b76240152ae380821b082bd629; ?>
<?php unset($__attributesOriginal29acd9b76240152ae380821b082bd629); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal29acd9b76240152ae380821b082bd629)): ?>
<?php $component = $__componentOriginal29acd9b76240152ae380821b082bd629; ?>
<?php unset($__componentOriginal29acd9b76240152ae380821b082bd629); ?>
<?php endif; ?>

                    <?php endif; ?>
                </div>
            </div>

        </div>
    <?php endif; ?>
</div>

<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/vendor/froiden-envato/update/support-extend-renewal.blade.php ENDPATH**/ ?>