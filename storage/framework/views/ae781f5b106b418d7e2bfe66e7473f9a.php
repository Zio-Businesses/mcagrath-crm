<?php
$editContractPermission = user()->permission('edit_contract');
$deleteContractPermission = user()->permission('delete_contract');
?>
<?php $__empty_1 = true; $__currentLoopData = $contract->renewHistory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $history): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <div class="card w-100 rounded-0 border-0 comment mb-2">
        <div class="card-horizontal">
            <div class="card-img my-1 ml-0">
                <a href="<?php echo e(route('employees.show', $history->renewedBy->id)); ?>">
                    <img src="<?php echo e($history->renewedBy->image_url); ?>" alt="<?php echo e($history->renewedBy->name); ?>"></a>
            </div>
            <div class="card-body border-0 pl-0 py-1">
                <div class="d-flex flex-grow-1">
                    <h4 class="card-title f-15 f-w-500"><a class="text-dark"
                        href="<?php echo e(route('employees.show', $history->renewedBy->id)); ?>"><?php echo e($history->renewedBy->name); ?></a>
                        <br>
                        <span class="card-date f-11 text-lightest mb-0">
                            <i class="fa fa-calendar-alt"></i> <?php echo app('translator')->get('app.renewDate'); ?>  - <?php echo e($history->created_at->timezone(company()->timezone)->translatedFormat(company()->date_format)); ?>

                        </span>
                    </h4>
                    <div class="dropdown ml-auto comment-action">
                        <button class="btn btn-lg f-14 p-0 text-lightest text-capitalize rounded  dropdown-toggle"
                            type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-ellipsis-h"></i>
                        </button>

                        <div class="dropdown-menu dropdown-menu-right border-grey rounded b-shadow-4 p-0"
                            aria-labelledby="dropdownMenuLink" tabindex="0">
                            <?php if($editContractPermission == 'all' || ($editContractPermission == 'added' && $history->added_by == user()->id)): ?>
                                <a class="dropdown-item edit-comment"
                                    href="javascript:;" data-row-id="<?php echo e($history->id); ?>"><?php echo app('translator')->get('app.edit'); ?></a>
                            <?php endif; ?>

                            <?php if($deleteContractPermission == 'all' || ($deleteContractPermission == 'added' && $history->added_by == user()->id)): ?>
                                <a class="dropdown-item  delete-comment"
                                    data-row-id="<?php echo e($history->id); ?>" href="javascript:;"><?php echo app('translator')->get('app.delete'); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="card-text f-14 text-dark-grey text-justify">
                    <?php if (isset($component)) { $__componentOriginal7d9f6e0b9001f5841f72577781b2d17f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7d9f6e0b9001f5841f72577781b2d17f = $attributes; } ?>
<?php $component = App\View\Components\Table::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Table::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'table-bordered my-3 rounded']); ?>
                         <?php $__env->slot('thead', null, []); ?> 
                            <th><?php echo app('translator')->get('app.startDate'); ?></th>
                            <th><?php echo app('translator')->get('app.endDate'); ?></th>
                            <th class="text-right"><?php echo app('translator')->get('modules.contracts.newAmount'); ?></th>
                         <?php $__env->endSlot(); ?>
                        <tr>
                            <td><?php echo e($history->start_date->timezone(company()->timezone)->translatedFormat(company()->date_format)); ?></td>
                            <td><?php echo e($history->end_date->timezone(company()->timezone)->translatedFormat(company()->date_format)); ?></td>
                            <td class="text-right"><?php echo e(currency_format($history->amount, $contract->currency_id)); ?></td>
                        </tr>
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
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
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

<?php endif; ?>
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\contracts\renew\renew_history.blade.php ENDPATH**/ ?>