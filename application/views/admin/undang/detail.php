<div class="container-fluid">

<div class="row mb-2">
    <div class="col-10">
      <div class="card">
          <div class="card-header">
            <?= $judul; ?>
          </div>
          <table class="table">
              <tr>
                <th width="250px">Nama pengundang</th>
                <td>: <?= $undang['nama']; ?></td>
              </tr>
              <tr>
                <th width="250px">Nama paket</th>
                <td>: <?= $undang['nama_paket']; ?></td>
              </tr>
              <tr>
                <th width="250px">Nama Sanggar</th>
                <td>: <?= $undang['nama_sanggar']; ?></td>
              </tr>
              <tr>
                <th width="250px">Tanggal Undang</th>
                <td>: <?= date('d F Y',strtotime($undang['tanggal_undang'])); ?></td>
              </tr>
              <tr>
                <th width="250px">Tanggal Acara</th>
                <td>: <?= date('d F Y', strtotime($undang['tanggal_acara'])); ?></td>
              </tr>
              <tr>
                <th width="250px">Harga Sewa</th>
                <td>: <?= $undang['biaya_undang']; ?></td>
              </tr>
	            <tr>
	                <th>Status Undang</th>
	                <td>: 
	                    <?php if ($undang['status_undang'] == 0): ?>
	                      <button class="btn btn-sm btn-warning">Belum Bayar</button>
	                    <?php elseif($undang['status_undang'] == 1): ?>
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
            Data lengkap pengundang
          </div>
          <table class="table">
              <tr>
                  <th width="250px" >Nama pengundang</th>
                  <td>: <?= $data_pengundang['nama']; ?></td>
              </tr>
              <tr>
                  <th width="250px">Email</th>
                  <td>: <?= $data_pengundang['email']; ?></td>
              </tr>
              <tr>
                  <th width="250px">Nomor Telepon</th>
                  <td>: <?= $data_pengundang['nomor_telepon']; ?></td>
              </tr>
              <tr>
                  <th width="250px">Jenis Kelamin</th>
                  <td>: <?= $data_pengundang['jenis_kelamin']; ?></td>
              </tr>
              <tr>
                  <th width="250px">Alamat</th>
                  <td>: <?= $data_pengundang['alamat']; ?></td>
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
            Data Paket Sanggar
          </div>
          <table class="table">
              <tr>
                  <th width="250px" >Jenis paket</th>
                  <td>: <?= $data_paket['jenis_paket']; ?></td>
              </tr>
              <tr>
                  <th width="250px" >Nama paket</th>
                  <td>: <?= $data_paket['nama_paket']; ?></td>
              </tr>
              <tr>
                  <th width="250px">Tentang paket</th>
                  <td>: <?= $data_paket['keterangan_paket']; ?></td>
              </tr>
              <tr>
                <td colspan="2"><a href="<?= base_url('administrator/undang/index'); ?>" class="btn btn-success float-right">Kembali</a></td>
              </tr>
          </table>
      </div>
  </div>
</div>

</div>
</div>
