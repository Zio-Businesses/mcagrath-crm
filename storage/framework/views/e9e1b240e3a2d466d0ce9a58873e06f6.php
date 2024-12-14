

<?php $__env->startSection('content'); ?>

    <!-- SETTINGS START -->
    <div class="w-100 d-flex ">

        <?php if (isset($component)) { $__componentOriginalde9d36b1eccca15eec00fdb693fa4d2d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalde9d36b1eccca15eec00fdb693fa4d2d = $attributes; } ?>
<?php $component = App\View\Components\SettingSidebar::resolve(['activeMenu' => $activeSettingMenu] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('setting-sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SettingSidebar::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalde9d36b1eccca15eec00fdb693fa4d2d)): ?>
<?php $attributes = $__attributesOriginalde9d36b1eccca15eec00fdb693fa4d2d; ?>
<?php unset($__attributesOriginalde9d36b1eccca15eec00fdb693fa4d2d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalde9d36b1eccca15eec00fdb693fa4d2d)): ?>
<?php $component = $__componentOriginalde9d36b1eccca15eec00fdb693fa4d2d; ?>
<?php unset($__componentOriginalde9d36b1eccca15eec00fdb693fa4d2d); ?>
<?php endif; ?>

        <?php if (isset($component)) { $__componentOriginalcb8848b8ae159c08072bf1971fc3ca1f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcb8848b8ae159c08072bf1971fc3ca1f = $attributes; } ?>
<?php $component = App\View\Components\SettingCard::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('setting-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SettingCard::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
             <?php $__env->slot('buttons', null, []); ?> 
                <?php if (isset($component)) { $__componentOriginale691f3c66b4e7efe99161ec4ba911fdc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale691f3c66b4e7efe99161ec4ba911fdc = $attributes; } ?>
<?php $component = App\View\Components\CronMessage::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cron-message'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\CronMessage::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale691f3c66b4e7efe99161ec4ba911fdc)): ?>
<?php $attributes = $__attributesOriginale691f3c66b4e7efe99161ec4ba911fdc; ?>
<?php unset($__attributesOriginale691f3c66b4e7efe99161ec4ba911fdc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale691f3c66b4e7efe99161ec4ba911fdc)): ?>
<?php $component = $__componentOriginale691f3c66b4e7efe99161ec4ba911fdc; ?>
<?php unset($__componentOriginale691f3c66b4e7efe99161ec4ba911fdc); ?>
<?php endif; ?>
             <?php $__env->endSlot(); ?>
             <?php $__env->slot('header', null, []); ?> 
                <div class="s-b-n-header" id="tabs">
                    <nav class="tabs px-4 border-bottom-grey">
                        <div class="nav" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link f-15 active app-setting"
                               href="<?php echo e(route('app-settings.index')); ?>" role="tab" aria-controls="nav-ticketAgents"
                               aria-selected="true"><?php echo app('translator')->get('app.menu.appSettings'); ?>
                            </a>
                            <a class="nav-item nav-link f-15 client-signup-setting"
                               href="<?php echo e(route('app-settings.index')); ?>?tab=client-signup-setting" role="tab"
                               aria-controls="nav-ticketTypes" aria-selected="true"
                               ajax="false"><?php echo app('translator')->get('app.clientSignUpSettings'); ?>
                            </a>
                            <a class="nav-item nav-link f-15 file-upload-setting"
                               href="<?php echo e(route('app-settings.index')); ?>?tab=file-upload-setting" role="tab"
                               aria-controls="nav-ticketTypes" aria-selected="true" ajax="false"><?php echo app('translator')->get('modules.accountSettings.fileUploadSetting'); ?>
                            </a>
                            <a class="nav-item nav-link f-15 google-map-setting"
                               href="<?php echo e(route('app-settings.index')); ?>?tab=google-map-setting" role="tab"
                               aria-controls="nav-ticketTypes" aria-selected="true"
                               ajax="false"><?php echo app('translator')->get('app.googleMapSettings'); ?>
                            </a>
                            <a class="nav-item nav-link f-15 location-setting"
                               href="<?php echo e(route('app-settings.index')); ?>?tab=location-setting" role="tab"
                               aria-controls="nav-ticketTypes" aria-selected="true"
                               ajax="false"><?php echo app('translator')->get('Location Settings'); ?>
                            </a>
                        </div>
                    </nav>
                </div>
             <?php $__env->endSlot(); ?>

            
            <?php echo $__env->make($view, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcb8848b8ae159c08072bf1971fc3ca1f)): ?>
<?php $attributes = $__attributesOriginalcb8848b8ae159c08072bf1971fc3ca1f; ?>
<?php unset($__attributesOriginalcb8848b8ae159c08072bf1971fc3ca1f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcb8848b8ae159c08072bf1971fc3ca1f)): ?>
<?php $component = $__componentOriginalcb8848b8ae159c08072bf1971fc3ca1f; ?>
<?php unset($__componentOriginalcb8848b8ae159c08072bf1971fc3ca1f); ?>
<?php endif; ?>

    </div>
    <!-- SETTINGS END -->

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        /* manage menu active class */
        $('.nav-item').removeClass('active');
        const activeTab = "<?php echo e($activeTab); ?>";
        $('.' + activeTab).addClass('active');

        $("body").on("click", "#editSettings .nav a", function(event) {
            event.preventDefault();
            $('.nav-item').removeClass('active');
            $(this).addClass('active');

            const requestUrl = this.href;
            $.easyAjax({
                url: requestUrl,
                blockUI: true,
                container: "#nav-tabContent",
                historyPush: true,
                success: function(response) {
                    if (response.status === "success") {
                        $('#nav-tabContent .flex-wrap').html(response.html);
                        init('#nav-tabContent');
                        if(response.initDataTable)
                        {
                            window.location.reload();
                        }
                    }
                    
                }
            });
        });
       
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\public_html\resources\views/app-settings/index.blade.php ENDPATH**/ ?>