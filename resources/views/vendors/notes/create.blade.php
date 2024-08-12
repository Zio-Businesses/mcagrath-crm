<div class="row">
    <div class="col-sm-12">
        <x-form id="save-vendor-note-data-form">
            <div class="add-client bg-white rounded">
                <h4 class="mb-0 p-20 f-21 font-weight-normal text-capitalize border-bottom-grey">
                    @lang('Project Note Details')</h4>

                <input type="hidden" name="vendors_id" value="{{ $vendors->id }}">

                <div class="row p-20">

                    <div class="col-md-6">
                        <x-forms.text fieldId="notes_title" :fieldLabel="__('modules.client.noteTitle')" fieldName="notes_title"
                            fieldRequired="true" :fieldPlaceholder="__('placeholders.note')">
                        </x-forms.text>
                    </div>

                </div>

                <div class="row p-20">
                    <div class="col-md-12 col-lg-12">
                        <div class="form-group my-3">
                            <x-forms.label class="my-3" fieldId="notes" :fieldLabel="__('modules.client.noteDetail')" fieldRequired="true">
                            </x-forms.label>
                            <div id="details"></div>
                            <textarea name="details" id="details-text" class="d-none"></textarea>
                        </div>
                    </div>
                </div>

                <x-form-actions>
                    <x-forms.button-primary id="save-vendor-note-form" class="mr-3" icon="check">@lang('app.save')
                    </x-forms.button-primary>
                    <x-forms.button-cancel :link="route('clients.index')" class="border-0">@lang('app.cancel')
                    </x-forms.button-cancel>
                </x-form-actions>

            </div>

        </x-form>

    </div>
</div>

<script>
    $(document).ready(function() {

        var quill = new Quill('#details', {
        theme: 'snow'
        });


        $('#save-vendor-note-form').click(function() {
            var comment = document.getElementById('details').children[0].innerHTML;
            document.getElementById('details-text').value = comment;
            const url = "{{ route('vendor-module-notes.store') }}";
            $.easyAjax({
                url: url,
                container: '#save-vendor-note-data-form',
                type: "POST",
                disableButton: true,
                blockUI: true,
                buttonSelector: "#save-vendor-note-form",
                data: $('#save-vendor-note-data-form').serialize(),
                success: function(response) {
                    if (response.status == 'success') {
                        window.location.href = response.redirectUrl;
                    }
                }
            })
        });

        init(RIGHT_MODAL);
    });
</script>
