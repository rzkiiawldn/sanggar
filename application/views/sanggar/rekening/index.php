<div class="container-fluid">
<h1 class="h3 mb-4 text-gray-800">Kelola Rekening Sanggar</h1>
<div class="row my-3">
	<div class="col-md-5">    
		<button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#tambahrekeningModal"><i class="fas fa-plus"></i> Tambah rekening</button>
  </div>
</div>
<?= $this->session->flashdata('message'); ?>
<div class="card shadow mb-4">
<div class="card-body">
  <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th>#</th>
          <th>Nama Bank</th>
          <th>Nomor Rekening</th>
          <th>A/N</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        foreach ($rekening as $r) :
        ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><?= $r['nama_bank']; ?></td>
          <td><?= $r['nomor_rekening']; ?></td>
          <td><?= $r['nama_pemilik']; ?></td>
          <td class="text-right">
          	<a href="#" class="badge badge-success" data-toggle="modal" data-target="#editrekeningModal<?= $r['id']; ?>"><i class="fas fa-edit"></i></a>
          	<a href="<?= base_url(); ?>sanggar/rekening/hapus_rekening/<?= $r['id']; ?>" class="badge badge-danger" onclick="return confirm('Yakin ?');"><i class="fas fa-fw fa-trash"></i></a>
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
<div class="modal fade" id="tambahrekeningModal" tabindex="-1" role="dialog" aria-labelledby="tambahrekeningModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahrekeningModalLabel">Tambah rekening bank</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= form_open_multipart('sanggar/rekening/tambah_rekening'); ?>
        <div class="modal-body">
          <input type="hidden" name="id_sanggar" value="<?= $this->session->userdata('id_sanggar'); ?>">
          <div class="form-group">
            <label>Nama rekening</label>
            <input type="text" name="nama_bank" class="form-control" value="<?= set_value('nama_bank'); ?>">
          </div>
          <div class="form-group">
            <label>Nomor rekening</label>
            <input type="number" name="nomor_rekening" class="form-control" value="<?= set_value('nomor_rekening'); ?>">
          </div>
          <div class="form-group">
            <label>Nama Pemilik a/n</label>
            <input type="text" name="nama_pemilik" class="form-control" value="<?= set_value('nama_bank'); ?>">
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


<!-- EDIT -->
<?php 
foreach ($rekening as $r) : ?>
<div class="modal fade" id="editrekeningModal<?= $r['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editrekeningModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editrekeningModalLabel">Edit rekening bank</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= form_open_multipart('sanggar/rekening/edit_rekening/'.$r['id']); ?>
        <div class="modal-body">
          <input type="hidden" name="id" value="<?= $r['id']; ?>">
          <div class="form-group">
            <label>Nama rekening</label>
            <input type="text" name="nama_bank" class="form-control" value="<?= $r['nama_bank']; ?>">
          </div>
          <div class="form-group">
            <label>Nomor rekening</label>
            <input type="number" name="nomor_rekening" class="form-control" value="<?= $r['nomor_rekening']; ?>">
          </div>
          <div class="form-group">
            <label>Nama Pemilik a/n</label>
            <input type="text" name="nama_pemilik" class="form-control" value="<?= $r['nama_pemilik']; ?>">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="tambah">Edit</button>
        </div>
      <?= form_close(); ?>
    </div>
  </div>
</div>
<?php endforeach; ?>