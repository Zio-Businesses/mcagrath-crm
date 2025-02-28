<!-- HEADER START -->
<header class="main-header clearfix bg-white" id="header">


    <!-- NAVBAR LEFT(MOBILE MENU COLLAPSE) START-->
    <div class="navbar-left float-left d-flex align-items-center">
        <?php if (isset($component)) { $__componentOriginal000fcba1c6c5a1e4a2897e45738ec35e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal000fcba1c6c5a1e4a2897e45738ec35e = $attributes; } ?>
<?php $component = App\View\Components\AppTitle::resolve(['pageTitle' => $pageTitle] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-title'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppTitle::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'd-none d-lg-flex']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal000fcba1c6c5a1e4a2897e45738ec35e)): ?>
<?php $attributes = $__attributesOriginal000fcba1c6c5a1e4a2897e45738ec35e; ?>
<?php unset($__attributesOriginal000fcba1c6c5a1e4a2897e45738ec35e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal000fcba1c6c5a1e4a2897e45738ec35e)): ?>
<?php $component = $__componentOriginal000fcba1c6c5a1e4a2897e45738ec35e; ?>
<?php unset($__componentOriginal000fcba1c6c5a1e4a2897e45738ec35e); ?>
<?php endif; ?>

        <div class="d-block d-lg-none menu-collapse cursor-pointer position-relative" onclick="openMobileMenu()">
            <div class="mc-wrap">
                <div class="mcw-line"></div>
                <div class="mcw-line center"></div>
                <div class="mcw-line"></div>
            </div>
        </div>

        <?php if(in_array('admin', user_roles()) && $checkListCompleted < $checkListTotal && App::environment('codecanyon')): ?>
            <div class="ml-3 d-none d-lg-block d-md-block">
                <span class="f-12 mb-1"><a href="<?php echo e(route('checklist')); ?>" class="text-lightest ">
                        <?php echo app('translator')->get('modules.accountSettings.setupProgress'); ?></a>
                    <span class="float-right"><?php echo e($checkListCompleted); ?>/<?php echo e($checkListTotal); ?></span>
                </span>
                <div class="progress" style="height: 5px; width: 150px">
                    <div class="progress-bar bg-primary" role="progressbar"
                         style="width: <?php echo e(($checkListCompleted / $checkListTotal) * 100); ?>%;" aria-valuenow="25"
                         aria-valuemin="0" aria-valuemax="100">&nbsp;
                    </div>
                </div>
            </div>
        <?php endif; ?>

    </div>

    <!-- NAVBAR LEFT(MOBILE MENU COLLAPSE) END-->
    <!-- NAVBAR RIGHT(SEARCH, ADD, NOTIFICATION, LOGOUT) START-->
    <div class="page-header-right float-right d-flex align-items-center justify-content-end">

        <span id="timer-clock">
            <?php if(isset($selfActiveTimer)): ?>
                <?php echo $__env->make('sections.timer_clock', ['selfActiveTimer' => $selfActiveTimer], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        </span>

        <ul>
            <!-- SEARCH START -->
            <li data-toggle="tooltip" data-placement="top" title="<?php echo e(__('app.search')); ?>" class="d-none d-sm-block">
                <div class="d-flex align-items-center">
                    <a href="javascript:;" class="d-block header-icon-box open-search">
                        <i class="fa fa-search f-16 text-dark-grey"></i>
                    </a>
                </div>
            </li>
            <!-- SEARCH END -->
            <!-- Sticky Note START -->
            <li data-toggle="tooltip" data-placement="top" title="<?php echo e(__('app.menu.stickyNotes')); ?>" class="d-none d-sm-block">
                <div class="d-flex align-items-center">
                    <a href="<?php echo e(route('sticky-notes.index')); ?>" class="d-block header-icon-box openRightModal">
                        <i class="fa fa-sticky-note f-16 text-dark-grey"></i>
                    </a>
                </div>
            </li>
            <!-- Sticky Note END -->

        <?php if(!in_array('client', user_roles())): ?>

            <?php if(in_array('timelogs', user_modules()) && (add_timelogs_permission() == 'all' || add_timelogs_permission() == 'added' || manage_active_timelogs() == 'all')): ?>
                <!-- START TIMER -->
                    <li data-toggle="tooltip" data-placement="top" title="<?php echo e(__('modules.timeLogs.startTimer')); ?>">
                        <div class="add_box dropdown">
                            <a class="d-block dropdown-toggle header-icon-box" type="link" id="show-active-timer"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-clock f-16 text-dark-grey"></i>
                                    <span
                                        class="badge badge-primary active-timer-count position-absolute <?php echo e(($activeTimerCount == 0) ? 'd-none' : ''); ?>"><?php echo e($activeTimerCount); ?></span>
                            </a>
                        <?php if($activeTimerCount == 0): ?>
                            <!-- DROPDOWN - INFORMATION -->
                                <div class="dropdown-menu dropdown-menu-right" id="active-timer-list"
                                     aria-labelledby="dropdownMenuLink" tabindex="0">
                                    <a class="dropdown-item text-primary f-w-500" href="javascript:;"
                                       id="start-timer-modal">
                                        <i class="fa fa-play mr-2"></i>
                                        <?php echo app('translator')->get("modules.timeLogs.startTimer"); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </li>
                    <!-- START TIMER END -->
            <?php endif; ?>

            <!-- ADD START -->
                <li data-toggle="tooltip" data-placement="top" title="<?php echo e(__('app.createNew')); ?>">
                    <div class="add_box dropdown">
                        <a class="d-block dropdown-toggle header-icon-box" type="link" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-plus-circle f-16 text-dark-grey"></i>
                        </a>
                        <!-- DROPDOWN - INFORMATION -->
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink" tabindex="0">
                            <?php if(in_array('projects', user_modules()) && (add_project_permission() == 'all' || add_project_permission() == 'added')): ?>
                                <a class="dropdown-item f-14 text-dark openRightModal"
                                   href="<?php echo e(route('projects.create')); ?>">
                                    <i class="fa fa-plus f-w-500 mr-2 f-11"></i>
                                    <?php echo app('translator')->get('app.addProject'); ?>
                                </a>
                            <?php endif; ?>

                            <?php if(in_array('tasks', user_modules()) && (add_tasks_permission() == 'all' || add_tasks_permission() == 'added')): ?>
                                <a class="dropdown-item f-14 text-dark openRightModal"
                                   href="<?php echo e(route('tasks.create')); ?>">
                                    <i class="fa fa-plus f-w-500 mr-2 f-11"></i>
                                    <?php echo app('translator')->get('app.addTask'); ?>
                                </a>
                            <?php endif; ?>

                            <?php if(in_array('clients', user_modules()) && (add_clients_permission() == 'all' || add_clients_permission() == 'added')): ?>
                                <a class="dropdown-item f-14 text-dark openRightModal"
                                   href="<?php echo e(route('clients.create')); ?>">
                                    <i class="fa fa-plus f-w-500 mr-2 f-11"></i>
                                    <?php echo app('translator')->get('app.addClient'); ?>
                                </a>
                            <?php endif; ?>

                            <?php if(in_array('employees', user_modules()) && (add_employees_permission() == 'all' || add_employees_permission() == 'added')): ?>
                                <a class="dropdown-item f-14 text-dark openRightModal"
                                   href="<?php echo e(route('employees.create')); ?>">
                                    <i class="fa fa-plus f-w-500 mr-2 f-11"></i>
                                    <?php echo app('translator')->get('app.addEmployee'); ?>
                                </a>
                            <?php endif; ?>

                            <?php if(in_array('payments', user_modules()) && (add_payments_permission() == 'all' || add_payments_permission() == 'added')): ?>
                                <a class="dropdown-item f-14 text-dark openRightModal"
                                   href="<?php echo e(route('payments.create')); ?>">
                                    <i class="fa fa-plus f-w-500 mr-2 f-11"></i>
                                    <?php echo app('translator')->get('modules.payments.addPayment'); ?>
                                </a>
                            <?php endif; ?>

                            <?php if(in_array('tickets', user_modules()) && (add_tickets_permission() == 'all' || add_tickets_permission() == 'added')): ?>
                                <a class="dropdown-item f-14 text-dark openRightModal"
                                   href="<?php echo e(route('tickets.create')); ?>">
                                    <i class="fa fa-plus f-w-500 mr-2 f-11"></i>
                                    <?php echo app('translator')->get('modules.tickets.addTicket'); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </li>
                <!-- ADD END -->
        <?php endif; ?>

        <!-- NOTIFICATIONS START -->
            <li title="<?php echo e(__('app.newNotifications')); ?>">
                <div class="notification_box dropdown">
                    <a class="d-block dropdown-toggle header-icon-box show-user-notifications" type="link"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-bell f-16 text-dark-grey"></i>
                        <?php if($unreadNotificationCount > 0): ?>
                            <span
                                class="badge badge-primary unread-notifications-count active-timer-count position-absolute"><?php echo e($unreadNotificationCount); ?></span>
                        <?php endif; ?>
                    </a>
                    <!-- DROPDOWN - INFORMATION -->
                    <div
                        class="dropdown-menu dropdown-menu-right notification-dropdown border-0 shadow-lg py-0 bg-additional-grey"
                        tabindex="0">
                        <div
                            class="d-flex px-3 justify-content-between align-items-center border-bottom-grey py-1 bg-white">
                            <div class="___class_+?50___">
                                <p class="f-14 mb-0 text-dark f-w-500"><?php echo app('translator')->get('app.newNotifications'); ?></p>
                            </div>
                            <?php if($unreadNotificationCount > 0): ?>
                                <div class="f-12 ">
                                    <a href="javascript:;"
                                       class="text-dark-grey mark-notification-read"><?php echo app('translator')->get('app.markRead'); ?></a> |
                                    <a href="<?php echo e(route('all-notifications')); ?>"
                                       class="text-dark-grey"><?php echo app('translator')->get('app.showAll'); ?></a>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div id="notification-list">

                        </div>

                        <?php if($unreadNotificationCount > 6): ?>
                            <div class="d-flex px-3 pb-1 pt-2 justify-content-center bg-additional-grey">
                                <a href="<?php echo e(route('all-notifications')); ?>"
                                   class="text-darkest-grey f-13"><?php echo app('translator')->get('app.showAll'); ?></a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </li>
            <!-- NOTIFICATIONS END -->
            <!-- LOGOUT START -->
            <li data-toggle="tooltip" data-placement="top" title="<?php echo e(__('app.logout')); ?>">
                <div class="logout_box">
                    <a class="d-block header-icon-box" href="javascript:;" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="fa fa-power-off f-16 text-dark-grey"></i>
                    </a>
                </div>
            </li>
            <!-- LOGOUT END -->
        </ul>
    </div>
    <!-- NAVBAR RIGHT(SEARCH, ADD, NOTIFICATION, LOGOUT) START-->
</header>
<!-- HEADER END -->

<form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
    <?php echo csrf_field(); ?>
</form>

<script>
    $(document).ready(function () {
        var runTimeClock = true;

        <?php if(isset($activeTimerCount)): ?>
        const activeTimerCount = parseInt("<?php echo e($activeTimerCount); ?>");

        if (activeTimerCount > 0) {

            $('#show-active-timer').click(function () {
                const url = "<?php echo e(route('timelogs.show_active_timer')); ?>";
                $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
                $.ajaxModal(MODAL_XL, url);
            });

        }
        <?php endif; ?>


        $('#start-timer-modal').click(function () {
            const url = "<?php echo e(route('timelogs.show_timer')); ?>";
            $(MODAL_XL + ' ' + MODAL_HEADING).html('...');
            $.ajaxModal(MODAL_XL, url);
        });

        $('.open-search').click(function () {
            const url = "<?php echo e(route('search.index')); ?>";
            $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
            $.ajaxModal(MODAL_LG, url);
        });



        $('.show-user-notifications').click(function () {
            const openStatus = $(this).attr('aria-expanded');

            if (typeof openStatus == "undefined" || openStatus == "false") {

                const token = '<?php echo e(csrf_token()); ?>';
                $.easyAjax({
                    type: 'POST',
                    url: "<?php echo e(route('show_notifications')); ?>",
                    container: "#notification-list",
                    blockUI: true,
                    data: {
                        '_token': token
                    },
                    success: function (data) {
                        if (data.status === 'success') {
                            $('#notification-list').html(data.html);
                        }
                    }
                });

            }

        });

        $('.mark-notification-read').click(function () {
            const token = '<?php echo e(csrf_token()); ?>';
            $.easyAjax({
                type: 'POST',
                url: "<?php echo e(route('mark_notification_read')); ?>",
                blockUI: true,
                data: {
                    '_token': token
                },
                success: function (data) {
                    if (data.status === 'success') {
                        $('#notification-list').html('');
                        $('.unread-notifications-count').remove();
                        window.location.reload();
                    }
                }
            });

        });

    });
</script>
<?php /**PATH C:\xampp\htdocs\Mcagrath\mcagrath-crm\resources\views/sections/topbar.blade.php ENDPATH**/ ?>