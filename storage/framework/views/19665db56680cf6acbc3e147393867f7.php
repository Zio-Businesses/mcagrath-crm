<script src="<?php echo e(asset('vendor/jquery/daterangepicker.min.js')); ?>"></script>

<script type="text/javascript">
    $(function() {

        var start = moment().subtract(89, 'days');
        var end = moment();

        $('#datatableRange').daterangepicker({
            autoUpdateInput: false,
            locale: daterangeLocale,
            linkedCalendars: false,
            startDate: start,
            endDate: end,
            showDropdowns: true,
            ranges: daterangeConfig
        }, cb);


        $('#datatableRange').on('apply.daterangepicker', function(ev, picker) {
            showTable();
        });

    });

</script>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/sections/daterange_js.blade.php ENDPATH**/ ?>