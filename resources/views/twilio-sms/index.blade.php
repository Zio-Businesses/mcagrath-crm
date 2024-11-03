@extends('layouts.app')


@push('styles')
    <style>
        /* Container for messages */
        #messages {
            flex: 1;
            overflow-y: auto;
            padding: 20px;
            box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1);
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        /* Message styles */
        .message {
            margin: 10px 0;
            padding: 10px;
            border-radius: 8px;
            max-width: 80%;
            word-wrap: break-word;
        }

        .message h2 {
            font-size: large;
            font-weight: bold;
        }

        .message.sent {
            background-color: #dcf8c6;
            color: black;
            text-align: right;
            align-self: flex-end;
            position: relative;
        }

        .message.received {
            background-color: #535353;
            color: white;
            text-align: left;
            align-self: flex-start;
            position: relative;
        }

        /* Form styles */
        #messageForm {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            position: absolute;
            bottom: 2.5%;
            width: 100%;
        }

        #messageForm input[type="text"] {
            flex: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 20px;
            margin-right: 10px;
            font-size: 16px;
        }

        #messageForm button {
            padding: 10px 15px;
            border: none;
            border-radius: 20px;
            background-color: #34b7f1;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
@endpush

@section('content')
    <div id="messages" style="overflow-y: scroll; max-height:80svh; position: relative;;">
        <!-- Example messages -->
        <div class="message sent">
            This is a sent message.
        </div>
        <div class="message received">
            This is a received message.
        </div>
    </div>
    <form id="messageForm" action="/twilio-send" method="POST">
        @csrf
        <input type="text" name="message" placeholder="Type your message" required>
        <button type="submit">Send</button>
    </form>
@endsection

@push('scripts')
<script src="https://sdk.twilio.com/js/conversations/v1.0/twilio-conversations.min.js"></script>
<script>
    document.getElementById("messageForm").addEventListener("submit", function(e) {
        e.preventDefault();

        const messageInput = this.querySelector('input[name="message"]');
        const message = messageInput.value;

        fetch("/twilio-send", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                },
                body: JSON.stringify({
                    message
                }),
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    messageInput.value = "";
                    loadMessages();
                }
            })
            .catch(error => console.error("Error:", error));
    });

    let twilioConversation;

    function connectToTwilio() {
        fetch("generatetwiliotoken")
            .then(response => response.json())
            .then(data => {
                const accessToken = data.token;
                const conversationSid = "{{ env('TWILIO_CHAT_SID') }}";

                Twilio.Conversations.Client.create(accessToken)
                    .then(client => client.getConversationBySid(conversationSid))
                    .then(conversation => {
                        twilioConversation = conversation;
                        document.getElementById("messages").innerHTML = "";
                        loadMessages();
                        conversation.on("messageAdded", message => {
                            displayMessage(message);
                            scrollToEnd();
                        });
                    })
                    .catch(error => console.error("Error connecting to Twilio:", error));
            })
            .catch(error => console.error("Error fetching token:", error));
    }

    function loadMessages() {
        if (!twilioConversation) return;

        twilioConversation.getMessages()
            .then(messages => {
                const messagesDiv = document.getElementById("messages");
                messagesDiv.innerHTML = "";
                messages.items.forEach(message => displayMessage(message));
                scrollToEnd(); // Scroll to the end after loading messages
            })
            .catch(error => console.error("Error loading messages:", error));
    }

    function displayMessage(message) {
        const messagesDiv = document.getElementById("messages");
        const messageElement = document.createElement("div");
        const loggedInUserId = "{{ user()->name }}";

        if (message.state.author === loggedInUserId) {
            messageElement.classList.add("message", "sent");
        } else {
            messageElement.classList.add("message", "received");
        }

        const apiDate = message.state.dateUpdated;
        const day = String(apiDate.getDate()).padStart(2, '0');
        const month = String(apiDate.getMonth() + 1).padStart(2, '0');
        const year = String(apiDate.getFullYear()).slice(-2);
        const hours = String(apiDate.getHours()).padStart(2, '0');
        const minutes = String(apiDate.getMinutes()).padStart(2, '0');

        const formattedDate = `${day}-${month}-${year}`;
        const time = `${hours}:${minutes}`;
        messageElement.innerHTML = `<h2>${message.state.author}</h2>
                                    ${message.state.body}<br>
                                       <Small>${time}</Small>`;
        messagesDiv.appendChild(messageElement);
    }

    function scrollToEnd() {
        const messagesDiv = document.getElementById("messages");
        messagesDiv.scrollTop = messagesDiv.scrollHeight;
    }

    window.onload = function() {
        connectToTwilio();
    };
</script>
@endpush
