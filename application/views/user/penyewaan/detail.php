

<!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details" data-aos="fade-up">
      <div class="container">

        <?= $this->session->flashdata('message'); ?>

        <div class="row">

          <div class="col-lg-4">
            <h2 class="portfolio-title"></h2>
            <div class="owl-carousel portfolio-details-carousel">
              <img src="<?= base_url(); ?>assets/gambar_paket_sewa/<?= $atribut['gambar']; ?>" class="img-fluid" alt="">
            </div>
          </div>

          <div class="table-responsive col-lg-5 portfolio-info">
            <table class="table">
                <tr>
                    <th>Jenis Atribut</th>
                    <td>: <?= $atribut['jenis_atribut']; ?></td>
                </tr>
                <tr>
                    <th>Nama Atribut</th>
                    <td>: <?= $atribut['nama_atribut']; ?></td>
                </tr>
                <tr>
                    <th>Keterangan Atribut</th>
                    <td>: <?= $atribut['keterangan_atribut']; ?></td>
                </tr>
                <tr>
                    <th>Harga Sewa</th>
                    <td>: <?= $atribut['harga']; ?></td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>: 
                    	<?php if ($atribut['status'] == "1"): ?>
                    		<b style="color: green">TERSEDIA</b>
                		<?php else: ?>
                			<b style="color: red">TIDAK TERSEDIA</b>
                    	<?php endif ?>
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td>
                    	<?php if ($atribut['status'] == "1"): ?>                    		
	                        <a href="<?= base_url('user/penyewaan/sewa/'.$atribut['id']); ?>" class="float-right btn btn-sm btn-success">Sewa Sekarang!</a>
	                    <?php else: ?>
	                        <a href="#" class="float-right btn btn-sm btn-danger">Tidak tersedia!</a>

                    		
                    	<?php endif ?>
                    </td>
                </tr>
            </table>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Details Section -->
</main>