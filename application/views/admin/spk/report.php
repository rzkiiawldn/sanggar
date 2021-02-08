<!-- Begin Page Content -->
<div class="container-fluid">
	<h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
	<?= $this->session->flashdata('message'); ?>

	<?php foreach ($penilaian as $pn): ?>
		<?php 
			$k1 = $pn['pendidikan'];
			$k2 = $pn['umur'];
			$k3 = $pn['jadwal'];
			$k4 = $pn['sarana'];
			$k5 = $pn['prasarana'];
			$k6 = $pn['biaya'];
		?>
	<?php endforeach ?>

	
	<div class="card shadow mb-4">
		<div class="card-body">
		<h5 align="center">= Tabel Nilai Bobot Hasil =</h5>
		  <div class="table-responsive">
		    <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
		      <thead>
		        <tr>
		          <th width="20px">#</th>
		          <th>Nama Sanggar</th>
		          <th>K1</th>
		          <th>K2</th>
		          <th>K3</th>
		          <th>K4</th>
		          <th>K5</th>
		          <th>K6</th>
		          <?php foreach ($corefaktor as $cf) { ?>
			          <th class="table-danger">		NCF <?='('.$cf['percentace'].'%)'?></th>
			          <th class="table-success">	NSF <?='('.(100-$cf['percentace']).'%)'?></th>
		          <?php } ?>
		          <th class="table-primary">Nilai Total</th>
		        </tr>
		      </thead>

		      <?php foreach ($corefaktor as $cf): ?>
		      	<?php 
		      		$cfpendidikan   = $cf['pendidikan'];
					$cfumur 		= $cf['umur'];
					$cfjadwal  		= $cf['jadwal'];
					$cfsarana    	= $cf['sarana'];
					$cfprasarana  	= $cf['prasarana'];
					$cfbiaya    	= $cf['biaya'];

					$classpendidikan   	= ($cfpendidikan	==1) ? 'class="table-danger"' : '';
					$classumur 			= ($cfumur			==1) ? 'class="table-danger"' : '';
					$classjadwal  		= ($cfjadwal		==0) ? 'class="table-success"' : '';
					$classsarana   		= ($cfsarana   		==0) ? 'class="table-success"' : '';
					$classprasarana  	= ($cfprasarana 	==0) ? 'class="table-success"' : '';
					$classbiaya   		= ($cfbiaya   		==1) ? 'class="table-danger"' : '';

					$banyak_cf = $cfpendidikan+$cfumur+$cfjadwal+$cfsarana+$cfprasarana+$cfbiaya;
					$banyak_sf = 6-$banyak_cf;

					$i=1;
		      	?>
		      <?php endforeach ?>

		      <?php 
	      			function hitungBobot($gap){
					    switch ($gap) {
					      case 0: 
					      	return 6;
					        break;
					      case -1:
					        return 5.5;
					        break;
					      case 1:
					        return 5;
					        break;
					      case -2:
					        return 4.5;
					        break;
					      case 2:
					        return 4;
					        break;
					      case -3:
					        return 3.5;
					        break;
					      case 3:
					        return 3;
					        break;
					      case -4:
					        return 2.5;
					        break;
					      case 4:
					        return 2;
					        break;
					      case -5:
					        return 1.5;
					        break;
					      case -5:
					        return 1;
					        break;
					    }
					}
		       ?>

			      <tbody>

			      <?php
			      $no = 1;
			      foreach ($profile_matching as $pm) :
			       ?>
			        <tr>
			        	<?php foreach ($corefaktor as $cf): ?>
		        		  <td><?= $no++; ?></td>
				          <td><?= $pm['nama']; ?></td>

				          <td <?= $classpendidikan; ?>>
				          	<?=$b_pendidikan[$i]=hitungBobot($pm['pendidikan']-$k1) ?>			          	
				          </td>

				          <td <?= $classumur; ?>>
				          	<?=$b_umur[$i]=hitungBobot($pm['umur']-$k2) ?>			          	
				          </td>

				          <td <?= $classjadwal; ?>>
				          	<?=$b_jadwal[$i]=hitungBobot($pm['jadwal_sanggar']-$k3) ?>				          	
				          </td>

				          <td <?= $classsarana; ?>>
				          	<?=$b_sarana[$i]=hitungBobot($pm['sarana']-$k4) ?>				          	
				          </td>

				          <td <?= $classprasarana; ?>>
				          	<?=$b_prasarana[$i]=hitungBobot($pm['prasarana']-$k5) ?>				          	
				          </td>

				          <td <?= $classbiaya; ?>>
				            <?=$b_biaya[$i]=hitungBobot($pm['biaya']-$k6) ?>		          	
				          </td>

				          <?php
					        $cf1[$i] = ($cfpendidikan	==1)   	? $b_pendidikan[$i]  	:0;
					        $cf2[$i] = ($cfumur			==1) 	? $b_umur[$i]			:0;
					        $cf3[$i] = ($cfjadwal		==1)  	? $b_jadwal[$i] 		:0;
					        $cf4[$i] = ($cfsarana 		==1)    ? $b_sarana[$i]   		:0;
					        $cf5[$i] = ($cfprasarana	==1)  	? $b_prasarana[$i] 		:0;
					        $cf6[$i] = ($cfbiaya 		==1)    ? $b_biaya[$i]   		:0;

					        $ncf[$i]=($cf1[$i]+$cf2[$i]+$cf3[$i]+$cf4[$i]+$cf5[$i]+$cf6[$i])/$banyak_cf;
					        ?>

					        <!-- Menghitung NSF -->
					        <?php
					        $sf1[$i] = ($cfpendidikan	==0)  	? $b_pendidikan[$i]  	:0;
					        $sf2[$i] = ($cfumur			==0) 	? $b_umur[$i]			:0;
					        $sf3[$i] = ($cfjadwal		==0) 	? $b_jadwal[$i] 		:0;
					        $sf4[$i] = ($cfsarana 		==0)   	? $b_sarana[$i]   		:0;
					        $sf5[$i] = ($cfprasarana	==0) 	? $b_prasarana[$i] 		:0;
					        $sf6[$i] = ($cfbiaya 		==0)   	? $b_biaya[$i]   		:0;

					        $nsf[$i] = ($sf1[$i]+$sf2[$i]+$sf3[$i]+$sf4[$i]+$sf5[$i]+$sf6[$i]);
					        if ($banyak_sf != 0)
							{
							  $nsf[$i] = ($sf1[$i]+$sf2[$i]+$sf3[$i]+$sf4[$i]+$sf5[$i]+$sf6[$i])/ $banyak_sf;
							}
							else
							{
							  // sensible recovery code
							}

					        ?>

					        <!-- Menghitung Nilai Total -->
					        <?php
					        $cfpersentase = $cf['percentace'];
					        $sfpersentase = 100-$cfpersentase;
					        $na[$i] = ($cfpersentase/100*$ncf[$i]) + ($sfpersentase/100*$nsf[$i]);
					        ?>

					        <td><?=$ncf[$i]?></td>
					        <td><?=$nsf[$i]?></td>
					        <td><?=$na[$i]?></td>
					      </tr>
					      <?php $i++ ?>

			        	<?php endforeach ?>			          
			        </tr>
			      <?php endforeach; ?>
			      </tbody>
		    </table>
		  </div><hr><br>
		 
		  <form action="<?= base_url('administrator/spk_pm/detail_nilai'); ?>" method="post">
		  	<?php 
			  	$i=1; 
			  	$no=1;
			  	foreach ($profile_matching as $pm): 
		  	?>

		  	<div class="form-group">		  		
			  	<input type="hidden" name="id[]" value="<?= $no++; ?>" class="form-class">
		  	</div>
		  	<div class="form-group">		  		
			  	<input type="hidden" name="alternatif[]" value="<?= $pm['nama']; ?>" class="form-class">
		  	</div>
		  	<div class="form-group">		  		
			  	<input type="hidden" name="nilai[]" value="<?= $na[$i++]; ?>" class="form-class">
		  	</div>		  		
		  	<?php endforeach;?>
		  	<button type="submit" class="btn btn-info float-right">Detail</button>
		  </form>
		</div>
	</div>
</div>
</div>

 <!-- <h5 align="center">= Tabel Nilai Bobot Hasil =</h5>
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
		  </div><hr><br> -->


		  <!-- <h5 align="center">= Tabel GAP =</h5>
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
		  </div> -->


<!--   		  <h5 align="center">= Tabel Ranking =</h5>
		  <div class="table-responsive">
		    <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
		      <thead>
		        <tr>
		          <th>Rank</th>
		          <th>Nama</th>
		          <th>Nilai Akhir</th>
		        </tr>
		      </thead>

		      <tbody>
		      <?php
		      $i=1;
		      foreach ($ranking as $r) : ?>
		      <tr>
		        <td><?=$i++?></td>
		        <td><?=$r['alternatif']?></td>
		        <td><?=$r['nilai']?></td>
		      </tr>
		      <?php endforeach; ?>
		      </tbody>

		    </table>
		  </div> -->