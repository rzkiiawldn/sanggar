<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Data Sanggar</h1>

<div class="row my-3">
	<div class="col-md-6">    
		<!-- <a href="<?= base_url(); ?>administrator/sanggar/tambah_sanggar" class="btn btn-primary"><i class="fas fa-fw fa-plus"></i> Tambah data sanggar</a> -->
    <a target="_blank" href="<?= base_url(); ?>administrator/sanggar/cetak_data" class="btn btn-primary"><i class="fas fa-fw fa-print"></i> Cetak Data Sanggar</a><!-- 
    <a target="_blank" href="<?= base_url(); ?>administrator/sanggar/export_excel" class="btn btn-primary mt-2"><i class="fas fa-fw fa-print"></i> Export Data Excel</a> -->
    <!-- <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#newTkModal">Tambah data User</button> -->
  </div>
  <div class="col-md-6">
    <a href="#" class="btn btn-info btn-icon-split float-right">
      <span class="icon text-white-50">
        <i class="fas fa-school"></i>
      </span>
      <span class="text">Total sanggar : <?= $total_sanggar; ?></span>
    </a>
  </div>
</div>

<?= $this->session->flashdata('message'); ?>

<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-body">
  <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th>#</th>
          <th>Nama Sanggar</th>
          <th>Tipe Sanggar</th>
          <th>Email</th>
          <th>Telepon</th>
          <th>Foto Sanggar</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
      <?php
      $no = 1;
      foreach ($sanggar as $s) :
       ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><?= $s['nama_sanggar']; ?></td>
          <td>

            <?php if ($s['tipe_sanggar_id']==1){ ?>
                <p>Sanggar Tari</p>
            <?php } elseif ($s['tipe_sanggar_id']==2){ ?>
                <p>Sanggar Teater</p>
            <?php } elseif ($s['tipe_sanggar_id']==3){ ?>
                <p>Sanggar Musik</p>
            <?php } elseif ($s['tipe_sanggar_id']==3){ ?>
                <p>Sanggar Beladiri</p>
            <?php } else { ?>
              <p>Belum terdaftar</p>
            <?php } ?>
              
          </td>
          <td><?= $s['email']; ?></td>
          <td><?= $s['nomor_telepon']; ?></td>
          <td><img src="<?= base_url(); ?>assets/img/sanggar/profile/<?= $s['foto_sanggar']; ?>" width="80px"></td>
          <td class="text-right">
          	<a href="<?= base_url(); ?>administrator/sanggar/detail/<?= $s['id_sanggar']; ?>" class="badge badge-primary"><i class="fas fa-fw fa-eye"></i></a>
          	<!-- <a href="<?= base_url(); ?>administrator/sanggar/edit/<?= $s['id_sanggar']; ?>" class="badge badge-success"><i class="fas fa-fw fa-edit"></i></a> -->
          	<a href="<?= base_url(); ?>administrator/sanggar/hapus/<?= $s['id_sanggar']; ?>" class="badge badge-danger" onclick="return confirm('Yakin ?');"><i class="fas fa-fw fa-trash"></i></a>
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