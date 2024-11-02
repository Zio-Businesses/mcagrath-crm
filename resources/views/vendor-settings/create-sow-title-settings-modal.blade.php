<div class="modal-header">
    <h5 class="modal-title">@lang('Add Scope Of Work Title')</h5>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<x-form id="createSowTitle" method="POST" class="ajax-form">
    <div class="modal-body">
        <div class="row">
            <div class="col-sm-12">
                <x-forms.text fieldId="sow_title" :fieldLabel="__('Scope Of Work Title')"
                    fieldName="sow_title" fieldRequired="true" :fieldPlaceholder="__('Enter scope of work title name')">
                </x-forms.text>
            </div>

        </div>
    </div>
    <div class="modal-footer">
        <x-forms.button-cancel data-dismiss="modal" class="border-0 mr-3">@lang('app.cancel')</x-forms.button-cancel>
        <x-forms.button-primary id="save-sow-title" icon="check">@lang('app.save')</x-forms.button-primary>
    </div>
</x-form>


<script>
    $('#save-sow-title').click(function () {
        $.easyAjax({
            container: '#createSowTitle',
            type: "POST",
            disableButton: true,
            blockUI: true,
            buttonSelector: "#save-sow-title",
            url: "{{ route('vendor-settings.saveSOWTitle') }}",
            data: $('#createSowTitle').serialize(),
            success: function (response) {
                if (response.status === 'success') {
                    window.location.reload();
                }
            }
        })
    });
</script>
