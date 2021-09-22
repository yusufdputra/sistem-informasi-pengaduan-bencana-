@include('layouts.header')

<div class="account-pages"></div>
<div class="clearfix"></div>
<div class="wrapper-page">

    <div class="m-t-40 card-box">
        <div class="text-center">
            <img src="{{asset('adminto/images/brand/logo-big.png')}}" height="100px" alt="">
            <div class="text-center">
                <a href="index.html" class="logo"><span style="color: #61372b !important">SI-MA</span></a>
                <h5 class="text-muted m-t-0 font-600" style="color: #61372b !important">FAKULTAS KEGURUAN DAN ILMU PENDIDIKAN UMRI</h5>
            </div>
        </div>
        <div class="p-20">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <div class="col-xs-12">

                        <input placeholder="NIM/NIDN" type="text" class="form-control @error('nomor_induk') is-invalid @enderror" name="nomor_induk" value="{{ old('nomor_induk') }}" required autocomplete="off" autofocus>

                        @error('nomor_induk')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">


                        <input placeholder="Kata Sandi" type="password" class="form-control @error('password') is-invalid @enderror" name="password" data-toggle="password" required autocomplete="current-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group text-center m-t-30">
                    <div class="col-xs-12">
                        <button class="btn btn-success btn-bordred btn-block waves-effect waves-light" type="submit">Masuk</button>
                    </div>
                </div>
            </form>


        </div>

        <div class="row">
            <div class="col-sm-12 text-center">
                <p class="text-muted">Tidak Punya Akun? <a href="{{route('register')}}" class="text-primary m-l-5"><b>Daftar</b></a></p>
            </div>
        </div>
    </div>


</div>
<!-- end wrapper page -->



@include('layouts.footer')