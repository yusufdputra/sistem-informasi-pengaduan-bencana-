<!-- jQuery  -->
</div>
<!-- App js -->
<script src="<?php echo e(asset('adminto/js/jquery.core.js')); ?>"></script>
<script src="<?php echo e(asset('adminto/js/jquery.app.js')); ?>"></script>

<!-- Toastr js -->
<script src="<?php echo e(asset('adminto/plugins/toastr/toastr.min.js')); ?>"></script>
<script src="<?php echo e(asset('adminto/js/popper.min.js')); ?>"></script>
<script src="<?php echo e(asset('adminto/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('adminto/js/detect.js')); ?>"></script>
<script src="<?php echo e(asset('adminto/js/fastclick.js')); ?>"></script>
<script src="<?php echo e(asset('adminto/js/jquery.blockUI.js')); ?>"></script>
<script src="<?php echo e(asset('adminto/js/waves.js')); ?>"></script>
<script src="<?php echo e(asset('adminto/js/jquery.nicescroll.js')); ?>"></script>
<script src="<?php echo e(asset('adminto/js/jquery.slimscroll.js')); ?>"></script>
<script src="<?php echo e(asset('adminto/js/jquery.scrollTo.min.js')); ?>"></script>

<!-- Validation js (Parsleyjs) -->
<script type="text/javascript" src="<?php echo e(asset('adminto/plugins/parsleyjs/dist/parsley.min.js')); ?>"></script>

<!-- Required datatable js -->
<script src="<?php echo e(asset('adminto/plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('adminto/plugins/datatables/dataTables.bootstrap4.min.js')); ?>"></script>
<!-- Buttons examples -->
<script src="<?php echo e(asset('adminto/plugins/datatables/dataTables.buttons.min.js')); ?>"></script>
<script src="<?php echo e(asset('adminto/plugins/datatables/buttons.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('adminto/plugins/datatables/jszip.min.js')); ?>"></script>
<script src="<?php echo e(asset('adminto/plugins/datatables/pdfmake.min.js')); ?>"></script>
<script src="<?php echo e(asset('adminto/plugins/datatables/vfs_fonts.js')); ?>"></script>
<script src="<?php echo e(asset('adminto/plugins/datatables/buttons.html5.min.js')); ?>"></script>
<script src="<?php echo e(asset('adminto/plugins/datatables/buttons.print.min.js')); ?>"></script>

<!-- Key Tables -->
<script src="<?php echo e(asset('adminto/plugins/datatables/dataTables.keyTable.min.js')); ?>"></script>

<!-- Responsive examples -->
<script src="<?php echo e(asset('adminto/plugins/datatables/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(asset('adminto/plugins/datatables/responsive.bootstrap4.min.js')); ?>"></script>

<!-- Selection table -->
<script src="<?php echo e(asset('adminto/plugins/datatables/dataTables.select.min.js')); ?>"></script>
<!-- Modal-Effect -->
<script src="<?php echo e(asset('adminto/plugins/custombox/dist/custombox.min.js')); ?>"></script>
<script src="<?php echo e(asset('adminto/plugins/custombox/dist/legacy.min.js')); ?>"></script>

<script src="<?php echo e(asset('adminto/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')); ?>"></script>


<!-- time picker -->
<script src="<?php echo e(asset('adminto/plugins/timepicker/bootstrap-timepicker.min.js')); ?>"></script>
<script src="<?php echo e(asset('adminto/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')); ?>"></script>
<script src="<?php echo e(asset('adminto/plugins/bootstrap-daterangepicker/daterangepicker.js"')); ?>></script>

<!-- file uploads js -->
<script src=" <?php echo e(asset('adminto/plugins/fileuploads/js/dropify.min.js')); ?>"></script>

<!-- select2 -->
<script src="<?php echo e(asset('adminto/plugins/select2/js/select2.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('adminto/plugins/switchery/switchery.min.js')); ?>"></script>
<script src="<?php echo e(asset('adminto/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')); ?>"></script>


<!-- Form wizard -->
<script src="<?php echo e(asset('adminto/plugins/bootstrap-wizard/jquery.bootstrap.wizard.js')); ?>"></script>
<script src="<?php echo e(asset('adminto/plugins/jquery-validation/dist/jquery.validate.min.js')); ?>"></script>

<script type="text/javascript">
    // Select2
    $(".select2").select2();
</script>

<script type="text/javascript">
    $(document).ready(function() {
        // form
        $('form').parsley();
        // Select2
        $(".select2").select2();
        // Date Picker
        jQuery('#datepicker').datepicker();
        jQuery('.datepicker-autoclose').datepicker({
            autoclose: true,
            format: 'dd-M-yyyy',
            todayHighlight: true
        });

        jQuery('.date-range').datepicker({
            toggleActive: true,
            autoclose: true,
            format: 'dd-M-yyyy',
        });



        // Default Datatable
        $('#datatable').DataTable();

        // Default Datatable
        $('#datatable2').DataTable();

        //Buttons examples
        var column = [0,1,2,3,4,5,6]
        var table = $('#datatable-buttons').DataTable({
            lengthChange: false,
            buttons: [
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: column
                    }
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: column
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: column
                    }
                }
            ],


        });



        jQuery('.timepicker2').timepicker({
            showMeridian: false,
            icons: {
                up: 'mdi mdi-chevron-up',
                down: 'mdi mdi-chevron-down'
            }
        });

        // Key Tables

        $('#key-table').DataTable({
            keys: true
        });

        // Responsive Datatable
        $('#responsive-datatable').DataTable();

        // Multi Selection Datatable
        $('#selection-datatable').DataTable({
            select: {
                style: 'multi'
            }
        });

        table.buttons().container()
            .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
    });
</script>
</body>

</html><?php /**PATH C:\xampp\htdocs\SIMA UP2KT\resources\views/layouts/footer.blade.php ENDPATH**/ ?>