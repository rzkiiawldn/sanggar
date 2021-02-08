<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

  <div class="row">
	  <div class="col-lg-6">
	  	<?= $this->session->flashdata('message'); ?>
	  	<div class="card">
			<div class="card-body">
			  	<form action="" method="post">
			  		<input type="hidden" name="id_sanggar" value="<?= $sanggar['id_sanggar']; ?>">
			  		<!-- <div class="form-group">
			  			<label for="password">Password Lama</label>
			  			<input type="password" class="form-control" id="password" name="password" >
			  			<?= form_error('password', '<small class="text-danger pl-3">','</small>'); ?>
			  		</div> -->
			  		<div class="form-group">
			  			<label for="new_password1">Password Baru</label><small>(Min 4 digit)</small>
			  			<input type="password" class="form-control" id="new_password1" name="new_password1" >
			  			<?= form_error('new_password1', '<small class="text-danger pl-3">','</small>'); ?>
			  		</div>
			  		<div class="form-group">
			  			<label for="new_password2">Ulangi Password</label>
			  			<input type="password" class="form-control" id="new_password2" name="new_password2" >
			  			<?= form_error('new_password2', '<small class="text-danger pl-3">','</small>'); ?>
			  		</div>
			  		<div class="form-group">
			  			<button type="submit" class="btn btn-primary float-right" name="edit">Save Password</button>
			  			<a href="<?= base_url(); ?>administrator/sanggar/detail/<?= $sanggar['id_sanggar']; ?>" class="btn btn-success float-right mr-2">Kembali</a>
			  		</div>
			  	</form>
			</div>
		</div>
	  </div>
  </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

