@extends('layouts.app')

@push('datatable-styles')
    @include('sections.datatable_css')
@endpush

@section('filter-section')

    <x-filters.filter-box>
        <!-- DATE START -->
        <div class="select-box d-flex pr-2 border-right-grey border-right-grey-sm-0">
            <p class="mb-0 pr-2 f-14 text-dark-grey d-flex align-items-center">@lang('modules.client.addedOn')</p>
            <div class="select-status d-flex">
                <input type="text" class="position-relative text-dark form-control border-0 p-2 text-left f-14 f-w-500 border-additional-grey"
                    id="datatableRange" placeholder="@lang('placeholders.dateRange')">
            </div>
        </div>
        <!-- DATE END -->

        

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

        <!-- MORE FILTERS START -->
        <x-filters.more-filter-box>

            <div class="more-filter-items">
                <label class="f-14 text-dark-grey mb-12 text-capitalize" for="usr">@lang('app.status')</label>
                <div class="select-filter mb-4">
                    <div class="select-others">
                        <select class="form-control select-picker" data-container="body" name="status" id="status">
                            <option value="">--</option>
                            @foreach ($vendorStatuses as $status)
                                <option value="{{ $status }}">
                                    {{ ucfirst($status) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="more-filter-items">
                <label class="f-14 text-dark-grey mb-12 text-capitalize" for="usr">@lang('Created By')</label>
                <div class="select-filter mb-4">
                    <div class="select-others">
                        <select class="form-control select-picker" id="createdby" data-live-search="true"
                            data-container="body" data-size="5">
                            <option value="">--</option>
                            @foreach ($createdby as $created)
                                <option value="{{$created->name}}">
                                    {{$created->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="more-filter-items">
                <label class="f-14 text-dark-grey mb-12 text-capitalize" for="usr">@lang('Contractor Type')</label>
                <div class="select-filter mb-4">
                    <div class="select-others">
                        <select class="form-control select-picker" id="contractor_type" data-live-search="true"
                            data-container="body" data-size="5">
                            <option value="">--</option>
                            @foreach ($contracttype as $type)
                                <option value="{{$type->contracor_type}}">
                                    {{$type->contractor_type}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="more-filter-items">
                <label class="f-14 text-dark-grey mb-12 text-capitalize" for="usr">@lang('State')</label>
                <div class="select-filter mb-4">
                    <div class="select-others">
                        <select class="form-control select-picker" id="state" data-live-search="true"
                            data-container="body" data-size="5">
                            <option value="">--</option>
                            @foreach ($state as $states)
                                <option value="{{$states->state}}">
                                    {{$states->state}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="more-filter-items">
                <label class="f-14 text-dark-grey mb-12 text-capitalize" for="usr">@lang('County')</label>
                <div class="select-filter mb-4">
                    <div class="select-others">
                        <select class="form-control select-picker" id="county" data-live-search="true"
                            data-container="body" data-size="5">
                            <option value="">--</option>
                            @foreach ($county as $counties)
                                <option value="{{$counties->county}}">
                                    {{$counties->county}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="more-filter-items">
                <label class="f-14 text-dark-grey mb-12 text-capitalize" for="usr">@lang('City')</label>
                <div class="select-filter mb-4">
                    <div class="select-others">
                        <select class="form-control select-picker" id="city" data-live-search="true"
                            data-container="body" data-size="5">
                            <option value="">--</option>
                            @foreach ($city as $cities)
                                <option value="{{$cities->city}}">
                                    {{$cities->city}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

        </x-filters.more-filter-box>
        <!-- MORE FILTERS END -->
    </x-filters.filter-box>

@endsection

@section('content')

    <!-- CONTENT WRAPPER START -->
    <div class="content-wrapper">
        <!-- Add Task Export Buttons Start -->
        <div class="d-grid d-lg-flex d-md-flex action-bar">

            <div id="table-actions" class="flex-grow-1 align-items-center">
                    <x-forms.button-secondary class="mr-3 float-left mb-2 mb-lg-0 mb-md-0 d-sm-bloc d-none d-lg-block" icon="file-upload" id="importLeadVendor">
                        @lang('app.importExcel')
                    </x-forms.button-secondary>  
            </div>

            <!-- <x-datatable.actions>
                <div class="select-status mr-3">
                    <select name="action_type" class="form-control select-picker" id="quick-action-type" disabled>
                        <option value="">@lang('app.selectAction')</option>
                        <option value="change-status">@lang('modules.tasks.changeStatus')</option>
                        <option value="delete">@lang('app.delete')</option>
                    </select>
                </div>
                <div class="select-status mr-3 d-none quick-action-field" id="change-status-action">
                    <select name="status" class="form-control select-picker">
                        <option value="deactive">@lang('app.inactive')</option>
                        <option value="active">@lang('app.active')</option>
                    </select>
                </div>
            </x-datatable.actions> -->


            <div class="btn-group mt-2 mt-lg-0 mt-md-0 ml-0 ml-lg-3 ml-md-3" role="group">
                <a href="{{ route('vendors.index') }}" class="btn btn-secondary f-14 btn-active" data-toggle="tooltip"
                    data-original-title="@lang('Vendors')"><i class="side-icon bi bi-list-ul"></i></a>

                <!-- <a href="javascript:;" class="btn btn-secondary f-14 show-unverified" data-toggle="tooltip"
                    data-original-title="@lang('modules.dashboard.verificationPending')"><i class="side-icon bi bi-person-x"></i></a> -->
            </div>

        </div>
        <!-- Add Task Export Buttons End -->

        <!-- Task Box Start -->
        <div class="d-flex flex-column w-tables rounded mt-3 bg-white table-responsive">

            {!! $dataTable->table(['class' => 'table table-hover border-0 w-100']) !!}

        </div>
        <div id="signature-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog d-flex justify-content-center align-items-center modal-xl">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modelHeading">@lang('modules.estimates.cpatureAndConfirmation')</h5>
                <button type="button"  class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">

                <x-form id="acceptEstimate">
                    <div class="row">
                        <div class="col-sm-12 bg-grey p-4 signature">
                            <x-forms.label fieldId="signature-pad" fieldRequired="true" :fieldLabel="__('modules.estimates.signature')" />
                            <div class="signature_wrap wrapper border-0 form-control">
                                <canvas id="signature-pad" class="signature-pad rounded" width=725 height=150></canvas>
                            </div>
                        </div>
                        <div class="col-sm-12 p-4 d-none upload-image">
                            <x-forms.file allowedFileExtensions="png jpg jpeg svg bmp" class="mr-0 mr-lg-2 mr-md-2" :fieldLabel="__('modules.estimates.signature')" fieldName="image"
                                fieldId="image" :popover="__('messages.fileFormat.ImageFile')" fieldRequired="true" />
                        </div>
                        <div class="col-sm-12 mt-3">
                            <x-forms.button-secondary id="undo-signature" class="signature">@lang('modules.estimates.undo')</x-forms.button-secondary>
                            <x-forms.button-secondary class="ml-2 signature" id="clear-signature">@lang('modules.estimates.clear')</x-forms.button-secondary>
                            <x-forms.button-secondary class="ml-2 " id="toggle-pad-uploader">@lang('modules.estimates.uploadSignature')
                            </x-forms.button-secondary>
                        </div>

                    </div>
                </x-form>
            </div>
            <div class="modal-footer">
                <x-forms.button-cancel data-dismiss="modal" class="border-0 mr-3">@lang('app.cancel')</x-forms.button-cancel>
                <x-forms.button-primary id="save-signature" icon="check">@lang('app.sign')</x-forms.button-primary>
            </div>
            </div>
            </div>
        </div>
        <!-- Task Box End -->
    </div>
    <!-- CONTENT WRAPPER END -->

@endsection

@push('scripts')
    @include('sections.datatable_js')
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
    <script>
        
         $("#file").dropify({
            messages: dropifyMessages
        });
        var row_id;
       
        $('#vendorstrack-table').on('preXhr.dt', function(e, settings, data) {

            const dateRangePicker = $('#datatableRange').data('daterangepicker');
            let startDate = $('#datatableRange').val();

            let endDate;

            if (startDate == '') {
                startDate = null;
                endDate = null;
            } else {
                startDate = dateRangePicker.startDate.format('{{ company()->moment_date_format }}');
                endDate = dateRangePicker.endDate.format('{{ company()->moment_date_format }}');
            }
            const searchText = $('#search-text-field').val();
            data['searchText'] = searchText;
            const status = $('#status').val();
            data['status'] = status;
            const createdby = $('#createdby').val();
            data['createdby'] = createdby;
            const contractor_type = $('#contractor_type').val();
            data['contractor_type'] = contractor_type;
            const state = $('#state').val();
            data['state'] = state;
            const county = $('#county').val();
            data['county'] = county;
            const city = $('#city').val();
            data['city'] = city;
            data['startDate'] = startDate;
            data['endDate'] = endDate;
            
        });
        
        const showTable = () => {
            window.LaravelDataTables["vendorstrack-table"].draw(false);
        }
        $('#status, #createdby, #contractor_type, #state, #county, #city').on('change keyup', function() {
                if ($('#status').val() !== "") {
                    $('#reset-filters').removeClass('d-none');
                } 
                else if ($('#createdby').val() !== "") {
                    $('#reset-filters').removeClass('d-none');
                }
                else if ($('#contractor_type').val() !== "") {
                    $('#reset-filters').removeClass('d-none');
                }
                else if ($('#state').val() !== "") {
                    $('#reset-filters').removeClass('d-none');
                }
                else if ($('#county').val() !== "") {
                    $('#reset-filters').removeClass('d-none');
                }
                else if ($('#city').val() !== "") {
                    $('#reset-filters').removeClass('d-none');
                }
                else {
                    $('#reset-filters').addClass('d-none');
                }
                showTable();
        });

        $('#search-text-field').on('keyup', function() {
            if ($('#search-text-field').val() != "") {
                $('#reset-filters').removeClass('d-none');
                showTable();
            }
        });
        $('#importLeadVendor').click(function () {
                var url = "{{ route('vendortrack.importLeadVendor') }}";
                $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
                $.ajaxModal(MODAL_LG, url);
            });
        $('#reset-filters,#reset-filters-2').click(function() {
            $('#filter-form')[0].reset();
            $('.filter-box .select-picker').selectpicker("refresh");
            $('#reset-filters').addClass('d-none');
            showTable();
        });    
        
        $('body').on('click', '.send-proposal', function() {
            const id = $(this).data('user-send');
            var token = "{{ csrf_token() }}";
            var buttonSelector=".send-proposal";
            var url = "{{ route('vendortrack.proposal', ':id') }}";
            url = url.replace(':id', id);
            $.easyAjax({
                type: 'POST',
                url: url,
                disableButton: true,
                blockUI: true,
                buttonSelector: buttonSelector,
                data: {
                    '_token': token,
                },
                success: function(response) {
                    showTable();
                }
            });
            
        });
        $('body').on('click', '.delete-table-row', function() {
            const id = $(this).data('user-id');
            var token = "{{ csrf_token() }}";
            Swal.fire({
                title: "@lang('messages.sweetAlertTitle')",
                text:   "@lang('messages.recoverRecord')",
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
                    var url = "{{ route('vendortrack.destroy', ':id') }}";
                    url = url.replace(':id', id);
                    $.easyAjax({
                        type: 'POST',
                        url: url,
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

        $( document ).ready(function() {
            @if (!is_null(request('start')) && !is_null(request('end')))
            $('#datatableRange').val('{{ request('start') }}' +
            ' @lang("app.to") ' + '{{ request('end') }}');
            $('#datatableRange').data('daterangepicker').setStartDate("{{ request('start') }}");
            $('#datatableRange').data('daterangepicker').setEndDate("{{ request('end') }}");
                showTable();
            @endif
        });
        

    </script>
   
@endpush
