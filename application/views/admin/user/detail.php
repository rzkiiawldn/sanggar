<!-- Begin Page Content -->
<div class="container-fluid">
<div class="row">
 <div class="card">
	<div class="card-body">
		<div class="col-md-4">
			<div class="card" style="width: 18rem;">
			  <img src="<?= base_url(); ?>assets/img/profile/<?= $data_user['gambar']; ?>" class="card-img-top" alt="...">
			  <div class="card-body">
			    <p class="card-text">Member since <?= date('d F Y', $data_user['date_created']); ?></p>
			  </div>
			</div>
		</div>
	</div>
</div>
		<div class="col-md-6">
			<table class="table table-striped">
			  <tr>
			  	<th>Nama</th>
			  	<td>: <?= $data_user['nama']; ?></td>
			  </tr>
			  <tr>
			  	<th>Email</th>
			  	<td>: <?= $data_user['email']; ?></td>
			  </tr>
			  <tr>
			  	<th>No. Telepon</th>
			  	<td>: <?= $data_user['nomor_telepon']; ?></td>
			  </tr>
			  <tr>
			  	<th>Tempat Lahir</th>
			  	<td>: <?= $data_user['tempat_lahir']; ?></td>
			  </tr>
			  <tr>
			  	<th>Tanggal Lahir</th>
			  	<td>: <?= date('d F Y', strtotime($data_user['tanggal_lahir'])); ?></td>
			  </tr>
			  <tr>
			  	<th>Jenis Kelamin</th>
			  	<td>: <?= $data_user['jenis_kelamin']; ?></td>
			  </tr>
			  <tr>
			  	<th>Alamat</th>
			  	<td>: <?= $data_user['alamat']; ?></td>
			  </tr>
			  <tr>
			  	<th>Role</th>
			  	<td>: 
			  		 <?php if($data_user['role_id']==1){ ?>
		                Admin
		            <?php }elseif($data_user['role_id']==2){ ?>
		            	Sanggar
		            <?php }else{ ?>
		            	Pengguna umum
		            <?php } ?>
			  	</td>
			  </tr>
			</table>
			<a href="<?= base_url(); ?>administrator/user/edit_user/<?= $data_user['id']; ?>" class="btn btn-primary float-right ml-2" name="ubah">Edit Profile</a>
			<a href="<?= base_url(); ?>administrator/user/change_password/<?= $data_user['id']; ?>" class="btn btn-primary float-right ml-2" name="ubah">Ubah Password</a>
			<a href="<?= base_url(); ?>administrator/user/index" class="btn btn-success float-right">Kembali</a>
		</div>
	</div>
	
</div>
</div>