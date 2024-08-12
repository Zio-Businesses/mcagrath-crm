

<!-- ROW START -->
<div class="row pb-5">
    <div class="col-lg-12 col-md-12 mb-4 mb-xl-0 mb-lg-4 mt-3 mt-lg-5 mt-md-5">
        <!-- Add Task Export Buttons Start -->
        <div class="d-flex" id="table-actions">
            <x-forms.link-primary :link="route('vendor-module-notes.create').'?vendorid='.$vendorDetail->id"
                    class="mr-3 openRightModal" icon="plus" data-redirect-url="{{ url()->full() }}">
                    @lang('modules.client.createNote')
                </x-forms.link-primary>
        </div>
        <!-- Add Task Export Buttons End -->
        <!-- Task Box Start -->
        <div class="d-flex flex-column w-tables rounded mt-3 bg-white table-responsive">

            {!! $dataTable->table(['class' => 'table table-hover border-0 w-100']) !!}

        </div>
        <!-- Task Box End -->
    </div>
</div>

@include('sections.datatable_js')

<script>
        $('#vendor-module-note-table').on('preXhr.dt', function(e, settings, data) {
            var vendorID = "{{ $vendorDetail->id }}";
            data['vendorID'] = vendorID;
            
        });

        const showTable = () => {
            window.LaravelDataTables["vendor-module-note-table"].draw(false);
        }

        $('body').on('click', '.delete-table-row', function() {
        var id = $(this).data('user-id');
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
                var url = "{{ route('vendor-module-notes.destroy', ':id') }}";
                url = url.replace(':id', id);

                var token = "{{ csrf_token() }}";

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
</script>
