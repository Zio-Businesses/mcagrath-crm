$(document).ready(function () {
    const $popupOverlay = $("#popupOverlay");
    const $formBtn = $("#formbtn");
    const $closeForm = $("#closeForm");
    const $selectVendorContracts = $("#selectVendorContracts");
    const $nameInput = $("#name");
    const $phoneInput = $("#phone");
    let image_url = "";
    const $countrycode = $("#countrycode");
    const $submitButton = $("#submit");
    // Initialize the selectpicker
    $selectVendorContracts.selectpicker();
    $countrycode.selectpicker();
    // Handle change event
    $selectVendorContracts.on("changed.bs.select", function () {
        const selectedVendorId = $(this).val();

        if (!selectedVendorId) {
            $countrycode.selectpicker("refresh");
            $phoneInput.val("");
            $nameInput.val("");
            return;
        }

        $.ajax({
            url: window.appData.getVendorById,
            method: "POST",
            data: {
                vendor_id: selectedVendorId,
                _token: window.appData.csrfToken,
            },
            beforeSend: function () {
                $submitButton.prop("disabled", true);
            },
            success: function (response) {
                $nameInput.val(response.vendor_name);
                $phoneInput.val(response.vendor_cell);

                image_url = response.company_logo;
            },
            error: function () {
                alert("Failed to fetch vendor details. Please try again.");
            },
            complete: function () {
                $submitButton.prop("disabled", false);
            },
        });
    });

    const $vendorChatForm = $("#vendorinChatForm");

    $vendorChatForm.on("submit", function (e) {
        e.preventDefault();

        $submitButton.prop("disabled", true);

        const formData = {
            _token: window.appData.csrfToken,
            vendor_name: $nameInput.val(),
            vendor_country_code: $countrycode.val(),
            vendor_phone: $phoneInput.val(),
            company_logo: image_url,
        };
        $.ajax({
            url: $vendorChatForm.attr("action"),
            method: "POST",
            data: formData,
            success: function (response) {
                if (response.success) {
                    $vendorChatForm
                        .find(
                            'input[type="text"], input[type="number"], select'
                        )
                        .val("");
                    $vendorChatForm
                        .find(".selectpicker")
                        .selectpicker("refresh");
                }
            },

            error: function (xhr) {
                const errors = xhr.responseJSON.message;
                $('#error-messages').html(errors);
            },

            complete: function () {
                $submitButton.prop("disabled", false);
                closePopup();
            },
        });
    });
    // END OF SEA
    $formBtn.on("click", function () {
        $popupOverlay.fadeIn(300).css("display", "flex");
        $("body").css("overflow", "hidden");
    });

    $closeForm.on("click", function () {
        closePopup();
    });

    $popupOverlay.on("click", function (event) {
        if ($(event.target).is($popupOverlay)) {
            closePopup();
        }
    });

    function closePopup() {
        $popupOverlay.fadeOut(300);
        $nameInput.val("");
        $phoneInput.val("");
        $selectVendorContracts.selectpicker("refresh");
        $countrycode.selectpicker("refresh");
        $("body").css("overflow", "");
    }
});
