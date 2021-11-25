@extends('layouts.app')

@section('content')

<div class="page-inner mt--5">
  <div class="row">
    <div class="col-md-12">
      <div class="card full-height">
        <div class="card-body">
          <div class="card-title">Menu Layanan</div>
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
          <!-- <div class="card-category">Sistem Informasi Desa Sidomulyo</div> -->
          <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">

            <div class="col-sm-6 col-md-3">

              <a href="{{route('pengaduan.tambah')}}">
                <div class=" card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div class="icon-big text-center icon-primary bubble-shadow-small">
                          <i class="flaticon-chat-8"></i>
                        </div>
                      </div>
                      <div class=" col col-stats ml-3 ml-sm-0">
                        <div class="numbers">
                          <p class="card-category">Pengaduan <br>Bencana</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>



            <div class="col-sm-6 col-md-3">
              <a href="{{('/')}}">
                <div class=" card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div class="icon-big text-center icon-primary bubble-shadow-small">
                          <i class="flaticon-user-2"></i>
                        </div>
                      </div>
                      <div class=" col col-stats ml-3 ml-sm-0">
                        <div class="numbers">
                          <p class="card-category">Cooming Soon</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>

            <div class="col-sm-6 col-md-3">
              <a href="{{('/')}}">
                <div class=" card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div class="icon-big text-center icon-primary bubble-shadow-small">
                          <i class="flaticon-file-1"></i>
                        </div>
                      </div>
                      <div class=" col col-stats ml-3 ml-sm-0">
                        <div class="numbers">
                          <p class="card-category">Cooming Soon</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card full-height">
        <div class="card-header">
          <div class="card-head-row">
            <div class="card-title">Riwayat Pengaduan Masyarakat</div>

          </div>
        </div>
        <div class="card-body">
          @foreach($data['pengaduan'] as $key=>$value)

          <div class="d-flex">
            <div class="avatar ">
              <span class="avatar-title rounded-circle border border-white bg-info">{{strtoupper(mb_substr($value->warga->nama,0,1))}}</span>
            </div>
            <div class="flex-1 ml-3 pt-1">
              @if($value->status == 'proses')
              @php ($type = "text-primary")
              @elseif($value->status == 'terima')
              @php ($type = "text-success")
              @else
              @php ($type = "text-danger")
              @endif
              <h6 class="text-uppercase fw-bold mb-1">{{$value->warga->nama}} <span class="{{$type}} pl-3">{{ucfirst($value->status)}}</span></h6>
              <span class="text-muted">
                @if($value->id_bencana == 12)
                {{ucwords( $value->bencana_lain)}}
                @else
                {{ucwords($value->bencana->nama)}}
                @endif
                - {{$value->daerah->nama}} - {{$value->almt_lengkap}} - 

                @if($value->status == 'tolak')
                Alasan penolakan: {{$value->alasan_tolak}}
                @endif
                <!-- <a href="{{route('pengaduan/detail',$value->id)}}" class="btn btn-link">
                  <span class="btn-label">
                    <i class="fa fa-eye"></i>
                  </span>
                  Detail
                </a> -->
              </span>
            </div>
            <div class="float-right pt-1">
              <small class="text-muted">{{$value->updated_at->diffForHumans()}}</small>
            </div>
          </div>
          <div class="separator-dashed"></div>
          @endforeach

        </div>
      </div>
    </div>
  </div>
</div>




@endsection