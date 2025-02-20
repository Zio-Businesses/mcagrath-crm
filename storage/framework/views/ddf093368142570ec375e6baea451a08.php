<?php
$editTimelogPermission = user()->permission('edit_timelogs');
$deleteTimelogPermission = user()->permission('delete_timelogs');
?>
<div class="row user-timelogs mt-3">
    <div class="col-md-12">
        <?php if (isset($component)) { $__componentOriginal7d9f6e0b9001f5841f72577781b2d17f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7d9f6e0b9001f5841f72577781b2d17f = $attributes; } ?>
<?php $component = App\View\Components\Table::resolve(['headType' => 'thead-light'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Table::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'table-bordered table-sm-responsive bg-white']); ?>
             <?php $__env->slot('thead', null, []); ?> 
                <th><?php echo app('translator')->get('app.task'); ?></th>
                <th><?php echo app('translator')->get('app.time'); ?></th>
                <th><?php echo app('translator')->get('modules.timeLogs.totalHours'); ?></th>
                <th><?php echo app('translator')->get('app.earnings'); ?></th>
                <th class="text-right"><?php echo app('translator')->get('app.action'); ?></th>
             <?php $__env->endSlot(); ?>

            <?php $__empty_1 = true; $__currentLoopData = $timelogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td>
                        <?php if(!is_null($item->project_id) && !is_null($item->task_id)): ?>
                            <h5 class="f-13 text-darkest-grey"><a href="<?php echo e(route('tasks.show', $item->task_id)); ?>"
                                    class="openRightModal"><?php echo e($item->task->heading); ?></a></h5>
                            <div class="text-muted"><?php echo e($item->project->project_name); ?></div>
                        <?php elseif(!is_null($item->project_id)): ?>
                            <a href="<?php echo e(route('projects.show', $item->project_id)); ?>"
                                class="text-darkest-grey "><?php echo e($item->project->project_name); ?></a>
                        <?php elseif(!is_null($item->task_id)): ?>
                            <a href="<?php echo e(route('tasks.show', $item->task_id)); ?>"
                                class="text-darkest-grey openRightModal"><?php echo e($item->task->heading); ?></a>
                        <?php endif; ?>
                    </td>
                    <td>
                        <p><?php echo e($item->start_time->timezone(company()->timezone)->translatedFormat(company()->date_format . ' ' . company()->time_format)); ?>

                        </p>
                        <?php echo e($item->end_time->timezone(company()->timezone)->translatedFormat(company()->date_format . ' ' . company()->time_format)); ?>

                    </td>
                    <td>
                        <?php echo e($item->hours); ?>

                    </td>
                    <td>
                        <?php echo e(currency_format($item->earnings, company()->currency_id)); ?>

                        <?php if($item->approved): ?>
                            <i data-toggle="tooltip" data-original-title="<?php echo e(__('app.approved')); ?>"
                                class="fa fa-check-circle text-primary"></i>
                        <?php endif; ?>
                    </td>
                    <td class="text-right">
                        <div class="task_view">
                            <a href="<?php echo e(route('timelogs.show', $item->id)); ?>"
                                class="taskView openRightModal"><?php echo app('translator')->get('app.view'); ?></a>
                            <div class="dropdown">
                                <a class="task_view_more d-flex align-items-center justify-content-center dropdown-toggle"
                                    type="link" id="dropdownMenuLink-<?php echo e($item->id); ?>" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="icon-options-vertical icons"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right"
                                    aria-labelledby="dropdownMenuLink-<?php echo e($item->id); ?>" tabindex="0">

                                    <?php if(!is_null($item->end_time)): ?>
                                        <?php if($editTimelogPermission == 'all' || ($editTimelogPermission == 'added' && user()->id == $item->added_by)): ?>
                                            <?php if(!$item->approved): ?>
                                                <a class="dropdown-item approve-timelog" href="javascript:;" data-time-id="<?php echo e($item->id); ?>">
                                                    <i class="fa fa-check mr-2"></i>
                                                    <?php echo app('translator')->get('app.approve'); ?>
                                                </a>
                                            <?php endif; ?>
                                        <?php endif; ?>

                                        <?php if($editTimelogPermission == 'all' || ($editTimelogPermission == 'added' && user()->id == $item->added_by)): ?>
                                            <a class="dropdown-item openRightModal"
                                                href="<?php echo e(route('timelogs.edit', $item->id)); ?>">
                                                <i class="fa fa-edit mr-2"></i>
                                                <?php echo app('translator')->get('app.edit'); ?>
                                            </a>
                                        <?php endif; ?>

                                        <?php if($deleteTimelogPermission == 'all' || ($deleteTimelogPermission == 'added' && user()->id == $item->added_by)): ?>
                                            <a class="dropdown-item delete-table-row" href="javascript:;"
                                                data-time-id="<?php echo e($item->id); ?>">
                                                <i class="fa fa-trash mr-2"></i>
                                                <?php echo app('translator')->get('app.delete'); ?>
                                            </a>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="3"><?php echo app('translator')->get('messages.noRecordFound'); ?></td>
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


    </div>
</div>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/timelogs/ajax/user-timelogs.blade.php ENDPATH**/ ?>