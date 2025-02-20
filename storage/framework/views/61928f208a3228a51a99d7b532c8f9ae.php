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
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/knowledge-base/ajax/knowledgedata.blade.php ENDPATH**/ ?>