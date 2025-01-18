<div id="task-detail-section">

    <div class="row">
        <div class="col-sm-12">
            <div class="card bg-white border-0 b-shadow-4">
                <div class="card-header bg-white  border-bottom-grey text-capitalize justify-content-between p-20">
                    <div class="row">
                        <div class="col-md-8">
                            <h3 class="heading-h1 mb-3"><?php echo e($task->heading); ?></h3>
                        </div>
                        <div class="col-md-4 text-right">
                            <div class="dropdown">
                                <button
                                    class="btn btn-lg f-14 px-2 py-1 text-dark-grey text-capitalize rounded  dropdown-toggle"
                                    type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-h"></i>
                                </button>

                                <div class="dropdown-menu dropdown-menu-right border-grey rounded b-shadow-4 p-0"
                                     aria-labelledby="dropdownMenuLink" tabindex="0">

                                    <a class="cursor-pointer d-block text-dark-grey f-13 px-3 py-2 openRightModal"
                                       href="<?php echo e(route('project-template-task.edit', $task->id)); ?>"><?php echo app('translator')->get('app.edit'); ?>
                                        <?php echo app('translator')->get('app.task'); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="col-12 px-0 pb-3 d-flex">
                        <p class="mb-0 text-lightest f-14 w-30 d-inline-block text-capitalize"><?php echo app('translator')->get('app.project'); ?></p>
                        <p class="mb-0 text-dark-grey f-14">
                            <?php if($task->project_template_id): ?>
                                    <?php echo e($task->projectTemplate->project_name); ?>

                            <?php else: ?>
                                --
                            <?php endif; ?>
                        </p>

                    </div>
                    <div class="col-12 px-0 pb-3 d-flex">
                        <p class="mb-0 text-lightest f-14 w-30 d-inline-block text-capitalize">
                            <?php echo app('translator')->get('modules.tasks.priority'); ?></p>
                        <p class="mb-0 text-dark-grey f-14">
                            <?php if($task->priority == 'high'): ?>
                                <i class="fa fa-circle mr-1 text-red f-10"></i>
                            <?php elseif($task->priority == 'medium'): ?>
                                <i class="fa fa-circle mr-1 text-yellow f-10"></i>
                            <?php else: ?>
                                <i class="fa fa-circle mr-1 text-dark-green f-10"></i>
                            <?php endif; ?>
                            <?php echo app('translator')->get($task->priority); ?>
                        </p>
                    </div>

                    <div class="col-12 px-0 pb-3 d-flex">
                        <p class="mb-0 text-lightest f-14 w-30 d-inline-block text-capitalize">
                            <?php echo app('translator')->get('modules.tasks.assignTo'); ?></p>
                        <p class="mb-0 text-dark-grey f-14">
                        <?php $__currentLoopData = $task->usersMany; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="taskEmployeeImg rounded-circle mr-1">
                                <a href="<?php echo e(route('employees.show', $item->id)); ?>">
                                    <img data-toggle="tooltip" data-original-title="<?php echo e($item->name); ?>"
                                         src="<?php echo e($item->image_url); ?>">
                                </a>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </p>
                    </div>

                    <?php if (isset($component)) { $__componentOriginalfc012cd47eee5094db538668bc6edefd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfc012cd47eee5094db538668bc6edefd = $attributes; } ?>
<?php $component = App\View\Components\Cards\DataRow::resolve(['label' => __('modules.tasks.taskCategory'),'value' => $task->category->category_name ?? '--','html' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data-row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\DataRow::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfc012cd47eee5094db538668bc6edefd)): ?>
<?php $attributes = $__attributesOriginalfc012cd47eee5094db538668bc6edefd; ?>
<?php unset($__attributesOriginalfc012cd47eee5094db538668bc6edefd); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfc012cd47eee5094db538668bc6edefd)): ?>
<?php $component = $__componentOriginalfc012cd47eee5094db538668bc6edefd; ?>
<?php unset($__componentOriginalfc012cd47eee5094db538668bc6edefd); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginalfc012cd47eee5094db538668bc6edefd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfc012cd47eee5094db538668bc6edefd = $attributes; } ?>
<?php $component = App\View\Components\Cards\DataRow::resolve(['label' => __('app.description'),'value' => $task->description,'html' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data-row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\DataRow::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfc012cd47eee5094db538668bc6edefd)): ?>
<?php $attributes = $__attributesOriginalfc012cd47eee5094db538668bc6edefd; ?>
<?php unset($__attributesOriginalfc012cd47eee5094db538668bc6edefd); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfc012cd47eee5094db538668bc6edefd)): ?>
<?php $component = $__componentOriginalfc012cd47eee5094db538668bc6edefd; ?>
<?php unset($__componentOriginalfc012cd47eee5094db538668bc6edefd); ?>
<?php endif; ?>

                </div>
            </div>

            <!-- TASK TABS START -->
            <div class="bg-additional-grey rounded my-3">

                <a class="mb-0 d-block d-lg-none text-dark-grey s-b-mob-sidebar" onclick="openSettingsSidebar()"><i
                        class="fa fa-ellipsis-v"></i></a>

                <div class="s-b-inner s-b-notifications bg-white b-shadow-4 rounded">

                    <?php if (isset($component)) { $__componentOriginal9a1e00e4c4ff0df2940f717a54345f9e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9a1e00e4c4ff0df2940f717a54345f9e = $attributes; } ?>
<?php $component = App\View\Components\TabSection::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tab-section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\TabSection::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'task-tabs']); ?>

                        <?php if (isset($component)) { $__componentOriginal8b6db9cf13c4d9d2400b577641e961c1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8b6db9cf13c4d9d2400b577641e961c1 = $attributes; } ?>
<?php $component = App\View\Components\TabItem::resolve(['active' => (request('view') === 'sub_task' || !request('view')),'link' => '#'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tab-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\TabItem::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'ajax-tab']); ?>
                            <?php echo app('translator')->get('modules.tasks.subTask'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8b6db9cf13c4d9d2400b577641e961c1)): ?>
<?php $attributes = $__attributesOriginal8b6db9cf13c4d9d2400b577641e961c1; ?>
<?php unset($__attributesOriginal8b6db9cf13c4d9d2400b577641e961c1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8b6db9cf13c4d9d2400b577641e961c1)): ?>
<?php $component = $__componentOriginal8b6db9cf13c4d9d2400b577641e961c1; ?>
<?php unset($__componentOriginal8b6db9cf13c4d9d2400b577641e961c1); ?>
<?php endif; ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9a1e00e4c4ff0df2940f717a54345f9e)): ?>
<?php $attributes = $__attributesOriginal9a1e00e4c4ff0df2940f717a54345f9e; ?>
<?php unset($__attributesOriginal9a1e00e4c4ff0df2940f717a54345f9e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9a1e00e4c4ff0df2940f717a54345f9e)): ?>
<?php $component = $__componentOriginal9a1e00e4c4ff0df2940f717a54345f9e; ?>
<?php unset($__componentOriginal9a1e00e4c4ff0df2940f717a54345f9e); ?>
<?php endif; ?>


                    <div class="s-b-n-content">
                        <div class="tab-content" id="nav-tabContent">
                            <?php echo $__env->make($tab, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                </div>

            </div>
            <!-- TASK TABS END -->

        </div>

    </div>

    <script>
        $(document).ready(function() {

            $('body').on('click', '.delete-subtask', function() {
                var id = $(this).data('row-id');
                Swal.fire({
                    title: "<?php echo app('translator')->get('messages.sweetAlertTitle'); ?>",
                    text: "<?php echo app('translator')->get('messages.recoverRecord'); ?>",
                    icon: 'warning',
                    showCancelButton: true,
                    focusConfirm: false,
                    confirmButtonText: "<?php echo app('translator')->get('messages.confirmDelete'); ?>",
                    cancelButtonText: "<?php echo app('translator')->get('app.cancel'); ?>",
                    customClass: {
                        confirmButton: 'btn btn-primary mr-3',
                        cancelButton: 'btn btn-secondary'
                    },
                    showClass: {
                        popup: 'swal2-noanimation',
                        backdrop: 'swal2-noanimation'
                    },
                    buttonsStyling: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        var url = "<?php echo e(route('project-template-sub-task.destroy', ':id')); ?>";
                        url = url.replace(':id', id);

                        var token = "<?php echo e(csrf_token()); ?>";

                        $.easyAjax({
                            type: 'POST',
                            url: url,
                            data: {
                                '_token': token,
                                '_method': 'DELETE'
                            },
                            success: function(response) {
                                if (response.status == "success") {
                                    $('#sub-task-list').html(response.view);
                                }
                            }
                        });
                    }
                });
            });

            $('body').on('click', '.edit-subtask', function() {
                var id = $(this).data('row-id');
                var url = "<?php echo e(route('project-template-sub-task.edit', ':id')); ?>";
                url = url.replace(':id', id);
                $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
                $.ajaxModal(MODAL_LG, url);
            });

            init(RIGHT_MODAL);
        });

    </script>
</div>
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\project-templates\task\ajax\show.blade.php ENDPATH**/ ?>