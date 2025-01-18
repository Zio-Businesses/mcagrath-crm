<div class="col-lg-12 col-md-12 w-100 p-4 ">
    <div class="row">
        <div class="col-lg-4">
            
            <a href="<?php echo e(route('gdpr.export_data')); ?>" class="btn-primary rounded f-15">Export Data</a>
        </div>
    </div>
</div>

<script>
    $(body).on('click', '#save-right-to-data-portability', function() {
        $.easyAjax({
            url: "<?php echo e(route('gdpr.export_data')); ?>",
            disableButton: true,
            buttonSelector: "#save-right-to-data-portability",
            success: function(response) {
                if (response.status == "success") {
                    location.reload();
                }
            }

        })
    })
</script>
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\gdpr\ajax\right-to-data-portability.blade.php ENDPATH**/ ?>