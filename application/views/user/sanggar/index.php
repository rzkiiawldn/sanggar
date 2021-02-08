
	<!-- ======= Counts Section ======= -->
    <section id="counts" class="counts my-5">
      <div class="container">

      	<div class="section-title" data-aos="fade-up">
          <h3><?= $tipe_sanggar['tipe_sanggar']; ?></h3>
          <p>Terdapat <b><?= $total_sanggar; ?></b> sanggar dengan kategori <b><?= $tipe_sanggar['tipe_sanggar']; ?></b></p>
        </div>

		<div class="row">          
          <?php
		      $no = 1;
		      foreach ($sanggar as $s) :
		       ?>
              <div class="col-lg-3">
                <div class="card card-small mb-4 pt-3">
                  <div class="card-header border-bottom text-center">
                    <div class="mb-3 mx-auto">
                      <img class="rounded-circle" src="<?= base_url(); ?>assets/img/sanggar/profile/<?= $s['foto_sanggar']; ?>" alt="User Avatar" width="110" height="100"> </div>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item p-4">
                      <strong class="text-muted d-block mb-2"><?= $s['nama_sanggar']; ?></strong>
                      <p style="font-size: 14px">"<?= word_limiter($s['deskripsi_seni'], 5);  ?>"</p>
                    </li>
                  </ul>
                  <a href="<?= base_url(); ?>user/sanggar/detail_sanggar/<?= $s['id_sanggar']; ?>" class="btn btn-info">Detail sanggar</a>
                </div>
              </div>          	
          <?php endforeach ?>
        </div>

      </div>
    </section>

</main>