<!-- ROW START -->
<div class="row">

    <div class="col-lg-12 col-md-12 mb-4 mb-xl-0 mb-lg-4">
        <!-- Add Task Export Buttons Start -->
        <div class="d-flex" id="table-actions"></div>
        <!-- Add Task Export Buttons End -->
    </div>

    <div class="col-lg-8 col-md-8 mb-4 mb-xl-0 mb-lg-4">
        <!-- Task Box Start -->
        <div class="d-flex flex-column w-tables rounded mt-3 bg-white">
            <?php echo $dataTable->table(['class' => 'table table-hover border-0']); ?>

        </div>
        <!-- Task Box End -->
    </div>

    <div class="col-lg-4 col-md-4 mb-4 mb-xl-0 mb-lg-4">

        <h4 class="heading-h4"><?php echo app('translator')->get('modules.gdpr.consent'); ?></h4>

        <ul class="list-group">
            <?php $__empty_1 = true; $__currentLoopData = $consents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $consent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <li class="list-group-item border-grey">
                    <a class="d-block f-15 text-dark-grey text-capitalize consent-details"
                        href="javascript:;" data-consent-id="<?php echo e($consent->id); ?>"><?php echo e($consent->name); ?></a>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <li class="list-group-item border-grey">
                    <?php if (isset($component)) { $__componentOriginal269164c77d9d34462c34359c03da6a68 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal269164c77d9d34462c34359c03da6a68 = $attributes; } ?>
<?php $component = App\View\Components\Cards\NoRecord::resolve(['message' => __('messages.noRecordFound'),'icon' => 'list'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.no-record'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\NoRecord::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal269164c77d9d34462c34359c03da6a68)): ?>
<?php $attributes = $__attributesOriginal269164c77d9d34462c34359c03da6a68; ?>
<?php unset($__attributesOriginal269164c77d9d34462c34359c03da6a68); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal269164c77d9d34462c34359c03da6a68)): ?>
<?php $component = $__componentOriginal269164c77d9d34462c34359c03da6a68; ?>
<?php unset($__componentOriginal269164c77d9d34462c34359c03da6a68); ?>
<?php endif; ?>
                </li>
            <?php endif; ?>
        </ul>

    </div>


</div>
<!-- ROW END -->
<?php echo $__env->make('sections.datatable_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script>
    $('#client-gdpr-table').on('preXhr.dt', function(e, settings, data) {
        var clientID = "<?php echo e($client->id); ?>";

        data['clientID'] = clientID;
    });

    const showTable = () => {
        window.LaravelDataTables["client-gdpr-table"].draw(false);
    }

    $(document).on('click', '.consent-details', function() {
        let consentId = $(this).data('consent-id');
        let clientId = "<?php echo e($client->id); ?>";
        let url = `<?php echo e(route('clients.gdpr_consent')); ?>?consentId=${consentId}&clientId=${clientId}`;

        $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
        $.ajaxModal(MODAL_LG, url);
    })
</script>
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\clients\ajax\gdpr.blade.php ENDPATH**/ ?>