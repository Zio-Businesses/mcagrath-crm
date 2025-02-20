

<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('vendor/css/image-picker.min.css')); ?>">

    <!-- SETTINGS START -->
    <div class="w-100 d-flex ">

        <?php echo $__env->make('sections.setting-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
                            <?php if(in_array('invoices', user_modules())): ?>
                                <a class="nav-item nav-link f-15 active general"
                                    href="<?php echo e(route('invoice-settings.index')); ?>?tab=general" role="tab"
                                    aria-controls="nav-ticketAgents" aria-selected="true"><?php echo app('translator')->get('app.menu.invoiceSettings'); ?>
                                </a>
                            <?php endif; ?>

                            <?php if(in_array('invoices', user_modules()) || in_array('estimates', user_modules()) || in_array('orders', user_modules()) || in_array('leads', user_modules())): ?>
                                <a class="nav-item nav-link f-15 active template"
                                    href="<?php echo e(route('invoice-settings.index')); ?>?tab=template" role="tab"
                                    aria-controls="nav-ticketAgents" aria-selected="true"><?php echo app('translator')->get('app.menu.invoiceTemplate'); ?>
                                </a>

                                <a class="nav-item nav-link f-15 active prefix"
                                    href="<?php echo e(route('invoice-settings.index')); ?>?tab=prefix" role="tab"
                                    aria-controls="nav-ticketAgents" aria-selected="true"><?php echo app('translator')->get('app.menu.prefixSettings'); ?>
                                </a>

                                <a class="nav-item nav-link f-15 units"
                                        href="<?php echo e(route('invoice-settings.index')); ?>?tab=units" role="tab"
                                        aria-controls="nav-ticketTypes" aria-selected="true"><?php echo app('translator')->get('app.menu.units'); ?>
                                </a>
                            <?php endif; ?>

                            <?php if(in_array('invoices', user_modules()) || in_array('payments', user_modules())): ?>
                                <a class="nav-item nav-link f-15 quickbooks"
                                    href="<?php echo e(route('invoice-settings.index')); ?>?tab=quickbooks" role="tab"
                                    aria-controls="nav-ticketTypes" aria-selected="true"><?php echo app('translator')->get('app.menu.quickBookSettings'); ?>
                                </a>
                            <?php endif; ?>

                        </div>
                    </nav>
                </div>
             <?php $__env->endSlot(); ?>

             <?php $__env->slot('buttons', null, []); ?> 
                <div class="row">
                    <div class="col-md-12  mb-3">
                        <?php if (isset($component)) { $__componentOriginalcf8d12533ff890e0d6573daf32b7618d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcf8d12533ff890e0d6573daf32b7618d = $attributes; } ?>
<?php $component = App\View\Components\Forms\ButtonPrimary::resolve(['icon' => 'plus'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'addUnitType','class' => 'addUnit btn btn-primary mb-2 actionBtn units-btn','type' => 'button','data-toggle' => 'tooltip']); ?><?php echo app('translator')->get('app.addUnit'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcf8d12533ff890e0d6573daf32b7618d)): ?>
<?php $attributes = $__attributesOriginalcf8d12533ff890e0d6573daf32b7618d; ?>
<?php unset($__attributesOriginalcf8d12533ff890e0d6573daf32b7618d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcf8d12533ff890e0d6573daf32b7618d)): ?>
<?php $component = $__componentOriginalcf8d12533ff890e0d6573daf32b7618d; ?>
<?php unset($__componentOriginalcf8d12533ff890e0d6573daf32b7618d); ?>
<?php endif; ?>

                        <?php if (isset($component)) { $__componentOriginal5194778a3a7b899dcee5619d0610f5cf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5194778a3a7b899dcee5619d0610f5cf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.alert','data' => ['type' => 'info','icon' => 'info-circle','class' => 'actionBtn quickbooks-btn']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'info','icon' => 'info-circle','class' => 'actionBtn quickbooks-btn']); ?>
                            <?php echo app('translator')->get('modules.invoiceSettings.syncInfo'); ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5194778a3a7b899dcee5619d0610f5cf)): ?>
<?php $attributes = $__attributesOriginal5194778a3a7b899dcee5619d0610f5cf; ?>
<?php unset($__attributesOriginal5194778a3a7b899dcee5619d0610f5cf); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5194778a3a7b899dcee5619d0610f5cf)): ?>
<?php $component = $__componentOriginal5194778a3a7b899dcee5619d0610f5cf; ?>
<?php unset($__componentOriginal5194778a3a7b899dcee5619d0610f5cf); ?>
<?php endif; ?>
                    </div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/image-picker/0.3.1/image-picker.min.js"></script>
<script>

    $('.nav-item').removeClass('active');
    const activeTab = "<?php echo e($activeTab); ?>";
    $('.' + activeTab).addClass('active');

    showBtn(activeTab);

    function showBtn(activeTab) {
        $('.actionBtn').addClass('d-none');
        $('.' + activeTab + '-btn').removeClass('d-none');
    }


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
                if (response.status == "success") {
                    showBtn(response.activeTab);

                    $('#nav-tabContent').html(response.html);
                    init('#nav-tabContent');
                }
            }
        });
    });

    $('#addUnitType').click(function() {
        const url = "<?php echo e(route('unit-type.create')); ?>";
        $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
        $.ajaxModal(MODAL_LG, url);
    });

</script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/invoice-settings/index.blade.php ENDPATH**/ ?>