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

  <?php if ($user['role_id'] == 1) { ?>
    <!-- Heading -->
    <div class="sidebar-heading">
      Administrator
    </div>
  <?php } else { ?>
    <div class="sidebar-heading">
      Dasawisma
    </div>
  <?php } ?>

  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
    <a class="nav-link" href="<?= base_url() ?>dashboard">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <?php if ($user['role_id'] == 1) { ?>
    <li class="nav-item active">
      <a class="nav-link" href="<?= base_url() ?>users">
        <i class="fas fa-fw fa-hotel"></i>
        <span>Users</span>
      </a>
    </li>
  <?php } ?>

  <li class="nav-item active">
    <a class="nav-link" href="<?= base_url() ?>kegiatan">
      <i class="fas fa-fw fa-people-carry"></i>
      <span>Kegiatan</span>
    </a>
  </li>


  <li class="nav-item active">
    <a class="nav-link" href="<?= base_url() ?>keluarga">
      <i class="fas fa-fw fa-users"></i>
      <span>Keluarga</span>
    </a>
  </li>

  <li class="nav-item active">
    <a class="nav-link" href="<?= base_url() ?>kondisirumah">
      <i class="fas fa-fw fa-house-user"></i>
      <span>Kondisi Rumah</span>
    </a>
  </li>

  <li class="nav-item active">
    <a class="nav-link" href="<?= base_url() ?>kehamilan">
      <i class="fas fa-fw fa-user"></i>
      <span>Kehamilan</span>
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