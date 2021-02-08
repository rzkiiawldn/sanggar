<!-- Begin Page Content -->
<div class="container-fluid">
	<h3>Tambah Sanggar</h3>
	<p><small class="text-danger">* wajib diisi</small> </p>
	<hr><br>
<div class="card">
<div class="card-body">
	<?= form_open_multipart(); ?>
<div class="row">
	<div class="col-md-6" style="font-size: 14px">
		<div class="form-group">
		    <label for="nama_sanggar">Nama Sanggar <small class="text-danger">*</small></label>
		    <input type="text" value="<?= set_value('nama_sanggar'); ?>" class="form-control" id="nama_sanggar" name="nama_sanggar">
		    <small class="form-text text-danger"><?= form_error('nama_sanggar'); ?></small>
		 </div>
		 <div class="form-group">
		    <label for="nama">Nama Ketua Sanggar <small class="text-danger">*</small></label>
		    <input type="text" value="<?= set_value('nama_ketua'); ?>" class="form-control" id="nama" name="nama_ketua">
		    <small class="form-text text-danger"><?= form_error('nama_ketua'); ?></small>
		 </div>
		 <div class="form-group">
		    <label for="nik_ketua">NIK Ketua</label>
		    <input type="number" value="<?= set_value('nik_ketua'); ?>" class="form-control" id="nik_ketua" name="nik_ketua">
		    <small class="form-text text-danger"><?= form_error('nik_ketua'); ?></small>
		 </div>
		 <div class="form-group">
		    <label for="tipe_sanggar_id">Tipe Sanggar</label>
		    <select class="form-control" name="tipe_sanggar_id">
		    	<option>--kategori sanggar--</option>
		    	<?php foreach ($tipe_sanggar as $t): ?>
		    	<option value="<?= $t['id']; ?>"><?= $t['tipe_sanggar']; ?></option>
		    	<?php endforeach; ?>
		    </select>
		    <small class="form-text text-danger"><?= form_error('kategori_seni'); ?></small>
		 </div>
		 <div class="form-group">
		    <label for="deskripsi_seni">Informasi Sanggar</label>
		    <input type="text" value="<?= set_value('deskripsi_seni'); ?>" class="form-control" id="deskripsi_seni" name="deskripsi_seni">
		    <small class="form-text text-danger"><?= form_error('deskripsi_seni'); ?></small>
		 </div>
		 <div class="form-group">
		    <label for="email">Email aktif <small class="text-danger">*</small></label>
		    <input type="text" value="<?= set_value('email'); ?>" class="form-control" id="email" name="email">
		    <small class="form-text text-danger"><?= form_error('email'); ?></small>
		 </div>
		 <div class="form-group">
		    <label for="nomor_telepon">Telepon Sanggar</label>
		    <input type="text" value="<?= set_value('nomor_telepon'); ?>" class="form-control" id="nomor_telepon" name="nomor_telepon">
		    <small class="form-text text-danger"><?= form_error('nomor_telepon'); ?></small>
		 </div>
		 <div class="row">
		 	<div class="col-md-6">
		 		<div class="form-group">
				    <label for="password1">Password <small class="text-danger">*</small></label>
				    <input type="password" class="form-control" id="password1" name="password1">
				    <small class="form-text text-danger"><?= form_error('password1'); ?></small>
				</div>
		 	</div>
		 	<div class="col-md-6">
		 		<div class="form-group">
				    <label for="password2">Ulangi password <small class="text-danger">*</small></label>
				    <input type="password" class="form-control" id="password2" name="password2">
				    <small class="form-text text-danger"><?= form_error('password2'); ?></small>
				</div>
		 	</div>
		 </div>
	</div>

	<div class="col-md-6" style="font-size: 14px">
		<div class="form-group">
		    <label for="alamat">Alamat Sanggar</label>
		    <input type="text" value="<?= set_value('alamat'); ?>" class="form-control" id="alamat" name="alamat">
		    <small class="form-text text-danger"><?= form_error('alamat'); ?></small>
		 </div>
		 <div class="form-group">
		    <label for="kota">Kota</label>
		    <input type="text" value="<?= set_value('kota'); ?>" class="form-control" id="kota" name="kota">
		    <small class="form-text text-danger"><?= form_error('kota'); ?></small>
		 </div>
		 <div class="form-group">
		    <label for="kecamatan">Kecamatan</label>
		    <input type="text" value="<?= set_value('kecamatan'); ?>" class="form-control" id="kecamatan" name="kecamatan">
		    <small class="form-text text-danger"><?= form_error('kecamatan'); ?></small>
		 </div>
		 <div class="form-group">
		    <label for="kelurahan">Kelurahan</label>
		    <input type="text" value="<?= set_value('kelurahan'); ?>" class="form-control" id="kelurahan" name="kelurahan">
		    <small class="form-text text-danger"><?= form_error('kelurahan'); ?></small>
		 </div>
		 <div class="form-group">
		    <label for="kode_pos">Kode Pos</label>
		    <input type="text" value="<?= set_value('kode_pos'); ?>" class="form-control" id="kode_pos" name="kode_pos">
		    <small class="form-text text-danger"><?= form_error('kode_pos'); ?></small>
		 </div>
		 <div class="form-group">
		 	<label>Foto Sanggar</label>
			 <input type="file" class="form-control" name="gambar">
		 </div>
		 <div class="form-group">
		 	<label>Foto Ketua Sanggar</label>
			 <input type="file" class="form-control" name="foto_ketua_sanggar">
		 </div>		 
		<div class="my-4 float-right">
			<button class="btn btn-primary float-right" type="submit" name="tambah">Simpan</button>
			<a href="<?= base_url(); ?>administrator/sanggar/index" class="btn btn-success float-right mr-3">Kembali</a>
		</div>	 
	</div>
</div>
	<?= form_close(); ?>
</div>
</div>
</div>
</div>