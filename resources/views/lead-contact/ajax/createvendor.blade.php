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

                    <div class="col-lg-4 col-md-6">
                        <x-forms.text :fieldLabel="__('app.name')" fieldName="vendor_name"
                            fieldId="vendor_name" :fieldPlaceholder="__('placeholders.name')" fieldRequired="true" />
                    </div>
                    <div class="col-lg-4 col-md-6">

                        <x-forms.email fieldId="vendor_email" :fieldLabel="__('app.email')"
                            fieldName="vendor_email" :fieldPlaceholder="__('placeholders.email')" :fieldHelp="__('modules.lead.leadEmailInfo')" fieldRequired="true">
                        </x-forms.email>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <x-forms.tel fieldId="vendor_mobile" :fieldLabel="__('modules.lead.mobile')" fieldName="vendor_mobile"
                           :fieldPlaceholder="__('placeholders.mobile')"></x-forms.tel>
                    </div>
                    <div class="col-lg-4 col-md-6">
                       <x-forms.datepicker fieldId="start_date" fieldRequired="true"
                                            :fieldLabel="__('modules.projects.startDate')" fieldName="start_date"
                                            
                                            :fieldPlaceholder="__('placeholders.date')"/>
                    </div>
                    <div class="col-lg-4 col-md-6">
                    <x-forms.datepicker fieldId="end_date"
                                            
                                            :fieldLabel="__('modules.timeLogs.endDate')" fieldName="end_date"
                                            :fieldPlaceholder="__('placeholders.date')"/>
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
        const dp1 = datepicker('#start_date', {
            position: 'bl',
            onSelect: (instance, date) => {
                if (typeof dp2.dateSelected !== 'undefined' && dp2.dateSelected.getTime() < date
                    .getTime()) {
                    dp2.setDate(date, true)
                }
                if (typeof dp2.dateSelected === 'undefined') {
                    dp2.setDate(date, true)
                }
                dp2.setMin(date);
            },
            ...datepickerConfig
        });

        const dp2 = datepicker('#end_date', {
            position: 'bl',
            onSelect: (instance, date) => {
                dp1.setMax(date);
            },
            ...datepickerConfig
        });

        $('.custom-date-picker').each(function(ind, el) {
            datepicker(el, {
                position: 'bl',
                ...datepickerConfig
            });
        });
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
