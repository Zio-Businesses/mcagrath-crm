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
    let twilioClient;
    let chatsid = "";
    let selected_vendor = null;
    let oldestMessageIndex = undefined;
    let isLoadingMessages = false;
    let initialLoad = true;
    //END OF CACHE ELEMENTS

    // Function to render vendors
    function renderVendors(vendors) {
        userList.empty();

        vendors.forEach((vendor) => {
            const vendorHtml = `
            <div class="user" data-vendor-id="${vendor.id}">
                <img src="${vendor.image_url}" alt="" />
                  <div class="userdetails">
                            <span>${vendor.vendor_name}
                            </span>
                            <p class="usercontent">${vendor.last_msg || ""}</p>
                        </div>
                <div class="notif"></div>
                <div class="time">
                    <p>${
                        vendor.updated_at
                            ? new Date(vendor.updated_at).toLocaleTimeString(
                                  [],
                                  {
                                      hour: "2-digit",
                                      minute: "2-digit",
                                      hour12: false,
                                  }
                              )
                            : ""
                    }</p>
                </div>
            </div>
        `;
            userList.append(vendorHtml);
        });

        if (selected_vendor) {
            const $activeVendor = userList.find(
                `[data-vendor-id="${selected_vendor}"]`
            );
            if ($activeVendor.length) {
                $activeVendor.addClass("active");
            }
        }
    }

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
                        expires: 7,
                    }); // Cache for 7 days
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

    // TWILIO TOKEN JWT
    function connectToTwilio(twilioChatSid) {
        // const token = Cookies.get("twilioToken");
        // if (token) {
        //     initializeTwilio(token, twilioChatSid);
        //     return;
        // }

        fetch("generatetwiliotoken")
            .then((response) => response.json())
            .then((data) => {
                // Cookies.set("twilioToken", data.token);
                initializeTwilio(data.token, twilioChatSid);
            })
            .catch((error) => {
                $errorMessage.show();
                console.error("Error fetching token:", error);
                $loadingMessage.hide();
            });
    }
    // END OF TWILIO TOKEN JWT

    //TWILIO CLIENT
    function initializeTwilioClient(token) {
        if (twilioClient) {
            return Promise.resolve(twilioClient);
        }

        return Twilio.Conversations.Client.create(token)
            .then((client) => {
                twilioClient = client;

                // Debounce or throttle function to reduce API call frequency
                let fetchVendorsTimeout = null;
                const THROTTLE_DELAY = 2000; // Delay for throttling API requests

                function fetchAndRenderVendors() {
                    // Clear previous timeout if it exists
                    if (fetchVendorsTimeout) {
                        clearTimeout(fetchVendorsTimeout);
                    }

                    // Set a new timeout to throttle API calls
                    fetchVendorsTimeout = setTimeout(() => {
                        fetch(window.appData.fetchVendors, {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": window.appData.csrfToken,
                            },
                            body: JSON.stringify({}), // Add necessary payload if required
                        })
                            .then((response) => {
                                if (!response.ok) {
                                    throw new Error(
                                        `HTTP error! status: ${response.status}`
                                    );
                                }
                                return response.json();
                            })
                            .then((data) => {
                                renderVendors(data); // Re-render or update vendor list
                            })
                            .catch((error) => {
                                console.error("Error fetching vendors:", error);
                            });
                    }, THROTTLE_DELAY);
                }

                // Listen for messageAdded and participantAdded events
                client.on("messageAdded", () => {
                    fetchAndRenderVendors();
                });

                client.on("conversationAdded", () => {
                    fetchAndRenderVendors();
                });
                client.on("participantAdded", () => {
                    fetchAndRenderVendors();
                });

                return client;
            })
            .catch((error) => {
                console.error("Error initializing Twilio client:", error);
                throw error; // Propagate the error for the calling function to handle
            });
    }

    //END OF TWILIO CLIENT

    //INITIAL LOADING TWILIO CHATS
    function initializeTwilio(token, twilioChatSid) {
        initializeTwilioClient(token)
            .then((client) => client.getConversationBySid(twilioChatSid))
            .then((conversation) => {
                twilioConversation = conversation;
                loadMessages();

                // Listen for new messages
                conversation.on("messageAdded", (message) => {
                    displayMessage(message);
                    // Ensure the UI scrolls to the latest message
                    scrollToEnd();
                });
            })
            .catch((error) => {
                $errorMessage.show(); // Show an error message
                $loadingMessage.hide();
                console.error("Error connecting to Twilio:", error);
            });
    }

    //END OF INITIAL LOADING TWILIO CHATS

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
