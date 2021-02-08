

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
  <div class="container">

    <div class="section-title" data-aos="fade-up">
      <h3><?= $judul; ?> <?= $sanggar['nama_sanggar']; ?></h3>
    </div>

    <div class="row">

      <div class="col-lg-8 col-md-12 mx-auto php-email-form" data-aos="fade-up" data-aos-delay="300">
        <?= form_open_multipart(); ?>
        	<input type="hidden" name="id_user" value="<?= $user['id']; ?>">
          	<input type="hidden" name="id_sanggar" value="<?= $sanggar['id_sanggar']; ?>">
            <input type="hidden" name="email_sanggar" value="<?= $sanggar['email']; ?>">
          	<input type="hidden" name="kode_pendaftaran" value="KP-<?= sprintf("%03s", $kode_pendaftar) ?>">

          <div class="form-group row">     	
          	<label class="col-sm-3 col-form-label" for="harga" style="font-size: 14px">Nama</label>
	            <div class="col-sm-9">
                <input type="text" class="form-control" id="harga" value="<?= $user['nama']; ?>" readonly />
              </div>
            <div class="validate"></div>
          </div>
          <div class="form-group row">
          	<label class="col-sm-3 col-form-label" for="denda" style="font-size: 14px">Pilihan kelas <?= $sanggar['nama_sanggar']; ?></label>
	            <div class="col-sm-9">
                <select class="form-control" required="" name="id_kelas">
                	<?php foreach ($kelas as $k): ?>
	                	<option value="<?= $k['id']; ?>"><?= $k['nama_kelas']; ?></option>                		
                	<?php endforeach ?>
                </select>
              </div>
            <div class="validate"></div>
          </div>

          <div class="text-center float-right"><button type="submit">Daftar</button></div>
        <?= form_close(); ?>
      </div>

    </div>

  </div>
</section><!-- End Contact Section -->


</main>