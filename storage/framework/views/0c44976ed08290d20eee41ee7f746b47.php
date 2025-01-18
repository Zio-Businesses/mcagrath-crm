<div class="tab-pane fade show active" role="tabpanel" aria-labelled@lang('app.by')="nav-email-tab">

    <div class="d-flex flex-wrap">
        <?php $__empty_1 = true; $__currentLoopData = $histories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $history): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="card file-card w-100 rounded-0 border-0 comment p-2">
                <div class="card-horizontal">
                    <div class="card-img my-1 ml-0">
                        <img src="<?php echo e($history->user->image_url); ?>" alt="<?php echo e($history->user->name); ?>">
                    </div>
                    <div class="card-body border-0 pl-0 py-1 mb-2">
                        <div class="d-flex flex-grow-1">
                            <h4 class="card-title f-12 font-weight-normal text-dark mr-3 mb-1">
                                <?php switch($history->event_type):
                                    case ("file-added"): ?>
                                        <?php echo e(__(ucfirst($history->event_type))); ?> <?php echo app('translator')->get('app.by'); ?> <span class="text-darkest-grey"><?php echo e($history->user->name); ?></span>
                                        <a href="<?php echo e(route('deals.show', $deal->id) . '?tab=files'); ?>"> <?php echo e(__('modules.client.viewDetails')); ?></a>
                                        <?php break; ?>

                                    <?php case ("proposal-created"): ?>
                                        <?php echo e(__(ucfirst($history->event_type))); ?> <?php echo app('translator')->get('app.by'); ?> <span class="text-darkest-grey"><?php echo e($history->user->name); ?></span>
                                        <a href="<?php echo e(route('deals.show', $deal->id) . '?tab=proposals'); ?>"> <?php echo e(__('modules.client.viewDetails')); ?></a>
                                        <?php break; ?>

                                    <?php case ("note-added"): ?>
                                        <?php echo e(__(ucfirst($history->event_type))); ?> <?php echo app('translator')->get('app.by'); ?> <span class="text-darkest-grey"><?php echo e($history->user->name); ?></span>
                                        <a href="<?php echo e(route('deals.show', $deal->id) . '?tab=notes'); ?>"> <?php echo e(__('modules.client.viewDetails')); ?></a>
                                        <?php break; ?>

                                    <?php case ("followup-created"): ?>
                                        <?php echo e(__(ucfirst($history->event_type))); ?> <?php echo app('translator')->get('app.by'); ?> <span class="text-darkest-grey"><?php echo e($history->user->name); ?></span>
                                        <a href="<?php echo e(route('deals.show', $deal->id) . '?tab=follow-up'); ?>"> <?php echo e(__('modules.client.viewDetails')); ?></a>
                                        <?php break; ?>
                                    <?php case ($history->event_type == "agent-assigned" || $history->event_type == "stage-updated"  || $history->event_type == "deal-updated" || $history->event_type == "pipeline-updated"): ?>
                                       <?php echo e(__(ucfirst($history->event_type))); ?> <?php echo app('translator')->get('app.by'); ?> <span
                                        class="text-darkest-grey"><?php echo e($history->user->name); ?></span><a
                                        href="<?php echo e(route('deals.show', $history->deal_id)); ?>"> <?php echo e(__('modules.client.viewDetails')); ?></a>
                                        <?php break; ?>
                                    <?php case ($history->event_type == "followup-deleted" ): ?>
                                        <?php echo e(__(ucfirst($history->event_type))); ?> <?php echo app('translator')->get('app.by'); ?> <span
                                            class="text-darkest-grey"><?php echo e($history->user->name); ?></span>
                                        <?php break; ?>
                                    <?php case ($history->event_type == "proposal-deleted" ): ?>
                                        <?php echo e(__(ucfirst($history->event_type))); ?> <?php echo app('translator')->get('app.by'); ?> <span
                                            class="text-darkest-grey"><?php echo e($history->user->name); ?></span>
                                        <?php break; ?>
                                    <?php case ($history->event_type == "note-deleted" ): ?>
                                        <?php echo e(__(ucfirst($history->event_type))); ?> <?php echo app('translator')->get('app.by'); ?> <span
                                            class="text-darkest-grey"><?php echo e($history->user->name); ?></span>
                                        <?php break; ?>
                                    <?php case ($history->event_type == "file-deleted" ): ?>
                                        <?php echo e(__(ucfirst($history->event_type))); ?> <?php echo app('translator')->get('app.by'); ?> <span
                                            class="text-darkest-grey"><?php echo e($history->user->name); ?></span>
                                        <?php break; ?>
                                        <?php endswitch; ?>
                                </h4>

                        </div>
                        <div class="card-text f-11 text-lightest text-justify">

                            <span class="f-11 text-lightest">
                                <?php echo e($history->created_at->timezone(company()->timezone)->translatedFormat(company()->date_format .' '. company()->time_format)); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <?php if (isset($component)) { $__componentOriginal269164c77d9d34462c34359c03da6a68 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal269164c77d9d34462c34359c03da6a68 = $attributes; } ?>
<?php $component = App\View\Components\Cards\NoRecord::resolve(['icon' => 'history','message' => __('messages.noRecordFound')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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

    </div>

</div>
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\leads\ajax\history.blade.php ENDPATH**/ ?>