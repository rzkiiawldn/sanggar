

<!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2><?= $judul; ?></h2>
        </div>
        <div class="row">

          <div class="col-lg-8 col-md-12 mx-auto php-email-form" data-aos="fade-up" data-aos-delay="300">
          <?= $this->session->flashdata('message'); ?>
            <?= form_open_multipart(); ?>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label" for="pw1" style="font-size: 14px">Password Lama</label>
              <div class="col-sm-9">
                  <input type="password" name="pw1" class="form-control" id="pw1"/>
                  <?= form_error('pw1', '<small class="text-danger pl-3">','</small>'); ?>
              </div>
                <div class="validate"></div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label" for="pw2" style="font-size: 14px">Password Baru</label>
              <div class="col-sm-9">
                  <input type="password" name="pw2" class="form-control" id="pw2"/>
                  <?= form_error('pw2', '<small class="text-danger pl-3">','</small>'); ?>
              </div>
                <div class="validate"></div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label" for="pw3" style="font-size: 14px">Ulangi Password</label>
              <div class="col-sm-9">
                  <input type="password" name="pw3" class="form-control" id="pw3"/>
                  <?= form_error('pw3', '<small class="text-danger pl-3">','</small>'); ?>
              </div>
                <div class="validate"></div>
              </div>

              <div class="text-center float-right"><button type="submit">Edit</button></div>
            <?= form_close(); ?>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->


</main>