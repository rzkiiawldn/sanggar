<div class="container-fluid">
	<form action="<?= base_url('administrator/spk_pm/proses_tambah_alternatif'); ?>" method="post">
	<div class="row">
		<div class="col-md-8">
			<div class="row mb-3">
				<div class="col-md-4">					
					<label>Alternatif Sanggar</label>
				</div>
				<div class="col-md-8">
					<div class="form-group">
						<input type="text" value="<?= $sanggar['nama_sanggar']; ?>" class="form-control" readonly>
					</div>
				</div>
			</div>
			<?php foreach ($kriteria as $k) : ?>
			<div class="row mb-3">
				<div class="col-md-4">					
					<label><?= $k['kriteria']; ?></label>
					<input type="hidden" name="id_kriteria[]" value="<?= $k['id_kriteria']; ?>" class="form-control" readonly>
				</div>
				<div class="col-md-8">
					<div class="form-group">
						<select class="form-control" required="" name="nilai[]">
							<option value="">--Pilih--</option>
							<?php foreach ($sub_kriteria as $sk): ?>
								<?php if ($sk['id_kriteria'] == $k['id_kriteria']): ?>
									<option value="<?= $sk['bobot_subkriteria']; ?>"><?= $sk['subkriteria']; ?></option>
								<?php else: ?>
								<?php endif; ?>
							<?php endforeach; ?>
						</select>
						<input type="hidden" name="id_sanggar[]" value="<?= $sanggar['id_sanggar']; ?>" class="form-control">
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