

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
    				<th width="50px">#</th>
    				<th width="300px">Sanggar</th>
    				<th width="300px">Kelas</th>
    				<th width="130">Status</th>
    				<th width="150">Aksi</th>
    			</tr>
    		</thead>
    		<tbody>
    			<?php $no=1; foreach ($pendaftaran as $p): ?>
        			<tr>
        				<td><?= $no++; ?></td>
        				<td><?= $p['nama_sanggar']; ?></td>
        				<td><?= $p['nama_kelas']; ?></td>
        				<td>
        					<?php if ($p['status_pendaftaran'] == 1): ?>
        						<button class="btn btn-sm btn-danger">Belum diterima</button>
        					<?php else: ?>
        						<button class="btn btn-sm btn-success">Diterima</button>
        					<?php endif ?>
        				</td>
        				<td>
        					<a href="<?= base_url('user/riwayat/detail_pendaftaran/'.$p['kode_pendaftaran']); ?>" class="btn btn-sm btn-primary">Detail Pendaftaran</a>
        				</td>
        			</tr>        				
    			<?php endforeach ?>
    		</tbody>        		
    	</table>
    	</div>

      </div>
    </section><!-- End Portfolio Details Section -->
</main>