<!-- Begin Page Content -->
<div class="container-fluid">
	<h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
	<?= $this->session->flashdata('message'); ?>

	<div class="row">
		<div class="col-md-6">
			<table class="table table-striped">
			  <tr>
			  	<th>Nama Kriteria</th>
			  	<td>: biaya</td>
			  </tr>
			  <tr>
			  	<th>Jenis Kriteria</th>
			  	<td>: <?php if ($jk['biaya'] == 1): ?>
			  	Core Faktor (CF)
			  	<?php else: ?>
			  	Secondary Faktor (SF)
			  	<?php endif ?></td>
			  </tr>
			</table>
			<a href="#" data-toggle="modal" data-target="#tambahsubkriteria" class="btn btn-primary float-right ml-2" name="ubah">Tambah Sub Kriteria</a>
			<a href="<?= base_url(); ?>administrator/kriteria/index" class="btn btn-success float-right">Kembali</a>
		</div>
	</div><hr>

	<div class="card shadow mb-4">
		<div class="card-body">
		  <div class="table-responsive">
		    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
		      <thead>
		        <tr>
		          <th width="20px">#</th>
		          <th>Nama Sub Kriteria</th>
		          <th width="100px">Nilai</th>
		          <th width="100px" class="text-right">Aksi</th>
		        </tr>
		      </thead>
		      <tbody>
		      <?php
		      $no = 1;
		      foreach ($biaya as $p) :
		       ?>
		        <tr>
		          <td><?= $no++; ?></td>
		          <td><?= $p['biaya']; ?></td>
		          <td><?= $p['nilai']; ?></td>
		          <td class="text-right">
		          	<a data-toggle="modal" data-target="#editsubkriteria<?= $p['id_biaya']; ?>" href="#" class="badge badge-success">Ubah</a>
		          	<a href="<?= base_url(); ?>administrator/kriteria/hapus_biaya/<?= $p['id_biaya']; ?>" class="badge badge-danger" onclick="return confirm('Yakin ?');">Hapus</a>
		          </td>
		        </tr>
		      <?php endforeach; ?>
		      </tbody>
		    </table>
		  </div>
		</div>
	</div>
</div>
</div>

<!-- Modal Add -->
<div class="modal fade" id="tambahsubkriteria" tabindex="-1" role="dialog" aria-labelledby="tambahsubkriteriaLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahsubkriteriaLabel">Tambahkan Sub Kriteria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= form_open_multipart('administrator/kriteria/tambah_biaya'); ?>
        <div class="modal-body">
          <div class="form-group">
            <label>Nama Sub Kriteria</label>
            <input type="text" name="biaya" class="form-control" value="<?= set_value('biaya'); ?>" required>
          </div>
          <div class="form-group">
            <label>Nilai</label>
            <input type="number" name="nilai" class="form-control" value="<?= set_value('nilai'); ?>" required>
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


<!-- Edit -->
<?php foreach ($biaya as $p) : ?>
<div class="modal fade" id="editsubkriteria<?= $p['id_biaya']; ?>" tabindex="-1" role="dialog" aria-labelledby="editsubkriteriaLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editsubkriteriaLabel">Edit Sub Kriteria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= form_open_multipart('administrator/kriteria/edit_biaya/'.$p['id_biaya']); ?>
        <div class="modal-body">
          <div class="form-group">
            <label>Nama Sub Kriteria</label>
            <input type="text" name="biaya" class="form-control" value="<?= $p['biaya']; ?>" required>
            <input type="hidden" name="id_biaya" class="form-control" value="<?= $p['id_biaya']; ?>" required>
          </div>
          <div class="form-group">
            <label>Nilia</label>
            <input type="number" name="nilai" class="form-control" value="<?= $p['nilai']; ?>" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="tambah">Edit</button>
        </div>
      <?= form_close(); ?>
    </div>
  </div>
</div>
<?php endforeach; ?>