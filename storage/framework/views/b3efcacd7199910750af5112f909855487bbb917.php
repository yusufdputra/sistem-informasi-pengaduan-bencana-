

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
        <input type="hidden" name="id_pengajuan" <?php if($pengajuan !=null): ?> value="<?php echo e($pengajuan->id); ?>" <?php endif; ?>>
        <input type="hidden" name="url_transkrip_lama" <?php if($pengajuan !=null): ?> value="<?php echo e($pengajuan->url_transkrip); ?>" <?php endif; ?>>
        <input type="hidden" name="id_mahasiswa" value="<?php echo e($mhs['id']); ?>">
        <input type="hidden" name="id_periode" value="<?php echo e($periode->id); ?>">
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
                <input data-parsley-type="number" <?php if($pengajuan !=null): ?> value="<?php echo e($pengajuan->ipk); ?>" <?php endif; ?> max="4" min="0" type="text" name="ipk" class="form-control" required placeholder="Gunakan titik (.)" />
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Nama Tempat Magang</label>
              <div class="col-sm-6">
                <textarea required placeholder="Nama Sekolah" name="nama_sekolah" class="form-control"><?php if($pengajuan != null): ?> <?php echo e($pengajuan->nama_sekolah); ?> <?php endif; ?></textarea>
              </div>
            </div>


          </div><!-- end col -->

          <div class="col-xl-6">
            <div class="form-group row">
              <label class="col-sm-12 col-form-label text-danger mb-1">Sudah mengikuti dan lulus mata kuliah</label>
              <div class="col-sm-12">
                <div class="form-group row">
                  <label class="col-sm-6 col-form-label">Psikologi dan Perkembangan Peserta Didik</label>
                  <div class="col-sm-3">
                    <select required class="form-control" name="nilai_matkul_1">
                      <option disabled>...Pilih...</option>
                      <option value="A" <?php if($pengajuan !=null): ?> <?= $nilai_matkul[0] == '' ? 'selected' : ''; ?> <?php endif; ?>>A</option>
                      <option value="B+" <?php if($pengajuan !=null): ?> <?= $nilai_matkul[0] == 'B+' ? 'selected' : ''; ?> <?php endif; ?>>B+</option>
                      <option value="A-" <?php if($pengajuan !=null): ?> <?= $nilai_matkul[0] == 'A-' ? 'selected' : ''; ?> <?php endif; ?>>A-</option>
                      <option value="B" <?php if($pengajuan !=null): ?> <?= $nilai_matkul[0] == 'B' ? 'selected' : ''; ?> <?php endif; ?>>B</option>
                      <option value="B-" <?php if($pengajuan !=null): ?> <?= $nilai_matkul[0] == 'B-' ? 'selected' : ''; ?> <?php endif; ?>>B-</option>
                      <option value="C+" <?php if($pengajuan !=null): ?> <?= $nilai_matkul[0] == 'C+' ? 'selected' : ''; ?> <?php endif; ?>>C+</option>
                      <option value="C" <?php if($pengajuan !=null): ?> <?= $nilai_matkul[0] == 'C' ? 'selected' : ''; ?> <?php endif; ?>>C</option>
                      <option value="D" <?php if($pengajuan !=null): ?> <?= $nilai_matkul[0] == 'D' ? 'selected' : ''; ?> <?php endif; ?>>D</option>
                      <option value="E" <?php if($pengajuan !=null): ?> <?= $nilai_matkul[0] == 'E' ? 'selected' : ''; ?> <?php endif; ?>>E</option>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-6 col-form-label">Pengembangan kurikulum dan pembelajaran</label>
                  <div class="col-sm-3">
                    <select required class="form-control" name="nilai_matkul_2">
                      <option disabled>...Pilih...</option>
                      <option value="A" <?php if($pengajuan !=null): ?> <?= $nilai_matkul[1] == '' ? 'selected' : ''; ?> <?php endif; ?>>A</option>
                      <option value="A-" <?php if($pengajuan !=null): ?> <?= $nilai_matkul[1] == 'A-' ? 'selected' : ''; ?> <?php endif; ?>>A-</option>
                      <option value="B+" <?php if($pengajuan !=null): ?> <?= $nilai_matkul[1] == 'B+' ? 'selected' : ''; ?> <?php endif; ?>>B+</option>
                      <option value="B" <?php if($pengajuan !=null): ?> <?= $nilai_matkul[1] == 'B' ? 'selected' : ''; ?> <?php endif; ?>>B</option>
                      <option value="B-" <?php if($pengajuan !=null): ?> <?= $nilai_matkul[1] == 'B-' ? 'selected' : ''; ?> <?php endif; ?>>B-</option>
                      <option value="C+" <?php if($pengajuan !=null): ?> <?= $nilai_matkul[1] == 'C+' ? 'selected' : ''; ?> <?php endif; ?>>C+</option>
                      <option value="C" <?php if($pengajuan !=null): ?> <?= $nilai_matkul[1] == 'C' ? 'selected' : ''; ?> <?php endif; ?>>C</option>
                      <option value="D" <?php if($pengajuan !=null): ?> <?= $nilai_matkul[1] == 'D' ? 'selected' : ''; ?> <?php endif; ?>>D</option>
                      <option value="E" <?php if($pengajuan !=null): ?> <?= $nilai_matkul[1] == 'E' ? 'selected' : ''; ?> <?php endif; ?>>E</option>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-6 col-form-label">Microteaching</label>
                  <div class="col-sm-3">
                    <select required class="form-control" name="nilai_matkul_3">
                      <option disabled>...Pilih...</option>
                      <option value="A" <?php if($pengajuan !=null): ?> <?= $nilai_matkul[2] == '' ? 'selected' : ''; ?> <?php endif; ?>>A</option>
                      <option value="A-" <?php if($pengajuan !=null): ?> <?= $nilai_matkul[2] == 'A-' ? 'selected' : ''; ?> <?php endif; ?>>A-</option>
                      <option value="B+" <?php if($pengajuan !=null): ?> <?= $nilai_matkul[2] == 'B+' ? 'selected' : ''; ?> <?php endif; ?>>B+</option>
                      <option value="B" <?php if($pengajuan !=null): ?> <?= $nilai_matkul[2] == 'B' ? 'selected' : ''; ?> <?php endif; ?>>B</option>
                      <option value="B-" <?php if($pengajuan !=null): ?> <?= $nilai_matkul[2] == 'B-' ? 'selected' : ''; ?> <?php endif; ?>>B-</option>
                      <option value="C+" <?php if($pengajuan !=null): ?> <?= $nilai_matkul[2] == 'C+' ? 'selected' : ''; ?> <?php endif; ?>>C+</option>
                      <option value="C" <?php if($pengajuan !=null): ?> <?= $nilai_matkul[2] == 'C' ? 'selected' : ''; ?> <?php endif; ?>>C</option>
                      <option value="D" <?php if($pengajuan !=null): ?> <?= $nilai_matkul[2] == 'D' ? 'selected' : ''; ?> <?php endif; ?>>D</option>
                      <option value="E" <?php if($pengajuan !=null): ?> <?= $nilai_matkul[2] == 'E' ? 'selected' : ''; ?> <?php endif; ?>>E</option>
                    </select>
                  </div>
                </div>


              </div>
            </div>

            <?php if($pengajuan != null): ?>


            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Transkrip Nilai/KHS</label>
              <div class="col-sm-6">
                <a href="\storage\<?php echo e($pengajuan->url_transkrip); ?>" target="_BLANK" class="col-sm-3 btn btn-rounded btn-info btn-sm"><i class="fa fa-file-pdf-o"> Lihat</i></a>

              </div>
            </div>
            <?php endif; ?>

            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Unggah Transkrip Nilai/KHS</label>
              <div class="col-sm-6">
                <?php if($pengajuan != null): ?>
                <input type="file" accept=".pdf" name="trankrip" class="form-control col-sm-6" />
                <?php else: ?>
                <input type="file" accept=".pdf" name="trankrip" class="form-control" required />
                <?php endif; ?>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Kuisioner</label>
              <div class="col-sm-6">
                <div class="checkbox checkbox-custom">
                  <input required id="checkbox-signup" type="checkbox" checked="checked">
                  <label for="checkbox-signup">Sudah Mengisi Kuisioner <a target="_BLANK" href="<?php echo e(route('kuisioner',$mhs->id)); ?>">Lihat Kuisioner</a></label>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <div class="offset-sm-3 col-sm-9 m-t-15">
                <button type="submit" class="btn btn-primary waves-effect waves-light">
                  Submit
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SIMA UP2KT\resources\views/mahasiswa/pengajuan/form.blade.php ENDPATH**/ ?>