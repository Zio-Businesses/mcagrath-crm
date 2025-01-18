<script src="<?php echo e(asset('vendor/jquery/frappe-charts.min.iife.js')); ?>"></script>


<?php
$addBankTransferPermission = user()->permission('add_bank_transfer');
$addBankDepositPermission = user()->permission('add_bank_deposit');
$addBankWithdrawPermission = user()->permission('add_bank_withdraw');
?>

<!-- ROW START -->
<div class="row pb-5">

    <div class="col-lg-7">
        <?php if (isset($component)) { $__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9 = $attributes; } ?>
<?php $component = App\View\Components\Cards\Data::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Data::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mb-4']); ?>
            <div class="d-flex justify-content-between">
                <div class="d-flex">
                    <?php
                        $bankLogo = $bankaccount->bank_logo ? '<img data-toggle="tooltip" src="' . $bankaccount->file_url . '" class="width-35 height-35 img-fluid">' : '<span class="f-27">'.$bankaccount->file_url .'</span>';
                    ?>
                    <?php echo $bankLogo; ?>


                    <div class="ml-2">
                        <?php if($bankaccount->bank_name != ''): ?>
                            <h3 class="heading-h3"><?php echo e($bankaccount->bank_name); ?></h3>
                            <p class="f-12 font-weight-normal text-dark-grey mb-0">
                                <?php echo e($bankaccount->account_name); ?> &bull; <?php echo e(__('modules.bankaccount.'.$bankaccount->account_type)); ?> &bull; <span class="text-primary font-weight-semibold">#<?php echo e($bankaccount->account_number); ?></span>
                            </p>
                        <?php else: ?>
                           <h3 class="heading-h3"><?php echo e($bankaccount->account_name); ?></h3>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="text-right">
                    <div class="f-12 text-dark-grey"><?php echo app('translator')->get('modules.bankaccount.bankBalance'); ?></div>
                    <h2 class="heading-h2 text-primary mt-2"><?php echo e(currency_format($bankaccount->bank_balance, $bankaccount->currency_id)); ?></h2>
                </div>
            </div>


            <div class="card-footer bg-white border-top-grey px-0 mt-3">
                <div class="d-flex justify-content-between mt-3">
                    <?php if($addBankDepositPermission == 'all'): ?>
                        <?php if (isset($component)) { $__componentOriginal29acd9b76240152ae380821b082bd629 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal29acd9b76240152ae380821b082bd629 = $attributes; } ?>
<?php $component = App\View\Components\Forms\LinkSecondary::resolve(['link' => route('bankaccounts.create_transaction').'?accountId='.$bankaccount->id.'&type=deposit','icon' => 'plus-circle'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.link-secondary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\LinkSecondary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'openRightModal']); ?>
                            <?php echo app('translator')->get('modules.bankaccount.deposit'); ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal29acd9b76240152ae380821b082bd629)): ?>
<?php $attributes = $__attributesOriginal29acd9b76240152ae380821b082bd629; ?>
<?php unset($__attributesOriginal29acd9b76240152ae380821b082bd629); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal29acd9b76240152ae380821b082bd629)): ?>
<?php $component = $__componentOriginal29acd9b76240152ae380821b082bd629; ?>
<?php unset($__componentOriginal29acd9b76240152ae380821b082bd629); ?>
<?php endif; ?>
                    <?php endif; ?>
                    <?php if($addBankWithdrawPermission == 'all'): ?>
                        <?php if (isset($component)) { $__componentOriginal29acd9b76240152ae380821b082bd629 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal29acd9b76240152ae380821b082bd629 = $attributes; } ?>
<?php $component = App\View\Components\Forms\LinkSecondary::resolve(['link' => route('bankaccounts.create_transaction').'?accountId='.$bankaccount->id.'&type=withdraw','icon' => 'minus-circle'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.link-secondary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\LinkSecondary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'openRightModal']); ?>
                            <?php echo app('translator')->get('modules.bankaccount.withdraw'); ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal29acd9b76240152ae380821b082bd629)): ?>
<?php $attributes = $__attributesOriginal29acd9b76240152ae380821b082bd629; ?>
<?php unset($__attributesOriginal29acd9b76240152ae380821b082bd629); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal29acd9b76240152ae380821b082bd629)): ?>
<?php $component = $__componentOriginal29acd9b76240152ae380821b082bd629; ?>
<?php unset($__componentOriginal29acd9b76240152ae380821b082bd629); ?>
<?php endif; ?>
                    <?php endif; ?>
                    <?php if($addBankTransferPermission == 'all'): ?>
                        <?php if (isset($component)) { $__componentOriginal29acd9b76240152ae380821b082bd629 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal29acd9b76240152ae380821b082bd629 = $attributes; } ?>
<?php $component = App\View\Components\Forms\LinkSecondary::resolve(['link' => route('bankaccounts.create_transaction').'?accountId='.$bankaccount->id.'&type=account','icon' => 'exchange-alt'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.link-secondary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\LinkSecondary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'openRightModal']); ?>
                            <?php echo app('translator')->get('modules.bankaccount.bankAccountTransfer'); ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal29acd9b76240152ae380821b082bd629)): ?>
<?php $attributes = $__attributesOriginal29acd9b76240152ae380821b082bd629; ?>
<?php unset($__attributesOriginal29acd9b76240152ae380821b082bd629); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal29acd9b76240152ae380821b082bd629)): ?>
<?php $component = $__componentOriginal29acd9b76240152ae380821b082bd629; ?>
<?php unset($__componentOriginal29acd9b76240152ae380821b082bd629); ?>
<?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>

         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9)): ?>
<?php $attributes = $__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9; ?>
<?php unset($__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9)): ?>
<?php $component = $__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9; ?>
<?php unset($__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9); ?>
<?php endif; ?>

        <?php if (isset($component)) { $__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9 = $attributes; } ?>
<?php $component = App\View\Components\Cards\Data::resolve(['title' => __('modules.bankaccount.creditVsDebit')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Data::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
            <?php if (isset($component)) { $__componentOriginale9ccd694a97cd317c729537be76f531b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale9ccd694a97cd317c729537be76f531b = $attributes; } ?>
<?php $component = App\View\Components\LineChart::resolve(['chartData' => $creditVsDebitChart,'multiple' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('line-chart'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\LineChart::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'task-chart5','height' => '250']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale9ccd694a97cd317c729537be76f531b)): ?>
<?php $attributes = $__attributesOriginale9ccd694a97cd317c729537be76f531b; ?>
<?php unset($__attributesOriginale9ccd694a97cd317c729537be76f531b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale9ccd694a97cd317c729537be76f531b)): ?>
<?php $component = $__componentOriginale9ccd694a97cd317c729537be76f531b; ?>
<?php unset($__componentOriginale9ccd694a97cd317c729537be76f531b); ?>
<?php endif; ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9)): ?>
<?php $attributes = $__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9; ?>
<?php unset($__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9)): ?>
<?php $component = $__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9; ?>
<?php unset($__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9); ?>
<?php endif; ?>

    </div>

    <div class="col-lg-5">
        <?php if (isset($component)) { $__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9 = $attributes; } ?>
<?php $component = App\View\Components\Cards\Data::resolve(['title' => __('modules.bankaccount.recentTransactions'),'padding' => 'false'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Data::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'table-hover']); ?>
            <?php if (isset($component)) { $__componentOriginal7d9f6e0b9001f5841f72577781b2d17f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7d9f6e0b9001f5841f72577781b2d17f = $attributes; } ?>
<?php $component = App\View\Components\Table::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Table::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                 <?php $__env->slot('thead', null, []); ?> 
                    <th>#</th>
                    <th><?php echo app('translator')->get('app.title'); ?></th>
                    <th><?php echo app('translator')->get('app.date'); ?></th>
                    <th class="text-right pr-20"><?php echo app('translator')->get('app.amount'); ?></th>
                 <?php $__env->endSlot(); ?>
                <?php $__empty_1 = true; $__currentLoopData = $recentTransactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td class="pl-20">
                            <?php echo e(($key+1)); ?>

                        </td>
                        <td>
                            <?php echo app('translator')->get('modules.bankaccount.'.$item->title); ?>
                        </td>
                        <td><?php echo e($item->transaction_date->translatedFormat(company()->date_format)); ?></td>
                        <td class="pr-20 text-right">
                            <span class="<?php echo \Illuminate\Support\Arr::toCssClasses(['text-success' => $item->type == 'Cr', 'text-danger' => $item->type == 'Dr']); ?>"> <?php echo e(($item->type == 'Cr' ? '+' : '-')); ?> <?php echo e(currency_format($item->amount, $bankaccount->currency_id)); ?></span>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="4"></td>
                    </tr>
                <?php endif; ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7d9f6e0b9001f5841f72577781b2d17f)): ?>
<?php $attributes = $__attributesOriginal7d9f6e0b9001f5841f72577781b2d17f; ?>
<?php unset($__attributesOriginal7d9f6e0b9001f5841f72577781b2d17f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7d9f6e0b9001f5841f72577781b2d17f)): ?>
<?php $component = $__componentOriginal7d9f6e0b9001f5841f72577781b2d17f; ?>
<?php unset($__componentOriginal7d9f6e0b9001f5841f72577781b2d17f); ?>
<?php endif; ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9)): ?>
<?php $attributes = $__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9; ?>
<?php unset($__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9)): ?>
<?php $component = $__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9; ?>
<?php unset($__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9); ?>
<?php endif; ?>
    </div>

    <div class="col-lg-12 col-md-12 my-4 mb-xl-0 mb-lg-4">

        <!-- Add Task Export Buttons Start -->
        <div class="d-flex justify-content-between action-bar">
            <?php if (isset($component)) { $__componentOriginalcf8d12533ff890e0d6573daf32b7618d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcf8d12533ff890e0d6573daf32b7618d = $attributes; } ?>
<?php $component = App\View\Components\Forms\ButtonPrimary::resolve(['icon' => 'file-pdf'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'generate_statement','data-account-id' => ''.e($bankaccount->id).'']); ?>
                <?php echo app('translator')->get('modules.bankaccount.generateStatement'); ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcf8d12533ff890e0d6573daf32b7618d)): ?>
<?php $attributes = $__attributesOriginalcf8d12533ff890e0d6573daf32b7618d; ?>
<?php unset($__attributesOriginalcf8d12533ff890e0d6573daf32b7618d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcf8d12533ff890e0d6573daf32b7618d)): ?>
<?php $component = $__componentOriginalcf8d12533ff890e0d6573daf32b7618d; ?>
<?php unset($__componentOriginalcf8d12533ff890e0d6573daf32b7618d); ?>
<?php endif; ?>
        </div>
        <!-- Add Task Export Buttons End -->

        <div class="d-flex flex-column w-tables rounded bg-white mt-4">

            <?php echo $dataTable->table(['class' => 'table table-hover border-0 w-100']); ?>


        </div>


    </div>
</div>

<?php echo $__env->make('sections.datatable_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script>
    $('#bank-transaction-table').on('preXhr.dt', function(e, settings, data) {

        var bankId = "<?php echo e($bankaccount->id); ?>";
        data['bankId'] = bankId;

        // var dateRangePicker = $('#datatableRange').data('daterangepicker');
        // var startDate = $('#datatableRange').val();

        // if (startDate == '') {
        //     startDate = null;
        //     endDate = null;
        // } else {
        //     startDate = dateRangePicker.startDate.format('<?php echo e(company()->moment_date_format); ?>');
        //     endDate = dateRangePicker.endDate.format('<?php echo e(company()->moment_date_format); ?>');
        // }

        // var searchText = $('#search-text-field').val();

        // data['startDate'] = startDate;
        // data['endDate'] = endDate;
        // data['searchText'] = searchText;
    });
    const showTable = () => {
        window.LaravelDataTables["bank-transaction-table"].draw();
    }

    $('#search-text-field').on('change keyup', function() {
        if ($('#search-text-field').val() != "") {
            $('#reset-filters').removeClass('d-none');
            showTable();
        } else {
            $('#reset-filters').addClass('d-none');
            showTable();
        }
    });

    $('#reset-filters').click(function() {
        $('#filter-form')[0].reset();
        $('.select-picker').val('all');

        $('.select-picker').selectpicker("refresh");
        $('#reset-filters').addClass('d-none');

        showTable();
    });

    $('#quick-action-type').change(function() {
        const actionValue = $(this).val();
        if (actionValue != '') {
            $('#quick-action-apply').removeAttr('disabled');
        } else {
            $('#quick-action-apply').attr('disabled', true);
        }
    });

    $('#quick-action-apply').click(function() {
        const actionValue = $('#quick-action-type').val();
        if (actionValue == 'delete') {
            Swal.fire({
                title: "<?php echo app('translator')->get('messages.sweetAlertTitle'); ?>",
                text: "<?php echo app('translator')->get('messages.recoverRecord'); ?>",
                icon: 'warning',
                showCancelButton: true,
                focusConfirm: false,
                confirmButtonText: "<?php echo app('translator')->get('messages.confirmDelete'); ?>",
                cancelButtonText: "<?php echo app('translator')->get('app.cancel'); ?>",
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
                    applyQuickAction();
                }
            });

        } else {
            applyQuickAction();
        }
    });

    const applyQuickAction = () => {
        var rowdIds = $("#bank-transaction-table input:checkbox:checked").map(function() {
            return $(this).val();
        }).get();

        var url = "<?php echo e(route('bankaccounts.apply_transaction_quick_action')); ?>?row_ids=" + rowdIds;

        $.easyAjax({
            url: url,
            container: '#quick-action-form',
            type: "POST",
            disableButton: true,
            buttonSelector: "#quick-action-apply",
            data: $('#quick-action-form').serialize(),
            success: function(response) {
                if (response.status == 'success') {
                    showTable();
                    resetActionButtons();
                    deSelectAll();
                }
            }
        })
    };

    $('body').on('click', '.delete-table-row', function() {
        var id = $(this).data('user-id');
        Swal.fire({
            title: "<?php echo app('translator')->get('messages.sweetAlertTitle'); ?>",
            text: "<?php echo app('translator')->get('messages.recoverRecord'); ?>",
            icon: 'warning',
            showCancelButton: true,
            focusConfirm: false,
            confirmButtonText: "<?php echo app('translator')->get('messages.confirmDelete'); ?>",
            cancelButtonText: "<?php echo app('translator')->get('app.cancel'); ?>",
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
                var url = "<?php echo e(route('bankaccounts.destroy_transaction')); ?>";
                url = url.replace(':id', id);

                var token = "<?php echo e(csrf_token()); ?>";

                $.easyAjax({
                    type: 'POST',
                    url: url,
                    data: {
                        '_token': token,
                        'transactionId': id
                    },
                    success: function(response) {
                        if (response.status == "success") {
                            showTable();
                        }
                    }
                });
            }
        });
    });

    $('#generate_statement').click(function () {
        let accountId = $(this).data('account-id');
        var url = "<?php echo e(route('bankaccounts.generate_statement', [':id'])); ?>";
        url = url.replace(':id', accountId);

        $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
        $.ajaxModal(MODAL_LG, url);
    });
</script>
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\bank-account\bank-transaction.blade.php ENDPATH**/ ?>