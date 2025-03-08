@php
$viewLeadCategoryPermission = user()->permission('view_lead_category');
$viewLeadSourcesPermission = user()->permission('view_lead_sources');
$addLeadSourcesPermission = user()->permission('add_lead_sources');
$addLeadCategoryPermission = user()->permission('add_lead_category');
$addProductPermission = user()->permission('add_product');
@endphp

<link rel="stylesheet" href="{{ asset('vendor/css/dropzone.min.css') }}">

<div class="row">
    <div class="col-sm-12">
        <x-form id="save-lead-data-form" method="PUT">
            <div class="add-client bg-white rounded">
                <h4 class="mb-0 p-20 f-21 font-weight-normal text-capitalize border-bottom-grey">
                @lang('modules.leadContact.leadDetails')</h4>
                <div class="row p-20">

                    <div class="col-lg-4 col-md-6">
                        <x-forms.text :fieldLabel="__('app.name')" fieldName="client_name"
                            fieldId="client_name" fieldPlaceholder="" fieldRequired="true"
                            :fieldValue="$leadContact->client_name" />
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <x-forms.text :fieldLabel="__('modules.stripeCustomerAddress.poc')" fieldName="poc"
                            fieldId="poc" :fieldPlaceholder="__('placeholders.poc')" 
                            :fieldValue="$leadContact->poc" />
                    </div>
                        <div class="col-lg-4 col-md-6">
                            <x-forms.text :fieldLabel="__('modules.stripeCustomerAddress.position')" fieldName="position"
                                fieldId="position" :fieldPlaceholder="__('placeholders.position')" 
                                :fieldValue="$leadContact->position" />
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <x-forms.tel fieldId="mobile" :fieldLabel="__('modules.lead.mobile')" fieldName="mobile"
                            :fieldPlaceholder="__('placeholders.mobile')" :fieldValue="$leadContact->mobile"></x-forms.tel>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <x-forms.email fieldId="client_email" :fieldLabel="__('app.email')"
                                fieldName="client_email" :fieldPlaceholder="__('placeholders.email')"
                                :fieldValue="$leadContact->client_email" :fieldHelp="__('modules.lead.leadEmailInfo')">
                            </x-forms.email>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <x-forms.select fieldId="state" :fieldLabel="__('modules.stripeCustomerAddress.state')" fieldName="state" search="true">
                                <option value="">--</option>
                                @foreach ($states as $state)
                                    <option value="{{ $state->state }}" @selected($leadContact->state == $state->state)>{{ $state->state }}</option>
                                @endforeach
                            </x-forms.select>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <x-forms.text :fieldLabel="__('modules.lead.website')" fieldName="website" fieldId="website"
                                :fieldPlaceholder="__('placeholders.website')" :fieldValue="$leadContact->website" />
                        </div>
                        <div class="col-md-4">
                            <x-forms.label class="mt-3" fieldId="company_type_id" :fieldLabel="__('Company Type')">
                            </x-forms.label>
                            <x-forms.input-group>
                                <select class="form-control select-picker" name="company_type" id="company_type" data-live-search="true">
                                    <option value="">--</option>
                                    @foreach ($companyTypes as $companyType)
                                        <option value="{{ $companyType->type }}" @selected($leadContact->company_type == $companyType->type)>{{ $companyType->type }}</option>
                                    @endforeach
                                </select>
                                
                            </x-forms.input-group>
                        </div>
                        
                        <div class="col-lg-4 col-md-6">
                            <x-forms.datepicker fieldId="last_called_date" :fieldLabel="__('modules.stripeCustomerAddress.lastCalledDate')" 
                                fieldName="last_called_date" :fieldPlaceholder="__('placeholders.date')" 
                                :fieldValue="$leadContact->last_called_date" custom/>
                        </div>
                        
                        <div class="col-lg-4 col-md-6">
                            <x-forms.datepicker fieldId="next_follow_up_date" :fieldLabel="__('modules.stripeCustomerAddress.nextFollowUpDate')" 
                                fieldName="next_follow_up_date" :fieldPlaceholder="__('placeholders.date')" 
                                :fieldValue="$leadContact->next_follow_up_date" custom/>
                        </div>
                
                    <div class="col-md-4">
                        <x-forms.label class="mt-3" fieldId="status_lead_id" :fieldLabel="__('Status Lead')">
                        </x-forms.label>
                        <x-forms.input-group>
                            <select class="form-control select-picker" name="status_type" id="status_type" data-live-search="true">
                                <option value="">--</option>
                                @foreach ($statusLeads as $statusLead)
                                    <option value="{{ $statusLead->status }}" 
                                        @if($leadContact->status_type == $statusLead->status) selected @endif>
                                        {{ $statusLead->status }}
                                    </option>
                                @endforeach
                            </select>
                            <x-slot name="append"></x-slot>
                        </x-forms.input-group>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <x-forms.textarea class="mr-0 mr-lg-2 mr-md-2" :fieldLabel="__('app.address')"
                                fieldName="address" fieldId="address" :fieldPlaceholder="__('placeholders.address')"
                                :fieldValue="$leadContact->address">
                            </x-forms.textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <x-forms.textarea class="mr-0 mr-lg-2 mr-md-2" :fieldLabel="__('modules.stripeCustomerAddress.comments')"
                                fieldName="comments" fieldId="comments" :fieldPlaceholder="__('placeholders.comments')"
                                :fieldValue="$leadContact->comments">
                            </x-forms.textarea>
                        </div>
                    </div>
    
                    <x-forms.custom-field :fields="$fields" :model="$leadContact"></x-forms.custom-field>
                    <x-form-actions>
                        <x-forms.button-primary id="save-lead-form" class="mr-3" icon="check">@lang('app.save')
                        </x-forms.button-primary>
                        <x-forms.button-cancel :link="route('lead-contact.index')" class="border-0">@lang('app.cancel')
                        </x-forms.button-cancel>
                    </x-form-actions>
                </div>
            </div>
        </x-form>
    </div>
</div>


<script>
    $(document).ready(function() {


        $('.custom-date-picker').each(function(ind, el) {
            datepicker(el, {
                position: 'bl',
                ...datepickerConfig
            });
        });

        $('#save-lead-form').click(function() {
        const url = "{{ route('lead-contact.update', [$leadContact->id]) }}";
        $.easyAjax({
            url: url,
            container: '#save-lead-data-form',
            type: "POST",
            disableButton: true,
            blockUI: true,
            file: true,
            buttonSelector: "#save-lead-form",
            data: $('#save-lead-data-form').serialize(),
            success: function(response) {
                window.location.href = response.redirectUrl;
            }
        });
    });

        $('body').on('click', '.add-lead-source', function() {
            const url = '{{ route('lead-source-settings.create') }}';
            $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
            $.ajaxModal(MODAL_LG, url);
        });

        $('body').on('click', '.add-lead-category', function() {
            var url = '{{ route('leadCategory.create') }}';
            $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
            $.ajaxModal(MODAL_LG, url);
        });

        $('#create_task_category').click(function() {
            const url = "{{ route('taskCategory.create') }}";
            $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
            $.ajaxModal(MODAL_LG, url);
        });

        $('#department-setting').click(function() {
            const url = "{{ route('departments.create') }}";
            $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
            $.ajaxModal(MODAL_LG, url);
        });

        $('#client_view_task').change(function() {
            $('#clientNotification').toggleClass('d-none');
        });

        $('#set_time_estimate').change(function() {
            $('#set-time-estimate-fields').toggleClass('d-none');
        });

        $('.toggle-other-details').click(function() {
            $(this).find('svg').toggleClass('fa-chevron-down fa-chevron-up');
            $('#other-details').toggleClass('d-none');
        });

        $('#createTaskLabel').click(function() {
            const url = "{{ route('task-label.create') }}";
            $(MODAL_XL + ' ' + MODAL_HEADING).html('...');
            $.ajaxModal(MODAL_XL, url);
        });

        $('#add-project').click(function() {
            $(MODAL_XL).modal('show');
            const url = "{{ route('projects.create') }}";
            $.easyAjax({
                url: url,
                blockUI: true,
                container: MODAL_XL,
                success: function(response) {
                    if (response.status == "success") {
                        $(MODAL_XL + ' .modal-body').html(response.html);
                        $(MODAL_XL + ' .modal-title').html(response.title);
                        init(MODAL_XL);
                    }
                }
            });
        });
        $('#mobile').on('input', function () {
            let value = $(this).val().replace(/[^0-9]/g, '');  // Remove non-digit characters
            if (value.length > 10) {
                value = value.slice(0, 10);  // Limit to 10 digits
            }
            $(this).val(value);
            
            if (value.length === 10) {
                $('#save-lead-form').prop('disabled', false);
                $('#save-email-form').prop('disabled', false);
            } 
            else if (value.length===0)
            {
                $('#save-lead-form').prop('disabled', false);
                $('#save-email-form').prop('disabled', false);
            }
            else {
                $('#save-lead-form').prop('disabled', true);
                $('#save-email-form').prop('disabled', true);
            }

        });

        $('#add-employee').click(function() {
            $(MODAL_XL).modal('show');

            const url = "{{ route('employees.create') }}";

            $.easyAjax({
                url: url,
                blockUI: true,
                container: MODAL_XL,
                success: function(response) {
                    if (response.status == "success") {
                        $(MODAL_XL + ' .modal-body').html(response.html);
                        $(MODAL_XL + ' .modal-title').html(response.title);
                        init(MODAL_XL);
                    }
                }
            });
        });

        <x-forms.custom-field-filejs/>

        init(RIGHT_MODAL);
    });

    function checkboxChange(parentClass, id){
        let checkedData = '';
        $('.'+parentClass).find("input[type= 'checkbox']:checked").each(function () {
            checkedData = (checkedData !== '') ? checkedData+', '+$(this).val() : $(this).val();
        });
        $('#'+id).val(checkedData);
    }
</script>
