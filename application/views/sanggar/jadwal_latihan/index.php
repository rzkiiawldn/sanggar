<!-- Begin Page Content -->
<div class="container-fluid">
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Kelola Jadwal Latihan</h1>
<div class="row my-3">
	<div class="col-md-5">    
		<button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#tambahJadwalModal"><i class="fas fa-plus"></i> Tambah Jadwal Latihan</button>
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
          <th>Judul Latihan</th>
          <th>Nama Kelas</th>
          <th>Hari Latihan</th>
          <th>Jam Latihan</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        foreach ($jadwal_latihan as $j) :
        ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><?= $j['judul_latihan']; ?></td>
          <td><?= $j['nama_kelas']; ?></td>
          <td><?= $j['jadwal'];?></td>
          <td><?= $j['jam_latihan']; ?> WIB</td>
          <td class="text-right">
          	<a href="#" class="badge badge-success" data-toggle="modal" data-target="#editKelasModal<?= $j['id_jadwal_latihan']; ?>"><i class="fas fa-edit"></i></a>
          	<a href="<?= base_url(); ?>sanggar/latihan/hapus_jadwal_latihan/<?= $j['id_jadwal_latihan']; ?>" class="badge badge-danger" onclick="return confirm('Yakin ?');"><i class="fas fa-fw fa-trash"></i></a>
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
<div class="modal fade" id="tambahJadwalModal" tabindex="-1" role="dialog" aria-labelledby="tambahJadwalModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahJadwalModalLabel">Tambah Jadwal Latihan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url('sanggar/latihan/tambah_jadwal_latihan'); ?>">
        <div class="modal-body">
          <input type="hidden" name="id_sanggar" value="<?= $this->session->userdata('id_sanggar'); ?>">
          <div class="form-group">
            <label>Judul Latihan</label>
            <input type="text" name="judul_latihan" class="form-control" value="<?= set_value('judul_latihan'); ?>">
          </div>
          <div class="form-group">
            <label>Kelas</label>
            <select class="form-control" value="<?= set_value('id_kelas'); ?>" name="id_kelas">
              <option>--pilih kelas--</option>
              <?php foreach ($kelas as $k): ?>
              <option value="<?= $k['id']; ?>"><?= $k['nama_kelas']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label>Hari Latihan</label>
            <select class="form-control" value="<?= set_value('id_jadwal'); ?>" name="id_jadwal">
              <option>--pilih hari--</option>
              <?php foreach($hari as $h): ?>
              <option value="<?= $h['id_jadwal']; ?>"><?= $h['jadwal']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label>Jam Latihan</label>
            <input type="time" name="jam_latihan" class="form-control">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php
$no = 0;
foreach($jadwal_latihan as $j): $no++; ?>
<div class="modal fade" id="editKelasModal<?= $j['id_jadwal_latihan']; ?>" tabindex="-1" role="dialog" aria-labelledby="editKelasModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editKelasModalLabel">Edit Jadwal Latihan Sanggar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url(); ?>sanggar/latihan/proses_edit/<?= $j['id_jadwal_latihan']; ?>" method="post"> 
        <input type="hidden" name="id" value="<?= $j['id_jadwal_latihan']; ?>">
        <div class="modal-body">
          <div class="form-group">
            <input type="text" name="judul_latihan" class="form-control" value="<?= $j['judul_latihan']; ?>">
          </div>
          <div class="form-group">
            <select class="form-control" name="id_kelas">
              <?php foreach ($kelas as $k): ?>
              <?php if($k['id'] == $j['id_kelas']) : ?>
              <option value="<?= $k['id']; ?>" selected><?= $k['nama_kelas']; ?></option>
              <?php else: ?>
              <option value="<?= $k['id']; ?>"><?= $k['nama_kelas']; ?></option>
              <?php endif; ?>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label>Hari Latihan</label>
            <select class="form-control" name="id_jadwal">
              <option>--pilih hari--</option>
              <?php foreach($hari as $h): ?>
              <?php if($h['id_jadwal'] == $j['id_jadwal']): ?>
              <option value="<?= $h['id_jadwal']; ?>" selected><?= $h['jadwal']; ?></option>
              <?php else: ?>
              <option value="<?= $h['id_jadwal']; ?>"><?= $h['jadwal']; ?></option>
              <?php endif; ?>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <input type="time" name="jam_latihan" class="form-control" value="<?= $j['jam_latihan']; ?>">
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