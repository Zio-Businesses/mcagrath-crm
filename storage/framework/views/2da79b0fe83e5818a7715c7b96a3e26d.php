<!-- CREATE INVOICE START -->
<div class="bg-white rounded b-shadow-4 create-inv">
    <!-- HEADING START -->
    <div class="px-lg-4 px-md-4 px-3 py-3">
        <h4 class="mb-0 f-21 font-weight-normal text-capitalize"><?php echo app('translator')->get('app.creditNoteDetails'); ?></h4>
    </div>
    <!-- HEADING END -->
    <hr class="m-0 border-top-grey">
    <!-- FORM START -->
    <?php if (isset($component)) { $__componentOriginal18ad2e0d264f9740dc73fff715357c28 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal18ad2e0d264f9740dc73fff715357c28 = $attributes; } ?>
<?php $component = App\View\Components\Form::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Form::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'c-inv-form','id' => 'saveInvoiceForm']); ?>
        <input type="hidden" name="invoice_id" value="<?php echo e($invoiceId); ?>">

        <!-- INVOICE NUMBER, DATE, DUE DATE, FREQUENCY START -->
        <div class="row px-lg-4 px-md-4 px-3 py-3">
            <!-- INVOICE NUMBER START -->
            <div class="col-md-3">
                <div class="form-group mb-lg-0 mb-md-0 mb-4">
                    <label class="f-14 text-dark-grey mb-12 text-capitalize" for="usr"><?php echo app('translator')->get('app.credit-note'); ?> #</label>
                    <div class="input-group">
                        <div class="input-group-prepend  height-35 ">
                            <span class="input-group-text border-grey f-15 bg-additional-grey px-3 text-dark"
                                id="basic-addon1"><?php echo e($creditNoteSetting->credit_note_prefix); ?><?php echo e($creditNoteSetting->credit_note_number_separator); ?><?php echo e($zero); ?></span>
                        </div>
                        <input type="text" name="cn_number" id="cn_number"
                            class="form-control height-35 f-15 readonly-background" readonly
                            value="<?php if(is_null($lastCreditNote)): ?>1 <?php else: ?><?php echo e($lastCreditNote); ?><?php endif; ?>" placeholder="0019" aria-label="0019"
                            aria-describedby="basic-addon1">
                    </div>
                </div>
            </div>
            <!-- INVOICE NUMBER END -->
            <!-- INVOICE DATE START -->
            <div class="col-md-3">
                <div class="form-group mb-lg-0 mb-md-0 mb-4">
                    <?php if (isset($component)) { $__componentOriginal89b295b0763c93abe0143426334eb5d6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal89b295b0763c93abe0143426334eb5d6 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Label::resolve(['fieldId' => 'invoice_date','fieldLabel' => __('modules.credit-notes.creditNoteDate'),'fieldRequired' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Label::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal89b295b0763c93abe0143426334eb5d6)): ?>
<?php $attributes = $__attributesOriginal89b295b0763c93abe0143426334eb5d6; ?>
<?php unset($__attributesOriginal89b295b0763c93abe0143426334eb5d6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal89b295b0763c93abe0143426334eb5d6)): ?>
<?php $component = $__componentOriginal89b295b0763c93abe0143426334eb5d6; ?>
<?php unset($__componentOriginal89b295b0763c93abe0143426334eb5d6); ?>
<?php endif; ?>
                    <div class="input-group">
                        <input type="text" id="invoice_date" name="issue_date"
                            class="px-6 position-relative text-dark font-weight-normal form-control height-35 rounded p-0 text-left f-15"
                            placeholder="<?php echo app('translator')->get('placeholders.date'); ?>"
                            value="<?php echo e(now(company()->timezone)->translatedFormat(company()->date_format)); ?>">
                    </div>
                </div>
            </div>
            <!-- INVOICE DATE END -->

            <!-- FREQUENCY START -->
            <div class="col-md-3">
                <div class="form-group c-inv-select mb-lg-0 mb-md-0 mb-4">
                    <?php if (isset($component)) { $__componentOriginal89b295b0763c93abe0143426334eb5d6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal89b295b0763c93abe0143426334eb5d6 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Label::resolve(['fieldId' => 'currency_id','fieldLabel' => __('modules.invoices.currency')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Label::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal89b295b0763c93abe0143426334eb5d6)): ?>
<?php $attributes = $__attributesOriginal89b295b0763c93abe0143426334eb5d6; ?>
<?php unset($__attributesOriginal89b295b0763c93abe0143426334eb5d6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal89b295b0763c93abe0143426334eb5d6)): ?>
<?php $component = $__componentOriginal89b295b0763c93abe0143426334eb5d6; ?>
<?php unset($__componentOriginal89b295b0763c93abe0143426334eb5d6); ?>
<?php endif; ?>

                    <div class="select-others height-35 rounded">
                        <input type="hidden" name="currency_id" value="<?php echo e($creditNote->currency_id); ?>">
                        <select class="form-control select-picker" disabled name="currency_id" id="currency_id">
                            <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option <?php if($creditNote->currency_id == $currency->id): ?> selected <?php endif; ?> value="<?php echo e($currency->id); ?>">
                                    <?php echo e($currency->currency_code . ' (' . $currency->currency_symbol . ')'); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
            </div>

            <!-- FREQUENCY END -->
        </div>
        <!-- INVOICE NUMBER, DATE, DUE DATE, FREQUENCY END -->

        <hr class="m-0 border-top-grey">

        <!-- CLIENT, PROJECT, GST, BILLING, SHIPPING ADDRESS START -->
        <div class="row px-lg-4 px-md-4 px-3 pt-3">
            <!-- CLIENT START -->
            <div class="col-md-3">
                <div class="form-group c-inv-select mb-4">
                    <?php if (isset($component)) { $__componentOriginal89b295b0763c93abe0143426334eb5d6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal89b295b0763c93abe0143426334eb5d6 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Label::resolve(['fieldId' => 'client_id','fieldLabel' => __('app.client')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Label::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal89b295b0763c93abe0143426334eb5d6)): ?>
<?php $attributes = $__attributesOriginal89b295b0763c93abe0143426334eb5d6; ?>
<?php unset($__attributesOriginal89b295b0763c93abe0143426334eb5d6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal89b295b0763c93abe0143426334eb5d6)): ?>
<?php $component = $__componentOriginal89b295b0763c93abe0143426334eb5d6; ?>
<?php unset($__componentOriginal89b295b0763c93abe0143426334eb5d6); ?>
<?php endif; ?>
                    <p>
                        <?php echo e($creditNote->client->name_salutation); ?>

                    </p>
                </div>
            </div>
            <!-- CLIENT END -->
            <!-- PROJECT START -->
            <div class="col-md-3">
                <div class="form-group c-inv-select mb-4">
                    <?php if (isset($component)) { $__componentOriginal89b295b0763c93abe0143426334eb5d6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal89b295b0763c93abe0143426334eb5d6 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Label::resolve(['fieldId' => 'project_id','fieldLabel' => __('app.project')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Label::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal89b295b0763c93abe0143426334eb5d6)): ?>
<?php $attributes = $__attributesOriginal89b295b0763c93abe0143426334eb5d6; ?>
<?php unset($__attributesOriginal89b295b0763c93abe0143426334eb5d6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal89b295b0763c93abe0143426334eb5d6)): ?>
<?php $component = $__componentOriginal89b295b0763c93abe0143426334eb5d6; ?>
<?php unset($__componentOriginal89b295b0763c93abe0143426334eb5d6); ?>
<?php endif; ?>
                    <p>
                        <?php echo e($creditNote->project->project_name ?? '--'); ?>

                    </p>
                </div>
                <input type="hidden" name="calculate_tax" id="calculate_tax" value="<?php echo e($creditNote->calculate_tax); ?>">
            </div>
            <!-- PROJECT END -->

        </div>


        <!-- CLIENT, PROJECT, GST, BILLING, SHIPPING ADDRESS END -->

        <hr class="m-0 border-top-grey">

        <div id="sortable">
            <?php $__currentLoopData = $creditNote->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <!-- DESKTOP DESCRIPTION TABLE START -->
                <div class="d-flex px-4 py-3 c-inv-desc item-row">
                    <div class="c-inv-desc-table w-100 d-lg-flex d-md-flex d-block">
                        <table width="100%">
                            <tbody>
                                <tr class="text-dark-grey font-weight-bold f-14">
                                    <td width="<?php echo e($invoiceSetting->hsn_sac_code_show ? '40%' : '50%'); ?>"
                                        class="border-0 inv-desc-mbl btlr"><?php echo app('translator')->get('app.description'); ?></td>
                                    <?php if($invoiceSetting->hsn_sac_code_show): ?>
                                        <td width="10%" class="border-0" align="right"><?php echo app('translator')->get("app.hsnSac"); ?></td>
                                    <?php endif; ?>
                                    <td width="10%" class="border-0" align="right" >
                                        <?php echo app('translator')->get('modules.invoices.qty'); ?>
                                    </td>
                                    <td width="10%" class="border-0" align="right">
                                        <?php echo app('translator')->get("modules.invoices.unitPrice"); ?></td>
                                    <td width="13%" class="border-0" align="right"><?php echo app('translator')->get('modules.invoices.tax'); ?>
                                    </td>
                                    <td width="17%" class="border-0 bblr-mbl" align="right">
                                        <?php echo app('translator')->get('modules.invoices.amount'); ?></td>
                                </tr>
                                <tr>
                                    <td class="border-bottom-0 btrr-mbl btlr">
                                        <input type="hidden" class="form-control f-14 border-0 w-100 item_name"
                                            name="item_name[]" placeholder="<?php echo app('translator')->get('modules.expenses.itemName'); ?>"
                                            value="<?php echo e($item->item_name); ?>">
                                            <?php echo e($item->item_name); ?>

                                    </td>
                                    <td class="border-bottom-0 d-block d-lg-none d-md-none">
                                        <input type="hidden" class="form-control f-14 border-0 w-100 mobile-description"
                                            placeholder="<?php echo app('translator')->get('placeholders.invoices.description'); ?>"
                                            name="item_summary[]" value="<?php echo e($item->item_summary); ?>">
                                            <?php echo e($item->item_summary); ?>

                                    </td>
                                    <?php if($invoiceSetting->hsn_sac_code_show): ?>
                                        <td class="border-bottom-0" align="right">
                                            <input type="hidden" class="f-14 border-0 w-100 text-right hsn_sac_code"
                                                value="<?php echo e($item->hsn_sac_code); ?>" name="hsn_sac_code[]">
                                            <?php echo e(!is_null($item->hsn_sac_code) ? $item->hsn_sac_code : '--'); ?>

                                        </td>
                                    <?php endif; ?>
                                    <td class="border-bottom-0" align="right">
                                        <input type="hidden"
                                            class="form-control f-14 border-0 w-100 text-right quantity"
                                            value="<?php echo e($item->quantity); ?>" name="quantity[]">
                                        <?php echo e($item->quantity); ?>

                                        <?php if(!is_null($item->unit_id) && $item->unit_id != 0): ?>
                                            <span class="text-dark-grey border-0 f-12"><?php echo e($item->unit->unit_type); ?></span>
                                            <input type="hidden" name="product_id[]" value="<?php echo e($item->product_id); ?>">
                                            <input type="hidden" name="unit_id[]" value="<?php echo e($item->unit_id); ?>">
                                        <?php endif; ?>
                                    </td>
                                    <td class="border-bottom-0" align="right">
                                        <input type="hidden"
                                            class="f-14 border-0 w-100 text-right cost_per_item" placeholder="0.00"
                                            value="<?php echo e($item->unit_price); ?>" name="cost_per_item[]">
                                            <span><?php echo e($item->unit_price); ?></span>
                                    </td>
                                    <td class="border-bottom-0">
                                        <div class="select-others height-35 rounded border-0">
                                            <select id="multiselect"
                                                multiple="multiple" class="select-picker type customSequence border-0"
                                                data-size="3" disabled>
                                                <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option data-rate="<?php echo e($tax->rate_percent); ?>" data-tax-text="<?php echo e($tax->tax_name .':'. $tax->rate_percent); ?>%" <?php if(isset($item->taxes) && array_search($tax->id, json_decode($item->taxes)) !== false): ?>
                                                    selected <?php endif; ?>
                                                    value="<?php echo e($tax->id); ?>">
                                                    <?php echo e($tax->tax_name); ?>:<?php echo e($tax->rate_percent); ?>%
                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(isset($item->taxes) && array_search($tax->id, json_decode($item->taxes)) !== false): ?>
                                                    <input type="hidden" name="taxes[<?php echo e($key); ?>][]" value="<?php echo e($tax->id); ?>">
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </td>
                                    <td rowspan="2" align="right" valign="top" class="bg-amt-grey btrr-bbrr">
                                        <span class="amount-html"><?php echo e(number_format((float) $item->amount, 2, '.', '')); ?></span>
                                        <input type="hidden" class="amount" name="amount[]" value="<?php echo e($item->amount); ?>">
                                    </td>
                                </tr>
                                <tr class="d-none d-md-block d-lg-table-row">
                                    <td colspan="<?php echo e($invoiceSetting->hsn_sac_code_show ? '4' : '3'); ?>" class="dash-border-top bblr">
                                        <textarea class="f-14 border-0 w-100 desktop-description" name="item_summary[]" readonly
                                            placeholder="<?php echo app('translator')->get('placeholders.invoices.description'); ?>"><?php echo e($item->item_summary); ?></textarea>
                                    </td>
                                    <td class="border-left-0">
                                        <input type="file"
                                        class="dropify"
                                        name="invoice_item_image[]"
                                        data-allowed-file-extensions="png jpg jpeg bmp"
                                        data-messages-default="test"
                                        data-height="70"
                                        data-id="<?php echo e($item->id); ?>"
                                        id="<?php echo e($item->id); ?>"
                                        data-default-file="<?php echo e($item->invoiceItemImage ? $item->invoiceItemImage->file_url : ''); ?>"
                                        disabled="disabled"
                                        />
                                        <input type="hidden" name="invoice_item_image_url[]" value="<?php echo e($item->invoiceItemImage ? $item->invoiceItemImage->file : ''); ?>">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- DESKTOP DESCRIPTION TABLE END -->
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

<hr class="m-0 border-top-grey">

<!-- TOTAL, DISCOUNT START -->
<div class="d-flex px-lg-4 px-md-4 px-3 pb-3 c-inv-total">
    <table width="100%" class="text-right f-14 text-capitalize">
        <tbody>
            <tr>
                <td width="50%" class="border-0 d-lg-table d-md-table d-none"></td>
                <td width="50%" class="p-0 border-0 c-inv-total-right">
                    <table width="100%">
                        <tbody>
                            <tr>
                                <td colspan="2" class="border-top-0 text-dark-grey">
                                    <?php echo app('translator')->get('modules.invoices.subTotal'); ?></td>
                                <td width="30%" class="border-top-0 sub-total">0.00</td>
                                <input type="hidden" class="sub-total-field" name="sub_total" value="0">
                            </tr>
                            <tr>
                                <td width="30%" class="text-dark-grey"><?php echo app('translator')->get('modules.invoices.discount'); ?>
                                </td>
                                <td width="30%" style="padding: 5px;">
                                    <table width="100%">
                                        <tbody>
                                            <tr>
                                                <td width="50%" class="c-inv-sub-padding">
                                                    <input type="hidden" min="0" name="discount_value"
                                                        class="form-control f-14 border-0 w-100 text-right discount_value"
                                                        placeholder="0" value="<?php echo e($creditNote->discount); ?>">
                                                    <span><?php echo e($creditNote->discount); ?></span>
                                                </td>
                                                <td width="50%" align="left" class="c-inv-sub-padding">
                                                    <div class="select-others select-tax height-35 rounded border-0">
                                                        <input type="hidden" value="<?php echo e($creditNote->discount_type); ?>" name="discount_type"/>
                                                        <select class="form-control select-picker" id="discount_type"
                                                            disabled>
                                                            <option <?php if($creditNote->discount_type == 'percent'): ?> selected <?php endif; ?> value="percent">%</option>
                                                            <option <?php if($creditNote->discount_type == 'fixed'): ?> selected <?php endif; ?> value="fixed">
                                                                <?php echo app('translator')->get('modules.invoices.amount'); ?></option>
                                                        </select>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td>
                                    <span id="discount_amount">
                                        <?php echo e(number_format((float) $creditNote->discount, 2, '.', '')); ?>

                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td><?php echo app('translator')->get('modules.invoices.tax'); ?></td>
                                <td colspan="2" class="p-0 border-0">
                                    <table width="100%" id="invoice-taxes">
                                        <tr>
                                            <td colspan="2"><span class="tax-percent">0.00</span></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td><?php echo app('translator')->get('app.adjustmentAmount'); ?></td>
                                <td colspan="2" class="p-0 border-0">
                                    <table width="100%" id="invoice-taxes">
                                        <tr>
                                            <td colspan="2">
                                                <input type="number"
                                                    min="-<?php echo e($creditNote->amountPaid()); ?>"
                                                    name="adjustment_amount"
                                                    class="form-control f-14 border-0 w-100 text-right" id="adjustment_amount"
                                                    placeholder="0"
                                                    data-min-adjustment-amount="<?php echo e($creditNote->amountPaid()); ?>"
                                                    value="0">
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr class="bg-amt-grey f-16 f-w-500">
                                <td colspan="2"><?php echo app('translator')->get('modules.invoices.total'); ?></td>
                                <td><span class="total">0.00</span></td>
                                <input type="hidden" class="total-field" name="total" value="0">
                                <input type="hidden" id="total-field" value="0">
                                <input type="hidden" name="min_adjustment_amount" value="<?php echo e($creditNote->amountPaid()); ?>">

                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<!-- TOTAL, DISCOUNT END -->

<!-- NOTE AND TERMS AND CONDITIONS START -->
<div class="d-flex flex-wrap px-lg-4 px-md-4 px-3 py-3">
    <div class="col-md-6 col-sm-12 c-inv-note-terms p-0 mb-lg-0 mb-md-0 mb-3">
        <label class="f-14 text-dark-grey mb-12 text-capitalize w-100" for="usr"><?php echo app('translator')->get('modules.invoices.note'); ?></label>
        <textarea class="form-control" name="note" id="note" rows="4"
            placeholder="<?php echo app('translator')->get('placeholders.invoices.note'); ?>"></textarea>
    </div>
    <div class="col-md-6 col-sm-12 p-0 c-inv-note-terms">
        <label class="f-14 text-dark-grey mb-12 text-capitalize w-100"
            for="usr"><?php echo app('translator')->get('modules.invoiceSettings.invoiceTerms'); ?></label>
        <?php echo nl2br($invoiceSetting->invoice_terms); ?>

    </div>
</div>
<!-- NOTE AND TERMS AND CONDITIONS END -->

<!-- CANCEL SAVE SEND START -->
<?php if (isset($component)) { $__componentOriginalb19caa501eea72410c04d1917a586963 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb19caa501eea72410c04d1917a586963 = $attributes; } ?>
<?php $component = App\View\Components\FormActions::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form-actions'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\FormActions::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'c-inv-btns']); ?>

    <div class="d-flex">
        <?php if (isset($component)) { $__componentOriginalcf8d12533ff890e0d6573daf32b7618d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcf8d12533ff890e0d6573daf32b7618d = $attributes; } ?>
<?php $component = App\View\Components\Forms\ButtonPrimary::resolve(['icon' => 'check'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'save-form mr-3']); ?><?php echo app('translator')->get('app.save'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcf8d12533ff890e0d6573daf32b7618d)): ?>
<?php $attributes = $__attributesOriginalcf8d12533ff890e0d6573daf32b7618d; ?>
<?php unset($__attributesOriginalcf8d12533ff890e0d6573daf32b7618d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcf8d12533ff890e0d6573daf32b7618d)): ?>
<?php $component = $__componentOriginalcf8d12533ff890e0d6573daf32b7618d; ?>
<?php unset($__componentOriginalcf8d12533ff890e0d6573daf32b7618d); ?>
<?php endif; ?>

        <?php if (isset($component)) { $__componentOriginalc35c79ed7e812580313ad04118477974 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc35c79ed7e812580313ad04118477974 = $attributes; } ?>
<?php $component = App\View\Components\Forms\ButtonCancel::resolve(['link' => route('creditnotes.index')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb19caa501eea72410c04d1917a586963)): ?>
<?php $attributes = $__attributesOriginalb19caa501eea72410c04d1917a586963; ?>
<?php unset($__attributesOriginalb19caa501eea72410c04d1917a586963); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb19caa501eea72410c04d1917a586963)): ?>
<?php $component = $__componentOriginalb19caa501eea72410c04d1917a586963; ?>
<?php unset($__componentOriginalb19caa501eea72410c04d1917a586963); ?>
<?php endif; ?>
<!-- CANCEL SAVE SEND END -->

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal18ad2e0d264f9740dc73fff715357c28)): ?>
<?php $attributes = $__attributesOriginal18ad2e0d264f9740dc73fff715357c28; ?>
<?php unset($__attributesOriginal18ad2e0d264f9740dc73fff715357c28); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal18ad2e0d264f9740dc73fff715357c28)): ?>
<?php $component = $__componentOriginal18ad2e0d264f9740dc73fff715357c28; ?>
<?php unset($__componentOriginal18ad2e0d264f9740dc73fff715357c28); ?>
<?php endif; ?>
<!-- FORM END -->
</div>
<!-- CREATE INVOICE END -->

<script>
    $(document).ready(function() {

        const hsn_status = <?php echo e($invoiceSetting->hsn_sac_code_show); ?>;

        const dp1 = datepicker('#invoice_date', {
            position: 'bl',
            ...datepickerConfig
        });

        $('.save-form').click(function() {

            if (KTUtil.isMobileDevice()) {
                $('.desktop-description').remove();
            } else {
                $('.mobile-description').remove();
            }

            calculateTotal();
            var discount = $('#discount_amount').html();
            var total = $('.sub-total-field').val();

            if (parseFloat(discount) > parseFloat(total)) {
                Swal.fire({
                    icon: 'error',
                    text: "<?php echo e(__('messages.discountExceed')); ?>",

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
                url: "<?php echo e(route('creditnotes.store')); ?>",
                container: '#saveInvoiceForm',
                type: "POST",
                blockUI: true,
                buttonSelector: ".save-form",
                disableButton: true,
                redirect: true,
                data: $('#saveInvoiceForm').serialize()
            })
        });

        $('body').on('change keyup', '#adjustment_amount', function() {
            let adjustmentAmount = $(this).val();
            let total = $("#total-field").val();
            let grandTotal = parseFloat(total) + parseFloat(adjustmentAmount);
            let minAdjustmentAmount = $('#adjustment_amount').data('min-adjustment-amount');

            if(adjustmentAmount < -minAdjustmentAmount){
                $(this).val(-parseFloat(minAdjustmentAmount));

                total = parseFloat(total) - parseFloat(minAdjustmentAmount);

                $(".total").html(total.toFixed(2));
                $(".total-field").val(total.toFixed(2));

                return false;
            }

            if(adjustmentAmount == '') {
                $(".total").html(total);
                $(".total-field").val(total);
                return false;
            }
            else if(adjustmentAmount < 0) {
                grandTotal = (grandTotal < 0) ? 0 : grandTotal;
            }

            $(".total").html(grandTotal.toFixed(2));
            $(".total-field").val(grandTotal.toFixed(2));
        });

        calculateTotal();

        /* This is used for calculation purpose */
        $('#total-field').val($('.total-field').val());

        init(RIGHT_MODAL);
    });
</script>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/credit-notes/ajax/create.blade.php ENDPATH**/ ?>