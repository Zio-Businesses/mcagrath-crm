<?php
$addTaskPermission = user()->permission('add_tasks');
$addStatusPermission = user()->permission('add_status');
$changeStatusPermission = user()->permission('change_status');
?>

<?php $__currentLoopData = $result['boardColumns']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($column->userSetting && $column->userSetting->collapsed): ?>
        <!-- MINIMIZED BOARD PANEL START -->
        <div class="minimized rounded bg-additional-grey border-grey mr-3">
            <!-- TASK BOARD HEADER START -->
            <div class="d-flex mt-4 mx-1 b-p-header align-items-center">
                <a href="javascript:;" class="d-grid f-8 mb-3 text-lightest collapse-column"
                    data-column-id="<?php echo e($column->id); ?>" data-type="maximize" data-toggle="tooltip" data-original-title=<?php echo app('translator')->get('app.expand'); ?>>
                    <i class="fa fa-chevron-right ml-1"></i>
                    <i class="fa fa-chevron-left"></i>
                </a>

                <p class="mb-3 mx-0 f-15 text-dark-grey font-weight-bold"><i class="fa fa-circle mb-2 text-red"
                        style="color: <?php echo e($column->label_color); ?>"></i><?php echo e($column->slug == 'completed' || $column->slug == 'incomplete' ? __('app.' . $column->slug) : $column->column_name); ?></p>

                <span class="b-p-badge bg-grey f-13 px-2 py-2 text-lightest font-weight-bold rounded d-inline-block" id="task-column-count-<?php echo e($column->id); ?>"><?php echo e($column->tasks_count); ?></span>

            </div>
            <!-- TASK BOARD HEADER END -->

        </div>
        <!-- MINIMIZED BOARD PANEL END -->
    <?php else: ?>
        <!-- BOARD PANEL 2 START -->
        <div class="board-panel rounded bg-additional-grey border-grey mr-3">
            <!-- TASK BOARD HEADER START -->
            <div class="d-flex m-3 b-p-header">
                <p class="mb-0 f-15 mr-3 text-dark-grey font-weight-bold"><i class="fa fa-circle mr-2 text-yellow"
                        style="color: <?php echo e($column->label_color); ?>"></i><?php echo e($column->column_name); ?>

                </p>

                <span
                    class="b-p-badge bg-grey f-13 px-2 text-lightest font-weight-bold rounded d-inline-block" id="task-column-count-<?php echo e($column->id); ?>"><?php echo e($column->tasks_count); ?></span>

                <span class="ml-auto d-flex align-items-center">

                    <a href="javascript:;" class="d-flex f-8 text-lightest collapse-column"
                        data-column-id="<?php echo e($column->id); ?>" data-type="minimize" data-toggle="tooltip" data-original-title=<?php echo app('translator')->get('app.collapse'); ?>>
                        <i class="fa fa-chevron-right mr-1"></i>
                        <i class="fa fa-chevron-left"></i>
                    </a>

                    <?php if($addTaskPermission == 'all' || $addTaskPermission == 'added' || $addStatusPermission == 'all'): ?>

                        <div class="dropdown">
                            <button
                                class="btn bg-white btn-lg f-10 px-2 py-1 text-dark-grey text-capitalize rounded  dropdown-toggle ml-3"
                                type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="fa fa-ellipsis-h"></i>
                            </button>

                            <div class="dropdown-menu dropdown-menu-right border-grey rounded b-shadow-4 p-0"
                                aria-labelledby="dropdownMenuLink" tabindex="0">

                                <?php if($addTaskPermission == 'all' || $addTaskPermission == 'added'): ?>
                                    <a class="dropdown-item openRightModal"
                                        href="<?php echo e(route('tasks.create')); ?>?column_id=<?php echo e($column->id); ?>"><?php echo app('translator')->get('app.addTask'); ?>
                                        </a>
                                <?php endif; ?>

                                <?php if($addStatusPermission == 'all'): ?>
                                    <hr class="my-1">
                                    <a class="dropdown-item edit-column"
                                        data-column-id="<?php echo e($column->id); ?>" href="javascript:;"><?php echo app('translator')->get('app.edit'); ?></a>
                                <?php endif; ?>

                                <?php if($column->slug != 'completed' && $column->slug != 'incomplete' && company()->default_task_status != $column->id && $boardDelete && $addStatusPermission == 'all'): ?>
                                    <a class="dropdown-item delete-column"
                                        data-column-id="<?php echo e($column->id); ?>"
                                        href="javascript:;"><?php echo app('translator')->get('app.delete'); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                </span>
            </div>
            <!-- TASK BOARD HEADER END -->

            <!-- TASK BOARD BODY START -->
            <div class="b-p-body">
                <!-- MAIN TASKS START -->
                <div class="b-p-tasks" id="drag-container-<?php echo e($column->id); ?>" data-column-id="<?php echo e($column->id); ?>">
                    <div
                        class="card rounded bg-white border-grey b-shadow-4 m-1 mb-3 no-task-card move-disable <?php echo e(($column->tasks_count > 0) ? 'd-none' : ''); ?>">
                        <div class="card-body">
                            <div class="d-flex justify-content-center py-3">
                                <p class="mb-0">
                                    <?php if($addTaskPermission == 'all' || $addTaskPermission == 'added'): ?>
                                        <?php if(isset($project)): ?>
                                            <a href="<?php echo e(route('tasks.create')); ?>?column_id=<?php echo e($column->id); ?>&task_project_id=<?php echo e($project->id); ?>" class="text-dark-grey openRightModal"><i class="fa fa-plus mr-2"></i><?php echo app('translator')->get('app.add'); ?>
                                            <?php echo app('translator')->get('app.task'); ?></a>
                                        <?php else: ?>
                                        <a href="<?php echo e(route('tasks.create')); ?>?column_id=<?php echo e($column->id); ?>" class="text-dark-grey openRightModal"><i class="fa fa-plus mr-2"></i><?php echo app('translator')->get('app.add'); ?>
                                            <?php echo app('translator')->get('app.task'); ?></a>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <div class="align-items-center d-flex flex-column text-lightest w-100">
                                            <i class="fa fa-tasks f-15 w-100"></i>
                                            <div class="f-15 mt-4">
                                                - <?php echo app('translator')->get('messages.noRecordFound'); ?> -
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </p>
                            </div>
                        </div>
                    </div><!-- div end -->

                    <?php $__currentLoopData = $column['tasks']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if (isset($component)) { $__componentOriginal2ea4c1068dc1b109818e3dc41cd10d1b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2ea4c1068dc1b109818e3dc41cd10d1b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.cards.task-card','data' => ['draggable' => (($changeStatusPermission == 'all' 
                        || ($changeStatusPermission == 'added' && $task->added_by == user()->id)
                        || ($changeStatusPermission == 'owned' && user()->id == $task->users[0]->id)
                        || ($changeStatusPermission == 'both' && (user()->id == $task->users[0]->id || $task->added_by == user()->id))                                        
                        || ($task->project && $task->project->project_admin == user()->id)) ? 'true' : 'false'),'task' => $task]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.task-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['draggable' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute((($changeStatusPermission == 'all' 
                        || ($changeStatusPermission == 'added' && $task->added_by == user()->id)
                        || ($changeStatusPermission == 'owned' && user()->id == $task->users[0]->id)
                        || ($changeStatusPermission == 'both' && (user()->id == $task->users[0]->id || $task->added_by == user()->id))                                        
                        || ($task->project && $task->project->project_admin == user()->id)) ? 'true' : 'false')),'task' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($task)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2ea4c1068dc1b109818e3dc41cd10d1b)): ?>
<?php $attributes = $__attributesOriginal2ea4c1068dc1b109818e3dc41cd10d1b; ?>
<?php unset($__attributesOriginal2ea4c1068dc1b109818e3dc41cd10d1b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2ea4c1068dc1b109818e3dc41cd10d1b)): ?>
<?php $component = $__componentOriginal2ea4c1068dc1b109818e3dc41cd10d1b; ?>
<?php unset($__componentOriginal2ea4c1068dc1b109818e3dc41cd10d1b); ?>
<?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <!-- MAIN TASKS END -->

                <?php if($column->tasks_count > count($column['tasks'])): ?>
                    <!-- TASK BOARD FOOTER START -->
                    <div class="d-flex m-3 justify-content-center">
                        <a class="f-13 text-dark-grey f-w-500 load-more-tasks" data-column-id="<?php echo e($column->id); ?>"
                            data-total-tasks="<?php echo e($column->tasks_count); ?>"
                            href="javascript:;"><?php echo app('translator')->get('modules.tasks.loadMore'); ?></a>
                    </div>
                    <!-- TASK BOARD FOOTER END -->
                <?php endif; ?>
            </div>
            <!-- TASK BOARD BODY END -->
        </div>
        <!-- BOARD PANEL 2 END -->
    <?php endif; ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<!-- Drag and Drop Plugin -->
<script>
    var arraylike = document.getElementsByClassName('b-p-tasks');
    var containers = Array.prototype.slice.call(arraylike);
    var drake = dragula({
            containers: containers,
            moves: function(el, source, handle, sibling) {
                if (el.classList.contains('move-disable') || !KTUtil.isDesktopDevice()) {
                    return false;
                }

                return true; // elements are always draggable by default
            },
        })
        .on('drag', function(el) {
            el.className = el.className.replace('ex-moved', '');
        }).on('drop', function(el) {
            el.className += ' ex-moved';
        }).on('over', function(el, container) {
            container.className += ' ex-over';
        }).on('out', function(el, container) {
            container.className = container.className.replace('ex-over', '');
        });

</script>

<script>
    drake.on('drop', function(element, target, source, sibling) {
        var elementId = element.id;

        $children = $('#' + target.id).children();
        var boardColumnId = $('#' + target.id).data('column-id');
        var movingTaskId = $('#' + element.id).data('task-id');

        var sourceBoardColumnId = $('#' + source.id).data('column-id');
        var sourceColumnCount = parseInt($('#task-column-count-' + sourceBoardColumnId).text());
        var targetColumnCount = parseInt($('#task-column-count-' + boardColumnId).text());

        var taskIds = [];
        var prioritys = [];

        $children.each(function(ind, el) {
            taskIds.push($(el).data('task-id'));
            prioritys.push($(el).index());
        });

        // update values for all tasks
        $.easyAjax({
            url: "<?php echo e(route('taskboards.update_index')); ?>",
            type: 'POST',
            container: '#taskboard-columns',
            blockUI: true,
            data: {
                boardColumnId: boardColumnId,
                movingTaskId: movingTaskId,
                taskIds: taskIds,
                prioritys: prioritys,
                '_token': '<?php echo e(csrf_token()); ?>'
            },
            success: function() {
                if ($('#' + source.id + ' .task-card').length == 0) {
                    $('#' + source.id + ' .no-task-card').removeClass('d-none');
                }
                if ($('#' + target.id + ' .task-card').length > 0) {
                    $('#' + target.id + ' .no-task-card').addClass('d-none');
                }

                $('#task-column-count-' + sourceBoardColumnId).text(sourceColumnCount - 1);
                $('#task-column-count-' + boardColumnId).text(targetColumnCount + 1);
            }
        });

    });

</script>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/taskboard/board_data.blade.php ENDPATH**/ ?>