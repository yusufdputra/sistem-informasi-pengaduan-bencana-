

<?php $__env->startSection('content'); ?>

<div class="page-inner mt--5">
  <div class="row">
    <div class="col-md-12">
      <div class="card full-height">
        <div class="card-body">
          <div class="card-title">
            <?php echo e($data['header']); ?>

          </div>
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
          <!-- <div class="card-category">Sistem Informasi Desa Sidomulyo</div> -->
          <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">

            <?php if(auth()->check() && auth()->user()->hasRole('admin|superadmin')): ?>
            <div class="col-sm-6 col-md-3">
              <div class="card card-stats card-primary card-round">
                <div class="card-body">
                  <div class="row">
                    <div class="col-5">
                      <div class="icon-big text-center">
                        <i class="flaticon-bars-1"></i>
                      </div>
                    </div>
                    <div class="col-7 col-stats">
                      <div class="numbers">
                        <p class="card-category">Total Pengaduan</p>
                        <h4 class="card-title"><?php echo e($data['total']); ?></h4>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
         
            <div class="col-sm-6 col-md-3">
              <div class="card card-stats card-secondary card-round">
                <div class="card-body">
                  <div class="row">
                    <div class="col-5">
                      <div class="icon-big text-center">
                        <i class="flaticon-exclamation"></i>
                      </div>
                    </div>
                    <div class="col-7 col-stats">
                      <div class="numbers">
                        <p class="card-category">Pengaduan Diproses</p>
                        <h4 class="card-title"><?php echo e($data['proses']); ?></h4>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-3">
              <div class="card card-stats card-success card-round">
                <div class="card-body">
                  <div class="row">
                    <div class="col-5">
                      <div class="icon-big text-center">
                        <i class="flaticon-success"></i>
                      </div>
                    </div>
                    <div class="col-7 col-stats">
                      <div class="numbers">
                        <p class="card-category">Pengaduan Diterima</p>
                        <h4 class="card-title"><?php echo e($data['terima']); ?></h4>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-3">
              <div class="card card-stats card-danger card-round">
                <div class="card-body">
                  <div class="row">
                    <div class="col-5">
                      <div class="icon-big text-center">
                        <i class="flaticon-error"></i>
                      </div>
                    </div>
                    <div class="col-7 col-stats">
                      <div class="numbers">
                        <p class="card-category">Pengaduan Ditolak</p>
                        <h4 class="card-title"><?php echo e($data['tolak']); ?></h4>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <?php endif; ?>

            <?php if(auth()->guard()->guest()): ?>
            <div class="col-sm-6 col-md-3">

              <a href="<?php echo e(route('pengaduan.tambah')); ?>">
                <div class=" card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div class="icon-big text-center icon-primary bubble-shadow-small">
                          <i class="flaticon-chat-8"></i>
                        </div>
                      </div>
                      <div class=" col col-stats ml-3 ml-sm-0">
                        <div class="numbers">
                          <p class="card-category">Pengaduan <br>Bencana</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>



            <div class="col-sm-6 col-md-3">
              <a href="<?php echo e(('/')); ?>">
                <div class=" card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div class="icon-big text-center icon-primary bubble-shadow-small">
                          <i class="flaticon-user-2"></i>
                        </div>
                      </div>
                      <div class=" col col-stats ml-3 ml-sm-0">
                        <div class="numbers">
                          <p class="card-category">Cooming Soon</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>

            <div class="col-sm-6 col-md-3">
              <a href="<?php echo e(('/')); ?>">
                <div class=" card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div class="icon-big text-center icon-primary bubble-shadow-small">
                          <i class="flaticon-file-1"></i>
                        </div>
                      </div>
                      <div class=" col col-stats ml-3 ml-sm-0">
                        <div class="numbers">
                          <p class="card-category">Cooming Soon</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
            <?php endif; ?>

          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card full-height">
        <div class="card-header">
          <div class="card-head-row">
            <div class="card-title">Riwayat Pengaduan Masyarakat</div>

          </div>
        </div>
        <div class="card-body">
          <?php $__currentLoopData = $data['pengaduan']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

          <div class="d-flex">
            <div class="avatar ">
              <span class="avatar-title rounded-circle border border-white bg-info"><?php echo e(strtoupper(mb_substr($value->warga->nama,0,1))); ?></span>
            </div>
            <div class="flex-1 ml-3 pt-1">
              <?php if($value->status == 'proses'): ?>
              <?php ($type = "text-primary"); ?>
              <?php elseif($value->status == 'terima'): ?>
              <?php ($type = "text-success"); ?>
              <?php else: ?>
              <?php ($type = "text-danger"); ?>
              <?php endif; ?>
              <h6 class="text-uppercase fw-bold mb-1"><?php echo e($value->warga->nama); ?> <span class="<?php echo e($type); ?> pl-3"><?php echo e(ucfirst($value->status)); ?></span></h6>
              <span class="text-muted">
                <?php if($value->id_bencana == 12): ?>
                <?php echo e(ucwords( $value->bencana_lain)); ?>

                <?php else: ?>
                <?php echo e(ucwords($value->bencana->nama)); ?>

                <?php endif; ?>
                - <?php echo e($value->daerah->nama); ?> - <?php echo e($value->almt_lengkap); ?> -

                <?php if($value->status == 'tolak'): ?>
                Alasan penolakan: <?php echo e($value->alasan_tolak); ?>

                <?php endif; ?>
                <!-- <a href="<?php echo e(route('pengaduan/detail',$value->id)); ?>" class="btn btn-link">
                  <span class="btn-label">
                    <i class="fa fa-eye"></i>
                  </span>
                  Detail
                </a> -->
              </span>
            </div>
            <div class="float-right pt-1">
              <small class="text-muted"><?php echo e($value->updated_at->diffForHumans()); ?></small>
            </div>
          </div>
          <div class="separator-dashed"></div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
      </div>
    </div>
  </div>
</div>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pengaduan desa\resources\views/home.blade.php ENDPATH**/ ?>