<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Begin page -->

<?php echo $__env->make('layouts.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



<div class="main-panel">
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold"><?php echo e($data['title']); ?></h2>
                        <h5 class="text-white op-7 mb-2">Selamat Datang di <?php echo e(config('app.name')); ?></h5>
                    </div>
                </div>
            </div>
        </div>
        <?php echo $__env->yieldContent('content'); ?>
    </div>
    <footer class="footer">
        <div class="container-fluid">
            <div class="copyright ml-auto">
                2021, <i class="fa fa-heart heart text-danger"></i> by <a href="#">Kantor Camat Tambang </a>
            </div>
        </div>
    </footer>
</div>
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pengaduan desa\resources\views/layouts/app.blade.php ENDPATH**/ ?>