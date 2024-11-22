<style>
    .task_view{
        border: 0px !important;
    }
    .action-hover:hover{
        background-color: #ffffff !important;
    }
</style>
<div class="modal-header">
    <h5 class="modal-title"><?php echo app('translator')->get('app.totalLeave'); ?> ( <?php echo e($multipleLeaves[0]->user->name); ?> )</h5>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<div class="col-lg-12 col-md-12 ntfcn-tab-content-left w-100 p-0">
   <?php echo $__env->make('leaves.multiple-leave-table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<div class="modal-footer">
        <?php
            if($pendingCountLeave != count($multipleLeaves)){
                $approveTitle = __('modules.leaves.approveRemaining');
                $rejectTitle = __('modules.leaves.rejectRemaining');
            }
            else {
                $approveTitle = __('modules.leaves.approveAll');
                $rejectTitle = __('modules.leaves.rejectAll');
            }
        ?>

        <?php if($pendingCountLeave > 0 && ($approveRejectPermission == 'all' || ($leaveSetting->manager_permission != 'cannot-approve' && user()->id == $multipleLeaves->first()->user->employeeDetails->reporting_to))): ?>
            <a class="btn btn-secondary rounded f-14 p-2 leave-action-approved" data-leave-id="<?php echo e($multipleLeaves->first()->unique_id); ?>"
                data-leave-action="approved" data-type="approveAll" class="mr-3" icon="check" href="javascript:;">
                <i class="fa fa-check mr-2"></i><?php echo e($approveTitle); ?></a>

            <a class="btn btn-secondary rounded f-14 p-2 leave-action-reject" data-leave-id="<?php echo e($multipleLeaves->first()->unique_id); ?>"
                data-leave-action="rejected" data-type="rejectAll" class="mr-3" icon="check" href="javascript:;">
                <i class="fa fa-times mr-2"></i><?php echo e($rejectTitle); ?></a>
        <?php endif; ?>

    <?php if (isset($component)) { $__componentOriginalc35c79ed7e812580313ad04118477974 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc35c79ed7e812580313ad04118477974 = $attributes; } ?>
<?php $component = App\View\Components\Forms\ButtonCancel::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-cancel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonCancel::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['data-dismiss' => 'modal','class' => 'border-0 mr-3']); ?><?php echo app('translator')->get('app.cancel'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc35c79ed7e812580313ad04118477974)): ?>
<?php $attributes = $__attributesOriginalc35c79ed7e812580313ad04118477974; ?>
<?php unset($__attributesOriginalc35c79ed7e812580313ad04118477974); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc35c79ed7e812580313ad04118477974)): ?>
<?php $component = $__componentOriginalc35c79ed7e812580313ad04118477974; ?>
<?php unset($__componentOriginalc35c79ed7e812580313ad04118477974); ?>
<?php endif; ?>
</div>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/leaves/view-multiple-related-leave.blade.php ENDPATH**/ ?>