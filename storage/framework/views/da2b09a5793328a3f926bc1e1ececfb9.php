<?php
    $managePermission = user()->permission('view_appreciation');
    $addAppreciationPermission = user()->permission('add_appreciation');
    $editAppreciationPermission = user()->permission('edit_appreciation');
    $deleteAppreciationPermission = user()->permission('delete_appreciation');
    $showAppreciationPermission = user()->permission('view_appreciation');
?>
    <!-- TAB CONTENT START -->
<div class="row py-0 py-md-0 py-lg-3">
    <div class="col-lg-12 col-md-12 mb-4 mb-xl-0 mb-lg-4">

        <?php if($addAppreciationPermission == 'all'): ?>
            <div class="d-flex justify-content-between action-bar mb-3">
                <?php if (isset($component)) { $__componentOriginaldbb84df4c3a5cbdd95fb35d18ba6410f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldbb84df4c3a5cbdd95fb35d18ba6410f = $attributes; } ?>
<?php $component = App\View\Components\Forms\LinkPrimary::resolve(['link' => route('appreciations.create').'?empid='.$employee->id,'icon' => 'plus'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.link-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\LinkPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['data-redirect-url' => ''.e(url()->full()).'','class' => 'mr-3 openRightModal float-left']); ?>
                    <?php echo app('translator')->get('modules.appreciations.addAppreciation'); ?>
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
            </div>
        <?php endif; ?>

        <?php if (isset($component)) { $__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9 = $attributes; } ?>
<?php $component = App\View\Components\Cards\Data::resolve(['title' => __('modules.appreciations.appreciation')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Data::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

            <div class="table-responsive">
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
                        <th><?php echo app('translator')->get('modules.appreciations.appreciationType'); ?></th>
                        <th><?php echo app('translator')->get('modules.appreciations.awardDate'); ?></th>
                        <th class="text-right"><?php echo app('translator')->get('app.action'); ?></th>
                     <?php $__env->endSlot(); ?>

                    <?php $__empty_1 = true; $__currentLoopData = $appreciations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $count => $appreciation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="tableRow<?php echo e($appreciation->id); ?>">
                            <td>
                                <?php if (isset($component)) { $__componentOriginal114db03223c58461d1d88bb28b6e2026 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal114db03223c58461d1d88bb28b6e2026 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.award-icon','data' => ['award' => $appreciation->award]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('award-icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['award' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($appreciation->award)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal114db03223c58461d1d88bb28b6e2026)): ?>
<?php $attributes = $__attributesOriginal114db03223c58461d1d88bb28b6e2026; ?>
<?php unset($__attributesOriginal114db03223c58461d1d88bb28b6e2026); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal114db03223c58461d1d88bb28b6e2026)): ?>
<?php $component = $__componentOriginal114db03223c58461d1d88bb28b6e2026; ?>
<?php unset($__componentOriginal114db03223c58461d1d88bb28b6e2026); ?>
<?php endif; ?>
                                <a class="openRightModal text-dark-grey"
                                   href="<?php echo e(route('appreciations.show', $appreciation->id)); ?>">
                                    <span class="align-self-center ml-2"><?php echo e($appreciation->award->title); ?></span>
                                </a>
                            </td>
                            <td><?php echo e($appreciation->award_date->translatedFormat($company->date_format)); ?></td>
                            <td class="text-right">
                                <?php if(($showAppreciationPermission == 'all' || ($showAppreciationPermission == 'added' && user()->id == $appreciation->added_by) || ($showAppreciationPermission == 'owned' && user()->id == $appreciation->award_to) || ($showAppreciationPermission == 'both' && ($appreciation->added_by == user()->id || user()->id == $appreciation->award_to)))
                                    || ($editAppreciationPermission == 'all' || ($editAppreciationPermission == 'added' && user()->id == $appreciation->added_by) || ($editAppreciationPermission == 'owned' && user()->id == $appreciation->award_to) || ($editAppreciationPermission == 'both' && ($appreciation->added_by == user()->id || user()->id == $appreciation->award_to)))
                                     || ($deleteAppreciationPermission == 'all' || ($deleteAppreciationPermission == 'added' && user()->id == $appreciation->added_by) || ($deleteAppreciationPermission == 'owned' && user()->id == $appreciation->award_to) || ($deleteAppreciationPermission == 'both' && ($appreciation->added_by == user()->id || user()->id == $appreciation->award_to)))): ?>
                                    <div class="task_view">
                                        <div class="dropdown">
                                            <a class="task_view_more d-flex align-items-center justify-content-center dropdown-toggle"
                                               type="link"
                                               id="dropdownMenuLink-<?php echo e($count); ?>" data-toggle="dropdown"
                                               aria-haspopup="true" aria-expanded="false" data-boundary="viewport">
                                                <i class="icon-options-vertical icons"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right"
                                                 aria-labelledby="dropdownMenuLink-<?php echo e($count); ?>" tabindex="0">

                                                <?php if($showAppreciationPermission == 'all' || ($showAppreciationPermission == 'added' && user()->id == $appreciation->added_by) || ($showAppreciationPermission == 'owned' && user()->id == $appreciation->award_to) || ($showAppreciationPermission == 'both' && ($appreciation->added_by == user()->id || user()->id == $appreciation->award_to))): ?>
                                                    <a class="dropdown-item openRightModal"
                                                       href="<?php echo e(route('appreciations.show', $appreciation->id)); ?>">
                                                        <i class="fa fa-eye mr-2"></i>
                                                        <?php echo app('translator')->get('app.view'); ?>
                                                    </a>
                                                <?php endif; ?>

                                                <?php if($editAppreciationPermission == 'all' || ($editAppreciationPermission == 'added' && user()->id == $appreciation->added_by) || ($editAppreciationPermission == 'owned' && user()->id == $appreciation->award_to) || ($editAppreciationPermission == 'both' && ($appreciation->added_by == user()->id || user()->id == $appreciation->award_to))): ?>
                                                    <a class="dropdown-item openRightModal"
                                                       data-redirect-url="<?php echo e(url()->full()); ?>"
                                                       href="<?php echo e(route('appreciations.edit', $appreciation->id)); ?>">
                                                        <i class="fa fa-edit mr-2"></i>
                                                        <?php echo app('translator')->get('app.edit'); ?>
                                                    </a>
                                                <?php endif; ?>
                                                <?php if($deleteAppreciationPermission == 'all' || ($deleteAppreciationPermission == 'added' && user()->id == $appreciation->added_by) || ($deleteAppreciationPermission == 'owned' && user()->id == $appreciation->award_to) || ($deleteAppreciationPermission == 'both' && ($appreciation->added_by == user()->id || user()->id == $appreciation->award_to))): ?>
                                                    <a class="dropdown-item delete-table-row"
                                                       data-redirect-url="<?php echo e(url()->full()); ?>" href="javascript:;"
                                                       data-user-id="<?php echo e($appreciation->id); ?>">
                                                        <i class="fa fa-trash mr-2"></i>
                                                        <?php echo app('translator')->get('app.delete'); ?>
                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    -
                                <?php endif; ?>
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
</div>
<!-- TAB CONTENT END -->

<script>
    $('body').on('click', '.delete-table-row', function () {
        var id = $(this).data('user-id');
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
                var url = "<?php echo e(route('appreciations.destroy', ':id')); ?>";
                url = url.replace(':id', id);

                var token = "<?php echo e(csrf_token()); ?>";

                $.easyAjax({
                    type: 'POST',
                    url: url,
                    data: {
                        '_token': token,
                        '_method': 'DELETE'
                    },
                    success: function (response) {
                        if (response.status == "success") {
                            window.location.reload();
                        }
                    }
                });
            }
        });
    });

</script>
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\employees\ajax\appreciations.blade.php ENDPATH**/ ?>