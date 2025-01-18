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
    <form id="login-form" action="<?php echo e(route('login')); ?>" class="ajax-form" method="POST">
        <?php echo e(csrf_field()); ?>

        <h3 class="text-capitalize mb-4 f-w-500"><?php echo app('translator')->get('app.signUpAsClient'); ?></h3>

        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <div class="form-group text-left">
            <label for="name"><?php echo app('translator')->get('app.name'); ?> <sup class="f-14 mr-1">*</sup></label>
            <input type="text" tabindex="1" name="name"
                   class="form-control height-50 f-15 light_text"
                   placeholder="<?php echo app('translator')->get('placeholders.name'); ?>" id="name" autofocus>
        </div>

        <div class="form-group text-left">
            <label for="email"><?php echo app('translator')->get('auth.email'); ?> <sup class="f-14 mr-1">*</sup></label>
            <input tabindex="2" type="email" name="email"
                   class="form-control height-50 f-15 light_text"
                   placeholder="<?php echo app('translator')->get('placeholders.email'); ?>" id="email">
            <input type="hidden" id="g_recaptcha" name="g_recaptcha">
        </div>

        <div class="form-group text-left">
            <label for="password"><?php echo app('translator')->get('app.password'); ?> <sup class="f-14 mr-1">*</sup></label>
            <?php if (isset($component)) { $__componentOriginalcbf9105fd4879d5d6ef9e1f6fe271af7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcbf9105fd4879d5d6ef9e1f6fe271af7 = $attributes; } ?>
<?php $component = App\View\Components\Forms\InputGroup::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.input-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\InputGroup::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <input type="password" name="password" id="password"
                       placeholder="<?php echo app('translator')->get('placeholders.password'); ?>" tabindex="3"
                       class="form-control height-50 f-15 light_text">
                 <?php $__env->slot('append', null, []); ?> 
                    <button type="button" tabindex="4" data-toggle="tooltip"
                            data-original-title="<?php echo app('translator')->get('app.viewPassword'); ?>"
                            class="btn btn-outline-secondary border-grey height-50 toggle-password">
                        <i
                            class="fa fa-eye"></i></button>
                 <?php $__env->endSlot(); ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcbf9105fd4879d5d6ef9e1f6fe271af7)): ?>
<?php $attributes = $__attributesOriginalcbf9105fd4879d5d6ef9e1f6fe271af7; ?>
<?php unset($__attributesOriginalcbf9105fd4879d5d6ef9e1f6fe271af7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcbf9105fd4879d5d6ef9e1f6fe271af7)): ?>
<?php $component = $__componentOriginalcbf9105fd4879d5d6ef9e1f6fe271af7; ?>
<?php unset($__componentOriginalcbf9105fd4879d5d6ef9e1f6fe271af7); ?>
<?php endif; ?>
        </div>

        <div class="form-group text-left">
            <label for="company_name"><?php echo app('translator')->get('modules.client.companyName'); ?></label>
            <input type="text" tabindex="5" name="company_name"
                   class="form-control height-50 f-15 light_text"
                   placeholder="<?php echo app('translator')->get('placeholders.company'); ?>" id="company_name">
        </div>

        <?php if($globalSetting->google_recaptcha_status == 'active' && $globalSetting->google_recaptcha_v2_status == 'active'): ?>
            <div class="form-group" id="captcha_container"></div>
        <?php endif; ?>

        <?php if($errors->has('g-recaptcha-response')): ?>
            <div class="help-block with-errors"><?php echo e($errors->first('g-recaptcha-response')); ?>

            </div>
        <?php endif; ?>

        <?php if($globalSetting->sign_up_terms == 'yes'): ?>
            <div class="form-group text-left" >
                <input autocomplete="off" id="read_agreement"
                    name="terms_and_conditions" type="checkbox" >
                <label for="read_agreement"><?php echo app('translator')->get('app.acceptTerms'); ?> <a href="<?php echo e($globalSetting->terms_link); ?>" target="_blank" id="terms_link" ><?php echo app('translator')->get('app.termsAndCondition'); ?></a></label>
            </div>
        <?php endif; ?>

        <button type="button" id="submit-register"
                class="btn-primary f-w-500 rounded w-100 height-50 f-18">
            <?php echo app('translator')->get('app.signUp'); ?> <i class="fa fa-arrow-right pl-1"></i>
        </button>

        <a href="<?php echo e(route('login')); ?>"
           class="btn-secondary f-w-500 rounded w-100 height-50 f-15 mt-3">
            <?php echo app('translator')->get('app.login'); ?>
        </a>
    </form>

     <?php $__env->slot('scripts', null, []); ?> 
        <?php if($globalSetting->google_recaptcha_status == 'active' && $globalSetting->google_recaptcha_v2_status == 'active'): ?>
            <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async
                    defer></script>
            <script>
                var gcv3;
                var onloadCallback = function () {
                    // Renders the HTML element with id 'captcha_container' as a reCAPTCHA widget.
                    // The id of the reCAPTCHA widget is assigned to 'gcv3'.
                    gcv3 = grecaptcha.render('captcha_container', {
                        'sitekey': '<?php echo e($globalSetting->google_recaptcha_v2_site_key); ?>',
                        'theme': 'light',
                        'callback': function (response) {
                            if (response) {
                                $('#g_recaptcha').val(response);
                            }
                        },
                    });
                };
            </script>
        <?php endif; ?>
        <?php if($globalSetting->google_recaptcha_status == 'active' && $globalSetting->google_recaptcha_v3_status == 'active'): ?>
            <script
                src="https://www.google.com/recaptcha/api.js?render=<?php echo e($globalSetting->google_recaptcha_v3_site_key); ?>"></script>
            <script>
                grecaptcha.ready(function () {
                    grecaptcha.execute('<?php echo e($globalSetting->google_recaptcha_v3_site_key); ?>').then(function (token) {
                        // Add your logic to submit to your backend server here.
                        $('#g_recaptcha').val(token);
                    });
                });
            </script>
        <?php endif; ?>

        <script>
            $(document).ready(function () {

                $('#submit-register').click(function () {

                    const url = "<?php echo e(route('register')); ?>";

                    $.easyAjax({
                        url: url,
                        container: '.login_box',
                        disableButton: true,
                        buttonSelector: "#submit-register",
                        type: "POST",
                        blockUI: true,
                        data: $('#login-form').serialize(),
                        success: function (response) {
                            window.location.href = "<?php echo e(route('dashboard')); ?>";
                        }
                    })
                });

                <?php if(session('message')): ?>
                Swal.fire({
                    icon: 'error',
                    text: '<?php echo e(session('message')); ?>',
                    showConfirmButton: true,
                    customClass: {
                        confirmButton: 'btn btn-primary',
                    },
                    showClass: {
                        popup: 'swal2-noanimation',
                        backdrop: 'swal2-noanimation'
                    },
                })
                <?php endif; ?>

            });
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
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\auth\register.blade.php ENDPATH**/ ?>