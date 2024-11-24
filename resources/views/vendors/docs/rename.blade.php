<div class="modal-header">
    <h5 class="modal-title" id="modelHeading">@lang('Rename File')</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">×</span></button>
</div>
<x-form id="renameFile" method="PUT">
    <div class="modal-body"> 
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <x-forms.text :fieldLabel="__('File Name')"
                    fieldName="filename" fieldRequired="true" fieldId="filter_name" :fieldValue="$name->filename"
                    :fieldPlaceholder="__('Enter file name')"/>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <x-forms.button-cancel data-dismiss="modal" class="border-0 mr-3">@lang('app.close')</x-forms.button-cancel>
        <x-forms.button-primary id="rename-file" icon="check">@lang('app.save')</x-forms.button-primary>
    </div>
</x-form>
<script>
    $('#rename-file').click(function() {
        var url = "{{ route('vendor-docs.update', $name->id) }}";
        $.easyAjax({
            url: url,
            container: '#renameFile',
            type: "POST",
            blockUI: true,
            disableButton: true,
            buttonSelector: '#rename-file',
            data: $('#renameFile').serialize(),
            success: function(response) {
                if (response.status == 'success') {
                    $('#task-file-list').html(response.view);
                    $('.modal:visible').modal('hide');
                }
            }
        })
    });
</script>