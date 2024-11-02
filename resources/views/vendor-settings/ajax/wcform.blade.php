
<div class="col-lg-12 col-md-12 ntfcn-tab-content-left w-100 p-4">
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
});
</script>

