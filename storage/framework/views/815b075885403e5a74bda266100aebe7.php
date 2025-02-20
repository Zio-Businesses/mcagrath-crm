<?php $__currentLoopData = $result['boardColumns']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <!-- MINIMIZED BOARD PANEL START -->
    <div class="minimized rounded bg-additional-grey border-grey mr-3 d-none column-mini-<?php echo e($column->id); ?>">
        <!-- TASK BOARD HEADER START -->
        <div class="d-flex mt-4 mx-1 b-p-header align-items-center">
            <a href="javascript:;" class="d-grid f-8 mb-3 text-lightest collapse-column"
               data-column-id="<?php echo e($column->id); ?>" data-type="maximize" data-toggle="tooltip"
               data-original-title=<?php echo app('translator')->get('app.expand'); ?>>
                <i class="fa fa-chevron-right ml-1"></i>
                <i class="fa fa-chevron-left"></i>
            </a>

            <p class="mb-3 mx-0 f-15 text-dark-grey font-weight-bold"><i class="fa fa-circle mb-2 text-red"
                                                                         style="color: <?php echo e($column->label_color); ?>"></i><?php echo e($column->slug == 'completed' || $column->slug == 'incomplete' ? __('app.' . $column->slug) : $column->column_name); ?>

            </p>

            <span
                class="b-p-badge bg-grey f-13 px-2 py-2 text-lightest font-weight-bold rounded d-inline-block"><?php echo e($column->tasks_count); ?></span>

        </div>
        <!-- TASK BOARD HEADER END -->

    </div>
    <!-- MINIMIZED BOARD PANEL END -->

    <!-- BOARD PANEL 2 START -->
    <div class="board-panel rounded bg-additional-grey border-grey mr-3 column-max-<?php echo e($column->id); ?>">
        <!-- TASK BOARD HEADER START -->
        <div class="d-flex m-3 b-p-header">
            <p class="mb-0 f-15 mr-3 text-dark-grey font-weight-bold"><i class="fa fa-circle mr-2 text-yellow"
                                                                         style="color: <?php echo e($column->label_color); ?>"></i><?php echo e($column->slug == 'completed' || $column->slug == 'incomplete' ? __('app.' . $column->slug) : $column->column_name); ?>

            </p>

            <span
                class="b-p-badge bg-grey f-13 px-2 text-lightest font-weight-bold rounded d-inline-block"><?php echo e($column->tasks_count); ?></span>

            <span class="ml-auto d-flex align-items-center">
                <a href="javascript:;" class="d-flex f-8 text-lightest collapse-column"
                   data-column-id="<?php echo e($column->id); ?>" data-type="minimize" data-toggle="tooltip" data-original-title=<?php echo app('translator')->get('app.collapse'); ?>>
                    <i class="fa fa-chevron-right mr-1"></i>
                    <i class="fa fa-chevron-left"></i>
                </a>
            </span>
        </div>
        <!-- TASK BOARD HEADER END -->

        <!-- TASK BOARD BODY START -->
        <div class="b-p-body">
            <!-- MAIN TASKS START -->
            <div class="b-p-tasks" id="drag-container-<?php echo e($column->id); ?>" data-column-id="<?php echo e($column->id); ?>">
                <?php $__empty_1 = true; $__currentLoopData = $column['tasks']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php if (isset($component)) { $__componentOriginald6b09dd597dfbbfff09d28aa49bed373 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald6b09dd597dfbbfff09d28aa49bed373 = $attributes; } ?>
<?php $component = App\View\Components\Cards\PublicTaskCard::resolve(['draggable' => 'false','task' => $task] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.public-task-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\PublicTaskCard::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald6b09dd597dfbbfff09d28aa49bed373)): ?>
<?php $attributes = $__attributesOriginald6b09dd597dfbbfff09d28aa49bed373; ?>
<?php unset($__attributesOriginald6b09dd597dfbbfff09d28aa49bed373); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald6b09dd597dfbbfff09d28aa49bed373)): ?>
<?php $component = $__componentOriginald6b09dd597dfbbfff09d28aa49bed373; ?>
<?php unset($__componentOriginald6b09dd597dfbbfff09d28aa49bed373); ?>
<?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <?php if($column->tasks_count == 0): ?>
                        <div class="card rounded bg-white border-grey b-shadow-4 m-1 mb-3 no-task-card move-disable">
                            <div class="card-body">
                                <div class="d-flex justify-content-center py-3">
                                    <p class="mb-0">
                                    <div class="align-items-center d-flex flex-column text-lightest w-100">
                                        <i class="fa fa-tasks f-15 w-100"></i>
                                        <div class="f-15 mt-4">
                                            - <?php echo app('translator')->get('messages.noRecordFound'); ?> -
                                        </div>
                                    </div>
                                    </p>
                                </div>
                            </div>
                        </div><!-- div end -->
                    <?php endif; ?>
                <?php endif; ?>
            </div>
            <!-- MAIN TASKS END -->

            <?php if($column->tasks_count > count($column['tasks'])): ?>
                <!-- TASK BOARD FOOTER START -->
                <div class="d-flex m-3 justify-content-center">
                    <a class="f-13 text-dark-grey f-w-500 load-more-tasks" data-column-id="<?php echo e($column->id); ?>"
                       data-total-tasks="<?php echo e($column->tasks_count); ?>"
                       href="javascript:;"><?php echo app('translator')->get('modules.tasks.loadMore'); ?></a>
                </div>
                <!-- TASK BOARD FOOTER END -->
            <?php endif; ?>
        </div>
        <!-- TASK BOARD BODY END -->
    </div>
    <!-- BOARD PANEL 2 END -->

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<!-- Drag and Drop Plugin -->
<script>
    var arraylike = document.getElementsByClassName('b-p-tasks');
    var containers = Array.prototype.slice.call(arraylike);
    var drake = dragula({
        containers: containers,
        moves: function (el, source, handle, sibling) {
            if (el.classList.contains('move-disable') || !KTUtil.isDesktopDevice()) {
                return false;
            }

            return true; // elements are always draggable by default
        },
    })
        .on('drag', function (el) {
            el.className = el.className.replace('ex-moved', '');
        }).on('drop', function (el) {
            el.className += ' ex-moved';
        }).on('over', function (el, container) {
            container.className += ' ex-over';
        }).on('out', function (el, container) {
            container.className = container.className.replace('ex-over', '');
        });
</script>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/taskboard_data.blade.php ENDPATH**/ ?>