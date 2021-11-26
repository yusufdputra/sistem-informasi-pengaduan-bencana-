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
            <form action="{{route('pengaduan.store')}}" method="post" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="id" id="">
              <input type="hidden" name="id_warga" id="id_warga">
              <div class="row">

                <div class="col-lg-12">
                  <div class="card-header">
                    <div class="card-title">Data Warga</div>
                  </div>
                  <div class="row">

                    <div class="col-lg-6 col-md-12">
                      <div class="form-group">
                        <label for="">NIK</label>
                        <div class="input-group">

                          <input type="number" required autocomplete="off" aria-autocomplete="off" class="form-control @error('nik') is-invalid @enderror" value="{{ old('nik') }}" placeholder="Sesuai KTP" aria-label="" aria-describedby="basic-addon1" id="nik" name="nik">
                          <div class="input-group-prepend">
                            <button class="btn btn-success cari-nik" type="button">Cari Data</button>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" id="nama" name="nama" required autocomplete="off" aria-autocomplete="off" placeholder="Sesuai KTP">
                      </div>

                      <div class="form-group">
                        <label for="">Alamat</label>
                        <textarea type="text" class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat') }}" id="alamat" name="alamat" required autocomplete="off" aria-autocomplete="off" placeholder="Alamat saat ini" rows="3"></textarea>
                      </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                      <div class="form-group">
                        <label for="">Nomor Hp</label>
                        <input type="text" class="form-control @error('no_hp') is-invalid @enderror" value="{{ old('no_hp') }}" id="no_hp" name="no_hp" required autocomplete="off" aria-autocomplete="off" placeholder="Nomor Aktif">
                      </div>
                      <div class="form-group">
                        <label for="">Foto KTP</label>
                        <div class="input-group">
                          <figure class="imagecheck-figure">
                            <img src="{{asset('atlantis/img/upload.svg')}}" height="150" alt="title" id="ktp_view" class="imagecheck-image">
                          </figure>
                          <input type="hidden" name="foto_ktp_lama" id="foto_ktp_lama" value="">
                          <div class="row ml-3 mt-2">
                            <input type="file" data-plugins="dropify" accept="image/*" id="foto_ktp" name="foto_ktp" required />
                          </div>
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
                        <select class="form-control form-control" required name="id_bencana" id="id_bencana">
                          <option value="" selected disabled hidden>Silahkan Pilih</option>
                          @foreach ($data['bencana'] AS $key=>$value)

                          <option value="{{$value->id}}" <?= $data['pengaduan']['id_bencana'] == '$value->id' ? 'selected' : ''; ?>>{{$value->nama}}</option>
                          @endforeach
                        </select>
                      </div>

                      <div class="form-group has-error" id="bencana_lainnya" style="display: none;">
                        <label for="">Bencana Lainnya</label>
                        <input type="text" autocomplete="off" aria-autocomplete="off" class="form-control @error('bencana_lain') is-invalid @enderror" value="{{ old('bencana_lain') }}" placeholder="Bencana Lainnya" aria-label="" aria-describedby="basic-addon1" id="bencana_lain" name="bencana_lain">
                      </div>

                      <div class="clear-fix"></div>

                      <div class="form-group">
                        <label for="">Daerah Kejadian</label>
                        <select class="form-control form-control" required name="id_daerah" id="">
                          <option value="" selected disabled hidden>Silahkan Pilih</option>
                          @foreach ($data['daerah'] AS $key=>$value)

                          <option value="{{$value->id}}" <?= $data['pengaduan']['id_daerah'] == '$value->id' ? 'selected' : ''; ?>>{{$value->nama}}</option>
                          @endforeach
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="">Alamat Kejadian</label>
                        <textarea type="text" class="form-control @error('alamat_kjd') is-invalid @enderror" value="{{ old('alamat_kjd') }}" id="alamat_kjd" name="alamat_kjd" required autocomplete="off" aria-autocomplete="off" placeholder="Alamat Kejadian Bencana" rows="3"></textarea>
                      </div>


                      <div class="form-group">
                        <label for="">Tanggal Kejadian</label>
                        <input type="date" autocomplete="off" aria-autocomplete="off" class="form-control @error('tgl_kejadian') is-invalid @enderror" value="{{ old('tgl_kejadian') }}" placeholder="yyyy/mm/dd" aria-label="" aria-describedby="basic-addon1" id="tgl_kejadian" name="tgl_kejadian">
                      </div>
                      <div class="form-group">
                        <label for="">Jam Kejadian</label>
                        <input type="time" autocomplete="off" aria-autocomplete="off" class="form-control @error('jam_kejadian') is-invalid @enderror" value="{{ old('jam_kejadian') }}" placeholder="hh/mm" aria-label="" aria-describedby="basic-addon1" id="jam_kejadian" name="jam_kejadian">
                      </div>

                      <div class="form-group">
                        <label for="">Penyebab</label>
                        <input type="text" class="form-control @error('penyebab') is-invalid @enderror" value="{{ old('penyebab') }}" id="penyebab" name="penyebab" required autocomplete="off" aria-autocomplete="off" placeholder="Penyebab Kejadian Bencana">
                      </div>

                      <div class="form-group">
                        <label for="">Jenis Kerusakan</label>
                        <textarea type="text" class="form-control @error('jns_kerusakan') is-invalid @enderror" value="{{ old('jns_kerusakan') }}" id="jns_kerusakan" name="jns_kerusakan" required autocomplete="off" aria-autocomplete="off" placeholder="Jenis kerusakan yang terjadi" rows="3"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="">Penanggulangan</label>
                        <textarea type="text" class="form-control @error('penanggulangan') is-invalid @enderror" value="{{ old('penanggulangan') }}" id="penanggulangan" name="penanggulangan" required autocomplete="off" aria-autocomplete="off" placeholder="Penanggulangan yang telah dilakukan" rows="3"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="">Bantuan</label>
                        <textarea type="text" class="form-control @error('bantuan') is-invalid @enderror" value="{{ old('bantuan') }}" id="bantuan" name="bantuan" required autocomplete="off" aria-autocomplete="off" placeholder="Bantuan yang telah diterima" rows="3"></textarea>
                      </div>

                      <div class="form-group">
                        <label for="">Kerugian</label>
                        <input type="text" class="form-control @error('kerugian') is-invalid @enderror" value="{{ old('kerugian') }}" id="kerugian" name="kerugian" required autocomplete="off" aria-autocomplete="off" placeholder="Kerugian yang dialami">
                      </div>

                      <div class="form-group">
                        <label for="">Keterangan Lebih Lanjut</label>
                        <textarea type="text" class="form-control @error('keterangan') is-invalid @enderror" value="{{ old('keterangan') }}" id="keterangan" name="keterangan" required autocomplete="off" aria-autocomplete="off" placeholder="Keterangan Detail" rows="5"></textarea>
                      </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                      <div class="card-header">
                        <div class="card-title">Data Korban</div>
                      </div>
                      <div class="form-group">
                        <label for="">Jumlah Korban Meninggal Dunia</label>
                        <input type="number" required min="0" autocomplete="off" aria-autocomplete="off" class="form-control @error('jml_ninggal') is-invalid @enderror" value="{{ old('jml_ninggal') }}" placeholder="0" aria-label="" aria-describedby="basic-addon1" id="jml_ninggal" name="jml_ninggal">
                      </div>

                      <div class="form-group">
                        <label for="">Keterangan Korban Meninggal Dunia</label>
                        <textarea type="text" class="form-control @error('ket_ninggal') is-invalid @enderror" value="{{ old('ket_ninggal') }}" id="ket_ninggal" name="ket_ninggal" required autocomplete="off" aria-autocomplete="off" placeholder="Keterangan Korban Meninggal Dunia" rows="3"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="">Jumlah Korban Luka-Luka</label>
                        <input type="number" required min="0" autocomplete="off" aria-autocomplete="off" class="form-control @error('jml_luka') is-invalid @enderror" value="{{ old('jml_luka') }}" placeholder="0" aria-label="" aria-describedby="basic-addon1" id="jml_luka" name="jml_luka">
                      </div>

                      <div class="form-group">
                        <label for="">Keterangan Korban Luka-Luka</label>
                        <textarea type="text" class="form-control @error('ket_luka') is-invalid @enderror" value="{{ old('ket_luka') }}" id="ket_luka" name="ket_luka" required autocomplete="off" aria-autocomplete="off" placeholder="Keterangan Korban Luka-Luka" rows="3"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="">Jumlah Korban Hilang</label>
                        <input type="number" required min="0" autocomplete="off" aria-autocomplete="off" class="form-control @error('jml_hilang') is-invalid @enderror" value="{{ old('jml_hilang') }}" placeholder="0" aria-label="" aria-describedby="basic-addon1" id="jml_hilang" name="jml_hilang">
                      </div>

                      <div class="form-group">
                        <label for="">Keterangan Korban Hilang</label>
                        <textarea type="text" class="form-control @error('ket_hilang') is-invalid @enderror" value="{{ old('ket_hilang') }}" id="ket_hilang" name="ket_hilang" required autocomplete="off" aria-autocomplete="off" placeholder="Keterangan Korban Hilang" rows="3"></textarea>
                      </div>

                      <div class="card-header">
                        <div class="card-title">Foto Lokasi Bencana (4 sisi)</div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label for="">Sisi 1</label>
                            <div class="input-group">
                              <figure class="imagecheck-figure">
                                <img src="{{asset('atlantis/img/upload.svg')}}" height="150" alt="title" id="sisi_1_view" class="imagecheck-image">
                              </figure>

                              <input type="hidden" name="sisi_1_lama" id="">
                              <input type="file" class="form-control-file" accept="image/*" id="sisi_1" name="sisi_1" required autocomplete="off" aria-autocomplete="off" />
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="">Sisi 2</label>
                            <div class="input-group">
                              <figure class="imagecheck-figure">
                                <img src="{{asset('atlantis/img/upload.svg')}}" height="150" alt="title" id="sisi_2_view" class="imagecheck-image">
                              </figure>

                              <input type="hidden" name="sisi_2_lama" id="">
                              <input type="file" class="form-control-file" accept="image/*" id="sisi_2" name="sisi_2" required autocomplete="off" aria-autocomplete="off" />
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-6">

                          <div class="form-group">
                            <label for="">Sisi 3</label>
                            <div class="input-group">
                              <figure class="imagecheck-figure">
                                <img src="{{asset('atlantis/img/upload.svg')}}" height="150" alt="title" id="sisi_3_view" class="imagecheck-image">
                              </figure>

                              <input type="hidden" name="sisi_3_lama" id="">
                              <input type="file" class="form-control-file" accept="image/*" id="sisi_3" name="sisi_3" required autocomplete="off" aria-autocomplete="off" />
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="">Sisi 4</label>
                            <div class="input-group">
                              <figure class="imagecheck-figure">
                                <img src="{{asset('atlantis/img/upload.svg')}}" height="150" alt="title" id="sisi_4_view" class="imagecheck-image">
                              </figure>

                              <input type="hidden" name="sisi_4_lama" id="">
                              <input type="file" class="form-control-file" accept="image/*" id="sisi_4" name="sisi_4" required autocomplete="off" aria-autocomplete="off" />
                            </div>
                          </div>
                        </div>
                      </div>




                    </div>
                  </div>
                </div>


                <div class=" col-lg-12 mt-2 card-action">
                  <button type="submit" class="btn btn-success ">Kirim</button>

                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $('.cari-nik').click(function() {
    var nik = document.getElementById('nik').value
    var id_warga = $('#id_warga')
    var nama = $('#nama')
    var alamat = $('#alamat')
    var nomor_hp = $('#no_hp')
    var foto_ktp = $('#foto_ktp')
    var foto_ktp_lama = $('#foto_ktp_lama')
    var ktp_view = $('#ktp_view')

    if (nik.length != 0) {
      nama.val('')
      id_warga.val('')
      alamat.val('')
      nomor_hp.val('')
      foto_ktp_lama.val('')
      ktp_view.attr('src', '../atlantis/img/upload.svg')
      $.ajax({
        url: '{{url("getDataWarga")}}/' + nik,
        type: 'GET',
        dataType: 'json',
        success: 'success',
        success: function(data) {
          if (data == 0) {
            var pesan = "Data Tidak Ditemukan. Silahkan Isi Form dengan Benar!"
            alertWarning(pesan)
            nama.val('')
            id_warga.val('')
            alamat.val('')
            nomor_hp.val('')
            foto_ktp_lama.val('')
            foto_ktp.prop('required', true)
            ktp_view.attr('src', '../atlantis/img/upload.svg')
          } else {
            alertConfirmasiData(data, id_warga, nama, alamat, nomor_hp, foto_ktp_lama, ktp_view)
            foto_ktp.removeAttr('required')
          }

        },
        error: function(data) {
          var pesan = "Terjadi kesalahan saat mencari data!"
          alertError(pesan)
        }
      })
    } else {
      var pesan = "Silahkan isi NIK terlebih dahulu!"
      alertWarning(pesan)
    }


  });



  document.getElementById('id_bencana').addEventListener("change", function() {
    var id_bencana = document.getElementById('id_bencana')
    var input_lainnya = document.getElementById('bencana_lainnya')
    // get value
    if (id_bencana.value == 12) {
      input_lainnya.style.display = 'block'
    } else {
      input_lainnya.style.display = 'none'
    }
  })

  foto_ktp.onchange = evt => {
    const [file] = foto_ktp.files
    if (file) {
      ktp_view.src = URL.createObjectURL(file)
    }
  }
  sisi_1.onchange = evt => {
    const [file] = sisi_1.files
    if (file) {
      sisi_1_view.src = URL.createObjectURL(file)
    }
  }
  sisi_2.onchange = evt => {
    const [file] = sisi_2.files
    if (file) {
      sisi_2_view.src = URL.createObjectURL(file)
    }
  }
  sisi_3.onchange = evt => {
    const [file] = sisi_3.files
    if (file) {
      sisi_3_view.src = URL.createObjectURL(file)
    }
  }
  sisi_4.onchange = evt => {
    const [file] = sisi_4.files
    if (file) {
      sisi_4_view.src = URL.createObjectURL(file)
    }
  }
</script>


@endsection