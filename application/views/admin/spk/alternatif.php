<!-- Begin Page Content -->
<div class="container-fluid">
	<h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
	<?= $this->session->flashdata('message'); ?>

	<div class="row">
		<div class="col-md">
			<a href="<?= base_url('administrator/spk_pm/lihat_nilai'); ?>" class="btn btn-primary mb-3">Lihat Nilai</a>
			<a href="<?= base_url('administrator/spk_pm/report'); ?>" class="btn btn-success mb-3">Report</a>
		</div>
	</div>

	<div class="card shadow mb-4">
		<div class="card-body">
		  <div class="table-responsive">
		    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
		      <thead>
		        <tr>
		          <th width="20px">#</th>
		          <th>Nama Sanggar</th>
		          <th width="200px">Aksi</th>
		        </tr>
		      </thead>
		      <tbody>
		      <?php
		      $no = 1;
		      foreach ($sanggar as $k) :
		       ?>
		        <tr>
		          <td><?= $no++; ?></td>
		          <td><?= $k['nama_sanggar']; ?></td>
		          <td class="text-right">
		          	<a href="<?= base_url(); ?>administrator/spk_pm/tambah_alternatif/<?= $k['id_sanggar']; ?>" class="badge badge-primary">Tambah data</a>
		          	<a href="<?= base_url(); ?>administrator/spk_pm/edit_alternatif/<?= $k['id_sanggar']; ?>" class="badge badge-success">Ubah</a>
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