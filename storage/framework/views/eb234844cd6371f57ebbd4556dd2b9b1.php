
<div class="media align-items-center mw-250">
    <?php if(!is_null($vendor)): ?>
        <a href="<?php echo e(route('vendors.show', [$vendor->id])); ?>" class="position-relative">

            <img src="<?php echo e($vendor->image_url); ?>" class="mr-2 taskEmployeeImg rounded-circle"
                alt="<?php echo e($vendor->vendor_name); ?>" title="<?php echo e($vendor->vendor_name); ?>">
        </a>
        <div class="media-body text-truncate ">
            <h5 class="mb-0 f-12"><a href="<?php echo e(route('vendors.show', [$vendor->id])); ?>"
                    class="text-darkest-grey"><?php echo e($vendor->vendor_name); ?> </a>
               
            </h5>
           <td><?php echo e($vendor->vendor_email); ?></td><br/>
           <td><?php echo e($vendor->cell); ?></td>
        </div>
    <?php else: ?>
        --
    <?php endif; ?>
</div><?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\components\vendor.blade.php ENDPATH**/ ?>