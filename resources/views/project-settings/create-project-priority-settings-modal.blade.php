<div class="modal-header">
    <h5 class="modal-title">@lang('Add Project Priority')</h5>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<x-form id="createProjectPriority" method="POST" class="ajax-form">
    <div class="modal-body">
        <div class="row">
            <div class="col-sm-12">
                <x-forms.text fieldId="priority" :fieldLabel="__('Priority Name')"
                    fieldName="priority" fieldRequired="true" :fieldPlaceholder="__('Enter a priority name')">
                </x-forms.text>
            </div>

        </div>
    </div>
    <div class="modal-footer">
        <x-forms.button-cancel data-dismiss="modal" class="border-0 mr-3">@lang('app.cancel')</x-forms.button-cancel>
        <x-forms.button-primary id="save-project-priority" icon="check">@lang('app.save')</x-forms.button-primary>
    </div>
</x-form>


<script>

    $('#save-project-priority').click(function () {
        $.easyAjax({
            container: '#createProjectPriority',
            type: "POST",
            disableButton: true,
            blockUI: true,
            buttonSelector: "#save-project-priority",
            url: "{{ route('project-settings.saveProjectPriority') }}",
            data: $('#createProjectPriority').serialize(),
            success: function (response) {
                if (response.status === 'success') {
                    window.location.reload();
                }
            }
        })
    });
</script>
