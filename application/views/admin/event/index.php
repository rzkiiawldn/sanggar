<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Kelola Event</h1>
<div class="row my-3">
  <div class="col-md-6">    
    <!-- <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#neweventModal">Tambah event</button> -->
    <button type="button" data-toggle="modal" data-target="#tambaheventModal" class="btn btn-primary" ><i class="fas fa-plus"></i>  Tambah Event</button>
    <!-- <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#newTkModal">Tambah data User</button> -->
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
          <th>Judul</th>
          <th>Pengirim</th>
          <th>Tanggal Event</th>
          <th>Date Created</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        $no = 1;
        foreach ($event as $e):
         ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><?= $e['judul_event']; ?></td>
          <td><?= $e['pengirim']; ?></td>
          <td><?= date('d F Y', strtotime($e['tanggal_event'])); ?></td>
          <td><?= date('d F Y', $e['date_created']); ?></td>
          <td class="text-right">
            <a href="<?= base_url(); ?>administrator/event/detail_event/<?= $e['id']; ?>" class="badge badge-primary"><i class="fas fa-fw fa-eye"></i></a>
            <a href="#" data-toggle="modal" data-target="#editeventModal<?= $e['id']; ?>" class="badge badge-success"><i class="fas fa-fw fa-edit"></i></a>
            <a href="<?= base_url(); ?>administrator/event/hapus_event/<?= $e['id']; ?>" class="badge badge-danger" onclick="return confirm('Yakin ?');"><i class="fas fa-fw fa-trash"></i></a>
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
<div class="modal fade" id="tambaheventModal" tabindex="-1" role="dialog" aria-labelledby="tambaheventModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambaheventModalLabel">Tambah event</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= form_open_multipart('administrator/event/tambah_event'); ?>
        <div class="modal-body">
          <div class="form-group">
            <label>Judul event</label>
            <input type="text" name="judul_event" class="form-control" value="<?= set_value('judul_event'); ?>">
          </div>
          <div class="form-group">
            <label>Keterangan</label>
            <textarea class="form-control" name="keterangan" ></textarea>
          </div>
          <div class="form-group">
            <label>Pengirim</label>
            <input type="text" name="pengirim" class="form-control" value="<?= $user['nama']; ?>" readonly>
          </div>
          <div class="form-group">
            <label>Tanggal Event</label>
            <input type="date" name="tanggal_event" class="form-control">
          </div>
          <div class="form-group">
            <label>Foto event</label>
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
foreach($event as $e): $no++; ?>
<div class="modal fade" id="editeventModal<?= $e['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editeventModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editeventModalLabel">Edit event</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url(); ?>administrator/event/edit_event/<?= $e['id']; ?>" method="post" enctype="multipart/form-data"> 
        <input type="hidden" name="id" value="<?= $e['id']; ?>">
        <div class="modal-body">
          <div class="form-group">
            <label>Judul event</label>
            <input type="text" name="judul_event" class="form-control" value="<?= $e['judul_event']; ?>">
          </div>
          <div class="form-group">
            <label>Isi event</label>
            <textarea name="keterangan" class="form-control"><?= $e['keterangan']; ?></textarea>
          </div>
          <div class="form-group">
            <label>Tanggal Evenet</label>
            <input type="date" name="tanggal_event" value="<?= $e['tanggal_event']; ?>" class="form-control">
          </div>
          <label>Gambar</label>
              <div class="row">
                <div class="col-sm-3">
                  <img src="<?= base_url('assets/gambar_event/') . $e['gambar']; ?>" class="img-thumbnail">
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