<?php
$editPipelinePermission = user()->permission('edit_deal_pipeline');
$mangeLeadStagePermission = user()->permission('manage_deal_stages');
?>
<div class="table-responsive p-20 pipelineData">

    <div class="col-lg-12 col-md-12 ntfcn-tab-content-left w-100">
        <?php $__empty_1 = true; $__currentLoopData = $pipelines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pipeline): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="row no-gutters border rounded my-3 px-4 py-2">
                <div class="col-md-6">
                    <div class="heading-h4"><?php if (isset($component)) { $__componentOriginal86883428e4629123511f221a5a89811e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal86883428e4629123511f221a5a89811e = $attributes; } ?>
<?php $component = App\View\Components\Status::resolve(['value' => $pipeline->name,'style' => 'color:'.$pipeline->label_color] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                    <?php if($editPipelinePermission == 'all'
                    || ($editPipelinePermission == 'added' && user()->id == $pipeline->added_by)
                    || ($editPipelinePermission == 'owned' && user()->id == $pipeline->added_by)
                    || ($editPipelinePermission == 'both' && user()->id == $pipeline->added_by)): ?>
                        <a href="javascript:;" title="<?php echo app('translator')->get('app.edit'); ?>" data-pipeline-id="<?php echo e($pipeline->id); ?>"
                        class="edit-pipeline "> <i class="fa fa-edit icons mr-2"></i>
                        </a>
                    <?php endif; ?>
                </div>

                    <div class="simple-text text-lightest mt-1"><?php echo e($pipeline->stages->count()); ?> <?php echo app('translator')->get('modules.deal.stages'); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <?php if (isset($component)) { $__componentOriginalc709ddc147ddde534205d9546b4fb0db = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc709ddc147ddde534205d9546b4fb0db = $attributes; } ?>
<?php $component = App\View\Components\Forms\Radio::resolve(['fieldId' => 'pipelineid_'.e($pipeline->id).'','fieldLabel' => __('app.default'),'fieldName' => 'pipeline','fieldValue' => ''.e($pipeline->id).'','checked' => ($pipeline->default == 1) ? 'checked' : ''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.radio'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Radio::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'set_default_pipeline','data-pipeline-id' => ''.e($pipeline->id).'']); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc709ddc147ddde534205d9546b4fb0db)): ?>
<?php $attributes = $__attributesOriginalc709ddc147ddde534205d9546b4fb0db; ?>
<?php unset($__attributesOriginalc709ddc147ddde534205d9546b4fb0db); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc709ddc147ddde534205d9546b4fb0db)): ?>
<?php $component = $__componentOriginalc709ddc147ddde534205d9546b4fb0db; ?>
<?php unset($__componentOriginalc709ddc147ddde534205d9546b4fb0db); ?>
<?php endif; ?>
                </div>
                <div class="col-md-2 text-right" >
                    <?php if (isset($component)) { $__componentOriginal5e57c6582b8a883148a28bb7ee46d2ad = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5e57c6582b8a883148a28bb7ee46d2ad = $attributes; } ?>
<?php $component = App\View\Components\Forms\ButtonSecondary::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-secondary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonSecondary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'view-pipeline','data-pipeline-id' => ''.e($pipeline->id).'']); ?> <i class="side-icon bi bi-kanban"></i>
                        <?php echo app('translator')->get('modules.deal.stages'); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5e57c6582b8a883148a28bb7ee46d2ad)): ?>
<?php $attributes = $__attributesOriginal5e57c6582b8a883148a28bb7ee46d2ad; ?>
<?php unset($__attributesOriginal5e57c6582b8a883148a28bb7ee46d2ad); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5e57c6582b8a883148a28bb7ee46d2ad)): ?>
<?php $component = $__componentOriginal5e57c6582b8a883148a28bb7ee46d2ad; ?>
<?php unset($__componentOriginal5e57c6582b8a883148a28bb7ee46d2ad); ?>
<?php endif; ?>
                </div>
            </div>
            <div class="table-sm-responsive role-permissions d-none" id="pipeline-stages-<?php echo e($pipeline->id); ?>">
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
                        <th><?php echo app('translator')->get('modules.deal.leadStage'); ?></th>
                        <th><?php echo app('translator')->get('modules.deal.defaultLeadStage'); ?></th>
                        <th><?php echo app('translator')->get('app.action'); ?></th>
                     <?php $__env->endSlot(); ?>

                    <?php $__empty_2 = true; $__currentLoopData = $pipeline->stages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $stage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                        <tr class="row<?php echo e($stage->id); ?>">
                            <td><?php echo e($key + 1); ?></td>
                            <td>
                                <?php if (isset($component)) { $__componentOriginal86883428e4629123511f221a5a89811e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal86883428e4629123511f221a5a89811e = $attributes; } ?>
<?php $component = App\View\Components\Status::resolve(['value' => $stage->name,'style' => 'color:'.$stage->label_color] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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

                            <td>
                                <?php if (isset($component)) { $__componentOriginalc709ddc147ddde534205d9546b4fb0db = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc709ddc147ddde534205d9546b4fb0db = $attributes; } ?>
<?php $component = App\View\Components\Forms\Radio::resolve(['fieldId' => 'pipeline_id_'.e($stage->id).'','fieldLabel' => __('app.default'),'fieldName' => ''.e($pipeline->name).'','fieldValue' => ''.e($stage->id).'','checked' => ($stage->default == 1) ? 'checked' : ''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.radio'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Radio::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'set_default_stage','data-status-id' => ''.e($stage->id).'','data-pipeline-id' => ''.e($pipeline->id).'']); ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc709ddc147ddde534205d9546b4fb0db)): ?>
<?php $attributes = $__attributesOriginalc709ddc147ddde534205d9546b4fb0db; ?>
<?php unset($__attributesOriginalc709ddc147ddde534205d9546b4fb0db); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc709ddc147ddde534205d9546b4fb0db)): ?>
<?php $component = $__componentOriginalc709ddc147ddde534205d9546b4fb0db; ?>
<?php unset($__componentOriginalc709ddc147ddde534205d9546b4fb0db); ?>
<?php endif; ?>
                            </td>

                            <td>
                                <div class="task_view">
                                    <a href="javascript:;" data-status-id="<?php echo e($stage->id); ?>"
                                        class="edit-status task_view_more d-flex align-items-center justify-content-center"> <i
                                            class="fa fa-edit icons mr-2"></i> <?php echo app('translator')->get('app.edit'); ?>
                                    </a>
                                </div>

                                <?php if(!$stage->default && $stage->slug != 'generated' &&  $stage->slug != 'win' && $stage->slug != 'lost' ): ?>
                                    <div class="task_view mt-1 mt-lg-0 mt-md-0">
                                        <a href="javascript:;"
                                            class="delete-stage task_view_more d-flex align-items-center justify-content-center"
                                            data-stage-id="<?php echo e($stage->id); ?>">
                                            <i class="fa fa-trash icons mr-2"></i> <?php echo app('translator')->get('app.delete'); ?>
                                        </a>
                                    </div>
                                <?php endif; ?>

                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                        <tr>
                            <td colspan="4">
                                <?php if (isset($component)) { $__componentOriginal269164c77d9d34462c34359c03da6a68 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal269164c77d9d34462c34359c03da6a68 = $attributes; } ?>
<?php $component = App\View\Components\Cards\NoRecord::resolve(['icon' => 'list','message' => __('messages.noLeadStatusAdded')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <?php endif; ?>


    </div>
</div>

<script>
     $('.pipelineData').on('click', '.view-pipeline', function() {

            var pipelineId = $(this).data('pipeline-id');
            $("#pipeline-stages-"+pipelineId).toggleClass('d-none');

        });
</script>
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\lead-settings\ajax\pipeline.blade.php ENDPATH**/ ?>