<a href="<?php echo e(route('timelogs.index')); ?>" class="btn btn-secondary f-14 <?php if($timelogMenuType == 'index'): ?> btn-active <?php endif; ?>" data-toggle="tooltip"
data-original-title="<?php echo app('translator')->get('app.menu.timeLogs'); ?>"><i class="side-icon bi bi-list-ul"></i></a>

<a href="<?php echo e(route('timelog-calendar.index')); ?>" class="btn btn-secondary f-14 <?php if($timelogMenuType == 'calendar'): ?> btn-active <?php endif; ?>" data-toggle="tooltip"
data-original-title="<?php echo app('translator')->get('app.menu.calendar'); ?>"><i class="side-icon bi bi-calendar"></i></a>

<a href="<?php echo e(route('timelogs.by_employee')); ?>" class="btn btn-secondary f-14 <?php if($timelogMenuType == 'byEmployee'): ?> btn-active <?php endif; ?>" data-toggle="tooltip"
data-original-title="<?php echo app('translator')->get('app.employeeTimeLogs'); ?>"><i
     class="side-icon bi bi-person"></i></a>

<a href="javascript:;" class="img-lightbox btn btn-secondary f-14"
data-image-url="<?php echo e(asset('img/timesheet-lc.png')); ?>" data-toggle="tooltip"
data-original-title="<?php echo app('translator')->get('app.howItWorks'); ?>"><i class="side-icon bi bi-question-circle"></i></a>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/timelogs/timelog-menu.blade.php ENDPATH**/ ?>