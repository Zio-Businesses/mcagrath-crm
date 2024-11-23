@extends('layouts.app')
@php
    use App\Models\VendorContract;
    $vendors = VendorContract::all();
@endphp
@push('styles')
    <link rel="stylesheet" href="{{ asset('twilio-chat/style.css') }}" defer="defer">
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
    <script src="{{ asset('twilio-chat/scripts.jss') }}"></script>
    <script>
        $(document).ready(function() {
            $('#selectVendor').selectpicker();
        });

        document.querySelectorAll('.user').forEach(user => {
            user.addEventListener('click', function() {
                document.querySelectorAll('.user').forEach(u => u.classList.remove('active'));
                this.classList.add('active');

                const vendorId = this.getAttribute('data-vendor-id');
                const vendorName = this.querySelector('span').textContent;
                const vendorImage = this.querySelector('img').src;
                const form = document.getElementById('message-input');
                const chat = document.getElementById('chatheader');


                const chatTitle = document.getElementById('chat-title');
                const chatImage = document.getElementById('chat-image');

                chatTitle.textContent = vendorName;
                chatImage.src = vendorImage;
                chatImage.style.display = 'inline-block';
                form.style.display = "flex";
                chat.style.display = "flex";

                connectToTwilio();
            });
        });



        const loadingMessage = document.getElementById("loadingMessage");
        const sendingMessage = document.getElementById("sendingMessage");
        const errorMessage = document.getElementById("errorMessage");
        const messageInput = document.getElementById("messageInput");
        const sendButton = document.getElementById("sendButton");

        const vendorInput = document.getElementById("vendor");

        document.getElementById("message-input").addEventListener("submit", function(e) {
            e.preventDefault();
            const message = messageInput.value;


            sendingMessage.style.display = 'block';
            errorMessage.style.display = 'none';

            sendButton.disabled = true;
            messageInput.disabled = true;

            fetch("twilio-send", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    },
                    body: JSON.stringify({
                        message,
                    }),
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        messageInput.value = "";
                    } else {
                        throw new Error("Message sending failed");
                    }
                })
                .catch(error => {
                    errorMessage.style.display = 'block';
                    console.error("Error:", error);
                })
                .finally(() => {
                    sendButton.disabled = false;
                    messageInput.disabled = false;
                    sendingMessage.style.display = 'none';
                });
        });

        let twilioConversation;

        function connectToTwilio() {
            loadingMessage.style.display = 'block';

            fetch("generatetwiliotoken")
                .then(response => response.json())
                .then(data => {
                    const accessToken = data.token;
                    const conversationSid = "{{ env('TWILIO_CHAT_SID') }}";

                    Twilio.Conversations.Client.create(accessToken)
                        .then(client => client.getConversationBySid(conversationSid))
                        .then(conversation => {
                            twilioConversation = conversation;
                            loadMessages();
                            conversation.on("messageAdded", message => {
                                displayMessage(message);
                                scrollToEnd();
                            });
                        })
                        .catch(error => {
                            errorMessage.style.display = 'block';
                            console.error("Error connecting to Twilio:", error);
                        })
                        .finally(() => {
                            loadingMessage.style.display = 'none';
                        });
                })
                .catch(error => {
                    errorMessage.style.display = 'block';
                    console.error("Error fetching token:", error);
                    loadingMessage.style.display = 'none';
                });
        }

        function loadMessages() {
            if (!twilioConversation) return;

            loadingMessage.style.display = 'block';

            twilioConversation.getMessages()
                .then(messages => {
                    console.log(messages)
                    const messagesDiv = document.getElementById("messages");
                    messagesDiv.innerHTML = "";

                    messages.items.forEach(message => displayMessage(message));
                    scrollToEnd();
                })
                .catch(error => {
                    errorMessage.style.display = 'block';
                    console.error("Error loading messages:", error);
                })
                .finally(() => {
                    loadingMessage.style.display = 'none';
                });
        }

        function displayMessage(message) {
            const messagesDiv = document.getElementById("messages");
            const messageElement = document.createElement("div");
            const loggedInUserId = "{{ auth()->user()->name }}";

            if (message.author === loggedInUserId) {
                messageElement.classList.add("message", "sent");
            } else {
                messageElement.classList.add("message", "received");
            }

            const apiDate = new Date(message.dateUpdated);
            const formattedDate =
                `${apiDate.getDate().toString().padStart(2, '0')}-${(apiDate.getMonth() + 1).toString().padStart(2, '0')}-${apiDate.getFullYear().toString().slice(-2)}`;
            const time =
                `${apiDate.getHours().toString().padStart(2, '0')}:${apiDate.getMinutes().toString().padStart(2, '0')}`;

            messageElement.innerHTML =
                `<h6 class='msg-auth'>${message.author}</h6>
                <div class='msg-body'>${message.body}</div>
                <div class='msg-time'>${formattedDate} ${time}</div>`;
            messagesDiv.appendChild(messageElement);
        }

        function scrollToEnd() {
            const messagesDiv = document.getElementById("messages");
            messagesDiv.scrollTop = messagesDiv.scrollHeight;
        }
    </script>
@endpush
