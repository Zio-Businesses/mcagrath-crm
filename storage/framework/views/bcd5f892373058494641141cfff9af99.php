<?php $__empty_1 = true; $__currentLoopData = $timelogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <!-- DESKTOP DESCRIPTION TABLE START -->
    <div class="d-flex px-4 py-3 c-inv-desc item-row">
        <div class="c-inv-desc-table w-100 d-lg-flex d-md-flex d-block">
            <table width="100%">
                <tbody>
                    <tr class="text-dark-grey font-weight-bold f-14">
                        <td width="<?php echo e($invoiceSetting->hsn_sac_code_show ? '40%' : '50%'); ?>"
                            class="border-0 inv-desc-mbl btlr"><?php echo app('translator')->get('app.description'); ?></td>
                        <?php if($invoiceSetting->hsn_sac_code_show): ?>
                            <td width="10%" class="border-0" align="right"><?php echo app('translator')->get('app.hsnSac'); ?></td>
                        <?php endif; ?>
                        <td width="10%" class="border-0 qtyValue" align="right"><?php echo app('translator')->get('modules.invoices.qty'); ?></td>
                        <td width="10%" class="border-0" align="right"><?php echo app('translator')->get('modules.invoices.unitPrice'); ?></td>
                        <td width="13%" class="border-0" align="right"><?php echo app('translator')->get('modules.invoices.tax'); ?></td>
                        <td width="17%" class="border-0 bblr-mbl" align="right"><?php echo app('translator')->get('modules.invoices.amount'); ?></td>
                    </tr>
                    <tr>
                        <td class="border-bottom-0 btrr-mbl btlr">
                            <input type="text" class="f-14 border-0 w-100 item_name" name="item_name[]"
                                placeholder="<?php echo app('translator')->get('modules.expenses.itemName'); ?>" value="<?php echo e($item->task->heading); ?>">
                        </td>
                        <td class="border-bottom-0 d-block d-lg-none d-md-none">
                            <input type="text" class="f-14 border-0 w-100 mobile-description"
                                placeholder="<?php echo app('translator')->get('placeholders.invoices.description'); ?>" name="item_summary[]" value="<?php echo e($item->item_summary); ?>">
                        </td>
                        <?php if($invoiceSetting->hsn_sac_code_show): ?>
                            <td class="border-bottom-0">
                                <input type="text" class="f-14 border-0 w-100 text-right hsn_sac_code"
                                    value="<?php echo e($item->hsn_sac_code); ?>" name="hsn_sac_code[]">
                            </td>
                        <?php endif; ?>
                        <td class="border-bottom-0">
                            <input type="number" min="1" class="f-14 border-0 w-100 text-right quantity mt-3"
                                value="1" name="quantity[]">
                            <select class="text-dark-grey float-right border-0 f-12" name="unit_id[]">
                                <?php $__currentLoopData = $units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option
                                    <?php if($unit->default == 1): echo 'selected'; endif; ?>
                                    value="<?php echo e($unit->id); ?>"><?php echo e($unit->unit_type); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <input type="hidden" name="product_id[]" value="">
                        </td>
                        <td class="border-bottom-0">
                            <input type="number" min="1" class="f-14 border-0 w-100 text-right cost_per_item"
                                placeholder="0.00" value="<?php echo e($item->sum); ?>" name="cost_per_item[]">
                        </td>
                        <td class="border-bottom-0">
                            <div class="select-others height-35 rounded border-0">
                                <select id="multiselect" name="taxes[<?php echo e($key); ?>][]" multiple="multiple"
                                    class="select-picker type customSequence border-0" data-size="3">
                                    <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option data-rate="<?php echo e($tax->rate_percent); ?>" data-tax-text="<?php echo e($tax->tax_name .':'. $tax->rate_percent); ?>%" value="<?php echo e($tax->id); ?>">
                                            <?php echo e($tax->tax_name); ?>: <?php echo e($tax->rate_percent); ?>%</option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </td>
                        <td rowspan="2" align="right" valign="top" class="bg-amt-grey btrr-bbrr">
                            <span class="amount-html"><?php echo e($item->sum); ?></span>
                            <input type="hidden" class="amount" name="amount[]" value="<?php echo e($item->sum); ?>">
                        </td>
                    </tr>
                    <tr class="d-none d-md-block d-lg-table-row">
                        <td colspan="<?php echo e($invoiceSetting->hsn_sac_code_show ? '5' : '4'); ?>"
                            class="dash-border-top bblr">
                            <input type="text" class="f-14 border-0 w-100 desktop-description" name="item_summary[]"
                                placeholder="<?php echo app('translator')->get('placeholders.invoices.description'); ?>" value="<?php echo e($item->item_summary); ?>">
                        </td>
                    </tr>
                </tbody>
            </table>
            <a href="javascript:;" class="d-flex align-items-center justify-content-center ml-3 remove-item"><i
                    class="fa fa-times-circle f-20 text-lightest"></i></a>
        </div>
    </div>
    <!-- DESKTOP DESCRIPTION TABLE END -->
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <!-- DESKTOP DESCRIPTION TABLE START -->
    <div class="d-flex px-4 py-3 c-inv-desc item-row">

        <div class="c-inv-desc-table w-100 d-lg-flex d-md-flex d-block">
            <table width="100%">
                <tbody>
                    <tr class="text-dark-grey font-weight-bold f-14">
                        <td width="<?php echo e($invoiceSetting->hsn_sac_code_show ? '40%' : '50%'); ?>"
                            class="border-0 inv-desc-mbl btlr"><?php echo app('translator')->get('app.description'); ?></td>
                        <?php if($invoiceSetting->hsn_sac_code_show): ?>
                            <td width="10%" class="border-0" align="right"><?php echo app('translator')->get('app.hsnSac'); ?></td>
                        <?php endif; ?>
                        <td width="10%" class="border-0 qtyValue" align="right"><?php echo app('translator')->get('modules.invoices.qty'); ?></td>
                        <td width="10%" class="border-0" align="right"><?php echo app('translator')->get('modules.invoices.unitPrice'); ?>
                        </td>
                        <td width="13%" class="border-0" align="right"><?php echo app('translator')->get('modules.invoices.tax'); ?></td>
                        <td width="17%" class="border-0 bblr-mbl" align="right">
                            <?php echo app('translator')->get('modules.invoices.amount'); ?></td>
                    </tr>
                    <tr>
                        <td class="border-bottom-0 btrr-mbl btlr">
                            <input type="text" class="f-14 border-0 w-100 item_name" name="item_name[]"
                                placeholder="<?php echo app('translator')->get('modules.expenses.itemName'); ?>">
                        </td>
                        <td class="border-bottom-0 d-block d-lg-none d-md-none">
                            <textarea class="form-control f-14 border-0 w-100 mobile-description" name="item_summary[]"
                                placeholder="<?php echo app('translator')->get('placeholders.invoices.description'); ?>"></textarea>
                        </td>
                        <?php if($invoiceSetting->hsn_sac_code_show): ?>
                            <td class="border-bottom-0">
                                <input type="text" min="1"
                                    class="f-14 border-0 w-100 text-right hsn_sac_code" value=""
                                    name="hsn_sac_code[]">
                            </td>
                        <?php endif; ?>
                        <td class="border-bottom-0">
                            <input type="number" min="1"
                                class="form-control f-14 border-0 w-100 text-right quantity mt-3" value="1"
                                name="quantity[]">
                            <select class="text-dark-grey float-right border-0 f-12" name="unit_id[]">
                                <?php $__currentLoopData = $units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option
                                    <?php if($unit->default == 1): echo 'selected'; endif; ?>
                                    value="<?php echo e($unit->id); ?>"><?php echo e($unit->unit_type); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <input type="hidden" name="product_id[]" value="">
                        </td>
                        <td class="border-bottom-0">
                            <input type="number" min="1" class="f-14 border-0 w-100 text-right cost_per_item"
                                placeholder="0.00" value="0" name="cost_per_item[]">
                        </td>
                        <td class="border-bottom-0">
                            <div class="select-others height-35 rounded border-0">
                                <select id="multiselect" name="taxes[0][]" multiple="multiple"
                                    class="select-picker type customSequence border-0" data-size="3">
                                    <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option data-rate="<?php echo e($tax->rate_percent); ?>" data-tax-text="<?php echo e($tax->tax_name .':'. $tax->rate_percent); ?>%" value="<?php echo e($tax->id); ?>">
                                            <?php echo e($tax->tax_name); ?>:
                                            <?php echo e($tax->rate_percent); ?>%</option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </td>
                        <td rowspan="2" align="right" valign="top" class="bg-amt-grey btrr-bbrr">
                            <span class="amount-html">0.00</span>
                            <input type="hidden" class="amount" name="amount[]" value="0">
                        </td>
                    </tr>
                    <tr class="d-none d-md-table-row d-lg-table-row">
                        <td colspan="<?php echo e($invoiceSetting->hsn_sac_code_show ? '5' : '4'); ?>"
                            class="dash-border-top bblr">
                            <textarea class="f-14 border-0 w-100 desktop-description" name="item_summary[]" placeholder="<?php echo app('translator')->get('placeholders.invoices.description'); ?>"></textarea>
                        </td>
                    </tr>
                </tbody>
            </table>

            <a href="javascript:;" class="d-flex align-items-center justify-content-center ml-3 remove-item"><i
                    class="fa fa-times-circle f-20 text-lightest"></i></a>
        </div>
    </div>
    <!-- DESKTOP DESCRIPTION TABLE END -->
<?php endif; ?>
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\invoices\timelog-item.blade.php ENDPATH**/ ?>