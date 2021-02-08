<!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon">
          <i class="fas fa-school"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SANGGAR</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        SANGGAR
      </div>

      <!-- Nav Item - Dashboard -->
      <li class="nav-item <?php if($this->uri->segment(2) == 'dashboard') {echo "active" ; } ?>">
        <a class="nav-link" href="<?= base_url('sanggar/dashboard'); ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <li class="nav-item <?php if($this->uri->segment(2) == 'kriteria') {echo "active" ; } ?>">
        <a class="nav-link" href="<?= base_url('sanggar/kriteria'); ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Kelola Kriteria sanggar</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
      <!-- Divider -->
      <div class="sidebar-heading">
        KELOLA RIWAYAT
      </div>

      <li class="nav-item  <?php if($this->uri->segment(2) == 'pendaftar' || $this->uri->segment(2) == 'penyewa' || $this->uri->segment(2) == 'undang' ) {echo "active" ; } ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseThree">
          <i class="fas fa-fw fa-cog"></i>
          <span>Riwayat</span>
        </a>
        <div id="collapseOne" class="collapse  <?php if($this->uri->segment(2) == 'pendaftar' || $this->uri->segment(2) == 'penyewa' || $this->uri->segment(2) == 'undang' ) {echo "show" ; } ?>" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Kelola riwayat:</h6>
            <a class="collapse-item <?php if($this->uri->segment(2) == 'pendaftar') {echo "active" ; } ?>" href="<?= base_url(); ?>sanggar/pendaftar/index">Riwayat Pendaftar</a>
            <a class="collapse-item <?php if($this->uri->segment(2) == 'penyewa') {echo "active" ; } ?>" href="<?= base_url(); ?>sanggar/penyewa/index">Riwayat Penyewa</a>
            <a class="collapse-item <?php if($this->uri->segment(2) == 'undang') {echo "active" ; } ?>" href="<?= base_url(); ?>sanggar/undang/index">Riwayat Undangan</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
      <!-- Divider -->
      <div class="sidebar-heading">
        KELOLA DATA SANGGAR
      </div>

      <li class="nav-item <?php if($this->uri->segment(2) == 'kelas' || $this->uri->segment(2) == 'latihan' || $this->uri->segment(2) == 'galeri' || $this->uri->segment(2) == 'paket_undang' || $this->uri->segment(2) == 'paket_sewa' || $this->uri->segment(2) == 'rekening' ) {echo "active" ; } ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseThree">
          <i class="fas fa-fw fa-cog"></i>
          <span>Kelola Data Sanggar</span>
        </a>
        <div id="collapseTwo" class="collapse <?php if($this->uri->segment(2) == 'kelas' || $this->uri->segment(2) == 'latihan' || $this->uri->segment(2) == 'galeri' || $this->uri->segment(2) == 'paket_undang' || $this->uri->segment(2) == 'paket_sewa' || $this->uri->segment(2) == 'rekening' ) {echo "show" ; } ?>" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Input data:</h6>
            <a class="collapse-item <?php if($this->uri->segment(2) == 'kelas') {echo "active" ; } ?>" href="<?= base_url(); ?>sanggar/kelas/index">Kelas Latihan</a>
            <a class="collapse-item <?php if($this->uri->segment(2) == 'latihan') {echo "active" ; } ?>" href="<?= base_url(); ?>sanggar/latihan/index">Jadwal Latihan</a>
            <a class="collapse-item <?php if($this->uri->segment(2) == 'galeri') {echo "active" ; } ?>" href="<?= base_url(); ?>sanggar/galeri/index">Galeri Sanggar</a>
            <a class="collapse-item <?php if($this->uri->segment(2) == 'paket_undang') {echo "active" ; } ?>" href="<?= base_url(); ?>sanggar/paket_undang/index">Paket Undang</a>
            <a class="collapse-item <?php if($this->uri->segment(2) == 'paket_sewa') {echo "active" ; } ?>" href="<?= base_url(); ?>sanggar/paket_sewa/index">Paket Sewa</a>
            <a class="collapse-item <?php if($this->uri->segment(2) == 'rekening') {echo "active" ; } ?>" href="<?= base_url(); ?>sanggar/rekening/index">Rekening Bank</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Heading -->
      <div class="sidebar-heading">
        EVENT
      </div>

 

      <li class="nav-item <?php if($this->uri->segment(2) == 'event') {echo "active" ; } ?>">
        <a class="nav-link" href="<?= base_url('sanggar/event/index'); ?>">
          <i class="fas fa-fw fa-cog"></i>
          <span>Kelola Event</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">


      <li class="nav-item <?php if($this->uri->segment(2) == 'profile') {echo "active" ; } ?>">
        <a class="nav-link" href="<?= base_url('sanggar/profile/index'); ?>">
          <i class="fas fa-fw fa-edit"></i>
          <span>My Profile</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a href="#" class="nav-link" data-toggle="modal" data-target="#logoutModal">
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