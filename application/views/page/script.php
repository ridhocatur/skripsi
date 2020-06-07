<!-- Bootstrap core JavaScript-->
<script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url(); ?>assets/datatables/DataTables-1.10.21/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/js/daterangepicker/moment.min.js"></script>
<script src="<?= base_url(); ?>assets/js/daterangepicker/daterangepicker.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url(); ?>assets/js/sb-admin-2.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url(); ?>assets/datatables/DataTables-1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>assets/datatables/Buttons-1.6.2/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url(); ?>assets/datatables/Buttons-1.6.2/js/buttons.flash.min.js"></script>
<script src="<?= base_url(); ?>assets/datatables/JSZip-2.5.0/jszip.min.js"></script>
<script src="<?= base_url(); ?>assets/datatables/pdfmake-0.1.36/pdfmake.min.js"></script>
<script src="<?= base_url(); ?>assets/datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
<script src="<?= base_url(); ?>assets/datatables/Buttons-1.6.2/js/buttons.html5.min.js"></script>
<script src="<?= base_url(); ?>assets/datatables/Buttons-1.6.2/js/buttons.print.min.js"></script>
<script src="<?= base_url(); ?>assets/datatables/Buttons-1.6.2/js/buttons.colVis.min.js"></script>

<script type="text/javascript" src="<?= base_url(); ?>assets/js/sweetalert2.all.min.js"></script>

<script type="text/javascript" src="<?= base_url(); ?>assets/prism/prism.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/js/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="<?= base_url(); ?>assets/js/script.js"></script>
<script src="<?= base_url(); ?>assets/js/validasi.js"></script>

<!-- Page level custom scripts -->
<script>
$(document).ready(function() {
    $('#dataTable').DataTable( {
        responsive: true,
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copy',
                text: "<i class='fa fa-clipboard'></i> Copy Data",
                className: 'Btncopy',
            },
            {
                extend: 'pageLength',
                text: "<i class='fa fa-chevron-down'></i> Tampil Baris",
                className: 'Btnrows',
            },
        ],
        pageLength: 10,
        lengthMenu: [0, 5, 10, 20, 50, 100],
    });
});

$(document).ready(function() {
    $('#cetakLaporan').DataTable( {
        responsive: true,
        filter: false,
        dom: 'Bfrtip',
        scrollX: true,
        buttons: [
            {
                extend: 'copy',
                text: "<i class='fa fa-clipboard'></i> Copy Data",
                className: 'Btncopy',
            },
            {
                extend: 'csv',
                text: "<i class='fa fa-file'></i> Export CSV",
                className: 'Btncsv',
            },
            {
                extend: 'excel',
                text: "<i class='fa fa-file'></i> Export Excel",
                className: 'Btnexcel',
            },
            {
                text: "<i class='fa fa-file'></i> Export PDF",
                className: 'Btnpdf',
                extend: 'pdfHtml5',
                orientation: 'landscape', //portrait
                pageSize: 'A4', //A3 , A5 , A6 , legal , letter
            },
            {
              extend: 'print',
              autoPrint: false,
              text: "<i class='fa fa-print'></i> Print",
              className: 'Btnprint',
              customize: function ( win ) {
              $(win.document.body)
                  .css( 'font-size', '12pt' )
                  .prepend(
                      '<center><table><tr><td><img src="<?= base_url(); ?>assets/img/logotrp.JPG" style="width: 100px; height: 100px;"></td><td>&nbsp;</td><td><center><h3>PT. TANJUNG RAYA PLYWOOD</h3><h6>Desa Tinggiran II Luar, Barito Kuala</h6></center></td></tr></table></center>'
                  );
              $(win.document.body).find( 'table' ).addClass( 'compact' ).css( 'font-size', 'inherit' );
            }
          },
        ]
    });
    $(".Btncopy").removeClass("dt-button").addClass("btn btn-outline-secondary btn-sm");
    $(".Btncsv").removeClass("dt-button").addClass("btn btn-outline-success btn-sm");
    $(".Btnexcel").removeClass("dt-button").addClass("btn btn-outline-success btn-sm");
    $(".Btnprint").removeClass("dt-button").addClass("btn btn-outline-info btn-sm");
    $(".Btnpdf").removeClass("dt-button").addClass("btn btn-outline-danger btn-sm");
    $(".Btnrows").removeClass("dt-button").addClass("btn btn-outline-primary btn-sm");
});

$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: ['copy', 'csv'],
        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );

                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );

                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
    } );
}  );
</script>

 <script> //Script Sweet Alert Delete
    $('button#delete').on('click', function(){
        var href = $(this).attr('href');
        var title = $(this).data('title');

        Swal.fire({
          title: "Hapus Data "+ title +" ?",
          text: "Data akan dihapus dan tidak dapat kembali lagi",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya'
        }).then((result) => {
          if (result.value) {
            document.getElementById('deleteForm').action = href;
            document.getElementById('deleteForm').submit();
            Swal.fire(
                'Terhapus!',
                'Data berhasil di hapus.',
                'success'
            )
          }
        });
    });
</script>
<!-- Script DateTimePicker -->
<script type="text/javascript">
$(function() {

    var start = moment();
    var end = moment();

    function cb(start, end) {
        $('#reportrange span').html(start.format('DD/MM/YYYY') + ' - ' + end.format('DD/MM/YYYY'));
        $('#satutgl').val(start.format('YYYY-MM-DD'));
        $('#duatgl').val(end.format('YYYY-MM-DD'));
    }
    $('#reportrange').daterangepicker({
        startDate: start,
        endDate: end,
        autoApply: true,
        "opens": "center",
        "drops": "auto",
        ranges: {
           'Hari Ini': [moment(), moment()],
           'Kemaren': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           '7 Hari Terakhir': [moment().subtract(6, 'days'), moment()],
           '30 Hari Terakhir': [moment().subtract(29, 'days'), moment()],
           'Bulan Ini': [moment().startOf('month'), moment().endOf('month')],
           'Bulan Lalu': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);
    cb(start, end);
});
</script>

