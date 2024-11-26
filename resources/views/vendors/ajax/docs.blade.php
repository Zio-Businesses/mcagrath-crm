<link rel="stylesheet" href="{{ asset('vendor/css/dropzone.min.css') }}">

<!-- TAB CONTENT START -->
<div class="col-xl-12 col-lg-12 col-md-12" id="documents">
    <div class="row p-2">
        <div class="col-xl-6 col-lg-6 col-md-6 ml-0 p-2 ">
            <x-form id="save-contractor-license">
            <div class="border-grey d-xl-flex">
                <div class="col ml-0 px-0">
                    <input type="file" class="dropify mr-0 mr-lg-2 mr-md-2 w-100" id="contractor_license" name="contractor_license" />
                </div>
                <div class="col ml-2 mt-3">
                    <div class="dropdown ml-auto d-flex a">
                        <p class="f-14 font-weight-bold" style="width:90%;">Contractor License</p>
                        <button
                            class="btn btn-lg f-14 p-0 text-lightest text-capitalize rounded  dropdown-toggle mb-2"
                            type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width:10%;">
                            <i class="fa fa-ellipsis-h"></i>
                        </button>
                        
                        <div class="dropdown-menu dropdown-menu-right border-grey rounded b-shadow-4 p-0"
                            aria-labelledby="dropdownMenuLink" tabindex="0">
                            <a class="cursor-pointer d-block text-dark-grey f-13 pt-3 px-3 "
                                    target="_blank"
                                    >@lang('app.view')</a>
                            <a class="cursor-pointer d-block text-dark-grey f-13 pt-3 px-3 edit-file"
                                
                                href="javascript:;">@lang('Edit')</a>
                            <a class="cursor-pointer d-block text-dark-grey f-13 py-3 px-3 "
                                href="">@lang('app.download')</a>
                            <a class="cursor-pointer d-block text-dark-grey f-13 pb-3 px-3 delete-file"
                                
                                href="javascript:;">@lang('app.delete')</a>
                        </div>
                    </div>
                    <x-cards.data-row-mod :label="__('modules.employees.fullName')" :value="user()->id" />
                    <x-cards.data-row-mod :label="__('modules.employees.fullName')" :value="user()->id" />
                    <x-cards.data-row-mod :label="__('modules.employees.fullName')" :value="user()->id" />
                </div>
            </div>
            </x-form>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 ml-0 p-2 ">
            <x-form id="save-buisness-license">
            <div class="border-grey d-xl-flex">
                <div class="col ml-0 px-0">
                    <input type="file" class="dropify mr-0 mr-lg-2 mr-md-2 w-100" id="buisness_license" name="buisness_license" />
                </div>
                <div class="col ml-2 mt-4">
                    <div class="dropdown ml-auto d-flex ">
                        <p class="f-14 font-weight-bold" style="width:90%;">Buisness License</p>
                        <button
                            class="btn btn-lg f-14 p-0 text-lightest text-capitalize rounded  dropdown-toggle mb-2"
                            type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width:10%;">
                            <i class="fa fa-ellipsis-h"></i>
                        </button>
                        
                        <div class="dropdown-menu dropdown-menu-right border-grey rounded b-shadow-4 p-0"
                            aria-labelledby="dropdownMenuLink" tabindex="0">
                            <a class="cursor-pointer d-block text-dark-grey f-13 pt-3 px-3 "
                                    target="_blank"
                                    >@lang('app.view')</a>
                            <a class="cursor-pointer d-block text-dark-grey f-13 pt-3 px-3 edit-file"
                                
                                href="javascript:;">@lang('Edit')</a>
                            <a class="cursor-pointer d-block text-dark-grey f-13 py-3 px-3 "
                                href="">@lang('app.download')</a>
                            <a class="cursor-pointer d-block text-dark-grey f-13 pb-3 px-3 delete-file"
                                
                                href="javascript:;">@lang('app.delete')</a>
                        </div>
                    </div>
                    <x-cards.data-row-mod :label="__('modules.employees.fullName')" :value="user()->id" />
                    <x-cards.data-row-mod :label="__('modules.employees.fullName')" :value="user()->id" />
                    <x-cards.data-row-mod :label="__('modules.employees.fullName')" :value="user()->id" />
                </div>
            </div>
            </x-form>
        </div>
        
        <div class="col-xl-6 col-lg-6 col-md-6 ml-0 p-2 ">
            <x-form id="save-coi">
                <div class="border-grey d-xl-flex rounded border">
                    <div class="col ml-0 px-0">
                        <input type="hidden" name ="vendor_id_coi" value="{{$vendorDetail->id}}"/>
                        <input type="file" class="dropify mr-0 mr-lg-2 mr-md-2 w-100" id="coi" name="coi" data-default-file="{{$coi?->filename ? $coi->coi_image_url : null}}"/>
                    </div>
                    <div class="col ml-2 mt-4">
                        <div class="dropdown ml-auto d-flex ">
                            <p class="f-14 font-weight-bold" style="width:90%;">COI</p>
                            @if($coi?->filename)
                            <button
                                class="btn btn-lg f-14 p-0 text-lightest text-capitalize rounded  dropdown-toggle mb-2"
                                type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width:10%;">
                                <i class="fa fa-ellipsis-h"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right border-grey rounded b-shadow-4 p-0"
                                aria-labelledby="dropdownMenuLink" tabindex="0">
                                <a class="cursor-pointer d-block text-dark-grey f-13 pt-3 px-3 "
                                    target="_blank" href="{{ $coi->coi_image_url }}">@lang('app.view')</a>
                                <a class="cursor-pointer d-block text-dark-grey f-13 pt-3 px-3 edit-coi"
                                    data-row-id="{{ $coi->id }}"
                                    href="javascript:;">@lang('Edit')</a>
                                <a class="cursor-pointer d-block text-dark-grey f-13 py-3 px-3 "
                                    href="{{ route('vendor-coi.download', md5($coi->id)) }}">@lang('app.download')</a>
                                <a class="cursor-pointer d-block text-dark-grey f-13 pb-3 px-3 delete-coi" 
                                    data-row-id="{{ $coi->id }}"
                                    href="javascript:;">@lang('app.delete')</a>
                            </div>
                            @endif
                        </div>
                        <x-cards.data-row-mod :label="__('Expiry Date')" :value="$coi && $coi->expiry_date ? $coi->expiry_date->translatedFormat(company()->date_format) : ''" />
                        <x-cards.data-row-mod :label="__('Added By')" :value="$coi->added->name??''" />
                        <x-cards.data-row-mod :label="__('Added Date')" :value="$coi && $coi->created_at ? $coi->created_at->translatedFormat(company()->date_format) : ''" />
                    </div>
                </div>
            </x-form>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 ml-0 p-2 ">
            <x-form id="save-wcomp">
            <div class="border-grey d-xl-flex">
                <div class="col ml-0 px-0">
                
                    <input type="file" class="dropify mr-0 mr-lg-2 mr-md-2 w-100" id="wcomp" name="wcomp" />
               
                </div>
                <div class="col ml-2 mt-4">
                    <div class="dropdown ml-auto d-flex a">
                        <p class="f-14 font-weight-bold" style="width:90%;">Workers Comp</p>
                        <button
                            class="btn btn-lg f-14 p-0 text-lightest text-capitalize rounded  dropdown-toggle mb-2"
                            type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width:10%;">
                            <i class="fa fa-ellipsis-h"></i>
                        </button>
                        
                        <div class="dropdown-menu dropdown-menu-right border-grey rounded b-shadow-4 p-0"
                            aria-labelledby="dropdownMenuLink" tabindex="0">
                            <a class="cursor-pointer d-block text-dark-grey f-13 pt-3 px-3 "
                                    target="_blank"
                                    >@lang('app.view')</a>
                            <a class="cursor-pointer d-block text-dark-grey f-13 pt-3 px-3 edit-file"
                                
                                href="javascript:;">@lang('Edit')</a>
                            <a class="cursor-pointer d-block text-dark-grey f-13 py-3 px-3 "
                                href="">@lang('app.download')</a>
                            <a class="cursor-pointer d-block text-dark-grey f-13 pb-3 px-3 delete-file"
                                
                                href="javascript:;">@lang('app.delete')</a>
                        </div>
                    </div>
                    <x-cards.data-row-mod :label="__('modules.employees.fullName')" :value="user()->id" />
                    <x-cards.data-row-mod :label="__('modules.employees.fullName')" :value="user()->id" />
                    <x-cards.data-row-mod :label="__('modules.employees.fullName')" :value="user()->id" />
                </div>
            </div>
            </x-form>
        </div>
        
    </div>
    <div class="row p-2">
        
        <div class="col-xl-6 col-lg-6 col-md-6 ml-0 p-2 ">
            <x-form id="save-wnine">
            <div class="border-grey d-xl-flex">
                <div class="col ml-0 px-0">
                
                    <input type="file" class="dropify mr-0 mr-lg-2 mr-md-2 w-100" id="wnine" name="wnine" />
                
                </div>
                <div class="col ml-2 mt-4">
                    <div class="dropdown ml-auto d-flex a">
                        <p class="f-14 font-weight-bold" style="width:90%;">W9</p>
                        <button
                            class="btn btn-lg f-14 p-0 text-lightest text-capitalize rounded  dropdown-toggle mb-2"
                            type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width:10%;">
                            <i class="fa fa-ellipsis-h"></i>
                        </button>
                        
                        <div class="dropdown-menu dropdown-menu-right border-grey rounded b-shadow-4 p-0"
                            aria-labelledby="dropdownMenuLink" tabindex="0">
                            <a class="cursor-pointer d-block text-dark-grey f-13 pt-3 px-3 "
                                    target="_blank"
                                    >@lang('app.view')</a>
                            <a class="cursor-pointer d-block text-dark-grey f-13 pt-3 px-3 edit-file"
                                
                                href="javascript:;">@lang('Edit')</a>
                            <a class="cursor-pointer d-block text-dark-grey f-13 py-3 px-3 "
                                href="">@lang('app.download')</a>
                            <a class="cursor-pointer d-block text-dark-grey f-13 pb-3 px-3 delete-file"
                                
                                href="javascript:;">@lang('app.delete')</a>
                        </div>
                    </div>
                    <x-cards.data-row-mod :label="__('modules.employees.fullName')" :value="user()->id" />
                    <x-cards.data-row-mod :label="__('modules.employees.fullName')" :value="user()->id" />
                    <x-cards.data-row-mod :label="__('modules.employees.fullName')" :value="user()->id" />
                </div>
            </div>
            </x-form>
        </div>
    </div>
</div>
<div class="tab-pane fade show active mt-5" role="tabpanel" aria-labelledby="nav-email-tab">
    
    <x-cards.data :title="__('modules.projects.files')">
        <div class="row" id="add-btn">
            <div class="col-md-12">
                <a class="f-15 f-w-500" href="javascript:;" id="add-task-file"><i
                        class="icons icon-plus font-weight-bold mr-1"></i>@lang('modules.projects.uploadFile')</a>
            </div>
        </div>
        <x-form id="save-taskfile-data-form" class="d-none">
            <div class="row">
                <div class="col-md-12">
                    <x-forms.file-multiple :fieldLabel="__('modules.projects.uploadFile')" fieldName="file" fieldId="vendor_file" />
                </div>
                <div class="col-md-12">
                    <div class="w-100 justify-content-end d-flex mt-2">
                        <x-forms.button-cancel id="cancel-taskfile" class="border-0">@lang('app.cancel')
                        </x-forms.button-cancel>
                    </div>
                </div>
            </div>
        </x-form>
      
        <div class="d-flex flex-wrap mt-3" id="task-file-list">
            @forelse($vendorDetail->docs as $file)
                <x-file-card :fileName="$file->filename" :dateAdded="$file->created_at->diffForHumans()">
                    @if ($file->icon == 'images')
                        <img src="{{ $file->file_url }}">
                    @else
                        <i class="fa {{ $file->icon }} text-lightest"></i>
                    @endif
                    <x-slot name="action">
                        <div class="dropdown ml-auto file-action">
                            <button
                                class="btn btn-lg f-14 p-0 text-lightest text-capitalize rounded  dropdown-toggle"
                                type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-ellipsis-h"></i>
                            </button>

                            <div class="dropdown-menu dropdown-menu-right border-grey rounded b-shadow-4 p-0"
                                aria-labelledby="dropdownMenuLink" tabindex="0">
                                <a class="cursor-pointer d-block text-dark-grey f-13 pt-3 px-3 "
                                        target="_blank"
                                        href="{{ $file->file_url }}">@lang('app.view')</a>
                                <a class="cursor-pointer d-block text-dark-grey f-13 pt-3 px-3 rename-file"
                                    data-row-id="{{ $file->id }}"
                                    href="javascript:;">@lang('Rename')</a>
                                <a class="cursor-pointer d-block text-dark-grey f-13 py-3 px-3 "
                                    href="{{ route('vendor-docs.download', md5($file->id)) }}">@lang('app.download')</a>
                                <a class="cursor-pointer d-block text-dark-grey f-13 pb-3 px-3 delete-file"
                                    data-row-id="{{ $file->id }}"
                                    href="javascript:;">@lang('app.delete')</a>
                            </div>
                        </div>
                    </x-slot>
                </x-file-card>
            @empty
                <div class="align-items-center d-flex flex-column text-lightest p-20 w-100">
                    <i class="fa fa-file-excel f-21 w-100"></i>

                    <div class="f-15 mt-4">
                        - @lang('messages.noFileUploaded') -
                    </div>
                </div>
            @endforelse
        </div>
    </x-cards.data>
</div>
<script>
$(document).ready(function() {
    $('.dropify').dropify();
    Dropzone.autoDiscover = false;
    taskDropzone = new Dropzone("#vendor_file", {
        dictDefaultMessage: "{{ __('app.dragDrop') }}",
        url: "{{ route('vendor-docs.store') }}",
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        paramName: "file",
        maxFilesize: DROPZONE_MAX_FILESIZE,
        maxFiles: DROPZONE_MAX_FILES,
        timeout: 0,
        uploadMultiple: true,
        addRemoveLinks: true,
        parallelUploads: DROPZONE_MAX_FILES,
        acceptedFiles: DROPZONE_FILE_ALLOW,
        init: function() {
            taskDropzone = this;
        }
    });
    taskDropzone.on('sending', function(file, xhr, formData) {
        var ids = "{{ $vendorDetail->id }}";
        formData.append('vendor_id', ids);
        $.easyBlockUI();
    });
    taskDropzone.on('uploadprogress', function() {
        $.easyBlockUI();
    });
    taskDropzone.on('completemultiple', function(file) {
        var taskView = JSON.parse(file[0].xhr.response).view;
        taskDropzone.removeAllFiles();
        $.easyUnblockUI();
        $('#task-file-list').html(taskView);
    });
    taskDropzone.on('removedfile', function () {
        var grp = $('div#vendor_file').closest(".form-group");
        var label = $('div#file-upload-box').siblings("label");
        $(grp).removeClass("has-error");
        $(label).removeClass("is-invalid");
    });
    taskDropzone.on('error', function (file, message) {
        taskDropzone.removeFile(file);
        var grp = $('div#vendor_file').closest(".form-group");
        var label = $('div#file-upload-box').siblings("label");
        $(grp).find(".help-block").remove();
        var helpBlockContainer = $(grp);

        if (helpBlockContainer.length == 0) {
            helpBlockContainer = $(grp);
        }

        helpBlockContainer.append('<div class="help-block invalid-feedback">' + message + '</div>');
        $(grp).addClass("has-error");
        $(label).addClass("is-invalid");

    });

    $('#add-task-file').click(function() {
        $(this).closest('.row').addClass('d-none');
        $('#save-taskfile-data-form').removeClass('d-none');
    });

    $('body').on('click', '#cancel-taskfile', function() {
        $('#save-taskfile-data-form').toggleClass('d-none');
        $('#add-btn').toggleClass('d-none');
    });
    $('body').on('click', '.rename-file', function() {

        var id = $(this).data('row-id');
        var url = "{{ route('vendor-docs.edit', ':id') }}";
        url = url.replace(':id', id);
        $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
        $.ajaxModal(MODAL_LG, url);
            
    });
    $('body').on('click', '.delete-file', function() {
        var id = $(this).data('row-id');
        Swal.fire({
            title: "@lang('messages.sweetAlertTitle')",
            text: "@lang('messages.recoverRecord')",
            icon: 'warning',
            showCancelButton: true,
            focusConfirm: false,
            confirmButtonText: "@lang('messages.confirmDelete')",
            cancelButtonText: "@lang('app.cancel')",
            customClass: {
                confirmButton: 'btn btn-primary mr-3',
                cancelButton: 'btn btn-secondary'
            },
            showClass: {
                popup: 'swal2-noanimation',
                backdrop: 'swal2-noanimation'
            },
            buttonsStyling: false
        }).then((result) => {
            if (result.isConfirmed) {
                var url = "{{ route('vendor-docs.destroy', ':id') }}";
                url = url.replace(':id', id);

                var token = "{{ csrf_token() }}";

                $.easyAjax({
                    type: 'POST',
                    url: url,
                    data: {
                        '_token': token,
                        '_method': 'DELETE'
                    },
                    success: function(response) {
                        if (response.status == "success") {
                            $('#task-file-list').html(response.view);
                        }
                    }
                });
            }
        });
    });
    $('#save-coi .dropify').on('change', function (event) {
        if (event.target.files.length > 0) {
            $.easyAjax({
                url: "{{route('vendor-coi.store')}}",
                container: '#save-coi',
                type: "POST",
                file: true,
                disableButton: true,
                blockUI: true,
                data:$('#save-coi').serialize(),
                success: function(response) {
                   window.location.reload();
                }
            });
        }
    });
    $('body').on('click', '.delete-coi', function() {
        var id = $(this).data('row-id');
        Swal.fire({
            title: "@lang('messages.sweetAlertTitle')",
            text: "@lang('messages.recoverRecord')",
            icon: 'warning',
            showCancelButton: true,
            focusConfirm: false,
            confirmButtonText: "@lang('messages.confirmDelete')",
            cancelButtonText: "@lang('app.cancel')",
            customClass: {
                confirmButton: 'btn btn-primary mr-3',
                cancelButton: 'btn btn-secondary'
            },
            showClass: {
                popup: 'swal2-noanimation',
                backdrop: 'swal2-noanimation'
            },
            buttonsStyling: false
        }).then((result) => {
            if (result.isConfirmed) {
                var url = "{{ route('vendor-coi.destroy', ':id') }}";
                url = url.replace(':id', id);
                var token = "{{ csrf_token() }}";
                $.easyAjax({
                    type: 'POST',
                    url: url,
                    data: {
                        '_token': token,
                        '_method': 'DELETE'
                    },
                    success: function(response) {
                        if (response.status == "success") {
                            window.location.reload();
                        }
                    }
                });
            }
        });
    });
    $('body').on('click', '.edit-coi', function() {

        var id = $(this).data('row-id');
        var url = "{{ route('vendor-coi.edit', ':id') }}";
        url = url.replace(':id', id);
        $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
        $.ajaxModal(MODAL_LG, url);
        
    });
    
});

</script>