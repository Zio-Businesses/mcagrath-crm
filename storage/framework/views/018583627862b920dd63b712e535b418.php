<?php if (isset($component)) { $__componentOriginal7d9f6e0b9001f5841f72577781b2d17f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7d9f6e0b9001f5841f72577781b2d17f = $attributes; } ?>
<?php $component = App\View\Components\Table::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Table::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'table-sm-responsive table mb-0']); ?>
     <?php $__env->slot('thead', null, []); ?> 
        <th><?php echo app('translator')->get('app.leaveDate'); ?></th>
        <th><?php echo app('translator')->get('app.leaveType'); ?></th>
        <th><?php echo app('translator')->get('app.status'); ?></th>
        <?php
            if (isset($multipleLeaves)) {
                $leave = $multipleLeaves[0];
            }
        ?>
        <?php if($approveRejectPermission == 'all' || ($deleteLeavePermission == 'all'
                                || ($deleteLeavePermission == 'added' && user()->id == $leave->added_by)
                                || ($deleteLeavePermission == 'owned' && user()->id == $leave->user_id)
                                || ($deleteLeavePermission == 'both' && (user()->id == $leave->user_id || user()->id == $leave->added_by))
                                || ($leaveSetting->manager_permission != 'cannot-approve' && user()->id == $multipleLeaves->first()->user->employeeDetails->reporting_to)
                                )): ?>
            <th class="text-right pr-20"><?php echo app('translator')->get('app.action'); ?></th>
        <?php endif; ?>
     <?php $__env->endSlot(); ?>

    <?php $__empty_1 = true; $__currentLoopData = $multipleLeaves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leave): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <tr class="row<?php echo e($leave->id); ?>">
            <td>
                <?php echo e($leave->leave_date->translatedFormat(company()->date_format)); ?>

            </td>
            <td>
                <span class="badge badge-success" style="background-color:<?php echo e($leave->type->color); ?>"><?php echo e($leave->type->type_name); ?></span>
            </td>
            <td>
                <?php
                    if ($leave->status == 'approved') {
                        $class = 'text-light-green';
                        $status = __('app.approved');
                    }
                    else if ($leave->status == 'pending') {
                        $class = 'text-yellow';
                        $status = __('app.pending');
                    }
                    else {
                        $class = 'text-red';
                        $status = __('app.rejected');
                    }
                ?>

                <i class="fa fa-circle mr-1 <?php echo e($class); ?> f-10"></i> <?php echo e($status); ?>

            </td>

            <?php if($approveRejectPermission == 'all' || ($deleteLeavePermission == 'all'
                                || ($deleteLeavePermission == 'added' && user()->id == $leave->added_by)
                                || ($deleteLeavePermission == 'owned' && user()->id == $leave->user_id)
                                || ($deleteLeavePermission == 'both' && (user()->id == $leave->user_id || user()->id == $leave->added_by))
                                ) || ($leaveSetting->manager_permission != 'cannot-approve' && user()->id == $leave->user->employeeDetails->reporting_to)
                                ): ?>
                <?php if($viewType == 'model'): ?>
                    <td class="text-right">
                        <?php if($leave->status == 'pending' && ($approveRejectPermission == 'all' || ($leaveSetting->manager_permission != 'cannot-approve' && user()->id == $leave->user->employeeDetails->reporting_to))): ?>
                            <div class="task_view">
                                <a class="dropdown-item leave-action-approved action-hover" data-leave-id=<?php echo e($leave->id); ?>

                                    data-leave-action="approved" data-toggle="tooltip" data-original-title="<?php echo app('translator')->get('app.approve'); ?>" data-leave-type-id="<?php echo e($leave->leave_type_id); ?>" href="javascript:;">
                                        <i class="fa fa-check mr-2"></i>
                                </a>
                            </div>
                            <div class="task_view mt-1 mt-lg-0 mt-md-0">
                                <a class="dropdown-item leave-action-reject action-hover" data-leave-id=<?php echo e($leave->id); ?>

                                    data-leave-action="rejected" data-toggle="tooltip" data-original-title="<?php echo app('translator')->get('app.reject'); ?>" data-leave-type-id="<?php echo e($leave->leave_type_id); ?>"  href="javascript:;">
                                        <i class="fa fa-times mr-2"></i>
                                </a>
                            </div>
                        <?php endif; ?>
                        <?php if($deleteLeavePermission == 'all'
                                    || ($deleteLeavePermission == 'added' && user()->id == $leave->added_by)
                                    || ($deleteLeavePermission == 'owned' && user()->id == $leave->user_id)
                                    || ($deleteLeavePermission == 'both' && (user()->id == $leave->user_id || user()->id == $leave->added_by))): ?>
                            <div class="task_view mt-1 mt-lg-0 mt-md-0">
                                <a data-leave-id=<?php echo e($leave->id); ?> data-type="multiple-leave" data-unique-id="<?php echo e($leave->unique_id); ?>"
                                    class="dropdown-item delete-table-row action-hover"  data-toggle="tooltip" data-original-title="<?php echo app('translator')->get('app.delete'); ?>" href="javascript:;">
                                    <i class="fa fa-trash mr-2"></i>
                                </a>
                            </div>
                        <?php endif; ?>
                    </td>
                <?php else: ?>
                    <td class="text-right pr-20">
                        <div class="task_view">
                            <div class="dropdown">
                                <a class="task_view_more d-flex align-items-center justify-content-center dropdown-toggle" type="link" id="dropdownMenuLink-41" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="icon-options-vertical icons"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink-41" tabindex="0" x-placement="bottom-end" style="position: absolute; transform: translate3d(-137px, 26px, 0px); top: 0px; left: 0px; will-change: transform;">
                                    <a href="<?php echo e(route('leaves.show', $leave->id)); ?>?type=single" class="dropdown-item openRightModal"><i class="fa fa-eye mr-2"></i><?php echo app('translator')->get('app.view'); ?></a>

                                    <?php if($leave->status == 'pending'): ?>
                                        <a class="dropdown-item leave-action-approved" data-leave-id=<?php echo e($leave->id); ?>

                                            data-leave-action="approved" data-user-id="<?php echo e($leave->user_id); ?>" data-leave-type-id="<?php echo e($leave->leave_type_id); ?>" href="javascript:;">
                                            <i class="fa fa-check mr-2"></i><?php echo app('translator')->get('app.approve'); ?>
                                        </a>
                                        <a data-leave-id=<?php echo e($leave->id); ?>

                                                data-leave-action="rejected" data-user-id="<?php echo e($leave->user_id); ?>" data-leave-type-id="<?php echo e($leave->leave_type_id); ?>" class="dropdown-item leave-action-reject" href="javascript:;">
                                                <i class="fa fa-times mr-2"></i><?php echo app('translator')->get('app.reject'); ?>
                                        </a>
                                        <?php if($editLeavePermission == 'all'
                                        || ($editLeavePermission == 'added' && user()->id == $leave->added_by)
                                        || ($editLeavePermission == 'owned' && user()->id == $leave->user_id)
                                        || ($editLeavePermission == 'both' && (user()->id == $leave->user_id || user()->id == $leave->added_by))
                                        ): ?>
                                            <div class="mt-1 mt-lg-0 mt-md-0">
                                                <a class="dropdown-item openRightModal" href="<?php echo e(route('leaves.edit', $leave->id)); ?>">
                                                    <i class="fa fa-edit mr-2"></i><?php echo app('translator')->get('app.edit'); ?>
                                            </a>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                    <?php if($deleteLeavePermission == 'all'
                                    || ($deleteLeavePermission == 'added' && user()->id == $leave->added_by)
                                    || ($deleteLeavePermission == 'owned' && user()->id == $leave->user_id)
                                    || ($deleteLeavePermission == 'both' && (user()->id == $leave->user_id || user()->id == $leave->added_by))): ?>
                                        <div class="mt-1 mt-lg-0 mt-md-0">
                                            <a data-leave-id="<?php echo e($leave->id); ?>" data-unique-id=" <?php echo e($leave->unique_id); ?>"
                                                data-duration="<?php echo e($leave->duration); ?>" class="dropdown-item delete-multiple-leave" href="javascript:;">
                                                <i class="fa fa-trash mr-2"></i><?php echo app('translator')->get('app.delete'); ?>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </td>
                <?php endif; ?>
            <?php endif; ?>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <tr>
            <td colspan="4">
                <?php if (isset($component)) { $__componentOriginal269164c77d9d34462c34359c03da6a68 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal269164c77d9d34462c34359c03da6a68 = $attributes; } ?>
<?php $component = App\View\Components\Cards\NoRecord::resolve(['icon' => 'user','message' => __('messages.noAgentAdded')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/leaves/multiple-leave-table.blade.php ENDPATH**/ ?>