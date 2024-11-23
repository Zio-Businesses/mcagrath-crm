const loadingMessage = document.getElementById("loadingMessage");
const sendingMessage = document.getElementById("sendingMessage");
const errorMessage = document.getElementById("errorMessage");
const messageInput = document.getElementById("messageInput");
const sendButton = document.getElementById("sendButton");

const vendorInput = document.getElementById("vendor");

document
    .getElementById("message-input")
    .addEventListener("submit", function (e) {
        e.preventDefault();
        const message = messageInput.value;
        const vendorId = vendorInput.value;

        sendingMessage.style.display = "block";
        errorMessage.style.display = "none";

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
                vendorId,
            }),
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.success) {
                    messageInput.value = "";
                    vendorInput.value = "";
                } else {
                    throw new Error("Message sending failed");
                }
            })
            .catch((error) => {
                errorMessage.style.display = "block";
                console.error("Error:", error);
            })
            .finally(() => {
                sendButton.disabled = false;
                messageInput.disabled = false;
                sendingMessage.style.display = "none";
            });
    });

function loadMessages() {
    if (!twilioConversation) return;

    loadingMessage.style.display = "block";

    twilioConversation
        .getMessages()
        .then((messages) => {
            console.log(messages);
            const messagesDiv = document.getElementById("messages");
            messagesDiv.innerHTML = "";

            messages.items.forEach((message) => displayMessage(message));
            scrollToEnd();
        })
        .catch((error) => {
            errorMessage.style.display = "block";
            console.error("Error loading messages:", error);
        })
        .finally(() => {
            loadingMessage.style.display = "none";
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
    const formattedDate = `${apiDate.getDate().toString().padStart(2, "0")}-${(
        apiDate.getMonth() + 1
    )
        .toString()
        .padStart(2, "0")}-${apiDate.getFullYear().toString().slice(-2)}`;
    const time = `${apiDate.getHours().toString().padStart(2, "0")}:${apiDate
        .getMinutes()
        .toString()
        .padStart(2, "0")}`;

    messageElement.innerHTML = `<h6 class='msg-auth'>${message.author}</h6>
        <div class='msg-body'>${message.body}</div>
        <div class='msg-time'>${formattedDate} ${time}</div>`;
    messagesDiv.appendChild(messageElement);
}

function scrollToEnd() {
    const messagesDiv = document.getElementById("messages");
    messagesDiv.scrollTop = messagesDiv.scrollHeight;
}
