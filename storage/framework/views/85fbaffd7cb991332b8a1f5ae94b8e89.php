<?php
$addTaskPermission = user()->permission('add_tasks');
?>

<!-- ROW START -->
<div class="row py-0 py-md-0 py-lg-3">
    <div class="col-lg-12 col-md-12 mb-4 mb-xl-0 mb-lg-4">

        <form action="" id="filter-form">
            <div class="d-flex my-3">
                <!-- STATUS START -->
                <div class="select-box py-2 px-0 mr-3">
                    <select class="form-control select-picker" name="status" id="status">
                        <option value="not finished"><?php echo app('translator')->get('modules.tasks.hideCompletedTask'); ?></option>
                        <option value="all"><?php echo app('translator')->get('app.all'); ?></option>
                        <?php $__currentLoopData = $taskBoardStatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($status->id); ?>"><?php echo e($status->slug == 'completed' || $status->slug == 'incomplete' ? __('app.' . $status->slug) : $status->column_name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <!-- STATUS END -->

                <!-- SEARCH BY TASK START -->
                <div class="select-box py-2 px-lg-2 px-md-2 px-0 mr-3">

                    <div class="input-group bg-grey rounded">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-additional-grey">
                                <i class="fa fa-search f-13 text-dark-grey"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control f-14 p-1 height-35 border" id="search-text-field"
                            placeholder="<?php echo app('translator')->get('app.startTyping'); ?>">
                    </div>
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
            </div>
        </form>

        <!-- Add Task Export Buttons Start -->
        <div class="d-flex justify-content-between action-bar">
            <div id="table-actions" class="align-items-center">
                <?php if($addTaskPermission == 'all' || $addTaskPermission == 'added'): ?>
                    <?php if (isset($component)) { $__componentOriginaldbb84df4c3a5cbdd95fb35d18ba6410f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldbb84df4c3a5cbdd95fb35d18ba6410f = $attributes; } ?>
<?php $component = App\View\Components\Forms\LinkPrimary::resolve(['link' => route('tasks.create').'?default_assign='.$employee->id,'icon' => 'plus'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.link-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\LinkPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-3 openRightModal float-left','data-redirect-url' => ''.e(url()->full()).'']); ?>
                        <?php echo app('translator')->get('app.addTask'); ?>
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
                        <option value="change-status"><?php echo app('translator')->get('modules.tasks.changeStatus'); ?></option>
                        <option value="delete"><?php echo app('translator')->get('app.delete'); ?></option>
                    </select>
                </div>
                <div class="select-status mr-3 d-none quick-action-field" id="change-status-action">
                    <select name="status" class="form-control select-picker">
                        <?php $__currentLoopData = $taskBoardStatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($status->id); ?>"><?php echo e($status->slug == 'completed' || $status->slug == 'incomplete' ? __('app.' . $status->slug) : $status->column_name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

        </div>

        <!-- Task Box Start -->
        <div class="d-flex flex-column w-tables rounded mt-3 bg-white">

            <?php echo $dataTable->table(['class' => 'table table-hover border-0 w-100']); ?>


        </div>
        <!-- Task Box End -->
    </div>
</div>

<?php echo $__env->make('sections.datatable_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script>
    $('#allTasks-table').on('preXhr.dt', function(e, settings, data) {

        var assignedTo = "<?php echo e($employee->id); ?>";
        var status = $('#status').val();
        var searchText = $('#search-text-field').val();

        data['assignedTo'] = assignedTo;
        data['status'] = status;
        data['searchText'] = searchText;
    });
    const showTable = () => {
        window.LaravelDataTables["allTasks-table"].draw(false);
    }

    $('#status').on('change keyup',
        function() {
            if ($('#status').val() != "not finished") {
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

    $('#reset-filters,#reset-filters-2').click(function() {
        $('#filter-form')[0].reset();
        $('#filter-form #status').val('not finished');
        $('#filter-form .select-picker').selectpicker("refresh");
        $('#reset-filters').addClass('d-none');
        showTable();
    });

    $('#quick-action-type').change(function() {
        const actionValue = $(this).val();
        if (actionValue != '') {
            $('#quick-action-apply').removeAttr('disabled');

            if (actionValue == 'change-status') {
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
        var id = $(this).data('user-id');
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
                var url = "<?php echo e(route('tasks.destroy', ':id')); ?>";
                url = url.replace(':id', id);

                var token = "<?php echo e(csrf_token()); ?>";

                $.easyAjax({
                    type: 'POST',
                    url: url,
                    data: {
                        '_token': token,
                        '_method': 'DELETE'
                    },
                    success: function(response) {
                        if (response.status == "success") {
                            showTable();
                        }
                    }
                });
            }
        });
    });

    const applyQuickAction = () => {
        var rowdIds = $("#allTasks-table input:checkbox:checked").map(function() {
            return $(this).val();
        }).get();

        var url = "<?php echo e(route('tasks.apply_quick_action')); ?>?row_ids=" + rowdIds;

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
                }
            }
        })
    };

    $('#allTasks-table').on('change', '.change-status', function() {
        var url = "<?php echo e(route('tasks.change_status')); ?>";
        var token = "<?php echo e(csrf_token()); ?>";
        var id = $(this).data('task-id');
        var status = $(this).val();

        if (id != "" && status != "") {
            $.easyAjax({
                url: url,
                type: "POST",
                data: {
                    '_token': token,
                    taskId: id,
                    status: status,
                    sortBy: 'id'
                },
                success: function(data) {
                    window.LaravelDataTables["allTasks-table"].draw(false);
                }
            });

        }
    });

    $('#allTasks-table').on('click', '.start-timer', function() {
        var url = "<?php echo e(route('timelogs.start_timer')); ?>";
        var user_id = "<?php echo e(user()->id); ?>";
        var token = "<?php echo e(csrf_token()); ?>";
        var task_id = $(this).data('task-id');
        var memo = "<?php echo e(__('app.task')); ?>#" + $(this).data('task-id');

        $.easyAjax({
            url: url,
            container: '#allTasks-table',
            type: "POST",
            blockUI: true,
            data: {
                task_id: task_id,
                memo: memo,
                '_token': token,
                user_id: user_id
            },
            success: function(response) {
                if (response.status == 'success') {
                    if (response.activeTimerCount > 0) {
                        $('#show-active-timer .active-timer-count').html(response.activeTimerCount);
                    } else {
                        $('#show-active-timer .active-timer-count').addClass('d-none');
                    }

                    $('#timer-clock').html(response.clockHtml);
                    if ($('#allTasks-table').length) {
                        window.LaravelDataTables["allTasks-table"].draw(false);
                    }
                }
            }
        })
    });

    $('#allTasks-table').on('click', '.stop-timer', function() {
        var id = $(this).data('time-id');
        var url = "<?php echo e(route('timelogs.stop_timer', ':id')); ?>";
        url = url.replace(':id', id);
        var token = '<?php echo e(csrf_token()); ?>';
        $.easyAjax({
            url: url,
            blockUI: true,
            container: '#allTasks-table',
            type: "POST",
            data: {
                timeId: id,
                _token: token
            },
            success: function(response) {
                if (response.activeTimerCount > 0) {
                    $('#show-active-timer .active-timer-count').html(response.activeTimerCount);
                } else {
                    $('#show-active-timer .active-timer-count').addClass('d-none');
                }

                $('#timer-clock').html('');
                if ($('#allTasks-table').length) {
                    window.LaravelDataTables["allTasks-table"].draw(false);
                }
            }
        })
    });

    $('#allTasks-table').on('click', '.resume-timer', function() {
        var id = $(this).data('time-id');
        var url = "<?php echo e(route('timelogs.resume_timer', ':id')); ?>";
        url = url.replace(':id', id);
        var token = '<?php echo e(csrf_token()); ?>';
        $.easyAjax({
            url: url,
            blockUI: true,
            type: "POST",
            data: {
                timeId: id,
                _token: token
            },
            success: function(response) {
                if (response.status == 'success') {
                    if (response.activeTimerCount > 0) {
                        $('#show-active-timer .active-timer-count').html(response.activeTimerCount);
                    } else {
                        $('#show-active-timer .active-timer-count').addClass('d-none');
                    }

                    $('#timer-clock').html(response.clockHtml);
                    if ($('#allTasks-table').length) {
                        window.LaravelDataTables["allTasks-table"].draw(false);
                    }
                }
            }
        })
    });

    $('#allTasks-table').on('click', '.pause-timer', function() {
        var id = $(this).data('time-id');
        var url = "<?php echo e(route('timelogs.pause_timer', ':id')); ?>";
        url = url.replace(':id', id);
        var token = '<?php echo e(csrf_token()); ?>';
        $.easyAjax({
            url: url,
            blockUI: true,
            type: "POST",
            disableButton: true,
            buttonSelector: "#pause-timer-btn",
            data: {
                timeId: id,
                _token: token
            },
            success: function(response) {
                if (response.status == 'success') {
                    if (response.activeTimerCount > 0) {
                        $('#show-active-timer .active-timer-count').html(response.activeTimerCount);
                    } else {
                        $('#show-active-timer .active-timer-count').addClass('d-none');
                    }

                    $('#timer-clock').html(response.clockHtml);
                    if ($('#allTasks-table').length) {
                        window.LaravelDataTables["allTasks-table"].draw(false);
                    }
                }
            }
        })
    });
</script>
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\employees\ajax\tasks.blade.php ENDPATH**/ ?>