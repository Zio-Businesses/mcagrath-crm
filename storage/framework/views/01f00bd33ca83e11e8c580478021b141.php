<?php if (isset($component)) { $__componentOriginald278722911781386ebf0ce0184b0f0fb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald278722911781386ebf0ce0184b0f0fb = $attributes; } ?>
<?php $component = App\View\Components\Auth::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('auth'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Auth::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <?php if ($__env->exists('sections.2fa-css')) echo $__env->make('sections.2fa-css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <form id="two-factor-challenge-form"
        action="<?php echo e(Session::get('login.authenticate_via') == 'email' ? route('check_code') : route('two-factor.login')); ?>"
        class="ajax-form" method="POST">
        <?php echo csrf_field(); ?>
        <h3 class="text-capitalize mb-5 f-w-500">
            <i class="fa fa-lock mr-3"></i><?php echo app('translator')->get('app.twoFactorVerification'); ?>
        </h3>

        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <div class="form-group text-center code">
            <label id="2fa-code-label" for="code"><?php echo app('translator')->get('app.twoFactorCode'); ?></label>

            <?php if ($__env->exists('sections.2fa-input-field')) echo $__env->make('sections.2fa-input-field', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <input type="hidden" value="<?php echo e(Session::get('login.id')); ?>" name="user_id">
        </div>
        <div class="form-group text-left recovery_code d-none">
            <label for="code"><?php echo app('translator')->get('app.twoFactorRecoveryCode'); ?></label>
            <input type="text" name="recovery_code" class="form-control height-50 f-15 light_text"
                   id="recovery_code">
        </div>

        <div
            class="position-relative mb-4 text-dark-grey resend-code-container <?php if(Session::get('login.authenticate_via') != 'email'): ?> d-none <?php endif; ?>">
            <?php echo app('translator')->get('messages.resendCode'); ?> <a href="javascript:;" id="resend-code"
                                            class="border-0 d-inline f-14 font-weight-bold text-primary"><u><?php echo app('translator')->get('app.clickHere'); ?></u></a>
        </div>

        <div
            class="position-relative mb-4 text-dark-grey two-fa-app-info-container <?php if(Session::get('login.authenticate_via') == 'email'): ?> d-none <?php endif; ?>">
            <?php echo app('translator')->get('messages.twoFaAppInfo'); ?>
        </div>

        <div class="forgot_pswd verify-using-recovery-code-container mb-4 <?php if(Session::get('login.authenticate_via') == 'email'): ?> d-none <?php endif; ?>">
            <a href="javascript:;" id="verify-using-recovery-code"
               class="justify-content-center"><?php echo app('translator')->get('app.verifyUsingRecoveryCodes'); ?></a>
        </div>

        <div
            class="forgot_pswd verify-using-email-container mb-4 <?php echo e(Session::get('login.authenticate_via') == 'both' ? '' : 'd-none'); ?>">
            <a href="javascript:;" id="verify-using-email"
               class="justify-content-center"><?php echo app('translator')->get('app.verifyUsingEmail'); ?></a>
        </div>

        <button type="submit" id="submit-login"
                class="btn btn-primary f-w-500 rounded w-100 height-50 f-18 otp-submit">
            <?php echo app('translator')->get('app.verify'); ?> <i class="fa fa-arrow-right pl-1"></i>
        </button>

        <div class="forgot_pswd mt-3">
            <a href="<?php echo e(route('login')); ?>" class="justify-content-center"><?php echo app('translator')->get('app.login'); ?></a>
        </div>
    </form>

     <?php $__env->slot('scripts', null, []); ?> 
        <?php if ($__env->exists('sections.2fa-js')) echo $__env->make('sections.2fa-js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <script>
            $("form").submit(function () {
                const button = $('form').find('#submit-login');

                const text = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <?php echo e(__('app.loading')); ?>';

                button.prop("disabled", true);
                button.html(text);
            });

            $('#resend-code').click(function() {
                resendCode();
            });

            function resendCode() {
                let url = "<?php echo e(route('resend_code')); ?>";
                let user_id = "<?php echo e(Session::get('login.id')); ?>";
                $.easyAjax({
                    url: url,
                    container: '.login_box',
                    type: "GET",
                    blockUI: true,
                    messagePosition: "pop",
                    data: {
                        user_id: user_id
                    },
                    success: function(response) {
                        if (response.status === 'success') {
                            showEmailMessage();
                        }
                    }
                });
            }

            $('#verify-using-recovery-code').click(function() {

                $('.code').toggleClass('d-none');
                $('.recovery_code').toggleClass('d-none');
                $('.resend-code-container').addClass('d-none');

                let text = $('.recovery_code').hasClass('d-none') ? '<?php echo e(__('app.verifyUsingRecoveryCodes')); ?>' :
                    '<?php echo e(__('app.verifyUsingGoogleAuthenticatorCodes')); ?>';

                $(this).text(text);

                if ($('.recovery_code').hasClass('d-none')) {
                    $('#recovery_code').removeAttr('required');
                    $("#code").attr("required", "true");
                    $('.two-fa-app-info-container').removeClass('d-none');
                } else {
                    $('#code').removeAttr('required');
                    $("#recovery_code").attr("required", "true");
                    $('.two-fa-app-info-container').addClass('d-none');
                }

                $('#two-factor-challenge-form').attr('action', "<?php echo e(route('two-factor.login')); ?>");
            });

            $('#verify-using-email').click(function() {
                resendCode();
                $('#two-factor-challenge-form').attr('action', "<?php echo e(route('check_code')); ?>");
                $(this).addClass('d-none');
            });

            function showEmailMessage() {
                $('.resend-code-container').removeClass('d-none');
                $('.two-fa-app-info-container').addClass('d-none');
                $('#2fa-code-label').text("<?php echo e(__('app.twoFactorCodeEmail')); ?>");
            }

        </script>

     <?php $__env->endSlot(); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald278722911781386ebf0ce0184b0f0fb)): ?>
<?php $attributes = $__attributesOriginald278722911781386ebf0ce0184b0f0fb; ?>
<?php unset($__attributesOriginald278722911781386ebf0ce0184b0f0fb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald278722911781386ebf0ce0184b0f0fb)): ?>
<?php $component = $__componentOriginald278722911781386ebf0ce0184b0f0fb; ?>
<?php unset($__componentOriginald278722911781386ebf0ce0184b0f0fb); ?>
<?php endif; ?>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/auth/two-factor-challenge.blade.php ENDPATH**/ ?>