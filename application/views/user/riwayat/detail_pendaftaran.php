

<!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details" data-aos="fade-up">
      <div class="container">

        <?= $this->session->flashdata('message'); ?>

        <div class="row">

          <div class="col-lg-7">
            <div class="card">
              <div class="card-header">
                <?= $judul; ?>
              </div>
              <div class="table-responsive">
               <table class="table">
                   <tr>
                       <th>Kode Pendaftaran</th>
                       <td>: <?= $pendaftaran['kode_pendaftaran']; ?></td>
                   </tr>
                   <tr>
                       <th>Nama Pendaftar</th>
                       <td>: <?= $pendaftaran['nama']; ?></td>
                   </tr>
                   <tr>
                       <th>Nama Sanggar</th>
                       <td>: <?= $pendaftaran['nama_sanggar']; ?> | <a href="<?= base_url('user/sanggar/detail_sanggar/'.$pendaftaran['id_sanggar']); ?>"><i>Kunjungi sanggar</i></a></td>
                   </tr>
                   <tr>
                       <th>Kelas</th>
                       <td>: <?= $pendaftaran['nama_kelas']; ?></td>
                   </tr>
                   <tr>
                       <th>Tanggal Pendaftaran</th>
                       <td>: <?= date('d F Y',strtotime($pendaftaran['tanggal_pendaftaran'])); ?></td>
                   </tr>
                   <tr>
                       <th>Status Pendaftaran</th>
                       <td>: 
                           <?php if ($pendaftaran['status_pendaftaran'] == 1): ?>
                               <button class="btn btn-sm btn-warning">Menunggu Konfirmasi</button> |
                              <a href="<?= base_url() ?>user/riwayat/batal_daftar/<?= $pendaftaran['kode_pendaftaran']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ?');">batalkan</a>
                           <?php else: ?>
                               <button class="btn btn-sm btn-success">Pendaftaran diterima</button>
                           <?php endif ?>
                       </td>
                   </tr>
                   <tr>
                     <th>Cetak data</th>
                     <td>: 
                       <a href="<?= base_url('user/pendaftaran/cetak_invoice/'.$pendaftaran['kode_pendaftaran']) ?>" style="width: 40%" class="btn btn-sm btn-secondary"><i class="fas fa-print"></i>Cetak data</a>
                     </td>
                   </tr>
               </table>
              </div>
            </div>
          </div>

          <div class="col-lg-5">
            <div class="card">
              <div class="card-header">
                Detail Kelas
              </div>
              <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>Kelas</th>
                        <td>: <?= $pendaftaran['nama_kelas']; ?></td>
                    </tr>
                    <tr>
                        <th>Batas Usia</th>
                        <td>: <?= $pendaftaran['umur']; ?></td>
                    </tr>
                    <tr>
                        <th>Tentang Kelas</th>
                        <td>: <?= $pendaftaran['deskripsi_kelas']; ?></td>
                    </tr>
                </table>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Details Section -->
</main>