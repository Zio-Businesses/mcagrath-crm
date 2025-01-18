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

</style>

<div class="card border-0 invoice">
    <!-- CARD BODY START -->
    <div class="card-body">
        <div class="invoice-table-wrapper">
            <table width="100%" class="">
                <tr class="inv-logo-heading">
                    <td><img src="<?php echo e(invoice_setting()->logo_url); ?>" alt="<?php echo e(company()->company_name); ?>"
                             class="logo"/></td>
                    <td align="right" class="font-weight-bold f-21 text-dark text-uppercase mt-4 mt-lg-0 mt-md-0">
                        <?php echo app('translator')->get('app.menu.contract'); ?></td>
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
                                <td class="border-left-0"><?php echo e($contract->contract_number); ?></td>
                            </tr>
                            <tr>
                                <td class="bg-light-grey border-right-0 f-w-500">
                                    <?php echo app('translator')->get('modules.projects.startDate'); ?></td>
                                <td class="border-left-0"><?php echo e($contract->start_date->translatedFormat(company()->date_format)); ?>

                                </td>
                            </tr>
                            <?php if($contract->end_date != null): ?>
                                <tr>
                                    <td class="bg-light-grey border-right-0 f-w-500"><?php echo app('translator')->get('modules.contracts.endDate'); ?>
                                    </td>
                                    <td class="border-left-0"><?php echo e($contract->end_date->translatedFormat(company()->date_format)); ?>

                                    </td>
                                </tr>
                            <?php endif; ?>
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
            <table width="100%">
                <tr class="inv-unpaid">
                    <td class="f-14 text-dark">
                        <p class="mb-0 text-left"><span
                                class="text-dark-grey text-capitalize"><?php echo app('translator')->get("app.client"); ?></span><br>
                            <?php echo e($contract->client->name_salutation); ?><br>
                            <?php echo e($contract->client->clientDetails->company_name); ?><br>
                            <?php echo nl2br($contract->client->clientDetails->address); ?></p>
                    </td>
                    <?php if($contract->client->clientDetails->company_logo): ?>
                        <td align="right">
                            <img src="<?php echo e($contract->client->clientDetails->image_url); ?>"
                                 alt="<?php echo e($contract->client->clientDetails->company_name); ?>" class="logo"/>
                        </td>
                    <?php endif; ?>
                </tr>
                <tr>
                    <td height="30"></td>
                </tr>
            </table>
        </div>

        <div class="d-flex flex-column">
            <h5><?php echo app('translator')->get('app.subject'); ?></h5>
            <p class="f-15"><?php echo e($contract->subject); ?></p>

            <h5><?php echo app('translator')->get('modules.contracts.notes'); ?></h5>
            <p class="f-15"><?php echo e($contract->contract_note); ?></p>

            <h5><?php echo app('translator')->get('app.description'); ?></h5>
            <div class="ql-editor p-0 pb-3"><?php echo $contract->contract_detail; ?></div>

            <?php if($contract->amount != 0): ?>
                <div class="text-right pt-3 border-top">
                    <h4><?php echo app('translator')->get('modules.contracts.contractValue'); ?>:
                        <?php echo e(currency_format($contract->amount, $contract->currency->id)); ?></h4>
                </div>
            <?php endif; ?>
        </div>
        <hr class="mt-1 mb-1">
        <div class="mt-3">
            <?php if($contract->signature): ?>
                <div class="d-flex flex-column float-right">
                    <h6><?php echo app('translator')->get('modules.estimates.clientsignature'); ?></h6>
                    <img src="<?php echo e($contract->signature->signature); ?>" style="width: 200px;">
                    <p><?php echo e($contract->signature->full_name); ?><br>
                        <?php echo app('translator')->get('app.place'); ?>: <?php echo e($contract->signature->place); ?><br>
                        <?php echo app('translator')->get('app.date'); ?>: <?php echo e($contract->signature->date); ?></p>
                </div>
            <?php endif; ?>

            <?php if($contract->company_sign): ?>
                <div class="d-flex flex-column">
                    <h6><?php echo app('translator')->get('modules.estimates.companysignature'); ?></h6>
                    <img src="<?php echo e($contract->company_signature); ?>" style="width: 200px;">
                    <p><?php echo app('translator')->get('app.date'); ?>: <?php echo e($contract->sign_date); ?></p>
                </div>
            <?php endif; ?>
        </div>

        <div id="signature-mod" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog d-flex justify-content-center align-items-center modal-xl">
                <div class="modal-content">
                    <?php echo $__env->make('estimates.ajax.accept-estimate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
    </div>
    <!-- CARD BODY END -->
    <!-- CARD FOOTER START -->
    <div class="card-footer bg-white border-0 d-flex justify-content-start py-0 py-lg-4 py-md-4 mb-4 mb-lg-3 mb-md-3 ">

        <div class="d-flex">
            <div class="inv-action mr-3 mr-lg-3 mr-md-3 dropup">
                <button class="dropdown-toggle btn-secondary" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo app('translator')->get('app.action'); ?>
                    <span><i class="fa fa-chevron-down f-15 text-dark-grey"></i></span>
                </button>
                <!-- DROPDOWN - INFORMATION -->
                <ul class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuButton" tabindex="0">
                    <?php if(!$contract->signature): ?>
                        <li>
                            <a class="dropdown-item"
                               href="<?php echo e(url()->temporarySignedRoute('front.contract.show', now()->addDays(\App\Models\GlobalSetting::SIGNED_ROUTE_EXPIRY), $contract->hash)); ?>"
                               target="_blank"><i class="fa fa-link mr-2"></i><?php echo app('translator')->get('modules.proposal.publicLink'); ?></a>
                        </li>
                    <?php endif; ?>
                    <?php if($addContractPermission == 'all' || $addContractPermission == 'added'): ?>
                        <li>
                            <a class="dropdown-item openRightModal"
                               href="<?php echo e(route('contracts.create') . '?id=' . $contract->id); ?>">
                                <i class="fa fa-copy mr-2"></i>
                                <?php echo app('translator')->get('app.copyContract'); ?>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if(!$contract->company_sign && user()->company_id == $contract->company_id): ?>
                        <li>
                            <a class="dropdown-item f-14 text-dark" href="javascript:;"
                               id="company-signature">
                                <i class="fa fa-check f-w-500  mr-2 f-12"></i>
                                <?php echo app('translator')->get('modules.estimates.companysignature'); ?>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if(
                    $editContractPermission == 'all'
                    || ($editContractPermission == 'added' && user()->id == $contract->added_by)
                    || ($editContractPermission == 'owned' && user()->id == $contract->client_id)
                    || ($editContractPermission == 'both' && (user()->id == $contract->client_id || user()->id == $contract->added_by))
                    ): ?>
                        <li>
                            <a class="dropdown-item openRightModal"
                               href="<?php echo e(route('contracts.edit', [$contract->id])); ?>">
                                <i class="fa fa-edit mr-2"></i><?php echo app('translator')->get('app.edit'); ?>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if(!$contract->signature && user()->id == $contract->client->id): ?>
                        <li>
                            <a class="dropdown-item f-14 text-dark" href="javascript:;" data-toggle="modal"
                               data-target="#signature-mod">
                                <i class="fa fa-check f-w-500  mr-2 f-12"></i>
                                <?php echo app('translator')->get('app.sign'); ?>
                            </a>
                        </li>
                    <?php endif; ?>
                    <li>
                        <a class="dropdown-item f-14 text-dark"
                           href="<?php echo e(route('contracts.download', $contract->id)); ?>">
                            <i class="fa fa-download f-w-500 mr-2 f-11"></i> <?php echo app('translator')->get('app.download'); ?>
                        </a>
                    </li>
                    <?php if(
                    $deleteContractPermission == 'all'
                    || ($deleteContractPermission == 'added' && user()->id == $contract->added_by)
                    || ($deleteContractPermission == 'owned' && user()->id == $contract->client_id)
                    || ($deleteContractPermission == 'both' && (user()->id == $contract->client_id || user()->id == $contract->added_by))
                    ): ?>
                        <li>
                            <a class="dropdown-item delete-table-row" href="javascript:;"
                               data-contract-id="<?php echo e($contract->id); ?>">
                                <i class="fa fa-trash mr-2"></i><?php echo app('translator')->get('app.delete'); ?>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>

            <?php if (isset($component)) { $__componentOriginalc35c79ed7e812580313ad04118477974 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc35c79ed7e812580313ad04118477974 = $attributes; } ?>
<?php $component = App\View\Components\Forms\ButtonCancel::resolve(['link' => route('contracts.index')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-cancel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonCancel::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'border-0']); ?><?php echo app('translator')->get('app.cancel'); ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc35c79ed7e812580313ad04118477974)): ?>
<?php $attributes = $__attributesOriginalc35c79ed7e812580313ad04118477974; ?>
<?php unset($__attributesOriginalc35c79ed7e812580313ad04118477974); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc35c79ed7e812580313ad04118477974)): ?>
<?php $component = $__componentOriginalc35c79ed7e812580313ad04118477974; ?>
<?php unset($__componentOriginalc35c79ed7e812580313ad04118477974); ?>
<?php endif; ?>

        </div>


    </div>
    <!-- CARD FOOTER END -->
</div>
<!-- INVOICE CARD END -->


<?php if(isset($fields) && count($fields) > 0): ?>
    <div class="row mt-4">
        <!-- TASK STATUS START -->
        <div class="col-md-12">
            <?php if (isset($component)) { $__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9 = $attributes; } ?>
<?php $component = App\View\Components\Cards\Data::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Data::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <h5 class="mb-3"> <?php echo app('translator')->get('modules.projects.otherInfo'); ?></h5>
                <?php if (isset($component)) { $__componentOriginalc7faf3da9dd03559633827985b4aafa9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc7faf3da9dd03559633827985b4aafa9 = $attributes; } ?>
<?php $component = App\View\Components\Forms\CustomFieldShow::resolve(['fields' => $fields,'model' => $contract] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.custom-field-show'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\CustomFieldShow::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc7faf3da9dd03559633827985b4aafa9)): ?>
<?php $attributes = $__attributesOriginalc7faf3da9dd03559633827985b4aafa9; ?>
<?php unset($__attributesOriginalc7faf3da9dd03559633827985b4aafa9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc7faf3da9dd03559633827985b4aafa9)): ?>
<?php $component = $__componentOriginalc7faf3da9dd03559633827985b4aafa9; ?>
<?php unset($__componentOriginalc7faf3da9dd03559633827985b4aafa9); ?>
<?php endif; ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9)): ?>
<?php $attributes = $__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9; ?>
<?php unset($__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9)): ?>
<?php $component = $__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9; ?>
<?php unset($__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9); ?>
<?php endif; ?>
        </div>
    </div>
<?php endif; ?>

<script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
<script>

    $('#company-signature').click(function () {
        const url = "<?php echo e(route('contracts.company_sig', $contract->id)); ?>";
        $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
        $.ajaxModal(MODAL_LG, url);
    });
    var canvas = document.getElementById('signature-pad');

    var signaturePad = new SignaturePad(canvas, {
        backgroundColor: 'rgb(255, 255, 255)' // necessary for saving image as JPEG; can be removed is only saving as PNG or SVG
    });

    document.getElementById('clear-signature').addEventListener('click', function (e) {
        e.preventDefault();
        signaturePad.clear();
    });

    document.getElementById('undo-signature').addEventListener('click', function (e) {
        e.preventDefault();
        var data = signaturePad.toData();
        if (data) {
            data.pop(); // remove the last dot or line
            signaturePad.fromData(data);
        }
    });

    $('#toggle-pad-uploader').click(function () {
        var text = $('.signature').hasClass('d-none') ? '<?php echo e(__("modules.estimates.uploadSignature")); ?>' : '<?php echo e(__("app.sign")); ?>';

        $(this).html(text);

        $('.signature').toggleClass('d-none');
        $('.upload-image').toggleClass('d-none');
    });

    $('#save-signature').click(function () {
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
            buttonSelector: '#save-signature',
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

    $('body').on('click', '.delete-table-row', function () {
        var id = $(this).data('contract-id');
        Swal.fire({
            title: "<?php echo app('translator')->get('messages.sweetAlertTitle'); ?>",
            text: "<?php echo app('translator')->get('messages.recoverRecord'); ?>",
            icon: 'warning',
            showCancelButton: true,
            focusConfirm: false,
            confirmButtonText: "<?php echo app('translator')->get('messages.confirmDelete'); ?>",
            cancelButtonText: "<?php echo app('translator')->get('app.cancel'); ?>",
            customClass: {
                confirmButton: 'btn btn-primary mr-3',
                cancelButton: 'btn btn-secondary'
            },
            showClass: {
                popup: 'swal2-noanimation',
                backdrop: 'swal2-noanimation'
            },
            buttonsStyling: false
        }).then((result) => {
            if (result.isConfirmed) {
                var url = "<?php echo e(route('contracts.destroy', ':id')); ?>";
                url = url.replace(':id', id);

                var token = "<?php echo e(csrf_token()); ?>";

                $.easyAjax({
                    type: 'POST',
                    url: url,
                    data: {
                        '_token': token,
                        '_method': 'DELETE'
                    },
                    success: function (response) {
                        if (response.status == "success") {
                            window.location.href = "<?php echo e(route('contracts.index')); ?>"
                        }
                    }
                });
            }
        });
    });
    var canvas = document.getElementById('sign-pad');

    var signPad = new SignaturePad(canvas, {
        backgroundColor: 'rgb(255, 255, 255)' // necessary for saving image as JPEG; can be removed is only saving as PNG or SVG
    });

    document.getElementById('clear-sign').addEventListener('click', function (e) {
        e.preventDefault();
        signPad.clear();
    });

    document.getElementById('undo-sign').addEventListener('click', function (e) {
        e.preventDefault();
        var data = signPad.toData();
        if (data) {
            data.pop(); // remove the last dot or line
            signPad.fromData(data);
        }
    });

    $('#toggle-pad-upload').click(function () {
        var text = $('.signature').hasClass('d-none') ? '<?php echo e(__("modules.estimates.uploadSignature")); ?>' : '<?php echo e(__("app.sign")); ?>';

        $(this).html(text);

        $('.signature').toggleClass('d-none');
        $('.upload-img').toggleClass('d-none');
    });

    $('#save-sign').click(function () {
        var signature = signPad.toDataURL('image/png');
        var image = $('#sign_image').val();

        // this parameter is used for type of signature used and will be used on validation and upload signature image
        var signature_type = !$('.signature').hasClass('d-none') ? 'signature' : 'upload';

        if (signPad.isEmpty() && !$('.signature').hasClass('d-none')) {
            Swal.fire({
                icon: 'error',
                text: '<?php echo e(__('messages.signatureRequired')); ?>',

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
    });

</script>
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\contracts\ajax\summary.blade.php ENDPATH**/ ?>