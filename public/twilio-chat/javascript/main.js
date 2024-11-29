$(document).ready(function () {
    // Initialize select picker
    $("#selectVendor").selectpicker();

    // Handle vendor selection
    $("#selectVendor").on(
        "changed.bs.select",
        function (e, clickedIndex, isSelected, previousValue) {
            const selectedVendorId = $(this).val();

            if (selectedVendorId) {
                const $userElement = $(
                    `.user[data-vendor-id='${selectedVendorId}']`
                );

                if ($userElement.length) {
                    $userElement[0].scrollIntoView({
                        behavior: "smooth",
                        block: "center",
                    });
                    $userElement.trigger("click");
                }
            }
        }
    );

    let chatsid = "";
    let selected_vendor;
    const $loadingMessage = $("#loadingMessage");
    const $sendingMessage = $("#sendingMessage");
    const $errorMessage = $("#errorMessage");
    const $messageInput = $("#messageInput");
    const $sendButton = $("#sendButton");
    const $chatTitle = $("#chat-title");
    const $messagesDiv = $("#messages");
    const $chatImage = $("#chat-image");
    const $form = $("#message-input");
    const $chatHeader = $("#chatheader");
    let disableClicks = false;

    // Handle user clicks
    $(".user").on("click", async function () {
        if (disableClicks) return;

        $(".user").removeClass("active");
        const $this = $(this);
        $this.addClass("active");

        selected_vendor = $this.data("vendor-id");
        const vendorName = $this.find("span").text().trim();
        const vendorImage = $this.find("img").attr("src");

        $chatTitle.text(vendorName);
        $chatImage.attr("src", vendorImage).css("display", "inline-block");
        $form.css("display", "flex");
        $chatHeader.css("display", "flex");

        try {
            $(".spinner").fadeIn("fast").addClass("d-flex");
            disableClicks = true;
            $loadingMessage.show();
            $messageInput.val("").prop("disabled", true);
            $sendButton.prop("disabled", true);
            $messagesDiv.empty();

            const response = await fetch(window.appData.createConversation, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": window.appData.csrfToken,
                },
                body: JSON.stringify({ vendor_id: selected_vendor }),
            });

            const data = await response.json();

            if (data.sid) {
                chatsid = data.sid;
                connectToTwilio(data.sid);
            } else {
                console.error("Failed to get or create chat SID.");
                alert("Unable to connect to the chat. Please try again.");
            }
        } catch (error) {
            console.error("Error:", error);
            alert("An error occurred while connecting to the chat.");
        } finally {
            $(".spinner").fadeOut("fast").removeClass("d-flex");
            disableClicks = false;
            $loadingMessage.hide();
        }
    });

    // Handle message form submission
    $form.on("submit", function (e) {
        e.preventDefault();
        const message = $messageInput.val();

        $sendingMessage.show();
        $errorMessage.hide();
        disableClicks = true;
        $sendButton.prop("disabled", true);
        $messageInput.prop("disabled", true);

        fetch(window.appData.twilioSend, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": window.appData.csrfToken,
            },
            body: JSON.stringify({
                message: message,
                chatsid: chatsid,
                vendorId: selected_vendor,
            }),
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.success) {
                    $messageInput.val("");
                } else {
                    throw new Error("Message sending failed");
                }
            })
            .catch((error) => {
                $errorMessage.show();
                console.error("Error:", error);
            })
            .finally(() => {
                disableClicks = false;
                $sendButton.prop("disabled", false);
                $messageInput.prop("disabled", false);
                $sendingMessage.hide();
            });
    });
});

let twilioConversation;

function connectToTwilio(twilioChatSid) {
    const $loadingMessage = $("#loadingMessage");
    const $sendButton = $("#sendButton");
    const $messageInput = $("#messageInput");
    const $spinner = $(".spinner");
    const $errorMessage = $("#errorMessage");

    $loadingMessage.show();
    $sendButton.prop("disabled", true);
    $messageInput.prop("disabled", true);

    fetch("generatetwiliotoken")
        .then((response) => response.json())
        .then((data) => {
            const accessToken = data.token;

            Twilio.Conversations.Client.create(accessToken)
                .then((client) => client.getConversationBySid(twilioChatSid))
                .then((conversation) => {
                    twilioConversation = conversation;
                    loadMessages();
                    conversation.on("messageAdded", (message) => {
                        displayMessage(message);
                        scrollToEnd();
                    });
                })
                .catch((error) => {
                    $errorMessage.show();
                    console.error("Error connecting to Twilio:", error);
                })
                .finally(() => {
                    disableClicks = false;
                    $sendButton.prop("disabled", false);
                    $messageInput.prop("disabled", false);
                    $loadingMessage.hide();
                    $spinner.fadeOut("slow", function () {
                        $(this).removeClass("d-flex");
                    });
                });
        })
        .catch((error) => {
            $errorMessage.show();
            console.error("Error fetching token:", error);
            $loadingMessage.hide();
        });
}

function loadMessages() {
    if (!twilioConversation) return;

    const $loadingMessage = $("#loadingMessage");
    const $sendButton = $("#sendButton");
    const $messageInput = $("#messageInput");
    const $errorMessage = $("#errorMessage");

    $loadingMessage.show();
    $sendButton.prop("disabled", true);
    $messageInput.prop("disabled", true);

    twilioConversation
        .getMessages()
        .then((messages) => {
            const $messagesDiv = $("#messages");
            $messagesDiv.empty();

            messages.items.forEach((message) => displayMessage(message));
            scrollToEnd();
        })
        .catch((error) => {
            $errorMessage.show();
            console.error("Error loading messages:", error);
        })
        .finally(() => {
            $loadingMessage.hide();
            $sendButton.prop("disabled", false);
            $messageInput.prop("disabled", false);
        });
}

function displayMessage(message) {
    const $messagesDiv = $("#messages");
    const $chatTitle = $("#chat-title");
    const loggedInUserId = window.appData.loggedInUserName;

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

    const messageClass =
        message.author === $chatTitle.text().trim() ? "received" : "sent";
    const messageElement = `
        <div class="message ${messageClass}">
            <h6 class="msg-auth">${message.author}</h6>
            <div class="msg-body">${message.body}</div>
            <div class="msg-time">${formattedDate} ${time}</div>
        </div>`;
    $messagesDiv.append(messageElement);
}

function scrollToEnd() {
    const $messagesDiv = $("#messages");
    $messagesDiv.scrollTop($messagesDiv.prop("scrollHeight"));
}
