<div <?php echo e($attributes->merge(['class' => 'w-100 form-group mb-0'])); ?>>
    <?php if (isset($component)) { $__componentOriginal67cd5dc9866c6185ad92d933c387fa86 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal67cd5dc9866c6185ad92d933c387fa86 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Select::resolve(['fieldId' => $fieldId,'fieldLabel' => $fieldLabel,'fieldName' => $fieldName] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Select::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
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

<script>
    $(document).ready(function () {
        $("#<?php echo e($fieldId); ?>").select2({
            <?php if($format): ?>
            templateResult: formatState,
            <?php endif; ?>
            ajax: {
                url: "<?php echo e($route); ?>",
                dataType: 'json',
                type: "GET",
                delay: 250,
                data: function (params) {
                    return {
                        search: params.term,
                    };
                },
                processResults: function (response) {
                    return {
                        results: response
                    }
                },
                cache: true
            },
            placeholder: '<?php echo e($placeholder); ?>',
            minimumInputLength: 2,
            language: {
                inputTooShort: function () {
                    return "<?php echo app('translator')->get('placeholders.select2Min'); ?>";
                }
            },
            allowClear: true
        });

        function formatState(data) {
            if (!data.id) {
                return data.text;
            }
            return $(`<span><img class="mr-2 taskEmployeeImg rounded" src="${data.logo_url}" />${data.text}</span>`);
        }
    })
</script>
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\components\forms\select2-ajax.blade.php ENDPATH**/ ?>