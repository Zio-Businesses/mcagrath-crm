@extends('layouts.app')

@push('datatable-styles')
    @include('sections.datatable_css')
@endpush

@section('filter-section')
<style>

#vendors-projects-table th:nth-child(3),
    #vendors-projects-table td:nth-child(3) {
        width: 300px !important; /* Force the width */
        max-width: 300px !important;
        min-width: 300px !important;
    }

    #vendors-projects-table th:nth-child(7),
    #vendors-projects-table td:nth-child(7) {
        width: 300px !important; /* Force the width */
        max-width: 300px !important;
        min-width: 300px !important;
    }

    #vendors-projects-table th:nth-child(6),
    #vendors-projects-table td:nth-child(6) {
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
        <x-filters.more-filter-box>
            <div class="more-filter-items">
                <label class="f-14 text-dark-grey mb-12 text-capitalize" for="usr">@lang('app.projectMember')</label>
                <div class="select-filter mb-4">
                    <div class="select-others">
                        <select class="form-control select-picker" name="employee_id" id="employee_id"
                            data-live-search="true" data-container="body" data-size="8">
                            @if ($allEmployees->count() > 1 || in_array('admin', user_roles()))
                                <option value="all">@lang('app.all')</option>
                            @endif
                            @foreach ($allEmployees as $employee)
                                    <x-user-option :user="$employee" :selected="request('assignee') == 'me' && $employee->id == user()->id"/>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="more-filter-items">
                <label class="f-14 text-dark-grey mb-12 text-capitalize" for="usr">@lang('app.clientName')</label>
                <div class="select-filter mb-4">
                    <div class="select-others">
                        <select class="form-control select-picker" name="client_id" id="client_id" data-container="body"
                            data-size="8">
                            @if (!in_array('client', user_roles()))
                                <option selected value="all">@lang('app.all')</option>
                            @endif
                            @foreach ($clients as $client)
                                <x-user-option :user="$client" />
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="more-filter-items">
                <label class="f-14 text-dark-grey mb-12 text-capitalize" for="usr">@lang('Vendor Name')</label>
                <div class="select-filter mb-4">
                    <div class="select-others">
                        <select class="form-control select-picker" name="vendor_id" id="vendor_id" data-container="body"
                            data-size="8" data-live-search="true">
                            @if (!in_array('client', user_roles()))
                                <option selected value="--">--</option>
                            @endif
                            @foreach ($vendor as $vendors)
                                <x-vendor-option :vendors="$vendors" />
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="more-filter-items">
                <label class="f-14 text-dark-grey mb-12 text-capitalize" for="usr">@lang('Link Status')</label>
                <div class="select-filter mb-4">
                    <div class="select-others">
                        <select class="form-control select-picker" name="link_id" id="link_id" data-container="body"
                            data-size="5">
                            <option selected value="--">--</option>
                            <option value="Accepted" data-content='<i class="fa fa-circle mr-2" style="color:#679c0d;"></i>Accepted'>
                            </option>
                            <option value="Rejected" data-content='<i class="fa fa-circle mr-2" style="color:#f5c308;"></i>Rejected'>
                            </option>
                            <option value="Sent" data-content='<i class="fa fa-circle mr-2" style="color:#00b5ff;"></i>Sent'>
                            </option>
                            <option value="Removed" data-content='<i class="fa fa-circle mr-2" style="color:#d21010;"></i>Removed'>
                            Removed</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="more-filter-items">
                <label class="f-14 text-dark-grey mb-12 text-capitalize" for="usr">@lang('Work Order Status')</label>
                <div class="select-filter mb-4">
                    <div class="select-others">
                        <select class="form-control select-picker" name="wo_status" id="wo_status" data-container="body"
                            data-size="5">
                            <option selected value="--">--</option>
                            @foreach ($projectStatus as $status)
                                <option
                                data-content="<i class='fa fa-circle mr-1 f-15' style='color:{{$status->color}}'></i>{{ $status->status_name }}"
                                value="{{$status->status_name}}">
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </x-filters.more-filter-box>
        
    </x-filters.filter-box-moded>

@endsection

@section('content')

    <!-- CONTENT WRAPPER START -->
    <div class="content-wrapper">
        <!-- Add Task Export Buttons Start -->
        <div class="d-grid d-lg-flex d-md-flex action-bar float-right mb-4">
            <div class="btn-group mt-2 mt-lg-0 mt-md-0 ml-0 ml-lg-3 ml-md-3" role="group">
                <a href="{{ route('vendorproject.index') }}" class="btn btn-secondary f-14 btn-active show-clients" data-toggle="tooltip"
                    data-original-title="@lang('Projects - Vendors')"><i class="side-icon bi bi-list-ul"></i></a>
            </div>
        </div>

        <div class="d-flex flex-column w-tables rounded mt-3 bg-white table-responsive">

            {!! $dataTable->table(['class' => 'table table-hover border-0 w-100']) !!}

        </div>
        <!-- Task Box End -->
    </div>
    <!-- CONTENT WRAPPER END -->

@endsection

@push('scripts')
    @include('sections.datatable_js')
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
            const status = $('#status').val();
            data['status'] = status;
            var employee_id = $('#employee_id').val();
            data['employee_id'] = employee_id;
            var clientID = $('#client_id').val();
            data['client_id'] = clientID;
            var vendorID = $('#vendor_id').val();
            data['vendor_id'] = vendorID;
            var linkID = $('#link_id').val();
            data['link_id'] = linkID;
            var woStatus = $('#wo_status').val();
            data['wo_status'] = woStatus;
            
        });

       
      
        $('#client_id, #employee_id, #vendor_id,#link_id,#wo_status').on('change keyup',
            function() {
                if ($('#employee_id').val() != "all") {
                    $('#reset-filters').removeClass('d-none');
                    showTable();
                } else if ($('#client_id').val() != "all") {
                    $('#reset-filters').removeClass('d-none');
                    showTable();
                }else if ($('#vendor_id').val() != "--") {
                    $('#reset-filters').removeClass('d-none');
                    showTable();
                }else if ($('#link_id').val() != "--") {
                    $('#reset-filters').removeClass('d-none');
                    showTable();
                } else if ($('#wo_status').val() != "--") {
                    $('#reset-filters').removeClass('d-none');
                    showTable();
                }  else {
                    $('#reset-filters').addClass('d-none');
                    showTable();
                }
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
