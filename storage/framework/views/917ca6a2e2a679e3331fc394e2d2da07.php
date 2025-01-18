<?php
    use App\Models\User;if(isset($notification->data['added_by']))
    {
        $notificationUser = User::find($notification->data['added_by']);
    }
    else
    {
        $notificationUser = User::find(user()->id);
    }
?>

<?php if($notificationUser): ?>
    <?php if (isset($component)) { $__componentOriginal42cf517c5716db26aa0e5d62b08b607b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal42cf517c5716db26aa0e5d62b08b607b = $attributes; } ?>
<?php $component = App\View\Components\Cards\Notification::resolve(['notification' => $notification,'link' => route('deals.show', $notification->data['id']),'image' => $notificationUser->image_url,'title' => __('email.leadAgent.subject'),'text' => $notification->data['name'],'time' => $notification->created_at] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.notification'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Notification::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal42cf517c5716db26aa0e5d62b08b607b)): ?>
<?php $attributes = $__attributesOriginal42cf517c5716db26aa0e5d62b08b607b; ?>
<?php unset($__attributesOriginal42cf517c5716db26aa0e5d62b08b607b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal42cf517c5716db26aa0e5d62b08b607b)): ?>
<?php $component = $__componentOriginal42cf517c5716db26aa0e5d62b08b607b; ?>
<?php unset($__componentOriginal42cf517c5716db26aa0e5d62b08b607b); ?>
<?php endif; ?>
<?php endif; ?>
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\notifications\all\lead_agent_assigned.blade.php ENDPATH**/ ?>