

<?php $__env->startPush('styles'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <!-- SETTINGS START -->
    <div class="w-100 d-flex ">

        <?php echo $__env->make('sections.setting-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php if (isset($component)) { $__componentOriginalcb8848b8ae159c08072bf1971fc3ca1f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcb8848b8ae159c08072bf1971fc3ca1f = $attributes; } ?>
<?php $component = App\View\Components\SettingCard::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('setting-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SettingCard::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

             <?php $__env->slot('buttons', null, []); ?> 
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <?php if (isset($component)) { $__componentOriginalcf8d12533ff890e0d6573daf32b7618d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcf8d12533ff890e0d6573daf32b7618d = $attributes; } ?>
<?php $component = App\View\Components\Forms\ButtonPrimary::resolve(['icon' => 'plus'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'add-language','class' => 'mb-2 mr-2']); ?> <?php echo app('translator')->get('app.addNewLanguage'); ?>
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
                        <?php if (isset($component)) { $__componentOriginal5e57c6582b8a883148a28bb7ee46d2ad = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5e57c6582b8a883148a28bb7ee46d2ad = $attributes; } ?>
<?php $component = App\View\Components\Forms\ButtonSecondary::resolve(['icon' => 'cog'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-secondary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonSecondary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'translations','class' => 'mb-2 mr-2']); ?> <?php echo app('translator')->get('modules.languageSettings.translate'); ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5e57c6582b8a883148a28bb7ee46d2ad)): ?>
<?php $attributes = $__attributesOriginal5e57c6582b8a883148a28bb7ee46d2ad; ?>
<?php unset($__attributesOriginal5e57c6582b8a883148a28bb7ee46d2ad); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5e57c6582b8a883148a28bb7ee46d2ad)): ?>
<?php $component = $__componentOriginal5e57c6582b8a883148a28bb7ee46d2ad; ?>
<?php unset($__componentOriginal5e57c6582b8a883148a28bb7ee46d2ad); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginal5e57c6582b8a883148a28bb7ee46d2ad = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5e57c6582b8a883148a28bb7ee46d2ad = $attributes; } ?>
<?php $component = App\View\Components\Forms\ButtonSecondary::resolve(['icon' => 'cog'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-secondary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonSecondary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'autoTranslate','class' => 'mb-2']); ?> <?php echo app('translator')->get('modules.languageSettings.autoTranslate'); ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5e57c6582b8a883148a28bb7ee46d2ad)): ?>
<?php $attributes = $__attributesOriginal5e57c6582b8a883148a28bb7ee46d2ad; ?>
<?php unset($__attributesOriginal5e57c6582b8a883148a28bb7ee46d2ad); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5e57c6582b8a883148a28bb7ee46d2ad)): ?>
<?php $component = $__componentOriginal5e57c6582b8a883148a28bb7ee46d2ad; ?>
<?php unset($__componentOriginal5e57c6582b8a883148a28bb7ee46d2ad); ?>
<?php endif; ?>
                        <?php if ($__env->exists('languagepack::publish-all-button')) echo $__env->make('languagepack::publish-all-button', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
             <?php $__env->endSlot(); ?>

             <?php $__env->slot('header', null, []); ?> 

                <div class="s-b-n-header" id="tabs">

                    <h2 class="mb-0 p-20 f-21 font-weight-normal text-capitalize border-bottom-grey">
                        <?php echo app('translator')->get($pageTitle); ?>
                    </h2>
                </div>
             <?php $__env->endSlot(); ?>


            <!-- LEAVE SETTING START -->
            <div class="col-lg-12 col-md-12 ntfcn-tab-content-left w-100">

                <div class="mt-2  alert alert-primary mb-2">

                    <div><strong>Note:</strong>
                        <?php echo e(__('messages.languageEnabledAlertMessage')); ?>

                    </div>
                </div>

                <?php if (isset($component)) { $__componentOriginal7d9f6e0b9001f5841f72577781b2d17f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7d9f6e0b9001f5841f72577781b2d17f = $attributes; } ?>
<?php $component = App\View\Components\Table::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Table::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'table table-sm-responsive']); ?>
                     <?php $__env->slot('thead', null, []); ?> 
                        <th><?php echo app('translator')->get('app.languageName'); ?></th>
                        <th><?php echo app('translator')->get('app.languageCode'); ?></th>
                        <th><?php echo app('translator')->get('app.status'); ?></th>
                        <th width="50%" class="text-right"><?php echo app('translator')->get('app.action'); ?></th>
                     <?php $__env->endSlot(); ?>

                    <?php $__empty_1 = true; $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr id="languageRow<?php echo e($language->id); ?>" class="<?php echo \Illuminate\Support\Arr::toCssClasses(['bg-additional-grey' => companyOrGlobalSetting()->locale === $language->language_code]); ?>" >
                            <td><span class='flag-icon flag-icon-<?php echo e($language->language_code=='en'?'gb':$language->flag_code); ?> flag-icon-squared'></span> <?php echo e($language->language_name); ?></td>
                            <td><?php echo e($language->language_code); ?></td>
                            <td>
                                <?php if(companyOrGlobalSetting()->locale !== $language->language_code): ?>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" <?php if($language->status == 'enabled'): ?> checked
                                               <?php endif; ?> class="custom-control-input change-language-setting"
                                               id="<?php echo e($language->id); ?>">
                                        <label class="custom-control-label cursor-pointer f-14"
                                               for="<?php echo e($language->id); ?>"></label>
                                    </div>
                                <?php else: ?>

                                    --
                                <?php endif; ?>

                            </td>
                            <?php $appSettingLink = "<a href='".route('app-settings.index')."'>".__('app.menu.appSettings')."</a>" ?>
                            <td class='text-right'>
                                <?php if($language->language_code !=='en' && companyOrGlobalSetting()->locale != $language->language_code): ?>
                                    <?php if(companyOrGlobalSetting()->locale != $language->language_code): ?>
                                        <?php if ($__env->exists('languagepack::publish', ['language' => $language])) echo $__env->make('languagepack::publish', ['language' => $language], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <button type="button"
                                            class="edit-language btn btn-outline-secondary  rounded f-14 p-2"
                                            data-language-id="<?php echo e($language->id); ?>">
                                            <i class="fa fa-edit icons mr-2"></i> <?php echo app('translator')->get('app.edit'); ?>
                                        </button>
                                        <button type="button"
                                            class="delete-language btn btn-outline-secondary  rounded f-14 p-2"
                                            data-language-id="<?php echo e($language->id); ?>">
                                            <i class="fa fa-trash icons mr-2"></i> <?php echo app('translator')->get('app.delete'); ?>
                                        </button>
                                    <?php else: ?>
                                        <?php if ($__env->exists('languagepack::publish', ['language' => $language])) echo $__env->make('languagepack::publish', ['language' => $language], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                        <button type="button" onclick="window.location.href='<?php echo e(route('app-settings.index')); ?>'"
                                            class="btn btn-outline-secondary  rounded f-14 p-2"
                                            data-toggle="popover" data-placement="top"
                                            data-content="<?php echo app('translator')->get('messages.defaultLanguageCantChange',['appsettings'=> $appSettingLink]); ?>"
                                            data-html="true" data-trigger="hover">
                                            &nbsp;<i class="fas fa-question-circle"></i>&nbsp;
                                        </button>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <?php if ($__env->exists('languagepack::publish', ['language' => $language])) echo $__env->make('languagepack::publish', ['language' => $language], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <button type="button" onclick="window.location.href='<?php echo e(route('app-settings.index')); ?>'"
                                        class="btn btn-outline-secondary  rounded f-14 p-2"
                                        data-toggle="popover" data-placement="top"
                                        data-content="<?php if(companyOrGlobalSetting()->locale == $language->language_code): ?><?php echo app('translator')->get('messages.defaultLanguageCantChange',['appsettings'=> $appSettingLink]); ?><?php else: ?> <?php echo app('translator')->get('messages.defaultEnLanguageCantChange'); ?><?php endif; ?>"
                                        data-html="true" data-trigger="hover">
                                        &nbsp;<i class="fas fa-question-circle"></i>&nbsp;
                                    </button>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <?php if (isset($component)) { $__componentOriginal1cadea97ad834515c6e69c0ef44e7014 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1cadea97ad834515c6e69c0ef44e7014 = $attributes; } ?>
<?php $component = App\View\Components\Cards\NoRecordFoundList::resolve(['colspan' => '4'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.no-record-found-list'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\NoRecordFoundList::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1cadea97ad834515c6e69c0ef44e7014)): ?>
<?php $attributes = $__attributesOriginal1cadea97ad834515c6e69c0ef44e7014; ?>
<?php unset($__attributesOriginal1cadea97ad834515c6e69c0ef44e7014); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1cadea97ad834515c6e69c0ef44e7014)): ?>
<?php $component = $__componentOriginal1cadea97ad834515c6e69c0ef44e7014; ?>
<?php unset($__componentOriginal1cadea97ad834515c6e69c0ef44e7014); ?>
<?php endif; ?>
                    <?php endif; ?>

                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7d9f6e0b9001f5841f72577781b2d17f)): ?>
<?php $attributes = $__attributesOriginal7d9f6e0b9001f5841f72577781b2d17f; ?>
<?php unset($__attributesOriginal7d9f6e0b9001f5841f72577781b2d17f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7d9f6e0b9001f5841f72577781b2d17f)): ?>
<?php $component = $__componentOriginal7d9f6e0b9001f5841f72577781b2d17f; ?>
<?php unset($__componentOriginal7d9f6e0b9001f5841f72577781b2d17f); ?>
<?php endif; ?>

            </div>
            <!-- LEAVE SETTING END -->

         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcb8848b8ae159c08072bf1971fc3ca1f)): ?>
<?php $attributes = $__attributesOriginalcb8848b8ae159c08072bf1971fc3ca1f; ?>
<?php unset($__attributesOriginalcb8848b8ae159c08072bf1971fc3ca1f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcb8848b8ae159c08072bf1971fc3ca1f)): ?>
<?php $component = $__componentOriginalcb8848b8ae159c08072bf1971fc3ca1f; ?>
<?php unset($__componentOriginalcb8848b8ae159c08072bf1971fc3ca1f); ?>
<?php endif; ?>

    </div>
    <!-- SETTINGS END -->

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>

    <script>

        $('body').on('click', '#translations', function () {
            const url = "<?php echo e(url('/translations')); ?>";

            window.open(url, '_blank');
        });


        $('body').on('click', '#add-language', function () {
            var url = "<?php echo e(route('language-settings.create')); ?>";
            $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
            $.ajaxModal(MODAL_LG, url);
        });

        $('body').on('click', '#autoTranslate', function () {
            var url = "<?php echo e(route('language_settings.auto_translate')); ?>";
            $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
            $.ajaxModal(MODAL_LG, url);
        });

        $('body').on('click', '.edit-language', function () {
            var id = $(this).data('language-id');
            var url = "<?php echo e(route('language-settings.edit',':id')); ?>";
            url = url.replace(':id', id);
            $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
            $.ajaxModal(MODAL_LG, url);
        });

        $('.change-language-setting').change(function () {
            var id = this.id;

            if ($(this).is(':checked'))
                var status = 'enabled';
            else
                var status = 'disabled';

            var url = "<?php echo e(route('language-settings.update', ':id')); ?>";
            url = url.replace(':id', id);
            $.easyAjax({
                url: url,
                type: "POST",
                blockUI: true,
                data: {'id': id, 'status': status, '_method': 'PUT', '_token': '<?php echo e(csrf_token()); ?>'}
            })
        });

        $('body').on('click', '.delete-language', function () {
            var id = $(this).data('language-id');
            Swal.fire({
                title: "<?php echo app('translator')->get('messages.sweetAlertTitle'); ?>",
                text: "<?php echo app('translator')->get('messages.deleteField'); ?>",
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

                    var url = "<?php echo e(route('language-settings.destroy',':id')); ?>";
                    url = url.replace(':id', id);

                    var token = "<?php echo e(csrf_token()); ?>";

                    $.easyAjax({
                        type: 'POST',
                        url: url,
                        data: {'_token': token, '_method': 'DELETE'},
                        blockUI: true,
                        success: function (response) {
                            if (response.status == "success") {
                                $.unblockUI();
                                $('#languageRow' + id).fadeOut();
                            }
                        }
                    });
                }
            });
        });

    </script>
    <?php if ($__env->exists('languagepack::script')) echo $__env->make('languagepack::script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\language-settings\index.blade.php ENDPATH**/ ?>