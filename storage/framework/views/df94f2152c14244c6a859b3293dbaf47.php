<div class="col-xl-12 col-lg-12 col-md-12 ntfcn-tab-content-left w-100 p-20">
    <div class="row">
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
                    <th>#</th>
                    <th width="20%"><?php echo app('translator')->get('app.menu.method'); ?></th>
                    <th width="45%"><?php echo app('translator')->get('app.description'); ?></th>
                    <th><?php echo app('translator')->get('app.status'); ?></th>
                    <th class="text-right"><?php echo app('translator')->get('app.action'); ?></th>
                 <?php $__env->endSlot(); ?>

                <?php $__empty_1 = true; $__currentLoopData = $offlineMethods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="row<?php echo e($method->id); ?>">
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($method->name); ?></td>
                        <td class="text-break"><?php echo nl2br($method->description); ?> </td>
                        <td><?php echo ($method->status == 'yes') ? \App\Helper\Common::active(): \App\Helper\Common::inactive(); ?></td>

                        <td class="text-right">
                            <div class="task_view">
                                <a href="javascript:;" data-type-id="<?php echo e($method->id); ?>"
                                   class="task_view_more d-flex align-items-center justify-content-center edit-type"
                                   data-toggle="tooltip"
                                   data-original-title="<?php echo app('translator')->get('app.edit'); ?>">
                                    <i class="fa fa-edit icons"></i>
                                </a>
                            </div>
                            <div class="task_view">
                                <a href="javascript:;" data-data-id="<?php echo e($method->id); ?>"
                                   class="task_view_more d-flex align-items-center justify-content-center delete-type"
                                   data-toggle="tooltip"
                                   data-original-title="<?php echo app('translator')->get('app.delete'); ?>">
                                    <i class="fa fa-trash icons"></i>
                                </a>

                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
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
</div>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/payment-gateway-settings/ajax/offline.blade.php ENDPATH**/ ?>