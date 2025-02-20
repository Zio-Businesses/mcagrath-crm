<?php
$editAttendancePermission = user()->permission('add_attendance');
$deleteAttendancePermission = user()->permission('delete_attendance');
?>
<div class="modal-header">
    <h5 class="modal-title" id="modelHeading">
        <?php if($type == 'edit'): ?>
            <?php echo app('translator')->get('app.attendanceDetails'); ?>
        <?php else: ?>
        <?php echo app('translator')->get('modules.attendance.markAttendance'); ?>
        <?php endif; ?>
    </h5>
    <button type="button"  class="close" data-dismiss="modal" aria-label="Close"><span
        aria-hidden="true">×</span></button>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-md-12 mb-4">
                <?php if (isset($component)) { $__componentOriginal9a71dc76dd25d4db3618f7b2896e958f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9a71dc76dd25d4db3618f7b2896e958f = $attributes; } ?>
<?php $component = App\View\Components\Employee::resolve(['user' => $attendanceUser] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('employee'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Employee::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9a71dc76dd25d4db3618f7b2896e958f)): ?>
<?php $attributes = $__attributesOriginal9a71dc76dd25d4db3618f7b2896e958f; ?>
<?php unset($__attributesOriginal9a71dc76dd25d4db3618f7b2896e958f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9a71dc76dd25d4db3618f7b2896e958f)): ?>
<?php $component = $__componentOriginal9a71dc76dd25d4db3618f7b2896e958f; ?>
<?php unset($__componentOriginal9a71dc76dd25d4db3618f7b2896e958f); ?>
<?php endif; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h5 class="f-w-500 f-15 d-flex justify-content-between"><?php echo e(__('app.date').' - '.\Carbon\Carbon::parse($date)->translatedFormat(company()->date_format)); ?>

                    <?php if($attendanceSettings->shift_name != 'Day Off'): ?>
                    <span class="badge badge-info ml-2" style="background-color: <?php echo e($attendanceSettings->color); ?>"><?php echo e($attendanceSettings->shift_name); ?></span>
                    <?php else: ?>
                    <span class="badge badge-secondary ml-2"><?php echo e(__('modules.attendance.' . str($attendanceSettings->shift_name)->camel())); ?></span>
                <?php endif; ?>
            </h5>

            <?php if($total_clock_in < $maxAttendanceInDay || $type == 'edit'): ?>
                <?php if (isset($component)) { $__componentOriginal18ad2e0d264f9740dc73fff715357c28 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal18ad2e0d264f9740dc73fff715357c28 = $attributes; } ?>
<?php $component = App\View\Components\Form::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Form::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'attendance-container']); ?>
                    <input type="hidden" name="attendance_date" value="<?php echo e($date); ?>">
                    <input type="hidden" name="user_id" value="<?php echo e($userid); ?>">
                    <?php if($type == 'edit'): ?>
                        <?php echo method_field('PUT'); ?>
                    <?php endif; ?>

                    <div class="row">

                        <div class="col-lg-4 col-md-6">
                            <div class="bootstrap-timepicker timepicker">
                                <?php if (isset($component)) { $__componentOriginal4e45e801405ab67097982370a6a83cba = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4e45e801405ab67097982370a6a83cba = $attributes; } ?>
<?php $component = App\View\Components\Forms\Text::resolve(['fieldLabel' => __('modules.attendance.clock_in'),'fieldPlaceholder' => __('placeholders.hours'),'fieldName' => 'clock_in_time','fieldId' => 'clock-in-time','fieldRequired' => 'true','fieldValue' => (!is_null($row->clock_in_time)) ? \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $row->clock_in_time)->timezone(company()->timezone)->translatedFormat(company()->time_format) : ''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Text::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'a-timepicker']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4e45e801405ab67097982370a6a83cba)): ?>
<?php $attributes = $__attributesOriginal4e45e801405ab67097982370a6a83cba; ?>
<?php unset($__attributesOriginal4e45e801405ab67097982370a6a83cba); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4e45e801405ab67097982370a6a83cba)): ?>
<?php $component = $__componentOriginal4e45e801405ab67097982370a6a83cba; ?>
<?php unset($__componentOriginal4e45e801405ab67097982370a6a83cba); ?>
<?php endif; ?>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <?php if (isset($component)) { $__componentOriginal4e45e801405ab67097982370a6a83cba = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4e45e801405ab67097982370a6a83cba = $attributes; } ?>
<?php $component = App\View\Components\Forms\Text::resolve(['fieldLabel' => __('modules.attendance.clock_in_ip'),'fieldPlaceholder' => __('placeholders.hours'),'fieldName' => 'clock_in_ip','fieldId' => 'clock-in-ip','fieldValue' => $row->clock_in_ip ?? request()->ip()] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Text::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'a-timepicker']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4e45e801405ab67097982370a6a83cba)): ?>
<?php $attributes = $__attributesOriginal4e45e801405ab67097982370a6a83cba; ?>
<?php unset($__attributesOriginal4e45e801405ab67097982370a6a83cba); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4e45e801405ab67097982370a6a83cba)): ?>
<?php $component = $__componentOriginal4e45e801405ab67097982370a6a83cba; ?>
<?php unset($__componentOriginal4e45e801405ab67097982370a6a83cba); ?>
<?php endif; ?>
                        </div>

                        <?php if($row->total_clock_in == 0): ?>
                            <div class="col-lg-4 col-md-6">
                                <?php if (isset($component)) { $__componentOriginal32ac71f8f6fe4764d54a65ca726f9ffc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal32ac71f8f6fe4764d54a65ca726f9ffc = $attributes; } ?>
<?php $component = App\View\Components\Forms\ToggleSwitch::resolve(['checked' => ($row->late == 'yes'),'fieldLabel' => __('modules.attendance.late'),'fieldName' => 'late','fieldId' => 'lateday'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.toggle-switch'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ToggleSwitch::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-0 mr-lg-2 mr-md-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal32ac71f8f6fe4764d54a65ca726f9ffc)): ?>
<?php $attributes = $__attributesOriginal32ac71f8f6fe4764d54a65ca726f9ffc; ?>
<?php unset($__attributesOriginal32ac71f8f6fe4764d54a65ca726f9ffc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal32ac71f8f6fe4764d54a65ca726f9ffc)): ?>
<?php $component = $__componentOriginal32ac71f8f6fe4764d54a65ca726f9ffc; ?>
<?php unset($__componentOriginal32ac71f8f6fe4764d54a65ca726f9ffc); ?>
<?php endif; ?>
                            </div>
                        <?php elseif($row->late == 'yes'): ?>
                            <div class="col-lg-2 col-md-6 mt-5">
                                <span class="badge badge-secondary"><?php echo app('translator')->get('modules.attendance.late'); ?></span>
                            </div>
                        <?php endif; ?>

                    </div>

                    <div class="row">

                        <div class="col-lg-4 col-md-6">
                            <div class="bootstrap-timepicker timepicker">
                                <?php if (isset($component)) { $__componentOriginal4e45e801405ab67097982370a6a83cba = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4e45e801405ab67097982370a6a83cba = $attributes; } ?>
<?php $component = App\View\Components\Forms\Text::resolve(['fieldLabel' => __('modules.attendance.clock_out'),'fieldPlaceholder' => __('placeholders.hours'),'fieldName' => 'clock_out_time','fieldId' => 'clock-out','fieldValue' => (!is_null($row->clock_out_time)) ? \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $row->clock_out_time)->timezone(company()->timezone)->translatedFormat(company()->time_format) : ''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Text::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4e45e801405ab67097982370a6a83cba)): ?>
<?php $attributes = $__attributesOriginal4e45e801405ab67097982370a6a83cba; ?>
<?php unset($__attributesOriginal4e45e801405ab67097982370a6a83cba); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4e45e801405ab67097982370a6a83cba)): ?>
<?php $component = $__componentOriginal4e45e801405ab67097982370a6a83cba; ?>
<?php unset($__componentOriginal4e45e801405ab67097982370a6a83cba); ?>
<?php endif; ?>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4">
                            <?php if (isset($component)) { $__componentOriginal4e45e801405ab67097982370a6a83cba = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4e45e801405ab67097982370a6a83cba = $attributes; } ?>
<?php $component = App\View\Components\Forms\Text::resolve(['fieldLabel' => __('modules.attendance.clock_out_ip'),'fieldPlaceholder' => __('placeholders.hours'),'fieldName' => 'clock_out_ip','fieldId' => 'clock-out-ip-'.$row->id,'fieldValue' => $row->clock_out_ip ?? request()->ip()] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Text::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4e45e801405ab67097982370a6a83cba)): ?>
<?php $attributes = $__attributesOriginal4e45e801405ab67097982370a6a83cba; ?>
<?php unset($__attributesOriginal4e45e801405ab67097982370a6a83cba); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4e45e801405ab67097982370a6a83cba)): ?>
<?php $component = $__componentOriginal4e45e801405ab67097982370a6a83cba; ?>
<?php unset($__componentOriginal4e45e801405ab67097982370a6a83cba); ?>
<?php endif; ?>
                        </div>

                        <?php if($row->total_clock_in == 0): ?>
                            <div class="col-lg-2 col-md-6">
                                <?php if (isset($component)) { $__componentOriginal32ac71f8f6fe4764d54a65ca726f9ffc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal32ac71f8f6fe4764d54a65ca726f9ffc = $attributes; } ?>
<?php $component = App\View\Components\Forms\ToggleSwitch::resolve(['checked' => ($row->half_day == 'yes'),'fieldLabel' => __('modules.attendance.halfDay'),'fieldName' => 'halfday','fieldId' => 'halfday'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.toggle-switch'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ToggleSwitch::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-0 mr-lg-2 mr-md-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal32ac71f8f6fe4764d54a65ca726f9ffc)): ?>
<?php $attributes = $__attributesOriginal32ac71f8f6fe4764d54a65ca726f9ffc; ?>
<?php unset($__attributesOriginal32ac71f8f6fe4764d54a65ca726f9ffc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal32ac71f8f6fe4764d54a65ca726f9ffc)): ?>
<?php $component = $__componentOriginal32ac71f8f6fe4764d54a65ca726f9ffc; ?>
<?php unset($__componentOriginal32ac71f8f6fe4764d54a65ca726f9ffc); ?>
<?php endif; ?>
                            </div>
                        <?php elseif($row->half_day == 'yes'): ?>
                            <div class="col-lg-2 col-md-6 mt-5">
                                <span class="badge badge-secondary"><?php echo app('translator')->get('app.halfday'); ?></span>
                            </div>
                        <?php endif; ?>

                    </div>

                    <div class="row">

                        <div class="col-lg-4 col-md-6">
                            <?php if (isset($component)) { $__componentOriginal67cd5dc9866c6185ad92d933c387fa86 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal67cd5dc9866c6185ad92d933c387fa86 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Select::resolve(['fieldId' => 'location','fieldLabel' => __('app.location'),'fieldName' => 'location','search' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Select::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                <?php $__currentLoopData = $location; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locations): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php if(($row->location_id == $locations->id) || (is_null($row->location_id) && $locations->is_default == 1)): ?> selected <?php endif; ?> value="<?php echo e($locations->id); ?>">
                                        <?php echo e($locations->location); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal67cd5dc9866c6185ad92d933c387fa86)): ?>
<?php $attributes = $__attributesOriginal67cd5dc9866c6185ad92d933c387fa86; ?>
<?php unset($__attributesOriginal67cd5dc9866c6185ad92d933c387fa86); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal67cd5dc9866c6185ad92d933c387fa86)): ?>
<?php $component = $__componentOriginal67cd5dc9866c6185ad92d933c387fa86; ?>
<?php unset($__componentOriginal67cd5dc9866c6185ad92d933c387fa86); ?>
<?php endif; ?>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <?php if (isset($component)) { $__componentOriginal67cd5dc9866c6185ad92d933c387fa86 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal67cd5dc9866c6185ad92d933c387fa86 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Select::resolve(['fieldId' => 'work_from_type','fieldLabel' => __('modules.attendance.working_from'),'fieldName' => 'work_from_type','fieldRequired' => 'true','search' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Select::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                <option <?php if($row->work_from_type == 'office'): ?> selected <?php endif; ?> value="office"><?php echo app('translator')->get('modules.attendance.office'); ?></option>
                                <option <?php if($row->work_from_type == 'home'): ?> selected <?php endif; ?> value="home"><?php echo app('translator')->get('modules.attendance.home'); ?></option>
                                <option <?php if($row->work_from_type == 'other'): ?> selected <?php endif; ?> value="other"><?php echo app('translator')->get('modules.attendance.other'); ?></option>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal67cd5dc9866c6185ad92d933c387fa86)): ?>
<?php $attributes = $__attributesOriginal67cd5dc9866c6185ad92d933c387fa86; ?>
<?php unset($__attributesOriginal67cd5dc9866c6185ad92d933c387fa86); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal67cd5dc9866c6185ad92d933c387fa86)): ?>
<?php $component = $__componentOriginal67cd5dc9866c6185ad92d933c387fa86; ?>
<?php unset($__componentOriginal67cd5dc9866c6185ad92d933c387fa86); ?>
<?php endif; ?>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-lg-4 col-md-6"  id="otherPlace" <?php if($row->work_from_type != 'other'): ?> style="display:none" <?php endif; ?> >
                            <?php if (isset($component)) { $__componentOriginal4e45e801405ab67097982370a6a83cba = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4e45e801405ab67097982370a6a83cba = $attributes; } ?>
<?php $component = App\View\Components\Forms\Text::resolve(['fieldId' => 'working_from','fieldLabel' => __('modules.attendance.otherPlace'),'fieldName' => 'working_from','fieldRequired' => 'true','fieldValue' => $row->working_from] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Text::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4e45e801405ab67097982370a6a83cba)): ?>
<?php $attributes = $__attributesOriginal4e45e801405ab67097982370a6a83cba; ?>
<?php unset($__attributesOriginal4e45e801405ab67097982370a6a83cba); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4e45e801405ab67097982370a6a83cba)): ?>
<?php $component = $__componentOriginal4e45e801405ab67097982370a6a83cba; ?>
<?php unset($__componentOriginal4e45e801405ab67097982370a6a83cba); ?>
<?php endif; ?>
                        </div>
                    </div>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal18ad2e0d264f9740dc73fff715357c28)): ?>
<?php $attributes = $__attributesOriginal18ad2e0d264f9740dc73fff715357c28; ?>
<?php unset($__attributesOriginal18ad2e0d264f9740dc73fff715357c28); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal18ad2e0d264f9740dc73fff715357c28)): ?>
<?php $component = $__componentOriginal18ad2e0d264f9740dc73fff715357c28; ?>
<?php unset($__componentOriginal18ad2e0d264f9740dc73fff715357c28); ?>
<?php endif; ?>
            <?php elseif($attendanceSettings->shift_name == 'Day Off'): ?>
                <div class="alert alert-info mt-3"><?php echo app('translator')->get('modules.attendance.dayOff'); ?></div>
            <?php else: ?>
                <div class="alert alert-info mt-3"><?php echo app('translator')->get('modules.attendance.maxClockin'); ?></div>
            <?php endif; ?>
        </div>
    </div>
</div>
<div class="modal-footer">
    <?php if (isset($component)) { $__componentOriginalc35c79ed7e812580313ad04118477974 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc35c79ed7e812580313ad04118477974 = $attributes; } ?>
<?php $component = App\View\Components\Forms\ButtonCancel::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-cancel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonCancel::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['data-dismiss' => 'modal','class' => 'border-0 mr-3']); ?><?php echo app('translator')->get('app.close'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc35c79ed7e812580313ad04118477974)): ?>
<?php $attributes = $__attributesOriginalc35c79ed7e812580313ad04118477974; ?>
<?php unset($__attributesOriginalc35c79ed7e812580313ad04118477974); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc35c79ed7e812580313ad04118477974)): ?>
<?php $component = $__componentOriginalc35c79ed7e812580313ad04118477974; ?>
<?php unset($__componentOriginalc35c79ed7e812580313ad04118477974); ?>
<?php endif; ?>

    <?php if (isset($component)) { $__componentOriginalcf8d12533ff890e0d6573daf32b7618d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcf8d12533ff890e0d6573daf32b7618d = $attributes; } ?>
<?php $component = App\View\Components\Forms\ButtonPrimary::resolve(['icon' => 'check'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'save-attendance']); ?><?php echo app('translator')->get('app.save'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcf8d12533ff890e0d6573daf32b7618d)): ?>
<?php $attributes = $__attributesOriginalcf8d12533ff890e0d6573daf32b7618d; ?>
<?php unset($__attributesOriginalcf8d12533ff890e0d6573daf32b7618d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcf8d12533ff890e0d6573daf32b7618d)): ?>
<?php $component = $__componentOriginalcf8d12533ff890e0d6573daf32b7618d; ?>
<?php unset($__componentOriginalcf8d12533ff890e0d6573daf32b7618d); ?>
<?php endif; ?>
</div>
<script>
    $('.select-picker').selectpicker();

    $(document).ready(function() {

        $('#clock-in-time').timepicker({
            <?php if(company()->time_format == 'H:i'): ?>
            showMeridian: false,
            <?php endif; ?>
            minuteStep: 1
        });
        $('#clock-out').timepicker({
            <?php if(company()->time_format == 'H:i'): ?>
            showMeridian: false,
            <?php endif; ?>
            minuteStep: 1,
            defaultTime: false
        });

        $('#work_from_type').change(function(){
            ($(this).val() == 'other') ? $('#otherPlace').show() : $('#otherPlace').hide();
        });

        const saveAttendanceForm = (url) => {
            $.easyAjax({
                url: url,
                type: "POST",
                container: '#attendance-container',
                blockUI: true,
                disableButton: true,
                buttonSelector: "#save-attendance",
                data: $('#attendance-container').serialize(),
                data: $('#attendance-container').serialize(),
                success: function (response) {
                    if(response.status == 'success'){
                        showTable();
                        $("[data-dismiss=modal]").trigger({ type: "click" });

                    }
                }
            })
        }

        $('#save-attendance').click(function () {
            <?php if($type == 'edit'): ?>
                var url = "<?php echo e(route('attendances.update', $row->id)); ?>";
                saveAttendanceForm(url);
            <?php else: ?>
                var url = "<?php echo e(route('attendances.check_half_day')); ?>";
                $.easyAjax({
                    url: url,
                    type: "POST",
                    container: '#attendance-container',
                    blockUI: true,
                    disableButton: true,
                    buttonSelector: "#save-attendance",
                    data: $('#attendance-container').serialize(),
                    success: function (response) {
                        url = "<?php echo e(route('attendances.store')); ?>";
                        if (response.halfDayExist == true && response.requestedHalfDay == 'no') {
                            Swal.fire({
                                title: "<?php echo app('translator')->get('messages.sweetAlertTitle'); ?>",
                                text: "<?php echo app('translator')->get('messages.halfDayAlreadyApplied'); ?>",
                                icon: 'warning',
                                showCancelButton: true,
                                focusConfirm: false,
                                confirmButtonText: "<?php echo app('translator')->get('messages.rejectIt'); ?>",
                                cancelButtonText: "<?php echo app('translator')->get('app.cancel'); ?>",
                                customClass: {
                                    confirmButton: 'btn btn-primary mr-3',
                                    cancelButton: 'btn btn-secondary'
                                },
                                showClass: {
                                    popup: 'swal2-noanimation',
                                    backdrop: 'swal2-noanimation'
                                },
                                buttonsStyling: false
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    saveAttendanceForm(url);
                                }
                            });

                        } else if (response.fullDayExist == true && response.requestedFullDay == 'no') {
                            Swal.fire({
                                title: "<?php echo app('translator')->get('messages.sweetAlertTitle'); ?>",
                                text: "<?php echo app('translator')->get('messages.fullDayAlreadyApplied'); ?>",
                                icon: 'warning',
                                showCancelButton: true,
                                focusConfirm: false,
                                confirmButtonText: "<?php echo app('translator')->get('messages.rejectIt'); ?>",
                                cancelButtonText: "<?php echo app('translator')->get('app.cancel'); ?>",
                                customClass: {
                                    confirmButton: 'btn btn-primary mr-3',
                                    cancelButton: 'btn btn-secondary'
                                },
                                showClass: {
                                    popup: 'swal2-noanimation',
                                    backdrop: 'swal2-noanimation'
                                },
                                buttonsStyling: false
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    saveAttendanceForm();
                                }
                            });
                        }else {
                            saveAttendanceForm(url);
                        }
                    }
                });
            <?php endif; ?>
        });
    });


</script>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/attendances/ajax/edit.blade.php ENDPATH**/ ?>