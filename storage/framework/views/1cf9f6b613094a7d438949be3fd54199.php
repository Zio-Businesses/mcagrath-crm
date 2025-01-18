<?php echo $__env->make('import.process-form', [
    'headingTitle' => __('app.importExcel') . ' ' . __('app.client'),
    'processRoute' => route('clients.import.process'),
    'backRoute' => route('clients.index'),
    'backButtonText' => __('app.backToClient'),
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\clients\ajax\import_progress.blade.php ENDPATH**/ ?>