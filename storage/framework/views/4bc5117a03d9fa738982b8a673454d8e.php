<?php $__empty_1 = true; $__currentLoopData = $chatDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <?php if (isset($component)) { $__componentOriginal04e671dfb03fe3e6c886be62552edca4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal04e671dfb03fe3e6c886be62552edca4 = $attributes; } ?>
<?php $component = App\View\Components\Cards\Message::resolve(['message' => $item,'user' => $item->fromUser] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.message'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Message::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal04e671dfb03fe3e6c886be62552edca4)): ?>
<?php $attributes = $__attributesOriginal04e671dfb03fe3e6c886be62552edca4; ?>
<?php unset($__attributesOriginal04e671dfb03fe3e6c886be62552edca4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal04e671dfb03fe3e6c886be62552edca4)): ?>
<?php $component = $__componentOriginal04e671dfb03fe3e6c886be62552edca4; ?>
<?php unset($__componentOriginal04e671dfb03fe3e6c886be62552edca4); ?>
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <?php if (isset($component)) { $__componentOriginal269164c77d9d34462c34359c03da6a68 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal269164c77d9d34462c34359c03da6a68 = $attributes; } ?>
<?php $component = App\View\Components\Cards\NoRecord::resolve(['icon' => 'comment-alt','message' => __('messages.noConversation')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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

<div class="typing invisible my-2 px-4 text-lightest f-12">
    <div class="dot"></div>
    <div class="dot"></div>
    <div class="dot"></div>
    <span class="ml-1"><?php echo app('translator')->get('modules.messages.typing'); ?></span>
</div>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/messages/message_list.blade.php ENDPATH**/ ?>