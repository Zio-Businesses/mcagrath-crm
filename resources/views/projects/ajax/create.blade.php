@php
    $addProjectCategoryPermission = user()->permission('manage_project_category');
    $addEmployeePermission = user()->permission('add_employees');
    $addProjectFilePermission = user()->permission('add_project_files');
    $addPublicProjectPermission = user()->permission('create_public_project');
    $addProjectMemberPermission = user()->permission('add_project_members');
    $addProjectNotePermission = user()->permission('add_project_note');
@endphp
<style>
        .tenant-fields {
            display: none;
        }
</style>
<link rel="stylesheet" href="{{ asset('vendor/css/dropzone.min.css') }}">
<div class="row">
    <div class="col-sm-12">
        <x-form id="save-project-data-form">
            <div class="add-client bg-white rounded">
                <h4 class="mb-0 p-20 f-21 font-weight-normal text-capitalize border-top-grey">
                    <a href="javascript:;" class="text-dark toggle-main-project-details">
                    <i class="fa fa-chevron-up mr-2"></i>@lang('app.projectDetails')</a>
                </h4>
                <input type="hidden" name="template_id" value="{{ $projectTemplate->id ?? '' }}">
                <div class="row p-20" id="main-project-details">
                    <div class="col-lg-3 col-md-3">
                        <x-forms.text class="mr-0 mr-lg-2 mr-md-2" :fieldLabel="__('Work Order #')"
                                      fieldName="project_code" fieldRequired="true" fieldId="project_code"
                                      :fieldPlaceholder="__('Project unique work order')" :fieldValue="$project ? $project->project_short_code : ''"/>
                    </div>
                    <div class="col-md-3 @if (!isset($client) && is_null($client)) py-3 @endif">
                        @if (isset($client) && !is_null($client))
                            <x-forms.label class="my-3" fieldId="client_id" :fieldLabel="__('app.client')">
                            </x-forms.label>

                            <input type="hidden" name="client_id" id="client_id" value="{{ $client->id }}">
                            <input type="text" value="{{ $client->name_salutation }}"
                                   class="form-control height-35 f-15 readonly-background" readonly>
                        @else
                            <x-client-selection-dropdown :clients="$clients" fieldRequired="false"
                                                         :selected="request('default_client') ?? null"/>
                        @endif
                    </div>
                    <div class="col-md-3">
                        <x-forms.label class="mb-12 mt-3" fieldId="type"
                                       :fieldLabel="__('Project Type')" fieldRequired="true">
                        </x-forms.label>
                        <x-forms.input-group>
                            <select class="form-control select-picker" name="type" id="type"
                                    data-live-search="true">
                                <option value="">--</option>
                                @foreach ($projecttype as $category)
                                    <option
                                        value="{{ $category->type }}">
                                        {{ $category->type }}
                                    </option>
                                @endforeach
                            </select>
                        </x-forms.input-group>
                    </div>
                    <div class="col-md-3">
                        <x-forms.label class="mb-12 mt-3" fieldId="priority"
                                       :fieldLabel="__('Priority')" fieldRequired="true">
                        </x-forms.label>
                        <x-forms.input-group>
                            <select class="form-control select-picker" name="priority" id="priority"
                                    data-live-search="true">
                                <option value="">--</option>
                                @foreach ($projectpriority as $category)
                                    <option
                                        value="{{ $category->priority}}">
                                        {{ $category->priority }}
                                    </option>
                                @endforeach
                            </select>
                        </x-forms.input-group>
                    </div>
                    <div class="col-md-3">
                        <x-forms.label class="my-3" fieldId="category_id"
                                       :fieldLabel="__('modules.projects.projectCategory')" fieldRequired="true">
                        </x-forms.label>
                        <x-forms.input-group>
                            <select class="form-control select-picker" name="category_id" id="project_category_id"
                                    data-live-search="true">
                                <option value="">--</option>
                                @foreach ($categories as $category)
                                    <option
                                        @if (($projectTemplate && $projectTemplate->category_id == $category->id) || ($project && $project->category_id == $category->id)) selected
                                        @endif
                                        value="{{ $category->id }}">
                                        {{ $category->category_name }}
                                    </option>
                                @endforeach
                            </select>

                            @if ($addProjectCategoryPermission == 'all' || $addProjectCategoryPermission == 'added')
                                <x-slot name="append">
                                    <button id="addProjectCategory" type="button"
                                            class="btn btn-outline-secondary border-grey"
                                            data-toggle="tooltip" data-original-title="{{__('modules.projectCategory.addProjectCategory') }}">@lang('app.add')</button>
                                </x-slot>
                            @endif
                        </x-forms.input-group>
                    </div>

                    <div class="col-md-3">
                        <x-forms.label class="my-3" fieldId="sub_category"
                                       :fieldLabel="__('Project Sub-Category')" fieldRequired="true">
                        </x-forms.label>
                        <x-forms.input-group>
                            <select class="form-control select-picker" name="sub_category" id="sub_category"
                                    data-live-search="true">
                                <option value="">--</option>
                                @foreach ($subcategories as $category)
                                    <option
                                        value="{{ $category->sub_category }}">
                                        {{ $category->sub_category }}
                                    </option>
                                @endforeach
                            </select>
                        </x-forms.input-group>
                    </div>
                    <div class="col-md-3 col-lg-3">
                        <x-forms.datepicker fieldId="start_date" fieldRequired="true"
                                            :fieldLabel="__('Project Date')" fieldName="start_date"
                                            :fieldPlaceholder="__('placeholders.date')" :fieldValue="$project ? $project->start_date->format(company()->date_format) : ''"/>
                    </div>

                    <div class="col-md-3 col-lg-3" id="deadlineBox">
                        <x-forms.datepicker fieldId="deadline" fieldRequired="true"
                                            :fieldLabel="__('Due Date')" fieldName="deadline"
                                            :fieldPlaceholder="__('placeholders.date')"
                                            :fieldValue="($project ? (($project->deadline) ?$project->deadline->format(company()->date_format) : '') : '')" />
                    </div>
            
                    @if ($addProjectNotePermission == 'all' || $addProjectNotePermission == 'added')
                        <div class="col-md-12 col-lg-12">
                            <div class="form-group mb-12 mt-3">
                                <x-forms.label fieldId="project_summary"
                                               :fieldLabel="__('Client Instructions')">
                                </x-forms.label>
                                <div id="project_summary">{!! $projectTemplate->project_summary ?? '' !!}{!! ($project) ? $project->project_summary : '' !!}</div>
                                <textarea name="project_summary" id="project_summary-text"
                                          class="d-none">{!! $projectTemplate->project_summary ?? '' !!}{!! ($project) ? $project->project_summary : '' !!}</textarea>
                            </div>
                        </div>
                    @else
                        <div class="col-md-12 col-lg-12">
                            <div class="form-group mb-12 mt-3">
                                <x-forms.label fieldId="project_summary"
                                               :fieldLabel="__('Client Instructions')">
                                </x-forms.label>
                                <div id="project_summary">{!! $projectTemplate->project_summary ?? '' !!}{!! ($project) ? $project->project_summary : '' !!}</div>
                                <textarea name="project_summary" id="project_summary-text"
                                          class="d-none">{!! $projectTemplate->project_summary ?? '' !!} {!! ($project) ? $project->project_summary : '' !!}</textarea>
                            </div>
                        </div>
                    @endif
                    @if ($addProjectFilePermission == 'all' || $addProjectFilePermission == 'added')
                        <div class="col-lg-12">
                            <x-forms.file-multiple class="mr-0 mr-lg-2 mr-md-2"
                                                   :fieldLabel="__('app.menu.addFile')" fieldName="file"
                                                   fieldId="file-upload-dropzone"/>
                            <input type="hidden" name="projectID" id="projectID">
                        </div>
                    @endif
                    <x-forms.custom-field :fields="$fields" class="col-md-12"></x-forms.custom-field>
                </div>

                <h4 class="mb-0 p-20 f-21 font-weight-normal text-capitalize border-top-grey">
                    <a href="javascript:;" class="text-dark toggle-property-details"><i
                            class="fa fa-chevron-down"></i>
                        @lang('Property Details')</a>
                </h4>

                <div class="row p-20 d-none" id="property-details">
                    <div class="col-lg-10 col-md-3 ">
                        <x-forms.text class="" :fieldLabel="__('Full Property Address')"
                                      fieldName="property_address" fieldRequired="true" fieldId="property_address"
                                      :fieldPlaceholder="__('Property Address')" />
                    </div>
                    <div>
                    <button id="autoFill" type="button"
                                            class="btn btn-outline-secondary border-grey mt-0 mt-md-5 ml-3 ml-md-0"
                                            data-toggle="tooltip" data-original-title="{{__('Auto Fill Other Fields') }}">@lang('Auto Fill')</button>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <x-forms.text class="mr-0 mr-lg-2 mr-md-2 " :fieldLabel="__('Street Address')"
                                      fieldName="street_address"  fieldId="street_address"
                                      :fieldPlaceholder="__('Street Address')" />
                    </div>
                    <div class="col-lg-3 col-md-3">
                            <x-forms.text class="mr-0 mr-lg-2 mr-md-2" :fieldLabel="__('suite # / house #')"
                                        fieldName="optional"  fieldId="optional"
                                        :fieldPlaceholder="__('optional')" />
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <x-forms.text class="mr-0 mr-lg-2 mr-md-2" :fieldLabel="__('City')"
                                      fieldName="city"  fieldId="city"
                                      :fieldPlaceholder="__('City')" />
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <x-forms.text class="mr-0 mr-lg-2 mr-md-2" :fieldLabel="__('State')"
                                      fieldName="state"  fieldId="state"
                                      :fieldPlaceholder="__('State')" />
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <x-forms.text class="mr-0 mr-lg-2 mr-md-2" :fieldLabel="__('Zip Code')"
                                      fieldName="zipcode"  fieldId="zipcode"
                                      :fieldPlaceholder="__('Zip Code')" />
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <x-forms.text class="mr-0 mr-lg-2 mr-md-2" :fieldLabel="__('County')"
                                      fieldName="county"  fieldId="county"
                                      :fieldPlaceholder="__('County')" />
                    </div>
                    <div class="col-md-3">
                        <x-forms.label class="my-3" fieldId="property_type"
                                       :fieldLabel="__('Property Type')">
                        </x-forms.label>
                        <x-forms.input-group>
                            <select class="form-control select-picker" name="property_type" id="property_type"
                                    data-live-search="true">
                                <option value="">--</option>
                                @foreach ($propertytype as $category)
                                    <option
                                        value="{{ $category->property_type }}">
                                        {{ $category->property_type }}
                                    </option>
                                @endforeach
                            </select>
                        </x-forms.input-group>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <x-forms.text class="mr-0 mr-lg-2 mr-md-2" :fieldLabel="__('Year Built')"
                                      fieldName="yearbuilt"  fieldId="yearbuilt"
                                      :fieldPlaceholder="__('Year Built')" />
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <x-forms.text class="mr-0 mr-lg-2 mr-md-2" :fieldLabel="__('Bedrooms')"
                                      fieldName="bedrooms"  fieldId="bedrooms"
                                      :fieldPlaceholder="__('Bedrooms')" />
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <x-forms.text class="mr-0 mr-lg-2 mr-md-2" :fieldLabel="__('Bathrooms')"
                                      fieldName="bathrooms"  fieldId="bathrooms"
                                      :fieldPlaceholder="__('bathrooms')" />
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <x-forms.text class="mr-0 mr-lg-2 mr-md-2" :fieldLabel="__('House Size')"
                                      fieldName="house_size"  fieldId="house_size"
                                      :fieldPlaceholder="__('House Size')" />
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <x-forms.text class="mr-0 mr-lg-2 mr-md-2" :fieldLabel="__('Lot Size')"
                                      fieldName="lotsize"  fieldId="lotsize"
                                      :fieldPlaceholder="__('Lot Size')" />
                    </div>
                    <div class="col-md-3">
                        <x-forms.label class="my-3" fieldId="occupancy_status"
                                       :fieldLabel="__('Occupancy Status')" fieldRequired="true">
                        </x-forms.label>
                        <x-forms.input-group>
                            <select class="form-control select-picker" name="occupancy_status" id="occupancy_status"
                                    data-live-search="true" >
                                <option value="">--</option>
                                @foreach ($occupancystatus as $category)
                                    <option
                                        value="{{ $category->occupancy_status }}">
                                        {{ $category->occupancy_status }}
                                    </option>
                                @endforeach
                            </select>
                        </x-forms.input-group>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <x-forms.text class="mr-0 mr-lg-2 mr-md-2" :fieldLabel="__('Lock Box Location')"
                                      fieldName="lockboxlocation"  fieldId="lockboxlocation"
                                      :fieldPlaceholder="__('Lock Box Location')" />
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <x-forms.text class="mr-0 mr-lg-2 mr-md-2" :fieldLabel="__('Lock Box Code')"
                                      fieldName="lockboxcode"  fieldId="lockboxcode"
                                      :fieldPlaceholder="__('Lock Box Code')" />
                    </div>
                        <div class="col-lg-10 mt-2">
                            <div class="row">
                                <div class="col-lg-10 mb-2">
                                    <label class='f-14 text-dark-grey mb-12'>Utility Status</label><br>
                                </div>
                                <div class="col-lg-3">
                                    <x-forms.checkbox 
                                    :fieldLabel="__('Water')" 
                                    fieldName="utility_status[]" 
                                    fieldValue="water"
                                    fieldId="water" />
                                </div>
                                <div class="col-lg-3">
                                    <x-forms.checkbox 
                                        :fieldLabel="__('Gas')" 
                                        fieldName="utility_status[]" 
                                        fieldValue="gas"
                                        fieldId="gas" />
                                 </div>
                                <div class="col-lg-3">
                                    <x-forms.checkbox 
                                    :fieldLabel="__('Electric')" 
                                    fieldName="utility_status[]"
                                    fieldValue="electric" 
                                    fieldId="electric" />
                                </div>
                                
                            </div>                                     
                        </div>
                    
                </div>
                <h4 class="mb-0 p-20 f-21 font-weight-normal text-capitalize border-top-grey">
                    <a href="javascript:;" class="text-dark toggle-contact-information"><i
                            class="fa fa-chevron-down"></i>
                        @lang('Contact Information')</a>
                </h4>
                    <div class="row p-20 d-none" id="contact-information">
                        <div class="col-lg-4 col-md-3">
                            <x-forms.text class="mr-0 mr-lg-2 mr-md-2" :fieldLabel="__('Asset Manager Name')"
                                        fieldName="amname"  fieldId="amname"
                                        :fieldPlaceholder="__('Asset Manager Name')" />
                        </div>
                        <div class="col-lg-4 col-md-3">
                            <x-forms.text class="mr-0 mr-lg-2 mr-md-2" :fieldLabel="__('Asset Manager Phone Number')"
                                        fieldName="amph"  fieldId="amph"
                                        :fieldPlaceholder="__('Asset Manager Phone Number')" />
                        </div>
                        <div class="col-lg-4 col-md-3">
                            <x-forms.text class="mr-0 mr-lg-2 mr-md-2" :fieldLabel="__('Asset Manager Email Address')"
                                        fieldName="amemail"  fieldId="amemail"
                                        :fieldPlaceholder="__('Asset Manager Email Address')" />
                        </div>
                        <div class="w-100 m-2" style="border: 1px solid lightgrey; border-radius: 10px; padding: 10px;">
                            <div class="form-group row tenant-row  mx-1">
                                <div class="col-lg-4 col-md-3">
                                    <x-forms.text class="mr-0 mr-lg-2 mr-md-2" :fieldLabel="__('Tenant 1 Name')"
                                                fieldName="tenant_name_1"  fieldId="tenant_name_1"
                                                :fieldPlaceholder="__('Tenant 1 Name')" />
                                </div>
                                <div class="col-lg-4 col-md-3">
                                    <x-forms.text class="mr-0 mr-lg-2 mr-md-2" :fieldLabel="__('Tenant 1 Email')"
                                                fieldName="tenant_email_1"  fieldId="tenant_email_1"
                                                :fieldPlaceholder="__('Tenant 1 Email')" />
                                </div>
                                <div class="col-lg-4 col-md-3">
                                    <x-forms.text class="mr-0 mr-lg-2 mr-md-2" :fieldLabel="__('Tenant 1 Phone')"
                                                fieldName="tenant_phone_1"  fieldId="tenant_phone_1"
                                                :fieldPlaceholder="__('Tenant 1 Phone')" />
                                </div>
                                <div class="col-lg-4 col-md-3 d-flex align-items-end">
                                    <button type="button" class="btn btn-primary  btn-sm add-more">More</button>
                                </div>
                            </div>
                            <!-- Tenant 2 to 5 -->
                            <div class="tenant-fields " id="tenant_fields_2">
                                <div class="form-group row tenant-row mx-1">
                                    <div class="col-lg-4 col-md-3">
                                        <x-forms.text class="mr-0 mr-lg-2 mr-md-2" :fieldLabel="__('Tenant 2 Name')"
                                                    fieldName="tenant_name_2" fieldId="tenant_name_2"
                                                    :fieldPlaceholder="__('Tenant 2 Name')" />
                                    </div>
                                    <div class="col-lg-4 col-md-3">
                                        <x-forms.text class="mr-0 mr-lg-2 mr-md-2" :fieldLabel="__('Tenant 2 Email')"
                                                    fieldName="tenant_email_2" fieldId="tenant_email_2"
                                                    :fieldPlaceholder="__('Tenant 2 Email')" />
                                    </div>
                                    <div class="col-lg-4 col-md-3">
                                        <x-forms.text class="mr-0 mr-lg-2 mr-md-2" :fieldLabel="__('Tenant 2 Phone')"
                                                    fieldName="tenant_phone_2" fieldId="tenant_phone_2"
                                                    :fieldPlaceholder="__('Tenant 2 Phone')" />
                                    </div>
                                    <div class="col-lg-4 col-md-3 d-flex align-items-end">
                                        <button type="button" class="btn btn-danger btn-sm remove-tenant">Remove</button>
                                    </div>
                                </div>
                            </div>
                            <div class="tenant-fields " id="tenant_fields_3">
                                <div class="form-group row tenant-row mx-1">
                                    <div class="col-lg-4 col-md-3">
                                        <x-forms.text class="mr-0 mr-lg-2 mr-md-2" :fieldLabel="__('Tenant 3 Name')"
                                                    fieldName="tenant_name_3" fieldId="tenant_name_3"
                                                    :fieldPlaceholder="__('Tenant 3 Name')" />
                                    </div>
                                    <div class="col-lg-4 col-md-3">
                                        <x-forms.text class="mr-0 mr-lg-2 mr-md-2" :fieldLabel="__('Tenant 3 Email')"
                                                    fieldName="tenant_email_3" fieldId="tenant_email_3"
                                                    :fieldPlaceholder="__('Tenant 3 Email')" />
                                    </div>
                                    <div class="col-lg-4 col-md-3">
                                        <x-forms.text class="mr-0 mr-lg-2 mr-md-2" :fieldLabel="__('Tenant 3 Phone')"
                                                    fieldName="tenant_phone_3" fieldId="tenant_phone_3"
                                                    :fieldPlaceholder="__('Tenant 3 Phone')" />
                                    </div>
                                    <div class="col-lg-4 col-md-3 d-flex align-items-end">
                                        <button type="button" class="btn btn-danger btn-sm remove-tenant">Remove</button>
                                    </div>
                                </div>
                            </div>
                            <div class="tenant-fields " id="tenant_fields_4">
                                <div class="form-group row tenant-row mx-1">
                                    <div class="col-lg-4 col-md-3">
                                        <x-forms.text class="mr-0 mr-lg-2 mr-md-2" :fieldLabel="__('Tenant 4 Name')"
                                                    fieldName="tenant_name_4" fieldId="tenant_name_4"
                                                    :fieldPlaceholder="__('Tenant 4 Name')" />
                                    </div>
                                    <div class="col-lg-4 col-md-3">
                                        <x-forms.text class="mr-0 mr-lg-2 mr-md-2" :fieldLabel="__('Tenant 4 Email')"
                                                    fieldName="tenant_email_4" fieldId="tenant_email_4"
                                                    :fieldPlaceholder="__('Tenant 4 Email')" />
                                    </div>
                                    <div class="col-lg-4 col-md-3">
                                        <x-forms.text class="mr-0 mr-lg-2 mr-md-2" :fieldLabel="__('Tenant 4 Phone')"
                                                    fieldName="tenant_phone_4" fieldId="tenant_phone_4"
                                                    :fieldPlaceholder="__('Tenant 4 Phone')" />
                                    </div>
                                    <div class="col-lg-4 col-md-3 d-flex align-items-end">
                                        <button type="button" class="btn btn-danger btn-sm remove-tenant">Remove</button>
                                    </div>
                                </div>
                            </div>
                            <div class="tenant-fields " id="tenant_fields_5">
                                <div class="form-group row tenant-row mx-1">
                                    <div class="col-lg-4 col-md-3">
                                        <x-forms.text class="mr-0 mr-lg-2 mr-md-2" :fieldLabel="__('Tenant 5 Name')"
                                                    fieldName="tenant_name_5" fieldId="tenant_name_5"
                                                    :fieldPlaceholder="__('Tenant 5 Name')" />
                                    </div>
                                    <div class="col-lg-4 col-md-3">
                                        <x-forms.text class="mr-0 mr-lg-2 mr-md-2" :fieldLabel="__('Tenant 5 Email')"
                                                    fieldName="tenant_email_5" fieldId="tenant_email_5"
                                                    :fieldPlaceholder="__('Tenant 5 Email')" />
                                    </div>
                                    <div class="col-lg-4 col-md-3">
                                        <x-forms.text class="mr-0 mr-lg-2 mr-md-2" :fieldLabel="__('Tenant 5 Phone')"
                                                    fieldName="tenant_phone_5" fieldId="tenant_phone_5"
                                                    :fieldPlaceholder="__('Tenant 5 Phone')" />
                                    </div>
                                    <div class="col-lg-4 col-md-3 d-flex align-items-end">
                                        <button type="button" class="btn btn-danger btn-sm remove-tenant">Remove</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if ($addProjectMemberPermission == 'all' || $addProjectMemberPermission == 'added')
                        <div class="col-md-3" id="add_members">
                            <div class="form-group my-3">
                                <x-forms.label class="my-3" fieldId="selectEmployee" 
                                               :fieldLabel="__('Add Project Coordinator')">
                                </x-forms.label>

                                <x-forms.input-group>
                                    <select class="form-control multiple-users" multiple name="user_id[]"
                                            id="selectEmployee" data-live-search="true" data-size="8">
                                        @foreach ($employees as $item)
                                            <x-user-option
                                                :user="$item"
                                                :pill="true"
                                                :selected="(request()->has('default_assign') && request('default_assign') == $item->id) || (isset($projectTemplateMembers) && in_array($item->id, $projectTemplateMembers)) || (isset($projectMembers) && in_array($item->id, $projectMembers))"
                                            />
                                        @endforeach
                                    </select>

                                    @if ($addEmployeePermission == 'all' || $addEmployeePermission == 'added')
                                        <x-slot name="append">
                                            <button id="add-employee" type="button"
                                                    class="btn btn-outline-secondary border-grey"
                                                    data-toggle="tooltip" data-original-title="{{ __('modules.projects.addMemberTitle') }}">@lang('app.add')</button>
                                        </x-slot>
                                    @endif
                                </x-forms.input-group>
                            </div>
                        </div>
                    
                        @elseif(in_array('employee', user_roles()))
                        <input type="hidden" name="user_id[]" value="{{ user()->id }}">
                        @endif
                        <div class="col-md-3" id="add_members">
                            <div class="form-group my-3">
                                <x-forms.label class="my-3" fieldId="selectEmployee" 
                                               :fieldLabel="__('Add Project Estimators')">
                                </x-forms.label>
                                <x-forms.input-group>
                                    <select class="form-control multiple-users" multiple name="estimator_id[]"
                                            id="selectEstimator" data-live-search="true" data-size="8">
                                        @foreach ($estimators as $item)
                                            <x-user-option
                                                :user="$item"
                                                :pill="true"
                                                :selected="(request()->has('default_assign') && request('default_assign') == $item->id) || (isset($projectTemplateMembers) && in_array($item->id, $projectTemplateMembers)) || (isset($projectMembers) && in_array($item->id, $projectMembers))"
                                            />
                                        @endforeach
                                    </select>
                                </x-forms.input-group>
                            </div>
                        </div>
                        <div class="col-md-3" id="add_members">
                            <div class="form-group my-3">
                                <x-forms.label class="my-3" fieldId="selectEmployee" 
                                               :fieldLabel="__('Add Project Accounting Analyst')">
                                </x-forms.label>
                                <x-forms.input-group>
                                    <select class="form-control multiple-users" multiple name="accounting_id[]"
                                            id="selectAccountingAnalyst" data-live-search="true" data-size="8">
                                        @foreach ($accounting as $item)
                                            <x-user-option
                                                :user="$item"
                                                :pill="true"
                                                :selected="(request()->has('default_assign') && request('default_assign') == $item->id) || (isset($projectTemplateMembers) && in_array($item->id, $projectTemplateMembers)) || (isset($projectMembers) && in_array($item->id, $projectMembers))"
                                            />
                                        @endforeach
                                    </select>
                                </x-forms.input-group>
                            </div>
                        </div>
                        <div class="col-md-3" id="add_members">
                            <div class="form-group my-3">
                                <x-forms.label class="my-3" fieldId="selectEmployee" 
                                               :fieldLabel="__('Add Project Escalation Manager')">
                                </x-forms.label>
                                <x-forms.input-group>
                                    <select class="form-control multiple-users" multiple name="emanager_id[]"
                                            id="selectEscalationManager" data-live-search="true" data-size="8">
                                        @foreach ($emanager as $item)
                                            <x-user-option
                                                :user="$item"
                                                :pill="true"
                                                :selected="(request()->has('default_assign') && request('default_assign') == $item->id) || (isset($projectTemplateMembers) && in_array($item->id, $projectTemplateMembers)) || (isset($projectMembers) && in_array($item->id, $projectMembers))"
                                            />
                                        @endforeach
                                    </select>
                                </x-forms.input-group>
                            </div>
                        </div>
                    </div>
                    <h4 class="mb-0 p-20 f-21 font-weight-normal text-capitalize border-top-grey">
                        <a href="javascript:;" class="text-dark toggle-accounting-information"><i
                                class="fa fa-chevron-down"></i>
                            @lang('Accounting Information')</a>
                    </h4>
                    <div class="row p-20 d-none" id="accounting-information">
                        <div class="col-lg-4 col-md-3">
                            <x-forms.text class="mr-0 mr-lg-2 mr-md-2" :fieldLabel="__('Not To Exceed')"
                                        fieldName="nte"  fieldId="nte"
                                        :fieldPlaceholder="__('Not To Exceed')" />
                        </div>
                        <div class="col-lg-4 col-md-3">
                        <x-forms.text class="mr-0 mr-lg-2 mr-md-2" :fieldLabel="__('Bid Submitted Amount')"
                                      fieldName="bid_submitted_amount"  fieldId="bid_submitted_amount"
                                      :fieldPlaceholder="__('Bid Submitted Amount')" />
                        </div>
                        <div class="col-lg-4 col-md-3">
                        <x-forms.text class="mr-0 mr-lg-2 mr-md-2" :fieldLabel="__('Bid Approved Amount')"
                                      fieldName="bid_approved_amount"  fieldId="bid_approved_amount"
                                      :fieldPlaceholder="__('Bid Approved Amount')" />
                        </div>
                    </div>
                    
                <x-form-actions>
                    <x-forms.button-primary id="save-project-form" class="mr-3" icon="check">@lang('app.save')
                    </x-forms.button-primary>
                    <x-forms.button-cancel :link="route('projects.index')" class="border-0">@lang('app.cancel')
                    </x-forms.button-cancel>
                </x-form-actions>

            </div>
        </x-form>

    </div>
</div>

<script>

    var add_project_files = "{{ $addProjectFilePermission }}";
    var add_project_note_permission = "{{ $addProjectNotePermission }}";
    $(document).ready(function () {
          let tenantCount = 1;

        $('.add-more').on('click', function() {
            if (tenantCount < 5) {
                tenantCount++;
                $('#tenant_fields_' + tenantCount).show();
            }
            if (tenantCount === 5) {
                $(this).hide();
            }
        });

        $(document).on('click', '.remove-tenant', function() {
            $(this).closest('.tenant-row').find('input').val('');
            $(this).closest('.tenant-fields').hide();
            tenantCount--;
            if (tenantCount < 5) {
                $('.add-more').show();
            }
        });

        $('.custom-date-picker').each(function(ind, el) {
            datepicker(el, {
                position: 'bl',
                ...datepickerConfig
            });
        });

        $('#without_deadline').click(function() {
            var check = $('#without_deadline').is(":checked") ? true : false;
            if (check == true) {
                $('#deadlineBox').hide();
            } else {
                $('#deadlineBox').show();
            }
        });
        $('#autoFill').click(function() {
            if($('#property_address').val()=='')
            {
                Swal.fire({
                    icon: 'error',
                    text: '{{ __('Property Address Field Can Not Be Empty') }}',

                    customClass: {
                        confirmButton: 'btn btn-primary',
                    },
                    showClass: {
                        popup: 'swal2-noanimation',
                        backdrop: 'swal2-noanimation'
                    },
                    buttonsStyling: false
                });
                return false;
            }
            
            const url = "{{ route('projects.parseAddress') }}";
            var data = $('#property_address').val();
            var token = "{{ csrf_token() }}";
            $.easyAjax({
                url: url,
                type: "POST",
                disableButton: true,
                blockUI: true,
                buttonSelector: "#autoFill",
                data: {
                        '_token': token,
                        'data': data,
                    },
                success: function (response) {
                    document.getElementById('street_address').value=response.parsed_address.street_address;
                    document.getElementById('city').value=response.parsed_address.city;
                    document.getElementById('state').value=response.parsed_address.state;
                    document.getElementById('zipcode').value=response.parsed_address.zipcode;
                    document.getElementById('county').value=response.parsed_address.county;
                }
            });
        });

        if (add_project_files == "all") {

            let checkSize = true;
            Dropzone.autoDiscover = false;

            //Dropzone class
            myDropzone = new Dropzone("div#file-upload-dropzone", {
                dictDefaultMessage: "{{ __('app.dragDrop') }}",
                url: "{{ route('files.multiple_upload') }}",
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                paramName: "file",
                maxFilesize: DROPZONE_MAX_FILESIZE,
                maxFiles: DROPZONE_MAX_FILES,
                autoProcessQueue: false,
                uploadMultiple: true,
                addRemoveLinks: true,
                parallelUploads: DROPZONE_MAX_FILES,
                acceptedFiles: DROPZONE_FILE_ALLOW,
                init: function () {
                    myDropzone = this;
                }
            });
            myDropzone.on('sending', function (file, xhr, formData) {
                checkSize = true;
                var ids = $('#projectID').val();
                formData.append('project_id', ids);
            });
            myDropzone.on('uploadprogress', function () {
                $.easyBlockUI();
            });
            myDropzone.on('queuecomplete', function () {
                var msgs = "@lang('messages.updateSuccess')";
                var redirect_url = $('#redirect_url').val();
                if (redirect_url != '' && checkSize == true) {
                    window.location.href = decodeURIComponent(redirect_url);
                }

                if (checkSize == true) {
                    window.location.href = "{{ route('projects.index') }}"
                }
            });
            myDropzone.on('removedfile', function () {
                var grp = $('div#file-upload-dropzone').closest(".form-group");
                var label = $('div#file-upload-box').siblings("label");
                $(grp).removeClass("has-error");
                $(label).removeClass("is-invalid");
            });
            myDropzone.on('error', function (file, message) {
                myDropzone.removeFile(file);
                var grp = $('div#file-upload-dropzone').closest(".form-group");
                var label = $('div#file-upload-box').siblings("label");
                $(grp).find(".help-block").remove();
                var helpBlockContainer = $(grp);

                if (helpBlockContainer.length == 0) {
                    helpBlockContainer = $(grp);
                }

                checkSize = false;

                helpBlockContainer.append('<div class="help-block invalid-feedback">' + message + '</div>');
                $(grp).addClass("has-error");
                $(label).addClass("is-invalid");
            });
        }

        $("#selectEmployee").selectpicker({
            actionsBox: true,
            selectAllText: "{{ __('modules.permission.selectAll') }}",
            deselectAllText: "{{ __('modules.permission.deselectAll') }}",
            multipleSeparator: " ",
            selectedTextFormat: "count > 8",
            countSelectedText: function (selected, total) {
                return selected + " {{ __('app.membersSelected') }} ";
            }
        });
        $("#selectEstimator").selectpicker({
            actionsBox: true,
            selectAllText: "{{ __('modules.permission.selectAll') }}",
            deselectAllText: "{{ __('modules.permission.deselectAll') }}",
            multipleSeparator: " ",
            selectedTextFormat: "count > 8",
            countSelectedText: function (selected, total) {
                return selected + " {{ __('app.membersSelected') }} ";
            }
        });
        $("#selectEscalationManager").selectpicker({
            actionsBox: true,
            selectAllText: "{{ __('modules.permission.selectAll') }}",
            deselectAllText: "{{ __('modules.permission.deselectAll') }}",
            multipleSeparator: " ",
            selectedTextFormat: "count > 8",
            countSelectedText: function (selected, total) {
                return selected + " {{ __('app.membersSelected') }} ";
            }
        });
        $("#selectAccountingAnalyst").selectpicker({
            actionsBox: true,
            selectAllText: "{{ __('modules.permission.selectAll') }}",
            deselectAllText: "{{ __('modules.permission.deselectAll') }}",
            multipleSeparator: " ",
            selectedTextFormat: "count > 8",
            countSelectedText: function (selected, total) {
                return selected + " {{ __('app.membersSelected') }} ";
            }
        });
        
        var userValues = @json($userData);
        quillMention(userValues, '#project_summary');

        // if (add_project_note_permission == 'all' || add_project_note_permission == 'added') {

        //     quillImageLoad('#notes');
        // }


        const dp1 = datepicker('#start_date', {
            position: 'bl',
            onSelect: (instance, date) => {
                dp2.setMin(date);
            },
            ...datepickerConfig
        });

        const dp2 = datepicker('#deadline', {
            position: 'bl',
            onSelect: (instance, date) => {
                dp1.setMax(date);
            },
            ...datepickerConfig
        });

        @if ($project && $project->deadline == null)
            $('#deadlineBox').hide();
        @endif

        $('#without_deadline').click(function () {
            const check = $('#without_deadline').is(":checked") ? true : false;
            if (check == true) {
                $('#deadlineBox').hide();
            } else {
                $('#deadlineBox').show();
            }
        });

        $('#save-project-form').click(function () {
            let note = document.getElementById('project_summary').children[0].innerHTML;
            document.getElementById('project_summary-text').value = note;
            var mention_user_id = $('#project_summary span[data-id]').map(function(){
                            return $(this).attr('data-id')
                        }).get();
            $('#mentionUserId').val(mention_user_id.join(','));

            // if (add_project_note_permission == 'all' || add_project_note_permission == 'added') {

            //     note = document.getElementById('notes').children[0].innerHTML;
            //     document.getElementById('notes-text').value = note;
            // }
            const url = "{{ route('projects.store') }}";
            var data = $('#save-project-data-form').serialize() + "&projectID={{$project ? $project->id : ''}}";

            $.easyAjax({
                url: url,
                container: '#save-project-data-form',
                type: "POST",
                disableButton: true,
                blockUI: true,
                file: true,
                buttonSelector: "#save-project-form",
                data: data,
                success: function (response) {
                    if ((add_project_files === "all") &&
                        myDropzone.getQueuedFiles().length > 0) {
                        $('#projectID').val(response.projectID);
                        myDropzone.processQueue();
                    } else if (typeof response.redirectUrl !== 'undefined') {
                        window.location.href = response.redirectUrl;
                        // 
                    }
                }
            });
        });

        $('#addProjectCategory').click(function () {
            const url = "{{ route('projectCategory.create') }}";
            $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
            $.ajaxModal(MODAL_LG, url);
        });

        $('#department-setting').click(function () {
            const url = "{{ route('departments.create') }}";
            $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
            $.ajaxModal(MODAL_LG, url);
        });

        $('#client_view_task').change(function () {
            $('#clientNotification').toggleClass('d-none');
        });

        $('.toggle-property-details').click(function () {
            $(this).find('svg').toggleClass('fa-chevron-down fa-chevron-up');
            $('#property-details').toggleClass('d-none');
        });

        $('.toggle-main-project-details').click(function () {
            $(this).find('svg').toggleClass('fa-chevron-down fa-chevron-up');
            $('#main-project-details').toggleClass('d-none');
        });
        $('.toggle-contact-information').click(function () {
            $(this).find('svg').toggleClass('fa-chevron-down fa-chevron-up');
            $('#contact-information').toggleClass('d-none');
        });
        $('.toggle-accounting-information').click(function () {
            $(this).find('svg').toggleClass('fa-chevron-down fa-chevron-up');
            $('#accounting-information').toggleClass('d-none');
        });

        $('#is_public').change(function () {
            $('#add_members').toggleClass('d-none');
        });

        $('#miroboard_checkbox').change(function () {
            $('#miroboard_detail').toggleClass('d-none');
        });

        $('#add-employee').click(function () {
            $(MODAL_XL).modal('show');

            const url = "{{ route('employees.create') }}";

            $.easyAjax({
                url: url,
                blockUI: true,
                container: MODAL_XL,
                success: function (response) {
                    if (response.status === "success") {
                        $(MODAL_XL + ' .modal-body').html(response.html);
                        $(MODAL_XL + ' .modal-title').html(response.title);
                        init(MODAL_XL);
                    }
                }
            });
        });

        init(RIGHT_MODAL);
    });

    $('#save-project-data-form').on('change', '#employee_department', function () {
        let id = $(this).val();
        if (id === '') {
            id = 0;
        }
        let url = "{{ route('departments.members', ':id') }}";
        url = url.replace(':id', id);

        $.easyAjax({
            url: url,
            type: "GET",
            container: '#save-project-data-form',
            blockUI: true,
            redirect: true,
            success: function (data) {
                var atValues = data.userData;
                destory_editor('#project_summary');
                quillMention(atValues, '#project_summary');
                $('#selectEmployee').html(data.data);
                $('#selectEmployee').selectpicker('refresh');
            }
        })
    });

</script>
