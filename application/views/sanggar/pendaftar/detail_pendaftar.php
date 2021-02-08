<div class="container-fluid">

<div class="row">
    <div class="col-md-7">
      <div class="card">
          <div class="card-header">
            <?= $judul; ?>
          </div>
          <table class="table">
              <tr>
                <th>Nama pendaftar</th>
                <td>: <?= $pendaftar['nama']; ?></td>
              </tr>
              <tr>
                <th>Kelas</th>
                <td>: <?= $pendaftar['nama_kelas']; ?></td>
              </tr>
              <tr>
                <th>Tanggal Pendaftaran</th>
                <td>: <?= date('d F Y',strtotime($pendaftar['tanggal_pendaftaran'])); ?></td>
              </tr>
              <tr>
                <th>Status Pendaftaran</th>
                <td>: 
                    <?php if ($pendaftar['status_pendaftaran'] == 1): ?>
                      <button class="btn btn-sm btn-warning">Menunggu Konfirmasi</button>
                    <?php else: ?>
                      <button class="btn btn-sm btn-danger">Diterima</button>
                    <?php endif ?>
                </td>
              </tr>
              <tr>
                <th>Ubah status pendaftar</th>
                <td>
                  <form action="<?= base_url('sanggar/pendaftar/cek_status/'.$pendaftar['kode_pendaftaran']) ?>" method="post">
                    <input type="hidden" name="email_pendaftar" value="<?= $data_pendaftar['email']; ?>">
                    <input type="hidden" name="nama_sanggar" value="<?= $pendaftar['nama_sanggar']; ?>">
                    <select name="status_pendaftaran" class="form-control" value="<?= $pendaftar['status_pendaftaran']; ?>">
                      <?php if ($pendaftar['status_pendaftaran'] == 1): ?>
                        <option selected="" value="1">Menungu Konfirmasi</option>
                      <?php else: ?>
                        <option selected="" value="2">Diterima</option>
                      <?php endif ?>
                        <option value="1">Menungu Konfirmasi</option>
                        <option value="2">Diterima</option>
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
            Data lengkap pendaftar
          </div>
          <table class="table">
              <tr>
                  <th >Nama Penyewa</th>
                  <td>: <?= $data_pendaftar['nama']; ?></td>
              </tr>
              <tr>
                  <th>Email</th>
                  <td>: <?= $data_pendaftar['email']; ?></td>
              </tr>
              <tr>
                  <th>Nomor Telepon</th>
                  <td>: <?= $data_pendaftar['nomor_telepon']; ?></td>
              </tr>
              <tr>
                  <th>Jenis Kelamin</th>
                  <td>: <?= $data_pendaftar['jenis_kelamin']; ?></td>
              </tr>
              <tr>
                  <th>Alamat</th>
                  <td>: <?= $data_pendaftar['alamat']; ?></td>
              </tr>
              <tr>
                <td colspan="2"><a href="<?= base_url('sanggar/pendaftar/index'); ?>" class="btn btn-sm btn-success float-right">Kembali</a></td>
              </tr>
          </table>
      </div>
  </div>
</div>

</div>
</div>
