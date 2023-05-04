<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url() ?>dashboard">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-code"></i>
    </div>
    <div class="sidebar-brand-text mx-3">SIKPKK</sup></div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Administrator
  </div>
  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
    <a class="nav-link" href="<?= base_url() ?>dashboard">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item active">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-fw fa-plus"></i>
      <span>Entry Data</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Pages:</h6>
        <a class="collapse-item" href="<?= base_url() ?>kegiatan">
          <i class="fas fa-fw fa-people-carry"></i>
          Kegiatan
        </a>
        <a class="collapse-item" href="<?= base_url() ?>dasawisma">
          <i class="fas fa-fw fa-hotel"></i>
          Dasawisma
        </a>
        <a class="collapse-item" href="<?= base_url() ?>keluarga">
          <i class="fas fa-fw fa-users"></i>
          Keluarga
        </a>
        <a class="collapse-item" href="<?= base_url() ?>kondisirumah">
          <i class="fas fa-fw fa-house-user"></i>
          Kondisi Rumah
        </a>
      </div>
    </div>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    User
  </div>

  <!-- Nav Item - Tables -->
  <li class="nav-item active">
    <a class="nav-link" href="<?= base_url() ?>kondisirumah">
      <i class="fas fa-fw fa-house-user"></i>
      <span>Kondisi Rumah</span></a>
  </li>
  <!-- Nav Item - Tables -->
  <li class="nav-item active">
    <a class="nav-link" href="<?= base_url() ?>kegiatan/pkk">
      <i class="fas fa-fw fa-table"></i>
      <span>Kegiatan PKK</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <li class="nav-item active">
    <a class="nav-link" href="<?= base_url() ?>auth/logout" data-toggle="modal" data-target="#logoutModal">
      <i class="fas fa-fw fa-sign-out-alt"></i>
      <span>Logout</span>
    </a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->