<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'award' => $award
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'award' => $award
]); ?>
<?php foreach (array_filter(([
    'award' => $award
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php if(isset($award->awardIcon->icon)): ?>
<span class="align-items-center d-inline-flex height-40 justify-content-center rounded width-40" style="background-color: <?php echo e($award->color_code.'20'); ?>;">
    <i class="bi bi-<?php echo e($award->awardIcon->icon); ?> f-15 text-white appreciation-icon" style="color: <?php echo e($award->color_code); ?>  !important"></i>
</span>

<?php endif; ?><?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\components\award-icon.blade.php ENDPATH**/ ?>