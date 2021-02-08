<div class="container-fluid">

  <div class="row">
      <div class="col-md-7">
          <div class="card">
              <div class="card-header">
                <?= $judul; ?>
              </div>
              <table class="table">
                <tr>
                    <th>Nama Penyewa</th>
                    <td>: <?= $penyewa['nama']; ?></td>
                </tr>
                <tr>
                    <th>Jenis Atribut</th>
                    <td>: <?= $penyewa['jenis_atribut']; ?></td>
                </tr>
                <tr>
                    <th>Nama Atribut</th>
                    <td>: <?= $penyewa['nama_atribut']; ?></td>
                </tr>
                <tr>
                    <th>Tanggal Sewa</th>
                    <td>: <?= date('d/m/Y', strtotime($penyewa['tanggal_sewa'])); ?></td>
                </tr>
                <tr>
                    <th>Tanggal Kembali</th>
                    <td>: <?= date('d/m/Y', strtotime($penyewa['tanggal_kembali'])); ?></td>
                </tr>
                <tr>
                    <th>Lama Sewa</th>
                    <td>: <?= $penyewa['lama_sewa']; ?> Hari</td>
                </tr>
                <tr>
                    <th>Harga Sewa</th>
                    <td>: Rp. <?= number_format($penyewa['harga_sewa'],0,',','.'); ?></td>
                </tr>
                <tr>
                    <th>Denda Sewa</th>
                    <td>: 
                      <?php if (empty($penyewa['denda_sewa'])): ?>
                      -
                      <?php else: ?>
                      Rp. <?= number_format($penyewa['denda_sewa'],0,',','.'); ?></td>
                      <?php endif ?>
                </tr>
                <tr>
                    <th>Tanggal Pengembalian</th>
                    <td>:
                        <?php if ($penyewa['tanggal_pengembalian'] == "0000-00-00") {
                            echo "-";
                        } else {
                            echo date('d/m/Y', strtotime($penyewa['tanggal_pengembalian']));
                        }
                            ?>
                            
                    </td>
                </tr>
                <tr>
                    <th>Bukti Pembayaran</th>
                    <td>: 
                        <?php if ($penyewa['bukti_pembayaran'] == NULL): ?>
                            <button class="btn btn-sm btn-danger disabled">Belum dibayar</button>
                        <?php else: ?>            
                            <button type="submit" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#lihatbukti">Lihat Bukti Pembayaran</button>
                        <?php endif ?>
                    </td>
                </tr>
                <tr>
                    <th>Status Pengembalian</th>
                    <td>: 
                        <?php if ($penyewa['status_pengembalian'] == 0): ?>
                            <span style="color: red">Belum kembali</span>
                        <?php else: ?>            
                            <span style="color: green">Sudah kembali</span>
                        <?php endif ?>
                    </td>
                </tr>
                <tr>
                    <th>Status Sewa</th>
                    <td>: 
                        <?php if ($penyewa['status_sewa'] == 0): ?>
                        <span style="color: red">Belum Bayar</span>
                        <?php elseif($penyewa['status_sewa'] == 1): ?>
                        <span style="color: green">Transaksi diterima</span>
                        <?php else: ?>
                         <span style="color: red">Selesai</span>
                        <?php endif ?>
                    </td>
                </tr>

                <?php if ($penyewa['status_sewa'] == 1): ?>
                <form action="<?= base_url('sanggar/penyewa/selesai/'.$penyewa['kode_sewa']) ?>" method="post">
                <tr>
                  <th>tanggal pengembalian</th>
                  <td>
                      <input type="hidden" name="tanggal_kembali" value="<?= $penyewa['tanggal_kembali']; ?>">
                      <input type="hidden" name="denda" value="<?= $penyewa['denda']; ?>">
                      <input type="date" name="tanggal_pengembalian" class="form-control">
                  </td>
                </tr>
                <?php else: ?>
                <form action="<?= base_url('sanggar/penyewa/cek_status/'.$penyewa['kode_sewa']) ?>" method="post">
                <?php endif ?>
                <tr>
                    <th>Ubah Status Sewa</th>
                    <td>
                          <input type="hidden" name="kode_sewa" value="<?= $penyewa['kode_sewa']; ?>">
                          <input type="hidden" name="email_penyewa" value="<?= $data_penyewa['email']; ?>">
                          <input type="hidden" name="nama_sanggar" value="<?= $penyewa['nama_sanggar']; ?>">
                          <select name="status_sewa" value="<?= $penyewa['status_sewa']; ?>" class="form-control">
                          <?php if ($penyewa['status_sewa'] == 0): ?>
                            <option selected="" value="0">Belum Bayar</option>
                          <?php elseif($penyewa['status_sewa'] == 1): ?>
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
                Data lengkap penyewa
              </div>
              <table class="table">
                  <tr>
                      <th >Nama Penyewa</th>
                      <td>: <?= $data_penyewa['nama']; ?></td>
                  </tr>
                  <tr>
                      <th>Email</th>
                      <td>: <?= $data_penyewa['email']; ?></td>
                  </tr>
                  <tr>
                      <th>Nomor Telepon</th>
                      <td>: <?= $data_penyewa['nomor_telepon']; ?></td>
                  </tr>
                  <tr>
                      <th>Jenis Kelamin</th>
                      <td>: <?= $data_penyewa['jenis_kelamin']; ?></td>
                  </tr>
                  <tr>
                      <th>Alamat</th>
                      <td>: <?= $data_penyewa['alamat']; ?></td>
                  </tr>
                  <tr>
                    <td colspan="2"><a href="<?= base_url('sanggar/penyewa/index'); ?>" class="btn btn-sm btn-success float-right">Kembali</a></td>
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
          <img src="<?= base_url('assets/bukti_pembayaran_sewa/'.$data_penyewa['bukti_pembayaran']); ?>" width="400px">
        </div>
    </div>
  </div>
</div>