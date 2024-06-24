

<div class="row">
    <div class="col-sm-12">
        <x-form id="save-data-form" method="PUT">
            <div class="add-client bg-white rounded">
                <h4 class="mb-0 p-20 f-21 font-weight-normal text-capitalize border-bottom-grey">
                    @lang('modules.employees.accountDetails')</h4>

                <div class="row p-20">
                    <div class="col-lg-9">
                        <div class="row">
                            
                            <div class="col-lg-4 col-md-6">
                            <x-forms.text :fieldLabel="__('app.name')" fieldName="vendor_name"
                            fieldId="vendor_name" :fieldPlaceholder="__('placeholders.name')" fieldRequired="true" :fieldValue="$vendor->vendor_name"/>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <x-forms.email fieldId="vendor_email" :fieldLabel="__('app.email')"
                                fieldName="vendor_email" :fieldPlaceholder="__('placeholders.email')" fieldRequired="true" :fieldValue="$vendor->vendor_email" >
                                </x-forms.email>
                            </div>
                            <div class="col-lg-4 col-md-6">
                               <x-forms.tel fieldId="vendor_number" :fieldLabel="__('modules.lead.mobile')" fieldName="vendor_number"
                               :fieldPlaceholder="__('placeholders.mobile')" fieldRequired="true" :fieldValue="$vendor->vendor_number"></x-forms.tel>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <x-forms.datepicker custom="true" fieldId="contract_start" fieldRequired="true"
                                        :fieldLabel="__('app.csd')" fieldName="contract_start"
                                        :fieldPlaceholder="__('placeholders.date')" :fieldValue="$vendor->contract_start"/>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <x-forms.datepicker custom="true" fieldId="contract_end" fieldRequired="true"
                                        :fieldLabel="__('app.ced')" fieldName="contract_end"
                                        :fieldPlaceholder="__('placeholders.date')" :fieldValue="$vendor->contract_end"/>
                            </div>
                        </div>    
                    </div>        
                </div>
                <x-form-actions>
                    <x-forms.button-primary id="save-form" class="mr-3" icon="check">@lang('app.save')
                    </x-forms.button-primary>
                    <x-forms.button-cancel :link="route('vendortrack.index')" class="border-0">@lang('app.cancel')
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
        $('#save-form').click(function() {
            const url = "{{ route('vendortrack.update', $vendor->id) }}";

            $.easyAjax({
                url: url,
                container: '#save-data-form',
                type: "POST",
                disableButton: true,
                blockUI: true,
                file: true,
                buttonSelector: "#save-form",
                data: $('#save-data-form').serialize(),
                success: function(response) {
                    if (response.status == 'success') {
                        window.location.href = response.redirectUrl;
                    }
                }
            })
        });

        init(RIGHT_MODAL);
    });

   
</script>
