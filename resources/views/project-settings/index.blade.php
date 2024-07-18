@extends('layouts.app')

@section('content')

    <!-- SETTINGS START -->
    <div class="w-100 d-flex ">

        @include('sections.setting-sidebar')

        <x-setting-card>
            <x-slot name="header">
                <div class="s-b-n-header" id="tabs">
                    <nav class="tabs px-4 border-bottom-grey">
                        <div class="nav" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link f-15 active sendReminder"
                               href="{{ route('project-settings.index') }}" role="tab"
                               aria-controls="nav-sendReminder" aria-selected="true">@lang($pageTitle)
                            </a>

                            <a class="nav-item nav-link f-15 status"
                               href="{{ route('project-settings.index') }}?tab=status" role="tab"
                               aria-controls="nav-status"
                               aria-selected="true">@lang('modules.projects.projectStatusSettings')
                            </a>

                            <a class="nav-item nav-link f-15 category"
                               href="{{ route('project-settings.index') }}?tab=category" role="tab"
                               aria-controls="nav-category"
                               aria-selected="true">@lang('modules.projects.projectCategory')
                            </a>

                            <a class="nav-item nav-link f-15 sub-category"
                               href="{{ route('project-settings.index') }}?tab=sub-category" role="tab"
                               aria-controls="nav-sub-category"
                               aria-selected="true">@lang('modules.projects.projectsubcategory')
                            </a>

                        </div>
                    </nav>
                </div>
            </x-slot>

            <x-slot name="buttons">
                <div class="row">

                    <div class="col-md-12 mb-2">

                        <x-forms.button-primary icon="plus" id="add-status" class="status-btn mb-2 actionBtn d-none">
                            @lang('modules.statusFields.addstatus')
                        </x-forms.button-primary>

                        <x-forms.button-primary icon="plus" id="addProjectCategory"
                                    class="category-btn d-none mb-2 actionBtn"> @lang('modules.statusFields.addCategory')
                        </x-forms.button-primary>

                        <x-forms.button-primary icon="plus" id="addProjectSubCategory"
                                    class="sub-category-btn d-none mb-2 actionBtn"> @lang('Add Sub-Category')
                        </x-forms.button-primary>
                        <x-forms.button-secondary icon="file-upload" id="importProjectSubCategory"
                                    class="sub-category-btn d-none mb-2 actionBtn ml-2"> @lang('Import')
                        </x-forms.button-secondary>
                        <x-forms.button-secondary id="exportProjectSubCategory"
                                    class="sub-category-btn d-none mb-2 actionBtn ml-2"><i class="fa fa-file-export"></i> @lang('Export')
                        </x-forms.button-secondary>
                    </div>

                </div>
            </x-slot>

            @include($view)

        </x-setting-card>

    </div>
    <!-- SETTINGS END -->
@endsection

@push('scripts')
    <script>

        $('.nav-item').removeClass('active');
        const activeTab = "{{ $activeTab }}";
        $('.' + activeTab).addClass('active');

        $("body").on("click", "#editSettings .nav a", function(event) {
            event.preventDefault();

            $('.nav-item').removeClass('active');
            $(this).addClass('active');

            const requestUrl = this.href;
            $.easyAjax({
                url: requestUrl,
                blockUI: true,
                container: "#nav-tabContent",
                historyPush: true,
                success: function(response) {
                    showBtn(response.activeTab);
                    if (response.status == "success") {
                        $('#nav-tabContent').html(response.html);
                        init('#nav-tabContent');
                    }
                }
            });
        });

        function showBtn(activeTab) {
            $('.actionBtn').addClass('d-none');
            $('.' + activeTab + '-btn').removeClass('d-none');
        }

        showBtn(activeTab);
    </script>
@endpush
