<div class="sidebar sidebar-style-2">
	<div class="sidebar-wrapper scrollbar scrollbar-inner">
		<div class="sidebar-content">
			<div class="user">
				<div class="avatar-sm float-left mr-2">
					<img src="<?php echo e(asset('atlantis/img/guest.png')); ?>" alt="..." class="avatar-img rounded-circle">
				</div>
				<div class="info">
					<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
						<span>
							Hi,
							<span class="user-level">Administrator</span>
							<span class="caret"></span>
						</span>
					</a>

					<div class="clearfix"></div>
				</div>
			</div>
			<ul class="nav nav-primary">



				<?php if(auth()->check() && auth()->user()->hasRole('admin')): ?>
				<li class="nav-item">
					<a href="<?php echo e(route('/')); ?>">
						<i class="fas fa-home"></i>
						<p>Dashboard</p>
					</a>
				</li>
				<?php
				
				$notif_count =  App\Models\Pengaduan::where('status', 'proses')->count()
				?>
				<li class="nav-item">
					<a href="<?php echo e(route('pengaduan.index')); ?>">
						<i class="fas fa-layer-group"></i>
						<p>Pengaduan </p>
						<span class="badge badge-success"><?php echo e($notif_count); ?></span>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo e(route('arsip.index')); ?>">
						<i class="fas fa-archive"></i>
						<p>Arsip</p>
					</a>
				</li>
				<?php endif; ?>
			</ul>
		</div>
	</div>
</div><?php /**PATH C:\xampp\htdocs\pengaduan desa\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>