<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link text-center">
      <span class="brand-text font-weight-light">Aplikasi Surat Arsip</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        </div>
        <div class="info">
          <a href="#" class="d-block">MENU</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview">
                <a href="{{route('home')}}" class="nav-link{{request()->is('/') ? ' active' : ''}}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item has-treeview">
                <a href="{{route('arsip')}}" class="nav-link{{request()->is('arsip') ? ' active' : ''}} {{request()->is('buat_arsip') ? ' active' : ''}}">
                    <i class="fas fa-star nav-icon"></i>
                    <p>Arsip</p>
                </a>
            </li>
            <li class="nav-item has-treeview">
                <a href="{{route('about')}}" class="nav-link{{request()->is('about') ? ' active' : ''}}">
                    <i class="fas fa-exclamation-circle nav-icon"></i>
                    <p>About</p>
                </a>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
