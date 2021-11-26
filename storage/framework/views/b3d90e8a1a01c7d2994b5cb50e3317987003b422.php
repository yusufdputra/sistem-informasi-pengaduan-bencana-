

<?php $__env->startSection('content'); ?>



<div class="page-inner mt--5">
  <div class="row">
    <div class="col-md-12">
      <div class="card full-height">
        <div class="card-body">
          <div class="card-title">
            <?php if(auth()->check() && auth()->user()->hasRole('admin')): ?>
            <a href="<?php echo e(route('pengaduan.index')); ?>" class=" btn btn-warning btn-sm">
              <?php endif; ?>
              <?php if(auth()->guard()->guest()): ?>
              <a href="<?php echo e(('/')); ?>" class=" btn btn-warning btn-sm">
                <?php endif; ?>
                <span class="btn-label">
                  <i class="fas fa-angle-double-left"></i>
                </span>
                Kembali
              </a>
          </div>


          <!-- <div class="card-category">Sistem Informasi Desa Sidomulyo</div> -->
          <div class="pb-2 pt-4">




            <?php if($data['pengaduan'] == null): ?>
            <div class="row justify-content-center text-center align-items-center mb-5">

              <div class="col-lg-6">
                <h4 class="page-title text-muted">Oppss... Kode <span class="text-success"> <?php echo e(strtoupper($data['kode'])); ?> </span>Tidak ditemukan</h4>

                <img class="card-img-top " src="<?php echo e(asset('atlantis/img/no-data.svg')); ?>" alt="Card image cap">

              </div>


            </div>

            <?php else: ?>

            <?php if($data['pengaduan']->status == 'tolak'): ?>
            <div class="alert alert-danger">
              <div>Pengaduan anda ditolak, alasan penolakan : <span class="text-danger"> <?php echo e($data['pengaduan']->alasan_tolak); ?> </span>
                <button id="edit_confirm_nik" class="ml-2 btn btn-primary btn-sm btn-border btn-round">Perbaiki </button>
              </div>
            </div>
            <?php elseif($data['pengaduan']->status == 'proses'): ?>
            <div class="alert alert-primary">
              <div>Pengaduan anda sedang diproses. Harap menunggu.</div>
            </div>
            <?php elseif($data['pengaduan']->status == 'terima'): ?>
            <div class="alert alert-success">
              <div>Pengaduan anda telah diterima.</div>
            </div>
            <?php endif; ?>

            <form action="<?php echo e(route('pengaduan.update')); ?>" method="post" enctype="multipart/form-data">
              <?php echo csrf_field(); ?>
              <input type="hidden" name="id_pengaduan" value="<?php echo e($data['pengaduan']->id); ?>" id="id_pengaduan">
              <input type="hidden" name="id_warga" value="<?php echo e($data['pengaduan']->id_warga); ?>" id="">
              <input type="hidden" name="kode" value="<?php echo e($data['pengaduan']->kode); ?>" id="">
              <input type="hidden" name="" value="<?php echo e($data['pengaduan']->warga->nik); ?>" id="nik_confirm">
              <div class="row">

                <div class="col-lg-12 row-warga" hidden>
                  <div class="card-header">
                    <div class="card-title">Data Warga</div>
                  </div>
                  <div class="row">

                    <div class="col-lg-6 col-md-12">
                      <div class="form-group">
                        <label for="">NIK</label>
                        <div class="input-group">
                          <input type="text" disabled required autocomplete="off" aria-autocomplete="off" class="form-control form_input" value="<?php echo e($data['pengaduan']->warga->nik); ?>" placeholder="Sesuai KTP" aria-label="" aria-describedby="basic-addon1" id="" name="nik">

                        </div>
                      </div>

                      <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" disabled class="form-control form_input" value="<?php echo e($data['pengaduan']->warga->nama); ?>" id="" name="nama" required autocomplete="off" aria-autocomplete="off" placeholder="Sesuai KTP">
                      </div>

                      <div class="form-group">
                        <label for="">Alamat</label>
                        <textarea type="text" disabled class="form-control form_input" value="" id="" name="alamat" required autocomplete="off" aria-autocomplete="off" placeholder="Alamat saat ini" rows="3"><?php echo e($data['pengaduan']->warga->alamat); ?></textarea>
                      </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                      <div class="form-group">
                        <label for="">Nomor Hp</label>
                        <input type="text" disabled class="form-control form_input" value="<?php echo e($data['pengaduan']->warga->no_hp); ?>" id="" name="no_hp" required autocomplete="off" aria-autocomplete="off" placeholder="Nomor Aktif">
                      </div>
                      <div class="form-group">
                        <label for="">Foto KTP</label>
                        <div class="input-group">
                          <figure class="imagecheck-figure">
                            <img src="../../storage/<?php echo e($data['pengaduan']->warga->foto_ktp); ?>" height="150" alt="title" id="ktp_view" class="imagecheck-image">
                          </figure>
                          <input type="hidden" name="foto_ktp_lama" id="foto_ktp_lama" value="<?php echo e($data['pengaduan']->warga->foto_ktp); ?>">
                          <div class="row ml-3 mt-2">
                            <input type="file" data-plugins="dropify" class="form_foto" hidden accept="image/*" id="foto_ktp" name="foto_ktp" />
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
                        <select class="form-control form_input" disabled required name="id_bencana" id="id_bencana">
                          <option value="" selected disabled hidden>Silahkan Pilih</option>
                          <?php $__currentLoopData = $data['bencana']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                          <option value="<?php echo e($value->id); ?>" <?php if($data['pengaduan']->id_bencana == $value->id): ?> selected <?php endif; ?> ><?php echo e($value->nama); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                      </div>




                      <?php if($data['pengaduan']->id_bencana == 12): ?>

                      <div class="form-group has-error" id="bencana_lainnya">
                        <label for="">Bencana Lainnya</label>
                        <input type="text" autocomplete="off" aria-autocomplete="off" disabled class="form-control form_input" value="<?php echo e($data['pengaduan']->bencana_lain); ?>" placeholder="Bencana Lainnya" aria-label="" aria-describedby="basic-addon1" id="bencana_lain" name="bencana_lain">
                      </div>

                      <?php else: ?>
                      <div class="form-group has-error" style="display: none;" id="bencana_lainnya">
                        <label for="">Bencana Lainnya</label>
                        <input type="text" autocomplete="off" aria-autocomplete="off" disabled class="form-control form_input" value="" placeholder="Bencana Lainnya" aria-label="" aria-describedby="basic-addon1" name="bencana_lain">
                      </div>

                      <?php endif; ?>

                      <div class="clear-fix"></div>

                      <div class="form-group">
                        <label for="">Daerah Kejadian</label>
                        <select class="form-control form_input" disabled required name="id_daerah" id="">
                          <option value="" selected disabled hidden>Silahkan Pilih</option>
                          <?php $__currentLoopData = $data['daerah']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                          <option value="<?php echo e($value->id); ?>" <?php if($data['pengaduan']->id_daerah == $value->id): ?> selected <?php endif; ?>><?php echo e($value->nama); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="">Alamat Kejadian</label>
                        <textarea type="text" class="form-control form_input" disabled value="" id="alamat_kjd" name="alamat_kjd" required autocomplete="off" aria-autocomplete="off" placeholder="Alamat Kejadian Bencana" rows="3"><?php echo e($data['pengaduan']->almt_lengkap); ?></textarea>
                      </div>


                      <div class="form-group">
                        <label for="">Tanggal Kejadian</label>
                        <input type="date" autocomplete="off" aria-autocomplete="off" disabled class="form-control form_input" value="<?php echo e($data['pengaduan']->tgl_kejadian); ?>" placeholder="yyyy/mm/dd" aria-label="" aria-describedby="basic-addon1" id="tgl_kejadian" name="tgl_kejadian">
                      </div>
                      <div class="form-group">
                        <label for="">Jam Kejadian</label>
                        <input type="time" autocomplete="off" aria-autocomplete="off" disabled class="form-control form_input" value="<?php echo e($data['pengaduan']->jam_kejadian); ?>" placeholder="hh/mm" aria-label="" aria-describedby="basic-addon1" id="jam_kejadian" name="jam_kejadian">
                      </div>

                      <div class="form-group">
                        <label for="">Penyebab</label>
                        <input type="text" disabled class="form-control form_input" value="<?php echo e($data['pengaduan']->penyebab); ?>" id="penyebab" name="penyebab" required autocomplete="off" aria-autocomplete="off" placeholder="Penyebab Kejadian Bencana">
                      </div>

                      <div class="form-group">
                        <label for="">Jenis Kerusakan</label>
                        <textarea type="text" disabled class="form-control form_input" value="" id="jns_kerusakan" name="jns_kerusakan" required autocomplete="off" aria-autocomplete="off" placeholder="Jenis kerusakan yang terjadi" rows="3"><?php echo e($data['pengaduan']->jns_kerusakan); ?></textarea>
                      </div>
                      <div class="form-group">
                        <label for="">Penanggulangan</label>
                        <textarea type="text" class="form-control form_input" disabled value="" id="penanggulangan" name="penanggulangan" required autocomplete="off" aria-autocomplete="off" placeholder="Penanggulangan yang telah dilakukan" rows="3"><?php echo e($data['pengaduan']->penanggulangan); ?></textarea>
                      </div>
                      <div class="form-group">
                        <label for="">Bantuan</label>
                        <textarea type="text" class="form-control form_input" disabled value="" id="bantuan" name="bantuan" required autocomplete="off" aria-autocomplete="off" placeholder="Bantuan yang telah diterima" rows="3"><?php echo e($data['pengaduan']->bantuan); ?></textarea>
                      </div>

                      <div class="form-group">
                        <label for="">Kerugian</label>
                        <input type="text" class="form-control form_input" disabled value="<?php echo e($data['pengaduan']->kerugian); ?>" id="kerugian" name="kerugian" required autocomplete="off" aria-autocomplete="off" placeholder="Kerugian yang dialami">
                      </div>

                      <div class="form-group">
                        <label for="">Keterangan Lebih Lanjut</label>
                        <textarea type="text" class="form-control form_input" disabled value="" id="keterangan" name="keterangan" required autocomplete="off" aria-autocomplete="off" placeholder="Keterangan Detail" rows="5"><?php echo e($data['pengaduan']->keterangan); ?></textarea>
                      </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                      <div class="card-header">
                        <div class="card-title">Data Korban</div>
                      </div>

                      <?php $__currentLoopData = $data['korban']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <input type="hidden" name="id_korban[]" value="<?php echo e($value->id); ?>">
                      <div class="form-group">
                        <label for="">Jumlah Korban <?php echo e(strtoupper($value->jenis)); ?></label>
                        <input type="number" required min="0" autocomplete="off" aria-autocomplete="off" class="form-control form_input" disabled value="<?php echo e($value->jumlah); ?>" placeholder="0" aria-label="" aria-describedby="basic-addon1" name="jml_korban[]">
                      </div>

                      <div class="form-group">
                        <label for="">Keterangan Korban <?php echo e(strtoupper($value->jenis)); ?></label>
                        <textarea type="text" class="form-control form_input" disabled name="ket_korban[]" required autocomplete="off" aria-autocomplete="off" placeholder="Keterangan Korban <?php echo e($value->keterangan); ?>" rows="3"><?php echo e($value->keterangan); ?></textarea>
                      </div>


                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




                      <div class="card-header">
                        <div class="card-title">Foto Lokasi Bencana (4 sisi)</div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label for="">Sisi 1</label>
                            <div class="input-group">
                              <figure class="imagecheck-figure">
                                <img src="../../storage/<?php echo e($data['pengaduan']->foto1); ?>" height="150" alt="title" id="sisi_1_view" class="imagecheck-image">
                              </figure>

                              <input type="hidden" name="sisi_1_lama" value="<?php echo e($data['pengaduan']->foto1); ?>" id="">
                              <input type="file" class="form-control-file form_foto" hidden accept="image/*" id="sisi_1" name="sisi_1" autocomplete="off" aria-autocomplete="off" />
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="">Sisi 2</label>
                            <div class="input-group">
                              <figure class="imagecheck-figure">
                                <img src="../../storage/<?php echo e($data['pengaduan']->foto2); ?>" height="150" alt="title" id="sisi_2_view" class="imagecheck-image">
                              </figure>

                              <input type="hidden" name="sisi_2_lama" value="<?php echo e($data['pengaduan']->foto2); ?>" id="">
                              <input type="file" class="form-control-file form_foto" hidden accept="image/*" id="sisi_2" name="sisi_2" autocomplete="off" aria-autocomplete="off" />
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-6">

                          <div class="form-group">
                            <label for="">Sisi 3</label>
                            <div class="input-group">
                              <figure class="imagecheck-figure">
                                <img src="../../storage/<?php echo e($data['pengaduan']->foto3); ?>" height="150" alt="title" id="sisi_3_view" class="imagecheck-image">
                              </figure>

                              <input type="hidden" name="sisi_3_lama" value="<?php echo e($data['pengaduan']->foto3); ?>" id="">
                              <input type="file" class="form-control-file form_foto" hidden accept="image/*" id="sisi_3" name="sisi_3" autocomplete="off" aria-autocomplete="off" />
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="">Sisi 4</label>
                            <div class="input-group">
                              <figure class="imagecheck-figure">
                                <img src="../../storage/<?php echo e($data['pengaduan']->foto4); ?>" height="150" alt="title" id="sisi_4_view" class="imagecheck-image">
                              </figure>

                              <input type="hidden" name="sisi_4_lama" value="<?php echo e($data['pengaduan']->foto4); ?>" id="">
                              <input type="file" class="form-control-file form_foto" hidden accept="image/*" id="sisi_4" name="sisi_4" autocomplete="off" aria-autocomplete="off" />
                            </div>
                          </div>
                        </div>
                      </div>




                    </div>
                  </div>
                </div>

                <div class=" col-lg-12 mt-2 card-action row">
                  <?php if($data['pengaduan']->status == 'tolak'): ?>
                  <div class="btn_kirim" hidden>
                    <button type="submit" class="btn btn-success ">Kirim</button>
                  </div>

                  <?php endif; ?>
                  <?php if($data['pengaduan']->status != 'terima'): ?>
                  <a href="#" id="hapus_confirm_nik" class="btn btn-danger ml-2">Hapus</a>
                  <?php endif; ?>
                </div>
              </div>
            </form>

            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<script>
  $('#edit_confirm_nik').click(function(e) {
    swal({
      title: 'Konfirmasi NIK',
      type: 'warning',
      html: '<br><input required class="form-control" placeholder="Masukkan NIK saat pengaduan dibuat" id="input_nik_edit">',
      content: {
        element: "input",
        attributes: {
          placeholder: "Masukkan NIK saat pengaduan dibuat",
          type: "text",
          id: "input_nik_edit",
          className: "form-control",
        },
      },
      buttons: {
        cancel: {
          visible: true,
          className: 'btn btn-danger'
        },
        confirm: {
          className: 'btn btn-success'
        }
      },
    }).then((willDelete) => {
      if (willDelete) {
        var nik_confirm = $('#nik_confirm').val()
        var input_nik_edit = $('#input_nik_edit').val()
        if (input_nik_edit == nik_confirm) {
          swal("", "NIK terkonfirmasi", "success");
          var form = $('.form_input')
          var foto = $('.form_foto')
          var row_warga = $('.row-warga')
          var btn_kirim = $('.btn_kirim')

          row_warga.removeAttr('hidden')
          form.removeAttr('disabled')
          foto.removeAttr('hidden')
          btn_kirim.removeAttr('hidden')
        } else {
          swal("", "NIK tidak valid", "warning");
        }
      } else {
        swal.close();
      }
    })
  });
  $('#hapus_confirm_nik').click(function(e) {
    swal({
      title: 'Konfirmasi NIK',
      type: 'warning',
      html: '<br><input required class="form-control" placeholder="Masukkan NIK saat pengaduan dibuat" id="get_nik_hapus">',
      content: {
        element: "input",
        attributes: {
          placeholder: "Masukkan NIK saat pengaduan dibuat",
          type: "text",
          id: "get_nik_hapus",
          className: "form-control",
        },
      },
      buttons: {
        cancel: {
          visible: true,
          className: 'btn btn-danger'
        },
        confirm: {
          className: 'btn btn-success'
        }
      },
    }).then((willDelete) => {
      if (willDelete) {
        var nik_confirm = $('#nik_confirm').val()
        var get_nik_hapus = $('#get_nik_hapus').val()
        if (nik_confirm == get_nik_hapus) {
          var id_pengaduan = $('#id_pengaduan').val()
          $.ajax({
            url: '<?php echo e(url("pengaduan/hapus")); ?>/' + id_pengaduan,
            type: 'GET',
            dataType: 'json',
            success: 'success',
            success: function(data) {
              if (data) {
                window.location.href = '/'
              } else {
                swal("", "Terjadi kesalahan. Coba lagi!", "warning");
              }
            },
            error: function(data) {
              swal("", "Terjadi kesalahan. Coba lagi!", "warning");
            }
          })


        } else {
          swal("", "NIK tidak valid", "warning");

        }
      } else {
        swal.close();
      }
    })
  });
</script>



<script type="text/javascript">
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


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pengaduan desa\resources\views/pengaduan/lacak.blade.php ENDPATH**/ ?>