

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2><?= $judul; ?></h2>
        </div>

        <div class="row">

          <div class="col-lg-8 col-md-12 mx-auto php-email-form" data-aos="fade-up" data-aos-delay="300">
            <?= form_open_multipart(); ?>
              <div class="form-group row">
              	<label class="col-sm-3 col-form-label" for="email" style="font-size: 14px">Email</label>
		            <div class="col-sm-9">
	                <input type="text" name="email" class="form-control" id="email" value="<?= $user['email']; ?>" readonly />
	              </div>
                <div class="validate"></div>
              </div>
              <div class="form-group row">
              	<label class="col-sm-3 col-form-label" for="nama" style="font-size: 14px">Nama Lengkap</label>
		            <div class="col-sm-9">
	                <input type="text" name="nama" class="form-control" id="nama" value="<?= $user['nama']; ?>" />
	                <?= form_error('nama', '<small class="text-danger pl-3">','</small>'); ?>
	              </div>
                <div class="validate"></div>
              </div>
              <div class="form-group row">
              	<label class="col-sm-3 col-form-label" for="tempat_lahir" style="font-size: 14px">Tempat Lahir</label>
		            <div class="col-sm-9">
	                <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" value="<?= $user['tempat_lahir']; ?>" />
	                <?= form_error('tempat_lahir', '<small class="text-danger pl-3">','</small>'); ?>
	              </div>
                <div class="validate"></div>
              </div>
              <div class="form-group row">
              	<label class="col-sm-3 col-form-label" for="tanggal_lahir" style="font-size: 14px">Tanggal Lahir</label>
		            <div class="col-sm-9">
	                <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" value="<?= $user['tanggal_lahir']; ?>" />
	              </div>
                <div class="validate"></div>
              </div>
              <div class="form-group row">
              	<label class="col-sm-3 col-form-label" for="jenis_kelamin" style="font-size: 14px">Jenis Kelamin</label>
		            <div class="col-sm-9">
                  <select name="jenis_kelamin" value="<?= $user['jenis_kelamin']; ?>" class="form-control">
                    <?php if ($user['jenis_kelamin'] == 'Laki-laki'): ?>
                      <option value="Laki-laki" selected="">Laki-laki</option>
                    <?php else: ?>
                      <option value="Perempuan" selected="">Perempuan</option>                      
                    <?php endif ?>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
	              </div>
                <div class="validate"></div>
              </div>
              <div class="form-group row">
              	<label class="col-sm-3 col-form-label" for="alamat" style="font-size: 14px">Alamat</label>
		          <div class="col-sm-9">
		        	<textarea name="alamat" class="form-control" id="alamat"><?= $user['alamat']; ?></textarea>
		        	<?= form_error('alamat', '<small class="text-danger pl-3">','</small>'); ?>
	            </div>
                <div class="validate"></div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label" for="nomor_telepon" style="font-size: 14px">Nomor Telepon</label>
                <div class="col-sm-9">
                  <input type="text" name="nomor_telepon" class="form-control" id="nomor_telepon" value="<?= $user['nomor_telepon']; ?>" />
                  <?= form_error('nomor_telepon', '<small class="text-danger pl-3">','</small>'); ?>
                </div>
                <div class="validate"></div>
              </div>
              <div class="form-group row">
              	<label class="col-sm-3 col-form-label" for="tanggal_lahir" style="font-size: 14px">Foto Profil</label>
		          <div class="col-sm-9">
		          <div class="row">
		            <div class="col-sm-3">
		              <img src="<?= base_url('assets/img/profile/'.$user['gambar']); ?>" class="img-thumbnail">
		            </div>
		            <div class="col-sm-9">
		              <div class="custom-file">
		                <input type="file" name="gambar" class="custom-file-input">
		                <label class="custom-file-label" for="custom-file">Choose file</label>
		              </div>
		            </div>
		          </div>
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