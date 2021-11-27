

<?php $__env->startSection('content'); ?>
<div class="page-inner mt--5">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <h4 class="card-title ml-2">Data Kejadian Bencana</h4>
            <button type="button" data-toggle="modal" href="#modal_rekap" class="btn btn-success btn-sm ml-2">Rekap Pengaduan</button>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">

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

            <table id="basic-datatables" class="display table table-striped table-hover" cellspacing="0" width="100%">

              <thead>
                <tr>
                  <th>No.</th>
                  <th>Kode Pengaduan</th>
                  <th>NIK</th>
                  <th>Daerah</th>
                  <th>Nama Bencana</th>
                  <th>Waktu Kejadian</th>
                  <th>Tanggal Pengaduan</th>
                  <th>Penyebab</th>
                  <th>Detail</th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $data['pengaduan']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($key+1); ?></td>
                  <td><?php echo e($value->kode); ?></td>
                  <td><?php echo e($value->warga->nik); ?></td>
                  <td><?php echo e($value->daerah->nama); ?></td>
                  <td>
                    <?php if($value->id_bencana != 12): ?>
                    <?php echo e($value->bencana->nama); ?>

                    <?php else: ?>
                    <?php echo e($value->bencana_lain); ?>

                    <?php endif; ?>
                  </td>
                  <td><?php echo e(\Carbon\Carbon::parse($value->tgl_kejadian)->formatLocalized('%A %d %B %Y')); ?> - <?php echo e(date('h:i:s a', strtotime($value->jam_kejadian))); ?></td>
                  <td><?php echo e(\Carbon\Carbon::parse($value->created_at)->formatLocalized('%d %B %Y')); ?> </td>
                  <td><?php echo e($value->penyebab); ?></td>

                  <td>
                    <a href="<?php echo e(route('pengaduan/detail',$value->id)); ?>" class="btn btn-primary btn-sm "><i class="fa fa-eye"></i></a>
                  </td>

                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal_rekap" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Export Rekap Pengaduan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal m-t-20" enctype="multipart/form-data" action="<?php echo e(route('pengaduan.rekap')); ?>" method="POST">
          <?php echo csrf_field(); ?>

          <div class="form-group">
            <label for="basic-url">Pilih Tanggal</label>
            <input type="text"  class="form-control" id="range-datepicker" placeholder="Tanggal awal" name="range_tgl" required >

          </div>

          <div class="modal-footer">
            <button type="button" onclick="Custombox.close();" class="btn btn-warning waves-effect" data-dismiss="modal">Batalkan</button>
            <button type="submit" class="btn btn-success waves-effect waves-light">Export</button>
          </div>


        </form>
      </div>

    </div>
  </div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pengaduan desa\resources\views/admin/arsip/index.blade.php ENDPATH**/ ?>