<x-form id="add-notes-title" method="POST" class="ajax-form">
    <div class="modal-header">
        <h5 class="modal-title" id="modelHeading">@lang('Notes Title')</h5>
        <button type="button"  class="close" data-dismiss="modal" aria-label="Close"><span
                aria-hidden="true">×</span></button>
    </div>
    <div class="modal-body">
        <div class="portlet-body">
                <div class="form-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <x-forms.text fieldId="notes_title" :fieldLabel="__('Enter notes title name')"
                                fieldName="notes_title" fieldRequired="true">
                            </x-forms.text>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <div class="modal-footer">
        <x-forms.button-cancel data-dismiss="modal" class="border-0 mr-3">@lang('app.close')</x-forms.button-cancel>
        <x-forms.button-primary id="save-notestitle" icon="check">@lang('app.save')</x-forms.button-primary>
    </div>
</x-form>

<script>
    // save source
    
    $('#save-notestitle').click(function() {
        $.easyAjax({
            url: "{{ route('notesTitle.store') }}",
            container: '#add-notes-title',
            type: "POST",
            blockUI: true,
            disableButton: true,
            buttonSelector: "#save-notestitle",
            data: $('#add-notes-title').serialize(),
            success: function(response) {
                if (response.status == "success") {
                    if($('table#example').length) {
                        window.location.reload();
                    }
                }
            }
        })
    });
</script>
