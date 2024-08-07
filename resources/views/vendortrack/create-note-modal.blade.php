<div class="modal-header">
    <h5 class="modal-title">@lang('Add Notes')</h5>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<x-form id="createNotes" method="POST" class="ajax-form">
    <input type="hidden" name="vendor_id" value="{{ $vendor_id }}">
    <div class="modal-body">
        <div class="row">
            <div class="col-md-3 col-lg-3">
                <x-forms.select fieldId="notes_title" :fieldLabel="__('Notes Title')" fieldName="notes_title"  search="true" fieldRequired="true">
                    <option value="">--</option>
                    @foreach ($notestitle as $type)
                        <option value="{{ $type->notes_title }}">{{$type->notes_title}}</option>
                    @endforeach
                </x-forms.select>
            </div>
            <div class="col-md-12">
                <x-forms.textarea class="mr-0 mr-lg-2 mr-md-2" :fieldLabel="__('Notes')"
                    fieldName="notes" fieldId="notes" fieldRequired="true"
                    :fieldPlaceholder="__('Enter notes')">
                </x-forms.textarea>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <x-forms.button-cancel data-dismiss="modal" class="border-0 mr-3">@lang('app.cancel')</x-forms.button-cancel>
        <x-forms.button-primary id="save-notes" icon="check">@lang('app.save')</x-forms.button-primary>
    </div>
</x-form>


<script>
     $(document).ready(function() {
        $("#createNotes .select-picker").selectpicker();
     });
    $('#save-notes').click(function () {
        $.easyAjax({
            container: '#createNotes',
            type: "POST",
            disableButton: true,
            blockUI: true,
            buttonSelector: "#save-notes",
            url: "{{ route('vendortrack.notesstore') }}",
            data: $('#createNotes').serialize(),
            success: function (response) {
                if (response.status === 'success') {
                    window.location.href="{{ route('vendortrack.index') }}";
                }
            }
        })
    });
</script>
