

<?php $__env->startSection('content'); ?>
<?php if(auth()->check() && auth()->user()->hasRole('admin')): ?>
<div class="row">

  <div class="col-xl-5 col-md-6">
    <div class="card-box">
      <h4 class="header-title mt-0 m-b-30">Total Pendaftaran</h4>
      <div class="widget-box-2">
        <div class="text-center">
          <h2 class="mb-0"> <?php echo e($jml_daftar); ?> </h2>
          <p class="text-muted m-b-25">Mahasiswa</p>
        </div>
        <div class="progress progress-bar-danger-alt progress-sm mb-0">
          <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-5 col-md-6">
    <div class="card-box">
      <h4 class="header-title mt-0 m-b-30">Total Selesai</h4>
      <div class="widget-box-2">
        <div class="widget-detail-2">
          <span class="badge badge-success badge-pill pull-left m-t-20">
            <?php if($jml_daftar != 0): ?>
            <?php echo e(round(($jml_selesai/$jml_daftar)*100)); ?>% 
            <?php else: ?>
            0%
            <?php endif; ?>
            <i class="mdi mdi-trending-up"></i> </span>
          <h2 class="mb-0"> <?php echo e($jml_selesai); ?> </h2>
          <p class="text-muted m-b-25">Mahasiswa</p>
        </div>
        <div class="progress progress-bar-success-alt progress-sm mb-0">
          <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

<?php endif; ?>

<div class="card-box ">
  <div class="alert alert-success">
    Periode Saat Ini :
    <?php if($status_daftar != null): ?>
    Pendaftaran.
    <?php elseif($status_magang != null): ?>
    Pelaksanaan PLP.
    <?php else: ?>
    Tidak Ada
    <?php endif; ?>

  </div>


  <h2><strong>FAKULTAS KEGURUAN DAN ILMU PENDIDIKAN UMRI</strong></h2>
  <div class="col-lg-12 row">
    <div class="col-lg-4 col-xs-12 right">
      <img src="<?php echo e(asset('adminto/images/brand/logo-big.png')); ?>" width="80%" class="" alt="profile-image">
    </div>
    <div class="col-lg-8 col-xs-12">
      <h4><strong>VISI</strong></h4>
      <p>Menjadikan Fakultas KIP UMRI sebagai penghasil tenaga pendidik dan kependidikan yang bermarwah, bermartabat, dan menguasai IPTEKS yang berlandaskan IMTAQ tahun 2030</p>

      <h4><strong>MISI</strong></h4>
      <ol>
        <li>Menyelenggarakanpendidikandanpengajaran yang bermutu untuk menghasilkan tenaga pendidik dan kependidikan yang unggul dan berkepribadian islami.</li>
        <li>Menyelenggarakan kegiatan penelitian di bidang pendidikan, keguruan, dan teknologi yang bermanfaat bagi pengembangan masyarakat.</li>
        <li>Melaksanakan kegiatan pengabdian pada masyarakat untuk mewujudkan masyarakat yang cerdas, kreatif, dan sejahtera.</li>
        <li>Menyelenggarakan kerjasama dengan berbagai pihak untuk meningkatkan mutu kinerja fakultas.</li>
        <li>Menyelenggarakan tatakelola kelembagaan secara efektif dan efesien untuk menunjang peningkatan mutu fakultas.</li>
      </ol>
    </div>


  </div>


</div>





<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SIMA UP2KT\resources\views/home.blade.php ENDPATH**/ ?>