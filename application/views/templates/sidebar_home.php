<!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admn'); ?>">
        <div class="sidebar-brand-icon">
          <img src="<?= base_url('assets'); ?>/img/logo.png" width="40" alt="cek">
        </div>
        <div class="sidebar-brand-text mx-3">SMK MADANI DEPOK</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('home'); ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Home</span></a>
      </li>
      

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Guru -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('home/daftar'); ?>">
          <i class="fas fa-fw fa-cash-register"></i>
          <span>Daftar</span></a>
      </li>
      

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Login -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('home/login_cpdb'); ?>">
          <i class="fas fa-fw fa-sign-in-alt"></i>
          <span>Login CPDB</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->