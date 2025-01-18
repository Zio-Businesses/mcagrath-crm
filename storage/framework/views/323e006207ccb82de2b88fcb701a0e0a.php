<?php echo $__env->make('import.process-form', [
    'headingTitle' => __('app.importExcel') . ' ' . __('app.menu.lead'),
    'processRoute' => route('lead-contact.import.process'),
    'backRoute' => route('lead-contact.index'),
    'backButtonText' => __('app.backToLead'),
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\leads\ajax\import_progress.blade.php ENDPATH**/ ?>