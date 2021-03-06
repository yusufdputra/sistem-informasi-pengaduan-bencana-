@extends('layouts.app')

@section('content')
<div class="page-inner mt--5">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="row">

            <h4 class="card-title ml-2">Data Admin</h4>
            <button type="button" data-toggle="modal"  href="#modal_tambah" class="btn btn-primary btn-sm ml-2"><i class="fas fa-user-plus"></i> Tambah</button>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">

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

            <table id="basic-datatables" class="display table table-striped table-hover" cellspacing="0" width="100%">

              <thead>
                <tr>
                  <th>No.</th>
                  <th>Username</th>
                  <th>Tanggal Pembuatan</th>
                  <th>Kata Sandi</th>
                  <th>Hapus</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data['admin'] AS $key=>$value)
                <tr>
                  <td>{{$key+1}}</td>
                  <td>{{$value->username}}</td>
                  <td>{{\Carbon\Carbon::parse($value->created_at)->formatLocalized('%A %d %B %Y')}} </td>
                  <td>
                    <button type="button" data-toggle="modal" data-id="{{$value->id}}" href="#modal_pw" class="btn btn-warning btn-sm ml-2 modal_pw"><i class="fas fa-lock-open"></i></button>
                  </td>
                  <td>
                    <button type="button" data-toggle="modal" data-id="{{$value->id}}" href="#modal_hapus" class="btn btn-danger btn-sm ml-2 modal_hapus"><i class="fas fa-trash-alt"></i></button>
                  </td>

                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="modal_tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Akun Admin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form class="form-horizontal m-t-20" action="{{route('user.store')}}" method="POST">
          @csrf


          <div class="form-group">
            <label for="">Username</label>
            <div class="col-xs-12">
              <input class="form-control" type="text" minlength="5" autocomplete="off" name="username" required="" placeholder="Masukkan username">
            </div>
          </div>
          <div class="form-group">
            <label for="">Kata Sandi</label>
            <div class="col-xs-12">
              <input class="form-control" type="text" minlength="5" autocomplete="off" name="password" required="" placeholder="Masukkan Kata Sandi Baru">
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" onclick="Custombox.close();" class="btn btn-default waves-effect" data-dismiss="modal">Batalkan</button>
            <button type="submit" class="btn btn-success waves-effect waves-light">Tambah</button>
          </div>


        </form>
      </div>

    </div>
  </div>
</div>



<div class="modal fade" id="modal_pw" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Atur Ulang Kata Sandi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form class="form-horizontal m-t-20" action="{{route('user.resetpw')}}" method="POST">
          @csrf
          <input type="hidden" name="id" id="pw_id">


          <div class="form-group">
            <label for="">Kata Sandi Baru</label>
            <div class="col-xs-12">
              <input class="form-control" type="text" minlength="5" autocomplete="off" name="password" required="" placeholder="Masukkan Kata Sandi Baru">
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" onclick="Custombox.close();" class="btn btn-default waves-effect" data-dismiss="modal">Batalkan</button>
            <button type="submit" class="btn btn-success waves-effect waves-light">Ubah</button>
          </div>


        </form>
      </div>

    </div>
  </div>
</div>

<div class="modal fade" id="modal_hapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Hapus Akun Admin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form class="form-horizontal m-t-20" enctype="multipart/form-data" action="{{route('user.hapus')}}" method="POST">
          @csrf
          <div>
            <input type="hidden" id='id_hapus' name='id'>
            <h5 id="exampleModalLabel">Apakah anda yakin ingin mengapus akun ini?</h5>
          </div>

          <div class="modal-footer">
            <button type="button" onclick="Custombox.close();" class="btn btn-default waves-effect" data-dismiss="modal">Batalkan</button>
            <button type="submit" class="btn btn-success waves-effect waves-light">Hapus</button>
          </div>


        </form>
      </div>

    </div>
  </div>
</div>


<script type="text/javascript">
  $('.modal_hapus').click(function() {
    var id = $(this).data('id');
    $('#id_hapus').val(id);
  });

  $('.modal_pw').click(function() {
    var id = $(this).data('id');
    $('#pw_id').val(id);
  });


</script>

@endsection