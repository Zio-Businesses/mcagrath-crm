<?php
    $editSubTaskPermission = user()->permission('edit_sub_tasks');
    $deleteSubTaskPermission = user()->permission('delete_sub_tasks');
?>

<?php $__empty_1 = true; $__currentLoopData = $task->subtasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subtask): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <div class="card w-100 rounded-0 border-0 subtask mb-1">

        <div class="card-horizontal">
            <div class="d-flex">
                <?php if (isset($component)) { $__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Checkbox::resolve(['fieldLabel' => '','fieldName' => 'checkbox'.$subtask->id,'fieldId' => 'checkbox'.$subtask->id,'fieldValue' => 'yes','checked' => ($subtask->status == 'complete') ? true : false] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Checkbox::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'task-check','data-sub-task-id' => ''.e($subtask->id).'','fieldRequired' => 'false']); ?>
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
                <div class="d-flex flex-grow-1">
                    <p class="card-title f-14 mr-3 text-dark">
                        <?php echo $subtask->status == 'complete' ? '<s>' . $subtask->title . '</s>' :
                        $subtask->title; ?>

                    </p>
                    <div class="dropdown ml-auto subtask-action">
                        <button class="btn btn-lg f-14 p-0 text-lightest text-capitalize rounded  dropdown-toggle"
                            type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-ellipsis-h"></i>
                        </button>

                        <div class="dropdown-menu dropdown-menu-right border-grey rounded b-shadow-4 p-0"
                            aria-labelledby="dropdownMenuLink" tabindex="0">
                            <?php if($editSubTaskPermission == 'all' || ($editSubTaskPermission == 'added' && $subtask->added_by == user()->id)): ?>
                                <a class="cursor-pointer d-block text-dark-grey f-13 py-3 px-3 edit-subtask"
                                    href="javascript:;" data-row-id="<?php echo e($subtask->id); ?>"><?php echo app('translator')->get('app.edit'); ?></a>
                            <?php endif; ?>

                            <?php if($deleteSubTaskPermission == 'all' || ($deleteSubTaskPermission == 'added' && $subtask->added_by == user()->id)): ?>
                                <a class="cursor-pointer d-block text-dark-grey f-13 pb-3 px-3 delete-subtask"
                                    data-row-id="<?php echo e($subtask->id); ?>" href="javascript:;"><?php echo app('translator')->get('app.delete'); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="card-text f-11 text-lightest text-justify">
                    <?php echo e($subtask->due_date ? __('modules.invoices.due') . ': ' . $subtask->due_date->translatedFormat($company->date_format) : ''); ?>

                </div>
            </div>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <div class="align-items-center d-flex flex-column text-lightest p-20 w-100">
        <i class="fa fa-tasks f-21 w-100"></i>

        <div class="f-15 mt-4">
            - <?php echo app('translator')->get('messages.noSubTaskFound'); ?> -
        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\front\tasks\sub_tasks\show.blade.php ENDPATH**/ ?>