<?php
    $addTaskCommentPermission = user()->permission('add_task_comments');
    $editTaskCommentPermission = user()->permission('edit_task_comments');
    $deleteTaskCommentPermission = user()->permission('delete_task_comments');
?>

<style>
    .comment-like {
      background-color: #ffffff;
      border-radius:4px;
      border: 1px solid #99a5b5;
      color: #616e80;
      /* font-size: 14px; */
    }

    /* Darker background on mouse-over */
    .comment-like:hover {
      background-color: #f2f4f7;
      /* box-shadow: inset 0 0 0 1px #6d6a69, 0 2px 2px 0 rgb(0 0 0 / 8%); */
      color: #616e80;
    }

    .comment-time{
        position: relative;
        margin-top: 2px;
    }
    .ql-mention-list {
    list-style: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    }

    .ql-editor {
        text-align: left;
        white-space: unset;
    }

    </style>
<!-- TAB CONTENT START -->

<div class="tab-pane fade show active" role="tabpanel" aria-labelledby="nav-email-tab">
    <?php if($addTaskCommentPermission == 'all'
    || ($addTaskCommentPermission == 'added' && $task->added_by == user()->id)
    || ($addTaskCommentPermission == 'owned' && in_array(user()->id, $taskUsers))
    || ($addTaskCommentPermission == 'both' && (in_array(user()->id, $taskUsers) || $task->added_by == user()->id))
    ): ?>
        <div class="row p-20">
            <div class="col-md-12">
                <a class="f-15 f-w-500" href="javascript:;" id="add-comment"><i
                        class="icons icon-plus font-weight-bold mr-1"></i><?php echo app('translator')->get('modules.contracts.addComment'); ?>
                </a>
            </div>
        </div>
        <?php if (isset($component)) { $__componentOriginal18ad2e0d264f9740dc73fff715357c28 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal18ad2e0d264f9740dc73fff715357c28 = $attributes; } ?>
<?php $component = App\View\Components\Form::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Form::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'save-comment-data-form','class' => 'd-none']); ?>
            <div class="col-md-12 p-20 ">
                <div class="media">
                    <img src="<?php echo e(user()->image_url); ?>" class="align-self-start mr-3 taskEmployeeImg rounded"
                        alt="<?php echo e(user()->name); ?>">
                    <div class="media-body bg-white">
                        <div class="form-group">
                            <div id="task-comment"></div>
                            <textarea name="comment" class="form-control invisible d-none"
                                id="task-comment-text"></textarea>
                        </div>
                    </div>
                </div>
                <div class="w-100 justify-content-end d-flex mt-2">
                    <?php if (isset($component)) { $__componentOriginalc35c79ed7e812580313ad04118477974 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc35c79ed7e812580313ad04118477974 = $attributes; } ?>
<?php $component = App\View\Components\Forms\ButtonCancel::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-cancel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonCancel::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'cancel-comment','class' => 'border-0 mr-3']); ?><?php echo app('translator')->get('app.cancel'); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc35c79ed7e812580313ad04118477974)): ?>
<?php $attributes = $__attributesOriginalc35c79ed7e812580313ad04118477974; ?>
<?php unset($__attributesOriginalc35c79ed7e812580313ad04118477974); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc35c79ed7e812580313ad04118477974)): ?>
<?php $component = $__componentOriginalc35c79ed7e812580313ad04118477974; ?>
<?php unset($__componentOriginalc35c79ed7e812580313ad04118477974); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginalcf8d12533ff890e0d6573daf32b7618d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcf8d12533ff890e0d6573daf32b7618d = $attributes; } ?>
<?php $component = App\View\Components\Forms\ButtonPrimary::resolve(['icon' => 'location-arrow'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'submit-comment']); ?><?php echo app('translator')->get('app.submit'); ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcf8d12533ff890e0d6573daf32b7618d)): ?>
<?php $attributes = $__attributesOriginalcf8d12533ff890e0d6573daf32b7618d; ?>
<?php unset($__attributesOriginalcf8d12533ff890e0d6573daf32b7618d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcf8d12533ff890e0d6573daf32b7618d)): ?>
<?php $component = $__componentOriginalcf8d12533ff890e0d6573daf32b7618d; ?>
<?php unset($__componentOriginalcf8d12533ff890e0d6573daf32b7618d); ?>
<?php endif; ?>
                </div>



            </div>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal18ad2e0d264f9740dc73fff715357c28)): ?>
<?php $attributes = $__attributesOriginal18ad2e0d264f9740dc73fff715357c28; ?>
<?php unset($__attributesOriginal18ad2e0d264f9740dc73fff715357c28); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal18ad2e0d264f9740dc73fff715357c28)): ?>
<?php $component = $__componentOriginal18ad2e0d264f9740dc73fff715357c28; ?>
<?php unset($__componentOriginal18ad2e0d264f9740dc73fff715357c28); ?>
<?php endif; ?>
    <?php endif; ?>
    <div class="d-flex flex-wrap justify-content-between p-20" id="comment-list">
        <?php $__empty_1 = true; $__currentLoopData = $task->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
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
                        <div class="card-text f-14 text-dark-grey ">
                            <div class="card-text f-14 text-dark-grey text-justify ql-editor">
                                <?php echo $comment->comment; ?>


                            </div>
                            <div id="emoji-<?php echo e($comment->id); ?>">
                                <button class="btn cursor-pointer comment-like mr-2 f-12 btn-sm" data-comment-id="<?php echo e($comment->id); ?>" data-toggle="tooltip"
                                    data-emoji="thumbs-up" <?php if($comment->like->count() != 0): ?> data-original-title="<?php echo e(trans('modules.tasks.likeUser', [ 'user' => $likeUserList ])); ?>" style="background-color: #f7f2f2;" <?php else: ?> data-original-title="<?php echo app('translator')->get('modules.tasks.like'); ?>" <?php endif; ?>>
                                    <i class="fa fa-thumbs-up"></i> <?php echo e($comment->like->count()); ?></button>
                                <button class="btn cursor-pointer comment-like f-12 btn-sm" data-comment-id="<?php echo e($comment->id); ?>" data-toggle="tooltip"
                                    data-emoji="thumbs-down" <?php if($comment->dislike->count() != 0): ?> data-original-title="<?php echo e(trans('modules.tasks.dislikeUser', [ 'user' => $dislikeUserList ])); ?>" style="background-color: #f7f2f2;" <?php else: ?> data-original-title="<?php echo app('translator')->get('modules.tasks.dislike'); ?>" <?php endif; ?>>
                                    <i class="fa fa-thumbs-down"></i> <?php echo e($comment->dislike->count()); ?></button>
                            </div>
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
<script>
    var add_task_comments = "<?php echo e($addTaskCommentPermission); ?>";
    $(document).ready(function() {

        $('#add-comment').click(function() {
            $(this).closest('.row').addClass('d-none');
            $('#save-comment-data-form').removeClass('d-none');
        });

    });

    $('#cancel-comment').click(function() {
        $('#save-comment-data-form').addClass('d-none');
        $('#add-comment').closest('.row').removeClass('d-none');

    });
        //quill mention

        var userValues = <?php echo json_encode($taskuserData, 15, 512) ?>;

        $(document).ready(function() {
            if (add_task_comments == "all" || add_task_comments == "added") {
                quillMention(userValues, '#task-comment');
            }
        });


        $('#submit-comment').click(function() {
            var comment = document.getElementById('task-comment').children[0].innerHTML;
            document.getElementById('task-comment-text').value = comment;
            var mention_user_id = $('#task-comment span[data-id]').map(function(){
                return $(this).attr('data-id')

            }).get();

            var token = '<?php echo e(csrf_token()); ?>';
            const url = "<?php echo e(route('taskComment.store')); ?>";

            $.easyAjax({
                url: url,
                container: '#save-comment-data-form',
                type: "POST",
                disableButton: true,
                blockUI: true,
                buttonSelector: "#submit-comment",
                data: {
                    '_token': token,
                    comment: comment,
                    mention_user_id : mention_user_id,
                    taskId: '<?php echo e($task->id); ?>'
                },
                success: function(response) {
                    if (response.status == "success") {
                        $('#comment-list').html(response.view);
                        document.getElementById('task-comment').children[0].innerHTML = "";
                        $('#task-comment-text').val('');
                    }

                }
            });
        });


  </script>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/tasks/ajax/comments.blade.php ENDPATH**/ ?>