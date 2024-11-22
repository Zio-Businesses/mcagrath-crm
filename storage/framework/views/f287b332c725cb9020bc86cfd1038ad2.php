<div class="col-lg-12 col-md-12 ntfcn-tab-content-left w-100 p-0">
    <div class="row">
        <div class="col-lg-12">
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
                        <th><?php echo app('translator')->get('modules.currencySettings.currencyName'); ?></th>
                        <th><?php echo app('translator')->get('modules.currencySettings.currencySymbol'); ?></th>
                        <th><?php echo app('translator')->get('modules.currencySettings.currencyCode'); ?></th>
                        <th><?php echo app('translator')->get('modules.currencySettings.exchangeRate'); ?></th>
                        <th><?php echo app('translator')->get('modules.accountSettings.currencyFormat'); ?>
                            <i class="fa fa-question-circle" data-toggle="tooltip" data-original-title="<?php echo app('translator')->get('modules.accountSettings.currencyFormatSettingTooltip'); ?>"></i>
                          </th>
                        <th class="text-right"><?php echo app('translator')->get('app.action'); ?></th>
                     <?php $__env->endSlot(); ?>

                    <?php $__empty_1 = true; $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="row<?php echo e($currency->id); ?>">
                            <td><?php echo e($currency->currency_name); ?>

                                <?php if(companyOrGlobalSetting()->currency_id == $currency->id): ?>
                                    <label class='badge badge-primary'><?php echo app('translator')->get('app.default'); ?></label>
                                <?php endif; ?>
                            </td>
                            <td><?php echo e($currency->currency_symbol); ?></td>
                            <td><?php echo e($currency->currency_code); ?></td>
                            <td><span data-toggle="tooltip" data-original-title="1 <?php echo e(companyOrGlobalSetting()->currency->currency_code); ?> = <?php echo e($currency->exchange_rate); ?> <?php echo e($currency->currency_code); ?>">
                                <?php echo e(!is_null($currency->exchange_rate) ? $currency->exchange_rate : '--'); ?></span> </td>
                            <td> <?php echo e(currency_format(1000, $currency->id)); ?></td>
                            <td class="text-right">
                                <div class="task_view">
                                    <a class="task_view_more d-flex align-items-center justify-content-center edit-channel" data-currency-id="<?php echo e($currency->id); ?>" href="javascript:;" >
                                        <i class="fa fa-edit icons mr-2"></i>  <?php echo app('translator')->get('app.edit'); ?>
                                    </a>
                                </div>
                                <?php if(companyOrGlobalSetting()->currency_id != $currency->id): ?>
                                    <div class="task_view mt-1 mt-lg-0 mt-md-0">
                                        <a class="task_view_more d-flex align-items-center justify-content-center delete-table-row" href="javascript:;" data-currency-id="<?php echo e($currency->id); ?>">
                                            <i class="fa fa-trash icons mr-2"></i> <?php echo app('translator')->get('app.delete'); ?>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <?php if (isset($component)) { $__componentOriginal1cadea97ad834515c6e69c0ef44e7014 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1cadea97ad834515c6e69c0ef44e7014 = $attributes; } ?>
<?php $component = App\View\Components\Cards\NoRecordFoundList::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
        </div>
    </div>
</div>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/currency-settings/ajax/currency-setting.blade.php ENDPATH**/ ?>