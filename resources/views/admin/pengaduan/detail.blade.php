@extends('layouts.app')

@section('content')


<div class="page-inner mt--5">
  <div class="row">
    <div class="col-md-12">
      <div class="card full-height">
        <div class="card-body">
          <div class="card-title">
            <a href="{{('/')}}" class=" btn btn-warning btn-sm">
              <span class="btn-label">
                <i class="fas fa-angle-double-left"></i>
              </span>
              Kembali
            </a>
          </div>


          <!-- <div class="card-category">Sistem Informasi Desa Sidomulyo</div> -->
          <div class="pb-2 pt-4">
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
            <input type="hidden" name="id" id="">
            <div class="row">

              <div class="col-lg-12">
                <div class="card-header">
                  <div class="card-title">Data Warga</div>
                </div>
                <div class="row">
                  <input type="hidden" id="id_pengaduan" value="{{ $data['pengaduan']->id }}">

                  <div class="col-lg-6 col-md-12">
                    <div class="form-group">
                      <label for="">NIK</label>

                      <input type="number" disabled class="form-control " value="{{ $data['pengaduan']->nik_warga }}" placeholder="Sesuai KTP" label="">

                    </div>

                    <div class="form-group">
                      <label for="">Nama</label>
                      <input type="text" disabled class="form-control @error('nama') is-invalid @enderror" value="{{ $data['pengaduan']->warga->nama }}" id="nama" name="nama" placeholder="Sesuai KTP">
                    </div>

                    <div class="form-group">
                      <label for="">Alamat</label>
                      <textarea type="text" disabled class="form-control @error('alamat') is-invalid @enderror" value="" id="alamat" name="alamat" placeholder="Alamat saat ini" rows="3">{{ $data['pengaduan']->warga->alamat }}</textarea>
                    </div>
                  </div>

                  <div class="col-lg-6 col-md-12">
                    <div class="form-group">
                      <label for="">Nomor Hp</label>
                      <input type="text" disabled class="form-control @error('no_hp') is-invalid @enderror" value="{{ $data['pengaduan']->warga->no_hp }}" id="no_hp" name="no_hp" placeholder="Nomor Aktif">
                    </div>
                    <div class="form-group">
                      <label for="">Foto KTP</label>
                      <div class="input-group">
                        <figure class="imagecheck-figure">
                          <img src="../../storage/{{$data['pengaduan']->warga->foto_ktp}}" height="200" alt="title" id="ktp_view" class="imagecheck-image">
                        </figure>

                      </div>
                    </div>
                  </div>

                </div>
              </div>

              <div class="col-lg-12">
                <div class="card-header">
                  <div class="card-title">Data Bencana</div>
                </div>
                <div class="row">

                  <div class="col-lg-6 col-md-12">

                    <div class="form-group">
                      <label for="">Nama Bencana</label>
                      @if($data['pengaduan']->id_bencana != 12)
                      <input type="text" disabled class="form-control " value="{{ $data['pengaduan']->bencana->nama }}" id="" name="" placeholder="">
                      @else
                      <input type="text" disabled class="form-control " value="{{ $data['pengaduan']->bencana_lain }}" id="" name="" placeholder="">

                      @endif

                    </div>



                    <div class="clear-fix"></div>

                    <div class="form-group">
                      <label for="">Daerah Kejadian</label>
                      <input type="text" disabled class="form-control " value="{{ $data['pengaduan']->daerah->nama }}" id="" name="" placeholder="">
                    </div>

                    <div class="form-group">
                      <label for="">Alamat Kejadian</label>
                      <textarea type="text" disabled class="form-control @error('alamat_kjd') is-invalid @enderror" rows="3">{{$data['pengaduan']->almt_lengkap}}</textarea>
                    </div>


                    <div class="form-group">
                      <label for="">Tanggal Kejadian</label>
                      <input type="text" disabled class="form-control " value="{{date('d-F-Y', strtotime($data['pengaduan']->tgl_kejadian))}}" id="" name="" placeholder="">
                    </div>
                    <div class="form-group">
                      <label for="">Jam Kejadian</label>
                      <input type="text" disabled class="form-control " value="{{date('h:i:sa', strtotime($data['pengaduan']->jam_kejadian))}}" id="" name="" placeholder="">
                    </div>

                    <div class="form-group">
                      <label for="">Penyebab</label>
                      <input type="text" disabled class="form-control " value="{{ $data['pengaduan']->penyebab }}" id="" name="" placeholder="">
                    </div>

                    <div class="form-group">
                      <label for="">Jenis Kerusakan</label>
                      <textarea type="text" disabled class="form-control @error('alamat_kjd') is-invalid @enderror" rows="3">{{$data['pengaduan']->jns_kerusakan}}</textarea>
                    </div>
                    <div class="form-group">
                      <label for="">Penanggulangan</label>
                      <textarea type="text" disabled class="form-control @error('alamat_kjd') is-invalid @enderror" rows="3">{{$data['pengaduan']->penanggulangan}}</textarea>
                    </div>
                    <div class="form-group">
                      <label for="">Bantuan</label>
                      <textarea type="text" disabled class="form-control @error('alamat_kjd') is-invalid @enderror" rows="3">{{$data['pengaduan']->bantuan}}</textarea>
                    </div>

                    <div class="form-group">
                      <label for="">Kerugian</label>
                      <input type="text" disabled class="form-control " value="{{ $data['pengaduan']->kerugian }}" id="" name="" placeholder="">
                    </div>

                    <div class="form-group">
                      <label for="">Keterangan Lebih Lanjut</label>
                      <textarea type="text" disabled class="form-control @error('alamat_kjd') is-invalid @enderror" rows="3">{{$data['pengaduan']->keterangan}}</textarea>
                    </div>
                  </div>

                  <div class="col-lg-6 col-md-12">
                    <div class="card-header">
                      <div class="card-title">Data Korban</div>
                    </div>

                    @foreach($data['korban'] as $key => $value)
                    <div class="form-group">
                      <label for="">Jumlah Korban {{strtoupper($value->jenis)}}</label>
                      <input type="text" disabled class="form-control " value="{{ $value->jumlah }}" id="" name="" placeholder="">
                    </div>

                    <div class="form-group">
                      <label for="">Keterangan Korban {{strtoupper($value->jenis)}}</label>
                      <textarea type="text" disabled class="form-control " rows="3">{{$value->keterangan}}</textarea>
                    </div>

                    @endforeach


                    <div class="card-header">
                      <div class="card-title">Foto Lokasi Bencana (4 sisi)</div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="">Sisi 1</label>
                          <div class="input-group">
                            <img src="../../storage/{{$data['pengaduan']->foto1}}" height="150" alt="title" id="" class="imagecheck-image">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="">Sisi 2</label>
                          <div class="input-group">
                            <img src="../../storage/{{$data['pengaduan']->foto2}}" height="150" alt="title" id="" class="imagecheck-image">
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-6">

                        <div class="form-group">
                          <label for="">Sisi 3</label>
                          <div class="input-group">
                            <img src="../../storage/{{$data['pengaduan']->foto3}}" height="150" alt="title" id="" class="imagecheck-image">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="">Sisi 4</label>
                          <div class="input-group">
                            <img src="../../storage/{{$data['pengaduan']->foto4}}" height="150" alt="title" id="" class="imagecheck-image">
                          </div>
                        </div>
                      </div>
                    </div>




                  </div>
                </div>
              </div>


              <div class=" col-lg-12 mt-2 card-action">
                <div class="row">

                  
                  <a data-toggle="modal" href="#modal_tolak" data-id="{{$data['pengaduan']->id}}" class="btn btn-danger tolak">Tolak Pengaduan</a>
                  <a data-toggle="modal" href="#modal_terima" data-id="{{$data['pengaduan']->id}}" class="btn btn-success terima ml-2">Terima Pengaduan</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal_tolak" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tolak Pengaduan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal m-t-20" enctype="multipart/form-data" action="{{route('pengaduan.updateStatus')}}" method="POST">
          @csrf
          <div>
            <input type="hidden" id='id_tolak' name='id'>
            <input type="hidden" value="tolak" name="status" id="">
            <h5 id="exampleModalLabel">Apakah anda yakin ingin menolak pengaduan ini?</h5>
          </div>

          <div class="form-group">
            <label for="">Alasan Penolakan</label>
            <textarea type="text" class="form-control" id="alasan_tolak" required name="alasan_tolak" required autocomplete="off" aria-autocomplete="off" placeholder="Jelaskan secara rinci" rows="5"></textarea>
          </div>

          <div class="modal-footer">
            <button type="button" onclick="Custombox.close();" class="btn btn-warning waves-effect" data-dismiss="modal">Batalkan</button>
            <button type="submit" class="btn btn-success waves-effect waves-light">Tolak</button>
          </div>


        </form>
      </div>

    </div>
  </div>
</div>


<div class="modal fade" id="modal_terima" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Terima Pengaduan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal m-t-20" enctype="multipart/form-data" action="{{route('pengaduan.updateStatus')}}" method="POST">
          @csrf
          <div>
            <input type="hidden" id='id_terima' name='id'>
            <input type="hidden" value="terima" name="status" id="">
            <input type="hidden" name="alasan_tolak"  id="">
            <h5 id="exampleModalLabel">Pastikan data telah terkonfirmasi dengan benar</h5>
          </div>

          <div class="modal-footer">
            <button type="button" onclick="Custombox.close();" class="btn btn-warning waves-effect" data-dismiss="modal">Batalkan</button>
            <button type="submit" class="btn btn-success waves-effect waves-light">Terima</button>
          </div>


        </form>
      </div>

    </div>
  </div>
</div>

<script>

</script>



<script type="text/javascript">
  $('.terima').click(function() {
    var id = $(this).data('id');
    $('#id_terima').val(id);
  });
  $('.tolak').click(function() {
    var id = $(this).data('id');
    $('#id_tolak').val(id);
  });
</script>


@endsection