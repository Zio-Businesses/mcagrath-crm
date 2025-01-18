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
    <?php if (isset($component)) { $__componentOriginal18ad2e0d264f9740dc73fff715357c28 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal18ad2e0d264f9740dc73fff715357c28 = $attributes; } ?>
<?php $component = App\View\Components\Form::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Form::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'acceptInviteForm']); ?>
        <input type="hidden" name="send_mail_to_admin" value="yes">

        <h3 class="text-capitalize mb-4 f-w-500"><?php echo app('translator')->get('app.signUp'); ?></h3>

        <div class="alert alert-success m-t-10 d-none" id="success-msg"></div>

        <div class="group">
            <div class="form-group text-left">
                <label for="user-name"><?php echo app('translator')->get('modules.employees.fullName'); ?><sup
                        class="f-14">*</sup></label>
                <input type="text" name="name" class="form-control height-50 f-15 light_text"
                       placeholder="<?php echo app('translator')->get('placeholders.name'); ?>" id="user-name">
            </div>

            <?php if(!is_null($invite->email_restriction)): ?>
                <div class="form-group text-left">
                    <?php if (isset($component)) { $__componentOriginal89b295b0763c93abe0143426334eb5d6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal89b295b0763c93abe0143426334eb5d6 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Label::resolve(['fieldId' => 'user-email','fieldLabel' => __('app.email'),'fieldRequired' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                        <input type="text" name="email_address" id="email_address"
                               class="form-control height-50 f-15 light_text">
                         <?php $__env->slot('append', null, []); ?> 
                        <span class="input-group-text height-50 border bg-white">

                            <?php echo e('@'.$invite->email_restriction); ?></span>
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
                    <input type="hidden" name="email_domain" id="email_domain"
                           value="<?php echo e($invite->email_restriction); ?>">
                    <input type="hidden" name="email" id="user-email">
                </div>
            <?php else: ?>
                <div class="form-group text-left">
                    <label for="user-email"><?php echo app('translator')->get('app.email'); ?><sup class="f-14">*</sup></label>
                    <input type="email" name="email" class="form-control height-50 f-15 light_text"
                           placeholder="<?php echo app('translator')->get('placeholders.email'); ?>" id="user-email">
                </div>
            <?php endif; ?>


            <div class="form-group text-left">
                <label for="password"><?php echo app('translator')->get('app.password'); ?><sup class="f-14">*</sup></label>
                <input type="password" name="password" class="form-control height-50 f-15 light_text"
                       placeholder="<?php echo app('translator')->get('placeholders.password'); ?>" id="password">
            </div>

            <?php if($globalSetting->sign_up_terms == 'yes'): ?>
                <div class="form-group text-left" >
                    <input autocomplete="off" id="read_agreement"
                        name="terms_and_conditions" type="checkbox" >
                    <label for="read_agreement"><?php echo app('translator')->get('app.acceptTerms'); ?> <a href="<?php echo e($globalSetting->terms_link); ?>" target="_blank" id="terms_link" ><?php echo app('translator')->get('app.termsAndCondition'); ?></a></label>
                </div>
            <?php endif; ?>

            <button type="button" id="submit-signup"
                    class="btn-primary f-w-500 rounded w-100 height-50 f-18">
                <?php echo app('translator')->get('app.signUp'); ?> <i class="fa fa-arrow-right pl-1"></i>
            </button>
        </div>
        <div class="forgot_pswd mt-3">
            <a href="<?php echo e(route('login')); ?>" class="justify-content-center"><?php echo app('translator')->get('app.login'); ?></a>
        </div>
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

     <?php $__env->slot('scripts', null, []); ?> 
        <script>
            $('#email_address').change(function () {
                var email = $('#email_address').val() + '@' + $('#email_domain').val();
                $('#user-email').val(email);
            });

            $('#submit-signup').click(function () {

                var url = "<?php echo e(route('accept_invite') . '?invite=' . $invite->invitation_code); ?>";
                $.easyAjax({
                    url: url,
                    container: '#acceptInviteForm',
                    disableButton: true,
                    buttonSelector: "#submit-signup",
                    type: "POST",
                    blockUI: true,
                    messagePosition: 'inline',
                    data: $('#acceptInviteForm').serialize(),
                    success: function (response) {
                        $('#success-msg').removeClass('d-none');
                        $('#success-msg').html(response.message);
                        $('.group').remove();
                        setTimeout(() => {
                            window.location.href = "<?php echo e(route('dashboard')); ?>"
                        }, 2000);
                    },
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
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\auth\invitation.blade.php ENDPATH**/ ?>