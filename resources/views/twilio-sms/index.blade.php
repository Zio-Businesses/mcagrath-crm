@extends('layouts.app')

@push('styles')
    <style>
        #messages {
            max-height: 90%;
            position: relative;
            overflow-y: auto;
            padding: 1rem;
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
        }

        .message {
            margin: .5rem 0;
            padding: .5rem;
            border-radius: .4rem;
            max-width: 80%;
            display: flex;
            flex-direction: column;
            gap: .2rem;
            word-wrap: break-word;
        }

        .message.sent {
            background-color: #dcf8c6;
            color: black;
            text-align: left;
            align-self: flex-end;
        }

        .message.sent .msg-auth {
            text-align: right;
        }

        .msg-auth {
            text-transform: uppercase;
        }

        .msg-body {
            font-size: 1rem;
            text-align: left;
        }

        .msg-time {
            font-size: .75rem;
            text-align: right;
        }

        .message.received {
            background-color: #535353;
            color: white;
            text-align: left;
            align-self: flex-start;
        }

        .status-message {
            font-size: 0.9rem;
            color: #777;
            margin: .5rem;
            text-align: center;
            display: none;
        }

        .status-message.loading {
            color: #3498db;
        }

        .status-message.sending {
            color: #34b7f1;
        }

        .status-message.error {
            color: #e74c3c;
        }

        #messageForm {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0rem .5rem;
            width: 95%;
        }

        #messageForm input[type="text"] {
            flex: 1;
            padding: .75rem .5rem;
            border-radius: .75rem;
            border: 1px solid #ccc;
            margin-right: 10px;
            color: white;
            font-size: 16px;
        }

        #messageForm button {
            padding: .75rem .5rem;
            border: none;
            border-radius: 100%;
            background-color: #34b7f1;
            color: white;
            font-size: .725rem;
            cursor: pointer;
        }

        .sms-container {
            width: 100%;
            height: 91svh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-end;
        }

        select.form-control,
        select.form-control>option {
            width: 15%;
            padding: .75rem .5rem;
            margin: .5rem;
            border-radius: .75rem;
        }
    </style>
@endpush
@section('content')
    <div class="sms-container">
        <div id="messages"></div>
        <div id="loadingMessage" class="status-message loading">Loading messages...</div>
        <div id="sendingMessage" class="status-message sending">Sending message...</div>
        <div id="errorMessage" class="status-message error">An error occurred. Please try again.</div>
        <form id="messageForm" action="/twilio-send" method="POST">
            @csrf
            <select class="form-control" name="vendor" id="vendor">
                <option value='' class="form-control">Select vendor</option>
                @php
                    use App\Models\VendorContract;
                    $vendors = VendorContract::all();
                @endphp

                @foreach ($vendors as $vendor)
                    <option value='{{ $vendor->id }}' class="form-control">{{ $vendor->vendor_name }}</option>
                @endforeach
            </select>
            <input type="text" name="message" id="messageInput" placeholder="Type your message" required>
            <button type="submit" id="sendButton"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <line x1="22" y1="2" x2="11" y2="13"></line>
                    <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                </svg>
            </button>
        </form>
    </div>
@endsection

@push('scripts')
    <script src="https://sdk.twilio.com/js/conversations/v1.0/twilio-conversations.min.js"></script>
    <script>
        const loadingMessage = document.getElementById("loadingMessage");
        const sendingMessage = document.getElementById("sendingMessage");
        const errorMessage = document.getElementById("errorMessage");
        const messageInput = document.getElementById("messageInput");
        const sendButton = document.getElementById("sendButton");

        const vendorInput = document.getElementById("vendor");
     
        document.getElementById("messageForm").addEventListener("submit", function(e) {
            e.preventDefault();
            const message = messageInput.value;
            const vendorId = vendorInput.value;


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
                        vendorId
                    }),
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        messageInput.value = "";
                        vendorInput.value = "";
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

        window.onload = connectToTwilio;
    </script>
@endpush
