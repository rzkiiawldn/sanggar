<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

  <div class="row">
  	<div class="col-lg-8">

      <?= $this->session->flashdata('message_pen'); ?>
  		<table class="table table-hover">
  			<thead>
  				<tr>
  					<th scope="col">#</th>
  					<th scope="col">Kriteria Program Pendidikan</th>
  					<th scope="col" class="text-center">Access</th>
  				</tr>
  			</thead>
  			<tbody>
          <?php 

          $tipe_sanggar = $user_sanggar['tipe_sanggar_id'];

          $k_pendidikan_tipe = $this->db->query("SELECT * FROM k_pendidikan_id WHERE tipe_sanggar_id ='$tipe_sanggar' ")->result_array();

           ?>

  				<?php 
  				$i = 1;
  				foreach($k_pendidikan_tipe as $m) : ?>
  				<tr>
  					<th scope="row"><?= $i++; ?></th>
  					<td width="600px"><?= $m['pendidikan']; ?></td>
  					<td width="100px" width="100px" class="text-center">
  						<div class="form-check">
  							<input class="form-check-input-pendidikan" type="checkbox" <?= check_access_pen($m['id_pendidikan'], $this->session->userdata('id_sanggar')); ?> name="id_pendidikan[]" value="<?= $m['id_pendidikan']; ?>" data-pendidikan="<?= $m['id_pendidikan']; ?>" data-sanggar="<?= $this->session->userdata('id_sanggar'); ?>"></input>
  						</div>
  					</td>
  				</tr>
          <?php endforeach; ?>
  				<tr>
  					<td colspan="2"><b>Total Nilai Kriteria : <?= $total_pen; ?></b></td>
  					<td><b>
						<?php if ($total_pen >= 5): ?>
						<?php $nilai_pendidikan = 5;  ?>
            <input type="hidden" value="<?= $nilai_pendidikan; ?>">
						<?php elseif ($total_pen == 4): ?>
						<?php $nilai_pendidikan = 4;  ?>
            <input type="hidden" value="<?= $nilai_pendidikan; ?>">
						<?php elseif ($total_pen == 3): ?>
						<?php $nilai_pendidikan = 3;  ?>
            <input type="hidden" value="<?= $nilai_pendidikan; ?>">
						<?php elseif ($total_pen == 2): ?>
						<?php $nilai_pendidikan = 2;  ?>
            <input type="hidden" value="<?= $nilai_pendidikan; ?>">
            <?php else: ?>
						<?php $nilai_pendidikan = 1;  ?>
            <input type="hidden" value="<?= $nilai_pendidikan; ?>">
						<?php endif ?></b>
            <?php 
            $this->db->set('pendidikan',$nilai_pendidikan);
            $this->db->where('nama',$user_sanggar['id_sanggar']);
            $this->db->update('profile_matching');

            ?>
  					</td>
  				</tr>
  			</tbody>
  		</table>
  	</div>
  </div><hr>

    <div class="row mt-3">
  	<div class="col-lg-8">

  		<?= $this->session->flashdata('message_u'); ?>


  		<table class="table table-hover">
  			<thead>
  				<tr>
  					<th scope="col">#</th>
  					<th scope="col">Kriteria Umur Calon Peserta</th>
  					<th scope="col" class="text-center">Access</th>
  				</tr>
  			</thead>
  			<tbody>
  				<?php 
  				$i = 1;
  				foreach($k_umur as $m) : ?>
  				<tr>
  					<th scope="row"><?= $i++; ?></th>
  					<td width="600px"><?= $m['umur']; ?></td>
  					<td width="100px" class="text-center">
  						<div class="form-check">
  							<input class="form-check-input-umur" type="checkbox" <?= check_access_u($m['id_umur'], $this->session->userdata('id_sanggar')); ?> data-umur="<?= $m['id_umur']; ?>" data-sanggar="<?= $this->session->userdata('id_sanggar'); ?>"></input>
  						</div>
  					</td>
  				</tr>
  				<?php endforeach; ?>
  				<tr>
  					<td colspan="2"><b>Total Nilai Kriteria : <?= $total_u; ?></b></td>
  					<td><b>
  					<?php if ($total_u >= 4): ?>
						<?php $nilai_umur = 3;  ?>
            <input type="hidden" value="<?= $nilai_umur; ?>">
						<?php elseif ($total_u >= 2 ): ?>
						<?php $nilai_umur = 2;  ?>
            <input type="hidden" value="<?= $nilai_umur; ?>">
						<?php else: ?>
						<?php $nilai_umur = 1;  ?>
            <input type="hidden" value="<?= $nilai_umur; ?>">
						<?php endif ?></b>
            <?php 
              $this->db->set('umur',$nilai_umur);
              $this->db->where('nama',$user_sanggar['id_sanggar']);
              $this->db->update('profile_matching');
            ?>
  					</td>
  				</tr>
  			</tbody>
  		</table>
  	</div>
  </div><hr>

      <div class="row mt-3">
    <div class="col-lg-8">

      <?= $this->session->flashdata('message_b'); ?>


      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Kriteria Biaya Sanggar</th>
            <th scope="col" class="text-center">Access</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $i = 1;
          foreach($k_biaya as $b) : ?>
          <tr>
            <th scope="row"><?= $i++; ?></th>
            <td width="600px"><?= $b['biaya']; ?></td>
            <td width="100px" class="text-center">
              <div class="form-check">
                <input class="form-check-input-biaya" type="radio" <?= check_access_b($b['id_biaya'], $this->session->userdata('id_sanggar')); ?> data-biaya="<?= $b['id_biaya']; ?>" data-sanggar="<?= $this->session->userdata('id_sanggar'); ?>"></input>
              </div>
            </td>
          </tr>
          <?php endforeach; ?>
          <tr>
            <td colspan="2"><b>Total Nilai Kriteria : <?php foreach($n_biaya as $b) : ?> <?= $b['biaya']; ?> <?php endforeach; ?></b></td>
            <td><b>
            <?php foreach ($n_biaya as $nb):  ?>
            <?php if ($nb['nilai'] == '5'): ?>
            <?php $nilai_biaya = 5;  ?>
            <input type="hidden" value="<?= $nilai_biaya; ?>">
            <?php elseif ($nb['nilai'] == '4'): ?>
            <?php $nilai_biaya = 4;  ?>
            <input type="hidden" value="<?= $nilai_biaya; ?>">
            <?php elseif ($nb['nilai'] == '3'): ?>
            <?php $nilai_biaya = 3;  ?>
            <input type="hidden" value="<?= $nilai_biaya; ?>">
            <?php elseif ($nb['nilai'] == '2'): ?>
            <?php $nilai_biaya = 2;  ?>
            <input type="hidden" value="<?= $nilai_biaya; ?>">
            <?php else: ?>
            <?php $nilai_biaya = 1;  ?>
            <input type="hidden" value="<?= $nilai_biaya; ?>">
            <?php endif ?></b>
            <?php endforeach; ?>
            <?php 
              $this->db->set('biaya',$nilai_biaya);
              $this->db->where('nama',$user_sanggar['id_sanggar']);
              $this->db->update('profile_matching');
            ?>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div><hr> 

      

	<div class="row mt-3">
  	<div class="col-lg-8">

  		<?= $this->session->flashdata('message_s'); ?>


  		<table class="table table-hover">
  			<thead>
  				<tr>
  					<th scope="col">#</th>
  					<th scope="col">Kriteria Sarana</th>
  					<th scope="col" class="text-center">Access</th>
  				</tr>
  			</thead>
  			<tbody>
  				<?php 
  				$i = 1;
  				foreach($k_sarana as $m) : ?>
  				<tr>
  					<th scope="row"><?= $i++; ?></th>
  					<td width="600px"><?= $m['sarana']; ?></td>
  					<td width="100px" class="text-center">
  						<div class="form-check">
  							<input class="form-check-input-sarana" type="checkbox" <?= check_access_s($m['id_sarana'], $this->session->userdata('id_sanggar')); ?> data-sarana="<?= $m['id_sarana']; ?>" data-sanggar="<?= $this->session->userdata('id_sanggar'); ?>"></input>
  						</div>
  					</td>
  				</tr>
  				<?php endforeach; ?>
  				<tr>
  					<td colspan="2"><b>Total Nilai Kriteria : <?= $total_s; ?></b></td>
  					<td><b>
						<?php if ($total_s >= 8): ?>
						<?php $nilai_sarana = 3;  ?>
            <input type="hidden" value="<?= $nilai_sarana; ?>">
						<?php elseif ($total_s >= 4): ?>
						<?php $nilai_sarana = 2;  ?>
            <input type="hidden" value="<?= $nilai_sarana; ?>">
						<?php else: ?>
						<?php $nilai_sarana = 1;  ?>
            <input type="hidden" value="<?= $nilai_sarana; ?>">
						<?php endif ?></b>
            <?php 
              $this->db->set('sarana',$nilai_sarana);
              $this->db->where('nama',$user_sanggar['id_sanggar']);
              $this->db->update('profile_matching');
            ?>
  					</td>
  				</tr>
  			</tbody>
  		</table>
  	</div>
  </div><hr>

    <div class="row mt-3">
  	<div class="col-lg-8">

  		<?= $this->session->flashdata('message_pras'); ?>


  		<table class="table table-hover">
  			<thead>
  				<tr>
  					<th scope="col">#</th>
  					<th scope="col">Kriteria Prasarana</th>
  					<th scope="col" class="text-center">Access</th>
  				</tr>
  			</thead>
  			<tbody>
  				<?php 
  				$i = 1;
  				foreach($k_prasarana as $m) : ?>
  				<tr>
  					<th scope="row"><?= $i++; ?></th>
  					<td width="600px"><?= $m['prasarana']; ?></td>
  					<td width="100px" class="text-center">
  						<div class="form-check">
  							<input class="form-check-input-prasarana" type="checkbox" <?= check_access_pras($m['id_prasarana'], $this->session->userdata('id_sanggar')); ?> data-prasarana="<?= $m['id_prasarana']; ?>" data-sanggar="<?= $this->session->userdata('id_sanggar'); ?>"></input>
  						</div>
  					</td>
  				</tr>
  				<?php endforeach; ?>
  				<tr>
  					<td colspan="2"><b>Total Nilai Kriteria : <?= $total_pras; ?></b></td>
  					<td><b>
						<?php if ($total_pras >= 10): ?>
						<?php $nilai_prasarana = 3;  ?>
            <input type="hidden" value="<?= $nilai_prasarana; ?>">
						<?php elseif ($total_pras >= 5): ?>
						<?php $nilai_prasarana = 2;  ?>
            <input type="hidden" value="<?= $nilai_prasarana; ?>">
						<?php else: ?>
						<?php $nilai_prasarana = 1;  ?>
            <input type="hidden" value="<?= $nilai_prasarana; ?>">
						<?php endif ?></b>
            <?php 
              $this->db->set('prasarana',$nilai_prasarana);
              $this->db->where('nama',$user_sanggar['id_sanggar']);
              $this->db->update('profile_matching');
            ?>
  					</td>
  				</tr>
  			</tbody>
  		</table>
  	</div>
  </div><hr>

  <div class="row mt-3">
    <div class="col-lg-8">

      <?= $this->session->flashdata('message_j'); ?>


      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Kriteria Jadwal Sanggar</th>
            <th scope="col" class="text-center">Access</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $i = 1;
          foreach($k_jadwal as $m) : ?>
          <tr>
            <th scope="row"><?= $i++; ?></th>
            <td width="600px"><?= $m['jadwal']; ?></td>
            <td width="100px" class="text-center">
              <div class="form-check">
                <input class="form-check-input-jadwal" type="checkbox" <?= check_access_j($m['id_jadwal'], $this->session->userdata('id_sanggar')); ?> data-jadwal="<?= $m['id_jadwal']; ?>" data-sanggar="<?= $this->session->userdata('id_sanggar'); ?>"></input>
              </div>
            </td>
          </tr>
          <?php endforeach; ?>
          <tr>
            <td colspan="2"><b>Total Nilai Kriteria : <?= $total_j; ?></b></td>
            <td><b>
            <?php if ($total_j >= 9): ?>
            <?php $nilai_jadwal = 3;  ?>
            <input type="hidden" value="<?= $nilai_jadwal; ?>">
            <?php elseif ($total_j >= 4): ?>
            <?php $nilai_jadwal = 2;  ?>
            <input type="hidden" value="<?= $nilai_jadwal; ?>">
            <?php else: ?>
            <?php $nilai_jadwal = 1;  ?>
            <input type="hidden" value="<?= $nilai_jadwal; ?>">
            <?php endif ?></b>
            <?php 
              $this->db->set('jadwal',$nilai_jadwal);
              $this->db->where('nama',$user_sanggar['id_sanggar']);
              $this->db->update('profile_matching');
            ?>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div><hr>

 
</div>