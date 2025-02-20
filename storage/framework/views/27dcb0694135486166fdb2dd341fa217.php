

<!-- LEAVE SETTING START -->
<div class="col-lg-12 col-md-12 ntfcn-tab-content-left w-100 p-4">

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
                <th><?php echo app('translator')->get('modules.leaves.leaveType'); ?></th>
                <th><?php echo app('translator')->get('modules.leaves.noOfLeaves'); ?></th>
                <th><?php echo app('translator')->get('modules.leaves.monthLimit'); ?></th>
                <th><?php echo app('translator')->get('modules.leaves.leavePaidStatus'); ?></th>
                <th><?php echo app('translator')->get('app.department'); ?></th>
                <th><?php echo app('translator')->get('app.designation'); ?></th>
                <th class="text-right"><?php echo app('translator')->get('app.action'); ?></th>
             <?php $__env->endSlot(); ?>

            <?php $__empty_1 = true; $__currentLoopData = $leaveTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$leaveType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr id="type-<?php echo e($leaveType->id); ?>">
                    <td>
                        <p class="f-w-500 mb-0"><i class="fa fa-circle mr-1 text-yellow"
                                style="color: <?php echo e($leaveType->color); ?>"></i><?php echo e($leaveType->type_name); ?>

                        </p>
                    </td>
                    <td> <?php echo e($leaveType->no_of_leaves); ?></td>
                    <td> <?php echo e(($leaveType->monthly_limit > 0) ? $leaveType->monthly_limit : '--'); ?></td>
                    <td>
                        <?php if($leaveType->paid == 1): ?>
                            <?php echo app('translator')->get('modules.credit-notes.paid'); ?>
                        <?php else: ?>
                            <?php echo app('translator')->get('modules.credit-notes.unpaid'); ?>
                        <?php endif; ?>
                    </td>
                    <td>
                        <ol class="pl-3">
                            <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(!is_null($leaveType->department) && in_array($department->id, json_decode($leaveType->department))): ?>
                                    <li><?php echo e($department->team_name); ?></li>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ol>
                    </td>
                    <td>
                        <ol class="pl-3">
                            <?php $__currentLoopData = $designations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $designation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(!is_null($leaveType->designation) && in_array($designation->id, json_decode($leaveType->designation))): ?>
                                    <li><?php echo e($designation->name); ?></li>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ol>
                    </td>
                    <td class="text-right">
                        <div class="task_view">
                            <a href="javascript:;" data-leave-id="<?php echo e($leaveType->id); ?>"
                                class="editNewLeaveType task_view_more d-flex align-items-center justify-content-center">
                                <i class="fa fa-edit icons mr-2"></i> <?php echo app('translator')->get('app.edit'); ?>
                            </a>
                        </div>
                        <div class="task_view mt-1 mt-lg-0 mt-md-0">
                            <a href="javascript:;" data-leave-id="<?php echo e($leaveType->id); ?>"
                                class="delete-category task_view_more d-flex align-items-center justify-content-center">
                                <i class="fa fa-trash icons mr-2"></i> <?php echo app('translator')->get('app.delete'); ?>
                            </a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="4">
                        <?php if (isset($component)) { $__componentOriginal269164c77d9d34462c34359c03da6a68 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal269164c77d9d34462c34359c03da6a68 = $attributes; } ?>
<?php $component = App\View\Components\Cards\NoRecord::resolve(['icon' => 'list','message' => __('messages.noLeaveTypeAdded')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                    </td>
                </tr>
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
<!-- LEAVE SETTING END -->

<script>
    $('body').on('click', '.delete-category', function() {

    var id = $(this).data('leave-id');

    Swal.fire({
        title: "<?php echo app('translator')->get('messages.sweetAlertTitle'); ?>",
        text: "<?php echo app('translator')->get('messages.deleteLeaveType'); ?>",
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

            var url = "<?php echo e(route('leaveType.destroy', ':id')); ?>";
            url = url.replace(':id', id);

            var token = "<?php echo e(csrf_token()); ?>";

            $.easyAjax({
                type: 'POST',
                url: url,
                blockUI: true,
                data: {
                    '_token': token,
                    '_method': 'DELETE'
                },
                success: function(response) {
                    if (response.status == "success") {
                        $('#type-' + id).fadeOut();
                    }
                }
            });
        }
    });
    });

    // add new leave type
    $('#addNewLeaveType').click(function() {
    var url = "<?php echo e(route('leaveType.create')); ?>";
    $(MODAL_XL + ' ' + MODAL_HEADING).html('...');
    $.ajaxModal(MODAL_XL, url);
    });


    $('.editNewLeaveType').click(function() {

        var id = $(this).data('leave-id');

        var url = "<?php echo e(route('leaveType.edit', ':id ')); ?>";
        url = url.replace(':id', id);

        $(MODAL_XL + ' ' + MODAL_HEADING).html('...');
        $.ajaxModal(MODAL_XL, url);
    });

</script>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/leave-settings/ajax/type.blade.php ENDPATH**/ ?>