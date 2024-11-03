<div class="modal-header">
    <h5 class="modal-title" id="modelHeading">@lang('Edit Filter')</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">×</span></button>
</div>
<x-form id="editVendorFilterForm" method="PUT">
    <div class="modal-body"> 
        <input type="hidden" name="user_id" value=" {{user()->id}} ">
        <input type="hidden" name="startDate" id="startDate">
        <input type="hidden" name="endDate" id="endDate">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <x-forms.text :fieldLabel="__('Filter Name')"
                    fieldName="filter_name" fieldRequired="true" fieldId="filter_name"
                    :fieldPlaceholder="__('Enter filter name')"/>
                </div>
                <div class="col-md-4 mt-3">
                    <label class="f-14 text-dark-grey mb-12 text-capitalize" for="usr">@lang('Created Date')</label>
                    <div class="select-status d-flex">
                        <input type="text" class="position-relative  form-control p-2 text-left border-additional-grey"
                        placeholder="@lang('placeholders.dateRange')" id="customRange">
                    </div>
                </div>
                
                <div class="col-md-4 mt-3">
                    <label class="f-14 text-dark-grey mb-12 text-capitalize"
                        for="usr">@lang('City')</label>
                    <div class="">
                    <select class="form-control select-picker" name="filter_city[]" id="filter_city"
                            data-live-search="true" data-container="body" data-size="8" multiple>
                        @foreach ($city as $category)
                            <option value="{{ $category->city }}" >
                                {{ $category->city }}
                            </option>
                        @endforeach
                    </select>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <label class="f-14 text-dark-grey mb-12 text-capitalize"
                        for="usr">@lang('County')</label>
                    <div class="mb-4">
                    <select class="form-control select-picker" name="filter_county[]" id="filter_county"
                            data-live-search="true" data-container="body" data-size="8" multiple>
                            @foreach ($county as $category)
                            <option value="{{ $category->county }}" >
                                {{ $category->county }}
                            </option>
                            @endforeach
                    </select>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <label class="f-14 text-dark-grey mb-12 text-capitalize"
                        for="usr">@lang('State')</label>
                    <div class="mb-4">
                    <select class="form-control select-picker" name="filter_state[]" id="filter_state"
                            data-live-search="true" data-container="body" data-size="8" multiple>
                        @foreach ($state as $category)
                            <option value="{{ $category->state }}" >
                                {{ $category->state }}
                            </option>
                        @endforeach
                    </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <label class="f-14 text-dark-grey mb-12 text-capitalize"
                        for="usr">@lang('Contractor Type')</label>
                    <div class="mb-4">
                    <select class="form-control select-picker" name="filter_contractor_type[]" id="filter_contractor_type"
                            data-live-search="true" data-container="body" data-size="8" multiple>
                        @foreach ($contracttype as $category)
                            <option value="{{ $category->contractor_type }}" >
                                {{ $category->contractor_type }}
                            </option>
                        @endforeach
                    </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <label class="f-14 text-dark-grey mb-12 text-capitalize"
                        for="usr">@lang('Created By')</label>
                    <div class="mb-4">
                    <select class="form-control select-picker" name="filter_members[]" id="filter_members"
                            data-live-search="true" data-container="body" data-size="8" multiple>
                        @foreach ($allEmployees as $category)
                            <option value="{{ $category->name }}" >
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <label class="f-14 text-dark-grey mb-12 text-capitalize"
                        for="usr">@lang('Status')</label>
                    <div class="mb-4">
                    <select class="form-control select-picker" name="filter_status[]" id="filter_status"
                            data-live-search="true" data-container="body" data-size="8" multiple>
                            <option value="Active" data-content='<i class="fa fa-circle mr-2" style="color:#00b5ff;"></i>Active'>
                            <option  value="Compliant" data-content='<i class="fa fa-circle mr-2" style="color:#679c0d;"></i>Compliant'>
                            <option  value="Snooze" data-content='<i class="fa fa-circle mr-2" style="color:#FFA500;"></i>Snooze'>
                            <option  value="Non Compliant" data-content='<i class="fa fa-circle mr-2" style="color:#FFFF00;"></i>Non Compliant'>
                            <option  value="DNU" data-content='<i class="fa fa-circle mr-2" style="color:#FF0000;"></i>DNU'>
                            <option  value="On Hold" data-content='<i class="fa fa-circle mr-2" style="color:#808080;"></i>On Hold'>
                    </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <x-forms.button-cancel id="clearedit" class="border-0 mr-3">Reset</x-forms.button-cancel>
        <x-forms.button-cancel data-dismiss="modal" class="border-0 mr-3">@lang('app.close')</x-forms.button-cancel>
        <x-forms.button-primary id="edit-filter" icon="check">@lang('app.save')</x-forms.button-primary>
    </div>
</x-form>
<script>

$(document).ready(function() {
    var startDate = '{{$filter->start_date}}';
    var endDate = '{{$filter->end_date}}';

    $("#editVendorFilterForm .select-picker").selectpicker();

    $('#customRangeEdit').daterangepicker({
        autoUpdateInput: false,
        locale: {
            cancelLabel: 'Clear'
        },
        ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    });
        
    $('#customRangeEdit').on('apply.daterangepicker', function(ev, picker) {
        // Get start and end dates
        startDate = picker.startDate.format('YYYY-MM-DD');
        document.getElementById('filterstartDate').value=startDate;
        endDate = picker.endDate.format('YYYY-MM-DD');
        document.getElementById('filterendDate').value=endDate;
        $(this).val(picker.startDate.format('{{ company()->moment_date_format }}') + ' - ' + picker.endDate.format('{{ company()->moment_date_format }}'));
        
    });
    
    if(startDate!='' && endDate!=''){
        document.getElementById('filterstartDate').value=startDate;
        document.getElementById('filterendDate').value=endDate;
        
        $('#customRangeEdit').val(
            moment(startDate).format('{{ company()->moment_date_format }}') + ' - ' + moment(endDate).format('{{ company()->moment_date_format }}')
        );
    }

    $('#edit-filter').click(function () {
        if($('#customRangeEdit').val()=='')
        {
            document.getElementById('filterstartDate').value='';
            document.getElementById('filterendDate').value='';
        }
        var url = "{{ route('project-vendor-filter.update',$filter->id) }}";
        $.easyAjax({
            url: url,
            container: '#editVendorFilterForm',
            type: "POST",
            blockUI: true,
            disableButton: true,
            buttonSelector: '#edit-filter',
            data: $('#editVendorFilterForm').serialize(),
            success: function(response) {
                if (response.status == 'success') {
                    window.location.reload();
                    
                }
            }
        })
    });
    
    $('#clearedit').click(function() {
        $('#filter_category_id_edit').val([]).selectpicker('refresh');
        $('#filter_vendor_edit').val([]).selectpicker('refresh');
        $('#filter_link_status_edit').val([]).selectpicker('refresh');
        $('#filter_wo_status_edit').val([]).selectpicker('refresh');
        $('#filter_project_status_edit').val([]).selectpicker('refresh');
        $('#filter_client_edit').val([]).selectpicker('refresh');
        $('#filter_members_edit').val([]).selectpicker('refresh');
        document.getElementById('startDate').value='';
        document.getElementById('endDate').value='';
        $('#customRangeEdit').val('');
        $('#filter_name_edit').val('');
    });
    
});