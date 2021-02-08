<!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fab fa-envira"></i>
        </div>
        <div class="sidebar-brand-text mx-3">ADMIN SANGGARSANS</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        ADMIN
      </div>

      <!-- Nav Item - Dashboard -->
      <li class="nav-item <?php if($this->uri->segment(2) == 'dashboard') {echo "active" ; } ?>">
        <a class="nav-link" href="<?= base_url('administrator/dashboard'); ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

            <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Heading -->
      <div class="sidebar-heading">
        PROFILE MATCHING
      </div>

       <li class="nav-item <?php if($this->uri->segment(3) == 'nilai_gap' || $this->uri->segment(3) == 'kriteria'|| $this->uri->segment(2) == 'kriteria' || $this->uri->segment(3) == 'alternatif' || $this->uri->segment(3) == 'penilaian') {echo "active" ; } ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
          <i class="fas fa-fw fa-cog"></i>
          <span>Kelola Profile Matching</span>
        </a>
        <div id="collapseFour" class="collapse <?php if($this->uri->segment(3) == 'nilai_gap' || $this->uri->segment(3) == 'kriteria'|| $this->uri->segment(2) == 'kriteria' || $this->uri->segment(3) == 'alternatif' || $this->uri->segment(3) == 'penilaian') {echo "show" ; } ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Kelola perhitungan:</h6>
            <a class="collapse-item <?php if($this->uri->segment(3) == 'nilai_gap') {echo "active" ; } ?>" href="<?= base_url(); ?>administrator/spk_pm/nilai_gap">Nilai GAP</a>
            <!-- <a class="collapse-item <?php if($this->uri->segment(3) == 'kriteria') {echo "active" ; } ?>" href="<?= base_url(); ?>administrator/spk_pm/kriteria">Kriteria old</a> -->
            <a class="collapse-item <?php if($this->uri->segment(2) == 'kriteria') {echo "active" ; } ?>" href="<?= base_url(); ?>administrator/kriteria/index">Kriteria</a>
            
          </div>
        </div>
      </li>



      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Heading -->
      <div class="sidebar-heading">
        PENGGUNA UMUM
      </div>

      <!-- Nav Item - Dashboard -->
      <li class="nav-item <?php if($this->uri->segment(2) == 'user') {echo "active" ; } ?>">
        <a class="nav-link" href="<?= base_url('administrator/user/index'); ?>">
          <i class="fas fa-fw fa-users"></i>
          <span>Total Pengguna</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Heading -->
      <div class="sidebar-heading">
        SANGGAR
      </div>

      <!-- Nav Item - Dashboard -->
      <li class="nav-item <?php if($this->uri->segment(2) == 'sanggar') {echo "active" ; } ?>">
        <a class="nav-link" href="<?= base_url('administrator/sanggar/index'); ?>">
          <i class="fas fa-fw fa-users"></i>
          <span>Total Sanggar</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Heading -->
      <div class="sidebar-heading">
        SANGGAR
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item <?php if($this->uri->segment(2) == '' || $this->uri->segment(2) == 'pendaftar' || $this->uri->segment(2) == 'penyewa' || $this->uri->segment(2) == 'undang' ) {echo "active" ; } ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <i class="fas fa-fw fa-cog"></i>
          <span>Kelola Sanggar</span>
        </a>
        <div id="collapseOne" class="collapse <?php if($this->uri->segment(2) == '' || $this->uri->segment(2) == 'pendaftar' || $this->uri->segment(2) == 'penyewa' || $this->uri->segment(2) == 'undang' ) {echo "show" ; } ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Kelola data:</h6>
            <!-- <a class="collapse-item <?php if($this->uri->segment(2) == '') {echo "active" ; } ?>" href="<?= base_url(); ?>administrator/sanggar/index">Total Sanggar</a> -->
            <a class="collapse-item <?php if($this->uri->segment(2) == 'pendaftar') {echo "active" ; } ?>" href="<?= base_url(); ?>administrator/pendaftar/index">Pendaftaran ke-Sanggar</a>
            <a class="collapse-item <?php if($this->uri->segment(2) == 'penyewa') {echo "active" ; } ?>" href="<?= base_url(); ?>administrator/penyewa/index">Penyewaan Atribut</a>
            <a class="collapse-item <?php if($this->uri->segment(2) == 'undang') {echo "active" ; } ?>" href="<?= base_url(); ?>administrator/undang/index">Undang Paket Acara</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Heading -->
      <div class="sidebar-heading">
        BERITA & EVENT
      </div>

       <li class="nav-item <?php if($this->uri->segment(2) == 'berita' || $this->uri->segment(2) == 'event') {echo "active" ; } ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
          <i class="fas fa-fw fa-cog"></i>
          <span>Kelola Berita & Event</span>
        </a>
        <div id="collapseThree" class="collapse <?php if($this->uri->segment(2) == 'berita' || $this->uri->segment(2) == 'event') {echo "show" ; } ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Kelola data:</h6>
            <a class="collapse-item <?php if($this->uri->segment(2) == 'berita') {echo "active" ; } ?>" href="<?= base_url(); ?>administrator/berita/index">Berita Sanggar</a>
            <a class="collapse-item <?php if($this->uri->segment(2) == 'event') {echo "active" ; } ?>" href="<?= base_url(); ?>administrator/event/index">Event Sanggar</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <!-- <hr class="sidebar-divider d-none d-md-block"> -->

      <!-- Heading -->
<!--       <div class="sidebar-heading">
        PROFILE MATCHING
      </div>

       <li class="nav-item <?php if($this->uri->segment(3) == 'nilai_gap' || $this->uri->segment(3) == 'kriteria' || $this->uri->segment(3) == 'alternatif' || $this->uri->segment(3) == 'penilaian') {echo "active" ; } ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
          <i class="fas fa-fw fa-cog"></i>
          <span>Kelola Profile Matching</span>
        </a>
        <div id="collapseFour" class="collapse <?php if($this->uri->segment(3) == 'nilai_gap' || $this->uri->segment(3) == 'kriteria' || $this->uri->segment(3) == 'alternatif' || $this->uri->segment(3) == 'penilaian') {echo "show" ; } ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Kelola perhitungan:</h6>
            <a class="collapse-item <?php if($this->uri->segment(3) == 'nilai_gap') {echo "active" ; } ?>" href="<?= base_url(); ?>administrator/spk_pm/nilai_gap">Nilai GAP</a>
            <a class="collapse-item <?php if($this->uri->segment(3) == 'kriteria') {echo "active" ; } ?>" href="<?= base_url(); ?>administrator/spk_pm/kriteria">Kriteria</a>
            <a class="collapse-item <?php if($this->uri->segment(3) == 'alternatif') {echo "active" ; } ?>" href="<?= base_url(); ?>administrator/spk_pm/alternatif">Alternatif</a>
            <a class="collapse-item <?php if($this->uri->segment(3) == 'penilaian') {echo "active" ; } ?>" href="<?= base_url(); ?>administrator/spk_pm/penilaian">Penilaian</a>
          </div>
        </div>
      </li> -->
     
      <!-- Divider -->
      <hr class="sidebar-divider my-0">


      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a href="#" class="nav-link" data-toggle="modal" data-target="#logoutModal">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Keluar</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->