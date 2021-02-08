<div class="container-fluid">
	<h1 class="h3 mb-4 text-gray-800"><?= $judul; ?><hr></h1>	
	<form action="<?= base_url(); ?>" method="post">
	<div class="row">
		<div class="col-md-8">
			<?php foreach ($kriteria as $k) : ?>
			<div class="row mb-3">
				<div class="col-md-4">					
					<label><?= $k['kriteria']; ?></label>
				</div>
				<div class="col-md-8">
					<div class="form-group">
						<select class="form-control" required="" name="id_subkriteria[]">
							<option value="">--Pilih--</option>
							<?php foreach ($sub_kriteria as $sk): ?>
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
				<button class="btn btn-primary float-right" type="submit">Proses</button>
			</div>
		</div>
	</div>
	</form>
	
</div>
</div>