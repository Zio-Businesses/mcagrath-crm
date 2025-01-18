<?php
    $paymentID = $paymentID;
    $offlineID = $offlineID;
?>

<div class="col-md-12 table-responsive">
    <table width="100%" class="table" id="bulk-data-table">
        <thead lass="thead-light">
            <tr>
                <td class="border-bottom-0 btrr-mbl btlr text-dark"><?php echo app('translator')->get('modules.invoices.invoiceNumber'); ?> #</td>
                <td><?php echo app('translator')->get('modules.payments.paymentDate'); ?><sup class="text-red f-14 mr-1">*</sup></td>
                <td><?php echo app('translator')->get('modules.invoices.paymentMethod'); ?></td>
                <td><?php echo app('translator')->get('modules.payments.offlinePaymentMethod'); ?></td>
                <?php if($linkPaymentPermission == 'all'): ?> <td><?php echo app('translator')->get('app.menu.bankaccount'); ?></td> <?php endif; ?>
                <td><?php echo app('translator')->get('modules.payments.transactionId'); ?></td>
                <td><?php echo app('translator')->get('modules.payments.amountReceived'); ?><sup class="text-red f-14 mr-1">*</sup></td>
                <td><?php echo app('translator')->get('modules.invoices.invoiceBalanceDue'); ?></td>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $pendingPayments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $pendingPayment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td class="border-bottom-0 btrr-mbl btlr">
                        <input type="hidden" id="invoice_number" name="invoice_number[]" value="<?php echo e($pendingPayment->id); ?>">
                        <?php echo e($pendingPayment->invoice_number); ?>

                    </td>
                    <td class="border-bottom-0 btrr-mbl btlr">
                        <div class="input-group">
                            <input type="text" data-id="<?php echo e($key); ?>" id="payment_date<?php echo e($key); ?>"
                                name="payment_date[]"
                                class="payment_date px-6 position-relative text-dark font-weight-normal form-control height-35 rounded p-0 text-left f-15 w-100"
                                placeholder="<?php echo app('translator')->get('placeholders.date'); ?>"
                                value="<?php echo e(now(company()->timezone)->format(company()->date_format)); ?>">
                        </div>
                    </td>
                    <td class="border-bottom-0 btrr-mbl btlr">
                        <div class="input-group">
                            <select name="gateway[]" data-id=<?php echo e($key); ?>

                                id="payment_gateway_id<?php echo e($key); ?>"
                                    class="form-control select-picker payment_gateway_id" data-live-search="true"
                                    search="true">
                                <option value="all" <?php if($paymentID == 'all'): echo 'selected'; endif; ?>>--</option>
                                <option value="Offline" id="offline_method" <?php if($paymentID == 'Offline'): echo 'selected'; endif; ?>>
                                    <?php echo e(__('modules.offlinePayment.offlinePayment')); ?></option>
                                <?php if($paymentGateway->paypal_status == 'active'): ?>
                                    <option value="paypal" <?php if($paymentID == 'paypal'): echo 'selected'; endif; ?> ><?php echo e(__('app.paypal')); ?></option>
                                <?php endif; ?>
                                <?php if($paymentGateway->stripe_status == 'active'): ?>
                                    <option value="stripe" <?php if($paymentID == 'stripe'): echo 'selected'; endif; ?> ><?php echo e(__('app.stripe')); ?></option>
                                <?php endif; ?>
                                <?php if($paymentGateway->razorpay_status == 'active'): ?>
                                    <option value="razorpay"  <?php if($paymentID == 'razorpay'): echo 'selected'; endif; ?>><?php echo e(__('app.razorpay')); ?></option>
                                <?php endif; ?>
                                <?php if($paymentGateway->paystack_status == 'active'): ?>
                                    <option value="paystack" <?php if($paymentID == 'paystack'): echo 'selected'; endif; ?>><?php echo e(__('app.paystack')); ?></option>
                                <?php endif; ?>
                                <?php if($paymentGateway->mollie_status == 'active'): ?>
                                    <option value="mollie" <?php if($paymentID == 'mollie'): echo 'selected'; endif; ?>><?php echo e(__('app.mollie')); ?></option>
                                <?php endif; ?>
                                <?php if($paymentGateway->payfast_status == 'active'): ?>
                                    <option value="payfast" <?php if($paymentID == 'payfast'): echo 'selected'; endif; ?>><?php echo e(__('app.payfast')); ?></option>
                                <?php endif; ?>
                                <?php if($paymentGateway->authorize_status == 'active'): ?>
                                    <option value="authorize" <?php if($paymentID == 'authorize'): echo 'selected'; endif; ?>><?php echo e(__('app.authorize')); ?>

                                    </option>
                                <?php endif; ?>
                                <?php if($paymentGateway->square_status == 'active'): ?>
                                    <option value="square" <?php if($paymentID == 'square'): echo 'selected'; endif; ?>><?php echo e(__('app.square')); ?></option>
                                <?php endif; ?>
                                <?php if($paymentGateway->flutterwave_status == 'active'): ?>
                                    <option value="flutterwave" <?php if($paymentID == 'flutterwave'): echo 'selected'; endif; ?>><?php echo e(__('app.flutterwave')); ?>

                                    </option>
                                <?php endif; ?>
                            </select>
                        </div>
                    </td>
                    <td class="border-bottom-0 btrr-mbl btlr">
                        <div class="input-group" id="add_offline<?php echo e($key); ?>">
                            <select class="form-control select-picker add_offline_methods" id="add_offline_methods<?php echo e($key); ?>"
                                data-id="<?php echo e($key); ?>" name="offline_methods[]" data-live-search="true"
                                search="true">
                                <option value="" <?php if($offlineID == 'all'): ?> selected <?php endif; ?>>--</option>
                                <?php $__currentLoopData = $offlineMethods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offlineMethod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($offlineMethod->id); ?>" <?php if($offlineID == $offlineMethod->id): ?> selected <?php endif; ?>>
                                        <?php echo e($offlineMethod->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <input type="hidden" id="offline_method_id<?php echo e($key); ?>" name="offline_method_id[]"
                            value="">
                    </td>
                    <?php if($linkPaymentPermission == 'all'): ?>
                        <td class="border-bottom-0 btrr-mbl btlr">
                            <div class="input-group" id="bank_account_id<?php echo e($key); ?>">
                                <select class="form-control select-picker bank_account_id"
                                    id="bank_account_id<?php echo e($key); ?>" data-id="<?php echo e($key); ?>"
                                    name="bank_account_id[]" data-live-search="true"
                                    search="true" <?php if($pendingPayment->bank_account_id): ?> disabled <?php endif; ?>>
                                    <option value="">--</option>
                                    <?php if($viewBankAccountPermission != 'none'): ?>
                                        <?php $__currentLoopData = $bankDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bankDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($pendingPayment->currency->id == $bankDetail->currency_id): ?>
                                                <option <?php if($pendingPayment->bank_account_id == $bankDetail->id): ?> selected <?php endif; ?> value="<?php echo e($bankDetail->id); ?>"><?php if($bankDetail->type == 'bank'): ?>
                                                    <?php echo e($bankDetail->bank_name); ?> | <?php endif; ?> <?php echo e($bankDetail->account_name); ?>

                                                </option>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </select>
                                <?php if($pendingPayment->bank_account_id): ?>
                                    <input type="hidden" id="bank_account_id<?php echo e($key); ?>" name="bank_account_id[]" value="<?php echo e($pendingPayment->bank_account_id); ?>">
                                <?php endif; ?>
                            </div>
                        </td>
                    <?php endif; ?>
                    <td class="border-bottom-0 btrr-mbl btlr">
                        <div class="input-group">
                            <input type="text" class="form-control height-35 f-14" name="transaction_id[]"
                                id="transaction_id">
                        </div>
                    </td>
                    <td class="border-bottom-0 btrr-mbl btlr">
                        <div class="input-group">
                            <input type="number" class="form-control height-35 f-14 amount" name="amount[]"
                                id="amount<?php echo e($key); ?>" data-id="<?php echo e($key); ?>">
                        </div>
                    </td>
                    <td class="border-bottom-0 btrr-mbl btlr text-right pr-0">
                        <input type="hidden" id="due_amount<?php echo e($key); ?>"
                            value="<?php echo e($pendingPayment->amountDue()); ?>">
                        <?php echo e(!is_null($pendingPayment->amountDue()) ? currency_format($pendingPayment->amountDue(), $pendingPayment->currency->id, $pendingPayment->currency->currency_symbol) : currency_format($pendingPayment->amountDue(), $pendingPayment->currency->id)); ?>

                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td <?php if($linkPaymentPermission == 'all'): ?> colspan="8" <?php else: ?> colspan="7" <?php endif; ?>>
                        <?php if (isset($component)) { $__componentOriginal269164c77d9d34462c34359c03da6a68 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal269164c77d9d34462c34359c03da6a68 = $attributes; } ?>
<?php $component = App\View\Components\Cards\NoRecord::resolve(['icon' => 'coins','message' => __('messages.noRecordFound')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.no-record'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\NoRecord::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal269164c77d9d34462c34359c03da6a68)): ?>
<?php $attributes = $__attributesOriginal269164c77d9d34462c34359c03da6a68; ?>
<?php unset($__attributesOriginal269164c77d9d34462c34359c03da6a68); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal269164c77d9d34462c34359c03da6a68)): ?>
<?php $component = $__componentOriginal269164c77d9d34462c34359c03da6a68; ?>
<?php unset($__componentOriginal269164c77d9d34462c34359c03da6a68); ?>
<?php endif; ?>
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php if (isset($component)) { $__componentOriginalb19caa501eea72410c04d1917a586963 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb19caa501eea72410c04d1917a586963 = $attributes; } ?>
<?php $component = App\View\Components\FormActions::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form-actions'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\FormActions::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <?php if(count($pendingPayments) > 0): ?>
        <?php if (isset($component)) { $__componentOriginalcf8d12533ff890e0d6573daf32b7618d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcf8d12533ff890e0d6573daf32b7618d = $attributes; } ?>
<?php $component = App\View\Components\Forms\ButtonPrimary::resolve(['icon' => 'check'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'save-bulk-payment-button','class' => 'mr-3']); ?>
            <?php echo app('translator')->get('app.save'); ?>
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
    <?php endif; ?>

    <?php if (isset($component)) { $__componentOriginalc35c79ed7e812580313ad04118477974 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc35c79ed7e812580313ad04118477974 = $attributes; } ?>
<?php $component = App\View\Components\Forms\ButtonCancel::resolve(['link' => route('payments.index')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-cancel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonCancel::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'border-0']); ?><?php echo app('translator')->get('app.cancel'); ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc35c79ed7e812580313ad04118477974)): ?>
<?php $attributes = $__attributesOriginalc35c79ed7e812580313ad04118477974; ?>
<?php unset($__attributesOriginalc35c79ed7e812580313ad04118477974); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc35c79ed7e812580313ad04118477974)): ?>
<?php $component = $__componentOriginalc35c79ed7e812580313ad04118477974; ?>
<?php unset($__componentOriginalc35c79ed7e812580313ad04118477974); ?>
<?php endif; ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb19caa501eea72410c04d1917a586963)): ?>
<?php $attributes = $__attributesOriginalb19caa501eea72410c04d1917a586963; ?>
<?php unset($__attributesOriginalb19caa501eea72410c04d1917a586963); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb19caa501eea72410c04d1917a586963)): ?>
<?php $component = $__componentOriginalb19caa501eea72410c04d1917a586963; ?>
<?php unset($__componentOriginalb19caa501eea72410c04d1917a586963); ?>
<?php endif; ?>

<script>
    $(document).ready(function() {
        let paymentsData = $('.payment_date');

        $(paymentsData).each(function() {
            datepicker(this, {
                position: 'bl',
                ...datepickerConfig
            });
        });

        let offlineData = $('.payment_gateway_id');

        $(offlineData).each(function() {
            let id = $(this).data('id');
            let val = $(this).val();
            let offlineVal = $('#add_offline_methods'+id).val();

            if (val == 'Offline') {
                $('#offline_method_id'+id).val(offlineVal);
            }
            else {
                $('#add_offline'+id).addClass('d-none');
            }
        });

        $('#client_id, .payment_gateway_id, .add_offline_methods, .bank_account_id').selectpicker('destroy');
        $('#client_id, .payment_gateway_id, .add_offline_methods, .bank_account_id').selectpicker('render');
    });
</script>
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\payments\ajax\bulk-payments.blade.php ENDPATH**/ ?>