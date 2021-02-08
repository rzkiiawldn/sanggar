<div class="container-fluid">
	<div class="row">
		<div class="col-md-6">
			<div class="card">
			  <div class="card-body">
			    <form action="" method="post">
				  <div class="form-group">
				    <label for="nama">Nama Lengkap</label>
				    <input type="text" class="form-control" id="nama" value="<?= set_value('nama'); ?>" name="nama">
				    <small class="form-text text-danger"><?= form_error('nama'); ?></small>
				  </div>
				  <div class="form-group">
				    <label for="email">Email Aktif</label>
				    <input type="text" class="form-control" id="email" value="<?= set_value('email'); ?>" name="email">
				    <small class="form-text text-danger"><?= form_error('email'); ?></small>
				  </div>
				  <div class="row">
				  	<div class="col-md-6">
				  	  <div class="form-group">
					    <label for="tempat_lahir">Tempat Lahir</label>
					    <input type="text" class="form-control" id="tempat_lahir" value="<?= set_value('tempat_lahir'); ?>" name="tempat_lahir">
					    <small class="form-text text-danger"><?= form_error('tempat_lahir'); ?></small>
					  </div>
				  	</div>
				  	<div class="col-md-6">
				  	  <div class="form-group">
					    <label for="tanggal_lahir">Tanggal Lahir</label>
					    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= set_value('tanggal_lahir'); ?>">
					    <small class="form-text text-danger"><?= form_error('tanggal_lahir'); ?></small>
					  </div>
				  	</div>
				  </div>
				  <div class="form-group">
				    <label for="jenis_kelamin">Jenis Kelamin</label>
				    <select class="form-control" id="jenis_kelamin" value="<?= set_value('jenis_kelamin'); ?>" name="jenis_kelamin">
				      <option value="Laki-laki">Laki-laki</option>
				      <option value="Perempuan">Perempuan</option>
				    </select>
				  </div>
				  <div class="form-group">
				    <label for="alamat">Alamat Lengkap</label>
				    <input type="text" class="form-control" id="alamat" value="<?= set_value('alamat'); ?>" name="alamat">
				    <small class="form-text text-danger"><?= form_error('jenis_kelamin'); ?></small>
				  </div>
				  <div class="form-group">
				    <label for="gambar">Foto Profil</label>
				    <input type="file" class="form-control" id="gambar">
				  </div>
				  <div class="row">
				  	<div class="col-md-6">
				  	  <div class="form-group">
					    <label for="password1">Password</label>
					    <input type="password" class="form-control" id="password1" name="password1">
					    <small class="form-text text-danger"><?= form_error('password1'); ?></small>
					  </div>
				  	</div>
				  	<div class="col-md-6">
				  	  <div class="form-group">
					    <label for="password2">Ulangi Password</label>
					    <input type="password" class="form-control" id="password2" name="password2">
					  </div>
				  	</div>
				  </div>
				  <button class="btn btn-primary float-right ml-2" value="<?= set_value(''); ?>" name="tambah" type="submit">Tambah</button>
				  <button class="btn btn-danger float-right ml-2" type="reset">Reset</button>
				  <a href="<?= base_url('administrator/user/index'); ?>" class="btn btn-success float-right">Kembali</a>
				</form>
			  </div>
			</div>
		</div>
	</div>
</div>
</div>