<link rel="stylesheet" href="<?php echo e(asset('vendor/css/dropzone.min.css')); ?>">
<!-- START -->
<div class="d-flex justify-content-between align-items-center p-3 border-bottom-grey rounded-top bg-white">
    <span>
        <p class="f-15 f-w-500 mb-0"><?php echo e($discussion->title); ?></p>
        <p class="f-11 text-lightest mb-0"><?php echo app('translator')->get('modules.tickets.requestedOn'); ?>
            <?php echo e($discussion->created_at->timezone(company()->timezone)->translatedFormat(company()->date_format . ' ' . company()->time_format)); ?>

        </p>
    </span>
    <span>
        <p class="mb-0 text-capitalize">
            <?php if($discussion->category): ?>
                <?php if (isset($component)) { $__componentOriginal86883428e4629123511f221a5a89811e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal86883428e4629123511f221a5a89811e = $attributes; } ?>
<?php $component = App\View\Components\Status::resolve(['style' => 'color:'.$discussion->category->color,'value' => $discussion->category->name] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('status'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Status::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal86883428e4629123511f221a5a89811e)): ?>
<?php $attributes = $__attributesOriginal86883428e4629123511f221a5a89811e; ?>
<?php unset($__attributesOriginal86883428e4629123511f221a5a89811e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal86883428e4629123511f221a5a89811e)): ?>
<?php $component = $__componentOriginal86883428e4629123511f221a5a89811e; ?>
<?php unset($__componentOriginal86883428e4629123511f221a5a89811e); ?>
<?php endif; ?>
            <?php endif; ?>
        </p>
    </span>
</div>
<!-- END -->
<?php $__currentLoopData = $discussion->replies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php
        $replyUser = $message->user;
    ?>
    
    <div class="card ticket-message border-0 rounded-bottom
        <?php if(user()->id == $replyUser?->id): ?> bg-white-shade <?php endif; ?>
        " id="message-<?php echo e($message->id); ?>">
        <div class="card-horizontal">

            <div class="card-img">
                <a href="<?php echo e(route(($replyUser?->hasRole('client') ? 'clients.show' : 'employees.show'), $replyUser??3)); ?>"><img class=""
                        src="<?php echo e($replyUser?->image_url); ?>" alt="<?php echo e($replyUser?->name); ?>"></a>
                        
            </div>
            <div class="card-body border-0 pl-0">
                <div class="d-flex">
                    <a href="<?php echo e(route(($replyUser?->hasRole('client') ? 'clients.show' : 'employees.show'), $replyUser??3)); ?>">
                        <h4 class="card-title f-15 f-w-500 text-dark mr-3"><?php echo e($replyUser?->name); ?></h4>
                    </a>
                    <p class="card-date f-11 text-lightest mb-0 mr-3">
                        <?php echo e($message->created_at->timezone(company()->timezone)->translatedFormat(company()->date_format . ' ' . company()->time_format)); ?>

                    </p>
                    <div class="dropdown ml-auto">
                        <button class="btn btn-lg f-14 p-0 text-lightest text-capitalize rounded  dropdown-toggle"
                            type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-ellipsis-h"></i>
                        </button>

                        <div class="dropdown-menu dropdown-menu-right border-grey rounded b-shadow-4 p-0"
                            aria-labelledby="dropdownMenuLink" tabindex="0">

                            <a class="dropdown-item add-reply" data-row-id="<?php echo e($message->id); ?>"
                                data-discussion-id="<?php echo e($discussion->id); ?>" href="javascript:;"><?php echo app('translator')->get('app.reply'); ?></a>

                            <?php if($key != 0 && is_null($discussion->best_answer_id) && $discussion->user_id == $replyUser?->id): ?>
                                <a class="dropdown-item set-best-answer" data-row-id="<?php echo e($message->id); ?>"
                                    href="javascript:;"><?php echo app('translator')->get('modules.discussions.bestReply'); ?></a>
                            <?php endif; ?>

                            <?php if($replyUser?->id == user()->id): ?>
                                <a class="dropdown-item edit-reply" data-row-id="<?php echo e($message->id); ?>"
                                    data-discussion-id="<?php echo e($discussion->id); ?>"
                                    href="javascript:;"><?php echo app('translator')->get('app.edit'); ?></a>
                                <?php if($key != 0): ?>
                                    <a class="dropdown-item delete-message" data-row-id="<?php echo e($message->id); ?>"
                                        href="javascript:;"><?php echo app('translator')->get('app.delete'); ?></a>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>

                </div>
                <div class="card-text text-dark-grey text-justify ql-editor p-0"><?php echo $message->body; ?></div>

                <?php if($discussion->best_answer_id == $message->id): ?>
                    <span class="badge badge-success"><?php echo app('translator')->get('modules.discussions.bestReply'); ?></span>
                <?php endif; ?>
            </div>

        </div>
            <!-- TICKET MESSAGE START -->
            <div class="ticket-msg border-right-grey mt-3 ml-3" data-menu-vertical="1" data-menu-scroll="1"
            data-menu-dropdown-timeout="500" id="ticketMsg">
                <div class="d-flex flex-wrap mt-3 mb-2">
                    <?php $__currentLoopData = $message->files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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

                                            <a class="cursor-pointer d-block text-dark-grey f-13 pt-3 px-3 "
                                                target="_blank"
                                                href="<?php echo e($file->file_url); ?>"><?php echo app('translator')->get('app.view'); ?></a>


                                        <a class="cursor-pointer d-block text-dark-grey f-13 py-3 px-3 "
                                            href="<?php echo e(route('discussion_file.download', md5($file->id))); ?>"><?php echo app('translator')->get('app.download'); ?></a>

                                        <?php if(user()->id == $user->id): ?>
                                            <a class="cursor-pointer d-block text-dark-grey f-13 pb-3 px-3 delete-file"
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
            </div>
            <!-- TICKET MESSAGE END -->
    </div><!-- card end -->

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php
    $discussionId = $discussion->id;
?>
<div class="col-md-12 border-top border-right mb-5 bg-white" id="reply-section">
    <?php if (isset($component)) { $__componentOriginal18ad2e0d264f9740dc73fff715357c28 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal18ad2e0d264f9740dc73fff715357c28 = $attributes; } ?>
<?php $component = App\View\Components\Form::resolve(['method' => 'POST'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Form::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'replyDiscussion','class' => 'ajax-form']); ?>
        <input type="hidden" name="discussion_id" value="<?php echo e($discussionId); ?>">
            <div class="col-md-12">
                <div class="form-group my-3">
                    <?php if (isset($component)) { $__componentOriginal89b295b0763c93abe0143426334eb5d6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal89b295b0763c93abe0143426334eb5d6 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Label::resolve(['fieldId' => 'description','fieldLabel' => __('app.reply')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Label::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['fieldReuired' => 'true']); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal89b295b0763c93abe0143426334eb5d6)): ?>
<?php $attributes = $__attributesOriginal89b295b0763c93abe0143426334eb5d6; ?>
<?php unset($__attributesOriginal89b295b0763c93abe0143426334eb5d6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal89b295b0763c93abe0143426334eb5d6)): ?>
<?php $component = $__componentOriginal89b295b0763c93abe0143426334eb5d6; ?>
<?php unset($__componentOriginal89b295b0763c93abe0143426334eb5d6); ?>
<?php endif; ?>
                    <div id="reply"></div>

                    <textarea name="description" id="description-text" class="d-none"></textarea>
                </div>
            </div>
            <input type="hidden" name= "discussion_type" value="discussion_reply">

            <div class="col-md-12">
                <?php if (isset($component)) { $__componentOriginal22e84ee8172e1045de536542f4ffc9a0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal22e84ee8172e1045de536542f4ffc9a0 = $attributes; } ?>
<?php $component = App\View\Components\Forms\FileMultiple::resolve(['fieldLabel' => __('app.menu.addFile'),'fieldName' => 'file','fieldId' => 'file-upload-dropzone'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.file-multiple'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\FileMultiple::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-0 mr-lg-2 mr-md-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal22e84ee8172e1045de536542f4ffc9a0)): ?>
<?php $attributes = $__attributesOriginal22e84ee8172e1045de536542f4ffc9a0; ?>
<?php unset($__attributesOriginal22e84ee8172e1045de536542f4ffc9a0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal22e84ee8172e1045de536542f4ffc9a0)): ?>
<?php $component = $__componentOriginal22e84ee8172e1045de536542f4ffc9a0; ?>
<?php unset($__componentOriginal22e84ee8172e1045de536542f4ffc9a0); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginalcf8d12533ff890e0d6573daf32b7618d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcf8d12533ff890e0d6573daf32b7618d = $attributes; } ?>
<?php $component = App\View\Components\Forms\ButtonPrimary::resolve(['icon' => 'check'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mb-2','id' => 'save-discussion']); ?><?php echo app('translator')->get('app.reply'); ?> <?php echo $__env->renderComponent(); ?>
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
</div>

<script>

    $(document).ready(function () {
      const atValues = <?php echo json_encode($userData, 15, 512) ?>;
      quillMention(atValues, '#reply');
    });

    $('body').on('click', '.delete-file', function() {
        const id = $(this).data('row-id');
        const discussionFile = $(this);
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
                let url = "<?php echo e(route('discussion-files.destroy', ':id')); ?>";
                url = url.replace(':id', id);

                const token = "<?php echo e(csrf_token()); ?>";

                $.easyAjax({
                    type: 'POST',
                    url: url,
                    data: {
                        '_token': token,
                        '_method': 'DELETE'
                    },
                    success: function(response) {
                        if (response.status === "success") {
                            discussionFile.closest('.card').remove();
                        }
                    }
                });
            }
        });
    });

    Dropzone.autoDiscover = false;
        //Dropzone class
        taskDropzone = new Dropzone("#file-upload-dropzone", {
            dictDefaultMessage: "<?php echo e(__('app.dragDrop')); ?>",
            url: "<?php echo e(route('discussion-files.store')); ?>",
            headers: {
                'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
            },
            paramName: "file",
            maxFilesize: DROPZONE_MAX_FILESIZE,
            maxFiles: DROPZONE_MAX_FILES,
            autoProcessQueue: false,
            uploadMultiple: true,
            addRemoveLinks: true,
            parallelUploads: DROPZONE_MAX_FILES,
            acceptedFiles: DROPZONE_FILE_ALLOW,
            init: function () {
                taskDropzone = this;
            }
        });
        //
        taskDropzone.on('sending', function (file, xhr, formData) {
            formData.append('discussion_id', <?php echo e($discussionId); ?>);
            formData.append('discussion_reply_id', discussion_reply_id);
            $.easyBlockUI();
        });
        taskDropzone.on('uploadprogress', function () {
            $.easyBlockUI();
        });
        taskDropzone.on('removedfile', function () {
            var grp = $('div#file-upload-dropzone').closest(".form-group");
            var label = $('div#file-upload-box').siblings("label");
            $(grp).removeClass("has-error");
            $(label).removeClass("is-invalid");
        });
        taskDropzone.on('error', function (file, message) {
            taskDropzone.removeFile(file);
            var grp = $('div#file-upload-dropzone').closest(".form-group");
            var label = $('div#file-upload-box').siblings("label");
            $(grp).find(".help-block").remove();
            var helpBlockContainer = $(grp);

            if (helpBlockContainer.length == 0) {
                helpBlockContainer = $(grp);
            }

            helpBlockContainer.append('<div class="help-block invalid-feedback">' + message + '</div>');
            $(grp).addClass("has-error");
            $(label).addClass("is-invalid");

        });
        taskDropzone.on('completemultiple', function () {
            $.easyAjax({
                url: '<?php echo e(route('discussion-reply.get_replies', $discussionId)); ?>',
                type: 'GET',
                success: function (response) {
                    if(response.status == 'success'){
                        $('#right-modal-content').html(response.html);
                        $(MODAL_XL).modal('hide');
                        $.easyUnblockUI();
                    }
                }
            });
        });


    $('#save-discussion').click(function() {
            const note = document.getElementById('reply').children[0].innerHTML;
            document.getElementById('description-text').value = note;
            var mentionUser = $('#reply span[data-id]').map(function(){
                            return $(this).attr('data-id')
                        }).get();

            var mention_user_id  =  $.makeArray(mentionUser);
            var discussionData = $('#replyDiscussion').serialize();

            var data = discussionData+='&mention_user_id=' + mention_user_id;

            $.easyAjax({
                url: "<?php echo e(route('discussion-reply.store')); ?>",
                container: '#replyDiscussion',
                type: "POST",
                blockUI: true,
                data: data,
                success: function(response) {
                    if (response.status == "success") {
                        if (taskDropzone.getQueuedFiles().length > 0) {
                            discussion_reply_id = response.discussion_reply_id;
                            taskDropzone.processQueue();
                        } else {
                            $('#right-modal-content').html(response.html);
                            $(MODAL_XL).modal('hide');
                        }
                    }
                }
            })
        });
</script>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/discussions/replies/show.blade.php ENDPATH**/ ?>