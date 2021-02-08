

<!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details" data-aos="fade-up">
      <div class="container">
      	<div class="section-title" data-aos="fade-up">
	      <h3><?= $judul; ?> <?= $sanggar['nama_sanggar']; ?></h3>
	    </div>

        <?= $this->session->flashdata('message'); ?>

        <div class="row">

          <div class="col-lg-5 portfolio-info d-flex">
            <table class="table">
                <tr>
                    <th>Nama Lengkap</th>
                    <td>: <?= $user['nama']; ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>: <?= $user['email']; ?></td>
                </tr>
                <tr>
                    <th>Tempat Lahir</th>
                    <td>: <?= $user['tempat_lahir']; ?></td>
                </tr>
                <tr>
                    <th>Tanggal Lahir</th>
                    <td>: <?= $user['tanggal_lahir']; ?></td>
                </tr>
                <tr>
                    <th>Jenis Kelamin</th>
                    <td>: <?= $user['jenis_kelamin']; ?></td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>: <?= $user['alamat']; ?></td>
                </tr>
                <tr>
                    <th>Bergabung sejak</th>
                    <td>: <?= date('d F Y',$user['date_created']); ?></td>
                </tr>
            </table>
          </div>

          <div class="col-lg-5 portfolio-info d-flex">
            <table class="table">            	
                <tr>
                    <th>Kode pendaftaran</th>
                    <td>: <?= $kode_pendaftaran; ?></td>
                </tr>
                <tr>
                    <th>Nama Sanggar</th>
                    <td>: <?= $sanggar['nama_sanggar']; ?></td>
                </tr>
                <tr>
                    <th>Program yang dipilih</th>
                    <td>: 
                    	<?php foreach ($kelas as $k): ?>
                    		<?php if ($k['id'] == $id_kelas): ?>
                    			<?= $k['nama_kelas']; ?>
                    		<?php endif ?>
                    	<?php endforeach ?>
                   	</td>
                </tr>
                <tr>
                	<td colspan="2">
                		<?= form_open('user/pendaftaran/daftar'); ?>
                            <input type="hidden" name="nama_pendaftar" value="<?= $user['nama']; ?>">
	                		<input type="hidden" name="email_sanggar" value="<?= $email_sanggar; ?>">
                            <input type="hidden" name="kode_pendaftaran" value="<?= $kode_pendaftaran; ?>">
	                		<input type="hidden" name="id_user" value="<?= $id_user; ?>">
	                		<input type="hidden" name="id_sanggar" value="<?= $id_sanggar; ?>">
	                		<input type="hidden" name="id_kelas" value="<?= $id_kelas; ?>">
	                		<input type="hidden" name="tanggal_pendaftaran" value="<?= $tanggal_pendaftaran; ?>">
	                		<input type="hidden" name="status_pendaftaran" value="<?= $status_pendaftaran; ?>">
                		<button type="submit" class="btn btn-primary float-right ml-2">Lanjutkan</button>
                		<?= form_close(); ?>                		
                		<a href="<?= base_url('user/pendaftaran/index/'.$sanggar['id_sanggar']); ?>" class="btn btn-success float-right">Kembali</a>
                	</td>
                </tr>
            </table>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Details Section -->
</main>