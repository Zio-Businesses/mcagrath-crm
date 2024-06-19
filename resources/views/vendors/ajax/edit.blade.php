

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
                               <x-forms.tel fieldId="vendor_mobile" :fieldLabel="__('modules.lead.mobile')" fieldName="vendor_mobile"
                               :fieldPlaceholder="__('placeholders.mobile')" fieldRequired="true" :fieldValue="$vendor->cell"></x-forms.tel>
                            </div>
                            <div class="col-md-4">
                            <x-forms.text :fieldLabel="__('app.company_name')" fieldName="company_name"
                            fieldId="company_name"  fieldRequired="true" :fieldValue="$vendor->company_name"/>
                        </div>
                        <div class="col-md-4">
                        <x-forms.text :fieldLabel="__('app.street_address')" fieldName="street_address"
                        fieldId="street_address"  fieldRequired="true" :fieldValue="$vendor->street_address"/>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6">
                        <x-forms.text :fieldLabel="__('app.city')" fieldName="city"
                        fieldId="city"  fieldRequired="true" :fieldValue="$vendor->city"/>
                    </div>

                    <div class="col-md-3">
                    <x-forms.text :fieldLabel="__('app.state')" fieldName="state"
                    fieldId="state"  fieldRequired="true" :fieldValue="$vendor->state"/>
                    </div>

                    <div class="col-md-3">
                        <x-forms.text :fieldLabel="__('app.zipcode')" fieldName="zipcode"
                        fieldId="zipcode"  fieldRequired="true" :fieldValue="$vendor->zip_code"/>
                    </div>

                    <div class="col-md-3">
                        <x-forms.text :fieldLabel="__('app.office')" fieldName="office"
                        fieldId="office"  fieldRequired="true" :fieldValue="$vendor->office"/>
                    </div>

                    <div class="col-lg-3 col-md-6">
                    <x-forms.text :fieldLabel="__('app.website')" fieldName="website"
                    fieldId="website"  fieldRequired="true" :fieldValue="$vendor->website"/>
                    </div>
                    
                    <div class="col-lg-4 col-md-6">
                        <div class="form-group my-3">
                            <label class="f-14 text-dark-grey mb-12 w-100 mt-3"
                                for="usr">@lang('app.licensed')</label>
                            <div class="d-flex">
                                <x-forms.radio fieldId="lic-yes" :fieldLabel="__('app.yes')" fieldName="licensed"
                                    fieldValue="yes" :checked="($vendor->licensed=='yes') ? 'checked' : ''">
                                </x-forms.radio>
                                <x-forms.radio fieldId="lic-no" :fieldLabel="__('app.no')" fieldValue="no"
                                    fieldName="licensed" :checked="($vendor->licensed=='no') ? 'checked' : ''"></x-forms.radio>
                                <x-forms.radio fieldId="lic-na" :fieldLabel="__('app.not_applicable')" fieldValue="not_applicable"
                                    fieldName="licensed" :checked="($vendor->licensed=='not_applicable') ? 'checked' : ''"></x-forms.radio>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <x-forms.text :fieldLabel="__('app.license')" fieldName="license"
                            fieldId="license"  fieldRequired="true" :fieldValue="$vendor->license"/>
                    </div>
                    <div class="col-lg-4 col-md-6">
                       <x-forms.datepicker custom="true" fieldId="license_exp" fieldRequired="true"
                            :fieldLabel="__('app.license_expiry_date')" fieldName="license_exp"
                            :fieldPlaceholder="__('placeholders.date')" :fieldValue="$vendor->license_expiry_date"/>
                    </div>
                    <div class="col-lg-3 col-md-6">
                    <div class="form-group my-3">
                            <label class="f-14 text-dark-grey mb-12 w-100 mt-3"
                                for="usr">@lang('app.insured')</label>
                            <div class="d-flex">
                                <x-forms.radio fieldId="in-yes" :fieldLabel="__('app.yes')" fieldName="insured"
                                    fieldValue="yes" :checked="($vendor->insured=='yes') ? 'checked' : ''">
                                </x-forms.radio>
                                <x-forms.radio fieldId="in-no" :fieldLabel="__('app.no')" fieldValue="no"
                                    fieldName="insured" :checked="($vendor->insured=='no') ? 'checked' : ''"></x-forms.radio>
                                <x-forms.radio fieldId="in-na" :fieldLabel="__('app.not_applicable')" fieldValue="not_applicable"
                                    fieldName="insured" :checked="($vendor->insured=='not_applicable') ? 'checked' : ''"></x-forms.radio>
                            </div>
                    </div>
                    </div>


                </div>
                <div class="row p-20">
                    <div class="col-lg-4 col-md-6">
                       <x-forms.datepicker custom="true" fieldId="gl_ins_exp" fieldRequired="true"
                            :fieldLabel="__('app.GL_Insurance_Expiry_Date')" fieldName="gl_ins_exp"
                            :fieldPlaceholder="__('placeholders.date')" :fieldValue="$vendor->gl_insurance_expiry_date"/>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <x-forms.text :fieldLabel="__('app.GL_Insurance_Carrier_Name')" fieldName="gl_ins_cn"
                            fieldId="gl_ins_cn"  fieldRequired="true" :fieldValue="$vendor->gl_insurance_carrier_name"/>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <x-forms.text :fieldLabel="__('app.GL_Insurance_Carrier_Phone')" fieldName="gl_ins_cp"
                            fieldId="gl_ins_cp"  fieldRequired="true" :fieldValue="$vendor->gl_insurance_carrier_phone"/>
                    </div>
                    
                    <div class="col-lg-4 col-md-6">
                        <x-forms.email fieldId="gl_ins_em" :fieldLabel="__('app.GL_Insurance_Carrier_Email_Address')"
                            fieldName="gl_ins_em" :fieldPlaceholder="__('placeholders.email')" fieldRequired="true" :fieldValue="$vendor->gl_insurance_carrier_email_address">
                        </x-forms.email>
                    </div>
                    <div class="form-group my-3">
                            <label class="f-14 text-dark-grey mb-12 w-100 mt-3"
                                for="usr">@lang('app.Workers_Comp_Available')</label>
                            <div class="d-flex">
                                <x-forms.radio fieldId="wc-yes" :fieldLabel="__('app.yes')" fieldName="wca"
                                    fieldValue="yes" :checked="($vendor->Workers_comp_available=='yes') ? 'checked' : ''">
                                </x-forms.radio>
                                <x-forms.radio fieldId="wc-no" :fieldLabel="__('app.no')" fieldValue="no"
                                    fieldName="wca" :checked="($vendor->Workers_comp_available=='no') ? 'checked' : ''"></x-forms.radio>
                                <x-forms.radio fieldId="wc-na" :fieldLabel="__('app.not_applicable')" fieldValue="not_applicable"
                                    fieldName="wca" :checked="($vendor->Workers_comp_available=='not_applicable') ? 'checked' : ''"></x-forms.radio>
                            </div>
                    </div>
            
                    <div class="col-lg-4 col-md-6">
                        <x-forms.text :fieldLabel="__('app.WC_Insurance_Carrier_Name')" fieldName="wc_ins_cn"
                            fieldId="wc_ins_cn"  fieldRequired="true" :fieldValue="$vendor->wc_insurance_carrier_name"/>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <x-forms.text :fieldLabel="__('app.WC_Insurance_Carrier_Phone')" fieldName="wc_ins_cp"
                            fieldId="wc_ins_cp"  fieldRequired="true" :fieldValue="$vendor->wc_insurance_carrier_phone"/>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <x-forms.email fieldId="wc_ins_em" :fieldLabel="__('app.WC_Insurance_Carrier_Email_Address')"
                            fieldName="wc_ins_em" :fieldPlaceholder="__('placeholders.email')" fieldRequired="true" :fieldValue="$vendor->	wc_insurance_carrier_email_address">
                        </x-forms.email>
                    </div>
                    <div class="col-lg-4 col-md-6">
                       <x-forms.datepicker custom="true" fieldId="wc_ins_exp" fieldRequired="true"
                            :fieldLabel="__('app.WC_Insurance_Expiry_Date')" fieldName="wc_ins_exp"
                            :fieldPlaceholder="__('placeholders.date')" :fieldValue="$vendor->wc_insurance_expiry_date"/>
                    </div>
                    <div class="col-sm-12 p-4 upload-image">
                    <x-forms.file allowedFileExtensions="png jpg jpeg svg bmp" class="mr-0 mr-lg-2 mr-md-2"
                                               :fieldLabel="__('modules.contracts.companyLogo')" fieldName="company_logo"
                                               :fieldValue=" ($vendor->company_logo ? $vendor->image_url : null)" fieldId="company_logo" :popover="__('messages.fileFormat.ImageFile')"/>                
                    </div>
                    
                </div>

                <x-form-actions>
                    <x-forms.button-primary id="save-form" class="mr-3" icon="check">@lang('app.save')
                    </x-forms.button-primary>
                    <x-forms.button-cancel :link="route('vendors.index')" class="border-0">@lang('app.cancel')
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
            const url = "{{ route('vendors.update', $vendor->id) }}";

            $.easyAjax({
                url: url,
                container: '#save-data-form',
                type: "POST",
                disableButton: true,
                blockUI: true,
                file: true,
                buttonSelector: "#save-form",
                data: $('#save-data-form').serialize(),
                // success: function(response) {
                //     if (response.status == 'success') {
                //         window.location.href = response.redirectUrl;
                //     }
                // }
            })
        });

        init(RIGHT_MODAL);
    });

   
</script>
