<div class="modal-header">
    <h5 class="modal-title">@lang('Add Property Type')</h5>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<x-form id="createPropertyType" method="POST" class="ajax-form">
    <div class="modal-body">
        <div class="row">
            <div class="col-sm-12">
                <x-forms.text fieldId="property_type" :fieldLabel="__('Property Type Name')"
                    fieldName="property_type" fieldRequired="true" :fieldPlaceholder="__('Enter a property type name')">
                </x-forms.text>
            </div>

        </div>
    </div>
    <div class="modal-footer">
        <x-forms.button-cancel data-dismiss="modal" class="border-0 mr-3">@lang('app.cancel')</x-forms.button-cancel>
        <x-forms.button-primary id="save-property-type" icon="check">@lang('app.save')</x-forms.button-primary>
    </div>
</x-form>


<script>

    $('#save-property-type').click(function () {
        $.easyAjax({
            container: '#createPropertyType',
            type: "POST",
            disableButton: true,
            blockUI: true,
            buttonSelector: "#save-property-type",
            url: "{{ route('project-settings.savePropertyType') }}",
            data: $('#createPropertyType').serialize(),
            success: function (response) {
                if (response.status === 'success') {
                    window.location.reload();
                }
            }
        })
    });
</script>
