var drCustomFieldEvent = $('.custom-field-file .dropify').dropify({
    messages: dropifyMessages
});
drCustomFieldEvent.on("dropify.afterClear", function(event, element) {
        var elementName = element.element.name;
        // find the hidden input field and remove the value
        $('input[type=hidden][name="' + elementName + '"]').val('');
});
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views/components/forms/custom-field-filejs.blade.php ENDPATH**/ ?>