@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card-box table-responsive">

      <div class="align-items-center row">
        <a href="{{route('pengajuanMagang.index')}}" class="btn btn-danger m-l-10 waves-light  mb-2">Kembali</a>
      </div>

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
      <form class="p-20" enctype="multipart/form-data" action="{{route('pengajuanMagang.store')}}" method="POST">
        @csrf
        <div class="row">
          <div class="col-xl-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Nama Lengkap</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" readonly value="{{$pengajuan->mhs->nama}}" />
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-3 col-form-label">NIM</label>
              <div class="col-sm-6">
                <input type="text" value="{{$pengajuan->mhs->user->nomor_induk}}" readonly class="form-control" />
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Alamat</label>
              <div class="col-sm-6">
                <textarea type="text" class="form-control" readonly required>{{$pengajuan->mhs->alamat}}</textarea>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Program Studi</label>
              <div class="col-sm-6">
                <input type="text" value="{{$pengajuan->mhs->prodi->nama}}" readonly class="form-control" />
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Kelas</label>
              <div class="col-sm-6">
                <input type="text" value="Reguler {{strtoupper($pengajuan->mhs->kelas)}}" readonly class="form-control" />
              </div>
            </div>


            <!-- <div class="form-group row">
              <label class="col-sm-3 col-form-label">Nama Tempat Magang</label>
              <div class="col-sm-6">
                <textarea required readonly class="form-control">{{$pengajuan->nama_sekolah}}</textarea>
              </div>
            </div> -->

          </div><!-- end col -->

          <div class="col-xl-6">
            <div class="form-group row">
              <label class="col-sm-12 col-form-label text-danger">Sudah mengikuti dan lulus mata kuliah</label>
              <div class="col-sm-12">
                <div class="form-group row">
                  <label class="col-sm-6 col-form-label">Psikologi dan Perkembangan Peserta Didik</label>
                  <div class="col-sm-3">
                    <input data-parsley-type="number" value="{{$nilai_matkul[0]}}" type="text" readonly class="form-control" required />
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-6 col-form-label">Pengembangan kurikulum dan pembelajaran</label>
                  <div class="col-sm-3">
                    <input data-parsley-type="number" value="{{$nilai_matkul[1]}}" type="text" readonly class="form-control" required />
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-6 col-form-label">Microteaching</label>
                  <div class="col-sm-3">
                    <input data-parsley-type="number" value="{{$nilai_matkul[2]}}" type="text" readonly class="form-control" required />
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-6 col-form-label">Nilai IPK</label>
              <div class="col-sm-3">
                <input data-parsley-type="number" value="{{$pengajuan->ipk}}" type="text" readonly class="form-control" required />
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Transkrip Nilai/KHS</label>
              <div class="col-sm-6">
                <a href="\storage\{{$pengajuan->url_transkrip}}" target="_BLANK" class="btn btn-rounded btn-info btn-sm"><i class="fa fa-file-pdf-o"> Lihat</i></a>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Kuisioner</label>
              <div class="col-sm-6">
                <div class="checkbox checkbox-custom">
                  <input disabled id="checkbox-signup" type="checkbox" checked="checked">
                  <label for="checkbox-signup">Sudah Mengisi Kuisioner <a target="_BLANK" href="{{route('kuisioner',$pengajuan->mhs->id)}}">Lihat Kuisioner</a></label>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <div class="offset-sm-3 col-sm-9 m-t-15">
                <a href="#terima-modal" data-animation="sign" data-plugin="custommodal" data-nama="{{$pengajuan->mhs->nama}}" data-nim="{{$pengajuan->mhs->user->nomor_induk}}" data-id='{{$pengajuan->id}}' data-overlaySpeed="100" data-overlayColor="#36404a" class="btn btn-success waves-effect waves-light terima_modal">Terima</a>

                <a href="#tolak-modal" data-animation="sign" data-plugin="custommodal" data-nama="{{$pengajuan->mhs->nama}}" data-nim="{{$pengajuan->mhs->user->nomor_induk}}" data-id='{{$pengajuan->id}}' data-overlaySpeed="100" data-overlayColor="#36404a" class="btn btn-secondary waves-effect waves-light tolak_modal">Tolak</a>

              </div>
            </div>
          </div>
        </div><!-- end row -->
      </form>

    </div>
  </div>
</div>

<div id="terima-modal" class="modal-demo">
  <button type="button" class="close" onclick="Custombox.close();">
    <span>&times;</span><span class="sr-only">Close</span>
  </button>

  <div class="custom-modal-text">

    <div class="text-center">
      <h4 class="text-uppercase font-bold mb-0">Terima Pengajuan PLP</h4>
    </div>
    <div class="text-left">
      <form class="form-horizontal m-t-20" enctype="multipart/form-data" action="{{route('pengajuanMagang.proses')}}" method="POST">
        @csrf
        <input type="hidden" id="terima_id" name="id_pengajuan">
        <input type="hidden" name="proses" value="diterima">
        <input type="hidden" name="keterangan" value="-">

        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Nama Lengkap</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" readonly id="terima_nama" />
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-4 col-form-label">NIM</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" readonly id="terima_nim" />
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Lokasi</label>
          <div class="col-sm-8">
            <select required id="get_sekolah" class="form-control" name="id_sekolah">
              <option value="" selected disabled hidden>Silahkan Pilih</option>
              @foreach ($sekolah as $key => $value)
              <option value="{{$value->id}}">{{Str::upper($value->nama)}}</option>
              @endforeach
            </select>
            <span class="help-block text-danger"><small>Jumlah yang sudah PLP : <span id="jml_magang"></span> Orang</small></span>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Silahkan Pilih Dosen Pembimbing</label>
          <div class="col-sm-8">
            <select required class="form-control" id="get_dosen" name="id_dosen">
              <option value="" selected disabled hidden>Silahkan Pilih</option>
              <optgroup id="dosen_rekomendasi" label="Dosen Rekomendasi">
              </optgroup>
              <optgroup id="dosen_tersedia" label="Dosen Tersedia">
             
              </optgroup>
            </select>
            <span class="help-block text-danger"><small>Jumlah anak bimbingan : <span id="jml_bimbingan"></span> Orang</small></span>
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

<div id="tolak-modal" class="modal-demo">
  <button type="button" class="close" onclick="Custombox.close();">
    <span>&times;</span><span class="sr-only">Close</span>
  </button>

  <div class="custom-modal-text">

    <div class="text-center">
      <h4 class="text-uppercase font-bold mb-0">Tolak Pengajuan PLP</h4>
    </div>
    <div class="text-left">
      <form class="form-horizontal m-t-20" enctype="multipart/form-data" action="{{route('pengajuanMagang.proses')}}" method="POST">
        @csrf
        <input type="hidden" id="tolak_id" name="id_pengajuan">
        <input type="hidden" name="proses" value="ditolak">

        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Nama Lengkap</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" readonly id="tolak_nama" />
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-4 col-form-label">NIM</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" readonly id="tolak_nim" />
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Keterangan</label>
          <div class="col-sm-8">
            <textarea type="text" class="form-control" required placeholder="Alasan penolakan" name="keterangan"></textarea>
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
  $('.terima_modal').click(function() {
    var id = $(this).data('id');
    var nama = $(this).data('nama');
    var nim = $(this).data('nim');
    $('#terima_id').val(id)
    $('#terima_nama').val(nama)
    $('#terima_nim').val(nim)

  });

  $('.tolak_modal').click(function() {
    var id = $(this).data('id');
    var nama = $(this).data('nama');
    var nim = $(this).data('nim');
    $('#tolak_id').val(id)
    $('#tolak_nama').val(nama)
    $('#tolak_nim').val(nim)
  });

  document.getElementById('get_sekolah').addEventListener("change", function() {
    $('#dosen_rekomendasi').html('')
    $('#dosen_tersedia').html('')
    $('#jml_magang').html('')
    $.ajax({
      url: '{{url("GetDosenRekomendasi")}}/' + this.value,
      type: 'GET',
      dataType: 'json',
      success: 'success',
      success: function(data) {
        $('#jml_magang').html(data['jml_magang'])
        if (data['dosen'] != null) {
          $('#dosen_rekomendasi').show()
          $('#dosen_tersedia').hide()

          var opt_dosen = new Option((data['dosen']['dsn']['nama']).toUpperCase(), data['dosen']['dsn']['id'])
          $('#dosen_rekomendasi').append(opt_dosen)
        } else {
          data['dosen_kosong'].forEach(element => {
            var opt_dosen = new Option((element['nama']).toUpperCase(), element['id'])
            $('#dosen_tersedia').append(opt_dosen)

          });
          $('#dosen_rekomendasi').hide()
          $('#dosen_tersedia').show()
        }
      },
      error: function(data) {
        toastr.error('Gagal memanggil data! ')
      }
    })
  })
  document.getElementById('get_dosen').addEventListener("change", function() {
    $('#jml_bimbingan').html('')
    $.ajax({
      url: '{{url("GetJumlahBimbingan")}}/' + this.value,
      type: 'GET',
      dataType: 'json',
      success: 'success',
      success: function(data) {
        $('#jml_bimbingan').html(data)

      },
      error: function(data) {
        toastr.error('Gagal memanggil data! ')
      }
    })
  })
</script>

@endsection