<!-- Begin Page Content -->
<div class="container-fluid">
	<h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
	<?= $this->session->flashdata('message'); ?>

	<div class="row">
		<div class="col-md-6">
			<table class="table table-striped">
			  <tr>
			  	<th>Nama Kriteria</th>
			  	<td>: Pendidikan</td>
			  </tr>
			  <tr>
			  	<th>Jenis Kriteria</th>
			  	<td>: <?php if ($jk['pendidikan'] == 1): ?>
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
		          <th width="150px">Tipe Sanggar</th>
		          <th width="100px" class="text-right">Aksi</th>
		        </tr>
		      </thead>
		      <tbody>
		      <?php
		      $no = 1;
		      foreach ($pendidikan as $p) :
		       ?>
		        <tr>
		          <td><?= $no++; ?></td>
		          <td><?= $p['pendidikan']; ?></td>
		          <td><?= $p['tipe_sanggar']; ?></td>
		          <td class="text-right">
		          	<a data-toggle="modal" data-target="#editsubkriteria<?= $p['id_pendidikan']; ?>" href="#" class="badge badge-success">Ubah</a>
		          	<a href="<?= base_url(); ?>administrator/kriteria/hapus_pendidikan/<?= $p['id_pendidikan']; ?>" class="badge badge-danger" onclick="return confirm('Yakin ?');">Hapus</a>
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
      <?= form_open_multipart('administrator/kriteria/tambah_pendidikan'); ?>
        <div class="modal-body">
          <div class="form-group">
            <label>Nama Sub Kriteria</label>
            <input type="text" name="pendidikan" class="form-control" value="<?= set_value('pendidikan'); ?>" required>
          </div>
          <div class="form-group">
          	<label>Tipe Sanggar</label>
          	<select name="tipe_sanggar_id" class="form-control" required="">
          		<option value="">-pilih-</option>
          		<option value="1">Sanggar Tari</option>
          		<option value="2">Sanggar Teater</option>
          		<option value="3">Sanggar Musik</option>
          	</select>
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
<?php foreach ($pendidikan as $p) : ?>
<div class="modal fade" id="editsubkriteria<?= $p['id_pendidikan']; ?>" tabindex="-1" role="dialog" aria-labelledby="editsubkriteriaLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editsubkriteriaLabel">Edit Sub Kriteria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= form_open_multipart('administrator/kriteria/edit_pendidikan/'.$p['id_pendidikan']); ?>
        <div class="modal-body">
          <div class="form-group">
            <label>Nama Sub Kriteria</label>
            <input type="text" name="pendidikan" class="form-control" value="<?= $p['pendidikan']; ?>" required>
            <input type="hidden" name="id_pendidikan" class="form-control" value="<?= $p['id_pendidikan']; ?>" required>
          </div>
          <div class="form-group">
          	<label>Tipe Sanggar</label>
          	<select name="tipe_sanggar_id" class="form-control" required="" value="<?= $p['tipe_sanggar_id']; ?>">
          		<?php if ($p['tipe_sanggar_id'] == 1): ?>
          		<option value="1" selected="">Sanggar Tari</option>
          		<?php elseif ($p['tipe_sanggar_id'] == 2) : ?>
          		<option value="2" selected="">Sanggar Teater</option>
          		<?php else: ?>
          		<option value="3" selected="">Sanggar Musik</option>
          		<?php endif ?>
          		<option value="1">Sanggar Tari</option>
          		<option value="2">Sanggar Teater</option>
          		<option value="3">Sanggar Musik</option>
          	</select>
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
