<!-- Begin Page Content -->
<!-- Begin Page Content -->
<div class="container-fluid">
<div class="row">
 <div class="card">
	<div class="card-body">
		<div class="col-md-4">
			<div class="card" style="width: 18rem;">
			  <div class="card-body">
			  	<label class="card-text"><b>Foto Sanggar</b></label>
			  </div>
			  <img src="<?= base_url(); ?>assets/img/sanggar/profile/<?= $sanggar['foto_sanggar']; ?>" class="card-img-top" alt="...">
			  <div class="card-body">
			    <p class="card-text">Member since <?= date('d F Y', $sanggar['date_created']); ?></p>
			  </div>
			</div>
			<!-- <div class="card" style="width: 18rem;">
			  <div class="card-body">
			  	<label class="card-text"><b>Foto Ketua Sanggar</b></label>
			  </div>
			  <img src="<?= base_url(); ?>assets/img/profile/<?= $sanggar['foto_ketua_sanggar']; ?>" class="card-img-top" alt="...">
			  <div class="card-body">
			    <p class="card-text">Member since <?= date('d F Y', $sanggar['date_created']); ?></p>
			  </div>
			</div> -->
		</div>
	</div>
</div>
		<div class="col-md-7">
			<table class="table table-striped">
			  <tr>
			  	<th>Nama Sanggar</th>
			  	<td>: <?= $sanggar['nama_sanggar']; ?></td>
			  </tr>
			  <tr>
			  	<th>Nama Ketua Sanggar</th>
			  	<td>: <?= $sanggar['nama_ketua']; ?></td>
			  </tr>
			  <tr>
			  	<th>Tipe Sanggar</th>
			  	<td>: <?= $sanggar['tipe_sanggar']; ?></td>
			  </tr>
			  <tr>
			  	<th>Deskripsi Sanggar</th>
			  	<td>: <?= $sanggar['deskripsi_seni']; ?></td>
			  </tr>
			  <tr>
			  	<th>Email Sanggar</th>
			  	<td>: <?= $sanggar['email']; ?></td>
			  </tr>
			  <tr>
			  	<th>Telepon Sanggar</th>
			  	<td>: <?= $sanggar['nomor_telepon']; ?></td>
			  </tr>
			  <tr>
			  	<th>Alamat Sanggar</th>
			  	<td>: <?= $sanggar['alamat']; ?></td>
			  </tr>
			</table>
			<a href="<?= base_url(); ?>administrator/sanggar/edit/<?= $sanggar['id_sanggar']; ?>" class="btn btn-primary float-right mx-2" name="ubah">Edit Profile</a>
			<a href="<?= base_url(); ?>administrator/sanggar/change_password/<?= $sanggar['id_sanggar']; ?>" class="btn btn-primary float-right ml-2" name="ubah">Ubah Password</a>
			<a href="<?= base_url(); ?>administrator/sanggar/index" class="btn btn-success float-right">Kembali</a>
		</div>
	</div>
	
</div>
</div>