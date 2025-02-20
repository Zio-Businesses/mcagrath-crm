<?php
$addTaskPermission = ($project->project_admin == user()->id) ? 'all' : user()->permission('add_tasks');
?>

<link rel='stylesheet' href="<?php echo e(asset('vendor/css/dragula.css')); ?>" type='text/css' />
<link rel='stylesheet' href="<?php echo e(asset('vendor/css/drag.css')); ?>" type='text/css' />
<link rel="stylesheet" href="<?php echo e(asset('vendor/css/bootstrap-colorpicker.css')); ?>" />
<style>
    #colorpicker .form-group {
        width: 87%;
    }

    .b-p-tasks {
        min-height: 90%;
    }

    .content-wrapper {
        padding: 0;
    }

</style>

<!-- CONTENT WRAPPER START -->
<div class="w-task-board-box px-4 py-2 pt-3 bg-white">
    <!-- Add Task Export Buttons Start -->
    <div class="d-block d-lg-flex d-md-flex my-3">

        <?php if (isset($component)) { $__componentOriginal5194778a3a7b899dcee5619d0610f5cf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5194778a3a7b899dcee5619d0610f5cf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.alert','data' => ['type' => 'warning','icon' => 'info','class' => 'd-lg-none']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'warning','icon' => 'info','class' => 'd-lg-none']); ?><?php echo app('translator')->get('messages.dragDropScreenInfo'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5194778a3a7b899dcee5619d0610f5cf)): ?>
<?php $attributes = $__attributesOriginal5194778a3a7b899dcee5619d0610f5cf; ?>
<?php unset($__attributesOriginal5194778a3a7b899dcee5619d0610f5cf); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5194778a3a7b899dcee5619d0610f5cf)): ?>
<?php $component = $__componentOriginal5194778a3a7b899dcee5619d0610f5cf; ?>
<?php unset($__componentOriginal5194778a3a7b899dcee5619d0610f5cf); ?>
<?php endif; ?>

        <div id="table-actions" class="flex-grow-1 align-items-center">
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
<?php $component->withAttributes(['class' => 'mr-3 openRightModal float-left','data-redirect-url' => ''.e(url()->full()).'']); ?>
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
            <?php if(user()->permission('change_status') == 'all' && !$project->trashed()): ?>
                <?php if (isset($component)) { $__componentOriginal5e57c6582b8a883148a28bb7ee46d2ad = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5e57c6582b8a883148a28bb7ee46d2ad = $attributes; } ?>
<?php $component = App\View\Components\Forms\ButtonSecondary::resolve(['icon' => 'plus'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-secondary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonSecondary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'add-column']); ?>
                    <?php echo app('translator')->get('modules.tasks.addBoardColumn'); ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5e57c6582b8a883148a28bb7ee46d2ad)): ?>
<?php $attributes = $__attributesOriginal5e57c6582b8a883148a28bb7ee46d2ad; ?>
<?php unset($__attributesOriginal5e57c6582b8a883148a28bb7ee46d2ad); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5e57c6582b8a883148a28bb7ee46d2ad)): ?>
<?php $component = $__componentOriginal5e57c6582b8a883148a28bb7ee46d2ad; ?>
<?php unset($__componentOriginal5e57c6582b8a883148a28bb7ee46d2ad); ?>
<?php endif; ?>
            <?php endif; ?>
        </div>
    </div>

    <div class="w-task-board-panel d-flex" id="taskboard-columns">
    </div>
</div>
<!-- CONTENT WRAPPER END -->

<script src="<?php echo e(asset('vendor/jquery/dragula.js')); ?>"></script>

<script>
    $(document).ready(function() {
        function loadData() {

            var projectID = "<?php echo e($project->id); ?>";
            var startDate = null;
            var endDate = null;
            var projectAdmin = "<?php echo e(($project->project_admin == user()->id) ? 1 : 0); ?>";

            var url = "<?php echo e(route('taskboards.index')); ?>?startDate=" + encodeURIComponent(startDate) +
                '&endDate=' +
                encodeURIComponent(endDate) + '&projectID=' + projectID + '&project_admin=' + projectAdmin;

            $.easyAjax({
                url: url,
                container: '#taskboard-columns',
                type: "GET",
                success: function(response) {
                    if (response.status == 'success') {
                        $('#taskboard-columns').html(response.view);
                        $("body").tooltip({
                            selector: '[data-toggle="tooltip"]'
                        });
                    }
                }
            });
        }

        $('body').on('click', '.load-more-tasks', function() {
            var columnId = $(this).data('column-id');
            var totalTasks = $(this).data('total-tasks');
            var currentTotalTasks = $('#drag-container-' + columnId + ' .task-card').length;
            var projectAdmin = "<?php echo e(($project->project_admin == user()->id) ? 1 : 0); ?>";

            var projectID = "<?php echo e($project->id); ?>";
            var startDate = null;
            var endDate = null;

            var url = "<?php echo e(route('taskboards.load_more')); ?>?startDate=" + encodeURIComponent(
                    startDate) +
                '&endDate=' +
                encodeURIComponent(endDate) + '&projectID=' + projectID + '&columnId=' + columnId +
                '&currentTotalTasks=' +
                currentTotalTasks +
                '&totalTasks=' + totalTasks + '&project_admin=' + projectAdmin;

            $.easyAjax({
                url: url,
                container: '#drag-container-' + columnId,
                blockUI: true,
                type: "GET",
                success: function(response) {
                    $('#drag-container-' + columnId).append(response.view);
                    if (response.load_more == 'show') {
                        $('#drag-container-' + columnId).closest('.b-p-body').find(
                            '.load-more-tasks');

                    } else {
                        $('#drag-container-' + columnId).closest('.b-p-body').find(
                                '.load-more-tasks')
                            .remove();
                    }

                    $("body").tooltip({
                        selector: '[data-toggle="tooltip"]'
                    });
                }
            });

        });

        var elem = document.getElementById("fullscreen");

        function openFullscreen() {
            if (elem.requestFullscreen) {
                elem.requestFullscreen();
                elem.classList.add("full");
            } else if (elem.mozRequestFullScreen) {
                /* Firefox */
                elem.mozRequestFullScreen();
            } else if (elem.webkitRequestFullscreen) {
                /* Chrome, Safari & Opera */
                elem.webkitRequestFullscreen();
            } else if (elem.msRequestFullscreen) {
                /* IE/Edge */
                elem.msRequestFullscreen();
            }
        }

        $('#add-column').click(function() {
            const url = "<?php echo e(route('taskboards.create')); ?>";
            $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
            $.ajaxModal(MODAL_LG, url);
        });

        $('body').on('click', '.edit-column', function() {
            var id = $(this).data('column-id');
            var url = "<?php echo e(route('taskboards.edit', ':id')); ?>";
            url = url.replace(':id', id);

            $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
            $.ajaxModal(MODAL_LG, url);
        });

        $('body').on('click', '.delete-column', function() {
            var id = $(this).data('column-id');
            var url = "<?php echo e(route('taskboards.destroy', ':id')); ?>";
            url = url.replace(':id', id);

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
                    $.easyAjax({
                        url: url,
                        type: 'POST',
                        data: {
                            '_token': '<?php echo e(csrf_token()); ?>',
                            '_method': 'DELETE'
                        },
                        success: function(response) {
                            if (response.status == 'success') {
                                window.location.reload();
                            }
                        }
                    });
                }
            });

        });

        $('body').on('click', '.collapse-column', function() {
            var boardColumnId = $(this).data('column-id');
            var type = $(this).data('type');

            $.easyAjax({
                url: "<?php echo e(route('taskboards.collapse_column')); ?>",
                type: 'POST',
                container: '#taskboard-columns',
                blockUI: true,
                data: {
                    boardColumnId: boardColumnId,
                    type: type,
                    '_token': '<?php echo e(csrf_token()); ?>'
                },
                success: function(response) {
                    if (response.status == 'success') {
                        loadData();
                    }
                }
            });
        });

        //pusher
        if ((pusher_setting.status === 1 && pusher_setting.taskboard === 1) || (pusher_setting.status == "1" && pusher_setting.taskboard == "1")) {

            var channel = pusher.subscribe('task-updated-channel');
            channel.bind('task-updated', function(data) {
                loadData()
            });
        }

        loadData();
    });
</script>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/projects/ajax/taskboard.blade.php ENDPATH**/ ?>