<div class="main-header">
    <!-- Logo Header -->
    <div class="logo-header" data-background-color="blue2">

        <a href="<?php echo e(('/')); ?>" class="logo">
            <img src="<?php echo e(asset('atlantis/img/logo.svg')); ?>" alt="navbar brand" class="navbar-brand">
        </a>

        <?php if(auth()->check() && auth()->user()->hasRole('admin')): ?>
        <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
                <i class="icon-menu"></i>
            </span>
        </button>
        <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
        <div class="nav-toggle">
            <button class="btn btn-toggle toggle-sidebar">
                <i class="icon-menu"></i>
            </button>
        </div>
        <?php endif; ?>
    </div>
    <!-- End Logo Header -->

    <!-- Navbar Header -->
    <nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">

        <div class="container-fluid">
            <div class="collapse" id="search-nav">
                <form class="navbar-left navbar-form nav-search mr-md-3">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <button type="submit" class="btn btn-search pr-1">
                                <i class="fa fa-search search-icon"></i>
                            </button>
                        </div>
                        <input type="text" placeholder="Lacak Pengaduan" class="form-control">
                    </div>
                </form>
            </div>
            <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                <li class="nav-item toggle-nav-search hidden-caret">
                    <a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
                        <i class="fa fa-search"></i>
                    </a>
                </li>
                <?php if(auth()->check() && auth()->user()->hasRole('admin')): ?>
                <li class="nav-item dropdown hidden-caret">
                    <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-bell"></i>
                        <span class="notification">4</span>
                    </a>
                    <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
                        <li>
                            <div class="dropdown-title">You have 4 new notification</div>
                        </li>
                        <li>
                            <div class="notif-scroll scrollbar-outer">
                                <div class="notif-center">
                                    <a href="#">
                                        <div class="notif-icon notif-primary"> <i class="fa fa-user-plus"></i> </div>
                                        <div class="notif-content">
                                            <span class="block">
                                                New user registered
                                            </span>
                                            <span class="time">5 minutes ago</span>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="notif-icon notif-success"> <i class="fa fa-comment"></i> </div>
                                        <div class="notif-content">
                                            <span class="block">
                                                Rahmad commented on Admin
                                            </span>
                                            <span class="time">12 minutes ago</span>
                                        </div>
                                    </a>

                                </div>
                            </div>
                        </li>
                        <li>
                            <a class="see-all" href="javascript:void(0);">See all notifications<i class="fa fa-angle-right"></i> </a>
                        </li>
                    </ul>
                </li>
                <?php endif; ?>
                <li class="nav-item dropdown hidden-caret">
                    <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                        <div class="avatar-sm">
                            <img src="<?php echo e(asset('atlantis/img/guest.png')); ?>" alt="..." class="avatar-img rounded-circle">
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-user animated fadeIn">
                        <div class="dropdown-user-scroll scrollbar-outer">
                            <li>
                                <div class="user-box">
                                    <div class="avatar-lg"><img src="<?php echo e(asset('atlantis/img/guest.png')); ?>" alt="image profile" class="avatar-img rounded"></div>
                                    <div class="u-text">
                                        <h4>
                                            Hai, 
                                            <?php if(auth()->check() && auth()->user()->hasRole('admin')): ?>
                                            Admin
                                            <?php endif; ?>
                                            <?php if(auth()->guard()->guest()): ?>
                                            Pengunjung
                                            <?php endif; ?>
                                        </h4>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <?php if(auth()->guard()->check()): ?>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">My Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a>
                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                    <?php echo csrf_field(); ?>
                                </form>
                                <?php endif; ?>

                                <?php if(auth()->guard()->guest()): ?>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo e(route('login')); ?>">Login</a>
                                <?php endif; ?>
                            </li>
                        </div>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <!-- End Navbar -->
</div><?php /**PATH C:\xampp\htdocs\pengaduan desa\resources\views/layouts/topbar.blade.php ENDPATH**/ ?>