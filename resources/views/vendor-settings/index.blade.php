@extends('layouts.app')

@section('content')

    <!-- SETTINGS START -->
    <div class="w-100 d-flex ">

        @include('sections.setting-sidebar')

        <x-setting-card>

            <x-slot name="buttons">

                <x-alert type="info" icon="info-circle">
                    @lang('messages.defaultAddressInfo')
                </x-alert>

            </x-slot>

            <x-slot name="header">
                <div class="s-b-n-header" id="tabs">
                    <h2 class="mb-0 p-20 f-21 font-weight-normal text-capitalize border-bottom-grey">
                        @lang($pageTitle)</h2>
                </div>
            </x-slot>

            <!-- LEAVE SETTING START -->
            <div class="col-lg-12 col-md-12 ntfcn-tab-content-left w-100 p-4">
                <div class="col-md-6">
                    <x-forms.select fieldId="contract_id"
                        :fieldLabel="__('Select WC Waiver Form Template')" fieldName="contract_id" search="true" fieldRequired="true">
                            <option value="">--</option>
                            @foreach ($contract as $category)
                                <option
                                    value="{{ $category->id }}">
                                    {{ $category->subject }} 
                                </option>
                            @endforeach
                    </x-forms.select>
                </div>
            </div>
            <!-- LEAVE SETTING END -->

        </x-setting-card>

    </div>
    <!-- SETTINGS END -->

@endsection

@push('scripts')

    <script>

        $('body').on('click', '.delete-category', function () {

            var id = $(this).data('address-id');

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

                    var url = "{{ route('business-address.destroy', ':id') }}";
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
                        success: function (response) {
                            if (response.status == "success") {
                                $('#address-' + id).fadeOut();
                                init();
                            }
                        }
                    });
                }
            });
        });

        $('body').on('click', '.set_default', function () {
            var addressId = $(this).data('address-id');
            var token = "{{ csrf_token() }}";

            $.easyAjax({
                url: "{{ route('business-address.set_default') }}",
                type: "POST",
                data: {
                    addressId: addressId,
                    _token: token
                },
                blockUI: true,
                container: "#nav-tabContent",
                success: function (response) {
                    if (response.status == "success") {
                        window.location.reload();
                    }
                }
            });
        });

        // add new leave type
        $('#addNewLeaveType').click(function () {
            var url = "{{ route('business-address.create') }}";
            $(MODAL_XL + ' ' + MODAL_HEADING).html('...');
            $.ajaxModal(MODAL_XL, url);
        });

        $(MODAL_LG).on('shown.bs.modal', function () {
            $('#page_reload').val('true')
        })

        // add new leave type
        $('.editNewLeaveType').click(function () {

            var id = $(this).data('address-id');

            var url = "{{ route('business-address.edit', ':id') }}";
            url = url.replace(':id', id);

            $(MODAL_XL + ' ' + MODAL_HEADING).html('...');
            $.ajaxModal(MODAL_XL, url);
        });

    </script>
@endpush
