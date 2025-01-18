<div class="row">
    <div class="col-sm-12">
        <?php if (isset($component)) { $__componentOriginal18ad2e0d264f9740dc73fff715357c28 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal18ad2e0d264f9740dc73fff715357c28 = $attributes; } ?>
<?php $component = App\View\Components\Form::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Form::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'save-payment-data-form']); ?>
            <?php echo method_field('PUT'); ?>
            <div class="add-client bg-white rounded">
                <h4 class="mb-0 p-20 f-21 font-weight-normal text-capitalize border-bottom-grey">
                    <?php echo app('translator')->get('modules.payments.paymentDetails'); ?></h4>
                <div class="row p-20">

                    <div class="col-lg-3 col-md-6">
                        <?php if (isset($component)) { $__componentOriginal67cd5dc9866c6185ad92d933c387fa86 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal67cd5dc9866c6185ad92d933c387fa86 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Select::resolve(['fieldId' => 'payment_project_id','fieldLabel' => __('app.project'),'fieldName' => 'project_id','search' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Select::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                            <option value="">--</option>
                            <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option <?php if($project->id == $payment->project_id): ?> selected <?php endif; ?> value="<?php echo e($project->id); ?>" data-currency-id="<?php echo e($project->currency_id); ?>"
                                    data-currency-code="<?php echo e($project->currency->currency_code); ?>">
                                    <?php echo e($project->project_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal67cd5dc9866c6185ad92d933c387fa86)): ?>
<?php $attributes = $__attributesOriginal67cd5dc9866c6185ad92d933c387fa86; ?>
<?php unset($__attributesOriginal67cd5dc9866c6185ad92d933c387fa86); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal67cd5dc9866c6185ad92d933c387fa86)): ?>
<?php $component = $__componentOriginal67cd5dc9866c6185ad92d933c387fa86; ?>
<?php unset($__componentOriginal67cd5dc9866c6185ad92d933c387fa86); ?>
<?php endif; ?>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <?php if (isset($component)) { $__componentOriginal67cd5dc9866c6185ad92d933c387fa86 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal67cd5dc9866c6185ad92d933c387fa86 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Select::resolve(['fieldId' => 'payment_invoice_id','fieldLabel' => __('app.invoice'),'fieldName' => 'invoice_id','search' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Select::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                            <option value="">--</option>
                            <?php if($payment->invoice_id): ?>
                                <option selected data-currency-code="<?php echo e($payment->currency->currency_code); ?>" data-currency-id="<?php echo e($payment->currency_id); ?>" value="<?php echo e($payment->invoice_id); ?>">
                                    <?php echo e($payment->invoice->invoice_number); ?></option>
                            <?php endif; ?>
                            <?php $__currentLoopData = $invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($payment->invoice_id != $item->id): ?>
                                    <option data-currency-id="<?php echo e($item->currency->id); ?>" value="<?php echo e($item->id); ?>"><?php echo e($item->invoice_number); ?></option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal67cd5dc9866c6185ad92d933c387fa86)): ?>
<?php $attributes = $__attributesOriginal67cd5dc9866c6185ad92d933c387fa86; ?>
<?php unset($__attributesOriginal67cd5dc9866c6185ad92d933c387fa86); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal67cd5dc9866c6185ad92d933c387fa86)): ?>
<?php $component = $__componentOriginal67cd5dc9866c6185ad92d933c387fa86; ?>
<?php unset($__componentOriginal67cd5dc9866c6185ad92d933c387fa86); ?>
<?php endif; ?>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <?php if (isset($component)) { $__componentOriginalf704f069031d81dfb7cf95f6709a6a66 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf704f069031d81dfb7cf95f6709a6a66 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Datepicker::resolve(['fieldId' => 'paid_on','fieldLabel' => __('modules.payments.paidOn'),'fieldName' => 'paid_on','fieldPlaceholder' => __('placeholders.date'),'fieldValue' => ($payment->paid_on ? $payment->paid_on->format(company()->date_format) : '')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.datepicker'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Datepicker::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf704f069031d81dfb7cf95f6709a6a66)): ?>
<?php $attributes = $__attributesOriginalf704f069031d81dfb7cf95f6709a6a66; ?>
<?php unset($__attributesOriginalf704f069031d81dfb7cf95f6709a6a66); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf704f069031d81dfb7cf95f6709a6a66)): ?>
<?php $component = $__componentOriginalf704f069031d81dfb7cf95f6709a6a66; ?>
<?php unset($__componentOriginalf704f069031d81dfb7cf95f6709a6a66); ?>
<?php endif; ?>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <?php if (isset($component)) { $__componentOriginal1fded940a0a5d34bf1b88a1f45916593 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1fded940a0a5d34bf1b88a1f45916593 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Number::resolve(['fieldId' => 'amount','fieldLabel' => __('modules.invoices.amount'),'fieldName' => 'amount','fieldValue' => $payment->amount,'fieldPlaceholder' => __('placeholders.price'),'fieldRequired' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.number'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Number::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1fded940a0a5d34bf1b88a1f45916593)): ?>
<?php $attributes = $__attributesOriginal1fded940a0a5d34bf1b88a1f45916593; ?>
<?php unset($__attributesOriginal1fded940a0a5d34bf1b88a1f45916593); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1fded940a0a5d34bf1b88a1f45916593)): ?>
<?php $component = $__componentOriginal1fded940a0a5d34bf1b88a1f45916593; ?>
<?php unset($__componentOriginal1fded940a0a5d34bf1b88a1f45916593); ?>
<?php endif; ?>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <input type="hidden" id="currency_id" name="currency_id" value="<?php echo e($payment->currency_id); ?>">
                        <?php if (isset($component)) { $__componentOriginal67cd5dc9866c6185ad92d933c387fa86 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal67cd5dc9866c6185ad92d933c387fa86 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Select::resolve(['fieldId' => 'currency','fieldLabel' => __('app.currency'),'fieldName' => 'currency','search' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Select::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                            <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option <?php if($currency->id == $payment->currency_id): ?> selected <?php endif; ?> value="<?php echo e($currency->id); ?>" data-currency-code="<?php echo e($currency->currency_code); ?>">
                                    <?php echo e($currency->currency_code . ' (' . $currency->currency_symbol . ')'); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal67cd5dc9866c6185ad92d933c387fa86)): ?>
<?php $attributes = $__attributesOriginal67cd5dc9866c6185ad92d933c387fa86; ?>
<?php unset($__attributesOriginal67cd5dc9866c6185ad92d933c387fa86); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal67cd5dc9866c6185ad92d933c387fa86)): ?>
<?php $component = $__componentOriginal67cd5dc9866c6185ad92d933c387fa86; ?>
<?php unset($__componentOriginal67cd5dc9866c6185ad92d933c387fa86); ?>
<?php endif; ?>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <?php if (isset($component)) { $__componentOriginal4e45e801405ab67097982370a6a83cba = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4e45e801405ab67097982370a6a83cba = $attributes; } ?>
<?php $component = App\View\Components\Forms\Text::resolve(['fieldId' => 'exchange_rate','fieldLabel' => __('modules.currencySettings.exchangeRate'),'fieldName' => 'exchange_rate','fieldRequired' => 'true','fieldValue' => $payment->exchange_rate,'fieldReadOnly' => ($companyCurrency->id == $payment->currency_id),'fieldHelp' => $payment->currency->currency_code != company()->currency->currency_code ? ( company()->currency->currency_code.' '.__('app.to').' '.$payment->currency->currency_code ) : ' '] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Text::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4e45e801405ab67097982370a6a83cba)): ?>
<?php $attributes = $__attributesOriginal4e45e801405ab67097982370a6a83cba; ?>
<?php unset($__attributesOriginal4e45e801405ab67097982370a6a83cba); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4e45e801405ab67097982370a6a83cba)): ?>
<?php $component = $__componentOriginal4e45e801405ab67097982370a6a83cba; ?>
<?php unset($__componentOriginal4e45e801405ab67097982370a6a83cba); ?>
<?php endif; ?>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <?php if (isset($component)) { $__componentOriginal4e45e801405ab67097982370a6a83cba = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4e45e801405ab67097982370a6a83cba = $attributes; } ?>
<?php $component = App\View\Components\Forms\Text::resolve(['fieldId' => 'transaction_id','fieldLabel' => __('modules.payments.transactionId'),'fieldName' => 'transaction_id','fieldPlaceholder' => __('placeholders.payments.transactionId'),'fieldValue' => $payment->transaction_id] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Text::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4e45e801405ab67097982370a6a83cba)): ?>
<?php $attributes = $__attributesOriginal4e45e801405ab67097982370a6a83cba; ?>
<?php unset($__attributesOriginal4e45e801405ab67097982370a6a83cba); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4e45e801405ab67097982370a6a83cba)): ?>
<?php $component = $__componentOriginal4e45e801405ab67097982370a6a83cba; ?>
<?php unset($__componentOriginal4e45e801405ab67097982370a6a83cba); ?>
<?php endif; ?>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <?php if (isset($component)) { $__componentOriginal67cd5dc9866c6185ad92d933c387fa86 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal67cd5dc9866c6185ad92d933c387fa86 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Select::resolve(['fieldId' => 'payment_gateway_id','fieldLabel' => __('modules.payments.paymentGateway'),'fieldName' => 'gateway','search' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Select::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                            <option value="">--</option>
                            <option <?php if($payment->gateway == 'Offline'): ?> selected <?php endif; ?> value="Offline"><?php echo e(__('modules.offlinePayment.offlinePayment')); ?></option>
                            <?php if($paymentGateway->paypal_status == 'active'): ?>
                                <option <?php if($payment->gateway == 'paypal'): ?> selected <?php endif; ?> value="paypal"><?php echo e(__('app.paypal')); ?></option>
                            <?php endif; ?>
                            <?php if($paymentGateway->stripe_status == 'active'): ?>
                                <option <?php if($payment->gateway == 'stripe'): ?> selected <?php endif; ?> value="stripe"><?php echo e(__('app.stripe')); ?></option>
                            <?php endif; ?>
                            <?php if($paymentGateway->razorpay_status == 'active'): ?>
                                <option <?php if($payment->gateway == 'stripe'): ?> selected <?php endif; ?> <?php if($payment->gateway == 'paypal'): ?> selected <?php endif; ?> value="razorpay"><?php echo e(__('app.razorpay')); ?></option>
                            <?php endif; ?>
                            <?php if($paymentGateway->paystack_status == 'active'): ?>
                                <option <?php if($payment->gateway == 'paystack'): ?> selected <?php endif; ?> value="paystack"><?php echo e(__('app.paystack')); ?></option>
                            <?php endif; ?>
                            <?php if($paymentGateway->mollie_status == 'active'): ?>
                                <option <?php if($payment->gateway == 'mollie'): ?> selected <?php endif; ?> value="mollie"><?php echo e(__('app.mollie')); ?></option>
                            <?php endif; ?>
                            <?php if($paymentGateway->payfast_status == 'active'): ?>
                                <option <?php if($payment->gateway == 'payfast'): ?> selected <?php endif; ?> value="payfast"><?php echo e(__('app.payfast')); ?></option>
                            <?php endif; ?>
                            <?php if($paymentGateway->authorize_status == 'active'): ?>
                                <option <?php if($payment->gateway == 'authorize'): ?> selected <?php endif; ?> value="authorize"><?php echo e(__('app.authorize')); ?></option>
                            <?php endif; ?>
                            <?php if($paymentGateway->square_status == 'active'): ?>
                                <option <?php if($payment->gateway == 'square'): ?> selected <?php endif; ?> value="square"><?php echo e(__('app.square')); ?></option>
                            <?php endif; ?>
                            <?php if($paymentGateway->flutterwave_status == 'active'): ?>
                                <option <?php if($payment->gateway == 'flutterwave'): ?> selected <?php endif; ?> value="flutterwave"><?php echo e(__('app.flutterwave')); ?></option>
                            <?php endif; ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal67cd5dc9866c6185ad92d933c387fa86)): ?>
<?php $attributes = $__attributesOriginal67cd5dc9866c6185ad92d933c387fa86; ?>
<?php unset($__attributesOriginal67cd5dc9866c6185ad92d933c387fa86); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal67cd5dc9866c6185ad92d933c387fa86)): ?>
<?php $component = $__componentOriginal67cd5dc9866c6185ad92d933c387fa86; ?>
<?php unset($__componentOriginal67cd5dc9866c6185ad92d933c387fa86); ?>
<?php endif; ?>
                    </div>

                    <?php if($payment->gateway=='Offline'): ?>
                    <div class="col-md-3" id = "add_offline">
                        <?php if (isset($component)) { $__componentOriginal67cd5dc9866c6185ad92d933c387fa86 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal67cd5dc9866c6185ad92d933c387fa86 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Select::resolve(['fieldId' => 'add_offline_methods','fieldLabel' => __('modules.payments.offlinePaymentMethod'),'fieldName' => 'offline_methods','search' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Select::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                        <?php $__currentLoopData = $methods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($method->status == 'yes'): ?>
                        <option <?php if($payment->offline_method_id == $method->id): ?> selected <?php endif; ?> value=<?php echo e($method->id); ?>><?php echo e($method->name); ?></option>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal67cd5dc9866c6185ad92d933c387fa86)): ?>
<?php $attributes = $__attributesOriginal67cd5dc9866c6185ad92d933c387fa86; ?>
<?php unset($__attributesOriginal67cd5dc9866c6185ad92d933c387fa86); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal67cd5dc9866c6185ad92d933c387fa86)): ?>
<?php $component = $__componentOriginal67cd5dc9866c6185ad92d933c387fa86; ?>
<?php unset($__componentOriginal67cd5dc9866c6185ad92d933c387fa86); ?>
<?php endif; ?>
                    </div>
                    <?php endif; ?>

                    <div class="col-md-3 d-none" id = "add_offline">
                        <?php if (isset($component)) { $__componentOriginal67cd5dc9866c6185ad92d933c387fa86 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal67cd5dc9866c6185ad92d933c387fa86 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Select::resolve(['fieldId' => 'add_offline_methods','fieldLabel' => __('modules.payments.offlinePaymentMethod'),'fieldName' => 'offline_methods','search' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Select::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal67cd5dc9866c6185ad92d933c387fa86)): ?>
<?php $attributes = $__attributesOriginal67cd5dc9866c6185ad92d933c387fa86; ?>
<?php unset($__attributesOriginal67cd5dc9866c6185ad92d933c387fa86); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal67cd5dc9866c6185ad92d933c387fa86)): ?>
<?php $component = $__componentOriginal67cd5dc9866c6185ad92d933c387fa86; ?>
<?php unset($__componentOriginal67cd5dc9866c6185ad92d933c387fa86); ?>
<?php endif; ?>
                    </div>

                    <?php if($linkPaymentPermission == 'all'): ?>
                        <div class="col-md-3">
                            <?php if (isset($component)) { $__componentOriginal67cd5dc9866c6185ad92d933c387fa86 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal67cd5dc9866c6185ad92d933c387fa86 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Select::resolve(['fieldId' => 'bank_account_id','fieldLabel' => __('app.menu.bankaccount'),'fieldName' => 'bank_account_id','search' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Select::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                <option value="">--</option>
                                <?php if($viewBankAccountPermission != 'none'): ?>
                                    <?php $__currentLoopData = $bankDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bankDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($bankDetail->id); ?>" <?php if($bankDetail->id == $payment->bank_account_id): ?> selected <?php endif; ?>><?php if($bankDetail->type == 'bank'): ?>
                                            <?php echo e($bankDetail->bank_name); ?> | <?php endif; ?>
                                            <?php echo e($bankDetail->account_name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal67cd5dc9866c6185ad92d933c387fa86)): ?>
<?php $attributes = $__attributesOriginal67cd5dc9866c6185ad92d933c387fa86; ?>
<?php unset($__attributesOriginal67cd5dc9866c6185ad92d933c387fa86); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal67cd5dc9866c6185ad92d933c387fa86)): ?>
<?php $component = $__componentOriginal67cd5dc9866c6185ad92d933c387fa86; ?>
<?php unset($__componentOriginal67cd5dc9866c6185ad92d933c387fa86); ?>
<?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <div class="col-lg-3 col-md-6">
                        <?php if (isset($component)) { $__componentOriginal67cd5dc9866c6185ad92d933c387fa86 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal67cd5dc9866c6185ad92d933c387fa86 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Select::resolve(['fieldId' => 'status','fieldLabel' => __('app.status'),'fieldName' => 'status'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Select::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                            <option
                                data-content="<i class='fa fa-circle mr-1 text-dark-green f-10'></i> <?php echo e(__('app.complete')); ?>"
                                <?php if($payment->status == 'complete'): ?> selected
                                <?php endif; ?>
                                value="complete"><?php echo app('translator')->get('app.complete'); ?></option>
                            <option
                                data-content="<i class='fa fa-circle mr-1 text-yellow f-10'></i> <?php echo e(__('app.pending')); ?>"
                                <?php if($payment->status == 'pending'): ?> selected
                                <?php endif; ?>
                                value="pending"><?php echo app('translator')->get('app.pending'); ?></option>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal67cd5dc9866c6185ad92d933c387fa86)): ?>
<?php $attributes = $__attributesOriginal67cd5dc9866c6185ad92d933c387fa86; ?>
<?php unset($__attributesOriginal67cd5dc9866c6185ad92d933c387fa86); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal67cd5dc9866c6185ad92d933c387fa86)): ?>
<?php $component = $__componentOriginal67cd5dc9866c6185ad92d933c387fa86; ?>
<?php unset($__componentOriginal67cd5dc9866c6185ad92d933c387fa86); ?>
<?php endif; ?>
                    </div>

                    <div class="col-lg-12">
                        <?php if (isset($component)) { $__componentOriginal71f75760ce80416d6aa938be1ae7e8b2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal71f75760ce80416d6aa938be1ae7e8b2 = $attributes; } ?>
<?php $component = App\View\Components\Forms\File::resolve(['allowedFileExtensions' => 'txt pdf doc xls xlsx docx rtf png jpg jpeg svg','fieldLabel' => __('app.receipt'),'fieldName' => 'bill','fieldId' => 'bill','fieldValue' => ($payment->bill ? $payment->file_url : ''),'popover' => __('messages.fileFormat.multipleImageFile')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.file'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\File::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-0 mr-lg-2 mr-md-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal71f75760ce80416d6aa938be1ae7e8b2)): ?>
<?php $attributes = $__attributesOriginal71f75760ce80416d6aa938be1ae7e8b2; ?>
<?php unset($__attributesOriginal71f75760ce80416d6aa938be1ae7e8b2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71f75760ce80416d6aa938be1ae7e8b2)): ?>
<?php $component = $__componentOriginal71f75760ce80416d6aa938be1ae7e8b2; ?>
<?php unset($__componentOriginal71f75760ce80416d6aa938be1ae7e8b2); ?>
<?php endif; ?>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <?php if (isset($component)) { $__componentOriginal2f60389a9e230471cd863683376c182f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2f60389a9e230471cd863683376c182f = $attributes; } ?>
<?php $component = App\View\Components\Forms\Textarea::resolve(['fieldLabel' => __('app.remark'),'fieldName' => 'remarks','fieldId' => 'remarks','fieldValue' => $payment->remarks,'fieldPlaceholder' => __('placeholders.payments.remark')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Textarea::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-0 mr-lg-2 mr-md-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2f60389a9e230471cd863683376c182f)): ?>
<?php $attributes = $__attributesOriginal2f60389a9e230471cd863683376c182f; ?>
<?php unset($__attributesOriginal2f60389a9e230471cd863683376c182f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2f60389a9e230471cd863683376c182f)): ?>
<?php $component = $__componentOriginal2f60389a9e230471cd863683376c182f; ?>
<?php unset($__componentOriginal2f60389a9e230471cd863683376c182f); ?>
<?php endif; ?>
                        </div>
                    </div>

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
                    <?php if (isset($component)) { $__componentOriginalcf8d12533ff890e0d6573daf32b7618d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcf8d12533ff890e0d6573daf32b7618d = $attributes; } ?>
<?php $component = App\View\Components\Forms\ButtonPrimary::resolve(['icon' => 'check'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'save-payment-form','class' => 'mr-3']); ?><?php echo app('translator')->get('app.save'); ?>
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

            </div>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal18ad2e0d264f9740dc73fff715357c28)): ?>
<?php $attributes = $__attributesOriginal18ad2e0d264f9740dc73fff715357c28; ?>
<?php unset($__attributesOriginal18ad2e0d264f9740dc73fff715357c28); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal18ad2e0d264f9740dc73fff715357c28)): ?>
<?php $component = $__componentOriginal18ad2e0d264f9740dc73fff715357c28; ?>
<?php unset($__componentOriginal18ad2e0d264f9740dc73fff715357c28); ?>
<?php endif; ?>

    </div>
</div>

<script>
    $(document).ready(function() {

        datepicker('#paid_on', {
            position: 'bl',
            dateSelected: new Date("<?php echo e($payment->paid_on ? str_replace('-', '/', $payment->paid_on) : str_replace('-', '/', now())); ?>"),
            ...datepickerConfig
        });

        $('#payment_invoice_id').change(function() {
            var companyCurrency = '<?php echo e($companyCurrency->id); ?>';
            var companyCurrencyName = "<?php echo e($companyCurrency->currency_code); ?>";

            if ($('#payment_invoice_id').val() != '') {

                var curId = $('#payment_invoice_id option:selected').attr('data-currency-id');
                var currentCurrencyName = $('#payment_invoice_id option:selected').attr('data-currency-code');
                $('#currency').removeAttr('disabled');
                $('#currency').selectpicker('refresh');
                $('#currency').val(curId);
                $('#currency_id').val(curId);
                $('#currency').prop('disabled', true);
                $('#currency').selectpicker('refresh');
            } else {
                    if($('#payment_project_id').val() != ''){
                        $('#currency').prop('disabled', true);
                    } else {
                        $('#currency').prop('disabled', false);
                        $('#currency').selectpicker('refresh');
                    }

                    var currentCurrencyName = $('#currency option:selected').attr('data-currency-code');
            }
            let currencyExchange = (companyCurrencyName != currentCurrencyName) ? '( '+currentCurrencyName+' <?php echo app('translator')->get('app.to'); ?> '+companyCurrencyName+' )' : '';
            $('#exchange_rateHelp').html(currencyExchange);

            var url = "<?php echo e(route('payments.account_list')); ?>";
            var curId = $('#currency_id').val();
            var token = "<?php echo e(csrf_token()); ?>";

            $.easyAjax({
                url: url,
                container: '#save-payment-data-form',
                type: "GET",
                blockUI: true,
                data: {
                    _token: token,
                    'curId' :curId
                },
                success: function(response) {
                    if (response.status == 'success') {
                        $('#bank_account_id').html(response.data);
                        $('#bank_account_id').selectpicker('refresh');
                        $('#exchange_rate').val(1/response.exchangeRate);
                        if(curId != undefined && curId != companyCurrency){
                            $('#exchange_rate').prop('readonly', false);
                        } else {
                            $('#exchange_rate').prop('readonly', true);
                        }
                    }
                }
            });
        });

        $('#save-payment-form').click(function() {
            const url = "<?php echo e(route('payments.update', $payment->id)); ?>";

            $.easyAjax({
                url: url,
                container: '#save-payment-data-form',
                type: "POST",
                disableButton: true,
                blockUI: true,
                buttonSelector: "#save-payment-form",
                file: true,
                data: $('#save-payment-data-form').serialize(),
                success: function(response) {
                    if (response.status == 'success') {
                        window.location.href = response.redirectUrl;
                    }
                }
            });
        });

        if ($('#payment_project_id').val() != '' && $('#payment_project_id').val() != 0){
            $('#currency_id').prop('disabled', true);
        }

        $('#payment_project_id').change(function() {
            var companyCurrency = '<?php echo e($companyCurrency->id); ?>';
            var companyCurrencyName = "<?php echo e($companyCurrency->currency_code); ?>";

            var id = $(this).val();
            if (id == '') {
                id = 0;
            }

            if ($('#payment_invoice_id').val() != '' || ($('#payment_project_id').val() != '' && $('#payment_project_id').val() != 0)) {
                var invoiceId = $('#invoice_id').val();
                var currentCurrencyName = $('#payment_project_id option:selected').attr('data-currency-code');

                if(invoiceId){
                    var curId = $('#invoice_currency_id').val();
                } else {
                    var curId = $('#payment_project_id option:selected').attr('data-currency-id');
                }
                $('#currency').removeAttr('disabled');
                $('#currency').selectpicker('refresh');
                $('#currency_id').val(curId);
                $('#currency').val(curId);
                $('#currency').prop('disabled', true);
                $('#currency').selectpicker('refresh');
            } else {
                var currentCurrencyName = $('#currency option:selected').attr('data-currency-code');
                $('#currency').prop('disabled', false);
                $('#currency').selectpicker('refresh');
            }
            let currencyExchange = (companyCurrencyName != currentCurrencyName) ? '( '+currentCurrencyName+' <?php echo app('translator')->get('app.to'); ?> '+companyCurrencyName+' )' : '';
            $('#exchange_rateHelp').html(currencyExchange);

            var url = "<?php echo e(route('projects.invoice_list', ':id')); ?>";
            url = url.replace(':id', id);
            var currencyId = $('#currency_id').val();
            var token = "<?php echo e(csrf_token()); ?>";

            $.easyAjax({
                url: url,
                type: "POST",
                blockUI: true,
                data: {
                    _token: token,
                    'currencyId' :currencyId
                },
                success: function(response) {
                    if (response.status == 'success') {
                        $('#payment_invoice_id').html(response.data);
                        $('#payment_invoice_id').selectpicker('refresh');
                        $('#bank_account_id').html(response.account);
                        $('#bank_account_id').selectpicker('refresh');
                        if(id != 0) {
                            $('#exchange_rate').val(1/response.exchangeRate);
                        }
                        if(curId != undefined && curId != companyCurrency){
                            $('#exchange_rate').prop('readonly', false);
                        } else {
                            $('#exchange_rate').prop('readonly', true);
                        }
                    }
                }
            });
        });

        $('#currency').change(function() {
            var curId = $(this).val();
            $('#currency_id').val(curId);

            var companyCurrencyName = "<?php echo e($companyCurrency->currency_code); ?>";
            var currentCurrencyName = $('#currency option:selected').attr('data-currency-code');
            var companyCurrency = '<?php echo e($companyCurrency->id); ?>';

            if(curId == companyCurrency){
                $('#exchange_rate').prop('readonly', true);
            } else{
                $('#exchange_rate').prop('readonly', false);
            }

            var token = "<?php echo e(csrf_token()); ?>";

            $.easyAjax({
                url: "<?php echo e(route('payments.account_list')); ?>",
                type: "GET",
                blockUI: true,
                data: { 'curId' : curId , _token: token},
                success: function(response) {
                    if (response.status == 'success') {
                        $('#bank_account_id').html(response.data);
                        $('#bank_account_id').selectpicker('refresh');
                        $('#exchange_rate').val(1/response.exchangeRate);
                        let currencyExchange = (companyCurrencyName != currentCurrencyName) ? '( '+currentCurrencyName+' <?php echo app('translator')->get('app.to'); ?> '+companyCurrencyName+' )' : '';
                        $('#exchange_rateHelp').html(currencyExchange);
                    }
                }
            });
        });


        $('#payment_gateway_id').on('change', function() {
            var val = $(this).val();
            if (val == 'Offline'){
                var url = "<?php echo e(route('offline.methods')); ?>"
                $.easyAjax({
                url : url,
                type : "GET",
                success: function (response) {
                    if (response.status == 'success'){
                        $('#add_offline').removeClass('d-none');
                        var options = [];
                        var rData = [];
                        rData = response.data;
                            $.each(rData, function (index, value) {
                            var selectData = '';
                            if(value.status=='yes'){
                            selectData = '<option value="' + value.id + '">' + value.name + '</option>';
                            }
                            options.push(selectData);
                        });
                        $('#add_offline_methods').html(
                            options);
                        $('#add_offline_methods').selectpicker('refresh');
                    }

                }

                });

            }
            else
            {
                $('#add_offline').addClass('d-none');
            }
        });

        function ucWord(str){
            str = str.toLowerCase().replace(/\b[a-z]/g, function(letter) {
                return letter.toUpperCase();
            });
            return str;
        }


        init(RIGHT_MODAL);
    });
</script>
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\payments\ajax\edit.blade.php ENDPATH**/ ?>