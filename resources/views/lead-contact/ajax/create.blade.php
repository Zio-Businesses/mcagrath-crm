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
        <x-form id="save-lead-data-form" >
            <div class="add-client bg-white rounded">
                <h4 class="mb-0 p-20 f-21 font-weight-normal text-capitalize border-bottom-grey">
                    @lang('modules.leadContact.leadDetails')</h4>
                <div class="row p-20">

                    <div class="col-lg-4 col-md-6">
                        <x-forms.text :fieldLabel="__('app.name')" fieldName="client_name"
                            fieldId="client_name" :fieldPlaceholder="__('placeholders.name')" fieldRequired="true" />
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <x-forms.text :fieldLabel="__('modules.stripeCustomerAddress.poc')" fieldName="poc"
                            fieldId="poc" :fieldPlaceholder="__('placeholders.poc')" />
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <x-forms.text :fieldLabel="__('modules.stripeCustomerAddress.position')" fieldName="position"
                            fieldId="position" :fieldPlaceholder="__('placeholders.position')" />
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <x-forms.tel fieldId="mobile" :fieldLabel="__('modules.lead.mobile')" fieldName="mobile"
                           :fieldPlaceholder="__('placeholders.mobile')"></x-forms.tel>
                    </div>
                    <div class="col-lg-4 col-md-6">

                        <x-forms.email fieldId="client_email" :fieldLabel="__('app.email')"
                            fieldName="client_email" :fieldPlaceholder="__('placeholders.email')" :fieldHelp="__('modules.lead.leadEmailInfo')">
                        </x-forms.email>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <x-forms.select fieldId="state" :fieldLabel="__('modules.stripeCustomerAddress.state')" fieldName="state" search="true">
                            <option value="">--</option>
                            @foreach ($states as $state)
                                <option value="{{ $state->state }}">{{ $state->state }}</option>
                            @endforeach
                        </x-forms.select>
                    </div>
                    
                    <div class="col-lg-4 col-md-6">
                        <x-forms.text :fieldLabel="__('modules.lead.website')" fieldName="website" fieldId="website"
                            :fieldPlaceholder="__('placeholders.website')" />
                    </div>
                    

                    <div class="col-md-4">
                        <x-forms.label class="mt-3" fieldId="company_type_id" :fieldLabel="__('Company Type')">
                        </x-forms.label>
                        <x-forms.input-group>
                            <select class="form-control select-picker" name="company_type" id="company_type" data-live-search="true">
                                <option value="">--</option>
                                @foreach ($companyTypes as $companyType)
                                    <option value="{{ $companyType->type }}">{{ $companyType->type }}</option>
                                @endforeach
                            </select>
                            <x-slot name="append">
                                <button id="addCompanyType" type="button" class="btn btn-outline-secondary border-grey">
                                    @lang('app.add')
                                </button>
                            </x-slot>
                        </x-forms.input-group>
                    </div>
                    
                    <div class="col-lg-4 col-md-6">
                        <x-forms.datepicker fieldId="last_called_date" :fieldLabel="__('modules.stripeCustomerAddress.lastCalledDate')" 
                            fieldName="last_called_date" :fieldPlaceholder="__('placeholders.date')" custom/>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <x-forms.datepicker fieldId="next_follow_up_date" :fieldLabel="__('modules.stripeCustomerAddress.nextFollowUpDate')" 
                            fieldName="next_follow_up_date" :fieldPlaceholder="__('placeholders.date')" custom/>
                    </div>


                  <div class="col-md-4">
                        <x-forms.label class="mt-3" fieldId="status_lead_id" :fieldLabel="__('Status Lead')">
                        </x-forms.label>
                        <x-forms.input-group>
                            <select class="form-control select-picker" name="status_type" id="status_type" data-live-search="true">
                                <option value="">--</option>
                                @foreach ($statusLeads as $statusLead)
                                    <option value="{{ $statusLead->status }}">{{ $statusLead->status }}</option>
                                @endforeach
                            </select>
                            <x-slot name="append">
                                <button id="addStatusLead" type="button" class="btn btn-outline-secondary border-grey">
                                    @lang('app.add')
                                </button>
                            </x-slot>
                        </x-forms.input-group>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <x-forms.textarea class="mr-0 mr-lg-2 mr-md-2" :fieldLabel="__('app.address')"
                                fieldName="address" fieldId="address" :fieldPlaceholder="__('placeholders.address')">
                            </x-forms.textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <x-forms.textarea class="mr-0 mr-lg-2 mr-md-2" :fieldLabel="__('modules.stripeCustomerAddress.comments')"
                                fieldName="comments" fieldId="comments" :fieldPlaceholder="__('placeholders.comments')">
                            </x-forms.textarea>
                        </div>
                    </div>
                   
                      
                    </div>
                    <x-forms.custom-field :fields="$fields" class="col-md-12"></x-forms.custom-field>
                </div>
                <x-form-actions>
                    <x-forms.button-primary id="save-lead-form" class="mr-3" icon="check">@lang('app.save')
                    </x-forms.button-primary>
                    <x-forms.button-secondary class="mr-3" id="save-more-lead-form" icon="check-double">@lang('app.saveAddMore')
                    </x-forms.button-secondary>
                    <x-forms.button-cancel :link="route('lead-contact.index')" class="border-0">@lang('app.cancel')
                    </x-forms.button-cancel>
                </x-form-actions>

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

        $('#save-more-lead-form').click(function () {

            $('#add_more').val(true);

            const url = "{{ route('lead-contact.store') }}?add_more=true";

            var data = $('#save-lead-data-form').serialize() + '&add_more=true';

            saveLead(data, url, "#save-more-lead-form");

        });

        $('#save-lead-form').click(function() {
            const url = "{{ route('lead-contact.store') }}";
            var data = $('#save-lead-data-form').serialize();
            saveLead(data, url, "#save-lead-form");

        });

        function saveLead(data, url, buttonSelector) {
            $.easyAjax({
                url: url,
                container: '#save-lead-data-form',
                type: "POST",
                file: true,
                disableButton: true,
                blockUI: true,
                buttonSelector: buttonSelector,
                data: data,
                success: function(response) {
                    if(response.add_more == true) {

                        var right_modal_content = $.trim($(RIGHT_MODAL_CONTENT).html());

                        if(right_modal_content.length) {

                            $(RIGHT_MODAL_CONTENT).html(response.html.html);
                            $('#add_more').val(false);
                        }
                        else {

                            $('.content-wrapper').html(response.html.html);
                            init('.content-wrapper');
                            $('#add_more').val(false);
                        }
                    }
                    else {
                        window.location.href = response.redirectUrl;
                    }

                    if (typeof showTable !== 'undefined' && typeof showTable === 'function') {
                            showTable();
                    }
                }
            });

        }
        $('body').off('click', '.add-lead-source').on('click', '.add-lead-source', function() {
            var url = '{{ route('lead-source-settings.create') }}';
            $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
            $.ajaxModal(MODAL_LG, url);
        });

        $('#other-details').removeClass('d-none');

        init(RIGHT_MODAL);

        $('#addCompanyType').click(function() {
        const url = "{{ route('company-types.create') }}";
        $.ajaxModal(MODAL_LG, url);
        });

        $('#addStatusLead').click(function() {
            const url = "{{ route('status-leads.create') }}";
            $.ajaxModal(MODAL_LG, url);
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
    });
    

    function checkboxChange(parentClass, id){
        var checkedData = '';
        $('.'+parentClass).find("input[type= 'checkbox']:checked").each(function () {
            checkedData = (checkedData !== '') ? checkedData+', '+$(this).val() : $(this).val();
        });
        $('#'+id).val(checkedData);
    }
</script>
