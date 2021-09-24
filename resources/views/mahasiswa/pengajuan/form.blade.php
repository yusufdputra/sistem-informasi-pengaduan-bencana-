@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card-box table-responsive">

      <div class="align-items-center row">
        <a href="{{route('pengajuanMagang.index')}}" class="btn btn-danger m-l-10 waves-light  mb-2">Kembali</a>
        <h3 class="m-l-10">Periode : {{date('d-F-Y', strtotime($periode['mulai_magang']))}} s/d {{date('d-F-Y', strtotime($periode['akhir_magang']))}}
        </h3>
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
        <input type="hidden" name="id_pengajuan" @if($pengajuan !=null) value="{{$pengajuan->id}}" @endif>
        <input type="hidden" name="url_transkrip_lama" @if($pengajuan !=null) value="{{$pengajuan->url_transkrip}}" @endif>
        <input type="hidden" name="id_mahasiswa" value="{{$mhs['id']}}">
        <input type="hidden" name="id_periode" value="{{$periode->id}}">
        <div class="row">
          <div class="col-xl-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Nama Lengkap</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" value="{{$mhs['nama']}}" name="nama" required placeholder="Ketikkan sesuatu..." />
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-3 col-form-label">NIM</label>
              <div class="col-sm-6">
                <input type="text" value="{{$mhs->user['nomor_induk']}}" class="form-control" name="nim" required placeholder="Ketikkan sesuatu..." />
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Alamat</label>
              <div class="col-sm-6">
                <textarea type="text" class="form-control" required name="alamat" placeholder="Ketikkan sesuatu...">{{$mhs['alamat']}}</textarea>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Program Studi</label>
              <div class="col-sm-6">
                <select required class="form-control" name="id_prodi">
                  @foreach ($prodi as $key => $value)
                  <option value="{{$value->id}}" <?= $mhs['id_prodi'] == $value->id ? 'selected' : ''; ?>>{{Str::upper($value->nama)}}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Kelas</label>
              <div class="col-sm-6">
                <select required class="form-control" name="kelas">
                  <option value="a" <?= $mhs['kelas'] == 'a' ? 'selected' : ''; ?>>REGULER A</option>
                  <option value="b" <?= $mhs['kelas'] == 'b' ? 'selected' : ''; ?>>REGULER B</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Nilai IPK</label>
              <div class="col-sm-6">
                <input data-parsley-type="number" @if($pengajuan !=null) value="{{$pengajuan->ipk}}" @endif max="4" min="0" type="text" name="ipk" class="form-control" required placeholder="Gunakan titik (.)" />
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Nama Tempat Magang</label>
              <div class="col-sm-6">
                <textarea required placeholder="Nama Sekolah" name="nama_sekolah" class="form-control">@if($pengajuan != null) {{$pengajuan->nama_sekolah}} @endif</textarea>
              </div>
            </div>


          </div><!-- end col -->

          <div class="col-xl-6">
            <div class="form-group row">
              <label class="col-sm-12 col-form-label text-danger mb-1">Sudah mengikuti dan lulus mata kuliah</label>
              <div class="col-sm-12">
                <div class="form-group row">
                  <label class="col-sm-6 col-form-label">Psikologi dan Perkembangan Peserta Didik</label>
                  <div class="col-sm-3">
                    <select required class="form-control" name="nilai_matkul_1">
                      <option disabled>...Pilih...</option>
                      <option value="A" @if($pengajuan !=null) <?= $nilai_matkul[0] == '' ? 'selected' : ''; ?> @endif>A</option>
                      <option value="B+" @if($pengajuan !=null) <?= $nilai_matkul[0] == 'B+' ? 'selected' : ''; ?> @endif>B+</option>
                      <option value="A-" @if($pengajuan !=null) <?= $nilai_matkul[0] == 'A-' ? 'selected' : ''; ?> @endif>A-</option>
                      <option value="B" @if($pengajuan !=null) <?= $nilai_matkul[0] == 'B' ? 'selected' : ''; ?> @endif>B</option>
                      <option value="B-" @if($pengajuan !=null) <?= $nilai_matkul[0] == 'B-' ? 'selected' : ''; ?> @endif>B-</option>
                      <option value="C+" @if($pengajuan !=null) <?= $nilai_matkul[0] == 'C+' ? 'selected' : ''; ?> @endif>C+</option>
                      <option value="C" @if($pengajuan !=null) <?= $nilai_matkul[0] == 'C' ? 'selected' : ''; ?> @endif>C</option>
                      <option value="D" @if($pengajuan !=null) <?= $nilai_matkul[0] == 'D' ? 'selected' : ''; ?> @endif>D</option>
                      <option value="E" @if($pengajuan !=null) <?= $nilai_matkul[0] == 'E' ? 'selected' : ''; ?> @endif>E</option>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-6 col-form-label">Pengembangan kurikulum dan pembelajaran</label>
                  <div class="col-sm-3">
                    <select required class="form-control" name="nilai_matkul_2">
                      <option disabled>...Pilih...</option>
                      <option value="A" @if($pengajuan !=null) <?= $nilai_matkul[1] == '' ? 'selected' : ''; ?> @endif>A</option>
                      <option value="A-" @if($pengajuan !=null) <?= $nilai_matkul[1] == 'A-' ? 'selected' : ''; ?> @endif>A-</option>
                      <option value="B+" @if($pengajuan !=null) <?= $nilai_matkul[1] == 'B+' ? 'selected' : ''; ?> @endif>B+</option>
                      <option value="B" @if($pengajuan !=null) <?= $nilai_matkul[1] == 'B' ? 'selected' : ''; ?> @endif>B</option>
                      <option value="B-" @if($pengajuan !=null) <?= $nilai_matkul[1] == 'B-' ? 'selected' : ''; ?> @endif>B-</option>
                      <option value="C+" @if($pengajuan !=null) <?= $nilai_matkul[1] == 'C+' ? 'selected' : ''; ?> @endif>C+</option>
                      <option value="C" @if($pengajuan !=null) <?= $nilai_matkul[1] == 'C' ? 'selected' : ''; ?> @endif>C</option>
                      <option value="D" @if($pengajuan !=null) <?= $nilai_matkul[1] == 'D' ? 'selected' : ''; ?> @endif>D</option>
                      <option value="E" @if($pengajuan !=null) <?= $nilai_matkul[1] == 'E' ? 'selected' : ''; ?> @endif>E</option>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-6 col-form-label">Microteaching</label>
                  <div class="col-sm-3">
                    <select required class="form-control" name="nilai_matkul_3">
                      <option disabled>...Pilih...</option>
                      <option value="A" @if($pengajuan !=null) <?= $nilai_matkul[2] == '' ? 'selected' : ''; ?> @endif>A</option>
                      <option value="A-" @if($pengajuan !=null) <?= $nilai_matkul[2] == 'A-' ? 'selected' : ''; ?> @endif>A-</option>
                      <option value="B+" @if($pengajuan !=null) <?= $nilai_matkul[2] == 'B+' ? 'selected' : ''; ?> @endif>B+</option>
                      <option value="B" @if($pengajuan !=null) <?= $nilai_matkul[2] == 'B' ? 'selected' : ''; ?> @endif>B</option>
                      <option value="B-" @if($pengajuan !=null) <?= $nilai_matkul[2] == 'B-' ? 'selected' : ''; ?> @endif>B-</option>
                      <option value="C+" @if($pengajuan !=null) <?= $nilai_matkul[2] == 'C+' ? 'selected' : ''; ?> @endif>C+</option>
                      <option value="C" @if($pengajuan !=null) <?= $nilai_matkul[2] == 'C' ? 'selected' : ''; ?> @endif>C</option>
                      <option value="D" @if($pengajuan !=null) <?= $nilai_matkul[2] == 'D' ? 'selected' : ''; ?> @endif>D</option>
                      <option value="E" @if($pengajuan !=null) <?= $nilai_matkul[2] == 'E' ? 'selected' : ''; ?> @endif>E</option>
                    </select>
                  </div>
                </div>


              </div>
            </div>

            @if($pengajuan != null)


            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Transkrip Nilai/KHS</label>
              <div class="col-sm-6">
                <a href="\storage\{{$pengajuan->url_transkrip}}" target="_BLANK" class="col-sm-3 btn btn-rounded btn-info btn-sm"><i class="fa fa-file-pdf-o"> Lihat</i></a>

              </div>
            </div>
            @endif

            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Unggah Transkrip Nilai/KHS</label>
              <div class="col-sm-6">
                @if($pengajuan != null)
                <input type="file" accept=".pdf" name="trankrip" class="form-control col-sm-6" />
                @else
                <input type="file" accept=".pdf" name="trankrip" class="form-control" required />
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Kuisioner</label>
              <div class="col-sm-6">
                <div class="checkbox checkbox-custom">
                  <input required id="checkbox-signup" type="checkbox" checked="checked">
                  <label for="checkbox-signup">Sudah Mengisi Kuisioner <a target="_BLANK" href="#">Lihat Kuisioner</a></label>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <div class="offset-sm-3 col-sm-9 m-t-15">
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