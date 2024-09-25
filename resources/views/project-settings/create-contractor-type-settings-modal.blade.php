<div class="modal-header">
    <h5 class="modal-title">@lang('Add Delayed By')</h5>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<x-form id="createContractorType" method="POST" class="ajax-form">
    <div class="modal-body">
        <div class="row">
            <div class="col-sm-12">
                <x-forms.text fieldId="contractor_type" :fieldLabel="__('Contractor Type Name')"
                    fieldName="contractor_type" fieldRequired="true" :fieldPlaceholder="__('Enter a contractor type')">
                </x-forms.text>
            </div>

        </div>
    </div>
    <div class="modal-footer">
        <x-forms.button-cancel data-dismiss="modal" class="border-0 mr-3">@lang('app.cancel')</x-forms.button-cancel>
        <x-forms.button-primary id="save-contractor-type" icon="check">@lang('app.save')</x-forms.button-primary>
    </div>
</x-form>


<script>

    $('#save-contractor-type').click(function () {
        $.easyAjax({
            container: '#createContractorType',
            type: "POST",
            disableButton: true,
            blockUI: true,
            buttonSelector: "#save-contractor-type",
            url: "{{ route('project-settings.saveContractorType') }}",
            data: $('#createContractorType').serialize(),
            success: function (response) {
                if (response.status === 'success') {
                    window.location.reload();
                }
            }
        })
    });
</script>
