<div class="container-fluid">
	<form action="<?= base_url('sanggar/kriteria/tambah_pendidikan'); ?>" method="post">
		<div class="form-group">
			<label>Kriteria Program Pendidikan</label>
			<?php foreach ($k_pendidikan as $kpen) : ?>
			<div class="row">
			<table>
				<tr>					
					<th><input type="checkbox" name="id_pendidikan[]" value="<?= $kpen['id_pendidikan']; ?>"></th>
					<input type="hidden" name="id_sanggar[]" value="<?= $this->session->userdata('id_sanggar'); ?>">
					<th> <?= $kpen['pendidikan']; ?></th>
				</tr>
			</table>
			</div>
			<?php endforeach; ?>
		</div>
		<div>
			<button type="submit" class="btn btn-sm btn-primary">Simpan</button>
			<button type="button" class="btn btn-sm btn-primary">Total : 
			<?php if ($total_pen == 6): ?>
				Bobot 6
			<?php elseif ($total_pen == 5): ?>
				Bobot 4
			<?php elseif ($total_pen == 4): ?>
				Bobot 3
			<?php elseif ($total_pen == 3): ?>
				Bobot 2
			<?php elseif ($total_pen <= 2): ?>
				Bobot 1
			<?php else: ?>
				0
			<?php endif ?>
				</button>
		</div>
	</form>

	<hr>

	<form action="<?= base_url('sanggar/kriteria/tambah_umur'); ?>" method="post">
		<div class="form-group">
			<label>Kriteria Umur Calon Peserta</label>
			<?php foreach ($k_umur as $kpen) : ?>
			<div class="row">
			<table>
				<tr>					
					<th><input type="checkbox" name="id_umur[]" value="<?= $kpen['id_umur']; ?>"></th>
					<input type="hidden" name="id_sanggar[]" value="<?= $this->session->userdata('id_sanggar'); ?>">
					<th> <?= $kpen['umur']; ?></th>
				</tr>
			</table>
			</div>
			<?php endforeach; ?>
		</div>
		<div>
			<button type="submit" class="btn btn-sm btn-primary">Simpan</button>
			<button type="button" class="btn btn-sm btn-primary">Total : 
			<?php if ($total_u == 4): ?>
				Bobot 3
			<?php elseif ($total_u == 3): ?>
				Bobot 2
			<?php elseif ($total_u <=2): ?>
				Bobot 1
			<?php else: ?>
				0
			<?php endif ?>
				</button>
		</div>
	</form>

		<hr>

	<form action="<?= base_url('sanggar/kriteria/tambah_jadwal'); ?>" method="post">
		<div class="form-group">
			<label>Kriteria Jadwal Sanggar</label>
			<?php foreach ($k_jadwal as $kpen) : ?>
			<div class="row">
			<table>
				<tr>					
					<th><input type="checkbox" name="id_jadwal[]" value="<?= $kpen['id_jadwal']; ?>"></th>
					<input type="hidden" name="id_sanggar[]" value="<?= $this->session->userdata('id_sanggar'); ?>">
					<th> <?= $kpen['jadwal']; ?></th>
				</tr>
			</table>
			</div>
			<?php endforeach; ?>
		</div>
		<div>
			<button type="submit" class="btn btn-sm btn-primary">Simpan</button>
			<button type="button" class="btn btn-sm btn-primary">Total : 
			<?php if ($total_j == 6): ?>
				Bobot 6
			<?php elseif ($total_j == 5): ?>
				Bobot 4
			<?php elseif ($total_j == 4): ?>
				Bobot 3
			<?php elseif ($total_j == 3): ?>
				Bobot 2
			<?php elseif ($total_j <= 2): ?>
				Bobot 1
			<?php else: ?>
				0
			<?php endif ?>
				</button>
		</div>
	</form>

		<hr>

	<form action="<?= base_url('sanggar/kriteria/tambah_sarana'); ?>" method="post">
		<div class="form-group">
			<label>Kriteria Sarana</label>
			<?php foreach ($k_sarana as $kpen) : ?>
			<div class="row">
			<table>
				<tr>					
					<th><input type="checkbox" name="id_sarana[]" value="<?= $kpen['id_sarana']; ?>"></th>
					<input type="hidden" name="id_sanggar[]" value="<?= $this->session->userdata('id_sanggar'); ?>">
					<th> <?= $kpen['sarana']; ?></th>
				</tr>
			</table>
			</div>
			<?php endforeach; ?>
		</div>
		<div>
			<button type="submit" class="btn btn-sm btn-primary">Simpan</button>
			<button type="button" class="btn btn-sm btn-primary">Total : 
			<?php if ($total_s == 6): ?>
				Bobot 6
			<?php elseif ($total_s == 5): ?>
				Bobot 4
			<?php elseif ($total_s == 4): ?>
				Bobot 3
			<?php elseif ($total_s == 3): ?>
				Bobot 2
			<?php elseif ($total_s <= 2): ?>
				Bobot 1
			<?php else: ?>
				0
			<?php endif ?>
				</button>
		</div>
	</form>

		<hr>

	<form action="<?= base_url('sanggar/kriteria/tambah_prasarana'); ?>" method="post">
		<div class="form-group">
			<label>Kriteria Prasarana</label>
			<?php foreach ($k_prasarana as $kpen) : ?>
			<div class="row">
			<table>
				<tr>					
					<th><input type="checkbox" name="id_prasarana[]" value="<?= $kpen['id_prasarana']; ?>"></th>
					<input type="hidden" name="id_sanggar[]" value="<?= $this->session->userdata('id_sanggar'); ?>">
					<th> <?= $kpen['prasarana']; ?></th>
				</tr>
			</table>
			</div>
			<?php endforeach; ?>
		</div>
		<div>
			<button type="submit" class="btn btn-sm btn-primary">Simpan</button>
			<button type="button" class="btn btn-sm btn-primary">Total : 
			<?php if ($total_pras == 6): ?>
				Bobot 6
			<?php elseif ($total_pras == 5): ?>
				Bobot 4
			<?php elseif ($total_pras == 4): ?>
				Bobot 3
			<?php elseif ($total_pras == 3): ?>
				Bobot 2
			<?php elseif ($total_pras <= 2): ?>
				Bobot 1
			<?php else: ?>
				0
			<?php endif ?>
				</button>
		</div>
	</form>

		<hr>

	<form action="<?= base_url('sanggar/kriteria/tambah_biaya'); ?>" method="post">
		<div class="form-group">
			<label>Kriteria Biaya</label>
			<?php foreach ($k_biaya as $kpen) : ?>
			<div class="row">
			<table>
				<tr>					
					<th><input type="checkbox" name="id_biaya[]" value="<?= $kpen['id_biaya']; ?>"></th>
					<input type="hidden" name="id_sanggar[]" value="<?= $this->session->userdata('id_sanggar'); ?>">
					<th> <?= $kpen['biaya']; ?></th>
				</tr>
			</table>
			</div>
			<?php endforeach; ?>
		</div>
		<div>
			<button type="submit" class="btn btn-sm btn-primary">Simpan</button>
			<button type="button" class="btn btn-sm btn-primary">Total : 
			<?php if ($total_b == 6): ?>
				Bobot 6
			<?php elseif ($total_b == 5): ?>
				Bobot 4
			<?php elseif ($total_b == 4): ?>
				Bobot 3
			<?php elseif ($total_b == 3): ?>
				Bobot 2
			<?php elseif ($total_b <= 2): ?>
				Bobot 1
			<?php else: ?>
				0
			<?php endif ?>
				</button>
		</div>
	</form>


</div>