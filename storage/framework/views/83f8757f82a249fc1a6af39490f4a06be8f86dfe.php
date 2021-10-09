

<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-12">
    <div class="card-box table-responsive">

      <?php if(auth()->check() && auth()->user()->hasRole('mahasiswa')): ?>
      <div class="align-items-center">
        <a href="<?php echo e(route('pengajuanMagang.index')); ?>" class="btn btn-danger m-l-10 waves-light  mb-2">Kembali</a>
        <a href="#tambah-modal" data-animation="sign" data-plugin="custommodal" data-overlaySpeed="100" data-overlayColor="#36404a" class="btn btn-primary m-l-10 waves-light  mb-2">Tambah</a>
      </div>
      <?php endif; ?>

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
            <th>No.</th>
            <th>Tanggal Kegiatan</th>
            <th>Keterangan</th>
            <th>Laporan</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $lookbooks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><?php echo e($key+1); ?></td>
            <td><?php echo e(date('d-F-Y', strtotime($value->created_at))); ?></td>
            <td><?php echo e($value->keterangan); ?></td>
            <td><a href="\storage\<?php echo e($value->url_laporan); ?>" target="_BLANK" class="btn btn-rounded btn-info btn-sm"> Lihat <i class="fa fa-file-pdf-o"> </i></a></td>

            <td>
              <a href="#hapus-modal" data-animation="sign" data-plugin="custommodal" data-laporan="<?php echo e($value->url_laporan); ?>" data-id='<?php echo e($value->id); ?>' data-overlaySpeed="100" data-overlayColor="#36404a" class="btn btn-danger btn-sm hapus"><i class="fa fa-trash"></i></a>


            </td>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- end row -->
<div id="tambah-modal" class="modal-demo">
  <button type="button" class="close" onclick="Custombox.close();">
    <span>&times;</span><span class="sr-only">Close</span>
  </button>

  <div class="custom-modal-text">

    <div class="text-center">
      <h4 class="text-uppercase font-bold mb-0">Tambah Lookbook</h4>
    </div>
    <div class="text-left">
      <form class="form-horizontal m-t-20" enctype="multipart/form-data" action="<?php echo e(route('lookbook.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <input type="hidden" name="id_pengajuan" value="<?php echo e($id_pengajuan); ?>">
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Tanggal Kegiatan</label>
          <div class="col-sm-9">
            <input class="form-control" type="date" autocomplete="off" name="tgl_kegiatan" required="" placeholder="Tanggal Kegiatan">
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Keterangan</label>
          <div class="col-sm-9">
            <textarea class="form-control" maxlength="255" type="text" autocomplete="off" name="keterangan" required="" placeholder="Keterangan"></textarea>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Upload File</label>
          <div class="col-sm-9">
            <input type="file" accept=".pdf" required data-max-file-size="2M" name="file_laporan" />
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
      <h4 class="text-uppercase font-bold mb-0">Hapus Lookbook ini?</h4>
    </div>
    <div class="">

      <form class="form-horizontal m-t-20" enctype="multipart/form-data" action="<?php echo e(route('lookbook.hapus')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div>
          <input type="hidden" id='id_hapus' name='id'>
          <input type="hidden" id='laporan' name='url_laporan'>
          <h5 id="exampleModalLabel">Apakah anda yakin ingin mengapus kegiatan ini?</h5>
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
    $('#id_hapus').val(id);
    var laporan = $(this).data('laporan');
    $('#laporan').val(laporan);
  });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SIMA UP2KT\resources\views/mahasiswa/lookbook/index.blade.php ENDPATH**/ ?>