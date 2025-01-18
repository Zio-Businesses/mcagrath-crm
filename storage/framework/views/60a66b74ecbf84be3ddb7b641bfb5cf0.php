<link rel="stylesheet" href="<?php echo e(asset('vendor/full-calendar/main.min.css')); ?>">

<?php
    $manageEmployeeShiftPermission = user()->permission('manage_employee_shifts');
?>

<?php if($manageEmployeeShiftPermission != 'all'): ?>
    <style>
        .fc-event{
            cursor: default;
        }
    </style>

<?php endif; ?>

<?php if (isset($component)) { $__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9 = $attributes; } ?>
<?php $component = App\View\Components\Cards\Data::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Data::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mt-4']); ?>
    <div id="calendar"></div>
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

<script src="<?php echo e(asset('vendor/full-calendar/main.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendor/full-calendar/locales-all.min.js')); ?>"></script>

<script>
    var initialLocaleCode = '<?php echo e(user()->locale); ?>';
    var calendarEl = document.getElementById('calendar');
    var global_settings = <?php echo json_encode(company(), 15, 512) ?>;
    var manageShiftPermission = "<?php echo e($manageEmployeeShiftPermission); ?>";

    var calendar = new FullCalendar.Calendar(calendarEl, {
        locale: initialLocaleCode,
        timeZone: '<?php echo e(company()->timezone); ?>',
        firstDay: parseInt("<?php echo e(attendance_setting()?->week_start_from); ?>"),
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
        },
        navLinks: true, // can click day/week names to navigate views
        selectable: (manageShiftPermission == 'all'),
        selectMirror: true,
        select: function(arg) {
            getEventDetail("<?php echo e($employee->id); ?>", arg.start.getDate(), arg.start.getMonth()+1, arg.start.getFullYear());
            calendar.unselect()
        },
        eventClick: function(arg) {

            getEventDetail(arg.event.extendedProps.userId, arg.event.extendedProps.day, arg.event
                .extendedProps.month, arg.event.extendedProps.year);
        },
        editable: false,
        dayMaxEvents: true, // allow "more" link when too many events
        events: {
            url: "<?php echo e(route('shifts.employee_shift_calendar')); ?>",
            extraParams: function() {
                var employeeId = "<?php echo e($employee->id); ?>";

                return {
                    employeeId: employeeId
                };
            }
        },
        eventDidMount: function(info) {
            $(info.el).css('background-color', info.event.extendedProps.bg_color);
            $(info.el).css('color', info.event.extendedProps.color);
        },
        eventTimeFormat: {
            hour: global_settings.time_format == 'H:i' ? '2-digit' : 'numeric',
            minute: '2-digit',
            meridiem: global_settings.time_format == 'H:i' ? false : true
        }
    });

    calendar.render();

    function loadData() {
        calendar.refetchEvents();
        calendar.destroy();
        calendar.render();
        window.location.reload();
    }

    // show event detail in sidebar
    var getEventDetail = function(userId, day, month, year) {
        if (manageShiftPermission != 'all') {
            return false;
        }

        var url = "<?php echo e(route('shifts.mark', [':userid', ':day', ':month', ':year'])); ?>";
        url = url.replace(':userid', userId);
        url = url.replace(':day', day);
        url = url.replace(':month', month);
        url = url.replace(':year', year);

        $(MODAL_DEFAULT + ' ' + MODAL_HEADING).html('...');
        $.ajaxModal(MODAL_DEFAULT, url);

    }
</script>
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\employees\ajax\shifts.blade.php ENDPATH**/ ?>