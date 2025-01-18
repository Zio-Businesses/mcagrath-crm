

<?php $__env->startPush('datatable-styles'); ?>
    <?php echo $__env->make('sections.datatable_css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <style>
        .filter-box {
            z-index: 2;
        }

    </style>
<?php $__env->stopPush(); ?>


<?php
$addLeavePermission = user()->permission('add_leave');
$approveRejectPermission = user()->permission('approve_or_reject_leaves');
?>

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
        <!-- DATE START -->
        <div class="select-box d-flex pr-2 border-right-grey border-right-grey-sm-0">
            <p class="mb-0 pr-2 f-14 text-dark-grey d-flex align-items-center"><?php echo app('translator')->get('app.duration'); ?></p>
            <div class="select-status d-flex">
                <input type="text" class="position-relative text-dark form-control border-0 p-2 text-left f-14 f-w-500 border-additional-grey"
                    id="datatableRange" placeholder="<?php echo app('translator')->get('placeholders.dateRange'); ?>"
                    value="<?php echo e(request('start') && request('end') ? request('start') . ' ' . __('app.to') . ' ' . request('end') : ''); ?>">
            </div>
        </div>
        <!-- DATE END -->

        <!-- SEARCH BY TASK START -->
        <div class="task-search d-flex  py-1 px-lg-2 px-0 border-right-grey align-items-center">
            <form class="w-100 mr-1 mr-lg-0 mr-md-1 ml-md-1 ml-0 ml-lg-0">
                <div class="input-group bg-grey rounded">
                    <div class="input-group-prepend">
                        <span class="input-group-text border-0 bg-additional-grey">
                            <i class="fa fa-search f-13 text-dark-grey"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control f-14 p-1 border-additional-grey" id="search-text-field"
                        placeholder="<?php echo app('translator')->get('app.startTyping'); ?>">
                </div>
            </form>
        </div>
        <!-- SEARCH BY TASK END -->

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

        <!-- MORE FILTERS START -->
        <?php if (isset($component)) { $__componentOriginala4acb898aa829ce2204627839760187d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala4acb898aa829ce2204627839760187d = $attributes; } ?>
<?php $component = App\View\Components\Filters\MoreFilterBox::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filters.more-filter-box'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Filters\MoreFilterBox::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

            <div class="more-filter-items">
                <label class="f-14 text-dark-grey mb-12 text-capitalize" for="usr"><?php echo app('translator')->get('app.employee'); ?></label>
                <div class="select-filter mb-4">
                    <div class="select-others">
                        <select class="form-control select-picker" name="employee_id" id="employee_id"
                            data-live-search="true" data-container="body" data-size="8">
                            <?php if($employees->count() > 1 || in_array('admin', user_roles())): ?>
                                <option value="all"><?php echo app('translator')->get('app.all'); ?></option>
                            <?php endif; ?>
                            <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if (isset($component)) { $__componentOriginal6c7097547485b98631a37d273a171e9f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6c7097547485b98631a37d273a171e9f = $attributes; } ?>
<?php $component = App\View\Components\UserOption::resolve(['user' => $employee] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="more-filter-items">
                <label class="f-14 text-dark-grey mb-12 text-capitalize" for="usr"><?php echo app('translator')->get('modules.leaves.leaveType'); ?></label>
                <div class="select-filter mb-4">
                    <div class="select-others">
                        <select class="form-control select-picker" name="leave_type" id="leave_type" data-live-search="true"
                            data-container="body" data-size="8">
                            <option value="all"><?php echo app('translator')->get('app.all'); ?></option>
                            <?php $__currentLoopData = $leaveTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leaveType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($leaveType->id); ?>"><?php echo e($leaveType->type_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
            </div>

            <?php if($approveRejectPermission == 'all'): ?>
                <div class="more-filter-items">
                    <label class="f-14 text-dark-grey mb-12 text-capitalize" for="usr"><?php echo app('translator')->get('app.status'); ?></label>
                    <div class="select-filter mb-4">
                        <div class="select-others">
                            <select class="form-control select-picker" name="status" id="status" data-live-search="true"
                                data-container="body" data-size="8">
                                <option value="all"><?php echo app('translator')->get('app.all'); ?></option>
                                <option <?php echo e(request('status') == 'approved' ? 'selected' : ''); ?> value="approved">
                                    <?php echo app('translator')->get('app.approved'); ?></option>
                                <option value="pending"><?php echo app('translator')->get('app.pending'); ?></option>
                                <option value="rejected"><?php echo app('translator')->get('app.rejected'); ?></option>
                            </select>
                        </div>
                    </div>
                </div>
            <?php endif; ?>


         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala4acb898aa829ce2204627839760187d)): ?>
<?php $attributes = $__attributesOriginala4acb898aa829ce2204627839760187d; ?>
<?php unset($__attributesOriginala4acb898aa829ce2204627839760187d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala4acb898aa829ce2204627839760187d)): ?>
<?php $component = $__componentOriginala4acb898aa829ce2204627839760187d; ?>
<?php unset($__componentOriginala4acb898aa829ce2204627839760187d); ?>
<?php endif; ?>
        <!-- MORE FILTERS END -->
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
    <div class="content-wrapper">

        <!-- Add Task Export Buttons Start -->
        <div class="d-grid d-lg-flex d-md-flex action-bar">
            <div id="table-actions" class="flex-grow-1 align-items-center">
                <?php if($addLeavePermission == 'all' || $addLeavePermission == 'added'): ?>
                    <?php if (isset($component)) { $__componentOriginaldbb84df4c3a5cbdd95fb35d18ba6410f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldbb84df4c3a5cbdd95fb35d18ba6410f = $attributes; } ?>
<?php $component = App\View\Components\Forms\LinkPrimary::resolve(['link' => route('leaves.create'),'icon' => 'plus'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.link-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\LinkPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-3 openRightModal float-left']); ?>
                        <?php echo app('translator')->get('modules.leaves.addLeave'); ?>
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
            </div>


            <?php if (isset($component)) { $__componentOriginald48019b35c4ccf364e5d37d92848414c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald48019b35c4ccf364e5d37d92848414c = $attributes; } ?>
<?php $component = App\View\Components\Datatable\Actions::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('datatable.actions'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Datatable\Actions::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <div class="select-status mr-3 pl-3">
                    <select name="action_type" class="form-control select-picker" id="quick-action-type" disabled>
                        <option value=""><?php echo app('translator')->get('app.selectAction'); ?></option>
                        <?php if($approveRejectPermission == 'all'): ?>
                            <option value="change-leave-status"><?php echo app('translator')->get('app.changeLeaveStatus'); ?></option>
                        <?php endif; ?>
                        <option value="delete"><?php echo app('translator')->get('app.delete'); ?></option>
                    </select>
                </div>
                <div class="select-status mr-3 d-none quick-action-field" id="change-status-action">
                    <select name="status" class="form-control select-picker">
                        <option value="approved"><?php echo app('translator')->get('app.approved'); ?></option>
                        <option value="pending"><?php echo app('translator')->get('app.pending'); ?></option>
                        <option value="rejected"><?php echo app('translator')->get('app.rejected'); ?></option>
                    </select>
                </div>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald48019b35c4ccf364e5d37d92848414c)): ?>
<?php $attributes = $__attributesOriginald48019b35c4ccf364e5d37d92848414c; ?>
<?php unset($__attributesOriginald48019b35c4ccf364e5d37d92848414c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald48019b35c4ccf364e5d37d92848414c)): ?>
<?php $component = $__componentOriginald48019b35c4ccf364e5d37d92848414c; ?>
<?php unset($__componentOriginald48019b35c4ccf364e5d37d92848414c); ?>
<?php endif; ?>


            <div class="btn-group mt-2 mt-lg-0 mt-md-0 ml-0 ml-lg-3 ml-md-3" role="group" aria-label="Basic example">
                <a href="<?php echo e(route('leaves.index')); ?>" class="btn btn-secondary f-14 btn-active" data-toggle="tooltip"
                    data-original-title="<?php echo app('translator')->get('modules.leaves.tableView'); ?>"><i class="side-icon bi bi-list-ul"></i></a>

                <a href="<?php echo e(route('leaves.calendar')); ?>" class="btn btn-secondary f-14" data-toggle="tooltip"
                    data-original-title="<?php echo app('translator')->get('app.menu.calendar'); ?>"><i class="side-icon bi bi-calendar"></i></a>

                <a href="<?php echo e(route('leaves.personal')); ?>" class="btn btn-secondary f-14" data-toggle="tooltip"
                    data-original-title="<?php echo app('translator')->get('modules.leaves.myLeaves'); ?>"><i class="side-icon bi bi-person"></i></a>
            </div>
        </div>

        <!-- leave table Box Start -->
        <div class="d-flex flex-column w-tables rounded mt-3 bg-white">

            <?php echo $dataTable->table(['class' => 'table table-hover border-0 w-100']); ?>


        </div>
        <!-- leave table End -->

    </div>
    <!-- CONTENT WRAPPER END -->

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>

    <?php echo $__env->make('sections.datatable_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script>
        $('#leaves-table').on('preXhr.dt', function(e, settings, data) {

            <?php if(request('start') && request('end')): ?>
                $('#datatableRange').data('daterangepicker').setStartDate("<?php echo e(request('start')); ?>");
                $('#datatableRange').data('daterangepicker').setEndDate("<?php echo e(request('end')); ?>");
            <?php endif; ?>

            var dateRangePicker = $('#datatableRange').data('daterangepicker');

            let startDate = $('#datatableRange').val();

            let endDate;

            if (startDate == '') {
                startDate = null;
                endDate = null;
            } else {
                startDate = dateRangePicker.startDate.format('<?php echo e(company()->moment_date_format); ?>');
                endDate = dateRangePicker.endDate.format('<?php echo e(company()->moment_date_format); ?>');
            }

            var employeeId = $('#employee_id').val();
            var leaveTypeId = $('#leave_type').val();
            var status = $('#status').val();
            var searchText = $('#search-text-field').val();

            data['startDate'] = startDate;
            data['endDate'] = endDate;
            data['searchText'] = searchText;
            data['employeeId'] = employeeId;
            data['leaveTypeId'] = leaveTypeId;
            data['status'] = status;
        });

        const showTable = () => {
            window.LaravelDataTables["leaves-table"].draw(false);
        }

        $('#start-date, #end-date, #employee_id, #leave_type, #status').on('change keyup',
            function() {
                if ($('#start-date').val() != "") {
                    $('#reset-filters').removeClass('d-none');
                    showTable();
                } else if ($('#end-date').val() != "") {
                    $('#reset-filters').removeClass('d-none');
                    showTable();
                } else if ($('#employee_id').val() != "all") {
                    $('#reset-filters').removeClass('d-none');
                    showTable();
                } else if ($('#leave_type').val() != "all") {
                    $('#reset-filters').removeClass('d-none');
                    showTable();
                } else if ($('#status').val() != "all") {
                    $('#reset-filters').removeClass('d-none');
                    showTable();
                } else {
                    $('#reset-filters').addClass('d-none');
                    showTable();
                }
            });

        $('#search-text-field').on('keyup', function() {
            if ($('#search-text-field').val() != "") {
                $('#reset-filters').removeClass('d-none');
                showTable();
            }
        });

        $('#reset-filters').click(function() {
            $('#filter-form')[0].reset();

            $('.filter-box #status').val('all');
            $('.filter-box .select-picker').selectpicker("refresh");
            $('#reset-filters').addClass('d-none');
            showTable();
        });

        $('#reset-filters-2').click(function() {
            $('#filter-form')[0].reset();

            $('.filter-box #status').val('all');
            $('.filter-box #leave_type').val('all');
            $('.filter-box .select-picker').selectpicker("refresh");
            $('#reset-filters').addClass('d-none');
            showTable();
        });

        $('#quick-action-type').change(function() {
            const actionValue = $(this).val();

            if (actionValue != '') {
                $('#quick-action-apply').removeAttr('disabled');

                if (actionValue == 'change-leave-status') {
                    $('.quick-action-field').addClass('d-none');
                    $('#change-status-action').removeClass('d-none');
                } else {
                    $('.quick-action-field').addClass('d-none');
                }
            } else {
                $('#quick-action-apply').attr('disabled', true);
                $('.quick-action-field').addClass('d-none');
            }
        });

        $('#quick-action-apply').click(function() {
            const actionValue = $('#quick-action-type').val();
            if (actionValue == 'delete') {
                Swal.fire({
                    title: "<?php echo app('translator')->get('messages.sweetAlertTitle'); ?>",
                    text: "<?php echo app('translator')->get('messages.recoverRecord'); ?>",
                    icon: 'warning',
                    showCancelButton: true,
                    focusConfirm: false,
                    confirmButtonText: "<?php echo app('translator')->get('messages.confirmDelete'); ?>",
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
                        applyQuickAction();
                    }
                });

            } else {
                applyQuickAction();
            }
        });

        $('body').on('click', '.delete-table-row', function() {
            var type = $(this).data('type');
            var id = $(this).data('leave-id');
            var uniId = $(this).data('unique-id');
            var duration = $(this).data('duration');
            Swal.fire({
                title: "<?php echo app('translator')->get('messages.sweetAlertTitle'); ?>",
                text: "<?php echo app('translator')->get('messages.recoverRecord'); ?>",
                icon: 'warning',
                showCancelButton: true,
                focusConfirm: false,
                confirmButtonText: "<?php echo app('translator')->get('messages.confirmDelete'); ?>",
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
                    var url = "<?php echo e(route('leaves.destroy', ':id')); ?>";
                    url = url.replace(':id', id);

                    var token = "<?php echo e(csrf_token()); ?>";

                    $.easyAjax({
                        type: 'POST',
                        url: url,
                        blockUI: true,
                        data: {
                            'uniId': uniId,
                            'duration': duration,
                            '_token': token,
                            '_method': 'DELETE'
                        },
                        success: function(response) {
                            if (response.status == "success") {
                                if(type == 'multiple-leave'){
                                    window.location.reload();
                                } else{
                                    showTable();
                                }
                            }
                        }
                    });
                }
            });
        });

        const applyQuickAction = () => {
            var rowdIds = $("#leaves-table input:checkbox:checked").map(function() {
                return $(this).val();
            }).get();

            var url = "<?php echo e(route('leaves.apply_quick_action')); ?>?row_ids=" + rowdIds;

            $.easyAjax({
                url: url,
                container: '#quick-action-form',
                type: "POST",
                disableButton: true,
                buttonSelector: "#quick-action-apply",
                data: $('#quick-action-form').serialize(),
                success: function(response) {
                    if (response.status == 'success') {
                        showTable();
                        resetActionButtons();
                        deSelectAll();
                        $('#quick-action-form').hide();
                    }
                }
            })
        };

        $('body').on('click', '.show-leave', function() {
            var leaveId = $(this).data('leave-id');

            var url = '<?php echo e(route('leaves.show', ':id')); ?>';
            url = url.replace(':id', leaveId);

            $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
            $.ajaxModal(MODAL_LG, url);
        });

        $('body').on('click', '.leave-action-approved', function() {
            let action = $(this).data('leave-action');
            let leaveId = $(this).data('leave-id');
            var type = $(this).data('type');
            if(type == undefined){
                var type = 'single';
            }
            let searchQuery = "?leave_action=" + action + "&leave_id=" + leaveId + "&type=" + type;
            let url = "<?php echo e(route('leaves.show_approved_modal')); ?>" + searchQuery;

            $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
            $.ajaxModal(MODAL_LG, url);
        });

        $('body').on('click', '.leave-action-reject', function() {
            let action = $(this).data('leave-action');
            let leaveId = $(this).data('leave-id');
            var type = $(this).data('type');
            if(type == undefined){
                var type = 'single';
            }
            let searchQuery = "?leave_action=" + action + "&leave_id=" + leaveId + "&type=" + type;
            let url = "<?php echo e(route('leaves.show_reject_modal')); ?>" + searchQuery;

            $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
            $.ajaxModal(MODAL_LG, url);
        });

        $('body').on('click', '.leave-action-preapprove', function() {
            var action = $(this).data('leave-action');
            var leaveId = $(this).data('leave-id');
            var url = "<?php echo e(route('leaves.pre_approve_leave')); ?>";

            Swal.fire({
                title: "<?php echo app('translator')->get('messages.sweetAlertTitle'); ?>",
                text: "<?php echo app('translator')->get('messages.changeLeaveStatusConfirmation'); ?>",
                icon: 'warning',
                showCancelButton: true,
                focusConfirm: false,
                confirmButtonText: "<?php echo app('translator')->get('messages.confirm'); ?>",
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
                    $.easyAjax({
                        type: 'POST',
                        url: url,
                        blockUI: true,
                        data: {
                            'action': action,
                            'leaveId': leaveId,
                            '_token': '<?php echo e(csrf_token()); ?>'
                        },
                        success: function(response) {
                            if (response.status == 'success') {
                                showTable();
                                resetActionButtons();
                                deSelectAll();
                            }
                        }
                    });
                }
            });
        });

        $('body').on('click', '.view-related-leave', function() {
            var leaveId = $(this).data('leave-id');
            var uniqueId = $(this).data('unique-id');

            var url = "<?php echo e(route('leaves.view_related_leave', ':id')); ?>?uniqueId="+uniqueId;
            url = url.replace(':id', leaveId);

            $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
            $.ajaxModal(MODAL_LG, url);
        });

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\leaves\index.blade.php ENDPATH**/ ?>