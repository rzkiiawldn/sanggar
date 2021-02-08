<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

  <div class="row">
    <div class="col-lg-8">
      <?= $this->session->flashdata('message'); ?>
    </div>
  </div>

  <div class="card mb-3 col-lg-8">
  	<div class="row no-gutters">
      	<div class="col-md-4">
      		<img src="<?= base_url('assets/img/profile/') . $user['gambar']; ?>" class="card-img">
      	</div>
      	<div class="col-md-8">
      		<div class="card-body">
      			<h5 class="card-title"><?= $user['nama']; ?></h5>
      			<p class="card-text"><?= $user['email']; ?></p>
      			<p class="card-text"><small class="text-muted">Member since <?= date('d F Y', $user['date_created']); ?></small></p>
      		</div>
      	</div>
      </div>
      <div class="row">
        <div class="col-md-6"></div>
        <div class="col-md-6 float-right mb-3">
          <a class="btn btn-success" href="<?= base_url('administrator/profile/edit'); ?>">Edit Profile</a>
          <a class="btn btn-warning" href="<?= base_url('administrator/profile/edit_password'); ?>">Edit Password</a>
        </div>
      </div>
  </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

