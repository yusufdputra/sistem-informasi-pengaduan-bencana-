@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card-box table-responsive">

      <div class="alert alert-success">

        @if($status_daftar != null)
        Pendaftaran BUKA.
        @else
        Pendaftaran TUTUP.
        @endif

        @role('mahasiswa')
        @if($status_magang != null)
        Silahkan Upload Berkas Laporan Jika Telah Selesai.
        @endif
        @endrole

      </div>

      @role('mahasiswa')


      @if($status_daftar != null)
      @if ( $status == null)
      <div class="align-items-center">
        <a href="{{route('pengajuanMagang.tambah')}}" class="btn btn-primary m-l-10 waves-light  mb-2">Tambah</a>
      </div>
      @endif
      @endif
      @endrole

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
            @role('admin')
            <th>NIM</th>
            <th>Nama Mahasiswa</th>
            @endrole
            <th>Nama Sekolah</th>
            <th>Tanggal Pelaksanaan</th>
            <th>Dosen Pembimbing</th>
            <th>Nilai Magang</th>
            <th>Status Pengajuan</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($pengajuan AS $key=>$value)
          <tr>
            <td>{{$key+1}}</td>
            @role('admin')
            <td>{{$value->mhs->user->nomor_induk}}</td>
            <td>{{$value->mhs->nama}}</td>
            @endrole
            <td>{{$value->nama_sekolah}}</td>
            <td>{{$value->tanggal_pelaksanaan}}</td>
            <td>
              @if($value->id_dosen == null)
              Belum Ditentukan
              @else
              {{$value->dsn->nama}}
              @endif
            </td>
            <td>
              @if($value->nilai_pembimbing == null)
              Tidak Ada Nilai
              @else
              {{$value->nilai_pembimbing}}
              @endif
            </td>



            @if($value->status_pengajuan == 'proses')
            <td><span class="badge badge-primary">{{strtoupper($value->status_pengajuan)}}</span></td>
            <td>
              @role('mahasiswa')
              Tidak Tersedia
              @elserole('admin')
              <a href="{{route('pengajuanMagang.detail', $value->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
              @endrole
            </td>

            @elseif ($value->status_pengajuan == 'diterima' || $value->status_pengajuan == 'selesai')
            <td><span class="badge badge-success">{{strtoupper($value->status_pengajuan)}}</span></td>
            <td>
              @if($status_magang == null)
              Tidak Tersedia
              @else
              @if($value->url_laporan != null)
              <a href="{{$value->url_laporan}}" target="_BLANK" class="btn btn-sm btn-purple waves-effect waves-light upload_laporan_modal"><i class="fa fa-file-pdf-o"></i></a>
              @endif
              @role('mahasiswa')
              <a href="#upload-laporan-modal" data-animation="sign" data-plugin="custommodal" data-id='{{$value->id}}' data-overlaySpeed="100" data-overlayColor="#36404a" class="btn btn-sm btn-primary waves-effect waves-light upload_laporan_modal"><i class="fa fa-upload"></i></a>
              @endrole
              @endif
            </td>
            @elseif ($value->status_pengajuan == 'ditolak')
            <td><span class="badge badge-danger">{{strtoupper($value->status_pengajuan)}}</span></td>
            <td>
              @role('mahasiswa')
              <a href="#ket-modal" data-animation="sign" data-plugin="custommodal" data-ket="{{$value->keterangan_status}}" data-id='{{$value->id}}' data-overlaySpeed="100" data-overlayColor="#36404a" class="btn btn-sm btn-primary waves-effect waves-light ket_modal"><i class="fa fa-eye"></i></a>
              @endrole
            </td>
           
            @elseif ($value->status_pengajuan == 'gagal')
            <td><span class="badge badge-danger">{{strtoupper($value->status_pengajuan)}}</span></td>
            <td>

            </td>
            @endif

          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<div id="ket-modal" class="modal-demo">
  <button type="button" class="close" onclick="Custombox.close();">
    <span>&times;</span><span class="sr-only">Close</span>
  </button>

  <div class="custom-modal-text">

    <div class="text-center">
      <h4 class="text-uppercase font-bold mb-0">Keterangan Pengajuan Magang</h4>
    </div>
    <div class="text-left">
      <form class="form-horizontal m-t-20">
        @csrf
        <input type="hidden" id="ket_id" name="id_pengajuan">

        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Keterangan</label>
          <div class="col-sm-8">
            <textarea type="text" readonly class="form-control" id="keterangan" required placeholder="Alasan penolakan"></textarea>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" onclick="Custombox.close();" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
          <a id="ref_edit" class="btn btn-primary waves-effect waves-light">Perbaiki</a>
        </div>


      </form>

    </div>
  </div>

</div>

<div id="upload-laporan-modal" class="modal-demo">
  <button type="button" class="close" onclick="Custombox.close();">
    <span>&times;</span><span class="sr-only">Close</span>
  </button>

  <div class="custom-modal-text">

    <div class="text-center">
      <h4 class="text-uppercase font-bold mb-0">Upload Laporan Magang</h4>
    </div>
    <div class="text-left">
    <form class="form-horizontal m-t-20" enctype="multipart/form-data" action="{{route('pengajuanMagang.upload')}}" method="POST">
        @csrf
        <input type="hidden" id="id" name="id_pengajuan">

        <div class="form-group row">
          <label class="col-sm-3 col-form-label">URL Laporan</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="url_laporan" required placeholder="Link laporan yang telah di upload di Google Drive"/>
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
  $('.ket_modal').click(function() {
    var id = $(this).data('id');
    var ket = $(this).data('ket');

    $('#keterangan').val(ket)
    $('#ref_edit').attr('href', '{{url("pengajuan-magang/edit")}}/' + id)


  });

  $('.tolak_modal').click(function() {
    var id = $(this).data('id');
    var nama = $(this).data('nama');
    var nim = $(this).data('nim');
    $('#tolak_id').val(id)
    $('#tolak_nama').val(nama)
    $('#tolak_nim').val(nim)
  });

  $('.upload_laporan_modal').click(function() {
    var id = $(this).data('id');
    $('#id').val(id)
  });
</script>

@endsection