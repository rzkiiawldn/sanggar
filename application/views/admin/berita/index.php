<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Kelola Berita</h1>
<div class="row my-3">
	<div class="col-md-6">    
		<!-- <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#newBeritaModal">Tambah berita</button> -->
  <a href="#" data-toggle="modal" data-target="#tambahberitaModal" class="btn btn-primary" ><i class="fas fa-plus"></i> Tambah Berita</a>
	<!-- <a href="<?= base_url(); ?>administrator/berita/cetak_berita" class="btn btn-primary"><i class="fas fa-fw fa-print"></i> Cetak Data Berita</a> -->
    <!-- <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#newTkModal">Tambah data User</button> -->
  </div>
  <!-- <div class="col-md-6">
    <a href="#" class="btn btn-info btn-icon-split float-right">
      <span class="icon text-white-50">
        <i class="fas fa-newspaper"></i>
      </span>
      <span class="text">Total berita : <?= $total_berita; ?></span>
    </a>
  </div> -->
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
          <th>Judul</th>
          <th>Pengirim</th>
          <th>Tanggal input berita</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        $no = 1;
        foreach ($berita as $b):
         ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><?= $b['judul_berita']; ?></td>
          <td><?= $b['pengirim']; ?></td>
          <td><?= date('d F Y', $b['date_created']); ?></td>
          <td class="text-right">
          	<a href="<?= base_url(); ?>administrator/berita/detail_berita/<?= $b['id']; ?>" class="badge badge-primary"><i class="fas fa-fw fa-eye"></i></a>
          	<a href="#" data-toggle="modal" data-target="#editberitaModal<?= $b['id']; ?>" class="badge badge-success"><i class="fas fa-fw fa-edit"></i></a>
          	<a href="<?= base_url(); ?>administrator/berita/hapus_berita/<?= $b['id']; ?>" class="badge badge-danger" onclick="return confirm('Yakin ?');"><i class="fas fa-fw fa-trash"></i></a>
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
<div class="modal fade" id="tambahberitaModal" tabindex="-1" role="dialog" aria-labelledby="tambahberitaModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahberitaModalLabel">Tambah Berita</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= form_open_multipart('administrator/berita/tambah_berita'); ?>
        <div class="modal-body">
          <div class="form-group">
            <label>Judul berita</label>
            <input type="text" name="judul_berita" class="form-control" value="<?= set_value('judul_berita'); ?>">
          </div>
          <div class="form-group">
            <label>Isi keterangan</label>
            <textarea class="form-control" name="keterangan" ></textarea>
          </div>
          <div class="form-group">
            <label>Pengirim</label>
            <input type="text" name="pengirim" class="form-control" value="<?= $user['nama']; ?>" readonly>
          </div>
          <div class="form-group">
            <label>Foto berita</label>
            <input type="file" name="gambar" class="form-control">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
        </div>
      <?= form_close(); ?>
    </div>
  </div>
</div>

<?php
$no = 0;
foreach($berita as $b): $no++; ?>
<div class="modal fade" id="editberitaModal<?= $b['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editberitaModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editberitaModalLabel">Edit berita Sanggar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url(); ?>administrator/berita/edit_berita/<?= $b['id']; ?>" method="post" enctype="multipart/form-data"> 
        <input type="hidden" name="id" value="<?= $b['id']; ?>">
        <div class="modal-body">
          <div class="form-group">
            <label>Judul Berita</label>
            <input type="text" name="judul_berita" class="form-control" value="<?= $b['judul_berita']; ?>">
          </div>
          <div class="form-group">
            <label>Isi Berita</label>
            <textarea name="keterangan" class="form-control"><?= $b['keterangan']; ?></textarea>
          </div>
          <label>Gambar</label>
              <div class="row">
                <div class="col-sm-3">
                  <img src="<?= base_url('assets/gambar_berita/') . $b['gambar']; ?>" class="img-thumbnail">
                </div>
                <div class="col-sm-9">
                  <div class="custom-file">
                    <input type="file" name="gambar" class="custom-file-input" id="gambar">
                    <label class="custom-file-label" for="gambar">Choose file</label>
                  </div>
                </div>
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Edit</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach; ?>