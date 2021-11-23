@include('layouts.header')
<!-- Begin page -->

@include('layouts.topbar')

@include('layouts.sidebar')



<div class="main-panel">
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">{{$data['title']}}</h2>
                        <h5 class="text-white op-7 mb-2">Selamat Datang di {{config('app.name')}}</h5>
                    </div>
                </div>
            </div>
        </div>
        @yield('content')
    </div>
    <footer class="footer">
        <div class="container-fluid">
            <div class="copyright ml-auto">
                2021, <i class="fa fa-heart heart text-danger"></i> by <a href="#">Kantor Camat Tambang </a>
            </div>
        </div>
    </footer>
</div>
@include('layouts.footer')