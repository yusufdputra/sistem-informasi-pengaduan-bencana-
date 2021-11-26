<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cetak Pengajuan</title>

  <style>
    html,
    body {
      font-family: 'Times New Roman', Times, serif;
      margin: 0.6cm;
      padding: 0;
      height: 100%;
    }

    #container {
      min-height: 100%;
      position: relative;
    }

    #header {
      z-index: 1;
    }

    #body {
      line-height: 1.5;
      padding-right: 20px;
      padding-left: 20px;
      font-size: 14px;
      z-index: 1;
      /* Height of the footer */
    }


    #formttd {
      position:absolute;
      right: 5px;
      margin-top: -30px;
      width: 300px;
      height: 100px;
    }


    table {
      width: 100%;
    }

    .tabel-border,
    tr,
    td {
      border: 1px solid black;
      border-collapse: collapse;
      padding: 5px;
    }

    table td {
      vertical-align: top;
    }

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

  <div id="container">
    <div id="header">
      <div style="float: left;">
        <img height="90px" src="<?php echo e(public_path('atlantis/img/logo.png')); ?>" alt="">
      </div>
      <div style="text-align: center; ">
        <span style="font-size: 24px; font-weight: bold; ">PEMERINTAH KABUPATEN KAMPAR</span> <br>
        <span style="font-size: 24px; font-weight: bold; ">KECAMATAN TAMBANG</span> <br>
        <span style="font-size: 14px; font-weight: bold;  ">Jalan Raya Pekanbaru, Bangkinang KM.29, Sungai Pinang, Kode Pos: 28461</span><br>
        <br>
        <hr>
      </div>
    </div>
    <div id="body">
      <div>
        <div style="text-align: center;">
          <strong style="font-size: 14px; "><u>LAPORAN KEGIATAN BENCANA DAERAH</u></strong> <br>
        </div>
        <br>
        <div style="font-size: 14px;">

          <table class="tabel-border">
            <tr>
              <td>Hari/Tanggal</td>
              <td><?php echo e(date('l, d-M-Y', strtotime($data['pengaduan']->tgl_kejadian))); ?></td>
            </tr>
            <tr>
              <td>Jam</td>
              <td><?php echo e(date('h:i:s a', strtotime($data['pengaduan']->jam_kejadian))); ?></td>
            </tr>
            <tr>
              <td>Jenis Bencana</td>
              <td>
                <?php if($data['pengaduan']->id_bencana != 12): ?>
                <?php echo e($data['pengaduan']->bencana->nama); ?>

                <?php else: ?>
                <?php echo e($data['pengaduan']->bencana_lain); ?>

                <?php endif; ?>
              </td>
            </tr>
            <tr>
              <td>Penyebab Kejadian</td>
              <td> <?php echo e($data['pengaduan']->penyebab); ?></td>
            </tr>
            <tr>
              <td>Upaya Penanggulangan</td>
              <td> <?php echo e($data['pengaduan']->penanggulangan); ?></td>
            </tr>
            <tr>
              <td>Keterangan</td>
              <td> <?php echo e($data['pengaduan']->keterangan); ?></td>
            </tr>
            <tr>
              <td>Pelapor</td>
              <td> <?php echo e(ucwords( $data['pengaduan']->warga->nama)); ?></td>
            </tr>
          </table>



          <p><strong><u>Foto-Foto Kejadian</u></strong></p>
          <br>
          <br>
          <div style="margin-right: auto; margin-left: auto;">
            <img class="foto_kejadian"  src="storage/<?php echo e(($data['pengaduan']->foto1)); ?>" alt="">
            <img class="foto_kejadian"  src="storage/<?php echo e(($data['pengaduan']->foto1)); ?>" alt="">
            <img class="foto_kejadian"  src="storage/<?php echo e(($data['pengaduan']->foto3)); ?>" alt="">
            <img class="foto_kejadian"  src="storage/<?php echo e(($data['pengaduan']->foto1)); ?>" alt="">
          </div>

          <div id="formttd">
            <p>
              <strong>
                Sungai Pinang, <?php echo e(date('l d-M-Y', strtotime($data['pengaduan']->updated_at))); ?>

                <br>
                Operator Penerima Laporan,
                <br><br><br>
                
                  (.....................................)
                
              </strong>
            </p>
  
          </div>
        </div>



      </div>
    </div>
  </div>
</body>

</html><?php /**PATH C:\xampp\htdocs\pengaduan desa\resources\views/admin/cetak/satu.blade.php ENDPATH**/ ?>