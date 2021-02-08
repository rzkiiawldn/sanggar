<!-- Begin Page Content -->
<div class="container-fluid">
	<h3><?= $judul; ?></h3>
	<hr><br>
<div class="card">
<div class="card-body">

<?= form_open_multipart(); ?>

<div class="row">
	<div class="col-md-6" style="font-size: 14px">
		<input type="hidden" name="id_sanggar" value="<?= $sanggar['id_sanggar']; ?>">
		<div class="form-group">
		    <label for="nama_sanggar">Nama Sanggar <small class="text-danger">*</small></label>
		    <input type="text" value="<?= $sanggar['nama_sanggar']; ?>" class="form-control" id="nama_sanggar" name="nama_sanggar">
		    <small class="form-text text-danger"><?= form_error('nama_sanggar'); ?></small>
		 </div>
		 <div class="form-group">
		    <label for="nama">Nama Ketua Sanggar <small class="text-danger">*</small></label>
		    <input type="text" value="<?= $sanggar['nama_ketua']; ?>" class="form-control" id="nama" name="nama_ketua">
		    <small class="form-text text-danger"><?= form_error('nama_ketua'); ?></small>
		 </div>
		 <div class="form-group">
		    <label for="tipe_sanggar_id">Tipe Sanggar</label>
		    <select class="form-control" name="tipe_sanggar_id" value="<?= $sanggar['tipe_sanggar_id']; ?>">
		      <?php foreach ($tipe_sanggar as $t ) : ?>
		      <?php if($t['id'] == $sanggar['tipe_sanggar_id']) : ?>
		      <option value="<?= $t['id']; ?>" selected><?= $t['tipe_sanggar']; ?></option>
		  	  <?php else : ?>
		  	  <option value="<?= $t['id']; ?>"><?= $t['tipe_sanggar']; ?></option>
		  	  <?php endif; ?>
		  	  <?php endforeach; ?>
		    </select>
		    <small class="form-text text-danger"><?= form_error('kategori_seni'); ?></small>
		 </div>
		 <div class="form-group">
		    <label for="deskripsi_seni">Informasi Sanggar</label>
		    <textarea style="height: 100px" class="form-control" id="deskripsi_seni" name="deskripsi_seni"><?= $sanggar['deskripsi_seni']; ?></textarea>
		    <small class="form-text text-danger"><?= form_error('deskripsi_seni'); ?></small>
		 </div>
		 <div class="form-group">
		    <label for="email">Email aktif <small class="text-danger">*</small></label>
		    <input type="text" value="<?= $sanggar['email']; ?>" class="form-control" id="email" name="email">
		    <small class="form-text text-danger"><?= form_error('email'); ?></small>
		 </div>
		 <div class="form-group">
		    <label for="nomor_telepon">Telepon Sanggar</label>
		    <input type="text" value="<?= $sanggar['nomor_telepon']; ?>" class="form-control" id="nomor_telepon" name="nomor_telepon">
		    <small class="form-text text-danger"><?= form_error('nomor_telepon'); ?></small>
		 </div>
	</div>

	<div class="col-md-6" style="font-size: 14px">
		<div class="form-group">
		    <label for="alamat">Alamat Sanggar</label>
		    <textarea style="height: 100px" class="form-control" id="alamat" name="alamat"><?= $sanggar['alamat']; ?></textarea>
		    <small class="form-text text-danger"><?= form_error('alamat'); ?></small>
		 </div>
		 <label>Foto Sanggar</label>
		  <div class="form-group row">
				<div class="row">
					<div class="col-sm-3">
						<img src="<?= base_url('assets/img/profile/') . $sanggar['foto_sanggar']; ?>" class="img-thumbnail">
					</div>
					<div class="col-sm-9">
						<div class="custom-file">
							<input type="file" name="foto_sanggar" class="custom-file-input" id="foto_sanggar">
							<label class="custom-file-label" for="foto_sanggar">Choose file</label>
						</div>
					</div>
				</div>
  			</div>
  		  <label>Foto Ketua Sanggar</label>
		  <div class="form-group row">
				<div class="row">
					<div class="col-sm-3">
						<img src="<?= base_url('assets/img/profile/') . $sanggar['foto_ketua_sanggar']; ?>" class="img-thumbnail">
					</div>
					<div class="col-sm-9">
						<div class="custom-file">
							<input type="file" name="foto_ketua_sanggar" class="custom-file-input" id="foto_ketua_sanggar">
							<label class="custom-file-label" for="foto_ketua_sanggar">Choose file</label>
						</div>
					</div>
				</div>
  			</div>	 
		<div class="my-4 float-right">
			<button class="btn btn-primary float-right" type="submit" name="tambah">Simpan</button>
			<a href="<?= base_url(); ?>administrator/sanggar/detail/<?= $sanggar['id_sanggar']; ?>" class="btn btn-success float-right mr-3">Kembali</a>
		</div>	 
	</div>
</div>
	<?= form_close(); ?>
</div>
</div>
</div>
</div>