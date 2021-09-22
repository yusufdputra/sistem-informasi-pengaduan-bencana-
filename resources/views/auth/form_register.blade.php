<div>

  <div class="form-group ">
    <div class="col-xs-12">
      <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required placeholder="Nama Lengkap" autocomplete="off">

      @error('name')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
  </div>

  <div class="form-group ">
    <div class="col-xs-12">
      <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="Email" autocomplete="off">

      @error('email')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
  </div>


  <div class="form-group">
    <div class="col-xs-12">
      <input type="password" placeholder="Kata Sandi" class="form-control @error('password') is-invalid @enderror" name="password"  required autocomplete="off">

      @error('password')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
  </div>

  <div class="form-group">
    <div class="col-xs-12">
      <select required class="form-control" name="id_prodi">
        @foreach ($prodi as $key => $value)
        <option value="{{$value->id}}">{{Str::upper($value->nama)}}</option>
        @endforeach
      </select>

    </div>
  </div>

  <div class="form-group">
    <div class="col-xs-12">
      <input type="text" placeholder="Nomor HP" class="form-control " name="nomor_hp" required autocomplete="off">

    </div>
  </div>





</div>