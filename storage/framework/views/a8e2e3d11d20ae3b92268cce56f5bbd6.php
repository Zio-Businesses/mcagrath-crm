<?php
$moveClass = '';
?>
<?php if($draggable == 'false'): ?>
    <?php
        $moveClass = 'move-disable';
    ?>
<?php endif; ?>

<style>
    .projectNameSpan {
        white-space: normal
    }
</style>

<?php
    $priorityColor = ($task->priority == 'high' ? '#dd0000' : ($task->priority == 'medium' ? '#ffc202' : '#0a8a1f'));
?>
<div class="card rounded bg-white border-grey b-shadow-4 m-1 mb-2 <?php echo e($moveClass); ?> task-card"
    data-task-id="<?php echo e($task->id); ?>" id="drag-task-<?php echo e($task->id); ?>" style="border-left: 3px solid <?php echo e($priorityColor); ?>; background-color: <?php echo e($priorityColor.'08 !important;'); ?>">
    <div class="card-body p-2">
        <div class="d-flex justify-content-between mb-1">
            <a href="<?php echo e(route('tasks.show', [$task->id])); ?>"
                class="f-12 f-w-500 text-dark mb-0 text-wrap openRightModal"><?php echo e($task->heading); ?></a>
            <p class="f-12 font-weight-bold text-dark-grey mb-0">
                <?php if($task->is_private): ?>
                    <span class='badge badge-secondary mr-1'><i class='fa fa-lock'></i>
                        <?php echo app('translator')->get('app.private'); ?></span>
                <?php endif; ?>
                #<?php echo e($task->task_short_code); ?>

            </p>
        </div>

        <?php if(count($task->labels) > 0): ?>
            <div class="mb-1 d-flex flex-wrap">
                <?php $__currentLoopData = $task->labels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <span class='badge badge-secondary mr-1'
                        style="background:<?php echo e($label->label_color); ?>"><?php echo e($label->label_name); ?>

                    </span>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>

        <div class="d-flex mb-1 justify-content-between">
            <?php if($task->project_id): ?>
                <div>
                    <i class="fa fa-layer-group f-11 text-lightest"></i><span
                        class="ml-2 f-11 text-lightest projectNameSpan"><?php echo e($task->project->project_name); ?></span>
                </div>
            <?php endif; ?>

            <?php if($task->estimate_hours > 0 || $task->estimate_minutes > 0): ?>
                <div  data-toggle="tooltip" data-original-title="<?php echo app('translator')->get('app.estimate'); ?>: <?php echo e($task->estimate_hours); ?> <?php echo app('translator')->get('app.hrs'); ?> <?php echo e($task->estimate_minutes); ?> <?php echo app('translator')->get('app.mins'); ?>">
                    <i class="fa fa-hourglass-half f-11 text-lightest"></i><span
                        class="ml-2 f-11 text-lightest"><?php echo e($task->estimate_hours); ?>:<?php echo e($task->estimate_minutes); ?></span>
                </div>
            <?php endif; ?>
        </div>

        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex flex-wrap">
                <?php $__currentLoopData = $task->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="avatar-img mr-1 rounded-circle">
                        <a href="<?php echo e(route('employees.show', $item->id)); ?>" alt="<?php echo e($item->name); ?>"
                            data-toggle="tooltip" data-original-title="<?php echo e($item->name); ?>"
                            data-placement="right"><img src="<?php echo e($item->image_url); ?>"></a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <?php if($task->subtasks_count > 0): ?>
                <?php echo e($task->completed_subtasks_count .'/' . $task->subtasks_count); ?>

            <?php endif; ?>
            <?php if(!is_null($task->due_date)): ?>
                <?php if($task->due_date->endOfDay()->isPast()): ?>
                    <div class="d-flex text-red">
                        <span class="f-12 ml-1"><i class="f-11 bi bi-calendar align-self-center"></i> <?php echo e($task->due_date->translatedFormat(company()->date_format)); ?></span>
                    </div>
                <?php elseif($task->due_date->setTimezone(company()->timezone)->isToday()): ?>
                    <div class="d-flex text-dark-green">
                        <i class="fa fa-calendar-alt f-11 align-self-center"></i><span class="f-12 ml-1"><?php echo app('translator')->get('app.today'); ?></span>
                    </div>
                <?php else: ?>
                    <div class="d-flex text-lightest">
                        <i class="fa fa-calendar-alt f-11 align-self-center"></i><span
                            class="f-12 ml-1"><?php echo e($task->due_date->translatedFormat(company()->date_format)); ?></span>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

        </div>
    </div>
</div><!-- div end -->
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/components/cards/task-card.blade.php ENDPATH**/ ?>