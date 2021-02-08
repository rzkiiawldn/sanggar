

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <div class="logo mr-auto">
        <h3 class="text-light"><a href="<?= base_url('user/beranda'); ?>"><span>Sanggarsans</span></a></h3>
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>

          <li>
              <form action="<?= base_url('user/beranda/cari'); ?>" method="post">
              <div class="input-group" style="width: 250px">
                <input style="font-size: 12px" type="text" class="form-control bg-light border-1 small" placeholder=" Masukan nama sanggar..." name="keyword" style="height: 30px" >
                <div class="input-group-append">
                  <input class="btn btn-sm btn-dark" type="submit" name="submit" style="width: 30px" value="cari">
                </div>
              </div>
              </form>
          </li>

          <li class="<?php if($this->uri->segment(2) == 'beranda') {echo "active" ; } ?>"><a href="<?= base_url('user/beranda'); ?>">Beranda</a></li>
          <li class="<?php if($this->uri->segment(2) == 'berita') {echo "active" ; } ?>"><a href="<?= base_url('user/berita'); ?>">Berita</a></li>
          <li class="<?php if($this->uri->segment(2) == 'event') {echo "active" ; } ?>"><a href="<?= base_url('user/event'); ?>">Event</a></li>
          <!-- <li class="<?php if($this->uri->segment(2) == 'tes_minat') {echo "active" ; } ?>"><a href="<?= base_url('user/tes_minat/index'); ?>">Tes Minat</a></li> -->
          <li class="<?php if($this->uri->segment(3) == 'cari') {echo "active" ; } ?>"><a href="<?= base_url('user/sanggar/cari'); ?>">Temukan Sanggar</a></li>
          
<!--           <?php $tipe_sanggar = $this->MU_sanggar->getAllTipeSanggar()->result_array(); ?>
          <li class="drop-down"><a href="">Sanggar</a>
            <ul>
              <?php foreach ($tipe_sanggar as $ts): ?>
                <li><a href="<?= base_url(); ?>user/sanggar/index/<?= $ts['id']; ?>"><?= $ts['tipe_sanggar']; ?></a></li>                
              <?php endforeach ?>
            </ul>
          </li> -->
          <?php if ($this->session->userdata('nama')) { ?>

          <li class="drop-down"><a href="">Riwayat</a>
            <ul>
              <li><a href="<?= base_url('user/riwayat/pendaftaran'); ?>">Riwayat Pendaftaran</a></li>
              <li><a href="<?= base_url('user/riwayat/penyewaan'); ?>">Riwayat Penyewaan</a></li>
              <li><a href="<?= base_url('user/riwayat/pengundang'); ?>">Riwayat Undang</a></li>
            </ul>
          </li>

          <?php } else { ?>

          <?php } ?>
          

          <?php if ($this->session->userdata('nama')) { ?>

          <li class="drop-down"><a href=""><?= $this->session->userdata('nama'); ?></a>
            <ul>
              <li><a href="<?= base_url('user/profile'); ?>">Profil saya</a></li>
              <li><a href="<?= base_url('auth/logout'); ?>">Keluar</a></li>
            </ul>
          </li>
            
          <?php } else { ?>

          <li class="get-started"><a href="<?= base_url(); ?>">Login</a></li>

          <?php } ?>
          <!-- <li class="get-started"><a href="<?= base_url(); ?>" class="get-started"><i class="bx bx-search-alt"></i></a></li> -->
        </ul>
      </nav>


      

    </div>
  </header><!-- End Header -->

<?php if($this->uri->segment(2) == 'beranda') { ?>

  <main id="main">

<?php } elseif ($this->uri->segment(3) == 'edit' || $this->uri->segment(3) == 'edit_password' ) { ?>

  <main id="main">

    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2></h2>
          <ol>
            <li><a href="<?= base_url('user/beranda'); ?>">Beranda</a></li>
            <li><a href="<?= base_url('user/profile'); ?>">Profile</a></li>
            <li><?= $judul; ?></li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->

<?php } else { ?>

<main id="main">

    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2></h2>
          <ol>
            <li><a href="<?= base_url('user/beranda'); ?>">Beranda</a></li>
            <li><?= $judul; ?></li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->

<?php } ?>