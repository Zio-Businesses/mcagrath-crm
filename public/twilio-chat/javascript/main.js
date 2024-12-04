$(document).ready(function () {
    //CACHING ELEMENTS
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
    const userList = $(".user-list");
    const PAGE_SIZE = 10;
    let disableClicks = false;
    let twilioClient = null;
    let chatsid = "";
    let selected_vendor = null;
    let oldestMessageIndex = undefined;
    let isLoadingMessages = false;
    let initialLoad = true;
    let twilioConversation = null;
    //END OF CACHE ELEMENTS
    connectToTwilio();
    // Connect to Twilio and fetch the token
    function connectToTwilio() {
        disableClicks = true;
        $loadingMessage.show();
        fetch(window.appData.generatetwiliotoken)
            .then((response) => response.json())
            .then((data) => {
                initializeTwilioClient(data.token);
            })
            .catch((error) => {
                console.error("Error fetching token:", error);
                $errorMessage.show();
            });
    }

    // Initialize Twilio Client and manage token updates
    function initializeTwilioClient(token) {
        if (twilioClient) {
            $loadingMessage.hide();
            disableClicks = false;
            return Promise.resolve(twilioClient);
        }

        return Twilio.Conversations.Client.create(token)
            .then((client) => {
                twilioClient = client;

                console.log("Twilio Conversations Client initialized.");

                // Add event listeners for token expiration
                client.on("tokenAboutToExpire", handleTokenRefresh);
                client.on("tokenExpired", handleTokenRefresh);
                client.on("conversationAdded", (conversation) => {
                    fetch(`${window.appData.fetchUpdatedVendor}`, {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": window.appData.csrfToken,
                        },
                        body: JSON.stringify({
                            channel_sid: conversation.sid,
                        }),
                    })
                        .then((response) => response.json())
                        .then((vendor) => {
                            if (vendor) {
                                updateVendor(vendor);
                            }
                        })
                        .catch((error) => {
                            console.error(
                                "Error fetching updated vendor:",
                                error
                            );
                        });
                });
                client.on("messageAdded", (message) => {
                    fetch(`${window.appData.fetchUpdatedVendor}`, {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": window.appData.csrfToken,
                        },
                        body: JSON.stringify({
                            channel_sid: message.conversation.sid,
                        }),
                    })
                        .then((response) => response.json())
                        .then((vendor) => {
                            if (vendor) {
                                updateVendor(vendor);
                            }
                        })
                        .catch((error) => {
                            console.error(
                                "Error fetching updated vendor:",
                                error
                            );
                        });
                });
                return client;
            })
            .catch((error) => {
                console.error("Error initializing Twilio client:", error);
                throw error;
            })
            .finally(() => {
                $loadingMessage.hide();
                disableClicks = false;
            });
    }

    function updateVendor(vendor) {
        const $vendorDiv = userList.find(`[data-vendor-id="${vendor.id}"]`);
        if ($vendorDiv.length) {
            $vendorDiv.find(".usercontent").text(vendor.last_msg || "");
            $vendorDiv.find(".time p").text(
                vendor.updated_at
                    ? new Date(vendor.updated_at).toLocaleTimeString([], {
                          hour: "2-digit",
                          minute: "2-digit",
                          hour12: false,
                      })
                    : ""
            );
            // Move the updated vendor to the top
            $vendorDiv.prependTo(userList);
        } else {
            // Add new vendor if not already present
            renderVendors(vendor);
        }
    }

    // Handle token refresh
    function handleTokenRefresh() {
        console.log(
            "Token is about to expire or has expired. Refreshing token..."
        );
        fetch(window.appData.generatetwiliotoken)
            .then((response) => response.json())
            .then((data) => {
                return twilioClient.updateToken(data.token);
            })
            .then(() => {
                console.log("Twilio client token successfully updated.");
            })
            .catch((error) => {
                console.error("Error refreshing token:", error);
            });
    }

    handlemessageAdded = (message) => {
        displayMessage(message);
        scrollToEnd();
    };
    // Initialize a specific Twilio conversation
    function initializeTwilio(twilioChatSid) {
        if (!twilioClient) {
            console.error("Twilio client is not initialized.");
            return;
        }
        if (twilioConversation) {
            twilioConversation.removeListener(
                "messageAdded",
                handlemessageAdded
            );
        }
        twilioClient
            .getConversationBySid(twilioChatSid)
            .then((conversation) => {
                twilioConversation = conversation;
                loadMessages();
                conversation.on("messageAdded", handlemessageAdded);
            })
            .catch((error) => {
                $errorMessage.show();
                $loadingMessage.hide();
                console.error("Error connecting to Twilio:", error);
            });
    }

    //END OF TWILIO CLIENT
    // SEARRCH WITH DROP DOWN BOX
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
    // END OF SEARRCH WITH DROP DOWN BOX

    // VENDORS LIST
    // Use event delegation to bind the click event
    $(".user-list").on(
        "click",
        ".user",
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

            oldestMessageIndex = undefined;
            isLoadingMessages = false;
            initialLoad = true;
            $messagesDiv.off("scroll");

            // Handle the initial load of messages
            $messagesDiv.empty();

            // Check cookies for an existing chat SID
            chatsid = Cookies.get(`conversation_${selected_vendor}`);
            if (chatsid) {
                initializeTwilio(chatsid);
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
                        expires: 7,
                    }); // Cache for 7 days
                    initializeTwilio(chatsid);
                } else {
                    alert("Unable to connect to the chat. Please try again.");
                }
            } catch (error) {
                console.error("Error:", error);
                alert("An error occurred while connecting to the chat.");
            }
        }, 300)
    );

    // END OF VENDORS LIST

    //SENDING THE MESSAGE
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
                user: window.appData.loggedInUserName,
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
    //END OF SENDING THE MSG

    //LOAD THE MSGS
    function loadMessages() {
        if (isLoadingMessages) return;
        $loadingMessage.show();
        isLoadingMessages = true; // Prevent concurrent requests

        twilioConversation
            .getMessages(PAGE_SIZE, oldestMessageIndex)
            .then((messages) => {
                if (initialLoad) {
                    // Attach scroll listener for lazy loading
                    $messagesDiv.on("scroll", function () {
                        if (
                            $messagesDiv.scrollTop() === 0 &&
                            !isLoadingMessages
                        ) {
                            loadMessages();
                        }
                    });
                    messages.items.forEach((message) =>
                        displayMessage(message)
                    );
                    scrollToEnd();
                    initialLoad = false;
                    if (messages.items.length > 0) {
                        oldestMessageIndex = messages.items[0].index - 1;
                    }
                } else {
                    const previousScrollHeight =
                        $messagesDiv.prop("scrollHeight");
                    const previousScrollTop = $messagesDiv.scrollTop();
                    if (messages.items.length > 0) {
                        oldestMessageIndex = messages.items[0].index - 1;
                    }

                    messages.items.reverse().forEach((message) => {
                        prependMessage(message);
                    });

                    // Maintain the user's scroll position
                    const newScrollHeight = $messagesDiv.prop("scrollHeight");
                    const scrollDifference =
                        newScrollHeight - previousScrollHeight;
                    $messagesDiv.scrollTop(
                        previousScrollTop + scrollDifference
                    );
                }

                // Stop loading if no more messages are available
                if (messages.items.length < PAGE_SIZE) {
                    $messagesDiv.off("scroll"); // Disable further scroll listening
                }
            })
            .catch((error) => {
                $errorMessage.show();
                console.error("Error loading messages:", error);
            })
            .finally(() => {
                isLoadingMessages = false;
                $loadingMessage.hide();
                $(".spinner").fadeOut("slow").removeClass("d-flex");
                disableClicks = false;
                $sendButton.prop("disabled", false);
                $messageInput.prop("disabled", false);
            });
    }

    //PREPEND ON SCROLL UP
    function prependMessage(message) {
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
        $messagesDiv.prepend(messageElement);
    }

    //INITIAL DISPLAY
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

    function renderVendors(vendor) {
        const vendorHtml = `
        <div class="user" data-vendor-id="${vendor.id}">
            <img src="${vendor.image_url}" alt="" />
            <div class="userdetails">
                <span>${vendor.vendor_name}</span>
                <p class="usercontent">${vendor.last_msg || ""}</p>
            </div>
            <div class="time">
                <p>${
                    vendor.updated_at
                        ? new Date(vendor.updated_at).toLocaleTimeString([], {
                              hour: "2-digit",
                              minute: "2-digit",
                              hour12: false,
                          })
                        : ""
                }</p>
            </div>
        </div>`;
        userList.prepend(vendorHtml);

        if (selected_vendor) {
            const $activeVendor = userList.find(
                `[data-vendor-id="${selected_vendor}"]`
            );
            if ($activeVendor.length) {
                $activeVendor.addClass("active");
            }
        }
    }

    //SCROLL TO END FUNCTION
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
