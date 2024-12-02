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
            $countrycode.val("");
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

                image_url = response.image_url;
            },
            error: function () {
                alert("Failed to fetch vendor details. Please try again.");
            },
            complete: function () {
                $submitButton.prop("disabled", false);
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
