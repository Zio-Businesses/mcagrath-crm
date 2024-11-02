<div class="modal-header">
    <h5 class="modal-title">@lang('Add Work Order Status')</h5>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<x-form id="createWorkOrderStatus" method="POST" class="ajax-form">
    <div class="modal-body">
        <div class="row">
            <div class="col-sm-12">
                <x-forms.text fieldId="wo_status" :fieldLabel="__('Work Order Status')"
                    fieldName="wo_status" fieldRequired="true" :fieldPlaceholder="__('Enter work order status name')">
                </x-forms.text>
            </div>

        </div>
    </div>
    <div class="modal-footer">
        <x-forms.button-cancel data-dismiss="modal" class="border-0 mr-3">@lang('app.cancel')</x-forms.button-cancel>
        <x-forms.button-primary id="save-work-order" icon="check">@lang('app.save')</x-forms.button-primary>
    </div>
</x-form>


<script>
    $('#save-work-order').click(function () {
        $.easyAjax({
            container: '#createWorkOrderStatus',
            type: "POST",
            disableButton: true,
            blockUI: true,
            buttonSelector: "#save-work-order",
            url: "{{ route('vendor-settings.saveWorkOrderStatus') }}",
            data: $('#createWorkOrderStatus').serialize(),
            success: function (response) {
                if (response.status === 'success') {
                    window.location.reload();
                }
            }
        })
    });
</script>
