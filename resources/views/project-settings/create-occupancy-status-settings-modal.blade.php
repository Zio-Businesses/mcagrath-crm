<div class="modal-header">
    <h5 class="modal-title">@lang('Add Occupancy Status')</h5>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<x-form id="createOccupancyStatus" method="POST" class="ajax-form">
    <div class="modal-body">
        <div class="row">
            <div class="col-sm-12">
                <x-forms.text fieldId="occupancy_status" :fieldLabel="__('Occupancy Status Name')"
                    fieldName="occupancy_status" fieldRequired="true" :fieldPlaceholder="__('Enter a occupancy status name')">
                </x-forms.text>
            </div>

        </div>
    </div>
    <div class="modal-footer">
        <x-forms.button-cancel data-dismiss="modal" class="border-0 mr-3">@lang('app.cancel')</x-forms.button-cancel>
        <x-forms.button-primary id="save-occupancy-status" icon="check">@lang('app.save')</x-forms.button-primary>
    </div>
</x-form>


<script>

    $('#save-occupancy-status').click(function () {
        $.easyAjax({
            container: '#createOccupancyStatus',
            type: "POST",
            disableButton: true,
            blockUI: true,
            buttonSelector: "#save-occupancy-status",
            url: "{{ route('project-settings.saveOccupancyStatus') }}",
            data: $('#createOccupancyStatus').serialize(),
            success: function (response) {
                if (response.status === 'success') {
                    window.location.reload();
                }
            }
        })
    });
</script>
