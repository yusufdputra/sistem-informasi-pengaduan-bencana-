@extends('layouts.app')

@section('content')
<div class="page-inner mt--5">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Data Kejadian Bencana</h4>
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
                  <th>Waktu</th>
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
                  <td>{{date('d-F-Y', strtotime($value->tgl_kejadian))}} - {{date('h:i:sa', strtotime($value->jam_kejadian))}}</td>
                  <td>{{$value->penyebab}}</td>

                  <td>
                    <a href="{{route('pengaduan/detail',$value->id)}}"  class="btn btn-primary btn-sm "><i class="fa fa-eye"></i></a>
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


@endsection