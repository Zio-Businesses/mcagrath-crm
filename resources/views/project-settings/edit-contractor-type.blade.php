<div class="modal-header">
    <h5 class="modal-title">@lang('Edit Contractor Type')</h5>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<x-form id="editContractorType" method="POST" class="ajax-form">
    <div class="modal-body">
        <div class="portlet-body">
            <div class="row">

                <div class="col-sm-12">
                    <x-forms.text :fieldLabel="__('app.name')"
                                  fieldName="contractor_type"
                                  fieldId="contractor_type"
                                  fieldRequired="true"
                                  :fieldValue="$contractortype->contractor_type"/>
                </div>

            </div>
        </div>
    </div>
    <div class="modal-footer">
        <x-forms.button-cancel data-dismiss="modal" class="border-0 mr-3">@lang('app.cancel')</x-forms.button-cancel>
        <x-forms.button-primary id="edit-contractortype" icon="check">@lang('app.save')</x-forms.button-primary>
    </div>
</x-form>


<script>
    $('#edit-contractortype').click(function () {
        $.easyAjax({
            container: '#editContractorType',
            type: "PUT",
            disableButton: true,
            blockUI: true,
            buttonSelector: "#edit-contractortype",
            url: "{{ route('ContractorType.update', $contractortype->id) }}",
            data: $('#editContractorType').serialize(),
            success: function (response) {
                if (response.status == 'success') {
                    window.location.reload();
                }
            }
        })
    });
</script>
