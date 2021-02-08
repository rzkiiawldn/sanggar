<!-- Begin Page Content -->
<div class="container-fluid">
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Kelola Paket Undang</h1>
<div class="row my-3">
	<div class="col-md-5">    
		<button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#tambahUndangModal"><i class="fas fa-plus"></i> Tambah Paket</button>
    <!-- <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#newTkModal">Tambah data User</button> -->
  </div>
  <div class="col-md-7">
      <div class="custom-control custom-switch float-right">
        <?php if ($user_sanggar['undang_acara'] == 1): ?>

          <input type="checkbox" class="custom-control-input custom-undang-acara" id="customSwitch1" <?= check_access_tutup_undang_acara($user_sanggar['undang_acara'], $this->session->userdata('id_sanggar')); ?> name="undang_acara" data-undang_acara="0" data-sanggar="<?= $this->session->userdata('id_sanggar'); ?>">
          <label class="custom-control-label" for="customSwitch1">Tutup undang acara</label>

          <?php else: ?>

          <input type="checkbox" class="custom-control-input custom-undang-acara" id="customSwitch1" <?= check_access_buka_undang_acara($user_sanggar['undang_acara'], $this->session->userdata('id_sanggar')); ?> name="undang_acara" data-undang_acara="1" data-sanggar="<?= $this->session->userdata('id_sanggar'); ?>">
          <label class="custom-control-label" for="customSwitch1">Buka undang acara</label>

          <?php endif ?>
      </div>
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
          <th>Jenis Paket</th>
          <th>Nama Paket</th>
          <th>Keterangan</th>
          <th>Harga Paket/hari</th>
          <th>Foto Paket</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
      	<?php 
      	$no = 1;
      	foreach ($paket_undang as $pu) :
      	 ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><?= $pu['jenis_paket']; ?></td>
          <td><?= $pu['nama_paket']; ?></td>
          <td><?= word_limiter($pu['keterangan_paket'], 20); ?></td>
          <td>Rp.<?= $pu['harga']; ?></td>
          <td><img src="<?= base_url(); ?>assets/gambar_paket_undang/<?= $pu['gambar']; ?>" width="80px"></td>
          <td class="text-right">
          	<a href="#" class="badge badge-primary" data-toggle="modal" data-target="#detailPaketUndangModal<?= $pu['id']; ?>"><i class="fas fa-eye"></i></a>
            <a href="#" class="badge badge-success" data-toggle="modal" data-target="#editPaketUndangModal<?= $pu['id']; ?>"><i class="fas fa-edit"></i></a>
          	<a href="<?= base_url(); ?>sanggar/paket_undang/hapus_paket_undang/<?= $pu['id']; ?>" class="badge badge-danger" onclick="return confirm('Yakin ?');"><i class="fas fa-fw fa-trash"></i></a>
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
<div class="modal fade" id="tambahUndangModal" tabindex="-1" role="dialog" aria-labelledby="tambahUndangModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahUndangModalLabel">Tambah Paket Undang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= form_open_multipart('sanggar/paket_undang/tambah_paket_undang'); ?>
        <div class="modal-body">
          <input type="hidden" name="id_sanggar" value="<?= $this->session->userdata('id_sanggar'); ?>">

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Jenis Paket</label>
                <input type="text" name="jenis_paket" class="form-control" value="<?= set_value('jenis_paket'); ?>">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Nama Paket</label>
                <input type="text" name="nama_paket" class="form-control" value="<?= set_value('nama_paket'); ?>">
              </div>
            </div>
          </div>

          <div class="form-group">
            <label>Keterangan</label>
            <textarea  name="keterangan_paket" class="form-control"></textarea>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Harga Paket</label>
                <input type="number" name="harga" class="form-control" value="<?= set_value('harga'); ?>">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Foto Paket</label>
                <input type="file" name="gambar" class="form-control">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control" required="">
                  <option value="1">Tersedia</option>
                  <option value="0">Tidak Tersedia</option>
                </select>
              </div>
            </div>
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
foreach($paket_undang as $pu): $no++; ?>
<div class="modal fade" id="editPaketUndangModal<?= $pu['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editPaketUndangModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editPaketUndangModalLabel">Edit Paket Undang Sanggar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url(); ?>sanggar/paket_undang/proses_edit/<?= $pu['id']; ?>" method="post" enctype="multipart/form-data"> 
        <input type="hidden" name="id" value="<?= $pu['id']; ?>">
        <div class="modal-body">

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Jenis Paket</label>
                <input type="text" name="jenis_paket" class="form-control" value="<?= $pu['jenis_paket']; ?>">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Nama Paket</label>
                <input type="text" name="nama_paket" class="form-control" value="<?= $pu['nama_paket']; ?>">
              </div>
            </div>
          </div>

          <div class="form-group">
            <label>Keterangan</label>
            <textarea  name="keterangan_paket" class="form-control"><?= $pu['keterangan_paket']; ?></textarea>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Harga Paket</label>
                <input type="number" name="harga" class="form-control" value="<?= $pu['harga']; ?>">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control" value="<?= $pu['status']; ?>">
                  <?php if ($pu['status'] == 1): ?>
                  <option value="1">Tersedia</option>
                  <?php else: ?>
                  <option value="0">Tidak Tersedia</option>
                  <?php endif ?>
                  <option value="1">Tersedia</option>
                  <option value="0">Tidak Tersedia</option>
                </select>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="form-group">
              <label>Gambar</label>
              <div class="row">
                <div class="col-sm-3">
                  <img src="<?= base_url('assets/gambar_paket_undang/') . $pu['gambar']; ?>" class="img-thumbnail">
                </div>
                <div class="col-sm-9">
                   <div class="custom-file">
                     <input type="file" name="gambar" class="custom-file-input" id="gambar">
                    <label class="custom-file-label" for="gambar">Choose file</label>
                  </div>
                 </div>
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


<?php
$no = 0;
foreach($paket_undang as $pu): $no++; ?>
<div class="modal fade" id="detailPaketUndangModal<?= $pu['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="detailPaketUndangModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editPaketUndangModalLabel">Detail Paket Undang Sanggar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
          <table class="table">
            <tr>
              <th width="200px">Jenis Paket</th>
              <td>: <?= $pu['jenis_paket']; ?></td>
            </tr>
            <tr>
              <th width="200px">Nama Paket</th>
              <td>: <?= $pu['nama_paket']; ?></td>
            </tr>
            <tr>
              <th width="200px">Keterangan Paket</th>
              <td>: <?= $pu['keterangan_paket']; ?></td>
            </tr>
            <tr>
              <th width="200px">Harga Sewa Paket</th>
              <td>: Rp. <?= number_format($pu['harga'],0,',','.'); ?></td>
            </tr>
            <tr>
              <th width="200px">Status Paket</th>
              <td>: 
                <?php if ($pu['status'] == 1): ?>
                  <button class="btn btn-sm btn-success">Tersedia</button>
                <?php else: ?>
                  <button class="btn btn-sm btn-danger">Tidak tersedia</button>
                <?php endif ?>                  
              </td>
            </tr>
            <tr>
              <th width="200px">Foto Paket</th>
              <td>: <img src="<?= base_url('assets/gambar_paket_undang/'.$pu['gambar']); ?>" width="150px"></td>
            </tr>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
  </div>
</div>
<?php endforeach; ?>