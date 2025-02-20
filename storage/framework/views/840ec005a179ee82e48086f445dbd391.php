<div class="col-lg-12 col-md-12 w-100 p-4 ">
    <div class="row">

            <?php echo $dataTable->table(['class' => 'table table-hover border-0']); ?>


    </div>
</div>

<?php echo $__env->make('sections.datatable_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script>

    $('#removal-request-lead').on('preXhr.dt', function(e, settings, data) {
    });

    const showTable = () => {
        window.LaravelDataTables["removal-request-lead"].draw();
    }

</script>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/gdpr/ajax/removal-request-lead.blade.php ENDPATH**/ ?>