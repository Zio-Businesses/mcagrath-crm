<?php
$updateLeaveQuotaPermission = user()->permission('update_leaves_quota');
?>

<!-- TAB CONTENT START -->
<div class="tab-pane fade show active mt-5" role="tabpanel" aria-labelledby="nav-email-tab">

    <div class="row mb-4">
        <div class="col-lg-4">
            <?php if (isset($component)) { $__componentOriginale1233a330800208b0e743068470d1bf4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale1233a330800208b0e743068470d1bf4 = $attributes; } ?>
<?php $component = App\View\Components\Cards\Widget::resolve(['icon' => 'sign-out-alt','title' => __('modules.leaves.remainingLeaves'),'value' => $allowedLeaves] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.widget'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Widget::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale1233a330800208b0e743068470d1bf4)): ?>
<?php $attributes = $__attributesOriginale1233a330800208b0e743068470d1bf4; ?>
<?php unset($__attributesOriginale1233a330800208b0e743068470d1bf4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale1233a330800208b0e743068470d1bf4)): ?>
<?php $component = $__componentOriginale1233a330800208b0e743068470d1bf4; ?>
<?php unset($__componentOriginale1233a330800208b0e743068470d1bf4); ?>
<?php endif; ?>
        </div>
    </div>


    <?php if (isset($component)) { $__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9 = $attributes; } ?>
<?php $component = App\View\Components\Cards\Data::resolve(['title' => __('app.menu.leavesQuota')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Data::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
        <?php if($updateLeaveQuotaPermission == 'all'): ?>

            <div class="row">
                <div class="col-md-12">
                    <a class="f-15 f-w-500" href="javascript:;" id="renew-contract"><i
                            class="icons icon-settings font-weight-bold mr-1"></i>
                        <?php echo app('translator')->get('app.manage'); ?></a>
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
<?php $component->withAttributes(['id' => 'save-renew-data-form','class' => 'd-none']); ?>

                <div class="row">
                    <div class="col-md-12">
                        <?php if (isset($component)) { $__componentOriginal7d9f6e0b9001f5841f72577781b2d17f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7d9f6e0b9001f5841f72577781b2d17f = $attributes; } ?>
<?php $component = App\View\Components\Table::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Table::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'table-bordered mb-3 rounded']); ?>
                             <?php $__env->slot('thead', null, []); ?> 
                                <th><?php echo app('translator')->get('modules.leaves.leaveType'); ?></th>
                                <th><?php echo app('translator')->get('modules.leaves.noOfLeaves'); ?></th>
                                <th class="text-right"><?php echo app('translator')->get('app.action'); ?></th>
                             <?php $__env->endSlot(); ?>

                            <?php $__currentLoopData = $employeeLeavesQuotas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $leavesQuota): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($leavesQuota->leaveType->leaveTypeCondition($leavesQuota->leaveType, $employee)): ?>
                                    <tr>
                                        <td>
                                            <?php if (isset($component)) { $__componentOriginal86883428e4629123511f221a5a89811e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal86883428e4629123511f221a5a89811e = $attributes; } ?>
<?php $component = App\View\Components\Status::resolve(['value' => $leavesQuota->leaveType->type_name,'style' => 'color:'.$leavesQuota->leaveType->color] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                                        </td>
                                        <td> <input type="number" min="0" value="<?php echo e($leavesQuota?->no_of_leaves ?: 0); ?>"
                                                class="form-control height-35 f-14 leave-count-<?php echo e($leavesQuota->id); ?>">
                                        </td>
                                        <td class="text-right">
                                            <button type="button" data-type-id="<?php echo e($leavesQuota->id); ?>"
                                                class="btn btn-sm btn-primary btn-outline update-category">
                                                <i class="fa fa-check"></i>
                                            </button>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php if(!$hasLeaveQuotas): ?>
                                <tr>
                                    <td colspan="3">
                                        <?php if (isset($component)) { $__componentOriginal269164c77d9d34462c34359c03da6a68 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal269164c77d9d34462c34359c03da6a68 = $attributes; } ?>
<?php $component = App\View\Components\Cards\NoRecord::resolve(['icon' => 'redo','message' => __('messages.noRecordFound')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
<?php $component->withAttributes(['id' => 'cancel-renew','class' => 'border-0']); ?><?php echo app('translator')->get('app.cancel'); ?>
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


        <div class="d-flex flex-wrap justify-content-between" id="comment-list">
            <?php echo $__env->make('employees.leaves_quota', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
    $(document).ready(function() {
        $('#renew-contract').click(function() {
            $(this).closest('.row').addClass('d-none');
            $('#save-renew-data-form').removeClass('d-none');
        });

        $('#cancel-renew').click(function() {
            $('#save-renew-data-form').addClass('d-none');
            $('#renew-contract').closest('.row').removeClass('d-none');
        });

        $('.update-category').click(function() {
            var id = $(this).data('type-id');
            var leaves = $('.leave-count-' + id).val();
            var url = "<?php echo e(route('employee-leaves.update', ':id')); ?>";
            url = url.replace(':id', id);

            var token = "<?php echo e(csrf_token()); ?>";

            $.easyAjax({
                type: 'POST',
                url: url,
                data: {
                    '_method': 'PUT',
                    '_token': token,
                    'leaves': leaves
                },
                success: function(response) {
                    if (response.status == "success") {
                        window.location.reload();
                    }
                }
            });
        });

    });

</script>
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\employees\ajax\leaves_quota.blade.php ENDPATH**/ ?>