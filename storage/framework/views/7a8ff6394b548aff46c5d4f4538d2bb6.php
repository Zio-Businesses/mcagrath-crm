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
    <form id="reset-password-form" action="<?php echo e(route('password.update')); ?>" class="ajax-form" method="POST">
        <?php echo e(csrf_field()); ?>


        <h3 class="text-capitalize mb-4 f-w-500"><?php echo app('translator')->get('app.resetPassword'); ?></h3>

        <div class="alert alert-success m-t-10 d-none" id="success-msg"></div>

        <input type="hidden" name="token" value="<?php echo e($request->route('token')); ?>">

        <div class="group">
            <div class="form-group text-center">
                <input type="hidden" name="email" value="<?php echo e($request->email); ?>">
            </div>
            <div class="form-group text-left">
                <label for="password"><?php echo app('translator')->get('app.password'); ?></label>

                <input type="password" name="password"
                       class="form-control height-50 f-15 light_text" placeholder="Password"
                       id="password">
            </div>

            <div class="form-group text-left">
                <label for="password"><?php echo app('translator')->get('app.confirmPassword'); ?></label>
                <input type="password" name="password_confirmation"
                       class="form-control height-50 f-15 light_text" placeholder="Confirm Password"
                       id="password_confirmation">
            </div>

            <button
                type="button"
                id="submit-login"
                class="btn-primary f-w-500 rounded w-100 height-50 f-18">
                <?php echo app('translator')->get('app.resetPassword'); ?> <i class="fa fa-arrow-right pl-1"></i>
            </button>
        </div>
        <div class="forgot_pswd mt-3">
            <a href="<?php echo e(route('login')); ?>" class="justify-content-center"><?php echo app('translator')->get('app.login'); ?></a>
        </div>
    </form>

     <?php $__env->slot('scripts', null, []); ?> 
        <script>

            $('#submit-login').click(function () {

                var url = "<?php echo e(route('password.update')); ?>";
                $.easyAjax({
                    url: url,
                    container: '#reset-password-form',
                    disableButton: true,
                    blockUI: true,
                    buttonSelector: "#submit-login",
                    type: "POST",
                    data: $('#reset-password-form').serialize(),
                    success: function (response) {
                        $('#success-msg').removeClass('d-none');
                        $('#success-msg').html(response.message);
                        $('.group').remove();
                        setTimeout(() => {
                            window.location.href = "<?php echo e(route('login')); ?>"
                        }, 3000);
                    }
                })
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
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\auth\passwords\reset-password.blade.php ENDPATH**/ ?>