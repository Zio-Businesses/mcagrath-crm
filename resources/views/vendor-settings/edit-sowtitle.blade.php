<div class="modal-header">
    <h5 class="modal-title">@lang('Edit Scope Of Work Tile')</h5>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<x-form id="editScopeOfWork" method="POST" class="ajax-form">
    <div class="modal-body">
        <div class="portlet-body">
            <div class="row">

                <div class="col-sm-12">
                    <x-forms.text :fieldLabel="__('Enter scope of work name')"
                        fieldName="sow_title"
                        fieldId="sow_title"
                        fieldRequired="true"
                        :fieldValue="$sow_title->sow_title"/>
                </div>

            </div>
        </div>
    </div>
    <div class="modal-footer">
        <x-forms.button-cancel data-dismiss="modal" class="border-0 mr-3">@lang('app.cancel')</x-forms.button-cancel>
        <x-forms.button-primary id="edit-sowtitle" icon="check">@lang('app.save')</x-forms.button-primary>
    </div>
</x-form>


<script>
    $('#edit-sowtitle').click(function () {
        $.easyAjax({
            container: '#editScopeOfWork',
            type: "PUT",
            disableButton: true,
            blockUI: true,
            buttonSelector: "#save-category",
            url: "{{ route('SOWTitle.update', $sow_title->id) }}",
            data: $('#editScopeOfWork').serialize(),
            success: function (response) {
                if (response.status == 'success') {
                    window.location.reload();
                }
            }
        })
    });
</script>
