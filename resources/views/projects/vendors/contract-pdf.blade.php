<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@lang($pageTitle)</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ $company->favicon_url }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ $company->favicon_url }}">
    <meta name="theme-color" content="#ffffff">
    
    <style>
        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: normal;
            src: url("{{ storage_path('fonts/THSarabunNew.ttf') }}") format('truetype');
        }
        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: bold;
            src: url("{{ storage_path('fonts/THSarabunNew_Bold.ttf') }}") format('truetype');
        }
        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: bold;
            src: url("{{ storage_path('fonts/THSarabunNew_Bold_Italic.ttf') }}") format('truetype');
        }
        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: bold;
            src: url("{{ storage_path('fonts/THSarabunNew_Italic.ttf') }}") format('truetype');
        }

        @font-face {
            font-family: 'BeVietnamPro';
            font-style: normal;
            font-weight: normal;
            src: url("{{ storage_path('fonts/BeVietnamPro-Black.ttf') }}") format('truetype');
        }
        @font-face {
            font-family: 'BeVietnamPro';
            font-style: italic;
            font-weight: normal;
            src: url("{{ storage_path('fonts/BeVietnamPro-BlackItalic.ttf') }}") format('truetype');
        }
        @font-face {
            font-family: 'BeVietnamPro';
            font-style: italic;
            font-weight: bold;
            src: url("{{ storage_path('fonts/BeVietnamPro-bold.ttf') }}") format('truetype');
        }

       

       body {
            margin: 0;
            font-family: DejaVu Sans, sans-serif;
            font-size: 14px;

        }
        
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
        .heading-table-left {
            padding: 6px;
            font-weight: bold;
            border-right: 0;
        }

        .heading-table-right {
            padding: 6px;
            border-left: 0;
        }

        .light-grey-border-div {
        border: 2px solid lightgrey; 
        }
        .custom-line {
            border: 0;
            height: 2px;
            background: black;
            margin: 20px 0;
        }
        .pl-2{
            padding-left:100px;
        }
        .pt-2
        {
            padding-top:25px;
        }

    </style>

</head>

<body id="body" class="h-100">

            <div class="content-wrapper">
                <div>
                    <table style="width: 100%;">
                        <tr>
                            <td>
                                <img src="{{$company->dark_logo_url}}" alt="{{ $company->company_name }}" style="height:80px; width:80px;" class="rounded-left" />
                            </td>
                            <td>
                                <p class="">
                                            {{ $company->company_name }}<br>
                                            {!! nl2br($company->defaultAddress->address) !!}<br>
                                            Phone #: {{ $company->company_phone }}<br>
                                            Email: <a href="{{$company->website}}">{{ $company->company_email }}</a><br>
                                            Website: <a href="{{$company->website}}">{{ $company->website }}</a>
                                </p> 
                            </td>
                            <td align="right" class="pl-2">
                            <table>
                                <tr>
                                    <td class="heading-table-left">
                                        @lang('Assigned Date')</td>
                                    <td class="heading-table-right">{{ $projectvendor->created_at->translatedFormat($company->date_format) }}</td>
                                </tr>
                                <tr >
                                    <td class="heading-table-left">
                                        @lang('Project Coordinator')</td>
                                    <td class="heading-table-right">
                                    @foreach($projectid->members as $item )
                                            {{$item->user->name}} <br/>
                                    @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td class="heading-table-left">
                                        @lang('Vendor')</td>
                                    <td class="heading-table-right">{{$projectvendor->vendor_name}}</td>
                                </tr>
                                <tr>
                                    <td class=" heading-table-left">
                                        @lang('Phone')</td>
                                    <td class="border-left-0 heading-table-right">{{$projectvendor->vendor_phone}}</td>
                                </tr>
                                <tr>
                                    <td class="heading-table-left">
                                        Email</td>
                                    <td class="heading-table-right">{{$projectvendor->vendor_email_address}}</td>
                                </tr>
                                
                            </table>
                            </td> 
                        <tr>
                    </table>     
                    
                </div>
                <div class="pt-2">
                <table style="border-collapse: collapse; width: 100%;" >
                    <thead>
                        <tr>
                            <th style="padding: 10px;  text-align: left; width:12.5%;">Work Order #</th>
                            <th style="padding: 10px;  text-align: left; width:12.5%;">Priority</th>
                            <th style="padding: 10px;  text-align: left; width:12.5%;">Project Type</th>
                            <th style="padding: 10px;  text-align: left; width:12.5%;">Street Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="padding: 10px;  width:12.5%;">{{$projectid->project_short_code}}</td>
                            <td style="padding: 10px;  width:12.5%;">{{$projectid->priority}}</td>
                            <td style="padding: 10px;  width:12.5%;">{{$projectvendor->project_type}}</td>
                            <td style="padding: 10px;  width:12.5%;">{{$projectid->propertyDetails->street_address}}</td>
                        </tr>
                    </tbody>
                </table>


                    
                    <!-- Second row with 2 columns -->
                    <div class="pt-2">
                    <table style="border-collapse: collapse; width: 100%;">
                        <thead>
                            <tr>
                                @if($projectid->propertyDetails->optional)
                                    <th style="padding: 10px;  text-align: left; width:12.5%;">Suite # / House #</th>
                                @endif
                                <th style="padding: 10px;  text-align: left; width:12.5%;">City</th>
                                <th style="padding: 10px;  text-align: left; width:12.5%;">State</th>
                                <th style="padding: 10px;  text-align: left; width:12.5%;">Zipcode</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @if($projectid->propertyDetails->optional)
                                    <td style="padding: 10px;  width:12.5%;">{{$projectid->propertyDetails->optional}}</td>
                                @endif
                                <td style="padding: 10px;  width:12.5%;">{{$projectid->propertyDetails->city}}</td>
                                <td style="padding: 10px;  width:12.5%;">{{$projectid->propertyDetails->state}}</td>
                                <td style="padding: 10px;  width:12.5%;">{{$projectid->propertyDetails->zipcode}}</td>
                            </tr>
                        </tbody>
                    </table>
                    </div>

                    <div class="pt-2">
                    <table style="border-collapse: collapse; width: 100%;">
                        <thead>
                            <tr>
                                <th style="padding: 10px;  text-align: left; width:12.5%;">County</th>
                                <th style="padding: 10px;  text-align: left; width:12.5%;">Project Category</th>
                                <th style="padding: 10px;  text-align: left; width:12.5%;">Project Sub-Category</th>
                                <th style="padding: 10px;  text-align: left; width:12.5%;">Property Type</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="padding: 10px;  width:12.5%;">{{$projectid->propertyDetails->county}}</td>
                                <td style="padding: 10px;  width:12.5%;">{{$projectid->category->category_name}}</td>
                                <td style="padding: 10px;  width:12.5%;">{{$projectid->sub_category}}</td>
                                <td style="padding: 10px;  width:12.5%;">{{$projectid->type}}</td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                    
                    <!-- Third row with 3 columns -->
                    <div class="pt-2">
                        <table style="border-collapse: collapse; width: 50%;">
                            <thead>
                                <tr>
                                    <th style="padding: 10px;  text-align: left; width: 12.5%;">Bedrooms</th>
                                    <th style="padding: 10px;  text-align: left; width: 12.5%;">Bathrooms</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="padding: 10px; ">{{$projectid->propertyDetails->bedrooms}}</td>
                                    <td style="padding: 10px; ">{{$projectid->propertyDetails->bathrooms}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <hr class="custom-line">
                    <div class="row">
                    <table style="border-collapse: collapse; width: 100%; margin-top: 20px;">
                        <thead>
                            <tr>
                                <th style="padding: 10px;  text-align: left; width: 33.33%;">Project Date</th>
                                <th style="padding: 10px;  text-align: left; width: 33.33%;">Due Date</th>
                                <th style="padding: 10px;  text-align: left; width: 33.33%;">Project Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="padding: 10px; ">{{$projectid->start_date->translatedFormat($company->date_format) }}</td>
                                <td style="padding: 10px; ">{{$projectvendor->due_date->translatedFormat($company->date_format) }}</td>
                                <td style="padding: 10px; ">{{currency_format($projectvendor->project_amount, $contractid->currency->id) }}</td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                    <div class="row mt-2" style="border-collapse: collapse; width: 100%; margin-top: 20px;">
                        <table>
                            <tr>
                                <td class="heading-table-left">Comments</td>
                                <td style="padding: 10px; ">{{$projectvendor->add_notes}}</td>
                            </tr>
                        </table>
                    </div>
                    <hr class="custom-line">
                    <h5 class="f-13 font-weight-bold mb-4">Scope Of Work:</h5>
                    @foreach($projectvendor->sow_id as $sow)
                    <div>
                        <table style="border-collapse: collapse; width: 100%; margin-top: 20px;">
                            <thead>
                                <tr>
                                    <th style="padding: 10px; border: 1px solid #ddd; text-align: left; width: 25%;">Category</th>
                                    <th style="padding: 10px; border: 1px solid #ddd; text-align: left; width: 25%;">Sub-Category</th>
                                    <th style="padding: 10px; border: 1px solid #ddd; text-align: left; width: 50%;">Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="padding: 10px; border: 1px solid #ddd;">{{$projectvendor->sowcategory($sow)}}</td>
                                    <td style="padding: 10px; border: 1px solid #ddd;">{{$projectvendor->sowsubcategory($sow)}}</td>
                                    <td style="padding: 10px; border: 1px solid #ddd;">{{$projectvendor->sowdescription($sow)}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    @endforeach
                    <hr class="custom-line">
                    <h5 class="f-13 font-weight-bold mb-4">WORK ORDER INSTRUCTIONS: PLEASE READ CAREFULLY:</h5>
                    <div>{!! $contractid->contract_detail !!}</div>

                    <hr class="mt-1 mb-1">
                    @if ($vendorid->contract_sign&&$projectvendor->accepted_date)
                        <div style="text-align: left; margin-top: 10px">
                            <h4 class="name" style="margin-bottom: 20px;">@lang('Vendor Signature')</h4>
                            <img src="{{ $vendorid->secondary_image_url }}" style="width: 200px;">
                            <p>Vendor Name:- {{ $vendorid->vendor_name }}<br>
                            Company Name:- {{$vendorid->company_name}}<br>
                            Date:- {{$projectvendor->accepted_date->translatedFormat($company->date_format)}}
                            </p>
                        </div>
                    @endif

                    @if ($vendorid->company_sign&&$projectvendor->accepted_date)
                        <div style="text-align: right; margin-top: -240px">
                            <h4 class="name" style="margin-bottom: 20px;">@lang('Company Signature')</h4>
                            <img src="{{$vendorid->tertiary_image_url }}" style="width: 200px;"><br>
                            <p>Company Name:- {{ $company->company_name }}<br>
                                Date:- {{$projectvendor->accepted_date->translatedFormat($company->date_format)}}<br>
                            </p>
                        </div>
                    @endif
                
            </div>

</body>

</html>
