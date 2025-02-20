<!-- ROW START -->
<div class="row">

    <div class="col-lg-12 col-md-12 mb-4 mb-xl-0 mb-lg-4">
        <!-- Add Task Export Buttons Start -->
        <div class="d-flex" id="table-actions">
            <?php if(isset($gdpr) && $gdpr->consent_customer == 1): ?>
                <?php if (isset($component)) { $__componentOriginaldbb84df4c3a5cbdd95fb35d18ba6410f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldbb84df4c3a5cbdd95fb35d18ba6410f = $attributes; } ?>
<?php $component = App\View\Components\Forms\LinkPrimary::resolve(['link' => route('front.gdpr.consent', $deal->hash),'icon' => 'eye'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.link-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\LinkPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-3','target' => '_blank']); ?>
                    <?php echo app('translator')->get('modules.gdpr.viewConsent'); ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldbb84df4c3a5cbdd95fb35d18ba6410f)): ?>
<?php $attributes = $__attributesOriginaldbb84df4c3a5cbdd95fb35d18ba6410f; ?>
<?php unset($__attributesOriginaldbb84df4c3a5cbdd95fb35d18ba6410f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldbb84df4c3a5cbdd95fb35d18ba6410f)): ?>
<?php $component = $__componentOriginaldbb84df4c3a5cbdd95fb35d18ba6410f; ?>
<?php unset($__componentOriginaldbb84df4c3a5cbdd95fb35d18ba6410f); ?>
<?php endif; ?>
            <?php endif; ?>
        </div>
        <!-- Add Task Export Buttons End -->
    </div>

    <div class="col-lg-9 col-md-12 mb-4 mb-xl-0 mb-lg-4">
        <!-- Task Box Start -->
        <div class="d-flex flex-column w-tables rounded mt-3 bg-white">
            <?php echo $dataTable->table(['class' => 'table table-hover border-0']); ?>

        </div>
        <!-- Task Box End -->
    </div>

    <div class="col-lg-3 col-md-12 mb-4 mb-xl-0 mb-lg-4">
        <div class="right-sidebar">
            <div class="d-flex flex-column rounded mt-3 bg-white">
                <ul>
                    <?php $__empty_1 = true; $__currentLoopData = $consents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $consent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <li>
                        <a class="d-block f-15 text-dark-grey text-capitalize border-bottom-grey consent-details" href="javascript:;" data-consent-id="<?php echo e($consent->id); ?>"><?php echo e($consent->name); ?></a>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p class="text-center">No Consent available.</p>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>

</div>
<!-- ROW END -->

<?php echo $__env->make('sections.datatable_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script>

    $('#leads-gdpr-table').on('preXhr.dt', function(e, settings, data) {
        var leadID = "<?php echo e($deal->id); ?>";

        data['leadID'] = leadID;
    });


    const showTable = () => {
        window.LaravelDataTables["leads-gdpr-table"].draw(false);
    }

    $(document).on('click', '.consent-details', function(){
        let consentId = $(this).data('consent-id');
        let leadId = "<?php echo e($deal->id); ?>";

        let url = `<?php echo e(route('deals.gdpr_consent')); ?>?consentId=${consentId}&leadId=${leadId}`;

        $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
        $.ajaxModal(MODAL_LG, url);
    })

</script>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/leads/ajax/gdpr.blade.php ENDPATH**/ ?>