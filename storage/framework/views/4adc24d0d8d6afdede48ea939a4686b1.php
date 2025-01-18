

<?php $__env->startPush('styles'); ?>

    <?php echo $__env->make('sections.datatable_css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <style>
        .value-list li {
            list-style: disc;
        }
    </style>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <!-- SETTINGS START -->
    <div class="w-100 d-flex">

        <?php echo $__env->make('sections.setting-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php if (isset($component)) { $__componentOriginalcb8848b8ae159c08072bf1971fc3ca1f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcb8848b8ae159c08072bf1971fc3ca1f = $attributes; } ?>
<?php $component = App\View\Components\SettingCard::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('setting-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SettingCard::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

             <?php $__env->slot('buttons', null, []); ?> 
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <?php if (isset($component)) { $__componentOriginalcf8d12533ff890e0d6573daf32b7618d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcf8d12533ff890e0d6573daf32b7618d = $attributes; } ?>
<?php $component = App\View\Components\Forms\ButtonPrimary::resolve(['icon' => 'plus'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'add-field','class' => 'mb-2']); ?> <?php echo app('translator')->get('modules.customFields.addField'); ?>
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
                    </div>
                </div>
             <?php $__env->endSlot(); ?>

             <?php $__env->slot('header', null, []); ?> 
                <div class="s-b-n-header" id="tabs">
                    <h2 class="mb-0 p-20 f-21 font-weight-normal text-capitalize border-bottom-grey">
                        <?php echo app('translator')->get($pageTitle); ?></h2>
                </div>
             <?php $__env->endSlot(); ?>

            <!-- LEAVE SETTING START -->
            <div class="col-lg-12 col-md-12 ntfcn-tab-content-left">
                <?php if (isset($component)) { $__componentOriginal7d9f6e0b9001f5841f72577781b2d17f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7d9f6e0b9001f5841f72577781b2d17f = $attributes; } ?>
<?php $component = App\View\Components\Table::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Table::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'table w-100 table-sm-responsive']); ?>
                     <?php $__env->slot('thead', null, []); ?> 
                        <th>#</th>
                        <th><?php echo app('translator')->get('app.module'); ?></th>
                        <th><?php echo app('translator')->get('modules.customFields.label'); ?></th>
                        <th><?php echo app('translator')->get('modules.invoices.type'); ?></th>
                        <th><?php echo app('translator')->get('app.value'); ?></th>
                        <th><?php echo app('translator')->get('app.required'); ?></th>
                        <th><?php echo app('translator')->get('modules.customFields.showInTable'); ?></th>
                        <th><?php echo app('translator')->get('modules.customFields.export'); ?></th>

                        <th class="text-right"><?php echo app('translator')->get('app.action'); ?></th>
                     <?php $__env->endSlot(); ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7d9f6e0b9001f5841f72577781b2d17f)): ?>
<?php $attributes = $__attributesOriginal7d9f6e0b9001f5841f72577781b2d17f; ?>
<?php unset($__attributesOriginal7d9f6e0b9001f5841f72577781b2d17f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7d9f6e0b9001f5841f72577781b2d17f)): ?>
<?php $component = $__componentOriginal7d9f6e0b9001f5841f72577781b2d17f; ?>
<?php unset($__componentOriginal7d9f6e0b9001f5841f72577781b2d17f); ?>
<?php endif; ?>
            </div>
            <!-- LEAVE SETTING END -->

         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcb8848b8ae159c08072bf1971fc3ca1f)): ?>
<?php $attributes = $__attributesOriginalcb8848b8ae159c08072bf1971fc3ca1f; ?>
<?php unset($__attributesOriginalcb8848b8ae159c08072bf1971fc3ca1f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcb8848b8ae159c08072bf1971fc3ca1f)): ?>
<?php $component = $__componentOriginalcb8848b8ae159c08072bf1971fc3ca1f; ?>
<?php unset($__componentOriginalcb8848b8ae159c08072bf1971fc3ca1f); ?>
<?php endif; ?>

    </div>
    <!-- SETTINGS END -->

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>

    <script src="<?php echo e(asset('vendor/datatables/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/datatables/dataTables.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/datatables/dataTables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/datatables/buttons.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/datatables/buttons.server-side.js')); ?>"></script>

    <script>

        $(function () {

            const table = $('#example').dataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: '<?php echo route('custom-fields.index'); ?>',
                order: [[0, "desc"]],
                deferRender: true,
                language: {
                    "url": "<?php echo e(__("app.datatable")); ?>"
                },
                "fnDrawCallback": function (oSettings) {
                    $("body").tooltip({
                        selector: '[data-toggle="tooltip"]'
                    });
                },
                columns: [
                    {data: 'id', name: 'id', orderable: true, searchable: false, visible: false},
                    {data: 'module', name: 'custom_field_groups.name', orderable: true, searchable: true},
                    {data: 'label', name: 'label', orderable: true, searchable: true},
                    {data: 'type', name: 'type', orderable: true, searchable: true},
                    {data: 'values', name: 'values', orderable: true, searchable: true},
                    {data: 'required', name: 'required', orderable: true, searchable: true},
                    {data: 'visible', name: 'visible', orderable: true, searchable: true},
                    {data: 'export', name: 'export', orderable: true, searchable: true},
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        width: "25%",
                        className: "text-right"
                    }
                ]
            });

            $('body').on('click', '.sa-params', function () {
                const id = $(this).data('user-id');

                Swal.fire({
                    title: "<?php echo app('translator')->get('messages.sweetAlertTitle'); ?>",
                    text: "<?php echo app('translator')->get('messages.deleteField'); ?>",
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

                        let url = "<?php echo e(route('custom-fields.destroy',':id')); ?>";
                        url = url.replace(':id', id);

                        const token = "<?php echo e(csrf_token()); ?>";

                        $.easyAjax({
                            type: 'POST',
                            url: url,
                            blockUI: true,
                            data: {'_token': token, '_method': 'DELETE'},
                            success: function (response) {
                                if (response.status == "success") {
                                    $.unblockUI();
                                    table._fnDraw();
                                }
                            }
                        });
                    }
                });
            });

        });

        $('body').on('click', '#add-field', function () {
            const url = "<?php echo e(route('custom-fields.create')); ?>";
            $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
            $.ajaxModal(MODAL_LG, url);
        });

        $('body').on('click', '.edit-custom-field', function () {
            const id = $(this).data('user-id');
            let url = "<?php echo e(route('custom-fields.edit',':id')); ?>";
            url = url.replace(':id', id);
            $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
            $.ajaxModal(MODAL_LG, url);
        });

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\custom-fields\index.blade.php ENDPATH**/ ?>