<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title><?php echo e(config('app.name')); ?></title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="<?php echo e(asset('atlantis/img/icon.png')); ?>" type="image/x-icon" />

	<!-- Fonts and icons -->
	<script src="<?php echo e(asset('atlantis/js/plugin/webfont/webfont.min.js')); ?>"></script>
	<script>
		WebFont.load({
			google: {
				"families": ["Lato:300,400,700,900"]
			},
			custom: {
				"families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
				urls: ['<?php echo e(asset("atlantis/css/fonts.min.css")); ?>']
			},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>


	<!-- Lightbox css -->
	<link href="<?php echo e(asset('atlantis/libs/magnific-popup/magnific-popup.css')); ?>" rel="stylesheet" type="text/css" />

	<!-- CSS Files -->
	<link rel="stylesheet" href="<?php echo e(asset('atlantis/css/bootstrap.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('atlantis/css/atlantis.min.css')); ?>">
	<!--   Core JS Files   -->
	<script src="<?php echo e(asset('atlantis/js/core/jquery.3.2.1.min.js')); ?>"></script>
	<script src="<?php echo e(asset('atlantis/js/core/popper.min.js')); ?>"></script>
	<script src="<?php echo e(asset('atlantis/js/core/bootstrap.min.js')); ?>"></script>




	<!-- jQuery UI -->
	<script src="<?php echo e(asset('atlantis/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')); ?>"></script>
	<script src="<?php echo e(asset('atlantis/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js')); ?>"></script>


	<!-- Plugins css -->
	<link href="<?php echo e(asset('atlantis/libs/spectrum-colorpicker2/spectrum.min.css')); ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo e(asset('atlantis/libs/flatpickr/flatpickr.min.css')); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo e(asset('atlantis/libs/clockpicker/bootstrap-clockpicker.min.css')); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo e(asset('atlantis/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css')); ?>" rel="stylesheet" type="text/css" />
</head>

<body>
	<div class="wrapper <?php if(auth()->guard()->guest()): ?> overlay-sidebar <?php endif; ?>"><?php /**PATH C:\xampp\htdocs\pengaduan desa\resources\views/layouts/header.blade.php ENDPATH**/ ?>