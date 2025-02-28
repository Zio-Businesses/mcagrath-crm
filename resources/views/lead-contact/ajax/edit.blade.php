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
                        <x-forms.select fieldId="salutation" :fieldLabel="__('modules.client.salutation')"
                            fieldName="salutation">
                            <option value="">--</option>
                            @foreach ($salutations as $salutation)
                                <option value="{{ $salutation->value }}" @selected($leadContact->salutation == $salutation)>{{ $salutation->label() }}</option>
                            @endforeach
                        </x-forms.select>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <x-forms.text :fieldLabel="__('app.name')" fieldName="client_name"
                            fieldId="client_name" fieldPlaceholder="" fieldRequired="true"
                            :fieldValue="$leadContact->client_name" />
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <x-forms.email fieldId="client_email" :fieldLabel="__('app.email')"
                            fieldName="client_email" :fieldPlaceholder="__('placeholders.email')"
                            :fieldValue="$leadContact->client_email" :fieldHelp="__('modules.lead.leadEmailInfo')">
                        </x-forms.email>
                    </div>
                    <div class="col-md-4">
                        <x-forms.label class="mt-3" fieldId="status_lead_id" :fieldLabel="__('Status Lead')">
                        </x-forms.label>
                        <x-forms.input-group>
                            <select class="form-control select-picker" name="status_type" id="status_type" data-live-search="true">
                                <option value="">-- Select Status --</option>
                                @foreach ($statusLeads as $statusLead)
                                    <option value="{{ $statusLead->id }}" 
                                        @if($leadContact->status_type == $statusLead->status) selected @endif>
                                        {{ $statusLead->status }}
                                    </option>
                                @endforeach
                            </select>
                            <x-slot name="append"></x-slot>
                        </x-forms.input-group>
                    </div>
                    

                    @if ($viewLeadSourcesPermission != 'none')
                        <div class="col-lg-4 col-md-6">
                            <x-forms.label class="my-3" fieldId="source_id" :fieldLabel="__('modules.lead.leadSource')">
                            </x-forms.label>
                            <x-forms.input-group>
                                <select class="form-control select-picker" name="source_id" id="source_id"
                                    data-live-search="true">
                                    <option value="">--</option>
                                    @foreach ($sources as $source)
                                        <option @if ($leadContact->source_id == $source->id) selected @endif value="{{ $source->id }}">
                                            {{ $source->type }}</option>
                                    @endforeach
                                </select>

                                @if ($addLeadSourcesPermission == 'all' || $addLeadSourcesPermission == 'added')
                                    <x-slot name="append">
                                        <button type="button"
                                            class="btn btn-outline-secondary border-grey add-lead-source"
                                            data-toggle="tooltip" data-original-title="{{ __('app.add').' '.__('modules.lead.leadSource') }}">@lang('app.add')</button>
                                    </x-slot>
                                @endif
                            </x-forms.input-group>
                        </div>
                    @endif

                </div>

                <h4 class="mb-0 p-20 f-21 font-weight-normal text-capitalize border-top-grey">
                    @lang('modules.lead.companyDetails')</h4>


                <div class="row p-20">

                    <div class="col-lg-3 col-md-6">
                        <x-forms.text :fieldLabel="__('modules.lead.companyName')" fieldName="company_name"
                            fieldId="company_name" :fieldPlaceholder="__('placeholders.company')"
                            :fieldValue="$leadContact->company_name" />
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <x-forms.text :fieldLabel="__('modules.lead.website')" fieldName="website" fieldId="website"
                            :fieldPlaceholder="__('placeholders.website')" :fieldValue="$leadContact->website" />
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <x-forms.tel fieldId="mobile" :fieldLabel="__('modules.lead.mobile')" fieldName="mobile"
                           :fieldPlaceholder="__('placeholders.mobile')" :fieldValue="$leadContact->mobile"></x-forms.tel>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <x-forms.text :fieldLabel="__('modules.client.officePhoneNumber')" fieldName="office"
                            fieldId="office" fieldPlaceholder="" :fieldValue="$leadContact->office" />
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <x-forms.select fieldId="county" :fieldLabel="__('app.county')" fieldName="county" search="true">
                            <option value="">--</option>
                            @foreach ($counties as $county)
                                <option value="{{ $county->county }}" @selected($leadContact->county == $county->county)>{{ $county->county }}</option>
                            @endforeach
                        </x-forms.select>
                    </div>
                    
                    <div class="col-lg-3 col-md-6">
                        <x-forms.select fieldId="state" :fieldLabel="__('modules.stripeCustomerAddress.state')" fieldName="state" search="true">
                            <option value="">--</option>
                            @foreach ($states as $state)
                                <option value="{{ $state->state }}" @selected($leadContact->state == $state->state)>{{ $state->state }}</option>
                            @endforeach
                        </x-forms.select>
                    </div>


                    <div class="col-lg-3 col-md-6">
                        <x-forms.text :fieldLabel="__('modules.stripeCustomerAddress.city')" fieldName="city" :fieldValue="$leadContact->city"
                            fieldId="city" :fieldPlaceholder="__('placeholders.city')" />
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <x-forms.text :fieldLabel="__('modules.stripeCustomerAddress.postalCode')"
                            fieldName="postal_code" fieldId="postal_code" :fieldPlaceholder="__('placeholders.postalCode')"
                            :fieldValue="$leadContact->postal_code" />
                    </div>

                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <x-forms.textarea class="mr-0 mr-lg-2 mr-md-2" :fieldLabel="__('app.address')"
                                fieldName="address" fieldId="address" :fieldPlaceholder="__('placeholders.address')"
                                :fieldValue="$leadContact->address">
                            </x-forms.textarea>
                        </div>
                    </div>

                    <!-- Add this after the address field -->
                    <div class="row p-20">
                        <div class="col-lg-4 col-md-6">
                            <x-forms.text :fieldLabel="__('modules.stripeCustomerAddress.position')" fieldName="position"
                                fieldId="position" :fieldPlaceholder="__('placeholders.position')" 
                                :fieldValue="$leadContact->position" />
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <x-forms.text :fieldLabel="__('modules.stripeCustomerAddress.poc')" fieldName="poc"
                                fieldId="poc" :fieldPlaceholder="__('placeholders.poc')" 
                                :fieldValue="$leadContact->poc" />
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <x-forms.datepicker fieldId="last_called_date" :fieldLabel="__('modules.stripeCustomerAddress.lastCalledDate')" 
                                fieldName="last_called_date" :fieldPlaceholder="__('placeholders.date')" 
                                :fieldValue="$leadContact->last_called_date" />
                        </div>
                        
                        <div class="col-lg-4 col-md-6">
                            <x-forms.datepicker fieldId="next_follow_up_date" :fieldLabel="__('modules.stripeCustomerAddress.nextFollowUpDate')" 
                                fieldName="next_follow_up_date" :fieldPlaceholder="__('placeholders.date')" 
                                :fieldValue="$leadContact->next_follow_up_date" />
                        </div>
                        
                        <div class="col-lg-4 col-md-6">
                            <x-forms.datepicker fieldId="on_board_date" :fieldLabel="__('modules.stripeCustomerAddress.onBoardDate')" 
                                fieldName="on_board_date" :fieldPlaceholder="__('placeholders.date')" 
                                :fieldValue="$leadContact->on_board_date" />
                        </div>
                        
                        <div class="col-lg-4 col-md-6">
                            <x-forms.datepicker fieldId="rejected_date" :fieldLabel="__('modules.stripeCustomerAddress.rejectedDate')" 
                                fieldName="rejected_date" :fieldPlaceholder="__('placeholders.date')" 
                                :fieldValue="$leadContact->rejected_date" />
                        </div>
                        <div class="col-md-12">
                            <div class="form-group my-3">
                                <x-forms.textarea class="mr-0 mr-lg-2 mr-md-2" :fieldLabel="__('modules.stripeCustomerAddress.comments')"
                                    fieldName="comments" fieldId="comments" :fieldPlaceholder="__('placeholders.comments')"
                                    :fieldValue="$leadContact->comments">
                                </x-forms.textarea>
                            </div>
                        </div>
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
        </x-form>

    </div>
</div>


<script>
    $(document).ready(function() {
        $('#county').change(function() {
            var county = $(this).val();
            if (county) {
                $.ajax({
                    url: "{{ route('getStatesByCounty') }}",
                    type: "GET",
                    data: {'county': county},
                    success: function(data) {
                        $('#state').empty();
                        $('#state').append('<option value="">--</option>');
                        $.each(data, function(key, value) {
                            $('#state').append('<option value="'+ value +'">'+ value +'</option>');
                        });
                        $('#state').selectpicker('refresh'); // Refresh the selectpicker if you're using it
                    }
                });
            } else {
                $('#state').empty();
                $('#state').append('<option value="">--</option>');
                $('#state').selectpicker('refresh'); // Refresh the selectpicker if you're using it
            }
        });
        //date picker
        datepicker('#last_called_date', {
        dateFormat: 'm-d-Y', // Match the format used in the create blade
        ...datepickerConfig
        });

        datepicker('#next_follow_up_date', {
            dateFormat: 'm-d-Y',
            ...datepickerConfig
        });

        datepicker('#on_board_date', {
            dateFormat: 'm-d-Y',
            ...datepickerConfig
        });

        datepicker('#rejected_date', {
            dateFormat: 'm-d-Y',
            ...datepickerConfig
        });

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
