<div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    
    <header class="site-navbar light js-sticky-header site-navbar-target" role="banner">

      <div class="container">
        <div class="row align-items-center">

          <div class="col-6 col-xl-2">
            <div class="mb-0 site-logo"><a href="<?= base_url(); ?>member/home" class="mb-0">SanggarSans<span class="text-primary">.</span> </a></div>
          </div>

          <div class="col-12 col-md-10 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">

              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li>
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Cari..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-sm btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </li>
                <li class="<?php if($this->uri->segment(2) == 'home') {echo "active" ; } ?>"><a href="<?= base_url(); ?>member/home" class="nav-link">Beranda</a></li>
                <li class="<?php if($this->uri->segment(2) == 'cari_sanggar') {echo "active" ; } ?>"><a href="<?= base_url(); ?>member/cari_sanggar" class="nav-link">Temukan Sanggar</a></li>
                <!-- <li class="<?php if($this->uri->segment(2) == 'banding') {echo "active" ; } ?>"><a href="<?= base_url(); ?>member/banding" class="nav-link">Bandingkan Sanggar</a></li> -->
                <!-- <li class="has-children <?php if($this->uri->segment(2) == 'sanggar') {echo "active" ; } ?>">
                  <a href="#" class="nav-link">Sanggar</a>
                  <ul class="dropdown">
                    <li><a href="<?= base_url('member/sanggar/tari'); ?>" class="nav-link">Sanggar Tari</a></li>
                    <li><a href="<?= base_url('member/sanggar/teater'); ?>" class="nav-link">Sanggar Teater</a></li>
                    <li><a href="<?= base_url('member/sanggar/musik'); ?>" class="nav-link">Sanggar Musik</a></li>
                  </ul>
                </li> --><!-- 
                <li class="<?php if($this->uri->segment(2) == 'event') {echo "active" ; } ?>"><a href="<?= base_url('member/event'); ?>" class="nav-link">Kegiatan</a></li>
                <li class="<?php if($this->uri->segment(2) == 'berita') {echo "active" ; } ?>"><a href="<?= base_url('member/berita'); ?>" class="nav-link">Berita</a></li> -->
                <!-- <li class="<?php if($this->uri->segment(2) == 'about') {echo "active" ; } ?>"><a href="<?= base_url('member/about'); ?>" class="nav-link">About</a></li> -->
                <li class="has-children <?php if($this->uri->segment(2) == 'riwayat') {echo "active" ; } ?>">
                  <a href="#" class="nav-link">Riwayat</a>
                  <ul class="dropdown">
                    <li class="<?php if($this->uri->segment(3) == 'pendaftaran') {echo "active" ; } ?>"><a href="<?= base_url(); ?>member/riwayat/pendaftaran" class="nav-link">Riwayat Pendaftaran</a></li>
                    <li class="<?php if($this->uri->segment(3) == 'penyewaan') {echo "active" ; } ?>"><a href="<?= base_url(); ?>member/riwayat/penyewaan" class="nav-link">Riwayat Penyewaan</a></li>
                    <li class="<?php if($this->uri->segment(3) == 'undang') {echo "active" ; } ?>"><a href="<?= base_url(); ?>member/riwayat/undang" class="nav-link">Riwayat Undang</a></li>
                  </ul>
                </li>
                <li class="has-children <?php if($this->uri->segment(2) == 'profile') {echo "active" ; } ?>">
                  <a href="#" class="nav-link"><?= $this->session->userdata('nama'); ?></a>
                  <ul class="dropdown">
                    <li><a href="<?= base_url(); ?>member/profile" class="nav-link">Profil saya</a></li>
                    <li><a href="<?= base_url(); ?>member/kelas" class="nav-link">Kelas saya</a></li>
                    <li><a href="<?= base_url(); ?>member/panduan" class="nav-link">Panduan Website</a></li>
                    <li><a data-toggle="modal" data-target="#logoutModal" class="nav-link">Keluar</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>


          <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle float-right"><span class="icon-menu h3 text-black"></span></a></div>

        </div>
      </div>

    </header>