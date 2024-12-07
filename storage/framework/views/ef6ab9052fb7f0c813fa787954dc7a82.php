

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

             <?php $__env->slot('header', null, []); ?> 
                <div class="s-b-n-header" id="tabs">
                    <nav class="tabs px-4 border-bottom-grey">
                        <div class="nav" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link f-15 active email-setting"
                                href="<?php echo e(route('notifications.index')); ?>" role="tab" aria-controls="nav-ticketAgents"
                                aria-selected="true"><?php echo app('translator')->get('app.email'); ?>
                            </a>
                            <a class="nav-item nav-link f-15 slack-setting"
                                href="<?php echo e(route('notifications.index')); ?>?tab=slack-setting" role="tab"
                                aria-controls="nav-ticketTypes" aria-selected="true" ajax="false"><?php echo app('translator')->get('app.slack'); ?> <i
                                class="fa fa-circle ml-1 <?php echo e($slackSettings->status == 'active' ? 'text-light-green' : 'text-red'); ?>"></i>
                            </a>
                            <a class="nav-item nav-link f-15 push-notification-setting"
                                href="<?php echo e(route('notifications.index')); ?>?tab=push-notification-setting" role="tab"
                                aria-controls="nav-ticketTypes" aria-selected="true"
                                ajax="false"><?php echo app('translator')->get('app.pushNotification'); ?><i
                                class="fa fa-circle ml-1 <?php echo e($pushSettings->status == 'active' ? 'text-light-green' : 'text-red'); ?>"></i>
                            </a>
                            <a class="nav-item nav-link f-15 pusher-setting"
                                href="<?php echo e(route('notifications.index')); ?>?tab=pusher-setting" role="tab"
                                aria-controls="nav-ticketTypes" aria-selected="true"
                                ajax="false"><?php echo app('translator')->get('app.menu.pusherSettings'); ?><i
                                id="pusher-setting-tab" class="fa fa-circle ml-1 <?php echo e($pusherSettings->status == 1 ? 'text-light-green' : 'text-red'); ?>"></i>
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
                        $('#nav-tabContent .flex-wrap').html('');
                        $('#nav-tabContent .flex-wrap').html(response.html);
                        init('#nav-tabContent');
                    }
                }
            });
        });

        $(document).on('change', '#pusher_status', function() {
            $('.pusher_details').toggleClass('d-none');
        });

        $(document).on('change', '#slack_status', function() {
            $('.slack_details').toggleClass('d-none');
        });

        $(document).on('change', '#push_status', function() {
            $('.push_details').toggleClass('d-none');
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Coding\crm-main\resources\views/notification-settings/index.blade.php ENDPATH**/ ?>