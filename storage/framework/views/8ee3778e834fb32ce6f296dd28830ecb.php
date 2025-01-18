<?php
$addLeadFollowUpPermission = user()->permission('add_lead_follow_up');
$viewLeadFollowUpPermission = user()->permission('view_lead_follow_up');
$editLeadFollowUpPermission = user()->permission('edit_lead_follow_up');
$deleteLeadFollowUpPermission = user()->permission('delete_lead_follow_up');
?>

<!-- ROW START -->
<div class="row">
    <!--  USER CARDS START -->
    <div class="col-lg-12 col-md-12 mb-4 mb-xl-0 mb-lg-4">
        <?php if($deal->leadStage->slug == 'win' || $deal->leadStage->slug == 'lost'): ?>
        <?php if (isset($component)) { $__componentOriginal5194778a3a7b899dcee5619d0610f5cf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5194778a3a7b899dcee5619d0610f5cf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.alert','data' => ['type' => 'info','icon' => 'info-circle']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'info','icon' => 'info-circle']); ?><?php echo app('translator')->get('messages.cantAddFollowup'); ?>  <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5194778a3a7b899dcee5619d0610f5cf)): ?>
<?php $attributes = $__attributesOriginal5194778a3a7b899dcee5619d0610f5cf; ?>
<?php unset($__attributesOriginal5194778a3a7b899dcee5619d0610f5cf); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5194778a3a7b899dcee5619d0610f5cf)): ?>
<?php $component = $__componentOriginal5194778a3a7b899dcee5619d0610f5cf; ?>
<?php unset($__componentOriginal5194778a3a7b899dcee5619d0610f5cf); ?>
<?php endif; ?>
    <?php endif; ?>
       <div class="d-flex" id="table-actions">

            <?php if($deal->leadStage->slug != 'win' && $deal->leadStage->slug != 'lost' && ($addLeadFollowUpPermission == 'all' || $addLeadFollowUpPermission == 'added')): ?>
                <?php if (isset($component)) { $__componentOriginalcf8d12533ff890e0d6573daf32b7618d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcf8d12533ff890e0d6573daf32b7618d = $attributes; } ?>
<?php $component = App\View\Components\Forms\ButtonPrimary::resolve(['icon' => 'plus'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'add-lead-followup','class' => 'mr-3']); ?>
                    <?php echo app('translator')->get('modules.followup.newFollowUp'); ?>
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
            <?php endif; ?>


        </div>
        <?php if($viewLeadFollowUpPermission == 'all' || $viewLeadFollowUpPermission == 'added'): ?>
            <div class="d-flex flex-column w-tables rounded mt-3 bg-white">
                <?php echo $dataTable->table(['class' => 'table table-hover border-0 w-100']); ?>

            </div>
        <?php endif; ?>

    </div>
    <!--  USER CARDS END -->
</div>
<!-- ROW END -->
<?php echo $__env->make('sections.datatable_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script>

    $('#leadfollowup-table').on('preXhr.dt', function(e, settings, data) {

    var leadId = "<?php echo e($deal->id); ?>";
    data['leadId'] = leadId;
    });
    const showTable = () => {
    window.LaravelDataTables["leadfollowup-table"].draw(false);
    }
    $('body').on('click', '.delete-table-row-lead', function() {
        var id = $(this).data('followup-id');
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
                var url = "<?php echo e(route('deals.follow_up_delete', ':id')); ?>";
                url = url.replace(':id', id);

                var token = "<?php echo e(csrf_token()); ?>";

                $.easyAjax({
                    type: 'POST',
                    url: url,
                    data: {
                        '_token': token,
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

    $('#add-lead-followup').click(function() {
        const url = "<?php echo e(route('deals.follow_up', $leadId)); ?>";
        $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
        $.ajaxModal(MODAL_LG, url);
    })

    $('body').on('click', '.edit-table-row-lead', function() {
        var id = $(this).data('followup-id');
        var url = "<?php echo e(route('deals.follow_up_edit', ':id')); ?>";
        url = url.replace(':id', id);
        $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
        $.ajaxModal(MODAL_LG, url);
    });
    $('body').on('change', '.status', function() {
        var status = $(this).val();
        var followUpId = $(this).data('followup-id');
        console.log(followUpId);
        var url = "<?php echo e(route('deals.change_follow_up_status')); ?>";
        var token = "<?php echo e(csrf_token()); ?>";

        $.easyAjax({
            url:url,
            type:'POST',
            blockUI: true,
            data: {
                '_token': token,
                id: followUpId,
                status: status,
                sortBy: 'id'
            },
        });
    })
</script>
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\leads\ajax\follow-up.blade.php ENDPATH**/ ?>