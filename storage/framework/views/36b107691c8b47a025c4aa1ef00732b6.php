<?php
$changeStatusPermission = user()->permission('change_status');
?>

<?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if (isset($component)) { $__componentOriginal2ea4c1068dc1b109818e3dc41cd10d1b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2ea4c1068dc1b109818e3dc41cd10d1b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.cards.task-card','data' => ['task' => $task,'draggable' => ($changeStatusPermission == 'all' ? 'true' : 'false')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.task-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['task' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($task),'draggable' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(($changeStatusPermission == 'all' ? 'true' : 'false'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2ea4c1068dc1b109818e3dc41cd10d1b)): ?>
<?php $attributes = $__attributesOriginal2ea4c1068dc1b109818e3dc41cd10d1b; ?>
<?php unset($__attributesOriginal2ea4c1068dc1b109818e3dc41cd10d1b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2ea4c1068dc1b109818e3dc41cd10d1b)): ?>
<?php $component = $__componentOriginal2ea4c1068dc1b109818e3dc41cd10d1b; ?>
<?php unset($__componentOriginal2ea4c1068dc1b109818e3dc41cd10d1b); ?>
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/taskboard/load_more.blade.php ENDPATH**/ ?>