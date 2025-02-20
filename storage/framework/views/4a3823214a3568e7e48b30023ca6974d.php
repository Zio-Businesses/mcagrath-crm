<?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if (isset($component)) { $__componentOriginald6b09dd597dfbbfff09d28aa49bed373 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald6b09dd597dfbbfff09d28aa49bed373 = $attributes; } ?>
<?php $component = App\View\Components\Cards\PublicTaskCard::resolve(['task' => $task,'draggable' => 'false'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/taskboard_load_more.blade.php ENDPATH**/ ?>