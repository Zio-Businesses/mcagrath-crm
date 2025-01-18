<style>
    #logo {
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



<!-- INVOICE CARD START -->

<div class="card border-0 invoice">
    <!-- CARD BODY START -->
    <div class="card-body">
        <div class="invoice-table-wrapper">
            <table width="100%" class="">
                <tr class="inv-logo-heading">
                    <td><img src="<?php echo e(invoice_setting()->logo_url); ?>" alt="<?php echo e(company()->company_name); ?>"
                            id="logo" /></td>
                    <td align="right" class="font-weight-bold f-21 text-dark text-uppercase mt-4 mt-lg-0 mt-md-0">
                        <?php echo app('translator')->get('app.estimate'); ?></td>
                </tr>
                <tr class="inv-num">
                    <td class="f-14 text-dark">
                        <p class="mt-3 mb-0">
                            <?php echo e(company()->company_name); ?><br>
                            <?php if(!is_null($settings)): ?>
                                <?php echo nl2br(default_address()->address); ?><br>
                                <?php echo e(company()->company_phone); ?>

                            <?php endif; ?>
                        </p><br>
                    </td>
                    <td align="right">
                        <table class="inv-num-date text-dark f-13 mt-3">
                            <tr>
                                <td class="bg-light-grey border-right-0 f-w-500">
                                    <?php echo app('translator')->get('modules.estimates.estimatesNumber'); ?></td>
                                <td class="border-left-0"><?php echo e($invoice->estimate_number); ?></td>
                            </tr>
                            <tr>
                                <td class="bg-light-grey border-right-0 f-w-500">
                                    <?php echo app('translator')->get('modules.estimates.validTill'); ?></td>
                                <td class="border-left-0">
                                    <?php echo e($invoice->valid_till->translatedFormat(company()->date_format)); ?>

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
                        <?php if($invoice->vendors): ?>
                        <p class="mb-0 text-left">
                            <span class="text-dark-grey text-capitalize">
                                <?php echo app('translator')->get("modules.invoices.billedTo"); ?>
                            </span><br>

                                <?php echo e($invoice->vendors->vendor_name); ?><br>
                                <?php echo e($invoice->vendors->vendor_email); ?><br>

                                <?php echo e($invoice->vendors->cell); ?><br>

                            
                                <?php echo e($invoice->vendors->company_name); ?><br>

                            
                                <?php echo e($invoice->vendors->street_address); ?>


                        </p>
                        <?php endif; ?>
                    </td>
                    <td align="right" class="mt-2 mt-lg-0 mt-md-0">
                        <?php if($invoice->vendors->company_logo): ?>
                            <img src="<?php echo e($invoice->vendors->image_url); ?>"
                                alt="<?php echo e($invoice->vendors->company_name); ?>" class="logo"
                                style="height:50px;" />
                            <br><br><br>
                        <?php endif; ?>
                        <!-- <span
                            class="unpaid <?php echo e($invoice->status == 'draft' ? 'text-primary border-primary' : ''); ?> <?php echo e($invoice->status == 'accepted' ? 'text-success border-success' : ''); ?> rounded f-15 "><?php echo app('translator')->get('modules.estimates.' . $invoice->status); ?></span> -->
                    </td>
                </tr>
                <tr>
                    <td height="30" colspan="2"></td>
                </tr>
            </table>
            <br><br>
            <div class="row">
                <span class="text-dark-grey text-capitalize ml-3 mb-2">
                    <?php echo app('translator')->get('modules.invoices.description'); ?>
                </span><br>
                <div class="col-sm-12 ql-editor2">
                    <?php echo $invoice->description; ?>

                </div>
            </div>
            <table width="100%" class="inv-desc d-none d-lg-table d-md-table mt-3">
                <tr>
                    <td colspan="2">
                        <table class="inv-detail f-14 table-responsive-sm" width="100%">
                            <tr class="i-d-heading bg-light-grey text-dark-grey font-weight-bold">
                                <td class="border-right-0" width="35%"><?php echo app('translator')->get('app.description'); ?></td>
                                <?php if($invoiceSetting->hsn_sac_code_show): ?>
                                    <td class="border-right-0 border-left-0" align="right"><?php echo app('translator')->get('app.hsnSac'); ?></td>
                                <?php endif; ?>
                                <td class="border-right-0 border-left-0" align="right">
                                <?php echo app('translator')->get('modules.invoices.qty'); ?>
                                </td>
                                <td class="border-right-0 border-left-0" align="right">
                                    <?php echo app('translator')->get('modules.invoices.unitPrice'); ?> (<?php echo e($invoice->currency->currency_code); ?>)
                                </td>
                                <td class="border-left-0" align="right"><?php echo app('translator')->get('modules.invoices.tax'); ?></td>
                                <td class="border-left-0" align="right">
                                    <?php echo app('translator')->get('modules.invoices.amount'); ?>
                                    (<?php echo e($invoice->currency->currency_code); ?>)</td>
                            </tr>

                            <?php $__currentLoopData = $invoice->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($item->type == 'item'): ?>
                                    <tr class="font-weight-semibold f-13">
                                        <td><?php echo e($item->item_name); ?></td>
                                        <?php if($invoiceSetting->hsn_sac_code_show): ?>
                                            <td align="right"><?php echo e($item->hsn_sac_code ? $item->hsn_sac_code : '--'); ?>

                                            </td>
                                        <?php endif; ?>
                                        <td align="right"><?php echo e($item->quantity); ?> <?php if($item->unit): ?><br><span class="f-11 text-dark-grey"><?php echo e($item->unit->unit_type); ?></span><?php endif; ?></td>
                                        <td align="right"> <?php echo e(currency_format($item->unit_price, $invoice->currency_id, false)); ?></td>
                                        <td align="right"> <?php echo e($item->tax_list); ?> </td>
                                        <td align="right"><?php echo e(currency_format($item->amount, $invoice->currency_id, false)); ?></td>
                                    </tr>
                                    <?php if($item->item_summary || $item->estimateItemImage): ?>
                                        <tr class="text-dark f-12">
                                            <td colspan="<?php echo e($invoiceSetting->hsn_sac_code_show ? '6' : '5'); ?>"" class="border-bottom-0">
                                                <?php echo nl2br(strip_tags($item->item_summary)); ?>

                                                <?php if($item->estimateItemImage): ?>
                                                    <p class="mt-2">
                                                        <a href="javascript:;" class="img-lightbox"
                                                            data-image-url="<?php echo e($item->estimateItemImage->file_url); ?>">
                                                            <img src="<?php echo e($item->estimateItemImage->file_url); ?>"
                                                                width="80" height="80" class="img-thumbnail">
                                                        </a>
                                                    </p>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <tr>
                                <td colspan="<?php echo e($invoiceSetting->hsn_sac_code_show ? '4' : '3'); ?>"
                                    class="blank-td border-bottom-0 border-left-0 border-right-0"></td>
                                <td class="p-0 border-right-0" align="right">
                                    <table width="100%">
                                        <tr class="text-dark-grey" align="right">
                                            <td class="w-50 border-top-0 border-left-0">
                                                <?php echo app('translator')->get('modules.invoices.subTotal'); ?></td>
                                        </tr>
                                        <?php if($discount != 0 && $discount != ''): ?>
                                            <tr class="text-dark-grey" align="right">
                                                <td class="w-50 border-top-0 border-left-0">
                                                    <?php echo app('translator')->get('modules.invoices.discount'); ?></td>
                                            </tr>
                                        <?php endif; ?>
                                        
                                        <tr class="bg-light-grey text-dark f-w-500 f-16" align="right">
                                            <td class="w-50 border-bottom-0 border-left-0">
                                                <?php echo app('translator')->get('modules.invoices.total'); ?></td>
                                        </tr>
                                    </table>
                                </td>
                                <td class="p-0 border-left-0" align="right">
                                    <table width="100%">
                                        <tr class="text-dark-grey" align="right">
                                            <td class="border-top-0 border-right-0">
                                                <?php echo e(currency_format($invoice->sub_total, $invoice->currency_id, false)); ?>

                                            </td>
                                        </tr>
                                        <?php if($discount != 0 && $discount != ''): ?>
                                            <tr class="text-dark-grey" align="right">
                                                <td class="border-top-0 border-right-0">
                                                    <?php echo e(currency_format($discount, $invoice->currency_id, false)); ?></td>
                                            </tr>
                                        <?php endif; ?>
                                       
                                        <tr class="bg-light-grey text-dark f-w-500 f-16" align="right">
                                            <td class="border-bottom-0 border-right-0">
                                                <?php echo e(currency_format($invoice->total, $invoice->currency_id, false)); ?>

                                                <?php echo e($invoice->currency->currency_code); ?></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>

                </tr>
            </table>
            <table width="100%" class="inv-desc-mob d-block d-lg-none d-md-none">

                <?php $__currentLoopData = $invoice->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($item->type == 'item'): ?>
                        <tr>
                            <th width="50%" class="bg-light-grey text-dark-grey font-weight-bold">
                                <?php echo app('translator')->get('app.description'); ?></th>
                            <td class="p-0 ">
                                <table>
                                    <tr width="100%" class="font-weight-semibold f-13">
                                        <td class="border-left-0 border-right-0 border-top-0">
                                            <?php echo e($item->item_name); ?></td>
                                    </tr>
                                    <?php if($item->item_summary != '' || $item->estimateItemImage): ?>
                                        <tr>
                                            <td class="border-left-0 border-right-0 border-bottom-0 f-12">
                                                <?php echo nl2br(strip_tags($item->item_summary)); ?>

                                                <?php if($item->estimateItemImage): ?>
                                                    <p class="mt-2">
                                                        <a href="javascript:;" class="img-lightbox"
                                                            data-image-url="<?php echo e($item->estimateItemImage->file_url); ?>">
                                                            <img src="<?php echo e($item->estimateItemImage->file_url); ?>"
                                                                width="80" height="80" class="img-thumbnail">
                                                        </a>
                                                    </p>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <th width="50%" class="bg-light-grey text-dark-grey font-weight-bold">
                                <?php echo app('translator')->get('modules.invoices.qty'); ?></th>
                            <td width="50%"><?php echo e($item->quantity); ?> <?php if($item->unit): ?><br><span class="f-11 text-dark-grey"><?php echo e($item->unit->unit_type); ?></span><?php endif; ?></td>
                        </tr>
                        <tr>
                            <th width="50%" class="bg-light-grey text-dark-grey font-weight-bold">
                                <?php echo app('translator')->get('modules.invoices.unitPrice'); ?>
                                (<?php echo e($invoice->currency->currency_code); ?>)</th>
                            <td width="50%"><?php echo e(currency_format($item->unit_price, $invoice->currency_id, false)); ?>

                            </td>
                        </tr>
                        <tr>
                            <th width="50%" class="bg-light-grey text-dark-grey font-weight-bold">
                                <?php echo app('translator')->get('modules.invoices.amount'); ?>
                                (<?php echo e($invoice->currency->currency_code); ?>)</th>
                            <td width="50%"><?php echo e(currency_format($item->amount, $invoice->currency_id, false)); ?></td>
                        </tr>
                        <tr>
                            <td height="3" class="p-0 " colspan="2"></td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <tr>
                    <th width="50%" class="text-dark-grey font-weight-normal"><?php echo app('translator')->get('modules.invoices.subTotal'); ?>
                    </th>
                    <td width="50%" class="text-dark-grey font-weight-normal">
                        <?php echo e(currency_format($item->sub_total, $invoice->currency_id, false)); ?></td>
                </tr>
                <?php if($discount != 0 && $discount != ''): ?>
                    <tr>
                        <th width="50%" class="text-dark-grey font-weight-normal"><?php echo app('translator')->get('modules.invoices.discount'); ?>
                        </th>
                        <td width="50%" class="text-dark-grey font-weight-normal">
                            <?php echo e(currency_format($discount, $invoice->currency_id, false)); ?></td>
                    </tr>
                <?php endif; ?>

                <tr>
                    <th width="50%" class="text-dark-grey font-weight-bold"><?php echo app('translator')->get('modules.invoices.total'); ?></th>
                    <td width="50%" class="text-dark-grey font-weight-bold">
                        <?php echo e(currency_format($invoice->total, $invoice->currency_id, false)); ?></td>
                </tr>
            </table>
            <table class="inv-note">
                <tr>
                    <td height="30" colspan="2"></td>
                </tr>
                <tr>
                    <td align="right">
                        <table>
                            <tr><?php echo app('translator')->get('modules.invoiceSettings.invoiceTerms'); ?></tr>
                            <tr>
                                <p class="text-dark-grey"><?php echo nl2br($invoiceSetting->invoice_terms); ?></p>
                            </tr>
                        </table>
                    </td>
                </tr>
                <?php if(isset($invoiceSetting->other_info)): ?>
                    <tr>
                        <td align="vertical-align: text-top">
                            <table>
                                <tr>
                                    <p class="text-dark-grey"><?php echo nl2br($invoiceSetting->other_info); ?>

                                    </p>
                                </tr>
                            </table>
                        </td>
                    </tr>
                <?php endif; ?>
 
            </table>
        </div>



    </div>
    <!-- CARD BODY END -->
    <!-- CARD FOOTER START -->
    <div class="card-footer bg-white border-0 d-flex justify-content-start py-0 py-lg-4 py-md-4 mb-4 mb-lg-3 mb-md-3 ">

        <div class="d-flex">
            <div class="inv-action dropup">
                <button class="dropdown-toggle btn-secondary" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo app('translator')->get('app.action'); ?>
                    <span><i class="fa fa-chevron-up f-15 text-dark-grey"></i></span>
                </button>
                <!-- DROPDOWN - INFORMATION -->
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" tabindex="0">
                    <li>
                        <a class="dropdown-item f-14 text-dark"
                            href="<?php echo e(route('estimates.download', [$invoice->id])); ?>">
                            <i class="fa fa-download f-w-500 mr-2 f-11"></i> <?php echo app('translator')->get('app.download'); ?>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item delete-table-row" href="javascript:;"
                            data-estimate-id="<?php echo e($invoice->id); ?>">
                            <i class="fa fa-trash mr-2"></i><?php echo app('translator')->get('app.delete'); ?>
                        </a>
                    </li>
                </ul>
            </div>

            <?php if (isset($component)) { $__componentOriginalc35c79ed7e812580313ad04118477974 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc35c79ed7e812580313ad04118477974 = $attributes; } ?>
<?php $component = App\View\Components\Forms\ButtonCancel::resolve(['link' => route('vendor-estimates.index')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-cancel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonCancel::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'border-0 ml-3']); ?><?php echo app('translator')->get('app.cancel'); ?>
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
<?php if(count($invoice->files) > 0): ?>
    <div class="bg-white mt-4 pl-3 pt-3">
        <h5><?php echo e(__('modules.invoiceFiles')); ?></h5>
        <div class="d-flex flex-wrap" id="estimates-file-list">
            <?php $__empty_1 = true; $__currentLoopData = $invoice->files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <?php if (isset($component)) { $__componentOriginalcc3eadf431dc104666da55af50a04915 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcc3eadf431dc104666da55af50a04915 = $attributes; } ?>
<?php $component = App\View\Components\FileCard::resolve(['fileName' => $file->filename,'dateAdded' => $file->created_at->diffForHumans()] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('file-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\FileCard::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                    <?php if($file->icon == 'images'): ?>
                        <img src="<?php echo e($file->file_url); ?>">
                    <?php else: ?>
                        <i class="fa <?php echo e($file->icon); ?> text-lightest"></i>
                    <?php endif; ?>

                   
                         <?php $__env->slot('action', null, []); ?> 
                            <div class="dropdown ml-auto file-action">
                                <button
                                    class="btn btn-lg f-14 p-0 text-lightest text-capitalize rounded  dropdown-toggle"
                                    type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-h"></i>
                                </button>

                                <div class="dropdown-menu dropdown-menu-right border-grey rounded b-shadow-4 p-0"
                                     aria-labelledby="dropdownMenuLink" tabindex="0">
                                   
                                        <?php if($file->icon = 'images'): ?>
                                            <a class="cursor-pointer d-block text-dark-grey f-13 pt-3 px-3 "
                                               target="_blank"
                                               href="<?php echo e($file->file_url); ?>"><?php echo app('translator')->get('app.view'); ?></a>
                                        <?php endif; ?>
                                        <a class="cursor-pointer d-block text-dark-grey f-13 py-3 px-3 "
                                           href="<?php echo e(route('vendor-estimates-files.download', md5($file->id))); ?>"><?php echo app('translator')->get('app.download'); ?></a>
                                 

                                   
                                        <a class="cursor-pointer d-block text-dark-grey f-13 pb-3 px-3 delete-file"
                                           data-row-id="<?php echo e($file->id); ?>" href="javascript:;"><?php echo app('translator')->get('app.delete'); ?></a>
                                   
                                </div>
                            </div>
                         <?php $__env->endSlot(); ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcc3eadf431dc104666da55af50a04915)): ?>
<?php $attributes = $__attributesOriginalcc3eadf431dc104666da55af50a04915; ?>
<?php unset($__attributesOriginalcc3eadf431dc104666da55af50a04915); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcc3eadf431dc104666da55af50a04915)): ?>
<?php $component = $__componentOriginalcc3eadf431dc104666da55af50a04915; ?>
<?php unset($__componentOriginalcc3eadf431dc104666da55af50a04915); ?>
<?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <?php if (isset($component)) { $__componentOriginal269164c77d9d34462c34359c03da6a68 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal269164c77d9d34462c34359c03da6a68 = $attributes; } ?>
<?php $component = App\View\Components\Cards\NoRecord::resolve(['message' => __('messages.noFileUploaded'),'icon' => 'file'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.no-record'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\NoRecord::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal269164c77d9d34462c34359c03da6a68)): ?>
<?php $attributes = $__attributesOriginal269164c77d9d34462c34359c03da6a68; ?>
<?php unset($__attributesOriginal269164c77d9d34462c34359c03da6a68); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal269164c77d9d34462c34359c03da6a68)): ?>
<?php $component = $__componentOriginal269164c77d9d34462c34359c03da6a68; ?>
<?php unset($__componentOriginal269164c77d9d34462c34359c03da6a68); ?>
<?php endif; ?>
            <?php endif; ?>

        </div>
    </div>
<?php endif; ?>



<?php $__env->startPush('scripts'); ?>

    <script>
        
        $('body').on('click', '.delete-table-row', function() {
            var id = $(this).data('estimate-id');

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
                    var url = "<?php echo e(route('estimates.destroy', ':id')); ?>";
                    url = url.replace(':id', id);

                    var token = "<?php echo e(csrf_token()); ?>";

                    $.easyAjax({
                        type: 'POST',
                        url: url,
                        blockUI: true,
                        data: {
                            '_token': token,
                            '_method': 'DELETE'
                        },
                        success: function(response) {
                            if (response.status == "success") {
                                window.location.href = "<?php echo e(route('estimates.index')); ?>";
                            }
                        }
                    });
                }
            });
        });
        $('body').on('click', '.delete-file', function () {
        let id = $(this).data('row-id');
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
                var url = "<?php echo e(route('vendor-estimates-files.destroy', ':id')); ?>";
                url = url.replace(':id', id);

                var token = "<?php echo e(csrf_token()); ?>";

                $.easyAjax({
                    type: 'POST',
                    url: url,
                    data: {
                        '_token': token,
                        '_method': 'DELETE'
                    },
                    success: function(response) {
                        if (response.status == "success") {
                            window.location.reload();
                        }
                    }
                });
            }
        });
    });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\estimates-vendor\ajax\show.blade.php ENDPATH**/ ?>