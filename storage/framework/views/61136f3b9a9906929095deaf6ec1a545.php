<?php
    $editSubTaskPermission = user()->permission('edit_sub_tasks');
    $deleteSubTaskPermission = user()->permission('delete_sub_tasks');
    $addSubTaskPermission = user()->permission('add_sub_tasks');
    $viewSubTaskPermission = user()->permission('view_sub_tasks');
?>

<?php $__empty_1 = true; $__currentLoopData = $task->subtasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subtask): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
<div class="card w-100 rounded-0 border-0 subtask mb-1">

    <div class="card-horizontal">
        <div class="d-flex">
            <?php if (isset($component)) { $__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Checkbox::resolve(['fieldId' => 'checkbox'.$subtask->id,'checked' => ($subtask->status == 'complete') ? true : false,'fieldLabel' => '','fieldName' => 'checkbox'.$subtask->id] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Checkbox::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'task-check','data-sub-task-id' => ''.e($subtask->id).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3)): ?>
<?php $attributes = $__attributesOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3; ?>
<?php unset($__attributesOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3)): ?>
<?php $component = $__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3; ?>
<?php unset($__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3); ?>
<?php endif; ?>

        </div>
        <div class="card-body pt-0">
            <div class="d-flex">
                <?php if($subtask->assigned_to): ?>
                    <?php if (isset($component)) { $__componentOriginal75aae39e8ca080c2e57af4f5e6fc0e44 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal75aae39e8ca080c2e57af4f5e6fc0e44 = $attributes; } ?>
<?php $component = App\View\Components\EmployeeImage::resolve(['user' => $subtask->assignedTo] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('employee-image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\EmployeeImage::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal75aae39e8ca080c2e57af4f5e6fc0e44)): ?>
<?php $attributes = $__attributesOriginal75aae39e8ca080c2e57af4f5e6fc0e44; ?>
<?php unset($__attributesOriginal75aae39e8ca080c2e57af4f5e6fc0e44); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal75aae39e8ca080c2e57af4f5e6fc0e44)): ?>
<?php $component = $__componentOriginal75aae39e8ca080c2e57af4f5e6fc0e44; ?>
<?php unset($__componentOriginal75aae39e8ca080c2e57af4f5e6fc0e44); ?>
<?php endif; ?>
                <?php endif; ?>

                <p class="card-title f-14 mr-3 text-dark flex-grow-1">
                    <?php echo $subtask->status == 'complete' ? '<s>' . $subtask->title . '</s>' : '<a class="view-subtask text-dark-grey" href="javascript:;" data-row-id=' . $subtask->id . ' >' .  $subtask->title . '</a>'; ?>

                    <?php echo $subtask->due_date ? '<span class="f-11 text-lightest"><br>'.__('modules.invoices.due') . ': ' . $subtask->due_date->translatedFormat(company()->date_format) . '</span>' : ''; ?>

                </p>
                <div class="dropdown ml-auto subtask-action">
                    <button
                        class="btn btn-lg f-14 p-0 text-lightest text-capitalize rounded  dropdown-toggle"
                        type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-ellipsis-h"></i>
                    </button>

                    <div class="dropdown-menu dropdown-menu-right border-grey rounded b-shadow-4 p-0"
                        aria-labelledby="dropdownMenuLink" tabindex="0">

                        <?php if($viewSubTaskPermission == 'all' || ($viewSubTaskPermission == 'added' && $subtask->added_by == user()->id)): ?>
                            <a class="dropdown-item view-subtask" href="javascript:;"
                                data-row-id="<?php echo e($subtask->id); ?>"><?php echo app('translator')->get('app.view'); ?></a>
                        <?php endif; ?>

                        <?php if($editSubTaskPermission == 'all' || ($editSubTaskPermission == 'added' && $subtask->added_by == user()->id)): ?>
                            <a class="dropdown-item edit-subtask" href="javascript:;"
                                data-row-id="<?php echo e($subtask->id); ?>"><?php echo app('translator')->get('app.edit'); ?></a>
                        <?php endif; ?>

                        <?php if($deleteSubTaskPermission == 'all' || ($deleteSubTaskPermission == 'added' && $subtask->added_by == user()->id)): ?>
                            <a class="dropdown-item delete-subtask" data-row-id="<?php echo e($subtask->id); ?>"
                                href="javascript:;"><?php echo app('translator')->get('app.delete'); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>


            <?php if(count($subtask->files) > 0): ?>
                <div class="d-flex flex-wrap mt-4">
                    <?php $__currentLoopData = $subtask->files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if (isset($component)) { $__componentOriginalcc3eadf431dc104666da55af50a04915 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcc3eadf431dc104666da55af50a04915 = $attributes; } ?>
<?php $component = App\View\Components\FileCard::resolve(['fileName' => $file->filename,'dateAdded' => $file->created_at->diffForHumans()] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('file-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\FileCard::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                            <?php if($file->icon == 'images'): ?>
                                <img src="<?php echo e($file->file_url); ?>">
                            <?php else: ?>
                                <i class="fa <?php echo e($file->icon); ?> text-lightest"></i>
                            <?php endif; ?>

                             <?php $__env->slot('action', null, []); ?> 
                                <div class="dropdown ml-auto file-action">
                                    <button
                                        class="btn btn-lg f-14 p-0 text-lightest text-capitalize rounded  dropdown-toggle"
                                        type="button" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <i class="fa fa-ellipsis-h"></i>
                                    </button>

                                    <div class="dropdown-menu dropdown-menu-right border-grey rounded b-shadow-4 p-0"
                                        aria-labelledby="dropdownMenuLink" tabindex="0">
                                        <?php if($file->icon != 'images'): ?>
                                            <a class="cursor-pointer d-block text-dark-grey f-13 pt-3 px-3 "
                                                target="_blank"
                                                href="<?php echo e($file->file_url); ?>"><?php echo app('translator')->get('app.view'); ?></a>
                                        <?php endif; ?>

                                        <a class="cursor-pointer d-block text-dark-grey f-13 py-3 px-3 "
                                            href="<?php echo e(route('sub-task-files.download', md5($file->id))); ?>"><?php echo app('translator')->get('app.download'); ?></a>

                                        <?php if(user()->id == $user->id): ?>
                                            <a class="cursor-pointer d-block text-dark-grey f-13 pb-3 px-3 delete-sub-task-file"
                                                data-row-id="<?php echo e($file->id); ?>"
                                                href="javascript:;"><?php echo app('translator')->get('app.delete'); ?></a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                             <?php $__env->endSlot(); ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcc3eadf431dc104666da55af50a04915)): ?>
<?php $attributes = $__attributesOriginalcc3eadf431dc104666da55af50a04915; ?>
<?php unset($__attributesOriginalcc3eadf431dc104666da55af50a04915); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcc3eadf431dc104666da55af50a04915)): ?>
<?php $component = $__componentOriginalcc3eadf431dc104666da55af50a04915; ?>
<?php unset($__componentOriginalcc3eadf431dc104666da55af50a04915); ?>
<?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>

        </div>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <?php if (isset($component)) { $__componentOriginal269164c77d9d34462c34359c03da6a68 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal269164c77d9d34462c34359c03da6a68 = $attributes; } ?>
<?php $component = App\View\Components\Cards\NoRecord::resolve(['message' => __('messages.noSubTaskFound'),'icon' => 'tasks'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/tasks/sub_tasks/show.blade.php ENDPATH**/ ?>