<?php
    $addInvoicePermission = user()->permission('add_invoices');
?>

<!-- ROW START -->
<div class="row py-5">
    <div class="col-lg-12 col-md-12 mb-4 mb-xl-0 mb-lg-4">
         <!-- Add Task Export Buttons Start -->
        <div class="d-flex" id="table-actions">
        </div>
        <!-- Add Task Export Buttons End -->
        <!-- Task Box Start -->
        <div class="d-flex flex-column w-tables rounded mt-3 bg-white">
            <?php echo $dataTable->table(['class' => 'table table-hover border-0 w-100']); ?>

        </div>
        <!-- Task Box End -->
    </div>
</div>
<!-- ROW END -->
<?php echo $__env->make('sections.datatable_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script>
    $('#recurring-invoices-table').on('preXhr.dt', function(e, settings, data) {

        var projectID = "<?php echo e($invoice->project_id); ?>";
        var recurringID = "<?php echo e($recurringID); ?>";
        data['projectID'] = projectID;
        data['recurringID'] = recurringID;
    });
    const showTable = () => {
        window.LaravelDataTables["recurring-invoices-table"].draw(false);
    }

    $('body').on('click', '.cancel-invoice', function() {
        var id = $(this).data('invoice-id');
        Swal.fire({
            title: "<?php echo app('translator')->get('messages.sweetAlertTitle'); ?>",
            text: "<?php echo app('translator')->get('messages.invoiceText'); ?>",
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

                var url = "<?php echo e(route('invoices.update_status',':id')); ?>";
                url = url.replace(':id', id);

                var token = "<?php echo e(csrf_token()); ?>";

                $.easyAjax({
                    type: 'GET',
                    url: url,
                    success: function(response) {
                        if (response.status == "success") {
                            window.LaravelDataTables["recurring-invoices-table"].draw(false);
                        }
                    }
                });
            }
        });
    });

    $('body').on('click', '.unpaidAndPartialPaidCreditNote', function(){
        var id = $(this).data('invoice-id');
        Swal.fire({
            title: "<?php echo app('translator')->get('messages.sweetAlertTitle'); ?>",
            text: "<?php echo app('translator')->get('messages.creditText'); ?>",
            icon: 'warning',
            showCancelButton: true,
            focusConfirm: false,
            confirmButtonText: "<?php echo app('translator')->get('messages.confirmCreate'); ?>",
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

                var url = "<?php echo e(route('creditnotes.convert-invoice',':id')); ?>";
                url = url.replace(':id', id);

                location.href = url;
            }
        });
    });


    $('body').on('click', '.sendButton', function() {
        var id = $(this).data('invoice-id');
        var url = "<?php echo e(route('invoices.send_invoice', ':id')); ?>";
        url = url.replace(':id', id);

        var token = "<?php echo e(csrf_token()); ?>";

        $.easyAjax({
            type: 'POST',
            url: url,
            container: '#recurring-invoices-table',
            blockUI: true,
            data: {
                '_token': token
            },
            success: function(response) {
                if (response.status == "success") {
                    window.LaravelDataTables["recurring-invoices-table"].draw(false);
                }
            }
        });
    });

    $('body').on('click', '.reminderButton', function() {
        var id = $(this).data('invoice-id');
        var url = "<?php echo e(route('invoices.payment_reminder', ':id')); ?>";
        url = url.replace(':id', id);

        var token = "<?php echo e(csrf_token()); ?>";

        $.easyAjax({
            type: 'GET',
            container: '#recurring-invoices-table',
            blockUI: true,
            url: url,
            success: function(response) {
                if (response.status == "success") {
                    $.unblockUI();
                    window.LaravelDataTables["recurring-invoices-table"].draw(false);
                }
            }
        });
    });

    $('body').on('click', '.invoice-upload', function() {
        var invoiceId = $(this).data('invoice-id');
        const url = "<?php echo e(route('invoices.file_upload')); ?>?invoice_id=" + invoiceId;
        $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
        $.ajaxModal(MODAL_LG, url);
    });

    $('body').on('click', '#recurring-invoice', function() {
        window.location.href = "<?php echo e(route('recurring-invoices.index')); ?> ";
    });

    function toggleShippingAddress(invoiceId) {
        let url = "<?php echo e(route('invoices.toggle_shipping_address', ':id')); ?>";
        url = url.replace(':id', invoiceId);

        $.easyAjax({
            url: url,
            type: 'GET',
            success: function (response) {
                if (response.status === 'success') {
                    window.LaravelDataTables["recurring-invoices-table"].draw(false);
                }
            }
        })
    }

    function addShippingAddress(invoiceId) {
        let url = "<?php echo e(route('invoices.shipping_address_modal', ':id')); ?>";
        url = url.replace(':id', invoiceId);

        $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
        $.ajaxModal(MODAL_LG, url);
    }


</script>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/recurring-invoices/ajax/invoices.blade.php ENDPATH**/ ?>