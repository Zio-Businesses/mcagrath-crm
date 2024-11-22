
<?php ($envatoUpdateCompanySetting = \Froiden\Envato\Functions\EnvatoUpdate::companySetting()); ?>

<div class="table-responsive">

    <table class="table table-bordered">
        <thead>
        <th width="25%"><?php echo app('translator')->get('modules.update.systemDetails'); ?></th>
        <th></th>
        </thead>
        <tbody>
        <tr>
            <td>App Version</td>
            <td class="text-left"><?php echo e($updateVersionInfo['appVersion']); ?>

                <?php if(!isset($updateVersionInfo['lastVersion'])): ?>
                    <i class="fa fa-check-circle text-success"></i>
                <?php endif; ?>
            </td>
        </tr>

        <?php if(!app()->environment(['codecanyon','demo'])): ?>
            <tr>
                <td>App Environment</td>
                <td><?php echo e(app()->environment()); ?>

                    <?php if(!isset($updateVersionInfo['lastVersion'])): ?>
                        <i class="fa fa-warning text-danger" title="Change the environment back to <b>codecanyon</b>"
                           data-toggle="tooltip" data-html="true"></i>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endif; ?>

        <tr>
            <td>Laravel Version</td>
            <td><?php echo e($updateVersionInfo['laravelVersion']); ?></td>
        </tr>

        <td>PHP Version</td>
        <td>
            <?php echo e(phpversion()); ?>

            <?php if(version_compare(PHP_VERSION, '8.1.0') >= 0): ?>
                 <i class="fa fa-check-circle text-success"></i>
            <?php else: ?>
                <i data-toggle="tooltip" data-original-title="<?php echo app('translator')->get('messages.phpUpdateRequired'); ?>" class="fa fa-warning text-danger"></i>
            <?php endif; ?>
        </td>

        <?php if(!is_null($mysql_version)): ?>
            <tr>
                <td><?php echo e($databaseType); ?></td>
                <td>
                    <?php echo e($mysql_version); ?>

                </td>
            </tr>
        <?php endif; ?>

        </tbody>
    </table>
    <?php if(!is_null($envatoUpdateCompanySetting->purchase_code)): ?>
    <table class="table table-bordered">
        <thead>
        <th width="25%">License Details</th>
        <th></th>
        </thead>
        <tbody>


            <tr>
                <td>Envato Purchase code</td>
                <td>
                    <span class="blur-code purchase-code"><?php echo e($envatoUpdateCompanySetting->purchase_code); ?> </span>
                    <span class="show-hide-purchase-code" data-toggle="tooltip"
                          data-original-title="<?php echo e(__('messages.showHidePurchaseCode')); ?>">
                       <i class="icon far fa-eye-slash fa-fw cursor-pointer"></i>
                    </span>
                    <a href="<?php echo e(route('verify-purchase')); ?>">Change Purchase Code</a>
                </td>
            </tr>
            <?php if(!is_null($envatoUpdateCompanySetting?->purchased_on)): ?>
                <tr>
                    <td>Purchased On</td>
                    <td>
                        <span><?php echo e(\Carbon\Carbon::parse($envatoUpdateCompanySetting->purchased_on)->translatedFormat('d M, Y')); ?> <small class="f-12 text-muted"> (<?php echo e(\Carbon\Carbon::parse($envatoUpdateCompanySetting->purchased_on)->diffForHumans()); ?>)</small></span>
                    </td>
                </tr>
            <?php endif; ?>
            <?php if(!is_null($envatoUpdateCompanySetting?->supported_until)): ?>
                <tr>
                    <td>Support Expire</td>
                    <td>
                        <span><?php echo e(\Carbon\Carbon::parse($envatoUpdateCompanySetting->supported_until)->translatedFormat('d M, Y')); ?> <small class="f-12 text-muted"> (<?php echo e(\Carbon\Carbon::parse($envatoUpdateCompanySetting->supported_until)->diffForHumans()); ?>)</small></span>
                    </td>
                </tr>
            <?php endif; ?>
            <?php if(!is_null($envatoUpdateCompanySetting->license_type)): ?>
                <tr>
                    <td>License Type</td>
                    <td>
                        <span><?php echo e($envatoUpdateCompanySetting->license_type); ?>

                            <?php if(str_contains($envatoUpdateCompanySetting->license_type, 'Regular')): ?>
                                <a href="<?php echo e('https://codecanyon.net/checkout/from_item/' . config('froiden_envato.envato_item_id') . '?license=extended'); ?>"
                                   target="_blank">Upgrade now </a>
                            <?php endif; ?>
                        </span>
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <?php endif; ?>
</div>

<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/vendor/froiden-envato/update/version_info.blade.php ENDPATH**/ ?>