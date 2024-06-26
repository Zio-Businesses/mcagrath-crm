
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
                            <x-forms.tel fieldId="vendor_mobile" :fieldLabel="('modules.lead.mobile')" fieldName="vendor_mobile"
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

                        <div class="col-lg-4 col-md-6">
                            <x-forms.text :fieldLabel="__('app.city')" fieldName="city"
                                fieldId="city" fieldRequired="true" />
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <x-forms.text :fieldLabel="__('app.state')" fieldName="state"
                                fieldId="state" fieldRequired="true" />
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
                            <x-forms.text :fieldLabel="__('app.website')" fieldName="website" fieldId="website" fieldRequired="true" />
                        </div>
                        <div class="col-lg-8 col-md-6">
                            <x-forms.file allowedFileExtensions="png jpg jpeg svg" class="mr-0 mr-lg-2 mr-md-2 w-100" :fieldLabel="__('app.logo')" fieldName="logo"
                                fieldId="logo" :popover="('messages.fileFormat.multipleImageFile')" fieldRequired="true" />
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="form-group my-1">
                                <label class="f-14 text-dark-grey mb-12 w-100 mt-3" for="usr">@lang('app.licensed')</label>
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
                            <x-forms.text :fieldLabel="__('app.license')" fieldName="license" fieldId="license" fieldRequired="true" />
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <x-forms.datepicker custom="true" fieldId="license_exp" fieldRequired="true"
                                :fieldLabel="__('app.license_expiry_date')" fieldName="license_exp"
                                :fieldPlaceholder="__('placeholders.date')" />
                        </div>

                        

                        <div class="col-lg-4 col-md-6">
                            <div class="form-group my-1">
                                <label class="f-14 text-dark-grey mb-12 w-100 mt-3" for="usr">@lang('app.insured')</label>
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
                            <x-forms.datepicker custom="true" fieldId="gl_ins_exp" fieldRequired="true"
                                :fieldLabel="__('app.GL_Insurance_Expiry_Date')" fieldName="gl_ins_exp"
                                :fieldPlaceholder="__('placeholders.date')" />
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <x-forms.text :fieldLabel="__('app.GL_Insurance_Carrier_Name')" fieldName="gl_ins_cn" fieldId="gl_ins_cn" fieldRequired="true" />
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <x-forms.text :fieldLabel="__('app.GL_Insurance_Carrier_Phone')" fieldName="gl_ins_cp" fieldId="gl_ins_cp" fieldRequired="true" />
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <x-forms.email fieldId="gl_ins_em" :fieldLabel="__('app.GL_Insurance_Carrier_Email_Address')"
                                fieldName="gl_ins_em" :fieldPlaceholder="__('placeholders.email')" fieldRequired="true">
                            </x-forms.email>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="form-group my-1">
                                <label class="f-14 text-dark-grey mb-12 w-100 mt-3" for="usr">@lang('app.Workers_Comp_Available')</label>
                                <div class="d-flex">
                                    <x-forms.radio fieldId="wc-yes" :fieldLabel="__('app.yes')" fieldName="wca" fieldValue="yes">
                                    </x-forms.radio>
                                    <x-forms.radio fieldId="wc-no" :fieldLabel="__('app.no')" fieldValue="no" fieldName="wca" checked="true">
                                    </x-forms.radio>
                                    <x-forms.radio fieldId="wc-na" :fieldLabel="__('app.not_applicable')" fieldValue="not_applicable"
                                        fieldName="wca"></x-forms.radio>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <x-forms.text :fieldLabel="__('app.WC_Insurance_Carrier_Name')" fieldName="wc_ins_cn" fieldId="wc_ins_cn" fieldRequired="true" />
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <x-forms.text :fieldLabel="__('app.WC_Insurance_Carrier_Phone')" fieldName="wc_ins_cp" fieldId="wc_ins_cp" fieldRequired="true" />
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <x-forms.email fieldId="wc_ins_em" :fieldLabel="__('app.WC_Insurance_Carrier_Email_Address')"
                                fieldName="wc_ins_em" :fieldPlaceholder="__('placeholders.email')" fieldRequired="true">
                            </x-forms.email>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <x-forms.datepicker custom="true" fieldId="wc_ins_exp" fieldRequired="true"
                                :fieldLabel="__('app.WC_Insurance_Expiry_Date')" fieldName="wc_ins_exp"
                                :fieldPlaceholder="__('placeholders.date')" />
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
                                                    <x-forms.label fieldId="signature-pad" fieldRequired="true" :fieldLabel="('modules.estimates.signature')" />
                                                    <div class="signature_wrap wrapper border-0 form-control">
                                                        <canvas id="signature-pad" class="signature-pad rounded" width=400 height=150></canvas>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 p-4 d-none upload-image">
                                                    <x-forms.file allowedFileExtensions="png jpg jpeg svg bmp" class="mr-0 mr-lg-2 mr-md-2" :fieldLabel="('modules.estimates.signature')" fieldName="image"
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
                                        <x-forms.button-primary id="save-signature" icon="check">@lang('app.sign')</x-forms.button-primary>
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
    $('.dropify').dropify();
    const MODAL_LG = '#myModal';
    const MODAL_HEADING = '#modelHeading';
    
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
                    window.close();
                   }, 5000);
                }
            });
});
</script>
</html>
