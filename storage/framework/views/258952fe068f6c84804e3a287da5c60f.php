<style>
    @font-face {
        font-family: 'THSarabunNew';
        font-style: normal;
        font-weight: normal;
        src: url("<?php echo e(storage_path('fonts/THSarabunNew.ttf')); ?>") format('truetype');
    }

    @font-face {
        font-family: 'THSarabunNew';
        font-style: normal;
        font-weight: bold;
        src: url("<?php echo e(storage_path('fonts/THSarabunNew_Bold.ttf')); ?>") format('truetype');
    }

    @font-face {
        font-family: 'THSarabunNew';
        font-style: italic;
        font-weight: bold;
        src: url("<?php echo e(storage_path('fonts/THSarabunNew_Bold_Italic.ttf')); ?>") format('truetype');
    }

    @font-face {
        font-family: 'THSarabunNew';
        font-style: italic;
        font-weight: bold;
        src: url("<?php echo e(storage_path('fonts/THSarabunNew_Italic.ttf')); ?>") format('truetype');
    }

    <?php if($invoiceSetting->locale == 'vi'): ?>
    @font-face {
        font-family: 'BeVietnamPro';
        font-style: normal;
        font-weight: normal;
        src: url("<?php echo e(storage_path('fonts/BeVietnamPro-Black.ttf')); ?>") format('truetype');
    }

    @font-face {
        font-family: 'BeVietnamPro';
        font-style: italic;
        font-weight: normal;
        src: url("<?php echo e(storage_path('fonts/BeVietnamPro-BlackItalic.ttf')); ?>") format('truetype');
    }

    @font-face {
        font-family: 'BeVietnamPro';
        font-style: italic;
        font-weight: bold;
        src: url("<?php echo e(storage_path('fonts/BeVietnamPro-bold.ttf')); ?>") format('truetype');
    }

    <?php endif; ?>

<?php if($invoiceSetting->is_chinese_lang): ?>
@font-face {
        font-family: SimHei;
        /*font-style: normal;*/
        /*font-weight: bold;*/
        src: url('<?php echo e(asset('fonts/simhei.ttf')); ?>') format('truetype');
    }

    <?php endif; ?>

    <?php $font='';

    if($invoiceSetting->locale=='ja') {
        $font='ipag';
    }

    else if($invoiceSetting->locale=='hi') {
        $font='hindi';
    }

    else if($invoiceSetting->locale=='th') {
        $font='THSarabunNew';
    }

    else if($invoiceSetting->is_chinese_lang) {
        $font='SimHei';
    }
    else if($invoiceSetting->locale == 'vi') {
        $font = 'BeVietnamPro';
    }

    else {
        $font='Verdana';
    }

    ?>
    <?php if($invoiceSetting->is_chinese_lang): ?>
        body {
        font-weight: normal !important;
    }

    <?php endif; ?>
    * {
        font-family: <?php echo e($font); ?>, DejaVu Sans, sans-serif;
    }
</style>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/estimates-vendor/pdf/estimate_pdf_css.blade.php ENDPATH**/ ?>