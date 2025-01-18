<?php
$addContractDiscussionPermission = user()->permission('add_contract_discussion');
$editContractDiscussionPermission = user()->permission('edit_contract_discussion');
$deleteContractDiscussionPermission = user()->permission('delete_contract_discussion');
?>

<!-- TAB CONTENT START -->
<div class="tab-pane fade show active" role="tabpanel" aria-labelledby="nav-email-tab">

    <?php if (isset($component)) { $__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9 = $attributes; } ?>
<?php $component = App\View\Components\Cards\Data::resolve(['title' => __('modules.contracts.discussion')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Data::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
        <?php if($addContractDiscussionPermission == 'all' || $addContractDiscussionPermission == 'added'): ?>

            <div class="row">
                <div class="col-md-12">
                    <a class="f-15 f-w-500" href="javascript:;" id="add-comment"><i
                            class="icons icon-plus font-weight-bold mr-1"></i>
                        <?php echo app('translator')->get('modules.contracts.addComment'); ?></a>
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
                <div class="col-md-12 ">
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


        <div class="d-flex flex-wrap justify-content-between mt-3" id="comment-list">
            <?php if($viewDiscussionPermission != 'none'): ?>
                <?php $__empty_1 = true; $__currentLoopData = $contract->discussion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discussion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="card w-100 rounded-0 border-0 comment">
                        <div class="card-horizontal">
                            <div class="card-img my-1 ml-0">
                                <a href="<?php echo e(route('employees.show', $discussion->user->id)); ?>">
                                    <img src="<?php echo e($discussion->user->image_url); ?>"
                                        alt="<?php echo e($discussion->user->name); ?>"></a>
                            </div>
                            <div class="card-body border-0 pl-0 py-1">
                                <div class="d-flex flex-grow-1">
                                    <h4 class="card-title f-15 f-w-500 mr-3"><a class="text-dark"
                                            href="<?php echo e(route('employees.show', $discussion->user->id)); ?>"><?php echo e($discussion->user->name); ?></a>
                                    </h4>
                                    <p class="card-date f-11 text-lightest mb-0">
                                        <?php echo e($discussion->created_at->diffForHumans()); ?>

                                    </p>
                                    <div class="dropdown ml-auto comment-action">
                                        <button
                                            class="btn btn-lg f-14 p-0 text-lightest text-capitalize rounded  dropdown-toggle"
                                            type="button" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <i class="fa fa-ellipsis-h"></i>
                                        </button>

                                        <div class="dropdown-menu dropdown-menu-right border-grey rounded b-shadow-4 p-0"
                                            aria-labelledby="dropdownMenuLink" tabindex="0">
                                            <?php if($editContractDiscussionPermission == 'all' || ($editContractDiscussionPermission == 'added' && $discussion->added_by == user()->id)): ?>
                                                <a class="cursor-pointer d-block text-dark-grey f-13 py-3 px-3 edit-comment"
                                                    href="javascript:;"
                                                    data-row-id="<?php echo e($discussion->id); ?>"><?php echo app('translator')->get('app.edit'); ?></a>
                                            <?php endif; ?>

                                            <?php if($deleteContractDiscussionPermission == 'all' || ($deleteContractDiscussionPermission == 'added' && $discussion->added_by == user()->id)): ?>
                                                <a class="cursor-pointer d-block text-dark-grey f-13 pb-3 px-3 delete-comment"
                                                    data-row-id="<?php echo e($discussion->id); ?>"
                                                    href="javascript:;"><?php echo app('translator')->get('app.delete'); ?></a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-text f-14 text-dark-grey text-justify"><?php echo $discussion->message; ?>

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
            <?php endif; ?>
        </div>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9)): ?>
<?php $attributes = $__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9; ?>
<?php unset($__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9)): ?>
<?php $component = $__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9; ?>
<?php unset($__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9); ?>
<?php endif; ?>
</div>
<!-- TAB CONTENT END -->

<script>
    var add_task_comments = "<?php echo e($addContractDiscussionPermission); ?>";

    $('#add-comment').click(function() {
        $(this).closest('.row').addClass('d-none');
        $('#save-comment-data-form').removeClass('d-none');
    });

    $('#cancel-comment').click(function() {
        $('#save-comment-data-form').addClass('d-none');
        $('#add-comment').closest('.row').removeClass('d-none');
    });

    $(document).ready(function() {
        if (add_task_comments == "all" || add_task_comments == "added") {
              quillMention(null, '#task-comment');
        }

        $('#submit-comment').click(function() {
            var comment = document.getElementById('task-comment').children[0].innerHTML;
            document.getElementById('task-comment-text').value = comment;

            var token = '<?php echo e(csrf_token()); ?>';

            const url = "<?php echo e(route('contractDiscussions.store')); ?>";

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
                    contract_id: '<?php echo e($contract->id); ?>'
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

        $('body').on('click', '.delete-comment', function() {
            var id = $(this).data('row-id');
            Swal.fire({
                title: "<?php echo app('translator')->get('messages.sweetAlertTitle'); ?>",
                text: "<?php echo app('translator')->get('messages.recoverRecord'); ?>",
                icon: 'warning',
                showCancelButton: true,
                focusConfirm: false,
                confirmButtonText: "<?php echo app('translator')->get('messages.confirmDelete'); ?>",
                cancelButtonText: "<?php echo app('translator')->get('app.cancel'); ?>",
                customClass: {
                    confirmButton: 'btn btn-primary mr-3',
                    cancelButton: 'btn btn-secondary'
                },
                showClass: {
                    popup: 'swal2-noanimation',
                    backdrop: 'swal2-noanimation'
                },
                buttonsStyling: false
            }).then((result) => {
                if (result.isConfirmed) {
                    var url = "<?php echo e(route('contractDiscussions.destroy', ':id')); ?>";
                    url = url.replace(':id', id);

                    var token = "<?php echo e(csrf_token()); ?>";

                    $.easyAjax({
                        type: 'POST',
                        url: url,
                        data: {
                            '_token': token,
                            '_method': 'DELETE'
                        },
                        success: function(response) {
                            if (response.status == "success") {
                                $('#comment-list').html(response.view);
                            }
                        }
                    });
                }
            });
        });

        $('body').on('click', '.edit-comment', function() {
            var id = $(this).data('row-id');
            var url = "<?php echo e(route('contractDiscussions.edit', ':id')); ?>";
            url = url.replace(':id', id);
            $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
            $.ajaxModal(MODAL_LG, url);
        });

    });
</script>
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\contracts\ajax\discussion.blade.php ENDPATH**/ ?>