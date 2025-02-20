

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

                                <a class="nav-item nav-link f-15 active google" data-toggle="tab"
                                   href="<?php echo e(route('social-auth-settings.index')); ?>" role="tab"
                                   aria-controls="nav-google"
                                   aria-selected="true"><img style="height: 15px;"
                                                             src="<?php echo e(asset('img/google-icon.svg')); ?>"> <?php echo app('translator')->get('app.socialAuthSettings.google'); ?>
                                   <i class="fa fa-circle f-12 ml-1 <?php echo e($credentials->google_status == 'enable' ? 'text-light-green' : 'text-red'); ?>"></i>
                                </a>
                            </li>
                            <li>
                                <a class="nav-item nav-link f-15 facebook" data-toggle="tab"
                                   href="<?php echo e(route('social-auth-settings.index')); ?>?tab=facebook" role="tab"
                                   aria-controls="nav-facebook" aria-selected="false"><img style="height: 15px;"
                                                                                           src="<?php echo e(asset('img/facebook-icon.svg')); ?>"> <?php echo app('translator')->get('app.socialAuthSettings.facebook'); ?>
                                   <i class="fa fa-circle f-12 ml-1 <?php echo e($credentials->facebook_status == 'enable' ? 'text-light-green' : 'text-red'); ?>"></i>
                                </a>
                            </li>
                            <li>
                                <a class="nav-item nav-link f-15 linkedin" data-toggle="tab"
                                   href="<?php echo e(route('social-auth-settings.index')); ?>?tab=linkedin" role="tab"
                                   aria-controls="nav-linkedin" aria-selected="false"><img style="height: 15px;"
                                                                                           src="<?php echo e(asset('img/linkedin-icon.svg')); ?>"> <?php echo app('translator')->get('app.socialAuthSettings.linkedin'); ?>
                                   <i class="fa fa-circle f-12 ml-1 <?php echo e($credentials->linkedin_status == 'enable' ? 'text-light-green' : 'text-red'); ?>"></i>
                                </a>
                            </li>
                            <li>
                                <a class="nav-item nav-link f-15 twitter" data-toggle="tab"
                                   href="<?php echo e(route('social-auth-settings.index')); ?>?tab=twitter" role="tab"
                                   aria-controls="nav-twitter" aria-selected="false"><img style="height: 15px;"
                                                                                          src="<?php echo e(asset('img/twitter-icon.svg')); ?>"> <?php echo app('translator')->get('app.socialAuthSettings.twitter'); ?>
                                   <i class="fa fa-circle f-12 ml-1 <?php echo e($credentials->twitter_status == 'enable' ? 'text-light-green' : 'text-red'); ?>"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
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
<script src="<?php echo e(asset('vendor/jquery/clipboard.min.js')); ?>"></script>

    <script>
        /* manage menu active class */
        $('.nav-item').removeClass('active');
        const activeTab = "<?php echo e($activeTab); ?>";
        $('.' + activeTab).addClass('active');

        $("body").on("click", "#editSettings .nav a", function (event) {
            event.preventDefault();

            $('.nav-item').removeClass('active');
            $(this).addClass('active');

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

        $('body').on('click', '#save_google_data, #save_facebook_data, #save_linkedin_data, #save_twitter_data', function(event) {
            var url = "<?php echo e(route('social-auth-settings.update', $credentials->id)); ?>";
            $.easyAjax({
                url: url,
                type: "POST",
                redirect: true,
                disableButton: true,
                blockUI: true,
                container: '#editSettings',
                data: $('#editSettings').serialize(),
                success: function () {
                    window.location.reload();
                }
            })
        });

        var clipboard = new ClipboardJS('.btn-copy');
        clipboard.on('success', function () {
            Swal.fire({
                icon: 'success',
                text: '<?php echo app('translator')->get("app.webhookUrlCopied"); ?>',
                toast: true,
                position: 'top-end',
                timer: 3000,
                timerProgressBar: true,
                showConfirmButton: false,
                customClass: {
                    confirmButton: 'btn btn-primary',
                },
                showClass: {
                    popup: 'swal2-noanimation',
                    backdrop: 'swal2-noanimation'
                },
            })
        });

    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/social-login-settings/index.blade.php ENDPATH**/ ?>