<div class="modal-header">
    <h5 class="modal-title">@lang('Add Project Type')</h5>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<x-form id="createProjectType" method="POST" class="ajax-form">
    <div class="modal-body">
        <div class="row">
            <div class="col-sm-12">
                <x-forms.text fieldId="type" :fieldLabel="__('Type Name')"
                    fieldName="type" fieldRequired="true" :fieldPlaceholder="__('Enter a type name')">
                </x-forms.text>
            </div>

        </div>
    </div>
    <div class="modal-footer">
        <x-forms.button-cancel data-dismiss="modal" class="border-0 mr-3">@lang('app.cancel')</x-forms.button-cancel>
        <x-forms.button-primary id="save-project-type" icon="check">@lang('app.save')</x-forms.button-primary>
    </div>
</x-form>


<script>

    $('#save-project-type').click(function () {
        $.easyAjax({
            container: '#createProjectType',
            type: "POST",
            disableButton: true,
            blockUI: true,
            buttonSelector: "#save-project-type",
            url: "{{ route('project-settings.saveProjectType') }}",
            data: $('#createProjectType').serialize(),
            success: function (response) {
                if (response.status === 'success') {
                    window.location.reload();
                }
            }
        })
    });
</script>
