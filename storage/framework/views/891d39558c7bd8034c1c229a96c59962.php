<?php
    $editTaskCommentPermission = user()->permission('edit_task_comments');
    $deleteTaskCommentPermission = user()->permission('delete_task_comments');
?>

<?php $__empty_1 = true; $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <div class="card w-100 rounded-0 border-0 comment">
        <div class="card-horizontal">
            <div class="card-img my-1 ml-0">
                <img src="<?php echo e($comment->user->image_url); ?>" alt="<?php echo e($comment->user->name); ?>">
            </div>
            <div class="card-body border-0 pl-0 py-1">
                <div class="d-flex flex-grow-1">
                    <h4 class="card-title f-15 f-w-500 text-dark mr-3"><?php echo e($comment->user->name); ?></h4>
                    <p class="card-date f-11 text-lightest mb-0">
                        <?php echo e($comment->created_at->timezone($company->timezone)->translatedFormat($company->date_format . ' ' . $company->time_format)); ?>

                    </p>
                    <div class="dropdown ml-auto comment-action">
                        <button class="btn btn-lg f-14 p-0 text-lightest text-capitalize rounded  dropdown-toggle"
                            type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-ellipsis-h"></i>
                        </button>

                        <div class="dropdown-menu dropdown-menu-right border-grey rounded b-shadow-4 p-0"
                            aria-labelledby="dropdownMenuLink" tabindex="0">
                            <?php if($editTaskCommentPermission == 'all' || ($editTaskCommentPermission == 'added' && $comment->added_by == user()->id)): ?>
                                <a class="cursor-pointer d-block text-dark-grey f-13 py-3 px-3 edit-comment"
                                    href="javascript:;" data-row-id="<?php echo e($comment->id); ?>"><?php echo app('translator')->get('app.edit'); ?></a>
                            <?php endif; ?>

                            <?php if($deleteTaskCommentPermission == 'all' || ($deleteTaskCommentPermission == 'added' && $comment->added_by == user()->id)): ?>
                                <a class="cursor-pointer d-block text-dark-grey f-13 pb-3 px-3 delete-comment"
                                    data-row-id="<?php echo e($comment->id); ?>" href="javascript:;"><?php echo app('translator')->get('app.delete'); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="card-text f-14 text-dark-grey text-justify ql-editor"><?php echo $comment->comment; ?>

                </div>
            </div>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <div class="align-items-center d-flex flex-column text-lightest p-20 w-100">
        <i class="fa fa-comment-alt f-21 w-100"></i>

        <div class="f-15 mt-4">
            - <?php echo app('translator')->get('messages.noCommentFound'); ?> -
        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\front\tasks\comments\show.blade.php ENDPATH**/ ?>