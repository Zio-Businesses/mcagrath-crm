<div id="task-detail-section">

    <h3 class="heading-h1 mb-3"><?php echo e($task->heading); ?></h3>
    <div class="row">
        <div class="col-sm-9">
            <div class="card bg-white border-0 b-shadow-4">

                <div class="card-body">
                    <div class="col-12 px-0 pb-3 d-flex">
                        <p class="mb-0 text-lightest f-14 w-30 d-inline-block text-capitalize"><?php echo app('translator')->get('app.project'); ?></p>
                        <p class="mb-0 text-dark-grey f-14">
                            <?php if($task->project_id): ?>
                                <?php if($task->project->status == 'in progress'): ?>
                                    <i class="fa fa-circle mr-1 text-blue f-10"></i>
                                <?php elseif($task->project->status == 'on hold'): ?>
                                    <i class="fa fa-circle mr-1 text-yellow f-10"></i>
                                <?php elseif($task->project->status == 'not started'): ?>
                                    <i class="fa fa-circle mr-1 text-yellow f-10"></i>
                                <?php elseif($task->project->status == 'canceled'): ?>
                                    <i class="fa fa-circle mr-1 text-red f-10"></i>
                                <?php elseif($task->project->status == 'finished'): ?>
                                    <i class="fa fa-circle mr-1 text-dark-green f-10"></i>
                                <?php endif; ?>
                                <a href="<?php echo e(route('projects.show', $task->project_id)); ?>" class="text-dark-grey">
                                    <?php echo e($task->project->project_name); ?></a>
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
                            <?php echo app('translator')->get('app.'.$task->priority); ?>
                        </p>
                    </div>

                    <div class="col-12 px-0 pb-3 d-flex">
                        <p class="mb-0 text-lightest f-14 w-30 d-inline-block text-capitalize">
                            <?php echo app('translator')->get('modules.tasks.assignTo'); ?></p>
                        <p class="mb-0 text-dark-grey f-14">
                        <?php if(count($task->users) > 0): ?>
                            <?php if(count($task->users) > 1): ?>
                                <?php $__currentLoopData = $task->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="taskEmployeeImg rounded-circle mr-1">
                                            <span>
                                                <img data-toggle="tooltip" data-original-title="<?php echo e($item->name); ?>"
                                                     src="<?php echo e($item->image_url); ?>">
                                            </span>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <?php $__currentLoopData = $task->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if (isset($component)) { $__componentOriginal9a71dc76dd25d4db3618f7b2896e958f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9a71dc76dd25d4db3618f7b2896e958f = $attributes; } ?>
<?php $component = App\View\Components\Employee::resolve(['user' => $item,'disabledLink' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('employee'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Employee::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9a71dc76dd25d4db3618f7b2896e958f)): ?>
<?php $attributes = $__attributesOriginal9a71dc76dd25d4db3618f7b2896e958f; ?>
<?php unset($__attributesOriginal9a71dc76dd25d4db3618f7b2896e958f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9a71dc76dd25d4db3618f7b2896e958f)): ?>
<?php $component = $__componentOriginal9a71dc76dd25d4db3618f7b2896e958f; ?>
<?php unset($__componentOriginal9a71dc76dd25d4db3618f7b2896e958f); ?>
<?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>

                        <?php else: ?>
                            --
                            <?php endif; ?>
                            </p>
                    </div>

                    <div class="col-12 px-0 pb-3 d-flex">
                        <p class="mb-0 text-lightest f-14 w-30 d-inline-block text-capitalize"><?php echo app('translator')->get('modules.taskShortCode'); ?></p>
                        <p class="mb-0 text-dark-grey f-14 w-70">
                            <?php echo e(($task->task_short_code) ?  : '--'); ?>

                        </p>
                    </div>

                    <?php if($task->created_by): ?>
                        <div class="col-12 px-0 pb-3 d-flex">
                            <p class="mb-0 text-lightest f-14 w-30 d-inline-block text-capitalize">
                                <?php echo app('translator')->get('modules.tasks.assignBy'); ?></p>
                            <p class="mb-0 text-dark-grey f-14">
                                <?php if (isset($component)) { $__componentOriginal9a71dc76dd25d4db3618f7b2896e958f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9a71dc76dd25d4db3618f7b2896e958f = $attributes; } ?>
<?php $component = App\View\Components\Employee::resolve(['user' => $task->createBy,'disabledLink' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('employee'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Employee::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9a71dc76dd25d4db3618f7b2896e958f)): ?>
<?php $attributes = $__attributesOriginal9a71dc76dd25d4db3618f7b2896e958f; ?>
<?php unset($__attributesOriginal9a71dc76dd25d4db3618f7b2896e958f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9a71dc76dd25d4db3618f7b2896e958f)): ?>
<?php $component = $__componentOriginal9a71dc76dd25d4db3618f7b2896e958f; ?>
<?php unset($__componentOriginal9a71dc76dd25d4db3618f7b2896e958f); ?>
<?php endif; ?>
                            </p>
                        </div>
                    <?php endif; ?>

                    <div class="col-12 px-0 pb-3 d-flex">
                        <p class="mb-0 text-lightest f-14 w-30 d-inline-block text-capitalize">
                            <?php echo app('translator')->get('app.label'); ?></p>
                        <p class="mb-0 text-dark-grey f-14">
                            <?php $__empty_1 = true; $__currentLoopData = $task->labels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <span class='badge badge-secondary'
                                      style='background-color: <?php echo e($label->label_color); ?>'><?php echo e($label->label_name); ?></span>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                --
                            <?php endif; ?>
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


                    
                    <?php if (isset($component)) { $__componentOriginalc7faf3da9dd03559633827985b4aafa9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc7faf3da9dd03559633827985b4aafa9 = $attributes; } ?>
<?php $component = App\View\Components\Forms\CustomFieldShow::resolve(['fields' => $fields,'model' => $task] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.custom-field-show'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\CustomFieldShow::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc7faf3da9dd03559633827985b4aafa9)): ?>
<?php $attributes = $__attributesOriginalc7faf3da9dd03559633827985b4aafa9; ?>
<?php unset($__attributesOriginalc7faf3da9dd03559633827985b4aafa9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc7faf3da9dd03559633827985b4aafa9)): ?>
<?php $component = $__componentOriginalc7faf3da9dd03559633827985b4aafa9; ?>
<?php unset($__componentOriginalc7faf3da9dd03559633827985b4aafa9); ?>
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
<?php $component = App\View\Components\TabItem::resolve(['active' => (request('view') === 'file' || !request('view')),'link' => url()->temporarySignedRoute('front.task_detail', now()->addDays(App\Models\GlobalSetting::SIGNED_ROUTE_EXPIRY), $task->hash).'&view=file'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tab-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\TabItem::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'ajax-tab']); ?>
                            <?php echo app('translator')->get('app.file'); ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8b6db9cf13c4d9d2400b577641e961c1)): ?>
<?php $attributes = $__attributesOriginal8b6db9cf13c4d9d2400b577641e961c1; ?>
<?php unset($__attributesOriginal8b6db9cf13c4d9d2400b577641e961c1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8b6db9cf13c4d9d2400b577641e961c1)): ?>
<?php $component = $__componentOriginal8b6db9cf13c4d9d2400b577641e961c1; ?>
<?php unset($__componentOriginal8b6db9cf13c4d9d2400b577641e961c1); ?>
<?php endif; ?>

                        <?php if (isset($component)) { $__componentOriginal8b6db9cf13c4d9d2400b577641e961c1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8b6db9cf13c4d9d2400b577641e961c1 = $attributes; } ?>
<?php $component = App\View\Components\TabItem::resolve(['active' => (request('view') === 'sub_task'),'link' => url()->temporarySignedRoute('front.task_detail', now()->addDays(App\Models\GlobalSetting::SIGNED_ROUTE_EXPIRY), $task->hash).'&view=sub_task'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tab-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\TabItem::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'ajax-tab']); ?>
                            <?php echo app('translator')->get('modules.tasks.subTask'); ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8b6db9cf13c4d9d2400b577641e961c1)): ?>
<?php $attributes = $__attributesOriginal8b6db9cf13c4d9d2400b577641e961c1; ?>
<?php unset($__attributesOriginal8b6db9cf13c4d9d2400b577641e961c1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8b6db9cf13c4d9d2400b577641e961c1)): ?>
<?php $component = $__componentOriginal8b6db9cf13c4d9d2400b577641e961c1; ?>
<?php unset($__componentOriginal8b6db9cf13c4d9d2400b577641e961c1); ?>
<?php endif; ?>

                        <?php if (isset($component)) { $__componentOriginal8b6db9cf13c4d9d2400b577641e961c1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8b6db9cf13c4d9d2400b577641e961c1 = $attributes; } ?>
<?php $component = App\View\Components\TabItem::resolve(['active' => (request('view') === 'comments'),'link' => url()->temporarySignedRoute('front.task_detail', now()->addDays(App\Models\GlobalSetting::SIGNED_ROUTE_EXPIRY), $task->hash).'&view=comments'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tab-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\TabItem::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'ajax-tab']); ?>
                            <?php echo app('translator')->get('modules.tasks.comment'); ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8b6db9cf13c4d9d2400b577641e961c1)): ?>
<?php $attributes = $__attributesOriginal8b6db9cf13c4d9d2400b577641e961c1; ?>
<?php unset($__attributesOriginal8b6db9cf13c4d9d2400b577641e961c1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8b6db9cf13c4d9d2400b577641e961c1)): ?>
<?php $component = $__componentOriginal8b6db9cf13c4d9d2400b577641e961c1; ?>
<?php unset($__componentOriginal8b6db9cf13c4d9d2400b577641e961c1); ?>
<?php endif; ?>

                        <?php if (isset($component)) { $__componentOriginal8b6db9cf13c4d9d2400b577641e961c1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8b6db9cf13c4d9d2400b577641e961c1 = $attributes; } ?>
<?php $component = App\View\Components\TabItem::resolve(['active' => (request('view') === 'time_logs'),'link' => url()->temporarySignedRoute('front.task_detail', now()->addDays(App\Models\GlobalSetting::SIGNED_ROUTE_EXPIRY), $task->hash).'&view=time_logs'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tab-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\TabItem::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'ajax-tab']); ?>
                            <?php echo app('translator')->get('app.menu.timeLogs'); ?>
                            <?php if($task->active_timer_all_count > 0): ?>
                                <i class="fa fa-clock text-primary f-12 ml-1"></i>
                            <?php endif; ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8b6db9cf13c4d9d2400b577641e961c1)): ?>
<?php $attributes = $__attributesOriginal8b6db9cf13c4d9d2400b577641e961c1; ?>
<?php unset($__attributesOriginal8b6db9cf13c4d9d2400b577641e961c1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8b6db9cf13c4d9d2400b577641e961c1)): ?>
<?php $component = $__componentOriginal8b6db9cf13c4d9d2400b577641e961c1; ?>
<?php unset($__componentOriginal8b6db9cf13c4d9d2400b577641e961c1); ?>
<?php endif; ?>

                        <?php if (isset($component)) { $__componentOriginal8b6db9cf13c4d9d2400b577641e961c1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8b6db9cf13c4d9d2400b577641e961c1 = $attributes; } ?>
<?php $component = App\View\Components\TabItem::resolve(['active' => (request('view') === 'notes'),'link' => url()->temporarySignedRoute('front.task_detail', now()->addDays(App\Models\GlobalSetting::SIGNED_ROUTE_EXPIRY), $task->hash).'&view=notes'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tab-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\TabItem::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'ajax-tab']); ?>
                            <?php echo app('translator')->get('app.notes'); ?>
                         <?php echo $__env->renderComponent(); ?>
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

        <div class="col-sm-3">
            <?php if (isset($component)) { $__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9 = $attributes; } ?>
<?php $component = App\View\Components\Cards\Data::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Data::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <p class="f-w-500"><i class="fa fa-circle mr-1 text-yellow"
                                      style="color: <?php echo e($task->boardColumn->label_color); ?>"></i><?php echo e($task->boardColumn->slug == 'completed' || $task->boardColumn->slug == 'incomplete' ? __('app.' . $task->boardColumn->slug) : $task->boardColumn->column_name); ?>

                </p>

                <div class="col-12 px-0 pb-3 d-flex">
                    <p class="mb-0 text-lightest w-50 f-14 d-inline-block text-capitalize"><?php echo e(__('app.startDate')); ?>

                    </p>
                    <p class="mb-0 text-dark-grey w-50 f-14 d-inline">
                        <?php if(!is_null($task->start_date)): ?>
                            <?php echo e($task->start_date->translatedFormat($company->date_format)); ?>

                        <?php else: ?>
                            --
                        <?php endif; ?>
                    </p>
                </div>
                <div class="col-12 px-0 pb-3 d-flex">
                    <p class="mb-0 text-lightest w-50 f-14 d-inline-block text-capitalize"><?php echo e(__('app.dueDate')); ?>

                    </p>
                    <p class="mb-0 text-dark-grey w-50 f-14 d-inline">
                        <?php if(!is_null($task->due_date)): ?>
                            <?php echo e($task->due_date->translatedFormat($company->date_format)); ?>

                        <?php else: ?>
                            --
                        <?php endif; ?>
                    </p>
                </div>

                <?php
                    $totalMinutes = $task->timeLogged->sum('total_minutes') - $breakMinutes;
                    $timeLog = \Carbon\CarbonInterval::formatHuman($totalMinutes);
                ?>

                <div class="col-12 px-0 pb-3 d-flex">
                    <p class="mb-0 text-lightest w-50 f-14 d-inline-block text-capitalize">
                        <?php echo e(__('modules.employees.hoursLogged')); ?>

                    </p>
                    <p class="mb-0 text-dark-grey w-50 f-14 d-inline"><?php echo e($timeLog); ?></p>
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

    </div>

    <script>
        $(document).ready(function () {

            $("body").on("click", ".ajax-tab", function (event) {
                event.preventDefault();

                $('.task-tabs .ajax-tab').removeClass('active');
                $(this).addClass('active');

                const requestUrl = this.href;

                $.easyAjax({
                    url: requestUrl,
                    blockUI: true,
                    container: "#nav-tabContent",
                    historyPush: (!$(RIGHT_MODAL).hasClass('in')),
                    data: {
                        'json': true
                    },
                    success: function (response) {
                        if (response.status == "success") {
                            $('#nav-tabContent').html(response.html);
                        }
                    }
                });
            });

            init(RIGHT_MODAL);
        });
    </script>
</div>
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\front\tasks\ajax\show.blade.php ENDPATH**/ ?>