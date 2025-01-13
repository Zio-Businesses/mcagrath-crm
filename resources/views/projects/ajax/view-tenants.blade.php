
<div class="modal-header">
    <h5 class="modal-title" id="modelHeading">@lang('Tenant Details')</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">×</span></button>
</div>
<div class="modal-body">
    <div class="row py-5">
        
        <div class="col-lg-12 col-md-12 mb-4 mb-xl-0 mb-lg-4">
            
            <x-table class="border-0 pb-3 admin-dash-table table-hover">

                <x-slot name="thead">
                    <th> Sl #</th>
                    <th>@lang('Tenant Name')</th>
                    <th>@lang('Tenant Ph #')</th>
                    <th>@lang('Tenant Email')</th>
                </x-slot>
                <tr>
                    <td>1</td>
                    <td>
                        {{$project->projectContacts->tenant_name_1}}
                    </td>
                    <td>
                        {{$project->projectContacts->tenant_phone_1}}
                    </td>
                    <td>
                        {{$project->projectContacts->tenant_email_1}}
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>
                        {{$project->projectContacts->tenant_name_2}}
                    </td>
                    <td>
                        {{$project->projectContacts->tenant_phone_2}}
                    </td>
                    <td>
                        {{$project->projectContacts->tenant_email_2}}
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>
                        {{$project->projectContacts->tenant_name_3}}
                    </td>
                    <td>
                        {{$project->projectContacts->tenant_phone_3}}
                    </td>
                    <td>
                        {{$project->projectContacts->tenant_email_3}}
                    </td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>
                        {{$project->projectContacts->tenant_name_4}}
                    </td>
                    <td>
                        {{$project->projectContacts->tenant_phone_4}}
                    </td>
                    <td>
                        {{$project->projectContacts->tenant_email_4}}
                    </td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>
                        {{$project->projectContacts->tenant_name_5}}
                    </td>
                    <td>
                        {{$project->projectContacts->tenant_phone_5}}
                    </td>
                    <td>
                        {{$project->projectContacts->tenant_email_5}}
                    </td>
                </tr>
            </x-table>

        </div>

    </div>
</div>


