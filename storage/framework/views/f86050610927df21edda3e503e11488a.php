<style>
    #imageCropper {
        height: 350px;
    }
</style>

<div class="modal-header">
    <h5 class="modal-title"><?php echo app('translator')->get('app.cropImage'); ?></h5>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<div class="modal-body">
    <div class="row d-flex align-content-center justify-content-center">
        <img id="imageCropper" src="" alt="Picture">
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
<?php $component->withAttributes(['data-dismiss' => 'modal','class' => 'border-0 mr-3']); ?><?php echo app('translator')->get('app.cancel'); ?> <?php echo $__env->renderComponent(); ?>
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
<?php $component = App\View\Components\Forms\ButtonPrimary::resolve(['icon' => 'crop'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'cropImage']); ?><?php echo app('translator')->get('app.crop'); ?> <?php echo $__env->renderComponent(); ?>
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
    var elementId = '<?php echo e($element); ?>';
    var img = document.getElementById('imageCropper');
    var cropper;
    var canvas;
    // logo id input file and set to image
    var input = document.getElementById(elementId);
    var files = input.files;

    function dataURLtoFile(dataurl) {

        var arr = dataurl.split(','),
            mime = arr[0].match(/:(.*?);/)[1],
            bstr = atob(arr[1]),
            n = bstr.length,
            u8arr = new Uint8Array(n);

        while(n--){
            u8arr[n] = bstr.charCodeAt(n);
        }

        return new File([u8arr], Math.random().toString(36).substr(2, 10) + '.png', {
            type: 'image/png',
            lastModified: Date.now()
        });
    }

    if (files.length > 0) {
        var file = files[0];
        var reader = new FileReader();
        reader.onload = function (e) {
            img.src = e.target.result;

            // delay to load image
            setTimeout(function () {
                cropper = new Cropper(img, {
                    viewMode: 1,
                });
            }, 200);

        }
        reader.readAsDataURL(file);
    }

    $('#cropImage').click(function () {
        $('#cropImage').attr('disabled', true);
        canvas = cropper.getCroppedCanvas();

        // set the new file to the input file on the element
        let container = new DataTransfer();
        container.items.add(dataURLtoFile(canvas.toDataURL()));
        input.files = container.files;

        // change dropify image
        $('#' + elementId).parent().find('.dropify-render img').attr('src', canvas.toDataURL());

        // close modal
        elementId = '';
        $(MODAL_LG).modal('hide');
    });

    function onModelClose() {
        if(elementId != undefined && elementId != '') {
            $('#' + elementId).parent().find('.dropify-clear').click();
            cropper.destroy();
            elementId = '';
        }
    }

    $(MODAL_LG).on('hidden.bs.modal', function (e) {
        onModelClose();
        $(MODAL_LG + ' .modal-content').html('');
        $(MODAL_LG).off('hidden.bs.modal');
    });
</script>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/theme-settings/ajax/cropper.blade.php ENDPATH**/ ?>