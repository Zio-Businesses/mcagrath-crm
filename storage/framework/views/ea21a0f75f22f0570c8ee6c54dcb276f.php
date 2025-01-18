<!-- LEAVE GENRAL SETTING START -->
<div class="col-lg-12 col-md-12 ntfcn-tab-content-left w-100 p-4">

    <div class="form-group">

        <div class="d-block d-lg-flex d-md-flex">
            <?php if (isset($component)) { $__componentOriginalc709ddc147ddde534205d9546b4fb0db = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc709ddc147ddde534205d9546b4fb0db = $attributes; } ?>
<?php $component = App\View\Components\Forms\Radio::resolve(['fieldId' => 'login-yes','fieldLabel' => __('modules.leaves.countLeavesFromDateOfJoining'),'fieldName' => 'leaves_start_from','fieldValue' => 'joining_date','checked' => company()->leaves_start_from == 'joining_date'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.radio'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Radio::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc709ddc147ddde534205d9546b4fb0db)): ?>
<?php $attributes = $__attributesOriginalc709ddc147ddde534205d9546b4fb0db; ?>
<?php unset($__attributesOriginalc709ddc147ddde534205d9546b4fb0db); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc709ddc147ddde534205d9546b4fb0db)): ?>
<?php $component = $__componentOriginalc709ddc147ddde534205d9546b4fb0db; ?>
<?php unset($__componentOriginalc709ddc147ddde534205d9546b4fb0db); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginalc709ddc147ddde534205d9546b4fb0db = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc709ddc147ddde534205d9546b4fb0db = $attributes; } ?>
<?php $component = App\View\Components\Forms\Radio::resolve(['fieldId' => 'login-no','fieldLabel' => __('modules.leaves.countLeavesFromStartOfYear'),'fieldValue' => 'year_start','fieldName' => 'leaves_start_from','checked' => company()->leaves_start_from == 'year_start'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.radio'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Radio::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc709ddc147ddde534205d9546b4fb0db)): ?>
<?php $attributes = $__attributesOriginalc709ddc147ddde534205d9546b4fb0db; ?>
<?php unset($__attributesOriginalc709ddc147ddde534205d9546b4fb0db); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc709ddc147ddde534205d9546b4fb0db)): ?>
<?php $component = $__componentOriginalc709ddc147ddde534205d9546b4fb0db; ?>
<?php unset($__componentOriginalc709ddc147ddde534205d9546b4fb0db); ?>
<?php endif; ?>
        </div>
        <div class="d-block d-lg-flex d-md-flex">
            <div class="col-lg-3" id="year_starts"
                 <?php if(company()->leaves_start_from == 'joining_date'): ?> style='display:none' <?php endif; ?>>
                <?php if (isset($component)) { $__componentOriginal67cd5dc9866c6185ad92d933c387fa86 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal67cd5dc9866c6185ad92d933c387fa86 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Select::resolve(['fieldId' => 'year_starts_from','fieldLabel' => __('modules.accountSettings.yearStartsFrom'),'fieldName' => 'year_starts_from','search' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Select::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                    <?php $__currentLoopData = \App\Models\GlobalSetting::getMonthsOfYear(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $month): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($loop->iteration); ?>"
                                <?php if(company()->year_starts_from == $loop->iteration): ?> selected <?php endif; ?>><?php echo e($month); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal67cd5dc9866c6185ad92d933c387fa86)): ?>
<?php $attributes = $__attributesOriginal67cd5dc9866c6185ad92d933c387fa86; ?>
<?php unset($__attributesOriginal67cd5dc9866c6185ad92d933c387fa86); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal67cd5dc9866c6185ad92d933c387fa86)): ?>
<?php $component = $__componentOriginal67cd5dc9866c6185ad92d933c387fa86; ?>
<?php unset($__componentOriginal67cd5dc9866c6185ad92d933c387fa86); ?>
<?php endif; ?>
            </div>
        </div>
    </div>

    <div class="d-block d-lg-flex d-md-flex">
        <?php if (isset($component)) { $__componentOriginal5194778a3a7b899dcee5619d0610f5cf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5194778a3a7b899dcee5619d0610f5cf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.alert','data' => ['type' => 'info']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'info']); ?><?php echo app('translator')->get('modules.leaves.leaveSettingNote'); ?> <?php echo $__env->renderComponent(); ?>
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

    <div class="d-block d-lg-flex d-md-flex">
        <p> <?php echo app('translator')->get('modules.leaves.reportingManager'); ?> </p>
        <div class="col-lg-4">

            <select name="permission" class="form-control select-picker manager-permission"
                    onchange="changeStatus(this.value)">
                <option
                    <?php if($leavePermission->manager_permission == 'pre-approve'): ?> <?php endif; ?> value="pre-approve"><?php echo app('translator')->get('modules.leaves.preApprove'); ?></option>
                <option <?php if($leavePermission->manager_permission == 'approved'): ?> selected
                        <?php endif; ?> value="approved"><?php echo app('translator')->get('modules.leaves.approve'); ?></option>
                <option <?php if($leavePermission->manager_permission == 'cannot-approve'): ?> selected
                        <?php endif; ?> value="cannot-approve"><?php echo app('translator')->get('modules.leaves.canNotApprove'); ?></option>
            </select>
        </div>
        <p> <?php echo app('translator')->get('modules.leaves.theLeave'); ?> </p>
    </div>
</div>

</div>
<!-- LEAVE GENRAL SETTING ENDS -->

<script>

    $('input[name=leaves_start_from], #year_starts_from').on("click change", function () {
        var leaveCountFrom = $('input[name=leaves_start_from]:checked').val();
        var yearStartFrom = $('#year_starts_from').val();
        $.easyAjax({
            url: "<?php echo e(route('leaves-settings.store')); ?>",
            type: "POST",
            data: {
                '_token': '<?php echo e(csrf_token()); ?>',
                'leaveCountFrom': leaveCountFrom,
                'yearStartFrom': yearStartFrom
            }
        })
    });

    $(function () {
        $('input[name=leaves_start_from]').change(function () {
            ($(this).val() == 'year_start') ? $('#year_starts').show() : $('#year_starts').hide();
        });
    });

    function changeStatus(value) {

        var url = "<?php echo e(route('leaves-settings.changePermission')); ?>";
        var token = "<?php echo e(csrf_token()); ?>";
        var id = <?php echo e($leavePermission->id); ?>;

        $.easyAjax({
            type: 'POST',
            url: url,
            data: {
                '_token': token,
                'value': value,
                'id': id,
            },
        });
    }
</script>
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\leave-settings\ajax\general.blade.php ENDPATH**/ ?>