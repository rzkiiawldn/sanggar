<!-- Begin Page Content -->
<div class="container-fluid">
	<h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
	<?= $this->session->flashdata('message'); ?>

	
	<div class="card shadow mb-4">
		<div class="card-body">
		<h5 align="center">= Tabel Nilai Bobot Hasil =</h5>
		  <div class="table-responsive">
		    <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
		      <thead>
		        <tr>
		          <th width="20px">#</th>
		          <th>Nama Sanggar</th>
		          <?php foreach ($kriteria as $k): ?>		          	
		          <th><?= $k['kriteria']; ?></th>
		          <?php endforeach ?>
		          <?php foreach ($corefaktor as $cf) { ?>
		          <th>NCF <?='('.$cf['percentace'].'%)'?></th>
		          <th>NSF <?='('.(100-$cf['percentace']).'%)'?></th>
		          <?php } ?>
		          <th>Nilai Total</th>
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
		          <td>1</td>
		          <td>1</td>
		          <td>1</td>
		        </tr>
		      <?php endforeach; ?>
		      </tbody>
		    </table>
		  </div><hr><br>

		  <h5 align="center">= Tabel Nilai Bobot Hasil =</h5>
		  <div class="table-responsive">
		    <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
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

			    <tr style="color: red">
			      <?php foreach($penilaian as $n): ?>
			      <td colspan="2"> = Kriteria yang diinginkan =</td>
			      <td><?= $n['pendidikan']?></td>
			      <td><?= $n['umur']?></td>
			      <td><?= $n['jadwal']?></td>
			      <td><?= $n['sarana']?></td>
			      <td><?= $n['prasarana']?></td>
			      <td><?= $n['biaya']?></td>
				  <?php endforeach; ?>
			    </tr>

		      </tbody>
		    </table>
		  </div><hr><br>


		  <h5 align="center">= Tabel GAP =</h5>
		  <div class="table-responsive">
		    <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
		      <thead>
		        <tr>
		          <th width="20px">#</th>
		          <th width="220px">Nama Sanggar</th>
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
</div>
</div>