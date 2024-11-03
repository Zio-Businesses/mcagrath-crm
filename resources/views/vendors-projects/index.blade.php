@extends('layouts.app')

@push('datatable-styles')
    @include('sections.datatable_css')
@endpush

@section('filter-section')
<style>

#vendors-projects-table th:nth-child(4),
    #vendors-projects-table td:nth-child(4) {
        width: 300px !important; /* Force the width */
        max-width: 300px !important;
        min-width: 300px !important;
    }

    #vendors-projects-table th:nth-child(9),
    #vendors-projects-table td:nth-child(9) {
        width: 300px !important; /* Force the width */
        max-width: 300px !important;
        min-width: 300px !important;
    }

    #vendors-projects-table th:nth-child(8),
    #vendors-projects-table td:nth-child(8) {
        width: 300px !important; /* Force the width */
        max-width: 300px !important;
        min-width: 300px !important;
    }

    /* Ensure the table layout allows the column to respect the width */
    #vendors-projects-table {
        table-layout: fixed; /* Fix table layout to respect column widths */
        width: 100%;
    }

    /* Allow horizontal scrolling in the container */
    .table-responsive {
        overflow-x: auto; /* Enable horizontal scrolling */
    }

    .dropdown{
        position :static;  
    } 
    .button-wrapper::-webkit-scrollbar {
        display: none; /* Hides the scrollbar */
    }
</style>

<x-filters.filter-box-moded>
    <div class="task-search d-flex  py-1 px-lg-3 px-0 align-items-center">
        <form class="w-100 mr-1 mr-lg-0 mr-md-1 ml-md-1 ml-0 ml-lg-0">
            <div class="input-group bg-grey rounded">
                <div class="input-group-prepend">
                    <span class="input-group-text border-0 bg-additional-grey">
                        <i class="fa fa-search f-13 text-dark-grey"></i>
                    </span>
                </div>
                <input type="text" class="form-control f-14 p-1 border-additional-grey" id="search-text-field"
                    placeholder="@lang('app.startTyping')">
            </div>
        </form>
    </div>

    <div class="select-box d-flex py-1 px-lg-2 px-md-2 px-0">
        <x-forms.button-secondary class="btn-xs d-none" id="reset-filters" icon="times-circle">
            @lang('app.clearFilters')
        </x-forms.button-secondary>
    </div>     
</x-filters.filter-box-moded>
<div class="container-fluid d-flex position-relative border-bottom-grey">
    <!-- Left Scroll Button -->
    <button class="btn btn-dark" id="scrollLeftBtn" style="display: none; left: 0;">&#9664;</button>
    <!-- Scrollable Button Wrapper -->
    <div id="buttonWrapper" class="button-wrapper d-flex overflow-auto flex-nowrap my-2">
    @foreach ($projectVendorFilter as $filter)
    <!-- Buttons in a horizontal line -->
        <div class="task_view mx-1">
            
            <div class="taskView text-darkest-grey f-w-500">@if($filter->status=='active')<i class="fa fa-circle mr-2" style="color:#679c0d;"></i>@endif{{$filter->name}}</div>
            <div class="dropdown">
                <a class="task_view_more d-flex align-items-center justify-content-center dropdown-toggle"
                    type="link" id="dropdownMenuLink-{{$filter->id}}" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="icon-options-vertical icons"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right" 
                    aria-labelledby="dropdownMenuLink-{{$filter->id}}" tabindex="0" >
                    @if($filter->status=='inactive')
                        <a class="dropdown-item apply-filter" href="javascript:;"
                            data-row-id="{{$filter->id}}">
                            <i class="bi bi-save2 mr-2"></i>
                            @lang('Apply')
                        </a>
                    @endif
                        <a class="dropdown-item edit-filter-vendor-projects" href="javascript:;"
                            data-row-id="{{$filter->id}}">
                            <i class="fa fa-edit mr-2"></i>
                            @lang('app.edit')
                        </a>
                        <a class="dropdown-item delete-row" href="javascript:;"
                            data-row-id="{{$filter->id}}">
                            <i class="fa fa-trash mr-2"></i>
                            @lang('app.delete')
                        </a>
                        @if($filter->status=='active')
                            <a class="dropdown-item clear-filter" href="javascript:;"
                                data-row-id="{{$filter->id}}">
                                <i class="bi bi-save2 mr-2"></i>
                                @lang('Clear')
                            </a>
                        @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <!-- Right Scroll Button -->
    <button class="btn btn-dark" id="scrollRightBtn" style="display: none; right: 0;">&#9654;</button>
</div>

@endsection

@section('content')

    <!-- CONTENT WRAPPER START -->
    <div class="content-wrapper">
        
        <a class="btn btn-secondary f-14 float-right mb-3" data-toggle="tooltip" id="custom-filter"
        data-original-title="@lang('Custom Filter')"><i class="side-icon bi bi-filter"></i></a>

        <div class="d-flex flex-column w-tables rounded mt-3 bg-white table-responsive">

            {!! $dataTable->table(['class' => 'table table-hover border-0 w-100']) !!}

        </div>
        <!-- Task Box End -->
    </div>
    <div class="modal fade" id="CustomFilterModal" aria-hidden="true" >
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeading">Custom Filter</h4>
                </div>
                <div class="modal-body"> 
                    <x-form id="save-project-vendor-filter-form">
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
                                    <label class="f-14 text-dark-grey mb-12 text-capitalize" for="usr">@lang('Link Sent Date')</label>
                                    <div class="select-status d-flex">
                                        <input type="text" class="position-relative  form-control p-2 text-left border-additional-grey"
                                        placeholder="@lang('placeholders.dateRange')" id="customRange">
                                    </div>
                                </div>
                            
                                <div class="col-md-4 mt-3">
                                    <label class="f-14 text-dark-grey text-capitalize"
                                        for="usr">@lang('modules.projects.projectCategory')</label>
                                    <div class="mt-1">
                                    <select class="form-control select-picker" name="filter_category_id[]" id="filter_category_id"
                                            data-live-search="true" data-container="body" data-size="8" multiple>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" >
                                                {{ $category->category_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>
                             
                                <div class="col-md-4">
                                    <label class="f-14 text-dark-grey mb-12 text-capitalize"
                                        for="usr">@lang('Members')</label>
                                    <div class="mb-4">
                                    <select class="form-control select-picker" name="filter_members[]" id="filter_members"
                                            data-live-search="true" data-container="body" data-size="8" multiple>
                                        @foreach ($allEmployees as $category)
                                            <option value="{{ $category->id }}" >
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label class="f-14 text-dark-grey mb-12 text-capitalize"
                                        for="usr">@lang('Client')</label>
                                    <div class="mb-4">
                                    <select class="form-control select-picker" name="filter_client[]" id="filter_client"
                                            data-live-search="true" data-container="body" data-size="8" multiple>
                                        @foreach ($clients as $category)
                                            <option value="{{ $category->id }}">
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <label class="f-14 text-dark-grey mb-12 text-capitalize"
                                        for="usr">@lang('Vendors')</label>
                                    <div class="mb-4">
                                    <select class="form-control select-picker" name="filter_vendor[]" id="filter_vendor"
                                            data-live-search="true" data-container="body" data-size="8" multiple>
                                        @foreach ($vendor as $category)
                                            <option value="{{ $category->id }}">
                                                {{ $category->vendor_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>
                              
                                <div class="col-md-4">
                                    <label class="f-14 text-dark-grey mb-12 text-capitalize"
                                        for="usr">@lang('Link Status')</label>
                                    <div class="mb-4">
                                    <select class="form-control select-picker" name="filter_link_status[]" id="filter_link_status"
                                            data-live-search="true" data-container="body" data-size="8" multiple>
                                            <option value="Accepted">Accepted</option>
                                            <option value="Rejected">Rejected</option>
                                            <option value="Sent">Sent</option>
                                            <option value="Removed">Removed</option>
                                    </select>
                                    </div>
                                </div>
                  
                                <div class="col-md-4">
                                    <label class="f-14 text-dark-grey mb-12 text-capitalize"
                                        for="usr">@lang('WO Status')</label>
                                    <div class="mb-4">
                                    <select class="form-control select-picker" name="filter_wo_status[]" id="filter_wo_status"
                                            data-live-search="true" data-container="body" data-size="8" multiple>
                                            @foreach ($wostatus as $category)
                                            <option value="{{ $category->wo_status }}">
                                                {{ $category->wo_status }}
                                            </option>
                                            @endforeach
                                    </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <label class="f-14 text-dark-grey mb-12 text-capitalize"
                                        for="usr">@lang('Project Status')</label>
                                    <div class="mb-4">
                                    <select class="form-control select-picker" name="filter_project_status[]" id="filter_project_status"
                                            data-live-search="true" data-container="body" data-size="8" multiple>
                                        @foreach ($projectStatus as $category)
                                            <option value="{{ $category->status_name }}">
                                                {{ $category->status_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </x-form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="clear">Reset</button>
                    <button type="button" class="btn btn-secondary" id="close">Close</button>
                    <button type="button" class="btn btn-primary" id="save-filter">Save Filter</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    @include('sections.datatable_js')
<script>
$(document).ready(function () {
    var startDate = '';
    var endDate = '';

    $('#customRange').daterangepicker({
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
    
    $('#customRange').on('apply.daterangepicker', function(ev, picker) {
        // Get start and end dates
        startDate = picker.startDate.format('YYYY-MM-DD');
        document.getElementById('startDate').value=startDate;
        endDate = picker.endDate.format('YYYY-MM-DD');
        document.getElementById('endDate').value=endDate;
        
        $(this).val(picker.startDate.format('{{ company()->moment_date_format }}') + ' - ' + picker.endDate.format('{{ company()->moment_date_format }}'));
        
    });
    $('#custom-filter').click(function () {
        $('#CustomFilterModal').modal('show');
    });

    $('#close').click(function () {
        $('#CustomFilterModal').modal('hide');
    });

    $('#clear').click(function() {
        $('#filter_category_id').val([]).selectpicker('refresh');
        $('#filter_vendor').val([]).selectpicker('refresh');
        $('#filter_link_status').val([]).selectpicker('refresh');
        $('#filter_wo_status').val([]).selectpicker('refresh');
        $('#filter_project_status').val([]).selectpicker('refresh');
        $('#filter_client').val([]).selectpicker('refresh');
        $('#filter_members').val([]).selectpicker('refresh');
        document.getElementById('startDate').value='';
        document.getElementById('endDate').value='';
        $('#customRange').val('');
        $('#filter_name').val('');
    });

    const buttonWrapper = document.getElementById('buttonWrapper');
    const scrollLeftBtn = document.getElementById('scrollLeftBtn');
    const scrollRightBtn = document.getElementById('scrollRightBtn');

    function updateScrollButtons() {
        // Check if the content overflows the button wrapper
        if (buttonWrapper.scrollWidth > buttonWrapper.clientWidth) {
            scrollLeftBtn.style.display = 'block';
            scrollRightBtn.style.display = 'block';
        } else {
            scrollLeftBtn.style.display = 'none';
            scrollRightBtn.style.display = 'none';
        }
    }
    updateScrollButtons();

    $('#scrollLeftBtn').click(function() {
        buttonWrapper.scrollBy({
            left: -200, // Adjust as needed
            behavior: 'smooth'
        });
    });

    $('#scrollRightBtn').click(function() {
        buttonWrapper.scrollBy({
            left: 200, // Adjust as needed
            behavior: 'smooth'
        });
    });

    window.addEventListener('resize', updateScrollButtons);

    $('#save-filter').click(function () {
            if($('#customRange').val()=='')
            {
                document.getElementById('startDate').value='';
                document.getElementById('endDate').value='';
            }
            var url = "{{ route('project-vendor-filter.store') }}";
            $.easyAjax({
                url: url,
                container: '#save-project-vendor-filter-form',
                type: "POST",
                blockUI: true,
                disableButton: true,
                buttonSelector: '#save-filter',
                data: $('#save-project-vendor-filter-form').serialize(),
                success: function(response) {
                    if (response.status == 'success') {
                        $('#CustomFilterModal').modal('hide');
                        window.location.reload();
                    }
                }
            })
        });

        $('body').on('click', '.edit-filter-vendor-projects', function() {
            var id = $(this).data('row-id');

            var url = "{{ route('project-vendor-filter.edit', ':id') }}";
            url = url.replace(':id', id);

            $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
            $.ajaxModal(MODAL_LG, url);
            
        });
        $('body').on('click', '.delete-row', function() {
            var id = $(this).data('row-id');
            Swal.fire({
                title: "@lang('messages.sweetAlertTitle')",
                text: "@lang('messages.recoverRecord')",
                icon: 'warning',
                showCancelButton: true,
                focusConfirm: false,
                confirmButtonText: "@lang('messages.confirmDelete')",
                cancelButtonText: "@lang('app.cancel')",
                customClass: {
                    confirmButton: 'btn btn-primary mr-3',
                    cancelButton: 'btn btn-secondary'
                },
                showClass: {
                    popup: 'swal2-noanimation',
                    backdrop: 'swal2-noanimation'
                },
                buttonsStyling: false
            }).then((result) => {
                if (result.isConfirmed) {
                    var url = "{{ route('project-vendor-filter.destroy', ':id') }}";
                    url = url.replace(':id', id);
                    var token = "{{ csrf_token() }}";
                    $.easyAjax({
                        type: 'POST',
                        url: url,
                        container: '.content-wrapper',
                        blockUI: true,
                        data: {
                            '_token': token,
                            '_method': 'DELETE'
                        },
                        success: function(response) {
                            if (response.status == "success") {
                                window.location.reload();
                            }
                        }
                    });
                }
            });
        });

        $('body').on('click', '.apply-filter', function() {

            var id = $(this).data('row-id');
            var url = "{{ route('projectvendor-filter.change-status',':id') }}";
            url = url.replace(':id', id);
            var token = "{{ csrf_token() }}";
            $.easyAjax({
                type: 'POST',
                url: url,
                container: '.content-wrapper',
                blockUI: true,
                data: {
                    '_token': token,
                },
                success: function(response) {
                    if (response.status == "success") {
                        window.location.reload();
                    }
                }
            });
        });
        $('body').on('click', '.clear-filter', function() {
            var id = $(this).data('row-id');
            var url = "{{ route('projectvendor-filter.clear',':id') }}";
            url = url.replace(':id', id);
            var token = "{{ csrf_token() }}";
            $.easyAjax({
                type: 'POST',
                url: url,
                container: '.content-wrapper',
                blockUI: true,
                data: {
                    '_token': token,
                },
                success: function(response) {
                    if (response.status == "success") {
                        window.location.reload();
                    }
                }
            });
        });

});
</script>
<script>
$(document).ready(function() {
    var table = $('#vendors-projects-table').DataTable(); // Ensure you're selecting the correct table ID

    // Enable horizontal scrolling and disable automatic width
    table.settings()[0].oFeatures.bAutoWidth = true; // Disable auto width
    table.settings()[0].oScroll.sX = "100%"; // Enable horizontal scroll

});
</script>
<script>
$('#vendors-projects-table').on('preXhr.dt', function(e, settings, data) {
    const searchText = $('#search-text-field').val();
    data['searchText'] = searchText;
    
});

const showTable = () => {
    window.LaravelDataTables["vendors-projects-table"].draw(false);
}

$('#search-text-field').on('keyup', function() {
    if ($('#search-text-field').val() != "") {
        $('#reset-filters').removeClass('d-none');
        showTable();
    }
});

$('#reset-filters,#reset-filters-2').click(function() {
    $('#filter-form')[0].reset();
    $('.filter-box .select-picker').selectpicker("refresh");
    $('#reset-filters').addClass('d-none');
    showTable();
});    
</script>
@endpush
