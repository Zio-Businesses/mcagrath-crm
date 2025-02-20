<?php if (isset($component)) { $__componentOriginale9ccd694a97cd317c729537be76f531b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale9ccd694a97cd317c729537be76f531b = $attributes; } ?>
<?php $component = App\View\Components\LineChart::resolve(['chartData' => $chartData] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('line-chart'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\LineChart::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'task-chart2','height' => '250']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale9ccd694a97cd317c729537be76f531b)): ?>
<?php $attributes = $__attributesOriginale9ccd694a97cd317c729537be76f531b; ?>
<?php unset($__attributesOriginale9ccd694a97cd317c729537be76f531b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale9ccd694a97cd317c729537be76f531b)): ?>
<?php $component = $__componentOriginale9ccd694a97cd317c729537be76f531b; ?>
<?php unset($__componentOriginale9ccd694a97cd317c729537be76f531b); ?>
<?php endif; ?>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/reports/expense/chart.blade.php ENDPATH**/ ?>