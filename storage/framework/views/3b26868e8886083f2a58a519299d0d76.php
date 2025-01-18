

<?php $__env->startPush('datatable-styles'); ?>
    <?php echo $__env->make('sections.datatable_css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopPush(); ?>


<?php $__env->startSection('content'); ?>

    <!-- SETTINGS START -->
    <div class="w-100 d-flex ">

        <?php if (isset($component)) { $__componentOriginalde9d36b1eccca15eec00fdb693fa4d2d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalde9d36b1eccca15eec00fdb693fa4d2d = $attributes; } ?>
<?php $component = App\View\Components\SettingSidebar::resolve(['activeMenu' => $activeSettingMenu] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('setting-sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SettingSidebar::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalde9d36b1eccca15eec00fdb693fa4d2d)): ?>
<?php $attributes = $__attributesOriginalde9d36b1eccca15eec00fdb693fa4d2d; ?>
<?php unset($__attributesOriginalde9d36b1eccca15eec00fdb693fa4d2d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalde9d36b1eccca15eec00fdb693fa4d2d)): ?>
<?php $component = $__componentOriginalde9d36b1eccca15eec00fdb693fa4d2d; ?>
<?php unset($__componentOriginalde9d36b1eccca15eec00fdb693fa4d2d); ?>
<?php endif; ?>

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
                    <nav class="gdpr-tabs tabs border-bottom-grey ">
                        <ul class="nav -primary" id="nav-tab" role="tablist">
                            <li>
                                <a class="nav-item nav-link f-15 gdpr-ajax-tab active general"
                                    href="<?php echo e(route('gdpr-settings.index')); ?>" role="tab" aria-controls="nav-general"
                                    aria-selected="true"><?php echo app('translator')->get('app.menu.general'); ?>
                                </a>
                            </li>

                            <li>
                                <a class="nav-item nav-link f-15 gdpr-ajax-tab right-to-data-portability"
                                    href="<?php echo e(route('gdpr-settings.index')); ?>?tab=right-to-data-portability" role="tab"
                                    aria-controls="nav-rightToDataPortability"
                                    aria-selected="true"><?php echo app('translator')->get('app.menu.rightToDataPortability'); ?>
                                </a>
                            </li>

                            <li>
                                <a class="nav-item nav-link f-15 gdpr-ajax-tab right-to-informed"
                                    href="<?php echo e(route('gdpr-settings.index')); ?>?tab=right-to-informed" role="tab"
                                    aria-controls="nav-rightToBeInformed"
                                    aria-selected="true"><?php echo app('translator')->get('app.menu.rightToBeInformed'); ?>
                                </a>
                            </li>

                            <li>
                                <a class="nav-item nav-link f-15 gdpr-ajax-tab right-to-erasure"
                                    href="<?php echo e(route('gdpr-settings.index')); ?>?tab=right-to-erasure" role="tab"
                                    aria-controls="nav-rightToErasure" aria-selected="true"><?php echo app('translator')->get('app.menu.rightToErasure'); ?>
                                </a>
                            </li>

                            <li>
                                <a class="nav-item nav-link f-15 gdpr-ajax-tab right-to-access"
                                    href="<?php echo e(route('gdpr-settings.index')); ?>?tab=right-to-access" role="tab"
                                    aria-controls="nav-rightOfRectification"
                                    aria-selected="true"><?php echo app('translator')->get('app.menu.rightOfRectification'); ?>
                                </a>
                            </li>

                            <li>
                                <a class="nav-item nav-link f-15 removal-requests "
                                    href="<?php echo e(route('gdpr-settings.index')); ?>?tab=removal-requests" role="tab"
                                    aria-controls="nav-removalRequests"
                                    aria-selected="true"><?php echo app('translator')->get('app.menu.removalRequest'); ?>
                                </a>
                            </li>

                            <li>
                                <a class="nav-item nav-link f-15 removal-requests-lead"
                                    href="<?php echo e(route('gdpr-settings.index')); ?>?tab=removal-requests-lead" role="tab"
                                    aria-controls="nav-removalRequests"
                                    aria-selected="true"><?php echo app('translator')->get('app.menu.removalRequestLead'); ?>
                                </a>
                            </li>

                            <li>
                                <a class="nav-item nav-link f-15 consent-settings"
                                    href="<?php echo e(route('gdpr-settings.index')); ?>?tab=consent-settings" role="tab"
                                    aria-controls="nav-consent" aria-selected="true"><?php echo app('translator')->get('app.menu.consentSettings'); ?>
                                </a>
                            </li>

                            <li>
                                <a class="nav-item nav-link f-15 consent-lists"
                                    href="<?php echo e(route('gdpr-settings.index')); ?>?tab=consent-lists" role="tab"
                                    aria-controls="nav-consent" aria-selected="true"><?php echo app('translator')->get('app.menu.consentLists'); ?>
                                </a>
                            </li>

                        </ul>
                    </nav>
                    <div class="d-block d-lg-none d-md-none">
                        
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
        /* manage menu active class */
        $('.nav-item').removeClass('active');
        const activeTab = "<?php echo e($activeTab); ?>";
        $('.' + activeTab).addClass('active');

        showBtn(activeTab);

        function showBtn(activeTab) {
            $('.actionBtn').addClass('d-none');
            $('.' + activeTab + '-btn').removeClass('d-none');
        }

        $("body").on("click", ".gdpr-ajax-tab", function(event) {
            event.preventDefault();

            $('.nav-item').removeClass('active');
            $(this).addClass('active');


            const requestUrl = this.href;

            $.easyAjax({
                url: requestUrl,
                blockUI: true,
                container: ".content-wrapper",
                historyPush: true,
                success: function(response) {
                    if (response.status == "success") {
                        $('#nav-tabContent').html(response.html);
                        init('#nav-tabContent');
                    }
                }
            });
        });
    </script>

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
            <button type="button" class="px-4 h-100 w-100 d-lg-flex d-md-flex align-items-center justify-content-center" aria-haspopup="true" aria-expanded="false">
            More <span>&darr;</span>
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

            let stopWidth = moreBtn.offsetWidth;
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
        $(body).on('click', '#save-general-data', function() {
            $.easyAjax({
                url: "<?php echo e(route('gdpr_settings.update_general')); ?>",
                container: '#editSettings',
                type: "POST",
                disableButton: true,
                buttonSelector: "#save-general-data",
                data: $('#editSettings').serialize(),
            })
        })
    </script>


    <script>
        $(body).on('click', '#save-right-to-data-portability', function() {
            $.easyAjax({
                url: "<?php echo e(route('gdpr_settings.update_general')); ?>",
                container: '#editSettings',
                type: "POST",
                disableButton: true,
                buttonSelector: "#save-right-to-data-portability",
                data: $('#editSettings').serialize(),
            })
        })
    </script>



    <script>
        $(body).on('click', '#save-right-to-informed-data', function() {
            $.easyAjax({
                url: "<?php echo e(route('gdpr_settings.update_general')); ?>",
                container: '#editSettings',
                type: "POST",
                disableButton: true,
                buttonSelector: "#save-right-to-informed-data",
                data: $('#editSettings').serialize(),
            })
        })
    </script>


    <script>
        $(body).on('click', '#save-right-to-erasure-data', function() {
            $.easyAjax({
                url: "<?php echo e(route('gdpr_settings.update_general')); ?>",
                container: '#editSettings',
                type: "POST",
                disableButton: true,
                buttonSelector: "#save-right-to-erasure-data",
                data: $('#editSettings').serialize(),
            })
        })
    </script>


    <script>
        $(body).on('click', '#save-right-to-access-data', function() {
            $.easyAjax({
                url: "<?php echo e(route('gdpr_settings.update_general')); ?>",
                container: '#editSettings',
                type: "POST",
                disableButton: true,
                buttonSelector: "#save-right-to-access-data",
                data: $('#editSettings').serialize(),
            })
        })
    </script>


<script>
    $(body).on('click', '#save-consent-data', function() {
        $.easyAjax({
            url: "<?php echo e(route('gdpr_settings.update_general')); ?>",
            container: '#editSettings',
            type: "POST",
            disableButton: true,
            buttonSelector: "#save-consent-data",
            data: $('#editSettings').serialize(),
        })
    })
</script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\gdpr-settings\index.blade.php ENDPATH**/ ?>