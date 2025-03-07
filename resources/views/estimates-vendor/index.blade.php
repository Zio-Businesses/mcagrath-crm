@extends('layouts.app')

@push('datatable-styles')
    @include('sections.datatable_css')
@endpush

@section('filter-section')
<style>
    #vendor-estimates-table th:nth-child(2),
    #vendor-estimates-table td:nth-child(2) {
        width: 300px !important; /* Force the width */
        max-width: 300px !important;
        min-width: 300px !important;
    }
</style>
    <x-filters.filter-box>
        <!-- DATE START -->
        <div class="select-box d-flex pr-2 border-right-grey border-right-grey-sm-0">
            <p class="mb-0 pr-2 f-14 text-dark-grey d-flex align-items-center">@lang('app.duration')</p>
            <div class="select-status d-flex">
                <input type="text" class="positiozn-relative text-dark form-control border-0 p-2 text-left f-14 f-w-500"
                    id="datatableRange" placeholder="@lang('placeholders.dateRange')">
            </div>
        </div>
        <!-- DATE END -->

        <!-- CLIENT START -->
        <!-- <div class="select-box d-flex py-2 px-lg-2 px-md-2 px-0 border-right-grey border-right-grey-sm-0">
            <p class="mb-0 pr-2 f-14 text-dark-grey d-flex align-items-center">@lang('app.status')</p>
            <div class="select-status">
                <select class="form-control select-picker" id="filter-status">
                    <option value="all">@lang('app.all')</option>
                    <option value="waiting">@lang('modules.estimates.waiting')</option>
                    <option value="accepted">@lang('modules.estimates.accepted')</option>
                    <option value="declined">@lang('modules.estimates.declined')</option>
                    <option value="draft">@lang('modules.estimates.draft')</option>
                </select>
            </div>
        </div> -->
        <!-- CLIENT END -->

        <!-- SEARCH BY TASK START -->
        <div class="task-search d-flex  py-1 px-lg-3 px-0 border-right-grey align-items-center">
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
        <!-- SEARCH BY TASK END -->

        <!-- RESET START -->
        <div class="select-box d-flex py-1 px-lg-2 px-md-2 px-0">
            <x-forms.button-secondary class="btn-xs d-none" id="reset-filters" icon="times-circle">
                @lang('app.clearFilters')
            </x-forms.button-secondary>
        </div>
        <!-- RESET END -->

    </x-filters.filter-box>

@endsection

@php
$addEstimatePermission = user()->permission('add_estimates');
@endphp

@section('content')
    <!-- CONTENT WRAPPER START -->
    <div class="content-wrapper">
        <!-- Add Task Export Buttons Start -->
        <div class="d-block d-lg-flex d-md-flex justify-content-between">
            <div id="table-actions" class="flex-grow-1 align-items-center mb-2 mb-lg-0 mb-md-0">
                @if ($addEstimatePermission == 'all' || $addEstimatePermission == 'added')
                    <x-forms.link-primary :link="route('vendor-estimates.create')" class="mr-3 float-left mb-2 mb-lg-0 mb-md-0" icon="plus">
                        @lang('modules.estimates.createEstimate')
                    </x-forms.link-primary>

                    <!-- <x-forms.link-secondary :link="route('estimate-template.index')"
                    class="mr-3 mb-2 mb-lg-0 mb-md-0 float-left mb-2 mb-lg-0 mb-md-0" icon="layer-group">
                    @lang('modules.estimates.estimateTemplate')
                    </x-forms.link-secondary> -->
                @endif
            </div>

            <div class="btn-group mt-3 mt-lg-0 mt-md-0 ml-lg-3 d-none d-lg-block" role="group">
                <a href="javascript:;" class="img-lightbox btn btn-secondary f-14"
                data-image-url="{{ asset('img/estimate-lc.png') }}" data-toggle="tooltip"
                data-original-title="@lang('app.howItWorks')"><i class="side-icon bi bi-question-circle"></i></a>
            </div>

        </div>

        <!-- Add Task Export Buttons End -->
        <!-- Task Box Start -->
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
        $('#vendor-estimates-table').on('preXhr.dt', function(e, settings, data) {
            var dateRangePicker = $('#datatableRange').data('daterangepicker');
            var startDate = $('#datatableRange').val();

            if (startDate == '') {
                startDate = null;
                endDate = null;
            } else {
                startDate = dateRangePicker.startDate.format('{{ company()->moment_date_format }}');
                endDate = dateRangePicker.endDate.format('{{ company()->moment_date_format }}');
            }

            var status = $('#filter-status').val();
            var searchText = $('#search-text-field').val();

            data['startDate'] = startDate;
            data['endDate'] = endDate;
            data['status'] = status;
            data['searchText'] = searchText;
        });
        const showTable = () => {
            window.LaravelDataTables["vendor-estimates-table"].draw(false);
        }

        $('#filter-status')
            .on('change keyup',
                function() {
                    if ($('#filter-status').val() != "all") {
                        $('#reset-filters').removeClass('d-none');
                        showTable();
                    } else {
                        $('#reset-filters').addClass('d-none');
                        showTable();
                    }
                });

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

        $('#vendor-estimates-table').on('change', '.change-cbid', function() {
            var id = $(this).data('row-id');
            var value =  $(this).val();
            var url="{{ route('vendors.changecbid',':id') }}";
            url = url.replace(':id', id);
            if (id != "" && value != "") {
            $.easyAjax({
                    url: url,
                    type: 'POST',
                    blockUI: true,
                    data: {
                            _token: '{{ csrf_token() }}',
                            value: value
                        },
                    success: function(response) {
                        if (response.status == 'success') {
                            window.location.reload();
                        } 
                    },
                });
            }
        });

        $('body').on('click', '.delete-table-row', function() {
            var id = $(this).data('estimate-id');
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
                    var url = "{{ route('vendor-estimates.destroy', ':id') }}";
                    url = url.replace(':id', id);

                    var token = "{{ csrf_token() }}";

                    $.easyAjax({
                        type: 'POST',
                        url: url,
                        blockUI: true,
                        data: {
                            '_token': token,
                            '_method': 'DELETE'
                        },
                        success: function(response) {
                            if (response.status == "success") {
                                showTable();
                            }
                        }
                    });
                }
            });
        });


    </script>
@endpush
