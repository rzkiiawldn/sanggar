<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Data User</h1>
<div class="row my-3">
	<div class="col-6">    
    <!-- <a href="<?= base_url(); ?>administrator/user/tambah_user" class="btn btn-primary"><i class="fas fa-fw fa-plus"></i> Tambah Pengguna</a> -->
    <a href="<?= base_url(); ?>administrator/user/cetak_data" target="_blank" class="btn btn-primary"><i class="fas fa-fw fa-print"></i> Cetak Data Pengguna</a>
		<!-- <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#newTkModal">Tambah data User</button> -->
	</div>
  <div class="col-6">
    <a href="#" class="btn btn-info btn-icon-split float-right">
      <span class="icon text-white-50">
        <i class="fas fa-users"></i>
      </span>
      <span class="text">Total Pengguna : <?= $total_user; ?></span>
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
          <th>Nama</th>
          <th>Email</th>
          <th>Jenis Kelamin</th>
          <th>Foto</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        $no = 1;
        foreach ($data_user as $u) : ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><?= $u['nama']; ?></td>
          <td><?= $u['email']; ?></td>
          <td><?= $u['jenis_kelamin']; ?></td>
          <td><img src="<?= base_url(); ?>assets/img/profile/<?= $u['gambar']; ?>" width="80px"></td>
          <td class="text-right">
          	<a href="<?= base_url(); ?>administrator/user/detail_user/<?= $u['id']; ?>" class="badge badge-primary"><i class="fas fa-fw fa-eye"></i></a>
          	<a href="<?= base_url(); ?>administrator/user/hapus_user/<?= $u['id']; ?>" class="badge badge-danger" onclick="return confirm('Yakin ?');"><i class="fas fa-fw fa-trash"></i></a>
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

<!-- Modal Add -->
<!-- <div class="modal fade" id="newTkModal" tabindex="-1" role="dialog" aria-labelledby="newTkModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newTkModalLabel">Tambah Data User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url('administrator/user/tambah_user'); ?>">
        <div class="modal-body">
          <div class="form-group">
            <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukan nama User">
          </div>
          <div class="form-group">
            <input type="text" name="email" class="form-control" id="email" placeholder="Masukan Email User">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add</button>
        </div>
      </form>
    </div>
  </div>
</div> -->