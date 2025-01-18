<?php
if (!isset($notification->data['subject'])) {
    $ticketReply = \App\Models\Ticket::find($notification->data['id']);
    $subject = $ticketReply->ticket->subject;
} else {
    $subject = $notification->data['subject'];
}
$notificationUser = \App\Models\User::find($notification->data['user_id']);
?>

<?php if($notificationUser): ?>
    <?php if (isset($component)) { $__componentOriginal42cf517c5716db26aa0e5d62b08b607b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal42cf517c5716db26aa0e5d62b08b607b = $attributes; } ?>
<?php $component = App\View\Components\Cards\Notification::resolve(['notification' => $notification,'link' => route('tickets.show', $notification->data['ticket_number']),'image' => $notificationUser->image_url,'title' => __('email.ticketReply.subject') . ' #' . $notification->data['ticket_number'],'text' => $subject,'time' => $notification->created_at] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\notifications\client\new_ticket_requester.blade.php ENDPATH**/ ?>