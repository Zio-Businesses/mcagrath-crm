<?php echo $__env->make('import.process-form', [
    'headingTitle' => __('app.importExcel') . ' ' . __('app.menu.attendance'),
    'processRoute' => route('attendances.import.process'),
    'backRoute' => route('attendances.index'),
    'backButtonText' => __('app.backToAttendance'),
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/attendances/ajax/import_progress.blade.php ENDPATH**/ ?>