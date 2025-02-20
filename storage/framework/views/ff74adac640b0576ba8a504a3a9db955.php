<!DOCTYPE html>

<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?php echo e(asset('vendor/css/all.min.css')); ?>">

    <!-- Template CSS -->
    <link type="text/css" rel="stylesheet" media="all" href="<?php echo e(asset('css/main.css')); ?>">

    <!-- DatePicker CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('vendor/css/datepicker.min.css')); ?>">

    <title><?php echo app('translator')->get($pageTitle); ?></title>
    <meta name="msapplication-TileColor" content="#ffffff">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e($company->favicon_url ?? ''); ?>">
    <meta name="msapplication-TileImage" content="<?php echo e($company->favicon_url ?? ''); ?>">

    <meta name="theme-color" content="#ffffff">

    <?php echo $__env->make('sections.theme_css', ['company' => $company], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php if(isset($activeSettingMenu)): ?>
        <style>
            .preloader-container {
                margin-left: 510px;
                width: calc(100% - 510px)
            }

        </style>
    <?php endif; ?>

    <?php echo $__env->yieldPushContent('styles'); ?>

    <style>
        :root {
            --fc-border-color: #E8EEF3;
            --fc-button-text-color: #99A5B5;
            --fc-button-border-color: #99A5B5;
            --fc-button-bg-color: #ffffff;
            --fc-button-active-bg-color: #171f29;
            --fc-today-bg-color: #f2f4f7;
        }

        .fc a[data-navlink] {
            color: #99a5b5;
        }

        img {
            width: 50px;
            margin-top: 20px;
        }

        .box {
            margin-top: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

    </style>

</head>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->


<body><!-- change dark theme class according to application dark theme setting -->

<div class="box">

    <div class="<?php if($styled == 1): ?> col-md-6 <?php else: ?> col-md-12 <?php endif; ?>">
        <?php if($withLogo == 1): ?>
            <div class="text-center mb-2">
                <img src="<?php echo e($company->logo_url); ?>" alt="<?php echo e($company->company_name); ?>"
                     class="text-center" height="50px"/>
            </div>
        <?php endif; ?>
        <div class="white-box p-t-20 border-dark">
            <?php if (isset($component)) { $__componentOriginal18ad2e0d264f9740dc73fff715357c28 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal18ad2e0d264f9740dc73fff715357c28 = $attributes; } ?>
<?php $component = App\View\Components\Form::resolve(['method' => 'POST'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Form::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'createLead']); ?>
                <div class="form-body">
                    <div class="row">

                        <?php $__currentLoopData = $leadFormFields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($item->custom_fields_id === null): ?>

                                <?php if($item->field_name == 'product'): ?>
                                    <div class="col-md-6">
                                        <?php if(in_array('products', user_modules()) || in_array('purchase', user_modules())): ?>
                                            <?php if (isset($component)) { $__componentOriginal67cd5dc9866c6185ad92d933c387fa86 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal67cd5dc9866c6185ad92d933c387fa86 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Select::resolve(['fieldId' => 'product','fieldLabel' => __('modules.module.'.$item->field_name),'fieldName' => $item->field_name.'[]','fieldRequired' => $item->required == 1,'search' => 'true','multiple' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Select::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($product->id); ?>"><?php echo e($product->name); ?></option>
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
                                        <?php endif; ?>
                                    </div>

                                <?php elseif($item->field_name == 'country'): ?>
                                    <div class="col-md-6">
                                        <?php if (isset($component)) { $__componentOriginal67cd5dc9866c6185ad92d933c387fa86 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal67cd5dc9866c6185ad92d933c387fa86 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Select::resolve(['fieldId' => 'country','fieldLabel' => __('modules.leads.'.$item->field_name),'fieldName' => $item->field_name,'fieldRequired' => $item->required == 1,'search' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Select::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                            <option value="">--</option>
                                            <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option data-tokens="<?php echo e($country->iso3); ?>"
                                                        data-content="<span class='flag-icon flag-icon-<?php echo e(strtolower($country->iso)); ?> flag-icon-squared'></span> <?php echo e($country->nicename); ?>"
                                                        value="<?php echo e($country->nicename); ?>"><?php echo e($country->nicename); ?></option>
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
                                <?php elseif($item->field_name == 'source'): ?>
                                    <div class="col-md-6">
                                        <?php if (isset($component)) { $__componentOriginal67cd5dc9866c6185ad92d933c387fa86 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal67cd5dc9866c6185ad92d933c387fa86 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Select::resolve(['fieldId' => 'source','fieldLabel' => __('modules.lead.'.$item->field_name),'fieldName' => $item->field_name,'fieldRequired' => $item->required == 1,'search' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Select::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                            <option value="">--</option>
                                            <?php $__currentLoopData = $sources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $source): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option
                                                    value="<?php echo e($source->id); ?>"><?php echo e($source->type); ?></option>
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
                                <?php elseif($item->field_name == 'message'): ?>
                                    <div class="col-md-6">
                                        <?php if (isset($component)) { $__componentOriginal2f60389a9e230471cd863683376c182f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2f60389a9e230471cd863683376c182f = $attributes; } ?>
<?php $component = App\View\Components\Forms\Textarea::resolve(['fieldId' => $item->field_name,'fieldLabel' => __('modules.leads.'.$item->field_name),'fieldName' => $item->field_name,'fieldRequired' => $item->required == 1] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Textarea::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
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
                                <?php else: ?>
                                    <div class="col-md-6">
                                        <?php if (isset($component)) { $__componentOriginal4e45e801405ab67097982370a6a83cba = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4e45e801405ab67097982370a6a83cba = $attributes; } ?>
<?php $component = App\View\Components\Forms\Text::resolve(['fieldId' => $item->field_name,'fieldLabel' => __('modules.leads.'.$item->field_name),'fieldName' => $item->field_name,'fieldRequired' => $item->required == 1] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                                <?php endif; ?>
                            <?php else: ?>
                                <?php if(isset($item->customField->type) && $item->customField->type == 'text'): ?>
                                    <div class="col-md-6">
                                        <?php if (isset($component)) { $__componentOriginal4e45e801405ab67097982370a6a83cba = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4e45e801405ab67097982370a6a83cba = $attributes; } ?>
<?php $component = App\View\Components\Forms\Text::resolve(['fieldId' => 'custom_fields_data['.e($item->field_name . '_' . $item->customField->id).']','fieldLabel' => $item->field_display_name,'fieldName' => 'custom_fields_data['.e($item->field_name . '_' . $item->customField->id).']','fieldRequired' => ($item->required === 1) ? true : false] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                                <?php elseif($item->customField->type == 'password'): ?>
                                    <div class="col-md-6">
                                        <?php if (isset($component)) { $__componentOriginalfb88f1d3eff7e2c2e3f119e2a57087c6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfb88f1d3eff7e2c2e3f119e2a57087c6 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Password::resolve(['fieldId' => 'custom_fields_data['.e($item->field_name . '_' . $item->customField->id).']','fieldLabel' => $item->field_display_name,'fieldName' => 'custom_fields_data['.e($item->field_name . '_' . $item->customField->id).']','fieldPlaceholder' => $item->label,'fieldRequired' => ($item->required === 1) ? true : false] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.password'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Password::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfb88f1d3eff7e2c2e3f119e2a57087c6)): ?>
<?php $attributes = $__attributesOriginalfb88f1d3eff7e2c2e3f119e2a57087c6; ?>
<?php unset($__attributesOriginalfb88f1d3eff7e2c2e3f119e2a57087c6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfb88f1d3eff7e2c2e3f119e2a57087c6)): ?>
<?php $component = $__componentOriginalfb88f1d3eff7e2c2e3f119e2a57087c6; ?>
<?php unset($__componentOriginalfb88f1d3eff7e2c2e3f119e2a57087c6); ?>
<?php endif; ?>
                                    </div>
                                <?php elseif($item->customField->type == 'number'): ?>
                                    <div class="col-md-6">
                                        <?php if (isset($component)) { $__componentOriginal1fded940a0a5d34bf1b88a1f45916593 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1fded940a0a5d34bf1b88a1f45916593 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Number::resolve(['fieldId' => 'custom_fields_data['.e($item->field_name . '_' . $item->customField->id).']','fieldLabel' => $item->field_display_name,'fieldName' => 'custom_fields_data['.e($item->field_name . '_' . $item->customField->id).']','fieldRequired' => ($item->required === 1) ? true : false] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                                <?php elseif($item->customField->type == 'textarea'): ?>
                                    <div class="col-md-6">
                                        <?php if (isset($component)) { $__componentOriginal2f60389a9e230471cd863683376c182f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2f60389a9e230471cd863683376c182f = $attributes; } ?>
<?php $component = App\View\Components\Forms\Textarea::resolve(['fieldLabel' => $item->field_display_name,'fieldName' => 'custom_fields_data['.e($item->field_name . '_' . $item->customField->id).']','fieldId' => 'custom_fields_data['.e($item->field_name . '_' . $item->customField->id).']','fieldRequired' => ($item->required === 1) ? true : false] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Textarea::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
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
                                <?php elseif($item->customField->type == 'radio'): ?>
                                    <div class="col-md-6">
                                        <div class="form-group my-3">
                                            <?php if (isset($component)) { $__componentOriginal89b295b0763c93abe0143426334eb5d6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal89b295b0763c93abe0143426334eb5d6 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Label::resolve(['fieldId' => 'custom_fields_data['.e($item->field_name . '_' . $item->customField->id).']','fieldLabel' => $item->field_display_name,'fieldRequired' => ($item->required === 1) ? true : false] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                                            <div class="d-flex">
                                                <?php $__currentLoopData = json_decode($item->customField->values); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if (isset($component)) { $__componentOriginalc709ddc147ddde534205d9546b4fb0db = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc709ddc147ddde534205d9546b4fb0db = $attributes; } ?>
<?php $component = App\View\Components\Forms\Radio::resolve(['fieldId' => 'optionsRadios'.e($key . $item->customField->id).'','fieldLabel' => $value,'fieldName' => 'custom_fields_data['.e($item->field_name . '_' . $item->customField->id).']','fieldValue' => $value,'checked' => ($key == 0) ? true : false] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.radio'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Radio::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc709ddc147ddde534205d9546b4fb0db)): ?>
<?php $attributes = $__attributesOriginalc709ddc147ddde534205d9546b4fb0db; ?>
<?php unset($__attributesOriginalc709ddc147ddde534205d9546b4fb0db); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc709ddc147ddde534205d9546b4fb0db)): ?>
<?php $component = $__componentOriginalc709ddc147ddde534205d9546b4fb0db; ?>
<?php unset($__componentOriginalc709ddc147ddde534205d9546b4fb0db); ?>
<?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php elseif($item->customField->type == 'select'): ?>
                                    <div class="col-md-6">
                                        <div class="form-group my-3">
                                            <?php if (isset($component)) { $__componentOriginal67cd5dc9866c6185ad92d933c387fa86 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal67cd5dc9866c6185ad92d933c387fa86 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Select::resolve(['fieldId' => 'custom_fields_data['.e($item->field_name . '_' . $item->customField->id).']','fieldLabel' => $item->field_display_name,'fieldName' => 'custom_fields_data['.e($item->field_name . '_' . $item->customField->id).']','fieldRequired' => ($item->required === 1) ? true : false,'search' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Select::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                                <option value="">--</option>
                                                <?php $__currentLoopData = json_decode($item->customField->values); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($key); ?>"><?php echo e($item); ?></option>
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
                                    </div>
                                <?php elseif($item->customField->type == 'date'): ?>
                                    <div class="col-md-6">
                                        <?php if (isset($component)) { $__componentOriginalf704f069031d81dfb7cf95f6709a6a66 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf704f069031d81dfb7cf95f6709a6a66 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Datepicker::resolve(['custom' => 'true','fieldId' => 'custom_fields_data['.e($item->field_name . '_' . $item->customField->id).']','fieldRequired' => ($item->required === 1) ? true : false,'fieldLabel' => $item->field_display_name,'fieldName' => 'custom_fields_data['.e($item->field_name . '_' . $item->customField->id).']','fieldValue' => now()->timezone($company->timezone)->format($company->date_format),'fieldPlaceholder' => $item->label] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                                <?php elseif($item->customField->type == 'checkbox'): ?>
                                    <div class="col-md-6">
                                        <div class="form-group my-3">
                                            <?php if (isset($component)) { $__componentOriginal89b295b0763c93abe0143426334eb5d6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal89b295b0763c93abe0143426334eb5d6 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Label::resolve(['fieldId' => 'custom_fields_data['.e($item->field_name . '_' . $item->customField->id).']','fieldLabel' => $item->field_display_name,'fieldRequired' => ($item->required === 1) ? true : false] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                                            <div class="d-flex checkbox-<?php echo e($item->customField->id); ?>">
                                                <input type="hidden"
                                                       name="custom_fields_data[<?php echo e($item->field_name.'_'.$item->customField->id); ?>]"
                                                       id="<?php echo e($item->field_name.'_'.$item->customField->id); ?>">
                                                <?php $__currentLoopData = json_decode($item->customField->values); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if (isset($component)) { $__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Checkbox::resolve(['fieldId' => 'optionsRadios'.e($key . $item->customField->id).'','fieldLabel' => $value,'fieldName' => $item->field_name.'_'.$item->customField->id.'[]','fieldValue' => $value] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Checkbox::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['onchange' => 'checkboxChange(\'checkbox-'.e($item->customField->id).'\', \''.e($item->field_name.'_'.$item->customField->id).'\')','fieldRequired' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(($item->required === 1) ? true : false)]); ?>
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
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php elseif($item->customField->type == 'file'): ?>
                                    <div class="col-md-6">
                                        <input type="hidden"
                                               name="custom_fields_data[<?php echo e($item->field_name.'_'.$item->customField->id); ?>]">
                                        <?php if (isset($component)) { $__componentOriginal71f75760ce80416d6aa938be1ae7e8b2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal71f75760ce80416d6aa938be1ae7e8b2 = $attributes; } ?>
<?php $component = App\View\Components\Forms\File::resolve(['fieldLabel' => $item->field_display_name,'fieldRequired' => ($item->required === 1) ? true : false,'fieldName' => 'custom_fields_data[' . $item->field_name . '_' . $item->customField->id . ']','fieldId' => 'custom_fields_data[' . $item->field_name . '_' . $item->customField->id . ']','fieldValue' => ''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.file'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\File::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
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
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php if($globalSetting->google_recaptcha_status == 'active' && $globalSetting->google_recaptcha_v2_status == 'active'): ?>
                            <div class="col-md-12 col-lg-12 mt-2 mb-2" id="captcha_container"></div>
                        <?php endif; ?>

                        
                        <input type="hidden" id="g_recaptcha" name="g_recaptcha">

                        <?php if($errors->has('g-recaptcha-response')): ?>
                            <div class="help-block with-errors"><?php echo e($errors->first('g-recaptcha-response')); ?></div>
                        <?php endif; ?>

                    </div>
                </div>
                <br><br>
                <input type="hidden" name="company_id" value="<?php echo e($company->id); ?>">
                <div class="form-actions">
                    <button type="button" id="save-form" class="btn btn-primary"><i
                            class="fa fa-check"></i> <?php echo app('translator')->get('app.save'); ?></button>
                    <button type="reset" class="btn btn-secondary ml-3"><?php echo app('translator')->get('app.reset'); ?></button>
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

            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="alert alert-success" id="success-message" style="display:none"></div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>


<!-- jQuery -->
<script src="<?php echo e(asset('vendor/jquery/jquery.min.js')); ?>"></script>

<!-- Global Required Javascript -->
<script src="<?php echo e(asset('vendor/bootstrap/javascript/bootstrap-native.js')); ?>"></script>

<!-- Font Awesome -->
<script src="<?php echo e(asset('vendor/jquery/all.min.js')); ?>"></script>

<!-- Template JS -->
<script src="<?php echo e(asset('js/main.js')); ?>"></script>

<script>
    const MODAL_LG = '#myModal';
    const MODAL_XL = '#myModalXl';
    document.loading = '<?php echo app('translator')->get('app.loading'); ?>';
    const dropifyMessages = {
        default: "<?php echo app('translator')->get('app.dragDrop'); ?>",
        replace: "<?php echo app('translator')->get('app.dragDropReplace'); ?>",
        remove: "<?php echo app('translator')->get('app.remove'); ?>",
        error: "<?php echo app('translator')->get('messages.errorOccured'); ?>",
    };

    $(window).on('load', function () {
        // Animate loader off screen
        init();
        $(".preloader-container").fadeOut("slow", function () {
            $(this).removeClass("d-flex");
        });
    });

    const datepickerConfig = {
        formatter: (input, date, instance) => {
            input.value = moment(date).format('<?php echo e($globalSetting->moment_format); ?>')
        },
        showAllDates: true,
        customDays: <?php echo json_encode(\App\Models\GlobalSetting::getDaysOfWeek()); ?>,
        customMonths: <?php echo json_encode(\App\Models\GlobalSetting::getMonthsOfYear()); ?>,
        customOverlayMonths: <?php echo json_encode(\App\Models\GlobalSetting::getMonthsOfYear()); ?>,
        overlayButton: "<?php echo app('translator')->get('app.submit'); ?>",
        overlayPlaceholder: "<?php echo app('translator')->get('app.enterYear'); ?>",
        startDay: parseInt("<?php echo e(attendance_setting()->week_start_from); ?>")
    };
</script>
<script>

    $('.custom-date-picker').each(function (ind, el) {
        datepicker(el, {
            position: 'bl',
            ...datepickerConfig
        });
    });

    $(".select-picker").selectpicker();

    $('#save-form').click(function () {
        $.easyAjax({
            url: "<?php echo e(route('front.lead_store')); ?>",
            container: '#createLead',
            type: "POST",
            redirect: true,
            disableButton: true,
            file: true,
            blockUI: true,
            data: $('#createLead').serialize(),
            success: function (response) {
                if (response.status == "success") {
                    $('#createLead')[0].reset();
                    $('#createLead').hide();
                    $('#success-message').html(response.message);
                    $('#success-message').show();
                }
            }
        })
    });

</script>

<?php if($globalSetting->google_recaptcha_status == 'active' && $globalSetting->google_recaptcha_v2_status == 'active'): ?>
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
            async defer></script>
    <script>
        var gcv3;
        var onloadCallback = function () {
            // Renders the HTML element with id 'captcha_container' as a reCAPTCHA widget.
            // The id of the reCAPTCHA widget is assigned to 'gcv3'.
            gcv3 = grecaptcha.render('captcha_container', {
                'sitekey': '<?php echo e($globalSetting->google_recaptcha_v2_site_key); ?>',
                'theme': 'light',
                'callback': function (response) {
                    if (response) {
                        $('#g_recaptcha').val(response);
                    }
                },
            });
        };
    </script>
<?php endif; ?>

<?php if($globalSetting->google_recaptcha_status == 'active' && $globalSetting->google_recaptcha_v3_status == 'active'): ?>
    <script
        src="https://www.google.com/recaptcha/api.js?render=<?php echo e($globalSetting->google_recaptcha_v3_site_key); ?>"></script>
    <script>
        grecaptcha.ready(function () {
            grecaptcha.execute('<?php echo e($globalSetting->google_recaptcha_v3_site_key); ?>').then(function (token) {
                // Add your logic to submit to your backend server here.
                $('#g_recaptcha').val(token);
            });
        });
    </script>
<?php endif; ?>

</html>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/lead-form.blade.php ENDPATH**/ ?>