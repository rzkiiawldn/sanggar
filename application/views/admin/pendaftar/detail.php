<div class="container-fluid">

<div class="row mb-2">
    <div class="col-10">
      <div class="card">
          <div class="card-header">
            <?= $judul; ?>
          </div>
          <table class="table">
              <tr>
                <th width="250px">Nama pendaftar</th>
                <td>: <?= $pendaftar['nama']; ?></td>
              </tr>
              <tr>
                <th width="250px">Kelas</th>
                <td>: <?= $pendaftar['nama_kelas']; ?></td>
              </tr>
              <tr>
                <th width="250px">Nama Sanggar</th>
                <td>: <?= $pendaftar['nama_sanggar']; ?></td>
              </tr>
              <tr>
                <th width="250px">Tanggal Pendaftaran</th>
                <td>: <?= date('d F Y',strtotime($pendaftar['tanggal_pendaftaran'])); ?></td>
              </tr>
              <tr>
                <th width="250px">Status Pendaftaran</th>
                <td>: 
                    <?php if ($pendaftar['status_pendaftaran'] == 1): ?>
                      <button class="btn btn-sm btn-warning">Menunggu Konfirmasi</button>
                    <?php else: ?>
                      <button class="btn btn-sm btn-danger">Diterima</button>
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
            Data lengkap pendaftar
          </div>
          <table class="table">
              <tr>
                  <th width="250px" >Nama Penyewa</th>
                  <td>: <?= $data_pendaftar['nama']; ?></td>
              </tr>
              <tr>
                  <th width="250px">Email</th>
                  <td>: <?= $data_pendaftar['email']; ?></td>
              </tr>
              <tr>
                  <th width="250px">Nomor Telepon</th>
                  <td>: <?= $data_pendaftar['nomor_telepon']; ?></td>
              </tr>
              <tr>
                  <th width="250px">Jenis Kelamin</th>
                  <td>: <?= $data_pendaftar['jenis_kelamin']; ?></td>
              </tr>
              <tr>
                  <th width="250px">Alamat</th>
                  <td>: <?= $data_pendaftar['alamat']; ?></td>
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
            Data Kelas Sanggar
          </div>
          <table class="table">
              <tr>
                  <th width="250px" >Nama kelas</th>
                  <td>: <?= $data_kelas['nama_kelas']; ?></td>
              </tr>
              <tr>
                  <th width="250px">Tentang kelas</th>
                  <td>: <?= $data_kelas['deskripsi_kelas']; ?></td>
              </tr>
              <tr>
                  <th width="250px">Batas Usia</th>
                  <td>: <?= $data_kelas['umur']; ?></td>
              </tr>
              <tr>
                <td colspan="2"><a href="<?= base_url('administrator/pendaftar/index'); ?>" class="btn btn-success float-right">Kembali</a></td>
              </tr>
          </table>
      </div>
  </div>
</div>

</div>
</div>
