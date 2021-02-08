<!-- Begin Page Content -->
<div class="container-fluid">
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Kelola Paket Kelas</h1>
<div class="row my-3">
	<div class="col-md-5">    
		<button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#tambahKelasModal"><i class="fas fa-plus"></i> Tambah Kelas</button>
    <!-- <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#newTkModal">Tambah data User</button> -->
  </div>
  <div class="col-md-7">
      <div class="custom-control custom-switch float-right">
          <?php if ($user_sanggar['pendaftaran'] == 1): ?>

          <input type="checkbox" class="custom-control-input custom-pendaftaran" id="customSwitch1" <?= check_access_tutup_pendaftaran($user_sanggar['pendaftaran'], $this->session->userdata('id_sanggar')); ?> name="pendaftaran" data-pendaftaran="0" data-sanggar="<?= $this->session->userdata('id_sanggar'); ?>">
          <label class="custom-control-label" for="customSwitch1">Tutup Pendaftaran</label>

          <?php else: ?>

          <input type="checkbox" class="custom-control-input custom-pendaftaran" id="customSwitch1" <?= check_access_buka_pendaftaran($user_sanggar['pendaftaran'], $this->session->userdata('id_sanggar')); ?> name="pendaftaran" data-pendaftaran="1" data-sanggar="<?= $this->session->userdata('id_sanggar'); ?>">
          <label class="custom-control-label" for="customSwitch1">Buka Pendaftaran</label>

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
          <th>Nama Kelas</th>
          <th>Batas Usia</th>
          <th>Deskripsi Kelas</th>
          <th>Foto Kelas</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        foreach ($kelas_id as $k) :
        ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><?= $k['nama_kelas']; ?></td>
          <td><?= $k['umur']; ?></td>
          <td><?= $k['deskripsi_kelas'];?></td>
          <td><img src="<?= base_url(); ?>assets/gambar_paket_kelas/<?= $k['gambar']; ?>" width="80px"></td>
          <td class="text-right">
          	<a href="#" class="badge badge-success" data-toggle="modal" data-target="#editKelasModal<?= $k['id']; ?>"><i class="fas fa-edit"></i></a>
          	<a href="<?= base_url(); ?>sanggar/kelas/hapus_kelas/<?= $k['id']; ?>" class="badge badge-danger" onclick="return confirm('Yakin ?');"><i class="fas fa-fw fa-trash"></i></a>
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
<div class="modal fade" id="tambahKelasModal" tabindex="-1" role="dialog" aria-labelledby="tambahKelasModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahKelasModalLabel">Tambah Kelas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= form_open_multipart('sanggar/kelas/tambah_kelas'); ?>
        <div class="modal-body">
          <input type="hidden" name="id_sanggar" value="<?= $this->session->userdata('id_sanggar'); ?>">
          <div class="form-group">
            <label>Nama kelas</label>
            <input type="text" name="nama_kelas" class="form-control" value="<?= set_value('nama_kelas'); ?>">
          </div>
          <div class="form-group">
            <label>Batas usia</label>
            <select name="id_umur" class="form-control" required="">
              <option value="">-Pilih-</option>
              <?php foreach ($umur as $u): ?>
              <option value="<?= $u['id_umur']; ?>"><?= $u['umur']; ?></option>
              <?php endforeach ?>                
            </select>
          </div>
          <div class="form-group">
            <label>Deskripsi kelas</label>
            <textarea class="form-control" name="deskripsi_kelas" ></textarea>
          </div>
          <div class="form-group">
            <label>Foto kelas</label>
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
foreach($kelas_id as $k): $no++; ?>
<div class="modal fade" id="editKelasModal<?= $k['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editKelasModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editKelasModalLabel">Edit Kelas Sanggar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url(); ?>sanggar/kelas/proses_edit/<?= $k['id']; ?>" method="post" enctype="multipart/form-data"> 
        <input type="hidden" name="id" value="<?= $k['id']; ?>">
        <div class="modal-body">
          <div class="form-group">
            <input type="text" name="nama_kelas" class="form-control" value="<?= $k['nama_kelas']; ?>">
          </div>
          <div class="form-group">
            <select name="id_umur" class="form-control" required="">
              <?php foreach ($umur as $u): ?>
              <?php if ($u['id_umur'] == $k['id_umur']): ?>
              <option value="<?= $u['id_umur']; ?>" selected><?= $u['umur']; ?></option>                  
              <?php endif ?>
              <option value="<?= $u['id_umur']; ?>"><?= $u['umur']; ?></option>
              <?php endforeach ?>                
            </select>
          </div>
          <div class="form-group">
            <textarea name="deskripsi_kelas" class="form-control"><?= $k['deskripsi_kelas']; ?></textarea>
          </div>
          <label>Gambar</label>
              <div class="row">
                <div class="col-sm-3">
                  <img src="<?= base_url('assets/gambar_paket_kelas/') . $k['gambar']; ?>" class="img-thumbnail">
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