<div class="modal-header">
    <h5 class="modal-title">@lang('Add Occupancy Status')</h5>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<x-form id="editOccupancyStatus" method="POST" class="ajax-form">
    <div class="modal-body">
        <div class="portlet-body">
            <div class="row">

                <div class="col-sm-12">
                    <x-forms.text :fieldLabel="__('app.name')"
                                  fieldName="occupancy_status"
                                  fieldId="occupancy_status"
                                  fieldRequired="true"
                                  :fieldValue="$occupancyStatus->occupancy_status"/>
                </div>

            </div>
        </div>
    </div>
    <div class="modal-footer">
        <x-forms.button-cancel data-dismiss="modal" class="border-0 mr-3">@lang('app.cancel')</x-forms.button-cancel>
        <x-forms.button-primary id="edit-category" icon="check">@lang('app.save')</x-forms.button-primary>
    </div>
</x-form>


<script>
    $('#edit-category').click(function () {
        $.easyAjax({
            container: '#editOccupancyStatus',
            type: "PUT",
            disableButton: true,
            blockUI: true,
            buttonSelector: "#save-category",
            url: "{{ route('occupancyStatus.update', $occupancyStatus->id) }}",
            data: $('#editOccupancyStatus').serialize(),
            success: function (response) {
                if (response.status == 'success') {
                    window.location.reload();
                }
            }
        })
    });
</script>
