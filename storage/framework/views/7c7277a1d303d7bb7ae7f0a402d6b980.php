

<?php $__env->startPush('datatable-styles'); ?>
    <?php echo $__env->make('sections.datatable_css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
        <!-- DATE START -->
        <div class="select-box d-flex pr-2 border-right-grey border-right-grey-sm-0">
            <p class="mb-0 pr-2 f-14 text-dark-grey d-flex align-items-center"><?php echo app('translator')->get('app.duration'); ?></p>
            <div class="select-status d-flex">
                <input type="text" class="position-relative text-dark form-control border-0 p-2 text-left f-14 f-w-500 border-additional-grey"
                    id="datatableRange" placeholder="<?php echo app('translator')->get('placeholders.dateRange'); ?>">
            </div>
        </div>
        <!-- DATE END -->

        <?php if(!in_array('client', user_roles())): ?>
            <!-- CLIENT START -->
            <div class="select-box d-flex py-2 px-lg-2 px-md-2 px-0 border-right-grey border-right-grey-sm-0">
                <p class="mb-0 pr-2 f-14 text-dark-grey d-flex align-items-center"><?php echo app('translator')->get('app.client'); ?></p>
                <div class="select-status">
                    <select class="form-control select-picker" id="clientID" data-live-search="true" data-size="8">
                        <option value="all"><?php echo app('translator')->get('app.all'); ?></option>
                        <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if (isset($component)) { $__componentOriginal6c7097547485b98631a37d273a171e9f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6c7097547485b98631a37d273a171e9f = $attributes; } ?>
<?php $component = App\View\Components\UserOption::resolve(['user' => $client] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
            <!-- CLIENT END -->
        <?php endif; ?>

        <!-- SEARCH BY TASK START -->
        <div class="task-search d-flex  py-1 px-lg-3 px-0 border-right-grey align-items-center">
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
                <label class="f-14 text-dark-grey mb-12 text-capitalize" for="usr"><?php echo app('translator')->get('app.project'); ?></label>
                <div class="select-filter mb-4">
                    <div class="select-others">
                        <select class="form-control select-picker" name="project_id" id="filter_project_id"
                            data-container="body" data-live-search="true" data-size="8">
                            <option value="all"><?php echo app('translator')->get('app.all'); ?></option>
                            <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($project->id); ?>"><?php echo e($project->project_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="more-filter-items">
                <label class="f-14 text-dark-grey mb-12 text-capitalize" for="usr"><?php echo app('translator')->get('app.status'); ?></label>
                <div class="select-filter mb-4">
                    <div class="select-others">
                        <select class="form-control select-picker" name="status" id="status" data-live-search="true"
                            data-size="8">
                            <option value="all" data-content="<?php echo app('translator')->get('app.all'); ?>"><?php echo app('translator')->get('app.all'); ?></option>

                            <option value="pending" <?php echo e(request('status') == 'pending' ? 'selected' : ''); ?> data-content="<i class='fa fa-circle mr-2 text-yellow'></i> <?php echo app('translator')->get('app.pending'); ?> "><?php echo app('translator')->get('app.pending'); ?></option>

                            <option value="on-hold" <?php echo e(request('status') == 'on-hold' ? 'selected' : ''); ?> data-content="<i class='fa fa-circle mr-2 text-info'></i> <?php echo app('translator')->get('app.on-hold'); ?> "><?php echo app('translator')->get('app.on-hold'); ?></option>

                            <option value="failed" <?php echo e(request('status') == 'failed' ? 'selected' : ''); ?> data-content="<i class='fa fa-circle mr-2 text-muted'></i> <?php echo app('translator')->get('app.failed'); ?> "><?php echo app('translator')->get('app.failed'); ?></option>

                            <option value="processing" <?php echo e(request('status') == 'processing' ? 'selected' : ''); ?> data-content="<i class='fa fa-circle mr-2 text-blue'></i> <?php echo app('translator')->get('app.processing'); ?> "><?php echo app('translator')->get('app.processing'); ?></option>

                            <option value="completed" <?php echo e(request('status') == 'completed' ? 'selected' : ''); ?> data-content="<i class='fa fa-circle mr-2 text-dark-green'></i> <?php echo app('translator')->get('app.completed'); ?> "><?php echo app('translator')->get('app.completed'); ?></option>

                            <option value="canceled" <?php echo e(request('status') == 'canceled' ? 'selected' : ''); ?> data-content="<i class='fa fa-circle mr-2 text-red'></i> <?php echo app('translator')->get('app.canceled'); ?> "><?php echo app('translator')->get('app.canceled'); ?></option>

                            <option value="refunded" <?php echo e(request('status') == 'refunded' ? 'selected' : ''); ?> data-content="<i class='fa fa-circle mr-2'></i> <?php echo app('translator')->get('app.refunded'); ?> "><?php echo app('translator')->get('app.refunded'); ?></option>
                        </select>
                    </div>
                </div>
            </div>

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

<?php
$addInvoicesPermission = user()->permission('add_invoices');
$addOrderPermission = user()->permission('add_order');
?>

<?php $__env->startSection('content'); ?>
    <!-- CONTENT WRAPPER START -->
    <div class="content-wrapper">
        <!-- Add Task Export Buttons Start -->
        <div class="d-flex">
            <div id="table-actions" class="flex-grow-1 align-items-center">
                <?php if(in_array('client', user_roles()) && in_array('orders', $user->modules) && ($addOrderPermission == 'all' )): ?>
                    <?php if (isset($component)) { $__componentOriginaldbb84df4c3a5cbdd95fb35d18ba6410f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldbb84df4c3a5cbdd95fb35d18ba6410f = $attributes; } ?>
<?php $component = App\View\Components\Forms\LinkPrimary::resolve(['link' => route('products.index'),'icon' => 'plus'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.link-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\LinkPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-3 float-left']); ?>
                        <?php echo app('translator')->get('app.addNewOrder'); ?>
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

                <?php if(!in_array('client', user_roles()) && ($addOrderPermission == 'all' || $addOrderPermission == 'added')): ?>
                    <?php if (isset($component)) { $__componentOriginaldbb84df4c3a5cbdd95fb35d18ba6410f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldbb84df4c3a5cbdd95fb35d18ba6410f = $attributes; } ?>
<?php $component = App\View\Components\Forms\LinkPrimary::resolve(['link' => route('orders.create'),'icon' => 'plus'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.link-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\LinkPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-3 float-left']); ?>
                        <?php echo app('translator')->get('app.addNewOrder'); ?>
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
        </div>

        <!-- Add Task Export Buttons End -->
        <!-- Task Box Start -->
        <div class="d-flex flex-column w-tables rounded mt-3 bg-white">

            <?php echo $dataTable->table(['class' => 'table table-hover border-0 w-100']); ?>


        </div>
        <!-- Task Box End -->
    </div>
    <!-- CONTENT WRAPPER END -->

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <?php echo $__env->make('sections.datatable_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php if($bankDetails != null): ?>
        <script>
            var bankAccounts = <?php echo json_encode($bankDetails->mapWithKeys(function ($account) {
                return [$account['id'] => $account['bank_name'] . ' | ' . $account['account_name']];
            }), 15, 512) ?>;
        </script>
    <?php else: ?>
        <script>
            var bankAccounts = {};
        </script>
    <?php endif; ?>

    <script>
        $('#orders-table').on('preXhr.dt', function(e, settings, data) {

            var dateRangePicker = $('#datatableRange').data('daterangepicker');
            var startDate = $('#datatableRange').val();

            if (startDate == '') {
                startDate = null;
                endDate = null;
            } else {
                startDate = dateRangePicker.startDate.format('<?php echo e(company()->moment_date_format); ?>');
                endDate = dateRangePicker.endDate.format('<?php echo e(company()->moment_date_format); ?>');
            }

            var projectID = $('#filter_project_id').val();
            if (!projectID) {
                projectID = 0;
            }
            var clientID = $('#clientID').val();
            var status = $('#status').val();

            var searchText = $('#search-text-field').val();

            data['clientID'] = clientID;
            data['projectID'] = projectID;
            data['status'] = status;
            data['startDate'] = startDate;
            data['endDate'] = endDate;
            data['searchText'] = searchText;
        });

        const showTable = () => {
            window.LaravelDataTables["orders-table"].draw(false);
        }

        function changeOrderStatus(orderID, status) {
            var url = "<?php echo e(route('orders.change_status')); ?>";
            var token = "<?php echo e(csrf_token()); ?>";
            var id = orderID;
            var statusMessage = '';

            if (id != "" && status != "") {

                switch (status) {
                    case 'pending':
                        statusMessage = "<?php echo app('translator')->get('messages.orderStatus.pending'); ?>";
                        break;
                    case 'on-hold':
                        statusMessage = "<?php echo app('translator')->get('messages.orderStatus.onHold'); ?>";
                        break;
                    case 'failed':
                        statusMessage = "<?php echo app('translator')->get('messages.orderStatus.failed'); ?>";
                        break;
                    case 'processing':
                        statusMessage = "<?php echo app('translator')->get('messages.orderStatus.processing'); ?>";
                        break;
                    case 'completed':
                        statusMessage = "<?php echo app('translator')->get('messages.orderStatus.completed'); ?>";
                        break;
                    case 'canceled':
                        statusMessage = "<?php echo app('translator')->get('messages.orderStatus.canceled'); ?>";
                        break;
                    case 'refunded':
                        statusMessage = "<?php echo app('translator')->get('messages.orderStatus.refunded'); ?>";
                        break;

                    default:
                        statusMessage = "<?php echo app('translator')->get('messages.orderStatus.pending'); ?>";
                        break;
                }

                Swal.fire({
                    title: "<?php echo app('translator')->get('messages.confirmation.orderStatusChange'); ?>",
                    text: statusMessage,
                    icon: 'warning',
                    showCancelButton: true,
                    focusConfirm: false,
                    confirmButtonText: "<?php echo app('translator')->get('app.yes'); ?>",
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
                        if (status === 'completed' && Object.keys(bankAccounts).length > 0) {
                            Swal.fire({
                                title: "<?php echo app('translator')->get('messages.selectBank'); ?>",
                                input: 'select',
                                inputOptions: bankAccounts,
                                inputPlaceholder: "<?php echo app('translator')->get('messages.selectBank'); ?>",
                                showCancelButton: true,
                                inputValidator: (value) => {
                                    return new Promise((resolve) => {
                                        resolve();
                                    });
                                }
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    let selectedBankAccount = result.value;
                            
                                    $.easyAjax({
                                        url: url,
                                        type: "POST",
                                        container: '.content-wrapper',
                                        blockUI: true,
                                        data: {
                                            '_token': token,
                                            orderId: id,
                                            status: status,
                                            bank_account_id: selectedBankAccount
                                        },
                                        success: function(data) {
                                            showTable();
                                        }
                                    });
                                }
                            });
                        } else {
                            $.easyAjax({
                                url: url,
                                type: "POST",
                                container: '.content-wrapper',
                                blockUI: true,
                                data: {
                                    '_token': token,
                                    orderId: id,
                                    status: status,
                                },
                                success: function(data) {
                                    showTable();
                                }
                            });
                        }
                    } else {
                        showTable();
                    }
                });

            }
        }


        $('#orders-table').on('change', '.order-status', function() {
            var id = $(this).data('order-id');
            var status = $(this).val();

            changeOrderStatus(id, status);
        });

        $('#orders-table').on('click', '.orderStatusChange', function() {
            var id = $(this).data('order-id');
            var status = $(this).data('status');

            changeOrderStatus(id, status);
        });

        $('#clientID, #status')
            .on('change keyup',
                function() {
                    if ($('#status').val() != "all") {
                        $('#reset-filters').removeClass('d-none');
                        showTable();
                    } else if ($('#clientID').val() != "all") {
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

            $('.filter-box .select-picker').selectpicker("refresh");
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
            var id = $(this).data('order-id');
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
                    var url = "<?php echo e(route('orders.destroy', ':id')); ?>";
                    url = url.replace(':id', id);

                    var token = "<?php echo e(csrf_token()); ?>";

                    $.easyAjax({
                        type: 'POST',
                        url: url,
                        blockUI: true,
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

        $('body').on('click', '.unpaidAndPartialPaidCreditNote', function() {
            var id = $(this).data('invoice-id');

            Swal.fire({
                title: "<?php echo app('translator')->get('messages.confirmation.createCreditNotes'); ?>",
                text: "<?php echo app('translator')->get('messages.creditText'); ?>",
                icon: 'warning',
                showCancelButton: true,
                focusConfirm: false,
                confirmButtonText: "<?php echo app('translator')->get('app.yes'); ?>",
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
                    var url = "<?php echo e(route('creditnotes.create')); ?>?invoice=:id";
                    url = url.replace(':id', id);

                    location.href = url;
                }
            });
        });

        const applyQuickAction = () => {
            var rowdIds = $("#invoices-table input:checkbox:checked").map(function() {
                return $(this).val();
            }).get();

            var url = "<?php echo e(route('invoices.apply_quick_action')); ?>?row_ids=" + rowdIds;

            $.easyAjax({
                url: url,
                container: '#quick-action-form',
                type: "POST",
                disableButton: true,
                buttonSelector: "#quick-action-apply",
                data: $('#quick-action-form').serialize(),
                blockUI: true,
                success: function(response) {
                    if (response.status == 'success') {
                        showTable();
                        resetActionButtons();
                    }
                }
            })
        };

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\orders\index.blade.php ENDPATH**/ ?>