<!-- Begin Page Content -->
<div class="container-fluid">
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Kelola Galeri Sanggar</h1>
<div class="row my-3">
	<div class="col-md-5">    
		<button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#newPendaftarModal"><i class="fas fa-plus"></i> Tambah Foto</button>
    <!-- <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#newTkModal">Tambah data User</button> -->
  </div>
</div>
<?= $this->session->flashdata('message'); ?>

<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-body">
		<div class="row">
      <?php foreach ($galeri as $g): ?>
			<div class="col-md-4 mb-3">
				<img src="<?= base_url(); ?>assets/gambar_galeri_sanggar/<?= $g['foto']; ?>" width="200px" height="150px">
				<a href="<?= base_url(); ?>sanggar/galeri/hapus_foto/<?= $g['foto']; ?>" onclick="return confirm('Yakin ?');"><i class="fas fa-trash"></i></a>
			</div>  	
      <?php endforeach; ?>
	</div>
</div>
<!-- /.container-fluid -->
</div>
</div>
</div>
<!-- End of Main Content -->

<!-- Modal Add -->
<div class="modal fade" id="newPendaftarModal" tabindex="-1" role="dialog" aria-labelledby="newPendaftarModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newPendaftarModalLabel">Tambah Foto Sanggar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= form_open_multipart('sanggar/galeri/tambah_galeri'); ?>
        <div class="modal-body">
          <div class="form-group">
            <input type="file" name="foto" class="form-control">
          </div>
          <div class="form-group">
            <input type="hidden" name="id_sanggar" class="form-control" value="<?= $this->session->userdata('id_sanggar'); ?>">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
        </div>
      <?= form_close(); ?>
    </div>
  </div>
</div>