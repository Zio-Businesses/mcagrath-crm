<?php
    $deleteLeadFilePermission = user()->permission('delete_lead_files');
    $viewLeadFilePermission = user()->permission('view_lead_files');
?>
<?php if (isset($component)) { $__componentOriginal7d9f6e0b9001f5841f72577781b2d17f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7d9f6e0b9001f5841f72577781b2d17f = $attributes; } ?>
<?php $component = App\View\Components\Table::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Table::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'table-hover bg-white rounded']); ?>
     <?php $__env->slot('thead', null, []); ?> 
        <th><?php echo app('translator')->get('modules.projects.fileName'); ?></th>
        <th><?php echo app('translator')->get('app.date'); ?></th>
        <th class="text-right"><?php echo app('translator')->get('app.action'); ?></th>
     <?php $__env->endSlot(); ?>
    <?php $__empty_1 = true; $__currentLoopData = $deal->files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <tr>
            <td><?php echo e($file->filename); ?></td>
            <td><?php echo e($file->created_at->diffForHumans()); ?></td>
            <td class="text-right pr-20">
                <?php if($viewLeadFilePermission == 'all' || ($viewLeadFilePermission == 'added' && $file->added_by == user()->id)): ?>
                    <div class="task_view">
                        <a class="taskView" href="<?php echo e($file->file_url); ?>" target="_blank">
                            <?php echo app('translator')->get('app.view'); ?>
                        </a>
                        <div class="dropdown">
                            <a href="<?php echo e(route('deal-files.download', $file->id)); ?>"
                                class="task_view_more d-flex align-items-center justify-content-center dropdown-toggle"
                                type="link" id="dropdownMenuLink-3" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="icon-options-vertical icons"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="<?php echo e(route('deal-files.download', $file->id)); ?>">
                                    <i class="fa fa-download mr-2"></i>
                                    <?php echo app('translator')->get('app.download'); ?>
                                </a>
                                <?php if($deleteLeadFilePermission == 'all' || ($deleteLeadFilePermission == 'added' && $file->added_by == user()->id)): ?>
                                    <a class="dropdown-item delete-lead-file" href="javascript:;"
                                        data-file-id="<?php echo e($file->id); ?>">
                                        <i class="fa fa-trash mr-2"></i>
                                        <?php echo app('translator')->get('app.delete'); ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <tr>
            <td colspan="3" class="shadow-none">
                <?php if (isset($component)) { $__componentOriginal269164c77d9d34462c34359c03da6a68 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal269164c77d9d34462c34359c03da6a68 = $attributes; } ?>
<?php $component = App\View\Components\Cards\NoRecord::resolve(['icon' => 'file-excel','message' => __('messages.noFileUploaded')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/leads/lead-files/ajax-list.blade.php ENDPATH**/ ?>