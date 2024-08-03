<div class="table-responsive p-20">
    <x-table class="table-bordered">
        <x-slot name="thead">
            <th>#</th>
            <th width="35%">@lang('Notes Title Name')</th>
            <th class="text-right">@lang('app.action')</th>
        </x-slot>

         @forelse($notesTitle as $key => $category)
            <tr class="row{{ $category->id }}">
                <td>{{ ($key+1) }}</td>
                <td>{{ $category->notes_title }}</td>
                <td class="text-right">
                    <div class="task_view">
                        <a href="javascript:;" data-notes-id="{{ $category->id }}" class="edit-notestitle task_view_more d-flex align-items-center justify-content-center" > <i class="fa fa-edit icons mr-2"></i>  @lang('app.edit')
                        </a>
                    </div>
                    <div class="task_view">
                        <a href="javascript:;" class="delete-notestitle task_view_more d-flex align-items-center justify-content-center" data-notes-id="{{ $category->id }}">
                            <i class="fa fa-trash icons mr-2"></i> @lang('app.delete')
                        </a>
                    </div>
                </td>
            </tr>
        @empty
            <x-cards.no-record-found-list colspan="4"/>
        @endforelse
    </x-table>
</div>
