<?php
$active = false;

if (!is_null($user) && $user->session) {
    $lastSeen = \Carbon\Carbon::createFromTimestamp($user->session->last_activity)->timezone(company()?company()->timezone:$user->company->timezone);

    $lastSeenDifference = now()->diffInSeconds($lastSeen);
    if ($lastSeenDifference > 0 && $lastSeenDifference <= 90) {
        $active = true;
    }
}
?>

<div class="media align-items-center mw-250 <?php if($user->status != 'active'): ?> inactive <?php endif; ?>">
    <?php if(!is_null($user)): ?>
        <a href="<?php echo e(route('clients.show', [$user->id])); ?>" class="position-relative">
            <?php if($active): ?>
                <span class="text-light-green position-absolute f-8 user-online"
                    title="<?php echo app('translator')->get('modules.client.online'); ?>"><i class="fa fa-circle"></i></span>
            <?php endif; ?>
            <img src="<?php echo e($user->image_url); ?>" class="mr-2 taskEmployeeImg rounded-circle"
                alt="<?php echo e($user->name); ?>" title="<?php echo e($user->name); ?>">
        </a>
        <div class="media-body text-truncate ">
            <h5 class="mb-0 f-12"><a href="<?php echo e(route('clients.show', [$user->id])); ?>"
                    class="text-darkest-grey"><?php echo e($user->name_salutation); ?> <?php if($user->status != 'active'): ?>
                        <i data-toggle="tooltip" data-original-title="<?php echo app('translator')->get('app.inactive'); ?>" class='fa fa-circle mr-1 text-red f-10'></i> <?php endif; ?></a>
                <?php if(isset($user->admin_approval) && $user->admin_approval == 0): ?>
                    <i class="bi bi-person-x text-red" data-toggle="tooltip"
                        data-original-title="<?php echo app('translator')->get('modules.dashboard.verificationPending'); ?>"></i>
                <?php elseif(user() && user()->id == $user->id): ?>
                    <span class="badge badge-secondary"><?php echo app('translator')->get('app.itsYou'); ?></span>
                <?php endif; ?>
            </h5>
            <p class="mb-0 f-12 text-dark-grey text-truncate">
                <?php echo e(!is_null($user->clientDetails) && !is_null($user->clientDetails->company_name) ? $user->clientDetails->company_name : ' '); ?>

            </p>
        </div>
    <?php else: ?>
        --
    <?php endif; ?>
</div>
<?php /**PATH C:\laragon\www\public_html\resources\views/components/client.blade.php ENDPATH**/ ?>