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
      <?php $__currentLoopData = $data['pengaduan']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td valign="top"><?php echo e($key+1); ?></td>
        <td valign="top"><?php echo e($value->warga->nik); ?></td>
        <td valign="top"><?php echo e($value->warga->nama); ?></td>
        <td valign="top"><?php echo e($value->warga->alamat); ?></td>
        <td valign="top"><?php echo e($value->warga->no_hp); ?></td>

        <td valign="top">
          <?php if($value->id_bencana != 12): ?>
          <?php echo e($value->bencana->nama); ?>

          <?php else: ?>
          <?php echo e($value->bencana_lain); ?>

          <?php endif; ?>
        </td>
        <td valign="top"><?php echo e($value->daerah->nama); ?></td>
        <td valign="top"><?php echo e($value->almt_lengkap); ?></td>
        <td valign="top"><?php echo e(date('l d-F-Y', strtotime($value->tgl_kejadian))); ?> - <?php echo e(date('h:i:s a', strtotime($value->jam_kejadian))); ?></td>
        <td valign="top"><?php echo e($value->penyebab); ?></td>
        <td valign="top"><?php echo e($value->jns_kerusakan); ?></td>
        <td valign="top"><?php echo e($value->penanggulangan); ?></td>
        <td valign="top"><?php echo e($value->bantuan); ?></td>
        <td valign="top"><?php echo e($value->kerugian); ?></td>
        <?php $__currentLoopData = $data['korban'][$key]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <td valign="top"><?php echo e($v->jumlah); ?></td>
        <td valign="top"><?php echo e($v->keterangan); ?></td>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <td valign="top"><img width="200px" src="storage/<?php echo e(($value->warga->foto_ktp)); ?>" alt=""></td>
        <td valign="top"><img width="200px" src="storage/<?php echo e(($value->foto1)); ?>" alt=""></td>
        <td valign="top"><img width="200px" src="storage/<?php echo e(($value->foto2)); ?>" alt=""></td>
        <td valign="top"><img width="200px" src="storage/<?php echo e(($value->foto3)); ?>" alt=""></td>
        <td valign="top"><img width="200px" src="storage/<?php echo e(($value->foto4)); ?>" alt=""></td>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  </table>
</body>

</html><?php /**PATH C:\xampp\htdocs\pengaduan desa\resources\views/admin/arsip/rekap.blade.php ENDPATH**/ ?>