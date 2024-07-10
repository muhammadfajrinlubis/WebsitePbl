<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <!-- Messages and Notifications Dropdown Menus -->
        <!-- ... (unchanged) -->

        <!-- Fullscreen Button -->
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>

        <!-- Control Sidebar Button -->
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#"
                role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->


<!-- Main Sidebar Container -->

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div class="brand-link" style="display: flex; align-items: center; justify-content: center;">
        <img src="{{url('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: 0.8; margin-right: 10px;">
        <span class="brand-text font-weight-light">Web PBL</span>
    </div>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <!-- ... (unchanged) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @if(Auth::user()->user_type == 1)
                <li class="nav-item">
                    <a href="{{url('admin/dashboard')}}" class="nav-link @if(request()->segment(2) == 'dashboard') active @endif">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('admin/admin/list')}}" class="nav-link @if(request()->segment(2) == 'admin') active @endif">
                        <i class="nav-icon far fa-user"></i>
                        <p>Admin</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{url('admin/anak/list')}}" class="nav-link @if(request()->segment(2) == 'Kelas') active @endif">
                        <i class="nav-icon far fa-user"></i>
                        <p>Anak</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('admin/ukur/list')}}" class="nav-link @if(request()->segment(2) == 'subject') active @endif">
                        <i class="nav-icon far fa-user"></i>
                        <p>Mengukur</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{url('admin/hasil/list')}}" class="nav-link @if(request()->segment(2) == 'hasil') active @endif">
                        <i class="nav-icon far fa-user"></i>
                        <p>Hasil</p>
                    </a>
                </li>

                <!-- Add other admin-specific menu items here -->
                @elseif(Auth::user()->user_type == 2)
                <li class="nav-item">
                    <a href="{{url('anak/dashboard')}}" class="nav-link @if(request()->segment(2) == 'dashboard') active @endif">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <!-- Add other teacher-specific menu items here -->
                @endif
                <!-- Logout Menu Item -->
                <li class="nav-item">
                    <a href="{{url('logout')}}" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
