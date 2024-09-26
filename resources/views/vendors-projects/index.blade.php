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

    #vendors-projects-table th:nth-child(4),
    #vendors-projects-table td:nth-child(4) {
        width: 300px !important; /* Force the width */
        max-width: 300px !important;
        min-width: 300px !important;
    }

    #vendors-projects-table th:nth-child(8),
    #vendors-projects-table td:nth-child(8) {
        width: 500px !important; /* Force the width */
        max-width: 500px !important;
        min-width: 500px !important;
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
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
    <script>
        
        var row_id;
        $('#vendors-projects-table').on('preXhr.dt', function(e, settings, data) {
            const searchText = $('#search-text-field').val();
            data['searchText'] = searchText;
            const status = $('#status').val();
            data['status'] = status;
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
