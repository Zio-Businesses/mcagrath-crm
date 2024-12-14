@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('twilio-chat/css/main.css') }}" defer="defer">
    <link rel="stylesheet" href="{{ asset('twilio-chat/css/form.css') }}" defer="defer">
@endpush
@section('content')
    <!-- MAIN SCREEN -->
    <div class="chat-app-container">
        <!-- LEFT SIDE BAR -->
        <div class="sidebar">
            <div class="search-bar">
                <div class="form-group position-relative mt-1 mb-1">
                    <!-- DROPDOWN -->
                    <select id="selectVendor" name="vendor_id" class="form-control select-picker pl-5"
                        data-live-search="true" data-size="8" data-dropdown-align-right="true" title="Search for vendors">
                        <option value="">Search for vendors</option>
                        @foreach ($vendors_in_chat as $vendor)
                            <option value="{{ $vendor->id }}"
                                data-content="<div class='d-flex align-items-center text-left'>
                                <div class='taskEmployeeImg border-0 d-inline-block mr-1'>
                                    <img class='rounded-circle' src='{{ $vendor->image_url }}' alt='{{ $vendor->vendor_name }}' width='30'>
                                </div>
                                <span>{{ $vendor->vendor_name }}</span>
                            </div>">
                                {{ $vendor->vendor_name }}
                            </option>
                        @endforeach
                    </select>
                    <!-- Search Icon -->
                    <span class="position-absolute search-icon" style="top: 10px; left: 15px; color: #6c757d;">
                        <i class="fas fa-search"></i>
                    </span>
                    <!-- DROPDOWN END -->
                </div>
            </div>
            <!-- VENDOR lIST -->
            <div class="user-list">
                @foreach ($vendors_in_chat as $vendor)
                    <div class="user" data-vendor-id="{{ $vendor->id }}">
                        <img src="{{ $vendor->image_url }}" alt="" />
                        <div class="userdetails">
                            <span>{{ $vendor->vendor_name }}
                            </span>
                            <p class="usercontent">{{ $vendor->last_msg ? $vendor->last_msg : '' }}</p>
                        </div>

                        {{-- <div class="notif">
                        </div> --}}
                        <div class="time">
                            <p>{{ $vendor->updated_at ? \Carbon\Carbon::parse($vendor->updated_at)->format('H:i') : '' }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- VENDOR lIST END  -->
            <button id="formbtn">+</button>
        </div>
        <!-- LEFT SIDE BAR END-->


        <!-- CHAT AREA -->
        <div class="chat-area">
            <!-- CHAT HEADER -->
            <div class="chat-header" id="chatheader">
                <img id="chat-image" src="" alt="Vendor" style="display: none" />
                <h3 id="chat-title"></h3>
            </div>
            <!-- SPINNER-->
            <div class="spinner d-none justify-content-center align-items-center">
                <div class="spinner-border" role="status" aria-hidden="true"></div>
            </div>
            <!-- MESSAGES -->
            <div id="messages">
            </div>
            <!-- LOADING AND ERRORS -->
            <div id="loadingMessage" class="status-message loading">Loading messages...</div>
            <div id="sendingMessage" class="status-message sending">Sending message...</div>
            <div id="errorMessage" class="status-message error">An error occurred. Please try again.</div>
            <!-- INPUT FIELD -->
            <form id="message-input" action="/twilio-send" method="POST">
                @csrf
                <input type="text" name="message" id="messageInput" placeholder="Type your message" required />
                <button type="submit" id="sendButton"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <line x1="22" y1="2" x2="11" y2="13"></line>
                        <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                    </svg>
                </button>
            </form>
            <!-- INPUT FIELD END -->
        </div>
        <!-- CHAT AREA END -->
    </div>
    <!-- MAIN SCREEN END -->

    <!-- POPUP OVERLAY-->
    <div id="popupOverlay">
        <!-- POPUP FORM -->
        <div id="popupForm">
            <h2 class="cap-bold">Start Conversation With Vendor</h2>
            <!--SEARCH FOR EXSISTING VENDORS -->
            <div class="mb-3">
                <p class="fw-bold cap-bold">Is the vendor already added in the contracts?</p>
                <select id="selectVendorContracts" name="vendor_id" class="form-control selectpicker"
                    data-live-search="true" data-size="8" data-dropdown-align-right="true" title="Search for vendors">
                    <option value="">Search for vendors</option>
                    @foreach ($vendors as $vendor)
                        <option value="{{ $vendor->id }}"
                            data-content="<div class='d-flex align-items-center text-left'>
                                        <div class='taskEmployeeImg border-0 d-inline-block mr-1'>
                                            <img class='rounded-circle' src='{{ $vendor->image_url }}' alt='{{ $vendor->vendor_name }}' width='30'>
                                        </div>
                                        <span>{{ $vendor->vendor_name }}</span>
                                    </div>">
                            {{ $vendor->vendor_name }}
                        </option>
                    @endforeach
                </select>

            </div>
            <div class="mb-3">
                <p class="fw-bold cap-bold">Is the vendor already added in the Leads?</p>
                <select id="selectVendorleads" name="vendor_id" class="form-control selectpicker" data-live-search="true"
                    data-size="8" data-dropdown-align-right="true" title="Search for vendors">
                    <option value="">Search for vendors</option>
                    @foreach ($vendors_in_leads as $vendor)
                        <option value="{{ $vendor->id }}"
                            data-content="<div class='d-flex align-items-center text-left'>
                                        <span>{{ $vendor->vendor_name }}</span>
                                    </div>">
                            {{ $vendor->vendor_name }}
                        </option>
                    @endforeach
                </select>

            </div>
            <!--SEARCH FOR EXSISTING VENDORS END -->
            <form id="vendorinChatForm" action="{{ route('vendor-store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <p class="fw-bold cap-bold">Add the vendors manually?</p>
                </div>

                <!-- NAME INPUT  -->
                <div class="mb-3">
                    <label for="name" class="form-label cap-bold">Name<span class="text-danger">*</span></label>
                    <input type="text" id="name" name="name" class="form-control py-2" required
                        placeholder="Enter Vendor name">
                </div>

                <div class="row g-3">
                    <!-- COUNTRY CODE INPUT -->
                    <div class="col-md-6">
                        <label for="countrycode" class="form-label cap-bold">Country Code<span
                                class="text-danger">*</span></label>
                        <select id="countrycode" name="countrycode" class="form-control selectpicker"
                            data-live-search="true" data-size="8" title="Search for country code" required>
                            <option value="">Search for country code</option>
                            <option value="+1">+1 (USA)</option>
                            <option value="+44">+44 (UK)</option>
                            <option value="+91">+91 (India)</option>
                            <option value="+61">+61 (Australia)</option>
                            <option value="+81">+81 (Japan)</option>
                        </select>

                    </div>
                    <!-- PONE INPUT -->
                    <div class="col-md-6">
                        <label for="phone" class="form-label cap-bold">Phone<span class="text-danger">*</span></label>
                        <input type="number" id="phone" name="phone" class="form-control py-2" required
                            placeholder="Enter phone number">
                    </div>
                </div>
                <!-- ERROR MESSAGES -->
                <div class="mb-3">
                    <div id="error-messages" class="text-danger"></div>
                </div>

                <div class="mt-4 d-flex justify-content-between">
                    <button id="closeForm" type="button" class="btn btn-outline-secondary cap-bold">Close</button>
                    <button type="submit" class="btn btn-primary cap-bold" id="submit">Submit</button>
                </div>
            </form>
        </div>
        <!-- POPUP FORM END -->
    </div>
    <!-- POPUP OVERLAY END -->
@endsection

@push('scripts')
    <script src="https://sdk.twilio.com/js/conversations/v1.0/twilio-conversations.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.5/dist/js.cookie.min.js"></script>
    <script src="{{ asset('twilio-chat/javascript/main.js') }}"></script>
    <script>
        window.appData = {
            csrfToken: "{{ csrf_token() }}",
            twilioSend: "{{ route('twilio-send') }}",
            createConversation: "{{ route('createConversation') }}",
            fetchVendors: "{{ route('getVendorInChat') }}",
            generatetwiliotoken: "{{ route('generatetwiliotoken') }}",
            getVendorById: "{{ route('getVendorById') }}",
            fetchUpdatedVendor: "{{ route('fetchUpdatedVendor') }}",
            handleMessageAdded: "{{ route('handleMessageAdded') }}",
            getVendorInLeadsById: "{{ route('getVendorInLeadsById') }}",
            loggedInUserName: "{{ auth()->user()->name }}",
        };
    </script>
@endpush
