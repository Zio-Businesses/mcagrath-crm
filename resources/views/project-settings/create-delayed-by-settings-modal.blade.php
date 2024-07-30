<div class="modal-header">
    <h5 class="modal-title">@lang('Add Delayed By')</h5>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<x-form id="createDelayedBy" method="POST" class="ajax-form">
    <div class="modal-body">
        <div class="row">
            <div class="col-sm-12">
                <x-forms.text fieldId="delayed_by" :fieldLabel="__('Delayed By Name')"
                    fieldName="delayed_by" fieldRequired="true" :fieldPlaceholder="__('Enter a delayed by name')">
                </x-forms.text>
            </div>

        </div>
    </div>
    <div class="modal-footer">
        <x-forms.button-cancel data-dismiss="modal" class="border-0 mr-3">@lang('app.cancel')</x-forms.button-cancel>
        <x-forms.button-primary id="save-delayed-by" icon="check">@lang('app.save')</x-forms.button-primary>
    </div>
</x-form>


<script>

    $('#save-delayed-by').click(function () {
        $.easyAjax({
            container: '#createDelayedBy',
            type: "POST",
            disableButton: true,
            blockUI: true,
            buttonSelector: "#save-delayed-by",
            url: "{{ route('project-settings.saveDelayedBy') }}",
            data: $('#createDelayedBy').serialize(),
            success: function (response) {
                if (response.status === 'success') {
                    window.location.reload();
                }
            }
        })
    });
</script>
