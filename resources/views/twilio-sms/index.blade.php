@extends('layouts.app')
@php
    use App\Models\VendorContract;
    $vendors = VendorContract::all();
@endphp
@push('styles')
    <link rel="stylesheet" href="{{ asset('twilio-chat/css/main.css') }}" defer="defer">
@endpush
@section('content')
    <div class="chat-app-container">
        <!-- Left Sidebar -->
        <div class="sidebar">
            <div class="search-bar">
                <div class="form-group position-relative mt-1 mb-1">
                    <!-- The Dropdown -->
                    <select id="selectVendor" name="vendor_id" class="form-control select-picker pl-5" data-live-search="true"
                        data-size="8" data-dropdown-align-right="true" title="Search for vendors">
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

                    <!-- Search Icon -->
                    <span class="position-absolute search-icon" style="top: 10px; left: 15px; color: #6c757d;">
                        <i class="fas fa-search"></i>
                    </span>
                </div>

            </div>
            <div class="user-list">
                @foreach ($vendors as $vendor)
                    <div class="user" data-vendor-id="{{ $vendor->id }}">
                        <img src="{{ $vendor->image_url }}" alt="" />
                        <span>{{ $vendor->vendor_name }}</span>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Chat Area -->
        <div class="chat-area">
            <div class="chat-header" id="chatheader">
                <img id="chat-image" src="" alt="Vendor" style="display: none" />
                <h3 id="chat-title"></h3>
            </div>
            <div id="messages">
            </div>
            <div id="loadingMessage" class="status-message loading">Loading messages...</div>
            <div id="sendingMessage" class="status-message sending">Sending message...</div>
            <div id="errorMessage" class="status-message error">An error occurred. Please try again.</div>
            <form id="message-input" action="/twilio-send" method="POST">
                @csrf
                <input type="text" name="message" id="messageInput" placeholder="Type your message" required>
                <button type="submit" id="sendButton"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <line x1="22" y1="2" x2="11" y2="13"></line>
                        <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                    </svg>
                </button>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://sdk.twilio.com/js/conversations/v1.0/twilio-conversations.min.js"></script>
    <script src="{{ asset('twilio-chat/javascript/main.js') }}"></script>
    <script>
        window.appData = {
            csrfToken: "{{ csrf_token() }}",
            loggedInUserName: "{{ auth()->user()->name }}",
            twilioChatSid: "{{ env('TWILIO_CHAT_SID') }}"
        };
    </script>
@endpush
