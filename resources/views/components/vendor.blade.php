
<div class="media align-items-center mw-250">
    @if (!is_null($vendor))
        <a href="{{ route('vendors.show', [$vendor->id]) }}" class="position-relative">

            <img src="{{ $vendor->image_url }}" class="mr-2 taskEmployeeImg rounded-circle"
                alt="{{ $vendor->vendor_name }}" title="{{ $vendor->vendor_name }}">
        </a>
        <div class="media-body text-truncate ">
            <h5 class="mb-0 f-12"><a href="{{ route('vendors.show', [$vendor->id]) }}"
                    class="text-darkest-grey">{{ $vendor->vendor_name }} </a>
               
            </h5>
           <td>{{ $vendor->vendor_email }}</td><br/>
           <td>{{ $vendor->cell }}</td>
        </div>
    @else
        --
    @endif
</div>