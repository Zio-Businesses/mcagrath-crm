<div class="modal-header">
    <h5 class="modal-title">@lang('Add Cancelled Reason')</h5>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<x-form id="editCancelledReason" method="POST" class="ajax-form">
    <div class="modal-body">
        <div class="portlet-body">
            <div class="row">

                <div class="col-sm-12">
                    <x-forms.text :fieldLabel="__('Cancelled Reason')"
                        fieldName="cancelled_reason"
                        fieldId="cancelled_reason"
                        fieldRequired="true"
                        :fieldValue="$cancelledreason->cancelled_reason"/>
                </div>

            </div>
        </div>
    </div>
    <div class="modal-footer">
        <x-forms.button-cancel data-dismiss="modal" class="border-0 mr-3">@lang('app.cancel')</x-forms.button-cancel>
        <x-forms.button-primary id="edit-cancelled-reason" icon="check">@lang('app.save')</x-forms.button-primary>
    </div>
</x-form>


<script>
    $('#edit-cancelled-reason').click(function () {
        $.easyAjax({
            container: '#editCancelledReason',
            type: "PUT",
            disableButton: true,
            blockUI: true,
            buttonSelector: "#save-category",
            url: "{{ route('CancelledReason.update', $cancelledreason->id) }}",
            data: $('#editCancelledReason').serialize(),
            success: function (response) {
                if (response.status == 'success') {
                    window.location.reload();
                }
            }
        })
    });
</script>
