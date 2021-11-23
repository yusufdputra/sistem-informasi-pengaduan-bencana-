

<?php $__env->startSection('content'); ?>

<div class="page-inner mt--5">
  <div class="row">
    <div class="col-md-12">
      <div class="card full-height">
        <div class="card-body">
          <div class="card-title">Menu Layanan</div>
          <!-- <div class="card-category">Sistem Informasi Desa Sidomulyo</div> -->
          <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">

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
            <div class="card-tools">
              <ul class="nav nav-pills nav-secondary nav-pills-no-bd nav-sm" id="pills-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="pills-today" data-toggle="pill" href="#pills-today" role="tab" aria-selected="true">Bulan Ini</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="d-flex">
            <div class="avatar avatar-online">
              <span class="avatar-title rounded-circle border border-white bg-info">J</span>
            </div>
            <div class="flex-1 ml-3 pt-1">
              <h6 class="text-uppercase fw-bold mb-1">Joko Subianto <span class="text-warning pl-3">Proses</span></h6>
              <span class="text-muted">I am facing some trouble with my viewport. When i start my</span>
            </div>
            <div class="float-right pt-1">
              <small class="text-muted">8:40 PM</small>
            </div>
          </div>
          <div class="separator-dashed"></div>
          <div class="d-flex">
            <div class="avatar avatar-offline">
              <span class="avatar-title rounded-circle border border-white bg-secondary">P</span>
            </div>
            <div class="flex-1 ml-3 pt-1">
              <h6 class="text-uppercase fw-bold mb-1">Prabowo Widodo <span class="text-success pl-3">Selesai</span></h6>
              <span class="text-muted">I have some query regarding the license issue.</span>
            </div>
            <div class="float-right pt-1">
              <small class="text-muted">1 Day Ago</small>
            </div>
          </div>
          <div class="separator-dashed"></div>
          <div class="d-flex">
            <div class="avatar avatar-away">
              <span class="avatar-title rounded-circle border border-white bg-danger">L</span>
            </div>
            <div class="flex-1 ml-3 pt-1">
              <h6 class="text-uppercase fw-bold mb-1">Lee Chong Wei <span class="text-success pl-3">Selesai</span></h6>
              <span class="text-muted">Is there any update plan for RTL version near future?</span>
            </div>
            <div class="float-right pt-1">
              <small class="text-muted">2 Days Ago</small>
            </div>
          </div>
          <div class="separator-dashed"></div>
          <div class="d-flex">
            <div class="avatar avatar-offline">
              <span class="avatar-title rounded-circle border border-white bg-secondary">P</span>
            </div>
            <div class="flex-1 ml-3 pt-1">
              <h6 class="text-uppercase fw-bold mb-1">Peter Parker <span class="text-warning pl-3">Proses</span></h6>
              <span class="text-muted">I have some query regarding the license issue.</span>
            </div>
            <div class="float-right pt-1">
              <small class="text-muted">2 Day Ago</small>
            </div>
          </div>
          <div class="separator-dashed"></div>
        </div>
      </div>
    </div>
  </div>
</div>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pengaduan desa\resources\views/home.blade.php ENDPATH**/ ?>