<?php
if (!isset($notification->data['discussion_id'])) {
    $discussionReply = \App\Models\DiscussionReply::with('discussion')->find($notification->data['id']);
    $projectId = $discussionReply->discussion->project_id;
    $notificationUser = \App\Models\User::find($discussionReply->user_id);
} else {
    $discussion = \App\Models\Discussion::find($notification->data['discussion_id']);
    $projectId = $notification->data['project_id'];
    $notificationUser = \App\Models\User::find($discussion->user_id);
}
$route = route('projects.show', $projectId) . '?tab=discussion';
?>

<?php if($notificationUser): ?>
    <?php if (isset($component)) { $__componentOriginal42cf517c5716db26aa0e5d62b08b607b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal42cf517c5716db26aa0e5d62b08b607b = $attributes; } ?>
<?php $component = App\View\Components\Cards\Notification::resolve(['notification' => $notification,'link' => $route,'image' => $notificationUser->image_url,'title' => $notification->data['user'] . ' ' . __('email.discussionReply.subject'),'text' => $notification->data['title'],'time' => $notification->created_at] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\notifications\client\new_discussion_reply.blade.php ENDPATH**/ ?>