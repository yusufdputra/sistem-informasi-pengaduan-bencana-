@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card-box table-responsive">
      <div class="alert alert-success">
        <strong>
          Jadwal Saat Ini :
          @if($status_daftar != null)
          Pendaftaran
          @endif

          @if($status_magang != null)
          Magang
          @endif

          @if($status_daftar == null && $status_magang == null)
          Tidak Ada
          @endif
        </strong>
      </div>


      @if($status_daftar == null && $status_magang == null)
      <div class="align-items-center">

        <a href="#tambah-modal" data-animation="sign" data-plugin="custommodal" data-overlaySpeed="100" data-overlayColor="#36404a" class="btn btn-primary m-l-10 waves-light  mb-2">Tambah</a>

      </div>
      @endif




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

      <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">

        <thead>
          <tr>
            <th>No.</th>
            <th>Periode Pendaftaran</th>
            <th>Periode Magang</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($periode AS $key=>$value)
          <tr>
            <td>{{$key+1}}</td>
            <td>{{date('d-F-Y', strtotime($value['mulai_daftar']))}} s/d {{date('d-F-Y', strtotime($value['akhir_daftar']))}}</td>
            <td>{{date('d-F-Y', strtotime($value['mulai_magang']))}} s/d {{date('d-F-Y', strtotime($value['akhir_magang']))}}</td>

            <td>
              @if($value->akhir_magang < \Carbon\Carbon::now()) <span class="badge badge-success">Selesai</span>
                @endif
            </td>
            <td>
              <a href="#edit-modal" data-animation="sign" data-plugin="custommodal" data-id='{{$value->id}}' data-overlaySpeed="100" data-overlayColor="#36404a" class="btn btn-success btn-sm modal_edit"><i class="fa fa-edit"></i></a>
              <a href="#hapus-modal" data-animation="sign" data-plugin="custommodal" data-id='{{$value->id}}' data-overlaySpeed="100" data-overlayColor="#36404a" class="btn btn-danger btn-sm hapus"><i class="fa fa-trash"></i></a>


            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- end row -->
<div id="tambah-modal" class="modal-demo">
  <button type="button" class="close" onclick="Custombox.close();">
    <span>&times;</span><span class="sr-only">Close</span>
  </button>

  <div class="custom-modal-text">

    <div class="text-center">
      <h4 class="text-uppercase font-bold mb-0">Tambah Periode Magang</h4>
    </div>
    <div class="text-left">
      <form class="form-horizontal m-t-20" enctype="multipart/form-data" action="{{route('periode.store')}}" method="POST">
        @csrf

        <div class="form-group">
          <label class="col-sm-12">Periode Pendaftaran</label>
          <div class="col-sm-12">
            <div class="input-daterange input-group date-range" id="">
              <input type="text" autocomplete="off" required placeholder="Tanggal Mulai" class="form-control" name="daftar_start" />
              <input type="text" autocomplete="off" required placeholder="Tanggal Berakhir" class="form-control" name="daftar_end" />
            </div>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-12">Periode Magang</label>
          <div class="col-sm-12">
            <div class="input-daterange input-group date-range" id="">
              <input type="text" autocomplete="off" required placeholder="Tanggal Mulai" class="form-control" name="magang_start" />
              <input type="text" autocomplete="off" required placeholder="Tanggal Berakhir" class="form-control" name="magang_end" />
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" onclick="Custombox.close();" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary waves-effect waves-light">Save changes</button>
        </div>


      </form>

    </div>
  </div>

</div>

<div id="edit-modal" class="modal-demo">
  <button type="button" class="close" onclick="Custombox.close();">
    <span>&times;</span><span class="sr-only">Close</span>
  </button>

  <div class="custom-modal-text">

    <div class="text-center">
      <h4 class="text-uppercase font-bold mb-0">Edit Kategori</h4>
    </div>
    <div class="text-left">

      <form class="form-horizontal m-t-20" enctype="multipart/form-data" action="{{route('periode.store')}}" method="POST">
        @csrf
        <input type="hidden" name="id" id="edit_id">
        <div class="form-group">
          <label class="col-sm-12">Periode Pendaftaran</label>
          <div class="col-sm-12">
            <div class="input-daterange input-group date-range" id="">
              <input type="text" autocomplete="off" required placeholder="Tanggal Mulai" class="form-control" id="daftar_start" name="daftar_start" />
              <input type="text" autocomplete="off" required placeholder="Tanggal Berakhir" class="form-control" id="daftar_end" name="daftar_end" />
            </div>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-12">Periode Magang</label>
          <div class="col-sm-12">
            <div class="input-daterange input-group date-range" id="">
              <input type="text" autocomplete="off" required placeholder="Tanggal Mulai" class="form-control" id="magang_start" name="magang_start" />
              <input type="text" autocomplete="off" required placeholder="Tanggal Berakhir" class="form-control" id="magang_end" name="magang_end" />
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" onclick="Custombox.close();" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary waves-effect waves-light">Save changes</button>
        </div>

      </form>

    </div>
  </div>

</div>

<div id="hapus-modal" class="modal-demo">
  <button type="button" class="close" onclick="Custombox.close();">
    <span>&times;</span><span class="sr-only">Close</span>
  </button>

  <div class="custom-modal-text">

    <div class="text-center">
      <h4 class="text-uppercase font-bold mb-0">Hapus Periode</h4>
    </div>
    <div class="">

      <form class="form-horizontal m-t-20" enctype="multipart/form-data" action="{{route('periode.hapus')}}" method="POST">
        @csrf
        <div>
          <input type="hidden" id='id_hapus' name='id'>
          <h5 id="exampleModalLabel">Apakah anda yakin ingin mengapus periode ini?</h5>
        </div>

        <div class="modal-footer">
          <button type="button" onclick="Custombox.close();" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary waves-effect waves-light">Save changes</button>
        </div>


      </form>

    </div>
  </div>

</div>

<script type="text/javascript">
  $('.modal_edit').click(function() {
    var id = $(this).data('id');
    $('#edit_id').val(id)

    $.ajax({
      url: '{{url("getPeriodeById")}}/' + id,
      type: 'GET',
      dataType: 'json',
      success: 'success',
      success: function(data) {
        console.log(data);
        $('#daftar_start').val(data['mulai_daftar'])
        $('#daftar_end').val(data['akhir_daftar'])
        $('#magang_start').val(data['mulai_magang'])
        $('#magang_end').val(data['akhir_magang'])
      },
      error: function(data) {
        toastr.error('Gagal memanggil data! ')
      }
    })

  });

  $('.hapus').click(function() {
    var id = $(this).data('id');
    $('#id_hapus').val(id);
  });
</script>
@endsection