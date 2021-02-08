<div class="container-fluid">

<div class="row">
    <div class="col-md-7">
      <div class="card">
          <div class="card-header">
            <?= $judul; ?>
          </div>
          <table class="table">
              <tr>
                <th>Nama pengundang</th>
                <td>: <?= $pengundang['nama']; ?></td>
              </tr>
              <tr>
                <th>Jenis paket</th>
                <td>: <?= $pengundang['jenis_paket']; ?></td>
              </tr>
              <tr>
                <th>Nama paket</th>
                <td>: <?= $pengundang['nama_paket']; ?></td>
              </tr>
              <tr>
                <th>Tanggal undang</th>
                <td>: <?= date('d/m/Y', strtotime($pengundang['tanggal_undang'])); ?></td>
              </tr>
              <tr>
                <th>Tanggal acara</th>
                <td>: <?= date('d/m/Y', strtotime($pengundang['tanggal_acara'])); ?></td>
              </tr>
              <tr>
                <th>Harga undang</th>
                <td>: Rp. <?= number_format($pengundang['biaya_undang'],0,',','.'); ?></td>
              </tr>
              <tr>
                <th>Bukti Pembayaran</th>
                <td>: 
                    <?php if ($pengundang['bukti_pembayaran'] == NULL): ?>
                        <button class="btn btn-sm btn-danger disabled">Belum dibayar</button>
                    <?php else: ?>            
                        <button type="submit" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#lihatbukti">Lihat Bukti Pembayaran</button>
                    <?php endif ?>
                </td>
              </tr>
              <tr>
                <th>Status undang</th>
                <td>: 
                    <?php if ($pengundang['status_undang'] == 0): ?>
                     <span style="color: red">Belum Bayar</span>
                    <?php elseif($pengundang['status_undang'] == 1): ?>
                      <span style="color: green">Transaksi diterima</span>
                    <?php else: ?>
                      <span style="color: red">Selesai</span>
                    <?php endif ?>
                </td>
              </tr>
              <tr>
                <th>Ubah status undang</th>
                <td>
                  <form action="<?= base_url('sanggar/undang/cek_status/'.$pengundang['kode_undang']); ?>" method="post">
                    <input type="hidden" name="kode_undang" value="<?= $pengundang['kode_undang']; ?>">
                    <input type="hidden" name="email_undang" value="<?= $data_pengundang['email']; ?>">
                    <input type="hidden" name="nama_sanggar" value="<?= $pengundang['nama_sanggar']; ?>">
                    <select name="status_undang" class="form-control" value="<?= $pengundang['status_undang']; ?>">
                      <?php if ($pengundang['status_undang'] == 0): ?>
                        <option selected="" value="0">Belum Bayar</option>
                      <?php elseif($pengundang['status_undang'] == 1): ?>
                        <option selected="" value="1">Transaksi diterima</option>
                      <?php else: ?>
                        <option selected="" value="2">Selesai</option>
                      <?php endif ?>
                        <option value="0">Belum Bayar</option>
                        <option value="1">Transaksi diterima</option>
                        <option value="2">Selesai</option>
                      </select>
                      <button class="btn btn-sm btn-primary my-2 float-right" type="submit">Simpan</button>
                  </form>
                </td>
              </tr>
            </table>
      </div>
  </div>  
  <div class="col-md-5">
      <div class="card">
          <div class="card-header">
            Data lengkap pengundang
          </div>
          <table class="table">
              <tr>
                  <th >Nama Penyewa</th>
                  <td>: <?= $data_pengundang['nama']; ?></td>
              </tr>
              <tr>
                  <th>Email</th>
                  <td>: <?= $data_pengundang['email']; ?></td>
              </tr>
              <tr>
                  <th>Nomor Telepon</th>
                  <td>: <?= $data_pengundang['nomor_telepon']; ?></td>
              </tr>
              <tr>
                  <th>Jenis Kelamin</th>
                  <td>: <?= $data_pengundang['jenis_kelamin']; ?></td>
              </tr>
              <tr>
                  <th>Alamat</th>
                  <td>: <?= $data_pengundang['alamat']; ?></td>
              </tr>
              <tr>
                <td colspan="2"><a href="<?= base_url('sanggar/undang/index'); ?>" class="btn btn-sm btn-success float-right">Kembali</a></td>
              </tr>
          </table>
      </div>
  </div>
</div>

</div>
</div>

<div class="modal fade" id="lihatbukti" tabindex="-1" role="dialog" aria-labelledby="lihatbuktiLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="lihatbuktiLabel">Bukti pembayaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
          <img src="<?= base_url('assets/bukti_pembayaran_undang/'.$data_pengundang['bukti_pembayaran']); ?>" width="300px">
        </div>
    </div>
  </div>
</div>
