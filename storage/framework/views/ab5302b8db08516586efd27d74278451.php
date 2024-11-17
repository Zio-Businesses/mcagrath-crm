<div class="card w-100 rounded-0 border-0 comment">
    <div class="card-horizontal">
        <div class="card-body border-0 px-1 py-1">
            <?php if($hasLeaveQuotas): ?>
                <div class="card-text f-14 text-dark-grey text-justify">
                    <?php if (isset($component)) { $__componentOriginal7d9f6e0b9001f5841f72577781b2d17f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7d9f6e0b9001f5841f72577781b2d17f = $attributes; } ?>
<?php $component = App\View\Components\Table::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Table::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'table-bordered my-3 rounded']); ?>
                         <?php $__env->slot('thead', null, []); ?> 
                            <th><?php echo app('translator')->get('modules.leaves.leaveType'); ?></th>
                            <th class="text-right"><?php echo app('translator')->get('modules.leaves.noOfLeaves'); ?></th>
                            <th class="text-right"><?php echo app('translator')->get('modules.leaves.monthLimit'); ?></th>
                            <th class="text-right"><?php echo app('translator')->get('app.totalLeavesTaken'); ?></th>
                            <th class="text-right"><?php echo app('translator')->get('modules.leaves.remainingLeaves'); ?></th>
                         <?php $__env->endSlot(); ?>
                        <?php $__currentLoopData = $employeeLeavesQuotas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $leavesQuota): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($leavesQuota->leaveType->leaveTypeCondition($leavesQuota->leaveType,  $employee)): ?>
                        <tr>
                            <td>
                                <?php if (isset($component)) { $__componentOriginal86883428e4629123511f221a5a89811e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal86883428e4629123511f221a5a89811e = $attributes; } ?>
<?php $component = App\View\Components\Status::resolve(['value' => $leavesQuota->leaveType->type_name,'style' => 'color:'.$leavesQuota->leaveType->color] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('status'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Status::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal86883428e4629123511f221a5a89811e)): ?>
<?php $attributes = $__attributesOriginal86883428e4629123511f221a5a89811e; ?>
<?php unset($__attributesOriginal86883428e4629123511f221a5a89811e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal86883428e4629123511f221a5a89811e)): ?>
<?php $component = $__componentOriginal86883428e4629123511f221a5a89811e; ?>
<?php unset($__componentOriginal86883428e4629123511f221a5a89811e); ?>
<?php endif; ?>
                            </td>
                            <td class="text-right"><?php echo e($leavesQuota?->no_of_leaves ?: 0); ?></td>
                            <td class="text-right"><?php echo e(($leavesQuota->leaveType->monthly_limit > 0) ? $leavesQuota->leaveType->monthly_limit : '--'); ?></td>
                            <td class="text-right">
                                <?php echo e($leavesQuota->leaves_used); ?>

                            </td>
                            <td class="text-right"><?php echo e($leavesQuota->leaves_remaining); ?></td>
                        </tr>
                        <?php endif; ?>
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
                </div>
            <?php endif; ?>

            <?php if(!$hasLeaveQuotas): ?>
                <?php if (isset($component)) { $__componentOriginal269164c77d9d34462c34359c03da6a68 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal269164c77d9d34462c34359c03da6a68 = $attributes; } ?>
<?php $component = App\View\Components\Cards\NoRecord::resolve(['icon' => 'redo','message' => __('messages.noRecordFound')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/employees/leaves_quota.blade.php ENDPATH**/ ?>