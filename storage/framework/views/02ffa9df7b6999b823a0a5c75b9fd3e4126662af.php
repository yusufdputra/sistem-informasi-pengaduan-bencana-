

<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-12">
    <div class="card-box table-responsive">

      <div class="align-items-center row">
        <a href="<?php echo e(route('pengajuanMagang.index')); ?>" class="btn btn-danger m-l-10 waves-light  mb-2">Kembali</a>
        <h3 class="m-l-10">Periode : <?php echo e(date('d-F-Y', strtotime($periode['mulai_magang']))); ?> s/d <?php echo e(date('d-F-Y', strtotime($periode['akhir_magang']))); ?>

        </h3>
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
        <input type="hidden" name="id_mahasiswa" value="<?php echo e($mhs['id']); ?>">
        <input type="hidden" name="tanggal_pelaksanaan" value="<?php echo e(date('d-F-Y', strtotime($periode['mulai_magang']))); ?> s/d <?php echo e(date('d-F-Y', strtotime($periode['akhir_magang']))); ?>">
        <div class="row">
          <div class="col-xl-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Nama Lengkap</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" value="<?php echo e($mhs['nama']); ?>" name="nama" required placeholder="Ketikkan sesuatu..." />
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-3 col-form-label">NIM</label>
              <div class="col-sm-6">
                <input type="text" value="<?php echo e($mhs->user['nomor_induk']); ?>" class="form-control" name="nim" required placeholder="Ketikkan sesuatu..." />
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Alamat</label>
              <div class="col-sm-6">
                <textarea type="text" class="form-control" required name="alamat" placeholder="Ketikkan sesuatu..."><?php echo e($mhs['alamat']); ?></textarea>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Program Studi</label>
              <div class="col-sm-6">
                <select required class="form-control" name="id_prodi">
                  <?php $__currentLoopData = $prodi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($value->id); ?>" <?= $mhs['id_prodi'] == $value->id ? 'selected' : ''; ?>><?php echo e(Str::upper($value->nama)); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Kelas</label>
              <div class="col-sm-6">
                <select required class="form-control" name="kelas">
                  <option value="a" <?= $mhs['kelas'] == 'a' ? 'selected' : ''; ?>>REGULER A</option>
                  <option value="b" <?= $mhs['kelas'] == 'b' ? 'selected' : ''; ?>>REGULER B</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Nilai IPK</label>
              <div class="col-sm-6">
                <input data-parsley-type="number" max="4" min="0" type="text" name="ipk" class="form-control" required placeholder="Gunakan titik (.)" />
              </div>
            </div>
          </div><!-- end col -->

          <div class="col-xl-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Sudah mengikuti dan lulus mata kuliah</label>
              <div class="col-sm-6">
                <select required class="form-control" name="matkul_pilihan">
                  <option value="Pisiskologi dan perkembangan peserta didik">Pisiskologi dan perkembangan peserta didik</option>
                  <option value="Pengembangan kurikulum dan pembelajaran">Pengembangan kurikulum dan pembelajaran</option>
                  <option value="Microteaching">Microteaching</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Nilai Mata Kuliah</label>
              <div class="col-sm-6">
                <select required class="form-control" name="nilai_matkul">
                  <option disabled>...Pilih...</option>
                  <option value="A">A</option>
                  <option value="A-">A-</option>
                  <option value="B+">B+</option>
                  <option value="B">B</option>
                  <option value="B-">B-</option>
                  <option value="C+">C+</option>
                  <option value="C">C</option>
                  <option value="D">D</option>
                  <option value="E">E</option>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Nama Tempat Magang</label>
              <div class="col-sm-6">
                <textarea required placeholder="Nama Sekolah" name="nama_sekolah" class="form-control"></textarea>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Unggah Transkrip Nilai/KHS</label>
              <div class="col-sm-6">
                <input type="file" accept=".pdf" name="trankrip" class="form-control" required />
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Kuisioner</label>
              <div class="col-sm-6">
                <div class="checkbox checkbox-custom">
                  <input required id="checkbox-signup" type="checkbox" checked="checked">
                  <label for="checkbox-signup">Sudah Mengisi Kuisioner <a target="_BLANK" href="#">Lihat Kuisioner</a></label>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <div class="offset-sm-3 col-sm-9 m-t-15">
                <button type="submit" class="btn btn-primary waves-effect waves-light">
                  Submit
                </button>
                <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                  Reset
                </button>
              </div>
            </div>
          </div>
        </div><!-- end row -->
      </form>

    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SIMA UP2KT\resources\views/mahasiswa/pengajuan/tambah.blade.php ENDPATH**/ ?>