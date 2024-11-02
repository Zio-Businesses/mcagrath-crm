<div class="modal-header">
    <h5 class="modal-title" id="modelHeading">@lang('Edit SOW')</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">×</span></button>
</div>
<x-form id="addProjectSowForm" method="PUT">
    <div class="modal-body">
        <input type="hidden" name="project_id" value="{{ $sow->project_id }}">
        <div class="row">
                    <div class="col-md-6">
                        
                        <x-forms.select fieldId="sow_title"
                            :fieldLabel="__('Enter sow title')" fieldName="sow_title" fieldRequired="true">
                            <option value="">--</option>
                            @foreach ($sow_title as $category)
                                <option @selected($sow->sow_title == $category->sow_title) value="{{ $category->sow_title }}">
                                {{ $category->sow_title }}</option>
                            @endforeach
                        </x-forms.select>
                    </div>
                    <div class="col-md-6">
                        <x-forms.select fieldId="category"
                            :fieldLabel="__('Project Category')" fieldName="category" search="true">
                                <option value="">--</option>
                                @foreach ($categories as $category)
                                    <option @selected($sow->category == $category->category_name) value="{{ $category->category_name }}">
                                        {{ $category->category_name }}</option>
                                @endforeach
                        </x-forms.select>
                    </div>
                    <div class="col-md-6">
                        <x-forms.label class="my-3" fieldId="sub_category"
                                       :fieldLabel="__('Project Sub-Category')">
                        </x-forms.label>
                        <x-forms.input-group>
                            <select class="form-control select-picker" name="sub_category" id="sub_category"
                                    data-live-search="true">
                                <option value="">--</option>
                                @foreach ($subcategories as $category)
                                <option @selected($sow->sub_category == $category->sub_category) value="{{ $category->sub_category }}">
                                {{ $category->sub_category }}</option>
                                @endforeach
                            </select>
                        </x-forms.input-group>
                    </div>
                    <div class="col-md-6">
                    <x-forms.select fieldId="contractor_type" :fieldLabel="__('Contractor Type')" fieldName="contractor_type" fieldRequired="true" search="true">
                                <option value="">--</option>
                                @foreach ($contracttype as $category)
                                <option @selected($sow->contractor_type == $category->contractor_type) value="{{ $category->contractor_type }}">
                                {{ $category->contractor_type }}</option>
                                @endforeach
                            </x-forms.select>
                    </div>
            <div class="col-md-12">
                <x-forms.textarea class="mr-0 mr-lg-2 mr-md-2" :fieldLabel="__('Description')"
                    fieldName="description" fieldId="description" fieldRequired="true"
                    :fieldPlaceholder="__('Enter sow description')" :fieldValue="$sow->description"> 
                </x-forms.textarea>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <x-forms.button-cancel data-dismiss="modal" class="border-0 mr-3">@lang('app.close')</x-forms.button-cancel>
        <x-forms.button-primary id="save-sow-milestone" icon="check">@lang('app.save')</x-forms.button-primary>
    </div>
</x-form>

<script>

$(document).ready(function() {

    $("#addProjectSowForm .select-picker").selectpicker();

});

    $('#save-sow-milestone').click(function() {
        var url = "{{ route('sow.update', $sow->id) }}";
        $.easyAjax({
            url: url,
            container: '#addProjectSowForm',
            type: "POST",
            blockUI: true,
            disableButton: true,
            buttonSelector: '#save-sow-milestone',
            data: $('#addProjectSowForm').serialize(),
            success: function(response) {
                if (response.status == 'success') {
                    window.location.reload();
                }
            }
        })
    });

</script>
