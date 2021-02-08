

<!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details" data-aos="fade-up">
      <div class="container">
      	<div class="section-title" data-aos="fade-up">
          <h3><?= $judul; ?></h3>
        </div>
        <?= $this->session->flashdata('message'); ?>

        <div class="table-responsive">
        	<table class="table table-hover table-bordered mx-auto">
        		<thead>
        			<tr>
        				<th>#</th>
        				<th>Atribut Sanggar</th>
        				<th>Tanggal Penyewaan</th>
        				<th>Harga Sewa</th>
        				<th>Status</th>
        				<th>Aksi</th>
        			</tr>
        		</thead>
        		<tbody>
        			<?php $no=1; foreach ($penyewaan as $a): ?>
	        			<tr>
	        				<td><?= $no++; ?></td>
	        				<td><?= $a['nama_atribut']; ?></td>
	        				<td><?= $a['tanggal_sewa']; ?></td>
	        				<td>Rp. <?= number_format($a['harga_sewa'],0,',','.'); ?></td>
	        				<td>
	        					<?php if ($a['status_sewa'] == 0): ?>
	        						<button class="btn btn-sm btn-warning">Menunggu Konfirmasi</button>
	        					<?php elseif($a['status_sewa'] == 1): ?>
	        						<button class="btn btn-sm btn-success">Transaksi diterima</button>
	        					<?php else: ?>
	        						<button class="btn btn-sm btn-danger">Selesai</button>
	        					<?php endif ?>
	        				</td>
	        				<td>
	        					<a href="<?= base_url('user/riwayat/detail_penyewaan/'.$a['kode_sewa']); ?>" class="btn btn-sm btn-primary">Detail penyewaan</a>
	        				</td>
	        			</tr>        				
        			<?php endforeach ?>
        		</tbody>        		
        	</table>
        </div>

      </div>
    </section><!-- End Portfolio Details Section -->
</main>