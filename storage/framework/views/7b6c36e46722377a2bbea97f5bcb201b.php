<div class="col-lg-12 col-md-12 ntfcn-tab-content-left w-100 p-4 ">
    <?php echo method_field('PUT'); ?>
    <div class="row">

        <div class="col-lg-12">
            <div class="row mt-3">

                <div class="col-lg-12 mb-2">
                    <?php if (isset($component)) { $__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Checkbox::resolve(['fieldLabel' => __('modules.attendance.allowShiftChange'),'fieldName' => 'allow_shift_change','fieldId' => 'allow_shift_change','fieldValue' => 'yes','checked' => $attendanceSetting->allow_shift_change] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Checkbox::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['fieldRequired' => 'true']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3)): ?>
<?php $attributes = $__attributesOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3; ?>
<?php unset($__attributesOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3)): ?>
<?php $component = $__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3; ?>
<?php unset($__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3); ?>
<?php endif; ?>
                </div>

                <div class="col-lg-12 mb-2">
                    <?php if (isset($component)) { $__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Checkbox::resolve(['fieldLabel' => __('modules.attendance.saveCurrentLocation'),'fieldName' => 'save_current_location','fieldId' => 'save_current_location','fieldValue' => 'yes','checked' => $attendanceSetting->save_current_location] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Checkbox::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['fieldRequired' => 'true']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3)): ?>
<?php $attributes = $__attributesOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3; ?>
<?php unset($__attributesOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3)): ?>
<?php $component = $__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3; ?>
<?php unset($__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3); ?>
<?php endif; ?>
                </div>

                <div class="col-lg-12 mb-2">
                    <?php if (isset($component)) { $__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Checkbox::resolve(['fieldLabel' => __('modules.attendance.allowSelfClock'),'fieldName' => 'employee_clock_in_out','fieldId' => 'employee_clock_in_out','fieldValue' => 'yes','checked' => $attendanceSetting->employee_clock_in_out == 'yes'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Checkbox::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['fieldRequired' => 'true']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3)): ?>
<?php $attributes = $__attributesOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3; ?>
<?php unset($__attributesOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3)): ?>
<?php $component = $__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3; ?>
<?php unset($__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3); ?>
<?php endif; ?>
                </div>

                <div class="col-lg-12 mb-2">
                    <?php if (isset($component)) { $__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Checkbox::resolve(['fieldLabel' => __('modules.attendance.autoClockIn'),'fieldName' => 'auto_clock_in','fieldId' => 'auto_clock_in','fieldValue' => 'yes','checked' => $attendanceSetting->auto_clock_in == 'yes'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Checkbox::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3)): ?>
<?php $attributes = $__attributesOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3; ?>
<?php unset($__attributesOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3)): ?>
<?php $component = $__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3; ?>
<?php unset($__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3); ?>
<?php endif; ?>
                </div>

                <div class="col-lg-4 auto_clock_in_location mb-3 <?php if($attendanceSetting->auto_clock_in == 'no'): ?> d-none <?php endif; ?>">
                    <?php if (isset($component)) { $__componentOriginal67cd5dc9866c6185ad92d933c387fa86 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal67cd5dc9866c6185ad92d933c387fa86 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Select::resolve(['fieldLabel' => __('modules.attendance.autoClockInDefualtLocation'),'fieldName' => 'auto_clock_in_location','fieldId' => 'auto_clock_in_location','fieldRequired' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Select::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                    <option value="office" <?php echo e($attendanceSetting->auto_clock_in_location == 'office' ? 'selected' : ''); ?>>
                        <?php echo app('translator')->get('modules.attendance.office'); ?></option>
                    <option value="home" <?php echo e($attendanceSetting->auto_clock_in_location == 'home' ? 'selected' : ''); ?>>
                        <?php echo app('translator')->get('modules.attendance.home'); ?></option>
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

                <div class="col-lg-12 mb-2">
                    <?php if (isset($component)) { $__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Checkbox::resolve(['fieldLabel' => __('modules.attendance.checkForRadius'),'fieldName' => 'radius_check','fieldId' => 'radius_check','fieldValue' => 'yes','checked' => $attendanceSetting->radius_check == 'yes'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Checkbox::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['fieldRequired' => 'true']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3)): ?>
<?php $attributes = $__attributesOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3; ?>
<?php unset($__attributesOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3)): ?>
<?php $component = $__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3; ?>
<?php unset($__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3); ?>
<?php endif; ?>
                </div>

                <div class="col-lg-12 <?php if($attendanceSetting->radius_check == 'no'): ?> d-none <?php endif; ?> " id="radiusBox">
                    <?php if (isset($component)) { $__componentOriginal1fded940a0a5d34bf1b88a1f45916593 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1fded940a0a5d34bf1b88a1f45916593 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Number::resolve(['fieldLabel' => __('modules.attendance.radius'),'fieldName' => 'radius','fieldId' => 'radius','fieldValue' => $attendanceSetting->radius] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.number'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Number::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-0 mr-lg-2 mr-md-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1fded940a0a5d34bf1b88a1f45916593)): ?>
<?php $attributes = $__attributesOriginal1fded940a0a5d34bf1b88a1f45916593; ?>
<?php unset($__attributesOriginal1fded940a0a5d34bf1b88a1f45916593); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1fded940a0a5d34bf1b88a1f45916593)): ?>
<?php $component = $__componentOriginal1fded940a0a5d34bf1b88a1f45916593; ?>
<?php unset($__componentOriginal1fded940a0a5d34bf1b88a1f45916593); ?>
<?php endif; ?>
                </div>


                <div class="col-lg-12 mb-2">
                    <?php if (isset($component)) { $__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Checkbox::resolve(['fieldLabel' => __('modules.attendance.showClockIn'),'fieldName' => 'show_clock_in_button','fieldId' => 'show_clock_in_button','fieldValue' => 'yes','checked' => ($attendanceSetting->show_clock_in_button == 'yes')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Checkbox::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['fieldRequired' => 'flase']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3)): ?>
<?php $attributes = $__attributesOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3; ?>
<?php unset($__attributesOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3)): ?>
<?php $component = $__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3; ?>
<?php unset($__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3); ?>
<?php endif; ?>
                </div>

                <div class="col-lg-12 mb-1">
                    <?php if (isset($component)) { $__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Checkbox::resolve(['fieldLabel' => __('modules.attendance.checkForIp'),'fieldName' => 'ip_check','fieldId' => 'ip_check','fieldValue' => 'yes','checked' => $attendanceSetting->ip_check == 'yes'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Checkbox::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['fieldRequired' => 'true']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3)): ?>
<?php $attributes = $__attributesOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3; ?>
<?php unset($__attributesOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3)): ?>
<?php $component = $__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3; ?>
<?php unset($__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3); ?>
<?php endif; ?>
                </div>

                <div class="col-lg-12 <?php if($attendanceSetting->ip_check == 'no'): ?> d-none <?php endif; ?> " id="ipBox">
                    <div id="addMoreBox1" class="row">
                        <?php $__empty_1 = true; $__currentLoopData = $ipAddresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $ipAddress): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="col-md-5">
                                <div class="form-group" id="occasionBox">
                                    <input class="form-control height-35 f-14" type="text" value="<?php echo e($ipAddress); ?>"
                                        name="ip[<?php echo e($index); ?>]"
                                        placeholder="<?php echo e(__('modules.attendance.ipAddress')); ?>" />
                                    <div id="errorOccasion"></div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="col-md-5">
                                <div class="form-group" id="occasionBox">
                                    <?php if (isset($component)) { $__componentOriginal4e45e801405ab67097982370a6a83cba = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4e45e801405ab67097982370a6a83cba = $attributes; } ?>
<?php $component = App\View\Components\Forms\Text::resolve(['fieldLabel' => '','fieldPlaceholder' => __('modules.attendance.ipAddress'),'fieldName' => 'ip[0]','fieldId' => 'ip[0]'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                                    <div id="errorOccasion"></div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="col-md-1"></div>
                    </div>
                    <div id="insertBefore"></div>
                    <div class="clearfix"></div>
                    <a href="javascript:;" id="plusButton" class="text-capitalize"><i class="f-12 mr-2 fa fa-plus"></i>
                        <?php echo app('translator')->get('modules.addIpAddress'); ?> </a>
                </div>

                <div class="col-lg-12 mb-1">
                    <?php if (isset($component)) { $__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Checkbox::resolve(['fieldLabel' => __('modules.attendance.sendMonthlyReport'),'fieldName' => 'monthly_report','fieldId' => 'monthly_report','fieldValue' => '1','checked' => $attendanceSetting->monthly_report] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Checkbox::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['fieldRequired' => 'true']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3)): ?>
<?php $attributes = $__attributesOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3; ?>
<?php unset($__attributesOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3)): ?>
<?php $component = $__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3; ?>
<?php unset($__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3); ?>
<?php endif; ?>
                </div>

                <div class="col-lg-12 <?php if($attendanceSetting->monthly_report == 0): ?> d-none <?php endif; ?> " id="monthly-report-roles">
                    <?php if (isset($component)) { $__componentOriginal67cd5dc9866c6185ad92d933c387fa86 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal67cd5dc9866c6185ad92d933c387fa86 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Select::resolve(['fieldLabel' => __('modules.attendance.chooseRoleReport'),'fieldName' => 'monthly_report_roles[]','fieldId' => 'monthly_report_roles','fieldRequired' => 'true','multiple' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Select::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option
                            <?php if(is_array($monthlyReportRoles) && in_array($item->id, $monthlyReportRoles)): ?>
                                selected
                            <?php endif; ?>
                            value="<?php echo e($item->id); ?>"><?php echo e($item->display_name); ?></option>
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

            </div>
        </div>

        <div class="col-lg-4">
            <?php if (isset($component)) { $__componentOriginal0b46ebf407ed25593d54e408756d6c13 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0b46ebf407ed25593d54e408756d6c13 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.weeks','data' => ['type' => 'select','fieldLabel' => __('modules.attendance.weekStartFrom'),'fieldName' => 'week_start_from','fieldId' => 'week_start_from','fieldRequired' => 'true','selectedWeek' => $attendanceSetting->week_start_from]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.weeks'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'select','fieldLabel' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('modules.attendance.weekStartFrom')),'fieldName' => 'week_start_from','fieldId' => 'week_start_from','fieldRequired' => 'true','selectedWeek' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attendanceSetting->week_start_from)]); ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0b46ebf407ed25593d54e408756d6c13)): ?>
<?php $attributes = $__attributesOriginal0b46ebf407ed25593d54e408756d6c13; ?>
<?php unset($__attributesOriginal0b46ebf407ed25593d54e408756d6c13); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0b46ebf407ed25593d54e408756d6c13)): ?>
<?php $component = $__componentOriginal0b46ebf407ed25593d54e408756d6c13; ?>
<?php unset($__componentOriginal0b46ebf407ed25593d54e408756d6c13); ?>
<?php endif; ?>
        </div>


        <div class="col-lg-4">
            <?php if (isset($component)) { $__componentOriginal32ac71f8f6fe4764d54a65ca726f9ffc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal32ac71f8f6fe4764d54a65ca726f9ffc = $attributes; } ?>
<?php $component = App\View\Components\Forms\ToggleSwitch::resolve(['checked' => $attendanceSetting->alert_after_status,'fieldLabel' => __('modules.attendance.attendanceReminderStatus'),'fieldName' => 'alert_after_status','fieldId' => 'alert_after_status'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.toggle-switch'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ToggleSwitch::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-0 mr-lg-12']); ?>
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

        <div class="col-lg-4 alert_after_box <?php if($attendanceSetting->alert_after_status == 0): ?> d-none <?php endif; ?>">
            <?php if (isset($component)) { $__componentOriginal1fded940a0a5d34bf1b88a1f45916593 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1fded940a0a5d34bf1b88a1f45916593 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Number::resolve(['fieldLabel' => __('modules.attendance.ReminderAfterMinutes'),'fieldName' => 'alert_after','fieldId' => 'alert_after','fieldValue' => $attendanceSetting->alert_after,'fieldRequired' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.number'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Number::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-0 mr-lg-2 mr-md-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1fded940a0a5d34bf1b88a1f45916593)): ?>
<?php $attributes = $__attributesOriginal1fded940a0a5d34bf1b88a1f45916593; ?>
<?php unset($__attributesOriginal1fded940a0a5d34bf1b88a1f45916593); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1fded940a0a5d34bf1b88a1f45916593)): ?>
<?php $component = $__componentOriginal1fded940a0a5d34bf1b88a1f45916593; ?>
<?php unset($__componentOriginal1fded940a0a5d34bf1b88a1f45916593); ?>
<?php endif; ?>
        </div>

    </div>
</div>
<!-- Buttons Start -->
<div class="w-100 border-top-grey">
    <?php if (isset($component)) { $__componentOriginal22960d0612890da31753448e47f28003 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal22960d0612890da31753448e47f28003 = $attributes; } ?>
<?php $component = App\View\Components\SettingFormActions::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('setting-form-actions'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SettingFormActions::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
        <?php if (isset($component)) { $__componentOriginalcf8d12533ff890e0d6573daf32b7618d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcf8d12533ff890e0d6573daf32b7618d = $attributes; } ?>
<?php $component = App\View\Components\Forms\ButtonPrimary::resolve(['icon' => 'check'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'save-form','class' => 'mr-3']); ?><?php echo app('translator')->get('app.save'); ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcf8d12533ff890e0d6573daf32b7618d)): ?>
<?php $attributes = $__attributesOriginalcf8d12533ff890e0d6573daf32b7618d; ?>
<?php unset($__attributesOriginalcf8d12533ff890e0d6573daf32b7618d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcf8d12533ff890e0d6573daf32b7618d)): ?>
<?php $component = $__componentOriginalcf8d12533ff890e0d6573daf32b7618d; ?>
<?php unset($__componentOriginalcf8d12533ff890e0d6573daf32b7618d); ?>
<?php endif; ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal22960d0612890da31753448e47f28003)): ?>
<?php $attributes = $__attributesOriginal22960d0612890da31753448e47f28003; ?>
<?php unset($__attributesOriginal22960d0612890da31753448e47f28003); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal22960d0612890da31753448e47f28003)): ?>
<?php $component = $__componentOriginal22960d0612890da31753448e47f28003; ?>
<?php unset($__componentOriginal22960d0612890da31753448e47f28003); ?>
<?php endif; ?>
</div>
<!-- Buttons End -->

<script>
    $('#ipBox').on('click', '.delete-ip-field', function() {
        var ipIndex = $(this).data('ip-index');
        $('#addMoreBox' + ipIndex).remove();
    });
    var $insertBefore = $('#insertBefore');
    var $i = <?php echo e(count($ipAddresses)); ?>;

    $('#save-form').click(function() {
        $.easyAjax({
            url: "<?php echo e(route('attendance-settings.update', $attendanceSetting->id)); ?>",
            container: '#editSettings',
            disableButton: true,
            blockUI: true,
            buttonSelector: "#save-form",
            type: "POST",
            redirect: true,
            data: $('#editSettings').serialize()
        })
    });

    $('#employee_clock_in_out').click(function() {
        if ($(this).prop("checked") == true) {
            $('#radius_check').removeAttr("disabled");
            $('#ip_check').removeAttr("disabled");
        } else if ($(this).prop("checked") == false) {
            if ($('#radius_check').prop("checked") == true) {
                $('#radius_check').trigger('click');
            }
            if ($('#ip_check').prop("checked") == true) {
                $('#ip_check').trigger('click');
            }

            $('#radius_check').attr("disabled", 'disabled');
            $('#ip_check').attr("disabled", 'disabled');
        }
    });

    $('#radius_check').click(function() {
        $('#radiusBox').toggleClass('d-none');
    });

    $('#ip_check').click(function() {
        $('#ipBox').toggleClass('d-none');
    });

    $('#monthly_report').click(function() {
        $('#monthly-report-roles').toggleClass('d-none');
    });

    // Add More Inputs
    $('#plusButton').click(function() {
        $i = $i + 1;
        var indexs = $i + 1;
        $(`<div id="addMoreBox${indexs}" class="row clearfix"><div class="col-md-5"><div class="form-group"><input class="form-control height-35 f-14" name="ip[${$i}]" type="text" value="" placeholder="<?php echo app('translator')->get('modules.attendance.ipAddress'); ?>"/></div></div><div class="col-md-1"><div class="task_view mt-1"> <a href="javascript:;" data-ip-index="${indexs}" class="delete-ip-field task_view_more d-flex align-items-center justify-content-center dropdown-toggle" > <i class="fa fa-trash icons mr-2"></i> <?php echo app('translator')->get('app.delete'); ?></a> </div></div></div>`)
            .insertBefore($insertBefore);
    });

    // Remove fields
    function removeBox(index) {
        $('#addMoreBox' + index).remove();
    }


    $('#alert_after_status').click(function() {
        $('.alert_after_box').toggleClass('d-none');
    })

    $('#auto_clock_in').click(function() {
        $('.auto_clock_in_location').toggleClass('d-none');
    })
</script>
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\attendance-settings\ajax\attendance.blade.php ENDPATH**/ ?>