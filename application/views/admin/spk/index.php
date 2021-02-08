<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

<?= $this->session->flashdata('message'); ?>

<a href="<?= base_url(); ?>administrator/spk_pm/alternatif" class="btn btn-primary mb-3">Tambahkan alternatif</a>

<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-body">
  <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th>#</th>
          <th>Kriteria</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
      <?php
      $no = 1;
      foreach ($kriteria as $k) :
       ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><?= $k['nama_kriteria']; ?></td>
          <td class="text-right">
          	<a href="<?= base_url(); ?>administrator/spk_pm/detail/<?= $k['id_kriteria']; ?>" class="badge badge-primary"><i class="fas fa-fw fa-eye"></i></a>
          	<a href="<?= base_url(); ?>administrator/spk_pm/edit/<?= $k['id_kriteria']; ?>" class="badge badge-success"><i class="fas fa-fw fa-edit"></i></a>
          	<a href="<?= base_url(); ?>administrator/spk_pm/hapus/<?= $k['id_kriteria']; ?>" class="badge badge-danger" onclick="return confirm('Yakin ?');"><i class="fas fa-fw fa-trash"></i></a>
          </td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
</div>


<div class="card shadow mb-4">
<div class="card-body">
  <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th>#</th>
          <th>Kriteria</th>
          <th>Sub Kriteria</th>
          <th>Jenis Penilaian</th>
          <th>Nilai Ketetapan</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
      <?php
      $no = 1;
      foreach ($sub_kriteria as $sk) :
       ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><?= $sk['id_kriteria']; ?></td>
          <td><?= $sk['nama_sub']; ?></td>
          <td><?= $sk['jenis_penilaian']; ?></td>
          <td><?= $sk['nilai_ketetapan']; ?></td>
          <td class="text-right">
          	<a href="<?= base_url(); ?>administrator/spk_pm/detail/<?= $sk['id_sub']; ?>" class="badge badge-primary"><i class="fas fa-fw fa-eye"></i></a>
          	<a href="<?= base_url(); ?>administrator/spk_pm/edit/<?= $sk['id_sub']; ?>" class="badge badge-success"><i class="fas fa-fw fa-edit"></i></a>
          	<a href="<?= base_url(); ?>administrator/spk_pm/hapus/<?= $sk['id_sub']; ?>" class="badge badge-danger" onclick="return confirm('Yakin ?');"><i class="fas fa-fw fa-trash"></i></a>
          </td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
</div>

<div class="card shadow mb-4">
<div class="card-body">
  <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th>#</th>
          <th>Keterangan</th>
          <th>Bobot Nilai</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
      <?php
      $no = 1;
      foreach ($nilai_ketentuan as $nk) :
       ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><?= $nk['keterangan']; ?></td>
          <td><?= $nk['nilai']; ?></td>
          <td class="text-right">
          	<a href="<?= base_url(); ?>administrator/spk_pm/detail/<?= $nk['id']; ?>" class="badge badge-primary"><i class="fas fa-fw fa-eye"></i></a>
          	<a href="<?= base_url(); ?>administrator/spk_pm/edit/<?= $nk['id']; ?>" class="badge badge-success"><i class="fas fa-fw fa-edit"></i></a>
          	<a href="<?= base_url(); ?>administrator/spk_pm/hapus/<?= $nk['id']; ?>" class="badge badge-danger" onclick="return confirm('Yakin ?');"><i class="fas fa-fw fa-trash"></i></a>
          </td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
</div>


<div class="card shadow mb-4">
<div class="card-body">
  <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th>#</th>
          <th>GAP</th>
          <th>Bobot Nilai</th>
          <th>Keterangan</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
      <?php
      $no = 1;
      foreach ($nilai_ketetapan as $nk) :
       ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><?= $nk['gap']; ?></td>
          <td><?= $nk['bobot_nilai']; ?></td>
          <td><?= $nk['keterangan']; ?></td>
          <td class="text-right">
          	<a href="<?= base_url(); ?>administrator/spk_pm/detail/<?= $nk['id']; ?>" class="badge badge-primary"><i class="fas fa-fw fa-eye"></i></a>
          	<a href="<?= base_url(); ?>administrator/spk_pm/edit/<?= $nk['id']; ?>" class="badge badge-success"><i class="fas fa-fw fa-edit"></i></a>
          	<a href="<?= base_url(); ?>administrator/spk_pm/hapus/<?= $nk['id']; ?>" class="badge badge-danger" onclick="return confirm('Yakin ?');"><i class="fas fa-fw fa-trash"></i></a>
          </td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
</div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->