<?php
$addOrderPermission = user()->permission('add_order');
?>

<!-- ROW START -->
<div class="row py-5">

    <?php if(is_null($project->client_id)): ?>
        <div class="col-lg-12 col-md-12">
            <?php if (isset($component)) { $__componentOriginal269164c77d9d34462c34359c03da6a68 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal269164c77d9d34462c34359c03da6a68 = $attributes; } ?>
<?php $component = App\View\Components\Cards\NoRecord::resolve(['icon' => 'user','message' => __('messages.assignClientFirst')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
        </div>
    <?php else: ?>
        <div class="col-lg-12 col-md-12 mb-4 mb-xl-0 mb-lg-4">
            <!-- Add Task Export Buttons Start -->

            <div class="d-flex" id="table-actions">
                <?php if(!in_array('client', user_roles()) && ($addOrderPermission == 'all' || $addOrderPermission == 'added') && !$project->trashed()): ?>
                    <?php if (isset($component)) { $__componentOriginaldbb84df4c3a5cbdd95fb35d18ba6410f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldbb84df4c3a5cbdd95fb35d18ba6410f = $attributes; } ?>
<?php $component = App\View\Components\Forms\LinkPrimary::resolve(['link' => route('orders.create').'?project_id='.$project->id.'&client_id='.$project->client_id,'icon' => 'plus'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.link-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\LinkPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-3 openRightModal','data-redirect-url' => ''.e(url()->full()).'']); ?>
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
            <!-- Add Task Export Buttons End -->

            <form action="" id="filter-form">
                <div class="d-block d-lg-flex d-md-flex my-3">
                    <!-- STATUS START -->
                    <div class="select-box py-2 px-0 mr-3">
                        <?php if (isset($component)) { $__componentOriginal89b295b0763c93abe0143426334eb5d6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal89b295b0763c93abe0143426334eb5d6 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Label::resolve(['fieldLabel' => __('app.status'),'fieldId' => 'status'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Label::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal89b295b0763c93abe0143426334eb5d6)): ?>
<?php $attributes = $__attributesOriginal89b295b0763c93abe0143426334eb5d6; ?>
<?php unset($__attributesOriginal89b295b0763c93abe0143426334eb5d6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal89b295b0763c93abe0143426334eb5d6)): ?>
<?php $component = $__componentOriginal89b295b0763c93abe0143426334eb5d6; ?>
<?php unset($__componentOriginal89b295b0763c93abe0143426334eb5d6); ?>
<?php endif; ?>
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
                    <!-- STATUS END -->

                    <!-- SEARCH BY TASK START -->
                    <div class="select-box py-2 px-lg-2 px-md-2 px-0 mr-3">
                        <?php if (isset($component)) { $__componentOriginal89b295b0763c93abe0143426334eb5d6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal89b295b0763c93abe0143426334eb5d6 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Label::resolve(['fieldId' => 'status'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Label::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal89b295b0763c93abe0143426334eb5d6)): ?>
<?php $attributes = $__attributesOriginal89b295b0763c93abe0143426334eb5d6; ?>
<?php unset($__attributesOriginal89b295b0763c93abe0143426334eb5d6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal89b295b0763c93abe0143426334eb5d6)): ?>
<?php $component = $__componentOriginal89b295b0763c93abe0143426334eb5d6; ?>
<?php unset($__componentOriginal89b295b0763c93abe0143426334eb5d6); ?>
<?php endif; ?>
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
                    <div class="select-box d-flex py-2 px-lg-2 px-md-2 px-0 mt-4">
                        <?php if (isset($component)) { $__componentOriginal5e57c6582b8a883148a28bb7ee46d2ad = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5e57c6582b8a883148a28bb7ee46d2ad = $attributes; } ?>
<?php $component = App\View\Components\Forms\ButtonSecondary::resolve(['icon' => 'times-circle'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-secondary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonSecondary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'btn-xs d-none height-35 mt-2','id' => 'reset-filters']); ?>
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

            <!-- Task Box Start -->
            <div class="d-flex flex-column w-tables rounded mt-3 bg-white">

                <?php echo $dataTable->table(['class' => 'table table-hover border-0 w-100']); ?>


            </div>
            <!-- Task Box End -->

        </div>
    <?php endif; ?>

</div>
<!-- ROW END -->
<?php echo $__env->make('sections.datatable_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script>
    $('#orders-table').on('preXhr.dt', function(e, settings, data) {
        var projectID = "<?php echo e($project->id); ?>";
        var status = $('#status').val();
        var searchText = $('#search-text-field').val();

        data['projectId'] = projectID;
        data['status'] = status;
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
                else {
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

    $('#clientID, #project_id, #status')
        .on('change keyup',
            function() {
                if ($('#project_id').val() != "all") {
                    $('#reset-filters').removeClass('d-none');
                    showTable();
                } else if ($('#status').val() != "all") {
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
            $('#filter-form #status').val('not finished');
            $('#filter-form .select-picker').selectpicker("refresh");
            $('#reset-filters').addClass('d-none');
            showTable();
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

</script>
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views/projects/ajax/orders.blade.php ENDPATH**/ ?>