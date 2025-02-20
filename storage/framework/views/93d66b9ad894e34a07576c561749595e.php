<div class="row d-flex justify-content-between">
    <div>
        <div class='input-group'>
            <div class="input-group-prepend">
                <button id="week-start-date" data-date="<?php echo e($weekStartDate->copy()->subDay()->toDateString()); ?>" type="button"
                    class="btn btn-outline-secondary border-grey height-35"><i class="fa fa-chevron-left"></i>
                </button>
            </div>

            <input type="text" disabled class="form-control height-35 f-14 bg-white text-center" value="<?php echo e($weekStartDate->translatedFormat('d M') . ' - ' . $weekEndDate->translatedFormat('d M')); ?>">

            <div class="input-group-append">
                <button id="week-end-date" data-date="<?php echo e($weekEndDate->copy()->addDay()->toDateString()); ?>" type="button"
                    class="btn btn-outline-secondary border-grey height-35"><i class="fa fa-chevron-right"></i>
                </button>
            </div>
        </div>

    </div>
    <div class="align-self-center ml-3">
        <?php $__currentLoopData = $employeeShifts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <span class="badge badge-info f-11 p-1" style="background-color: <?php echo e($item->color); ?>">
                <?php echo e($item->shift_short_code); ?> : <?php echo e($item->shift_name); ?></span>
            <?php echo e(!$loop->last ? ' | ' : ''); ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       | <i class="fa fa-star text-primary"></i> : <?php echo app('translator')->get('app.menu.holiday'); ?>
    </div>
</div>


<div class="table-responsive">
    <?php if (isset($component)) { $__componentOriginal7d9f6e0b9001f5841f72577781b2d17f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7d9f6e0b9001f5841f72577781b2d17f = $attributes; } ?>
<?php $component = App\View\Components\Table::resolve(['headType' => 'thead-light'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Table::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'table-bordered mt-3 table-hover']); ?>
         <?php $__env->slot('thead', null, []); ?> 
            <th class="px-2" style="vertical-align: middle;"><?php echo app('translator')->get('app.employee'); ?></th>
            <?php $__currentLoopData = $weekPeriod->toArray(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $date): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <th class="px-1">
                    <div class="d-flex">
                        <div class="f-27 align-self-center mr-2"><?php echo e($date->day); ?></div>
                        <div class="text-lightest f-11 text-uppercase"><?php echo e($date->translatedFormat('l')); ?> <br><?php echo e($date->translatedFormat('M')); ?></div>
                    </div>
                </th>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         <?php $__env->endSlot(); ?>

        <?php $__currentLoopData = $employeeAttendence; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $attendance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $userId = explode('#', $key);
                $userId = $userId[0];
                $count = 1;
            ?>
            <tr>
                <td class="px-1"> <?php echo end($attendance); ?> </td>
                <?php $__currentLoopData = $attendance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key2 => $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($count + 1 <= count($attendance)): ?>
                        <?php
                            $attendanceDate = \Carbon\Carbon::parse($key2);
                        ?>
                        <td class="px-1">
                            <?php if($day == 'Leave'): ?>
                                <div data-toggle="tooltip" class="py-4 badge badge-light f-10 p-1 border border-danger w-100" data-original-title="<?php echo app('translator')->get('modules.attendance.leave'); ?>"><i
                                        class="fa fa-plane-departure text-red mr-2"></i><?php echo e($leaveType[$key2]); ?></div>
                                <?php elseif($day == 'Half Day'): ?>
                                    <?php if($attendanceDate->isFuture()): ?>
                                        <div data-toggle="tooltip" class="py-4 badge badge-warning f-10 p-1 border border-danger w-100" data-original-title="<?php echo app('translator')->get('modules.attendance.halfDay'); ?>"><i
                                            class="fa fa-star-half-alt text-red mr-2"></i><?php echo app('translator')->get('modules.attendance.halfDay'); ?></div>
                                    <?php else: ?>
                                        <a href="javascript:;" class="py-4 change-shift-week w-100" data-user-id="<?php echo e($userId); ?>"
                                                data-attendance-date="<?php echo e($key2); ?>">
                                            <span data-toggle="tooltip" data-original-title="<?php echo app('translator')->get('modules.attendance.halfDay'); ?>"><i
                                                    class="fa fa-star-half-alt text-red mr-2"></i><?php echo app('translator')->get('modules.attendance.halfDay'); ?></span>
                                        </a>
                                    <?php endif; ?>
                                <?php elseif($day == 'EMPTY'): ?>
                                    <button type="button" class="py-4 change-shift-week badge badge-light f-14 p-1 border w-100"  data-user-id="<?php echo e($userId); ?>"
                                        data-attendance-date="<?php echo e($key2); ?>">
                                        <?php if(in_array($manageEmployeeShifts, ['all'])): ?>
                                        <i class="fa fa-plus-circle text-primary"></i>
                                        <?php else: ?>
                                        <i class="fa fa-ban text-red"></i>
                                        <?php endif; ?></button>
                                <?php elseif($day == 'Holiday'): ?>
                                <div data-toggle="tooltip" class=" py-4 badge badge-light f-10 p-1 border border-primary w-100"
                                    data-original-title="<?php echo app('translator')->get('modules.attendance.holiday'); ?>"> <i class="fa fa-star text-primary"></i>
                                    <?php echo e($holidayOccasions[$key2]); ?></div>
                            <?php else: ?>
                                <?php echo $day; ?>

                            <?php endif; ?>
                        </td>
                    <?php endif; ?>
                    <?php
                        $count++;
                    ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
</div>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/shift-rosters/ajax/week_summary_data.blade.php ENDPATH**/ ?>