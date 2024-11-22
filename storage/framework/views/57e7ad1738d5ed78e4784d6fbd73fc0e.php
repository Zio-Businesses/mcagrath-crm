

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('vendor/frappe/frappe-gantt.css')); ?>">
<?php $__env->stopPush(); ?>


<?php $__env->startSection('content'); ?>

    <!-- ROW START -->
    <div class="row">
        <div class="col-lg-12 col-md-12 mb-4 mb-xl-0 mb-lg-4">

            <!-- Task Box Start -->
            <div class="d-flex flex-column w-tables rounded bg-white">

                <div class="d-flex">
                    <!-- ASSIGN START -->
                    <div class="select-box py-2 px-lg-2 px-md-2 px-0 mr-3 d-none">
                        <p class="mb-0 pr-2 f-14 text-dark-grey d-flex align-items-center">
                            <?php echo app('translator')->get('modules.tasks.assignTo'); ?>
                        </p>
                        <div class="select-status mr-3">
                            <select class="form-control select-picker" id="assignedTo" data-live-search="true"
                                    data-size="8">
                                <option value="all"><?php echo app('translator')->get('app.all'); ?></option>
                                <?php $__currentLoopData = $project->members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if (isset($component)) { $__componentOriginal6c7097547485b98631a37d273a171e9f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6c7097547485b98631a37d273a171e9f = $attributes; } ?>
<?php $component = App\View\Components\UserOption::resolve(['user' => $employee->user] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                </div>


                <div id="gantt"></div>

            </div>
            <!-- Task Box End -->

        </div>

    </div>
    <!-- ROW END -->

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('vendor/frappe/frappe-gantt.js')); ?>"></script>
    <script>
        $(document).ready(function () {

            function loadData() {
                var projectID = "<?php echo e($project->id); ?>";
                var assignedTo = $('#assignedTo').val();
                var projectTask = $('#projectTask').val();
                var viewMode = $('#gantt-view').val();
                var token = "<?php echo e(csrf_token()); ?>";

                var url = "<?php echo e(route('front.gantt_data', $project->id)); ?>?assignedTo=" +
                    assignedTo + '&projectID=' + projectID + '&projectTask=' + projectTask + '&_token=' + token;

                $.easyAjax({
                    url: url,
                    blockUI: true,
                    container: '.content-wrapper',
                    type: "POST",
                    success: function (response) {
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
                            on_click: function (task) {
                                taskDetail(task.taskid);
                            },
                            on_date_change: function (task, start, end) {
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
                            on_progress_change: function (task, progress) {
                            },
                            on_view_change: function (mode) {
                            }
                        });

                    }
                });
            }

            $('#assignedTo, #gantt-view, #projectTask').on('change keyup', function () {
                loadData();
            });

            // Task Detail show in sidebar
            var taskDetail = function (id) {
                openTaskDetail();
                var url = "<?php echo e(route('front.task_detail', ':id')); ?>";
                url = url.replace(':id', id);

                $.easyAjax({
                    url: url,
                    blockUI: true,
                    container: RIGHT_MODAL,
                    historyPush: true,
                    success: function (response) {
                        if (response.status == "success") {
                            $(RIGHT_MODAL_CONTENT).html(response.html);
                            $(RIGHT_MODAL_TITLE).html(response.title);
                        }
                    },
                    error: function (request, status, error) {
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
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.public', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/gantt.blade.php ENDPATH**/ ?>