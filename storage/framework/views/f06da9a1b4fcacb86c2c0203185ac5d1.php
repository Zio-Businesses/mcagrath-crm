<!-- Datatables -->
<script src="<?php echo e(asset('vendor/datatables/jquery.dataTables.min.js')); ?>" defer="defer"></script>
<script src="<?php echo e(asset('vendor/datatables/dataTables.bootstrap4.min.js')); ?>" defer="defer"></script>


<script src="<?php echo e(asset('vendor/datatables/dataTables.buttons.min.js')); ?>" defer="defer"></script>
<script src="<?php echo e(asset('vendor/datatables/buttons.bootstrap4.min.js')); ?>" defer="defer"></script>
<script src="<?php echo e(asset('vendor/datatables/buttons.server-side.js')); ?>" defer="defer"></script>
<?php echo $dataTable->scripts(); ?>


<script>
    // if (!KTUtil.isMobileDevice()) {
    //     $('.table-responsive').on('show.bs.dropdown', function () {
    //         $('.table-responsive').css( "overflow", "inherit" );
    //     });

    //     $('.table-responsive').on('hide.bs.dropdown', function () {
    //         $('.table-responsive').css( "overflow", "auto" );
    //     })
    // }

    (function () {
        // hold onto the drop down menu
        var dropdownMenu;

        // and when you show it, move it to the body
        $('.table-responsive').on('show.bs.dropdown', function (e) {
            if (!$(e.target).hasClass('bootstrap-select')) {
                // grab the menu
                dropdownMenu = $(e.target).find('.dropdown-menu');

                // detach it and append it to the body
                $('body').append(dropdownMenu.detach());

                // grab the new offset position
                var eOffset = $(e.target).offset();

                // make sure to place it where it would normally go (this could be improved)
                dropdownMenu.css({
                    'display': 'block',
                    'top': eOffset.top + $(e.target).outerHeight(),
                    'left': eOffset.left
                });

            }
        });

        // and when you hide it, reattach the drop down, and hide it normally
        $('.table-responsive').on('hide.bs.dropdown', function (e) {
            if (!$(e.target).hasClass('bootstrap-select')) {
                $(e.target).append(dropdownMenu.detach());
                dropdownMenu.hide();
            }
        });
    })();
</script>

<?php echo $__env->make('sections.daterange_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\Mcagrath-new\mcagrath-crm\resources\views/sections/datatable_js.blade.php ENDPATH**/ ?>