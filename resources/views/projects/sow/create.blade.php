<div class="modal-header">
    <h5 class="modal-title" id="modelHeading">@lang('Create SOW')</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">×</span></button>
</div>
<x-form id="addProjectSowForm">
    <div class="modal-body">
        <input type="hidden" name="project_id" value="{{ $project->id }}">
        <div class="row">
            <div class="col-md-6">
                <x-forms.text fieldId="sow_title" :fieldLabel="__('Scope of Work Title')"
                    fieldName="sow_title" fieldRequired="true" :fieldPlaceholder="__('Enter sow title')">
                </x-forms.text>
            </div>
                    <div class="col-md-6">
                        <x-forms.select fieldId="category"
                            :fieldLabel="__('Project Category')" fieldName="category" search="true">
                                <option value="">--</option>
                                @foreach ($categories as $category)
                                    <option
                                        value="{{ $category->category_name }}">
                                        {{ $category->category_name }}
                                    </option>
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
                                    <option
                                        value="{{ $category->sub_category }}">
                                        {{ $category->sub_category }}
                                    </option>
                                @endforeach
                            </select>
                        </x-forms.input-group>
                    </div>
                    <div class="col-md-6">
                    <x-forms.select fieldId="contractor_type" :fieldLabel="__('Contractor Type')" fieldName="contractor_type" fieldRequired="true" search="true">
                                <option value="">--</option>
                                @foreach ($contracttype as $type)
                                    <option value="{{ $type }}">{{ ucfirst($type) }}</option>
                                @endforeach
                            </x-forms.select>
                    </div>
            <div class="col-md-12">
                <x-forms.textarea class="mr-0 mr-lg-2 mr-md-2" :fieldLabel="__('Description')"
                    fieldName="description" fieldId="description" fieldRequired="true"
                    :fieldPlaceholder="__('Enter sow description')">
                </x-forms.textarea>
            </div>

        </div>
    </div>
    <div class="modal-footer">
        <x-forms.button-cancel data-dismiss="modal" class="border-0 mr-3">@lang('app.close')</x-forms.button-cancel>
        <x-forms.button-primary id="save-project-sow" icon="check">@lang('app.save')</x-forms.button-primary>
    </div>

</x-form>

<script>

$(document).ready(function() {
    $("#addProjectSowForm .select-picker").selectpicker();
});
    $('#save-project-sow').click(function() {
        var url = "{{ route('sow.store') }}";
        $.easyAjax({
            url: url,
            container: '#addProjectSowForm',
            type: "POST",
            blockUI: true,
            disableButton: true,
            buttonSelector: '#save-project-sow',
            data: $('#addProjectSowForm').serialize(),
            success: function(response) {
                if (response.status == 'success') {
                    window.location.reload();
                }
            }
        })
    });
</script>
