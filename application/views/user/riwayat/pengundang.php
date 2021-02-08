

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
        				<th>Jenis Paket</th>
        				<th>Kegiatan</th>
        				<th>Tanggal Kegiatan</th>
        				<th>Harga Sewa</th>
        				<th>Status</th>
        				<th>Aksi</th>
        			</tr>
        		</thead>
        		<tbody>
        			<?php $no=1; foreach ($undang as $u): ?>
	        			<tr>
	        				<td><?= $no++; ?></td>
	        				<td><?= $u['nama_paket']; ?></td>
	        				<td><?= $u['nama_acara']; ?></td>
	        				<td><?= $u['tanggal_acara']; ?></td>
	        				<td>Rp. <?= number_format($u['biaya_undang'],0,',','.'); ?></td>
	        				<td>
	        					<?php if ($u['status_undang'] == 0): ?>
	        						<button class="btn btn-sm btn-warning">Menunggu Konfirmasi</button>
	        					<?php elseif($u['status_undang'] == 1): ?>
	        						<button class="btn btn-sm btn-success">Transaksi diterima</button>
	        					<?php else: ?>
	        						<button class="btn btn-sm btn-danger">Selesai</button>
	        					<?php endif ?>
	        				</td>
	        				<td>
	        					<a href="<?= base_url('user/riwayat/detail_undang/'.$u['kode_undang']); ?>" class="btn btn-sm btn-primary">Detail undang</a>
	        				</td>
	        			</tr>        				
        			<?php endforeach ?>
        		</tbody>        		
        	</table>
        </div>

      </div>
    </section><!-- End Portfolio Details Section -->
</main>