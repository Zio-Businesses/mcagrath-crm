$(document).ready(function () {
    const $selectVendor = $("#selectVendor");
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
    let twilioClient;
    let chatsid = "";
    let selected_vendor = null;

    // Initialize vendor select picker
    $selectVendor.selectpicker();

    $selectVendor.on("changed.bs.select", function () {
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
    });

    // Handle user clicks
    $(".user").on(
        "click",
        debounce(async function () {
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

            $(".spinner").fadeIn("fast").addClass("d-flex");
            disableClicks = true;
            $loadingMessage.show();
            $messageInput.val("").prop("disabled", true);
            $sendButton.prop("disabled", true);
            $messagesDiv.empty();

            // Check cookies for an existing chat SID
            chatsid = Cookies.get(`conversation_${selected_vendor}`);
            if (chatsid) {
                connectToTwilio(chatsid);
                return;
            }

            try {
                const response = await fetch(
                    window.appData.createConversation,
                    {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": window.appData.csrfToken,
                        },
                        body: JSON.stringify({ vendor_id: selected_vendor }),
                    }
                );

                const data = await response.json();

                if (data.sid) {
                    chatsid = data.sid;
                    Cookies.set(`conversation_${selected_vendor}`, chatsid, {
                        expires: 7, // Cache for 7 days
                    });
                    connectToTwilio(chatsid);
                } else {
                    alert("Unable to connect to the chat. Please try again.");
                }
            } catch (error) {
                console.error("Error:", error);
                alert("An error occurred while connecting to the chat.");
            }
        }, 300)
    );

    function sendMessage(message) {
        return fetch(window.appData.twilioSend, {
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
        });
    }

    $form.on("submit", async function (e) {
        e.preventDefault();
        const message = $messageInput.val();

        $sendingMessage.show();
        $errorMessage.hide();
        disableClicks = true;
        $sendButton.prop("disabled", true);
        $messageInput.prop("disabled", true);

        try {
            const response = await sendMessage(message);
            const data = await response.json();

            if (!data.success) {
                throw new Error("Message sending failed");
            }

            $messageInput.val("");
        } catch (error) {
            console.error("Error:", error);
            const retry = confirm(
                "Message sending failed. Would you like to retry?"
            );
            if (retry) {
                await sendMessage(message);
            }
        } finally {
            disableClicks = false;
            $sendButton.prop("disabled", false);
            $messageInput.prop("disabled", false);
            $sendingMessage.hide();
        }
    });

    // Connect to Twilio
    function connectToTwilio(twilioChatSid) {
        const token = Cookies.get("twilioToken");
        if (token) {
            initializeTwilio(token, twilioChatSid);
            return;
        }

        fetch("generatetwiliotoken")
            .then((response) => response.json())
            .then((data) => {
                Cookies.set("twilioToken", data.token, 3600);
                initializeTwilio(data.token, twilioChatSid);
            })
            .catch((error) => {
                $errorMessage.show();
                console.error("Error fetching token:", error);
                $loadingMessage.hide();
            });
    }

    function initializeTwilioClient(token) {
        if (twilioClient) {
            return Promise.resolve(twilioClient);
        }
        return Twilio.Conversations.Client.create(token).then((client) => {
            twilioClient = client;
            return client;
        });
    }

    function initializeTwilio(token, twilioChatSid) {
        initializeTwilioClient(token)
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
            });
    }

    // Load messages and display them
    function loadMessages() {
        if (!twilioConversation) return;

        twilioConversation
            .getMessages()
            .then((messages) => {
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
                $(".spinner").fadeOut("fast").removeClass("d-flex");
                disableClicks = false;
                $sendButton.prop("disabled", false);
                $messageInput.prop("disabled", false);
            });
    }

    function displayMessage(message) {
        const apiDate = new Date(message.dateUpdated);
        const formattedDate = `${apiDate
            .getDate()
            .toString()
            .padStart(2, "0")}-${(apiDate.getMonth() + 1)
            .toString()
            .padStart(2, "0")}-${apiDate.getFullYear().toString().slice(-2)}`;
        const time = `${apiDate
            .getHours()
            .toString()
            .padStart(2, "0")}:${apiDate
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
        $messagesDiv.scrollTop($messagesDiv.prop("scrollHeight"));
    }

    // Debounce function to prevent rapid clicks
    function debounce(func, delay) {
        let timeout;
        return function (...args) {
            clearTimeout(timeout);
            timeout = setTimeout(() => func.apply(this, args), delay);
        };
    }
});
