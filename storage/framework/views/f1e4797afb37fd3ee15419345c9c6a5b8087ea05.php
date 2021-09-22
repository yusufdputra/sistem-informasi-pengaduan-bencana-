

<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-12">
    <div class="card-box table-responsive">

      <div class="alert alert-success">

        <?php if($status_daftar != null): ?>
        Pendaftaran BUKA.
        <?php else: ?>
        Pendaftaran TUTUP.
        <?php endif; ?>

        <?php if(auth()->check() && auth()->user()->hasRole('mahasiswa')): ?>
        <?php if($status_magang != null): ?>
        Silahkan Upload Berkas Laporan Jika Telah Selesai.
        <?php endif; ?>
        <?php endif; ?>

      </div>

      <?php if(auth()->check() && auth()->user()->hasRole('mahasiswa')): ?>


      <?php if($status_daftar != null): ?>
      <?php if( $status == null): ?>
      <div class="align-items-center">
        <a href="<?php echo e(route('pengajuanMagang.tambah')); ?>" class="btn btn-primary m-l-10 waves-light  mb-2">Tambah</a>
      </div>
      <?php endif; ?>
      <?php endif; ?>
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
            <?php if(auth()->check() && auth()->user()->hasRole('admin')): ?>
            <th>NIM</th>
            <th>Nama Mahasiswa</th>
            <?php endif; ?>
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
            <?php if(auth()->check() && auth()->user()->hasRole('admin')): ?>
            <td><?php echo e($value->mhs->user->nomor_induk); ?></td>
            <td><?php echo e($value->mhs->nama); ?></td>
            <?php endif; ?>
            <td><?php echo e($value->nama_sekolah); ?></td>
            <td><?php echo e($value->tanggal_pelaksanaan); ?></td>
            <td>
              <?php if($value->id_dosen == null): ?>
              Belum Ditentukan
              <?php else: ?>
              <?php echo e($value->dsn->nama); ?>

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
              <?php if(auth()->check() && auth()->user()->hasRole('mahasiswa')): ?>
              Tidak Tersedia
              <?php elseif(auth()->check() && auth()->user()->hasRole('admin')): ?>
              <a href="<?php echo e(route('pengajuanMagang.detail', $value->id)); ?>" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
              <?php endif; ?>
            </td>

            <?php elseif($value->status_pengajuan == 'diterima' || $value->status_pengajuan == 'selesai'): ?>
            <td><span class="badge badge-success"><?php echo e(strtoupper($value->status_pengajuan)); ?></span></td>
            <td>
              <?php if($status_magang == null): ?>
              Tidak Tersedia
              <?php else: ?>
              <?php if($value->url_laporan != null): ?>
              <a href="<?php echo e($value->url_laporan); ?>" target="_BLANK" class="btn btn-sm btn-purple waves-effect waves-light upload_laporan_modal"><i class="fa fa-file-pdf-o"></i></a>
              <?php endif; ?>
              <?php if(auth()->check() && auth()->user()->hasRole('mahasiswa')): ?>
              <a href="#upload-laporan-modal" data-animation="sign" data-plugin="custommodal" data-id='<?php echo e($value->id); ?>' data-overlaySpeed="100" data-overlayColor="#36404a" class="btn btn-sm btn-primary waves-effect waves-light upload_laporan_modal"><i class="fa fa-upload"></i></a>
              <?php endif; ?>
              <?php endif; ?>
            </td>
            <?php elseif($value->status_pengajuan == 'ditolak'): ?>
            <td><span class="badge badge-danger"><?php echo e(strtoupper($value->status_pengajuan)); ?></span></td>
            <td>
              <?php if(auth()->check() && auth()->user()->hasRole('mahasiswa')): ?>
              <a href="#ket-modal" data-animation="sign" data-plugin="custommodal" data-ket="<?php echo e($value->keterangan_status); ?>" data-id='<?php echo e($value->id); ?>' data-overlaySpeed="100" data-overlayColor="#36404a" class="btn btn-sm btn-primary waves-effect waves-light ket_modal"><i class="fa fa-eye"></i></a>
              <?php elseif(auth()->check() && auth()->user()->hasRole('admin')): ?>
              Tidak Tersedia
              <?php endif; ?>

            </td>
           
            <?php elseif($value->status_pengajuan == 'gagal'): ?>
            <td><span class="badge badge-danger"><?php echo e(strtoupper($value->status_pengajuan)); ?></span></td>
            <td>

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

<div id="upload-laporan-modal" class="modal-demo">
  <button type="button" class="close" onclick="Custombox.close();">
    <span>&times;</span><span class="sr-only">Close</span>
  </button>

  <div class="custom-modal-text">

    <div class="text-center">
      <h4 class="text-uppercase font-bold mb-0">Upload Laporan Magang</h4>
    </div>
    <div class="text-left">
    <form class="form-horizontal m-t-20" enctype="multipart/form-data" action="<?php echo e(route('pengajuanMagang.upload')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <input type="hidden" id="id" name="id_pengajuan">

        <div class="form-group row">
          <label class="col-sm-3 col-form-label">URL Laporan</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="url_laporan" required placeholder="Link laporan yang telah di upload di Google Drive"/>
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

<script type="text/javascript">
  $('.ket_modal').click(function() {
    var id = $(this).data('id');
    var ket = $(this).data('ket');

    $('#keterangan').val(ket)
    $('#ref_edit').attr('href', '<?php echo e(url("pengajuan-magang/edit")); ?>/' + id)


  });

  $('.tolak_modal').click(function() {
    var id = $(this).data('id');
    var nama = $(this).data('nama');
    var nim = $(this).data('nim');
    $('#tolak_id').val(id)
    $('#tolak_nama').val(nama)
    $('#tolak_nim').val(nim)
  });

  $('.upload_laporan_modal').click(function() {
    var id = $(this).data('id');
    $('#id').val(id)
  });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SIMA UP2KT\resources\views/umum/pengajuan/index.blade.php ENDPATH**/ ?>