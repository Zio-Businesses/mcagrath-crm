<div class="row py-5">
    <div class="col-lg-12 col-md-12 mb-4 mb-xl-0 mb-lg-4">
        
            <x-forms.button-primary icon="plus" id="add-project-sow" class="type-btn mb-3">
                @lang('Add Vendors')
            </x-forms.button-primary>
       

       
            <x-cards.data :title="__('Vendors')"
                otherClasses="border-0 p-0 d-flex justify-content-between align-items-center table-responsive-sm">
                <x-table class="border-0 pb-3 admin-dash-table table-hover">

                    <x-slot name="thead">
                        <th class="pl-20">#</th>
                        <th>@lang('Vendor Name')</th>
                        <th>@lang('Link Sent By')</th>
                        <th>@lang('Sow')</th>
                        <th class="text-right pr-20">@lang('app.action')</th>
                    </x-slot>

                    @forelse($project->projectvendor as $key=>$item)
                        <tr id="row-{{ $item->id }}">
                            <td class="pl-20">{{ $key + 1 }}</td>
                            <td>
                                <a href="javascript:;" class="sow-detail text-darkest-grey f-w-500"
                                    data-sow-id="{{ $item->id }}">{{ $item->vendor_name}}</a>
                            </td>
                            <td>
                                {{$item->linksentby->name}}
                            </td>
                            <td>
                                @foreach($item->sow_id as $sow)
                                {{$item->sowname($sow)}}<br/>
                                @endforeach
                            </td>
                            <td class="text-right pr-20">
                                <div class="task_view">
                                    <a href="javascript:;" data-sow-id="{{ $item->id }}"
                                        class="taskView sow-detail text-darkest-grey f-w-500">@lang('app.view')</a>
                                    <div class="dropdown">
                                        <a class="task_view_more d-flex align-items-center justify-content-center dropdown-toggle"
                                            type="link" id="dropdownMenuLink-{{ $item->id }}" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="icon-options-vertical icons"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdownMenuLink-{{ $item->id }}" tabindex="0">
                                                @if(is_null($project->deleted_at))
                                                    <a class="dropdown-item edit-sow" href="javascript:;"
                                                        data-row-id="{{ $item->id }}">
                                                        <i class="fa fa-edit mr-2"></i>
                                                        @lang('app.edit')
                                                    </a>
                                                @endif
                                                <a class="dropdown-item delete-row" href="javascript:;"
                                                    data-row-id="{{ $item->id }}">
                                                    <i class="fa fa-trash mr-2"></i>
                                                    @lang('app.delete')
                                                </a>
                                        </div>
                                    </div>
                                </div>

                            </td>
                        </tr>
                    @empty
                        <x-cards.no-record-found-list colspan="5"/>
                    @endforelse
                </x-table>
            </x-cards.data>
    </div>

</div>
<!-- ROW END -->

<script>
    $('#add-project-sow').click(function() {
        const url = "{{ route('projectvendors.create') }}" + "?id={{ $project->id }}";
        $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
        $.ajaxModal(MODAL_LG, url);

    });

    // $('body').on('click', '.edit-sow', function() {
    //     var id = $(this).data('row-id');

    //     var url = "{{ route('sow.edit', ':id') }}";
    //     url = url.replace(':id', id);

    //     $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
    //     $.ajaxModal(MODAL_LG, url);

    // });

    // $('body').on('click', '.sow-detail', function() {
    //     var id = $(this).data('sow-id');
    //     var url = "{{ route('sow.show', ':id') }}";
    //     url = url.replace(':id', id);
    //     $(MODAL_XL + ' ' + MODAL_HEADING).html('...');
    //     $.ajaxModal(MODAL_XL, url);
    // });

    $('.delete-row').click(function() {

        var id = $(this).data('row-id');
        var url = "{{ route('projectvendors.destroy', ':id') }}";
        url = url.replace(':id', id);

        var token = "{{ csrf_token() }}";

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
                $.easyAjax({
                    type: 'POST',
                    url: url,
                    data: {
                        '_token': token,
                        '_method': 'DELETE'
                    },
                    success: function(response) {
                        if (response.status == "success") {
                            $('#row-' + id).fadeOut();
                        }
                    }
                });
            }
        });

    });

</script>
