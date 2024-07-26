<div class="modal-header">
    <h5 class="modal-title" id="modelHeading">@lang('Sow Details')</h5>
    <button type="button"  class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">×</span></button>
</div>
<div class="modal-body bg-additional-grey">
    <x-cards.data>
        <x-cards.data-row :label="__('Sow Title')" :value="$sow->sow_title" />

        <x-cards.data-row :label="__('Project Category')" :value="$sow->category" html="true" />

        <x-cards.data-row :label="__('Project Sub-Category')" :value="$sow->sub_category" html="true" />

        <x-cards.data-row :label="__('Contractor Type')" :value="$sow->contractor_type" />

        <x-cards.data-row :label="__('Added By')" :value="$sow->added->name" />

        <x-cards.data-row :label="__('Added Date')" :value="$sow->created_at->translatedFormat(company()->date_format)" />
        
        <x-cards.data-row :label="__('Description')" :value="$sow->description" html="true" />

    </x-cards.data>
</div>
<div class="modal-footer">
    <x-forms.button-cancel data-dismiss="modal" class="border-0">@lang('app.close')</x-forms.button-cancel>
</div>
