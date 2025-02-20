<?php if($fetchSetting->purchase_code): ?>
    <span class="blur-code purchase-code f-12"><?php echo e($fetchSetting->purchase_code); ?></span>
    <div class="show-hide-purchase-code d-inline" data-toggle="tooltip"
        data-original-title="<?php echo e(__('messages.showHidePurchaseCode')); ?>">
        <i class="icon far fa-eye-slash cursor-pointer"></i>
    </div>
    <div class="verify-module d-inline" data-toggle="tooltip" data-original-title="<?php echo e(__('messages.changePurchaseCode')); ?>"
        data-module="<?php echo e(strtolower($module)); ?>">
        <i class="ml-1 icon far fa-edit cursor-pointer"></i>
    </div>
<?php else: ?>
    <a href="javascript:;" class="verify-module f-w-500" data-module="<?php echo e(strtolower($module)); ?>"><?php echo app('translator')->get('app.verifyEnvato'); ?></a>
<?php endif; ?>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/custom-modules/sections/purchase-code.blade.php ENDPATH**/ ?>