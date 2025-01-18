<div class="table-responsive p-20">
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
            <th width="35%"><?php echo app('translator')->get('modules.projectCategory.categoryName'); ?></th>
            <th class="text-right"><?php echo app('translator')->get('app.action'); ?></th>
         <?php $__env->endSlot(); ?>

         <?php $__empty_1 = true; $__currentLoopData = $leadCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr class="row<?php echo e($category->id); ?>">
                <td><?php echo e(($key+1)); ?></td>
                <td><?php echo e($category->category_name); ?></td>
                <td class="text-right">
                    <div class="task_view">
                        <a href="javascript:;" data-category-id="<?php echo e($category->id); ?>" class="edit-category task_view_more d-flex align-items-center justify-content-center" > <i class="fa fa-edit icons mr-2"></i>  <?php echo app('translator')->get('app.edit'); ?>
                        </a>
                    </div>
                    <div class="task_view">
                        <a href="javascript:;" class="delete-category task_view_more d-flex align-items-center justify-content-center" data-category-id="<?php echo e($category->id); ?>">
                            <i class="fa fa-trash icons mr-2"></i> <?php echo app('translator')->get('app.delete'); ?>
                        </a>
                    </div>
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
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\lead-settings\ajax\category.blade.php ENDPATH**/ ?>