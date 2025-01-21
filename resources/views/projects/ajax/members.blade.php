@php
$addProjectMemberPermission = user()->permission('add_project_members');
$viewProjectMemberPermission = user()->permission('view_project_members');
$editProjectMemberPermission = user()->permission('edit_project_members');
$deleteProjectMemberPermission = user()->permission('delete_project_members');
$viewProjectHourlyRatePermission = user()->permission('view_project_hourly_rates');
@endphp

<!-- ROW START -->
<div class="row py-5">
    <div class="col-lg-12 col-md-12 mb-4 mb-xl-0 mb-lg-4">
        @if (($addProjectMemberPermission == 'all' || $addProjectMemberPermission == 'added' || $project->project_admin == user()->id) && !$project->trashed())
            <!-- <x-forms.button-primary icon="plus" id="add-project-member" class="type-btn mb-3">
                @lang('modules.projects.addMemberTitle')
            </x-forms.button-primary> -->
        @endif

        @if ($viewProjectMemberPermission == 'all')
            <x-cards.data :title="__('Project Manager')"
                otherClasses="border-0 p-0 d-flex justify-content-between align-items-center table-responsive-sm">
                <x-table class="border-0 pb-3 admin-dash-table table-hover">

                    <x-slot name="thead">
                        <th class="pl-20">#</th>
                        <th>@lang('app.name')</th>
                        <th>@lang('app.email')</th>
                        <th>@lang('app.phone')</th>
                        <th class="text-right pr-20">@lang('app.action')</th>
                    </x-slot>

                    @forelse($project->members as $key=>$member)
                        <tr id="row-{{ $member->id }}">
                            <td class="pl-20">{{ $key + 1 }}</td>
                            <td>
                                <x-employee :user="$member->user" />
                            </td>
                                
                            <td>
                                 {{$member->user->email}}
                            </td>
                            
                            <td>
                                 {{$member->user->mobile}}
                            </td>
                            <td class="text-right pr-20">

                                @if ($deleteProjectMemberPermission == 'all')
                                    <x-forms.button-secondary data-row-id="{{ $member->id }}" icon="trash"
                                        class="delete-row">
                                        @lang('app.delete')</x-forms.button-secondary>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">
                                <x-cards.no-record icon="user" :message="__('messages.noMemberAddedToProject')" />
                            </td>
                        </tr>
                    @endforelse
                </x-table>
            </x-cards.data>
        @endif
    </div>

</div>
<div class="row py-5">
    <div class="col-lg-12 col-md-12 mb-4 mb-xl-0 mb-lg-4">
        @if (($addProjectMemberPermission == 'all' || $addProjectMemberPermission == 'added' || $project->project_admin == user()->id) && !$project->trashed())
            <!-- <x-forms.button-primary icon="plus" id="add-project-member" class="type-btn mb-3">
                @lang('modules.projects.addMemberTitle')
            </x-forms.button-primary> -->
        @endif

        @if ($viewProjectMemberPermission == 'all')
            <x-cards.data :title="__('Project Coordinator')"
                otherClasses="border-0 p-0 d-flex justify-content-between align-items-center table-responsive-sm">
                <x-table class="border-0 pb-3 admin-dash-table table-hover">

                    <x-slot name="thead">
                        <th class="pl-20">#</th>
                        <th>@lang('app.name')</th>
                        <th>@lang('app.email')</th>
                        <th>@lang('app.phone')</th>
                        <th class="text-right pr-20">@lang('app.action')</th>
                    </x-slot>
                    @if($project->project_coordinator)
                    <tr id="row-{{ $project->project_coordinator->id }}">
                        <td class="pl-20"> 1 </td>
                        <td>
                            <x-employee :user="$project->project_coordinator" />
                        </td>
                            
                        <td>
                                {{$project->project_coordinator->email}}
                        </td>
                        
                        <td>
                                {{$project->project_coordinator->mobile}}
                        </td>
                        <td class="text-right pr-20">

                            @if ($deleteProjectMemberPermission == 'all')
                                <x-forms.button-secondary data-row-id="{{ $project->id }}" icon="trash"
                                    class="delete-coordinator">
                                    @lang('app.delete')</x-forms.button-secondary>
                            @endif
                        </td>
                    </tr>
                    @else
                    <tr>
                        <td colspan="5">
                            <x-cards.no-record icon="user" :message="__('messages.noMemberAddedToProject')" />
                        </td>
                    </tr>
                    @endif
                </x-table>
            </x-cards.data>
        @endif
    </div>
</div>
<div class="row py-5">
    <div class="col-lg-12 col-md-12 mb-4 mb-xl-0 mb-lg-4">
        @if (($addProjectMemberPermission == 'all' || $addProjectMemberPermission == 'added' || $project->project_admin == user()->id) && !$project->trashed())
            <!-- <x-forms.button-primary icon="plus" id="add-project-member" class="type-btn mb-3">
                @lang('modules.projects.addMemberTitle')
            </x-forms.button-primary> -->
        @endif

        @if ($viewProjectMemberPermission == 'all')
            <x-cards.data :title="__('Project Estimators')"
                otherClasses="border-0 p-0 d-flex justify-content-between align-items-center table-responsive-sm">
                <x-table class="border-0 pb-3 admin-dash-table table-hover">

                    <x-slot name="thead">
                        <th class="pl-20">#</th>
                        <th>@lang('app.name')</th>
                        <th>@lang('app.email')</th>
                        <th>@lang('app.phone')</th>
                        <th class="text-right pr-20">@lang('app.action')</th>
                    </x-slot>

                    @forelse($project->est_users as $key=>$member)
                        <tr id="row-{{ $member->id }}">
                            <td class="pl-20">{{ $key + 1 }}</td>
                            <td>
                                <x-employee :user="$member" />
                            </td>
                                
                            <td>
                                 {{$member->email}}
                            </td>
                            
                            <td>
                                 {{$member->mobile}}
                            </td>
                            <td class="text-right pr-20">

                                @if ($deleteProjectMemberPermission == 'all')
                                    <x-forms.button-secondary data-row-id="{{ $member->id }}" icon="trash"
                                        class="delete-estimator">
                                        @lang('app.delete')</x-forms.button-secondary>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">
                                <x-cards.no-record icon="user" :message="__('messages.noMemberAddedToProject')" />
                            </td>
                        </tr>
                    @endforelse
                </x-table>
            </x-cards.data>
        @endif
    </div>

</div>
<div class="row py-5">
    <div class="col-lg-12 col-md-12 mb-4 mb-xl-0 mb-lg-4">
        @if (($addProjectMemberPermission == 'all' || $addProjectMemberPermission == 'added' || $project->project_admin == user()->id) && !$project->trashed())
            <!-- <x-forms.button-primary icon="plus" id="add-project-member" class="type-btn mb-3">
                @lang('modules.projects.addMemberTitle')
            </x-forms.button-primary> -->
        @endif

        @if ($viewProjectMemberPermission == 'all')
            <x-cards.data :title="__('Project Accounting Analysts')"
                otherClasses="border-0 p-0 d-flex justify-content-between align-items-center table-responsive-sm">
                <x-table class="border-0 pb-3 admin-dash-table table-hover">

                    <x-slot name="thead">
                        <th class="pl-20">#</th>
                        <th>@lang('app.name')</th>
                        <th>@lang('app.email')</th>
                        <th>@lang('app.phone')</th>
                        <th class="text-right pr-20">@lang('app.action')</th>
                    </x-slot>

                    @forelse($project->acct_users as $key=>$member)
                        <tr id="row-{{ $member->id }}">
                            <td class="pl-20">{{ $key + 1 }}</td>
                            <td>
                                <x-employee :user="$member" />
                            </td>
                                
                            <td>
                                 {{$member->email}}
                            </td>
                            
                            <td>
                                 {{$member->mobile}}
                            </td>
                            <td class="text-right pr-20">

                                @if ($deleteProjectMemberPermission == 'all')
                                    <x-forms.button-secondary data-row-id="{{ $member->id }}" icon="trash"
                                        class="delete-acct">
                                        @lang('app.delete')</x-forms.button-secondary>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">
                                <x-cards.no-record icon="user" :message="__('messages.noMemberAddedToProject')" />
                            </td>
                        </tr>
                    @endforelse
                </x-table>
            </x-cards.data>
        @endif
    </div>

</div>
<div class="row py-5">
    <div class="col-lg-12 col-md-12 mb-4 mb-xl-0 mb-lg-4">
        @if (($addProjectMemberPermission == 'all' || $addProjectMemberPermission == 'added' || $project->project_admin == user()->id) && !$project->trashed())
            <!-- <x-forms.button-primary icon="plus" id="add-project-member" class="type-btn mb-3">
                @lang('modules.projects.addMemberTitle')
            </x-forms.button-primary> -->
        @endif

        @if ($viewProjectMemberPermission == 'all')
            <x-cards.data :title="__('Project Escalation Managers')"
                otherClasses="border-0 p-0 d-flex justify-content-between align-items-center table-responsive-sm">
                <x-table class="border-0 pb-3 admin-dash-table table-hover">

                    <x-slot name="thead">
                        <th class="pl-20">#</th>
                        <th>@lang('app.name')</th>
                        <th>@lang('app.email')</th>
                        <th>@lang('app.phone')</th>
                        <th class="text-right pr-20">@lang('app.action')</th>
                    </x-slot>

                    @forelse($project->emanager_users as $key=>$member)
                        <tr id="row-{{ $member->id }}">
                            <td class="pl-20">{{ $key + 1 }}</td>
                            <td>
                                <x-employee :user="$member" />
                            </td>
                                
                            <td>
                                 {{$member->email}}
                            </td>
                            
                            <td>
                                 {{$member->mobile}}
                            </td>
                            <td class="text-right pr-20">

                                @if ($deleteProjectMemberPermission == 'all')
                                    <x-forms.button-secondary data-row-id="{{ $member->id }}" icon="trash"
                                        class="delete-emanager">
                                        @lang('app.delete')</x-forms.button-secondary>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">
                                <x-cards.no-record icon="user" :message="__('messages.noMemberAddedToProject')" />
                            </td>
                        </tr>
                    @endforelse
                </x-table>
            </x-cards.data>
        @endif
    </div>
</div>
<div class="row py-5">
    <div class="col-lg-12 col-md-12 mb-4 mb-xl-0 mb-lg-4">
        @if (($addProjectMemberPermission == 'all' || $addProjectMemberPermission == 'added' || $project->project_admin == user()->id) && !$project->trashed())
            <!-- <x-forms.button-primary icon="plus" id="add-project-member" class="type-btn mb-3">
                @lang('modules.projects.addMemberTitle')
            </x-forms.button-primary> -->
        @endif

        @if ($viewProjectMemberPermission == 'all')
            <x-cards.data :title="__('Project Schdeuler')"
                otherClasses="border-0 p-0 d-flex justify-content-between align-items-center table-responsive-sm">
                <x-table class="border-0 pb-3 admin-dash-table table-hover">

                    <x-slot name="thead">
                        <th class="pl-20">#</th>
                        <th>@lang('app.name')</th>
                        <th>@lang('app.email')</th>
                        <th>@lang('app.phone')</th>
                        <th class="text-right pr-20">@lang('app.action')</th>
                    </x-slot>
                    @if($project->project_scheduler)
                    <tr id="row-{{ $project->project_scheduler->id }}">
                        <td class="pl-20"> 1 </td>
                        <td>
                            <x-employee :user="$project->project_scheduler" />
                        </td>
                            
                        <td>
                                {{$project->project_scheduler->email}}
                        </td>
                        
                        <td>
                                {{$project->project_scheduler->mobile}}
                        </td>
                        <td class="text-right pr-20">

                            @if ($deleteProjectMemberPermission == 'all')
                                <x-forms.button-secondary data-row-id="{{ $project->id }}" icon="trash"
                                    class="delete-scheduler">
                                    @lang('app.delete')</x-forms.button-secondary>
                            @endif
                        </td>
                    </tr>
                    @else
                    <tr>
                        <td colspan="5">
                            <x-cards.no-record icon="user" :message="__('messages.noMemberAddedToProject')" />
                        </td>
                    </tr>
                    @endif
                </x-table>
            </x-cards.data>
        @endif
    </div>
</div>
<div class="row py-5">
    <div class="col-lg-12 col-md-12 mb-4 mb-xl-0 mb-lg-4">
        @if (($addProjectMemberPermission == 'all' || $addProjectMemberPermission == 'added' || $project->project_admin == user()->id) && !$project->trashed())
            <!-- <x-forms.button-primary icon="plus" id="add-project-member" class="type-btn mb-3">
                @lang('modules.projects.addMemberTitle')
            </x-forms.button-primary> -->
        @endif

        @if ($viewProjectMemberPermission == 'all')
            <x-cards.data :title="__('Vendor Recruiter')"
                otherClasses="border-0 p-0 d-flex justify-content-between align-items-center table-responsive-sm">
                <x-table class="border-0 pb-3 admin-dash-table table-hover">

                    <x-slot name="thead">
                        <th class="pl-20">#</th>
                        <th>@lang('app.name')</th>
                        <th>@lang('app.email')</th>
                        <th>@lang('app.phone')</th>
                        <th class="text-right pr-20">@lang('app.action')</th>
                    </x-slot>
                    @if($project->vendor_recruiter)
                    <tr id="row-{{ $project->vendor_recruiter->id }}">
                        <td class="pl-20"> 1 </td>
                        <td>
                            <x-employee :user="$project->vendor_recruiter" />
                        </td>
                            
                        <td>
                                {{$project->vendor_recruiter->email}}
                        </td>
                        
                        <td>
                                {{$project->vendor_recruiter->mobile}}
                        </td>
                        <td class="text-right pr-20">

                            @if ($deleteProjectMemberPermission == 'all')
                                <x-forms.button-secondary data-row-id="{{ $project->id }}" icon="trash"
                                    class="delete-recruiter">
                                    @lang('app.delete')</x-forms.button-secondary>
                            @endif
                        </td>
                    </tr>
                    @else
                    <tr>
                        <td colspan="5">
                            <x-cards.no-record icon="user" :message="__('messages.noMemberAddedToProject')" />
                        </td>
                    </tr>
                    @endif
                </x-table>
            </x-cards.data>
        @endif
    </div>
</div>

<!-- ROW END -->

<script>

    $(document).ready(function () {
        setTimeout(function () {
            $('[data-toggle="popover"]').popover();
        }, 500);
    });

    $('#add-project-member').click(function() {
        const url = "{{ route('project-members.create') }}" + "?id={{ $project->id }}";
        $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
        $.ajaxModal(MODAL_LG, url);

    });

    $('.delete-row').click(function() {

        var id = $(this).data('row-id');
        var url = "{{ route('project-members.destroy', ':id') }}";
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
                        '_method': 'DELETE',
                        'action':'coordinator'
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
    $('.delete-estimator').click(function() {

        var id = $(this).data('row-id');
        var url = "{{ route('project-members.destroy', ':id') }}";
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
                        '_method': 'DELETE',
                        'action':'estimator',
                        'project':"{{$project->id}}"
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
        $('.delete-coordinator').click(function() {

        var id = $(this).data('row-id');
        var url = "{{ route('project-members.remove_ext', ':id') }}";
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
                        'action':'coordinator',
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

        $('.delete-recruiter').click(function() {

        var id = $(this).data('row-id');
        var url = "{{ route('project-members.remove_ext', ':id') }}";
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
                        'action':'recruiter',
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

        $('.delete-scheduler').click(function() {

        var id = $(this).data('row-id');
        var url = "{{ route('project-members.remove_ext', ':id') }}";
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
                        'action':'scheduler',
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

        $('.delete-acct').click(function() {

        var id = $(this).data('row-id');
        var url = "{{ route('project-members.destroy', ':id') }}";
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
                        '_method': 'DELETE',
                        'action':'accounting',
                        'project':"{{$project->id}}"
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
        $('.delete-emanager').click(function() {

            var id = $(this).data('row-id');
            var url = "{{ route('project-members.destroy', ':id') }}";
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
                            '_method': 'DELETE',
                            'action':'emanager',
                            'project':"{{$project->id}}"
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
