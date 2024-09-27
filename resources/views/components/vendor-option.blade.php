@php
$content = "<div class='d-flex align-items-center text-left'>
    <div class='taskEmployeeImg border-0 d-inline-block mr-1'>
        <img class='rounded-circle' src='".$vendors->image_url."'>
        
    </div>
    <td> $vendors->vendor_name </td>
    <div>"

@endphp

    <option data-content="{!! $content !!}" value="{{ $vendors->id }}">
        
    </option>
