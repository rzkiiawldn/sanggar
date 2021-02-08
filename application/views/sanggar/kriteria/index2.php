<div class="container-fluid">

	<h1 class="h3 mb-4 text-gray-800"><?= $judul; ?><hr></h1>
	<a href="<?= base_url('sanggar/kriteria2/nilai2'); ?>" class="btn btn-primary mb-3">Lihat Nilai</a>	
	<form action="<?= base_url('sanggar/kriteria2/tambah'); ?>" method="post">
	<div class="row">
		<div class="col-md-8">
			<?php foreach ($n_kriteria as $k) : ?>
			<div class="row mb-3">
				<div class="col-md-4">					
					<label><?= $k['kriteria']; ?></label>
				</div>
				<div class="col-md-8">
					<div class="form-group">
						<input type="hidden" name="id_sanggar[]" value="<?= $this->session->userdata('id_sanggar'); ?>">
						<select class="form-control" required="" name="id_subkriteria[]">
							<option value="">--Pilih--</option>
							<?php foreach ($n_subkriteria as $sk): ?>
								<?php if ($sk['id_kriteria'] == $k['id_kriteria']): ?>
									<option value="<?= $sk['id_subkriteria']; ?>"><?= $sk['subkriteria']; ?></option>
								<?php else: ?>
								<?php endif; ?>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
			<div>
				<button class="btn btn-primary float-right" type="submit">Simpan</button>
			</div>
		</div>
	</div>
	</form>
</div>
</div>
