

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
        <div class="d-flex" id="table-actions">

        </div>
        <!-- Add Task Export Buttons End -->
        <!-- Task Box Start -->
        <div class="d-flex flex-column w-tables rounded mt-3 bg-white">

            <?php echo $dataTable->table(['class' => 'table table-hover border-0 w-100']); ?>


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
                        <option value="delete"><?php echo app('translator')->get('app.delete'); ?></option>
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
        <!-- Task Box End -->
    </div>
    <!-- CONTENT WRAPPER END -->

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <?php echo $__env->make('sections.datatable_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script>
        $('#lead-notes-table').on('preXhr.dt', function(e, settings, data) {
            var searchText = $('#search-text-field').val();
            var clientId = '<?php echo e(user()->id); ?>';

            data['clientID'] = clientId;
            data['searchText'] = searchText;
        });

        const showTable = () => {
            window.LaravelDataTables["lead-notes-table"].draw(false);
        }

        $('#search-text-field').on('change keyup', function() {
            if ($('#search-text-field').val() != "") {
                $('#reset-filters').removeClass('d-none');
                showTable();
            } else {
                $('#reset-filters').addClass('d-none');
                showTable();
            }
        });

        $('#reset-filters').click(function() {
            $('#filter-form')[0].reset();
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
                var url = "<?php echo e(route('lead-notes.destroy', ':id')); ?>";
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
        var rowdIds = $("#client-notes-table input:checkbox:checked").map(function() {
            return $(this).val();
        }).get();

        var url = "<?php echo e(route('lead-notes.apply_quick_action')); ?>?row_ids=" + rowdIds;

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

    $('body').on('click', '.ask-for-password', function() {
        let clientNoteId = $(this).data('client-note-id');

        var url = "<?php echo e(route('client_notes.ask_for_password', ':id')); ?>";
        url = url.replace(':id', clientNoteId);

        $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
        $.ajaxModal(MODAL_LG, url);

    });

    // show note detail in right modal
    var getNoteDetail = function(id) {
        openTaskDetail();

        var url = "<?php echo e(route('client-notes.show', ':id')); ?>";
        url = url.replace(':id', id);

        $.easyAjax({
            url: url,
            blockUI: true,
            container: RIGHT_MODAL,
            historyPush: true,
            success: function(response) {
                if (response.status == "success") {
                    $(RIGHT_MODAL_CONTENT).html(response.html);
                    $(RIGHT_MODAL_TITLE).html(response.title);
                }
            },
            error: function(request, status, error) {
                if (request.status == 403) {
                    $(RIGHT_MODAL_CONTENT).html(
                        '<div class="align-content-between d-flex justify-content-center mt-105 f-21">403 | Permission Denied</div>'
                    );
                } else if (request.status == 404) {
                    $(RIGHT_MODAL_CONTENT).html(
                        '<div class="align-content-between d-flex justify-content-center mt-105 f-21">404 | Not Found</div>'
                    );
                } else if (request.status == 500) {
                    $(RIGHT_MODAL_CONTENT).html(
                        '<div class="align-content-between d-flex justify-content-center mt-105 f-21">500 | Something Went Wrong</div>'
                    );
                }
            }
        });
    };


    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\lead-contact\notes\index.blade.php ENDPATH**/ ?>