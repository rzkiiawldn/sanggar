<!-- Begin Page Content -->
<div class="container-fluid">
	<h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
	<?= $this->session->flashdata('message'); ?>

	<div class="card shadow mb-4">
		<div class="card-body">
		  <div class="table-responsive">
		    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
		      <thead>
		        <tr>
		          <th width="20px">#</th>
		          <th>Nama Sanggar</th>
		          <?php foreach ($kriteria as $k): ?>		          	
		          <th><?= $k['kriteria']; ?></th>
		          <?php endforeach ?>
		        </tr>
		      </thead>
		      <tbody>
		      <?php
		      $no = 1;
		      foreach ($sanggar as $s) :
		       ?>
		        <tr>
		          <td><?= $no++; ?></td>
		          <td><?= $s['nama_sanggar']; ?></td>
		          <?php foreach ($nilai as $n): ?>
		          		<?php if ($n['id_sanggar'] == $s['id_sanggar']): ?>
			              <td><?= $n['nilai']; ?></td>
			            <?php endif ?>
		          <?php endforeach ?>
		        </tr>
		      <?php endforeach; ?>
		      </tbody>
		    </table>
		  </div>
		</div>
	</div>

	<h2 class="mb-3">Penilaian</h2><hr>
		<form action="<?= base_url('administrator/spk_pm/proses'); ?>" method="post">
		  <div class="row mt-5">
		  	<?php foreach ($kriteria as $k): ?>
		  	<div class="col-md-4">
		  		<div class="form-group">
		  			<label><?= $k['kriteria']; ?></label>
		  			<select class="form-control" name="nilai[]" required="">
		  				<option value="">--Pilih--</option>
		  			<?php foreach ($subkriteria as $sk): ?>
		  				<?php if ($sk['id_kriteria'] == $k['id_kriteria']): ?>
		  				<option value="<?= $sk['bobot_subkriteria']; ?>"><?= $sk['subkriteria']; ?></option>		  					
		  				<?php endif ?>			
		  			<?php endforeach ?>
		  			</select>		  	
		  		</div>
		  	</div>		  		
		  	<?php endforeach ?>
		  </div>
		  <div class="row">
		  	<div class="col-md-6"></div>
		  	<div class="col-md-6">
		  		<button type="submit" class="btn btn-primary float-right mb-5 mt-3">Proses</button>
		  	</div>
		  </div>
		</form>
</div>
</div>