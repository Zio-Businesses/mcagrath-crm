<div class="d-grid d-lg-flex d-md-flex action-bar">

    <div class="btn-group mt-2 mt-lg-0 mt-md-0 ml-3" role="group" aria-label="Basic example">
        <a href="<?php echo e(route('leaves.index')); ?>" class="btn btn-secondary f-14" data-toggle="tooltip"
            data-original-title="<?php echo app('translator')->get('modules.leaves.tableView'); ?>"><i class="side-icon bi bi-list-ul"></i></a>

        <a href="<?php echo e(route('leaves.calendar')); ?>" class="btn btn-secondary f-14" data-toggle="tooltip"
            data-original-title="<?php echo app('translator')->get('app.menu.calendar'); ?>"><i class="side-icon bi bi-calendar"></i></a>

        <a href="<?php echo e(route('leaves.personal')); ?>" class="btn btn-secondary f-14 btn-active" data-toggle="tooltip"
            data-original-title="<?php echo app('translator')->get('modules.leaves.myLeaves'); ?>"><i class="side-icon bi bi-person"></i></a>
    </div>
</div>

<!-- TAB CONTENT START -->
<div class="tab-pane fade show active mt-5" role="tabpanel" aria-labelledby="nav-email-tab">

    <div class="row mb-4">
        <div class="col-lg-4">
            <?php if (isset($component)) { $__componentOriginal005edb83c42c88a7ec0f9a9df790def6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal005edb83c42c88a7ec0f9a9df790def6 = $attributes; } ?>
<?php $component = App\View\Components\Cards\User::resolve(['image' => $employee->image_url] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.user'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\User::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <div class="row">
                    <div class="col-10">
                        <h4 class="card-title f-15 f-w-500 text-darkest-grey mb-0">
                            <?php echo e(($employee->salutation ? $employee->salutation->label() . ' ' : '') . $employee->name); ?>

                            <?php if(isset($employee->country)): ?>
                                <?php if (isset($component)) { $__componentOriginalfab93869fed772c2df4085a644bb4cd8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfab93869fed772c2df4085a644bb4cd8 = $attributes; } ?>
<?php $component = App\View\Components\Flag::resolve(['country' => $employee->country] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('flag'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Flag::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfab93869fed772c2df4085a644bb4cd8)): ?>
<?php $attributes = $__attributesOriginalfab93869fed772c2df4085a644bb4cd8; ?>
<?php unset($__attributesOriginalfab93869fed772c2df4085a644bb4cd8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfab93869fed772c2df4085a644bb4cd8)): ?>
<?php $component = $__componentOriginalfab93869fed772c2df4085a644bb4cd8; ?>
<?php unset($__componentOriginalfab93869fed772c2df4085a644bb4cd8); ?>
<?php endif; ?>
                            <?php endif; ?>
                        </h4>
                    </div>

                </div>

                <p class="f-13 font-weight-normal text-dark-grey mb-0">
                    <?php echo e(!is_null($employee->employeeDetail) && !is_null($employee->employeeDetail->designation) ? $employee->employeeDetail->designation->name : ''); ?>

                    &bull;
                    <?php echo e(isset($employee->employeeDetail) && !is_null($employee->employeeDetail->department) && !is_null($employee->employeeDetail->department) ? $employee->employeeDetail->department->team_name : ''); ?>

                </p>

                <?php if($employee->status == 'active'): ?>
                    <p class="card-text f-12 text-lightest"><?php echo app('translator')->get('app.lastLogin'); ?>

                        <?php if(!is_null($employee->last_login)): ?>
                            <?php echo e($employee->last_login->timezone(company()->timezone)->translatedFormat(company()->date_format . ' ' . company()->time_format)); ?>

                        <?php else: ?>
                            --
                        <?php endif; ?>
                    </p>

                <?php else: ?>
                    <p class="card-text f-12 text-lightest">
                        <?php if (isset($component)) { $__componentOriginal86883428e4629123511f221a5a89811e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal86883428e4629123511f221a5a89811e = $attributes; } ?>
<?php $component = App\View\Components\Status::resolve(['value' => __('app.inactive'),'color' => 'red'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('status'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Status::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal86883428e4629123511f221a5a89811e)): ?>
<?php $attributes = $__attributesOriginal86883428e4629123511f221a5a89811e; ?>
<?php unset($__attributesOriginal86883428e4629123511f221a5a89811e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal86883428e4629123511f221a5a89811e)): ?>
<?php $component = $__componentOriginal86883428e4629123511f221a5a89811e; ?>
<?php unset($__componentOriginal86883428e4629123511f221a5a89811e); ?>
<?php endif; ?>
                    </p>
                <?php endif; ?>

             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal005edb83c42c88a7ec0f9a9df790def6)): ?>
<?php $attributes = $__attributesOriginal005edb83c42c88a7ec0f9a9df790def6; ?>
<?php unset($__attributesOriginal005edb83c42c88a7ec0f9a9df790def6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal005edb83c42c88a7ec0f9a9df790def6)): ?>
<?php $component = $__componentOriginal005edb83c42c88a7ec0f9a9df790def6; ?>
<?php unset($__componentOriginal005edb83c42c88a7ec0f9a9df790def6); ?>
<?php endif; ?>
        </div>
        <div class="col-lg-4">
            <?php if (isset($component)) { $__componentOriginale1233a330800208b0e743068470d1bf4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale1233a330800208b0e743068470d1bf4 = $attributes; } ?>
<?php $component = App\View\Components\Cards\Widget::resolve(['icon' => 'sign-out-alt','title' => __('modules.leaves.remainingLeaves'),'value' => $allowedLeaves] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.widget'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Widget::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale1233a330800208b0e743068470d1bf4)): ?>
<?php $attributes = $__attributesOriginale1233a330800208b0e743068470d1bf4; ?>
<?php unset($__attributesOriginale1233a330800208b0e743068470d1bf4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale1233a330800208b0e743068470d1bf4)): ?>
<?php $component = $__componentOriginale1233a330800208b0e743068470d1bf4; ?>
<?php unset($__componentOriginale1233a330800208b0e743068470d1bf4); ?>
<?php endif; ?>
        </div>
    </div>


    <?php if (isset($component)) { $__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9 = $attributes; } ?>
<?php $component = App\View\Components\Cards\Data::resolve(['title' => __('app.menu.leavesQuota')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Data::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>


        <div class="d-flex flex-wrap justify-content-between" id="comment-list">
            <?php echo $__env->make('employees.leaves_quota', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>

     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9)): ?>
<?php $attributes = $__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9; ?>
<?php unset($__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9)): ?>
<?php $component = $__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9; ?>
<?php unset($__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9); ?>
<?php endif; ?>
</div>
<!-- TAB CONTENT END -->

<script>
    $(document).ready(function() {
        $('#renew-contract').click(function() {
            $(this).closest('.row').addClass('d-none');
            $('#save-renew-data-form').removeClass('d-none');
        });

        $('#cancel-renew').click(function() {
            $('#save-renew-data-form').addClass('d-none');
            $('#renew-contract').closest('.row').removeClass('d-none');
        });

        $('.update-category').click(function() {
            var id = $(this).data('type-id');
            var leaves = $('.leave-count-' + id).val();
            var url = "<?php echo e(route('employee-leaves.update', ':id')); ?>";
            url = url.replace(':id', id);

            var token = "<?php echo e(csrf_token()); ?>";

            $.easyAjax({
                type: 'POST',
                url: url,
                data: {
                    '_method': 'PUT',
                    '_token': token,
                    'leaves': leaves
                },
                success: function(response) {
                    if (response.status == "success") {
                        window.location.reload();
                    }
                }
            });
        });

    });

</script>
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\leaves\ajax\personal.blade.php ENDPATH**/ ?>