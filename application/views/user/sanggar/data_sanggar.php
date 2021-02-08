

<!-- ======= Counts Section ======= -->
    <section id="counts" class="counts my-5" data-aos="fade-up">
      <div class="container">
        <!-- DATA SANGGAR -->
        	<div class="section-title">
	          <h3>Data sanggar yang kamu cari</h3>
	            <p>Terdapat <b><?= $total_sanggar; ?></b> sanggar dengan kategori <b><?= $tipe_sanggar['tipe_sanggar']; ?></b></p> 
	        </div>
        <div class="row" data-aos="fade-up">         
          <?php foreach ($sanggar as $s): ?>
              <div class="col-lg-3" data-aos="fade-up">
                <div class="card card-small mb-4 pt-3">
                  <div class="card-header border-bottom text-center">
                    <div class="mb-3 mx-auto">
                      <img class="rounded-circle" src="<?= base_url(); ?>assets/img/sanggar/profile/<?= $s['foto_sanggar']; ?>" alt="User Avatar" width="130" height="110"> 
                    </div>
                  </div>
                  <ul class="list-group list-group-flush" style="height: 150px">
                    <li class="list-group-item p-4">
                      <strong class="text-muted d-block mb-2"><?= $s['nama_sanggar']; ?></strong>
                      <p style="font-size: 13px">"<?= word_limiter($s['deskripsi_seni'] , 5); ?>"</p>
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

</main>