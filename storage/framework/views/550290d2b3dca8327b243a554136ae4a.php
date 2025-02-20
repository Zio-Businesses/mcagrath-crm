<?php
$editLeavePermission = user()->permission('edit_leave');
$deleteLeavePermission = user()->permission('delete_leave');
$approveRejectPermission = user()->permission('approve_or_reject_leaves');
?>

<div class="row">
    <div class="col-sm-12">
        <div class="card bg-white border-0 b-shadow-4">
            <div class="card-header bg-white  border-bottom-grey text-capitalize justify-content-between p-20">
                <div class="row">
                    <div class="col-lg-8 col-xs-4">
                        <h3 class="heading-h1 mb-3"><?php echo app('translator')->get('app.multipleDetails'); ?></h3>
                    </div>
                    <div class="col-lg-4 col-xs-8 text-right">
                        <?php
                            if($pendingCountLeave != count($multipleLeaves)){
                                $approveTitle = __('modules.leaves.approveRemaining');
                                $rejectTitle = __('modules.leaves.rejectRemaining');
                            }
                            else {
                                $approveTitle = __('modules.leaves.approveAll');
                                $rejectTitle = __('modules.leaves.rejectAll');
                            }
                        ?>

                        <?php if($pendingCountLeave > 0 && $approveRejectPermission == 'all'): ?>
                            <a class="btn btn-secondary rounded f-14 p-2 leave-action-approved" data-leave-id="<?php echo e($multipleLeaves->first()->unique_id); ?>"
                                data-leave-action="approved" data-type="approveAll" class="mr-3" icon="check" href="javascript:;">
                                <i class="fa fa-check mr-2"></i><?php echo e($approveTitle); ?></a>

                            <a class="btn btn-secondary rounded f-14 p-2 leave-action-reject" data-leave-id="<?php echo e($multipleLeaves->first()->unique_id); ?>"
                                data-leave-action="rejected" data-type="rejectAll" class="mr-3" icon="check" href="javascript:;">
                                <i class="fa fa-times mr-2"></i><?php echo e($rejectTitle); ?></a>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
            <div class="card-body">
                <?php echo $__env->make('leaves.multiple-leave-table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>
</div>

<script>
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

    $('body').on('click', '.delete-multiple-leave', function() {
        var type = $(this).data('type');
        var id = $(this).data('leave-id');
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
                        '_token': token,
                        '_method': 'DELETE'
                    },
                    success: function(response) {
                        if(response.status == "success"){
                            if(response.redirectUrl == undefined){
                                window.location.reload();
                            } else{
                                window.location.href = response.redirectUrl;
                            }
                        }
                    }
                });
            }
        });
    });
</script>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/leaves/ajax/multiple-leaves.blade.php ENDPATH**/ ?>