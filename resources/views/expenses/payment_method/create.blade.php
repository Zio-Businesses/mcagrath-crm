@php
    $deleteExpenseCategoryPermission = user()->permission('manage_expense_category');
@endphp

<div class="modal-header">
    <h5 class="modal-title" id="modelHeading">@lang('Expense Payment Method')</h5>
    <button type="button"  class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">×</span></button>
</div>
<div class="modal-body">
    <x-table class="table-bordered" headType="thead-light">
        <x-slot name="thead">
            <th>#</th>
            <th>@lang('Payment Method')</th>
            <th class="text-right">@lang('app.action')</th>
        </x-slot>

        @forelse($payment_method as $key=>$item)
            <tr id="row-{{ $item->id }}">
                <td>{{ $key + 1 }}</td>
                <td data-row-id="{{ $item->id }}" contenteditable="true">{{ $item->payment_method }}</td>
                <td class="text-right">
                    @if ($deleteExpenseCategoryPermission == 'all' || ($deleteExpenseCategoryPermission == 'added' && $item->added_by == user()->id))
                        <x-forms.button-secondary data-row-id="{{ $item->id }}" icon="trash" class="delete-row">
                            @lang('app.delete')</x-forms.button-secondary>
                    @endif
                </td>
            </tr>
        @empty
            <x-cards.no-record-found-list colspan="4" />

        @endforelse
    </x-table>

    <x-form id="createProjectPayment">
        <div class="row border-top-grey ">
            <div class="col-sm-12">
                <x-forms.text fieldId="payment_method" :fieldLabel="__('Payment Method')" fieldName="payment_method"
                    fieldRequired="true" :fieldPlaceholder="__('Enter a payment method')">
                </x-forms.text>
            </div>
        </div>
    </x-form>
</div>
<div class="modal-footer">
    <x-forms.button-cancel data-dismiss="modal" class="border-0 mr-3">@lang('app.close')</x-forms.button-cancel>
    <x-forms.button-primary id="save-payment" icon="check">@lang('app.save')</x-forms.button-primary>
</div>

<script>
    $(".select-picker").selectpicker();

    $('.delete-row').click(function() {

        var id = $(this).data('row-id');
        var url = "{{ route('expenseCategory.destroy', ':id') }}";
        url = url.replace(':id', id);

        var token = "{{ csrf_token() }}";

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
                $.easyAjax({
                    type: 'POST',
                    url: url,
                    data: {
                        '_token': token,
                        '_method': 'DELETE'
                    },
                    success: function(response) {
                        if (response.status == "success") {
                            $('#row-' + id).fadeOut();
                            $('#expense_category_id').html(response.data);
                            $('#expense_category_id').selectpicker('refresh');
                        }
                    }
                });
            }
        });

    });

    $('#save-payment').click(function() {
        var url = "{{ route('expensePaymentMethod.store') }}";
        $.easyAjax({
            url: url,
            container: '#createProjectPayment',
            type: "POST",
            data: $('#createProjectPayment').serialize(),
            disableButton: true,
            blockUI: true,
            buttonSelector: "#save-payment",
            success: function(response) {
                if (response.status == 'success') {
                    if (response.status == 'success') {
                        $('#payment_method_id').html(response.data);
                        $('#payment_method_id').selectpicker('refresh');
                        $(MODAL_LG).modal('hide');
                    }
                }
            }
        })
    });


    $('[contenteditable=true]').focus(function() {
        $(this).data("initialText", $(this).html());
        let rowId = $(this).data('row-id');
    }).blur(function() {
        // ...if content is different...
        if ($(this).data("initialText") !== $(this).html()) {
            let id = $(this).data('row-id');
            let value = $(this).html();

            var url = "{{ route('expenseCategory.update', ':id') }}";
            url = url.replace(':id', id);

            var token = "{{ csrf_token() }}";

            $.easyAjax({
                url: url,
                container: '#row-' + id,
                type: "POST",
                data: {
                    'category_name': value,
                    '_token': token,
                    '_method': 'PUT'
                },
                blockUI: true,
                success: function(response) {
                    if (response.status == 'success') {
                        $('#expense_category_id').html(response.data);
                        $('#expense_category_id').selectpicker('refresh');
                    }
                }
            })
        }
    });


</script>
