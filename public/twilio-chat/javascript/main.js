document.addEventListener("DOMContentLoaded", function () {
    $("#selectVendor").selectpicker();

    $("#selectVendor").on(
        "changed.bs.select",
        function (e, clickedIndex, isSelected, previousValue) {
            const selectedVendorId = $(this).val();

            if (selectedVendorId) {
                const userElement = document.querySelector(
                    `.user[data-vendor-id='${selectedVendorId}']`
                );

                if (userElement) {
                    userElement.scrollIntoView({
                        behavior: "smooth",
                        block: "center",
                    });
                    userElement.click();
                }
            }
        }
    );
});
document.querySelectorAll(".user").forEach((user) => {
    user.addEventListener("click", function () {
        document
            .querySelectorAll(".user")
            .forEach((u) => u.classList.remove("active"));
        this.classList.add("active");

        const vendorId = this.getAttribute("data-vendor-id");
        const vendorName = this.querySelector("span").textContent;
        const vendorImage = this.querySelector("img").src;
        const form = document.getElementById("message-input");
        const chat = document.getElementById("chatheader");

        const chatTitle = document.getElementById("chat-title");
        const chatImage = document.getElementById("chat-image");

        chatTitle.textContent = vendorName;
        chatImage.src = vendorImage;
        chatImage.style.display = "inline-block";
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

document
    .getElementById("message-input")
    .addEventListener("submit", function (e) {
        e.preventDefault();
        const message = messageInput.value;

        sendingMessage.style.display = "block";
        errorMessage.style.display = "none";

        sendButton.disabled = true;
        messageInput.disabled = true;

        fetch("twilio-send", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": window.appData.csrfToken,
            },
            body: JSON.stringify({ message }),
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.success) {
                    messageInput.value = "";
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

let twilioConversation;

function connectToTwilio() {
    loadingMessage.style.display = "block";

    fetch("generatetwiliotoken")
        .then((response) => response.json())
        .then((data) => {
            const accessToken = data.token;

            Twilio.Conversations.Client.create(accessToken)
                .then((client) =>
                    client.getConversationBySid(window.appData.twilioChatSid)
                )
                .then((conversation) => {
                    twilioConversation = conversation;
                    loadMessages();
                    conversation.on("messageAdded", (message) => {
                        displayMessage(message);
                        scrollToEnd();
                    });
                })
                .catch((error) => {
                    errorMessage.style.display = "block";
                    console.error("Error connecting to Twilio:", error);
                })
                .finally(() => {
                    loadingMessage.style.display = "none";
                });
        })
        .catch((error) => {
            errorMessage.style.display = "block";
            console.error("Error fetching token:", error);
            loadingMessage.style.display = "none";
        });
}

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
    const loggedInUserId = window.appData.loggedInUserName;

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
