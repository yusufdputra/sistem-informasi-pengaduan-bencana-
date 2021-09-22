@include('layouts.header')

<div class="account-pages"></div>
<div class="clearfix"></div>
<div class="wrapper-page">

  <div class="m-t-40 card-box">
    <div class="text-center">
      <h4 class="text-uppercase font-bold m-b-0">Buat Akun</h4>
    </div>
    <div class="p-20">
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


      <div id="basicwizard" class=" pull-in">
        <ul class="nav nav-tabs nav-justified">
          <li class="nav-item"><a href="#tab1" data-toggle="tab" class="nav-link">Mahasiswa</a></li>
          <li class="nav-item"><a href="#tab2" data-toggle="tab" class="nav-link">Dosen</a></li>
        </ul>
        <div class="tab-content b-0 mb-0">
          <div class="tab-pane m-t-10 fade active" id="tab1">
            <form class="form-horizontal m-t-20" enctype="multipart/form-data" method="POST" action="{{route('register.mahasiswa')}}">
              @csrf
              <div class="form-group ">
                <div class="col-xs-12">
                  <input type="string" class="form-control @error('nomor_induk') is-invalid @enderror" name="nomor_induk" value="{{ old('nomor_induk') }}" placeholder="NIM" required autocomplete="off">

                  @error('nomor_induk')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              @include('auth.form_register')

              <div class="form-group">
                <div class="col-xs-12">
                  <input type="text" placeholder="Alamat Lengkap" class="form-control " name="alamat" required autocomplete="off">
                </div>
              </div>

              <div class="form-group">
                <div class="col-xs-12">
                  <select required class="form-control" name="kelas">
                    <option value="a">REGULER A</option>
                    <option value="b">REGULER B</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <div class="col-xs-12">
                  <div class="checkbox checkbox-custom">
                    <input required id="checkbox-signup" type="checkbox" checked="checked">
                    <label for="checkbox-signup">Saya menerima <a href="#">ketentuan yang berlaku.</a></label>
                  </div>
                </div>
              </div>

              <div class="form-group text-center m-t-40">
                <div class="col-xs-12">
                  <button class="btn btn-custom btn-bordred btn-block waves-effect waves-light" type="submit">
                    Daftar
                  </button>
                </div>
              </div>

            </form>
          </div>


          <div class="tab-pane m-t-10 fade" id="tab2">
            <form class="form-horizontal m-t-20" enctype="multipart/form-data" method="POST" action="{{route('register.dosen')}}">
              @csrf
              <div class="form-group ">
                <div class="col-xs-12">
                  <input type="string" class="form-control @error('nomor_induk') is-invalid @enderror" name="nomor_induk" value="{{ old('nomor_induk') }}" placeholder="NIDN" required autocomplete="off">

                  @error('nomor_induk')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>

              @include('auth.form_register')


              <div class="form-group">
                <div class="col-xs-12">
                  <textarea placeholder="Alasan menjadi dosen pembimbing" class="form-control " name="keterangan" required autocomplete="off"></textarea>
                </div>
              </div>

              <div class="form-group">
                <div class="col-xs-12">
                  <div class="checkbox checkbox-custom">
                    <input required id="checkbox-signup" type="checkbox" checked="checked">
                    <label for="checkbox-signup">Saya menerima <a href="#">ketentuan yang berlaku.</a></label>
                  </div>
                </div>
              </div>

              <div class="form-group text-center m-t-40">
                <div class="col-xs-12">
                  <button class="btn btn-custom btn-bordred btn-block waves-effect waves-light" type="submit">
                    Daftar
                  </button>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-12 text-center">
          <p class="text-muted">Sudah Memiliki Akun?<a href="{{route('login')}}" class="text-primary m-l-5"><b>Masuk</b></a></p>
        </div>
      </div>


    </div>
  </div>
  <!-- end card-box -->



</div>
<script type="text/javascript">
  $(document).ready(function() {
    $('#basicwizard').bootstrapWizard({
      'tabClass': 'nav nav-tabs navtab-wizard nav-justified bg-muted'
    });

  })
</script>
@include('layouts.footer')