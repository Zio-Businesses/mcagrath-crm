
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('vendor/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/css/datepicker.min.css') }}">
    <!-- Simple Line Icons -->
    <link rel="stylesheet" href="{{ asset('vendor/css/simple-line-icons.css') }}">

    <!-- Template CSS -->
    <link type="text/css" rel="stylesheet" media="all" href="{{ asset('css/main.css') }}">

    <title>@lang($pageTitle)</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ $company->favicon_url }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ $company->favicon_url }}">
    <meta name="theme-color" content="#ffffff">

    @include('sections.theme_css', ['company' => $company])

    @isset($activeSettingMenu)
        <style>
            .preloader-container {
                margin-left: 510px;
                width: calc(100% - 510px)
            }

        </style>
    @endisset

    <style>
        .logo {
            height: 50px;
        }
        .signature_wrap {
            position: relative;
            height: 150px;
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
            user-select: none;
            width: 400px;
        }

        .signature-pad {
            position: absolute;
            left: 0;
            top: 0;
            width: 400px;
            height: 150px;
        }
    </style>

    @stack('styles')

    <style>
        :root {
            --fc-border-color: #E8EEF3;
            --fc-button-text-color: #99A5B5;
            --fc-button-border-color: #99A5B5;
            --fc-button-bg-color: #ffffff;
            --fc-button-active-bg-color: #171f29;
            --fc-today-bg-color: #f2f4f7;
        }

        .preloader-container {
            height: 100vh;
            width: 100%;
            margin-left: 0;
            margin-top: 0;
        }

        .fc a[data-navlink] {
            color: #99a5b5;
        }

    </style>
    <style>
        #logo {
            height: 100px;
        }

    </style>
    
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery/modernizr.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
   
</head>

<body id="body" class="h-100 bg-additional-grey">
<div class="content-wrapper container">
    <div class="row">
        <div class="col-sm-12">
            <x-form id="save-lead-data-form">
                <div class="add-client bg-white rounded">
                    <h4 class="mb-0 p-20 f-21 font-weight-normal text-capitalize border-bottom-grey">
                        @lang('modules.leadContact.leadDetails')</h4>
                    <div class="row p-20">
                        <div class="col-lg-4 col-md-6">
                            <x-forms.text :fieldLabel="__('app.name')" fieldName="vendor_name"
                                fieldId="vendor_name" :fieldPlaceholder="__('placeholders.name')" fieldRequired="true" />
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <x-forms.email fieldId="vendor_email" :fieldLabel="__('app.email')"
                                fieldName="vendor_email" :fieldPlaceholder="__('placeholders.email')" fieldRequired="true">
                            </x-forms.email>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <x-forms.tel fieldId="vendor_mobile" :fieldLabel="__('modules.lead.mobile')" fieldName="vendor_mobile"
                            :fieldPlaceholder="__('placeholders.mobile')" fieldRequired="true"></x-forms.tel>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <x-forms.text :fieldLabel="__('app.company_name')" fieldName="company_name"
                                fieldId="company_name" fieldRequired="true" />
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <x-forms.text :fieldLabel="__('app.street_address')" fieldName="street_address"
                                fieldId="street_address" fieldRequired="true" />
                        </div>
                        <div class="col-md-6 col-lg-4">
                             <x-forms.select fieldId="state" :fieldLabel="__('State')" fieldName="state" fieldRequired="true" search="true">
                                <option value="">--</option>
                                @foreach ($location as $type)
                                    <option value="{{ $type->state }}">{{ $type->state }}</option>
                                @endforeach
                            </x-forms.select>
                        </div>
                        <div class="col-md-6 col-lg-4">
                                <x-forms.select fieldId="county" :fieldLabel="__('County')" fieldName="county" fieldRequired="true" search="true">
                                    <option value="">--</option>
                                </x-forms.select>
                        </div>
                        <div class="col-md-6 col-lg-4">
                                <x-forms.select fieldId="city" :fieldLabel="__('City')" fieldName="city" fieldRequired="true" search="true">
                                    <option value="">--</option>
                                </x-forms.select>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <x-forms.text :fieldLabel="__('app.zipcode')" fieldName="zipcode"
                                fieldId="zipcode" fieldRequired="true" />
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <x-forms.text :fieldLabel="__('app.office')" fieldName="office"
                                fieldId="office" fieldRequired="true" />
                        </div>

                        <!-- Website and Logo input in the same row -->
                        <div class="col-lg-4 col-md-6">
                            <x-forms.text :fieldLabel="__('app.website')" fieldName="website" fieldId="website"  />
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <x-forms.file allowedFileExtensions="png jpg jpeg svg" class="mr-0 mr-lg-2 mr-md-2 w-100" :fieldLabel="__('app.logo')" fieldName="logo"
                                fieldId="logo" :popover="('messages.fileFormat.multipleImageFile')"  />
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="form-group my-1">
                                <label class="f-14 text-dark-grey mb-12 w-100 mt-3" for="usr">@lang('app.licensed')<sup class="f-14 mr-1">*</sup></label>
                                <div class="d-flex">
                                    <x-forms.radio fieldId="lic-yes" :fieldLabel="__('app.yes')" fieldName="licensed" fieldValue="yes">
                                    </x-forms.radio>
                                    <x-forms.radio fieldId="lic-no" :fieldLabel="__('app.no')" fieldValue="no" fieldName="licensed" checked="true">
                                    </x-forms.radio>
                                    <x-forms.radio fieldId="lic-na" :fieldLabel="__('app.not_applicable')" fieldValue="not_applicable"
                                        fieldName="licensed"></x-forms.radio>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <x-forms.text :fieldLabel="__('app.license')" fieldName="license" fieldId="license"  />
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <x-forms.datepicker custom="true" fieldId="license_exp" 
                                :fieldLabel="__('app.license_expiry_date')" fieldName="license_exp"
                                :fieldPlaceholder="__('placeholders.date')" />
                        </div>

                        

                        <div class="col-lg-4 col-md-6">
                            <div class="form-group my-1">
                                <label class="f-14 text-dark-grey mb-12 w-100 mt-3" for="usr">@lang('app.insured')<sup class="f-14 mr-1">*</sup></label>
                                <div class="d-flex">
                                    <x-forms.radio fieldId="in-yes" :fieldLabel="__('app.yes')" fieldName="insured" fieldValue="yes">
                                    </x-forms.radio>
                                    <x-forms.radio fieldId="in-no" :fieldLabel="__('app.no')" fieldValue="no" fieldName="insured" checked="true">
                                    </x-forms.radio>
                                    <x-forms.radio fieldId="in-na" :fieldLabel="__('app.not_applicable')" fieldValue="not_applicable"
                                        fieldName="insured"></x-forms.radio>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <x-forms.datepicker custom="true" fieldId="gl_ins_exp" 
                                :fieldLabel="__('app.GL_Insurance_Expiry_Date')" fieldName="gl_ins_exp"
                                :fieldPlaceholder="__('placeholders.date')" />
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <x-forms.text :fieldLabel="__('app.GL_Insurance_Carrier_Name')" fieldName="gl_ins_cn" fieldId="gl_ins_cn"  />
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <x-forms.text :fieldLabel="__('app.GL_Insurance_Carrier_Phone')" fieldName="gl_ins_cp" fieldId="gl_ins_cp"  />
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <x-forms.email fieldId="gl_ins_em" :fieldLabel="__('app.GL_Insurance_Carrier_Email_Address')"
                                fieldName="gl_ins_em" :fieldPlaceholder="__('placeholders.email')" >
                            </x-forms.email>
                        </div>
                        <div class="col-lg-4 col-md-6 ">
                            <x-forms.text :fieldLabel="__('GL Insurance Policy Number')" fieldName="gl_ins_pn" fieldId="gl_ins_pn"/>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="form-group my-1">
                                <label class="f-14 text-dark-grey mb-12 w-100 mt-3" for="usr" >@lang('app.Workers_Comp_Available')<sup class="f-14 mr-1">*</sup></label>
                                <div class="d-flex">
                                    <x-forms.radio fieldId="wc-yes" :fieldLabel="__('app.yes')" fieldName="wca" fieldValue="yes">
                                    </x-forms.radio>
                                    <x-forms.radio fieldId="wc-no" :fieldLabel="__('app.no')" fieldValue="no" fieldName="wca" checked="true">
                                    </x-forms.radio>
                                    <x-forms.radio fieldId="wc-na" :fieldLabel="__('app.not_applicable')" fieldValue="not_applicable"
                                        fieldName="wca"></x-forms.radio>
                                    <x-forms.radio fieldId="wc-ex" :fieldLabel="__('Exempted')" fieldValue="exempted"
                                        fieldName="wca"></x-forms.radio>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <x-forms.text :fieldLabel="__('app.WC_Insurance_Carrier_Name')" fieldName="wc_ins_cn" fieldId="wc_ins_cn" />
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <x-forms.text :fieldLabel="__('app.WC_Insurance_Carrier_Phone')" fieldName="wc_ins_cp" fieldId="wc_ins_cp"  />
                        </div>

                        <div class="col-lg-4 col-md-6 mt-2">
                            <x-forms.email fieldId="wc_ins_em" :fieldLabel="__('app.WC_Insurance_Carrier_Email_Address')"
                                fieldName="wc_ins_em" :fieldPlaceholder="__('placeholders.email')" >
                            </x-forms.email>
                        </div>
                        <div class="col-lg-4 col-md-6 mt-2">
                            <x-forms.text :fieldLabel="__('WC Insurance Policy Number')" fieldName="wc_ins_pn" fieldId="wc_ins_pn"/>
                        </div>

                        <div class="col-lg-4 col-md-6 mt-2">
                            <x-forms.datepicker custom="true" fieldId="wc_ins_exp" 
                                :fieldLabel="__('app.WC_Insurance_Expiry_Date')" fieldName="wc_ins_exp"
                                :fieldPlaceholder="__('placeholders.date')" />
                        </div>
                        <div class="col-lg-4 col-md-6 mt-2">
                            <x-forms.select fieldId="contracttype" :fieldLabel="__('Contractor Type')" fieldName="contracttype" fieldRequired="true">
                                <option value="">--</option>
                                @foreach ($contracttype as $type)
                                    <option value="{{ $type }}">{{ ucfirst($type) }}</option>
                                @endforeach
                            </x-forms.select>
                        </div>
                        <div class="col-lg-4 col-md-6 mt-2">
                            <x-forms.text :fieldLabel="__('Distance covered')" fieldName="dc" fieldId="dc" fieldRequired="true" :fieldHelp="__('in miles')"/>
                        </div>
                        <div class="col-lg-4 col-md-6 mt-2">
                            <x-forms.text :fieldLabel="__('Coverage By County')" fieldName="cc" fieldId="cc" fieldRequired="true" :fieldHelp="__('Type the Counties that you cover')"/>
                        </div>
                        <div class="col-lg-12 mt-2">
                            <div class="row">
                                <div class="col-lg-12 mb-2">
                                    <label class='f-14 text-dark-grey mb-12'>Payment Methods ( Accepted By You )<sup class="f-14 mr-1">*</sup></label><br>
                                </div>
                                <div class="col-lg-4">
                                    <x-forms.checkbox 
                                    :fieldLabel="__('Credit Card')" 
                                    fieldName="payment_methods[]" 
                                    fieldValue="credit card"
                                    fieldId="credit card" />
                                </div>
                                <div class="col-lg-4">
                                    <x-forms.checkbox 
                                        :fieldLabel="__('PayPal')" 
                                        fieldName="payment_methods[]" 
                                        fieldValue="paypal"
                                        fieldId="paypal" />
                                 </div>
                                <div class="col-lg-4">
                                    <x-forms.checkbox 
                                    :fieldLabel="__('ACH')" 
                                    fieldName="payment_methods[]"
                                    fieldValue="ach" 
                                    fieldId="ach" />
                                </div>
                                <div class="col-lg-4 mt-2">
                                 <x-forms.checkbox 
                                    :fieldLabel="__('Check')" 
                                    fieldName="payment_methods[]"
                                    fieldValue="check" 
                                    fieldId="check" />
                                </div>
                                <div class="col-lg-4 mt-2">
                                 <x-forms.checkbox 
                                    :fieldLabel="__('CashApp')" 
                                    fieldName="payment_methods[]"
                                    fieldValue="cashapp" 
                                    fieldId="cashapp" />
                                </div>
                                <div class="col-lg-4 mt-2">
                                 <x-forms.checkbox 
                                    :fieldLabel="__('Zelle')" 
                                    fieldName="payment_methods[]"
                                    fieldValue="zelle" 
                                    fieldId="zelle" />
                                </div>
                                <div class="col-lg-4 mt-2">
                                 <x-forms.checkbox 
                                    :fieldLabel="__('Venmo')" 
                                    fieldName="payment_methods[]" 
                                    fieldValue="venmo"
                                    fieldId="venmo" />
                                </div>
                            </div>                                     
                        </div>
                        
                        <div id="signature-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog d-flex justify-content-center align-items-center modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modelHeading">@lang('modules.estimates.cpatureAndConfirmation')</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <x-form id="acceptEstimate">
                                            <div class="row">
                                                <div class="col-sm-12 bg-grey p-4 signature">
                                                    <x-forms.label fieldId="signature-pad" fieldRequired="true" :fieldLabel="__('modules.estimates.signature')" />
                                                    <div class="signature_wrap wrapper border-0 form-control">
                                                        <canvas id="signature-pad" class="signature-pad rounded" width=400 height=150></canvas>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 p-4 d-none upload-image">
                                                    <x-forms.file allowedFileExtensions="png jpg jpeg svg bmp" class="mr-0 mr-lg-2 mr-md-2" :fieldLabel="__('modules.estimates.signature')" fieldName="image"
                                                        fieldId="image" :popover="('messages.fileFormat.ImageFile')" fieldRequired="true" />
                                                </div>
                                                <div class="col-sm-12 mt-3">
                                                    <x-forms.button-secondary id="undo-signature" class="signature">@lang('modules.estimates.undo')</x-forms.button-secondary>
                                                    <x-forms.button-secondary class="ml-2 signature" id="clear-signature">@lang('modules.estimates.clear')</x-forms.button-secondary>
                                                    <x-forms.button-secondary class="ml-2" id="toggle-pad-uploader">@lang('modules.estimates.uploadSignature')
                                                    </x-forms.button-secondary>
                                                </div>
                                                
                                            </div>
                                        </x-form>
                                    </div>
                                    <div class="modal-footer">
                                        <x-forms.button-cancel data-dismiss="modal" class="border-0 mr-3">@lang('app.cancel')</x-forms.button-cancel>
                                        <x-forms.button-primary id="save-signature" icon="check">@lang('app.submit')</x-forms.button-primary>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <x-form-actions>
                        <x-forms.link-primary class="mb-2" link="javascript:;" data-toggle="modal"
                                              data-target="#signature-modal" icon="check">@lang('app.sign')
                        </x-forms.link-primary>
                        <x-forms.button-cancel :link="route('lead-contact.index')" class="border-0">@lang('app.cancel')
                        </x-forms.button-cancel>
                    </x-form-actions>
                </div>
            </x-form>
        </div>
    </div>
    
</div>
</body>



<script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
<script>
var fieldIds = ['#gl_ins_exp', '#wc_ins_exp', '#license_exp'];
     $(fieldIds.join(',')).on('keydown input', function(event) {
    // Allow backspace, delete, tab, and arrow keys for navigation
    var allowedKeys = ['Backspace', 'Delete', 'Tab', 'ArrowLeft', 'ArrowRight'];

        if (allowedKeys.includes(event.key)) {
            this.readOnly = false;
        } else {
            this.readOnly = true;
            event.preventDefault();
        }
    }).on('focus', function() {
        // Make the field readonly when focused to prevent mobile keyboards from appearing
        this.readOnly = true;
    }).on('blur', function() {
        // Allow the field to be edited again after it loses focus
        this.readOnly = false;
    });


    const datepickerConfig = {
        formatter: (input, date, instance) => {
            input.value = moment(date).format('{{ companyOrGlobalSetting()->moment_date_format }}')
        },
        showAllDates: true,
        customDays: {!!  json_encode(\App\Models\GlobalSetting::getDaysOfWeek())!!},
        customMonths: {!!  json_encode(\App\Models\GlobalSetting::getMonthsOfYear())!!},
        customOverlayMonths: {!!  json_encode(\App\Models\GlobalSetting::getMonthsOfYear())!!},
        overlayButton: "@lang('app.submit')",
        overlayPlaceholder: "@lang('app.enterYear')",
        startDay: parseInt("{{ attendance_setting()?->week_start_from }}")
    };

</script>

<script>
    $(document).ready(function() {
        const MODAL_LG = '#myModal';
        const MODAL_HEADING = '#modelHeading';
        $("#save-lead-data-form .select-picker").selectpicker();
        $('.dropify').dropify();

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
    $('.custom-date-picker').each(function (ind, el) {

        datepicker(el, {
            position: 'bl',
            ...datepickerConfig
        });
        
    });
    document.loading = '@lang('app.loading')';
   $(window).on('load', function () {
        // Animate loader off screen
        init();
        $(".preloader-container").fadeOut("slow", function () {
            $(this).removeClass("d-flex");
        });
    });
 </script>
<script>
    
    var canvas = document.getElementById('signature-pad');

    var signaturePad = new SignaturePad(canvas, {
        backgroundColor: 'rgb(255, 255, 255)' // necessary for saving image as JPEG; can be removed is only saving as PNG or SVG
    });

    document.getElementById('clear-signature').addEventListener('click', function (e) {
        e.preventDefault();
        signaturePad.clear();
    });

    document.getElementById('undo-signature').addEventListener('click', function (e) {
        e.preventDefault();
        var data = signaturePad.toData();
        if (data) {
            data.pop(); // remove the last dot or line
            signaturePad.fromData(data);
        }
    });
    $('#toggle-pad-uploader').click(function () {
        var text = $('.signature').hasClass('d-none') ? '{{ __("modules.estimates.uploadSignature") }}' : '{{ __("app.sign") }}';

        $(this).html(text);

        $('.signature').toggleClass('d-none');
        $('.upload-image').toggleClass('d-none');
    });
</script>
<script>
$('#save-signature').click(function () {
    var id="{{$id}}";
    var signature = signaturePad.toDataURL('image/png');
    var signature_type = !$('.signature').hasClass('d-none') ? 'signature' : 'upload';
    var checkboxes = document.querySelectorAll('input[name="payment_methods[]"]');
    var isChecked = Array.prototype.slice.call(checkboxes).some(x => x.checked);
    if (signaturePad.isEmpty() && !$('.signature').hasClass('d-none')) {
            Swal.fire({
                icon: 'error',
                text: '{{ __('messages.signatureRequired') }}',

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
        if (!isChecked) {
                $('#signature-modal').modal('hide');
                Swal.fire({
                icon: 'error',
                text: '{{ __('Payment Method Required') }}',

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
        
    $.easyAjax({
                url: "{{route('front.vendor.save')}}",
                container: '#save-lead-data-form',
                type: "POST",
                file: true,
                disableButton: true,
                blockUI: true,
                // data: $('#save-lead-data-form').serialize()+ '&' + $.param({signature: signature, signature_type: signature_type}),
                data:{
                    signature:signature,
                    signature_type:signature_type,
                    details:$('#save-lead-data-form').serialize(),
                    id:id,
                    contract_start:"{{$startdate}}",
                    contract_end:"{{$enddate}}"
                },
                success: function(response) {
                    $('#signature-modal').modal('hide');
                   setTimeout(() => {
                    history.back();
                   }, 2000);
                }
            });
});
</script>

</html>
