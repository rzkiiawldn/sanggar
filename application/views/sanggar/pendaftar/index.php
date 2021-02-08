<div class="container-fluid">
<h1 class="h3 mb-4 text-gray-800">Data Pendaftar</h1>
<div class="row my-3">
  <div class="col-md-5">
    <!-- <a href= class="btn btn-primary"><i class="fas fa-fw fa-print"></i> Cetak Data Pendaftar</a> -->
    <!-- Example split danger button -->
    <div class="btn-group">
      <button type="button" class="btn btn-primary">Cetak data</button>
      <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="sr-only">Toggle Dropdown</span>
      </button>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="<?= base_url(); ?>sanggar/pendaftar/cetak_pendaftar/<?= $user_sanggar['id_sanggar']; ?>" target="_blank">Cetak seluruh data</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#cetakdata">cetak data pertanggal</a>
      </div>
    </div>
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

<div class="card shadow mb-4">
<div class="card-body">
  <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th>Kode</th>
          <th>Nama Pendaftar</th>
          <th>Pilihan Kelas</th>
          <th>Tanggal Pendaftaran</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($pendaftaran as $pen) :
        ?>
        <tr>
          <td><?= $pen['kode_pendaftaran']; ?></td>
          <td><?= $pen['nama']; ?></td>
          <td><?= $pen['nama_kelas']; ?></td>
          <td><?= date('d F Y',strtotime($pen['tanggal_pendaftaran'])); ?></td>
          <td style="color:white">
            <?php if($pen['status_pendaftaran']==2) { ?>
                <a href="#" class="badge badge-danger">Diterima</a>
            <?php } else { ?>
                <a href="#" class="badge badge-warning">Menunggu</a>
            <?php } ?>
          <td class="text-center">
            <a href="<?= base_url(); ?>sanggar/pendaftar/detail_pendaftar/<?= $pen['kode_pendaftaran']; ?>" class="btn btn-circle btn-sm btn-primary"><i class="fas fa-fw fa-eye"></i></a>
            <a href="<?= base_url(); ?>sanggar/pendaftar/hapus_pendaftar/<?= $pen['kode_pendaftaran']; ?>" class="btn btn-circle btn-sm btn-danger" onclick="return confirm('Yakin ?');"><i class="fas fa-fw fa-trash"></i></a>
          </td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
</div>
</div>
</div>

<!-- Modal Add -->
<div class="modal fade" id="newPendaftarModal" tabindex="-1" role="dialog" aria-labelledby="newPendaftarModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newPendaftarModalLabel">Tambah Data Pendaftar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url('sanggar/pendaftar/tambah_pendaftar'); ?>">
        <div class="modal-body">
          <div class="form-group">
            <input type="text" name="kode_pendaftaran" class="form-control" value="KP-<?= sprintf("%03s", $kode_pendaftar) ?>" readonly>
          </div>
          <div class="form-group">
            <label>Member</label>
            <select class="form-control" id="id_user" value="<?= set_value('id_user'); ?>" name="id_user" required>
              <option value="">-Pilih-</option>
              <?php foreach ($tb_user as $p): ?>
              <option value="<?= $p['id']; ?>"><?= $p['nama']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <input type="hidden" name="id_sanggar" value="<?= $this->session->userdata('id_sanggar'); ?>" class="form-control" readonly>
          </div>
          <div class="form-group">
          <label>Kelas Saya</label>
            <select class="form-control" id="id_kelas" value="<?= set_value('id_kelas'); ?>" name="id_kelas" required>
              <option value="">-Pilih-</option>
              <?php foreach ($tb_kelas as $k): ?>
              <option value="<?= $k['id']; ?>"><?= $k['nama_kelas']; ?></option>
              <?php endforeach; ?>
            </select>
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

<!-- Cetak Add -->
<div class="modal fade" id="cetakdata" tabindex="-1" role="dialog" aria-labelledby="cetakdataLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cetakdataLabel">Cetak Data Pendaftar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url('sanggar/pendaftar/filter/'.$user_sanggar['id_sanggar']); ?>" target="_blank">
        <div class="modal-body">
          <input type="hidden" name="id_sanggar" value="<?= $user_sanggar['id_sanggar']; ?>">
            <div class="form-group">
              <label>Tanggal Awal</label>
              <input type="date" name="tanggalawal" required="" class="form-control">
            </div>
            <div class="form-group">
              <label>Tanggal Akhir</label>
              <input type="date" name="tanggalakhir" required="" class="form-control">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="tambah">Cetak</button>
        </div>
      </form>
    </div>
  </div>
</div>


<!-- Modal EDIT -->
<!-- <?php
$no = 0;
foreach($pendaftaran as $pen): $no++; ?>
<div class="modal fade" id="editPendaftarModal<?= $pen['kode_pendaftaran']; ?>" tabindex="-1" role="dialog" aria-labelledby="editPendaftarModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editPendaftarModalLabel">Edit Data Pendaftar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url('sanggar/pendaftar/edit_pendaftar'); ?>">
        <div class="modal-body">
          <div class="form-group">
            <input type="text" name="kode_pendaftaran" class="form-control" value="<?= $pen['kode_pendaftaran']; ?>" readonly>
          </div>
          <div class="form-group">
            <label>Member</label>
            <select class="form-control" id="id_user" name="id_user">
              <?php foreach ($tb_user as $p): ?>
              <?php if ($p['id'] == $pen['id_user']): ?>
              <option value="<?= $p['id']; ?>" selected><?= $p['nama']; ?></option>                
              <?php endif ?>
              <option value="<?= $p['id']; ?>"><?= $p['nama']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <input type="hidden" name="id_sanggar" value="<?= $this->session->userdata('id_sanggar'); ?>" class="form-control" readonly>
          </div>
          <div class="form-group">
          <label>Kelas Saya</label>
            <select class="form-control" id="id_kelas" value="<?= set_value('id_kelas'); ?>" name="id_kelas">
              <?php foreach ($tb_kelas as $k): ?>
              <?php if ($k['id'] == $pen['id_kelas']): ?>
              <option value="<?= $k['id']; ?>" selected><?= $k['nama_kelas']; ?></option>
              <?php endif ?>
              <option value="<?= $k['id']; ?>"><?= $k['nama_kelas']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="edit">Edit</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach; ?> -->

<!-- CEK STATUS -->
<?php
$no = 0;
foreach($pendaftaran as $pen): $no++; ?>
<div class="modal fade" id="cekStatusModal<?= $pen['kode_pendaftaran']; ?>" tabindex="-1" role="dialog" aria-labelledby="cekStatusModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cekStatusModalLabel">Cek Status</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url(); ?>sanggar/pendaftar/cek_status/<?= $pen['kode_pendaftaran']; ?>">
        <div class="modal-body">
          <div class="form-group">
            <input type="hidden" name="" value="<?= $pen['kode_pendaftaran']; ?>">
            <label>Kelola status pendaftar</label>
            <select class="form-control" value="<?= $pen['status']; ?>" name="status">
              <?php foreach ($status as $s): ?>
              <?php if($s['id'] == $pen['status']) : ?>
              <option value="<?= $s['id']; ?>" selected><?= $s['status']; ?></option>
              <?php else : ?>
              <option value="<?= $s['id']; ?>"><?= $s['status']; ?></option>
              <?php endif; ?>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary" name="tambah">Ubah</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach; ?>