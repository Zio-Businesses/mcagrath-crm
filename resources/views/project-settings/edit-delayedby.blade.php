<div class="modal-header">
    <h5 class="modal-title">@lang('Add Delayed By')</h5>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<x-form id="editDelayedBy" method="POST" class="ajax-form">
    <div class="modal-body">
        <div class="portlet-body">
            <div class="row">

                <div class="col-sm-12">
                    <x-forms.text :fieldLabel="__('app.name')"
                                  fieldName="delayed_by"
                                  fieldId="delayed_by"
                                  fieldRequired="true"
                                  :fieldValue="$delayedBy->delayed_by"/>
                </div>

            </div>
        </div>
    </div>
    <div class="modal-footer">
        <x-forms.button-cancel data-dismiss="modal" class="border-0 mr-3">@lang('app.cancel')</x-forms.button-cancel>
        <x-forms.button-primary id="edit-delayedby" icon="check">@lang('app.save')</x-forms.button-primary>
    </div>
</x-form>


<script>
    $('#edit-delayedby').click(function () {
        $.easyAjax({
            container: '#editDelayedBy',
            type: "PUT",
            disableButton: true,
            blockUI: true,
            buttonSelector: "#edit-delayedby",
            url: "{{ route('delayedBy.update', $delayedBy->id) }}",
            data: $('#editDelayedBy').serialize(),
            success: function (response) {
                if (response.status == 'success') {
                    window.location.reload();
                }
            }
        })
    });
</script>
