<div class="table-responsive p-20">

    <?php if (isset($component)) { $__componentOriginal18ad2e0d264f9740dc73fff715357c28 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal18ad2e0d264f9740dc73fff715357c28 = $attributes; } ?>
<?php $component = App\View\Components\Form::resolve(['method' => 'POST'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Form::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'save-lead-status']); ?>
        <input type="hidden" name="company_id" id="company_id" value="<?php echo e($company->id); ?>" />
        <input type="hidden" name="user_id" id="user_id" value="<?php echo e($user->id); ?>" />
        <div class="col-lg-4">
            <?php if (isset($component)) { $__componentOriginal32ac71f8f6fe4764d54a65ca726f9ffc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal32ac71f8f6fe4764d54a65ca726f9ffc = $attributes; } ?>
<?php $component = App\View\Components\Forms\ToggleSwitch::resolve(['checked' => $leadSettings != null ? $leadSettings->status : false,'fieldLabel' => __('modules.deal.dealMethod'),'fieldName' => 'lead_setting_status','fieldId' => 'lead_setting_status'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.toggle-switch'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ToggleSwitch::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-0 mr-lg-12']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal32ac71f8f6fe4764d54a65ca726f9ffc)): ?>
<?php $attributes = $__attributesOriginal32ac71f8f6fe4764d54a65ca726f9ffc; ?>
<?php unset($__attributesOriginal32ac71f8f6fe4764d54a65ca726f9ffc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal32ac71f8f6fe4764d54a65ca726f9ffc)): ?>
<?php $component = $__componentOriginal32ac71f8f6fe4764d54a65ca726f9ffc; ?>
<?php unset($__componentOriginal32ac71f8f6fe4764d54a65ca726f9ffc); ?>
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
    <?php if (isset($component)) { $__componentOriginal5194778a3a7b899dcee5619d0610f5cf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5194778a3a7b899dcee5619d0610f5cf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.alert','data' => ['type' => 'warning']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'warning']); ?>
    <div><br><b>Information:</b><br><br><?php echo app('translator')->get('modules.deal.roundrobinNote'); ?><br>
        <br>&bull;<?php echo app('translator')->get('modules.deal.equalDistribution'); ?>
        <br>&bull;<?php echo app('translator')->get('modules.deal.sequentialAssignment'); ?>
        <br>&bull;<?php echo app('translator')->get('modules.deal.fairRotation'); ?>
        <br><?php echo app('translator')->get('modules.deal.roundrobinEx'); ?>
    </div>
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
</div>

<script>
$(document).ready(function () {
    $('#lead_setting_status').click(function () {
        var status = document.getElementById('lead_setting_status').checked ? 1 : 0;
        var companyID = document.getElementById('company_id').value;
        var userID = document.getElementById('user_id').value;
        var token = '<?php echo e(csrf_token()); ?>';

        var url = "<?php echo e(route('lead-setting.update_status', ':id')); ?>";
        url = url.replace(':id', companyID);

        $.easyAjax({
            type: 'POST',
            url: url,
            container: '#save-lead-status',
            blockUI: true,
            data: {
                '_token': token,
                lead_setting_status: status,
                id: companyID,
                userId: userID,
            },
            success: function (response) {
                if (response.status == "success") {
                    window.location.reload();
                }
            }
        })
    });
});
</script>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/lead-settings/ajax/method.blade.php ENDPATH**/ ?>