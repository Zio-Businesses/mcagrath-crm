<style>
    .role-permission-select .btn {
        border: none;
        width: auto;
    }

    .permisison-table .thead-light {
        top: 107px;
        z-index: unset;
    }


</style>

<?php if (isset($component)) { $__componentOriginal5194778a3a7b899dcee5619d0610f5cf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5194778a3a7b899dcee5619d0610f5cf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.alert','data' => ['type' => 'warning','class' => \Illuminate\Support\Arr::toCssClasses(['mt-4', 'd-none' => !($employee->customised_permissions)])]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'warning','class' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(\Illuminate\Support\Arr::toCssClasses(['mt-4', 'd-none' => !($employee->customised_permissions)]))]); ?>
    <div class="d-flex justify-content-between">
        <div class="pt-2">
            <i class="fa fa-exclamation-triangle"></i> <?php echo app('translator')->get('messages.customPermissionError'); ?>
        </div>
        <?php if (isset($component)) { $__componentOriginal5e57c6582b8a883148a28bb7ee46d2ad = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5e57c6582b8a883148a28bb7ee46d2ad = $attributes; } ?>
<?php $component = App\View\Components\Forms\ButtonSecondary::resolve(['icon' => 'sync'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-secondary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonSecondary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'reset-user-permissions']); ?><?php echo app('translator')->get('app.resetPermissions'); ?> <?php echo $__env->renderComponent(); ?>
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

<?php if($employee->hasRole('admin')): ?>
    <?php if (isset($component)) { $__componentOriginal5194778a3a7b899dcee5619d0610f5cf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5194778a3a7b899dcee5619d0610f5cf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.alert','data' => ['type' => 'danger','class' => 'mt-5','icon' => 'exclamation-triangle']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'danger','class' => 'mt-5','icon' => 'exclamation-triangle']); ?>
        <?php echo app('translator')->get('messages.adminPermissionError'); ?>
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
<?php else: ?>

    <?php if (isset($component)) { $__componentOriginal7d9f6e0b9001f5841f72577781b2d17f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7d9f6e0b9001f5841f72577781b2d17f = $attributes; } ?>
<?php $component = App\View\Components\Table::resolve(['headType' => 'thead-light'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Table::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'table-bordered table-hover mt-4 permisison-table bg-white rounded']); ?>
         <?php $__env->slot('thead', null, []); ?> 
            <th width="20%">
                <?php echo app('translator')->get('app.module'); ?>
            </th>
            <th width="16%"><?php echo app('translator')->get('app.add'); ?></th>
            <th width="16%"><?php echo app('translator')->get('app.view'); ?></th>
            <th width="16%"><?php echo app('translator')->get('app.update'); ?></th>
            <th width="16%"><?php echo app('translator')->get('app.delete'); ?></th>
            <th width="16%"></th>
         <?php $__env->endSlot(); ?>
        <?php $__currentLoopData = $modulesData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $moduleData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo app('translator')->get('modules.module.'.$moduleData->module_name); ?>
                </td>
                <?php $__currentLoopData = $moduleData->permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $permissionType = $employee->permissionTypeId($permission->name);
                        $allowedPermissions = json_decode($permission->allowed_permissions);
                    ?>
                    <td>
                        <select class="role-permission-select border-0" data-permission-id="<?php echo e($permission->id); ?>">
                            <?php if(!is_null($allowedPermissions)): ?>
                                <?php $__currentLoopData = $allowedPermissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php if($permissionType == $key): ?> selected <?php endif; ?>
                                    <?php if(!$permissionType && $item == 5): ?> selected <?php endif; ?> value="<?php echo e($item); ?>">
                                    <?php echo app('translator')->get('app.'.$key); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </select>
                    </td>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                <?php if(count($moduleData->permissions) < 4): ?>
                    <?php for($i = 1; $i <= 4 - count($moduleData->permissions); $i++): ?> <td>--</td> <?php endfor; ?>
                <?php endif; ?>

                <td class="text-center bg-light border-left">
                    <div class="p-2">
                        <?php if($moduleData->custom_permissions_count > 0): ?>
                            <a href="javascript:;" data-module-id="<?php echo e($moduleData->id); ?>"
                                class="text-dark-grey show-custom-permission dropdown-toggle">
                                <?php echo app('translator')->get('app.more'); ?> <i class="fa fa-chevron-down"></i>
                            </a>
                        <?php else: ?>
                            &nbsp;
                        <?php endif; ?>
                    </div>
                </td>


            </tr>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

    <script>
        $('body').on('click', '.show-custom-permission', function() {
            var moduleRow = $(this).closest('tr');
            var moduleId = $(this).data('module-id');
            var url = "<?php echo e(route('user-permissions.custom_permissions', $employee->id)); ?>";
            var showCustomPermissionButton = $(this);

            $.easyAjax({
                url: url,
                blockUI: true,
                container: '.main-container',
                type: "POST",
                data: {
                    'moduleId': moduleId,
                    '_token': '<?php echo e(csrf_token()); ?>'
                },
                success: function(response) {
                    if (response.status == 'success') {
                        if ($('table.permisison-table tbody #module-custom-permission-' + moduleId)
                            .length > 0) {
                            $('table.permisison-table tbody #module-custom-permission-' + moduleId)
                                .remove();
                        } else {
                            moduleRow.after(response.html);
                        }
                        showCustomPermissionButton
                            .find(".svg-inline--fa")
                            .toggleClass("fa-chevron-down fa-chevron-up");
                    }
                }
            });
        });

        $('body').on('change', '.role-permission-select', function() {
            var permissionId = $(this).data('permission-id');
            var permissionType = $(this).val();
            var url = "<?php echo e(route('user-permissions.update', $employee->id)); ?>";

            $.easyAjax({
                url: url,
                blockUI: true,
                container: '.main-container',
                type: "POST",
                data: {
                    '_method': 'PUT',
                    'permissionId': permissionId,
                    'permissionType': permissionType,
                    'permissionCustomised': 1,
                    '_token': '<?php echo e(csrf_token()); ?>'
                },
                success: function (response) {
                    $('#reset-user-permissions').closest('.alert').removeClass('d-none');
                }
            });
        });

        $('body').on('click', '#reset-user-permissions', function() {
            var url = "<?php echo e(route('user-permissions.reset_permissions', $employee->id)); ?>";

            $.easyAjax({
                url: url,
                blockUI: true,
                container: '.main-container',
                type: "POST",
                data: {
                    '_token': '<?php echo e(csrf_token()); ?>'
                },
                success: function(response) {
                    if (response.status == 'success') {
                        window.location.reload();
                    }
                }
            });
        });

    </script>
<?php endif; ?>
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\employees\ajax\permissions.blade.php ENDPATH**/ ?>