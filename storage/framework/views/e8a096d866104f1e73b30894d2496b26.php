<?php
    $editTaskCommentPermission = user()->permission('edit_task_comments');
    $deleteTaskCommentPermission = user()->permission('delete_task_comments');
?>

<?php $__empty_1 = true; $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <div class="card w-100 rounded-1 border-2 mb-3 p-2 comment">
        <div class="card-horizontal">
            <div class="card-img my-1 ml-0 mx-1">
                <img src="<?php echo e($comment->user->image_url); ?>" alt="<?php echo e($comment->user->name); ?>">
            </div>
            <div class="card-body border-0 pl-0 py-1 ml-3">
                <div class="row">
                    <div class="col-md-6 d-inline-flex">
                        <h4 class="card-title f-15 f-w-500 text-dark mr-3"><?php echo e($comment->user->name); ?></h4>
                        <span class="cursor-pointer card-date f-11 text-lightest mb-0 comment-time" data-toggle="tooltip"
                        data-original-title="<?php echo e($comment->created_at->timezone(company()->timezone)->translatedFormat(company()->date_format . ' ' . company()->time_format)); ?>">
                        <?php echo e($comment->created_at->timezone(company()->timezone)->diffForHumans()); ?>

                        </span>
                    </div>
                    <div class="col-md-6 d-inline-flex justify-content-end">
                        <?php if($editTaskCommentPermission == 'all' || ($editTaskCommentPermission == 'added' && $comment->added_by == user()->id)): ?>
                            <a class="card-title cursor-pointer d-block text-dark-grey edit-comment mr-2"
                                href="javascript:;" data-toggle="tooltip" data-original-title="<?php echo app('translator')->get('app.edit'); ?>" data-row-id="<?php echo e($comment->id); ?>"><i class="fa fa-edit mr-2"></i></a>
                        <?php endif; ?>
                        <?php if($deleteTaskCommentPermission == 'all' || ($deleteTaskCommentPermission == 'added' && $comment->added_by == user()->id)): ?>
                            <a class="cursor-pointer d-block text-dark-grey delete-comment"
                                data-row-id="<?php echo e($comment->id); ?>" data-toggle="tooltip"  href="javascript:;" data-original-title="<?php echo app('translator')->get('app.delete'); ?>"><i class="fa fa-trash mr-2"></i></a>
                        <?php endif; ?>
                    </div>
                </div>
                <?php
                    $likeUsers = $comment->likeUsers->pluck('name')->toArray();
                    $likeUserList = '';

                    if($likeUsers)
                    {
                        if(in_array(user()->name, $likeUsers)){
                            $key = array_search(user()->name, $likeUsers);
                            array_splice( $likeUsers, 0, 0, __('modules.tasks.you') );
                            unset($likeUsers[$key+1]);

                        }
                        $likeUserList = implode(', ', $likeUsers);
                    }

                    $dislikeUsers = $comment->dislikeUsers->pluck('name')->toArray();
                    $dislikeUserList = '';

                    if($dislikeUsers)
                    {
                        if(in_array(user()->name, $dislikeUsers)){
                            $key = array_search (user()->name, $dislikeUsers);
                            array_splice( $dislikeUsers, 0, 0, __('modules.tasks.you') );
                            unset($dislikeUsers[$key+1]);
                        }
                        $dislikeUserList = implode(', ', $dislikeUsers);
                    }
                ?>
                <div class="card-text f-14 text-dark-grey">
                    <div class="card-text f-14 text-dark-grey text-justify ql-editor">
                        <?php echo $comment->comment; ?>

                    </div>
                    <div id="emoji-<?php echo e($comment->id); ?>">
                        <button class="btn cursor-pointer comment-like mr-2 f-12 btn-sm" data-toggle="tooltip" data-comment-id="<?php echo e($comment->id); ?>"
                            data-emoji="thumbs-up" <?php if($comment->like->count() != 0): ?> data-original-title="<?php echo e(trans('modules.tasks.likeUser', [ 'user' => $likeUserList ])); ?>" style="background-color: #f7f2f2;" <?php else: ?> data-original-title="<?php echo app('translator')->get('modules.tasks.like'); ?>" <?php endif; ?>>
                            <i class="fa fa-thumbs-up"></i> <?php echo e($comment->like->count()); ?></button>
                        <button class="btn cursor-pointer comment-like f-12 btn-sm" data-toggle="tooltip" data-comment-id="<?php echo e($comment->id); ?>"
                            data-emoji="thumbs-down" <?php if($comment->dislike->count() != 0): ?> data-original-title="<?php echo e(trans('modules.tasks.dislikeUser', [ 'user' => $dislikeUserList ])); ?>" style="background-color: #f7f2f2;" <?php else: ?> data-original-title="<?php echo app('translator')->get('modules.tasks.dislike'); ?>" <?php endif; ?>>
                            <i class="fa fa-thumbs-down"></i> <?php echo e($comment->dislike->count()); ?></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <?php if (isset($component)) { $__componentOriginal269164c77d9d34462c34359c03da6a68 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal269164c77d9d34462c34359c03da6a68 = $attributes; } ?>
<?php $component = App\View\Components\Cards\NoRecord::resolve(['message' => __('messages.noCommentFound'),'icon' => 'comment-alt'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/tasks/comments/show.blade.php ENDPATH**/ ?>