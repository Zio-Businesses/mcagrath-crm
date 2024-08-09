@extends('layouts.app')

@section('content')

    <!-- SETTINGS START -->
    <div class="w-100 d-flex ">

        @include('sections.setting-sidebar')

        <x-setting-card>

            <x-slot name="buttons">

                <x-alert type="info" icon="info-circle">
                    @lang('messages.defaultAddressInfo')
                </x-alert>

            </x-slot>

            <x-slot name="header">
                <div class="s-b-n-header" id="tabs">
                    <h2 class="mb-0 p-20 f-21 font-weight-normal text-capitalize border-bottom-grey">
                        @lang($pageTitle)</h2>
                </div>
            </x-slot>

            <!-- LEAVE SETTING START -->
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
            <!-- LEAVE SETTING END -->

        </x-setting-card>

    </div>
    <!-- SETTINGS END -->

@endsection

@push('scripts')

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
@endpush
