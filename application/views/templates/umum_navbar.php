

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <div class="logo mr-auto">
        <h3 class="text-light"><a href="<?= base_url('welcome'); ?>"><span>Sanggarsans</span></a></h3>
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>

          <li>
            <form action="<?= base_url('welcome/cari'); ?>" method="post">
            <div class="input-group" style="width: 250px">
              <input style="font-size: 12px" type="text" class="form-control bg-light border-1 small" placeholder=" Masukan nama sanggar..." name="keyword" style="height: 30px" >
              <div class="input-group-append">
                <input class="btn btn-sm btn-dark" type="submit" name="submit" style="width: 30px" value="cari">
              </div>
            </div>
            </form>
          </li>

          <li class="<?php if($this->uri->segment(2) == 'welcome') {echo "active" ; } ?>"><a href="<?= base_url('welcome'); ?>">Beranda</a></li>
          <li><a href="<?= base_url('welcome/berita'); ?>">Berita</a></li>
          <li><a href="<?= base_url('welcome/event'); ?>">Event</a></li>

          <li class="drop-down"><a href="">Registrasi</a>
            <ul>
              <li><a href="<?= base_url('auth/registration'); ?>">Akun pengguna umum</a></li>
              <li><a href="<?= base_url('auth/registration_sanggar'); ?>">Akun sanggar</a></li>
            </ul>
          </li>
          <li class="get-started"><a href="<?= base_url('auth/'); ?>">Login</a></li>
        </ul>
      </nav>


      

    </div>
  </header><!-- End Header -->


  <main id="main">

    <section class="breadcrumbs">
      <div class="container">



      </div>
    </section>