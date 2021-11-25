

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
            <?php if(auth()->guard()->guest()): ?>
            <?php if($data['pengaduan']->status == 'tolak'): ?>
            <div class="alert alert-danger">
              <div>Alasan penolakan : <?php echo e($data['pengaduan']->alasan_tolak); ?></div>
            </div>
            <?php endif; ?>
            <?php endif; ?>

            <?php if(\Session::has('alert')): ?>
            <div class="alert alert-danger">
              <div><?php echo e(Session::get('alert')); ?></div>
            </div>
            <?php endif; ?>

            <?php if(\Session::has('success')): ?>
            <div class="alert alert-success">
              <div><?php echo e(Session::get('success')); ?></div>
            </div>
            <?php endif; ?>
            <input type="hidden" name="id" id="">
            <div class="row">

              <div class="col-lg-12">
                <div class="card-header">
                  <div class="card-title">Data Warga</div>
                </div>
                <div class="row">
                  <input type="hidden" id="id_pengaduan" value="<?php echo e($data['pengaduan']->id); ?>">

                  <div class="col-lg-6 col-md-12">
                    <div class="form-group">
                      <label for="">NIK</label>

                      <p class="form-control"><?php echo e($data['pengaduan']->warga->nik); ?></p>

                    </div>

                    <div class="form-group">
                      <label for="">Nama</label>
                      <p class="form-control"><?php echo e($data['pengaduan']->warga->nama); ?></p>
                    </div>

                    <div class="form-group">
                      <label for="">Alamat</label>
                      <p class="form-control"><?php echo e($data['pengaduan']->warga->alamat); ?></p>

                    </div>
                  </div>

                  <div class="col-lg-6 col-md-12">
                    <div class="form-group">
                      <label for="">Nomor Hp</label>
                      <p class="form-control"><?php echo e($data['pengaduan']->warga->no_hp); ?></p>

                    </div>
                    <div class="form-group">
                      <label for="">Foto KTP</label>
                      <div class="col-lg-6 ">
                        <div class="gal-detail thumb">
                          <a target="_BLANK" href="../../storage/<?php echo e($data['pengaduan']->warga->foto_ktp); ?>" class="image-popup">
                            <img src="../../storage/<?php echo e($data['pengaduan']->warga->foto_ktp); ?>" class="thumb-img img-fluid" alt="Foto KTP">
                          </a>
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
                      <?php if($data['pengaduan']->id_bencana != 12): ?>

                      <p class="form-control"><?php echo e($data['pengaduan']->bencana->nama); ?></p>
                      <?php else: ?>
                      <p class="form-control"><?php echo e($data['pengaduan']->bencana_lain); ?></p>

                      <?php endif; ?>

                    </div>



                    <div class="clear-fix"></div>

                    <div class="form-group">
                      <label for="">Daerah Kejadian</label>

                      <p class="form-control"><?php echo e($data['pengaduan']->daerah->nama); ?></p>
                    </div>

                    <div class="form-group">
                      <label for="">Alamat Kejadian</label>

                      <p class="form-control"><?php echo e($data['pengaduan']->almt_lengkap); ?></p>
                    </div>


                    <div class="form-group">
                      <label for="">Tanggal Kejadian</label>

                      <p class="form-control"><?php echo e(date('d-F-Y', strtotime($data['pengaduan']->tgl_kejadian))); ?></p>
                    </div>
                    <div class="form-group">
                      <label for="">Jam Kejadian</label>

                      <p class="form-control"><?php echo e(date('h:i:sa', strtotime($data['pengaduan']->jam_kejadian))); ?></p>
                    </div>

                    <div class="form-group">
                      <label for="">Penyebab</label>
                      <p class="form-control"><?php echo e($data['pengaduan']->penyebab); ?></p>
                    </div>

                    <div class="form-group">
                      <label for="">Jenis Kerusakan</label>
                      <p class="form-control"><?php echo e($data['pengaduan']->jns_kerusakan); ?></p>
                    </div>
                    <div class="form-group">
                      <label for="">Penanggulangan</label>
                      <p class="form-control"><?php echo e($data['pengaduan']->penanggulangan); ?></p>
                    </div>
                    <div class="form-group">
                      <label for="">Bantuan</label>
                      <p class="form-control"><?php echo e($data['pengaduan']->bantuan); ?></p>
                    </div>

                    <div class="form-group">
                      <label for="">Kerugian</label>
                      <p class="form-control"><?php echo e($data['pengaduan']->kerugian); ?></p>
                    </div>

                    <div class="form-group">
                      <label for="">Keterangan Lebih Lanjut</label>
                      <p class="form-control"><?php echo e($data['pengaduan']->keterangan); ?></p>
                    </div>
                  </div>

                  <div class="col-lg-6 col-md-12">
                    <div class="card-header">
                      <div class="card-title">Data Korban</div>
                    </div>

                    <?php $__currentLoopData = $data['korban']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="form-group">
                      <label for="">Jumlah Korban <?php echo e(strtoupper($value->jenis)); ?></label>
                      <p class="form-control"><?php echo e($value->jumlah); ?></p>
                    </div>

                    <div class="form-group">
                      <label for="">Keterangan Korban <?php echo e(strtoupper($value->jenis)); ?></label>
                      <p class="form-control"><?php echo e($value->keterangan); ?></p>
                    </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                    <div class="card-header">
                      <div class="card-title">Foto Lokasi Bencana (4 sisi)</div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="">Sisi 1</label>
                          <div class="col-lg-6 ">
                            <div class="gal-detail thumb">
                              <a target="_BLANK" href="../../storage/<?php echo e($data['pengaduan']->foto1); ?>" class="image-popup">
                                <img src="../../storage/<?php echo e($data['pengaduan']->foto1); ?>" class="thumb-img img-fluid" alt="Foto Sisi">
                              </a>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="">Sisi 2</label>
                          <div class="col-lg-6 ">
                            <div class="gal-detail thumb">
                              <a target="_BLANK" href="../../storage/<?php echo e($data['pengaduan']->foto2); ?>" class="image-popup">
                                <img src="../../storage/<?php echo e($data['pengaduan']->foto2); ?>" class="thumb-img img-fluid" alt="Foto Sisi">
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-6">

                        <div class="form-group">
                          <label for="">Sisi 3</label>
                          <div class="col-lg-6 ">
                            <div class="gal-detail thumb">
                              <a target="_BLANK" href="../../storage/<?php echo e($data['pengaduan']->foto3); ?>" class="image-popup">
                                <img src="../../storage/<?php echo e($data['pengaduan']->foto3); ?>" class="thumb-img img-fluid" alt="Foto Sisi">
                              </a>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="">Sisi 4</label>
                          <div class="col-lg-6 ">
                            <div class="gal-detail thumb">
                              <a target="_BLANK" href="../../storage/<?php echo e($data['pengaduan']->foto4); ?>" class="image-popup">
                                <img src="../../storage/<?php echo e($data['pengaduan']->foto4); ?>" class="thumb-img img-fluid" alt="Foto Sisi">
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>




                  </div>
                </div>
              </div>


              <?php if(auth()->check() && auth()->user()->hasRole('admin')): ?>
              <div class=" col-lg-12 mt-2 card-action">
                <div class="row">


                  <a data-toggle="modal" href="#modal_tolak" data-id="<?php echo e($data['pengaduan']->id); ?>" class="btn btn-danger tolak">Tolak Pengaduan</a>
                  <a data-toggle="modal" href="#modal_terima" data-id="<?php echo e($data['pengaduan']->id); ?>" class="btn btn-success terima ml-2">Terima Pengaduan</a>
                </div>
              </div>
              <?php endif; ?>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal_tolak" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tolak Pengaduan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal m-t-20" enctype="multipart/form-data" action="<?php echo e(route('pengaduan.updateStatus')); ?>" method="POST">
          <?php echo csrf_field(); ?>
          <div>
            <input type="hidden" id='id_tolak' name='id'>
            <input type="hidden" value="tolak" name="status" id="">
            <h5 id="exampleModalLabel">Apakah anda yakin ingin menolak pengaduan ini?</h5>
          </div>

          <div class="form-group">
            <label for="">Alasan Penolakan</label>
            <textarea type="text" class="form-control" id="alasan_tolak" required name="alasan_tolak" required autocomplete="off" aria-autocomplete="off" placeholder="Jelaskan secara rinci" rows="5"></textarea>
          </div>

          <div class="modal-footer">
            <button type="button" onclick="Custombox.close();" class="btn btn-warning waves-effect" data-dismiss="modal">Batalkan</button>
            <button type="submit" class="btn btn-success waves-effect waves-light">Tolak</button>
          </div>


        </form>
      </div>

    </div>
  </div>
</div>


<div class="modal fade" id="modal_terima" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Terima Pengaduan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal m-t-20" enctype="multipart/form-data" action="<?php echo e(route('pengaduan.updateStatus')); ?>" method="POST">
          <?php echo csrf_field(); ?>
          <div>
            <input type="hidden" id='id_terima' name='id'>
            <input type="hidden" value="terima" name="status" id="">
            <input type="hidden" name="alasan_tolak" id="">
            <h5 id="exampleModalLabel">Pastikan data telah terkonfirmasi dengan benar</h5>
          </div>

          <div class="modal-footer">
            <button type="button" onclick="Custombox.close();" class="btn btn-warning waves-effect" data-dismiss="modal">Batalkan</button>
            <button type="submit" class="btn btn-success waves-effect waves-light">Terima</button>
          </div>


        </form>
      </div>

    </div>
  </div>
</div>

<script>

</script>



<script type="text/javascript">
  $('.terima').click(function() {
    var id = $(this).data('id');
    $('#id_terima').val(id);
  });
  $('.tolak').click(function() {
    var id = $(this).data('id');
    $('#id_tolak').val(id);
  });
</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pengaduan desa\resources\views/pengaduan/detail.blade.php ENDPATH**/ ?>