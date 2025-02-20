<?php
$moveClass = '';
?>
<?php if($draggable == 'false'): ?>
    <?php
        $moveClass = 'move-disable';
    ?>
<?php endif; ?>

<div class="card rounded bg-white border-grey b-shadow-4 m-1 mb-3 <?php echo e($moveClass); ?> task-card"
    data-task-id="<?php echo e($task->id); ?>" id="drag-task-<?php echo e($task->id); ?>">
    <div class="card-body p-2">
        <div class="d-flex justify-content-between mb-2">
            <a href="javascript:;" data-task-id="<?php echo e($task->hash); ?>"
                class="f-12 f-w-500 text-dark mb-0 text-wrap taskDetail"><?php echo e($task->heading); ?></a>
            <p class="f-12 font-weight-bold text-dark-grey mb-0">
                <?php if($task->is_private): ?>
                    <span class='badge badge-secondary mr-1'><i class='fa fa-lock'></i>
                        <?php echo app('translator')->get('app.private'); ?></span>
                <?php endif; ?>
                #<?php echo e($task->task_short_code); ?>

            </p>
        </div>

        <?php if(!is_null($task->labels)): ?>
            <div class="mb-2 d-flex">
                <?php $__currentLoopData = $task->labels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <span class='badge badge-secondary mr-1'
                        style="background:<?php echo e($label->label_color); ?>"><?php echo e($label->label_name); ?>

                    </span>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>

        <?php if($task->project_id): ?>
            <div class="d-flex mb-3 align-items-center">
                <i class="fa fa-layer-group f-11 text-lightest"></i><span
                    class="ml-2 f-11 text-lightest"><?php echo e($task->project->project_name); ?></span>
            </div>
        <?php endif; ?>

        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex flex-wrap">
                <?php $__currentLoopData = $task->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="avatar-img mr-1 rounded-circle">
                        <a href="javascript:;" alt="<?php echo e($item->name); ?>"
                            data-toggle="tooltip" data-original-title="<?php echo e($item->name); ?>"
                            data-placement="right"><img src="<?php echo e($item->image_url); ?>"></a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <?php if(is_null($task->due_date)): ?>
                <div class="d-flex text-red">
                    <span class="f-12 ml-1"><i class="f-11 bi bi-calendar"></i> --</span>
                </div>
            <?php elseif($task->due_date->endOfDay()->isPast()): ?>
                <div class="d-flex text-red">
                    <span class="f-12 ml-1"><i class="f-11 bi bi-calendar"></i> <?php echo e($task->due_date->translatedFormat($task->company->date_format)); ?></span>
                </div>
            <?php elseif($task->due_date->setTimezone($task->company->timezone)->isToday()): ?>
                <div class="d-flex text-dark-green">
                    <i class="fa fa-calendar-alt f-11"></i><span class="f-12 ml-1"><?php echo app('translator')->get('app.today'); ?></span>
                </div>
            <?php else: ?>
                <div class="d-flex text-lightest">
                    <i class="fa fa-calendar-alt f-11"></i><span
                        class="f-12 ml-1"><?php echo e($task->due_date->translatedFormat($task->company->date_format)); ?></span>
                </div>
            <?php endif; ?>

        </div>
    </div>
</div><!-- div end -->
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/components/cards/public-task-card.blade.php ENDPATH**/ ?>