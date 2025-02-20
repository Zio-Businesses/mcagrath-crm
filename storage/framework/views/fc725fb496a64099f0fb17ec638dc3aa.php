<?php
    $addTaskNotePermission = user()->permission('add_task_notes');
    $editTaskNotePermission = user()->permission('edit_task_notes');
    $deleteTaskNotePermission = user()->permission('delete_task_notes');
?>

<!-- TAB CONTENT START -->
<div class="tab-pane fade show active" role="tabpanel" aria-labelledby="nav-email-tab">
    <?php if($addTaskNotePermission == 'all'
    || ($addTaskNotePermission == 'added' && $task->added_by == user()->id)
    || ($addTaskNotePermission == 'owned' && in_array(user()->id, $taskUsers))
    || ($addTaskNotePermission == 'both' && (in_array(user()->id, $taskUsers) || $task->added_by == user()->id))
    ): ?>

        <div class="row p-20">
            <div class="col-md-12">
                <a class="f-15 f-w-500" href="javascript:;" id="add-notes"><i
                        class="icons icon-plus font-weight-bold mr-1"></i><?php echo app('translator')->get('modules.client.createNote'); ?>
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
<?php $component->withAttributes(['id' => 'save-note-data-form','class' => 'd-none']); ?>
            <div class="col-md-12 p-20 ">
                <div class="media">
                    <img src="<?php echo e(user()->image_url); ?>" class="align-self-start mr-3 taskEmployeeImg rounded"
                         alt="<?php echo e(user()->name); ?>">
                    <div class="media-body bg-white">
                        <div class="form-group">
                            <div id="task-note"></div>
                            <textarea name="note" class="form-control invisible d-none" id="task-note-text"></textarea>
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
<?php $component->withAttributes(['id' => 'cancel-note','class' => 'border-0 mr-3']); ?><?php echo app('translator')->get('app.cancel'); ?>
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
<?php $component->withAttributes(['id' => 'submit-note']); ?><?php echo app('translator')->get('app.submit'); ?>
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


    <div class="d-flex flex-wrap justify-content-between p-20" id="note-list">
        <?php $__empty_1 = true; $__currentLoopData = $task->notes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $note): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="card w-100 rounded-0 border-0 note">
                <div class="card-horizontal">
                    <div class="card-img my-1 ml-0">
                        <img src="<?php echo e($note->user->image_url); ?>" alt="<?php echo e($note->user->name); ?>">
                    </div>
                    <div class="card-body border-0 pl-0 py-1">
                        <div class="d-flex flex-grow-1">
                            <h4 class="card-title f-15 f-w-500 text-dark mr-3"><?php echo e($note->user->name); ?></h4>
                            <p class="card-date f-11 text-lightest mb-0">
                                <?php echo e($note->created_at->diffForHumans()); ?>

                            </p>
                            <div class="dropdown ml-auto note-action">
                                <button
                                    class="btn btn-lg f-14 p-0 text-lightest text-capitalize rounded  dropdown-toggle"
                                    type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-h"></i>
                                </button>

                                <div class="dropdown-menu dropdown-menu-right border-grey rounded b-shadow-4 p-0"
                                     aria-labelledby="dropdownMenuLink" tabindex="0">
                                    <?php if($editTaskNotePermission == 'all' || ($editTaskNotePermission == 'added' && $note->added_by == user()->id)): ?>
                                        <a class="cursor-pointer d-block text-dark-grey f-13 py-3 px-3 edit-note"
                                           href="javascript:;" data-row-id="<?php echo e($note->id); ?>"><?php echo app('translator')->get('app.edit'); ?></a>
                                    <?php endif; ?>

                                    <?php if($deleteTaskNotePermission == 'all' || ($deleteTaskNotePermission == 'added' && $note->added_by == user()->id)): ?>
                                        <a class="cursor-pointer d-block text-dark-grey f-13 pb-3 px-3 delete-note"
                                           data-row-id="<?php echo e($note->id); ?>"
                                           href="javascript:;"><?php echo app('translator')->get('app.delete'); ?></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="card-text f-14 text-dark-grey text-justify ql-editor"><?php echo $note->note; ?>

                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <?php if (isset($component)) { $__componentOriginal269164c77d9d34462c34359c03da6a68 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal269164c77d9d34462c34359c03da6a68 = $attributes; } ?>
<?php $component = App\View\Components\Cards\NoRecord::resolve(['message' => __('messages.noNoteFound'),'icon' => 'clipboard'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
    </div>


</div>
<!-- TAB CONTENT END -->

<script>
    var add_task_notes = "<?php echo e($addTaskNotePermission); ?>";

    $('#add-notes').click(function () {
        $(this).closest('.row').addClass('d-none');
        $('#save-note-data-form').removeClass('d-none');
    });

    $('#cancel-note').click(function () {
        $('#save-note-data-form').addClass('d-none');
        $('#add-notes').closest('.row').removeClass('d-none');
    });

    var atValues = <?php echo json_encode($taskuserData, 15, 512) ?>;

    $(document).ready(function () {

        if (add_task_notes == "all" || add_task_notes == "added") {
            quillMention(atValues, '#task-note');
        }


        $('#submit-note').click(function () {
            var note = document.getElementById('task-note').children[0].innerHTML;
            document.getElementById('task-note-text').value = note;
            var mention_user_id = $('#task-note span[data-id]').map(function(){
                return $(this).attr('data-id')

            }).get();
            var token = '<?php echo e(csrf_token()); ?>';

            const url = "<?php echo e(route('task-note.store')); ?>";

            $.easyAjax({
                url: url,
                container: '#save-note-data-form',
                type: "POST",
                disableButton: true,
                blockUI: true,
                buttonSelector: "#submit-note",
                data: {
                    '_token': token,
                    note: note,
                    mention_user_id : mention_user_id,
                    taskId: '<?php echo e($task->id); ?>'
                },
                success: function (response) {
                    if (response.status == "success") {
                        $('#note-list').html(response.view);
                        document.getElementById('task-note').children[0].innerHTML = "";
                        $('#task-note-text').val('');
                    }

                }
            });
        });

    });
</script>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/tasks/ajax/notes.blade.php ENDPATH**/ ?>