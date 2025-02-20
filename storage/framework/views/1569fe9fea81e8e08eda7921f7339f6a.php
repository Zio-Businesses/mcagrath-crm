<div class="table-responsive p-20">

    <div id="update-area" class="mt-20 mb-20 col-md-12 white-box d-none">
        <?php echo e(__('app.loading')); ?>

    </div>
    <div class="alert alert-danger d-none" id="custom-module-alert"></div>

    <?php if ($__env->exists('languagepack::module-activated-alert')) echo $__env->make('languagepack::module-activated-alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('custom-modules.sections.universal-bundle', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php if (isset($component)) { $__componentOriginal7d9f6e0b9001f5841f72577781b2d17f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7d9f6e0b9001f5841f72577781b2d17f = $attributes; } ?>
<?php $component = App\View\Components\Table::resolve(['headType' => 'thead-light'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Table::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'table-bordered table-hover custom-modules-table']); ?>
         <?php $__env->slot('thead', null, []); ?> 
            <th><?php echo app('translator')->get('app.name'); ?></th>
            <?php if(!$universalBundle): ?>
            <th><?php echo app('translator')->get('app.purchaseCode'); ?></th>
            <?php endif; ?>
            <th><?php echo app('translator')->get('app.moduleVersion'); ?></th>
            <?php if(!$universalBundle): ?>
            <th class="text-right"><?php echo app('translator')->get('app.notify'); ?></th>
            <?php endif; ?>
            <th class="text-right"><?php echo app('translator')->get('app.status'); ?></th>
         <?php $__env->endSlot(); ?>

        <?php $__empty_1 = true; $__currentLoopData = $allModules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <?php
            $fetchSetting = null;
            if (in_array($module, $worksuitePlugins) && config(strtolower($module) . '.setting'))
            {
                $fetchSetting = config(strtolower($module) . '.setting')::first();
            }
        ?>
            <tr>
                <td><span><?php echo e($key); ?></span>
                    <?php if(module_enabled('UniversalBundle') && isInstallFromUniversalBundleModule($key)): ?>
                            <i class="icon text-info fas fa-info-circle cursor-pointer" data-toggle="tooltip"
                              data-original-title="<?php echo e(__('universalbundle::app.moduleInfo')); ?>"></i>
                    <?php else: ?>





                    <?php endif; ?>







                </td>
                <?php if(!$universalBundle): ?>
                <td>
                    <?php if($fetchSetting): ?>
                        <?php if(config(strtolower($module) . '.verification_required')): ?>
                            <?php echo $__env->make('custom-modules.sections.purchase-code', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                    <?php endif; ?>
                </td>
                <?php endif; ?>
                <td>
                    <?php if(config(strtolower($module) . '.setting')): ?>
                        <?php echo $__env->make('custom-modules.sections.version', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <?php if($plugins->where('envato_id', config(strtolower($module) . '.envato_item_id'))->first() && !(module_enabled('UniversalBundle') && isInstallFromUniversalBundleModule($key))): ?>
                            <?php echo $__env->make('custom-modules.sections.module-update', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                    <?php endif; ?>

                </td>

                <?php if(!$universalBundle): ?>
                <td class="text-right">
                    <?php if($fetchSetting): ?>
                    <div class="custom-control custom-switch ml-2 d-inline-block"  data-toggle="tooltip"
                         data-original-title="<?php echo app('translator')->get('app.moduleNotifySwitchMessage', ['name' => $module]); ?>">
                        <input type="checkbox" class="custom-control-input change-module-notification"
                                <?php if($fetchSetting->notify_update): echo 'checked'; endif; ?>
                               id="module-notification-<?php echo e($key); ?>" data-module-name="<?php echo e($module); ?>">
                        <label class="custom-control-label cursor-pointer" for="module-notification-<?php echo e($key); ?>"></label>
                    </div>
                    <?php endif; ?>
                </td>
                <?php endif; ?>

                <td class="text-right">
                    <div class="custom-control custom-switch ml-2 d-inline-block"  data-toggle="tooltip"
                         data-original-title="<?php echo app('translator')->get('app.moduleSwitchMessage', ['name' => $module]); ?>">
                        <input type="checkbox" <?php if(in_array($module, $worksuitePlugins)): ?> checked
                               <?php endif; ?> class="custom-control-input change-module-status"
                               id="module-<?php echo e($key); ?>" data-module-name="<?php echo e($module); ?>">
                        <label class="custom-control-label cursor-pointer" for="module-<?php echo e($key); ?>"></label>
                    </div>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="5">
                    <?php if (isset($component)) { $__componentOriginal269164c77d9d34462c34359c03da6a68 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal269164c77d9d34462c34359c03da6a68 = $attributes; } ?>
<?php $component = App\View\Components\Cards\NoRecord::resolve(['icon' => 'calendar','message' => __('messages.noRecordFound')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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

    <?php echo $__env->make('vendor.froiden-envato.update.plugins', ['allModules' => $allModules], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>

<script>
    $('body').on('change', '.change-module-status', function () {
        let moduleStatus;
        const module = $(this).data('module-name');

        if ($(this).is(':checked')) {
            moduleStatus = 'active';
        } else {
            moduleStatus = 'inactive';
        }

        let url = "<?php echo e(route('custom-modules.update', ':module')); ?>";
        url = url.replace(':module', module);

        $('#custom-module-alert').addClass('d-none');

        $.easyAjax({
            url: url,
            type: "POST",
            disableButton: true,
            buttonSelector: ".change-module-status",
            container: '.custom-modules-table',
            blockUI: true,
            data: {
                'id': module,
                'status': moduleStatus,
                '_method': 'PUT',
                '_token': '<?php echo e(csrf_token()); ?>'
            },
            error: function (response) {
                if (response.responseJSON) {
                    $('#custom-module-alert').html(response.responseJSON.message).removeClass('d-none');
                    $('#module-' + module).prop('checked', false);
                }

            }
        });
    });

    $('body').on('click', '.verify-module', function () {
        const module = $(this).data('module');
        let url = "<?php echo e(route('custom-modules.show', ':module')); ?>";
        url = url.replace(':module', module);
        $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
        $.ajaxModal(MODAL_LG, url);
    });

</script>
<?php if ($__env->exists('vendor.froiden-envato.update.update_module')) echo $__env->make('vendor.froiden-envato.update.update_module', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/custom-modules/ajax/custom.blade.php ENDPATH**/ ?>