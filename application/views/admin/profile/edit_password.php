<div class="container-fluid">
	<h1 class="h3 mb-4 text=gray-800"><?= $judul; ?></h1>

 <div class="row">
    <div class="col-lg-8">
      <?= $this->session->flashdata('message'); ?>
    </div>
  </div>

	<div class="row">
		<div class="col-lg-6">
			<form action="" method="post">
				<div class="form-group">
					<label for="pw1">Password Lama</label>
					<input id="pw1" type="password" name="pw1" class="form-control">
					<?= form_error('pw1', '<small class="text-danger pl-3">','</small>'); ?>
				</div>
				<div class="form-group">
					<label for="pw2">Password Baru</label>
					<input id="pw2" type="password" name="pw2" class="form-control">
					<?= form_error('pw2', '<small class="text-danger pl-3">','</small>'); ?>
				</div>
				<div class="form-group">
					<label for="pw3">Ulangi Password Baru</label>
					<input id="pw3" type="password" name="pw3" class="form-control">
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Ubah Password</button>
				</div>
			</form>
		</div>
	</div>

</div>
</div>
