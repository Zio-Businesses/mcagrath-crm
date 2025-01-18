<link rel="stylesheet" href="<?php echo e(asset('vendor/css/tagify.css')); ?>">

<style>
    .tagify {
        width: 100%;
    }

    .tags-look .tagify__dropdown__item {
        display: inline-block;
        border-radius: 3px;
        padding: .3em .5em;
        border: 1px solid #CCC;
        background: #F3F3F3;
        margin: .2em;
        font-size: .85em;
        color: black;
        transition: 0s;
    }

    .tags-look .tagify__dropdown__item--active {
        color: white;
    }

    .tags-look .tagify__dropdown__item:hover {
        background: var(--header_color);
    }

    #datatable {
        margin-bottom: -20px;
    }

</style>

<div class="col-lg-12 col-md-12 ntfcn-tab-content-left w-100 p-4 ">
    <div class="row">
        <div class="col-md-12">
            <?php
                $uploadMaxFilesize = \App\Helper\Files::getUploadMaxFilesize();
                $postMaxSize = \App\Helper\Files::getPostMaxSize();
            ?>

            <span class="text-info">
                Server upload_max_filesize = <strong><?php echo e(\App\Helper\Files::getUploadMaxFilesize()['size']); ?></strong>
                &nbsp; &nbsp; Server post_max_size = <strong><?php echo e(\App\Helper\Files::getUploadMaxFilesize()['size']); ?></strong>
            </span>

        </div>
        <div class="col-lg-3">

            <label for="allowed_file_size" class="mt-3">
                <?php echo app('translator')->get('modules.accountSettings.allowedFileSize'); ?> <sup class="f-14">*</sup>
            </label>

            <?php if (isset($component)) { $__componentOriginalcbf9105fd4879d5d6ef9e1f6fe271af7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcbf9105fd4879d5d6ef9e1f6fe271af7 = $attributes; } ?>
<?php $component = App\View\Components\Forms\InputGroup::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.input-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\InputGroup::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <input type="number" name="allowed_file_size" id="allowed_file_size"
                       value="<?php echo e(global_setting()->allowed_file_size); ?>"
                       placeholder="32"
                       class="form-control height-35 f-14"/>
                 <?php $__env->slot('preappend', null, []); ?> 
                    <label class="input-group-text border-grey bg-white height-35">MB</label>
                 <?php $__env->endSlot(); ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcbf9105fd4879d5d6ef9e1f6fe271af7)): ?>
<?php $attributes = $__attributesOriginalcbf9105fd4879d5d6ef9e1f6fe271af7; ?>
<?php unset($__attributesOriginalcbf9105fd4879d5d6ef9e1f6fe271af7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcbf9105fd4879d5d6ef9e1f6fe271af7)): ?>
<?php $component = $__componentOriginalcbf9105fd4879d5d6ef9e1f6fe271af7; ?>
<?php unset($__componentOriginalcbf9105fd4879d5d6ef9e1f6fe271af7); ?>
<?php endif; ?>
            <small><?php echo e(__('messages.lowerValue')); ?> <?php echo e(\App\Helper\Files::getUploadMaxFilesize()['size']); ?></small>

        </div>
        <div class="col-lg-4">
            <label for="allow_max_no_of_files" class="mt-3">
                <?php echo app('translator')->get('modules.accountSettings.maxNumberOfFiles'); ?> <sup class="f-14">*</sup>
            </label>

            <?php if (isset($component)) { $__componentOriginalcbf9105fd4879d5d6ef9e1f6fe271af7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcbf9105fd4879d5d6ef9e1f6fe271af7 = $attributes; } ?>
<?php $component = App\View\Components\Forms\InputGroup::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.input-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\InputGroup::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <input type="number" name="allow_max_no_of_files" id="allow_max_no_of_files"
                       value="<?php echo e(global_setting()->allow_max_no_of_files); ?>"
                       placeholder="5"
                       class="form-control height-35 f-14"/>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcbf9105fd4879d5d6ef9e1f6fe271af7)): ?>
<?php $attributes = $__attributesOriginalcbf9105fd4879d5d6ef9e1f6fe271af7; ?>
<?php unset($__attributesOriginalcbf9105fd4879d5d6ef9e1f6fe271af7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcbf9105fd4879d5d6ef9e1f6fe271af7)): ?>
<?php $component = $__componentOriginalcbf9105fd4879d5d6ef9e1f6fe271af7; ?>
<?php unset($__componentOriginalcbf9105fd4879d5d6ef9e1f6fe271af7); ?>
<?php endif; ?>
        </div>

        <div class="col-lg-12 mt-4">
            <label for="allowed_file_types">
                <?php echo app('translator')->get('modules.accountSettings.allowedFileType'); ?> <sup class="f-14">*</sup>
            </label>
            <textarea type="text" name="allowed_file_types" id="allowed_file_types"
                      placeholder="<?php echo app('translator')->get('placeholders.fileSetting'); ?>"
                      class="form-control f-14"><?php echo e(global_setting()->allowed_file_types); ?></textarea>
        </div>

    </div>
</div>

<div class="w-100 border-top-grey set-btns">
    <?php if (isset($component)) { $__componentOriginal22960d0612890da31753448e47f28003 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal22960d0612890da31753448e47f28003 = $attributes; } ?>
<?php $component = App\View\Components\SettingFormActions::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('setting-form-actions'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SettingFormActions::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
        <?php if (isset($component)) { $__componentOriginalcf8d12533ff890e0d6573daf32b7618d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcf8d12533ff890e0d6573daf32b7618d = $attributes; } ?>
<?php $component = App\View\Components\Forms\ButtonPrimary::resolve(['icon' => 'check'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'save-file-upload-setting-form','class' => 'mr-3']); ?><?php echo app('translator')->get('app.save'); ?>
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

     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal22960d0612890da31753448e47f28003)): ?>
<?php $attributes = $__attributesOriginal22960d0612890da31753448e47f28003; ?>
<?php unset($__attributesOriginal22960d0612890da31753448e47f28003); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal22960d0612890da31753448e47f28003)): ?>
<?php $component = $__componentOriginal22960d0612890da31753448e47f28003; ?>
<?php unset($__componentOriginal22960d0612890da31753448e47f28003); ?>
<?php endif; ?>
</div>


<script src="<?php echo e(asset('vendor/jquery/tagify.min.js')); ?>"></script>

<script>

    $(document).ready(function () {
        var input = document.querySelector('textarea[id=allowed_file_types]');

        var whitelist = [
            'image/*', 'application/vnd.ms-excel',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/docx',
            'application/pdf', 'text/plain', 'application/msword',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/zip',
            'application/x-zip-compressed', 'application/x-compressed', 'multipart/x-zip', '.xlsx', 'video/x-flv',
            'video/mp4', 'application/x-mpegURL', 'video/MP2T', 'video/3gpp', 'video/quicktime', 'video/x-msvideo',
            'video/x-ms-wmv', 'application/sla', '.stl'
        ];
        // init Tagify script on the above inputs
        tagify = new Tagify(input, {
            whitelist: whitelist,
            userInput: false,
            dropdown: {
                classname: "tags-look",
                enabled: 0,
                closeOnSelect: false
            }
        });

        $('body').on('click', '#save-file-upload-setting-form', function () {
            const url = "<?php echo e(route('app-settings.update', [company()->id])); ?>?page=file-upload-setting";

            $.easyAjax({
                url: url,
                container: '#editSettings',
                type: "POST",
                disableButton: true,
                buttonSelector: "#save-file-upload-setting-form",
                data: $('#editSettings').serialize(),
            })
        });
    });


</script>
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\app-settings\ajax\file-upload-setting.blade.php ENDPATH**/ ?>