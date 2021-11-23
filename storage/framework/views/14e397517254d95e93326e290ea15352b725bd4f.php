

<?php $__env->startSection('content'); ?>
<div class="page-inner mt--5">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Data Kejadian Bencana</h4>
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
                  <th>NIK</th>
                  <th>Daerah</th>
                  <th>Nama Bencana</th>
                  <th>Waktu</th>
                  <th>Penyebab</th>
                  <th>Detail</th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $data['pengaduan']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($key+1); ?></td>
                  <td><?php echo e($value->nik_warga); ?></td>
                  <td><?php echo e($value->daerah->nama); ?></td>
                  <td>
                    <?php if($value->id_bencana == 12): ?>
                    <?php echo e($value->bencana->nama); ?>

                    <?php else: ?>
                    <?php echo e($value->bencana_lain); ?>

                    <?php endif; ?>
                  </td>
                  <td><?php echo e(date('d-F-Y', strtotime($value->tgl_kejadian))); ?> - <?php echo e(date('h:i:sa', strtotime($value->jam_kejadian))); ?></td>
                  <td><?php echo e($value->penyebab); ?></td>

                  <td>
                    <a href="<?php echo e(route('pengaduan/detail',$value->id)); ?>"  class="btn btn-primary btn-sm "><i class="fa fa-eye"></i></a>
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


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pengaduan desa\resources\views/admin/pengaduan/index.blade.php ENDPATH**/ ?>