<div class="container-fluid">
	<h1 class="h3 mb-4 text=gray-800"><?= $judul; ?></h1>

 <div class="row">
    <div class="col-lg-8">
      <?= $this->session->flashdata('message'); ?>
    </div>
  </div>

	<form action="" method="post">
	<div class="card mb-3 col-lg-8">
		<div class="form-group row no-gutters mt-3">
	        <label class="col-sm-3 col-form-label" for="pw1">Password Lama</label>
	        <div class="col-sm-9">
	          <input type="password" name="pw1" class="form-control" id="pw1">
	          <?= form_error('pw1', '<small class="text-danger pl-3">','</small>'); ?>
	        </div>
	    </div>
	    <div class="form-group row no-gutters mt-3">
	        <label class="col-sm-3 col-form-label" for="pw2">Password Baru</label>
	        <div class="col-sm-9">
	          <input type="password" name="pw2" class="form-control" id="pw2">
	          <?= form_error('pw2', '<small class="text-danger pl-3">','</small>'); ?>
	        </div>
	    </div>
	    <div class="form-group row no-gutters mt-3">
	        <label class="col-sm-3 col-form-label" for="pw3">Ulangi Password Baru</label>
	        <div class="col-sm-9">
	          <input type="password" name="pw3" class="form-control" id="pw3">
	          <?= form_error('pw3', '<small class="text-danger pl-3">','</small>'); ?>
	        </div>
	    </div>
	    <div class="form-group row mt-3">
	        <div class="col-md-6"></div>
	        <div class="col-md-6">
	          <button type="submit" class="btn btn-primary float-right">Edit Password</button>
	          <a href="<?= base_url('sanggar/profile/'); ?>" class="btn btn-warning float-right mr-2">Kembali</a>
	        </div>
	    </div>
	</div>
	</form>

</div>
</div>
