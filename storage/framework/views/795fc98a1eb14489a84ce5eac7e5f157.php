
<div class="col-lg-12 col-md-12 ntfcn-tab-content-left w-100 p-4 d-flex">
    <div class="col-md-6">
        <?php if (isset($component)) { $__componentOriginal67cd5dc9866c6185ad92d933c387fa86 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal67cd5dc9866c6185ad92d933c387fa86 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Select::resolve(['fieldId' => 'contract_id','fieldLabel' => __('Select WC Waiver Form Template'),'fieldName' => 'contract_id','search' => 'true','fieldRequired' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Select::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <option value="">--</option>
                <?php $__currentLoopData = $contract; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($category->id); ?>" <?php if($wform): ?><?php echo e($wform->waiver_template === $category->contract_detail ? 'selected' : ''); ?><?php endif; ?>>
                        <?php echo e($category->subject); ?> 
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
    <?php
        $selectedVendorStatus = $vendor_status->vendor_status ?? [];
    ?>
    
    <div class="col-md-6">
        <?php if (isset($component)) { $__componentOriginal67cd5dc9866c6185ad92d933c387fa86 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal67cd5dc9866c6185ad92d933c387fa86 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Select::resolve(['fieldId' => 'vendor_status','fieldLabel' => __('Select Vendor Status For Work Order'),'fieldName' => 'vendor_status[]','search' => 'true','fieldRequired' => 'true','multiple' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Select::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <option value="">--</option>
                <option value="Active" <?php echo e(in_array('Active', $selectedVendorStatus) ? 'selected' : ''); ?> data-content='<i class="fa fa-circle mr-2" style="color:#00b5ff;"></i>Active'>
                <option  value="Compliant" <?php echo e(in_array('Compliant', $selectedVendorStatus) ? 'selected' : ''); ?> data-content='<i class="fa fa-circle mr-2" style="color:#679c0d;"></i>Compliant'>
                <option  value="Snooze" <?php echo e(in_array('Snooze', $selectedVendorStatus) ? 'selected' : ''); ?> data-content='<i class="fa fa-circle mr-2" style="color:#FFA500;"></i>Snooze'>
                <option  value="Non Compliant" <?php echo e(in_array('Non Compliant', $selectedVendorStatus) ? 'selected' : ''); ?> data-content='<i class="fa fa-circle mr-2" style="color:#FFFF00;"></i>Non Compliant'>
                <option  value="DNU" <?php echo e(in_array('DNU', $selectedVendorStatus) ? 'selected' : ''); ?> data-content='<i class="fa fa-circle mr-2" style="color:#FF0000;"></i>DNU'>
                <option  value="On Hold" <?php echo e(in_array('On Hold', $selectedVendorStatus) ? 'selected' : ''); ?> data-content='<i class="fa fa-circle mr-2" style="color:#808080;"></i>On Hold'>
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


<script>
 $(document).ready(function() {
    $('#contract_id').change(function() {
        var select = $(this).val();
        var url="<?php echo e(route('vendor-settings.store')); ?>";
        $.easyAjax({
                url: url,
                type: 'POST',
                blockUI: true,
                data: {
                        _token: '<?php echo e(csrf_token()); ?>',
                        value: select,
                    },
                success: function(response) {
                    if (response.status == 'success') {
                        window.location.reload();
                    } 
                },
            });
    });
    $('#vendor_status').change(function() {
        var select = $(this).val();
        var url="<?php echo e(route('vendor-work-status.store')); ?>";
        $.easyAjax({
                url: url,
                type: 'POST',
                blockUI: true,
                data: {
                        _token: '<?php echo e(csrf_token()); ?>',
                        value: select,
                    },
                success: function(response) {
                    if (response.status == 'success') {
                        window.location.reload();
                    } 
                },
            });
    });
});
</script>

<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/vendor-settings/ajax/wcform.blade.php ENDPATH**/ ?>