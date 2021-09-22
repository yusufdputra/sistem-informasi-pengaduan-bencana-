<div class="left side-menu">
  <div class="sidebar-inner slimscrollleft">

    <!-- User -->
    <div class="user-box">
      <div class="user-img">
        <img src="{{asset('adminto/images/users/avatar-1.jpg')}}" alt="user-img" title="Mat Helme" class="rounded-circle img-thumbnail img-responsive">
        <div class="user-status online"><i class="mdi mdi-adjust"></i></div>
      </div>
      <h5><a href="#"> {{ Auth::user()->nomor_induk }}</a> </h5>
      <ul class="list-inline">


        <li class="list-inline-item">
          <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
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
          <a href="{{('/')}}" class="waves-effect"><i class="mdi mdi-view-dashboard"></i> <span> Dashboard </span> </a>
        </li>
        @role('admin')

        <li class="has_sub">
          <a href="javascript:void(0);" class="waves-effect"><i class=" mdi mdi-account-multiple"></i> <span> User Management </span> <span class="fa menu-arrow"></span></a>
          <ul class=" list-unstyled">
            <li><a href="{{route ('user.index', 'mahasiswa')}}">Mahasiswa</a></li>
            <li><a href="{{route ('user.index', 'dosen')}}">Dosen</a></li>
          </ul>
        </li>

        <li>
          <a href="{{route ('periode.index')}}" class="waves-effect"><i class="fa fa-calendar"></i> <span> Periode Magang </span> </a>
        </li>
        
        <li>
          <a href="{{route ('prodi.index')}}" class="waves-effect"><i class="fa fa-server"></i> <span> Program Studi </span> </a>
        </li>

        <li>
          <a href="{{route ('pengajuanMagang.index')}}" class="waves-effect"><i class="fa fa-address-card-o"></i> <span> Pengajuan Magang </span> </a>
        </li>
        <li>
          <a href="{{route ('riwayat.index')}}" class="waves-effect"><i class="fa fa-history"></i> <span> Riwayat Magang </span> </a>
        </li>

        @endrole


        @role('mahasiswa')
        <li>
          <a href="{{route ('pengajuanMagang.index')}}" class="waves-effect"><i class="fa fa-address-card-o"></i> <span> Magang </span> </a>
        </li>
        @endrole

        @role('dosen')
        <li>
          <a href="{{route ('mahasiswa.index')}}" class="waves-effect"><i class="fa fa-group "></i> <span> Mahasiswa Bimbingan </span> </a>
        </li>
        @endrole






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

</div>