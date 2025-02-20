<?php
    $addProductPermission = user()->permission('add_product');
    $addLeadPermission = user()->permission('add_lead');
?>

    <!-- CREATE INVOICE START -->
<div class="bg-white rounded b-shadow-4 create-inv">
    <!-- HEADING START -->
    <div class="px-lg-4 px-md-4 px-3 py-3">
        <h4 class="mb-0 f-21 font-weight-normal text-capitalize"><?php echo app('translator')->get('app.proposalDetails'); ?>
        </h4>
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
        <div class="row px-lg-4 px-md-4 px-3 py-3">
            <!-- CLIENT START -->
            <input type="hidden" name="template_id" value="<?php echo e($proposalTemplate->id ?? ''); ?>">
            <?php if(isset($deal) && !is_null($deal)): ?>
                <div class="col-md-6 col-lg-3">
                    <?php if (isset($component)) { $__componentOriginal89b295b0763c93abe0143426334eb5d6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal89b295b0763c93abe0143426334eb5d6 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Label::resolve(['fieldId' => 'client_id','fieldLabel' => __('modules.deal.title'),'fieldRequired' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Label::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mt-3']); ?>
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
                        <input type="text" readonly
                               class="px-6 position-relative text-dark font-weight-normal form-control height-35 rounded p-0 text-left f-15"
                               placeholder="<?php echo e($deal->name); ?>"
                               value="<?php echo e($deal->name); ?>">
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
                                        <input type="hidden" name="deal_id" value="<?php echo e($deal->id); ?>">
                </div>
                <!-- CLIENT END -->
            <?php else: ?>
                <div class="col-lg-4 ">
                    <?php if (isset($component)) { $__componentOriginal67cd5dc9866c6185ad92d933c387fa86 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal67cd5dc9866c6185ad92d933c387fa86 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Select::resolve(['fieldId' => 'lead_contact','fieldLabel' => __('modules.leadContact.leadContacts'),'search' => 'true','fieldName' => 'lead_contact','fieldRequired' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Select::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                        <option value="">--</option>
                        <?php $__currentLoopData = $leadContacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leadContact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($leadContact->id); ?>">
                                <?php echo e($leadContact->client_name_salutation); ?></option>
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
                <div class="col-lg-4 ">
                    <?php if (isset($component)) { $__componentOriginal89b295b0763c93abe0143426334eb5d6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal89b295b0763c93abe0143426334eb5d6 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Label::resolve(['fieldId' => 'client_id','fieldLabel' => __('modules.deal.title'),'fieldRequired' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Label::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mt-3']); ?>
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
                    <select name="deal_id" id="deal_id" class="form-control select-picker" data-live-search="true"
                            data-size="8">
                        <option value="">--</option>
                        <?php $__currentLoopData = $deals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $clientOpt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option <?php if($proposalTemplate && $clientOpt->id == $proposalTemplate->deal_id): ?> selected
                                    <?php endif; ?> value="<?php echo e($clientOpt->id); ?>">
                                <?php echo e($clientOpt->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            <?php endif; ?>
            <!-- INVOICE DATE START -->
            <div class="col-md-6 col-lg-3">
                <div class="form-group mb-lg-0 mb-md-0 mb-4 mt-3">
                    <?php if (isset($component)) { $__componentOriginal89b295b0763c93abe0143426334eb5d6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal89b295b0763c93abe0143426334eb5d6 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Label::resolve(['fieldId' => 'due_date','fieldLabel' => __('modules.estimates.validTill'),'fieldRequired' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                        <input type="text" id="valid_till" name="valid_till"
                               class="px-6 position-relative text-dark font-weight-normal form-control height-35 rounded p-0 text-left f-15"
                               placeholder="<?php echo app('translator')->get('placeholders.date'); ?>"
                               value="<?php echo e(Carbon\Carbon::today()->addDays(30)->format(company()->date_format)); ?>">
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
            <!-- INVOICE DATE END -->

            <!-- FREQUENCY START -->
            <div class="col-md-6 col-lg-3">
                <?php if (isset($component)) { $__componentOriginal67cd5dc9866c6185ad92d933c387fa86 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal67cd5dc9866c6185ad92d933c387fa86 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Select::resolve(['fieldLabel' => __('modules.invoices.currency'),'fieldName' => 'currency_id','fieldId' => 'currency_id'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Select::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                    <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php if(isset($proposalTemplate) && $currency->id == $proposalTemplate->currency_id): ?>
                                    selected
                                <?php elseif($currency->id == company()->currency_id): ?>
                                    selected
                                <?php endif; ?>
                                value="<?php echo e($currency->id); ?>">
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

            <!-- FREQUENCY END -->

            <div class="col-md-6 col-lg-3">
                <div class="form-group c-inv-select mb-lg-0 mb-md-0 mb-4 mt-3">
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
                        <?php if(isset($proposalTemplate) && !is_null($proposalTemplate)): ?>
                            <select class="form-control select-picker" data-live-search="true" data-size="8"
                                    name="calculate_tax" id="calculate_tax">
                                <option value="after_discount"><?php echo app('translator')->get('modules.invoices.afterDiscount'); ?></option>
                                <option value="before_discount"
                                        <?php if($proposalTemplate->calculate_tax == 'before_discount'): ?> selected <?php endif; ?>>
                                    <?php echo app('translator')->get('modules.invoices.beforeDiscount'); ?></option>
                            </select>
                        <?php else: ?>
                            <select class="form-control select-picker" data-live-search="true" data-size="8"
                                    name="calculate_tax" id="calculate_tax">
                                <option value="after_discount"><?php echo app('translator')->get('modules.invoices.afterDiscount'); ?></option>
                                <option value="before_discount">
                                    <?php echo app('translator')->get('modules.invoices.beforeDiscount'); ?></option>
                            </select>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="col-md-12 my-3">
                <div class="form-group">
                    <?php if (isset($component)) { $__componentOriginal89b295b0763c93abe0143426334eb5d6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal89b295b0763c93abe0143426334eb5d6 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Label::resolve(['fieldId' => 'description','fieldLabel' => __('app.description')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                    <div id="description"><?php echo $proposalTemplate ? $proposalTemplate->description : ''; ?></div>
                    <textarea name="description" id="description-text" class="d-none"></textarea>
                </div>
            </div>

            <!-- FREQUENCY START -->
            <div class="col-md-6">
                <?php if (isset($component)) { $__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Checkbox::resolve(['fieldLabel' => __('modules.proposal.requireSignature'),'fieldName' => 'require_signature','fieldId' => 'require_signature','fieldValue' => 'true','checked' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Checkbox::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
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
            <!-- FREQUENCY END -->

        </div>
        <!-- INVOICE NUMBER, DATE, DUE DATE, FREQUENCY END -->

        <hr class="m-0 border-top-grey">

        <div class="row px-lg-4 px-md-4 px-3 py-3">
            <div class="col-md-3 d-none product-category-filter">
                <div class="form-group c-inv-select mb-4">
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
                        <select class="form-control select-picker" name="category_id"
                                id="product_category_id" data-live-search="true">
                            <option
                                value=""><?php echo e(__('app.select') . ' ' . __('app.product') . ' ' . __('app.category')); ?></option>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($category->id); ?>">
                                    <?php echo e($category->category_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
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
            <?php if(in_array('products', user_modules()) || in_array('purchase', user_modules())): ?>
                <div class="col-md-3">
                    <div class="form-group c-inv-select mb-4">
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
                            <select class="form-control select-picker" data-live-search="true" data-size="8"
                                    id="add-products" title="<?php echo e(__('app.menu.selectProduct')); ?>">
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option data-content="<?php echo e($item->name); ?>" value="<?php echo e($item->id); ?>">
                                        <?php echo e($item->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                             <?php $__env->slot('preappend', null, []); ?> 
                                <a href="javascript:;"
                                   class="btn btn-outline-secondary border-grey toggle-product-category"
                                   data-toggle="tooltip"
                                   data-original-title="<?php echo e(__('modules.productCategory.filterByCategory')); ?>"><i
                                        class="fa fa-filter"></i></a>
                             <?php $__env->endSlot(); ?>
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
                                    <td width="40%" class="border-0 inv-desc-mbl btlr"><?php echo app('translator')->get('app.description'); ?></td>
                                    <?php if($invoiceSetting->hsn_sac_code_show): ?>
                                        <td width="10%" class="border-0" align="right"><?php echo app('translator')->get("app.hsnSac"); ?>
                                        </td>
                                    <?php endif; ?>
                                    <td width="10%" class="border-0" align="right">
                                        <?php echo app('translator')->get('modules.invoices.qty'); ?>
                                    </td>
                                    <td width="10%" class="border-0" align="right">
                                        <?php echo app('translator')->get("modules.invoices.unitPrice"); ?></td>
                                    <td width="13%" class="border-0" align="right">
                                        <?php echo app('translator')->get('modules.invoices.tax'); ?>
                                    </td>
                                    <td width="17%" class="border-0 bblr-mbl" align="right">
                                        <?php echo app('translator')->get('modules.invoices.amount'); ?></td>
                                </tr>
                                <tr>
                                    <td class="border-bottom-0 btrr-mbl btlr">
                                        <input type="text" class="f-14 border-0 w-100 item_name form-control"
                                               name="item_name[]"
                                               placeholder="<?php echo app('translator')->get('modules.expenses.itemName'); ?>"
                                               value="<?php echo e($item->item_name); ?>">
                                    </td>
                                    <td class="border-bottom-0 d-block d-lg-none d-md-none">
                                            <textarea class="f-14 border-0 w-100 mobile-description form-control"
                                                      placeholder="<?php echo app('translator')->get('placeholders.invoices.description'); ?>"
                                                      name="item_summary[]"><?php echo e($item->item_summary); ?></textarea>
                                    </td>
                                    <?php if($invoiceSetting->hsn_sac_code_show): ?>
                                        <td class="border-bottom-0">
                                            <input type="text" min="1"
                                                   class="f-14 border-0 w-100 text-right hsn_sac_code form-control"
                                                   value="<?php echo e($item->hsn_sac_code); ?>" name="hsn_sac_code[]">
                                        </td>
                                    <?php endif; ?>
                                    <td class="border-bottom-0">
                                        <input type="number" min="1"
                                               class="f-14 border-0 w-100 text-right quantity form-control mt-3"
                                               value="<?php echo e($item->quantity); ?>" name="quantity[]">
                                        <?php if(!is_null($item->product_id) && $item->product_id != 0): ?>
                                            <span
                                                class="text-dark-grey float-right border-0 f-12"><?php echo e($item->unit->unit_type); ?></span>
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
                                               class="f-14 border-0 w-100 text-right cost_per_item form-control"
                                               placeholder="0.00"
                                               value="<?php echo e($item->unit_price); ?>" name="cost_per_item[]">
                                    </td>
                                    <td class="border-bottom-0">
                                        <div class="select-others height-35 rounded border-0">
                                            <select id="multiselect" name="taxes[<?php echo e($key); ?>][]"
                                                    multiple="multiple"
                                                    class="select-picker type customSequence border-0" data-size="3">
                                                <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option data-rate="<?php echo e($tax->rate_percent); ?>"
                                                            data-tax-text="<?php echo e($tax->tax_name .':'. $tax->rate_percent); ?>%"
                                                            <?php if(isset($item->taxes) && array_search($tax->id, json_decode($item->taxes)) !== false): ?> selected
                                                            <?php endif; ?> value="<?php echo e($tax->id); ?>">
                                                        <?php echo e($tax->tax_name); ?>:
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
                                            <textarea class="f-14 border-0 w-100 desktop-description form-control"
                                                      name="item_summary[]"
                                                      placeholder="<?php echo app('translator')->get('placeholders.invoices.description'); ?>"><?php echo e($item->item_summary); ?></textarea>
                                    </td>
                                    <td class="border-left-0">
                                        <input type="file" class="dropify" name="invoice_item_image[]"
                                               data-allowed-file-extensions="png jpg jpeg bmp"
                                               data-messages-default="test" data-height="70"/>
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
            <?php elseif(isset($proposalTemplateItem) && !is_null($proposalTemplateItem)): ?>

                <?php $__currentLoopData = $proposalTemplateItem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <!-- DESKTOP DESCRIPTION TABLE START -->
                    <div class="d-flex px-4 py-3 c-inv-desc item-row">
                        <div class="c-inv-desc-table w-100 d-lg-flex d-md-flex d-block">
                            <table width="100%">
                                <tbody>
                                <tr class="text-dark-grey font-weight-bold f-14">
                                    <td width="40%" class="border-0 inv-desc-mbl btlr"><?php echo app('translator')->get('app.description'); ?></td>
                                    <?php if($invoiceSetting->hsn_sac_code_show): ?>
                                        <td width="10%" class="border-0" align="right"><?php echo app('translator')->get("app.hsnSac"); ?></td>
                                    <?php endif; ?>
                                    <td width="10%" class="border-0" align="right">
                                        <?php echo app('translator')->get('modules.invoices.qty'); ?>
                                    </td>
                                    <td width="10%" class="border-0" align="right">
                                        <?php echo app('translator')->get("modules.invoices.unitPrice"); ?>
                                    </td>
                                    <td width="13%" class="border-0" align="right"><?php echo app('translator')->get('modules.invoices.tax'); ?>
                                    </td>
                                    <td width="17%" class="border-0 bblr-mbl" align="right">
                                        <?php echo app('translator')->get('modules.invoices.amount'); ?></td>
                                </tr>
                                <tr>
                                    <td class="border-bottom-0 btrr-mbl btlr">
                                        <input type="text" class="f-14 border-0 w-100 item_name form-control"
                                               name="item_name[]"
                                               placeholder="<?php echo app('translator')->get('modules.expenses.itemName'); ?>"
                                               value="<?php echo e($item->item_name); ?>">
                                    </td>
                                    <?php if($invoiceSetting->hsn_sac_code_show): ?>
                                        <td class="border-bottom-0">
                                            <input type="text"
                                                   class="f-14 border-0 w-100 text-right hsn_sac_code form-control"
                                                   value="<?php echo e($item->hsn_sac_code); ?>" name="hsn_sac_code[]">
                                        </td>
                                    <?php endif; ?>
                                    <td class="border-bottom-0">
                                        <input type="number" min="1"
                                               class="f-14 border-0 w-100 text-right quantity form-control mt-3"
                                               name="quantity[]" value="<?php echo e($item->quantity); ?>">
                                        <?php if(!is_null($item->product_id) && $item->product_id != 0): ?>
                                            <span
                                                class="text-dark-grey float-right border-0 f-12"><?php echo e($item->unit->unit_type); ?></span>
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
                                               class="f-14 border-0 w-100 text-right cost_per_item form-control"
                                               placeholder="0.00"
                                               name="cost_per_item[]" value="<?php echo e($item->unit_price); ?>">
                                    </td>
                                    <td class="border-bottom-0">
                                        <div class="select-others height-35 rounded border-0">
                                            <select id="multiselect" name="taxes[<?php echo e($key); ?>][]" multiple="multiple"
                                                    class="select-picker type customSequence border-0" data-size="3">
                                                <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option data-rate="<?php echo e($tax->rate_percent); ?>"
                                                            data-tax-text="<?php echo e($tax->tax_name .':'. $tax->rate_percent); ?>%"
                                                            <?php if(isset($item->taxes) && array_search($tax->id, json_decode($item->taxes)) !== false): ?> selected
                                                            <?php endif; ?> value="<?php echo e($tax->id); ?>"><?php echo e($tax->tax_name); ?>

                                                        <?php echo e($tax->rate_percent); ?>%
                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </td>
                                    <td rowspan="2" align="right" valign="top" class="bg-amt-grey btrr-bbrr">
                                        <span
                                            class="amount-html"><?php echo e(number_format((float) $item->amount, 2, '.', '')); ?></span>
                                        <input type="hidden" class="amount" name="amount[]" value="<?php echo e($item->amount); ?>">
                                    </td>
                                </tr>
                                <tr class="d-none d-md-table-row d-lg-table-row">
                                    <td colspan="<?php echo e($invoiceSetting->hsn_sac_code_show ? '4' : '3'); ?>"
                                        class="dash-border-top bblr">
                                            <textarea class="f-14 border-0 w-100 desktop-description form-control"
                                                      name="item_summary[]"
                                                      placeholder="<?php echo app('translator')->get('placeholders.invoices.description'); ?>"><?php echo e($item->item_summary); ?></textarea>
                                    </td>
                                    <td class="border-left-0">
                                        <input type="hidden" id="imageId_<?php echo e($item->id); ?>"
                                               class="itemOldImage" name="image_id[]"
                                               value=<?php echo e(isset($item->proposalTemplateItemImage ->id) ? $item->proposalTemplateItemImage ->id : ''); ?> />
                                        <input type="file"
                                               class="dropify"
                                               name="invoice_item_image[]"
                                               data-allowed-file-extensions="png jpg jpeg bmp"
                                               data-messages-default="test"
                                               data-height="70"
                                               data-id="<?php echo e($item->id); ?>"
                                               id="<?php echo e($item->id); ?>"
                                               data-default-file="<?php echo e($item->proposalTemplateItemImage ? $item->proposalTemplateItemImage->file_url : ''); ?>"
                                               <?php if($item->proposalTemplateItemImage && $item->proposalTemplateItemImage->external_link): ?>
                                                   data-show-remove="false"
                                            <?php endif; ?>
                                        />
                                        <input type="hidden" name="invoice_item_image_url[]"
                                               value="<?php echo e($item->proposalTemplateItemImage ? $item->proposalTemplateItemImage->file : ''); ?>">
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
                                <td width="40%" class="border-0 inv-desc-mbl btlr"><?php echo app('translator')->get('app.description'); ?></td>
                                <?php if($invoiceSetting->hsn_sac_code_show): ?>
                                    <td width="10%" class="border-0" align="right"><?php echo app('translator')->get("app.hsnSac"); ?></td>
                                <?php endif; ?>
                                <td width="10%" class="border-0" align="right">
                                    <?php echo app('translator')->get('modules.invoices.qty'); ?>
                                </td>
                                <td width="10%" class="border-0" align="right">
                                    <?php echo app('translator')->get("modules.invoices.unitPrice"); ?>
                                </td>
                                <td width="13%" class="border-0" align="right"><?php echo app('translator')->get('modules.invoices.tax'); ?>
                                </td>
                                <td width="17%" class="border-0 bblr-mbl" align="right">
                                    <?php echo app('translator')->get('modules.invoices.amount'); ?></td>
                            </tr>
                            <tr>
                                <td class="border-bottom-0 btrr-mbl btlr">
                                    <input type="text" class="f-14 border-0 w-100 item_name form-control"
                                           name="item_name[]"
                                           placeholder="<?php echo app('translator')->get('modules.expenses.itemName'); ?>">
                                </td>
                                <td class="border-bottom-0 d-block d-lg-none d-md-none">
                                        <textarea class="f-14 border-0 w-100 mobile-description form-control"
                                                  name="item_summary[]"
                                                  placeholder="<?php echo app('translator')->get('placeholders.invoices.description'); ?>"></textarea>
                                </td>
                                <?php if($invoiceSetting->hsn_sac_code_show): ?>
                                    <td class="border-bottom-0">
                                        <input type="text"
                                               class="f-14 border-0 w-100 text-right hsn_sac_code form-control"
                                               value="" name="hsn_sac_code[]">
                                    </td>
                                <?php endif; ?>
                                <td class="border-bottom-0">
                                    <input type="number" min="1"
                                           class="f-14 border-0 w-100 text-right quantity form-control mt-3"
                                           value="1" name="quantity[]">
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
                                           class="f-14 border-0 w-100 text-right cost_per_item form-control"
                                           placeholder="0.00"
                                           value="0" name="cost_per_item[]">
                                </td>
                                <td class="border-bottom-0">
                                    <div class="select-others height-35 rounded border-0">
                                        <select id="multiselect" name="taxes[0][]" multiple="multiple"
                                                class="select-picker type customSequence border-0" data-size="3">
                                            <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option data-rate="<?php echo e($tax->rate_percent); ?>"
                                                        data-tax-text="<?php echo e($tax->tax_name .':'. $tax->rate_percent); ?>%"
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
                                        <textarea class="f-14 border-0 w-100 desktop-description form-control"
                                                  name="item_summary[]"
                                                  placeholder="<?php echo app('translator')->get('placeholders.invoices.description'); ?>"></textarea>
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
                    <td width="50%" class="p-0 border-0">
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
                                    <table width="100%" class="mw-250">
                                        <tbody>
                                        <tr>
                                            <td width="70%" class="c-inv-sub-padding">
                                                <input type="number" min="0" name="discount_value"
                                                       class="f-14 border-0 w-100 text-right discount_value"
                                                       placeholder="0"
                                                       value="<?php echo e(isset($proposalTemplate) ? $proposalTemplate->discount : '0'); ?>">
                                            </td>
                                            <td width="30%" align="left" class="c-inv-sub-padding">
                                                <div
                                                    class="select-others select-tax height-35 rounded border-0">
                                                    <select class="form-control select-picker"
                                                            id="discount_type" name="discount_type">
                                                        <option
                                                            <?php if(isset($proposalTemplate) && $proposalTemplate->discount_type == 'percent'): ?> selected
                                                            <?php endif; ?> value="percent">%
                                                        </option>
                                                        <option
                                                            <?php if(isset($proposalTemplate) && $proposalTemplate->discount_type == 'fixed'): ?> selected
                                                            <?php endif; ?> value="fixed">
                                                            <?php echo app('translator')->get('modules.invoices.amount'); ?></option>
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td>
                                            <span
                                                id="discount_amount"><?php echo e(isset($proposalTemplate) ? number_format((float) $proposalTemplate->discount, 2, '.', '') : '0.00'); ?>

                                            </span>
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
                <textarea class="form-control" name="note" id="lead_note" rows="4"
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
                        <li>
                            <a class="dropdown-item f-14 text-dark save-form" href="javascript:void(0);"
                               data-type="mark_as_send" data-toggle="tooltip"
                               data-original-title="<?php echo app('translator')->get('messages.markSentInfo'); ?>">
                                <i class="fa fa-check-double f-w-500  mr-2 f-12"></i> <?php echo app('translator')->get('app.saveMark'); ?>
                            </a>
                        </li>
                    </ul>
                </div>

                <?php if (isset($component)) { $__componentOriginalc35c79ed7e812580313ad04118477974 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc35c79ed7e812580313ad04118477974 = $attributes; } ?>
<?php $component = App\View\Components\Forms\ButtonCancel::resolve(['link' => route('proposals.index')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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

            </div>


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
    $(document).ready(function () {

        $('.toggle-product-category').click(function () {
            $('.product-category-filter').toggleClass('d-none');
        });

        $('#product_category_id').on('change', function () {
            var categoryId = $(this).val();
            var url = "<?php echo e(route('invoices.product_category', ':id')); ?>";
            url = (categoryId) ? url.replace(':id', categoryId) : url.replace(':id', null);

            $.easyAjax({
                url: url,
                type: "GET",
                container: '#saveInvoiceForm',
                blockUI: true,
                success: function (response) {
                    if (response.status == 'success') {
                        var options = [];
                        var rData = [];
                        rData = response.data;
                        $.each(rData, function (index, value) {
                            var selectData = '';
                            selectData = '<option value="' + value.id + '">' + value.name +
                                '</option>';
                            options.push(selectData);
                        });
                        $('#add-products').html('<option value="" class="form-control" ><?php echo e(__('app.select') . ' ' . __('app.product')); ?></option>' + options);
                        $('#add-products').selectpicker('refresh');
                    }
                }
            });
        });

        $('#lead_contact').change(function (e) {

            let contactId = $(this).val();

            var url = "<?php echo e(route('deals.get-deals', ':id')); ?>";
            url = url.replace(':id', contactId);

            $.easyAjax({
                url: url,
                type: "GET",
                success: function (response) {
                    if (response.status == 'success') {
                        var options = [];
                        var rData = [];
                        rData = response.data;
                        $.each(rData, function (index, value) {
                            var selectData;
                            selectData = '<option value="' + value.id + '">' + value.name + '</option>';
                            options.push(selectData);
                        });

                        $('#deal_id').html('<option value="">--</option>' + options);
                        $('#deal_id').selectpicker('refresh');
                    }
                }
            })

        });

        const hsn_status = <?php echo e($invoiceSetting->hsn_sac_code_show); ?>;
        const dp1 = datepicker('#valid_till', {
            position: 'bl',
            dateSelected: new Date("<?php echo e(str_replace('-', '/', now()->addDays(30))); ?>"),
            ...datepickerConfig
        });

        quillMention(null, '#description');

        const resetAddProductButton = () => {
            $("#add-products").val('').selectpicker("refresh");
        };

        $('#add-products').on('changed.bs.select', function (e, clickedIndex, isSelected, previousValue) {
            e.stopImmediatePropagation()
            var id = $(this).val();
            if (previousValue != id && id != '') {
                addProduct(id);
                resetAddProductButton();
            }
        });

        function ucWord(str) {
            str = str.toLowerCase().replace(/\b[a-z]/g, function (letter) {
                return letter.toUpperCase();
            });
            return str;
        }

        function addProduct(id) {
            var currencyId = $('#currency_id').val();

            $.easyAjax({
                url: "<?php echo e(route('proposals.add_item')); ?>",
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

                    $(document).find('#dropify' + i).dropify({
                        messages: dropifyMessages
                    });
                }
            });
        }

        $(document).on('click', '#add-item', function () {

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
                <input type="hidden" name="product_id[]" value="">` +
                '</td>' +
                '<td class="border-bottom-0">' +
                '<input type="number" min="1" class="f-14 border-0 w-100 text-right cost_per_item" placeholder="0.00" value="0" name="cost_per_item[]">' +
                '</td>' +
                '<td class="border-bottom-0">' +
                '<div class="select-others height-35 rounded border-0">' +
                '<select id="multiselect' + i + '" name="taxes[' + i +
                '][]" multiple="multiple" class="select-picker type customSequence" data-size="3">'
                <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                + '<option data-rate="<?php echo e($tax->rate_percent); ?>" data-tax-text="<?php echo e($tax->tax_name .':'. $tax->rate_percent); ?>%" value="<?php echo e($tax->id); ?>">'
                + '<?php echo e($tax->tax_name); ?>:<?php echo e($tax->rate_percent); ?>%</option>'
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
                '<input type="file" class="dropify" id="dropify' + i + '" name="invoice_item_image[]" data-allowed-file-extensions="png jpg jpeg bmp" data-messages-default="test" data-height="70" /><input type="hidden" name="invoice_item_image_url[]">' +
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

        $('.save-form').click(function () {
            let note = document.getElementById('description').children[0].innerHTML;
            document.getElementById('description-text').value = note;

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
                url: "<?php echo e(route('proposals.store')); ?>" + "?type=" + type,
                container: '#saveInvoiceForm',
                type: "POST",
                blockUI: true,
                redirect: true,
                file: true,  // Commented so that we dot get error of Input variables exceeded 1000
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
</script>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/proposals/ajax/create.blade.php ENDPATH**/ ?>