

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
  <div class="container">

    <div class="section-title" data-aos="fade-up">
      <h3>FORM <?= $judul; ?> ATRIBUT SANGGAR</h3>
    </div>

    <div class="row">

      <div class="col-lg-8 col-md-12 mx-auto php-email-form" data-aos="fade-up" data-aos-delay="300">
        <?= form_open_multipart(); ?>
          <div class="form-group row">
          	<input type="hidden" name="id_user" value="<?= $user['id']; ?>">
          	<input type="hidden" name="id_sanggar" value="<?= $atribut['id_sanggar']; ?>">
          	<input type="hidden" name="id_atribut" value="<?= $atribut['id']; ?>">
          	<input type="hidden" name="kode_sewa" value="KS-<?= sprintf("%03s", $kode_penyewa) ?>">
          	<label class="col-sm-3 col-form-label" for="harga" style="font-size: 14px">Harga Sewa/Hari</label>
	            <div class="col-sm-9">
                <input type="text" name="harga_sewa" class="form-control" id="harga" value="<?= $atribut['harga']; ?>" readonly />
              </div>
            <div class="validate"></div>
          </div>
          <div class="form-group row">
          	<label class="col-sm-3 col-form-label" for="denda" style="font-size: 14px">Denda/Hari</label>
	            <div class="col-sm-9">
                <input type="text" name="denda_sewa" class="form-control" id="denda" value="<?= $atribut['denda']; ?>" readonly />
              </div>
            <div class="validate"></div>
          </div>
          <div class="form-group row">
          	<label class="col-sm-3 col-form-label" for="tanggal_sewa" style="font-size: 14px">Tanggal Sewa</label>
	            <div class="col-sm-9">
                <input type="date" name="tanggal_sewa" class="form-control" id="tanggal_sewa" />
                <?= form_error('tanggal_sewa', '<small class="text-danger pl-3">','</small>'); ?>
              </div>
            <div class="validate"></div>
          </div>
          <div class="form-group row">
          	<label class="col-sm-3 col-form-label" for="tanggal_kembali" style="font-size: 14px">Tanggal Kembali</label>
	            <div class="col-sm-9">
                <input type="date" name="tanggal_kembali" class="form-control" id="tanggal_kembali"/>
                <?= form_error('tanggal_kembali', '<small class="text-danger pl-3">','</small>'); ?>
              </div>
            <div class="validate"></div>
          </div>

          <div class="text-center float-right"><button type="submit">Sewa</button></div>
        <?= form_close(); ?>
      </div>

    </div>

  </div>
</section><!-- End Contact Section -->


</main>