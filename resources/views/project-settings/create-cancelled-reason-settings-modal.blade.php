<div class="modal-header">
    <h5 class="modal-title">@lang('Add Cancelled Reason')</h5>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<x-form id="createCancelledReason" method="POST" class="ajax-form">
    <div class="modal-body">
        <div class="row">
            <div class="col-sm-12">
                <x-forms.text fieldId="cancelled_reason" :fieldLabel="__('Cancelled Reason')"
                    fieldName="cancelled_reason" fieldRequired="true" :fieldPlaceholder="__('Enter cancelled reason')">
                </x-forms.text>
            </div>

        </div>
    </div>
    <div class="modal-footer">
        <x-forms.button-cancel data-dismiss="modal" class="border-0 mr-3">@lang('app.cancel')</x-forms.button-cancel>
        <x-forms.button-primary id="save-cancelled-reason" icon="check">@lang('app.save')</x-forms.button-primary>
    </div>
</x-form>


<script>

    $('#save-cancelled-reason').click(function () {
        $.easyAjax({
            container: '#createCancelledReason',
            type: "POST",
            disableButton: true,
            blockUI: true,
            buttonSelector: "#save-cancelled-reason",
            url: "{{ route('project-settings.saveCancelledReason') }}",
            data: $('#createCancelledReason').serialize(),
            success: function (response) {
                if (response.status === 'success') {
                    window.location.reload();
                }
            }
        })
    });
</script>
