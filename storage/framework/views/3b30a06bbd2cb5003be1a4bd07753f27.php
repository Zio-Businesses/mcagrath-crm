<?php
$addProductPermission = user()->permission('add_product');
?>
<link rel="stylesheet" href="<?php echo e(asset('vendor/css/dropzone.min.css')); ?>">
<?php if(!in_array('clients', user_modules())): ?>
    <?php if (isset($component)) { $__componentOriginal5194778a3a7b899dcee5619d0610f5cf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5194778a3a7b899dcee5619d0610f5cf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.alert','data' => ['class' => 'mb-3','type' => 'danger','icon' => 'exclamation-circle']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mb-3','type' => 'danger','icon' => 'exclamation-circle']); ?><span><?php echo app('translator')->get('messages.enableClientModule'); ?></span>
        <?php if (isset($component)) { $__componentOriginal29acd9b76240152ae380821b082bd629 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal29acd9b76240152ae380821b082bd629 = $attributes; } ?>
<?php $component = App\View\Components\Forms\LinkSecondary::resolve(['icon' => 'arrow-left','link' => route('estimates.index')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.link-secondary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\LinkSecondary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?><?php echo app('translator')->get('app.back'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal29acd9b76240152ae380821b082bd629)): ?>
<?php $attributes = $__attributesOriginal29acd9b76240152ae380821b082bd629; ?>
<?php unset($__attributesOriginal29acd9b76240152ae380821b082bd629); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal29acd9b76240152ae380821b082bd629)): ?>
<?php $component = $__componentOriginal29acd9b76240152ae380821b082bd629; ?>
<?php unset($__componentOriginal29acd9b76240152ae380821b082bd629); ?>
<?php endif; ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5194778a3a7b899dcee5619d0610f5cf)): ?>
<?php $attributes = $__attributesOriginal5194778a3a7b899dcee5619d0610f5cf; ?>
<?php unset($__attributesOriginal5194778a3a7b899dcee5619d0610f5cf); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5194778a3a7b899dcee5619d0610f5cf)): ?>
<?php $component = $__componentOriginal5194778a3a7b899dcee5619d0610f5cf; ?>
<?php unset($__componentOriginal5194778a3a7b899dcee5619d0610f5cf); ?>
<?php endif; ?>
<?php else: ?>

<!-- CREATE INVOICE START -->
<div class="bg-white rounded b-shadow-4 create-inv">
    <!-- HEADING START -->
    <div class="px-lg-4 px-md-4 px-3 py-3">
        <h4 class="mb-0 f-21 font-weight-normal text-capitalize"><?php echo app('translator')->get('Client Estimate Details'); ?></h4>
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
        <?php echo method_field('PUT'); ?>
        <!-- INVOICE NUMBER, DATE, DUE DATE, FREQUENCY START -->
        <div class="row px-lg-4 px-md-4 px-3 py-3">
            <!-- INVOICE NUMBER START -->
            <input type="hidden" name="projectID" id="projectID" value="<?php echo e($projectID); ?>">
            <div class="col-md-6 col-lg-4">
                <div class="form-group mb-lg-0 mb-md-0 mb-4">
                    <label class="f-14 text-dark-grey mb-12 text-capitalize"
                        for="usr"><?php echo app('translator')->get('modules.estimates.estimatesNumber'); ?></label>
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
                        <input type="text" name="estimate_number" id="estimate_number"
                            class="form-control height-35 f-15 readonly-background" readonly
                            value="<?php echo e($estimate->estimate_number); ?>">
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
            <!-- INVOICE NUMBER END -->
            <!-- INVOICE DATE START -->
            <div class="col-md-6 col-lg-4">
                <div class="form-group mb-lg-0 mb-md-0 mb-4">
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
                    <div class="input-group">
                        <input type="text" id="valid_till" name="valid_till"
                            class="px-6 position-relative text-dark font-weight-normal form-control height-35 rounded p-0 text-left f-15"
                            placeholder="<?php echo app('translator')->get('placeholders.date'); ?>"
                            value="<?php echo e($estimate->valid_till->format(company()->date_format)); ?>">
                    </div>
                </div>
            </div>
            <!-- INVOICE DATE END -->

            <!-- FREQUENCY START -->
            <div class="col-md-6 col-lg-4 d-none">
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
                                <option <?php if($estimate->currency_id == $currency->id): ?> selected <?php endif; ?> value="<?php echo e($currency->id); ?>">
                                    <?php echo e($currency->currency_code . ' (' . $currency->currency_symbol . ')'); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
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
                    <select class="form-control select-picker" data-live-search="true" data-size="8" name="client_id"
                        id="client_id">
                        <option value="">--</option>
                        <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if (isset($component)) { $__componentOriginal6c7097547485b98631a37d273a171e9f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6c7097547485b98631a37d273a171e9f = $attributes; } ?>
<?php $component = App\View\Components\UserOption::resolve(['user' => $client,'selected' => $client->id == $estimate->client_id] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
            </div>
            <div class="col-md-4">
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
                            <?php if($estimate?->client?->projects): ?>
                            <?php $__currentLoopData = $estimate->client->projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option <?php if($estimate->project_id == $item->id): ?> selected <?php endif; ?> value="<?php echo e($item->id); ?>">
                                    <?php echo e($item->project_short_code); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        </select>
                    </div>
                </div>
            </div>
            <!-- FREQUENCY END -->
        </div>
        <hr class="m-0 border-top-grey">

        <div class="row px-lg-4 px-md-4 px-3 pt-3">

            <!-- CLIENT START -->
           
            <!-- CLIENT END -->

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
                    <div id="description"><?php echo $estimate->description; ?></div>
                    <textarea name="description" id="description-text" class="d-none"></textarea>
                </div>
            </div>

            <!-- CLIENT START -->
            <div class="col-md-4">
                <?php if (isset($component)) { $__componentOriginal89b295b0763c93abe0143426334eb5d6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal89b295b0763c93abe0143426334eb5d6 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Label::resolve(['fieldId' => 'client_id','fieldLabel' => __('app.status')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                    <select class="form-control select-picker" name="status" id="status">
                        <option <?php if($estimate->status == 'accepted'): ?> selected <?php endif; ?> value="accepted"><?php echo app('translator')->get('modules.estimates.accepted'); ?>
                        </option>
                        <option <?php if($estimate->status == 'waiting'): ?> selected <?php endif; ?> value="waiting"><?php echo app('translator')->get('modules.estimates.waiting'); ?>
                        </option>
                        <option <?php if($estimate->status == 'declined'): ?> selected <?php endif; ?> value="declined"><?php echo app('translator')->get('modules.estimates.declined'); ?>
                        </option>
                        <?php if($estimate->status == 'draft'): ?>
                            <option <?php if($estimate->status == 'draft'): ?> selected <?php endif; ?> value="draft"><?php echo app('translator')->get('modules.invoices.draft'); ?>
                            </option>
                        <?php endif; ?>
                    </select>
                </div>
            </div>
            <!-- CLIENT END -->

        </div>
        <!-- INVOICE NUMBER, DATE, DUE DATE, FREQUENCY END -->
            <?php if (isset($component)) { $__componentOriginalfa1d9407bf58c9650823154ec52dea3e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfa1d9407bf58c9650823154ec52dea3e = $attributes; } ?>
<?php $component = App\View\Components\Forms\CustomField::resolve(['fields' => $fields,'model' => $estimate] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                            <option value=""><?php echo e(__('app.menu.selectProductCategory')); ?></option>
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
            
        </div>

        <div id="sortable">
            <?php $__currentLoopData = $estimate->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <!-- DESKTOP DESCRIPTION TABLE START -->
                <div class="d-flex px-4 py-3 c-inv-desc item-row">

                    <div class="c-inv-desc-table w-100 d-lg-flex d-md-flex d-block">
                        <table width="100%">
                            <tbody>
                                <tr class="text-dark-grey font-weight-bold f-14">
                                    <td width="<?php echo e($invoiceSetting->hsn_sac_code_show ? '40%' : '50%'); ?>"
                                        class="border-0 inv-desc-mbl btlr"><?php echo app('translator')->get('app.description'); ?>
                                        <input type="hidden" name="item_ids[]" value="<?php echo e($item->id); ?>">
                                    </td>
                                    <?php if($invoiceSetting->hsn_sac_code_show): ?>
                                        <td width="10%" class="border-0" align="right"><?php echo app('translator')->get("app.hsnSac"); ?></td>
                                    <?php endif; ?>
                                    <td width="10%" class="border-0" align="right">
                                        <?php echo app('translator')->get('modules.invoices.qty'); ?>
                                    </td>
                                    <td width="10%" class="border-0" align="right">
                                        <?php echo app('translator')->get("modules.invoices.unitPrice"); ?></td>
                                    
                                    <td width="17%" class="border-0 bblr-mbl" align="right">
                                        <?php echo app('translator')->get('modules.invoices.amount'); ?></td>
                                </tr>
                                <tr>
                                    <td class="border-bottom-0 btrr-mbl btlr">
                                        <input type="text" class="f-14 border-0 w-100 item_name form-control" name="item_name[]"
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
                                        <input type="number" min="1" class="f-14 border-0 w-100 text-right quantity form-control"
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
                                            class="f-14 border-0 w-100 text-right cost_per_item form-control" placeholder="0.00"
                                            value="<?php echo e($item->unit_price); ?>" name="cost_per_item[]">
                                    </td>
                                    <!-- <td class="border-bottom-0">
                                        <div class="select-others height-35 rounded border-0">
                                            <select id="multiselect" name="taxes[<?php echo e($key); ?>][]"
                                                multiple="multiple" class="select-picker type customSequence border-0"
                                                data-size="3">
                                                <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option data-rate="<?php echo e($tax->rate_percent); ?>" data-tax-text="<?php echo e($tax->tax_name .':'. $tax->rate_percent); ?>%"
                                                        <?php if(isset($item->taxes) && array_search($tax->id, json_decode($item->taxes)) !== false): ?> selected <?php endif; ?> value="<?php echo e($tax->id); ?>">
                                                        <?php echo e($tax->tax_name); ?>:
                                                        <?php echo e($tax->rate_percent); ?>%</option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </td> -->
                                    <td rowspan="2" align="right" valign="top" class="bg-amt-grey btrr-bbrr">
                                        <span
                                            class="amount-html"><?php echo e(number_format((float) $item->amount, 2, '.', '')); ?></span>
                                        <input type="hidden" class="amount" name="amount[]"
                                            value="<?php echo e($item->amount); ?>">
                                    </td>
                                </tr>
                                <tr class="d-none d-md-block d-lg-table-row">
                                    <td colspan="<?php echo e($invoiceSetting->hsn_sac_code_show ? 4 : 3); ?>"
                                        class="dash-border-top bblr">
                                        <textarea class="f-14 border-0 w-100 desktop-description form-control" name="item_summary[]"
                                            placeholder="<?php echo app('translator')->get('placeholders.invoices.description'); ?>"><?php echo e($item->item_summary); ?></textarea>
                                    </td>
                                    <!-- <td class="border-left-0">
                                        <input type="file"
                                        class="dropify"
                                        name="invoice_item_image[]"
                                        data-allowed-file-extensions="png jpg jpeg bmp"
                                        data-messages-default="test"
                                        data-height="70"
                                        data-id="<?php echo e($item->id); ?>"
                                        id="<?php echo e($item->id); ?>"
                                        data-default-file="<?php echo e($item->estimateItemImage ? $item->estimateItemImage->file_url : ''); ?>"
                                        <?php if($item->estimateItemImage && $item->estimateItemImage->external_link): ?>
                                            data-show-remove="false"
                                        <?php endif; ?>
                                        />
                                        <input type="hidden" name="invoice_item_image_url[]" value="<?php echo e($item->estimateItemImage ? $item->estimateItemImage->file : ''); ?>">
                                    </td> -->
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
                                        <td width="30%" class="border-top-0 sub-total">
                                            <?php echo e(number_format((float) $estimate->sub_total, 2, '.', '')); ?></td>
                                        <input type="hidden" class="sub-total-field" name="sub_total"
                                            value="<?php echo e($estimate->sub_total); ?>">
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
                                                                class="f-14 border-0 w-100 text-right discount_value form-control"
                                                                placeholder="0" value="<?php echo e($estimate->discount); ?>">
                                                        </td>
                                                        <td width="30%" align="left" class="c-inv-sub-padding">
                                                            <div
                                                                class="select-others select-tax height-35 rounded border-0">
                                                                <select class="form-control select-picker"
                                                                    id="discount_type" name="discount_type">
                                                                    <option <?php if($estimate->discount_type == 'percent'): ?> selected <?php endif; ?> value="percent">%
                                                                    </option>
                                                                    <option <?php if($estimate->discount_type == 'fixed'): ?> selected <?php endif; ?> value="fixed">
                                                                        <?php echo app('translator')->get('modules.invoices.amount'); ?></option>
                                                                </select>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td><span
                                                id="discount_amount"><?php echo e(number_format((float) $estimate->discount, 2, '.', '')); ?></span>
                                        </td>
                                    </tr>
                                    <!-- <tr>
                                        <td><?php echo app('translator')->get('modules.invoices.tax'); ?></td>
                                        <td colspan="2" class="p-0">
                                            <table width="100%" id="invoice-taxes">
                                                <tr>
                                                    <td colspan="2"><span class="tax-percent">0.00</span></td>
                                                </tr>
                                            </table>
                                        </td>

                                    </tr> -->
                                    <tr class="bg-amt-grey f-16 f-w-500">
                                        <td colspan="2"><?php echo app('translator')->get('modules.invoices.total'); ?></td>
                                        <td><span
                                                class="total"><?php echo e(number_format((float) $estimate->total, 2, '.', '')); ?></span>
                                        </td>
                                        <input type="hidden" class="total-field" name="total"
                                            value="<?php echo e(round($estimate->total, 2)); ?>">
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
            <!-- <div class="col-md-6 col-sm-12 c-inv-note-terms p-0 mb-lg-0 mb-md-0 mb-3">
                <label class="f-14 text-dark-grey mb-12 text-capitalize w-100"
                    for="usr"><?php echo app('translator')->get('modules.invoices.note'); ?></label>
                <textarea class="form-control" name="note" id="note" rows="4"
                    placeholder="<?php echo app('translator')->get('placeholders.invoices.note'); ?>"><?php echo e($estimate->note); ?></textarea>
            </div> -->
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
        <div class="row px-lg-4 px-md-4 px-3 py-3">
            <!-- INVOICE NUMBER START -->
            <div class="col-md-12">
                <?php if (isset($component)) { $__componentOriginal22e84ee8172e1045de536542f4ffc9a0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal22e84ee8172e1045de536542f4ffc9a0 = $attributes; } ?>
<?php $component = App\View\Components\Forms\FileMultiple::resolve(['fieldLabel' => __('app.menu.addFile'),'fieldName' => 'file','fieldId' => 'file-upload-dropzone'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.file-multiple'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\FileMultiple::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-0 mr-lg-2 mr-md-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal22e84ee8172e1045de536542f4ffc9a0)): ?>
<?php $attributes = $__attributesOriginal22e84ee8172e1045de536542f4ffc9a0; ?>
<?php unset($__attributesOriginal22e84ee8172e1045de536542f4ffc9a0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal22e84ee8172e1045de536542f4ffc9a0)): ?>
<?php $component = $__componentOriginal22e84ee8172e1045de536542f4ffc9a0; ?>
<?php unset($__componentOriginal22e84ee8172e1045de536542f4ffc9a0); ?>
<?php endif; ?>
            </div>
            <input type="hidden" name="estimateId" id="estimateId">
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
                <?php if (isset($component)) { $__componentOriginalcf8d12533ff890e0d6573daf32b7618d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcf8d12533ff890e0d6573daf32b7618d = $attributes; } ?>
<?php $component = App\View\Components\Forms\ButtonPrimary::resolve(['icon' => 'check'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'save-form mr-3']); ?><?php echo app('translator')->get('app.save'); ?>
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
            <?php if (isset($component)) { $__componentOriginalc35c79ed7e812580313ad04118477974 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc35c79ed7e812580313ad04118477974 = $attributes; } ?>
<?php $component = App\View\Components\Forms\ButtonCancel::resolve(['link' => route('estimates.index')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
        let defaultImage = '';
        let lastIndex = 0;
        var projectID=$('#projectID').val();

        Dropzone.autoDiscover = false;
        //Dropzone class
        invoiceDropzone = new Dropzone("div#file-upload-dropzone", {
            dictDefaultMessage: "<?php echo e(__('app.dragDrop')); ?>",
            url: "<?php echo e(route('client-estimates-files.store')); ?>",
            headers: {
                'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
            },
            paramName: "file",
            maxFilesize: DROPZONE_MAX_FILESIZE,
            maxFiles: DROPZONE_MAX_FILES,
            autoProcessQueue: false,
            uploadMultiple: true,
            addRemoveLinks: true,
            parallelUploads: DROPZONE_MAX_FILES,
            acceptedFiles: DROPZONE_FILE_ALLOW,
            init: function () {
                invoiceDropzone = this;
            }
        });
        invoiceDropzone.on('sending', function (file, xhr, formData) {
            const estimateId = $('#estimateId').val();
            console.log(estimateId);
            formData.append('estimates_id', estimateId);
            formData.append('default_image', defaultImage);
            $.easyBlockUI();
        });
        invoiceDropzone.on('uploadprogress', function () {
            $.easyBlockUI();
        });
        invoiceDropzone.on('queuecomplete', function () {
            window.location.href =  projectID ? '<?php echo e(route("projects.show", ["project" => ":projectID", "tab" => "estimates"])); ?>'.replace(':projectID', projectID):'<?php echo e(route("estimates.index")); ?>';
        });
        invoiceDropzone.on('removedfile', function () {
            var grp = $('div#file-upload-dropzone').closest(".form-group");
            var label = $('div#file-upload-box').siblings("label");
            $(grp).removeClass("has-error");
            $(label).removeClass("is-invalid");
        });
        invoiceDropzone.on('error', function (file, message) {
            invoiceDropzone.removeFile(file);
            var grp = $('div#file-upload-dropzone').closest(".form-group");
            var label = $('div#file-upload-box').siblings("label");
            $(grp).find(".help-block").remove();
            var helpBlockContainer = $(grp);

            if (helpBlockContainer.length == 0) {
                helpBlockContainer = $(grp);
            }

            helpBlockContainer.append('<div class="help-block invalid-feedback">' + message + '</div>');
            $(grp).addClass("has-error");
            $(label).addClass("is-invalid");

        });
        invoiceDropzone.on('addedfile', function (file) {
            lastIndex++;

            const div = document.createElement('div');
            div.className = 'form-check-inline custom-control custom-radio mt-2 mr-3';
            const input = document.createElement('input');
            input.className = 'custom-control-input';
            input.type = 'radio';
            input.name = 'default_image';
            input.id = 'default-image-' + lastIndex;
            input.value = file.name;
            if (lastIndex == 1) {
                input.checked = true;
            }
            div.appendChild(input);

            var label = document.createElement('label');
            label.className = 'custom-control-label pt-1 cursor-pointer';
            label.innerHTML = "<?php echo app('translator')->get('modules.makeDefaultImage'); ?>";
            label.htmlFor = 'default-image-' + lastIndex;
            div.appendChild(label);

            file.previewTemplate.appendChild(div);
        });

        $('.toggle-product-category').click(function() {
            $('.product-category-filter').toggleClass('d-none');
        });

        $('#product_category_id').on('change', function(){
            var categoryId = $(this).val();
            var url = "<?php echo e(route('invoices.product_category', ':id')); ?>",
            url = (categoryId) ? url.replace(':id', categoryId) : url.replace(':id', null);;
            $.easyAjax({
                url : url,
                type : "GET",
                container: '#saveInvoiceForm',
                blockUI: true,
                success: function (response) {
                    if (response.status == 'success') {
                        var options = [];
                        var rData = [];
                        rData = response.data;
                        $.each(rData, function(index, value) {
                            var selectData = '';
                            selectData = '<option value="' + value.id + '">' + value.name +
                                '</option>';
                            options.push(selectData);
                        });
                        $('#add-products').html(
                            '<option value="" class="form-control" ><?php echo e(__('app.menu.selectProduct')); ?></option>' +
                            options);
                        $('#add-products').selectpicker('refresh');
                    }
                }
            });
        });

        const hsn_status = <?php echo e($invoiceSetting->hsn_sac_code_show); ?>;

        quillMention(null, '#description');

        const file = $('#sortable .dropify').dropify({
            messages: dropifyMessages
        });

        file.on('dropify.beforeClear', function(event, element) {
            let invoice_item_id = $(this).data('id');
            let file_path = $(this).data('default-file');
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

                    const url = "<?php echo e(route('estimates.delete_image')); ?>";
                    const token = "<?php echo e(csrf_token()); ?>";

                    $.easyAjax({
                        type: 'get',
                        url: url,
                        blockUI: true,
                        data: {
                            '_token': token,
                            'invoice_item_id': invoice_item_id,
                            'file_path': file_path
                        },
                        success: function(response) {
                            if (response.status === "success") {
                                element.resetPreview();
                            }
                        }
                    });
                }
            });

            return false;
        });

        $('.custom-date-picker').each(function(ind, el) {
            datepicker(el, {
                position: 'bl',
                ...datepickerConfig
            });
        });

        const dp1 = datepicker('#valid_till', {
            position: 'bl',
            dateSelected: new Date("<?php echo e(str_replace('-', '/', $estimate->valid_till)); ?>"),
            ...datepickerConfig
        });

        const resetAddProductButton = () => {
            $("#add-products").val('').selectpicker("refresh");
        };

        $('#add-products').on('changed.bs.select', function(e, clickedIndex, isSelected, previousValue) {
            e.stopImmediatePropagation()
            var id = $(this).val();
            if (previousValue !== id && id !== '') {
                addProduct(id);
                resetAddProductButton();
            }
        });

        function addProduct(id) {
            const currencyId = $('#currency_id').val();

            $.easyAjax({
                url: "<?php echo e(route('invoices.add_item')); ?>",
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

                    const noOfRows = $(document).find('#sortable .item-row').length;
                    const i = $(document).find('.item_name').length - 1;
                    const itemRow = $(document).find('#sortable .item-row:nth-child(' + noOfRows +
                        ') select.type');
                    itemRow.attr('id', 'multiselect' + i);
                    itemRow.attr('name', 'taxes[' + i + '][]');
                    $(document).find('#multiselect' + i).selectpicker();
                }
            });
        }

        $(document).on('click', '#add-item', function() {

            const i = $(document).find('.item_name').length;
            let item = ' <div class="d-flex px-4 py-3 c-inv-desc item-row">' +
                '<div class="c-inv-desc-table w-100 d-lg-flex d-md-flex d-block">' +
                '<table width="100%">' +
                '<tbody>' +
                '<tr class="text-dark-grey font-weight-bold f-14">' +
                '<td width="<?php echo e($invoiceSetting->hsn_sac_code_show ? '40%' : '50%'); ?>" class="border-0 inv-desc-mbl btlr"><?php echo app('translator')->get("app.description"); ?></td>';

            if (hsn_status == 1) {
                item += '<td width="10%" class="border-0" align="right"><?php echo app('translator')->get("app.hsnSac"); ?></td>';
            }

            item +=
                `<td width="10%" class="border-0" align="right"><?php echo app('translator')->get("modules.invoices.qty"); ?></td>
                <td width="10%" class="border-0" align="right"><?php echo app('translator')->get("modules.invoices.unitPrice"); ?></td>
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
                '<input type="number" min="1" class="form-control f-14 border-0 w-100 text-right quantity" value="1" name="quantity[]">' +
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
                '<input type="number" min="1" class="f-14 border-0 w-100 text-right cost_per_item form-control" placeholder="0.00" value="0" name="cost_per_item[]">' +
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
                
                '</tr>' +
                '</tbody>' +
                '</table>' +
                '</div>' +
                '<a href="javascript:;" class="d-flex align-items-center justify-content-center ml-3 remove-item"><i class="fa fa-times-circle f-20 text-lightest"></i></a>' +
                '</div>';
            $(item).hide().appendTo("#sortable").fadeIn(500);
            $('#multiselect' + i).selectpicker();

            $(document).find('#dropify' + i).dropify({
                messages: dropifyMessages
            });
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

            if (KTUtil.isMobileDevice()) {
                $('.desktop-description').remove();
            } else {
                $('.mobile-description').remove();
            }

            let note = document.getElementById('description').children[0].innerHTML;
            document.getElementById('description-text').value = note;

            calculateTotal();

            const discount = $('#discount_amount').html();
            const total = $('.sub-total-field').val();

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
                url: "<?php echo e(route('estimates.update', $estimate->id)); ?>",
                container: '#saveInvoiceForm',
                type: "POST",
                disableButton: true,
                blockUI: true,
                buttonSelector: ".save-form",
                redirect: true,
                file: true,
                data: $('#saveInvoiceForm').serialize(),
                success: function(response) {
                    if (response.status === 'success') {
                        if (typeof invoiceDropzone !== 'undefined' && invoiceDropzone.getQueuedFiles().length > 0) {
                            estimateId = response.estimateId;
                            $('#estimateId').val(response.estimateId);
                            invoiceDropzone.processQueue();
                        }
                        else {
                            window.location.href = response.redirectUrl;
                        }
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
            const quantity = $(this).closest('.item-row').find('.quantity').val();
            const perItemCost = $(this).closest('.item-row').find('.cost_per_item').val();
            const amount = (quantity * perItemCost);

            $(this).closest('.item-row').find('.amount').val(decimalupto2(amount));
            $(this).closest('.item-row').find('.amount-html').html(decimalupto2(amount));

            calculateTotal();
        });

        $('#saveInvoiceForm').on('change', '.type, #discount_type, #calculate_tax', function() {
            const quantity = $(this).closest('.item-row').find('.quantity').val();
            const perItemCost = $(this).closest('.item-row').find('.cost_per_item').val();
            const amount = (quantity * perItemCost);

            $(this).closest('.item-row').find('.amount').val(decimalupto2(amount));
            $(this).closest('.item-row').find('.amount-html').html(decimalupto2(amount));

            calculateTotal();
        });

        $('#saveInvoiceForm').on('input', '.quantity', function () {
            const quantity = $(this).closest('.item-row').find('.quantity').val();
            const perItemCost = $(this).closest('.item-row').find('.cost_per_item').val();
            const amount = (quantity * perItemCost);

            $(this).closest('.item-row').find('.amount').val(decimalupto2(amount));
            $(this).closest('.item-row').find('.amount-html').html(decimalupto2(amount));

            calculateTotal();
        });

        calculateTotal();

        <?php if (isset($component)) { $__componentOriginal7e99458729620cde50aeae9b165a19fc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7e99458729620cde50aeae9b165a19fc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.custom-field-filejs','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.custom-field-filejs'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7e99458729620cde50aeae9b165a19fc)): ?>
<?php $attributes = $__attributesOriginal7e99458729620cde50aeae9b165a19fc; ?>
<?php unset($__attributesOriginal7e99458729620cde50aeae9b165a19fc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7e99458729620cde50aeae9b165a19fc)): ?>
<?php $component = $__componentOriginal7e99458729620cde50aeae9b165a19fc; ?>
<?php unset($__componentOriginal7e99458729620cde50aeae9b165a19fc); ?>
<?php endif; ?>

        init(RIGHT_MODAL);
    });

    function ucWord(str){
            str = str.toLowerCase().replace(/\b[a-z]/g, function(letter) {
                return letter.toUpperCase();
            });
            return str;
        }

    $('#client_id').change(function() {
            var id = $(this).val();
            changeClient(id);
    });
    function changeClient(id) {

        if (id == '') {
            id = 0;
        }

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
    }

</script>

<?php endif; ?>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/estimates/ajax/edit.blade.php ENDPATH**/ ?>