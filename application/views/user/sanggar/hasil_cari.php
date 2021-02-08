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
    </section>

    <section id="counts" class="counts my-5"> 
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h3>Sanggar yang anda cari</h3>
          <p class="mt-0" style="color: red">TOTAL : <?= $total_sanggar; ?></p>
        </div>

        <div class="row" data-aos="fade-up">
        	<?php if (empty($sanggar)): ?>
        		<div class="col-lg">
        			<div class="alert alert-danger" role="alert">
	        			Sanggar tidak ditemukan!
	        		</div>
        		</div>
        	<?php endif ?>

        <?php foreach ($sanggar as $s): ?>
          <div class="col-lg-3">
                <div class="card card-small mb-4 pt-3">
                  <div class="card-header border-bottom text-center">
                    <div class="mb-3 mx-auto">
                      <img class="rounded-circle" src="<?= base_url(); ?>assets/img/sanggar/profile/<?= $s['foto_sanggar']; ?>" alt="User Avatar" width="130" height="110"> 
                    </div>
                  </div>
                  <ul class="list-group list-group-flush" style="height: 150px">
                    <li class="list-group-item p-4">
                      <strong class="text-muted d-block mb-2"><?= $s['nama_sanggar']; ?></strong>
                      <p style="font-size: 13px" class="mb-0">"<?= word_limiter($s['deskripsi_seni'] , 5); ?>"</p>
                      <p style="font-size: 13px" class="mb-0">Tipe sanggar : <b><?= $s['tipe_sanggar']; ?></b></p>
                    </li>
                  </ul>
                  <?php if ($this->uri->segment(1) == 'welcome'): ?>
                  <a href="<?= base_url(); ?>welcome/detail_sanggar/<?= $s['id_sanggar']; ?>" class="btn btn-info">Detail sanggar</a>
                  <?php else: ?>
                  <a href="<?= base_url(); ?>user/sanggar/detail_sanggar/<?= $s['id_sanggar']; ?>" class="btn btn-info">Detail sanggar</a>
                  <?php endif ?>
                </div>
              </div>        
        <?php endforeach ?>

        </div>

      </div>
    </section>