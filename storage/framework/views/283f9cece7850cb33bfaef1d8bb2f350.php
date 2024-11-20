<!-- also the modal itself -->
<div id="myModalDefault" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog d-flex justify-content-center align-items-center">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modelHeading">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <?php echo e(__('app.loading')); ?>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn-cancel rounded mr-3" data-dismiss="modal">Close</button>
                <button type="button" class="btn-primary rounded">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- also the modal itself -->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog d-flex justify-content-center align-items-center modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modelHeading">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <?php echo e(__('app.loading')); ?>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn-cancel rounded mr-3" data-dismiss="modal">Close</button>
                <button type="button" class="btn-primary rounded">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- also the modal itself -->
<div id="myModalXl" class="modal fade overflow-auto" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog d-flex justify-content-center align-items-center modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modelHeading">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body bg-grey">
                <?php echo e(__('app.loading')); ?>

            </div>

        </div>
    </div>
</div>

<?php if (isset($component)) { $__componentOriginale0a8262e6150e7d50a6bde92df5745d6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale0a8262e6150e7d50a6bde92df5745d6 = $attributes; } ?>
<?php $component = App\View\Components\RightModal::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('right-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\RightModal::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale0a8262e6150e7d50a6bde92df5745d6)): ?>
<?php $attributes = $__attributesOriginale0a8262e6150e7d50a6bde92df5745d6; ?>
<?php unset($__attributesOriginale0a8262e6150e7d50a6bde92df5745d6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale0a8262e6150e7d50a6bde92df5745d6)): ?>
<?php $component = $__componentOriginale0a8262e6150e7d50a6bde92df5745d6; ?>
<?php unset($__componentOriginale0a8262e6150e7d50a6bde92df5745d6); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\public_html\resources\views/sections/modals.blade.php ENDPATH**/ ?>