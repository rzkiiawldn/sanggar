

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

	<?php foreach ($corefaktor as $cf): ?>
      	<?php 
      		$cfpendidikan   = $cf['pendidikan'];
			$cfumur 		= $cf['umur'];
			$cfbiaya    	= $cf['biaya'];
			$cfsarana    	= $cf['sarana'];
			$cfprasarana  	= $cf['prasarana'];
			$cfjadwal  		= $cf['jadwal'];

			$classpendidikan   	= ($cfpendidikan	==1) ? 'class="table-danger"' : '';
			$classumur 			= ($cfumur			==1) ? 'class="table-danger"' : '';
			$classbiaya   		= ($cfbiaya   		==1) ? 'class="table-success"' : '';
			$classsarana   		= ($cfsarana   		==0) ? 'class="table-success"' : '';
			$classprasarana  	= ($cfprasarana 	==0) ? 'class="table-success"' : '';
			$classjadwal  		= ($cfjadwal		==0) ? 'class="table-danger"' : '';

			$banyak_cf = $cfpendidikan+$cfumur+$cfbiaya+$cfsarana+$cfprasarana+$cfjadwal;
			$banyak_sf = 6-$banyak_cf;

			$i=1;
      	?>
      <?php endforeach ?>

	      <?php
	      $no = 1;
	      foreach ($profile_matching as $pm) :
	       ?>
	        	<?php foreach ($corefaktor as $cf): ?>
        		  <input type="hidden" name="" value="<?= $no++; ?>">
		          <input type="hidden" name="" value="<?= $pm['nama']; ?>">
		          	  <input type="hidden" name="" value="<?=$b_pendidikan[$i]=hitungBobot($pm['pendidikan']-$k1) ?>">
		          <input type="hidden" name="" value="<?=$b_umur[$i]=hitungBobot($pm['umur']-$k2) ?>">
		          <input type="hidden" name="" value="<?=$b_jadwal[$i]=hitungBobot($pm['jadwal']-$k3) ?>">
		          <input type="hidden" name="" value="<?=$b_sarana[$i]=hitungBobot($pm['sarana']-$k4) ?>">
		          <input type="hidden" name="" value="<?=$b_prasarana[$i]=hitungBobot($pm['prasarana']-$k5) ?>">
		          <input type="hidden" name="" value="<?=$b_biaya[$i]=hitungBobot($pm['biaya']-$k6) ?>">

		          <?php
			        $cf1[$i] = ($cfpendidikan	==1)   	? $b_pendidikan[$i]  	:0;
			        $cf2[$i] = ($cfumur			==1) 	? $b_umur[$i]			:0;
			        $cf3[$i] = ($cfbiaya 		==1)    ? $b_biaya[$i]   		:0;
			        $cf4[$i] = ($cfsarana 		==1)    ? $b_sarana[$i]   		:0;
			        $cf5[$i] = ($cfprasarana	==1)  	? $b_prasarana[$i] 		:0;
			        $cf6[$i] = ($cfjadwal		==1)  	? $b_jadwal[$i] 		:0;

			        $ncf[$i]=($cf1[$i]+$cf2[$i]+$cf3[$i]+$cf4[$i]+$cf5[$i]+$cf6[$i])/$banyak_cf;
			        ?>

			        <!-- Menghitung NSF -->
			        <?php
			        $sf1[$i] = ($cfpendidikan	==0)  	? $b_pendidikan[$i]  	:0;
			        $sf2[$i] = ($cfumur			==0) 	? $b_umur[$i]			:0;
			        $sf3[$i] = ($cfbiaya 		==0)   	? $b_biaya[$i]   		:0;
			        $sf4[$i] = ($cfsarana 		==0)   	? $b_sarana[$i]   		:0;
			        $sf5[$i] = ($cfprasarana	==0) 	? $b_prasarana[$i] 		:0;
			        $sf6[$i] = ($cfjadwal		==0) 	? $b_jadwal[$i] 		:0;

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

			        <!-- <td><?=$ncf[$i]?><input type="text" name="" value="<?= $ncf[$i]; ?>"></td>
			        <td><?=$nsf[$i]?><input type="text" name="" value="<?= $nsf[$i]; ?>"></td>
			        <td><?=$na[$i]?><input type="text" name="" value="<?= $na[$i]; ?>"></td> -->
			        <input type="hidden" name="" value="<?= $ncf[$i]; ?>">
			        <input type="hidden" name="" value="<?= $nsf[$i]; ?>">
			        <input type="hidden" name="" value="<?= $na[$i]; ?>">
			      <?php $i++ ?>

	        	<?php endforeach ?>
	      <?php endforeach; ?>

		  
	  <?php 

	  $i=1;
	  
	  $this->db->empty_table("profile_matching_rangking");
	  foreach($profile_matching as $data) 
	  {
	  	$this->db->query("INSERT INTO profile_matching_rangking VALUES(".$i.",'".$data['nama']."',".$na[$i].");");
	  	$i++;
	  }

	  ?>

<!-- ======= Counts Section ======= -->
    <section id="counts" class="counts my-5">
      <div class="container">

      	<div class="section-title" data-aos="fade-up">
          <h3>Sanggar yang direkomendasikan untuk anda !</h3>
        </div>

		<div class="row" data-aos="fade-up">          
          <?php
		      $no = 1;
		      $pm_ranking = $this->db->query("SELECT * FROM profile_matching_rangking pm JOIN user_sanggar us ON pm.alternatif = us.id_sanggar JOIN kategori_tipe_sanggar kt ON us.tipe_sanggar_id = kt.id ORDER BY nilai DESC")->result_array();
		      foreach ($pm_ranking as $rank) :
		       ?>
              <div class="col-lg-3">
                <div class="card card-small mb-4 pt-3">
                  <div class="card-header border-bottom text-center">
                    <div class="mb-3 mx-auto">
                      <img class="rounded-circle" src="<?= base_url(); ?>assets/img/sanggar/profile/<?= $rank['foto_sanggar']; ?>" alt="User Avatar" width="130" height="110"> </div>
                  </div>
                  <ul class="list-group list-group-flush" style="height: 180px">
                    <li class="list-group-item p-4">
                      <strong class="text-muted d-block mb-2"><?= $no++; ?>. <?= $rank['nama_sanggar']; ?></strong>
                      <p style="font-size: 14px" class="mb-0"><?= $rank['nomor_telepon'];  ?></p>
                      <p style="font-size: 14px">"<?= word_limiter($rank['deskripsi_seni'], 5);  ?>"</p>
                    </li>
                  </ul>
                  <a href="<?= base_url(); ?>user/sanggar/detail_sanggar/<?= $rank['id_sanggar']; ?>" class="btn btn-info">Detail sanggar</a>
                </div>
              </div>          	
          <?php endforeach ?>
        </div>

      </div>
    </section>

</main>