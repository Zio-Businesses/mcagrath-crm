<?php
$user = $message->from != user()->id ? $message->fromUser : $message->toUser;
?>
<?php if($message->toUser->unread_messages_count > 0): ?>
    <?php
        $unreadMessageCount = $message->toUser->unread_messages_count;
    ?>
<?php else: ?>
    <?php
        $unreadMessageCount = $message->fromUser->unread_messages_count;
    ?>
<?php endif; ?>


<div class="card rounded-0 border-top-0 border-left-0 border-right-0 user_list_box" id="user-no-<?php echo e($user->id); ?>">
    <a class="<?php echo \Illuminate\Support\Arr::toCssClasses([
        'tablinks',
        'show-user-messages',
        'unread-message' => $unreadMessageCount > 0,
    ]); ?>" href="javascript:;" data-name="<?php echo e($user->name); ?>"
        data-user-id="<?php echo e($user->id); ?>"
        data-unread-message-count="<?php echo e($unreadMessageCount); ?>">
        <div class="card-horizontal user-message">
            <div class="card-img">
                <img class="" src="<?php echo e($user->image_url); ?>" alt="<?php echo e($user->name); ?>">
            </div>
            <div class="card-body border-0 pl-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title f-12 f-w-500 text-dark-grey"><?php echo e($user->name); ?></h4>
                    <p class="card-date f-11 text-dark-grey mb-0">
                        <?php echo e(\Carbon\Carbon::parse($message->created_at)->diffForHumans()); ?></p>
                </div>
                <div class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                    'card-text',
                    'f-11',
                    'text-lightest',
                    'd-flex',
                    'justify-content-between',
                    'message-mention',
                    'text-dark' => $unreadMessageCount > 0,
                    'font-weight-bold' => $unreadMessageCount > 0,
                ]); ?>">
                    <div> <p><?php echo e(strip_tags($message->message)); ?></p></div>


                    <?php if($unreadMessageCount > 0): ?>
                        <div>
                            <span class="badge badge-primary ml-1 unread-count"><?php echo e($unreadMessageCount); ?></span>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </a>
</div><!-- card end -->

<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\components\cards\message-user.blade.php ENDPATH**/ ?>