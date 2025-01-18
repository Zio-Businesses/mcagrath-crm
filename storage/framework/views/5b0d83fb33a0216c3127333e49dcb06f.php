<script src="<?php echo e(asset('vendor/jquery/frappe-charts.min.iife.js')); ?>"></script>
<script src="<?php echo e(asset('vendor/jquery/Chart.min.js')); ?>"></script>


<div class="row">
    <?php if(in_array('leaves', user_modules()) && in_array('total_leaves_approved', $activeWidgets)): ?>
        <div class="col-xl-3 col-lg-6 col-md-6 mb-3">

            <a href="javascript:;" id="total-leaves-approved">
                <?php if (isset($component)) { $__componentOriginale1233a330800208b0e743068470d1bf4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale1233a330800208b0e743068470d1bf4 = $attributes; } ?>
<?php $component = App\View\Components\Cards\Widget::resolve(['title' => __('modules.dashboard.totalLeavesApproved'),'value' => $totalLeavesApproved,'icon' => 'plane-departure','info' => __('messages.leaveInfo')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.widget'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Widget::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale1233a330800208b0e743068470d1bf4)): ?>
<?php $attributes = $__attributesOriginale1233a330800208b0e743068470d1bf4; ?>
<?php unset($__attributesOriginale1233a330800208b0e743068470d1bf4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale1233a330800208b0e743068470d1bf4)): ?>
<?php $component = $__componentOriginale1233a330800208b0e743068470d1bf4; ?>
<?php unset($__componentOriginale1233a330800208b0e743068470d1bf4); ?>
<?php endif; ?>
            </a>
        </div>
    <?php endif; ?>

    <?php if(in_array('employees', user_modules()) && in_array('total_new_employee', $activeWidgets)): ?>

        <div class="col-xl-4 col-lg-6 col-md-6 mb-3">

            <div class="bg-white p-3 rounded b-shadow-4 d-flex justify-content-between align-items-center mb-4 mb-md-0 mb-lg-0">
                <div class="d-block text-capitalize">
                    <h5 class="f-15 f-w-500 text-darkest-grey"><?php echo app('translator')->get('app.menu.employees'); ?></h5>
                    <div class="d-flex">
                        <a href="javascript:;"  class="total-employees" data-status="open"><p class="mb-0 f-15 font-weight-bold text-blue d-grid mr-5">
                            <?php echo e($totalEmployee); ?><span class="f-12 font-weight-normal text-lightest">
                                <?php echo app('translator')->get('modules.dashboard.totalEmployees'); ?>
                                <i class="fa fa-question-circle" data-toggle="popover" data-placement="top" data-content="<?php echo app('translator')->get('messages.totalEmployeeInfo'); ?>" data-html="true" data-trigger="hover"></i>
                            </span>
                        </p></a>
                        <a href="javascript:;" class="total-new-employees" data-status="resolved"><p class="mb-0 f-15 font-weight-bold text-dark-green d-grid">
                            <?php echo e($totalNewEmployee); ?><span class="f-12 font-weight-normal text-lightest"><?php echo app('translator')->get('modules.dashboard.totalNewEmployee'); ?>
                                <i class="fa fa-question-circle" data-toggle="popover" data-placement="top" data-content="<?php echo app('translator')->get('messages.newEmployeeInfo'); ?>" data-html="true" data-trigger="hover"></i>
                            </span>
                        </p></a>
                    </div>
                </div>
                <div class="d-block">
                    <i class="fa fa-users text-lightest f-18"></i>
                </div>
            </div>

        </div>
    <?php endif; ?>

    <?php if(in_array('employees', user_modules()) && in_array('total_employee_exits', $activeWidgets)): ?>
        <div class="col-xl-3 col-lg-6 col-md-6 mb-3">
            <a href="javascript:;" id="total-ex-employees">
                <?php if (isset($component)) { $__componentOriginale1233a330800208b0e743068470d1bf4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale1233a330800208b0e743068470d1bf4 = $attributes; } ?>
<?php $component = App\View\Components\Cards\Widget::resolve(['title' => __('modules.dashboard.totalEmployeeExits'),'value' => $totalEmployeeExits,'icon' => 'sign-out-alt','info' => __('messages.employeeExitInfo')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.widget'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Widget::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale1233a330800208b0e743068470d1bf4)): ?>
<?php $attributes = $__attributesOriginale1233a330800208b0e743068470d1bf4; ?>
<?php unset($__attributesOriginale1233a330800208b0e743068470d1bf4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale1233a330800208b0e743068470d1bf4)): ?>
<?php $component = $__componentOriginale1233a330800208b0e743068470d1bf4; ?>
<?php unset($__componentOriginale1233a330800208b0e743068470d1bf4); ?>
<?php endif; ?>
            </a>
        </div>
    <?php endif; ?>

    <?php if(in_array('attendance', user_modules()) && in_array('total_today_attendance', $activeWidgets)): ?>
        <div class="col-xl-3 col-lg-6 col-md-6">
            <a href="<?php echo e(route('attendances.index')); ?>">
                <?php if (isset($component)) { $__componentOriginale1233a330800208b0e743068470d1bf4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale1233a330800208b0e743068470d1bf4 = $attributes; } ?>
<?php $component = App\View\Components\Cards\Widget::resolve(['title' => __('modules.dashboard.totalTodayAttendance'),'value' => $counts->totalTodayAttendance.'/'.$counts->totalEmployees,'icon' => 'calendar-check'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.widget'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Widget::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale1233a330800208b0e743068470d1bf4)): ?>
<?php $attributes = $__attributesOriginale1233a330800208b0e743068470d1bf4; ?>
<?php unset($__attributesOriginale1233a330800208b0e743068470d1bf4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale1233a330800208b0e743068470d1bf4)): ?>
<?php $component = $__componentOriginale1233a330800208b0e743068470d1bf4; ?>
<?php unset($__componentOriginale1233a330800208b0e743068470d1bf4); ?>
<?php endif; ?>
            </a>
        </div>
    <?php endif; ?>

    <?php if(in_array('attendance', user_modules()) && in_array('average_attendance', $activeWidgets)): ?>
        <div class="col-xl-3 col-lg-6 col-md-6 mb-3">
            <a href="<?php echo e(route('attendances.index')); ?>">
                <?php if (isset($component)) { $__componentOriginale1233a330800208b0e743068470d1bf4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale1233a330800208b0e743068470d1bf4 = $attributes; } ?>
<?php $component = App\View\Components\Cards\Widget::resolve(['title' => __('modules.dashboard.averageAttendance'),'value' => $averageAttendance,'icon' => 'fingerprint'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.widget'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Widget::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale1233a330800208b0e743068470d1bf4)): ?>
<?php $attributes = $__attributesOriginale1233a330800208b0e743068470d1bf4; ?>
<?php unset($__attributesOriginale1233a330800208b0e743068470d1bf4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale1233a330800208b0e743068470d1bf4)): ?>
<?php $component = $__componentOriginale1233a330800208b0e743068470d1bf4; ?>
<?php unset($__componentOriginale1233a330800208b0e743068470d1bf4); ?>
<?php endif; ?>
            </a>
        </div>
    <?php endif; ?>

</div>

<div class="row">
    <?php if(in_array('employees', user_modules()) && in_array('department_wise_employee', $activeWidgets)): ?>
        <div class="col-sm-12 col-lg-6 mt-3">
            <?php if (isset($component)) { $__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9 = $attributes; } ?>
<?php $component = App\View\Components\Cards\Data::resolve(['title' => __('modules.dashboard.departmentWiseEmployee').' <i class=\'fa fa-question-circle\' data-toggle=\'popover\' data-placement=\'top\' data-content=\''.__('messages.dateFilterNotApplied').'\' data-trigger=\'hover\'></i>'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Data::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <?php if (isset($component)) { $__componentOriginalb982231180e038d497f4b363f639c469 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb982231180e038d497f4b363f639c469 = $attributes; } ?>
<?php $component = App\View\Components\PieChart::resolve(['labels' => $departmentWiseChart['labels'],'values' => $departmentWiseChart['values'],'colors' => $departmentWiseChart['colors'] ?? null] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('pie-chart'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\PieChart::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'task-chart1','height' => '300','width' => '300']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb982231180e038d497f4b363f639c469)): ?>
<?php $attributes = $__attributesOriginalb982231180e038d497f4b363f639c469; ?>
<?php unset($__attributesOriginalb982231180e038d497f4b363f639c469); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb982231180e038d497f4b363f639c469)): ?>
<?php $component = $__componentOriginalb982231180e038d497f4b363f639c469; ?>
<?php unset($__componentOriginalb982231180e038d497f4b363f639c469); ?>
<?php endif; ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9)): ?>
<?php $attributes = $__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9; ?>
<?php unset($__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9)): ?>
<?php $component = $__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9; ?>
<?php unset($__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9); ?>
<?php endif; ?>
        </div>
    <?php endif; ?>

    <?php if(in_array('employees', user_modules()) && in_array('designation_wise_employee', $activeWidgets)): ?>
        <div class="col-sm-12 col-lg-6 mt-3">
            <?php if (isset($component)) { $__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9 = $attributes; } ?>
<?php $component = App\View\Components\Cards\Data::resolve(['title' => __('modules.dashboard.designationWiseEmployee').' <i class=\'fa fa-question-circle\' data-toggle=\'popover\' data-placement=\'top\' data-content=\''.__('messages.dateFilterNotApplied').'\' data-trigger=\'hover\'></i>'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Data::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <?php if (isset($component)) { $__componentOriginalb982231180e038d497f4b363f639c469 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb982231180e038d497f4b363f639c469 = $attributes; } ?>
<?php $component = App\View\Components\PieChart::resolve(['labels' => $designationWiseChart['labels'],'values' => $designationWiseChart['values'],'colors' => $designationWiseChart['colors'] ?? null] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('pie-chart'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\PieChart::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'task-chart2','height' => '300','width' => '300']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb982231180e038d497f4b363f639c469)): ?>
<?php $attributes = $__attributesOriginalb982231180e038d497f4b363f639c469; ?>
<?php unset($__attributesOriginalb982231180e038d497f4b363f639c469); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb982231180e038d497f4b363f639c469)): ?>
<?php $component = $__componentOriginalb982231180e038d497f4b363f639c469; ?>
<?php unset($__componentOriginalb982231180e038d497f4b363f639c469); ?>
<?php endif; ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9)): ?>
<?php $attributes = $__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9; ?>
<?php unset($__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9)): ?>
<?php $component = $__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9; ?>
<?php unset($__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9); ?>
<?php endif; ?>
        </div>
    <?php endif; ?>

    <?php if(in_array('employees', user_modules()) && in_array('gender_wise_employee', $activeWidgets)): ?>
        <div class="col-sm-12 col-lg-6 mt-3">
            <?php if (isset($component)) { $__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9 = $attributes; } ?>
<?php $component = App\View\Components\Cards\Data::resolve(['title' => __('modules.dashboard.genderWiseEmployee').' <i class=\'fa fa-question-circle\' data-toggle=\'popover\' data-placement=\'top\' data-content=\''.__('messages.dateFilterNotApplied').'\' data-trigger=\'hover\'></i>'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Data::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <?php if (isset($component)) { $__componentOriginalb982231180e038d497f4b363f639c469 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb982231180e038d497f4b363f639c469 = $attributes; } ?>
<?php $component = App\View\Components\PieChart::resolve(['labels' => $genderWiseChart['labels'],'values' => $genderWiseChart['values'],'colors' => $genderWiseChart['colors'] ?? null] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('pie-chart'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\PieChart::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'task-chart3','height' => '300','width' => '300']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb982231180e038d497f4b363f639c469)): ?>
<?php $attributes = $__attributesOriginalb982231180e038d497f4b363f639c469; ?>
<?php unset($__attributesOriginalb982231180e038d497f4b363f639c469); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb982231180e038d497f4b363f639c469)): ?>
<?php $component = $__componentOriginalb982231180e038d497f4b363f639c469; ?>
<?php unset($__componentOriginalb982231180e038d497f4b363f639c469); ?>
<?php endif; ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9)): ?>
<?php $attributes = $__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9; ?>
<?php unset($__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9)): ?>
<?php $component = $__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9; ?>
<?php unset($__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9); ?>
<?php endif; ?>
        </div>
    <?php endif; ?>

    <?php if(in_array('employees', user_modules()) && in_array('role_wise_employee', $activeWidgets)): ?>
        <div class="col-sm-12 col-lg-6 mt-3">
            <?php if (isset($component)) { $__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9 = $attributes; } ?>
<?php $component = App\View\Components\Cards\Data::resolve(['title' => __('modules.dashboard.roleWiseEmployee').' <i class=\'fa fa-question-circle\' data-toggle=\'popover\' data-placement=\'top\' data-content=\''.__('messages.dateFilterNotApplied').'\' data-trigger=\'hover\'></i>'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Data::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <?php if (isset($component)) { $__componentOriginalb982231180e038d497f4b363f639c469 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb982231180e038d497f4b363f639c469 = $attributes; } ?>
<?php $component = App\View\Components\PieChart::resolve(['labels' => $roleWiseChart['labels'],'values' => $roleWiseChart['values'],'colors' => $roleWiseChart['colors'] ?? null] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('pie-chart'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\PieChart::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'task-chart4','height' => '300','width' => '300']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb982231180e038d497f4b363f639c469)): ?>
<?php $attributes = $__attributesOriginalb982231180e038d497f4b363f639c469; ?>
<?php unset($__attributesOriginalb982231180e038d497f4b363f639c469); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb982231180e038d497f4b363f639c469)): ?>
<?php $component = $__componentOriginalb982231180e038d497f4b363f639c469; ?>
<?php unset($__componentOriginalb982231180e038d497f4b363f639c469); ?>
<?php endif; ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9)): ?>
<?php $attributes = $__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9; ?>
<?php unset($__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9)): ?>
<?php $component = $__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9; ?>
<?php unset($__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9); ?>
<?php endif; ?>
        </div>
    <?php endif; ?>

    <?php if(in_array('employees', user_modules()) && in_array('headcount', $activeWidgets)): ?>
    <div class="col-sm-12 col-lg-12 mt-3">
        <?php if (isset($component)) { $__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9 = $attributes; } ?>
<?php $component = App\View\Components\Cards\Data::resolve(['title' => __('modules.dashboard.headcount').' <i class=\'fa fa-question-circle\' data-toggle=\'popover\' data-placement=\'top\' data-content=\''.__('app.lastTweleveMonths').' \' data-trigger=\'hover\'></i>'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Data::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
            <?php if (isset($component)) { $__componentOriginal186b6b67364273b38dd03324ee751423 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal186b6b67364273b38dd03324ee751423 = $attributes; } ?>
<?php $component = App\View\Components\BarChart::resolve(['chartData' => $headCountChart] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('bar-chart'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\BarChart::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'task-chart6','height' => '300']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal186b6b67364273b38dd03324ee751423)): ?>
<?php $attributes = $__attributesOriginal186b6b67364273b38dd03324ee751423; ?>
<?php unset($__attributesOriginal186b6b67364273b38dd03324ee751423); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal186b6b67364273b38dd03324ee751423)): ?>
<?php $component = $__componentOriginal186b6b67364273b38dd03324ee751423; ?>
<?php unset($__componentOriginal186b6b67364273b38dd03324ee751423); ?>
<?php endif; ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9)): ?>
<?php $attributes = $__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9; ?>
<?php unset($__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9)): ?>
<?php $component = $__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9; ?>
<?php unset($__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9); ?>
<?php endif; ?>
    </div>
    <?php endif; ?>

    <?php if(in_array('employees', user_modules()) && in_array('joining_vs_attrition', $activeWidgets)): ?>
    <div class="col-sm-12 col-lg-12 mt-3">
        <?php if (isset($component)) { $__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9 = $attributes; } ?>
<?php $component = App\View\Components\Cards\Data::resolve(['title' => __('modules.dashboard.joiningVsAttrition').' <i class=\'fa fa-question-circle\' data-toggle=\'popover\' data-placement=\'top\' data-content=\''.__('app.lastTweleveMonths').' \' data-trigger=\'hover\'></i>'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Data::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
            <?php if (isset($component)) { $__componentOriginale9ccd694a97cd317c729537be76f531b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale9ccd694a97cd317c729537be76f531b = $attributes; } ?>
<?php $component = App\View\Components\LineChart::resolve(['chartData' => $joiningVsAttritionChart,'multiple' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('line-chart'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\LineChart::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'task-chart5','height' => '250']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale9ccd694a97cd317c729537be76f531b)): ?>
<?php $attributes = $__attributesOriginale9ccd694a97cd317c729537be76f531b; ?>
<?php unset($__attributesOriginale9ccd694a97cd317c729537be76f531b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale9ccd694a97cd317c729537be76f531b)): ?>
<?php $component = $__componentOriginale9ccd694a97cd317c729537be76f531b; ?>
<?php unset($__componentOriginale9ccd694a97cd317c729537be76f531b); ?>
<?php endif; ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9)): ?>
<?php $attributes = $__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9; ?>
<?php unset($__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9)): ?>
<?php $component = $__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9; ?>
<?php unset($__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9); ?>
<?php endif; ?>
    </div>
    <?php endif; ?>


    <?php if(in_array('leaves', user_modules()) && in_array('leaves_taken', $activeWidgets)): ?>
        <div class="col-sm-12 col-lg-6 mt-3">
            <?php if (isset($component)) { $__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9 = $attributes; } ?>
<?php $component = App\View\Components\Cards\Data::resolve(['title' => __('modules.dashboard.leavesTaken'),'padding' => 'false','otherClasses' => 'h-200'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Data::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <?php if (isset($component)) { $__componentOriginal7d9f6e0b9001f5841f72577781b2d17f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7d9f6e0b9001f5841f72577781b2d17f = $attributes; } ?>
<?php $component = App\View\Components\Table::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Table::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                    <?php $__empty_1 = true; $__currentLoopData = $leavesTaken; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td class="pl-20">
                                <?php if (isset($component)) { $__componentOriginal9a71dc76dd25d4db3618f7b2896e958f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9a71dc76dd25d4db3618f7b2896e958f = $attributes; } ?>
<?php $component = App\View\Components\Employee::resolve(['user' => $item] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                            </td>
                            <td class="pr-20 text-right"><span
                                    class="badge badge-light p-2"><?php echo e($item->employeeLeaveCount); ?></span></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="2" class="shadow-none">
                                <?php if (isset($component)) { $__componentOriginal269164c77d9d34462c34359c03da6a68 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal269164c77d9d34462c34359c03da6a68 = $attributes; } ?>
<?php $component = App\View\Components\Cards\NoRecord::resolve(['icon' => 'plane-departure','message' => __('messages.noRecordFound')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9)): ?>
<?php $attributes = $__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9; ?>
<?php unset($__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9)): ?>
<?php $component = $__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9; ?>
<?php unset($__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9); ?>
<?php endif; ?>
        </div>
    <?php endif; ?>

    <?php if(in_array('birthday', $activeWidgets)): ?>
        <div class="col-sm-12 col-lg-6 mt-3">
            <?php if (isset($component)) { $__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9 = $attributes; } ?>
<?php $component = App\View\Components\Cards\Data::resolve(['title' => __('modules.dashboard.birthday'),'padding' => 'false','otherClasses' => 'h-200'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Data::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <?php if (isset($component)) { $__componentOriginal7d9f6e0b9001f5841f72577781b2d17f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7d9f6e0b9001f5841f72577781b2d17f = $attributes; } ?>
<?php $component = App\View\Components\Table::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Table::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                    <?php $__empty_1 = true; $__currentLoopData = $birthdays; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $birthday): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td class="pl-20">
                                <?php if (isset($component)) { $__componentOriginal9a71dc76dd25d4db3618f7b2896e958f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9a71dc76dd25d4db3618f7b2896e958f = $attributes; } ?>
<?php $component = App\View\Components\Employee::resolve(['user' => $birthday->user] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                            </td>
                            <td>
                            <span class="badge badge-light p-2">
                                <i class="fa fa-birthday-cake"></i>
                                <?php echo e($birthday->date_of_birth->translatedFormat('d M')); ?>

                            </span>
                            </td>
                            <td class="pr-20" align="right">
                                <?php
                                    $currentYear = now(company()->timezone)->year;
                                    $year = $birthday->date_of_birth->timezone(company()->timezone)->year(date('Y'));
                                    $dateBirth = $birthday->date_of_birth->format($currentYear . '-m-d');
                                    $dateBirth = \Carbon\Carbon::parse($dateBirth);

                                    $diffInDays = $year->copy()->diffForHumans(now()->timezone(company()->timezone),[
                                        'syntax' => \Carbon\CarbonInterface::DIFF_RELATIVE_AUTO,
                                        'options' => \Carbon\Carbon::JUST_NOW | \Carbon\Carbon::ONE_DAY_WORDS | \Carbon\Carbon::TWO_DAY_WORDS,
                                    ]);

                                ?>

                                <?php if($dateBirth->isToday()): ?>
                                    <span class="badge badge-light text-success p-2"><i class="fa fa-smile"></i> <?php echo app('translator')->get('app.today'); ?></span>
                                <?php else: ?>
                                    <span class="badge badge-light p-2"><?php echo e($diffInDays); ?></span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="3" class="shadow-none">
                                <?php if (isset($component)) { $__componentOriginal269164c77d9d34462c34359c03da6a68 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal269164c77d9d34462c34359c03da6a68 = $attributes; } ?>
<?php $component = App\View\Components\Cards\NoRecord::resolve(['icon' => 'birthday-cake','message' => __('messages.noRecordFound')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9)): ?>
<?php $attributes = $__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9; ?>
<?php unset($__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9)): ?>
<?php $component = $__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9; ?>
<?php unset($__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9); ?>
<?php endif; ?>
        </div>
    <?php endif; ?>

    <?php if(in_array('attendance', user_modules()) && in_array('late_attendance_mark', $activeWidgets)): ?>
        <div class="col-sm-12 col-lg-6 mt-3">
            <?php if (isset($component)) { $__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9 = $attributes; } ?>
<?php $component = App\View\Components\Cards\Data::resolve(['title' => __('modules.dashboard.lateAttendanceMark'),'padding' => 'false','otherClasses' => 'h-200'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Data::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <?php if (isset($component)) { $__componentOriginal7d9f6e0b9001f5841f72577781b2d17f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7d9f6e0b9001f5841f72577781b2d17f = $attributes; } ?>
<?php $component = App\View\Components\Table::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Table::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                    <?php $__empty_1 = true; $__currentLoopData = $lateAttendanceMarks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td class="pl-20">
                                <?php if (isset($component)) { $__componentOriginal9a71dc76dd25d4db3618f7b2896e958f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9a71dc76dd25d4db3618f7b2896e958f = $attributes; } ?>
<?php $component = App\View\Components\Employee::resolve(['user' => $item] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                            </td>
                            <td><span class="badge badge-light p-2"><?php echo e($item->employeeLateCount); ?></span></td>
                            <td class="pr-20 text-right">
                                <?php if (isset($component)) { $__componentOriginal5e57c6582b8a883148a28bb7ee46d2ad = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5e57c6582b8a883148a28bb7ee46d2ad = $attributes; } ?>
<?php $component = App\View\Components\Forms\ButtonSecondary::resolve(['icon' => 'eye'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-secondary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonSecondary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['data-user-id' => ''.e($item->id).'','class' => 'view-late-attendance']); ?>
                                    <?php echo app('translator')->get('app.view'); ?>
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
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="2" class="shadow-none">
                                <?php if (isset($component)) { $__componentOriginal269164c77d9d34462c34359c03da6a68 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal269164c77d9d34462c34359c03da6a68 = $attributes; } ?>
<?php $component = App\View\Components\Cards\NoRecord::resolve(['icon' => 'user-clock','message' => __('messages.noRecordFound')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9)): ?>
<?php $attributes = $__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9; ?>
<?php unset($__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9)): ?>
<?php $component = $__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9; ?>
<?php unset($__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9); ?>
<?php endif; ?>
        </div>
    <?php endif; ?>

</div>

<script>

    $('#save-dashboard-widget').click(function() {
        $.easyAjax({
            url: "<?php echo e(route('dashboard.widget', 'admin-hr-dashboard')); ?>",
            container: '#dashboardWidgetForm',
            blockUI: true,
            type: "POST",
            redirect: true,
            data: $('#dashboardWidgetForm').serialize(),
            success: function() {
                window.location.reload();
            }
        })
    });

    $('body').on('click', '#total-leaves-approved', function() {
        var dateRange = getDateRange();

        var url = `<?php echo e(route('leaves.index')); ?>`;
        string = `?status=approved&start=${dateRange.startDate}&end=${dateRange.endDate}`;
        url += string;

        window.location.href = url;
    });

    $('body').on('click', '.total-new-employees', function() {
        var dateRange = getDateRange();
        var url = `<?php echo e(route('employees.index')); ?>`;

        string = `?startDate=${dateRange.startDate}&endDate=${dateRange.endDate}`;
        url += string;

        window.location.href = url;
    });

    $('body').on('click', '.total-employees', function() {
        var dateRange = getDateRange();
        var url = `<?php echo e(route('employees.index')); ?>`;
        window.location.href = url;
    });

    $('body').on('click', '#total-ex-employees', function() {
        var dateRange = getDateRange();
        var url = `<?php echo e(route('employees.index')); ?>`;

        string = `?status=ex_employee&lastStartDate=${dateRange.startDate}&lastEndDate=${dateRange.endDate}`;
        url += string;

        window.location.href = url;
    });

    $('body').on('click', '.view-late-attendance', function() {
        var empId = $(this).data('user-id');
        var dateRange = getDateRange();
        var url = `<?php echo e(route('attendances.index')); ?>`;

        var string = `?employee_id=${empId}&late=yes`;
        url += string;

        window.location.href = url;
    });

    function getDateRange() {
        var dateRange = $('#datatableRange2').data('daterangepicker');
        var startDate = dateRange.startDate.format('<?php echo e(company()->moment_date_format); ?>');
        var endDate = dateRange.endDate.format('<?php echo e(company()->moment_date_format); ?>');

        startDate = encodeURIComponent(startDate);
        endDate = encodeURIComponent(endDate);

        var data = [];
        data['startDate'] = startDate;
        data['endDate'] = endDate;

        return data;
    }

</script>
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\dashboard\ajax\hr.blade.php ENDPATH**/ ?>