<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

  <div class="row">
    <div class="col-lg-8">
      <?= $this->session->flashdata('message'); ?>
    </div>
  </div>

<?= form_open_multipart() ?>
  <div class="card mb-3 col-lg-8">
  	  <div class="form-group row no-gutters mt-3">
      	<label class="col-sm-3 col-form-label" for="email">Email</label>
        <div class="col-sm-9">
          <input type="text" name="email" class="form-control" value="<?= $user['email']; ?>" readonly>
        </div>
      </div>
      <div class="form-group row no-gutters mt-3">
        <label class="col-sm-3 col-form-label" for="nama">Nama Lengkap</label>
        <div class="col-sm-9">
          <input type="text" name="nama" class="form-control" value="<?= $user['nama']; ?>">
          <?= form_error('nama', '<small class="text-danger pl-3">','</small>'); ?>
        </div>
      </div>
      <div class="form-group row no-gutters mt-3">
        <label class="col-sm-3 col-form-label" for="gambar">Foto Profil</label>
        <div class="col-sm-9">
          <div class="row">
            <div class="col-sm-3">
              <img src="<?= base_url('assets/img/profile/'.$user['gambar']); ?>" class="img-thumbnail">
            </div>
            <div class="col-sm-9">
              <div class="custom-file">
                <input type="file" name="gambar" class="custom-file-input">
                <label class="custom-file-label" for="custom-file">Choose file</label>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group row mt-3">
        <div class="col-md-6"></div>
        <div class="col-md-6">
          <button type="submit" class="btn btn-primary float-right">Edit</button>
        </div>
      </div>
  </div>
<?= form_close(); ?>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

