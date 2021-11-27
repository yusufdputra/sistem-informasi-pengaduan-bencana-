@extends('layouts.app')

@section('content')
<div class="page-inner mt--5">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <h4 class="card-title ml-2">Data Kejadian Bencana</h4>
            <button type="button" data-toggle="modal" href="#modal_rekap" class="btn btn-success btn-sm ml-2">Rekap Pengaduan</button>
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
                  <th>Kode Pengaduan</th>
                  <th>NIK</th>
                  <th>Daerah</th>
                  <th>Nama Bencana</th>
                  <th>Waktu Kejadian</th>
                  <th>Tanggal Pengaduan</th>
                  <th>Penyebab</th>
                  <th>Detail</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data['pengaduan'] AS $key=>$value)
                <tr>
                  <td>{{$key+1}}</td>
                  <td>{{$value->kode}}</td>
                  <td>{{$value->warga->nik}}</td>
                  <td>{{$value->daerah->nama}}</td>
                  <td>
                    @if($value->id_bencana != 12)
                    {{$value->bencana->nama}}
                    @else
                    {{$value->bencana_lain}}
                    @endif
                  </td>
                  <td>{{\Carbon\Carbon::parse($value->tgl_kejadian)->formatLocalized('%A %d %B %Y')}} - {{date('h:i:s a', strtotime($value->jam_kejadian))}}</td>
                  <td>{{\Carbon\Carbon::parse($value->created_at)->formatLocalized('%d %B %Y')}} </td>
                  <td>{{$value->penyebab}}</td>

                  <td>
                    <a href="{{route('pengaduan/detail',$value->id)}}" class="btn btn-primary btn-sm "><i class="fa fa-eye"></i></a>
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

<div class="modal fade" id="modal_rekap" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Export Rekap Pengaduan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal m-t-20" enctype="multipart/form-data" action="{{route('pengaduan.rekap')}}" method="POST">
          @csrf

          <div class="form-group">
            <label for="basic-url">Pilih Tanggal</label>

            <input type="text"  class="form-control" id="range-datepicker" placeholder="Tanggal awal" name="range_tgl" required >

          </div>

          <div class="modal-footer">
            <button type="button" onclick="Custombox.close();" class="btn btn-warning waves-effect" data-dismiss="modal">Batalkan</button>
            <button type="submit" class="btn btn-success waves-effect waves-light">Export</button>
          </div>


        </form>
      </div>

    </div>
  </div>
</div>


@endsection