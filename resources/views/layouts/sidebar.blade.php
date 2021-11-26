<div class="sidebar sidebar-style-2">
	<div class="sidebar-wrapper scrollbar scrollbar-inner">
		<div class="sidebar-content">
			<div class="user">
				<div class="avatar-sm float-left mr-2">
					<img src="{{asset('atlantis/img/guest.png')}}" alt="..." class="avatar-img rounded-circle">
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



				@role('admin')
				<li class="nav-item">
					<a href="{{route('/')}}">
						<i class="fas fa-home"></i>
						<p>Dashboard</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="{{route('pengaduan.index')}}">
						<i class="fas fa-layer-group"></i>
						<p>Pengaduan</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="{{route('arsip.index')}}">
						<i class="fas fa-archive"></i>
						<p>Arsip</p>
					</a>
				</li>
				@endrole
			</ul>
		</div>
	</div>
</div>