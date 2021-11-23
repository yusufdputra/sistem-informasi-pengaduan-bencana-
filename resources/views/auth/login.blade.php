@include('layouts.header')
<div class="main-panel">
    <div class="content">

        <div class="page-inner mt-5">
            <div class="row justify-content-center align-items-center mb-1">

                <div class="col-md-3 pl-md-0 pr-md-0">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="card ">
                            <div class="card-header">
                                <h3 class="card-title text-center  ">Masuk</h3>

                            </div>
                            <div class="card-body">
                                <div class="p-20">


                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <label for="username">Username</label>
                                            <input placeholder="Username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="off" autofocus>

                                            @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-xs-12">


                                        <label for="username">Kata Sandi</label>
                                            <input placeholder="Kata Sandi" type="password" class="form-control @error('password') is-invalid @enderror" name="password" data-toggle="password" required autocomplete="current-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>




                                </div>


                            </div>
                            <div class="card-footer">
                                <div class="form-group text-center m-t-30">
                                    <div class="col-xs-12">
                                        <button class="btn btn-success btn-bordred btn-block waves-effect waves-light" type="submit">Masuk</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 text-center">
                                        <p class="text-muted"><a href="{{route('/')}}" class="text-primary m-l-5"><b>Kembali</b></a></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@include('layouts.footer')