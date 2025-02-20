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
    <form id="login-form" action="<?php echo e(route('setup_account')); ?>" class="ajax-form" method="POST">
        <?php echo $__env->make('sections.password-autocomplete-hide', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo e(csrf_field()); ?>

        <input type="hidden" name="sendMail" value="no">

        <h3 class="text-capitalize mb-3 f-w-500"><?php echo app('translator')->get('app.accountSetup'); ?></h3>
        <h6 class="mb-4 heading-h6 text-lightest"><?php echo app('translator')->get('modules.accountSettings.accountSetupInfo'); ?>
        </h6>

        <div class="form-group text-left">
            <label for="company_name"
                   class="f-w-500"><?php echo app('translator')->get('modules.accountSettings.companyName'); ?></label>
            <input type="text" name="company_name" class="form-control height-50 f-15 light_text"
                   autofocus placeholder="<?php echo app('translator')->get('placeholders.company'); ?>" id="company_name">
        </div>

        <div class="form-group text-left">
            <label for="full_name" class="f-w-500"><?php echo app('translator')->get('modules.employees.fullName'); ?></label>
            <input type="text" name="full_name" class="form-control height-50 f-15 light_text"
                   autofocus placeholder="<?php echo app('translator')->get('placeholders.name'); ?>" id="full_name">
        </div>

        <div class="form-group text-left">
            <label for="email" class="f-w-500"><?php echo app('translator')->get('app.email'); ?></label>
            <input type="text" name="email" class="form-control height-50 f-15 light_text" autofocus
                   placeholder="<?php echo app('translator')->get('placeholders.email'); ?>" id="email">
        </div>

        <div class="form-group text-left">
            <label for="password" class="f-w-500"><?php echo app('translator')->get('app.password'); ?></label>
            <div class='input-group'>
                <input type="password" name="password"
                       class="form-control height-50 f-15 light_text" placeholder="<?php echo app('translator')->get('placeholders.password'); ?>"
                       id="password">

                <div class="input-group-append">
                    <button type="button" data-toggle="tooltip"
                            data-original-title="<?php echo app('translator')->get('app.viewPassword'); ?>"
                            class="btn btn-outline-secondary border-grey toggle-password"><i
                            class="fa fa-eye"></i></button>
                </div>
            </div>
        </div>

        <button type="button" id="submit-login"
                class="btn-primary f-w-500 rounded w-100 height-50 f-18">
            <?php echo app('translator')->get('app.saveLogin'); ?> <i class="fa fa-arrow-right pl-1"></i>
        </button>
    </form>

     <?php $__env->slot('scripts', null, []); ?> 

        <script>

            $('#submit-login').click(function() {

                var url = "<?php echo e(route('setup_account')); ?>";
                $.easyAjax({
                    url: url,
                    container: '#login-form',
                    disableButton: true,
                    buttonSelector: "#submit-login",
                    type: "POST",
                    data: $('#login-form').serialize(),
                    success: function(response) {
                        if (response.status == 'success') {
                            var redirectUrl = "<?php echo e(route('checklist')); ?>";
                            window.location.href = redirectUrl;
                        }
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
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/auth/account_setup.blade.php ENDPATH**/ ?>