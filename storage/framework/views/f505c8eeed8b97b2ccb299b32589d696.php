

<?php
    $deleteKnowledgebasePermission = user()->permission('delete_knowledgebase');
    $editKnowledgebasePermission = user()->permission('edit_knowledgebase');
    $addknowledgebasePermission = user()->permission('add_knowledgebase');
?>

<?php $__env->startSection('content'); ?>
    <!-- SETTINGS START -->
    <div class="w-100 d-flex ">

        <!-- SETTINGS SIDEBAR START -->
        <div class="mobile-close-overlay w-100 h-100" id="close-settings-overlay"></div>
        <div class="settings-sidebar bg-white py-3" id="mob-settings-sidebar">
            <a class="d-block d-lg-none close-it" id="close-settings"><i class="fa fa-times"></i></a>

            <!-- SETTINGS SEARCH START -->
            <form class="border-bottom-grey px-4 pb-3 d-flex">
                <div class="input-group rounded py-1 border-grey">
                    <div class="input-group-prepend">
                        <span class="input-group-text border-0 bg-white">
                            <i class="fa fa-search f-12 text-lightest"></i>
                        </span>
                    </div>
                    <input type="text" id="search-setting-menu" class="form-control border-0 f-14 pl-0"
                           placeholder="<?php echo app('translator')->get('app.search'); ?>">
                </div>
            </form>
            <!-- SETTINGS SEARCH END -->

            <!-- SETTINGS MENU START -->
            <ul class="settings-menu" id="settingsMenu">

                <?php if (isset($component)) { $__componentOriginal4bb8e03ef4950bdae17adf49744a4cf8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4bb8e03ef4950bdae17adf49744a4cf8 = $attributes; } ?>
<?php $component = App\View\Components\SettingMenuItem::resolve(['active' => $activeMenu,'menu' => 'all_category','href' => route('knowledgebase.index'),'text' => __('app.all')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('setting-menu-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SettingMenuItem::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4bb8e03ef4950bdae17adf49744a4cf8)): ?>
<?php $attributes = $__attributesOriginal4bb8e03ef4950bdae17adf49744a4cf8; ?>
<?php unset($__attributesOriginal4bb8e03ef4950bdae17adf49744a4cf8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4bb8e03ef4950bdae17adf49744a4cf8)): ?>
<?php $component = $__componentOriginal4bb8e03ef4950bdae17adf49744a4cf8; ?>
<?php unset($__componentOriginal4bb8e03ef4950bdae17adf49744a4cf8); ?>
<?php endif; ?>

                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if (isset($component)) { $__componentOriginal4bb8e03ef4950bdae17adf49744a4cf8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4bb8e03ef4950bdae17adf49744a4cf8 = $attributes; } ?>
<?php $component = App\View\Components\SettingMenuItem::resolve(['active' => $activeMenu,'menu' => str_replace(' ', '_', $item->name),'href' => route('knowledgebase.index') . '?id=' . $item->id,'text' => $item->name] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('setting-menu-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SettingMenuItem::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('category-'.$item->id)]); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4bb8e03ef4950bdae17adf49744a4cf8)): ?>
<?php $attributes = $__attributesOriginal4bb8e03ef4950bdae17adf49744a4cf8; ?>
<?php unset($__attributesOriginal4bb8e03ef4950bdae17adf49744a4cf8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4bb8e03ef4950bdae17adf49744a4cf8)): ?>
<?php $component = $__componentOriginal4bb8e03ef4950bdae17adf49744a4cf8; ?>
<?php unset($__componentOriginal4bb8e03ef4950bdae17adf49744a4cf8); ?>
<?php endif; ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </ul>
            <!-- SETTINGS MENU END -->

        </div>
        <!-- SETTINGS SIDEBAR END -->

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
                <form action="" id="filter-form">
                    <div class="d-flex justify-conten mb-2">

                        <?php if($addknowledgebasePermission == 'all'): ?>
                            <div class="form-group flex-grow-1">
                                <?php if (isset($component)) { $__componentOriginaldbb84df4c3a5cbdd95fb35d18ba6410f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldbb84df4c3a5cbdd95fb35d18ba6410f = $attributes; } ?>
<?php $component = App\View\Components\Forms\LinkPrimary::resolve(['link' => route('knowledgebase.create') . '?category=' . request('id'),'icon' => 'plus'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.link-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\LinkPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'openRightModal']); ?>
                                    <?php echo app('translator')->get('modules.knowledgeBase.addknowledgebase'); ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldbb84df4c3a5cbdd95fb35d18ba6410f)): ?>
<?php $attributes = $__attributesOriginaldbb84df4c3a5cbdd95fb35d18ba6410f; ?>
<?php unset($__attributesOriginaldbb84df4c3a5cbdd95fb35d18ba6410f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldbb84df4c3a5cbdd95fb35d18ba6410f)): ?>
<?php $component = $__componentOriginaldbb84df4c3a5cbdd95fb35d18ba6410f; ?>
<?php unset($__componentOriginaldbb84df4c3a5cbdd95fb35d18ba6410f); ?>
<?php endif; ?>

                                <?php if (isset($component)) { $__componentOriginal5e57c6582b8a883148a28bb7ee46d2ad = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5e57c6582b8a883148a28bb7ee46d2ad = $attributes; } ?>
<?php $component = App\View\Components\Forms\ButtonSecondary::resolve(['icon' => 'plus'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-secondary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonSecondary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'addCategory','class' => 'mr-3 ml-2 mb-lg-0']); ?>
                                    <?php echo app('translator')->get('modules.module.addknowledgebaseCategory'); ?>
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


                            </div>
                        <?php endif; ?>

                        <div class="form-group">
                            <div class="input-group bg-grey rounded border">
                                <div class="input-group-prepend">
                                    <span class="input-group-text border-0">
                                        <i class="fa fa-search f-13 text-dark-grey"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control height-35 f-14 p-1 border-additional-grey"
                                       id="search-text-field" placeholder="<?php echo app('translator')->get('app.startTyping'); ?>">
                            </div>
                        </div>
                        <?php if (isset($component)) { $__componentOriginal5e57c6582b8a883148a28bb7ee46d2ad = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5e57c6582b8a883148a28bb7ee46d2ad = $attributes; } ?>
<?php $component = App\View\Components\Forms\ButtonSecondary::resolve(['icon' => 'times-circle'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-secondary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonSecondary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'btn-xs d-none height-35 ml-2','id' => 'reset-filters']); ?>
                            <?php echo app('translator')->get('app.clearFilters'); ?>
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


                    </div>
                </form>
             <?php $__env->endSlot(); ?>

             <?php $__env->slot('header', null, []); ?> 
                <div class="s-b-n-header" id="tabs">
                    <h2 class="mb-0 p-20 f-21 font-weight-normal text-capitalize border-bottom-grey">
                        <?php echo app('translator')->get($pageTitle); ?></h2>
                </div>
             <?php $__env->endSlot(); ?>

            <div class="col-lg-12 col-md-12 ntfcn-tab-content-left w-100 p-4 ">
                <div class="table-responsive" id="know_data">
                    <?php if (isset($component)) { $__componentOriginal7d9f6e0b9001f5841f72577781b2d17f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7d9f6e0b9001f5841f72577781b2d17f = $attributes; } ?>
<?php $component = App\View\Components\Table::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Table::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'table-bordered']); ?>
                         <?php $__env->slot('thead', null, []); ?> 
                            <th>#</th>
                            <th><?php echo app('translator')->get('modules.knowledgeBase.knowledgeHeading'); ?></th>
                            <th><?php echo app('translator')->get('modules.knowledgeBase.knowledgeCategory'); ?></th>
                            <th><?php echo app('translator')->get('app.to'); ?></th>
                            <th class="text-right"><?php echo app('translator')->get('app.action'); ?></th>
                         <?php $__env->endSlot(); ?>

                        <?php $__empty_1 = true; $__currentLoopData = $knowledgebases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <?php if(in_array('admin', user_roles()) || in_array($item->to, user_roles())): ?>
                                <tr>
                                    <td><?php echo e($key + 1); ?></td>
                                    <td>
                                        <a href="<?php echo e(route('knowledgebase.show', $item->id)); ?>"
                                           class="openRightModal text-darkest-grey d-block"><?php echo e($item->heading); ?></a>
                                    </td>
                                    <td><?php echo e($item->knowledgebasecategory->name); ?></td>
                                    <td><?php echo e($item->to); ?></td>
                                    <td class="text-right">
                                        <?php if($editKnowledgebasePermission == 'all' || ($editKnowledgebasePermission == 'added' && $item->added_by == user()->id)): ?>
                                            <div class="task_view">
                                                <a href="<?php echo e(route('knowledgebase.edit', $item->id)); ?>"
                                                   class="task_view_more d-flex align-items-center justify-content-center openRightModal">
                                                    <i class="fa fa-edit icons mr-2"></i> <?php echo app('translator')->get('app.edit'); ?>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                        <?php if($deleteKnowledgebasePermission == 'all' || ($deleteKnowledgebasePermission == 'added' && $item->added_by == user()->id)): ?>
                                            <div class="task_view ml-2">
                                                <a href="javascript:;" data-article-id="<?php echo e($item->id); ?>"
                                                   class="task_view_more d-flex align-items-center justify-content-center delete-article">
                                                    <i class="fa fa-trash icons mr-2"></i> <?php echo app('translator')->get('app.delete'); ?>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <?php if (isset($component)) { $__componentOriginal1cadea97ad834515c6e69c0ef44e7014 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1cadea97ad834515c6e69c0ef44e7014 = $attributes; } ?>
<?php $component = App\View\Components\Cards\NoRecordFoundList::resolve(['colspan' => '5'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.no-record-found-list'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\NoRecordFoundList::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
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
            </div>
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
        $('#search-text-field').on('change keyup', function () {
            if ($('#search-text-field').val() != "") {
                $('#reset-filters').removeClass('d-none');
            } else {
                $('#reset-filters').addClass('d-none');
            }
        });

        $('#reset-filters').click(function () {
            $('#filter-form')[0].reset();
            $('.select-picker').val('all');

            $('.select-picker').selectpicker("refresh");
            $('#reset-filters').addClass('d-none');

            showSearchData();
        });

        $('#quick-action-type').change(function () {
            const actionValue = $(this).val();
            if (actionValue != '') {
                $('#quick-action-apply').removeAttr('disabled');
            } else {
                $('#quick-action-apply').attr('disabled', true);
            }
        });

        function showSearchData() {
            const srch = $('#search-text-field').val();
            let url = "<?php echo e(route('knowledgebase.searchQuery', ':query')); ?>";
            url = url.replace(':query', srch);

            const token = "<?php echo e(csrf_token()); ?>";
            const categoryId = "<?php echo e(request()->id); ?>";

            $.easyAjax({
                type: 'GET',
                url: url,
                data: {
                    '_token': token,
                    'categoryId': categoryId
                },
                success: function (response) {
                    if (response.status == "success") {
                        $("#know_data").html(response.html);
                    }
                }
            });
        }

        $('#search-text-field').on('change keyup', function () {
            showSearchData();
        });


        $("#search-setting-menu").on("keyup", function () {
            var value = this.value.toLowerCase().trim();
            $("#settingsMenu li").show().filter(function () {
                return $(this).text().toLowerCase().trim().indexOf(value) == -1;
            }).hide();
        });

        $('body').on('click', '.delete-article', function () {
            var articleId = $(this).data('article-id');

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
                    var url = "<?php echo e(route('knowledgebase.destroy', ':id')); ?>";
                    url = url.replace(':id', articleId)

                    var token = "<?php echo e(csrf_token()); ?>";

                    $.easyAjax({
                        type: 'POST',
                        url: url,
                        data: {
                            '_token': token,
                            '_method': 'DELETE'
                        },
                        success: function (response) {
                            if (response.status === "success") {
                                window.location.reload();
                            }
                        }
                    });
                }
            });
        });

        $('#reset-filters').click(function () {
            $('#filter-form')[0].reset();
            $('.select-picker').val('all');

            $('.select-picker').selectpicker("refresh");
            $('#reset-filters').addClass('d-none');

            showSearchData();
        });

        $('#addCategory').click(function () {
            const url = "<?php echo e(route('knowledgebasecategory.create')); ?>";
            $(`${MODAL_LG} ${MODAL_HEADING}`).html('...');
            $.ajaxModal(MODAL_LG, url);
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\knowledge-base\index.blade.php ENDPATH**/ ?>