<div class="left side-menu">
  <div class="sidebar-inner slimscrollleft">

    <!-- User -->
    <div class="user-box">
      <div class="user-img">
        <img src="<?php echo e(asset('adminto/images/users/avatar-1.jpg')); ?>" alt="user-img" title="Mat Helme" class="rounded-circle img-thumbnail img-responsive">
        <div class="user-status online"><i class="mdi mdi-adjust"></i></div>
      </div>
      <ul class="list-inline">
        <!-- get nama user login -->
        <?php if(auth()->check() && auth()->user()->hasRole('mahasiswa')): ?>
        <?php
        $user = App\Models\Mahasiswa::where('id_user', Auth::user()->id)->first()
        ?>
        <h5><a href="#"> <?php echo e($user->nama); ?></a> </h5>
        <?php endif; ?>
        <?php if(auth()->check() && auth()->user()->hasRole('dosen')): ?>
        <?php
        $user = App\Models\Dosen::where('id_user', Auth::user()->id)->first()
        ?>
        <h5><a href="#"> <?php echo e($user->nama); ?></a> </h5>
        <?php endif; ?>
        <?php if(auth()->check() && auth()->user()->hasRole('admin')): ?>
        <h5><a href="#"> ADMIN</a> </h5>
        <?php endif; ?>
        <li class="list-inline-item">
          <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
            <?php echo e(__('Logout')); ?>

          </a>

          <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
            <?php echo csrf_field(); ?>
          </form>
        </li>
      </ul>
    </div>
    <!-- End User -->

    <!--- Sidemenu -->
    <div id="sidebar-menu">
      <ul>
        <li class="text-muted menu-title">Navigation</li>
        <li>
          <a href="<?php echo e(('/')); ?>" class="waves-effect"><i class="mdi mdi-view-dashboard"></i> <span> Dashboard </span> </a>
        </li>
        <?php if(auth()->check() && auth()->user()->hasRole('admin')): ?>

        <li class="has_sub">
          <a href="javascript:void(0);" class="waves-effect"><i class=" mdi mdi-account-multiple"></i> <span> User Management </span> <span class="fa menu-arrow"></span></a>
          <ul class=" list-unstyled">
            <li><a href="<?php echo e(route ('user.index', 'mahasiswa')); ?>">Mahasiswa</a></li>
            <li><a href="<?php echo e(route ('user.index', 'dosen')); ?>">Dosen</a></li>
          </ul>
        </li>

        <li>
          <a href="<?php echo e(route ('periode.index')); ?>" class="waves-effect"><i class="fa fa-calendar"></i> <span> Periode PLP </span> </a>
        </li>

        <li>
          <a href="<?php echo e(route ('prodi.index')); ?>" class="waves-effect"><i class="fa fa-server"></i> <span> Program Studi </span> </a>
        </li>

        <li>
          <a href="<?php echo e(route ('pengajuanMagang.index')); ?>" class="waves-effect"><i class="fa fa-address-card-o"></i> <span> Pengajuan PLP </span> </a>
        </li>

        <li>
          <a href="<?php echo e(route ('sekolah.index')); ?>" class="waves-effect"><i class="fa fa-building-o"></i> <span> Data Sekolah </span> </a>
        </li>

        <li>
          <a href="<?php echo e(route ('riwayat.index')); ?>" class="waves-effect"><i class="fa fa-history"></i> <span> Riwayat PLP </span> </a>
        </li>

        <?php endif; ?>


        <?php if(auth()->check() && auth()->user()->hasRole('mahasiswa')): ?>
        <li>
          <a href="<?php echo e(route ('pengajuanMagang.index')); ?>" class="waves-effect"><i class="fa fa-address-card-o"></i> <span> PLP </span> </a>
        </li>
        <?php endif; ?>

        <?php if(auth()->check() && auth()->user()->hasRole('dosen')): ?>
        <li>
          <a href="<?php echo e(route ('mahasiswa.index')); ?>" class="waves-effect"><i class="fa fa-group "></i> <span> Mahasiswa Bimbingan </span> </a>
        </li>

        <li>
          <a href="<?php echo e(route ('riwayat.index')); ?>" class="waves-effect"><i class="fa fa-history"></i> <span> Riwayat PLP </span> </a>
        </li>
        <?php endif; ?>


      </ul>
      <div class="clearfix"></div>
    </div>
    <!-- Sidebar -->
    <div class="clearfix"></div>

  </div>

</div>
<!-- Left Sidebar End -->



<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">
  <!-- Start content -->
  <div class="content">
    <div class="container-fluid">


    </div> <!-- container -->

  </div> <!-- content -->

  <footer class="footer text-right">
    2021 - FAKULTAS KEGURUAN DAN ILMU PENDIDIKAN UMRI
  </footer>

</div><?php /**PATH C:\xampp\htdocs\SIMA UP2KT\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>