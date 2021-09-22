

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

      <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">

        <thead>
          <tr>
            <th>No.</th>
            <th>NIM</th>
            <th>Nama Mahasiswa</th>
            <th>Nama Sekolah</th>
            <th>Tanggal Pelaksanaan</th>
            <th>Dosen Pembimbing</th>
            <th>Nilai Magang</th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $riwayat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><?php echo e($key+1); ?></td>
            <td><?php echo e($value->mhs->user->nomor_induk); ?></td>
            <td><?php echo e($value->mhs->nama); ?></td>
            <td><?php echo e($value->nama_sekolah); ?></td>
            <td>
            <?php echo e(date('d-F-Y', strtotime($value->periode->mulai_magang))); ?> s/d <?php echo e(date('d-F-Y', strtotime($value->periode->akhir_magang))); ?></td>
            <td><?php echo e(strtoupper($value->dsn->nama)); ?></td>
            <td><?php echo e($value->nilai_pembimbing); ?></td>


          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<div id="cetak-modal" class="modal-demo">
  <button type="button" class="close" onclick="Custombox.close();">
    <span>&times;</span><span class="sr-only">Close</span>
  </button>

  <div class="custom-modal-text">

    <div class="text-center">
      <h4 class="text-uppercase font-bold mb-0">Cetak Data Peminjaman Barang</h4>
    </div>
    <div class="p-20 text-left">
      <form class="form-horizontal m-t-20" target="_BLANK" enctype="multipart/form-data" action="<?php echo e(route('cetak')); ?>" method="POST">
        <?php echo e(csrf_field()); ?>


        <input type="hidden" value="pinjam" name="jenis">

        <div class="form-group">
          <label for="">Dari Tanggal</label>
          <div class="col-xs-12">
            <div class="input-group-append">
              <input type="text" class="form-control datepicker-autoclose" placeholder="dd/mm/yyyy" autocomplete="off" name="start_date" >
              <span class="input-group-text"><i class="ti-calendar"></i></span>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="">Sampai Tanggal</label>
          <div class="col-xs-12">
            <div class="input-group-append">
              <input type="text" class="form-control datepicker-autoclose" placeholder="dd/mm/yyyy" autocomplete="off" name="end_date" >
              <span class="input-group-text"><i class="ti-calendar"></i></span>
            </div>
          </div>
        </div>

        <div class="form-group text-center m-t-30">
          <div class="col-xs-12">
            <button class="btn btn-success btn-bordred btn-block waves-effect waves-light" type="submit">Cetak</button>
          </div>
        </div>


      </form>

    </div>
  </div>

</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SIMA UP2KT\resources\views/admin/riwayat/index.blade.php ENDPATH**/ ?>