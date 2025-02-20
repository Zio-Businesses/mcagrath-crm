

<?php $__env->startPush('styles'); ?>
    <link rel='stylesheet' href="<?php echo e(asset('vendor/css/dragula.css')); ?>" type='text/css'/>
    <link rel='stylesheet' href="<?php echo e(asset('vendor/css/drag.css')); ?>" type='text/css'/>
<?php $__env->stopPush(); ?>


<?php $__env->startSection('content'); ?>

    <!-- CONTENT WRAPPER START -->
    <div class="w-task-board-box p-4 bg-white">
        <!-- Add Task Export Buttons Start -->

        <div class="d-flex">
            <h5 class="heading-h5 mb-4"><?php echo e($pageTitle); ?></h5>
        </div>

        <div class="w-task-board-panel d-flex" id="taskboard-columns">

        </div>
    </div>
    <!-- CONTENT WRAPPER END -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('vendor/jquery/dragula.js')); ?>"></script>

    <script>
        function loadData() {

            var url = "<?php echo e(route('front.taskboard', $project->hash)); ?>";

            $.easyAjax({
                url: url,
                container: '#taskboard-columns',
                type: "GET",
                success: function (response) {
                    $('#taskboard-columns').html(response.view);
                    $("body").tooltip({
                        selector: '[data-toggle="tooltip"]'
                    });
                }
            });
        }

        $('body').on('click', '.load-more-tasks', function () {
            var columnId = $(this).data('column-id');
            var totalTasks = $(this).data('total-tasks');
            var currentTotalTasks = $('#drag-container-' + columnId + ' .task-card').length;

            var url = "<?php echo e(route('front.taskboard.load_more', $project->hash)); ?>?columnId=" + columnId +
                '&currentTotalTasks=' + currentTotalTasks +
                '&totalTasks=' + totalTasks;

            $.easyAjax({
                url: url,
                container: '#drag-container-' + columnId,
                blockUI: true,
                type: "GET",
                success: function (response) {
                    $('#drag-container-' + columnId).append(response.view);
                    if (response.load_more == 'show') {
                        $('#drag-container-' + columnId).closest('.b-p-body').find('.load-more-tasks');

                    } else {
                        $('#drag-container-' + columnId).closest('.b-p-body').find('.load-more-tasks')
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


        // Task Detail show in sidebar
        $('body').on('click', '.taskDetail', function () {

            var id = $(this).data('task-id');
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
        });

        $('body').on('click', '.collapse-column', function () {
            var columnId = $(this).data('column-id');
            var collapseType = $(this).data('type');

            if (collapseType == 'minimize') {
                $(this).closest('.board-panel').addClass('d-none');
                $('.column-mini-' + columnId).removeClass('d-none');
            } else {
                $(this).closest('.minimized').addClass('d-none');
                $('.column-max-' + columnId).removeClass('d-none');
            }
        });

        loadData();
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.public', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/taskboard.blade.php ENDPATH**/ ?>