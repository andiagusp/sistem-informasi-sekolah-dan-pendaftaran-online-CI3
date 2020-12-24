<!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('guru'); ?>">
        <div class="sidebar-brand-icon">
          <img src="<?= base_url('assets'); ?>/img/logo.png" width="40" alt="cek">
        </div>
        <div class="sidebar-brand-text mx-3">SMK MADANI DEPOK</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('guru'); ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Home</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Profile -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('guru/profile_guru'); ?>">
          <i class="fas fa-fw fa-user"></i>
          <span>Profile</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Profile -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('guru/siswa'); ?>">
          <i class="fas fa-fw fa-user"></i>
          <span>siswa</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Kelas -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('guru/kelas_guru'); ?>">
          <i class="fas fa-fw fa-chalkboard"></i>
          <span>Kelas</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - pelajaran -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('guru/pelajaran_guru'); ?>">
          <i class="fas fa-fw fa-book"></i>
          <span>Pelajaran</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Jadwal -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('guru/jadwal_guru'); ?>">
          <i class="fas fa-fw fa-book-open"></i>
          <span>Jadwal</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - nilai -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('guru/nilai'); ?>">
          <i class="fas fa-fw fa-pen"></i>
          <span>Nilai</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - logout -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('login/logout'); ?>">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Logout</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->
