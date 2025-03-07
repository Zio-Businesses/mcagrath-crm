
<style>
.modal{
    z-index: 1055; /* Ensures the modal is above other elements */
}
.modal-backdrop {
    z-index: 0; /* Ensures the backdrop is below the modal but above other elements */
}

</style>
<div class="row">
    <div class="col-sm-12">
        <div class="col-lg-12" style="margin-bottom:4rem;">
            <x-forms.button-primary id="add-notes" class="float-right" icon="plus">@lang('Add Notes')
            </x-forms.button-primary>
        </div>
        <div class="mt-5 row">

            @foreach($note as $notes)
            <div class="col-lg-2 col-md-2 mt-2 ml-2 rounded" style="background-color: white;">
                <h4 class="mb-0 p-2 f-21 font-weight-normal text-capitalize border-bottom-grey">{{$notes->notes_title}}</h4>
                <p class="mt-3 px-2 pt-2 border-bottom-grey">
                    <span class="note-preview ">
                        {{ Str::limit($notes->notes_content, 10, '...') }}
                    </span>
                </p>
                <a href="javascript:;"  class="show-more float-right"  data-fullnote="{{ $notes->notes_content }}" data-createdby="{{$notes->created_by}}" data-createdat="{{$notes->created_at->format(company()->date_format)}}" data-title="{{$notes->notes_title}}">
                    <i class="fa fa-ellipsis-h"></i>
                </a>
            </div>   
            @endforeach   
            @if($vendor->notes_title)
                <div class="col-lg-2 col-md-2 mt-2 ml-2 rounded" style="background-color: white;">
                    <h4 class="mb-0 p-2 f-21 font-weight-normal text-capitalize border-bottom-grey">{{$vendor->notes_title}}</h4>
                    <p class="mt-3 px-2 pt-2 border-bottom-grey">
                        <span class="note-preview ">
                            {{ Str::limit($vendor->notes, 10, '...') }}
                        </span>
                    </p>
                    <a href="javascript:;"  class="show-more float-right"  data-fullnote="{{ $vendor->notes }}" data-createdby="{{ $vendor->created_by }}" data-createdat="{{$vendor->created_at->format(company()->date_format)}}" data-title="{{$vendor->notes_title}}">
                        <i class="fa fa-ellipsis-h"></i>
                    </a>
                </div>   
            @endif    
        </div>
    </div>
</div>
<div class="modal modal-note fade" id="noteModal" tabindex="-1" aria-labelledby="noteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-capitalize" id="noteModalLabel"></h5>
                <button type="button" class="btn-close bg-white" id="modal-close"><i class="fa fa-times"></i></button>
            </div>
            <div class="modal-body">
                <p id="fullNoteText" class=" border-bottom-grey pb-2"></p>
                <p id="createdbyname"></p>
                <p id="createdat"></p>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        init(RIGHT_MODAL);
        var showMoreLinks = document.querySelectorAll('.show-more');

        showMoreLinks.forEach(function(link) {
            link.addEventListener('click', function() {
                var fullNote = this.getAttribute('data-fullnote');
                var createdby = this.getAttribute('data-createdby');
                var createdat = this.getAttribute('data-createdat');
                var title = this.getAttribute('data-title');
                document.getElementById('fullNoteText').textContent = fullNote;
                document.getElementById('createdbyname').textContent = createdby;
                document.getElementById('createdat').textContent = createdat;
                document.getElementById('noteModalLabel').textContent = title;
                $('#noteModal').modal('show');
            });
        });
    });

    $('#add-notes').click(function () {
        var url = "{{ route('vendortrack.notescreate', ':id') }}";
        url = url.replace(':id', "{{$vendor->id}}");
        $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
        $.ajaxModal(MODAL_LG, url);
    });

    $('#modal-close').click(function (){
        $('#noteModal').modal('hide');
    })
    
</script>
