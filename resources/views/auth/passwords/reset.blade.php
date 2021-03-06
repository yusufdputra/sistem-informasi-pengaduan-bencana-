@extends('layouts.app')

@section('content')
<div class="page-inner mt--5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{$data['title']}}</h4>
                </div>
                <div class="card-body">

                    @if(\Session::has('alert'))
                    <div class="alert alert-danger">
                        <div>{{Session::get('alert')}}</div>
                    </div>
                    @endif

                    @if(\Session::has('success'))
                    <div class="alert alert-success">
                        <div>{{Session::get('success')}}</div>
                    </div>
                    @endif
                    <form class="form-horizontal m-t-20 parsley-examples" enctype="multipart/form-data" action="{{route('katasandi.reset')}}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label class=" col-form-label">Kata Sandi Lama</label>


                            <input type="password" name="pass_lama" autocomplete="off" class="form-control col-12" data-parsley-minlength="5" name="pass_old" required placeholder="Masukkan kata sandi lama anda" />


                        </div>

                        <div class="form-group ">
                            <label class=" col-form-label">Kata Sandi Baru</label>


                            <input id="hori-pass1" name="pass_baru" type="password" data-parsley-minlength="5" placeholder="Kata Sandi Baru" required class="form-control col-12" />


                        </div>
                        <div class="form-group">
                            <label class=" col-form-label">Konfirmasi Kata Sandi Baru</label>


                            <input data-parsley-equalto="#hori-pass1" data-parsley-minlength="5" type="password" required placeholder="Konfirmasi Kata Sandi Baru" class="form-control col-12" id="hori-pass2" />


                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">update</button>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection