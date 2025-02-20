<form method="<?php echo e($spoofMethod ? 'POST' : $method); ?>" <?php echo $attributes; ?> autocomplete="off">
    <?php echo $__env->make('sections.password-autocomplete-hide', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <input type="hidden" id="redirect_url" name="redirect_url" value="<?php echo e(request()->redirectUrl); ?>">

    <?php if (! (in_array($method, ['HEAD', 'GET', 'OPTIONS']))): ?>
        <?php echo csrf_field(); ?>
    <?php endif; ?>

    <?php if($spoofMethod): ?>
        <?php echo method_field($method); ?>
    <?php endif; ?>

    <?php echo $slot; ?>

</form>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/components/form.blade.php ENDPATH**/ ?>