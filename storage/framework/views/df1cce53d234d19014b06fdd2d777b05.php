<?php
$addAttendancePermission = user()->permission('add_attendance');
$editAttendancePermission = user()->permission('edit_attendance');
$deleteAttendancePermission = user()->permission('delete_attendance');
?>

<div class="modal-header">
    <h5 class="modal-title" id="modelHeading"><?php echo app('translator')->get('app.attendanceDetails'); ?></h5>
    <button type="button"  class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">×</span></button>
</div>
<div class="modal-body bg-grey">
    <div class="row">
        <div class="col-md-12 mb-4">
            <?php if (isset($component)) { $__componentOriginal005edb83c42c88a7ec0f9a9df790def6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal005edb83c42c88a7ec0f9a9df790def6 = $attributes; } ?>
<?php $component = App\View\Components\Cards\User::resolve(['image' => $attendance->user->image_url] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.user'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\User::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <div class="row">
                    <div class="col-12">
                        <h4 class="card-title f-15 f-w-500 text-darkest-grey mb-0">
                            <a href="<?php echo e(route('employees.show', [$attendance->user->id])); ?>"
                                class="text-darkest-grey"><?php echo e($attendance->user->name); ?>  <?php if(user() && user()->id == $attendance->user->id): ?> <span class='ml-2 badge badge-secondary'> <?php echo app('translator')->get('app.itsYou'); ?></span> <?php endif; ?> </a>

                            <?php if(isset($attendance->user->country)): ?>
                                <?php if (isset($component)) { $__componentOriginalfab93869fed772c2df4085a644bb4cd8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfab93869fed772c2df4085a644bb4cd8 = $attributes; } ?>
<?php $component = App\View\Components\Flag::resolve(['country' => $attendance->user->country] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('flag'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Flag::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfab93869fed772c2df4085a644bb4cd8)): ?>
<?php $attributes = $__attributesOriginalfab93869fed772c2df4085a644bb4cd8; ?>
<?php unset($__attributesOriginalfab93869fed772c2df4085a644bb4cd8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfab93869fed772c2df4085a644bb4cd8)): ?>
<?php $component = $__componentOriginalfab93869fed772c2df4085a644bb4cd8; ?>
<?php unset($__componentOriginalfab93869fed772c2df4085a644bb4cd8); ?>
<?php endif; ?>
                            <?php endif; ?>
                        </h4>
                        <p class="mb-0 f-13 text-dark-grey">
                            <?php echo e((!is_null($attendance->user->employeeDetail) && !is_null($attendance->user->employeeDetail->designation)) ? $attendance->user->employeeDetail->designation->name : ' '); ?>

                        </p>
                    </div>
                </div>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal005edb83c42c88a7ec0f9a9df790def6)): ?>
<?php $attributes = $__attributesOriginal005edb83c42c88a7ec0f9a9df790def6; ?>
<?php unset($__attributesOriginal005edb83c42c88a7ec0f9a9df790def6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal005edb83c42c88a7ec0f9a9df790def6)): ?>
<?php $component = $__componentOriginal005edb83c42c88a7ec0f9a9df790def6; ?>
<?php unset($__componentOriginal005edb83c42c88a7ec0f9a9df790def6); ?>
<?php endif; ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?php if (isset($component)) { $__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9 = $attributes; } ?>
<?php $component = App\View\Components\Cards\Data::resolve(['title' => __('app.date').' - '.$attendanceDate->translatedFormat(company()->date_format) .' ('.$attendanceDate->translatedFormat('l').')'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Data::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <div class="punch-status">
                    <div class="border rounded p-3 mb-3 bg-light">
                        <h6 class="f-13"><?php echo app('translator')->get('modules.attendance.clock_in'); ?></h6>
                        <p class="mb-0"><?php echo e($startTime->translatedFormat(company()->time_format)); ?></p>
                    </div>
                    <div class="punch-info">
                        <div class="punch-hours f-13">
                            <span><?php echo e($totalTime); ?></span>
                        </div>
                    </div>
                    <div class="border rounded p-3 bg-light">
                        <h6 class="f-13"><?php echo app('translator')->get('modules.attendance.clock_out'); ?></h6>
                        <p class="mb-0"><?php echo e($endTime != '' ? $endTime->translatedFormat(company()->time_format) : ''); ?>

                            <?php if(isset($notClockedOut)): ?>
                                (<?php echo app('translator')->get('modules.attendance.notClockOut'); ?>)
                            <?php endif; ?>
                        </p>
                    </div>
                    <input type="hidden" id="date" value="<?php echo e($attendanceDate); ?>">

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
        <div class="col-md-6">

            <?php if (isset($component)) { $__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9 = $attributes; } ?>
<?php $component = App\View\Components\Cards\Data::resolve(['title' => __('modules.employees.activity')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Data::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <?php if($addAttendancePermission == 'all' && $maxClockIn): ?>
                     <?php $__env->slot('action', null, []); ?> 
                        <a class="btn-primary rounded f-12 py-1 px-2" href="javascript:;" onclick="addAttendance(<?php echo e($attendance->user->id); ?>)" data-attendance-id="<?php echo e($attendance->user->id); ?>"><?php echo app('translator')->get('app.add'); ?></a>
                     <?php $__env->endSlot(); ?>
                <?php endif; ?>

                <div class="recent-activity">
                    <?php $__currentLoopData = $attendanceActivity->reverse(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="row res-activity-box" id="timelogBox<?php echo e($item->aId); ?>">
                            <ul class="res-activity-list col-md-9">
                                <li>
                                    <p class="mb-0"><?php echo app('translator')->get('modules.attendance.clock_in'); ?>
                                        <?php if(!is_null($item->employee_shift_id)): ?>
                                            <?php if($item->shift->shift_name != 'Day Off'): ?>
                                                <span class="badge badge-info ml-2" style="background-color: <?php echo e($item->shift->color); ?>"><?php echo e($item->shift->shift_name); ?></span>
                                            <?php else: ?>
                                                <span class="badge badge-secondary ml-2" ><?php echo e(__('modules.attendance.' . str($attendanceSettings->shift_name)->camel())); ?></span>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </p>
                                    <p class="res-activity-time">
                                        <i class="fa fa-clock"></i>
                                        <?php echo e($item->clock_in_time->timezone(company()->timezone)->translatedFormat(company()->date_format . ' ' . company()->time_format)); ?>


                                        <?php if($item->work_from_type != ''): ?>
                                            <?php if($item->work_from_type == 'other'): ?>
                                                <i class="fa fa-map-marker-alt ml-2"></i>
                                                <?php echo e($item->location); ?> <?php echo e($item->working_from != '' ? '(' . $item->working_from . ')' : ''); ?>

                                            <?php else: ?>
                                                <i class="fa fa-map-marker-alt ml-2"></i>
                                                <?php echo e($item->location); ?> (<?php echo e($item->work_from_type); ?>)
                                            <?php endif; ?>
                                        <?php endif; ?>

                                        <?php if($item->late == 'yes'): ?>
                                            <i class="fa fa-exclamation-triangle ml-2"></i>
                                            <?php echo app('translator')->get('modules.attendance.late'); ?>
                                        <?php endif; ?>

                                        <?php if($item->half_day == 'yes'): ?>
                                            <i class="fa fa-sign-out-alt ml-2"></i>
                                            <?php echo app('translator')->get('modules.attendance.halfDay'); ?>
                                        <?php endif; ?>

                                        <?php if($item->latitude != '' && $item->longitude != ''): ?>

                                        <a href="https://www.google.com/maps/search/?api=1&query=<?php echo e($item->latitude); ?>%2C<?php echo e($item->longitude); ?>" target="_blank">
                                            <i class="fa fa-map-marked-alt ml-2"></i> <?php echo app('translator')->get('modules.attendance.showOnMap'); ?></a>
                                        <?php endif; ?>
                                    </p>
                                </li>
                                <li>
                                    <p class="mb-0"><?php echo app('translator')->get('modules.attendance.clock_out'); ?></p>
                                    <p class="res-activity-time">
                                        <i class="fa fa-clock"></i>
                                        <?php if(!is_null($item->clock_out_time)): ?>
                                            <?php echo e($item->clock_out_time->timezone(company()->timezone)->translatedFormat(company()->date_format . ' ' . company()->time_format)); ?>

                                        <?php else: ?>
                                            <?php echo app('translator')->get('modules.attendance.notClockOut'); ?>
                                        <?php endif; ?>
                                    </p>
                                </li>
                            </ul>

                            <div class="col-md-3 text-right">
                                <div class="dropdown ml-auto comment-action">
                                    <?php if($editAttendancePermission == 'all'
                                        || ($addAttendancePermission == 'all')
                                        || ($editAttendancePermission == 'added' && $item->added_by == user()->id)
                                        || ($editAttendancePermission == 'owned' && $attendance->user->id == user()->id)
                                        || ($editAttendancePermission == 'both' && ($item->added_by == user()->id || $attendance->user->id == user()->id))
                                        || $deleteAttendancePermission == 'all'
                                        || ($deleteAttendancePermission == 'added' && $item->added_by == user()->id)
                                        || ($deleteAttendancePermission == 'owned' && $attendance->user->id == user()->id)
                                        || ($deleteAttendancePermission == 'both' && ($item->added_by == user()->id || $attendance->user->id == user()->id))
                                    ): ?>
                                    <button
                                        class="btn btn-lg f-14 py-0 text-lightest text-capitalize rounded  dropdown-toggle"
                                        type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-h"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right border-grey rounded b-shadow-4 p-0 mr-2"
                                        aria-labelledby="dropdownMenuLink" tabindex="0">

                                        <?php if($editAttendancePermission == 'all'
                                            || ($editAttendancePermission == 'added' && $item->added_by == user()->id)
                                            || ($editAttendancePermission == 'owned' && $attendance->user->id == user()->id)
                                            || ($editAttendancePermission == 'both' && ($item->added_by == user()->id || $attendance->user->id == user()->id))
                                            ): ?>
                                            <a class="dropdown-item d-block text-dark-grey f-13 py-1 px-3"
                                                href="javascript:;" onclick="editAttendance(<?php echo e($item->aId); ?>)"
                                                data-attendance-id="<?php echo e($item->aId); ?>"><?php echo app('translator')->get('app.edit'); ?></a>
                                        <?php endif; ?>

                                        <?php if($deleteAttendancePermission == 'all'
                                            || ($deleteAttendancePermission == 'added' && $item->added_by == user()->id)
                                            || ($deleteAttendancePermission == 'owned' && $attendance->user->id == user()->id)
                                            || ($deleteAttendancePermission == 'both' && ($item->added_by == user()->id || $attendance->user->id == user()->id))
                                            ): ?>
                                            <a class="cursor-pointer dropdown-item d-block text-dark-grey f-13 pb-1 px-3"
                                                onclick="deleteAttendance(<?php echo e($item->aId); ?>)"
                                                data-attendance-id="<?php echo e($item->aId); ?>"
                                                href="javascript:;"><?php echo app('translator')->get('app.delete'); ?></a>
                                        <?php endif; ?>
                                    </div>
                                    <?php endif; ?>
                                </div>

                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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

</div>
<script>

    function addAttendance(userID) {
            var date = $('#date').val();
            const attendanceDate = date.split("-");
            let dayTime = attendanceDate[2];
            dayTime = dayTime.split(' ');
            let day = dayTime[0];
            let month = attendanceDate[1];
            let year = attendanceDate[0];

            var url = "<?php echo e(route('attendances.add-user-attendance', [':userid', ':day', ':month', ':year'])); ?>";
            url = url.replace(':userid', userID);
            url = url.replace(':day', day);
            url = url.replace(':month', month);
            url = url.replace(':year', year);

            $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
            $.ajaxModal(MODAL_LG, url);
        }

    function deleteAttendance(id) {
        var url = "<?php echo e(route('attendances.destroy', ':id')); ?>";
        url = url.replace(':id', id);
        var token = "<?php echo e(csrf_token()); ?>";

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
                    type: 'POST',
                    url: url,
                    data: {
                        '_token': token,
                        '_method': 'DELETE'
                    },
                    success: function(response) {
                        if (response.status == "success") {
                            showTable();
                            $(MODAL_XL).modal('hide');
                        }
                    }
                });
            }
        });

    }

</script>
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\attendances\ajax\show.blade.php ENDPATH**/ ?>