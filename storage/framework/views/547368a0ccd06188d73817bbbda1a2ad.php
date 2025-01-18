<style>
    @media print {
        .printable-content {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Optional: This will make the container take the full height of the viewport */
        }
        .non-printable {
            display: none !important;
        }
        body * {
            visibility: hidden;
        }
        #qrCode, #printBtn {
            visibility: visible;
        }


    }
</style>



<div class="col-lg-12 col-md-12 ntfcn-tab-content-left w-100 p-4 ">
    <?php echo method_field('PUT'); ?>
    <div class="row">
        <div class="col-lg-12">

            <?php if (isset($component)) { $__componentOriginal32ac71f8f6fe4764d54a65ca726f9ffc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal32ac71f8f6fe4764d54a65ca726f9ffc = $attributes; } ?>
<?php $component = App\View\Components\Forms\ToggleSwitch::resolve(['checked' => ($attendanceSetting->qr_enable),'fieldLabel' => __('app.qrCode'),'fieldName' => 'qr_status','fieldId' => 'qr_status'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.toggle-switch'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ToggleSwitch::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-0 mr-lg-12']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal32ac71f8f6fe4764d54a65ca726f9ffc)): ?>
<?php $attributes = $__attributesOriginal32ac71f8f6fe4764d54a65ca726f9ffc; ?>
<?php unset($__attributesOriginal32ac71f8f6fe4764d54a65ca726f9ffc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal32ac71f8f6fe4764d54a65ca726f9ffc)): ?>
<?php $component = $__componentOriginal32ac71f8f6fe4764d54a65ca726f9ffc; ?>
<?php unset($__componentOriginal32ac71f8f6fe4764d54a65ca726f9ffc); ?>
<?php endif; ?>

        </div>
        <input type="hidden" id="qrStatusValue" name="qr_status_value" value="0">

        <!-- QR Code URL and Copy Button -->
<div class="w-100 qrSection <?php if($attendanceSetting->qr_enable == 0): ?>d-none <?php endif; ?>">
    <div class="row mt-3 ">
        <div class="col-lg-8 pr-0">
            <input type="text" class="form-control p-1" id="qrCodeUrl" value="<?php echo e(route('settings.qr-login')); ?>" readonly>
        </div>
        <div class="col-lg-4 position-relative">
            <button class="btn btn-outline-secondary btn-sm" type="button" onclick="copyQRCodeUrl()">
                <i class="fas fa-copy"></i> <!-- Font Awesome copy icon -->
            </button>
            <!-- Message displayed near the button -->
            <div id="copyMessage" class="position-absolute bg-grey p-1 rounded" style="display: none; bottom: 100%; left: 0;">

            </div>
        </div>
    </div>
    <div class="col-lg-12 col-md-12 ntfcn-tab-content-left w-100 p-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="row" id="qrcode">
                    <img class="mx-auto" id="qrCodeImage" src="<?php echo e($qr->getDataUri()); ?>">
                </div>
            </div>
        </div>
    </div>

    <!-- URL Display and Copy Button -->



<!-- Buttons Start -->
<div class="w-100 border-top-grey qrSection ">
    <?php if (isset($component)) { $__componentOriginal22960d0612890da31753448e47f28003 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal22960d0612890da31753448e47f28003 = $attributes; } ?>
<?php $component = App\View\Components\SettingFormActions::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('setting-form-actions'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SettingFormActions::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
        <button id="downloadBtn" class="btn btn-primary btn-sm mr-3" onclick="downloadQRCode()">
            <i class="fas fa-download"></i> <?php echo app('translator')->get('app.download'); ?>
        </button>
        <button id="printBtn" class="btn btn-secondary btn-sm mr-3" onclick="printQRCode()">
            <i class="fas fa-print"></i> <?php echo app('translator')->get('app.print'); ?>
        </button>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal22960d0612890da31753448e47f28003)): ?>
<?php $attributes = $__attributesOriginal22960d0612890da31753448e47f28003; ?>
<?php unset($__attributesOriginal22960d0612890da31753448e47f28003); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal22960d0612890da31753448e47f28003)): ?>
<?php $component = $__componentOriginal22960d0612890da31753448e47f28003; ?>
<?php unset($__componentOriginal22960d0612890da31753448e47f28003); ?>
<?php endif; ?>
</div>
</div>
<!-- Buttons End -->

<script>
    // Function to handle downloading QR code
    $("body").on("click", "#downloadBtn", function(event) {
        var qrCode = document.getElementById('qrCodeImage'); // Corrected element ID
        var url = qrCode.src.replace(/^data:image\/[^;]/, 'data:application/octet-stream');
        var link = document.createElement('a');
        link.download = 'QR_Code.png';
        link.href = url;
        link.click();
    });

    // Function to print QR code
    $("body").on("click", "#printBtn", function(event) {
        let printFrame = document.createElement('iframe');
        let html = '<html><head><title>Print</title></head><body>';
        html += $('#qrcode').html();
        html += '</body></html>';
        printFrame.style.display = 'none';
        document.body.appendChild(printFrame);

        printFrame.contentDocument.open();
        printFrame.contentDocument.write(html);
        printFrame.contentDocument.close();

        printFrame.onload = function() {
            printFrame.contentWindow.print();
            printFrame.contentWindow.onafterprint = function() {
                document.body.removeChild(printFrame);
            };
        };
    });

    // Toggle QR code visibility based on toggle switch state
    function updateQRStatus(status) {
        var token = "<?php echo e(csrf_token()); ?>";
        $.ajax({
            type: 'POST',
            url: "<?php echo e(route('settings.change-qr-code-status')); ?>",
            data: { qr_status: status, '_token' : token },
            success: function(response) {
                if(status == 1){
                    $('.qrSection').removeClass('d-none');
                }
                else{
                    $('.qrSection').addClass('d-none');
                }
                console.log('QR status updated successfully');
            },

        });
    }

    // Toggle QR code visibility based on toggle switch state
    $("body").on("click", "#qr_status", function(event) {

        var status = $('#qr_status').prop('checked') ? 1 : 0;

        updateQRStatus(status); // Update the server-side status
        // Update the disabled state of the print button
    });
    function copyQRCodeUrl() {
    var qrCodeUrlInput = document.getElementById('qrCodeUrl');
    qrCodeUrlInput.select();
    document.execCommand('copy');

    // Show the message
    Swal.fire({
        icon: 'success',
        text: 'Link Copied!',
        toast: true,
        position: 'top-end',
        timer: 3000,
        timerProgressBar: true,
        showConfirmButton: false,
        customClass: {
            confirmButton: 'btn btn-primary',
        },
        showClass: {
            popup: 'swal2-noanimation',
            backdrop: 'swal2-noanimation'
        },
    });
}


</script>
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\attendance-settings\ajax\qrcode.blade.php ENDPATH**/ ?>