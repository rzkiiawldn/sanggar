<div class="container-fluid">
	<div class="row">
		<div class="col-md-4">
			<div class="card">
			  <div class="card-body">
				  <table>
				  	<tr>
				  		<th>Nilai</th>
				  		<th>Keterangan</th>
				  	</tr>
				  	<?php foreach ($nilai_ketentuan as $key => $value) : ?>
				  		<tr>
				  			<td><?= $value['nilai']; ?></td>
				  			<td><?= $value['keterangan']; ?></td>
				  		</tr>
				  	<?php endforeach; ?>
				  </table>
			  </div>
			</div>
		</div>


		<div class="col-md-6">
			<div class="card">
			  <div class="card-body">
			    <form action="<?= base_url(); ?>administrator/spk_pm/tambah" method="post">
				  <div class="form-group">
				    <label for="sanggar_id">Alternatif</label>
				    <select class="form-control" id="sanggar_id" value="<?= set_value('id_sanggar'); ?>" name="id_sanggar[]">
				      <option value="">-Pilih Sanggar-</option>
				    <?php foreach($sanggar as $s): ?>
				      <option value="<?= $s['id_sanggar']; ?>"><?= $s['nama_sanggar']; ?></option>
				     <?php endforeach; ?>
				    </select>
				  </div>

				  <div class="row">
				  	<?php foreach($sub_kriteria as $sk): ?>
				  	<div class="col-md-3">
				  		<div class="form-group">
						    <label><?= $sk['nama_sub']; ?><input type="hidden" name="id_sub[]" value="<?= $sk['id_sub']; ?>"></label>
						    <select class="form-control" name="nilai[]">
						      <option value="">--</option>
						    <?php foreach($nilai_ketentuan as $nk): ?>
						      <option value="<?= $nk['nilai']; ?>"><?= $nk['nilai']; ?></option>
						     <?php endforeach; ?>
						    </select>
						  </div>
				  	</div>
				  	<?php endforeach; ?>
				  </div>
				  

				  <button class="btn btn-primary float-right ml-2" name="tambah" type="submit">Tambah</button>
				  <a href="<?= base_url('administrator/spk_pm/index'); ?>" class="btn btn-success float-right">Kembali</a>
				</form>
			  </div>
			</div>
		</div>
	</div>

	<div class="card shadow my-4">
		<div class="card-body">
		  <div class="table-responsive">
		    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
		      <thead>
		        <tr>
		          <th>#</th>
		          <th>Nama Sanggar</th>
		          <th>Kriteria</th>
		          <th>Nilai</th>
		          <th>Aksi</th>
		        </tr>
		      </thead>
		      <tbody>
		      <?php
		      $no = 1;
		      foreach ($alternatif as $a) :
		       ?>
		        <tr>
		          <td><?= $no++; ?></td>
		          <td><?= $a['nama_sanggar']; ?></td>
		          <td><?= $a['nama_sub']; ?></td>
		          <td><?= $a['nilai']; ?></td>
		          <td class="text-right">
		          	<a href="<?= base_url(); ?>administrator/spk_pm/detail/<?= $a['id_alternatif']; ?>" class="badge badge-primary"><i class="fas fa-fw fa-eye"></i></a>
		          	<a href="<?= base_url(); ?>administrator/spk_pm/edit/<?= $a['id_alternatif']; ?>" class="badge badge-success"><i class="fas fa-fw fa-edit"></i></a>
		          	<a href="<?= base_url(); ?>administrator/spk_pm/hapus/<?= $a['id_alternatif']; ?>" class="badge badge-danger" onclick="return confirm('Yakin ?');"><i class="fas fa-fw fa-trash"></i></a>
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