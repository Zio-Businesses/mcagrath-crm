<?php
    $editTaskNotePermission = user()->permission('edit_task_notes');
    $deleteTaskNotePermission = user()->permission('delete_task_notes');
?>

<?php $__empty_1 = true; $__currentLoopData = $notes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $note): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <div class="card w-100 rounded-0 border-0 note">
        <div class="card-horizontal">
            <div class="card-img my-1 ml-0">
                <img src="<?php echo e($note->user->image_url); ?>" alt="<?php echo e($note->user->name); ?>">
            </div>
            <div class="card-body border-0 pl-0 py-1">
                <div class="d-flex flex-grow-1">
                    <h4 class="card-title f-15 f-w-500 text-dark mr-3"><?php echo e($note->user->name); ?></h4>
                    <p class="card-date f-11 text-lightest mb-0">
                        <?php echo e($note->created_at->diffForHumans()); ?>

                    </p>
                    <div class="dropdown ml-auto note-action">
                        <button class="btn btn-lg f-14 p-0 text-lightest text-capitalize rounded  dropdown-toggle"
                            type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-ellipsis-h"></i>
                        </button>

                        <div class="dropdown-menu dropdown-menu-right border-grey rounded b-shadow-4 p-0"
                            aria-labelledby="dropdownMenuLink" tabindex="0">
                            <?php if($editTaskNotePermission == 'all' || ($editTaskNotePermission == 'added' && $note->added_by == user()->id)): ?>
                                <a class="cursor-pointer d-block text-dark-grey f-13 py-3 px-3 edit-note"
                                    href="javascript:;" data-row-id="<?php echo e($note->id); ?>"><?php echo app('translator')->get('app.edit'); ?></a>
                            <?php endif; ?>

                            <?php if($deleteTaskNotePermission == 'all' || ($deleteTaskNotePermission == 'added' && $note->added_by == user()->id)): ?>
                                <a class="cursor-pointer d-block text-dark-grey f-13 pb-3 px-3 delete-note"
                                    data-row-id="<?php echo e($note->id); ?>" href="javascript:;"><?php echo app('translator')->get('app.delete'); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="card-text f-14 text-dark-grey text-justify ql-editor"><?php echo $note->note; ?>

                </div>
            </div>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <?php if (isset($component)) { $__componentOriginal269164c77d9d34462c34359c03da6a68 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal269164c77d9d34462c34359c03da6a68 = $attributes; } ?>
<?php $component = App\View\Components\Cards\NoRecord::resolve(['message' => __('messages.noNoteFound'),'icon' => 'clipboard'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.no-record'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\NoRecord::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal269164c77d9d34462c34359c03da6a68)): ?>
<?php $attributes = $__attributesOriginal269164c77d9d34462c34359c03da6a68; ?>
<?php unset($__attributesOriginal269164c77d9d34462c34359c03da6a68); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal269164c77d9d34462c34359c03da6a68)): ?>
<?php $component = $__componentOriginal269164c77d9d34462c34359c03da6a68; ?>
<?php unset($__componentOriginal269164c77d9d34462c34359c03da6a68); ?>
<?php endif; ?>
<?php endif; ?>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/tasks/notes/show.blade.php ENDPATH**/ ?>