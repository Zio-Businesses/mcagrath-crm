<?php
$addTaskPermission = ($project->project_admin == user()->id) ? 'all' : user()->permission('add_tasks');
$editTaskPermission = ($project->project_admin == user()->id) ? 'all' : user()->permission('edit_tasks');
?>

<link rel="stylesheet" href="<?php echo e(asset('vendor/frappe/frappe-gantt.css')); ?>">

<!-- ROW START -->
<div class="row py-3 py-lg-5 py-lg-5">
    <div class="col-lg-12 col-md-12 mb-4 mb-xl-0 mb-lg-4">
        <!-- Add Task Export Buttons Start -->
        <div class="d-flex" id="table-actions">
            <?php if(($addTaskPermission == 'all' || $addTaskPermission == 'added') && !$project->trashed()): ?>
                <?php if (isset($component)) { $__componentOriginaldbb84df4c3a5cbdd95fb35d18ba6410f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldbb84df4c3a5cbdd95fb35d18ba6410f = $attributes; } ?>
<?php $component = App\View\Components\Forms\LinkPrimary::resolve(['link' => route('tasks.create').'?task_project_id='.$project->id,'icon' => 'plus'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.link-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\LinkPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-3 openRightModal','data-redirect-url' => ''.e(url()->full()).'']); ?>
                    <?php echo app('translator')->get('app.addTask'); ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldbb84df4c3a5cbdd95fb35d18ba6410f)): ?>
<?php $attributes = $__attributesOriginaldbb84df4c3a5cbdd95fb35d18ba6410f; ?>
<?php unset($__attributesOriginaldbb84df4c3a5cbdd95fb35d18ba6410f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldbb84df4c3a5cbdd95fb35d18ba6410f)): ?>
<?php $component = $__componentOriginaldbb84df4c3a5cbdd95fb35d18ba6410f; ?>
<?php unset($__componentOriginaldbb84df4c3a5cbdd95fb35d18ba6410f); ?>
<?php endif; ?>
            <?php endif; ?>

        </div>
        <!-- Add Task Export Buttons End -->
        <!-- Task Box Start -->
        <div class="d-flex flex-column w-tables rounded mt-3 bg-white">

            <div class="d-flex">
                <!-- ASSIGN START -->
                <div class="select-box py-2 px-2 mr-3">
                    <p class="mb-0 pr-2 f-14 text-dark-grey d-flex align-items-center"><?php echo app('translator')->get('modules.tasks.assignTo'); ?>
                    </p>
                    <div class="select-status mr-3">
                        <select class="form-control select-picker" id="assignedTo" data-live-search="true"
                            data-size="8">
                            <option value="all"><?php echo app('translator')->get('app.all'); ?></option>
                            <?php $__currentLoopData = $project->projectMembers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if (isset($component)) { $__componentOriginal6c7097547485b98631a37d273a171e9f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6c7097547485b98631a37d273a171e9f = $attributes; } ?>
<?php $component = App\View\Components\UserOption::resolve(['user' => $employee] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('user-option'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\UserOption::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6c7097547485b98631a37d273a171e9f)): ?>
<?php $attributes = $__attributesOriginal6c7097547485b98631a37d273a171e9f; ?>
<?php unset($__attributesOriginal6c7097547485b98631a37d273a171e9f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6c7097547485b98631a37d273a171e9f)): ?>
<?php $component = $__componentOriginal6c7097547485b98631a37d273a171e9f; ?>
<?php unset($__componentOriginal6c7097547485b98631a37d273a171e9f); ?>
<?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <!-- ASSIGN END -->

                <!-- ASSIGN START -->
                <div class="select-box py-2 px-lg-2 px-md-2 px-0">
                    <p class="mb-0 pr-2 f-14 text-dark-grey d-flex align-items-center"><?php echo app('translator')->get('app.view'); ?>
                    </p>
                    <div class="select-status mr-3">
                        <select class="form-control select-picker" id="gantt-view" data-size="8">
                            <option value="Day"><?php echo app('translator')->get('app.day'); ?></option>
                            <option value="Week"><?php echo app('translator')->get('app.week'); ?></option>
                            <option value="Month"><?php echo app('translator')->get('app.month'); ?></option>
                        </select>
                    </div>
                </div>
                <!-- ASSIGN END -->

                 <!-- ASSIGN START -->
                 <div class="select-box py-2 px-2 mr-3">
                    <p class="mb-0 pr-2 f-14 text-dark-grey d-flex align-items-center"><?php echo app('translator')->get('app.task'); ?>
                    </p>
                    <div class="select-status mr-3">
                        <select class="form-control select-picker" id="projectTask" data-live-search="true"
                            data-size="8" multiple name="projectTask[]">
                            <?php $__currentLoopData = $project->tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($task->id); ?>"><?php echo e($task->heading); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <!-- ASSIGN END -->

                 <!-- ASSIGN START -->
                 <div class="select-box py-2 px-2 mr-3">
                    <p class="mb-0 pr-2 f-14 text-dark-grey d-flex align-items-center"><?php echo app('translator')->get('app.taskStatus'); ?>
                    </p>
                    <div class="select-status mr-3">
                        <select class="form-control select-picker" id="task_status" data-live-search="true"
                            data-size="8" multiple name="task_status[]">
                            <?php $__currentLoopData = $taskBoardStatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option selected value="<?php echo e($status->id); ?>"><?php echo e($status->slug == 'completed' || $status->slug == 'incomplete' ? __('app.' . $status->slug) : $status->column_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <!-- ASSIGN END -->

                 <!-- ASSIGN START -->
                 <div class="select-box py-2 px-2 mr-3">
                    <p class="mb-0 pr-2 f-14 text-dark-grey d-flex align-items-center"><?php echo app('translator')->get('modules.projects.milestones'); ?>
                    </p>
                    <div class="select-status mr-3">
                        <select class="form-control select-picker" id="milestones" data-live-search="true"
                            data-size="8" multiple name="milestones[]">
                            <?php $__currentLoopData = $project->milestones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $milestone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($milestone->id); ?>"><?php echo e($milestone->milestone_title); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <!-- ASSIGN END -->
            </div>


            <svg id="gantt"></svg>

        </div>
        <!-- Task Box End -->

    </div>

</div>
<!-- ROW END -->

<script>
    var allowDrag = "<?php echo e(($editTaskPermission == 'all' ? 'true' : 'false')); ?>";
</script>

<script src="<?php echo e(asset('vendor/frappe/frappe-gantt.js')); ?>"></script>

<script>
    $(document).ready(function() {

        function loadData() {
            var projectID = "<?php echo e($project->id); ?>";
            var assignedTo = $('#assignedTo').val();
            var projectTask = $('#projectTask').val();
            var taskStatus = $('#task_status').val();
            var milestones = $('#milestones').val();
            var viewMode = $('#gantt-view').val();
            var token = "<?php echo e(csrf_token()); ?>";

            var url = "<?php echo e(route('projects.gantt_data')); ?>?assignedTo=" +
                assignedTo + '&projectID=' + projectID  + '&projectTask=' + projectTask + '&_token=' + token + '&taskStatus=' + taskStatus + '&milestones=' + milestones;

            $.easyAjax({
                url: url,
                blockUI: true,
                container: '.content-wrapper',
                type: "POST",
                success: function(response) {
                    if (!response.length) {
                        $("#gantt").html(
                            "<div class='d-flex justify-content-center p-20'><?php echo e(__('messages.noRecordFound')); ?></div>"
                        );
                        return;
                    }

                    $("#gantt").html("");

                    var gantt = new Gantt("#gantt", response, {
                        popup_trigger: "mouseover",
                        view_mode: viewMode,
                        on_click: function(task) {
                            taskDetail(task.taskid);
                        },
                        on_date_change: function(task, start, end) {
                            var taskId = task.taskid;
                            var token = '<?php echo e(csrf_token()); ?>';
                            var url =
                                "<?php echo e(route('tasks.gantt_task_update', ':id')); ?>";
                            url = url.replace(':id', taskId);
                            var startDate = moment.utc(start.toDateString())
                                .format('DD/MM/Y');
                            var endDate = moment.utc(end.toDateString())
                                .subtract(1, "days").format('DD/MM/Y');

                            $.easyAjax({
                                url: url,
                                type: "POST",
                                container: '#gantt',
                                data: {
                                    '_token': token,
                                    'start_date': startDate,
                                    'end_date': endDate
                                }
                            });
                        },
                        on_progress_change: function(task, progress) {
                        },
                        on_view_change: function(mode) {
                        }
                    });

                }
            });
        }

        $('#assignedTo, #gantt-view, #projectTask, #task_status, #milestones').on('change keyup', function() {
            loadData();
        });

        // Task Detail show in sidebar
        var taskDetail = function(id) {
            openTaskDetail();
            var url = "<?php echo e(route('tasks.show', ':id')); ?>";
            url = url.replace(':id', id);

            $.easyAjax({
                url: url,
                blockUI: true,
                container: RIGHT_MODAL,
                historyPush: true,
                success: function(response) {
                    if (response.status == "success") {
                        $(RIGHT_MODAL_CONTENT).html(response.html);
                        $(RIGHT_MODAL_TITLE).html(response.title);
                    }
                },
                error: function(request, status, error) {
                    if (request.status == 403) {
                        $(RIGHT_MODAL_CONTENT).html(
                            '<div class="align-content-between d-flex justify-content-center mt-105 f-21">403 | Permission Denied</div>'
                        );
                    } else if (request.status == 404) {
                        $(RIGHT_MODAL_CONTENT).html(
                            '<div class="align-content-between d-flex justify-content-center mt-105 f-21">404 | Not Found</div>'
                        );
                    } else if (request.status == 500) {
                        $(RIGHT_MODAL_CONTENT).html(
                            '<div class="align-content-between d-flex justify-content-center mt-105 f-21">500 | Something Went Wrong</div>'
                        );
                    }
                }
            });
        }

        loadData();
    });

</script>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/projects/ajax/gantt.blade.php ENDPATH**/ ?>