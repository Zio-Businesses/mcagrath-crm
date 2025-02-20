<?php $__empty_1 = true; $__currentLoopData = $dateWiseData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $dateData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <?php
        $currentDate = \Carbon\Carbon::parse($key);
    ?>
    <?php if(isset($dateData['attendance']) && ($dateData['attendance'] == true) && $dateData['leave'] != true): ?>

        <tr>
            <td>
                <div class="media-body">
                    <h5 class="mb-0 f-13"><?php echo e($currentDate->translatedFormat(company()->date_format)); ?>

                    </h5>
                    <p class="mb-0 f-13 text-dark-grey">
                        <label class="badge badge-secondary"><?php echo e($currentDate->translatedFormat('l')); ?></label>
                    </p>
                </div>
            </td>
            <td>
                <span class="badge badge-success"><?php echo app('translator')->get('modules.attendance.present'); ?></span>
            </td>
            <td colspan="2">
                <?php if (isset($component)) { $__componentOriginal7d9f6e0b9001f5841f72577781b2d17f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7d9f6e0b9001f5841f72577781b2d17f = $attributes; } ?>
<?php $component = App\View\Components\Table::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Table::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mb-0 rounded table table-bordered table-hover']); ?>
                    <?php $__currentLoopData = $dateData['attendance']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attendance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td width="50%">
                                <?php echo e($attendance->clock_in_time->timezone(company()->timezone)->translatedFormat(company()->time_format)); ?>


                                <?php if($attendance->late == 'yes'): ?>
                                    <span class="text-dark-grey"><i class="fa fa-exclamation-triangle ml-2"></i>
                                    <?php echo app('translator')->get('modules.attendance.late'); ?></span>
                                <?php endif; ?>

                                <?php if($attendance->half_day == 'yes'): ?>
                                    <span class="text-dark-grey"><i class="fa fa-sign-out-alt ml-2"></i>
                                    <?php echo app('translator')->get('modules.attendance.halfDay'); ?></span>
                                <?php endif; ?>

                                <?php if($attendance->work_from_type != ''): ?>
                                    <?php if($attendance->work_from_type == 'other'): ?>
                                        <i class="fa fa-map-marker-alt ml-2"></i>
                                        <?php echo e($attendance->location); ?> (<?php echo e($attendance->working_from); ?>)
                                    <?php else: ?>
                                        <i class="fa fa-map-marker-alt ml-2"></i>
                                        <?php echo e($attendance->location); ?> (<?php echo e($attendance->work_from_type); ?>)
                                    <?php endif; ?>
                                <?php endif; ?>
                            </td>
                            <td width="50%">
                                <?php if(!is_null($attendance->clock_out_time)): ?>
                                    <?php echo e($attendance->clock_out_time->timezone(company()->timezone)->translatedFormat(company()->time_format)); ?>

                                <?php else: ?> - <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
            </td>
            <td>
                <?php echo e($attendance->totalTime($attendance->clock_in_time, $attendance->clock_in_time, $attendance->user_id)); ?>

            </td>
            <td class="text-right pb-2 pr-20">
                <?php if (isset($component)) { $__componentOriginal5e57c6582b8a883148a28bb7ee46d2ad = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5e57c6582b8a883148a28bb7ee46d2ad = $attributes; } ?>
<?php $component = App\View\Components\Forms\ButtonSecondary::resolve(['icon' => 'search'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-secondary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonSecondary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'view-attendance','data-attendance-id' => ''.e($attendance->aId).'']); ?>
                    <?php echo app('translator')->get('app.details'); ?>
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
            </td>

        </tr>
    <?php else: ?>
        <tr>
            <td>
                <div class="media-body">
                    <h5 class="mb-0 f-13"><?php echo e($currentDate->translatedFormat(company()->date_format)); ?>

                    </h5>
                    <p class="mb-0 f-13 text-dark-grey">
                        <span class="badge badge-secondary"><?php echo e($currentDate->translatedFormat('l')); ?></span>
                    </p>
                </div>
            </td>
            <td>
                <?php if(!$dateData['holiday'] && !$dateData['leave']): ?>
                    <label class="badge badge-danger"><?php echo app('translator')->get('modules.attendance.absent'); ?></label>
                <?php elseif($dateData['leave']): ?>
                    <?php if($dateData['leave']['duration'] == 'half day'): ?>
                        <label class="badge badge-primary"><?php echo app('translator')->get('modules.attendance.leave'); ?></label><br><br>
                        <label class="badge badge-warning"><?php echo app('translator')->get('modules.attendance.halfDay'); ?></label>
                    <?php else: ?>
                        <label class="badge badge-primary"><?php echo app('translator')->get('modules.attendance.leave'); ?></label>
                    <?php endif; ?>
                <?php else: ?>
                    <label class="badge badge-secondary"><?php echo app('translator')->get('modules.attendance.holiday'); ?></label>
                <?php endif; ?>
            </td>
            <?php if(isset($dateData['attendance']) && ($dateData['attendance'] == true)): ?>
                <td colspan="2">
                        <?php if (isset($component)) { $__componentOriginal7d9f6e0b9001f5841f72577781b2d17f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7d9f6e0b9001f5841f72577781b2d17f = $attributes; } ?>
<?php $component = App\View\Components\Table::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Table::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mb-0 rounded table table-bordered table-hover']); ?>
                                <?php $__currentLoopData = $dateData['attendance']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attendance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td width="50%">
                                            <?php echo e($attendance->clock_in_time->timezone(company()->timezone)->translatedFormat(company()->time_format)); ?>


                                            <?php if($attendance->late == 'yes'): ?>
                                                <span class="text-dark-grey"><i class="fa fa-exclamation-triangle ml-2"></i>
                                                <?php echo app('translator')->get('modules.attendance.late'); ?></span>
                                            <?php endif; ?>

                                            <?php if($attendance->half_day == 'yes'): ?>
                                                <span class="text-dark-grey"><i class="fa fa-sign-out-alt ml-2"></i>
                                                <?php echo app('translator')->get('modules.attendance.halfDay'); ?></span>
                                            <?php endif; ?>

                                            <?php if($attendance->work_from_type != ''): ?>
                                                <?php if($attendance->work_from_type == 'other'): ?>
                                                    <i class="fa fa-map-marker-alt ml-2"></i>
                                                    <?php echo e($attendance->location); ?> (<?php echo e($attendance->working_from); ?>)
                                                <?php else: ?>
                                                    <i class="fa fa-map-marker-alt ml-2"></i>
                                                    <?php echo e($attendance->location); ?> (<?php echo e($attendance->work_from_type); ?>)
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </td>
                                        <td width="50%">
                                            <?php if(!is_null($attendance->clock_out_time)): ?>
                                                <?php echo e($attendance->clock_out_time->timezone(company()->timezone)->translatedFormat(company()->time_format)); ?>

                                            <?php else: ?> - <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                </td>
                <td><?php echo e($attendance->totalTime($attendance->clock_in_time, $attendance->clock_in_time, $attendance->user_id)); ?></td>
                <td class="text-right pb-2 pr-20">
                    <?php if (isset($component)) { $__componentOriginal5e57c6582b8a883148a28bb7ee46d2ad = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5e57c6582b8a883148a28bb7ee46d2ad = $attributes; } ?>
<?php $component = App\View\Components\Forms\ButtonSecondary::resolve(['icon' => 'search'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-secondary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonSecondary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'view-attendance','data-attendance-id' => ''.e($attendance->aId).'']); ?>
                        <?php echo app('translator')->get('app.details'); ?>
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
                </td>
            <?php else: ?>
                <td colspan="2">
                    <table width="100%">
                        <tr>
                            <td width="50%">-</td>
                            <td width="50%">-</td>
                        </tr>
                    </table>
                </td>
                <td>-</td>
                <td>-</td>
            <?php endif; ?>
        </tr>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <tr>
        <td colspan="6">
            <?php if (isset($component)) { $__componentOriginal269164c77d9d34462c34359c03da6a68 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal269164c77d9d34462c34359c03da6a68 = $attributes; } ?>
<?php $component = App\View\Components\Cards\NoRecord::resolve(['icon' => 'calendar','message' => __('messages.noRecordFound')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/attendances/ajax/user_attendance.blade.php ENDPATH**/ ?>