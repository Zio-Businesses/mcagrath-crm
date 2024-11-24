<script type="text/javascript">
    let updateAreaDiv = $('#update-area');
    let refreshPercent = 0;
    let checkInstall = true;

    $('#update-app').click(function () {
        if ($('#update-frame').length) {
            return false;
        }
        <?php ($envatoUpdateCompanySetting = \Froiden\Envato\Functions\EnvatoUpdate::companySetting()); ?>

        <?php if(!is_null($envatoUpdateCompanySetting->supported_until) && \Carbon\Carbon::parse($envatoUpdateCompanySetting->supported_until)->isPast()): ?>
        let supportText = " Your support has been expired on <b><span id='support-date'><?php echo e(\Carbon\Carbon::parse($envatoUpdateCompanySetting->supported_until)->translatedFormat('dS M, Y')); ?></span></b>";

        Swal.fire({
            title: "Support Expired",
            html: supportText + "<br>Please renew your support for one-click updates.<br><br> You can still update the application manually by following the documentation <a href='https://froiden.freshdesk.com/support/solutions/articles/43000554421-update-application-manually' target='_blank'>Update Application Manually</a>",
            showCancelButton: true,
            confirmButtonText: "Renew Now",
            denyButtonText: `Free Support Guidelines`,
            cancelButtonText: "Cancel",
            closeOnConfirm: true,
            closeOnCancel: true,
            showCloseButton: true,
            icon: 'warning',
            focusConfirm: false,
            customClass: {
                confirmButton: 'btn btn-primary mr-3',
                denyButton: 'btn btn-success mr-3 p-2',
                cancelButton: 'btn btn-secondary'
            },
            showClass: {
                popup: 'swal2-noanimation',
                backdrop: 'swal2-noanimation'
            },
            buttonsStyling: false,
        }).then((result) => {
            if (result.isConfirmed) {
                window.open(
                    "<?php echo e(config('froiden_envato.envato_product_url')); ?>",
                    '_blank'
                );
            }
        });


        <?php else: ?>

        Swal.fire({

            title: "Are you sure?",
            html: `<?php if (isset($component)) { $__componentOriginal5194778a3a7b899dcee5619d0610f5cf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5194778a3a7b899dcee5619d0610f5cf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.alert','data' => ['type' => 'danger','icon' => 'info-circle']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'danger','icon' => 'info-circle']); ?>Please do not click the <strong>Yes! Update It</strong> button if the application has been customized. Your changes may be lost.\n
                <br>
                <br>
                As a precautionary measure, please make a backup of your files and database before updating.. \
                <br>
                <br>
                <strong class="mt-2"><i>Please note that the author will not be held responsible for any loss of data or issues that may occur during the update process.</i></strong>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5194778a3a7b899dcee5619d0610f5cf)): ?>
<?php $attributes = $__attributesOriginal5194778a3a7b899dcee5619d0610f5cf; ?>
<?php unset($__attributesOriginal5194778a3a7b899dcee5619d0610f5cf); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5194778a3a7b899dcee5619d0610f5cf)): ?>
<?php $component = $__componentOriginal5194778a3a7b899dcee5619d0610f5cf; ?>
<?php unset($__componentOriginal5194778a3a7b899dcee5619d0610f5cf); ?>
<?php endif; ?>
                <span class="">To confirm if you have read the above message, type <strong><i>confirm</i></strong> in the field.</span>
                `,
            icon: 'info',
            focusConfirm: true,
            customClass: {
                confirmButton: 'btn btn-primary mr-3',
                cancelButton: 'btn btn-secondary'
            },
            showClass: {
                popup: 'swal2-noanimation',
                backdrop: 'swal2-noanimation'
            },
            buttonsStyling: false,
            input: 'text',
            inputAttributes: {
                autocapitalize: 'off'
            },
            showCloseButton: true,
            showCancelButton: true,
            confirmButtonText: "Yes, update it!",
            cancelButtonText: "No, cancel please!",
            padding: '3em',
            showLoaderOnConfirm: true,
            preConfirm: (isConfirm) => {

                if (!isConfirm) {
                    return false;
                }

                if (isConfirm.toLowerCase() !== "confirm") {

                    Swal.fire({
                        title: "Text not matched",
                        html: "You have entered wrong spelling of <b>confirm</b>",
                        icon: 'error',
                    });
                    return false;
                }
                if (isConfirm.toLowerCase() === "confirm") {
                    return true;
                }
            },
            allowOutsideClick: () => !Swal.isLoading()
        }).then((result) => {
            if (result.isConfirmed) {
                updateAreaDiv.removeClass('d-none');
                Swal.close();
                $.easyAjax({
                    type: 'GET',
                    blockUI: true,
                    url: '<?php echo route("admin.updateVersion.update"); ?>',
                    success: function (response) {
                        if (response.status === 'success') {
                            updateAreaDiv.html("<strong>Downloading...:-</strong><br> ");
                            downloadScript();
                            downloadPercent();
                        } else if (response.status === 'fail')
                            updateAreaDiv.addClass('d-none');
                    }
                });
            }
        });
        <?php endif; ?>


    })

    function downloadScript() {
        $.easyAjax({
            type: 'GET',
            url: '<?php echo route("admin.updateVersion.download"); ?>',
            success: function (response) {
                clearInterval(refreshPercent);

                if(response.status === 'fail'){
                    updateAreaDiv.html(`<i><span class='text-red'><strong>Update Failed</strong> :</span> ${response.message}</i>`)
                    return false;
                }

                $('#percent-complete').css('width', '100%');
                $('#percent-complete').html('100%');
                $('#download-progress').append("<i><span class='text-success'>Download complete.</span> Now Installing...Please wait (This may take few minutes.)</i>");

                window.setInterval(function () {
                    /// call your function here
                    if (checkInstall == true) {
                        checkIfFileExtracted();
                    }
                }, 1500);

                installScript();

            }
        });
    }

    function getDownloadPercent() {
        $.easyAjax({
            type: 'GET',
            url: '<?php echo route("admin.updateVersion.downloadPercent"); ?>',
            success: function (response) {
                response = response.toFixed(1);
                $('#percent-complete').css('width', response + '%');
                $('#percent-complete').html(response + '%');
            }
        });
    }

    function checkIfFileExtracted() {
        $.easyAjax({
            type: 'GET',
            url: '<?php echo route("admin.updateVersion.checkIfFileExtracted"); ?>',
            success: function (response) {
                checkInstall = false;
                if (response.status == 'success') {
                    window.location.reload();
                }
            }
        });
    }

    function downloadPercent() {
        updateAreaDiv.append('<hr><div id="download-progress">' +
            'Download Progress<br><div class="progress progress-lg">' +
            '<div class="progress-bar progress-bar-success active progress-bar-striped" id="percent-complete" role="progressbar""></div>' +
            '</div>' +
            '</div>'
        );
        //getting data
        refreshPercent = window.setInterval(function () {
            getDownloadPercent();
            /// call your function here
        }, 1500);
    }

    function installScript() {
        $.easyAjax({
            type: 'GET',
            url: '<?php echo route("admin.updateVersion.install"); ?>',
            success: function (response) {
                if (response.status == 'success') {
                    window.location.reload();
                }
            }
        });
    }

    function getPurchaseData() {
        const token = "<?php echo e(csrf_token()); ?>";
        $.easyAjax({
            type: 'POST',
            url: "<?php echo e(route('purchase-verified')); ?>",
            data: {'_token': token},
            container: "#support-div",
            messagePosition: 'inline',
            success: function (response) {
                window.location.reload();
            }
        });
        return false;
    }

    function showHidePurchaseCode() {
        $(this).toggleClass('fa-eye-slash fa-eye');
        $(this).siblings('span').toggleClass('blur-code ');
    }
    $("body").tooltip({
        selector: '[data-toggle="tooltip"]'
    })

</script>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/vendor/froiden-envato/update/update_script.blade.php ENDPATH**/ ?>