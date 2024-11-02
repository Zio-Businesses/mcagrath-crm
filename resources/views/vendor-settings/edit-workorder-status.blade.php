<div class="modal-header">
    <h5 class="modal-title">@lang('Edit Work Order Status')</h5>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<x-form id="editWorkOrderStatus" method="POST" class="ajax-form">
    <div class="modal-body">
        <div class="portlet-body">
            <div class="row">

                <div class="col-sm-12">
                    <x-forms.text :fieldLabel="__('Enter work order status name')"
                        fieldName="wo_status"
                        fieldId="wo_status"
                        fieldRequired="true"
                        :fieldValue="$wo_status->wo_status"/>
                </div>

            </div>
        </div>
    </div>
    <div class="modal-footer">
        <x-forms.button-cancel data-dismiss="modal" class="border-0 mr-3">@lang('app.cancel')</x-forms.button-cancel>
        <x-forms.button-primary id="edit-workorder-status" icon="check">@lang('app.save')</x-forms.button-primary>
    </div>
</x-form>


<script>
    $('#edit-workorder-status').click(function () {
        $.easyAjax({
            container: '#editWorkOrderStatus',
            type: "PUT",
            disableButton: true,
            blockUI: true,
            buttonSelector: "#save-category",
            url: "{{ route('WorkOrderStatus.update', $wo_status->id) }}",
            data: $('#editWorkOrderStatus').serialize(),
            success: function (response) {
                if (response.status == 'success') {
                    window.location.reload();
                }
            }
        })
    });
</script>
