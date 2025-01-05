<tr class="custom-permissions" id="module-custom-permission-<?php echo e($modulesData->id); ?>">
    <td></td>
    <td colspan="4">
        <table class="table table-bordered rounded">
            <?php $__currentLoopData = $modulesData->customPermissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td>
                        <h6 class="heading-h6"><?php echo app('translator')->get('permissions.'.$permission->name); ?></h6>
                    </td>
                    <?php
                        $permissionType = $role->permissionType($permission->id);
                        if (!($permissionType)) {
                            $permissionType = 5;
                        }
                        $allowedPermissions = json_decode($permission->allowed_permissions);
                    ?>
                    <td>
                        <select class="select-picker role-permission-select border-0"
                            data-permission-id="<?php echo e($permission->id); ?>" data-role-id="<?php echo e($role->id); ?>">
                            <?php if(!is_null($allowedPermissions)): ?>
                                <?php $__currentLoopData = $allowedPermissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php if($permissionType == $item): ?> selected <?php endif; ?> value="<?php echo e($item); ?>"><?php echo app('translator')->get('app.'.$key); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </select>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </table>
    </td>
    <td></td>
</tr>
<?php /**PATH C:\laragon\www\public_html\resources\views/role-permissions/ajax/custom_permissions.blade.php ENDPATH**/ ?>