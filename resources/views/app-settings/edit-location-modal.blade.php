<div class="modal-header">
    <h5 class="modal-title">@lang('Edit Location')</h5>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<x-form id="createLocation" method="PUT" class="ajax-form">
    <div class="modal-body">
        <div class="row">
            <div class="col-lg-4 col-md-3">
                <x-forms.text class="mr-0 mr-lg-2 mr-md-2" :fieldLabel="__('State')"
                                fieldName="state"  fieldId="state"
                                :fieldPlaceholder="__('State')" :fieldValue="$locations->state"/>
            </div>
            <div class="col-lg-4 col-md-3">
                <x-forms.text class="mr-0 mr-lg-2 mr-md-2" :fieldLabel="__('County')"
                                fieldName="county"  fieldId="county"
                                :fieldPlaceholder="__('County')" :fieldValue="$locations->county"/>
            </div>
            <div class="col-lg-4 col-md-3">
                <x-forms.text class="mr-0 mr-lg-2 mr-md-2" :fieldLabel="__('City')"
                                fieldName="city"  fieldId="city"
                                :fieldPlaceholder="__('City')" :fieldValue="$locations->city"/>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <x-forms.button-cancel data-dismiss="modal" class="border-0 mr-3">@lang('app.cancel')</x-forms.button-cancel>
        <x-forms.button-primary id="save-location" icon="check">@lang('app.save')</x-forms.button-primary>
    </div>
</x-form>


<script>
    $('#save-location').click(function () {
        $.easyAjax({
            container: '#createLocation',
            type: "PUT",
            disableButton: true,
            blockUI: true,
            buttonSelector: "#save-location",
            url: "{{ route('locations.update', $locations->id) }}",
            data: $('#createLocation').serialize(),
            success: function (response) {
                if (response.status === 'success') {
                    window.location.href="{{ route('app-settings.index') }}?tab=location-setting";
                }
            }
        })
    });
</script>
