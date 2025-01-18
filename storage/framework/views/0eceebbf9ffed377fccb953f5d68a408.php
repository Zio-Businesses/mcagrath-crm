<!-- DESKTOP DESCRIPTION TABLE START -->
<div class="d-flex px-4 py-3 c-inv-desc item-row">

    <div class="c-inv-desc-table w-100 d-lg-flex d-md-flex d-block">
        <table width="100%">
            <tbody>
                <tr class="text-dark-grey font-weight-bold f-14">
                    <td width="<?php echo e($invoiceSetting->hsn_sac_code_show ? '40%' : '50%'); ?>" class="border-0 inv-desc-mbl btlr"><?php echo app('translator')->get('app.description'); ?></td>
                    <?php if($invoiceSetting->hsn_sac_code_show): ?>
                        <td width="10%" class="border-0" align="right"><?php echo app('translator')->get("app.hsnSac"); ?></td>
                    <?php endif; ?>
                    <td width="10%" class="border-0" align="right"><?php echo app('translator')->get('modules.invoices.qty'); ?></td>
                    <td width="10%" class="border-0" align="right"><?php echo app('translator')->get("modules.invoices.unitPrice"); ?></td>
                    <td width="13%" class="border-0" align="right"><?php echo app('translator')->get('modules.invoices.tax'); ?></td>
                    <td width="17%" class="border-0 bblr-mbl" align="right"><?php echo app('translator')->get('modules.invoices.amount'); ?></td>
                </tr>
                <tr>
                    <td class="border-bottom-0 btrr-mbl btlr">
                        <input type="text" class="f-14 border-0 w-100 item_name" name="item_name[]"
                            placeholder="<?php echo app('translator')->get('modules.expenses.itemName'); ?>" value="<?php echo e($items->name); ?>">
                    </td>
                    <td class="border-bottom-0 d-block d-lg-none d-md-none">
                        <input type="text" class="f-14 border-0 w-100 mobile-description" name="item_summary[]"
                            placeholder="<?php echo app('translator')->get('placeholders.invoices.description'); ?>"
                            value="<?php echo e(strip_tags($items->description)); ?>">
                    </td>
                    <?php if($invoiceSetting->hsn_sac_code_show): ?>
                        <td class="border-bottom-0">
                            <input type="text" class="f-14 border-0 w-100 text-right hsn_sac_code"
                                data-item-id="<?php echo e($items->id); ?>" value="1" name="hsn_sac_code[]">
                        </td>
                    <?php endif; ?>
                    <td class="border-bottom-0">
                        <input type="number" min="1" class="f-14 border-0 w-100 text-right quantity"
                            data-item-id="<?php echo e($items->id); ?>" value="1" name="quantity[]">
                    </td>
                    <td class="border-bottom-0">
                        <input type="number" min="1" class="f-14 border-0 w-100 text-right cost_per_item"
                            data-item-id="<?php echo e($items->id); ?>" placeholder="<?php echo e($items->price); ?>"
                            value="<?php echo e($items->price); ?>" name="cost_per_item[]">
                    </td>
                    <td class="border-bottom-0">
                        <div class="select-others height-35 rounded border-0">
                            <select id="multiselect" name="taxes[0][]" multiple="multiple"
                                class="select-picker type customSequence border-0" data-size="3">
                                <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option data-rate="<?php echo e($tax->rate_percent); ?>" data-tax-text="<?php echo e($tax->tax_name .':'. $tax->rate_percent); ?>%" <?php if(isset($items->taxes) && array_search($tax->id, json_decode($items->taxes)) !== false): ?> selected <?php endif; ?> value="<?php echo e($tax->id); ?>">
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
                    <td colspan="<?php echo e($invoiceSetting->hsn_sac_code_show ? 5 : 4); ?>" class="dash-border-top bblr">
                        <input type="text" class="f-14 border-0 w-100 desktop-description" name="item_summary[]"
                            value="<?php echo e(strip_tags($items->description)); ?>"
                            placeholder="<?php echo app('translator')->get('placeholders.invoices.description'); ?>">
                    </td>
                </tr>
            </tbody>
        </table>

        <a href="javascript:;" class="d-flex align-items-center justify-content-center ml-3 remove-item"><i
                class="fa fa-times-circle f-20 text-lightest"></i></a>
    </div>

    <script>
        $(function() {
            var quantity = $('#sortable').find('.quantity[data-item-id="<?php echo e($items->id); ?>"]').val();
            var perItemCost = $('#sortable').find('.cost_per_item[data-item-id="<?php echo e($items->id); ?>"]').val();
            var amount = (quantity * perItemCost);
            $('#sortable').find('.amount[data-item-id="<?php echo e($items->id); ?>"]').val(amount);
            $('#sortable').find('.amount-html[data-item-id="<?php echo e($items->id); ?>"]').html(amount);

            calculateTotal();
        });

    </script>

</div>
<!-- DESKTOP DESCRIPTION TABLE END -->
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\credit-notes\ajax\add_item.blade.php ENDPATH**/ ?>