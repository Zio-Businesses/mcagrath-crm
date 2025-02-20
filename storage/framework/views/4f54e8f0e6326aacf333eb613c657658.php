<?php echo $__env->make('import.process-form', [
    'headingTitle' => __('app.importExcel') . ' ' . __('app.menu.projects'),
    'processRoute' => route('projects.import.process'),
    'backRoute' => route('projects.index'),
    'backButtonText' => __('app.backToProject'),
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/projects/ajax/import_progress.blade.php ENDPATH**/ ?>