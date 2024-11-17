<link rel="stylesheet" href="<?php echo e(asset('vendor/css/dropzone.min.css')); ?>">
<div class="modal-header">
    <h5 class="modal-title"><?php echo app('translator')->get('app.menu.addReply'); ?></h5>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<div class="modal-body">
    <div class="portlet-body">
        <?php if (isset($component)) { $__componentOriginal18ad2e0d264f9740dc73fff715357c28 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal18ad2e0d264f9740dc73fff715357c28 = $attributes; } ?>
<?php $component = App\View\Components\Form::resolve(['method' => 'POST'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Form::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'createMethods','class' => 'ajax-form']); ?>
            <input type="hidden" name="discussion_id" value="<?php echo e($discussionId); ?>">

            <div class="row">
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
                        <div id="description"></div>
                        <textarea name="description" id="description-text" class="d-none"></textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <?php if (isset($component)) { $__componentOriginal22e84ee8172e1045de536542f4ffc9a0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal22e84ee8172e1045de536542f4ffc9a0 = $attributes; } ?>
<?php $component = App\View\Components\Forms\FileMultiple::resolve(['fieldLabel' => __('app.menu.addFile'),'fieldName' => 'file','fieldId' => 'discussion-file-upload-dropzone'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
    </div>
</div>
<div class="modal-footer">
    <?php if (isset($component)) { $__componentOriginalc35c79ed7e812580313ad04118477974 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc35c79ed7e812580313ad04118477974 = $attributes; } ?>
<?php $component = App\View\Components\Forms\ButtonCancel::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-cancel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonCancel::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['data-dismiss' => 'modal','class' => 'border-0 mr-3']); ?><?php echo app('translator')->get('app.cancel'); ?> <?php echo $__env->renderComponent(); ?>
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
<?php $component = App\View\Components\Forms\ButtonPrimary::resolve(['icon' => 'check'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'save-discussion']); ?><?php echo app('translator')->get('app.save'); ?> <?php echo $__env->renderComponent(); ?>
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

<script>
    $(document).ready(function () {
        quillImageLoad('#description');
        let discussion_reply_id;
        /* Upload images */
        Dropzone.autoDiscover = false;
        //Dropzone class
        taskDropzone = new Dropzone("#discussion-file-upload-dropzone", {
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

        // save discussion
        $('#save-discussion').click(function() {
            const note = document.getElementById('description').children[0].innerHTML;
            document.getElementById('description-text').value = note;

            $.easyAjax({
                url: "<?php echo e(route('discussion-reply.store')); ?>",
                container: '#createMethods',
                type: "POST",
                blockUI: true,
                data: $('#createMethods').serialize(),
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

        init('#createMethods');
    });


</script>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/discussions/replies/create.blade.php ENDPATH**/ ?>