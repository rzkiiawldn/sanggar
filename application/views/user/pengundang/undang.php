

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
  <div class="container">

    <div class="section-title" data-aos="fade-up">
      <h3>FORM <?= $judul; ?> SANGGAR</h3>
    </div>

    <div class="row">

      <div class="col-lg-8 col-md-12 mx-auto php-email-form" data-aos="fade-up" data-aos-delay="300">
        <?= form_open_multipart(); ?>
          <div class="form-group row">
          	<input type="hidden" name="id_user" value="<?= $user['id']; ?>">
          	<input type="hidden" name="id_sanggar" value="<?= $undang['id_sanggar']; ?>">
          	<input type="hidden" name="id_paket_undang" value="<?= $undang['id']; ?>">
          	<input type="hidden" name="kode_undang" value="KU-<?= sprintf("%03s", $kode_pengundang) ?>">
          	<label class="col-sm-3 col-form-label" for="harga" style="font-size: 14px">Harga Sewa/Hari</label>
	            <div class="col-sm-9">
                <input type="text" name="biaya_undang" class="form-control" id="harga" value="<?= $undang['harga']; ?>" readonly />
              </div>
            <div class="validate"></div>
          </div>
          <div class="form-group row">
          	<label class="col-sm-3 col-form-label" for="nama_acara" style="font-size: 14px">Untuk acara ?</label>
	            <div class="col-sm-9">
                <input type="text" name="nama_acara" class="form-control" id="nama_acara"  value="<?= set_value('nama_acara'); ?>" />
                <?= form_error('nama_acara', '<small class="text-danger pl-3">','</small>'); ?>
              </div>
            <div class="validate"></div>
          </div>
          <div class="form-group row">
          	<label class="col-sm-3 col-form-label" for="tanggal_acara" style="font-size: 14px">Tanggal Acara</label>
	            <div class="col-sm-9">
                <input type="date" name="tanggal_acara" class="form-control" id="tanggal_acara" />
                <?= form_error('tanggal_acara', '<small class="text-danger pl-3">','</small>'); ?>
              </div>
            <div class="validate"></div>
          </div>
          <div class="text-center float-right"><button type="submit">Undang</button></div>
        <?= form_close(); ?>
      </div>

    </div>

  </div>
</section><!-- End Contact Section -->


</main>