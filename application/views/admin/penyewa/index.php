<!-- Begin Page Content -->
<div class="container-fluid">
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Data Penyewa</h1>
<div class="row my-3">
	<div class="col-5">    
		<!-- <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#newPenyewaModal"><i class="fas fa-plus"></i> Tambah Penyewa</button> -->
	<a href="<?= base_url(); ?>administrator/penyewa/cetak_data" target="_blank" class="btn btn-primary"><i class="fas fa-fw fa-print"></i> Cetak Data Penyewa</a>
    <!-- <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#newTkModal">Tambah data User</button> -->
  </div>
  <div class="col-7">
    <a href="#" class="btn btn-info btn-icon-split float-right">
      <span class="icon text-white-50">
        <i class="fas fa-chart-bar"></i>
      </span>
      <span class="text">Total penyewa : <?= $total_penyewa; ?></span>
    </a>
   <!--  <a href="#" class="btn btn-warning btn-icon-split float-right mr-2">
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
          <th>Kode</th>
          <th>Nama Penyewa</th>
          <th>Jenis Atribut</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($penyewa as $p): ?>
        <tr>
          <td><?= $p['kode_sewa']; ?></td>
          <td><?= $p['nama']; ?></td>
          <td><?= $p['jenis_atribut']; ?></td>
          <td style="color:white">
            <?php if($p['status_sewa']==2): ?>
                <a class="badge badge-success">Selesai</a>
            <?php elseif($p['status_sewa']==1): ?>
              <a class="badge badge-warning">Diproses</a>
            <?php else:?>
              <a class="badge badge-info">Belum bayar</a>
            <?php endif; ?>
          <td class="text-right">
            <a href="<?= base_url(); ?>administrator/penyewa/detail/<?= $p['kode_sewa']; ?>" class="badge badge-primary"><!-- <i class="fas fa-fw fa-eye"></i> -->Detail</a>
            <!-- <a href="<?= base_url(); ?>administrator/penyewa/edit_penyewa/<?= $p['kode_sewa']; ?>" class="badge badge-success"><i class="fas fa-fw fa-edit"></i></a> -->
            <a href="<?= base_url(); ?>administrator/penyewa/hapus_penyewa/<?= $p['kode_sewa']; ?>" class="badge badge-danger" onclick="return confirm('Yakin ?');"><!-- <i class="fas fa-fw fa-trash"></i> -->Hapus</a>
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
<div class="modal fade" id="newPenyewaModal" tabindex="-1" role="dialog" aria-labelledby="newPenyewaModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newPenyewaModalLabel">Tambah Penyewa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url('administrator/penyewa/tambah_penyewa'); ?>">
        <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Kode Sewa</label>
              <input type="text" name="kode_sewa" class="form-control" value="KS-<?= sprintf("%03s", $kode_penyewa) ?>" readonly>
            </div>
          </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Nama Penyewa</label>
            <select class="form-control" id="user_id" value="<?= set_value('user_id'); ?>" name="user_id" required>
              <option readonly>--Nama penyewa--</option>
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
            <label>Jenis Atribut Sanggar</label>
            <select class="form-control" id="mysewa" value="<?= set_value('atribut_id'); ?>" name="atribut_id" onchange="HargaSewa()" required>
              <option readonly>--Jenis atribut--</option>
              <?php foreach ($atribut_id as $a): ?>
              <option value="<?= $a['id']; ?>"><?= $a['jenis_atribut']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
              <label>Harga Sewa Atribut</label>
              <input type="text" name="biaya_sewa" class="form-control" id="harga_sewa" readonly required="">
            </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
              <label>Lama Sewa</label>
              <small>( Max 1 minggu )</small>
              <select class="form-control" id="mySelect" value="<?= set_value('lama_sewa'); ?>" name="lama_sewa" onchange="myFunction()">
                <option readonly><b>--Lama sewa--</option>
                <?php for ($i=1; $i<=7; $i++): ?>
                  <option value="<?=$i?>"><b><?=$i?> Hari</b></option>
                <?php endfor; ?>
              </select>
            </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
              <label>Tanggal Sewa</label>
              <input type="text" name="tanggal_sewa" class="form-control" placeholder="<?= date('d F Y'); ?>" readonly>
            </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
              <label>Total Biaya Sewa</label>
              <input type="text" name="biaya_sewa" class="form-control" id="demo" required="">
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

<!-- CEK STATUS -->
<?php
$no = 0;
foreach($penyewa as $p): $no++; ?>
<div class="modal fade" id="cekStatusModal<?= $p['kode_sewa']; ?>" tabindex="-1" role="dialog" aria-labelledby="cekStatusModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cekStatusModalLabel">Cek Status</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url(); ?>administrator/penyewa/cek_status/<?= $p['kode_sewa']; ?>">
        <div class="modal-body">
          <div class="form-group">
            <input type="hidden" name="" value="<?= $p['kode_sewa']; ?>">
            <label>Kelola status penyewaan</label>
            <select class="form-control" value="<?= $p['status']; ?>" name="status">
              <?php foreach ($status as $s): ?>
              <?php if($s['id'] == $p['status']) : ?>
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
  document.getElementById("demo").value = "<?= $a['harga_sewa']; ?>"*x;
}

function HargaSewa() {
  var x = document.getElementById("mysewa").value;
  document.getElementById("harga_sewa").value = "<?= $a['harga_sewa']; ?>" ;
}
</script>