<div class="container-fluid">

<div class="row mb-2">
    <div class="col-10">
      <div class="card">
          <div class="card-header">
            <?= $judul; ?>
          </div>
          <table class="table">
              <tr>
                <th width="250px">Nama penyewa</th>
                <td>: <?= $penyewa['nama']; ?></td>
              </tr>
              <tr>
                <th width="250px">Atribut</th>
                <td>: <?= $penyewa['nama_atribut']; ?></td>
              </tr>
              <tr>
                <th width="250px">Nama Sanggar</th>
                <td>: <?= $penyewa['nama_sanggar']; ?></td>
              </tr>
              <tr>
                <th width="250px">Tanggal penyewaan</th>
                <td>: <?= date('d F Y', strtotime($penyewa['tanggal_sewa'])); ?></td>
              </tr>
              <tr>
                <th width="250px">Harga Sewa</th>
                <td>: <?= $penyewa['harga_sewa']; ?></td>
              </tr>
              <tr>
                <th>Status Pengembalian</th>
                <td>: 
                    <?php if ($penyewa['status_pengembalian'] == 0): ?>
                        <button type="submit" class="btn btn-sm btn-danger">Belum kembali</button>
                    <?php else: ?>            
                        <button type="submit" class="btn btn-sm btn-primary">Sudah kembali</button>
                    <?php endif ?>
                </td>
	            </tr>
	            <tr>
	                <th>Status Sewa</th>
	                <td>: 
	                    <?php if ($penyewa['status_sewa'] == 0): ?>
	                      <button class="btn btn-sm btn-warning">Belum Bayar</button>
	                    <?php elseif($penyewa['status_sewa'] == 1): ?>
	                      <button class="btn btn-sm btn-success">Transaksi diterima</button>
	                    <?php else: ?>
	                      <button class="btn btn-sm btn-danger">Selesai</button>
	                    <?php endif ?>
	                </td>
	            </tr>
            </table>
      </div>
  </div> 
</div>
<div class="row">
  <div class="col-10">
      <div class="card">
          <div class="card-header">
            Data lengkap penyewa
          </div>
          <table class="table">
              <tr>
                  <th width="250px" >Nama Penyewa</th>
                  <td>: <?= $data_penyewa['nama']; ?></td>
              </tr>
              <tr>
                  <th width="250px">Email</th>
                  <td>: <?= $data_penyewa['email']; ?></td>
              </tr>
              <tr>
                  <th width="250px">Nomor Telepon</th>
                  <td>: <?= $data_penyewa['nomor_telepon']; ?></td>
              </tr>
              <tr>
                  <th width="250px">Jenis Kelamin</th>
                  <td>: <?= $data_penyewa['jenis_kelamin']; ?></td>
              </tr>
              <tr>
                  <th width="250px">Alamat</th>
                  <td>: <?= $data_penyewa['alamat']; ?></td>
              </tr>
          </table>
      </div>
  </div>
</div>
<div class="row">
  <div class="col-10">
      <div class="card">
          <div class="card-header">
            Data lengkap sanggar
          </div>
          <table class="table">
              <tr>
                  <th width="250px" >Nama sanggar</th>
                  <td>: <?= $data_sanggar['nama_sanggar']; ?></td>
              </tr>
              <tr>
                  <th width="250px">Email Sanggar</th>
                  <td>: <?= $data_sanggar['email']; ?></td>
              </tr>
              <tr>
                  <th width="250px">Nomor Telepon</th>
                  <td>: <?= $data_sanggar['nomor_telepon']; ?></td>
              </tr>
              <tr>
                  <th width="250px">Jenis Sanggar</th>
                  <td>: <?= $data_sanggar['tipe_sanggar']; ?></td>
              </tr>
              <tr>
                  <th width="250px">Alamat Sanggar</th>
                  <td>: <?= $data_sanggar['alamat']; ?></td>
              </tr>
          </table>
      </div>
  </div>
</div>
<div class="row">
  <div class="col-10">
      <div class="card">
          <div class="card-header">
            Data atribut Sanggar
          </div>
          <table class="table">
              <tr>
                  <th width="250px" >Jenis atribut</th>
                  <td>: <?= $data_atribut['jenis_atribut']; ?></td>
              </tr>
              <tr>
                  <th width="250px" >Nama atribut</th>
                  <td>: <?= $data_atribut['nama_atribut']; ?></td>
              </tr>
              <tr>
                  <th width="250px">Tentang atribut</th>
                  <td>: <?= $data_atribut['keterangan_atribut']; ?></td>
              </tr>
              <tr>
                <td colspan="2"><a href="<?= base_url('administrator/penyewa/index'); ?>" class="btn btn-success float-right">Kembali</a></td>
              </tr>
          </table>
      </div>
  </div>
</div>

</div>
</div>
