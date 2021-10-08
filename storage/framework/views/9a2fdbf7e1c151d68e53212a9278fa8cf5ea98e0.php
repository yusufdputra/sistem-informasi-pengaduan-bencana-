

<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-12">
    <div class="card-box table-responsive">

      <div class="align-items-center row">
        <a href="<?php echo e(route('pengajuanMagang.index')); ?>" class="btn btn-danger m-l-10 waves-light  mb-2">Kembali</a>
      </div>

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
      <form class="p-20" enctype="multipart/form-data" action="<?php echo e(route('pengajuanMagang.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="row">
          <div class="col-xl-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Nama Lengkap</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" readonly value="<?php echo e($pengajuan->mhs->nama); ?>" />
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-3 col-form-label">NIM</label>
              <div class="col-sm-6">
                <input type="text" value="<?php echo e($pengajuan->mhs->user->nomor_induk); ?>" readonly class="form-control" />
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Alamat</label>
              <div class="col-sm-6">
                <textarea type="text" class="form-control" readonly required><?php echo e($pengajuan->mhs->alamat); ?></textarea>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Program Studi</label>
              <div class="col-sm-6">
                <input type="text" value="<?php echo e($pengajuan->mhs->prodi->nama); ?>" readonly class="form-control" />
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Kelas</label>
              <div class="col-sm-6">
                <input type="text" value="Reguler <?php echo e(strtoupper($pengajuan->mhs->kelas)); ?>" readonly class="form-control" />
              </div>
            </div>


            <!-- <div class="form-group row">
              <label class="col-sm-3 col-form-label">Nama Tempat Magang</label>
              <div class="col-sm-6">
                <textarea required readonly class="form-control"><?php echo e($pengajuan->nama_sekolah); ?></textarea>
              </div>
            </div> -->

          </div><!-- end col -->

          <div class="col-xl-6">
            <div class="form-group row">
              <label class="col-sm-12 col-form-label text-danger">Sudah mengikuti dan lulus mata kuliah</label>
              <div class="col-sm-12">
                <div class="form-group row">
                  <label class="col-sm-6 col-form-label">Psikologi dan Perkembangan Peserta Didik</label>
                  <div class="col-sm-3">
                    <input data-parsley-type="number" value="<?php echo e($nilai_matkul[0]); ?>" type="text" readonly class="form-control" required />
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-6 col-form-label">Pengembangan kurikulum dan pembelajaran</label>
                  <div class="col-sm-3">
                    <input data-parsley-type="number" value="<?php echo e($nilai_matkul[1]); ?>" type="text" readonly class="form-control" required />
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-6 col-form-label">Microteaching</label>
                  <div class="col-sm-3">
                    <input data-parsley-type="number" value="<?php echo e($nilai_matkul[2]); ?>" type="text" readonly class="form-control" required />
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-6 col-form-label">Nilai IPK</label>
              <div class="col-sm-3">
                <input data-parsley-type="number" value="<?php echo e($pengajuan->ipk); ?>" type="text" readonly class="form-control" required />
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Transkrip Nilai/KHS</label>
              <div class="col-sm-6">
                <a href="\storage\<?php echo e($pengajuan->url_transkrip); ?>" target="_BLANK" class="btn btn-rounded btn-info btn-sm"><i class="fa fa-file-pdf-o"> Lihat</i></a>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Kuisioner</label>
              <div class="col-sm-6">
                <div class="checkbox checkbox-custom">
                  <input disabled id="checkbox-signup" type="checkbox" checked="checked">
                  <label for="checkbox-signup">Sudah Mengisi Kuisioner <a target="_BLANK" href="<?php echo e(route('kuisioner',$pengajuan->mhs->id)); ?>">Lihat Kuisioner</a></label>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <div class="offset-sm-3 col-sm-9 m-t-15">
                <a href="#terima-modal" data-animation="sign" data-plugin="custommodal" data-nama="<?php echo e($pengajuan->mhs->nama); ?>" data-nim="<?php echo e($pengajuan->mhs->user->nomor_induk); ?>" data-id='<?php echo e($pengajuan->id); ?>' data-overlaySpeed="100" data-overlayColor="#36404a" class="btn btn-success waves-effect waves-light terima_modal">Terima</a>

                <a href="#tolak-modal" data-animation="sign" data-plugin="custommodal" data-nama="<?php echo e($pengajuan->mhs->nama); ?>" data-nim="<?php echo e($pengajuan->mhs->user->nomor_induk); ?>" data-id='<?php echo e($pengajuan->id); ?>' data-overlaySpeed="100" data-overlayColor="#36404a" class="btn btn-secondary waves-effect waves-light tolak_modal">Tolak</a>

              </div>
            </div>
          </div>
        </div><!-- end row -->
      </form>

    </div>
  </div>
</div>

<div id="terima-modal" class="modal-demo">
  <button type="button" class="close" onclick="Custombox.close();">
    <span>&times;</span><span class="sr-only">Close</span>
  </button>

  <div class="custom-modal-text">

    <div class="text-center">
      <h4 class="text-uppercase font-bold mb-0">Terima Pengajuan Magang</h4>
    </div>
    <div class="text-left">
      <form class="form-horizontal m-t-20" enctype="multipart/form-data" action="<?php echo e(route('pengajuanMagang.proses')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <input type="hidden" id="terima_id" name="id_pengajuan">
        <input type="hidden" name="proses" value="diterima">
        <input type="hidden" name="keterangan" value="-">

        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Nama Lengkap</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" readonly id="terima_nama" />
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-4 col-form-label">NIM</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" readonly id="terima_nim" />
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Silahkan Pilih Dosen Pembimbing</label>
          <div class="col-sm-8">
            <select required class="form-control" name="id_dosen">
              <?php $__currentLoopData = $dosen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($value->id); ?>"><?php echo e(Str::upper($value->nama)); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
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

<div id="tolak-modal" class="modal-demo">
  <button type="button" class="close" onclick="Custombox.close();">
    <span>&times;</span><span class="sr-only">Close</span>
  </button>

  <div class="custom-modal-text">

    <div class="text-center">
      <h4 class="text-uppercase font-bold mb-0">Tolak Pengajuan Magang</h4>
    </div>
    <div class="text-left">
      <form class="form-horizontal m-t-20" enctype="multipart/form-data" action="<?php echo e(route('pengajuanMagang.proses')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <input type="hidden" id="tolak_id" name="id_pengajuan">
        <input type="hidden" name="proses" value="ditolak">

        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Nama Lengkap</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" readonly id="tolak_nama" />
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-4 col-form-label">NIM</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" readonly id="tolak_nim" />
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Keterangan</label>
          <div class="col-sm-8">
            <textarea type="text" class="form-control" required placeholder="Alasan penolakan" name="keterangan"></textarea>
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
  $('.terima_modal').click(function() {
    var id = $(this).data('id');
    var nama = $(this).data('nama');
    var nim = $(this).data('nim');
    $('#terima_id').val(id)
    $('#terima_nama').val(nama)
    $('#terima_nim').val(nim)

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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SIMA UP2KT\resources\views/admin/pengajuan/detail.blade.php ENDPATH**/ ?>