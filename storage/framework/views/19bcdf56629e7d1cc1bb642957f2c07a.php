<button class="btn cursor-pointer comment-like mr-2 f-12 btn-sm" data-comment-id="<?php echo e($comment->id); ?>" data-emoji="thumbs-up" data-toggle="tooltip"
    <?php if($comment->like->count() != 0): ?> data-original-title="<?php echo e(trans('modules.tasks.likeUser', [ 'user' => $allLikeUsers ])); ?>" style="background-color: #f7f2f2;" <?php else: ?> data-original-title="<?php echo app('translator')->get('modules.tasks.like'); ?>" <?php endif; ?>>
    <i class="fa fa-thumbs-up" ></i> <?php echo e($comment->like->count()); ?></button>

<button class="btn cursor-pointer comment-like f-12 btn-sm" data-comment-id="<?php echo e($comment->id); ?>" data-emoji="thumbs-down" data-toggle="tooltip"
    <?php if($comment->dislike->count() != 0): ?> data-original-title="<?php echo e(trans('modules.tasks.dislikeUser', [ 'user' => $allDislikeUsers ])); ?>" style="background-color: #f7f2f2;" <?php else: ?> data-original-title="<?php echo app('translator')->get('modules.tasks.dislike'); ?>" <?php endif; ?>>
    <i class="fa fa-thumbs-down"></i> <?php echo e($comment->dislike->count()); ?></button>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/tasks/comments/comment-emoji.blade.php ENDPATH**/ ?>