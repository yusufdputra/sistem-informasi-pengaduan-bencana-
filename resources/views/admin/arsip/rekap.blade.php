<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <style>
   

    .foto_kejadian {
      height: 180px;
      width: 40%;
      padding: 5px;
      background-size: cover;
      position: relative;
    }
  </style>
</head>

<body>
  <table>
    <thead>
      <tr>
        <th>No</th>
        <th>NIK Pelapor</th>
        <th>Nama Pelapor</th>
        <th>Alamat Pelapor</th>
        <th>Nomor Hp Pelapor</th>

        <th>Nama Bencana</th>
        <th>Daerah Kejadian</th>
        <th>Alamat Lengkap</th>
        <th>Waktu Kejadian</th>
        <th>Penyebab Kejadian</th>
        <th>Jenis Kerusakan</th>
        <th>Penanggulangan</th>
        <th>Bantuan</th>
        <th>Kerugian</th>
        <th>Jumlah Korban Meninggal</th>
        <th>Keterangan Korban Meninggal</th>
        <th>Jumlah Korban Luka-Luka</th>
        <th>Keterangan Korban Luka-Luka</th>
        <th>Jumlah Korban Hilang</th>
        <th>Keterangan Korban Hilang</th>
        <th>KTP Pelapor</th>
        <th>Foto Lokasi Sisi 1</th>
        <th>Foto Lokasi Sisi 2</th>
        <th>Foto Lokasi Sisi 3</th>
        <th>Foto Lokasi Sisi 4</th>
      </tr>
    </thead>
    <tbody>
      @foreach($data['pengaduan'] AS $key => $value)
      <tr>
        <td valign="top">{{$key+1}}</td>
        <td valign="top">{{$value->warga->nik}}</td>
        <td valign="top">{{$value->warga->nama}}</td>
        <td valign="top">{{$value->warga->alamat}}</td>
        <td valign="top">{{$value->warga->no_hp}}</td>

        <td valign="top">
          @if($value->id_bencana != 12)
          {{$value->bencana->nama}}
          @else
          {{$value->bencana_lain}}
          @endif
        </td>
        <td valign="top">{{$value->daerah->nama}}</td>
        <td valign="top">{{$value->almt_lengkap}}</td>
        <td valign="top">{{\Carbon\Carbon::parse($value->tgl_kejadian)->formatLocalized('%A %d %B %Y')}} - {{date('h:i:s a', strtotime($value->jam_kejadian))}}</td>
        <td valign="top">{{$value->penyebab}}</td>
        <td valign="top">{{$value->jns_kerusakan}}</td>
        <td valign="top">{{$value->penanggulangan}}</td>
        <td valign="top">{{$value->bantuan}}</td>
        <td valign="top">{{$value->kerugian}}</td>
        @foreach($data['korban'][$key] AS $k => $v)
        <td valign="top">{{$v->jumlah}}</td>
        <td valign="top">{{$v->keterangan}}</td>
        @endforeach

        <td valign="top"><img width="200px" src="storage/{{($value->warga->foto_ktp)}}" alt=""></td>
        <td valign="top"><img width="200px" src="storage/{{($value->foto1)}}" alt=""></td>
        <td valign="top"><img width="200px" src="storage/{{($value->foto2)}}" alt=""></td>
        <td valign="top"><img width="200px" src="storage/{{($value->foto3)}}" alt=""></td>
        <td valign="top"><img width="200px" src="storage/{{($value->foto4)}}" alt=""></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</body>

</html>