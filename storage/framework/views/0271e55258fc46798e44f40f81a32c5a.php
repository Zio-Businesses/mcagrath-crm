<?php $__empty_1 = true; $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $count => $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <tr class="tableRow<?php echo e($contact->id); ?>">
        <td><?php echo e($contact->name); ?></td>
        <td><?php echo e($contact->email); ?></td>
        <td><?php echo e($contact->mobile); ?></td>
        <td><?php echo e($contact->relation); ?></td>
        <td class="text-right">

            <div class="task_view">

                <div class="dropdown">
                    <a class="task_view_more d-flex align-items-center justify-content-center dropdown-toggle" type="link"
                        id="dropdownMenuLink-' . $contact->id . '" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="icon-options-vertical icons"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink-' . $contact->id . '" tabindex="0">
                        <a href="javascript:;" class="dropdown-item show-contact" data-contact-id="<?php echo e($contact->id); ?>"><i class="fa fa-eye mr-2"></i><?php echo app('translator')->get('app.view'); ?></a>
                        <a class="dropdown-item edit-contact" href="javascript:;" data-contact-id="<?php echo e($contact->id); ?>">
                            <i class="fa fa-edit mr-2"></i>
                            <?php echo app('translator')->get('app.edit'); ?>
                        </a>
                        <a class="dropdown-item delete-table-row" href="javascript:;" data-row-id="<?php echo e($contact->id); ?>">
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
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/profile-settings/emergency-contacts/data.blade.php ENDPATH**/ ?>