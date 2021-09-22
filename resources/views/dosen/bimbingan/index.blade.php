@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card-box table-responsive">

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
            <th>NIM</th>
            <th>Nama Mahasiswa</th>
            <th>Nama Sekolah</th>
            <th>Tanggal Pelaksanaan</th>
            <th>Nilai Magang</th>
            <th>Status Magang</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($mhs AS $key=>$value)
          <tr>
            <td>{{$key+1}}</td>
            <td>{{$value->mhs->user->nomor_induk}}</td>
            <td>{{$value->mhs->nama}}</td>
            <td>{{$value->nama_sekolah}}</td>
            <td>{{$value->tanggal_pelaksanaan}}</td>
            <td>
              @if($value->nilai_pembimbing == null)
              Tidak Ada Nilai
              @else
              {{$value->nilai_pembimbing}}
              @endif
            </td>
            @if ($value->status_pengajuan == 'selesai')
            <td><span class="badge badge-success">{{strtoupper($value->status_pengajuan)}}</span></td>
            <td>
              <a href="#input-nilai-modal" data-animation="sign" data-nama="{{$value->mhs->nama}}" data-nim="{{$value->mhs->user->nomor_induk}}" data-plugin="custommodal" data-id='{{$value->id}}' data-overlaySpeed="100" data-overlayColor="#36404a" class="btn btn-sm btn-purple waves-effect waves-light input_nilai_modal"><i class="fa fa-edit"></i></a>
            </td>
            @elseif ($value->status_pengajuan == 'gagal')
            <td><span class="badge badge-danger">{{strtoupper($value->status_pengajuan)}}</span></td>
            <td>
              Tidak Tersedia
            </td>
            @elseif ($value->status_pengajuan == 'diterima')
            <td><span class="badge badge-primary">PROSES</span></td>
            <td>
              Tidak Tersedia
            </td>
            @endif

          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<div id="input-nilai-modal" class="modal-demo">
  <button type="button" class="close" onclick="Custombox.close();">
    <span>&times;</span><span class="sr-only">Close</span>
  </button>

  <div class="custom-modal-text">

    <div class="text-center">
      <h4 class="text-uppercase font-bold mb-0">Nilai Mahasiswa</h4>
    </div>
    <div class="text-left">
      <form class="form-horizontal m-t-20" enctype="multipart/form-data" action="{{route('pengajuanMagang.nilai')}}" method="POST">
        @csrf
        <input type="hidden" id="id" name="id_pengajuan">
        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Nama Lengkap</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" readonly id="nama" />
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-4 col-form-label">NIM</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" readonly id="nim" />
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Nilai</label>
          <div class="col-sm-8">
            <select required class="form-control" name="nilai_pembimbing">
              <option disabled selected>...Pilih...</option>
              <option value="A">A</option>
              <option value="A-">A-</option>
              <option value="B+">B+</option>
              <option value="B">B</option>
              <option value="B-">B-</option>
              <option value="C+">C+</option>
              <option value="C">C</option>
              <option value="D">D</option>
              <option value="E">E</option>
            </select>
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

<script type="text/javascript">
  $('.input_nilai_modal').click(function() {
    var id = $(this).data('id');
    var nama = $(this).data('nama');
    var nim = $(this).data('nim');

    $('#id').val(id)
    $('#nama').val(nama)
    $('#nim').val(nim)

  });
</script>

@endsection