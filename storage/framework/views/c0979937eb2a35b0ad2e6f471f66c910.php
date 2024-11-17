

<?php $__env->startPush('styles'); ?>
    <style>
        .table .thead-light th,
        .table tr td,
        .table h5 {
            font-size: 12px;
        }
        .shift-request-change-count {
            left: 28px;
            top: -9px !important;
        }

        .change-shift {
            padding: 1rem 0.25rem !important;
        }

        #week-end-date, #week-start-date {
            z-index: 0;
        }
        
        #attendance-data .form-control:focus, .form-control:hover {
            border-color: #e9ecef;
        }
</style>

    <?php if($manageEmployeeShifts != 'all'): ?>
        <style>
            .change-shift, .change-shift-week {
                cursor: unset !important;
            }
        </style>
    <?php endif; ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('filter-section'); ?>
    <?php if (isset($component)) { $__componentOriginald1a72e1108842d163a80559e15f530b4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald1a72e1108842d163a80559e15f530b4 = $attributes; } ?>
<?php $component = App\View\Components\Filters\FilterBox::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filters.filter-box'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Filters\FilterBox::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
        <div class="select-box d-flex py-2 pr-2 border-right-grey border-right-grey-sm-0">
            <p class="mb-0 pr-2 f-14 text-dark-grey d-flex align-items-center"><?php echo app('translator')->get('app.employee'); ?></p>
            <div class="select-status">
                <select class="form-control select-picker" name="user_id" id="user_id" data-live-search="true"
                        data-size="8">
                    <?php if($employees->count() > 1 || in_array('admin', user_roles())): ?>
                        <option value="all"><?php echo app('translator')->get('app.all'); ?></option>
                    <?php endif; ?>
                    <?php $__empty_1 = true; $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <?php if (isset($component)) { $__componentOriginal6c7097547485b98631a37d273a171e9f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6c7097547485b98631a37d273a171e9f = $attributes; } ?>
<?php $component = App\View\Components\UserOption::resolve(['user' => $item,'selected' => request('employee_id') == $item->id] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('user-option'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\UserOption::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6c7097547485b98631a37d273a171e9f)): ?>
<?php $attributes = $__attributesOriginal6c7097547485b98631a37d273a171e9f; ?>
<?php unset($__attributesOriginal6c7097547485b98631a37d273a171e9f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6c7097547485b98631a37d273a171e9f)): ?>
<?php $component = $__componentOriginal6c7097547485b98631a37d273a171e9f; ?>
<?php unset($__componentOriginal6c7097547485b98631a37d273a171e9f); ?>
<?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <?php if (isset($component)) { $__componentOriginal6c7097547485b98631a37d273a171e9f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6c7097547485b98631a37d273a171e9f = $attributes; } ?>
<?php $component = App\View\Components\UserOption::resolve(['user' => user()] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('user-option'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\UserOption::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6c7097547485b98631a37d273a171e9f)): ?>
<?php $attributes = $__attributesOriginal6c7097547485b98631a37d273a171e9f; ?>
<?php unset($__attributesOriginal6c7097547485b98631a37d273a171e9f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6c7097547485b98631a37d273a171e9f)): ?>
<?php $component = $__componentOriginal6c7097547485b98631a37d273a171e9f; ?>
<?php unset($__componentOriginal6c7097547485b98631a37d273a171e9f); ?>
<?php endif; ?>
                    <?php endif; ?>
                </select>
            </div>
        </div>

        <div class="select-box d-flex py-2 px-lg-2 px-md-2 px-0 border-right-grey border-right-grey-sm-0">
            <p class="mb-0 pr-2 f-14 text-dark-grey d-flex align-items-center"><?php echo app('translator')->get('app.menu.department'); ?></p>
            <div class="select-status">
                <select class="form-control select-picker" name="department" id="department" data-live-search="true"
                    data-size="8">
                    <option value="all"><?php echo app('translator')->get('app.all'); ?></option>
                    <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($department->id); ?>"><?php echo e($department->team_name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>

        <div class="select-box d-flex py-2 px-lg-2 px-md-2 px-0 border-right-grey border-right-grey-sm-0">
            <div class="select-status">
                <select class="form-control select-picker" name="view_type" id="view_type" data-live-search="true"
                    data-size="8">
                    <option value="week"><?php echo app('translator')->get('app.weeklyView'); ?></option>
                    <option value="month"><?php echo app('translator')->get('app.monthlyView'); ?></option>
                </select>
            </div>
        </div>

        <input type="hidden" name="month" id="month" value="<?php echo e($month); ?>">
        <input type="hidden" name="year" id="year" value="<?php echo e($year); ?>">
        <input type="hidden" name="week_start_date" id="week_start_date" value="<?php echo e(now(company()->timezone)->toDateString()); ?>">

        <!-- RESET START -->
        <div class="select-box d-flex py-1 px-lg-2 px-md-2 px-0">
            <?php if (isset($component)) { $__componentOriginal5e57c6582b8a883148a28bb7ee46d2ad = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5e57c6582b8a883148a28bb7ee46d2ad = $attributes; } ?>
<?php $component = App\View\Components\Forms\ButtonSecondary::resolve(['icon' => 'times-circle'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-secondary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonSecondary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'btn-xs d-none','id' => 'reset-filters']); ?>
                <?php echo app('translator')->get('app.clearFilters'); ?>
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
        <!-- RESET END -->

     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald1a72e1108842d163a80559e15f530b4)): ?>
<?php $attributes = $__attributesOriginald1a72e1108842d163a80559e15f530b4; ?>
<?php unset($__attributesOriginald1a72e1108842d163a80559e15f530b4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald1a72e1108842d163a80559e15f530b4)): ?>
<?php $component = $__componentOriginald1a72e1108842d163a80559e15f530b4; ?>
<?php unset($__componentOriginald1a72e1108842d163a80559e15f530b4); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- CONTENT WRAPPER START -->
    <div class="content-wrapper px-4">

        <div class="d-grid d-lg-flex d-md-flex action-bar">
            <div id="table-actions" class="flex-grow-1 align-items-center">
                <?php if($manageEmployeeShifts == 'all'): ?>
                    <?php if (isset($component)) { $__componentOriginaldbb84df4c3a5cbdd95fb35d18ba6410f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldbb84df4c3a5cbdd95fb35d18ba6410f = $attributes; } ?>
<?php $component = App\View\Components\Forms\LinkPrimary::resolve(['link' => route('shifts.create'),'icon' => 'plus'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.link-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\LinkPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-3 openRightModal float-left']); ?>
                        <?php echo app('translator')->get('modules.attendance.bulkShiftAssign'); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldbb84df4c3a5cbdd95fb35d18ba6410f)): ?>
<?php $attributes = $__attributesOriginaldbb84df4c3a5cbdd95fb35d18ba6410f; ?>
<?php unset($__attributesOriginaldbb84df4c3a5cbdd95fb35d18ba6410f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldbb84df4c3a5cbdd95fb35d18ba6410f)): ?>
<?php $component = $__componentOriginaldbb84df4c3a5cbdd95fb35d18ba6410f; ?>
<?php unset($__componentOriginaldbb84df4c3a5cbdd95fb35d18ba6410f); ?>
<?php endif; ?>
                <?php endif; ?>
                <?php if(canDataTableExport()): ?>
                    <?php if (isset($component)) { $__componentOriginal5e57c6582b8a883148a28bb7ee46d2ad = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5e57c6582b8a883148a28bb7ee46d2ad = $attributes; } ?>
<?php $component = App\View\Components\Forms\ButtonSecondary::resolve(['icon' => 'file-export'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-secondary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonSecondary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'export-all','class' => 'mr-3 mb-2 mb-lg-0']); ?>
                        <?php echo app('translator')->get('app.exportExcel'); ?>
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
                <?php endif; ?>
            </div>

            <div class="btn-group mt-2 mt-lg-0 mt-md-0 ml-0 ml-lg-3 ml-md-3" role="group">
                <a href="<?php echo e(route('shifts.index')); ?>" class="btn btn-secondary f-14 btn-active" data-toggle="tooltip"
                    data-original-title="<?php echo app('translator')->get('app.summary'); ?>"><i class="side-icon bi bi-list-ul"></i></a>
                <?php if($manageEmployeeShifts == 'all'): ?>
                    <a href="<?php echo e(route('shifts-change.index')); ?>" class="btn btn-secondary f-14" data-toggle="tooltip"
                        data-original-title="<?php echo app('translator')->get('modules.attendance.shiftChangeRequests'); ?>"><i
                            class="side-icon bi bi-hourglass-split"></i>
                        <?php if($employeeShiftChangeRequest->request_count > 0): ?>
                            <span
                                class="badge badge-primary shift-request-change-count position-absolute"><?php echo e($employeeShiftChangeRequest->request_count); ?></span>
                        <?php endif; ?>
                    </a>
                <?php endif; ?>

            </div>

        </div>

        <!-- Task Box Start -->
        <?php if (isset($component)) { $__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9 = $attributes; } ?>
<?php $component = App\View\Components\Cards\Data::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Data::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mt-3']); ?>
            <div class="row">
                <div class="col-md-12" id="attendance-data"></div>
            </div>
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
        <!-- Task Box End -->
    </div>
    <!-- CONTENT WRAPPER END -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        var manageEmployeeShiftPermission = "<?php echo e($manageEmployeeShifts); ?>";

        $('#user_id, #department, #view_type').on('change', function() {
            if ($('#user_id').val() != "all") {
                $('#reset-filters').removeClass('d-none');
                showTable();
            } else if ($('#department').val() != "all") {
                $('#reset-filters').removeClass('d-none');
                showTable();
            } else {
                $('#reset-filters').addClass('d-none');
                showTable();
            }
        });

        $('#attendance-data').on('click', '.change-month', function() {
            $("#month").val($(this).data('month'));
            showTable();
        });

        $('#attendance-data').on('change', '#change-month', function() {
            $("#month").val($(this).val());
            showTable();
        });

        $('#attendance-data').on('change', '#change-year', function() {
            $("#year").val($(this).val());
            showTable();
        });

        $('#reset-filters').click(function() {
            $('#filter-form')[0].reset();
            $('.filter-box .select-picker').selectpicker("refresh");
            $('#reset-filters').addClass('d-none');
            showTable();
        });


        $('#attendance-data').on('click', '#week-start-date', function() {
            $("#week_start_date").val($(this).data('date'));
            showTable();
        });

        $('#attendance-data').on('click', '#week-end-date', function() {
            $("#week_start_date").val($(this).data('date'));
            showTable();
        });

        function showTable(loading = true) {

            var year = $('#year').val();
            var month = $('#month').val();
            var weekStartDate = $('#week_start_date').val();

            var userId = $('#user_id').val();
            var department = $('#department').val();
            var viewType = $('#view_type').val();

            //refresh counts
            var url = "<?php echo e(route('shifts.index')); ?>";

            var token = "<?php echo e(csrf_token()); ?>";

            $.easyAjax({
                data: {
                    '_token': token,
                    year: year,
                    month: month,
                    department: department,
                    userId: userId,
                    view_type: viewType,
                    week_start_date: weekStartDate,
                },
                url: url,
                blockUI: loading,
                container: '.content-wrapper',
                success: function(response) {
                    $('#attendance-data').html(response.data);
                    $('#attendance-data #change-year').selectpicker("refresh");
                    $('#attendance-data #change-month').selectpicker("refresh");
                }
            });

        }

        $('#attendance-data').on('click', '.view-attendance', function() {
            var attendanceID = $(this).data('attendance-id');
            var url = "<?php echo e(route('attendances.show', ':attendanceID')); ?>";
            url = url.replace(':attendanceID', attendanceID);

            $(MODAL_XL + ' ' + MODAL_HEADING).html('...');
            $.ajaxModal(MODAL_XL, url);
        });

        if (manageEmployeeShiftPermission == 'all') {
            $('#attendance-data').on('click', '.change-shift', function(event) {
                var attendanceDate = $(this).data('attendance-date');
                var userData = $(this).closest('tr').children('td:first');
                var userID = $(this).data('user-id');
                var year = $('#year').val();
                var month = $('#month').val();

                var url = "<?php echo e(route('shifts.mark', [':userid', ':day', ':month', ':year'])); ?>";
                url = url.replace(':userid', userID);
                url = url.replace(':day', attendanceDate);
                url = url.replace(':month', month);
                url = url.replace(':year', year);

                $(MODAL_DEFAULT + ' ' + MODAL_HEADING).html('...');
                $.ajaxModal(MODAL_DEFAULT, url);
            });

            $('#attendance-data').on('click', '.change-shift-week', function(event) {
                var attendanceDate = $(this).data('attendance-date');
                var splitAttendance = attendanceDate.split('-');
                attendanceDate = splitAttendance[2];
                var userData = $(this).closest('tr').children('td:first');
                var userID = $(this).data('user-id');
                var year = splitAttendance[0];
                var month = splitAttendance[1];

                var url = "<?php echo e(route('shifts.mark', [':userid', ':day', ':month', ':year'])); ?>";
                url = url.replace(':userid', userID);
                url = url.replace(':day', attendanceDate);
                url = url.replace(':month', month);
                url = url.replace(':year', year);

                $(MODAL_DEFAULT + ' ' + MODAL_HEADING).html('...');
                $.ajaxModal(MODAL_DEFAULT, url);
            });
        }

        showTable(false);

        <?php if(canDataTableExport()): ?>
            $('#export-all').click(function() {
                var year = $('#year').val();
                var month = $('#month').val();
                var department = $('#department').val();
                var userId = $('#user_id').val();
                var startDate = $('#week_start_date').val();
                var viewType = $('#view_type').val();

                var url =
                    "<?php echo e(route('shifts.export_all', [':year', ':month', ':userId', ':department', ':startDate', ':viewType'])); ?>";
                url = url.replace(':year', year).replace(':month', month).replace(':userId', userId).replace(':department', department).replace(':startDate', startDate).replace(':viewType', viewType);
                window.location.href = url;

            });
        <?php endif; ?>

        $('body').on('click', '.approve-request', function() {
            var id = $(this).data('request-id');
            var url = "<?php echo e(route('shifts-change.approve_request', ':id')); ?>";
            url = url.replace(':id', id);
            var token = '<?php echo e(csrf_token()); ?>';
            $.easyAjax({
                url: url,
                type: "POST",
                blockUI: true,
                container: '.content-wrapper',
                data: {
                    id: id,
                    _token: token
                },
                success: function(data) {
                    showTable();
                    $(MODAL_DEFAULT).modal('hide');
                }
            })

        });

        $('body').on('click', '.decline-request', function() {
            var id = $(this).data('request-id');
            var url = "<?php echo e(route('shifts-change.decline_request', ':id')); ?>";
            url = url.replace(':id', id);
            var token = '<?php echo e(csrf_token()); ?>';
            $.easyAjax({
                url: url,
                type: "POST",
                blockUI: true,
                container: '.content-wrapper',
                data: {
                    id: id,
                    _token: token
                },
                success: function(data) {
                    showTable();
                    $(MODAL_DEFAULT).modal('hide');
                }
            })

        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/shift-rosters/index.blade.php ENDPATH**/ ?>