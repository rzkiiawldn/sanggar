

<!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details" data-aos="fade-up">
      <div class="container">

        <?= $this->session->flashdata('message'); ?>

        <div class="row">

          <div class="col-lg-4">
            <h2 class="portfolio-title"></h2>
            <div class="owl-carousel portfolio-details-carousel">
              <img src="<?= base_url(); ?>assets/gambar_paket_undang/<?= $undang['gambar']; ?>" class="img-fluid" alt="">
            </div>
          </div>

          <div class="table-responsive col-lg-5 portfolio-info">
            <table class="table">
                <tr>
                    <th>Jenis paket</th>
                    <td>: <?= $undang['jenis_paket']; ?></td>
                </tr>
                <tr>
                    <th>Nama paket</th>
                    <td>: <?= $undang['nama_paket']; ?></td>
                </tr>
                <tr>
                    <th>Keterangan paket</th>
                    <td>: <?= $undang['keterangan_paket']; ?></td>
                </tr>
                <tr>
                    <th>Harga Paket</th>
                    <td>: <?= $undang['harga']; ?></td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>: 
                        <?php if ($undang['status'] == "1"): ?>
                            <b style="color: green">TERSEDIA</b>
                        <?php else: ?>
                            <b style="color: red">TIDAK TERSEDIA</b>
                        <?php endif ?>
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td>
                        <?php if ($undang['status'] == "1"): ?>                            
                            <a href="<?= base_url('user/pengundang/undang/'.$undang['id']); ?>" class="float-right btn btn-sm btn-success">Undang Sekarang!</a>
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