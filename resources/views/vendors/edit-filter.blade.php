<div class="modal-header">
    <h5 class="modal-title" id="modelHeading">@lang('Edit Filter')</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">×</span></button>
</div>
<x-form id="editVendorFilterForm" method="PUT">
    <div class="modal-body"> 
        <input type="hidden" name="filterstartDate" id="filterstartDate">
        <input type="hidden" name="filterendDate" id="filterendDate">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <x-forms.text :fieldLabel="__('Filter Name')"
                    fieldName="filter_name" fieldRequired="true" fieldId="filter_name_edit" :fieldValue="$filter->name"
                    :fieldPlaceholder="__('Enter filter name')"/>
                </div>
                <div class="col-md-4 mt-3">
                    <label class="f-14 text-dark-grey mb-12 text-capitalize" for="usr">@lang('Created Date')</label>
                    <div class="select-status d-flex">
                        <input type="text" class="position-relative  form-control p-2 text-left border-additional-grey"
                        placeholder="@lang('placeholders.dateRange')" id="customRangeEdit">
                    </div>
                </div>
                @php
                $selectedCity = $filter->city ?? [];
                @endphp
                <div class="col-md-4 mt-3">
                    <label class="f-14 text-dark-grey mb-12 text-capitalize"
                        for="usr">@lang('City')</label>
                    <div class="">
                    <select class="form-control select-picker" name="filter_city[]" id="filter_city_edit"
                            data-live-search="true" data-container="body" data-size="8" multiple>
                        @foreach ($city as $category)
                            <option value="{{ $category->city }}" {{ in_array($category->city, $selectedCity) ? 'selected' : '' }}>
                                {{ $category->city }}
                            </option>
                        @endforeach
                    </select>
                    </div>
                </div>
                @php
                 $selectedCounty = $filter->county ?? [];
                @endphp
                <div class="col-md-4">
                    <label class="f-14 text-dark-grey mb-12 text-capitalize"
                        for="usr">@lang('County')</label>
                    <div class="mb-4">
                    <select class="form-control select-picker" name="filter_county[]" id="filter_county_edit"
                            data-live-search="true" data-container="body" data-size="8" multiple>
                            @foreach ($county as $category)
                            <option value="{{ $category->county }}" {{ in_array($category->county, $selectedCounty) ? 'selected' : '' }}>
                                {{ $category->county }}
                            </option>
                            @endforeach
                    </select>
                    </div>
                </div>
                @php
                 $selectedState = $filter->state ?? [];
                @endphp
                <div class="col-md-4">
                    <label class="f-14 text-dark-grey mb-12 text-capitalize"
                        for="usr">@lang('State')</label>
                    <div class="mb-4">
                    <select class="form-control select-picker" name="filter_state[]" id="filter_state_edit"
                            data-live-search="true" data-container="body" data-size="8" multiple>
                        @foreach ($state as $category)
                            <option value="{{ $category->state }}" {{ in_array($category->state, $selectedState) ? 'selected' : '' }}>
                                {{ $category->state }}
                            </option>
                        @endforeach
                    </select>
                    </div>
                </div>
                @php
                 $selectedContractorType = $filter->contractor_type ?? [];
                @endphp
                <div class="col-md-4">
                    <label class="f-14 text-dark-grey mb-12 text-capitalize"
                        for="usr">@lang('Contractor Type')</label>
                    <div class="mb-4">
                    <select class="form-control select-picker" name="filter_contractor_type[]" id="filter_contractor_type_edit"
                            data-live-search="true" data-container="body" data-size="8" multiple>
                        @foreach ($contracttype as $category)
                            <option value="{{ $category->contractor_type }}" {{ in_array($category->contractor_type, $selectedContractorType) ? 'selected' : '' }}>
                                {{ $category->contractor_type }}
                            </option>
                        @endforeach
                    </select>
                    </div>
                </div>
                @php
                 $selectedCreatedBy = $filter->created_by ?? [];
                @endphp
                <div class="col-md-4">
                    <label class="f-14 text-dark-grey mb-12 text-capitalize"
                        for="usr">@lang('Created By')</label>
                    <div class="mb-4">
                    <select class="form-control select-picker" name="filter_members[]" id="filter_members_edit"
                            data-live-search="true" data-container="body" data-size="8" multiple>
                        @foreach ($allEmployees as $category)
                            <option value="{{ $category->name }}" {{ in_array($category->name, $selectedCreatedBy) ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    </div>
                </div>
                @php
                 $selectedVendorStatus = $filter->vendor_status ?? [];
                @endphp
                <div class="col-md-4">
                    <label class="f-14 text-dark-grey mb-12 text-capitalize"
                        for="usr">@lang('Status')</label>
                    <div class="mb-4">
                    <select class="form-control select-picker" name="filter_status[]" id="filter_status_edit"
                            data-live-search="true" data-container="body" data-size="8" multiple>
                            <option value="Active" {{ in_array('Active', $selectedVendorStatus) ? 'selected' : '' }} data-content='<i class="fa fa-circle mr-2" style="color:#00b5ff;"></i>Active'>
                            <option  value="Compliant" {{ in_array('Compliant', $selectedVendorStatus) ? 'selected' : '' }} data-content='<i class="fa fa-circle mr-2" style="color:#679c0d;"></i>Compliant'>
                            <option  value="Snooze" {{ in_array('Snooze', $selectedVendorStatus) ? 'selected' : '' }} data-content='<i class="fa fa-circle mr-2" style="color:#FFA500;"></i>Snooze'>
                            <option  value="Non Compliant" {{ in_array('Non Compliant', $selectedVendorStatus) ? 'selected' : '' }} data-content='<i class="fa fa-circle mr-2" style="color:#FFFF00;"></i>Non Compliant'>
                            <option  value="DNU" {{ in_array('DNU', $selectedVendorStatus) ? 'selected' : '' }} data-content='<i class="fa fa-circle mr-2" style="color:#FF0000;"></i>DNU'>
                            <option  value="On Hold" {{ in_array('On Hold', $selectedVendorStatus) ? 'selected' : '' }} data-content='<i class="fa fa-circle mr-2" style="color:#808080;"></i>On Hold'>
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
        var url = "{{ route('vendor-filter.update',$filter->id) }}";
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
        $('#filter_state_edit').val([]).selectpicker('refresh');
        $('#filter_city_edit').val([]).selectpicker('refresh');
        $('#filter_county_edit').val([]).selectpicker('refresh');
        $('#filter_members_edit').val([]).selectpicker('refresh');
        $('#filter_contractor_type_edit').val([]).selectpicker('refresh');
        $('#filter_status_edit').val([]).selectpicker('refresh');
        document.getElementById('startDate').value='';
        document.getElementById('endDate').value='';
        $('#customRangeEdit').val('');
        $('#filter_name_edit').val('');
    });
    
});