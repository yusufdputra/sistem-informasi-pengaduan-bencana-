<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="account-pages"></div>
<div class="clearfix"></div>
<div class="wrapper-page">

    <div class="m-t-40 card-box">
        <div class="text-center">
            <img src="<?php echo e(asset('adminto/images/brand/logo-big.png')); ?>" height="100px" alt="">
            <div class="text-center">
                <a href="index.html" class="logo"><span style="color: #61372b !important">SI-MA</span></a>
                <h5 class="text-muted m-t-0 font-600" style="color: #61372b !important">FAKULTAS KEGURUAN DAN ILMU PENDIDIKAN UMRI</h5>
            </div>
        </div>
        <div class="p-20">
            <form method="POST" action="<?php echo e(route('login')); ?>">
                <?php echo csrf_field(); ?>

                <div class="form-group">
                    <div class="col-xs-12">

                        <input placeholder="NIM/NIDN" type="text" class="form-control <?php $__errorArgs = ['nomor_induk'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="nomor_induk" value="<?php echo e(old('nomor_induk')); ?>" required autocomplete="off" autofocus>

                        <?php $__errorArgs = ['nomor_induk'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">


                        <input placeholder="Kata Sandi" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" data-toggle="password" required autocomplete="current-password">

                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                <div class="form-group text-center m-t-30">
                    <div class="col-xs-12">
                        <button class="btn btn-success btn-bordred btn-block waves-effect waves-light" type="submit">Masuk</button>
                    </div>
                </div>
            </form>


        </div>

        <div class="row">
            <div class="col-sm-12 text-center">
                <p class="text-muted">Tidak Punya Akun? <a href="<?php echo e(route('register')); ?>" class="text-primary m-l-5"><b>Daftar</b></a></p>
            </div>
        </div>
    </div>


</div>
<!-- end wrapper page -->



<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sistem-informasi-pengajuan-magang-umri\resources\views/auth/login.blade.php ENDPATH**/ ?>