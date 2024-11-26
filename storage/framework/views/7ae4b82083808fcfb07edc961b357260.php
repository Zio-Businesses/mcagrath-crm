<link rel="stylesheet" href="<?php echo e(asset('vendor/css/dropzone.min.css')); ?>">

<!-- TAB CONTENT START -->
<div class="col-xl-12 col-lg-12 col-md-12" id="documents">
    <div class="row p-2">
        <div class="col-xl-6 col-lg-6 col-md-6 ml-0 p-2 ">
            <?php if (isset($component)) { $__componentOriginal18ad2e0d264f9740dc73fff715357c28 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal18ad2e0d264f9740dc73fff715357c28 = $attributes; } ?>
<?php $component = App\View\Components\Form::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Form::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'save-contractor-license']); ?>
            <div class="border-grey d-xl-flex">
                <div class="col ml-0 px-0">
                    <input type="file" class="dropify mr-0 mr-lg-2 mr-md-2 w-100" id="contractor_license" name="contractor_license" />
                </div>
                <div class="col ml-2 mt-3">
                    <div class="dropdown ml-auto d-flex a">
                        <p class="f-14 font-weight-bold" style="width:90%;">Contractor License</p>
                        <button
                            class="btn btn-lg f-14 p-0 text-lightest text-capitalize rounded  dropdown-toggle mb-2"
                            type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width:10%;">
                            <i class="fa fa-ellipsis-h"></i>
                        </button>
                        
                        <div class="dropdown-menu dropdown-menu-right border-grey rounded b-shadow-4 p-0"
                            aria-labelledby="dropdownMenuLink" tabindex="0">
                            <a class="cursor-pointer d-block text-dark-grey f-13 pt-3 px-3 "
                                    target="_blank"
                                    ><?php echo app('translator')->get('app.view'); ?></a>
                            <a class="cursor-pointer d-block text-dark-grey f-13 pt-3 px-3 edit-file"
                                
                                href="javascript:;"><?php echo app('translator')->get('Edit'); ?></a>
                            <a class="cursor-pointer d-block text-dark-grey f-13 py-3 px-3 "
                                href=""><?php echo app('translator')->get('app.download'); ?></a>
                            <a class="cursor-pointer d-block text-dark-grey f-13 pb-3 px-3 delete-file"
                                
                                href="javascript:;"><?php echo app('translator')->get('app.delete'); ?></a>
                        </div>
                    </div>
                    <?php if (isset($component)) { $__componentOriginal7e30a74dcb37e090b2a36f2055f14e6b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7e30a74dcb37e090b2a36f2055f14e6b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.cards.data-row-mod','data' => ['label' => __('modules.employees.fullName'),'value' => user()->id]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data-row-mod'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('modules.employees.fullName')),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(user()->id)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7e30a74dcb37e090b2a36f2055f14e6b)): ?>
<?php $attributes = $__attributesOriginal7e30a74dcb37e090b2a36f2055f14e6b; ?>
<?php unset($__attributesOriginal7e30a74dcb37e090b2a36f2055f14e6b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7e30a74dcb37e090b2a36f2055f14e6b)): ?>
<?php $component = $__componentOriginal7e30a74dcb37e090b2a36f2055f14e6b; ?>
<?php unset($__componentOriginal7e30a74dcb37e090b2a36f2055f14e6b); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal7e30a74dcb37e090b2a36f2055f14e6b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7e30a74dcb37e090b2a36f2055f14e6b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.cards.data-row-mod','data' => ['label' => __('modules.employees.fullName'),'value' => user()->id]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data-row-mod'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('modules.employees.fullName')),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(user()->id)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7e30a74dcb37e090b2a36f2055f14e6b)): ?>
<?php $attributes = $__attributesOriginal7e30a74dcb37e090b2a36f2055f14e6b; ?>
<?php unset($__attributesOriginal7e30a74dcb37e090b2a36f2055f14e6b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7e30a74dcb37e090b2a36f2055f14e6b)): ?>
<?php $component = $__componentOriginal7e30a74dcb37e090b2a36f2055f14e6b; ?>
<?php unset($__componentOriginal7e30a74dcb37e090b2a36f2055f14e6b); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal7e30a74dcb37e090b2a36f2055f14e6b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7e30a74dcb37e090b2a36f2055f14e6b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.cards.data-row-mod','data' => ['label' => __('modules.employees.fullName'),'value' => user()->id]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data-row-mod'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('modules.employees.fullName')),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(user()->id)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7e30a74dcb37e090b2a36f2055f14e6b)): ?>
<?php $attributes = $__attributesOriginal7e30a74dcb37e090b2a36f2055f14e6b; ?>
<?php unset($__attributesOriginal7e30a74dcb37e090b2a36f2055f14e6b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7e30a74dcb37e090b2a36f2055f14e6b)): ?>
<?php $component = $__componentOriginal7e30a74dcb37e090b2a36f2055f14e6b; ?>
<?php unset($__componentOriginal7e30a74dcb37e090b2a36f2055f14e6b); ?>
<?php endif; ?>
                </div>
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
        <div class="col-xl-6 col-lg-6 col-md-6 ml-0 p-2 ">
            <?php if (isset($component)) { $__componentOriginal18ad2e0d264f9740dc73fff715357c28 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal18ad2e0d264f9740dc73fff715357c28 = $attributes; } ?>
<?php $component = App\View\Components\Form::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Form::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'save-buisness-license']); ?>
            <div class="border-grey d-xl-flex">
                <div class="col ml-0 px-0">
                    <input type="file" class="dropify mr-0 mr-lg-2 mr-md-2 w-100" id="buisness_license" name="buisness_license" />
                </div>
                <div class="col ml-2 mt-4">
                    <div class="dropdown ml-auto d-flex ">
                        <p class="f-14 font-weight-bold" style="width:90%;">Buisness License</p>
                        <button
                            class="btn btn-lg f-14 p-0 text-lightest text-capitalize rounded  dropdown-toggle mb-2"
                            type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width:10%;">
                            <i class="fa fa-ellipsis-h"></i>
                        </button>
                        
                        <div class="dropdown-menu dropdown-menu-right border-grey rounded b-shadow-4 p-0"
                            aria-labelledby="dropdownMenuLink" tabindex="0">
                            <a class="cursor-pointer d-block text-dark-grey f-13 pt-3 px-3 "
                                    target="_blank"
                                    ><?php echo app('translator')->get('app.view'); ?></a>
                            <a class="cursor-pointer d-block text-dark-grey f-13 pt-3 px-3 edit-file"
                                
                                href="javascript:;"><?php echo app('translator')->get('Edit'); ?></a>
                            <a class="cursor-pointer d-block text-dark-grey f-13 py-3 px-3 "
                                href=""><?php echo app('translator')->get('app.download'); ?></a>
                            <a class="cursor-pointer d-block text-dark-grey f-13 pb-3 px-3 delete-file"
                                
                                href="javascript:;"><?php echo app('translator')->get('app.delete'); ?></a>
                        </div>
                    </div>
                    <?php if (isset($component)) { $__componentOriginal7e30a74dcb37e090b2a36f2055f14e6b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7e30a74dcb37e090b2a36f2055f14e6b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.cards.data-row-mod','data' => ['label' => __('modules.employees.fullName'),'value' => user()->id]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data-row-mod'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('modules.employees.fullName')),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(user()->id)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7e30a74dcb37e090b2a36f2055f14e6b)): ?>
<?php $attributes = $__attributesOriginal7e30a74dcb37e090b2a36f2055f14e6b; ?>
<?php unset($__attributesOriginal7e30a74dcb37e090b2a36f2055f14e6b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7e30a74dcb37e090b2a36f2055f14e6b)): ?>
<?php $component = $__componentOriginal7e30a74dcb37e090b2a36f2055f14e6b; ?>
<?php unset($__componentOriginal7e30a74dcb37e090b2a36f2055f14e6b); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal7e30a74dcb37e090b2a36f2055f14e6b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7e30a74dcb37e090b2a36f2055f14e6b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.cards.data-row-mod','data' => ['label' => __('modules.employees.fullName'),'value' => user()->id]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data-row-mod'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('modules.employees.fullName')),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(user()->id)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7e30a74dcb37e090b2a36f2055f14e6b)): ?>
<?php $attributes = $__attributesOriginal7e30a74dcb37e090b2a36f2055f14e6b; ?>
<?php unset($__attributesOriginal7e30a74dcb37e090b2a36f2055f14e6b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7e30a74dcb37e090b2a36f2055f14e6b)): ?>
<?php $component = $__componentOriginal7e30a74dcb37e090b2a36f2055f14e6b; ?>
<?php unset($__componentOriginal7e30a74dcb37e090b2a36f2055f14e6b); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal7e30a74dcb37e090b2a36f2055f14e6b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7e30a74dcb37e090b2a36f2055f14e6b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.cards.data-row-mod','data' => ['label' => __('modules.employees.fullName'),'value' => user()->id]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data-row-mod'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('modules.employees.fullName')),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(user()->id)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7e30a74dcb37e090b2a36f2055f14e6b)): ?>
<?php $attributes = $__attributesOriginal7e30a74dcb37e090b2a36f2055f14e6b; ?>
<?php unset($__attributesOriginal7e30a74dcb37e090b2a36f2055f14e6b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7e30a74dcb37e090b2a36f2055f14e6b)): ?>
<?php $component = $__componentOriginal7e30a74dcb37e090b2a36f2055f14e6b; ?>
<?php unset($__componentOriginal7e30a74dcb37e090b2a36f2055f14e6b); ?>
<?php endif; ?>
                </div>
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
        
        <div class="col-xl-6 col-lg-6 col-md-6 ml-0 p-2 ">
            <?php if (isset($component)) { $__componentOriginal18ad2e0d264f9740dc73fff715357c28 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal18ad2e0d264f9740dc73fff715357c28 = $attributes; } ?>
<?php $component = App\View\Components\Form::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Form::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'save-coi']); ?>
                <div class="border-grey d-xl-flex rounded border">
                    <div class="col ml-0 px-0">
                        <input type="hidden" name ="vendor_id_coi" value="<?php echo e($vendorDetail->id); ?>"/>
                        <input type="file" class="dropify mr-0 mr-lg-2 mr-md-2 w-100" id="coi" name="coi" data-default-file="<?php echo e($coi?->filename ? $coi->coi_image_url : null); ?>"/>
                    </div>
                    <div class="col ml-2 mt-4">
                        <div class="dropdown ml-auto d-flex ">
                            <p class="f-14 font-weight-bold" style="width:90%;">COI</p>
                            <?php if($coi?->filename): ?>
                            <button
                                class="btn btn-lg f-14 p-0 text-lightest text-capitalize rounded  dropdown-toggle mb-2"
                                type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width:10%;">
                                <i class="fa fa-ellipsis-h"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right border-grey rounded b-shadow-4 p-0"
                                aria-labelledby="dropdownMenuLink" tabindex="0">
                                <a class="cursor-pointer d-block text-dark-grey f-13 pt-3 px-3 "
                                    target="_blank" href="<?php echo e($coi->coi_image_url); ?>"><?php echo app('translator')->get('app.view'); ?></a>
                                <a class="cursor-pointer d-block text-dark-grey f-13 pt-3 px-3 edit-coi"
                                    data-row-id="<?php echo e($coi->id); ?>"
                                    href="javascript:;"><?php echo app('translator')->get('Edit'); ?></a>
                                <a class="cursor-pointer d-block text-dark-grey f-13 py-3 px-3 "
                                    href="<?php echo e(route('vendor-coi.download', md5($coi->id))); ?>"><?php echo app('translator')->get('app.download'); ?></a>
                                <a class="cursor-pointer d-block text-dark-grey f-13 pb-3 px-3 delete-coi" 
                                    data-row-id="<?php echo e($coi->id); ?>"
                                    href="javascript:;"><?php echo app('translator')->get('app.delete'); ?></a>
                            </div>
                            <?php endif; ?>
                        </div>
                        <?php if (isset($component)) { $__componentOriginal7e30a74dcb37e090b2a36f2055f14e6b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7e30a74dcb37e090b2a36f2055f14e6b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.cards.data-row-mod','data' => ['label' => __('Expiry Date'),'value' => $coi && $coi->expiry_date ? $coi->expiry_date->translatedFormat(company()->date_format) : '']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data-row-mod'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Expiry Date')),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($coi && $coi->expiry_date ? $coi->expiry_date->translatedFormat(company()->date_format) : '')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7e30a74dcb37e090b2a36f2055f14e6b)): ?>
<?php $attributes = $__attributesOriginal7e30a74dcb37e090b2a36f2055f14e6b; ?>
<?php unset($__attributesOriginal7e30a74dcb37e090b2a36f2055f14e6b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7e30a74dcb37e090b2a36f2055f14e6b)): ?>
<?php $component = $__componentOriginal7e30a74dcb37e090b2a36f2055f14e6b; ?>
<?php unset($__componentOriginal7e30a74dcb37e090b2a36f2055f14e6b); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginal7e30a74dcb37e090b2a36f2055f14e6b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7e30a74dcb37e090b2a36f2055f14e6b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.cards.data-row-mod','data' => ['label' => __('Added By'),'value' => $coi->added->name??'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data-row-mod'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Added By')),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($coi->added->name??'')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7e30a74dcb37e090b2a36f2055f14e6b)): ?>
<?php $attributes = $__attributesOriginal7e30a74dcb37e090b2a36f2055f14e6b; ?>
<?php unset($__attributesOriginal7e30a74dcb37e090b2a36f2055f14e6b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7e30a74dcb37e090b2a36f2055f14e6b)): ?>
<?php $component = $__componentOriginal7e30a74dcb37e090b2a36f2055f14e6b; ?>
<?php unset($__componentOriginal7e30a74dcb37e090b2a36f2055f14e6b); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginal7e30a74dcb37e090b2a36f2055f14e6b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7e30a74dcb37e090b2a36f2055f14e6b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.cards.data-row-mod','data' => ['label' => __('Added Date'),'value' => $coi && $coi->created_at ? $coi->created_at->translatedFormat(company()->date_format) : '']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data-row-mod'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Added Date')),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($coi && $coi->created_at ? $coi->created_at->translatedFormat(company()->date_format) : '')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7e30a74dcb37e090b2a36f2055f14e6b)): ?>
<?php $attributes = $__attributesOriginal7e30a74dcb37e090b2a36f2055f14e6b; ?>
<?php unset($__attributesOriginal7e30a74dcb37e090b2a36f2055f14e6b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7e30a74dcb37e090b2a36f2055f14e6b)): ?>
<?php $component = $__componentOriginal7e30a74dcb37e090b2a36f2055f14e6b; ?>
<?php unset($__componentOriginal7e30a74dcb37e090b2a36f2055f14e6b); ?>
<?php endif; ?>
                    </div>
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
        <div class="col-xl-6 col-lg-6 col-md-6 ml-0 p-2 ">
            <?php if (isset($component)) { $__componentOriginal18ad2e0d264f9740dc73fff715357c28 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal18ad2e0d264f9740dc73fff715357c28 = $attributes; } ?>
<?php $component = App\View\Components\Form::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Form::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'save-wcomp']); ?>
            <div class="border-grey d-xl-flex">
                <div class="col ml-0 px-0">
                
                    <input type="file" class="dropify mr-0 mr-lg-2 mr-md-2 w-100" id="wcomp" name="wcomp" />
               
                </div>
                <div class="col ml-2 mt-4">
                    <div class="dropdown ml-auto d-flex a">
                        <p class="f-14 font-weight-bold" style="width:90%;">Workers Comp</p>
                        <button
                            class="btn btn-lg f-14 p-0 text-lightest text-capitalize rounded  dropdown-toggle mb-2"
                            type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width:10%;">
                            <i class="fa fa-ellipsis-h"></i>
                        </button>
                        
                        <div class="dropdown-menu dropdown-menu-right border-grey rounded b-shadow-4 p-0"
                            aria-labelledby="dropdownMenuLink" tabindex="0">
                            <a class="cursor-pointer d-block text-dark-grey f-13 pt-3 px-3 "
                                    target="_blank"
                                    ><?php echo app('translator')->get('app.view'); ?></a>
                            <a class="cursor-pointer d-block text-dark-grey f-13 pt-3 px-3 edit-file"
                                
                                href="javascript:;"><?php echo app('translator')->get('Edit'); ?></a>
                            <a class="cursor-pointer d-block text-dark-grey f-13 py-3 px-3 "
                                href=""><?php echo app('translator')->get('app.download'); ?></a>
                            <a class="cursor-pointer d-block text-dark-grey f-13 pb-3 px-3 delete-file"
                                
                                href="javascript:;"><?php echo app('translator')->get('app.delete'); ?></a>
                        </div>
                    </div>
                    <?php if (isset($component)) { $__componentOriginal7e30a74dcb37e090b2a36f2055f14e6b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7e30a74dcb37e090b2a36f2055f14e6b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.cards.data-row-mod','data' => ['label' => __('modules.employees.fullName'),'value' => user()->id]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data-row-mod'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('modules.employees.fullName')),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(user()->id)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7e30a74dcb37e090b2a36f2055f14e6b)): ?>
<?php $attributes = $__attributesOriginal7e30a74dcb37e090b2a36f2055f14e6b; ?>
<?php unset($__attributesOriginal7e30a74dcb37e090b2a36f2055f14e6b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7e30a74dcb37e090b2a36f2055f14e6b)): ?>
<?php $component = $__componentOriginal7e30a74dcb37e090b2a36f2055f14e6b; ?>
<?php unset($__componentOriginal7e30a74dcb37e090b2a36f2055f14e6b); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal7e30a74dcb37e090b2a36f2055f14e6b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7e30a74dcb37e090b2a36f2055f14e6b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.cards.data-row-mod','data' => ['label' => __('modules.employees.fullName'),'value' => user()->id]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data-row-mod'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('modules.employees.fullName')),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(user()->id)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7e30a74dcb37e090b2a36f2055f14e6b)): ?>
<?php $attributes = $__attributesOriginal7e30a74dcb37e090b2a36f2055f14e6b; ?>
<?php unset($__attributesOriginal7e30a74dcb37e090b2a36f2055f14e6b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7e30a74dcb37e090b2a36f2055f14e6b)): ?>
<?php $component = $__componentOriginal7e30a74dcb37e090b2a36f2055f14e6b; ?>
<?php unset($__componentOriginal7e30a74dcb37e090b2a36f2055f14e6b); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal7e30a74dcb37e090b2a36f2055f14e6b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7e30a74dcb37e090b2a36f2055f14e6b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.cards.data-row-mod','data' => ['label' => __('modules.employees.fullName'),'value' => user()->id]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data-row-mod'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('modules.employees.fullName')),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(user()->id)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7e30a74dcb37e090b2a36f2055f14e6b)): ?>
<?php $attributes = $__attributesOriginal7e30a74dcb37e090b2a36f2055f14e6b; ?>
<?php unset($__attributesOriginal7e30a74dcb37e090b2a36f2055f14e6b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7e30a74dcb37e090b2a36f2055f14e6b)): ?>
<?php $component = $__componentOriginal7e30a74dcb37e090b2a36f2055f14e6b; ?>
<?php unset($__componentOriginal7e30a74dcb37e090b2a36f2055f14e6b); ?>
<?php endif; ?>
                </div>
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
    <div class="row p-2">
        
        <div class="col-xl-6 col-lg-6 col-md-6 ml-0 p-2 ">
            <?php if (isset($component)) { $__componentOriginal18ad2e0d264f9740dc73fff715357c28 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal18ad2e0d264f9740dc73fff715357c28 = $attributes; } ?>
<?php $component = App\View\Components\Form::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Form::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'save-wnine']); ?>
            <div class="border-grey d-xl-flex">
                <div class="col ml-0 px-0">
                
                    <input type="file" class="dropify mr-0 mr-lg-2 mr-md-2 w-100" id="wnine" name="wnine" />
                
                </div>
                <div class="col ml-2 mt-4">
                    <div class="dropdown ml-auto d-flex a">
                        <p class="f-14 font-weight-bold" style="width:90%;">W9</p>
                        <button
                            class="btn btn-lg f-14 p-0 text-lightest text-capitalize rounded  dropdown-toggle mb-2"
                            type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width:10%;">
                            <i class="fa fa-ellipsis-h"></i>
                        </button>
                        
                        <div class="dropdown-menu dropdown-menu-right border-grey rounded b-shadow-4 p-0"
                            aria-labelledby="dropdownMenuLink" tabindex="0">
                            <a class="cursor-pointer d-block text-dark-grey f-13 pt-3 px-3 "
                                    target="_blank"
                                    ><?php echo app('translator')->get('app.view'); ?></a>
                            <a class="cursor-pointer d-block text-dark-grey f-13 pt-3 px-3 edit-file"
                                
                                href="javascript:;"><?php echo app('translator')->get('Edit'); ?></a>
                            <a class="cursor-pointer d-block text-dark-grey f-13 py-3 px-3 "
                                href=""><?php echo app('translator')->get('app.download'); ?></a>
                            <a class="cursor-pointer d-block text-dark-grey f-13 pb-3 px-3 delete-file"
                                
                                href="javascript:;"><?php echo app('translator')->get('app.delete'); ?></a>
                        </div>
                    </div>
                    <?php if (isset($component)) { $__componentOriginal7e30a74dcb37e090b2a36f2055f14e6b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7e30a74dcb37e090b2a36f2055f14e6b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.cards.data-row-mod','data' => ['label' => __('modules.employees.fullName'),'value' => user()->id]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data-row-mod'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('modules.employees.fullName')),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(user()->id)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7e30a74dcb37e090b2a36f2055f14e6b)): ?>
<?php $attributes = $__attributesOriginal7e30a74dcb37e090b2a36f2055f14e6b; ?>
<?php unset($__attributesOriginal7e30a74dcb37e090b2a36f2055f14e6b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7e30a74dcb37e090b2a36f2055f14e6b)): ?>
<?php $component = $__componentOriginal7e30a74dcb37e090b2a36f2055f14e6b; ?>
<?php unset($__componentOriginal7e30a74dcb37e090b2a36f2055f14e6b); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal7e30a74dcb37e090b2a36f2055f14e6b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7e30a74dcb37e090b2a36f2055f14e6b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.cards.data-row-mod','data' => ['label' => __('modules.employees.fullName'),'value' => user()->id]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data-row-mod'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('modules.employees.fullName')),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(user()->id)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7e30a74dcb37e090b2a36f2055f14e6b)): ?>
<?php $attributes = $__attributesOriginal7e30a74dcb37e090b2a36f2055f14e6b; ?>
<?php unset($__attributesOriginal7e30a74dcb37e090b2a36f2055f14e6b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7e30a74dcb37e090b2a36f2055f14e6b)): ?>
<?php $component = $__componentOriginal7e30a74dcb37e090b2a36f2055f14e6b; ?>
<?php unset($__componentOriginal7e30a74dcb37e090b2a36f2055f14e6b); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal7e30a74dcb37e090b2a36f2055f14e6b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7e30a74dcb37e090b2a36f2055f14e6b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.cards.data-row-mod','data' => ['label' => __('modules.employees.fullName'),'value' => user()->id]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data-row-mod'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('modules.employees.fullName')),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(user()->id)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7e30a74dcb37e090b2a36f2055f14e6b)): ?>
<?php $attributes = $__attributesOriginal7e30a74dcb37e090b2a36f2055f14e6b; ?>
<?php unset($__attributesOriginal7e30a74dcb37e090b2a36f2055f14e6b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7e30a74dcb37e090b2a36f2055f14e6b)): ?>
<?php $component = $__componentOriginal7e30a74dcb37e090b2a36f2055f14e6b; ?>
<?php unset($__componentOriginal7e30a74dcb37e090b2a36f2055f14e6b); ?>
<?php endif; ?>
                </div>
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
</div>
<div class="tab-pane fade show active mt-5" role="tabpanel" aria-labelledby="nav-email-tab">
    
    <?php if (isset($component)) { $__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9 = $attributes; } ?>
<?php $component = App\View\Components\Cards\Data::resolve(['title' => __('modules.projects.files')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Data::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
        <div class="row" id="add-btn">
            <div class="col-md-12">
                <a class="f-15 f-w-500" href="javascript:;" id="add-task-file"><i
                        class="icons icon-plus font-weight-bold mr-1"></i><?php echo app('translator')->get('modules.projects.uploadFile'); ?></a>
            </div>
        </div>
        <?php if (isset($component)) { $__componentOriginal18ad2e0d264f9740dc73fff715357c28 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal18ad2e0d264f9740dc73fff715357c28 = $attributes; } ?>
<?php $component = App\View\Components\Form::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Form::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'save-taskfile-data-form','class' => 'd-none']); ?>
            <div class="row">
                <div class="col-md-12">
                    <?php if (isset($component)) { $__componentOriginal22e84ee8172e1045de536542f4ffc9a0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal22e84ee8172e1045de536542f4ffc9a0 = $attributes; } ?>
<?php $component = App\View\Components\Forms\FileMultiple::resolve(['fieldLabel' => __('modules.projects.uploadFile'),'fieldName' => 'file','fieldId' => 'vendor_file'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.file-multiple'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\FileMultiple::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
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
                <div class="col-md-12">
                    <div class="w-100 justify-content-end d-flex mt-2">
                        <?php if (isset($component)) { $__componentOriginalc35c79ed7e812580313ad04118477974 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc35c79ed7e812580313ad04118477974 = $attributes; } ?>
<?php $component = App\View\Components\Forms\ButtonCancel::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-cancel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonCancel::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'cancel-taskfile','class' => 'border-0']); ?><?php echo app('translator')->get('app.cancel'); ?>
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
                </div>
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
      
        <div class="d-flex flex-wrap mt-3" id="task-file-list">
            <?php $__empty_1 = true; $__currentLoopData = $vendorDetail->docs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <?php if (isset($component)) { $__componentOriginalcc3eadf431dc104666da55af50a04915 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcc3eadf431dc104666da55af50a04915 = $attributes; } ?>
<?php $component = App\View\Components\FileCard::resolve(['fileName' => $file->filename,'dateAdded' => $file->created_at->diffForHumans()] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('file-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\FileCard::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                    <?php if($file->icon == 'images'): ?>
                        <img src="<?php echo e($file->file_url); ?>">
                    <?php else: ?>
                        <i class="fa <?php echo e($file->icon); ?> text-lightest"></i>
                    <?php endif; ?>
                     <?php $__env->slot('action', null, []); ?> 
                        <div class="dropdown ml-auto file-action">
                            <button
                                class="btn btn-lg f-14 p-0 text-lightest text-capitalize rounded  dropdown-toggle"
                                type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-ellipsis-h"></i>
                            </button>

                            <div class="dropdown-menu dropdown-menu-right border-grey rounded b-shadow-4 p-0"
                                aria-labelledby="dropdownMenuLink" tabindex="0">
                                <a class="cursor-pointer d-block text-dark-grey f-13 pt-3 px-3 "
                                        target="_blank"
                                        href="<?php echo e($file->file_url); ?>"><?php echo app('translator')->get('app.view'); ?></a>
                                <a class="cursor-pointer d-block text-dark-grey f-13 pt-3 px-3 rename-file"
                                    data-row-id="<?php echo e($file->id); ?>"
                                    href="javascript:;"><?php echo app('translator')->get('Rename'); ?></a>
                                <a class="cursor-pointer d-block text-dark-grey f-13 py-3 px-3 "
                                    href="<?php echo e(route('vendor-docs.download', md5($file->id))); ?>"><?php echo app('translator')->get('app.download'); ?></a>
                                <a class="cursor-pointer d-block text-dark-grey f-13 pb-3 px-3 delete-file"
                                    data-row-id="<?php echo e($file->id); ?>"
                                    href="javascript:;"><?php echo app('translator')->get('app.delete'); ?></a>
                            </div>
                        </div>
                     <?php $__env->endSlot(); ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcc3eadf431dc104666da55af50a04915)): ?>
<?php $attributes = $__attributesOriginalcc3eadf431dc104666da55af50a04915; ?>
<?php unset($__attributesOriginalcc3eadf431dc104666da55af50a04915); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcc3eadf431dc104666da55af50a04915)): ?>
<?php $component = $__componentOriginalcc3eadf431dc104666da55af50a04915; ?>
<?php unset($__componentOriginalcc3eadf431dc104666da55af50a04915); ?>
<?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="align-items-center d-flex flex-column text-lightest p-20 w-100">
                    <i class="fa fa-file-excel f-21 w-100"></i>

                    <div class="f-15 mt-4">
                        - <?php echo app('translator')->get('messages.noFileUploaded'); ?> -
                    </div>
                </div>
            <?php endif; ?>
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
</div>
<script>
$(document).ready(function() {
    $('.dropify').dropify();
    Dropzone.autoDiscover = false;
    taskDropzone = new Dropzone("#vendor_file", {
        dictDefaultMessage: "<?php echo e(__('app.dragDrop')); ?>",
        url: "<?php echo e(route('vendor-docs.store')); ?>",
        headers: {
            'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
        },
        paramName: "file",
        maxFilesize: DROPZONE_MAX_FILESIZE,
        maxFiles: DROPZONE_MAX_FILES,
        timeout: 0,
        uploadMultiple: true,
        addRemoveLinks: true,
        parallelUploads: DROPZONE_MAX_FILES,
        acceptedFiles: DROPZONE_FILE_ALLOW,
        init: function() {
            taskDropzone = this;
        }
    });
    taskDropzone.on('sending', function(file, xhr, formData) {
        var ids = "<?php echo e($vendorDetail->id); ?>";
        formData.append('vendor_id', ids);
        $.easyBlockUI();
    });
    taskDropzone.on('uploadprogress', function() {
        $.easyBlockUI();
    });
    taskDropzone.on('completemultiple', function(file) {
        var taskView = JSON.parse(file[0].xhr.response).view;
        taskDropzone.removeAllFiles();
        $.easyUnblockUI();
        $('#task-file-list').html(taskView);
    });
    taskDropzone.on('removedfile', function () {
        var grp = $('div#vendor_file').closest(".form-group");
        var label = $('div#file-upload-box').siblings("label");
        $(grp).removeClass("has-error");
        $(label).removeClass("is-invalid");
    });
    taskDropzone.on('error', function (file, message) {
        taskDropzone.removeFile(file);
        var grp = $('div#vendor_file').closest(".form-group");
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

    $('#add-task-file').click(function() {
        $(this).closest('.row').addClass('d-none');
        $('#save-taskfile-data-form').removeClass('d-none');
    });

    $('body').on('click', '#cancel-taskfile', function() {
        $('#save-taskfile-data-form').toggleClass('d-none');
        $('#add-btn').toggleClass('d-none');
    });
    $('body').on('click', '.rename-file', function() {

        var id = $(this).data('row-id');
        var url = "<?php echo e(route('vendor-docs.edit', ':id')); ?>";
        url = url.replace(':id', id);
        $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
        $.ajaxModal(MODAL_LG, url);
            
    });
    $('body').on('click', '.delete-file', function() {
        var id = $(this).data('row-id');
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
                var url = "<?php echo e(route('vendor-docs.destroy', ':id')); ?>";
                url = url.replace(':id', id);

                var token = "<?php echo e(csrf_token()); ?>";

                $.easyAjax({
                    type: 'POST',
                    url: url,
                    data: {
                        '_token': token,
                        '_method': 'DELETE'
                    },
                    success: function(response) {
                        if (response.status == "success") {
                            $('#task-file-list').html(response.view);
                        }
                    }
                });
            }
        });
    });
    $('#save-coi .dropify').on('change', function (event) {
        if (event.target.files.length > 0) {
            $.easyAjax({
                url: "<?php echo e(route('vendor-coi.store')); ?>",
                container: '#save-coi',
                type: "POST",
                file: true,
                disableButton: true,
                blockUI: true,
                data:$('#save-coi').serialize(),
                success: function(response) {
                   window.location.reload();
                }
            });
        }
    });
    $('body').on('click', '.delete-coi', function() {
        var id = $(this).data('row-id');
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
                var url = "<?php echo e(route('vendor-coi.destroy', ':id')); ?>";
                url = url.replace(':id', id);
                var token = "<?php echo e(csrf_token()); ?>";
                $.easyAjax({
                    type: 'POST',
                    url: url,
                    data: {
                        '_token': token,
                        '_method': 'DELETE'
                    },
                    success: function(response) {
                        if (response.status == "success") {
                            window.location.reload();
                        }
                    }
                });
            }
        });
    });
    $('body').on('click', '.edit-coi', function() {

        var id = $(this).data('row-id');
        var url = "<?php echo e(route('vendor-coi.edit', ':id')); ?>";
        url = url.replace(':id', id);
        $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
        $.ajaxModal(MODAL_LG, url);
        
    });
    
});

</script><?php /**PATH C:\xampp\htdocs\public_html\resources\views/vendors/ajax/docs.blade.php ENDPATH**/ ?>