<!-- @php
$viewLeadCategoryPermission = user()->permission('view_lead_category');
$viewLeadSourcesPermission = user()->permission('view_lead_sources');
$addLeadSourcesPermission = user()->permission('add_lead_sources');
$addLeadCategoryPermission = user()->permission('add_lead_category');
$addProductPermission = user()->permission('add_product');
@endphp -->

<link rel="stylesheet" href="{{ asset('vendor/css/dropzone.min.css') }}">

<div class="row">
    <div class="col-sm-12">
        <x-form id="save-lead-data-form" >
            <div class="add-client bg-white rounded">
                <h4 class="mb-0 p-20 f-21 font-weight-normal text-capitalize border-bottom-grey">
                    @lang('modules.leadContact.vendorDetails')</h4>
                <div class="row p-20">

                    <div class="col-lg-3 col-md-6">
                        <x-forms.text :fieldLabel="__('Company Name')" fieldName="vendor_name"
                            fieldId="vendor_name" :fieldPlaceholder="__('Company Name')" fieldRequired="true" />
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <x-forms.text :fieldLabel="__('POC')" fieldName="poc"
                            fieldId="poc" :fieldPlaceholder="__('Poc')" />
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <x-forms.tel fieldId="vendor_mobile" :fieldLabel="__('modules.lead.mobile')" fieldName="vendor_mobile"
                           :fieldPlaceholder="__('placeholders.mobile')" fieldRequired="true"></x-forms.tel>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <x-forms.email fieldId="vendor_email" :fieldLabel="__('app.email')"
                            fieldName="vendor_email" :fieldPlaceholder="__('placeholders.email')" :fieldHelp="__('modules.lead.leadEmailInfo')">
                        </x-forms.email>
                    </div>
                    <div class="col-md-3 col-lg-3">
                             <x-forms.select fieldId="state" :fieldLabel="__('State')" fieldName="state" fieldRequired="true" search="true">
                                <option value="">--</option>
                                @foreach ($location as $type)
                                    <option value="{{ $type->state }}">{{ $type->state }}</option>
                                @endforeach
                            </x-forms.select>
                    </div>
                    <div class="col-md-3 col-lg-3">
                             <x-forms.select fieldId="county" :fieldLabel="__('County')" fieldName="county" fieldRequired="true" search="true">
                                <option value="">--</option>
                            </x-forms.select>
                    </div>
                    <div class="col-md-3 col-lg-3">
                             <x-forms.select fieldId="city" :fieldLabel="__('City')" fieldName="city" fieldRequired="true" search="true">
                                <option value="">--</option>
                            </x-forms.select>
                    </div>
                    <div class="col-md-3 col-lg-3">
                             <x-forms.select fieldId="contractor_type" :fieldLabel="__('Contractor Type')" fieldName="contractor_type" fieldRequired="true" search="true">
                                <option value="">--</option>
                                @foreach ($contracttype as $type)
                                    <option value="{{ $type }}">{{ ucfirst($type) }}</option>
                                @endforeach
                            </x-forms.select>
                    </div>
                    <div class="col-md-3 col-lg-3">
                             <x-forms.select fieldId="lead_source" :fieldLabel="__('Lead Source')" fieldName="lead_source"  search="true">
                                <option value="">--</option>
                                @foreach ($leadsource as $type)
                                    <option value="{{ $type->type }}">{{$type->type}}</option>
                                @endforeach
                            </x-forms.select>
                    </div>
                    <div class="col-md-3 col-lg-3">
                        <x-forms.text fieldId="website" :fieldLabel="__('Website')"
                                fieldName="website" :fieldPlaceholder="__('Website')">
                        </x-forms.text>
                    </div>
                    <div class="col-md-3 col-lg-3">
                            <x-forms.datepicker fieldId="nxt_date"
                            :fieldLabel="__('Next Follow Up Date')" fieldName="nxt_date"
                            :fieldPlaceholder="__('placeholders.date')" />
                    </div>
                    <div class="col-md-3 col-lg-3">
                             <x-forms.select fieldId="notes_title" :fieldLabel="__('Notes Title')" fieldName="notes_title"  search="true" fieldRequired="true">
                                <option value="">--</option>
                                @foreach ($notestitle as $type)
                                    <option value="{{ $type->notes_title }}">{{$type->notes_title}}</option>
                                @endforeach
                            </x-forms.select>
                    </div>
                    <div class="col-md-12">
                        <x-forms.textarea class="mr-0 mr-lg-2 mr-md-2" :fieldLabel="__('Notes')"
                            fieldName="notes" fieldId="notes" fieldRequired="true"
                            :fieldPlaceholder="__('Enter notes')">
                        </x-forms.textarea>
                    </div>
                </div>

                <x-form-actions>
                    <x-forms.button-primary id="save-lead-form" class="mr-3" icon="check">@lang('app.save')
                    </x-forms.button-primary>
                    <x-forms.button-secondary class="mr-3" id="save-email-form" icon="check-double">save and send proposal
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
            $("#save-lead-data-form .select-picker").selectpicker();
            const dp1 = datepicker('#nxt_date', {
                position: 'bl',
                ...datepickerConfig
            });
            $('#state').change( function() {
                    var state_id = $(this).val();
                    if (state_id) {
                        fetchCounties(state_id);
                        $('#county').find('option:not(:first)').remove();
                    }
            });
            $('#county').change( function() {
                    var county_id = $(this).val();
                    if (county_id) {
                        fetchCities(county_id);
                        $('#city').find('option:not(:first)').remove();
                    }
            });
            function fetchCounties(state) {
                var url = "{{ route('locations.counties', ':state') }}";
                url = url.replace(':state', state);
                $.easyAjax({
                    url: url,
                    container: '#save-lead-data-form',
                    method: 'GET',
                    blockUI: true,
                    success: function(data) {
                        
                        data.counties.forEach(county => {
                            $('#county').append(`<option value="${county.county}">${county.county}</option>`);
                            $('#county').selectpicker('refresh');
                        });
                    },
                    error: function(error) {
                        console.error(error);
                    }
                });
             }
             function fetchCities(county) {
                var url = "{{ route('locations.cities', ':county') }}";
                url = url.replace(':county', county);
                $.easyAjax({
                    url: url,
                    container: '#save-lead-data-form',
                    method: 'GET',
                    blockUI: true,
                    success: function(data) {
                        data.cities.forEach(cities => {
                            console.log(data.cities);
                            
                            $('#city').append(`<option value="${cities.city}">${cities.city}</option>`);
                            $('#city').selectpicker('refresh');
                        });
                    },
                    error: function(error) {
                        console.error(error);
                    }
                });
             }
        });
        

        $('#save-email-form').click(function () {
            var i=1;
            const url = "{{ route('vendor-crud.store') }}";
            var data = $('#save-lead-data-form').serialize();
            saveLead(data, url, "#save-email-form",i);
        });

        $('#save-lead-form').click(function() {
            var i=0;
            const url = "{{ route('vendor-crud.store') }}";
            var data = $('#save-lead-data-form').serialize();
            saveLead(data, url, "#save-lead-form",i);

        });

        function saveLead(data, url, buttonSelector,i) {
            $.easyAjax({
                url: url,
                container: '#save-lead-data-form',
                type: "POST",
                file: true,
                disableButton: true,
                blockUI: true,
                buttonSelector: buttonSelector,
                data: [data,i],
                success: function(response) {
                    window.location.href = response.redirectUrl;
                }
            });

        }
        




    //     $('body').on('click', '.add-lead-source', function() {
    //         var url = '{{ route('lead-source-settings.create') }}';
    //         $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
    //         $.ajaxModal(MODAL_LG, url);
    //     });

    //     $('.toggle-other-details').click(function() {
    //         $(this).find('svg').toggleClass('fa-chevron-down fa-chevron-up');
    //         $('#other-details').toggleClass('d-none');
    //     });

    //     init(RIGHT_MODAL);
    // });

    // function checkboxChange(parentClass, id){
    //     var checkedData = '';
    //     $('.'+parentClass).find("input[type= 'checkbox']:checked").each(function () {
    //         checkedData = (checkedData !== '') ? checkedData+', '+$(this).val() : $(this).val();
    //     });
    //     $('#'+id).val(checkedData);
    // }
</script>
