

<?php $__env->startSection('content'); ?>

    <!-- SETTINGS START -->
    <div class="w-100 d-flex ">

        <?php echo $__env->make('sections.setting-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php if (isset($component)) { $__componentOriginalcb8848b8ae159c08072bf1971fc3ca1f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcb8848b8ae159c08072bf1971fc3ca1f = $attributes; } ?>
<?php $component = App\View\Components\SettingCard::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('setting-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SettingCard::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
             <?php $__env->slot('header', null, []); ?> 
                <div class="s-b-n-header" id="tabs">
                    <nav class="tabs border-bottom-grey">
                        <ul class="nav -primary" id="nav-tab" role="tablist">
                            <li>

                                <a class="nav-item nav-link f-15 active paypal" data-toggle="tab"
                                   href="<?php echo e(route('payment-gateway-settings.index')); ?>" role="tab"
                                   aria-controls="nav-paypal"
                                   aria-selected="true"><img style="height: 15px;"
                                                             src="<?php echo e(asset('img/paypal.png')); ?>"> <?php echo app('translator')->get('app.paypal'); ?> <i
                                        class="fa fa-circle f-12 ml-1 <?php echo e($credentials->paypal_status == 'active' ? 'text-light-green' : 'text-red'); ?>"></i>
                                </a>
                            </li>
                            <li>
                                <a class="nav-item nav-link f-15 stripe" data-toggle="tab"
                                   href="<?php echo e(route('payment-gateway-settings.index')); ?>?tab=stripe" role="tab"
                                   aria-controls="nav-stripe" aria-selected="false"><img style="height: 15px;"
                                                                                         src="<?php echo e(asset('img/stripe.png')); ?>"> <?php echo app('translator')->get('app.stripe'); ?> <i
                                        class="fa fa-circle f-12 ml-1 <?php echo e($credentials->stripe_status == 'active' ? 'text-light-green' : 'text-red'); ?>"></i>
                                </a>
                            </li>
                            <li>
                                <a class="nav-item nav-link f-15 razorpay" data-toggle="tab"
                                   href="<?php echo e(route('payment-gateway-settings.index')); ?>?tab=razorpay" role="tab"
                                   aria-controls="nav-razorpay" aria-selected="false"><img style="height: 15px;"
                                                                                           src="<?php echo e(asset('img/razorpay.png')); ?>"> <?php echo app('translator')->get('app.razorpay'); ?>
                                    <i
                                        class="fa fa-circle f-12 ml-1 <?php echo e($credentials->razorpay_status == 'active' ? 'text-light-green' : 'text-red'); ?>"></i>
                                </a>
                            </li>
                            <li>
                                <a class="nav-item nav-link f-15 paystack" data-toggle="tab"
                                   href="<?php echo e(route('payment-gateway-settings.index')); ?>?tab=paystack" role="tab"
                                   aria-controls="nav-paystack" aria-selected="false"><img style="height: 15px;"
                                                                                           src="<?php echo e(asset('img/paystack.jpg')); ?>"> <?php echo app('translator')->get('app.paystack'); ?>
                                    <i
                                        class="fa fa-circle f-12 ml-1 <?php echo e($credentials->paystack_status == 'active' ? 'text-light-green' : 'text-red'); ?>"></i>
                                </a>
                            </li>
                            <li>
                                <a class="nav-item nav-link f-15 mollie" data-toggle="tab"
                                   href="<?php echo e(route('payment-gateway-settings.index')); ?>?tab=mollie" role="tab"
                                   aria-controls="nav-mollie" aria-selected="false"><img style="height: 20px;"
                                                                                         src="<?php echo e(asset('img/mollie.png')); ?>"> <?php echo app('translator')->get('app.mollie'); ?>
                                    <i
                                        class="fa fa-circle f-12 ml-1 <?php echo e($credentials->mollie_status == 'active' ? 'text-light-green' : 'text-red'); ?>"></i>
                                </a>
                            </li>
                            <li>
                                <a class="nav-item nav-link f-15 payfast" data-toggle="tab"
                                   href="<?php echo e(route('payment-gateway-settings.index')); ?>?tab=payfast" role="tab"
                                   aria-controls="nav-payfast" aria-selected="false"><img style="height: 15px;"
                                                                                          src="<?php echo e(asset('img/payfast-logo.png')); ?>"> <?php echo app('translator')->get('app.payfast'); ?>
                                    <i
                                        class="fa fa-circle f-12 ml-1 <?php echo e($credentials->payfast_status == 'active' ? 'text-light-green' : 'text-red'); ?>"></i>
                                </a>
                            </li>

                            <li>
                                <a class="nav-item nav-link f-15 authorize" data-toggle="tab"
                                   href="<?php echo e(route('payment-gateway-settings.index')); ?>?tab=authorize" role="tab"
                                   aria-controls="nav-authorize" aria-selected="false"><img style="height: 15px;"
                                                                                            src="<?php echo e(asset('img/authorize.png')); ?>"> <?php echo app('translator')->get('app.authorize'); ?>
                                    <i
                                        class="fa fa-circle f-12 ml-1 <?php echo e($credentials->authorize_status == 'active' ? 'text-light-green' : 'text-red'); ?>"></i>
                                </a>
                            </li>

                            <li>
                                <a class="nav-item nav-link f-15 square" data-toggle="tab"
                                   href="<?php echo e(route('payment-gateway-settings.index')); ?>?tab=square" role="tab"
                                   aria-controls="nav-square" aria-selected="false"><img style="height: 15px;"
                                                                                         src="<?php echo e(asset('img/square.svg')); ?>"> <?php echo app('translator')->get('app.square'); ?>
                                    <i
                                        class="fa fa-circle f-12 ml-1 <?php echo e($credentials->square_status == 'active' ? 'text-light-green' : 'text-red'); ?>"></i>
                                </a>
                            </li>
                            <li>
                                <a class="nav-item nav-link f-15 flutterwave" data-toggle="tab"
                                   href="<?php echo e(route('payment-gateway-settings.index')); ?>?tab=flutterwave" role="tab"
                                   aria-controls="nav-flutterwave" aria-selected="false"><img style="height: 15px;"
                                                                                              src="<?php echo e(asset('img/flutterwave.png')); ?>"> <?php echo app('translator')->get('app.flutterwave'); ?>
                                    <i
                                        class="fa fa-circle f-12 ml-1 <?php echo e($credentials->flutterwave_status == 'active' ? 'text-light-green' : 'text-red'); ?>"></i>
                                </a>
                            </li>

                            <li>
                                <a class="nav-item nav-link f-15 offline" data-toggle="tab"
                                   href="<?php echo e(route('payment-gateway-settings.index')); ?>?tab=offline" role="tab"
                                   aria-controls="nav-offline"
                                   aria-selected="false"><?php echo app('translator')->get('modules.offlinePayment.title'); ?></a>
                            </li>
                        </ul>
                    </nav>
                </div>
             <?php $__env->endSlot(); ?>

             <?php $__env->slot('buttons', null, []); ?> 
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <?php if (isset($component)) { $__componentOriginalcf8d12533ff890e0d6573daf32b7618d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcf8d12533ff890e0d6573daf32b7618d = $attributes; } ?>
<?php $component = App\View\Components\Forms\ButtonPrimary::resolve(['icon' => 'plus'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'addMethod','class' => 'addMethod d-none']); ?>
                            <?php echo app('translator')->get('modules.offlinePayment.addMethod'); ?>
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
                    </div>
                </div>
             <?php $__env->endSlot(); ?>

            
            <?php echo $__env->make($view, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcb8848b8ae159c08072bf1971fc3ca1f)): ?>
<?php $attributes = $__attributesOriginalcb8848b8ae159c08072bf1971fc3ca1f; ?>
<?php unset($__attributesOriginalcb8848b8ae159c08072bf1971fc3ca1f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcb8848b8ae159c08072bf1971fc3ca1f)): ?>
<?php $component = $__componentOriginalcb8848b8ae159c08072bf1971fc3ca1f; ?>
<?php unset($__componentOriginalcb8848b8ae159c08072bf1971fc3ca1f); ?>
<?php endif; ?>

    </div>
    <!-- SETTINGS END -->

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        /*******************************************************
         More btn in projects menu Start
         *******************************************************/

        const container = document.querySelector('.tabs');
        const primary = container.querySelector('.-primary');
        const primaryItems = container.querySelectorAll('.-primary > li:not(.-more)');
        container.classList.add('--jsfied'); // insert "more" button and duplicate the list

        primary.insertAdjacentHTML('beforeend', `
    <li class="-more bg-grey">
        <button type="button" class="px-4 h-100 w-100 d-lg-flex d-md-flex align-items-center justify-content-center py-3" aria-haspopup="true" aria-expanded="false">
        <?php echo app('translator')->get('app.more'); ?> <span>&darr;</span>
        </button>
        <ul class="-secondary" id="hide-project-menues">
        ${primary.innerHTML}
        </ul>
    </li>
    `);
        const secondary = container.querySelector('.-secondary');
        const secondaryItems = secondary.querySelectorAll('li');
        const allItems = container.querySelectorAll('li');
        const moreLi = primary.querySelector('.-more');
        const moreBtn = moreLi.querySelector('button');
        moreBtn.addEventListener('click', e => {
            e.preventDefault();
            container.classList.toggle('--show-secondary');
            moreBtn.setAttribute('aria-expanded', container.classList.contains('--show-secondary'));
        }); // adapt tabs

        const doAdapt = () => {
            // reveal all items for the calculation
            allItems.forEach(item => {
                item.classList.remove('--hidden');
            }); // hide items that won't fit in the Primary

            let stopWidth = 100; // need to change according tab counts
            let hiddenItems = [];
            const primaryWidth = primary.offsetWidth;
            primaryItems.forEach((item, i) => {
                if (primaryWidth >= stopWidth + item.offsetWidth) {
                    stopWidth += item.offsetWidth;
                } else {
                    item.classList.add('--hidden');
                    hiddenItems.push(i);
                }
            }); // toggle the visibility of More button and items in Secondary

            if (!hiddenItems.length) {
                moreLi.classList.add('--hidden');
                container.classList.remove('--show-secondary');
                moreBtn.setAttribute('aria-expanded', false);
            } else {
                secondaryItems.forEach((item, i) => {
                    if (!hiddenItems.includes(i)) {
                        item.classList.add('--hidden');
                    }
                });
            }
        };

        doAdapt(); // adapt immediately on load

        window.addEventListener('resize', doAdapt); // adapt on window resize
        // hide Secondary on the outside click

        document.addEventListener('click', e => {
            let el = e.target;

            while (el) {
                if (el === secondary || el === moreBtn) {
                    return;
                }

                el = el.parentNode;
            }

            container.classList.remove('--show-secondary');
            moreBtn.setAttribute('aria-expanded', false);
        });
        /*******************************************************
         More btn in projects menu End
         *******************************************************/
    </script>

    <script>
        /* manage menu active class */
        $('.nav-item').removeClass('active');
        const activeTab = "<?php echo e($activeTab); ?>";
        $('.' + activeTab).addClass('active');

        (activeTab == 'offline') ? $('.addMethod').removeClass('d-none') : $('.addMethod').addClass('d-none');

        $("body").on("click", "#editSettings .nav a", function (event) {
            event.preventDefault();

            $('.nav-item').removeClass('active');
            $(this).addClass('active');

            ($(this).hasClass('offline')) ? $('.addMethod').removeClass('d-none') : $('.addMethod').addClass('d-none');

            const requestUrl = this.href;

            $.easyAjax({
                url: requestUrl,
                blockUI: true,
                container: "#nav-tabContent",
                historyPush: true,
                success: function (response) {
                    if (response.status === "success") {
                        $('#nav-tabContent').html(response.html);
                        init('.settings-box');
                        init('#F');
                    }
                }
            });
        });

        $("body").on("change", "#paypal_status", function (event) {
            $('#paypal_details').toggleClass('d-none');
        });

        $("body").on("change", "#paypal_mode", function () {
            $('#sandbox_paypal_details').toggleClass('d-none');
            $('#live_paypal_details').toggleClass('d-none');
        });

        $("body").on("change", "#stripe_mode", function () {
            $('#test_stripe_details').toggleClass('d-none');
            $('#live_stripe_details').toggleClass('d-none');
        });

        $("body").on("change", "#razorpay_mode", function () {
            $('#test_razorpay_details').toggleClass('d-none');
            $('#live_razorpay_details').toggleClass('d-none');
        });

        $("body").on("change", "#payfast_mode", function () {
            $('#test_payfast_details').toggleClass('d-none');
            $('#live_payfast_details').toggleClass('d-none');
        });

        $("body").on("change", "#stripe_status", function (event) {
            $('#stripe_details').toggleClass('d-none');
        });

        $("body").on("change", "#paystack_status", function (event) {
            $('#paystack_details').toggleClass('d-none');
        });

        $("body").on("change", "#flutterwave_status", function (event) {
            $('#flutterwave_details').toggleClass('d-none');
        });

        $("body").on("change", "#mollie_status", function (event) {
            $('#mollie_details').toggleClass('d-none');
        });

        $("body").on("change", "#payfast_status", function (event) {
            $('#payfast_details').toggleClass('d-none');
        });

        $("body").on("change", "#authorize_status", function (event) {
            $('#authorize_details').toggleClass('d-none');
        });

        $("body").on("change", "#square_status", function (event) {
            $('#square_details').toggleClass('d-none');
        });

        $("body").on("change", "#razorpay_status", function (event) {
            $('#razorpay_details').toggleClass('d-none');
        });

        // Save paypal, stripe and razorpay credentials
        $("body").on("click", "#save_paypal_data, #save_stripe_data, #save_razorpay_data, #save_paystack_data, #save_flutterwave_data, #save_mollie_data, #save_payfast_data, #save_authorize_data, #save_square_data", function (event) {
            $.easyAjax({
                url: "<?php echo e($updateRoute); ?>",
                container: '#editSettings',
                type: "POST",
                redirect: true,
                disableButton: true,
                blockUI: true,
                data: $('#editSettings').serialize(),
                success: function () {
                    window.location.reload();
                }
            })
        });

        // Edit new offline payment method
        $('body').on('click', '.edit-type', function () {
            const typeId = $(this).data('type-id');
            let url = "<?php echo e(route('offline-payment-setting.edit', ':id')); ?>";
            url = url.replace(':id', typeId);
            $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
            $.ajaxModal(MODAL_LG, url);
        })

        // Add new offline payment method
        $('body').on('click', '.addMethod', function () {
            const url = "<?php echo e(route('offline-payment-setting.create')); ?>";
            $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
            $.ajaxModal(MODAL_LG, url);

        });

        // Delete offline payment method
        $('body').on('click', '.delete-type', function () {
            const id = $(this).data('type-id');
            Swal.fire({
                title: "<?php echo app('translator')->get('messages.sweetAlertTitle'); ?>",
                text: "<?php echo app('translator')->get('messages.removeMethodText'); ?>",
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

                    let url = "<?php echo e(route('offline-payment-setting.destroy', ':id')); ?>";
                    url = url.replace(':id', id);

                    const token = "<?php echo e(csrf_token()); ?>";

                    $.easyAjax({
                        type: 'POST',
                        url: url,
                        blockUI: true,
                        data: {
                            '_token': token,
                            '_method': 'DELETE'
                        },
                        success: function (response) {
                            if (response.status === "success") {
                                $('.row' + id).fadeOut();
                            }
                        }
                    });
                }
            });
        });
    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\payment-gateway-settings\index.blade.php ENDPATH**/ ?>