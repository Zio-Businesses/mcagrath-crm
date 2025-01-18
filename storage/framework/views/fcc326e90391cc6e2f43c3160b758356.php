<?php
$addLeadFilePermission = user()->permission('add_lead_files');
?>

<!-- ROW START -->
<div class="row">
    <!--  USER CARDS START -->
    <div class="col-xl-12 col-lg-12 col-md-12 mb-4 mb-xl-0 mb-lg-4 mb-md-0">
        <div class="d-flex">
            <div id="table-actions" class="flex-grow-1 align-items-center">
                <?php if($addLeadFilePermission == 'all' || $addLeadFilePermission == 'added'): ?>
                    <?php if (isset($component)) { $__componentOriginaldbb84df4c3a5cbdd95fb35d18ba6410f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldbb84df4c3a5cbdd95fb35d18ba6410f = $attributes; } ?>
<?php $component = App\View\Components\Forms\LinkPrimary::resolve(['link' => 'javascript:;','icon' => 'plus'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.link-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\LinkPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'add-files','class' => 'mr-3 float-left','data-lead-id' => ''.e($deal->id).'']); ?>
                        <?php echo app('translator')->get('app.add'); ?>
                        <?php echo app('translator')->get('modules.lead.file'); ?>
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

            <div class="btn-group" role="group">
                <a id="list-tabs" href="javascript:;" onclick="leadFilesView('listview')"
                    class="btn btn-secondary f-14 layout btn-active" data-toggle="tooltip" data-tab-name="listview"
                    data-original-title="List View"><i class="side-icon bi bi-list-ul"></i></a>

                <a id="thumbnail" href="javascript:;" onclick="leadFilesView('gridview')"
                    class="btn btn-secondary f-14 layout" data-toggle="tooltip" data-tab-name="gridview"
                    data-original-title="Grid View"><i class="side-icon bi bi-grid"></i></a>
            </div>
        </div>

        <div class="d-flex flex-column mt-3">
            <div id="layout">

                <?php echo $__env->make('leads.lead-files.ajax-list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

        </div>
    </div>
    <!--  USER CARDS END -->
</div>
<!-- ROW END -->


<script>
    var fileLayout = 'listview';
    function leadFilesView(layout) {
        $('#layout').html('');
        var leadID = "<?php echo e($deal->id); ?>";
        fileLayout = layout;
        $.easyAjax({
            type: 'GET',
            url: "<?php echo e(route('deal-files.layout')); ?>",
            disableButton: true,
            blockUI: true,
            data: {
                id: leadID,
                layout: layout
            },
            success: function(response) {
                $('#layout').html(response.html);
                if (layout == 'gridview') {
                    $('#list-tabs').removeClass('btn-active');
                    $('#thumbnail').addClass('btn-active');
                } else {
                    $('#list-tabs').addClass('btn-active');
                    $('#thumbnail').removeClass('btn-active');
                }
            }
        });
    }

    $('body').on('click', '.delete-lead-file', function() {
        var id = $(this).data('file-id');
        var deleteView = $(this).data('pk');
        Swal.fire({
            title: "<?php echo app('translator')->get('messages.sweetAlertTitle'); ?>",
            text: "<?php echo app('translator')->get('messages.removeFileText'); ?>",
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
                var url = "<?php echo e(route('deal-files.destroy', ':id')); ?>";
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
                            leadFilesView(fileLayout);
                        }
                    }
                });
            }
        });
    });
</script>
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\leads\ajax\files.blade.php ENDPATH**/ ?>