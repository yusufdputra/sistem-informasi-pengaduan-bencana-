@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card-box table-responsive">

      <div class="align-items-center row">
        <a href="{{route('pengajuanMagang.tambah')}}" class="btn btn-danger m-l-10 waves-light  mb-2">Kembali</a>

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
      <form class="p-20" enctype="multipart/form-data" action="{{route('kuisioner.store')}}" method="POST">
        @csrf
        <input type="hidden" name="id_mahasiswa" value="{{$mhs['id']}}">

        <div class="form-row">
          <div class="form-group col-md-6">
            <label class=" col-form-label">Nama Lengkap</label>
            <input type="text" class="form-control" value="{{$mhs['nama']}}" name="nama" required placeholder="Ketikkan sesuatu..." />
          </div>
          <div class="form-group col-md-6">
            <label class=" col-form-label">NIM</label>
            <input type="text" value="{{$mhs->user['nomor_induk']}}" class="form-control" name="nim" required placeholder="Ketikkan sesuatu..." />
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-12">
            <label class=" col-form-label">Bidang Peminatan Kompetensi PLP </label>
            <select required class="form-control" name="q_1">
              <option value="" selected disabled hidden>Silahkan Pilih</option>
              <option value="0">Teknik Komputer Jaringan - Pendidikan Informatika</option>
              <option value="1">Multimedia - Pendidikan Informatika</option>
              <option value="2">Rekayasa Perangkat Lunak - Pendidikan Informatika</option>
              <option value="3">Bahasa Inggris - Pendidikan Bahasa Inggris</option>
              <option value="4">IPA SMP - Pendidikan IPA</option>
              <option value="5">Teknik Audio Video - Pendidikan Vokasional Teknik Elektronik</option>
              <option value="6">Teknik Elektronika - Pendidikan Vokasional Teknik Elektronik</option>
              <option value="7">Elektronika Industri - Pendidikan Vokasional Teknik Elektronik</option>
              <option value="8">Mekatronika - Pendidikan Vokasional Teknik Elektronik</option>
            </select>
          </div>

          <div class="form-group col-md-12">
            <label class=" col-form-label">Dengan ini saya bersedia mengikuti segala tahapan pelaksanaan PLP FKIP UMRI 2021 dan ditempatkan dimana saja sesuia dengan pertimbangan UP2KT FKIP UMRI</label>
            <select required class="form-control" name="q_2">
              <option value="" selected disabled hidden>Silahkan Pilih</option>
              <option value="0">Bersedia</option>
              <option value="1">Tidak Bersedia</option>
            </select>
          </div>
        </div>

        <div class="clearfix">
          <h4 class="text-danger mb-1">Jawablah beberapa pertanyaan/pernyataan berikut ini</h4>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
            <label class=" col-form-label">Kemampuan saya dalam membuka pelajaran dan menutup pelajaran</label>
            <select required class="form-control" name="q_3">
              <option value="" selected disabled hidden>Silahkan Pilih</option>
              <option value="0">Sangat Baik</option>
              <option value="1">Baik</option>
              <option value="2">Cukup</option>
              <option value="3">Kurang Baik</option>
            </select>
          </div>

          <div class="form-group col-md-6">
            <label class=" col-form-label">Kemampuan saya dalam memberikan pertanyaan</label>
            <select required class="form-control" name="q_4">
              <option value="" selected disabled hidden>Silahkan Pilih</option>
              <option value="0">Sangat Baik</option>
              <option value="1">Baik</option>
              <option value="2">Cukup</option>
              <option value="3">Kurang Baik</option>
            </select>
          </div>
        </div>


        <div class="form-row">
          <div class="form-group col-md-6">
            <label class="col-form-label">Kemampuan saya memberikan penguatan</label>
            <select required class="form-control" name="q_5">
              <option value="" selected disabled hidden>Silahkan Pilih</option>
              <option value="0">Sangat Baik</option>
              <option value="1">Baik</option>
              <option value="2">Cukup</option>
              <option value="3">Kurang Baik</option>
            </select>
          </div>
          <div class="form-group col-md-6">
            <label class="col-form-label">Kemampuan saya mengadakan variasi</label>
            <select required class="form-control" name="q_6">
              <option value="" selected disabled hidden>Silahkan Pilih</option>
              <option value="0">Sangat Baik</option>
              <option value="1">Baik</option>
              <option value="2">Cukup</option>
              <option value="3">Kurang Baik</option>
            </select>
          </div>
        </div>


        <div class="form-row">
          <div class="form-group col-md-6">
            <label class="col-form-label">Kemampuan saya dalam menjelaskan</label>
            <select required class="form-control" name="q_7">
              <option value="" selected disabled hidden>Silahkan Pilih</option>
              <option value="0">Sangat Baik</option>
              <option value="1">Baik</option>
              <option value="2">Cukup</option>
              <option value="3">Kurang Baik</option>
            </select>
          </div>
          <div class="form-group col-md-6">
            <label class=" col-form-label">Kemampuan saya dalam membimbing diskusi kelompok kecil</label>
            <select required class="form-control" name="q_8">
              <option value="" selected disabled hidden>Silahkan Pilih</option>
              <option value="0">Sangat Baik</option>
              <option value="1">Baik</option>
              <option value="2">Cukup</option>
              <option value="3">Kurang Baik</option>
            </select>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-12">
            <label class="col-form-label">Kemampuan saya dalam mengelola kelas</label>
            <select required class="form-control" name="q_9">
              <option value="" selected disabled hidden>Silahkan Pilih</option>
              <option value="0">Sangat Baik</option>
              <option value="1">Baik</option>
              <option value="2">Cukup</option>
              <option value="3">Kurang Baik</option>
            </select>
          </div>
        </div>

        <div class="form-row">

          <div class="form-group col-md-12">
            <label class="col-12 col-form-label">Jika ditemukan dalam kelas saat proses belajar mengajar berlangsung terdapat 2 orang siswa/i sedang asik bercerita dan kelas dalamkeadaan ribut. Maka keterampilan yang diperlukan adalah</label>
            <select required class="form-control" name="q_10">
              <option value="" selected disabled hidden>Silahkan Pilih</option>
              <option value="0">Memberi penguatan</option>
              <option value="1">Membuka Dan menutup pelajaran</option>
              <option value="2">mengelola kelas</option>
            </select>
          </div>
          <div class="form-group col-md-12">
            <label class="col-12 col-form-label">Jika ditemukan dalam kelas saat proses belajar mengajar berlangsung terdapat siswa/i sangat baik responnya dan mampu menjawab pertanyaan yang di ajukan oleh guru, maka sebagai seorang guru keterampilan yang diperlukan saat itu adalah</label>
            <select required class="form-control" name="q_11">
              <option value="" selected disabled hidden>Silahkan Pilih</option>
              <option value="0">Memberi penguatan</option>
              <option value="1">Mengelola Kelas</option>
              <option value="2">Memberikan Variasi</option>
            </select>
          </div>
          <div class="form-group col-md-12">
            <label class="col-12 col-form-label">Jika ditemukan dalam kelas saat proses belajar mengajar berlangsung terdapat siswa/i yang terlihat belum fokus maka sebagai seorang guru keterampilan yang diperlukan saat itu adalah</label>
            <select required class="form-control" name="q_12">
              <option value="" selected disabled hidden>Silahkan Pilih</option>
              <option value="0">Mengajukan pertanyaan</option>
              <option value="1">Membuka pelajaran</option>
              <option value="2">Memberikan Variasi</option>
            </select>
          </div>
          <div class="form-group col-md-12">
            <label class="col-12 col-form-label">Jika ditemukan dalam kelas saat proses belajar mengajar berlangsung terdapat siswa/i dalam keadaan tidak kondusif dan siswa terlihat tidak tertarik dalam belajar, maka sebagai seorang guru keterampilan yang diperlukan saat itu adalah</label>
            <select required class="form-control" name="q_13">
              <option value="" selected disabled hidden>Silahkan Pilih</option>
              <option value="0">Memberi penguatan</option>
              <option value="1">Menutup pelajaran</option>
              <option value="2">Memberikan Variasi</option>
            </select>
          </div>
          <div class="form-group col-md-12">
            <label class="col-12 col-form-label">Jika ditemukan dalam kelas saat proses belajar mengajar berlangsung terdapat siswa/i dalam keadaan tidak kondusif dan siswa terlihat tidak tertarik dalam belajar, maka sebagai seorang guru keterampilan yang diperlukan saat itu adalah</label>
            <select required class="form-control" name="q_14">
              <option value="" selected disabled hidden>Silahkan Pilih</option>
              <option value="0">Memberi penguatan</option>
              <option value="1">Menutup pelajaran</option>
              <option value="2">Memberikan Variasi</option>
            </select>
          </div>


          <div class="form-group col-md-12">
            <div class=" m-t-15">
              <button type="submit" class="btn btn-primary waves-effect waves-light">
                Submit
              </button>
            </div>
          </div>

        </div>
    </div><!-- end row -->
    </form>

  </div>
</div>
</div>

@endsection