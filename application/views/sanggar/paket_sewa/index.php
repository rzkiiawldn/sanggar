<!-- Begin Page Content -->
<div class="container-fluid">
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Kelola Paket Sewa</h1>
<div class="row my-3">
	<div class="col-md-5">    
		<button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#newPendaftarModal"><i class="fas fa-plus"></i> Tambah Paket</button>
    <!-- <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#newTkModal">Tambah data User</button> -->
  </div>
  <div class="col-md-7">
      <div class="custom-control custom-switch float-right">
        <?php if ($user_sanggar['penyewaan'] == 1): ?>

          <input type="checkbox" class="custom-control-input custom-penyewaan" id="customSwitch1" <?= check_access_tutup_penyewaan($user_sanggar['penyewaan'], $this->session->userdata('id_sanggar')); ?> name="penyewaan" data-penyewaan="0" data-sanggar="<?= $this->session->userdata('id_sanggar'); ?>">
          <label class="custom-control-label" for="customSwitch1">Tutup penyewaan</label>

          <?php else: ?>

          <input type="checkbox" class="custom-control-input custom-penyewaan" id="customSwitch1" <?= check_access_buka_penyewaan($user_sanggar['penyewaan'], $this->session->userdata('id_sanggar')); ?> name="penyewaan" data-penyewaan="1" data-sanggar="<?= $this->session->userdata('id_sanggar'); ?>">
          <label class="custom-control-label" for="customSwitch1">Buka penyewaan</label>

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
          <th>Jenis Atribut</th>
          <th>Nama Atribut</th>
          <th>Keterangan</th>
          <th>Harga Sewa/hari</th>
          <th>Foto Atribut</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
      	<?php 
      	$no = 1;
      	foreach ($paket_sewa as $ps) :
      	 ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><?= $ps['jenis_atribut']; ?></td>
          <td><?= $ps['nama_atribut']; ?></td>
          <td><?= word_limiter($ps['keterangan_atribut'], 20); ?></td>
          <td>Rp. <?= $ps['harga']; ?></td>
          <td><img src="<?= base_url(); ?>assets/gambar_paket_sewa/<?= $ps['gambar']; ?>" width="80px"></td>
          <td class="text-right">
            <a href="#" class="badge badge-primary" data-toggle="modal" data-target="#detailPaketSewaModal<?= $ps['id']; ?>"><i class="fas fa-eye"></i></a>
          	<a href="#" class="badge badge-success" data-toggle="modal" data-target="#editPaketSewaModal<?= $ps['id']; ?>"><i class="fas fa-edit"></i></a>
          	<a href="<?= base_url(); ?>sanggar/paket_sewa/hapus_paket_sewa/<?= $ps['id']; ?>" class="badge badge-danger" onclick="return confirm('Yakin ?');"><i class="fas fa-fw fa-trash"></i></a>
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
<div class="modal fade" id="newPendaftarModal" tabindex="-1" role="dialog" aria-labelledby="newPendaftarModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newPendaftarModalLabel">Tambah Atribut sanggar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= form_open_multipart('sanggar/paket_sewa/tambah_paket_sewa'); ?>
        <div class="modal-body">
          <input type="hidden" name="id_sanggar" value="<?= $this->session->userdata('id_sanggar'); ?>">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Jenis Atribut</label>
                <input type="text" name="jenis_atribut" class="form-control" value="<?= set_value('jenis_atribut'); ?>">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Nama Atribut</label>
                <input type="text" name="nama_atribut" class="form-control" value="<?= set_value('nama_atribut'); ?>">
              </div>
            </div>
          </div>
          
          
          <div class="form-group">
            <label>Keterangan Atribut</label>
            <textarea class="form-control" name="keterangan_atribut"></textarea>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Harga Sewa/hari</label>
                <input type="number" name="harga" class="form-control" value="<?= set_value('harga'); ?>">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Denda Sewa/hari</label>
                <input type="number" name="denda" class="form-control" value="<?= set_value('denda'); ?>">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Foto Paket</label>
                <input type="file" name="gambar" class="form-control">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control">
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
foreach($paket_sewa as $ps): $no++; ?>
<div class="modal fade" id="editPaketSewaModal<?= $ps['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editPaketSewaModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editPaketSewaModalLabel">Edit Atribut sanggar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url(); ?>sanggar/paket_sewa/proses_edit/<?= $ps['id']; ?>" method="post" enctype="multipart/form-data"> 
        <input type="hidden" name="id" value="<?= $ps['id']; ?>">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Jenis Paket</label>
                <input type="text" name="jenis_atribut" class="form-control" value="<?= $ps['jenis_atribut']; ?>">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Nama Paket</label>
                <input type="text" name="nama_atribut" class="form-control" value="<?= $ps['nama_atribut']; ?>">
              </div>
            </div>
          </div>          
          
          <div class="form-group">
            <label>Keterangan Paket</label>
            <textarea class="form-control" name="keterangan_atribut"><?= $ps['keterangan_atribut']; ?></textarea>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Harga Paket/hari</label>
                <input type="text" name="harga" class="form-control" value="<?= $ps['harga']; ?>">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Denda Paket/hari</label>
                <input type="text" name="denda" class="form-control" value="<?= $ps['denda']; ?>">
              </div>
            </div>
          </div>


          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Gambar</label>
                <div class="row">
                  <div class="col-sm-3">
                    <img src="<?= base_url('assets/gambar_paket_sewa/') . $ps['gambar']; ?>" class="img-thumbnail">
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
            <div class="col-md-6">
              <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control" value="<?= $ps['status']; ?>">
                  <?php if ($ps['status'] == 1): ?>
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


<!-- DETAIL PAKET SEWA -->
<?php
$no = 0;
foreach($paket_sewa as $ps): $no++; ?>
<div class="modal fade" id="detailPaketSewaModal<?= $ps['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="detailPaketSewaModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailPaketSewaModalLabel">Detail Atribut Sanggar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> 
        <div class="modal-body">
          <table class="table">
            <tr>
              <th width="200px">Jenis Paket</th>
              <td>: <?= $ps['jenis_atribut']; ?></td>
            </tr>
            <tr>
              <th width="200px">Nama Paket</th>
              <td>: <?= $ps['nama_atribut']; ?></td>
            </tr>
            <tr>
              <th width="200px">Keterangan Paket</th>
              <td>: <?= $ps['keterangan_atribut']; ?></td>
            </tr>
            <tr>
              <th width="200px">Harga Sewa Paket</th>
              <td>: Rp. <?= number_format($ps['harga'],0,',','.'); ?></td>
            </tr>
            <tr>
              <th width="200px">Denda Paket/hari</th>
              <td>: Rp. <?= number_format($ps['denda'],0,',','.'); ?></td>
            </tr>
            <tr>
              <th width="200px">Status Paket</th>
              <td>: 
                <?php if ($ps['status'] == 1): ?>
                  <button class="btn btn-sm btn-success">Tersedia</button>
                <?php else: ?>
                  <button class="btn btn-sm btn-danger">Tidak tersedia</button>
                <?php endif ?>                  
              </td>
            </tr>
            <tr>
              <th width="200px">Foto Paket</th>
              <td>: <img src="<?= base_url('assets/gambar_paket_sewa/'.$ps['gambar']); ?>" width="150px"></td>
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