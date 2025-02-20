<!-- DESKTOP DESCRIPTION TABLE START -->
<div class="d-flex px-4 py-3 c-inv-desc item-row">

    <div class="c-inv-desc-table w-100 d-lg-flex d-md-flex d-block ">
        <table width="100%">
            <tbody>
                <tr class="text-dark-grey font-weight-bold f-14">
                    <td width="<?php echo e($invoiceSetting->hsn_sac_code_show ? '40%' : '50%'); ?>"
                        class="border-0 inv-desc-mbl btlr"><?php echo app('translator')->get('app.description'); ?></td>
                    <?php if($invoiceSetting->hsn_sac_code_show): ?>
                        <td width="10%" class="border-0" align="right"><?php echo app('translator')->get('app.hsnSac'); ?></td>
                    <?php endif; ?>
                    <td width="10%" class="border-0" align="right"><?php echo app('translator')->get('modules.invoices.qty'); ?></td>
                    <td width="10%" class="border-0" align="right"><?php echo app('translator')->get('modules.invoices.unitPrice'); ?></td>
                    <td width="13%" class="border-0" align="right"><?php echo app('translator')->get('modules.invoices.tax'); ?></td>
                    <td width="17%" class="border-0 bblr-mbl" align="right"><?php echo app('translator')->get('modules.invoices.amount'); ?></td>
                </tr>
                <tr>
                    <td class="border-bottom-0 btrr-mbl btlr">
                        <input type="text" class="form-control f-14 border-0 w-100 item_name" name="item_name[]"
                            placeholder="<?php echo app('translator')->get('modules.expenses.itemName'); ?>" value="<?php echo e($items->name); ?>">
                    </td>
                    <td class="border-bottom-0 d-block d-lg-none d-md-none">
                        <textarea class="form-control f-14 border-0 w-100 mobile-description" name="item_summary[]"
                            placeholder="<?php echo app('translator')->get('placeholders.invoices.description'); ?>"><?php echo e(strip_tags($items->description)); ?></textarea>
                    </td>
                    <?php if($invoiceSetting->hsn_sac_code_show): ?>
                        <td class="border-bottom-0">
                            <input type="text" min="1"
                                class="form-control f-14 border-0 w-100 text-right hsn_sac_code"
                                data-item-id="<?php echo e($items->id); ?>" value="<?php echo e($items->hsn_sac_code); ?>"
                                name="hsn_sac_code[]">
                        </td>
                    <?php endif; ?>
                    <td class="border-bottom-0">
                        <input type="number" min="1"
                            class="form-control f-14 border-0 w-100 text-right quantity mt-3"
                            data-item-id="<?php echo e($items->id); ?>" value="1" name="quantity[]">
                        <span class="text-dark-grey float-right border-0 f-12"><?php echo e($items->unit->unit_type); ?></span>
                        <input type="hidden" name="product_id[]" value="<?php echo e($items->id); ?>">
                        <input type="hidden" name="unit_id[]" value="<?php echo e($items->unit_id); ?>">
                    </td>
                    <td class="border-bottom-0">
                        <input type="number" min="1"
                            class="f-14 border-0 w-100 text-right cost_per_item form-control"
                            data-item-id="<?php echo e($items->id); ?>" placeholder="<?php echo e($items->price); ?>"
                            value="<?php echo e($items->price); ?>" name="cost_per_item[]">
                    </td>
                    <td class="border-bottom-0">
                        <div class="select-others height-35 rounded border-0">
                            <select id="multiselect" name="taxes[0][]" multiple="multiple"
                                class="select-picker type customSequence border-0" data-size="3">
                                <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option data-rate="<?php echo e($tax->rate_percent); ?>" data-tax-text="<?php echo e($tax->tax_name .':'. $tax->rate_percent); ?>%"
                                        <?php if(isset($items->taxes) && array_search($tax->id, json_decode($items->taxes)) !== false): ?> selected <?php endif; ?> value="<?php echo e($tax->id); ?>">
                                        <?php echo e($tax->tax_name); ?>:
                                        <?php echo e($tax->rate_percent); ?>%</option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </td>
                    <td rowspan="2" align="right" valign="top" class="bg-amt-grey btrr-bbrr">
                        <span class="amount-html" data-item-id="<?php echo e($items->id); ?>">0.00</span>
                        <input type="hidden" class="amount" name="amount[]" data-item-id="<?php echo e($items->id); ?>"
                            value="0">
                    </td>
                </tr>
                <tr class="d-none d-md-table-row d-lg-table-row">
                    <td colspan="<?php echo e($invoiceSetting->hsn_sac_code_show ? '4' : '3'); ?>" class="dash-border-top bblr">
                        <textarea class="form-control f-14 border-0 w-100 desktop-description" name="item_summary[]"
                            placeholder="<?php echo app('translator')->get('placeholders.invoices.description'); ?>"><?php echo e(strip_tags($items->description)); ?></textarea>
                    </td>

                    <td class="border-left-0">
                        <input type="file" class="dropify" id="dropify" name="invoice_item_image[]"
                            data-allowed-file-extensions="png jpg jpeg bmp" data-messages-default="test" data-height="70"
                            data-default-file="<?php echo e($items->image_url); ?>" />
                        <input type="hidden" name="invoice_item_image_url[]" value="<?php echo e($items->image); ?>">
                    </td>
                </tr>
            </tbody>
        </table>

        <a href="javascript:;" class="d-flex align-items-center justify-content-center ml-3 remove-item"><i
                class="fa fa-times-circle f-20 text-lightest"></i></a>
    </div>

    <script>
        $(function() {

            $(document).find('.dropify').dropify({
                messages: dropifyMessages
            });

            for(i=0;i<$('.quantity').length;i++)
            {
                var quantity = $('.quantity').eq(i).val();
                var perItemCost = $('.cost_per_item').eq(i).val();
                var amount = (quantity * perItemCost);
                $('.amount').eq(i).val(amount);
                $('.amount-html').eq(i).html(amount);
            }

            calculateTotal();
        });
    </script>

</div>
<!-- DESKTOP DESCRIPTION TABLE END -->
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/invoices/ajax/add_item.blade.php ENDPATH**/ ?>