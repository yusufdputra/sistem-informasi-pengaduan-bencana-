

<?php $__env->startSection('content'); ?>

<div class="row">
  <div class="col-12">
    <div class="card-box table-responsive">

      <?php if(\Session::has('alert')): ?>
      <div class="alert alert-danger">
        <div><?php echo e(Session::get('alert')); ?></div>
      </div>
      <?php endif; ?>

      <?php if(\Session::has('success')): ?>
      <div class="alert alert-success">
        <div><?php echo e(Session::get('success')); ?></div>
      </div>
      <?php endif; ?>


      <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>No</th>
            <th>
              <?php if($jenis == "mahasiswa"): ?>
              NIM
              <?php else: ?>
              NIDN
              <?php endif; ?>
            </th>
            <th>Nama</th>
            <?php if($jenis == "mahasiswa"): ?>
            <th>Alamat</th>
            <th>Kelas</th>
            <?php endif; ?>
            <th>Prodi</th>
            <th>Nomor HP</th>
            <?php if($jenis == "dosen"): ?>
            <th>Alasan</th>
            <th>Status</th>
            <?php endif; ?>
            <th>Action</th>
          </tr>
        </thead>

        <tbody>

          <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

          <tr>
            <td><?php echo e($key+1); ?></td>
            <td><?php echo e($value->user['nomor_induk']); ?></td>
            <td><?php echo e($value->nama); ?></td>
            <?php if($jenis == "mahasiswa"): ?>
            <td><?php echo e($value->alamat); ?></td>
            <td>Reguler <?php echo e(strtoupper($value->kelas)); ?></td>
            <?php endif; ?>
            <td><?php echo e(strtoupper($value->prodi->nama)); ?></td>
            <td><?php echo e($value->nomor_hp); ?></td>

            <?php if($jenis == "dosen"): ?>
            <td><?php echo e($value->keterangan); ?></td>
            <td>
              <?php if($value->status == "ON"): ?>
              <span class="badge badge-success">Aktif</span>
              <?php else: ?>
              <span class="badge badge-danger">Non-Aktif</span>
              <?php endif; ?>
            </td>
            <?php endif; ?>
            <td>

              <a href="#edit-password" data-animation="sign" data-plugin="custommodal" data-id='<?php echo e($value->id_user); ?>' data-overlaySpeed="100" data-overlayColor="#36404a" class="btn btn-warning btn-sm modal_pw"><i class="fa fa-lock"></i></a>

              <a href="#hapus-modal" data-animation="sign" data-plugin="custommodal" data-jenis="<?php echo e($jenis); ?>" data-id='<?php echo e($value->id); ?>' data-iduser='<?php echo e($value->id_user); ?>' data-overlaySpeed="100" data-overlayColor="#36404a" class="btn btn-danger btn-sm hapus"><i class="fa fa-trash"></i></a>

              <?php if($jenis == "dosen"): ?>
              <a href="#edit-status" data-animation="sign" data-plugin="custommodal" data-status="<?php echo e($value->status); ?>" data-id='<?php echo e($value->id); ?>' data-overlaySpeed="100" data-overlayColor="#36404a" class="btn btn-primary btn-sm modal_status"><i class="fa fa-toggle-on"></i></a>
              <?php endif; ?>


            </td>
          </tr>

          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- end row -->



<div id="edit-password" class="modal-demo">
  <button type="button" class="close" onclick="Custombox.close();">
    <span>&times;</span><span class="sr-only">Close</span>
  </button>

  <div class="custom-modal-text text-left">

    <div class="text-center">
      <h4 class="text-uppercase font-bold mb-0">Reset Password <?php echo e($jenis); ?></h4>
    </div>
    <div class="">

      <form class="form-horizontal m-t-20" action="<?php echo e(route('user.resetpw')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="id" id="pw_id">


        <div class="form-group">
          <label for="">Password Baru</label>
          <div class="col-xs-12">
            <input class="form-control" type="text" minlength="5" autocomplete="off" name="password" required="" placeholder="Masukkan Password Baru">
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" onclick="Custombox.close();" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary waves-effect waves-light">Save changes</button>
        </div>


      </form>

    </div>
  </div>

</div>

<div id="hapus-modal" class="modal-demo">
  <button type="button" class="close" onclick="Custombox.close();">
    <span>&times;</span><span class="sr-only">Close</span>
  </button>

  <div class="custom-modal-text">

    <div class="text-center">
      <h4 class="text-uppercase font-bold mb-0">Hapus <?php echo e($jenis); ?></h4>
    </div>
    <div class="">

      <form class="form-horizontal m-t-20" enctype="multipart/form-data" action="<?php echo e(route('user.hapus')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div>
          <input type="hidden" id='id_hapus' name='id'>
          <input type="hidden" id='id_user_hapus' name='id_user'>
          <input type="hidden" id='jenis_hapus' name='jenis'>
          <h5 id="exampleModalLabel">Apakah anda yakin ingin mengapus <?php echo e($jenis); ?> ini?</h5>
        </div>

        <div class="modal-footer">
          <button type="button" onclick="Custombox.close();" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary waves-effect waves-light">Save changes</button>
        </div>


      </form>

    </div>
  </div>

</div>

<div id="edit-status" class="modal-demo">
  <button type="button" class="close" onclick="Custombox.close();">
    <span>&times;</span><span class="sr-only">Close</span>
  </button>

  <div class="custom-modal-text">

    <div class="text-center">
      <h4 class="text-uppercase font-bold mb-0">Ubah Status Dosen</h4>
    </div>
    <div class="">

      <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo e(route('user.status')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div>
          <input type="hidden" id='id' name='id'>
          <input type="hidden" id='status' name='status'>
          <h5>
            Status Saat ini :
            <span id="span_status">Non-Aktif</span>
            <br>
            Apakah anda ingin mengubah?
          </h5>
        </div>
        <div class="modal-footer">
          <button type="button" onclick="Custombox.close();" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary waves-effect waves-light">Save changes</button>
        </div>


      </form>

    </div>
  </div>

</div>

<script type="text/javascript">
  $('.hapus').click(function() {
    var id = $(this).data('id');
    var jenis = $(this).data('jenis');
    var id_user = $(this).data('iduser');
    $('#id_hapus').val(id);
    $('#id_user_hapus').val(id_user);
    $('#jenis_hapus').val(jenis);
  });

  $('.modal_pw').click(function() {
    var id = $(this).data('id');
    $('#pw_id').val(id);
  });
  
  
  $('.modal_status').click(function() {
    var id = $(this).data('id');
    var status = $(this).data('status');
    $('#id').val(id);
    $('#status').val(status);

    if (status == "ON") {
      $('#span_status').attr('class','badge badge-success').text("Aktif")
    } else {
      $('#span_status').attr('class','badge badge-danger').text("Non-Aktif")
      
    }

  });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sistem-informasi-pengajuan-magang-umri\resources\views/admin/users/index.blade.php ENDPATH**/ ?>