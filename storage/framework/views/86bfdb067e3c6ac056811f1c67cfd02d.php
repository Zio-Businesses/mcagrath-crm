<!-- TAB CONTENT START -->
<div class="tab-pane fade show active" role="tabpanel" aria-labelledby="nav-email-tab">

    <div class="d-flex flex-wrap justify-content-between p-20" id="comment-list">
        <?php $__empty_1 = true; $__currentLoopData = $task->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="card w-100 rounded-0 border-0 comment">
                <div class="card-horizontal">
                    <div class="card-img my-1 ml-0">
                        <img src="<?php echo e($comment->user->image_url); ?>" alt="<?php echo e($comment->user->name); ?>">
                    </div>
                    <div class="card-body border-0 pl-0 py-1">
                        <div class="d-flex flex-grow-1">
                            <h4 class="card-title f-15 f-w-500 text-dark mr-3"><?php echo e($comment->user->name); ?></h4>
                            <p class="card-date f-11 text-lightest mb-0">
                                <?php echo e($comment->created_at->diffForHumans()); ?>

                            </p>
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
    </div>

</div>
<!-- TAB CONTENT END -->
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/front/tasks/ajax/comments.blade.php ENDPATH**/ ?>