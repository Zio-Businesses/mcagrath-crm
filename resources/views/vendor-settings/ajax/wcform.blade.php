
<div class="col-lg-12 col-md-12 ntfcn-tab-content-left w-100 p-4 d-flex">
    <div class="col-md-6">
        <x-forms.select fieldId="contract_id"
            :fieldLabel="__('Select WC Waiver Form Template')" fieldName="contract_id" search="true" fieldRequired="true">
                <option value="">--</option>
                @foreach ($contract as $category)
                    <option value="{{ $category->id }}" @if($wform){{ $wform->waiver_template === $category->contract_detail ? 'selected' : '' }}@endif>
                        {{ $category->subject }} 
                    </option>
                @endforeach
        </x-forms.select>
    </div>
    @php
        $selectedVendorStatus = $vendor_status->vendor_status ?? [];
    @endphp
    
    <div class="col-md-6">
        <x-forms.select fieldId="vendor_status"
            :fieldLabel="__('Select Vendor Status For Work Order')" fieldName="vendor_status[]" search="true" fieldRequired="true" multiple>
                <option value="">--</option>
                <option value="Active" {{ in_array('Active', $selectedVendorStatus) ? 'selected' : '' }} data-content='<i class="fa fa-circle mr-2" style="color:#00b5ff;"></i>Active'>
                <option  value="Compliant" {{ in_array('Compliant', $selectedVendorStatus) ? 'selected' : '' }} data-content='<i class="fa fa-circle mr-2" style="color:#679c0d;"></i>Compliant'>
                <option  value="Snooze" {{ in_array('Snooze', $selectedVendorStatus) ? 'selected' : '' }} data-content='<i class="fa fa-circle mr-2" style="color:#FFA500;"></i>Snooze'>
                <option  value="Non Compliant" {{ in_array('Non Compliant', $selectedVendorStatus) ? 'selected' : '' }} data-content='<i class="fa fa-circle mr-2" style="color:#FFFF00;"></i>Non Compliant'>
                <option  value="DNU" {{ in_array('DNU', $selectedVendorStatus) ? 'selected' : '' }} data-content='<i class="fa fa-circle mr-2" style="color:#FF0000;"></i>DNU'>
                <option  value="On Hold" {{ in_array('On Hold', $selectedVendorStatus) ? 'selected' : '' }} data-content='<i class="fa fa-circle mr-2" style="color:#808080;"></i>On Hold'>
        </x-forms.select>
    </div>
</div>


<script>
 $(document).ready(function() {
    $('#contract_id').change(function() {
        var select = $(this).val();
        var url="{{ route('vendor-settings.store') }}";
        $.easyAjax({
                url: url,
                type: 'POST',
                blockUI: true,
                data: {
                        _token: '{{ csrf_token() }}',
                        value: select,
                    },
                success: function(response) {
                    if (response.status == 'success') {
                        window.location.reload();
                    } 
                },
            });
    });
    $('#vendor_status').change(function() {
        var select = $(this).val();
        var url="{{ route('vendor-work-status.store') }}";
        $.easyAjax({
                url: url,
                type: 'POST',
                blockUI: true,
                data: {
                        _token: '{{ csrf_token() }}',
                        value: select,
                    },
                success: function(response) {
                    if (response.status == 'success') {
                        window.location.reload();
                    } 
                },
            });
    });
});
</script>

