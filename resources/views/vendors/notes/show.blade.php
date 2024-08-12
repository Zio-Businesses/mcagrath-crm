<div class="row">
    <div class="col-sm-12">
        <x-cards.data :title="__('app.project').' '.__('app.note').' '.__('app.details')" class=" mt-4">
            <x-cards.data-row :label="__('modules.client.noteTitle')"
                :value="$note->notes_title" />

            <x-cards.data-row :label="__('modules.client.noteDetail')" html="true" :value="$note->notes_content" />

        </x-cards.data>
    </div>
</div>
