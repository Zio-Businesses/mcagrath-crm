<?php if($plugins->where('envato_id', config(strtolower($module) . '.envato_item_id'))->first()): ?>
    <?php if($plugins->where('envato_id', config(strtolower($module) . '.envato_item_id'))->pluck('version')->first() > File::get($module->getPath() . '/version.txt')): ?>

        <span class="badge badge-danger" data-toggle="tooltip"
              data-original-title="<?php echo app('translator')->get('app.moduleUpdateMessage', [
                            'name' => $module->getName(),
                            'version' => $plugins->where('envato_id', config(strtolower($module) . '.envato_item_id'))->pluck('version')->first(),
        ]); ?>">

            <?php echo e(File::get($module->getPath() . '/version.txt')); ?>

        </span>
    <?php else: ?>
        <span class="badge badge-success">
            <?php echo e(File::get($module->getPath() . '/version.txt')); ?>

        </span>
    <?php endif; ?>
<?php else: ?>
    <span class="badge badge-success"><?php echo e(File::get($module->getPath() . '/version.txt')); ?></span>
<?php endif; ?>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/custom-modules/sections/version.blade.php ENDPATH**/ ?>