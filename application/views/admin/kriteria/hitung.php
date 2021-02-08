
	<div class="container-fluid">
			<a href="<?= base_url() ?>administrator/kriteria/lihat" class="btn btn-success float-right mb-2">Kembali</a>
		<div>
			<h2>Nilai Kriteria Sanggar</h2>
			<table class="table table-bordered" id="tab1">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Pendidikan</th>
						<th>Umur</th>
						<th>Jadwal Sanggar</th>
						<th>Sarana</th>
						<th>Prasaran</th>
						<th>Biaya</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$no = 1;
						foreach ($profile_matching as $key => $value) {
							echo '
								<tr>
									<td>'.$no.'</td>
									<td>'.$value['nama_sanggar'].'</td>
									<td>'.$value['pendidikan'].'</td>
									<td>'.$value['umur'].'</td>
									<td>'.$value['jadwal'].'</td>
									<td>'.$value['sarana'].'</td>
									<td>'.$value['prasarana'].'</td>
									<td>'.$value['biaya'].'</td>
								</tr>
							';$no++;
						}
					?>
				</tbody>
			</table>
		</div>
		<br>
		<div>
			<h2>Selisih GAP</h2>
			<table class="table table-bordered" id="tab3">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Pendidikan</th>
						<th>Umur</th>
						<th>Jadwal Sanggar</th>
						<th>Sarana</th>
						<th>Prasarana</th>
						<th>Biaya</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$no = 1;
						foreach ($pm->gap_asam as $key => $value) {
							echo '
								<tr>
									<td>'.$no.'</td>
									<td>'.$profile_matching[$key]['nama_sanggar'].'</td>
									<td>'.$value[0].'</td>
									<td>'.$value[1].'</td>
									<td>'.$value[2].'</td>
									<td>'.$value[3].'</td>
									<td>'.$value[4].'</td>
									<td>'.$value[5].'</td>
								</tr>
							';$no++;
						}
					?>
				</tbody>
			</table>
		</div>
		<br>
		<!-- <div>
			<h2>Ketentuan Pembobotan</h2>
			<table class="table table-bordered table-sm" id="tab5">
				<thead>
					<tr>
						<th>Selisih</th>
						<th>Bobot Nilai</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>0</td>
						<td>5</td>
					</tr>
					<tr>
						<td>1</td>
						<td>4.5</td>
					</tr>
					<tr>
						<td>-1</td>
						<td>4</td>
					</tr>
					<tr>
						<td>2</td>
						<td>3.5</td>
					</tr>
					<tr>
						<td>-2</td>
						<td>3</td>
					</tr>
					<tr>
						<td>3</td>
						<td>2.5</td>
					</tr>
					<tr>
						<td>-3</td>
						<td>2</td>
					</tr>
					<tr>
						<td>4</td>
						<td>1.5</td>
					</tr>
					<tr>
						<td>-4</td>
						<td>1</td>
					</tr>
				</tbody>
			</table>
		</div>
		<br>
		<div>
			<h2>Pembobotan Sanggar</h2>
			<table class="table table-bordered" id="tab6">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Pendidikan</th>
						<th>Umur</th>
						<th>Jadwal Sanggar</th>
						<th>Sarana</th>
						<th>Prasarana</th>
						<th>Biaya</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$no = 1;
						foreach ($pm->bobot_asam as $key => $value) {
							echo '
								<tr>
									<td>'.$no.'</td>
									<td>'.$profile_matching[$key]['nama_sanggar'].'</td>
									<td>'.$value[0].'</td>
									<td>'.$value[1].'</td>
									<td>'.$value[2].'</td>
									<td>'.$value[3].'</td>
									<td>'.$value[4].'</td>
									<td>'.$value[5].'</td>
								</tr>
							';$no++;
						}
					?>
				</tbody>
			</table>
		</div> -->
		<br>
		<div>
			<h2>Perhitungan Factor</h2>
			<table class="table table-bordered" id="tab8">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>CF Sanggar</th>
						<th>SF Sanggar</th>
						<th>Nilai Sanggar</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$no = 1;
						foreach ($pm->ncf_asam as $key => $value) {
							echo '
								<tr>
									<td>'.$no.'</td>
									<td>'.$profile_matching[$key]['nama_sanggar'].'</td>
									<td>'.$pm->ncf_asam[$key].'</td>
									<td>'.$pm->nsf_asam[$key].'</td>
									<td>'.$pm->total_asam[$key].'</td>
								</tr>
							';$no++;
						}
					?>
				</tbody>
			</table>
		</div>
		<br>
		<br>
		<div>
			<h2>Ranking</h2>
			<table class="table table-bordered js-sort-table" id="tab9">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Alternatif</th>
						<th class="js-sort-number">Nilai Total</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$max = max($pm->rank);
						$bg = '';
						$no = 1;
						foreach ($pm->rank as $key => $value) {
							if($pm->rank[$key] == $max)
								$bg = "#ffb2ae ";
							else
								$bg = 'ffffff';
							echo '
								<tr>
									<td>'.$no.'</td>
									<td>'.$profile_matching[$key]['nama_sanggar'].'</td>
									<td bgcolor='.$bg.'>'.$pm->rank[$key].'</td>
								</tr>
							';$no++;
						}
					?>
				</tbody>
			</table>
		</div>
	</div>

