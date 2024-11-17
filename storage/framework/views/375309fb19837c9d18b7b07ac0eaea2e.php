<div class="modal-header">
    <h5 class="modal-title"><?php echo app('translator')->get('app.search'); ?></h5>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<?php if (isset($component)) { $__componentOriginal18ad2e0d264f9740dc73fff715357c28 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal18ad2e0d264f9740dc73fff715357c28 = $attributes; } ?>
<?php $component = App\View\Components\Form::resolve(['method' => 'POST'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Form::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'createAgent','class' => 'form-horizontal']); ?>
    <div class="modal-body">
        <div class="portlet-body">

            <div class="row">
                <div class="col-lg-12 my-3">
                    <div class="input-group">
                        <select class="select-picker form-control" name="search_module" id="search_module"
                            data-live-search="true">
                            <?php if(in_array('tickets', user_modules())): ?>
                                <option value="ticket"><?php echo app('translator')->get('app.menu.ticket'); ?></option>
                            <?php endif; ?>
                            <?php if(in_array('invoices', user_modules())): ?>
                                <option value="invoice"><?php echo app('translator')->get('app.invoice'); ?></option>
                            <?php endif; ?>
                            <?php if(in_array('notices', user_modules())): ?>
                                <option value="notice"><?php echo app('translator')->get('app.notice'); ?></option>
                            <?php endif; ?>
                            <?php if(in_array('tickets', user_modules())): ?>
                                <option value="task"><?php echo app('translator')->get('app.task'); ?></option>
                            <?php endif; ?>
                            <?php if(in_array('projects', user_modules())): ?>
                                <option value="project"><?php echo app('translator')->get('app.project'); ?></option>
                            <?php endif; ?>
                            <?php if(in_array('estimates', user_modules())): ?>
                                <option value="estimate"><?php echo app('translator')->get('app.estimate'); ?></option>
                            <?php endif; ?>
                            <?php if(!in_array('client', user_roles())): ?>
                                <?php if(in_array('creditNotes', user_modules())): ?>
                                    <option value="creditNote"><?php echo app('translator')->get('app.menu.credit-note'); ?></option>
                                <?php endif; ?>
                                <?php if(in_array('employees', user_modules())): ?>
                                    <option value="employee"><?php echo app('translator')->get('app.employee'); ?></option>
                                <?php endif; ?>
                                <?php if(in_array('clients', user_modules())): ?>
                                    <option value="client"><?php echo app('translator')->get('app.client'); ?></option>
                                <?php endif; ?>
                                <?php if(in_array('leads', user_modules())): ?>
                                    <option value="lead"><?php echo app('translator')->get('app.lead'); ?></option>
                                <?php endif; ?>
                            <?php endif; ?>
                        </select>

                        <div class="input-group-append w-70">
                            <input type="text" class="form-control f-14" placeholder="<?php echo app('translator')->get('placeholders.search'); ?>"
                                name="search_keyword" id="search_keyword">

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <div class="modal-footer">
        <?php if (isset($component)) { $__componentOriginalc35c79ed7e812580313ad04118477974 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc35c79ed7e812580313ad04118477974 = $attributes; } ?>
<?php $component = App\View\Components\Forms\ButtonCancel::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-cancel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonCancel::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['data-dismiss' => 'modal','class' => 'border-0 mr-3']); ?><?php echo app('translator')->get('app.cancel'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc35c79ed7e812580313ad04118477974)): ?>
<?php $attributes = $__attributesOriginalc35c79ed7e812580313ad04118477974; ?>
<?php unset($__attributesOriginalc35c79ed7e812580313ad04118477974); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc35c79ed7e812580313ad04118477974)): ?>
<?php $component = $__componentOriginalc35c79ed7e812580313ad04118477974; ?>
<?php unset($__componentOriginalc35c79ed7e812580313ad04118477974); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginalcf8d12533ff890e0d6573daf32b7618d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcf8d12533ff890e0d6573daf32b7618d = $attributes; } ?>
<?php $component = App\View\Components\Forms\ButtonPrimary::resolve(['icon' => 'search'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'search-app']); ?><?php echo app('translator')->get('app.search'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcf8d12533ff890e0d6573daf32b7618d)): ?>
<?php $attributes = $__attributesOriginalcf8d12533ff890e0d6573daf32b7618d; ?>
<?php unset($__attributesOriginalcf8d12533ff890e0d6573daf32b7618d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcf8d12533ff890e0d6573daf32b7618d)): ?>
<?php $component = $__componentOriginalcf8d12533ff890e0d6573daf32b7618d; ?>
<?php unset($__componentOriginalcf8d12533ff890e0d6573daf32b7618d); ?>
<?php endif; ?>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal18ad2e0d264f9740dc73fff715357c28)): ?>
<?php $attributes = $__attributesOriginal18ad2e0d264f9740dc73fff715357c28; ?>
<?php unset($__attributesOriginal18ad2e0d264f9740dc73fff715357c28); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal18ad2e0d264f9740dc73fff715357c28)): ?>
<?php $component = $__componentOriginal18ad2e0d264f9740dc73fff715357c28; ?>
<?php unset($__componentOriginal18ad2e0d264f9740dc73fff715357c28); ?>
<?php endif; ?>

<script>
    // save agent
    $('#search-app').click(function() {

        $.easyAjax({
            url: "<?php echo e(route('search.store')); ?>",
            container: '#createAgent',
            type: "POST",
            blockUI: true,
            data: $('#createAgent').serialize(),
            disableButton: true,
            buttonSelector: "#search-app"
        })
    });

    $('#search_keyword').keypress(function(e) {

        var key = e.which;
        if (key == 13) // the enter key code
        {
            e.preventDefault();
            $('#search-app').click();
            return false;
        }
    });

    init(MODAL_LG);
</script>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/search/index.blade.php ENDPATH**/ ?>