

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
                       <th>Kode Penyewaan</th>
                       <td>: <?= $penyewaan['kode_sewa']; ?></td>
                   </tr>
                   <tr>
                       <th>Nama Penyewa</th>
                       <td>: <?= $penyewaan['nama']; ?></td>
                   </tr>
                   <tr>
                       <th>Nama Sanggar</th>
                       <td>: <?= $penyewaan['nama_sanggar']; ?> | <a href="<?= base_url('user/sanggar/detail_sanggar/'.$penyewaan['id_sanggar']); ?>"><i>Kunjungi sanggar</i></a></td>
                   </tr>
                   <tr>
                       <th>Atribut</th>
                       <td>: <?= $penyewaan['nama_atribut']; ?></td>
                   </tr>
                   <tr>
                       <th>Tanggal Penyewaan</th>
                       <td>: <?= date('d F Y', strtotime($penyewaan['tanggal_sewa'])); ?></td>
                   </tr>
                   <tr>
                       <th>Tanggal Pengembalian</th>
                       <td>: <?= date('d F Y', strtotime($penyewaan['tanggal_kembali'])); ?></td>
                   </tr>
                   <tr>
                     <th>Lama Sewa</th>
                     <td>: <?= $penyewaan['lama_sewa']; ?> Hari</td>
                   </tr>
                   <tr>
                     <th>Total Biaya Penyewaan</th>
                     <td>: Rp. <?= number_format($penyewaan['harga_sewa'],0,',','.'); ?></td>
                   </tr>
                   <tr>
                       <th>Status Penyewaan</th>
                       <td>: 
                           <?php if ($penyewaan['status_sewa'] == 0): ?>
                            <button class="btn btn-sm btn-warning">Menunggu Konfirmasi</button> |
                            <a href="<?= base_url() ?>user/riwayat/batal_sewa/<?= $penyewaan['kode_sewa']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ?');">batalkan</a>
                          <?php elseif($penyewaan['status_sewa'] == 1): ?>
                            <button class="btn btn-sm btn-success">Transaksi diterima</button>
                          <?php else: ?>
                            <button class="btn btn-sm btn-danger">Selesai</button>
                          <?php endif ?> 
                       </td>
                   </tr>
                   <tr>
                     <th>Pembayaran</th>
                     <td>
                     <?php foreach ($rekening as $r): ?>
                      <?php if ($penyewaan['id_sanggar'] == $r['id_sanggar']): ?>
                       : <?= $r['nama_bank']; ?> <?= $r['nomor_rekening']; ?><br>                     
                      <?php endif ?>
                     <?php endforeach ?>
                     </td> 
                   </tr>
                   <tr>
                      <th></th>
                       <td>: <a href="<?= base_url('user/penyewaan/cetak_invoice/'.$penyewaan['kode_sewa']) ?>" style="width: 40%" class="btn btn-sm btn-secondary"><i class="fas fa-print"></i>Cetak invoice</a> | 

                        <?php if (empty($penyewaan['bukti_pembayaran'])): ?>
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
                Detail Atribut
              </div>
              <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>Jenis Atribut</th>
                        <td>: <?= $penyewaan['jenis_atribut']; ?></td>
                    </tr>
                    <tr>
                        <th>Nama Atribut</th>
                        <td>: <?= $penyewaan['nama_atribut']; ?></td>
                    </tr>
                    <tr>
                        <th>Harga Sewa</th>
                        <td>: Rp. <?= number_format($penyewaan['harga'],0,',','.'); ?></td>
                    </tr>
                    <tr>
                        <th>Keterangan Atribut</th>
                        <td>: <?= $penyewaan['keterangan_atribut']; ?></td>
                    </tr>
                    <tr>
                        <th>Foto</th>
                        <td>: <img src="<?= base_url('assets/gambar_paket_sewa/'.$penyewaan['gambar']); ?>" width="200px"></td>
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
      <?= form_open_multipart('user/penyewaan/upload/'.$penyewaan['kode_sewa']); ?>
        <div class="modal-body">
          <div class="form-group">
            <label>bukti pembayaran</label>
            <input type="hidden" name="nama" value="<?= $penyewaan['nama']; ?>">
            <input type="hidden" name="email" value="<?= $sanggar['email']; ?>">
            <input type="hidden" name="kode_sewa" value="<?= $penyewaan['kode_sewa']; ?>">
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
