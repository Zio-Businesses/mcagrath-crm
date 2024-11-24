<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'selectedMonth' => '',
    'fieldRequired' => false,
    'all'=>false
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'selectedMonth' => '',
    'fieldRequired' => false,
    'all'=>false
]); ?>
<?php foreach (array_filter(([
    'selectedMonth' => '',
    'fieldRequired' => false,
    'all'=>false
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php if(!$fieldRequired): ?>
    <option value="">--</option>
<?php endif; ?>
<?php if($all): ?>
    <option value=""><?php echo app('translator')->get('app.all'); ?></option>
<?php endif; ?>

<?php $__currentLoopData = range(1, \Carbon\Carbon::MONTHS_PER_YEAR); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $monthNumber): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <option <?php echo e($selectedMonth == $monthNumber ? 'selected' : ''); ?> value="<?php echo e($monthNumber); ?>">
        <?php echo e(now()->startOfMonth()->month($monthNumber)->translatedFormat('F')); ?>

    </option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/components/forms/months.blade.php ENDPATH**/ ?>