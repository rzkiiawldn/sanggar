<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Data Undang</h1>
<div class="row my-3">
	<div class="col-5">    
		<!-- <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#newUndangModal"><i class="fas fa-plus"></i> Tambah data Undang</button> -->
	<a href="<?= base_url(); ?>administrator/undang/cetak_data" target="_blank" class="btn btn-primary"><i class="fas fa-fw fa-print"></i> Cetak Data Undang</a>
    <!-- <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#newTkModal">Tambah data User</button> -->
  </div>
  <div class="col-7">
    <a href="#" class="btn btn-info btn-icon-split float-right">
      <span class="icon text-white-50">
        <i class="fab fa-opencart"></i>
      </span>
      <span class="text">Total undang : <?= $total_undang; ?></span>
    </a>
    <!-- <a href="#" class="btn btn-warning btn-icon-split float-right mr-2">
      <span class="icon text-white-50">
        <i class="fas fa-times"></i>
      </span>
      <span class="text">Diproses : <?= $diproses; ?></span>
    </a>
    <a href="#" class="btn btn-success btn-icon-split float-right mr-2">
      <span class="icon text-white-50">
        <i class="fas fa-check"></i>
      </span>
      <span class="text">Diterima : <?= $diterima; ?></span>
    </a> -->
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
          <th>Pengundang</th>
          <th>Paket</th>
          <th>Nama Sanggar</th>
          <!-- <th>Tanggal Acara</th> -->
          <th>Status</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($undang as $u): ?>
        <tr>
          <td><?= $u['kode_undang']; ?></td>
          <td><?= $u['nama']; ?></td>
          <td><?= $u['nama_paket']; ?></td>
          <td><?= $u['nama_sanggar']; ?></td>
          <!-- <td><?= date('d F Y', strtotime($u['tanggal_acara'])); ?></td> -->
          <td style="color:white">
            <?php if($u['status_undang']==2): ?>
                <a class="badge badge-success" >Selesai</a>
            <?php elseif($u['status_undang']==1): ?>
              <a class="badge badge-warning" >Diproses</a>
            <?php else:?>
              <a class="badge badge-info" >Belum bayar</a>
            <?php endif; ?>
          </td>
          <td class="text-right">
          	<a href="<?= base_url(); ?>administrator/undang/detail/<?= $u['kode_undang']; ?>" class="badge badge-primary"><!-- <i class="fas fa-fw fa-eye"></i> --> Detail</a>
          	<!-- <a href="<?= base_url(); ?>administrator/undang/edit_pengundang/<?= $u['kode_undang']; ?>" class="badge badge-success"><i class="fas fa-fw fa-edit"></i></a> -->
          	<a href="<?= base_url(); ?>administrator/undang/hapus_pengundang/<?= $u['kode_undang']; ?>" class="badge badge-danger" onclick="return confirm('Yakin ?');"><!-- <i class="fas fa-fw fa-trash"></i> -->Hapus</a>
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
<div class="modal fade" id="newUndangModal" tabindex="-1" role="dialog" aria-labelledby="newUndangModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newUndangModalLabel">Tambah Data Undang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url('administrator/undang/tambah_pengundang'); ?>">
        <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Kode Undang</label>
              <input type="text" name="kode_undang" class="form-control" value="KU-<?= sprintf("%03s", $kode_pengundang) ?>" readonly>
            </div>
          </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Nama Pengundang</label>
            <select class="form-control" id="user_id" value="<?= set_value('user_id'); ?>" name="user_id" required>
              <option readonly>--Nama pengundang--</option>
              <?php foreach ($user_id as $p): ?>
              <option value="<?= $p['id']; ?>"><?= $p['nama']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Nama Sanggar</label>
            <select class="form-control" id="user_sanggar_id" value="<?= set_value('user_sanggar_id'); ?>" name="user_sanggar_id" required>
              <option readonly>--Nama sanggar--</option>
              <?php foreach ($user_sanggar_id as $s): ?>
              <option value="<?= $s['id_sanggar']; ?>"><?= $s['nama_sanggar']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Jenis Paket Undang Sanggar</label>
            <select class="form-control" id="mypaket" value="<?= set_value('paket_undang_id'); ?>" name="paket_undang_id" onchange="HargaPaket()" required>
              <option readonly>--Jenis paket--</option>
              <?php foreach ($paket_undang_id as $a): ?>
              <option value="<?= $a['id']; ?>"><?= $a['nama_paket']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
              <label>Harga Sewa Paket</label>
              <input type="text" name="biaya_undang" class="form-control" id="harga_paket" readonly required="">
            </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
              <label>Durasi undang paket</label>
              <small>( Max 1 minggu )</small>
              <select class="form-control" id="mySelect" value="<?= set_value('lama_undang'); ?>" name="lama_undang" onchange="myFunction()">
                <option readonly><b>--Durasi undang--</option>
                <?php for ($i=1; $i<=7; $i++): ?>
                  <option value="<?=$i?>"><b><?=$i?> Hari</b></option>
                <?php endfor; ?>
              </select>
            </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
              <label>Untuk acara apa ?</label>
              <input type="text" name="nama_acara" class="form-control" required="">
            </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
              <label>Tanggal Acara</label>
              <input type="date" name="tanggal_acara" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
        </div>
        <div class="col-md-6">
          <div class="form-group">
              <label>Total Biaya Undang</label>
              <input type="text" name="biaya_undang" class="form-control" id="demo" required="" readonly="">
            </div>
        </div>
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
foreach($undang as $u): $no++; ?>
<div class="modal fade" id="cekStatusModal<?= $u['kode_undang']; ?>" tabindex="-1" role="dialog" aria-labelledby="cekStatusModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cekStatusModalLabel">Cek Status</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url(); ?>administrator/undang/cek_status/<?= $u['kode_undang']; ?>">
        <div class="modal-body">
          <div class="form-group">
            <input type="hidden" name="" value="<?= $u['kode_undang']; ?>">
            <label>Kelola status undang</label>
            <select class="form-control" value="<?= $u['status']; ?>" name="status">
              <?php foreach ($status as $s): ?>
              <?php if($s['id'] == $u['status']) : ?>
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

<script>
function myFunction() {
  var x = document.getElementById("mySelect").value;
  document.getElementById("demo").value = "<?= $a['harga_paket']; ?>"*x;
}

function HargaPaket() {
  var x = document.getElementById("mypaket").value;
  document.getElementById("harga_paket").value = "<?= $a['harga_paket']; ?>" ;
}
</script>