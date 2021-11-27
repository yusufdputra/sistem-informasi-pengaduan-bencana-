<?php $__env->startSection('content'); ?>
<div class="page-inner mt--5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo e($data['title']); ?></h4>
                </div>
                <div class="card-body">

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
                    <form class="form-horizontal m-t-20 parsley-examples" enctype="multipart/form-data" action="<?php echo e(route('katasandi.reset')); ?>" method="POST">
                        <?php echo csrf_field(); ?>

                        <div class="form-group">
                            <label class=" col-form-label">Kata Sandi Lama</label>


                            <input type="password" name="pass_lama" autocomplete="off" class="form-control col-12" data-parsley-minlength="5" name="pass_old" required placeholder="Masukkan kata sandi lama anda" />


                        </div>

                        <div class="form-group ">
                            <label class=" col-form-label">Kata Sandi Baru</label>


                            <input id="hori-pass1" name="pass_baru" type="password" data-parsley-minlength="5" placeholder="Kata Sandi Baru" required class="form-control col-12" />


                        </div>
                        <div class="form-group">
                            <label class=" col-form-label">Konfirmasi Kata Sandi Baru</label>


                            <input data-parsley-equalto="#hori-pass1" data-parsley-minlength="5" type="password" required placeholder="Konfirmasi Kata Sandi Baru" class="form-control col-12" id="hori-pass2" />


                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">update</button>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pengaduan desa\resources\views/auth/passwords/reset.blade.php ENDPATH**/ ?>