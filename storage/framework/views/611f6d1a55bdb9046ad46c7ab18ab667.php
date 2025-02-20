<?php
$content = "<div class='d-flex align-items-center text-left'>
    <div class='taskEmployeeImg border-0 d-inline-block mr-1'>
        <img class='rounded-circle' src='".$vendors->image_url."'>
        
    </div>
    <td> $vendors->vendor_name </td>
    <div>"

?>

    <option data-content="<?php echo $content; ?>" value="<?php echo e($vendors->id); ?>">
        
    </option>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/components/vendor-option.blade.php ENDPATH**/ ?>