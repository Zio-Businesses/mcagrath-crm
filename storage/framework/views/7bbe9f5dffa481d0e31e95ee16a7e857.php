<div class="row">
    <div class="col-lg-12 col-md-12 mb-4 mb-xl-0 mb-lg-4">
            <div class="d-flex flex-column rounded mt-3 bg-white p-4">
                <div class="form-group mb-0">
                    <label class="f-14 text-dark-grey mb-12 w-100" for="usr"><?php echo app('translator')->get('modules.gdpr.termsAndCondition'); ?></label>
                    <div class="d-flex">
                        <?php echo e($gdprSetting->terms); ?>

                    </div>
                </div>
            </div>
    </div>
</div>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/gdpr/ajax/right-to-informed.blade.php ENDPATH**/ ?>