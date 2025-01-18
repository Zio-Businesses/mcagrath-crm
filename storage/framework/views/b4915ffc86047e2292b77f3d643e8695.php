<link rel="stylesheet" href="<?php echo e(asset('vendor/css/image-picker.min.css')); ?>">

<div class="col-lg-12 col-md-12 ntfcn-tab-content-left w-100 p-4 ">
    <?php echo method_field('POST'); ?>
    <div class="row">
        <div class="col-lg-12 mt-4">
            <div class="form-group">
                <?php if (isset($component)) { $__componentOriginal89b295b0763c93abe0143426334eb5d6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal89b295b0763c93abe0143426334eb5d6 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Label::resolve(['fieldId' => 'template','fieldLabel' => __('modules.invoiceSettings.template'),'fieldRequired' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                <select name="template" class="image-picker show-labels show-html">
                    <option data-img-src="<?php echo e(asset('img/invoice-template/1.png')); ?>"
                        <?php if($invoiceSetting->template == 'invoice-1'): ?> selected <?php endif; ?> value="invoice-1"><?php echo app('translator')->get('modules.invoiceSettings.template'); ?> 1
                    </option>
                    <option data-img-src="<?php echo e(asset('img/invoice-template/2.png')); ?>"
                        <?php if($invoiceSetting->template == 'invoice-2'): ?> selected <?php endif; ?> value="invoice-2"><?php echo app('translator')->get('modules.invoiceSettings.template'); ?> 2
                    </option>
                    <option data-img-src="<?php echo e(asset('img/invoice-template/3.png')); ?>"
                        <?php if($invoiceSetting->template == 'invoice-3'): ?> selected <?php endif; ?> value="invoice-3"><?php echo app('translator')->get('modules.invoiceSettings.template'); ?> 3
                    </option>
                    <option data-img-src="<?php echo e(asset('img/invoice-template/4.png')); ?>"
                        <?php if($invoiceSetting->template == 'invoice-4'): ?> selected <?php endif; ?> value="invoice-4"><?php echo app('translator')->get('modules.invoiceSettings.template'); ?> 4
                    </option>
                    <option data-img-src="<?php echo e(asset('img/invoice-template/5.png')); ?>"
                        <?php if($invoiceSetting->template == 'invoice-5'): ?> selected <?php endif; ?> value="invoice-5"><?php echo app('translator')->get('modules.invoiceSettings.template'); ?> 5
                    </option>
                </select>
            </div>
        </div>
    </div>
</div>

<!-- Buttons Start -->
<div class="w-100 border-top-grey">
    <?php if (isset($component)) { $__componentOriginal22960d0612890da31753448e47f28003 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal22960d0612890da31753448e47f28003 = $attributes; } ?>
<?php $component = App\View\Components\SettingFormActions::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('setting-form-actions'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SettingFormActions::class))->getConstructor()): ?>
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
<?php $component->withAttributes(['id' => 'save-form','class' => 'mr-3']); ?><?php echo app('translator')->get('app.save'); ?>
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
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal22960d0612890da31753448e47f28003)): ?>
<?php $attributes = $__attributesOriginal22960d0612890da31753448e47f28003; ?>
<?php unset($__attributesOriginal22960d0612890da31753448e47f28003); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal22960d0612890da31753448e47f28003)): ?>
<?php $component = $__componentOriginal22960d0612890da31753448e47f28003; ?>
<?php unset($__componentOriginal22960d0612890da31753448e47f28003); ?>
<?php endif; ?>
</div>
<!-- Buttons End -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/image-picker/0.3.1/image-picker.min.js"></script>
<script>
    // Initializing image picker
    $('.image-picker').imagepicker();

    // save invoice setting
    $('#save-form').click(function() {
        $.easyAjax({
            url: "<?php echo e(route('invoice_settings.update_template', $invoiceSetting->id)); ?>",
            container: '#editSettings',
            type: "POST",
            redirect: true,
            file: true,
            data: $('#editSettings').serialize(),
            disableButton: true,
            blockUI: true,
            buttonSelector: "#save-form",
        });
    });
</script>
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\invoice-settings\ajax\template.blade.php ENDPATH**/ ?>