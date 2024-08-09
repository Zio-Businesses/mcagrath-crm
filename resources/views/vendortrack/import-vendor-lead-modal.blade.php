<div class="modal-header">
    <h5 class="modal-title">@lang('Add Vendor Leads')</h5>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<x-form id="importVendors" method="POST" class="ajax-form">
    <div class="modal-body">
        <div class="row">
            <div class="col-sm-12">
                <x-forms.file allowedFileExtensions="xlsx" class="mr-0 mr-lg-2 mr-md-2" :fieldLabel="__('Upload File (file must be a file of type:  xlsx)')" fieldName="file"
                                                        fieldId="file" :popover="('messages.fileFormat.ImageFile')" fieldRequired="true" />
            </div>

        </div>
    </div>
    <div class="modal-footer">
        <x-forms.button-cancel data-dismiss="modal" class="border-0 mr-3">@lang('app.cancel')</x-forms.button-cancel>
        <x-forms.button-primary id="save-vendorleads" icon="check">@lang('app.save')</x-forms.button-primary>
    </div>
</x-form>


<script>
     $("#file").dropify({
            messages: dropifyMessages
        });
    $('#save-vendorleads').click(function () {
        $.easyAjax({
            container: '#importVendors',
            type: "POST",
            file: true,
            disableButton: true,
            // blockUI: true,
            buttonSelector: "#save-vendorleads",
            url: "{{ route('vendortrack.importStore') }}",
            data: $('#importVendors').serialize(),
            success: function (response) {
                if (response.status === 'success') {
                    window.location.reload();
                }
            }
        })
    });
</script>
