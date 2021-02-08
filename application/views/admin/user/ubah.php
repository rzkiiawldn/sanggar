<div class="container-fluid">
	<div class="row">
		<div class="col-md-6">
			<div class="card">
			  <div class="card-body">
			    <?= form_open_multipart(); ?>
			    	<input type="hidden" name="id" value="<?= $data_user['id']; ?>">
				  <div class="form-group">
				    <label for="nama">Nama Lengkap</label>
				    <input type="text" class="form-control" id="nama" value="<?= $data_user['nama']; ?>" name="nama">
				    <small class="form-text text-danger"><?= form_error('nama'); ?></small>
				  </div>
				  <div class="form-group">
				    <label for="email">Email Aktif</label>
				    <input type="text" class="form-control" id="email" value="<?= $data_user['email']; ?>" name="email" readonly>
				    <small class="form-text text-danger"><?= form_error('email'); ?></small>
				  </div>
				  <div class="form-group">
				    <label for="nomor_telepon">Nomor Telepon</label>
				    <input type="number" class="form-control" id="nomor_telepon" value="<?= $data_user['nomor_telepon']; ?>" name="nomor_telepon">
				    <small class="form-text text-danger"><?= form_error('nomor_telepon'); ?></small>
				  </div>
				  <div class="row">
				  	<div class="col-md-6">
				  	  <div class="form-group">
					    <label for="tempat_lahir">Tempat Lahir</label>
					    <input type="text" class="form-control" id="tempat_lahir" value="<?= $data_user['tempat_lahir']; ?>" name="tempat_lahir">
					    <small class="form-text text-danger"><?= form_error('tempat_lahir'); ?></small>
					  </div>
				  	</div>
				  	<div class="col-md-6">
				  	  <div class="form-group">
					    <label for="tanggal_lahir">Tanggal Lahir</label>
					    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= $data_user['tanggal_lahir']; ?>">
					    <small class="form-text text-danger"><?= form_error('tanggal_lahir'); ?></small>
					  </div>
				  	</div>
				  </div>
				  <div class="form-group">
				    <label for="jenis_kelamin">Jenis Kelamin</label>
				    <select class="form-control" id="jenis_kelamin" value="<?= $data_user['jenis_kelamin']; ?>" name="jenis_kelamin">
				      <?php foreach ($jenis_kelamin as $jk ) : ?>
				      <?php if($jk == $data_user['jenis_kelamin']) : ?>
				      <option value="<?= $jk; ?>" selected><?= $jk; ?></option>
				  	  <?php else : ?>
				  	  <option value="<?= $jk; ?>"><?= $jk; ?></option>
				  	  <?php endif; ?>
				  	  <?php endforeach; ?>
				    </select>
				  </div>
				  <div class="form-group">
				    <label for="alamat">Alamat Lengkap</label>
				    <input type="text" class="form-control" id="alamat" value="<?= $data_user['alamat']; ?>" name="alamat">
				    <small class="form-text text-danger"><?= form_error('jenis_kelamin'); ?></small>
				  </div>
				  <label>Gambar</label>
				  <div class="form-group row">
	  					<div class="row">
	  						<div class="col-sm-3">
	  							<img src="<?= base_url('assets/img/profile/') . $data_user['gambar']; ?>" class="img-thumbnail">
	  						</div>
	  						<div class="col-sm-9">
	  							<div class="custom-file">
	  								<input type="file" name="gambar" class="custom-file-input" id="gambar">
	  								<label class="custom-file-label" for="gambar">Choose file</label>
	  							</div>
	  						</div>
	  					</div>
		  			</div>
		  			<?= form_error('gambar', '<small class="text-danger pl-3">','</small>'); ?>
				  <button class="btn btn-primary float-right ml-2" name="ubah" type="submit">Ubah</button>
				  <a href="<?= base_url(); ?>administrator/user/detail_user/<?= $data_user['id']; ?>" class="btn btn-success float-right">Kembali</a>
				<?= form_close(); ?>
			  </div>
			</div>
		</div>
	</div>
</div>
</div>