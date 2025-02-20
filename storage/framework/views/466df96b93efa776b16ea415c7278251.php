<style>
    .logo {
        height: 50px;
    }

    .signature_wrap {
        position: relative;
        height: 150px;
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
        user-select: none;
        width: 400px;
    }

    .signature-pad {
        position: absolute;
        left: 0;
        top: 0;
        width: 400px;
        height: 150px;
    }

    .ml{
        margin-left : -20px;
        padding: 8px!important;
        border-radius: 4px;
        margin-top: -1px!important
    }

</style>

<div class="card border-0 invoice">
    <!-- CARD BODY START -->
    <div class="card-body">
        <div class="invoice-table-wrapper">
            <table width="100%" class="">
                <tr class="inv-logo-heading">
                    <td><img src="<?php echo e(invoice_setting()->logo_url); ?>" alt="<?php echo e(company()->company_name); ?>"
                            class="logo" /></td>
                    <td align="right" class="font-weight-bold f-21 text-dark text-uppercase mt-4 mt-lg-0 mt-md-0">
                        <?php echo app('translator')->get('app.menu.contractTemplate'); ?></td>
                </tr>
                <tr class="inv-num">
                    <td class="f-14 text-dark">
                        <p class="mt-3 mb-0">
                            <?php echo e(company()->company_name); ?><br>
                            <?php echo nl2br(default_address()->address); ?><br>
                            <?php echo e(company()->company_phone); ?>

                        </p><br>
                    </td>
                    <td align="right">
                        <table class="inv-num-date text-dark f-13 mt-3">
                            <tr>
                                <td class="bg-light-grey border-right-0 f-w-500">
                                    <?php echo app('translator')->get('modules.contracts.contractNumber'); ?></td>
                                <td class="border-left-0">#<?php echo e($contract->contract_template_number); ?></td>
                            </tr>
                            <tr>
                                <td class="bg-light-grey border-right-0 f-w-500">
                                    <?php echo app('translator')->get('modules.contracts.contractType'); ?></td>
                                <td class="border-left-0"><?php echo e($contract->contractType->name); ?>

                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td height="20"></td>
                </tr>
            </table>
        </div>

        <div class="d-flex flex-column">
            <h5><?php echo app('translator')->get('app.subject'); ?></h5>
            <p class="f-15"><?php echo e($contract->subject); ?></p>

            <h5><?php echo app('translator')->get('app.description'); ?></h5>
            <div class="ql-editor p-0 pb-3"><?php echo $contract->contract_detail; ?></div>

            <?php if($contract->amount != 0): ?>
                <div class="text-right pt-3 mt-3 border-top">
                    <h4><?php echo app('translator')->get('modules.contracts.contractValue'); ?>:
                        <?php echo e(currency_format($contract->amount, $contract->currency->id)); ?></h4>
                </div>
            <?php endif; ?>
        </div>

    </div>
    <!-- CARD BODY END -->
    <!-- CARD FOOTER START -->
    <!-- CARD FOOTER END -->
</div>
<!-- INVOICE CARD END -->

<script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
<script>
    var canvas = document.getElementById('signature-pad');

    var signaturePad = new SignaturePad(canvas, {
        backgroundColor: 'rgb(255, 255, 255)' // necessary for saving image as JPEG; can be removed is only saving as PNG or SVG
    });

    document.getElementById('clear-signature').addEventListener('click', function(e) {
        e.preventDefault();
        signaturePad.clear();
    });

    document.getElementById('undo-signature').addEventListener('click', function(e) {
        e.preventDefault();
        var data = signaturePad.toData();
        if (data) {
            data.pop(); // remove the last dot or line
            signaturePad.fromData(data);
        }
    });

    $('#toggle-pad-uploader').click(function() {
        var text = $('.signature').hasClass('d-none') ? '<?php echo e(__("modules.estimates.uploadSignature")); ?>' : '<?php echo e(__("app.sign")); ?>';

        $(this).html(text);

        $('.signature').toggleClass('d-none');
        $('.upload-image').toggleClass('d-none');
    });

    $('#save-signature').click(function() {
        var first_name = $('#first_name').val();
        var last_name = $('#last_name').val();
        var email = $('#email').val();
        var signature = signaturePad.toDataURL('image/png');
        var image = $('#image').val();

        // this parameter is used for type of signature used and will be used on validation and upload signature image
        var signature_type = !$('.signature').hasClass('d-none') ? 'signature' : 'upload';

        if (signaturePad.isEmpty() && !$('.signature').hasClass('d-none')) {
            Swal.fire({
                icon: 'error',
                text: "<?php echo e(__('messages.signatureRequired')); ?>",

                customClass: {
                    confirmButton: 'btn btn-primary',
                },
                showClass: {
                    popup: 'swal2-noanimation',
                    backdrop: 'swal2-noanimation'
                },
                buttonsStyling: false
            });
            return false;
        }

        $.easyAjax({
            url: "<?php echo e(route('contracts.sign', $contract->id)); ?>",
            container: '#acceptEstimate',
            type: "POST",
            blockUI: true,
            file: true,
            disableButton: true,
            buttonSelector : '#save-signature',
            data: {
                first_name: first_name,
                last_name: last_name,
                email: email,
                signature: signature,
                image: image,
                signature_type: signature_type,
                _token: '<?php echo e(csrf_token()); ?>'
            },
        })
    });

</script>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/contract-template/ajax/overview.blade.php ENDPATH**/ ?>