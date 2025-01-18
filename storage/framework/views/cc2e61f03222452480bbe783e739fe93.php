<div class="taskEmployeeImg rounded-circle mr-1">
    <a href="<?php echo e(route('clients.show', $user->id)); ?>">
        <img data-toggle="tooltip" data-original-title="<?php echo e($user->name); ?>"
            src="<?php echo e($user->image_url); ?>">
    </a>
</div>
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\components\client-image.blade.php ENDPATH**/ ?>