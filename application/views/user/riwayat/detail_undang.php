

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
                       <th>Kode Undang</th>
                       <td>: <?= $undang['kode_undang']; ?></td>
                   </tr>
                   <tr>
                       <th>Nama Pengundang</th>
                       <td>: <?= $undang['nama']; ?></td>
                   </tr>
                   <tr>
                       <th>Nama Sanggar</th>
                       <td>: <?= $undang['nama_sanggar']; ?> | <a href="<?= base_url('user/sanggar/detail_sanggar/'.$undang['id_sanggar']); ?>"><i>Kunjungi sanggar</i></a></td>
                   </tr>
                   <tr>
                       <th>Paket Undang</th>
                       <td>: <?= $undang['nama_paket']; ?></td>
                   </tr>
                   <tr>
                       <th>Keterangan acara</th>
                       <td>: <?= $undang['nama_acara']; ?></td>
                   </tr>
                   <tr>
                       <th>Tanggal Undang</th>
                       <td>: <?= date('d F Y', strtotime($undang['tanggal_undang'])); ?></td>
                   </tr>
                   <tr>
                       <th>Tanggal Acara</th>
                       <td>: <?= date('d F Y', strtotime($undang['tanggal_acara'])); ?></td>
                   </tr>
                   <tr>
                     <th>Total Biaya Undang</th>
                     <td>: Rp. <?= number_format($undang['biaya_undang'],0,',','.'); ?></td>
                   </tr>
                   <tr>
                       <th>Status Undang</th>
                       <td>: 
                           <?php if ($undang['status_undang'] == 0): ?>
                            <button class="btn btn-sm btn-warning">Menunggu Konfirmasi</button> |
                            <a href="<?= base_url() ?>user/riwayat/batal_undang/<?= $undang['kode_undang']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ?');">batalkan</a>
                          <?php elseif($undang['status_undang'] == 1): ?>
                            <button class="btn btn-sm btn-success">Transaksi diterima</button>
                          <?php else: ?>
                            <button class="btn btn-sm btn-danger">Selesai</button>
                          <?php endif ?>
                       </td>
                   </tr>
                   <tr>
                      <th></th>
                       <td>: <a href="<?= base_url('user/pengundang/cetak_invoice/'.$undang['kode_undang']) ?>" style="width: 40%" class="btn btn-sm btn-secondary"><i class="fas fa-print"></i>Cetak invoice</a> | 

                        <?php if (empty($undang['bukti_pembayaran'])): ?>
                        <button style="width: 50%" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#upload"><i class="fas fa-print"></i>Upload Pembayaran</button></td>
                        <?php else: ?>
                        <button style="width: 50%" class="btn btn-sm btn-danger" disabled=""><i class="fas fa-print"></i>Berhasil Upload</button></td>

                        <?php endif ?>

                   </tr>
               </table>
             </div>
            </div>
          </div>

          <div class="col-lg-5">
            <div class="card">
              <div class="card-header">
                Detail paket
              </div>
              <div class="table-responsive">
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
                        <th>Harga undang</th>
                        <td>: Rp. <?= number_format($undang['harga'],0,',','.'); ?></td>
                    </tr>
                    <tr>
                        <th>Keterangan paket</th>
                        <td>: <?= $undang['keterangan_paket']; ?></td>
                    </tr>
                    <tr>
                        <th>Foto</th>
                        <td>: <img src="<?= base_url('assets/gambar_paket_undang/'.$undang['gambar']); ?>" width="200px"></td>
                    </tr>
                </table>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Details Section -->
</main>

<div class="modal fade" id="upload" tabindex="-1" role="dialog" aria-labelledby="uploadLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="uploadLabel">Upload bukti pembayaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= form_open_multipart('user/pengundang/upload/'.$undang['kode_undang']); ?>
        <div class="modal-body">
          <div class="form-group">
            <label>bukti pembayaran</label>
            <input type="hidden" name="nama" value="<?= $undang['nama']; ?>">
            <input type="hidden" name="email" value="<?= $sanggar['email']; ?>">
            <input type="hidden" name="kode_undang" value="<?= $undang['kode_undang']; ?>">
            <input type="file" name="bukti_pembayaran" class="form-control" required="">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="tambah">Upload</button>
        </div>
      <?= form_close(); ?>
    </div>
  </div>
</div>