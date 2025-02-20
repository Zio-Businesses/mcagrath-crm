<style>
    .customSequence .btn {
        border: none;
    }

    .customSequence .filter-option {
        font-size: 11px;
    }

    .desktop-description {
        resize: none;
    }

    .customSequence .dropdown-toggle::after {
        visibility: hidden;
    }

</style>

<!-- CREATE INVOICE START -->
<div class="bg-white rounded b-shadow-4 create-inv">
    <!-- HEADING START -->
    <div class="d-block d-lg-flex d-md-flex justify-content-between action-bar">
        <div class="px-lg-4 px-md-4 px-3 py-3">
            <h4 class="mb-0 f-21 font-weight-normal text-capitalize"><i class="bi bi-cart3"></i> <?php echo app('translator')->get('app.cart'); ?></h4>
        </div>

        <div class="px-lg-4 px-md-4 px-3 py-3 cart_empty">
            <?php if (isset($component)) { $__componentOriginaldbb84df4c3a5cbdd95fb35d18ba6410f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldbb84df4c3a5cbdd95fb35d18ba6410f = $attributes; } ?>
<?php $component = App\View\Components\Forms\LinkPrimary::resolve(['link' => route('products.empty_cart'),'icon' => 'trash'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.link-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\LinkPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'empty-cart']); ?>
                <?php echo app('translator')->get('app.emptyCart'); ?>
              <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldbb84df4c3a5cbdd95fb35d18ba6410f)): ?>
<?php $attributes = $__attributesOriginaldbb84df4c3a5cbdd95fb35d18ba6410f; ?>
<?php unset($__attributesOriginaldbb84df4c3a5cbdd95fb35d18ba6410f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldbb84df4c3a5cbdd95fb35d18ba6410f)): ?>
<?php $component = $__componentOriginaldbb84df4c3a5cbdd95fb35d18ba6410f; ?>
<?php unset($__componentOriginaldbb84df4c3a5cbdd95fb35d18ba6410f); ?>
<?php endif; ?>


        </div>
        <input type ="hidden" name="user_id" class="userId" value=<?php echo e(user()->id); ?>>
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
        <?php if(count($products) == 0): ?>
            <div class="row px-lg-4 px-md-4 px-3 py-5">
                <div class="col-sm-12">
                    <?php if (isset($component)) { $__componentOriginal5194778a3a7b899dcee5619d0610f5cf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5194778a3a7b899dcee5619d0610f5cf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.alert','data' => ['type' => 'danger']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'danger']); ?><?php echo app('translator')->get('messages.addItem'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5194778a3a7b899dcee5619d0610f5cf)): ?>
<?php $attributes = $__attributesOriginal5194778a3a7b899dcee5619d0610f5cf; ?>
<?php unset($__attributesOriginal5194778a3a7b899dcee5619d0610f5cf); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5194778a3a7b899dcee5619d0610f5cf)): ?>
<?php $component = $__componentOriginal5194778a3a7b899dcee5619d0610f5cf; ?>
<?php unset($__componentOriginal5194778a3a7b899dcee5619d0610f5cf); ?>
<?php endif; ?>
                </div>
            </div>

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
<?php $component->withAttributes(['class' => 'c-inv-btns d-block d-lg-flex d-md-flex']); ?>
                <div class="d-flex mb-3 mb-lg-0 mb-md-0">

                    <?php if (isset($component)) { $__componentOriginalc35c79ed7e812580313ad04118477974 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc35c79ed7e812580313ad04118477974 = $attributes; } ?>
<?php $component = App\View\Components\Forms\ButtonCancel::resolve(['link' => route('products.index')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-cancel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonCancel::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'border-0 mr-3']); ?><?php echo app('translator')->get('app.viewProducts'); ?>
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
        <?php else: ?>


            <!-- INVOICE NUMBER, DATE, DUE DATE, FREQUENCY START -->
            <div class="row px-lg-4 px-md-4 px-3 py-5">
                <!-- INVOICE NUMBER START -->
                <div class="col-md-3">
                    <span class="f-21 f-w-500 text-dark" id="basic-addon1">
                        <?php echo app('translator')->get('app.order'); ?>#<?php echo e(is_null($lastOrder) ? 1 : $lastOrder); ?>

                    </span>
                    <input type ="hidden" name="order_number" value=<?php echo e(is_null($lastOrder) ? 1 : $lastOrder); ?>>
                </div>
                <!-- INVOICE NUMBER END -->

            </div>
            <!-- INVOICE NUMBER, DATE, DUE DATE, FREQUENCY END -->


            <!-- CLIENT DETAILS START -->
            <?php if (isset($component)) { $__componentOriginal005edb83c42c88a7ec0f9a9df790def6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal005edb83c42c88a7ec0f9a9df790def6 = $attributes; } ?>
<?php $component = App\View\Components\Cards\User::resolve(['image' => user()->image_url] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                            <?php echo e(user()->name); ?>

                        </h4>
                    </div>
                </div>
                <p class="f-13 font-weight-normal text-dark-grey mb-0">
                    <?php echo e(user()->clientDetails->company_name); ?>

                </p>
                <p class="card-text f-12 text-lightest"><?php echo app('translator')->get('app.lastLogin'); ?>

                    <?php if(!is_null(user()->last_login)): ?>
                        <?php echo e(user()->last_login->timezone(company()->timezone)->translatedFormat(company()->date_format . ' ' . company()->time_format)); ?>

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
            <!-- CLIENT DETAILS END -->

            <hr class="m-0 border-top-grey">


            <div id="sortable">
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <!-- DESKTOP DESCRIPTION TABLE START -->
                    <div class="d-flex px-4 py-3 c-inv-desc item-row">

                        <div class="c-inv-desc-table w-100 d-lg-flex d-md-flex d-block">
                            <table width="100%">
                                <tbody>
                                    <tr class="text-dark-grey font-weight-bold f-14">
                                        <td width="<?php echo e($invoiceSetting->hsn_sac_code_show ? '40%' : '50%'); ?>"
                                            class="border-0 inv-desc-mbl btlr"><?php echo app('translator')->get('app.description'); ?></td>
                                        <?php if($invoiceSetting->hsn_sac_code_show): ?>
                                            <td width="10%" class="border-0" align="right"><?php echo app('translator')->get("app.hsnSac"); ?>
                                            </td>
                                        <?php endif; ?>
                                        <td width="10%" class="border-0" align="right">
                                            <?php echo app('translator')->get('modules.invoices.qty'); ?>
                                        </td>
                                        <td width="10%" class="border-0" align="right">
                                            <?php echo app('translator')->get("modules.invoices.unitPrice"); ?></td>
                                        <td width="13%" class="border-0" align="right">
                                            <?php echo app('translator')->get('modules.invoices.tax'); ?>
                                        </td>
                                        <td width="17%" class="border-0 bblr-mbl" align="right">
                                            <?php echo app('translator')->get('modules.invoices.amount'); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="border-bottom-0 btrr-mbl btlr">
                                            <input hidden name="item_ids[]" class= "product_id" value="<?php echo e($item->product_id); ?>">
                                            <input hidden name ="product_unit_id" value="<?php echo e($item->product->unit_id); ?>">
                                            <input type="text" class="f-14 border-0 w-100 item_name bg-additional-grey" readonly
                                                name="item_name[]" placeholder="<?php echo app('translator')->get('modules.expenses.itemName'); ?>"
                                                value="<?php echo e($item->item_name); ?>">
                                        </td>
                                        <?php if($invoiceSetting->hsn_sac_code_show): ?>
                                            <td class="border-bottom-0">
                                                <span><?php echo e($item->hsn_sac_code); ?></span>
                                                <input type="hidden"
                                                    class="form-control f-14 border-0 w-100 text-right hsn_sac_code"
                                                    value="<?php echo e($item->hsn_sac_code); ?>" name="hsn_sac_code[]">
                                            </td>
                                        <?php endif; ?>
                                        <td class="border-bottom-0 d-block d-lg-none d-md-none">
                                            <input type="text" readonly class="f-14 border-0 w-100 mobile-description bg-additional-grey"
                                                placeholder="<?php echo app('translator')->get('placeholders.invoices.description'); ?>"
                                                name="item_summary[]" value="<?php echo e(strip_tags($item->item_summary)); ?>">
                                        </td>

                                        <td class="border-bottom-0">
                                            <input type="number" min="1" class="f-14 border-0 w-100 text-right quantity mt-3"
                                                value="<?php echo e($item->quantity); ?>" id="quantity" name="quantity[]">
                                            <span class="text-dark-grey float-right border-0 f-12"><?php echo e($item->unit->unit_type); ?></span>
                                            <input type="hidden" name="product_id[]" value="<?php echo e($item->product_id); ?>">
                                            <input type="hidden" name="unit_id[]" value="<?php echo e($item->unit_id); ?>">
                                        </td>
                                        <td class="border-bottom-0">
                                            <input type="number" min="1"
                                                class="f-14 border-0 w-100 text-right cost_per_item bg-additional-grey" placeholder="0.00"
                                                value="<?php echo e($item->unit_price); ?>" name="cost_per_item[]" readonly>
                                        </td>
                                        <td class="border-bottom-0">
                                            <div class="select-others height-35 rounded border-0">
                                                <select id="multiselect" disabled name="taxes[<?php echo e($key); ?>][]"
                                                    multiple="multiple"
                                                    class="select-picker type customSequence border-0 bg-additional-grey tax" data-size="3">
                                                    <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option data-rate="<?php echo e($tax->rate_percent); ?>"
                                                                <?php if(isset($item->product->taxes) && array_search($tax->id, json_decode($item->product->taxes)) !== false): ?> selected <?php endif; ?> value="<?php echo e($tax->id); ?>">
                                                                <?php echo e($tax->tax_name); ?>:
                                                                <?php echo e($tax->rate_percent); ?>%</option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </td>
                                        <td rowspan="2" align="right" valign="top" class="bg-amt-grey btrr-bbrr">
                                            <span
                                                class="amount-html"><?php echo e(number_format((float) ($item->amount), 2, '.', '')); ?></span>
                                            <input type="hidden" class="amount" name="amount[]"
                                                value="<?php echo e(number_format((float) ($item->amount), 2, '.', '')); ?>">
                                        </td>
                                    </tr>
                                    <tr class="d-none d-md-block d-lg-table-row">
                                        <td colspan="<?php echo e($invoiceSetting->hsn_sac_code_show ? '4' : '3'); ?>"
                                            class="dash-border-top bblr">
                                            <textarea type="text" readonly
                                                class="f-14 border-0 w-100 desktop-description" name="item_summary[]"
                                                placeholder="<?php echo app('translator')->get('placeholders.invoices.description'); ?>"><?php echo e(strip_tags($item->description)); ?></textarea>
                                        </td>
                                        <td class="border-left-0">
                                            <input type="file" class="dropify" disabled name="invoice_item_image[]" data-allowed-file-extensions="png jpg jpeg bmp" data-messages-default="test" data-height="70" data-default-file="<?php echo e($item->product->image_url); ?>" data-show-remove="false" />
                                            <input type="hidden" name="invoice_item_image_url[]" value="<?php echo e($item->product->image_url); ?>">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <a href="javascript:;"
                                class="d-flex align-items-center justify-content-center ml-3 remove-item"
                                data-item-id="<?php echo e($item->id); ?>"><i
                                    class="fa fa-times-circle f-20 text-lightest"></i></a>
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
                            <td width="50%" class="p-0 border-0">
                                <table width="100%">
                                    <tbody>
                                        <tr>
                                            <td colspan="2" class="border-top-0 text-dark-grey">
                                                <?php echo app('translator')->get('modules.invoices.subTotal'); ?></td>
                                            <td width="30%" class="border-top-0 sub-total">0.00</td>
                                            <input type="hidden" class="sub-total-field" name="sub_total" value="0">
                                            <input type="hidden" id="discount_type" name="discount_type" value="fixed">
                                            <input type="hidden" class="discount_value" name="discount_value" value="0">
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
                                        <tr class="bg-amt-grey f-16 f-w-500">
                                            <td colspan="2"><?php echo app('translator')->get('modules.invoices.total'); ?></td>
                                            <td><span class="total">0.00</span></td>
                                            <input type="hidden" class="total-field" name="total" value="0">
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
                    <label class="f-14 text-dark-grey mb-12 text-capitalize w-100"
                        for="usr"><?php echo app('translator')->get('app.clientNote'); ?></label>
                    <textarea class="form-control" name="note" id="note" rows="4"></textarea>
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
<?php $component->withAttributes(['class' => 'c-inv-btns d-block d-lg-flex d-md-flex']); ?>
                <div class="d-flex mb-3 mb-lg-0 mb-md-0">

                    <?php if (isset($component)) { $__componentOriginalcf8d12533ff890e0d6573daf32b7618d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcf8d12533ff890e0d6573daf32b7618d = $attributes; } ?>
<?php $component = App\View\Components\Forms\ButtonPrimary::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'save-form mr-3','link' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('invoices.index'))]); ?>
                        <?php echo app('translator')->get('modules.invoices.placeOrder'); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcf8d12533ff890e0d6573daf32b7618d)): ?>
<?php $attributes = $__attributesOriginalcf8d12533ff890e0d6573daf32b7618d; ?>
<?php unset($__attributesOriginalcf8d12533ff890e0d6573daf32b7618d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcf8d12533ff890e0d6573daf32b7618d)): ?>
<?php $component = $__componentOriginalcf8d12533ff890e0d6573daf32b7618d; ?>
<?php unset($__componentOriginalcf8d12533ff890e0d6573daf32b7618d); ?>
<?php endif; ?>

                    <?php if (isset($component)) { $__componentOriginal29acd9b76240152ae380821b082bd629 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal29acd9b76240152ae380821b082bd629 = $attributes; } ?>
<?php $component = App\View\Components\Forms\LinkSecondary::resolve(['link' => route('products.index')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.link-secondary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\LinkSecondary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-3']); ?>
                        <?php echo app('translator')->get('app.viewProducts'); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal29acd9b76240152ae380821b082bd629)): ?>
<?php $attributes = $__attributesOriginal29acd9b76240152ae380821b082bd629; ?>
<?php unset($__attributesOriginal29acd9b76240152ae380821b082bd629); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal29acd9b76240152ae380821b082bd629)): ?>
<?php $component = $__componentOriginal29acd9b76240152ae380821b082bd629; ?>
<?php unset($__componentOriginal29acd9b76240152ae380821b082bd629); ?>
<?php endif; ?>

                    <?php if (isset($component)) { $__componentOriginalc35c79ed7e812580313ad04118477974 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc35c79ed7e812580313ad04118477974 = $attributes; } ?>
<?php $component = App\View\Components\Forms\ButtonCancel::resolve(['link' => route('products.index')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-cancel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonCancel::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'border-0 mr-3']); ?><?php echo app('translator')->get('app.cancel'); ?>
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
        <?php endif; ?>


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

        $('body').on('click', '#show-shipping-field', function() {
            $('#add-shipping-field, #client_shipping_address').toggleClass('d-none');
        });

        $('#add-products').on('changed.bs.select', function(e, clickedIndex, isSelected, previousValue) {
            e.stopImmediatePropagation()
            var id = $(this).val();
            if (previousValue != id && id != '') {
                addProduct(id);
            }
        });

        $('#saveInvoiceForm').on('click', '.remove-item', function() {
            var id = $(this).data('item-id');
            var url = "<?php echo e(route('products.remove_cart_item', ':id')); ?>";
            url = url.replace(':id', id);
            var $this = $(this);

            $.easyAjax({
                url: url,
                container: '#saveInvoiceForm',
                type: "POST",
                blockUI: true,
                data: {
                    _token: "<?php echo e(csrf_token()); ?>"
                },
                success: function(response) {
                    $this.closest('.item-row').fadeOut(300, function() {
                        $this.remove();
                        $('select.customSequence').each(function(index) {
                            $this.attr('name', 'taxes[' + index + '][]');
                            $this.attr('id', 'multiselect' + index + '');
                        });
                        calculateTotal();
                    });
                }
            });
        });


        $('.save-form').click(function() {
            $('.type').prop('disabled', false);

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
                url: "<?php echo e(route('orders.store')); ?>",
                container: '#saveInvoiceForm',
                type: "POST",
                blockUI: true,
                redirect: true,
                disableButton: true,
                buttonSelector: ".save-form",
                data: $('#saveInvoiceForm').serialize() + "&type=send"
            })

        });

        $('#saveInvoiceForm').on('click', '.remove-item', function() {
            $(this).closest('.item-row').fadeOut(100, function() {
                $(this).remove();
                $('select.customSequence').each(function(index) {
                    $(this).attr('name', 'taxes[' + index + '][]');
                    $(this).attr('id', 'multiselect' + index + '');
                });
                calculateTotal();
            });
        });

        $('#saveInvoiceForm').on('keyup', '.quantity,.cost_per_item,.item_name, .discount_value', function() {
            var quantity = $(this).closest('.item-row').find('.quantity').val();
            var perItemCost = $(this).closest('.item-row').find('.cost_per_item').val();
            var amount = (quantity * perItemCost);

            $(this).closest('.item-row').find('.amount').val(decimalupto2(amount));
            $(this).closest('.item-row').find('.amount-html').html(decimalupto2(amount));

            var productID = $(this).closest('.item-row').find('.product_id').val();

            $.easyAjax({
                url: "<?php echo e(route('products.add_cart_item')); ?>",
                container: '#saveInvoiceForm',
                type: "POST",
                blockUI: true,
                redirect: true,
                buttonSelector: ".save-form",
                data: {
                    _token: '<?php echo e(csrf_token()); ?>',
                    productID: productID,
                    quantity: quantity,
                    cartType: "1",
                },
            })

            calculateTotal();
        });

        $('#saveInvoiceForm').on('change', '.type, #discount_type','.quantity', function() {
            var quantity = $(this).closest('.item-row').find('.quantity').val();
            var perItemCost = $(this).closest('.item-row').find('.cost_per_item').val();
            var amount = (quantity * perItemCost);

            $(this).closest('.item-row').find('.amount').val(decimalupto2(amount));
            $(this).closest('.item-row').find('.amount-html').html(decimalupto2(amount));

            calculateTotal();
        });

        $('#saveInvoiceForm').on('input', '.quantity', function() {
            var quantity = $(this).closest('.item-row').find('.quantity').val();
            var perItemCost = $(this).closest('.item-row').find('.cost_per_item').val();
            var amount = (quantity * perItemCost);

            $(this).closest('.item-row').find('.amount').val(decimalupto2(amount));
            $(this).closest('.item-row').find('.amount-html').html(decimalupto2(amount));

            calculateTotal();
        });

        $('body').on('click', '.empty-cart', function() {
            let id = $('.userId').val();
            var url = "<?php echo e(route('products.remove_cart_item', ':id')); ?>";
            url = url.replace(':id', id);
            $.easyAjax({
                url: url,
                container: '#saveInvoiceForm',
                type: "POST",
                blockUI: true,
                data: {
                    _token: "<?php echo e(csrf_token()); ?>",
                    type: "all_data",
                },
                success: function(response) {
                   if(response.productItems == 0){
                        $('.cart_empty').hide();
                    }

                }
            });
        });

        calculateTotal();

        init(RIGHT_MODAL);
    });
</script>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/products/ajax/cart.blade.php ENDPATH**/ ?>