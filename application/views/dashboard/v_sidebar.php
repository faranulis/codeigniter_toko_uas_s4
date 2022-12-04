<body id="page-top">
 
  <!-- Page Wrapper -->
  <div id="wrapper">
 
    <!-- Sidebar -->
   <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
 
      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon">
          <i class="fas fa-fw fa-tachometer-alt"></i>
        </div>
        <div class="sidebar-brand-text mx-1">Dashboard</div>
      </a>
  
      <!-- Divider -->
      <hr class="sidebar-divider my-0">
 
      
           <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('umum') ?>">
          <i class="fas fa-sign-out-alt"></i>
          <span>Beranda</span></a>
      </li>

      <br>

                        <li class="nav-item">
        <a class="nav-link" href="<?= base_url('user/dashboard') ?>">
          <i class="fas fa-sign-out-alt"></i>
          <span>Akun Saya</span></a>
      </li>

      <?php if ($this->session->userdata('email') == "admin@gmail.com") { ?>
                              <li class="nav-item">
        <a class="nav-link" href="<?= base_url('user/anggota') ?>"">
          <i class="fas fa-sign-out-alt"></i>
          <span>(Admin) Kelola Anggota</span></a>
      </li>
<?php }?>

          <?php if ($this->session->userdata('email') == "admin@gmail.com") { ?>
                              <li class="nav-item">
        <a class="nav-link" href="<?= base_url('listproduk') ?>"">
          <i class="fas fa-sign-out-alt"></i>
          <span>(Admin) Kelola Produk</span></a>
      </li>
<?php }?>

<?php if ($this->session->userdata('email') == "admin@gmail.com") { ?>
                              <li class="nav-item">
        <a class="nav-link" href="<?= base_url('listbank') ?>"">
          <i class="fas fa-sign-out-alt"></i>
          <span>(Admin) Kelola Bank</span></a>
      </li>
<?php }?>

            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('Keranjang') ?>">
          <i class="fas fa-sign-out-alt"></i>
<?php if ($this->session->userdata('email') == "admin@gmail.com") { ?>
<span>Kelola Keranjang</span>
<?php }else{?>
<span>Keranjang</span>
<?php } ?>
          </a>
      </li>


      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Pembelian') ?>">
          <i class="fas fa-sign-out-alt"></i>
          <span>Status Pembelian</span></a>
      </li>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('user/Logout') ?>">
          <i class="fas fa-sign-out-alt"></i>
          <span>Logout</span></a>
      </li>
     
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
 
    </ul>
    <!-- End of Sidebar -->
 
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
 
      <!-- Main Content -->
      <div id="content">
 
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow bg-gradient-primary">
        </nav>