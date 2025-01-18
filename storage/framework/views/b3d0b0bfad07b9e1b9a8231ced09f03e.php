<?php
    $editSubTaskPermission = user()->permission('edit_sub_tasks');
    $deleteSubTaskPermission = user()->permission('delete_sub_tasks');
?>

<?php $__empty_1 = true; $__currentLoopData = $task->subtasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subtask): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <div class="card w-100 rounded-0 border-0 subtask mb-1">

        <div class="card-horizontal">
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
                            <a class="cursor-pointer d-block text-dark-grey f-13 py-3 px-3 edit-subtask"
                                href="javascript:;" data-row-id="<?php echo e($subtask->id); ?>"><?php echo app('translator')->get('app.edit'); ?></a>

                            <a class="cursor-pointer d-block text-dark-grey f-13 pb-3 px-3 delete-subtask"
                                data-row-id="<?php echo e($subtask->id); ?>" href="javascript:;"><?php echo app('translator')->get('app.delete'); ?></a>
                        </div>
                    </div>
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
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\project-templates\task\sub_tasks\show.blade.php ENDPATH**/ ?>