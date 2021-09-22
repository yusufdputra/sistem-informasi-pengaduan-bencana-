

<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-12">
    <div class="card-box table-responsive">

      <div class="alert alert-success">
        <strong><?php if($status_daftar != null): ?>
          Pendaftaran BUKA
          <?php else: ?>
          Pendaftaran TUTUP
          <?php endif; ?></strong>
      </div>


      <?php if($status_daftar != null): ?>
      <div class="align-items-center">
        <a href="<?php echo e(route('pengajuanMagang.tambah')); ?>" class="btn btn-primary m-l-10 waves-light  mb-2">Tambah</a>
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
            <th>Nama Sekolah</th>
            <th>Tanggal Pelaksanaan</th>
            <th>Dosen Pembimbing</th>
            <th>Nilai Magang</th>
            <th>Status Pengajuan</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $pengajuan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><?php echo e($key+1); ?></td>
            <td><?php echo e($value->nama_sekolah); ?></td>
            <td><?php echo e($value->tanggal_pelaksanaan); ?></td>
            <td>
              <?php if($value->id_pembimbing == null): ?>
              Belum Ditentukan
              <?php else: ?>
              <?php echo e($value->dsn[0]['nama']); ?>

              <?php endif; ?>
            </td>
            <td>
              <?php if($value->nilai_pembimbing == null): ?>
              Tidak Ada Nilai
              <?php else: ?>
              <?php echo e($value->nilai_pembimbing); ?>

              <?php endif; ?>
            </td>



            <?php if($value->status_pengajuan == 'proses'): ?>
            <td><span class="badge badge-primary"><?php echo e(strtoupper($value->status_pengajuan)); ?></span></td>
            <td>
              Tidak Tersedia
            </td>
            <?php elseif($value->status_pengajuan == 'pengajuan pembimbing'): ?>
            <td><span class="badge badge-info"><?php echo e(strtoupper($value->status_pengajuan)); ?></span></td>
            <td>
              
            </td>
            <?php elseif($value->status_pengajuan == 'diterima'): ?>
            <td><span class="badge badge-success"><?php echo e(strtoupper($value->status_pengajuan)); ?></span></td>
            <td>
              
            </td>
            <?php elseif($value->status_pengajuan == 'ditolak'): ?>
            <td><span class="badge badge-danger"><?php echo e(strtoupper($value->status_pengajuan)); ?></span></td>
            <td>
              
            </td>
            <?php elseif($value->status_pengajuan == 'selesai'): ?>
            <td><span class="badge badge-success"><?php echo e(strtoupper($value->status_pengajuan)); ?></span></td>
            <td>
              
            </td>
            <?php endif; ?>
            <!-- <a href="#edit-modal" data-animation="sign" data-plugin="custommodal" data-id='<?php echo e($value->id); ?>' data-nama="<?php echo e($value->nama); ?>" data-overlaySpeed="100" data-overlayColor="#36404a" class="btn btn-success btn-sm modal_edit"><i class="fa fa-edit"></i></a> -->

          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SIMA UP2KT\resources\views/mahasiswa/pengajuan/index.blade.php ENDPATH**/ ?>