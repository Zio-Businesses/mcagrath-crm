<div class="modal-header">
    <h5 class="modal-title" id="modelHeading"><?php echo app('translator')->get('modules.lead.addFollowUp'); ?></h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">×</span></button>
</div>
<div class="modal-body">
    <div class="portlet-body">
        <?php if (isset($component)) { $__componentOriginal18ad2e0d264f9740dc73fff715357c28 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal18ad2e0d264f9740dc73fff715357c28 = $attributes; } ?>
<?php $component = App\View\Components\Form::resolve(['method' => 'POST'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Form::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'followUpForm','class' => 'ajax-form']); ?>
            <div class="form-body">
                <div class="row">

                    <div class="col-md-12">
                        <?php if (isset($component)) { $__componentOriginalfc012cd47eee5094db538668bc6edefd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfc012cd47eee5094db538668bc6edefd = $attributes; } ?>
<?php $component = App\View\Components\Cards\DataRow::resolve(['label' => __('modules.lead.clientName'),'value' => $deal->contact->client_name_salutation ?? '--'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data-row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\DataRow::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfc012cd47eee5094db538668bc6edefd)): ?>
<?php $attributes = $__attributesOriginalfc012cd47eee5094db538668bc6edefd; ?>
<?php unset($__attributesOriginalfc012cd47eee5094db538668bc6edefd); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfc012cd47eee5094db538668bc6edefd)): ?>
<?php $component = $__componentOriginalfc012cd47eee5094db538668bc6edefd; ?>
<?php unset($__componentOriginalfc012cd47eee5094db538668bc6edefd); ?>
<?php endif; ?>
                    </div>

                    <div class="col-md-6">
                        <?php if (isset($component)) { $__componentOriginalf704f069031d81dfb7cf95f6709a6a66 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf704f069031d81dfb7cf95f6709a6a66 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Datepicker::resolve(['fieldId' => 'next_follow_up_date','fieldRequired' => 'true','fieldLabel' => __('modules.lead.leadFollowUp'),'fieldName' => 'next_follow_up_date','fieldValue' => now(company()->timezone)->format(company()->date_format),'fieldPlaceholder' => __('placeholders.date')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.datepicker'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Datepicker::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf704f069031d81dfb7cf95f6709a6a66)): ?>
<?php $attributes = $__attributesOriginalf704f069031d81dfb7cf95f6709a6a66; ?>
<?php unset($__attributesOriginalf704f069031d81dfb7cf95f6709a6a66); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf704f069031d81dfb7cf95f6709a6a66)): ?>
<?php $component = $__componentOriginalf704f069031d81dfb7cf95f6709a6a66; ?>
<?php unset($__componentOriginalf704f069031d81dfb7cf95f6709a6a66); ?>
<?php endif; ?>
                    </div>
                    <div class="col-md-6">
                        <div class="bootstrap-timepicker timepicker">
                            <?php if (isset($component)) { $__componentOriginal4e45e801405ab67097982370a6a83cba = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4e45e801405ab67097982370a6a83cba = $attributes; } ?>
<?php $component = App\View\Components\Forms\Text::resolve(['fieldLabel' => __('modules.timeLogs.startTime'),'fieldPlaceholder' => __('placeholders.hours'),'fieldName' => 'start_time','fieldId' => 'start_time','fieldRequired' => 'true','fieldValue' => now(company()->timezone)->format(company()->time_format)] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Text::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4e45e801405ab67097982370a6a83cba)): ?>
<?php $attributes = $__attributesOriginal4e45e801405ab67097982370a6a83cba; ?>
<?php unset($__attributesOriginal4e45e801405ab67097982370a6a83cba); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4e45e801405ab67097982370a6a83cba)): ?>
<?php $component = $__componentOriginal4e45e801405ab67097982370a6a83cba; ?>
<?php unset($__componentOriginal4e45e801405ab67097982370a6a83cba); ?>
<?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-12 my-3">
                        <?php if (isset($component)) { $__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Checkbox::resolve(['fieldLabel' => __('modules.tasks.reminder'),'fieldName' => 'send_reminder','fieldId' => 'send_reminder','fieldValue' => 'yes'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Checkbox::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['fieldRequired' => 'true']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3)): ?>
<?php $attributes = $__attributesOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3; ?>
<?php unset($__attributesOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3)): ?>
<?php $component = $__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3; ?>
<?php unset($__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3); ?>
<?php endif; ?>
                    </div>

                    <div class="col-lg-12 send_reminder_div d-none">
                        <div class="row">
                            <div class="col-lg-6 mt-1">
                                <?php if (isset($component)) { $__componentOriginal1fded940a0a5d34bf1b88a1f45916593 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1fded940a0a5d34bf1b88a1f45916593 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Number::resolve(['fieldLabel' => __('modules.events.remindBefore'),'fieldName' => 'remind_time','fieldId' => 'remind_time','fieldValue' => '','fieldRequired' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.number'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Number::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-0 mr-lg-2 mr-md-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1fded940a0a5d34bf1b88a1f45916593)): ?>
<?php $attributes = $__attributesOriginal1fded940a0a5d34bf1b88a1f45916593; ?>
<?php unset($__attributesOriginal1fded940a0a5d34bf1b88a1f45916593); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1fded940a0a5d34bf1b88a1f45916593)): ?>
<?php $component = $__componentOriginal1fded940a0a5d34bf1b88a1f45916593; ?>
<?php unset($__componentOriginal1fded940a0a5d34bf1b88a1f45916593); ?>
<?php endif; ?>
                            </div>
                            <div class="col-md-6 mt-3">
                                <?php if (isset($component)) { $__componentOriginal67cd5dc9866c6185ad92d933c387fa86 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal67cd5dc9866c6185ad92d933c387fa86 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Select::resolve(['fieldId' => 'remind_type','fieldLabel' => '','fieldName' => 'remind_type','search' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Select::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                    <option value="day"><?php echo app('translator')->get('app.day'); ?></option>
                                    <option value="hour"><?php echo app('translator')->get('app.hour'); ?></option>
                                    <option value="minute"><?php echo app('translator')->get('app.minute'); ?></option>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal67cd5dc9866c6185ad92d933c387fa86)): ?>
<?php $attributes = $__attributesOriginal67cd5dc9866c6185ad92d933c387fa86; ?>
<?php unset($__attributesOriginal67cd5dc9866c6185ad92d933c387fa86); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal67cd5dc9866c6185ad92d933c387fa86)): ?>
<?php $component = $__componentOriginal67cd5dc9866c6185ad92d933c387fa86; ?>
<?php unset($__componentOriginal67cd5dc9866c6185ad92d933c387fa86); ?>
<?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <?php if (isset($component)) { $__componentOriginal2f60389a9e230471cd863683376c182f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2f60389a9e230471cd863683376c182f = $attributes; } ?>
<?php $component = App\View\Components\Forms\Textarea::resolve(['fieldLabel' => __('modules.lead.remark'),'fieldName' => 'remark','fieldId' => 'remark','fieldPlaceholder' => ''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Textarea::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-0 mr-lg-2 mr-md-2']); ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2f60389a9e230471cd863683376c182f)): ?>
<?php $attributes = $__attributesOriginal2f60389a9e230471cd863683376c182f; ?>
<?php unset($__attributesOriginal2f60389a9e230471cd863683376c182f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2f60389a9e230471cd863683376c182f)): ?>
<?php $component = $__componentOriginal2f60389a9e230471cd863683376c182f; ?>
<?php unset($__componentOriginal2f60389a9e230471cd863683376c182f); ?>
<?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="deal_id" value="<?php echo e($dealID); ?>">
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
    </div>
</div>
<div class="modal-footer">
    <?php if (isset($component)) { $__componentOriginalc35c79ed7e812580313ad04118477974 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc35c79ed7e812580313ad04118477974 = $attributes; } ?>
<?php $component = App\View\Components\Forms\ButtonCancel::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-cancel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonCancel::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['data-dismiss' => 'modal','class' => 'border-0 mr-3']); ?><?php echo app('translator')->get('app.close'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc35c79ed7e812580313ad04118477974)): ?>
<?php $attributes = $__attributesOriginalc35c79ed7e812580313ad04118477974; ?>
<?php unset($__attributesOriginalc35c79ed7e812580313ad04118477974); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc35c79ed7e812580313ad04118477974)): ?>
<?php $component = $__componentOriginalc35c79ed7e812580313ad04118477974; ?>
<?php unset($__componentOriginalc35c79ed7e812580313ad04118477974); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginalcf8d12533ff890e0d6573daf32b7618d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcf8d12533ff890e0d6573daf32b7618d = $attributes; } ?>
<?php $component = App\View\Components\Forms\ButtonPrimary::resolve(['icon' => 'check'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'save-followup']); ?><?php echo app('translator')->get('app.save'); ?> <?php echo $__env->renderComponent(); ?>
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

<script>
    $(document).ready(function() {

        $(".select-picker").selectpicker();

        $('#start_time').timepicker({
            <?php if(company()->time_format == 'H:i'): ?>
                showMeridian: false,
            <?php endif; ?>
        });

        const dp11 = datepicker('#next_follow_up_date', {
            position: 'bl',
            ...datepickerConfig
        });
        dp11.setMin(new Date())

        $('#send_reminder').change(function() {
            $('.send_reminder_div').toggleClass('d-none');
        })

        // save channel
        $('#save-followup').click(function() {
            $.easyAjax({
                url: "<?php echo e(route('deals.follow_up_store')); ?>",
                container: '#followUpForm',
                type: "POST",
                blockUI: true,
                data: $('#followUpForm').serialize(),
                success: function(response) {
                    if (response.status == "success") {
                        window.location.reload();
                    }
                }
            })
        });
    });
</script>
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\leads\followup\create.blade.php ENDPATH**/ ?>