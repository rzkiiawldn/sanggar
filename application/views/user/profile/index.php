

<!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details" data-aos="fade-up">
      <div class="container">

        <?= $this->session->flashdata('message'); ?>

        <div class="row">

          <div class="col-lg-4">
            <h2 class="portfolio-title"><?= $judul; ?></h2>
            <div class="owl-carousel portfolio-details-carousel">
              <img src="<?= base_url(); ?>assets/img/profile/<?= $user['gambar']; ?>" class="img-fluid" alt="">
            </div>
          </div>

          <div class="table-responsive col-lg-5 portfolio-info d-flex align-items-center">
            <table class="table">
                <tr>
                    <th>Nama Lengkap</th>
                    <td>: <?= $user['nama']; ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>: <?= $user['email']; ?></td>
                </tr>
                <tr>
                    <th>Nomor Telepon</th>
                    <td>: <?= $user['nomor_telepon']; ?></td>
                </tr>
                <tr>
                    <th>Tempat Lahir</th>
                    <td>: <?= $user['tempat_lahir']; ?></td>
                </tr>
                <tr>
                    <th>Tanggal Lahir</th>
                    <td>: <?= $user['tanggal_lahir']; ?></td>
                </tr>
                <tr>
                    <th>Jenis Kelamin</th>
                    <td>: <?= $user['jenis_kelamin']; ?></td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>: <?= $user['alamat']; ?></td>
                </tr>
                <tr>
                    <th>Bergabung sejak</th>
                    <td>: <?= date('d F Y',$user['date_created']); ?></td>
                </tr>
                <tr>
                    <th></th>
                    <td>
                        <a href="<?= base_url('user/profile/edit'); ?>" class="float-right btn btn-sm btn-primary">Edit Profil</a>
                        <a href="<?= base_url('user/profile/edit_password'); ?>" class="float-right btn btn-sm btn-warning mr-2">Ubah Password</a>
                    </td>
                </tr>
            </table>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Details Section -->
</main>