<div class="d-flex justify-content-between">
    <div class="flex-lg-shrink-0">
        <div class="row">
            <div class="select-status col">
                <select class="form-control select-picker" name="year" id="change-year" data-size="8">
                    <?php for($i = $year+1; $i >= $year - 4; $i--): ?>
                        <option <?php if($i == $year): ?> selected <?php endif; ?> value="<?php echo e($i); ?>">
                            <?php echo e($i); ?></option>
                    <?php endfor; ?>
                </select>
            </div>
            <div class="select-status col d-lg-none">
                <select class="form-control select-picker" name="month" id="change-month" data-live-search="true" data-size="8">
                    <?php if (isset($component)) { $__componentOriginale03e4d0d228cecaad6e3eba51d05c63f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale03e4d0d228cecaad6e3eba51d05c63f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.months','data' => ['selectedMonth' => $month,'fieldRequired' => 'true']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.months'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['selectedMonth' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($month),'fieldRequired' => 'true']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale03e4d0d228cecaad6e3eba51d05c63f)): ?>
<?php $attributes = $__attributesOriginale03e4d0d228cecaad6e3eba51d05c63f; ?>
<?php unset($__attributesOriginale03e4d0d228cecaad6e3eba51d05c63f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale03e4d0d228cecaad6e3eba51d05c63f)): ?>
<?php $component = $__componentOriginale03e4d0d228cecaad6e3eba51d05c63f; ?>
<?php unset($__componentOriginale03e4d0d228cecaad6e3eba51d05c63f); ?>
<?php endif; ?>
                </select>
            </div>

            <?php $__currentLoopData = \App\Models\GlobalSetting::getMonthsOfYear('M'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$monthOfYear): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <button class="f-12 p-2 px-3 bg-white col change-month d-none d-lg-block <?php echo e($month == $key+1 ? 'btn-primary rounded' : ''); ?>" type="button" data-month="<?php echo e($key+1); ?>"><?php echo e($monthOfYear); ?></button>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
            <?php for($i = 1; $i <= $daysInMonth; $i++): ?>
                <th class="px-1"><?php echo e($i); ?> <br> <span class="text-lightest f-11 text-uppercase"><?php echo e($weekMap[\Carbon\Carbon::parse(\Carbon\Carbon::parse($i . '-' . $month . '-' . $year))->dayOfWeek]); ?></span></th>
            <?php endfor; ?>
         <?php $__env->endSlot(); ?>

        <?php $__currentLoopData = $employeeAttendence; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $attendance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $userId = explode('#', $key);
                $userId = $userId[0];
            ?>
            <tr>
                <td class="w-30 px-2"> <?php echo end($attendance); ?> </td>
                <?php $__currentLoopData = $attendance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key2 => $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($key2 + 1 <= count($attendance)): ?>
                        <?php
                            $attendanceDate = \Carbon\Carbon::parse($year.'-'.$month.'-'.$key2);
                        ?>
                        <td class="px-1">
                            <?php if($day == 'Leave'): ?>
                            <span data-toggle="tooltip" data-original-title="<?php echo app('translator')->get('modules.attendance.leave'); ?>"><i
                                    class="fa fa-plane-departure text-red"></i></span>
                        <?php elseif($day == 'Half Day'): ?>
                            <?php if($attendanceDate->isFuture()): ?>
                                <span data-toggle="tooltip" data-original-title="<?php echo app('translator')->get('modules.attendance.halfDay'); ?>"><i
                                    class="fa fa-star-half-alt text-red"></i></span>
                            <?php else: ?>
                                <a href="javascript:;" class="change-shift" data-user-id="<?php echo e($userId); ?>"
                                        data-attendance-date="<?php echo e($key2); ?>">
                                    <span data-toggle="tooltip" data-original-title="<?php echo app('translator')->get('modules.attendance.halfDay'); ?>"><i
                                            class="fa fa-star-half-alt text-red"></i></span>
                                </a>
                            <?php endif; ?>
                            <?php elseif($day == 'EMPTY'): ?>
                                <button type="button" class="change-shift badge badge-light f-10 p-1 border"  data-user-id="<?php echo e($userId); ?>"
                                    data-attendance-date="<?php echo e($key2); ?>">
                                    <?php if(in_array($manageEmployeeShifts, ['all'])): ?>
                                    <i class="fa fa-plus"></i>
                                    <?php else: ?>
                                    <i class="fa fa-ban"></i>
                                    <?php endif; ?>
                                </button>
                            <?php elseif($day == 'Holiday'): ?>
                                <a href="javascript:;" data-toggle="tooltip" class="change-shift"
                                    data-original-title="<?php echo e($holidayOccasions[$key2]); ?>"
                                    data-user-id="<?php echo e($userId); ?>" data-attendance-date="<?php echo e($key2); ?>"><i
                                        class="fa fa-star text-primary"></i></a>
                            <?php else: ?>
                                <?php echo $day; ?>

                            <?php endif; ?>
                        </td>
                    <?php endif; ?>
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
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/shift-rosters/ajax/summary_data.blade.php ENDPATH**/ ?>