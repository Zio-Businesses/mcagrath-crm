<div class="modal-header">
    <h5 class="modal-title" id="modelHeading">@lang('Add Vendors')</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">×</span></button>
</div>
<x-form id="addChangeNotificationForm">
    <div class="modal-body">
        <div class="row">
            <input type="hidden" name="vendor_id" value="{{$projectvendor->id}}" />
            <div class="col-md-6">
                <x-forms.text class="mr-0 mr-lg-2 mr-md-2" :fieldLabel="__('Vendor')"
                        fieldName="vendor" fieldId="vendor" fieldRequired="true" :fieldValue="$projectvendor->vendor_name"
                        :fieldPlaceholder="__('Vendor')" fieldReadOnly/>  
            </div>
            <div class="col-md-6">  
                <x-forms.select fieldId="project_vendor_type"
                    :fieldLabel="__('Project Category')" fieldName="project_vendor_type" search="true">
                        <option value="">--</option>
                        @foreach ($projecttype as $category)
                            <option value="{{ $category->type }}">
                                {{ $category->type }}</option>
                        @endforeach
                </x-forms.select>              
            </div>
            <div class="col-md-6" id="add_members">
                <x-forms.select fieldId="addsow" :fieldLabel="__('Select Scope Of Works')" fieldName="sow_id[]" search="true" multiple="true" fieldRequired="true">
                    <option value="">--</option>
                    @foreach ($sow as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->sow_title }} - {{$category->category}} - {{$category->sub_category}}
                        </option>
                    @endforeach
                </x-forms.select>
            </div>
            <div class="col-md-6">
                <x-forms.number class="mr-0 mr-lg-2 mr-md-2" :fieldLabel="__('Project Amount')"
                    fieldName="project_amount" fieldId="project_amount" fieldRequired="true"
                    :fieldPlaceholder="__('Project Amount')" />                  
            </div>
            <div class="col-md-6" >
                <x-forms.datepicker fieldId="due_date" fieldRequired="true"
                    :fieldLabel="__('Due Date')" fieldName="due_date"
                    :fieldPlaceholder="__('placeholders.date')" />
            </div>
            <div class="col-md-12">
                <x-forms.textarea class="mr-0 mr-lg-2 mr-md-2" :fieldLabel="__('Additional Notes')"
                    fieldName="add_notes" fieldId="add_notes" 
                    :fieldPlaceholder="__('Enter Additional Notes')">
                </x-forms.textarea>
            </div>  
         </div>
    </div>
    <div class="modal-footer">
        <x-forms.button-cancel data-dismiss="modal" class="border-0 mr-3">@lang('app.close')</x-forms.button-cancel>
        <x-forms.button-primary id="save-change-notification" icon="check">@lang('app.save')</x-forms.button-primary>
    </div>

</x-form>
<script>

    $(document).ready(function() {
        $("#addChangeNotificationForm .select-picker").selectpicker(); 
        const dp1 = datepicker('#due_date', {
                position: 'bl',
                ...datepickerConfig
            }); 
        
    });
    $('#save-change-notification').click(function() {
        var url = "{{ route('change-notification.store') }}";
        $.easyAjax({
            url: url,
            container: '#addChangeNotificationForm',
            type: "POST",
            blockUI: true,
            disableButton: true,
            buttonSelector: '#save-change-notification',
            data: $('#addChangeNotificationForm').serialize(),
            success: function(response) {
                if (response.status == 'success') {
                    window.location.reload();
                }
            }
        })
    });
</script>