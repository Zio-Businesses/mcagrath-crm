<?php
$deleteInvoicePermission = user()->permission('delete_invoices');
?>
<!-- ROW START -->
<div class="row">

    <!--  USER CARDS START -->
    <div class="col-lg-12 col-md-12 mb-4 mb-xl-0 mb-lg-4 mb-md-0">
        <h4 class="my-3 f-21 text-capitalize font-weight-bold"><?php echo e($creditNote->cn_number); ?></h4>

        <div class="row">

            <div class="col-xl-3 col-sm-12 mb-4">
                <?php if (isset($component)) { $__componentOriginale1233a330800208b0e743068470d1bf4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale1233a330800208b0e743068470d1bf4 = $attributes; } ?>
<?php $component = App\View\Components\Cards\Widget::resolve(['title' => __('modules.invoices.total'),'value' => currency_format($creditNote->total, $creditNote->currency->id),'icon' => 'file-invoice-dollar'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.widget'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Widget::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale1233a330800208b0e743068470d1bf4)): ?>
<?php $attributes = $__attributesOriginale1233a330800208b0e743068470d1bf4; ?>
<?php unset($__attributesOriginale1233a330800208b0e743068470d1bf4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale1233a330800208b0e743068470d1bf4)): ?>
<?php $component = $__componentOriginale1233a330800208b0e743068470d1bf4; ?>
<?php unset($__componentOriginale1233a330800208b0e743068470d1bf4); ?>
<?php endif; ?>
            </div>
            <div class="col-xl-3 col-sm-12 mb-4">
                <?php if (isset($component)) { $__componentOriginale1233a330800208b0e743068470d1bf4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale1233a330800208b0e743068470d1bf4 = $attributes; } ?>
<?php $component = App\View\Components\Cards\Widget::resolve(['title' => __('modules.credit-notes.creditAmountRemaining'),'value' => currency_format($creditNote->creditAmountRemaining(), $creditNote->currency->id),'icon' => 'file-invoice-dollar','widgetId' => 'remainingAmount'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.widget'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Widget::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale1233a330800208b0e743068470d1bf4)): ?>
<?php $attributes = $__attributesOriginale1233a330800208b0e743068470d1bf4; ?>
<?php unset($__attributesOriginale1233a330800208b0e743068470d1bf4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale1233a330800208b0e743068470d1bf4)): ?>
<?php $component = $__componentOriginale1233a330800208b0e743068470d1bf4; ?>
<?php unset($__componentOriginale1233a330800208b0e743068470d1bf4); ?>
<?php endif; ?>
            </div>
            <div class="col-xl-6 col-sm-12 mb-4">
                <?php if (isset($component)) { $__componentOriginal005edb83c42c88a7ec0f9a9df790def6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal005edb83c42c88a7ec0f9a9df790def6 = $attributes; } ?>
<?php $component = App\View\Components\Cards\User::resolve(['image' => $creditNote->client->image_url] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.user'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\User::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                    <div class="row">
                        <div class="col-10">
                            <h4 class="card-title f-15 f-w-500 text-darkest-grey mb-0">
                                <?php echo e($creditNote->client->name_salutation); ?>

                            </h4>
                        </div>
                    </div>
                    <p class="f-13 font-weight-normal text-dark-grey mb-0">
                        <?php echo e($creditNote->client->clientDetails->company_name); ?>

                    </p>
                    <p class="card-text f-12 text-lightest"><?php echo app('translator')->get('app.lastLogin'); ?>

                        <?php if(!is_null($creditNote->client->last_login)): ?>
                            <?php echo e($creditNote->client->last_login->timezone(company()->timezone)->translatedFormat(company()->date_format . ' ' . company()->time_format)); ?>

                        <?php else: ?>
                            --
                        <?php endif; ?>
                    </p>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal005edb83c42c88a7ec0f9a9df790def6)): ?>
<?php $attributes = $__attributesOriginal005edb83c42c88a7ec0f9a9df790def6; ?>
<?php unset($__attributesOriginal005edb83c42c88a7ec0f9a9df790def6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal005edb83c42c88a7ec0f9a9df790def6)): ?>
<?php $component = $__componentOriginal005edb83c42c88a7ec0f9a9df790def6; ?>
<?php unset($__componentOriginal005edb83c42c88a7ec0f9a9df790def6); ?>
<?php endif; ?>
            </div>

        </div>

        <h4 class="mt-5 mb-3 f-21 text-capitalize font-weight-bold"><?php echo app('translator')->get('app.creditedInvoices'); ?></h4>

        <?php if (isset($component)) { $__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9 = $attributes; } ?>
<?php $component = App\View\Components\Cards\Data::resolve(['padding' => 'false'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Data::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
            <?php if (isset($component)) { $__componentOriginal7d9f6e0b9001f5841f72577781b2d17f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7d9f6e0b9001f5841f72577781b2d17f = $attributes; } ?>
<?php $component = App\View\Components\Table::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Table::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'table-hover']); ?>
                 <?php $__env->slot('thead', null, []); ?> 
                    <th><?php echo app('translator')->get('app.invoiceNumber'); ?> #</th>
                    <th><?php echo app('translator')->get('app.credit-notes.amountCredited'); ?></th>
                    <th><?php echo app('translator')->get('app.date'); ?></th>
                    <th class="text-right"><?php echo app('translator')->get('app.action'); ?></th>
                 <?php $__env->endSlot(); ?>

                <?php $__empty_1 = true; $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr id="row<?php echo e($payment->id); ?>">
                        <td>
                            <a class="text-darkest-grey"
                                href="<?php echo e(route('invoices.show', [$payment->invoice->id])); ?>"><?php echo e($payment->invoice->invoice_number); ?></a>
                        </td>
                        <td>
                            <?php echo e(currency_format($payment->amount, $payment->currency->id)); ?>

                        </td>
                        <td>
                            <?php echo e(\Carbon\Carbon::parse($payment->created_at)->translatedFormat(company()->date_format)); ?>

                        </td>
                        <td class="text-right">
                            <?php if($deleteInvoicePermission == 'all' || ($deleteInvoicePermission == 'added' && $payment->added_by == user()->id)): ?>
                                <?php if (isset($component)) { $__componentOriginal5e57c6582b8a883148a28bb7ee46d2ad = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5e57c6582b8a883148a28bb7ee46d2ad = $attributes; } ?>
<?php $component = App\View\Components\Forms\ButtonSecondary::resolve(['icon' => 'trash'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-secondary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonSecondary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['onclick' => 'deleteCreditedInvoice('.e($payment->credit_notes_id).', '.e($payment->id).')']); ?>
                                    <?php echo app('translator')->get('app.remove'); ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5e57c6582b8a883148a28bb7ee46d2ad)): ?>
<?php $attributes = $__attributesOriginal5e57c6582b8a883148a28bb7ee46d2ad; ?>
<?php unset($__attributesOriginal5e57c6582b8a883148a28bb7ee46d2ad); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5e57c6582b8a883148a28bb7ee46d2ad)): ?>
<?php $component = $__componentOriginal5e57c6582b8a883148a28bb7ee46d2ad; ?>
<?php unset($__componentOriginal5e57c6582b8a883148a28bb7ee46d2ad); ?>
<?php endif; ?>
                            <?php else: ?>
                                --
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <td colspan="4">
                        <?php if (isset($component)) { $__componentOriginal269164c77d9d34462c34359c03da6a68 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal269164c77d9d34462c34359c03da6a68 = $attributes; } ?>
<?php $component = App\View\Components\Cards\NoRecord::resolve(['icon' => 'file-invoice-dollar','message' => __('messages.noRecordFound')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                    </td>
                <?php endif; ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7d9f6e0b9001f5841f72577781b2d17f)): ?>
<?php $attributes = $__attributesOriginal7d9f6e0b9001f5841f72577781b2d17f; ?>
<?php unset($__attributesOriginal7d9f6e0b9001f5841f72577781b2d17f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7d9f6e0b9001f5841f72577781b2d17f)): ?>
<?php $component = $__componentOriginal7d9f6e0b9001f5841f72577781b2d17f; ?>
<?php unset($__componentOriginal7d9f6e0b9001f5841f72577781b2d17f); ?>
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
<!-- ROW END -->
<script>
    function deleteCreditedInvoice(credit_id, id) {
        Swal.fire({
            title: "<?php echo app('translator')->get('messages.sweetAlertTitle'); ?>",
            text: "<?php echo app('translator')->get('messages.recoverRecord'); ?>",
            icon: 'warning',
            showCancelButton: true,
            focusConfirm: false,
            confirmButtonText: "<?php echo app('translator')->get('messages.confirmRemove'); ?>",
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
                var url = "<?php echo e(route('creditnotes.delete_credited_invoice', [':id'])); ?>";
                url = url.replace(':id', id);

                $.easyAjax({
                    url: url,
                    type: 'POST',
                    container: '.content-wrapper',
                    blockUI: true,
                    redirect: true,
                    data: {
                        credit_id: credit_id,
                        _token: '<?php echo e(csrf_token()); ?>'
                    },
                    success: function(response) {
                        if (response.status == 'success') {
                            $('#remainingAmount').html(response.remainingAmount);
                            $('#row'+id).fadeOut(1000);
                        }
                    }
                })
            }
        });
    }

</script>
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\credit-notes\ajax\credited_invoices.blade.php ENDPATH**/ ?>