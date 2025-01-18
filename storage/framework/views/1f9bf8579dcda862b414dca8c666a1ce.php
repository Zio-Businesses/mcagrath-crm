<?php echo $__env->make('import.process-form', [
    'headingTitle' => __('app.importExcel') . ' ' . __('app.menu.deal'),
    'processRoute' => route('deals.import.process'),
    'backRoute' => route('deals.index'),
    'backButtonText' => __('app.backToDeal'),
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\deals\ajax\import_progress.blade.php ENDPATH**/ ?>