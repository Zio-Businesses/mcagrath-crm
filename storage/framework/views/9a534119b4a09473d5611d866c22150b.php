<?php
    $addProductPermission = user()->permission('add_product');
?>
<style>
    .customSequence .btn {
        border: none;
    }

    .information-box {
        border-style: dotted;
        margin-bottom: 30px;
        margin-top:10px;
        padding-top: 10px;
        border-radius: 4px;
    }
</style>

<!-- CREATE INVOICE START -->
<div class="bg-white rounded b-shadow-4 create-inv">
    <!-- HEADING START -->
    <div class="px-lg-4 px-md-4 px-3 py-3">
        <h4 class="mb-0 f-21 font-weight-normal text-capitalize"><?php echo app('translator')->get('app.invoiceDetails'); ?></h4>
    </div>
    <!-- HEADING END -->
    <hr class="m-0 border-top-grey">
    <!-- FORM START -->
    <?php if (isset($component)) { $__componentOriginal18ad2e0d264f9740dc73fff715357c28 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal18ad2e0d264f9740dc73fff715357c28 = $attributes; } ?>
<?php $component = App\View\Components\Form::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Form::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'c-inv-form','id' => 'saveInvoiceForm']); ?>

        <!-- INVOICE NUMBER, DATE, DUE DATE, FREQUENCY START -->
        <div class="row px-lg-4 px-md-4 px-3 pt-3">
            <!-- CLIENT START -->
            <div class="col-md-3 mb-4">

                <?php if (isset($component)) { $__componentOriginalcfa76c1cf34159bb19d1a4c8f5da7d2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcfa76c1cf34159bb19d1a4c8f5da7d2c = $attributes; } ?>
<?php $component = App\View\Components\ClientSelectionDropdown::resolve(['clients' => $clients] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('client-selection-dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\ClientSelectionDropdown::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcfa76c1cf34159bb19d1a4c8f5da7d2c)): ?>
<?php $attributes = $__attributesOriginalcfa76c1cf34159bb19d1a4c8f5da7d2c; ?>
<?php unset($__attributesOriginalcfa76c1cf34159bb19d1a4c8f5da7d2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcfa76c1cf34159bb19d1a4c8f5da7d2c)): ?>
<?php $component = $__componentOriginalcfa76c1cf34159bb19d1a4c8f5da7d2c; ?>
<?php unset($__componentOriginalcfa76c1cf34159bb19d1a4c8f5da7d2c); ?>
<?php endif; ?>

            </div>
            <!-- CLIENT END -->
            <!-- PROJECT START -->
            <div class="col-md-3">
                <div class="form-group c-inv-select mb-4">
                    <?php if (isset($component)) { $__componentOriginal89b295b0763c93abe0143426334eb5d6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal89b295b0763c93abe0143426334eb5d6 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Label::resolve(['fieldId' => 'project_id','fieldLabel' => __('app.project')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Label::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal89b295b0763c93abe0143426334eb5d6)): ?>
<?php $attributes = $__attributesOriginal89b295b0763c93abe0143426334eb5d6; ?>
<?php unset($__attributesOriginal89b295b0763c93abe0143426334eb5d6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal89b295b0763c93abe0143426334eb5d6)): ?>
<?php $component = $__componentOriginal89b295b0763c93abe0143426334eb5d6; ?>
<?php unset($__componentOriginal89b295b0763c93abe0143426334eb5d6); ?>
<?php endif; ?>
                    <div class="select-others height-35 rounded">
                        <select class="form-control select-picker" data-live-search="true" data-size="8"
                                name="project_id" id="project_id">
                            <option value="">--</option>
                            <?php if(isset($estimate) && $estimate->client): ?>
                                <?php $__currentLoopData = $estimate->client->projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item->id); ?>"><?php echo e($item->project_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>

                        </select>
                    </div>
                </div>
            </div>
            <!-- PROJECT END -->
            <div class="col-md-3">
                <div class="form-group c-inv-select mb-lg-0 mb-md-0 mb-4">
                    <?php if (isset($component)) { $__componentOriginal89b295b0763c93abe0143426334eb5d6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal89b295b0763c93abe0143426334eb5d6 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Label::resolve(['fieldId' => 'currency_id','fieldLabel' => __('modules.invoices.currency')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Label::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal89b295b0763c93abe0143426334eb5d6)): ?>
<?php $attributes = $__attributesOriginal89b295b0763c93abe0143426334eb5d6; ?>
<?php unset($__attributesOriginal89b295b0763c93abe0143426334eb5d6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal89b295b0763c93abe0143426334eb5d6)): ?>
<?php $component = $__componentOriginal89b295b0763c93abe0143426334eb5d6; ?>
<?php unset($__componentOriginal89b295b0763c93abe0143426334eb5d6); ?>
<?php endif; ?>

                    <div class="select-others height-35 rounded">
                        <select class="form-control select-picker" name="currency_id" id="currency_id">
                            <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option <?php if(isset($estimate)): ?>
                                        <?php if($currency->id==$estimate->currency_id): ?> selected <?php endif; ?>
                                        <?php else: ?>
                                        <?php if($currency->id == company()->currency_id): ?>
                                        selected <?php endif; ?>
                                        <?php endif; ?>
                                        value="<?php echo e($currency->id); ?>">
                                    <?php echo e($currency->currency_code . ' (' . $currency->currency_symbol . ')'); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group mb-lg-0 mb-4">
                    <?php if (isset($component)) { $__componentOriginal89b295b0763c93abe0143426334eb5d6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal89b295b0763c93abe0143426334eb5d6 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Label::resolve(['fieldId' => 'calculate_tax','fieldLabel' => __('modules.invoices.calculateTax')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Label::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal89b295b0763c93abe0143426334eb5d6)): ?>
<?php $attributes = $__attributesOriginal89b295b0763c93abe0143426334eb5d6; ?>
<?php unset($__attributesOriginal89b295b0763c93abe0143426334eb5d6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal89b295b0763c93abe0143426334eb5d6)): ?>
<?php $component = $__componentOriginal89b295b0763c93abe0143426334eb5d6; ?>
<?php unset($__componentOriginal89b295b0763c93abe0143426334eb5d6); ?>
<?php endif; ?>
                    <div class="select-others height-35 rounded">
                        <select class="form-control select-picker" data-live-search="true" data-size="8"
                                name="calculate_tax" id="calculate_tax">
                            <option value="after_discount"><?php echo app('translator')->get('modules.invoices.afterDiscount'); ?></option>
                            <option value="before_discount"><?php echo app('translator')->get('modules.invoices.beforeDiscount'); ?></option>
                        </select>
                    </div>
                </div>
            </div>


            <?php if($linkInvoicePermission == 'all'): ?>
                <div class="col-md-3">
                    <div class="form-group c-inv-select">
                        <?php if (isset($component)) { $__componentOriginal89b295b0763c93abe0143426334eb5d6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal89b295b0763c93abe0143426334eb5d6 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Label::resolve(['fieldId' => 'bank_account_id','fieldLabel' => __('app.bankaccount')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Label::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal89b295b0763c93abe0143426334eb5d6)): ?>
<?php $attributes = $__attributesOriginal89b295b0763c93abe0143426334eb5d6; ?>
<?php unset($__attributesOriginal89b295b0763c93abe0143426334eb5d6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal89b295b0763c93abe0143426334eb5d6)): ?>
<?php $component = $__componentOriginal89b295b0763c93abe0143426334eb5d6; ?>
<?php unset($__componentOriginal89b295b0763c93abe0143426334eb5d6); ?>
<?php endif; ?>
                        <div class="select-others height-35 rounded">
                            <select class="form-control select-picker" data-live-search="true" data-size="8"
                                    name="bank_account_id" id="bank_account_id">
                                <option value="">--</option>
                                <?php if($viewBankAccountPermission != 'none'): ?>
                                    <?php $__currentLoopData = $bankDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bankDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($bankDetail->id); ?>"><?php if($bankDetail->type == 'bank'): ?>
                                            <?php echo e($bankDetail->bank_name); ?> | <?php endif; ?>
                                            <?php echo e($bankDetail->account_name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-3"></div>
            <?php endif; ?>
        </div>
        <!-- INVOICE NUMBER, DATE, DUE DATE, FREQUENCY END -->



        <div class="row px-lg-4 px-md-4 px-3 py-4">
            <div class="col-md-3">
                <?php if (isset($component)) { $__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Checkbox::resolve(['fieldLabel' => __('modules.recurringInvoice.allowToClient'),'fieldName' => 'client_can_stop','fieldId' => 'client_can_stop','fieldValue' => 'true','checked' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Checkbox::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-0 mr-lg-2 mr-md-2','fieldRequired' => 'true']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3)): ?>
<?php $attributes = $__attributesOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3; ?>
<?php unset($__attributesOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3)): ?>
<?php $component = $__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3; ?>
<?php unset($__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3); ?>
<?php endif; ?>
            </div>
            <div class="col-lg-3">
                <?php if (isset($component)) { $__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Checkbox::resolve(['fieldLabel' => __('modules.invoices.showShippingAddress'),'fieldName' => 'show_shipping_address','fieldId' => 'show_shipping_address','popover' => __('modules.invoices.showShippingAddressInfo'),'fieldValue' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Checkbox::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-0 mr-lg-2 mr-md-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3)): ?>
<?php $attributes = $__attributesOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3; ?>
<?php unset($__attributesOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3)): ?>
<?php $component = $__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3; ?>
<?php unset($__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3); ?>
<?php endif; ?>

            </div>
            <!-- SHIPPING ADDRESS START -->
            <div class="col-md-4 d-none" id="shipping_address_div">
                <div class="form-group c-inv-select mb-lg-0 mb-md-0 mb-4">
                    <label class="f-14 text-dark-grey mb-12 text-capitalize w-100"
                           for="usr"><?php echo app('translator')->get('modules.invoices.shippingAddress'); ?></label>
                    <p>
                        <textarea class="form-control f-14 pt-2" rows="3" placeholder="<?php echo app('translator')->get('placeholders.address'); ?>"
                                  name="shipping_address"
                                  id="shipping_address"><?php if(isset($estimate) && $estimate->client): ?> <?php echo nl2br($estimate->client->clientDetails->shipping_address); ?> <?php endif; ?></textarea>
                    </p>
                </div>
            </div>
            <!-- SHIPPING ADDRESS END -->
        </div>

        <hr class="m-0 border-top-grey">
        <div class="row px-lg-4 px-md-4 px-3 pt-3">
            <!-- BILLING FREQUENCY -->
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-4 mt-4">
                        <?php if (isset($component)) { $__componentOriginal89b295b0763c93abe0143426334eb5d6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal89b295b0763c93abe0143426334eb5d6 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Label::resolve(['fieldId' => 'rotation','fieldLabel' => __('modules.invoices.billingFrequency'),'fieldRequired' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Label::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal89b295b0763c93abe0143426334eb5d6)): ?>
<?php $attributes = $__attributesOriginal89b295b0763c93abe0143426334eb5d6; ?>
<?php unset($__attributesOriginal89b295b0763c93abe0143426334eb5d6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal89b295b0763c93abe0143426334eb5d6)): ?>
<?php $component = $__componentOriginal89b295b0763c93abe0143426334eb5d6; ?>
<?php unset($__componentOriginal89b295b0763c93abe0143426334eb5d6); ?>
<?php endif; ?>
                        <div class="form-group c-inv-select">
                            <select class="form-control select-picker" data-live-search="true" data-size="8" name="rotation"
                                    id="rotation">
                                <option value="daily"><?php echo app('translator')->get('app.daily'); ?></option>
                                <option value="weekly"><?php echo app('translator')->get('app.weekly'); ?></option>
                                <option value="bi-weekly"><?php echo app('translator')->get('app.bi-weekly'); ?></option>
                                <option value="monthly"><?php echo app('translator')->get('app.monthly'); ?></option>
                                <option value="quarterly"><?php echo app('translator')->get('app.quarterly'); ?></option>
                                <option value="half-yearly"><?php echo app('translator')->get('app.half-yearly'); ?></option>
                                <option value="annually"><?php echo app('translator')->get('app.annually'); ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-8 mt-4">
                        <div class="form-group">
                            <div class="d-flex">
                                <?php if (isset($component)) { $__componentOriginal89b295b0763c93abe0143426334eb5d6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal89b295b0763c93abe0143426334eb5d6 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Label::resolve(['fieldId' => 'start_date','fieldLabel' => __('app.startDate')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Label::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-3']); ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal89b295b0763c93abe0143426334eb5d6)): ?>
<?php $attributes = $__attributesOriginal89b295b0763c93abe0143426334eb5d6; ?>
<?php unset($__attributesOriginal89b295b0763c93abe0143426334eb5d6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal89b295b0763c93abe0143426334eb5d6)): ?>
<?php $component = $__componentOriginal89b295b0763c93abe0143426334eb5d6; ?>
<?php unset($__componentOriginal89b295b0763c93abe0143426334eb5d6); ?>
<?php endif; ?>
                                <?php if (isset($component)) { $__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Checkbox::resolve(['fieldLabel' => __('modules.recurringInvoice.immediateInvoice'),'fieldName' => 'immediate_invoice','fieldId' => 'immediate_invoice','fieldValue' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Checkbox::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-0 mr-lg-2 mr-md-2 mt-0','fieldRequired' => 'true']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3)): ?>
<?php $attributes = $__attributesOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3; ?>
<?php unset($__attributesOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3)): ?>
<?php $component = $__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3; ?>
<?php unset($__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3); ?>
<?php endif; ?>
                            </div>
                            <div class="input-group">
                                <input type="text" id="start_date" name="issue_date"
                                    class="px-6 position-relative text-dark font-weight-normal form-control height-35 rounded p-0 text-left f-15"
                                    placeholder="<?php echo app('translator')->get('placeholders.date'); ?>"
                                    value="<?php echo e(now(company()->timezone)->format(company()->date_format)); ?>">
                            </div>
                            <small class="form-text text-muted"><?php echo app('translator')->get('modules.recurringInvoice.invoiceDate'); ?></small>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-0">
                        <?php if (isset($component)) { $__componentOriginal1fded940a0a5d34bf1b88a1f45916593 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1fded940a0a5d34bf1b88a1f45916593 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Number::resolve(['fieldLabel' => __('modules.invoices.totalCount'),'fieldName' => 'billing_cycle','fieldId' => 'billing_cycle','fieldHelp' => __('modules.invoices.noOfBillingCycle'),'fieldRequired' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.number'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Number::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-0 mr-lg-2 mr-md-2 mt-0']); ?>
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
                </div>
            </div>

            <div class="col-md-4 mt-4 information-box">
                <p id="plan"><?php echo app('translator')->get('app.customerChargedDaily'); ?></p>
                <p id="current_date"><?php echo app('translator')->get('modules.recurringInvoice.currentInvoiceDate'); ?> <span class="font-weight-bold"><?php echo e(now()->translatedFormat(company()->date_format)); ?></span></p>
                <p id="next_date"><?php echo app('translator')->get('modules.recurringInvoice.nextInvoiceDate'); ?> <span class="font-weight-bold"><?php echo e(now()->addDay()->translatedFormat(company()->date_format)); ?></span></p>
                <p><?php echo app('translator')->get('modules.recurringInvoice.soOn'); ?></p>
                <span id="billing"></span>
            </div>

        </div>

        <hr class="m-0 border-top-grey">

        <?php if(in_array('products', user_modules()) || in_array('purchase', user_modules())): ?>
            <div class="d-flex px-4 py-3">
                <div class="form-group">
                    <?php if (isset($component)) { $__componentOriginalcbf9105fd4879d5d6ef9e1f6fe271af7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcbf9105fd4879d5d6ef9e1f6fe271af7 = $attributes; } ?>
<?php $component = App\View\Components\Forms\InputGroup::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.input-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\InputGroup::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                        <select class="form-control select-picker" data-live-search="true" data-size="8" id="add-products" title="<?php echo e(__('app.menu.selectProduct')); ?>">
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option data-content="<?php echo e($item->title); ?>" value="<?php echo e($item->id); ?>">
                                    <?php echo e($item->title); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php if($addProductPermission == 'all' || $addProductPermission == 'added'): ?>
                             <?php $__env->slot('append', null, []); ?> 
                                <a href="<?php echo e(route('products.create')); ?>" data-redirect-url="no"
                                class="btn btn-outline-secondary border-grey openRightModal"
                                data-toggle="tooltip"
                                data-original-title="<?php echo e(__('app.add').' '.__('modules.dashboard.newproduct')); ?>"><?php echo app('translator')->get('app.add'); ?></a>
                             <?php $__env->endSlot(); ?>
                        <?php endif; ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcbf9105fd4879d5d6ef9e1f6fe271af7)): ?>
<?php $attributes = $__attributesOriginalcbf9105fd4879d5d6ef9e1f6fe271af7; ?>
<?php unset($__attributesOriginalcbf9105fd4879d5d6ef9e1f6fe271af7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcbf9105fd4879d5d6ef9e1f6fe271af7)): ?>
<?php $component = $__componentOriginalcbf9105fd4879d5d6ef9e1f6fe271af7; ?>
<?php unset($__componentOriginalcbf9105fd4879d5d6ef9e1f6fe271af7); ?>
<?php endif; ?>

                </div>
            </div>
        <?php endif; ?>

        <div id="sortable">
        <?php if(isset($estimate)): ?>
            <?php $__currentLoopData = $estimate->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <!-- DESKTOP DESCRIPTION TABLE START -->
                    <div class="d-flex px-4 py-3 c-inv-desc item-row">

                        <div class="c-inv-desc-table w-100 d-lg-flex d-md-flex d-block">
                            <table width="100%">
                                <tbody>
                                <tr class="text-dark-grey font-weight-bold f-14">
                                    <td width="<?php echo e($invoiceSetting->hsn_sac_code_show ? '40%' : '50%'); ?>"
                                        class="border-0 inv-desc-mbl btlr"><?php echo app('translator')->get('app.description'); ?></td>
                                    <?php if($invoiceSetting->hsn_sac_code_show): ?>
                                        <td width="10%" class="border-0" align="right"><?php echo app('translator')->get("app.hsnSac"); ?></td>
                                    <?php endif; ?>
                                    <td width="10%" class="border-0" align="right">
                                        <?php echo app('translator')->get('modules.invoices.qty'); ?>
                                    </td>
                                    <td width="10%" class="border-0" align="right">
                                        <?php echo app('translator')->get("modules.invoices.unitPrice"); ?></td>
                                    <td width="13%" class="border-0" align="right"><?php echo app('translator')->get('modules.invoices.tax'); ?>
                                    </td>
                                    <td width="17%" class="border-0 bblr-mbl" align="right">
                                        <?php echo app('translator')->get('modules.invoices.amount'); ?></td>
                                </tr>
                                <tr>
                                    <td class="border-bottom-0 btrr-mbl btlr">
                                        <input type="text" class="form-control f-14 border-0 w-100 item_name"
                                               name="item_name[]" placeholder="<?php echo app('translator')->get('modules.expenses.itemName'); ?>"
                                               value="<?php echo e($item->item_name); ?>">
                                    </td>
                                    <td class="border-bottom-0 d-block d-lg-none d-md-none">
                                            <textarea class="f-14 border-0 w-100 mobile-description"
                                                      placeholder="<?php echo app('translator')->get('placeholders.invoices.description'); ?>"
                                                      name="item_summary[]"><?php echo e($item->item_summary); ?></textarea>
                                    </td>
                                    <?php if($invoiceSetting->hsn_sac_code_show): ?>
                                        <td class="border-bottom-0">
                                            <input type="text"
                                                   class="form-control f-14 border-0 w-100 text-right hsn_sac_code"
                                                   value="<?php echo e($item->hsn_sac_code); ?>" name="hsn_sac_code[]">
                                        </td>
                                    <?php endif; ?>
                                    <td class="border-bottom-0">
                                        <input type="number" min="1"
                                               class="form-control f-14 border-0 w-100 text-right quantity mt-3"
                                               value="<?php echo e($item->quantity); ?>" name="quantity[]">

                                            <?php if(!is_null($item->product_id) && $item->product_id != 0): ?>
                                               <span class="text-dark-grey float-right border-0 f-12"><?php echo e($item->unit->unit_type); ?></span>
                                               <input type="hidden" name="product_id[]" value="<?php echo e($item->product_id); ?>">
                                               <input type="hidden" name="unit_id[]" value="<?php echo e($item->unit_id); ?>">
                                           <?php else: ?>
                                               <select class="text-dark-grey float-right border-0 f-12" name="unit_id[]">
                                                   <?php $__currentLoopData = $units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                       <option
                                                       <?php if($item->unit_id == $unit->id): ?> selected <?php endif; ?>
                                                       value="<?php echo e($unit->id); ?>"><?php echo e($unit->unit_type); ?></option>
                                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                               </select>
                                               <input type="hidden" name="product_id[]" value="">
                                           <?php endif; ?>
                                    </td>
                                    <td class="border-bottom-0">
                                        <input type="number" min="1"
                                               class="f-14 border-0 w-100 text-right cost_per_item" placeholder="0.00"
                                               value="<?php echo e($item->unit_price); ?>" name="cost_per_item[]">
                                    </td>
                                    <td class="border-bottom-0">
                                        <div class="select-others height-35 rounded border-0">
                                            <select id="multiselect" name="taxes[<?php echo e($key); ?>][]"
                                                    multiple="multiple"
                                                    class="select-picker type customSequence border-0" data-size="3">
                                                <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option data-rate="<?php echo e($tax->rate_percent); ?>" data-tax-text="<?php echo e($tax->tax_name .':'. $tax->rate_percent); ?>%"
                                                            <?php if(isset($item->taxes) && array_search($tax->id, json_decode($item->taxes)) !== false): ?> selected
                                                            <?php endif; ?>
                                                            value="<?php echo e($tax->id); ?>"><?php echo e($tax->tax_name); ?>:
                                                        <?php echo e($tax->rate_percent); ?>%
                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </td>
                                    <td rowspan="2" align="right" valign="top" class="bg-amt-grey btrr-bbrr">
                                            <span
                                                class="amount-html"><?php echo e(number_format((float) $item->amount, 2, '.', '')); ?></span>
                                        <input type="hidden" class="amount" name="amount[]"
                                               value="<?php echo e($item->amount); ?>">
                                    </td>
                                </tr>
                                <tr class="d-none d-md-block d-lg-table-row">
                                    <td colspan="<?php echo e($invoiceSetting->hsn_sac_code_show ? '4' : '3'); ?>"
                                        class="dash-border-top bblr">
                                            <textarea class="f-14 border-0 w-100 desktop-description"
                                                      name="item_summary[]"
                                                      placeholder="<?php echo app('translator')->get('placeholders.invoices.description'); ?>"><?php echo e($item->item_summary); ?></textarea>
                                    </td>
                                    <td class="border-left-0">
                                        <input type="file" class="dropify" name="invoice_item_image[]"
                                               data-allowed-file-extensions="png jpg jpeg bmp" data-messages-default="test"
                                               data-height="70"/>
                                        <input type="hidden" name="invoice_item_image_url[]">
                                    </td>
                                </tr>
                                </tbody>
                            </table>

                            <a href="javascript:;"
                               class="d-flex align-items-center justify-content-center ml-3 remove-item"><i
                                    class="fa fa-times-circle f-20 text-lightest"></i></a>
                        </div>
                    </div>
                    <!-- DESKTOP DESCRIPTION TABLE END -->
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <!-- DESKTOP DESCRIPTION TABLE START -->
                <div class="d-flex px-4 py-3 c-inv-desc item-row">

                    <div class="c-inv-desc-table w-100 d-lg-flex d-md-flex d-block">
                        <table width="100%">
                            <tbody>
                            <tr class="text-dark-grey font-weight-bold f-14">
                                <td width="<?php echo e($invoiceSetting->hsn_sac_code_show ? '40%' : '50%'); ?>"
                                    class="border-0 inv-desc-mbl btlr"><?php echo app('translator')->get('app.description'); ?></td>
                                <?php if($invoiceSetting->hsn_sac_code_show): ?>
                                    <td width="10%" class="border-0" align="right"><?php echo app('translator')->get("app.hsnSac"); ?></td>
                                <?php endif; ?>
                                <td width="10%" class="border-0" align="right"><?php echo app('translator')->get('modules.invoices.qty'); ?></td>
                                <td width="10%" class="border-0" align="right"><?php echo app('translator')->get("modules.invoices.unitPrice"); ?>
                                </td>
                                <td width="13%" class="border-0" align="right"><?php echo app('translator')->get('modules.invoices.tax'); ?></td>
                                <td width="17%" class="border-0 bblr-mbl" align="right">
                                    <?php echo app('translator')->get('modules.invoices.amount'); ?></td>
                            </tr>
                            <tr>
                                <td class="border-bottom-0 btrr-mbl btlr">
                                    <input type="text" class="form-control f-14 border-0 w-100 item_name"
                                           name="item_name[]" placeholder="<?php echo app('translator')->get('modules.expenses.itemName'); ?>">
                                </td>
                                <td class="border-bottom-0 d-block d-lg-none d-md-none">
                                    <input type="text" class="f-14 border-0 w-100 mobile-description"
                                           name="item_summary[]"
                                           placeholder="<?php echo app('translator')->get('placeholders.invoices.description'); ?>">
                                </td>
                                <?php if($invoiceSetting->hsn_sac_code_show): ?>
                                    <td class="border-bottom-0">
                                        <input type="text"
                                               class="form-control f-14 border-0 w-100 text-right hsn_sac_code"
                                               value="" name="hsn_sac_code[]">
                                    </td>
                                <?php endif; ?>
                                <td class="border-bottom-0">
                                    <input type="number" min="1"
                                           class="form-control f-14 border-0 w-100 text-right quantity mt-3" value="1"
                                           name="quantity[]">

                                    <select class="text-dark-grey float-right border-0 f-12" name="unit_id[]">
                                        <?php $__currentLoopData = $units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option
                                            value="<?php echo e($unit->id); ?>"><?php echo e($unit->unit_type); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <input type="hidden" name="product_id[]" value="">
                                </td>
                                <td class="border-bottom-0">
                                    <input type="number" min="1"
                                           class="f-14 border-0 w-100 text-right cost_per_item" placeholder="0.00"
                                           value="0" name="cost_per_item[]">
                                </td>
                                <td class="border-bottom-0">
                                    <div class="select-others height-35 rounded border-0">
                                        <select id="multiselect" name="taxes[0][]" multiple="multiple"
                                                class="select-picker type customSequence border-0" data-size="3">
                                            <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option data-rate="<?php echo e($tax->rate_percent); ?>" data-tax-text="<?php echo e($tax->tax_name .':'. $tax->rate_percent); ?>%"
                                                        value="<?php echo e($tax->id); ?>"><?php echo e($tax->tax_name); ?>:
                                                    <?php echo e($tax->rate_percent); ?>%
                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </td>
                                <td rowspan="2" align="right" valign="top" class="bg-amt-grey btrr-bbrr">
                                    <span class="amount-html">0.00</span>
                                    <input type="hidden" class="amount" name="amount[]" value="0">
                                </td>
                            </tr>
                            <tr class="d-none d-md-table-row d-lg-table-row">
                                <td colspan="<?php echo e($invoiceSetting->hsn_sac_code_show ? '4' : '3'); ?>"
                                    class="dash-border-top bblr">
                                    <input type="text" class="form-control f-14 border-0 w-100 desktop-description"
                                           name="item_summary[]"
                                           placeholder="<?php echo app('translator')->get('placeholders.invoices.description'); ?>">
                                </td>
                                <td class="border-left-0">
                                    <input type="file" class="dropify" name="invoice_item_image[]"
                                           data-allowed-file-extensions="png jpg jpeg bmp" data-messages-default="test"
                                           data-height="70"/>
                                    <input type="hidden" name="invoice_item_image_url[]">
                                </td>
                            </tr>
                            </tbody>
                        </table>

                        <a href="javascript:;"
                           class="d-flex align-items-center justify-content-center ml-3 remove-item"><i
                                class="fa fa-times-circle f-20 text-lightest"></i></a>
                    </div>
                </div>
                <!-- DESKTOP DESCRIPTION TABLE END -->
            <?php endif; ?>

        </div>
        <!--  ADD ITEM START-->
        <div class="row px-lg-4 px-md-4 px-3 pb-3 pt-0 mb-3  mt-2">
            <div class="col-md-12">
                <a class="f-15 f-w-500" href="javascript:;" id="add-item"><i
                        class="icons icon-plus font-weight-bold mr-1"></i><?php echo app('translator')->get('modules.invoices.addItem'); ?></a>
            </div>
        </div>
        <!--  ADD ITEM END-->

        <hr class="m-0 border-top-grey">

        <!-- TOTAL, DISCOUNT START -->
        <div class="d-flex px-lg-4 px-md-4 px-3 pb-3 c-inv-total">
            <table width="100%" class="text-right f-14 text-capitalize">
                <tbody>
                <tr>
                    <td width="50%" class="border-0 d-lg-table d-md-table d-none"></td>
                    <td width="50%" class="p-0 border-0 c-inv-total-right">
                        <table width="100%">
                            <tbody>
                            <tr>
                                <td colspan="2" class="border-top-0 text-dark-grey">
                                    <?php echo app('translator')->get('modules.invoices.subTotal'); ?></td>
                                <td width="30%" class="border-top-0 sub-total">0.00</td>
                                <input type="hidden" class="sub-total-field" name="sub_total" value="0">
                            </tr>
                            <tr>
                                <td width="20%" class="text-dark-grey"><?php echo app('translator')->get('modules.invoices.discount'); ?>
                                </td>
                                <td width="40%" style="padding: 5px;">
                                    <table width="100%">
                                        <tbody>
                                        <tr>
                                            <td width="70%" class="c-inv-sub-padding">
                                                <input type="number" min="0" name="discount_value"
                                                       class="form-control f-14 border-0 w-100 text-right discount_value"
                                                       placeholder="0"
                                                       value="<?php echo e(isset($estimate) ? $estimate->discount : '0'); ?>">
                                            </td>
                                            <td width="30%" align="left" class="c-inv-sub-padding">
                                                <div
                                                    class="select-others select-tax height-35 rounded border-0">
                                                    <select class="form-control select-picker"
                                                            id="discount_type" name="discount_type">
                                                        <option
                                                            <?php if(isset($estimate) && $estimate->discount_type == 'percent'): ?> selected
                                                            <?php endif; ?>
                                                            value="percent">%
                                                        </option>
                                                        <option
                                                            <?php if(isset($estimate) && $estimate->discount_type == 'fixed'): ?> selected
                                                            <?php endif; ?>
                                                            value="fixed">
                                                            <?php echo app('translator')->get('modules.invoices.amount'); ?></option>
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td><span
                                        id="discount_amount"><?php echo e(isset($estimate) ? number_format((float) $estimate->discount, 2, '.', '') : '0.00'); ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td><?php echo app('translator')->get('modules.invoices.tax'); ?></td>
                                <td colspan="2" class="p-0 border-0">
                                    <table width="100%" id="invoice-taxes">
                                        <tr>
                                            <td colspan="2"><span class="tax-percent">0.00</span></td>
                                        </tr>
                                    </table>
                                </td>

                            </tr>
                            <tr class="bg-amt-grey f-16 f-w-500">
                                <td colspan="2"><?php echo app('translator')->get('modules.invoices.total'); ?></td>
                                <td><span class="total">0.00</span></td>
                                <input type="hidden" class="total-field" name="total" value="0">
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <!-- TOTAL, DISCOUNT END -->

        <!-- NOTE AND TERMS AND CONDITIONS START -->
        <div class="d-flex flex-wrap px-lg-4 px-md-4 px-3 py-3">
            <div class="col-md-6 col-sm-12 c-inv-note-terms p-0 mb-lg-0 mb-md-0 mb-3">
                <label class="f-14 text-dark-grey mb-12 text-capitalize w-100"
                       for="usr"><?php echo app('translator')->get('modules.invoices.note'); ?></label>
                <textarea class="form-control" name="note" id="note" rows="4"
                          placeholder="<?php echo app('translator')->get('placeholders.invoices.note'); ?>"></textarea>
            </div>
            <div class="col-md-6 col-sm-12 p-0 c-inv-note-terms">
                <label class="f-14 text-dark-grey mb-12 text-capitalize w-100"
                       for="usr"><?php echo app('translator')->get('modules.invoiceSettings.invoiceTerms'); ?></label>
                <p>
                    <?php echo nl2br($invoiceSetting->invoice_terms); ?>

                </p>
            </div>
        </div>
        <!-- NOTE AND TERMS AND CONDITIONS END -->


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
<?php $component->withAttributes(['id' => 'save-form']); ?><?php echo app('translator')->get('app.save'); ?> <?php echo $__env->renderComponent(); ?>
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
<?php $component = App\View\Components\Forms\ButtonCancel::resolve(['link' => route('recurring-invoices.index')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-cancel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonCancel::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'border-0 ml-3']); ?><?php echo app('translator')->get('app.cancel'); ?>
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
    <!-- FORM END -->
</div>
<!-- CREATE INVOICE END -->

<script>
    $(document).ready(function () {


        const hsn_status = <?php echo e($invoiceSetting->hsn_sac_code_show); ?>;
        const defaultClient = "<?php echo e(request('default_client')); ?>";

        $('.custom-date-picker').each(function(ind, el) {
            datepicker(el, {
                position: 'bl',
                ...datepickerConfig
            });
        });

        const dp1 = datepicker('#start_date', {
            position: 'bl',
            onSelect: (instance, date) => {
                var rotation = $('#rotation').val();
                nextDate(rotation, date);
            },
            ...datepickerConfig
        });

        $('#client_list_id').change(function () {
            var id = $(this).val();
            var url = "<?php echo e(route('clients.project_list', ':id')); ?>";
            url = url.replace(':id', id);
            var token = "<?php echo e(csrf_token()); ?>";

            $.easyAjax({
                url: url,
                container: '#saveInvoiceForm',
                type: "POST",
                blockUI: true,
                data: {
                    _token: token
                },
                success: function (response) {
                    if (response.status == 'success') {
                        $('#project_id').html(response.data);
                        $('#project_id').selectpicker('refresh');
                    }
                }
            });

            var url = "<?php echo e(route('clients.ajax_details', ':id')); ?>";
            url = url.replace(':id', id);

            $.easyAjax({
                url: url,
                container: '#saveInvoiceForm',
                type: "POST",
                blockUI: true,
                data: {
                    _token: token
                },
                success: function (response) {
                    if (response.status == 'success') {
                        $('#client_billing_address').html(nl2br(response.data.client_details.address));
                        $('#add-shipping-field').addClass('d-none');
                        $('#client_shipping_address').removeClass('d-none');

                        if (response.data.client_details.shipping_address === null) {
                            var addShippingLink =
                                '<a href="javascript:;" class="text-capitalize" id="show-shipping-field"><i class="f-12 mr-2 fa fa-plus"></i><?php echo app('translator')->get("app.addShippingAddress"); ?></a>';
                            $('#client_shipping_address').html(addShippingLink);
                        } else {
                            $('#client_shipping_address').html(nl2br(response.data.client_details.shipping_address));
                        }
                    }
                }
            });

        });

        $('body').on('click', '#show-shipping-field', function () {
            $('#add-shipping-field, #client_shipping_address').toggleClass('d-none');
        });

        $('#add-products').on('changed.bs.select', function (e, clickedIndex, isSelected, previousValue) {
            e.stopImmediatePropagation()
            var id = $(this).val();
            if (previousValue != id && id != '') {
                addProduct(id);
            }
        });

        function ucWord(str){
            str = str.toLowerCase().replace(/\b[a-z]/g, function(letter) {
                return letter.toUpperCase();
            });
            return str;
        }

        function addProduct(id) {
            var currencyId = $('#currency_id').val();

            $.easyAjax({
                url: "<?php echo e(route('invoices.add_item')); ?>",
                type: "GET",
                data: {
                    id: id,
                    currencyId: currencyId
                },
                blockUI: true,
                success: function (response) {
                    if ($('input[name="item_name[]"]').val() == '') {
                        $("#sortable .item-row").remove();
                    }
                    $(response.view).hide().appendTo("#sortable").fadeIn(500);
                    calculateTotal();

                    var noOfRows = $(document).find('#sortable .item-row').length;
                    var i = $(document).find('.item_name').length - 1;
                    var itemRow = $(document).find('#sortable .item-row:nth-child(' + noOfRows +
                        ') select.type');
                    itemRow.attr('id', 'multiselect' + i);
                    itemRow.attr('name', 'taxes[' + i + '][]');
                    $(document).find('#multiselect' + i).selectpicker();
                }
            });
        }

        $(document).on('click', '#add-item', function() {

            var i = $(document).find('.item_name').length;
            var item = ' <div class="d-flex px-4 py-3 c-inv-desc item-row">' +
                '<div class="c-inv-desc-table w-100 d-lg-flex d-md-flex d-block">' +
                '<table width="100%">' +
                '<tbody>' +
                '<tr class="text-dark-grey font-weight-bold f-14">' +
                '<td width="<?php echo e($invoiceSetting->hsn_sac_code_show ? '40%' : '50%'); ?>" class="border-0 inv-desc-mbl btlr"><?php echo app('translator')->get("app.description"); ?></td>';

            if (hsn_status == 1) {
                item += '<td width="10%" class="border-0" align="right"><?php echo app('translator')->get("app.hsnSac"); ?></td>';
            }

            item +=
                `
                <td width="10%" class="border-0" align="right"><?php echo app('translator')->get("modules.invoices.qty"); ?></td>
                <td width="10%" class="border-0" align="right"><?php echo app('translator')->get("modules.invoices.unitPrice"); ?></td>
                <td width="13%" class="border-0" align="right"><?php echo app('translator')->get("modules.invoices.tax"); ?></td>
                <td width="17%" class="border-0 bblr-mbl" align="right"><?php echo app('translator')->get("modules.invoices.amount"); ?></td>
                </tr>` +
                '<tr>' +
                '<td class="border-bottom-0 btrr-mbl btlr">' +
                `<input type="text" class="form-control f-14 border-0 w-100 item_name" name="item_name[]" placeholder="<?php echo app('translator')->get("modules.expenses.itemName"); ?>">` +
                '</td>' +
                '<td class="border-bottom-0 d-block d-lg-none d-md-none">' +
                `<textarea class="f-14 border-0 w-100 mobile-description form-control" name="item_summary[]" placeholder="<?php echo app('translator')->get("placeholders.invoices.description"); ?>"></textarea>` +
                '</td>';

            if (hsn_status == 1) {
                item += '<td class="border-bottom-0">' +
                    '<input type="text" min="1" class="form-control f-14 border-0 w-100 text-right hsn_sac_code" name="hsn_sac_code[]" >' +
                    '</td>';
            }
            item += '<td class="border-bottom-0">' +
                '<input type="number" min="1" class="form-control f-14 border-0 w-100 text-right quantity mt-3" value="1" name="quantity[]">' +
                `<select class="text-dark-grey float-right border-0 f-12" name="unit_id[]">
                    <?php $__currentLoopData = $units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option
                        <?php if($unit->default == 1): ?> selected <?php endif; ?>
                        value="<?php echo e($unit->id); ?>"><?php echo e($unit->unit_type); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <input type="hidden" name="product_id[]" value="">`+
                '</td>' +
                '<td class="border-bottom-0">' +
                '<input type="number" min="1" class="f-14 border-0 w-100 text-right cost_per_item" placeholder="0.00" value="0" name="cost_per_item[]">' +
                '</td>' +
                '<td class="border-bottom-0">' +
                '<div class="select-others height-35 rounded border-0">' +
                '<select id="multiselect' + i + '" name="taxes[' + i +
                '][]" multiple="multiple" class="select-picker type customSequence" data-size="3">'
            <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                +'<option data-rate="<?php echo e($tax->rate_percent); ?>" data-tax-text="<?php echo e($tax->tax_name .':'. $tax->rate_percent); ?>%" value="<?php echo e($tax->id); ?>">'
                    +'<?php echo e($tax->tax_name); ?>:<?php echo e($tax->rate_percent); ?>%</option>'
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                +
                '</select>' +
                '</div>' +
                '</td>' +
                '<td rowspan="2" align="right" valign="top" class="bg-amt-grey btrr-bbrr">' +
                '<span class="amount-html">0.00</span>' +
                '<input type="hidden" class="amount" name="amount[]" value="0">' +
                '</td>' +
                '</tr>' +
                '<tr class="d-none d-md-table-row d-lg-table-row">' +
                '<td colspan="<?php echo e($invoiceSetting->hsn_sac_code_show ? 4 : 3); ?>" class="dash-border-top bblr">' +
                '<textarea class="f-14 border-0 w-100 desktop-description form-control" name="item_summary[]" placeholder="<?php echo app('translator')->get("placeholders.invoices.description"); ?>"></textarea>' +
                '</td>' +
                '<td class="border-left-0">' +
                '<input type="file" class="dropify" id="dropify'+i+'" name="invoice_item_image[]" data-allowed-file-extensions="png jpg jpeg bmp" data-messages-default="test" data-height="70" /><input type="hidden" name="invoice_item_image_url[]">' +
                '</td>' +
                '</tr>' +
                '</tbody>' +
                '</table>' +
                '</div>' +
                '<a href="javascript:;" class="d-flex align-items-center justify-content-center ml-3 remove-item"><i class="fa fa-times-circle f-20 text-lightest"></i></a>' +
                '</div>';
            $(item).hide().appendTo("#sortable").fadeIn(500);
            $('#multiselect' + i).selectpicker();

            $('#dropify' + i).dropify({
                messages: dropifyMessages
            });
        });

        $('#saveInvoiceForm').on('click', '.remove-item', function () {
            $(this).closest('.item-row').fadeOut(300, function () {
                $(this).remove();
                $('select.customSequence').each(function (index) {
                    $(this).attr('name', 'taxes[' + index + '][]');
                    $(this).attr('id', 'multiselect' + index + '');
                });
                calculateTotal();
            });
        });

        $('#save-form').click(function () {
            var type = $(this).data('type');

            if (KTUtil.isMobileDevice()) {
                $('.desktop-description').remove();
            } else {
                $('.mobile-description').remove();
            }

            calculateTotal();

            var discount = $('#discount_amount').html();
            var total = $('.sub-total-field').val();

            if (parseFloat(discount) > parseFloat(total)) {
                Swal.fire({
                    icon: 'error',
                    text: "<?php echo e(__('messages.discountExceed')); ?>",

                    customClass: {
                        confirmButton: 'btn btn-primary',
                    },
                    showClass: {
                        popup: 'swal2-noanimation',
                        backdrop: 'swal2-noanimation'
                    },
                    buttonsStyling: false
                });
                return false;
            }

            $.easyAjax({
                url: "<?php echo e(route('recurring-invoices.store')); ?>" + "?type=" + type,
                container: '#saveInvoiceForm',
                type: "POST",
                blockUI: true,
                redirect: true,
                disableButton: true,
                file: true,
                data: $('#saveInvoiceForm').serialize()
            })
        });

        $('#saveInvoiceForm').on('click', '.remove-item', function () {
            $(this).closest('.item-row').fadeOut(300, function () {
                $(this).remove();
                $('select.customSequence').each(function (index) {
                    $(this).attr('name', 'taxes[' + index + '][]');
                    $(this).attr('id', 'multiselect' + index + '');
                });
                calculateTotal();
            });
        });

        $('#saveInvoiceForm').on('keyup', '.quantity,.cost_per_item,.item_name, .discount_value', function () {
            var quantity = $(this).closest('.item-row').find('.quantity').val();
            var perItemCost = $(this).closest('.item-row').find('.cost_per_item').val();
            var amount = (quantity * perItemCost);

            $(this).closest('.item-row').find('.amount').val(decimalupto2(amount));
            $(this).closest('.item-row').find('.amount-html').html(decimalupto2(amount));

            calculateTotal();
        });

        $('#saveInvoiceForm').on('change', '.type, #discount_type, #calculate_tax', function () {
            var quantity = $(this).closest('.item-row').find('.quantity').val();
            var perItemCost = $(this).closest('.item-row').find('.cost_per_item').val();
            var amount = (quantity * perItemCost);

            $(this).closest('.item-row').find('.amount').val(decimalupto2(amount));
            $(this).closest('.item-row').find('.amount-html').html(decimalupto2(amount));

            calculateTotal();
        });

        $('#saveInvoiceForm').on('input', '.quantity', function () {
            var quantity = $(this).closest('.item-row').find('.quantity').val();
            var perItemCost = $(this).closest('.item-row').find('.cost_per_item').val();
            var amount = (quantity * perItemCost);

            $(this).closest('.item-row').find('.amount').val(decimalupto2(amount));
            $(this).closest('.item-row').find('.amount-html').html(decimalupto2(amount));

            calculateTotal();
        });

        calculateTotal();

        init(RIGHT_MODAL);
    });

    $('#show_shipping_address').change(function () {
        $(this).is(':checked') ? $('#shipping_address_div').removeClass('d-none') : $('#shipping_address_div')
            .addClass('d-none');
    });

    $('body').on('change keyup', '#rotation, #billing_cycle', function () {
        var billingCycle = $('#billing_cycle').val();
        billingCycle != '' ? $('#billing').html("<?php echo e(__('modules.recurringInvoice.billingCycle')); ?>" + ' ' + billingCycle) : $('#billing').html('');

        var rotation = $('#rotation').val();
        switch (rotation) {
            case 'daily':
                var rotationType = "<?php echo e(__('app.daily')); ?>";
                break;
            case 'weekly':
                var rotationType = "<?php echo e(__('app.every')); ?>"+' '+"<?php echo e(__('modules.recurringInvoice.week')); ?>";
                break;
            case 'bi-weekly':
                var rotationType = "<?php echo e(__('app.every')); ?>"+' '+"<?php echo e(__('app.bi-week')); ?>";
                break;
            case 'monthly':
                var rotationType = "<?php echo e(__('app.every')); ?>"+' '+"<?php echo e(__('app.month')); ?>";
                break;
            case 'quarterly':
                var rotationType = "<?php echo e(__('app.every')); ?>"+' '+"<?php echo e(__('app.quarter')); ?>";
                break;
            case 'half-yearly':
                var rotationType = "<?php echo e(__('app.every')); ?>"+' '+"<?php echo e(__('app.half-year')); ?>";
                break;
            case 'annually':
                var rotationType = "<?php echo e(__('app.every')); ?>"+' '+"<?php echo e(__('app.year')); ?>";
                break;
            default:
            //
        }

        $('#plan').html("<?php echo e(__('modules.invoices.customerCharged')); ?>" + ' <span class="font-weight-bold">' + rotationType + '</span>');

        if ($('#immediate_invoice').is(':checked')) {
            var date = moment().toDate();
        } else {
            var startDate = $('#start_date').val();
            var date = moment(startDate, company.moment_date_format).toDate();
        }

        nextDate(rotation, date);
    })

    $('#immediate_invoice').change(function () {
        var rotation = $('#rotation').val();

        if ($(this).is(':checked')) {
            var date = moment().toDate();
            $('#start_date').val(moment(date, "DD-MM-YYYY").format('<?php echo e(company()->moment_date_format); ?>'));
            $('#start_date').prop('disabled', true)
        } else {
            $('#start_date').prop('disabled', false)
            var startDate = $('#start_date').val();
            var date = moment(startDate, company.moment_date_format).toDate();
        }

        nextDate(rotation, date);

    })

    function nextDate(rotation, date) {
        var nextDate = moment(date, "DD-MM-YYYY");
        var currentValue = nextDate.format('<?php echo e(company()->moment_date_format); ?>');

        switch (rotation) {
            case 'daily':
                var rotationDate = nextDate.add(1, 'days');
                break;
            case 'weekly':
                var rotationDate = nextDate.add(1, 'weeks');
                break;
            case 'bi-weekly':
                var rotationDate = nextDate.add(2, 'weeks');
                break;
            case 'monthly':
                var rotationDate = nextDate.add(1, 'months');
                break;
            case 'quarterly':
                var rotationDate = nextDate.add(1, 'quarters');
                break;
            case 'half-yearly':
                var rotationDate = nextDate.add(2, 'quarters');
                break;
            case 'annually':
                var rotationDate = nextDate.add(1, 'years');
                break;
            default:
            //
        }

        var value = rotationDate.format('<?php echo e(company()->moment_date_format); ?>');

        $('#current_date').html("<?php echo e(__('modules.recurringInvoice.currentInvoiceDate')); ?>" + ' <span class="font-weight-bold">' + currentValue + '</span>');

        $('#next_date').html("<?php echo e(__('modules.recurringInvoice.nextInvoiceDate')); ?>" + ' <span class="font-weight-bold">' + value + '</span>');
    }

    $('#currency_id').change(function() {
        var curId = $(this).val();

        var token = "<?php echo e(csrf_token()); ?>";

        $.easyAjax({
            url: "<?php echo e(route('payments.account_list')); ?>",
            container: '#saveInvoiceForm',
            type: "GET",
            blockUI: true,
            data: { 'curId' : curId , _token: token},
            success: function(response) {
                if (response.status == 'success') {
                    $('#bank_account_id').html(response.data);
                    $('#bank_account_id').selectpicker('refresh');
                }
            }
        });
    });

</script>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/recurring-invoices/ajax/create.blade.php ENDPATH**/ ?>