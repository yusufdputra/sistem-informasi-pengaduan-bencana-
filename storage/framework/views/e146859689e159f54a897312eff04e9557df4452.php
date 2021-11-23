</div>


<!-- jQuery Scrollbar -->
<script src="<?php echo e(asset('atlantis/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')); ?>"></script>


<!-- Chart JS -->
<script src="<?php echo e(asset('atlantis/js/plugin/chart.js/chart.min.js')); ?>"></script>

<!-- jQuery Sparkline -->
<script src="<?php echo e(asset('atlantis/js/plugin/jquery.sparkline/jquery.sparkline.min.js')); ?>"></script>


<!-- Datatables -->
<script src="<?php echo e(asset('atlantis/js/plugin/datatables/datatables.min.js')); ?>"></script>

<!-- Bootstrap Notify -->
<script src="<?php echo e(asset('atlantis/js/plugin/bootstrap-notify/bootstrap-notify.min.js')); ?>"></script>

<!-- jQuery Vector Maps -->
<script src="<?php echo e(asset('atlantis/js/plugin/jqvmap/jquery.vmap.min.js')); ?>"></script>
<script src="<?php echo e(asset('atlantis/js/plugin/jqvmap/maps/jquery.vmap.world.js')); ?>"></script>

<!-- Sweet Alert -->
<script src="<?php echo e(asset('atlantis/js/plugin/sweetalert/sweetalert.min.js')); ?>"></script>


<!-- Datatables -->
<script src="<?php echo e(asset('atlantis/js/plugin/datatables/datatables.min.js')); ?>"></script>


<!-- Atlantis JS -->
<script src="<?php echo e(asset('atlantis/js/atlantis.min.js')); ?>"></script>
<script>
  $(document).ready(function() {
    $('#basic-datatables').DataTable({});
  });

  function alertWarning(pesan) {
    swal("Peringatan!", pesan, {
      icon: "warning",
      buttons: {
        confirm: {
          className: 'btn btn-warning'
        }
      },
    });
  }

  function alertError(pesan) {
    swal("Peringatan!", pesan, {
      icon: "error",
      buttons: {
        confirm: {
          className: 'btn btn-danger'
        }
      },
    });
  }

  function alertConfirmasiData(data, nama, alamat, nomor_hp, foto_ktp_lama, ktp_view) {
    swal({
      title: 'Data Ditemukan!',
      text: "Apakah ingin menggunakan data sebelumnya?",
      type: 'warning',
      buttons: {
        cancel: {
          visible: true,
          text: 'Tidak!',
          className: 'btn btn-danger'
        },
        confirm: {
          text: 'Ya, Gunakan!',
          className: 'btn btn-success'
        }
      }
    }).then((willDelete) => {
      if (willDelete) {
        swal("Data Berhasil Digunakan", {
          icon: "success",
          buttons: {
            confirm: {
              className: 'btn btn-success'
            }
          }
        });
        nama.val(data['nama'])
        alamat.val(data['alamat'])
        nomor_hp.val(data['no_hp'])
        foto_ktp_lama.val(data['foto_ktp'])
        ktp_view.attr('src', '../storage/' + data['foto_ktp'])

      } else {
        swal.close();
      }
    });
  }
</script>
</body>

</html><?php /**PATH C:\xampp\htdocs\pengaduan desa\resources\views/layouts/footer.blade.php ENDPATH**/ ?>