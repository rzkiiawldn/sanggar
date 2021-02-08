<div class="container-fluid">
<h1 class="h3 mb-4 text-gray-800">Data Pendaftar</h1>
<div class="row my-3">
	<div class="col-5">    
	<a href="<?= base_url(); ?>administrator/pendaftar/cetak_data" target="_blank" class="btn btn-primary"><i class="fas fa-fw fa-print"></i> Cetak Data Pendaftar</a>
  </div>
  <div class="col-7">
    <a href="#" class="btn btn-info btn-icon-split float-right">
      <span class="icon text-white-50">
        <i class="fas fa-users"></i>
      </span>
      <span class="text">Total pendaftar : <?= $total_pendaftar; ?></span>
    </a>
  </div>
</div>

<?= $this->session->flashdata('message'); ?>

<div class="card shadow mb-4">
<div class="card-body">
  <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th>Kode</th>
          <th>Nama Pendaftar</th>
          <th>Nama Sanggar</th>
          <th>Pilihan Kelas</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($pendaftaran as $p) : ?>
        <tr>
          <td><?= $p['kode_pendaftaran']; ?></td>
          <td><?= $p['nama']; ?></td>
          <td><?= $p['nama_sanggar']; ?></td>
          <td><?= $p['nama_kelas']; ?></td>
          <td style="color:white">
            <?php if($p['status_pendaftaran']==2): ?>
                <a class="badge badge-success">Diterima</a>
            <?php else:?>
              <a class="badge badge-warning">Diproses</a>
            <?php endif; ?>
          </td>
          <td class="text-right">
            <a href="<?= base_url(); ?>administrator/pendaftar/detail_pendaftar/<?= $p['kode_pendaftaran']; ?>" class="badge badge-primary">Detail</a>
            <a href="<?= base_url(); ?>administrator/pendaftar/hapus_pendaftar/<?= $p['kode_pendaftaran']; ?>" class="badge badge-danger" onclick="return confirm('Yakin ?');">Hapus</a>
          </td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
</div>

</div>
</div>


