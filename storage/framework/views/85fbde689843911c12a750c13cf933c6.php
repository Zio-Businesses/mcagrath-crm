<div class="card border-0">
    <a class="view-notification text-dark border-bottom-grey px-3" href="<?php echo e($link); ?>"
        data-notification-id="<?php echo e($notification->id); ?>">
        <div class="card-horizontal align-items-center">
            <?php if($type == 'image'): ?>
                <div class="card-img-small mr-3 ml-0 my-2">
                    <img class="___class_+?4___" src="<?php echo e($image); ?>">
                </div>
            <?php else: ?>
                <div class="mr-3 ml-0 my-2 notification-icon position-relative">
                    <?php echo $image; ?>

                </div>
            <?php endif; ?>
            <div class="card-body border-0 pl-0 pr-0 py-1">
                <p class="card-title f-11 mb-0 text-dark-grey f-w-500"><?php echo e($title ?? ''); ?></p>
                <p class="f-11 mb-0 text-dark-grey"><?php echo e($text ?? ''); ?></p>
                <p class="card-text f-10 text-lightest"><?php echo e($time->diffForHumans()); ?></p>
            </div>
        </div>
    </a>
</div>
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\components\cards\notification.blade.php ENDPATH**/ ?>