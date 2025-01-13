<div class="row py-5">
    <div class="col-lg-12 col-md-12 mb-4 mb-xl-0 mb-lg-4">
        
            <?php if (isset($component)) { $__componentOriginalcf8d12533ff890e0d6573daf32b7618d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcf8d12533ff890e0d6573daf32b7618d = $attributes; } ?>
<?php $component = App\View\Components\Forms\ButtonPrimary::resolve(['icon' => 'plus'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'add-project-sow','class' => 'type-btn mb-3']); ?>
                <?php echo app('translator')->get('Create SOW'); ?>
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
       

       
            <?php if (isset($component)) { $__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9 = $attributes; } ?>
<?php $component = App\View\Components\Cards\Data::resolve(['title' => __('Scope Of Work'),'otherClasses' => 'border-0 p-0 d-flex justify-content-between align-items-center table-responsive-sm'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Data::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <?php if (isset($component)) { $__componentOriginal7d9f6e0b9001f5841f72577781b2d17f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7d9f6e0b9001f5841f72577781b2d17f = $attributes; } ?>
<?php $component = App\View\Components\Table::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Table::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'border-0 pb-3 admin-dash-table table-hover']); ?>

                     <?php $__env->slot('thead', null, []); ?> 
                        <th class="pl-20">#</th>
                        <th><?php echo app('translator')->get('SOW Title'); ?></th>
                        <th><?php echo app('translator')->get('Project Catgeory'); ?></th>
                        <th><?php echo app('translator')->get('Project Sub-Catgeory'); ?></th>
                        <th><?php echo app('translator')->get('Contractor Type'); ?></th>
                        <th><?php echo app('translator')->get('Added By'); ?></th>
                        <th><?php echo app('translator')->get('Added Date'); ?></th>
                        <th class="text-right pr-20"><?php echo app('translator')->get('app.action'); ?></th>
                     <?php $__env->endSlot(); ?>

                    <?php $__empty_1 = true; $__currentLoopData = $project->sow; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr id="row-<?php echo e($item->id); ?>">
                            <td class="pl-20"><?php echo e($key + 1); ?></td>
                            <td>
                                <a href="javascript:;" class="sow-detail text-darkest-grey f-w-500"
                                    data-sow-id="<?php echo e($item->id); ?>"><?php echo e($item->sow_title); ?></a>
                            </td>
                            <td>
                                <?php echo e($item->category??''); ?>

                            </td>
                            <td>
                                <?php echo e($item->sub_category??''); ?>

                            </td>
                            <td>
                                <?php echo e($item->contractor_type??''); ?>

                            </td>
                            <td>
                                <?php echo e($item->added->name??''); ?>

                            </td>
                            <td>
                                <?php echo e($item->created_at->translatedFormat(company()->date_format)); ?>

                            </td>
                            <td class="text-right pr-20">
                                <div class="task_view">
                                    <a href="javascript:;" data-sow-id="<?php echo e($item->id); ?>"
                                        class="taskView sow-detail text-darkest-grey f-w-500"><?php echo app('translator')->get('app.view'); ?></a>
                                    <div class="dropdown">
                                        <a class="task_view_more d-flex align-items-center justify-content-center dropdown-toggle"
                                            type="link" id="dropdownMenuLink-<?php echo e($item->id); ?>" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="icon-options-vertical icons"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdownMenuLink-<?php echo e($item->id); ?>" tabindex="0">

                                            
                                                <?php if(is_null($project->deleted_at)): ?>
                                                    <a class="dropdown-item edit-sow" href="javascript:;"
                                                        data-row-id="<?php echo e($item->id); ?>">
                                                        <i class="fa fa-edit mr-2"></i>
                                                        <?php echo app('translator')->get('app.edit'); ?>
                                                    </a>
                                                <?php endif; ?>
                                           

                                            
                                                <a class="dropdown-item delete-row" href="javascript:;"
                                                    data-row-id="<?php echo e($item->id); ?>">
                                                    <i class="fa fa-trash mr-2"></i>
                                                    <?php echo app('translator')->get('app.delete'); ?>
                                                </a>
                                           

                                        </div>
                                    </div>
                                </div>

                            </td>
                        </tr>
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

</div>
<!-- ROW END -->

<script>
    $('#add-project-sow').click(function() {
        const url = "<?php echo e(route('sow.create')); ?>" + "?id=<?php echo e($project->id); ?>";
        $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
        $.ajaxModal(MODAL_LG, url);

    });

    $('body').on('click', '.edit-sow', function() {
        var id = $(this).data('row-id');

        var url = "<?php echo e(route('sow.edit', ':id')); ?>";
        url = url.replace(':id', id);

        $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
        $.ajaxModal(MODAL_LG, url);

    });

    $('body').on('click', '.sow-detail', function() {
        var id = $(this).data('sow-id');
        var url = "<?php echo e(route('sow.show', ':id')); ?>";
        url = url.replace(':id', id);
        $(MODAL_XL + ' ' + MODAL_HEADING).html('...');
        $.ajaxModal(MODAL_XL, url);
    });

    $('.delete-row').click(function() {

        var id = $(this).data('row-id');
        var url = "<?php echo e(route('sow.destroy', ':id')); ?>";
        url = url.replace(':id', id);

        var token = "<?php echo e(csrf_token()); ?>";

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
                $.easyAjax({
                    type: 'POST',
                    url: url,
                    data: {
                        '_token': token,
                        '_method': 'DELETE'
                    },
                    success: function(response) {
                        if (response.status == "success") {
                            $('#row-' + id).fadeOut();
                        }
                    }
                });
            }
        });

    });

</script>
<?php /**PATH C:\laragon\www\public_html\resources\views/projects/ajax/sow.blade.php ENDPATH**/ ?>