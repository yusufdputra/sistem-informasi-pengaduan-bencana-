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

      <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">

        <thead>
          <tr>
            <th>No.</th>
            <th>NIM</th>
            <th>Nama Mahasiswa</th>
            <th>Nama Sekolah</th>
            <th>Tanggal Pelaksanaan</th>
            <th>Dosen Pembimbing</th>
            <th>Nilai Magang</th>
            <th>Laporan</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($riwayat AS $key=>$value)
          <tr>
            <td>{{$key+1}}</td>
            <td>{{$value->mhs->user->nomor_induk}}</td>
            <td>{{$value->mhs->nama}}</td>
            <td>{{$value->nama_sekolah}}</td>
            <td>
              {{date('d-F-Y', strtotime($value->periode->mulai_magang))}} s/d {{date('d-F-Y', strtotime($value->periode->akhir_magang))}}
            </td>
            <td>{{strtoupper($value->dsn->nama)}}</td>
            <td>{{$value->nilai_pembimbing}}</td>
            <td>
              @if($value->url_laporan != null)
              <a href="{{$value->url_laporan}}" target="_BLANK" class="btn btn-sm btn-purple waves-effect waves-light upload_laporan_modal"><i class="fa fa-file-pdf-o"></i></a>
              @endif
            </td>


          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<div id="cetak-modal" class="modal-demo">
  <button type="button" class="close" onclick="Custombox.close();">
    <span>&times;</span><span class="sr-only">Close</span>
  </button>

  <div class="custom-modal-text">

    <div class="text-center">
      <h4 class="text-uppercase font-bold mb-0">Cetak Data Peminjaman Barang</h4>
    </div>
    <div class="p-20 text-left">
      <form class="form-horizontal m-t-20" target="_BLANK" enctype="multipart/form-data" action="{{route('cetak')}}" method="POST">
        {{csrf_field()}}

        <input type="hidden" value="pinjam" name="jenis">

        <div class="form-group">
          <label for="">Dari Tanggal</label>
          <div class="col-xs-12">
            <div class="input-group-append">
              <input type="text" class="form-control datepicker-autoclose" placeholder="dd/mm/yyyy" autocomplete="off" name="start_date">
              <span class="input-group-text"><i class="ti-calendar"></i></span>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="">Sampai Tanggal</label>
          <div class="col-xs-12">
            <div class="input-group-append">
              <input type="text" class="form-control datepicker-autoclose" placeholder="dd/mm/yyyy" autocomplete="off" name="end_date">
              <span class="input-group-text"><i class="ti-calendar"></i></span>
            </div>
          </div>
        </div>

        <div class="form-group text-center m-t-30">
          <div class="col-xs-12">
            <button class="btn btn-success btn-bordred btn-block waves-effect waves-light" type="submit">Cetak</button>
          </div>
        </div>


      </form>

    </div>
  </div>

</div>


@endsection