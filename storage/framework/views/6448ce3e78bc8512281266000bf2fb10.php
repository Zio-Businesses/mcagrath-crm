<?php $__env->startPush('datatable-styles'); ?>
    <?php echo $__env->make('sections.datatable_css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <style>
        .value-list li {
            list-style: disc;
        }
        .dataTables_filter {
            display: block !important;
            padding-top: 20px;
        }

    </style>
<?php $__env->stopPush(); ?>

<div class="col-lg-12 col-md-12 ntfcn-tab-content-left">
        <table class="table w-100 table-sm-responsive" id="users-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>State</th>
                    <th>County</th>
                    <th>City</th>
                    <th>Actions</th>
                </tr>
            </thead>
        </table>
</div>
<div class="w-100 border-top-grey set-btns">
    <?php if (isset($component)) { $__componentOriginal22960d0612890da31753448e47f28003 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal22960d0612890da31753448e47f28003 = $attributes; } ?>
<?php $component = App\View\Components\SettingFormActions::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('setting-form-actions'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SettingFormActions::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
        <?php if (isset($component)) { $__componentOriginalcf8d12533ff890e0d6573daf32b7618d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcf8d12533ff890e0d6573daf32b7618d = $attributes; } ?>
<?php $component = App\View\Components\Forms\ButtonPrimary::resolve(['icon' => 'plus'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'add-new-location','class' => 'mr-3']); ?><?php echo app('translator')->get('Add New Location'); ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcf8d12533ff890e0d6573daf32b7618d)): ?>
<?php $attributes = $__attributesOriginalcf8d12533ff890e0d6573daf32b7618d; ?>
<?php unset($__attributesOriginalcf8d12533ff890e0d6573daf32b7618d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcf8d12533ff890e0d6573daf32b7618d)): ?>
<?php $component = $__componentOriginalcf8d12533ff890e0d6573daf32b7618d; ?>
<?php unset($__componentOriginalcf8d12533ff890e0d6573daf32b7618d); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginal5e57c6582b8a883148a28bb7ee46d2ad = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5e57c6582b8a883148a28bb7ee46d2ad = $attributes; } ?>
<?php $component = App\View\Components\Forms\ButtonSecondary::resolve(['icon' => 'file-upload'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-secondary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonSecondary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'importLocation','class' => 'mr-3']); ?> <?php echo app('translator')->get('Import'); ?>
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
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal22960d0612890da31753448e47f28003)): ?>
<?php $attributes = $__attributesOriginal22960d0612890da31753448e47f28003; ?>
<?php unset($__attributesOriginal22960d0612890da31753448e47f28003); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal22960d0612890da31753448e47f28003)): ?>
<?php $component = $__componentOriginal22960d0612890da31753448e47f28003; ?>
<?php unset($__componentOriginal22960d0612890da31753448e47f28003); ?>
<?php endif; ?>
</div>
<?php $__env->startPush('scripts'); ?>

    <script src="<?php echo e(asset('vendor/datatables/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/datatables/dataTables.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/datatables/dataTables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/datatables/buttons.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/datatables/buttons.server-side.js')); ?>"></script>

        <script>
            function setPaginationButtons() {
                if (window.innerWidth <= 767) {
                    $.fn.dataTable.ext.pager.numbers_length = 3; // Mobile view: limit to 3 buttons
                } else {
                    $.fn.dataTable.ext.pager.numbers_length = 7; // Desktop view: limit to 5 buttons
                }
            }
           $(function () {
                setPaginationButtons();
                var table = $('#users-table').dataTable({
                    responsive: true,
                    processing: true,
                    serverSide: true,
                    ajax: '<?php echo route('locations.getLocations'); ?>',
                    columns: [
                        {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                        {data: 'state', name: 'state'},
                        {data: 'county', name: 'county'},
                        {data: 'city', name: 'city'},
                        { 
                            data: 'actions', 
                            name: 'actions', 
                            orderable: false, 
                            searchable: false,
                            className: "text-right",
                            width: '20%',
                            render: function(data, type, row) {
                                return `
                                    <div class="task_view"> 
                                    <a data-user-id="${row.id}" class="task_view_more d-flex align-items-center justify-content-center edit-locations" href="javascript:;" > 
                                    <i class="fa fa-edit icons mr-2"></i>Edit
                                    </a> 
                                    </div>
                                    <div class="task_view"> 
                                    <a data-user-id="${row.id}" class="task_view_more d-flex align-items-center justify-content-center delete-locations" href="javascript:;"  >
                                    <i class="fa fa-trash icons mr-2"></i> Delete
                                    </a>
                                    </div>
                                `;
                            }
                        },
                    ],
                });
            });

            $('#importLocation').click(function () {
                var url = "<?php echo e(route('location.importLocation')); ?>";
                $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
                $.ajaxModal(MODAL_LG, url);
            });
            $('#add-new-location').click(function () {
                var url = "<?php echo e(route('locations.create')); ?>";
                $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
                $.ajaxModal(MODAL_LG, url);
            });
            $('body').on('click', '.edit-locations', function () {
                const id = $(this).data('user-id');
                let url = "<?php echo e(route('locations.edit',':id')); ?>";
                url = url.replace(':id', id);
                $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
                $.ajaxModal(MODAL_LG, url);
            });
            $('body').on('click', '.delete-locations', function () {
                
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

                            var url = "<?php echo e(route('locations.destroy', ':id')); ?>";
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
                                success: function (response) {
                                    if (response.status == "success") {
                                        window.location.reload();
                                    }
                                }
                            });
                        }
                    });
                });
                                

        </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/app-settings/ajax/location-setting.blade.php ENDPATH**/ ?>