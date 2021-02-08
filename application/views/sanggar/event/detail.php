<!-- Begin Page Content -->
	<div class="container-fluid">
		<h2 class="mb-4">Detail Event</h2>
			<div class="row">
			 <div class="card">
				<div class="card-body">
					<div class="col-md-4">
						<div class="card" style="width: 18rem;">
						  <img src="<?= base_url('assets/gambar_event/'.$event['gambar']); ?>" class="card-img-top" alt="...">
						  <div class="card-body">
						  </div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<table class="table table-striped">
				  <tr>
				  	<th>Judul Event</th>
				  	<td>: <?= $event['judul_event']; ?></td>
				  </tr>
				  <tr>
				  	<th>Keterangan</th>
				  	<td>: <?= $event['keterangan']; ?></td>
				  </tr>
				  <tr>
				  	<th>Tanggal Acara</th>
				  	<td>: <?= date('d F Y', strtotime($event['tanggal_event']));?></td>
				  </tr>
				  <tr>
				  	<th>Pengirim</th>
				  	<td>: <?= $event['pengirim']; ?></td>
				  </tr>
				  <tr>
				  	<th>Date created</th>
				  	<td>: <?= date('d F Y', $event['date_created']); ?></td>
				  </tr>
				</table>
				<a href="<?= base_url(); ?>sanggar/event/index" class="btn btn-primary float-right">Kembali</a>
			</div>
		</div>
	</div>
</div>