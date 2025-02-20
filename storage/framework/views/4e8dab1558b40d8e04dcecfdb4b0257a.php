

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
        <?php if(isset($type) && $type == 'proposal'): ?>
            <input type="hidden" name="proposal_id" value="<?php echo e($proposalId); ?>">
        <?php endif; ?>
        <?php if(isset($type) && $type == 'estimate'): ?>
            <input type="hidden" name="estimate_id" value="<?php echo e($estimateId); ?>">
        <?php endif; ?>

        <!-- INVOICE NUMBER, DATE, DUE DATE, FREQUENCY START -->
        <div class="row px-lg-4 px-md-4 px-3 py-3">
            <!-- INVOICE NUMBER START -->
            <div class="col-md-3">
                <div class="form-group mb-lg-0 mb-md-0 mb-4">
                    <label class="f-14 text-dark-grey mb-12 text-capitalize"
                        for="usr"><?php echo app('translator')->get('modules.invoices.invoiceNumber'); ?></label>
                    <div class="input-group">
                        <div class="input-group-prepend  height-35 ">
                            <span class="input-group-text border-grey f-15 bg-additional-grey px-3 text-dark"
                                id="basic-addon1"><?php echo e($invoiceSetting->invoice_prefix); ?><?php echo e($invoiceSetting->invoice_number_separator); ?><?php echo e($zero); ?></span>
                        </div>
                        <input type="text" name="invoice_number" id="invoice_number"
                            class="form-control height-35 f-15 readonly-background" readonly value="<?php if(is_null($lastInvoice)): ?> 1 <?php else: ?><?php echo e($lastInvoice); ?> <?php endif; ?>" placeholder="0019" aria-label="0019" aria-describedby="basic-addon1">
                    </div>
                </div>
            </div>
            <!-- INVOICE NUMBER END -->
            <!-- INVOICE DATE START -->
            <div class="col-md-3">
                <div class="form-group mb-lg-0 mb-md-0 mb-4">
                    <?php if (isset($component)) { $__componentOriginal89b295b0763c93abe0143426334eb5d6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal89b295b0763c93abe0143426334eb5d6 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Label::resolve(['fieldId' => 'due_date','fieldLabel' => __('modules.invoices.invoiceDate')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                    <div class="input-group">
                        <input type="text" id="invoice_date" name="issue_date"
                            class="px-6 position-relative text-dark font-weight-normal form-control height-35 rounded p-0 text-left f-15"
                            placeholder="<?php echo app('translator')->get('placeholders.date'); ?>"
                            value="<?php echo e(now(company()->timezone)->format(company()->date_format)); ?>">
                    </div>
                </div>
            </div>
            <!-- INVOICE DATE END -->
            <!-- DUE DATE START -->
            <div class="col-md-3">
                <div class="form-group mb-lg-0 mb-md-0 mb-4">
                    <?php if (isset($component)) { $__componentOriginal89b295b0763c93abe0143426334eb5d6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal89b295b0763c93abe0143426334eb5d6 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Label::resolve(['fieldId' => 'due_date','fieldLabel' => __('app.dueDate')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Label::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal89b295b0763c93abe0143426334eb5d6)): ?>
<?php $attributes = $__attributesOriginal89b295b0763c93abe0143426334eb5d6; ?>
<?php unset($__attributesOriginal89b295b0763c93abe0143426334eb5d6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal89b295b0763c93abe0143426334eb5d6)): ?>
<?php $component = $__componentOriginal89b295b0763c93abe0143426334eb5d6; ?>
<?php unset($__componentOriginal89b295b0763c93abe0143426334eb5d6); ?>
<?php endif; ?>
                    <div class="input-group ">
                        <input type="text" id="due_date" name="due_date"
                            class="px-6 position-relative text-dark font-weight-normal form-control height-35 rounded p-0 text-left f-15"
                            placeholder="<?php echo app('translator')->get('placeholders.date'); ?>"
                            value="<?php echo e(now(company()->timezone)->addDays($invoiceSetting->due_after)->format(company()->date_format)); ?>">
                    </div>
                </div>
            </div>
            <!-- DUE DATE END -->
            <!-- FREQUENCY START -->
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
                                            <?php if($currency->id==$estimate->currency_id): echo 'selected'; endif; ?>
                                        <?php else: ?>
                                            <?php if($currency->id == company()->currency_id): echo 'selected'; endif; ?>
                                        <?php endif; ?>
                                        value="<?php echo e($currency->id); ?>">
                                    <?php echo e($currency->currency_code . ' (' . $currency->currency_symbol . ')'); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
            </div>
            <!-- FREQUENCY END -->
        </div>
        <!-- INVOICE NUMBER, DATE, DUE DATE, FREQUENCY END -->

        <hr class="m-0 border-top-grey">

        <!-- CLIENT, PROJECT, GST, BILLING, SHIPPING ADDRESS START -->
        <div class="row px-lg-4 px-md-4 px-3 pt-3">
            <!-- CLIENT START -->
            <div class="col-md-4">

                <?php if(isset($client) && !is_null($client)): ?>
                    <div class="form-group mb-lg-0 mb-md-0 mb-4">
                        <?php if (isset($component)) { $__componentOriginal89b295b0763c93abe0143426334eb5d6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal89b295b0763c93abe0143426334eb5d6 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Label::resolve(['fieldId' => 'due_date','fieldLabel' => __('app.client')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                        <div class="input-group">
                            <input type="hidden" name="client_id" id="client_id" value="<?php echo e($client->id); ?>">
                            <input type="text" value="<?php echo e($client->name_salutation); ?>"
                                class="form-control height-35 f-15 readonly-background" readonly>
                        </div>
                    </div>
                <?php else: ?>
                    <?php if (isset($component)) { $__componentOriginal89b295b0763c93abe0143426334eb5d6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal89b295b0763c93abe0143426334eb5d6 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Label::resolve(['fieldId' => 'client_id','fieldLabel' => __('app.client'),'fieldRequired' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                    <div class="form-group c-inv-select mb-4">
                        <select class="form-control select-picker" data-live-search="true" data-size="8"
                            name="client_id" id="client_id">
                            <option value="">--</option>
                            <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if (isset($component)) { $__componentOriginal6c7097547485b98631a37d273a171e9f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6c7097547485b98631a37d273a171e9f = $attributes; } ?>
<?php $component = App\View\Components\UserOption::resolve(['user' => $clientOpt,'selected' => isset($estimate) && $item->id == $estimate->client_id] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('user-option'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\UserOption::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6c7097547485b98631a37d273a171e9f)): ?>
<?php $attributes = $__attributesOriginal6c7097547485b98631a37d273a171e9f; ?>
<?php unset($__attributesOriginal6c7097547485b98631a37d273a171e9f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6c7097547485b98631a37d273a171e9f)): ?>
<?php $component = $__componentOriginal6c7097547485b98631a37d273a171e9f; ?>
<?php unset($__componentOriginal6c7097547485b98631a37d273a171e9f); ?>
<?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                <?php endif; ?>

            </div>
            <!-- CLIENT END -->

            <!-- PROJECT START -->
            <div class="col-md-4">
                <?php if(isset($project) && !is_null($project)): ?>
                    <div class="form-group mb-lg-0 mb-md-0 mb-4">
                        <?php if (isset($component)) { $__componentOriginal89b295b0763c93abe0143426334eb5d6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal89b295b0763c93abe0143426334eb5d6 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Label::resolve(['fieldId' => 'due_date','fieldLabel' => __('app.project')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                        <div class="input-group">
                            <input type="hidden" name="project_id" id="project_id" value="<?php echo e($project->id); ?>">
                            <input type="text" value="<?php echo e($project->project_name); ?>"
                                class="form-control height-35 f-15 readonly-background" readonly>
                        </div>
                    </div>
                <?php else: ?>
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
                <?php endif; ?>
            </div>
            <!-- PROJECT END -->

        </div>
        <div class="row px-lg-4 px-md-4 px-3 py-3">
            <!-- BILLING ADDRESS START -->
            <div class="col-md-4">
                <div class="form-group c-inv-select mb-0">
                    <label class="f-14 text-dark-grey mb-12 text-capitalize w-100"
                        for="usr"><?php echo app('translator')->get('modules.invoices.billingAddress'); ?></label>
                    <p class="f-15" id="client_billing_address">
                        <?php if(isset($estimate) && $estimate->client): ?>
                            <?php echo nl2br($estimate->client->clientDetails->address); ?>

                        <?php endif; ?>

                        <?php if(isset($estimate) && isset($client)): ?>
                            <?php echo nl2br($client->clientDetails->address); ?>

                        <?php endif; ?>
                    </p>
                </div>
            </div>
            <!-- BILLING ADDRESS END -->
            <!-- SHIPPING ADDRESS START -->
            <div class="col-md-4">
                <div class="form-group c-inv-select mb-lg-0 mb-md-0 mb-4">
                    <label class="f-14 text-dark-grey mb-12 text-capitalize w-100"
                        for="usr"><?php echo app('translator')->get('modules.invoices.shippingAddress'); ?> </label>
                    <p class="f-15" id="client_shipping_address">
                        <?php if(isset($estimate) && $estimate->client && $estimate->client->clientDetails->shipping_address): ?>
                            <?php echo nl2br($estimate->client->clientDetails->shipping_address); ?>

                        <?php elseif(isset($client) && $client->clientDetails && $client->clientDetails->shipping_address): ?>
                            <?php echo nl2br($client->clientDetails->shipping_address); ?>

                        <?php else: ?>
                            <a href="javascript:;" class="text-capitalize" id="show-shipping-field"><i
                                    class="f-12 mr-2 fa fa-plus"></i><?php echo app('translator')->get('app.addShippingAddress'); ?></a>
                        <?php endif; ?>
                    </p>
                    <p class="d-none" id="add-shipping-field">
                        <textarea class="form-control f-14 pt-2" rows="3" placeholder="<?php echo app('translator')->get('placeholders.address'); ?>"
                            name="shipping_address"
                            id="shipping_address"><?php if(isset($estimate) && $estimate->client): ?> <?php echo nl2br($estimate->client->clientDetails->shipping_address); ?> <?php endif; ?></textarea>
                    </p>
                </div>
            </div>
            <!-- SHIPPING ADDRESS END -->
        </div>
        <!-- CLIENT, PROJECT, GST, BILLING, SHIPPING ADDRESS END -->

            <?php if (isset($component)) { $__componentOriginalfa1d9407bf58c9650823154ec52dea3e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfa1d9407bf58c9650823154ec52dea3e = $attributes; } ?>
<?php $component = App\View\Components\Forms\CustomField::resolve(['fields' => $fields] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.custom-field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\CustomField::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfa1d9407bf58c9650823154ec52dea3e)): ?>
<?php $attributes = $__attributesOriginalfa1d9407bf58c9650823154ec52dea3e; ?>
<?php unset($__attributesOriginalfa1d9407bf58c9650823154ec52dea3e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfa1d9407bf58c9650823154ec52dea3e)): ?>
<?php $component = $__componentOriginalfa1d9407bf58c9650823154ec52dea3e; ?>
<?php unset($__componentOriginalfa1d9407bf58c9650823154ec52dea3e); ?>
<?php endif; ?>

        <hr class="m-0 border-top-grey">

        <div class="d-flex px-4 py-3">
            <div class="form-group">
                <select class="form-control select-picker" data-live-search="true" data-size="8" id="add-products">
                    <option value=""><?php echo e(__('app.menu.addProducts')); ?></option>
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option
                            data-content="<?php echo e($item->name); ?> <a href='javascript:;' class='p-1 badge badge-secondary ml-2'><i class='fa fa-plus mr-1'></i><?php echo e(__('app.add')); ?></a>"
                            value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>


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
                                        <td width="10%" class="border-0" align="right"><?php echo app('translator')->get("modules.invoices.qty"); ?>
                                        </td>
                                        <td width="10%" class="border-0" align="right"><?php echo app('translator')->get('app.sku'); ?></td>
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
                                                class="form-control f-14 border-0 w-100 text-right quantity"
                                                value="<?php echo e($item->quantity); ?>" name="quantity[]">
                                        </td>
                                        <td class="border-bottom-0">
                                            <input type="text" min="1"
                                                class="f-14 border-0 w-100 text-right form-control"
                                                placeholder="0.00" value="0" name="sku[]" readonly>
                                        </td>
                                        <td class="border-bottom-0">
                                            <input type="number" class="f-14 border-0 w-100 text-right cost_per_item"
                                                placeholder="0.00" value="<?php echo e($item->unit_price); ?>"
                                                name="cost_per_item[]" min="1">
                                        </td>
                                        <td class="border-bottom-0">
                                            <div class="select-others height-35 rounded border-0">
                                                <select id="multiselect" name="taxes[<?php echo e($key); ?>][]"
                                                    multiple="multiple"
                                                    class="select-picker type customSequence border-0" data-size="3">
                                                    <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option data-rate="<?php echo e($tax->rate_percent); ?>" data-tax-text="<?php echo e($tax->tax_name .':'. $tax->rate_percent); ?>%" <?php if(isset($item->taxes) && array_search($tax->id, json_decode($item->taxes)) !== false): ?> selected <?php endif; ?>
                                                            value="<?php echo e($tax->id); ?>">
                                                            <?php echo e($tax->tax_name); ?>:
                                                            <?php echo e($tax->rate_percent); ?>%</option>
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
                                        <td colspan="<?php echo e($invoiceSetting->hsn_sac_code_show ? '5' : '4'); ?>"
                                            class="dash-border-top bblr">
                                            <textarea class="f-14 border-0 w-100 desktop-description"
                                                name="item_summary[]"
                                                placeholder="<?php echo app('translator')->get('placeholders.invoices.description'); ?>"><?php echo e($item->item_summary); ?></textarea>
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
                                    <td width="10%" class="border-0" align="right"><?php echo app('translator')->get("modules.invoices.qty"); ?></td>
                                    <td width="10%" class="border-0" align="right"><?php echo app('translator')->get('app.sku'); ?></td>
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
                                        <textarea class="form-control f-14 border-0 w-100 mobile-description"
                                            name="item_summary[]"
                                            placeholder="<?php echo app('translator')->get('placeholders.invoices.description'); ?>"></textarea>
                                    </td>
                                    <?php if($invoiceSetting->hsn_sac_code_show): ?>
                                        <td class="border-bottom-0">
                                            <input type="text"
                                                class="form-control f-14 border-0 w-100 text-right hsn_sac_code"
                                                placeholder="" name="hsn_sac_code[]">
                                        </td>
                                    <?php endif; ?>
                                    <td class="border-bottom-0">
                                        <input type="number" min="1"
                                            class="form-control f-14 border-0 w-100 text-right quantity" value="1"
                                            name="quantity[]">
                                    </td>
                                    <td class="border-bottom-0">
                                        <input type="text" min="1"
                                            class="f-14 border-0 w-100 text-right form-control"
                                            placeholder="0.00" value="0" name="sku[]" readonly>
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
                                                        <?php echo e($tax->rate_percent); ?>%</option>
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
                                    <td colspan="<?php echo e($invoiceSetting->hsn_sac_code_show ? '5' : '4'); ?>"
                                        class="dash-border-top bblr">
                                        <textarea class="f-14 border-0 w-100 desktop-description" name="item_summary[]"
                                            placeholder="<?php echo app('translator')->get('placeholders.invoices.description'); ?>"></textarea>
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
                                        <td width="30%" class="text-dark-grey"><?php echo app('translator')->get('modules.invoices.discount'); ?>
                                        </td>
                                        <td width="30%" style="padding: 5px;">
                                            <table width="100%">
                                                <tbody>
                                                    <tr>
                                                        <td width="50%" class="c-inv-sub-padding">
                                                            <input type="number" min="0" name="discount_value"
                                                                class="form-control f-14 border-0 w-100 text-right discount_value"
                                                                placeholder="0"
                                                                value="<?php echo e(isset($estimate) ? $estimate->discount : '0'); ?>">
                                                        </td>
                                                        <td width="50%" align="left" class="c-inv-sub-padding">
                                                            <div
                                                                class="select-others select-tax height-35 rounded border-0">
                                                                <select class="form-control select-picker"
                                                                        id="discount_type" name="discount_type">
                                                                    <option
                                                                        <?php if(isset($estimate) && $estimate->discount_type == 'percent'): echo 'selected'; endif; ?>
                                                                        value="percent">%
                                                                    </option>
                                                                    <option
                                                                        <?php if(isset($estimate) && $estimate->discount_type == 'fixed'): echo 'selected'; endif; ?>
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
                <?php if (isset($component)) { $__componentOriginal89b295b0763c93abe0143426334eb5d6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal89b295b0763c93abe0143426334eb5d6 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Label::resolve(['fieldId' => '','fieldLabel' => __('modules.invoices.note')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Label::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-capitalize']); ?>
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
                <textarea class="form-control" name="note" id="note" rows="4"
                    placeholder="<?php echo app('translator')->get('placeholders.invoices.note'); ?>"></textarea>
            </div>
            <div class="col-md-6 col-sm-12 p-0 c-inv-note-terms">
                <?php if (isset($component)) { $__componentOriginal89b295b0763c93abe0143426334eb5d6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal89b295b0763c93abe0143426334eb5d6 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Label::resolve(['fieldId' => '','fieldLabel' => __('modules.invoiceSettings.invoiceTerms')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                <p>
                    <?php echo nl2br($invoiceSetting->invoice_terms); ?>

                </p>
            </div>
        </div>
        <!-- NOTE AND TERMS AND CONDITIONS END -->

        <!-- CANCEL SAVE SEND START -->
        <?php if (isset($component)) { $__componentOriginalb19caa501eea72410c04d1917a586963 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb19caa501eea72410c04d1917a586963 = $attributes; } ?>
<?php $component = App\View\Components\FormActions::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form-actions'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\FormActions::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'c-inv-btns']); ?>
            <div class="d-flex">

                <div class="inv-action dropup mr-3">
                    <button class="btn-primary dropdown-toggle" type="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <?php echo app('translator')->get('app.save'); ?>
                        <span><i class="fa fa-chevron-up f-15 text-white"></i></span>
                    </button>
                    <!-- DROPDOWN - INFORMATION -->
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuBtn" tabindex="0">
                        <li>
                            <a class="dropdown-item f-14 text-dark save-form" href="javascript:;" data-type="save">
                                <i class="fa fa-save f-w-500 mr-2 f-11"></i> <?php echo app('translator')->get('app.save'); ?>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item f-14 text-dark save-form" href="javascript:void(0);"
                                data-type="send">
                                <i class="fa fa-paper-plane f-w-500  mr-2 f-12"></i> <?php echo app('translator')->get('app.saveSend'); ?>
                            </a>
                        </li>
                    </ul>
                </div>

                <?php if (isset($component)) { $__componentOriginal5e57c6582b8a883148a28bb7ee46d2ad = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5e57c6582b8a883148a28bb7ee46d2ad = $attributes; } ?>
<?php $component = App\View\Components\Forms\ButtonSecondary::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-secondary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonSecondary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'save-form mr-3']); ?><?php echo app('translator')->get('app.saveDraft'); ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5e57c6582b8a883148a28bb7ee46d2ad)): ?>
<?php $attributes = $__attributesOriginal5e57c6582b8a883148a28bb7ee46d2ad; ?>
<?php unset($__attributesOriginal5e57c6582b8a883148a28bb7ee46d2ad); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5e57c6582b8a883148a28bb7ee46d2ad)): ?>
<?php $component = $__componentOriginal5e57c6582b8a883148a28bb7ee46d2ad; ?>
<?php unset($__componentOriginal5e57c6582b8a883148a28bb7ee46d2ad); ?>
<?php endif; ?>

            </div>

            <?php if (isset($component)) { $__componentOriginalc35c79ed7e812580313ad04118477974 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc35c79ed7e812580313ad04118477974 = $attributes; } ?>
<?php $component = App\View\Components\Forms\ButtonCancel::resolve(['link' => route('invoices.index')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
        <!-- CANCEL SAVE SEND END -->

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
    $(document).ready(function() {

        const hsn_status = <?php echo e($invoiceSetting->hsn_sac_code_show); ?>;
        const defaultClient = "<?php echo e(request('client_id')); ?>";

        $('.custom-date-picker').each(function(ind, el) {
            datepicker(el, {
                position: 'bl',
                ...datepickerConfig
            });
        });

        const dp1 = datepicker('#invoice_date', {
            position: 'bl',
            ...datepickerConfig
        });
        const dp2 = datepicker('#due_date', {
            position: 'bl',
            ...datepickerConfig
        });

        $('#client_id').change(function() {
            var id = $(this).val();
            changeClient(id);
        });

        function changeClient(id) {
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
                success: function(response) {
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
                success: function(response) {
                    if (response.status == 'success') {
                        if (response.data !== null) {
                            $('#client_billing_address').html(nl2br(response.data.client_details
                                .address));
                            $('#add-shipping-field').addClass('d-none');
                            $('#client_shipping_address').removeClass('d-none');

                            if (response.data.client_details.shipping_address === null) {
                                var addShippingLink =
                                    '<a href="javascript:;" class="text-capitalize" id="show-shipping-field"><i class="f-12 mr-2 fa fa-plus"></i><?php echo app('translator')->get("app.addShippingAddress"); ?></a>';
                                $('#client_shipping_address').html(addShippingLink);
                            } else {
                                $('#client_shipping_address').html(nl2br(response.data
                                    .client_details
                                    .shipping_address));
                            }

                        }
                    } else {
                        var addShippingLink =
                            '<a href="javascript:;" class="text-capitalize" id="show-shipping-field"><i class="f-12 mr-2 fa fa-plus"></i><?php echo app('translator')->get("app.addShippingAddress"); ?></a>';
                        $('#client_shipping_address').html(addShippingLink);
                    }
                }
            });

        }

        $('body').on('click', '#show-shipping-field', function() {
            $('#add-shipping-field, #client_shipping_address').toggleClass('d-none');
        });

        $('#add-products').on('changed.bs.select', function(e, clickedIndex, isSelected, previousValue) {
            e.stopImmediatePropagation()
            var id = $(this).val();
            if (previousValue != id && id != '') {
                addProduct(id);
            }
        });

        function addProduct(id) {
            var currencyId = $('#currency_id').val();

            $.easyAjax({
                url: "<?php echo e(route('orders.add_item')); ?>",
                type: "GET",
                data: {
                    id: id,
                    currencyId: currencyId
                },
                blockUI: true,
                success: function(response) {
                    if($('input[name="item_name[]"]').val() == ''){
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
                '<td width="10%" class="border-0" align="right"><?php echo app('translator')->get("modules.invoices.qty"); ?></td>' +
                '<td width="10%" class="border-0" align="right"><?php echo app('translator')->get("app.sku"); ?></td>' +
                '<td width="10%" class="border-0" align="right"><?php echo app('translator')->get("modules.invoices.unitPrice"); ?></td>' +
                '<td width="13%" class="border-0" align="right"><?php echo app('translator')->get("modules.invoices.tax"); ?></td>' +
                '<td width="17%" class="border-0 bblr-mbl" align="right"><?php echo app('translator')->get("modules.invoices.amount"); ?></td>' +
                '</tr>' +
                '<tr>' +
                '<td class="border-bottom-0 btrr-mbl btlr">' +
                `<input type="text" class="form-control f-14 border-0 w-100 item_name" name="item_name[]" placeholder="<?php echo app('translator')->get("modules.expenses.itemName"); ?>">` +
                '</td>' +
                '<td class="border-bottom-0 d-block d-lg-none d-md-none">' +
                `<textarea class="f-14 border-0 w-100 mobile-description" name="item_summary[]" placeholder="<?php echo app('translator')->get("placeholders.invoices.description"); ?>"></textarea>` +
                '</td>';

            if (hsn_status == 1) {
                item += '<td class="border-bottom-0">' +
                    '<input type="text" min="1" class="form-control f-14 border-0 w-100 text-right hsn_sac_code" name="hsn_sac_code[]" >' +
                    '</td>';
            }
            item += '<td class="border-bottom-0">' +
                '<input type="number" min="1" class="form-control f-14 border-0 w-100 text-right quantity" value="1" name="quantity[]">' +
                '</td>' +
                '<td class="border-bottom-0">' +
                '<input type="text" min="1" class="f-14 border-0 w-100 text-right" placeholder="0.00" value="0" name="sku[]">' +
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
                '<td colspan="<?php echo e($invoiceSetting->hsn_sac_code_show ? 5 : 4); ?>" class="dash-border-top bblr">' +
                '<textarea class="f-14 border-0 w-100 desktop-description" name="item_summary[]" placeholder="<?php echo app('translator')->get("placeholders.invoices.description"); ?>"></textarea>' +
                '</td>' +
                '</tr>' +
                '</tbody>' +
                '</table>' +
                '</div>' +
                '<a href="javascript:;" class="d-flex align-items-center justify-content-center ml-3 remove-item"><i class="fa fa-times-circle f-20 text-lightest"></i></a>' +
                '</div>';
            $(item).hide().appendTo("#sortable").fadeIn(500);
            $('#multiselect' + i).selectpicker();
        });

        $('#saveInvoiceForm').on('click', '.remove-item', function() {
            $(this).closest('.item-row').fadeOut(300, function() {
                $(this).remove();
                $('select.customSequence').each(function(index) {
                    $(this).attr('name', 'taxes[' + index + '][]');
                    $(this).attr('id', 'multiselect' + index + '');
                });
                calculateTotal();
            });
        });

        $('.save-form').click(function() {
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
                url: "<?php echo e(route('invoices.store')); ?>" + "?type=" + type,
                container: '#saveInvoiceForm',
                type: "POST",
                blockUI: true,
                redirect: true,
                data: $('#saveInvoiceForm').serialize(),
                success: function(response) {
                    if (response.status == 'success') {
                        window.location.href = response.redirectUrl;
                    }
                }
            })
        });

        $('#saveInvoiceForm').on('click', '.remove-item', function() {
            $(this).closest('.item-row').fadeOut(300, function() {
                $(this).remove();
                $('select.customSequence').each(function(index) {
                    $(this).attr('name', 'taxes[' + index + '][]');
                    $(this).attr('id', 'multiselect' + index + '');
                });
                calculateTotal();
            });
        });

        $('#saveInvoiceForm').on('keyup', '.quantity,.cost_per_item,.item_name, .discount_value', function() {
            var quantity = $(this).closest('.item-row').find('.quantity').val();
            var perItemCost = $(this).closest('.item-row').find('.cost_per_item').val();
            var amount = (quantity * perItemCost);

            $(this).closest('.item-row').find('.amount').val(decimalupto2(amount));
            $(this).closest('.item-row').find('.amount-html').html(decimalupto2(amount));

            calculateTotal();
        });

        $('#saveInvoiceForm').on('change', '.type, #discount_type, #calculate_tax', function() {
            var quantity = $(this).closest('.item-row').find('.quantity').val();
            var perItemCost = $(this).closest('.item-row').find('.cost_per_item').val();
            var amount = (quantity * perItemCost);

            $(this).closest('.item-row').find('.amount').val(decimalupto2(amount));
            $(this).closest('.item-row').find('.amount-html').html(decimalupto2(amount));

            calculateTotal();
        });

        $('#saveInvoiceForm').on('input', '.quantity', function() {
            var quantity = $(this).closest('.item-row').find('.quantity').val();
            var perItemCost = $(this).closest('.item-row').find('.cost_per_item').val();
            var amount = (quantity * perItemCost);

            $(this).closest('.item-row').find('.amount').val(decimalupto2(amount));
            $(this).closest('.item-row').find('.amount-html').html(decimalupto2(amount));

            calculateTotal();
        });

        calculateTotal();

        init(RIGHT_MODAL);

        if (defaultClient != "") {
            changeClient(defaultClient);
        }
    });
</script>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/orders/ajax/create.blade.php ENDPATH**/ ?>