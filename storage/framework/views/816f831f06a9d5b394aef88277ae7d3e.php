<!-- TAB CONTENT START -->
<div class="tab-pane fade show active" role="tabpanel" aria-labelledby="nav-email-tab">
    <div class="d-flex flex-wrap justify-content-between p-20" id="note-list">
        <?php $__empty_1 = true; $__currentLoopData = $task->notes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $note): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
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
    </div>
</div>
<!-- TAB CONTENT END -->
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\front\tasks\ajax\notes.blade.php ENDPATH**/ ?>