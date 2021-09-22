

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
            <th>No.</th>
            <th>NIM</th>
            <th>Nama Mahasiswa</th>
            <th>Nama Sekolah</th>
            <th>Tanggal Pelaksanaan</th>
            <th>Nilai Magang</th>
            <th>Status Magang</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $mhs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><?php echo e($key+1); ?></td>
            <td><?php echo e($value->mhs->user->nomor_induk); ?></td>
            <td><?php echo e($value->mhs->nama); ?></td>
            <td><?php echo e($value->nama_sekolah); ?></td>
            <td><?php echo e($value->tanggal_pelaksanaan); ?></td>
            <td>
              <?php if($value->nilai_pembimbing == null): ?>
              Tidak Ada Nilai
              <?php else: ?>
              <?php echo e($value->nilai_pembimbing); ?>

              <?php endif; ?>
            </td>
            <?php if($value->status_pengajuan == 'selesai'): ?>
            <td><span class="badge badge-success"><?php echo e(strtoupper($value->status_pengajuan)); ?></span></td>
            <td>

            </td>
            <?php elseif($value->status_pengajuan == 'gagal'): ?>
            <td><span class="badge badge-danger"><?php echo e(strtoupper($value->status_pengajuan)); ?></span></td>
            <td>
            Tidak Tersedia
            </td>
            <?php elseif($value->status_pengajuan == 'diterima'): ?>
            <td><span class="badge badge-primary">PROSES</span></td>
            <td>
              Tidak Tersedia
            </td>
            <?php endif; ?>

          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<div id="ket-modal" class="modal-demo">
  <button type="button" class="close" onclick="Custombox.close();">
    <span>&times;</span><span class="sr-only">Close</span>
  </button>

  <div class="custom-modal-text">

    <div class="text-center">
      <h4 class="text-uppercase font-bold mb-0">Keterangan Pengajuan Magang</h4>
    </div>
    <div class="text-left">
      <form class="form-horizontal m-t-20">
        <?php echo csrf_field(); ?>
        <input type="hidden" id="ket_id" name="id_pengajuan">

        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Keterangan</label>
          <div class="col-sm-8">
            <textarea type="text" readonly class="form-control" id="keterangan" required placeholder="Alasan penolakan"></textarea>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" onclick="Custombox.close();" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
          <a id="ref_edit" class="btn btn-primary waves-effect waves-light">Perbaiki</a>
        </div>


      </form>

    </div>
  </div>

</div>

<script type="text/javascript">
  $('.ket_modal').click(function() {
    var id = $(this).data('id');
    var ket = $(this).data('ket');

    $('#keterangan').val(ket)
    $('#ref_edit').attr('href', '<?php echo e(url("pengajuan-magang/edit")); ?>/' + id)

    console.log(ket);

  });

  $('.tolak_modal').click(function() {
    var id = $(this).data('id');
    var nama = $(this).data('nama');
    var nim = $(this).data('nim');
    $('#tolak_id').val(id)
    $('#tolak_nama').val(nama)
    $('#tolak_nim').val(nim)
  });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SIMA UP2KT\resources\views/dosen/bimbingan/index.blade.php ENDPATH**/ ?>