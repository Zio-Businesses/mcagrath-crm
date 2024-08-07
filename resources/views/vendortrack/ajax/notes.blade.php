

<div class="row">
    <div class="col-sm-12">
        <div class="col-lg-12" style="margin-bottom:4rem;">
            <x-forms.button-primary id="add-notes" class="float-right" icon="plus">@lang('Add Notes')
            </x-forms.button-primary>
        </div>
        <div class="mt-5">

            @foreach($note as $notes)
            <div class="col-lg-12 col-md-6 mt-2 rounded" style="background-color: white;">
                <div class="d-flex">
                    <div class="col-lg-9 border-right-grey">
                        <h4 class="mb-0 p-2 f-21 font-weight-normal text-capitalize border-bottom-grey">
                            {{$notes->notes_title}}</h4>
                            <p class="mt-3 p-2">{{$notes->notes_content}}</p>
                    </div>
                    <div class="col-lg-3 mt-4">
                     Created By: <p>{{$notes->created_by}}</p>
                     Created At: <p>{{$notes->created_at->format(company()->date_format)}}</p>
                    </div>
                </div>
            </div>   
            @endforeach       
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        init(RIGHT_MODAL);
    });
    $('#add-notes').click(function () {
        var url = "{{ route('vendortrack.notescreate', ':id') }}";
        url = url.replace(':id', "{{$vendor->id}}");
        $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
        $.ajaxModal(MODAL_LG, url);
    });

   
</script>
