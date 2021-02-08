

  <!-- ======= About Us Section ======= -->
<section id="about" class="about my-5 counts">
  <div class="container"><br>

    <div class="section-title" data-aos="fade-up">
      <h3><?= $judul; ?> !</h3>
    </div>

    <div class="row">
      <div class="col-lg-8 col-md-12 mx-auto php-email-form" data-aos="fade-up" data-aos-delay="300">
        <?= form_open_multipart(); ?>
          <div class="form-group row">
          	<label class="col-sm-3 col-form-label" for="nama" style="font-size: 14px">Nama Lengkap</label>
	            <div class="col-sm-9">
                <input type="text" name="nama" class="form-control" id="nama" value="<?= $user['nama']; ?>" />
                <?= form_error('nama', '<small class="text-danger pl-3">','</small>'); ?>
              </div>
            <div class="validate"></div>
          </div>
          <div class="text-center float-right"><button type="submit" class="btn btn-primary">Tes minat</button></div>
        <?= form_close(); ?>
      </div>
    </div>

  </div>
</section><!-- End About Us Section -->

</main><br><br><br><br><br>