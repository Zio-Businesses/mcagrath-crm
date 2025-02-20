<?php $__currentLoopData = $leads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lead): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if (isset($component)) { $__componentOriginal3a0afea4cfabbeccfeec2f1cf31858b4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3a0afea4cfabbeccfeec2f1cf31858b4 = $attributes; } ?>
<?php $component = App\View\Components\Cards\LeadCard::resolve(['lead' => $lead] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.lead-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\LeadCard::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3a0afea4cfabbeccfeec2f1cf31858b4)): ?>
<?php $attributes = $__attributesOriginal3a0afea4cfabbeccfeec2f1cf31858b4; ?>
<?php unset($__attributesOriginal3a0afea4cfabbeccfeec2f1cf31858b4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3a0afea4cfabbeccfeec2f1cf31858b4)): ?>
<?php $component = $__componentOriginal3a0afea4cfabbeccfeec2f1cf31858b4; ?>
<?php unset($__componentOriginal3a0afea4cfabbeccfeec2f1cf31858b4); ?>
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/leads/board/load_more.blade.php ENDPATH**/ ?>