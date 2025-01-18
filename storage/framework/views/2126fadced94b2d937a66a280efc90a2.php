<?php echo $__env->make('import.process-form', [
    'headingTitle' => __('app.importExpense'),
    'processRoute' => route('expenses.import.process'),
    'backRoute' => route('expenses.index'),
    'backButtonText' => __('app.backToExpense'),
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\expenses\ajax\import_progress.blade.php ENDPATH**/ ?>