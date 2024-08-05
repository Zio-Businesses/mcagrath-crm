@push('datatable-styles')
    @include('sections.datatable_css')
    <style>
        .value-list li {
            list-style: disc;
        }
        .dataTables_filter {
            display: block !important;
            padding-top: 20px;
        }

    </style>
@endpush

<div class="col-lg-12 col-md-12 ntfcn-tab-content-left">
        <table class="table w-100 table-sm-responsive" id="users-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>State</th>
                    <th>County</th>
                    <th>City</th>
                    <th>Actions</th>
                </tr>
            </thead>
        </table>
</div>
<div class="w-100 border-top-grey set-btns">
    <x-setting-form-actions>
        <x-forms.button-primary id="add-new-location" class="mr-3" icon="plus">@lang('Add New Location')
        </x-forms.button-primary>
        <x-forms.button-secondary icon="file-upload" id="importLocation"
                                    class="mr-3"> @lang('Import')
        </x-forms.button-secondary>
    </x-setting-form-actions>
</div>
@push('scripts')

    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>

        <script>
            function setPaginationButtons() {
                if (window.innerWidth <= 767) {
                    $.fn.dataTable.ext.pager.numbers_length = 3; // Mobile view: limit to 3 buttons
                } else {
                    $.fn.dataTable.ext.pager.numbers_length = 7; // Desktop view: limit to 5 buttons
                }
            }
           $(function () {
                setPaginationButtons();
                var table = $('#users-table').dataTable({
                    responsive: true,
                    processing: true,
                    serverSide: true,
                    ajax: '{!! route('locations.getLocations') !!}',
                    columns: [
                        {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                        {data: 'state', name: 'state'},
                        {data: 'county', name: 'county'},
                        {data: 'city', name: 'city'},
                        { 
                            data: 'actions', 
                            name: 'actions', 
                            orderable: false, 
                            searchable: false,
                            className: "text-right",
                            width: '20%',
                            render: function(data, type, row) {
                                return `
                                    <div class="task_view"> 
                                    <a data-user-id="${row.id}" class="task_view_more d-flex align-items-center justify-content-center edit-custom-field" href="javascript:;" > 
                                    <i class="fa fa-edit icons mr-2"></i>Edit
                                    </a> 
                                    </div>
                                    <div class="task_view"> 
                                    <a data-user-id="${row.id}" class="task_view_more d-flex align-items-center justify-content-center sa-params" href="javascript:;"  >
                                    <i class="fa fa-trash icons mr-2"></i> Delete
                                    </a>
                                    </div>
                                `;
                            }
                        },
                    ],
                });
            });

            $('#importLocation').click(function () {
                var url = "{{ route('location.importLocation') }}";
                $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
                $.ajaxModal(MODAL_LG, url);
            });
            $('#add-new-location').click(function () {
                var url = "{{ route('location.create') }}";
                $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
                $.ajaxModal(MODAL_LG, url);
            });
            $('body').on('click', '.edit-custom-field', function () {
                const id = $(this).data('user-id');
                // let url = "{{ route('custom-fields.edit',':id') }}";
                // url = url.replace(':id', id);
                // $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
                // $.ajaxModal(MODAL_LG, url);
            });
                

        </script>
@endpush
