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
        <a class="nav-link" href="<?= base_url('admn'); ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Guru -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admn/guru'); ?>">
          <i class="fas fa-fw fa-chalkboard-teacher"></i>
          <span>Guru</span></a>
      </li>
      

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Siswa -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admn/siswa'); ?>">
          <i class="fas fa-fw fa-users"></i>
          <span>Siswa</span></a>
      </li>
      

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Pelajaran -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admn/pelajaran'); ?>">
          <i class="fas fa-fw fa-book"></i>
          <span>Pelajaran</span></a>
      </li>
      

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Jadwal Pelajaran -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admn/jadwal_pelajaran'); ?>">
          <i class="fas fa-fw fa-book-open"></i>
          <span>Jadwal Pelajaran</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Kelas -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admn/kelas'); ?>">
          <i class="fas fa-fw fa-chalkboard"></i>
          <span>Kelas</span></a>
      </li>
      

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Pendaftaran -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#dropdownPendaftaran" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-suitcase"></i>
          <span>Pendaftaran</span>
        </a>
        <div id="dropdownPendaftaran" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Pendaftaran:</h6>
            <a class="collapse-item" href="<?= base_url('admn/pendaftaran'); ?>">Pendaftaran</a>
            <a class="collapse-item" href="<?= base_url('admn/pembayaran_pendaftaran'); ?>">Pembayaran Pendaftaran</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - User -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admn/user'); ?>">
          <i class="far fa-fw fa-user"></i>
          <span>User</span></a>
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