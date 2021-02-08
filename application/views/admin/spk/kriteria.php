<!-- Begin Page Content -->
<div class="container-fluid">
	<h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
	<?= $this->session->flashdata('message'); ?>

	<div class="row">
		<div class="col-md-6">
			<a href="#" data-toggle="modal" data-target="#tambahkriteria" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Tambahkan Kriteria</a>
		</div>
		<div class="col-md-6">
			<button class="btn btn-info mb-3 float-right">Total Kriteria : <b><?= $total_kriteria; ?></b></a>
		</div>
	</div>

	<div class="card shadow mb-4">
		<div class="card-body">
		  <div class="table-responsive">
		    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
		      <thead>
		        <tr>
		          <th width="20px">#</th>
		          <th>Kriteria</th>
		          <th width="150px">Jenis Kriteria</th>
		          <!-- <th width="120px">Bobot Kriteria</th> -->
		          <th width="200px">Aksi</th>
		        </tr>
		      </thead>
		      <tbody>
		      <?php
		      $no = 1;
		      foreach ($kriteria as $k) :
		       ?>
		        <tr>
		          <td><?= $no++; ?></td>
		          <td><?= $k['kriteria']; ?></td>
		          <td>
		          	<?php if ($k['jenis_kriteria'] == 'CF'): ?>
		          		Core Faktor (CF)
	          		<?php else: ?>
	          			Secondary Faktor (CF)
		          	<?php endif ?>
		          </td>
		          <!-- <td class="text-center"><?= $k['bobot_kriteria']; ?></td> -->
		          <td class="text-right">
		          	<!-- <a href="#" data-toggle="modal" data-target="#detailkriteria<?= $k['id_kriteria']; ?>" class="badge badge-info">Detail</a> -->
		          	<a href="#" data-toggle="modal" data-target="#editkriteria<?= $k['id_kriteria']; ?>" class="badge badge-success">Ubah</a>
		          	<a href="<?= base_url(); ?>administrator/spk_pm/hapus_kriteria/<?= $k['id_kriteria']; ?>" class="badge badge-danger" onclick="return confirm('Yakin ?');">Hapus</a>
		          	<a href="<?= base_url(); ?>administrator/spk_pm/sub_kriteria/<?= $k['id_kriteria']; ?>" class="badge badge-primary">Subkriteria</a>
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
<div class="modal fade" id="tambahkriteria" tabindex="-1" role="dialog" aria-labelledby="tambahkriteriaLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahkriteriaLabel">Tambah Kriteria Penilaian</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= form_open_multipart('administrator/spk_pm/tambah_kriteria'); ?>
        <div class="modal-body">
          <div class="form-group">
            <label>Nama Kriteria</label>
            <input type="text" name="kriteria" class="form-control" value="<?= set_value('kriteria'); ?>">
          </div>
          
          <div class="form-group">
            <label>Jenis Kriteria</label>
          	<select class="form-control" name="jenis_kriteria" required="">
          		<option value="">--Pilih Kriteria--</option>
          		<option value="CF">Core Faktor (CF)</option>
          		<option value="SF">Secondary Faktor (SF)</option>
          	</select>
          </div>

          <div class="form-group">
            <label>Nilai Standar</label>
            <input type="number" name="bobot_kriteria" class="form-control" value="<?= set_value('bobot_kriteria'); ?>" max="5">
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


<!-- Modal EDIT -->
<?php
$no = 0;
foreach($kriteria as $k): $no++; ?>
<div class="modal fade" id="editkriteria<?= $k['id_kriteria']; ?>" tabindex="-1" role="dialog" aria-labelledby="tambahkriteriaLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahkriteriaLabel">Edit Kriteria Penilaian</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('administrator/spk_pm/edit_kriteria/'); ?><?= $k['id_kriteria']; ?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label>Nama Kriteria</label>
            <input type="text" name="kriteria" class="form-control" value="<?= $k['kriteria']; ?>">
            <input type="hidden" name="id_kriteria" class="form-control" value="<?= $k['id_kriteria']; ?>">
          </div>

          <div class="form-group">
            <label>Jenis Kriteria</label>
            <select class="form-control" name="jenis_kriteria" required="" value="<?= $k['jenis_kriteria']; ?>">
              <?php if ($k['jenis_kriteria'] == "CF"): ?>
              <option value="CF" selected="">Core Faktor (CF)</option>
              <?php else: ?>
              <option value="SF" selected="">Secondary Faktor (SF)</option>
              <?php endif ?>

              <option value="CF">Core Faktor (CF)</option>
              <option value="SF">Secondary Faktor (SF)</option>

            </select>
          </div>

          <div class="form-group">
            <label>Nilai Standar</label>
            <input type="number" name="bobot_kriteria" class="form-control" value="<?= $k['bobot_kriteria']; ?>" max="5">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="tambah">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach; ?>


<!-- Modal DETAIL -->
<?php
$no = 0;
foreach($subkriteria as $sk): $no++; ?>
<div class="modal fade" id="detailkriteria<?= $sk['id_kriteria']; ?>" tabindex="-1" role="dialog" aria-labelledby="tambahkriteriaLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahkriteriaLabel">Detail Kriteria Penilaian</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">

        <div class="row">
        	<table class="table table-bordered">
			  <tr>
			  	<th>Kriteria</th>
			  	<th>Jenis Kriteria</th>
			  	<th>Bobot Kriteria</th>
			  </tr>
			  <tr>
			  	<td><?= $sk['kriteria']; ?></td>
			  	<td><?= $sk['jenis_kriteria']; ?></td>
			  	<td><?= $sk['bobot_kriteria']; ?></td>
			  </tr>
			</table>
        </div><hr>

        <div class="row">
        	<table class="table table-bordered">
			  <tr>
			  	<th>Sub Kriteria</th>
			  	<td>: <?= $sk['subkriteria']; ?></td>
			  </tr>
			  <tr>
			  	<th>Nilai</th>
			  	<td>: <?= $sk['bobot_subkriteria']; ?></td>
			  </tr>
			</table>
        </div>
          

          

          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
  </div>
</div>
<?php endforeach; ?>