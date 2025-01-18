<?php
$addTicketPermission = user()->permission('add_tickets');
?>

 <!-- Add Task Export Buttons Start -->
 <div class="d-flex justify-content-between action-bar">
    <div id="table-actions" class="flex-grow-1 align-items-center">
        <?php if($addTicketPermission == 'all' || $addTicketPermission == 'added'): ?>
            <?php if (isset($component)) { $__componentOriginaldbb84df4c3a5cbdd95fb35d18ba6410f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldbb84df4c3a5cbdd95fb35d18ba6410f = $attributes; } ?>
<?php $component = App\View\Components\Forms\LinkPrimary::resolve(['link' => route('tickets.create').'?default_client='.$client->id,'icon' => 'plus'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.link-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\LinkPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-3 openRightModal float-left','data-redirect-url' => ''.e(route('clients.show', $client->id) . '?tab=tickets').'']); ?>
                <?php echo app('translator')->get('modules.tickets.addTicket'); ?>
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

        <?php if(in_array('admin', user_roles())): ?>
            <?php if (isset($component)) { $__componentOriginal5e57c6582b8a883148a28bb7ee46d2ad = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5e57c6582b8a883148a28bb7ee46d2ad = $attributes; } ?>
<?php $component = App\View\Components\Forms\ButtonSecondary::resolve(['icon' => 'pencil-alt'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-secondary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonSecondary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-3 float-left','id' => 'add-ticket']); ?>
                <?php echo app('translator')->get('modules.ticketForm'); ?>
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

    <?php if(!in_array('client', user_roles())): ?>
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
                    <option value="open"><?php echo app('translator')->get('app.open'); ?></option>
                    <option value="pending"><?php echo app('translator')->get('app.pending'); ?></option>
                    <option value="resolved"><?php echo app('translator')->get('app.resolved'); ?></option>
                    <option value="closed"><?php echo app('translator')->get('app.closed'); ?></option>
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
    <?php endif; ?>

</div>

<!-- Add Task Export Buttons End -->
<!-- Task Box Start -->
<div class="d-flex flex-column w-tables rounded mt-3 bg-white">

    <?php echo $dataTable->table(['class' => 'table table-hover border-0 w-100']); ?>


</div>
<!-- Task Box End -->

<?php echo $__env->make('sections.datatable_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script>

        var ticketFilterStatus = "<?php echo e(request('ticketStatus')); ?>";
        $('#ticket-table').on('preXhr.dt', function(e, settings, data) {

            var agentId = $('#agent_id').val();
            var clientID = "<?php echo e($client->id); ?>";
            if (agentId == "") {
                agentId = 0;
            }
            data['agentId'] = agentId;
            data['client_id'] = clientID;
            data['ticketStatus'] = status;

        });
        const showTable = () => {
            window.LaravelDataTables["ticket-table"].draw(false);
        }

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
            var id = $(this).data('ticket-id');
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
                    var url = "<?php echo e(route('tickets.destroy', ':id')); ?>";
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
            var rowdIds = $("#ticket-table input:checkbox:checked").map(function() {
                return $(this).val();
            }).get();

            var url = "<?php echo e(route('tickets.apply_quick_action')); ?>?row_ids=" + rowdIds;

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
                    }
                }
            })
        };

        $('body').on('click', '#add-ticket', function() {
            window.location.href = "<?php echo e(route('ticket-form.index')); ?>";
        });

        function refreshCount() {
            var dateRangePicker = $('#datatableRange').data('daterangepicker');
            var agentId = $('#agent_id').val();
            if (agentId == "") {
                agentId = 0;
            }

            var status = $('#ticket-status').val();
            if (status == "") {
                status = 0;
            }


            var priority = $('#priority').val();
            if (priority == "") {
                priority = 0;
            }

            var channelId = $('#channel_id').val();
            if (channelId == "") {
                channelId = 0;
            }

            var typeId = $('#type_id').val();
            if (typeId == "") {
                typeId = 0;
            }

            var url = "<?php echo e(route('tickets.refresh_count')); ?>";
            $.easyAjax({
                type: 'POST',
                url: url,
                data: {
                    'agentId': agentId,
                    'ticketStatus': status,
                    'priority': priority,
                    'channelId': channelId,
                    'typeId': typeId,
                    '_token': '<?php echo e(csrf_token()); ?>'
                },
                success: function(response) {
                    $('#totalTickets').html(response.totalTickets);
                    $('#closedTickets').html(response.closedTickets);
                    $('#openTickets').html(response.openTickets);
                    $('#pendingTickets').html(response.pendingTickets);
                    $('#resolvedTickets').html(response.resolvedTickets);
                }
            });
        }

        refreshCount();

        $('body').on('click', '#add-ticket', function() {
            window.location.href = "<?php echo e(route('ticket-form.index')); ?>";
        });
    </script>
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\clients\ajax\tickets.blade.php ENDPATH**/ ?>