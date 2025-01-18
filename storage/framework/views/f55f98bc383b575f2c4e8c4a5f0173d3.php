<?php echo $__env->make('import.process-form', [
    'headingTitle' => __('app.importExcel') . ' ' . __('app.employee'),
    'processRoute' => route('employees.import.process'),
    'backRoute' => route('employees.index'),
    'backButtonText' => __('app.backToEmployees'),
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\employees\ajax\import_progress.blade.php ENDPATH**/ ?>