<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Data Undang</h1>
<div class="row my-3">
	<div class="col-md-5">    
		<!-- <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#newUndangModal"><i class="fas fa-plus"></i> Tambah data Undang</button> -->
    <div class="btn-group">
      <button type="button" class="btn btn-primary">Cetak data</button>
      <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="sr-only">Toggle Dropdown</span>
      </button>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="<?= base_url(); ?>sanggar/undang/cetak_pengundang/<?= $user_sanggar['id_sanggar']; ?>" target="_blank">Cetak seluruh data</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#cetakdata">cetak data pertanggal</a>
      </div>
    </div>
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

  <!-- <div class="col-md-7"> -->
  <!--   <a href="#" class="btn btn-info btn-icon-split float-right">
      <span class="icon text-white-50">
        <i class="fab fa-opencart"></i>
      </span>
      <span class="text">Total undang : <?= $total_undang; ?></span>
    </a> -->
<!--     <a href="#" class="btn btn-warning btn-icon-split float-right mr-2">
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
<!--   </div>
</div> -->
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
          <th>Tanggal Acara</th>
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
          <td><?= date('d F Y', strtotime($u['tanggal_acara'])); ?></td>
          <td style="color:white">
            <?php if($u['status_undang']==2){ ?>
                <a href="#" class="badge badge-danger">Selesai</a>
            <?php }elseif($u['status_undang']==1){?>
                <a href="#" class="badge badge-success">Transaksi diterima</a>
            <?php }else{?>
                <a href="#" class="badge badge-warning">Belum bayar</a>
            <?php } ?>
          </td>
          <td class="text-right">
          	<a href="<?= base_url(); ?>sanggar/undang/detail_pengundang/<?= $u['kode_undang']; ?>" class="btn btn-circle btn-sm btn-primary"><i class="fas fa-fw fa-eye"></i></a>
          	<!-- <a href="<?= base_url(); ?>sanggar/undang/edit_pengundang/<?= $u['kode_undang']; ?>" class="btn btn-circle btn-sm btn-success"><i class="fas fa-fw fa-edit"></i></a> -->
          	<a href="<?= base_url(); ?>sanggar/undang/hapus_pengundang/<?= $u['kode_undang']; ?>" class="btn btn-circle btn-sm btn-danger" onclick="return confirm('Yakin ?');"><i class="fas fa-fw fa-trash"></i></a>
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
      <form method="post" action="<?= base_url('sanggar/undang/tambah_pengundang'); ?>">
        <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Kode Undang</label>
              <input type="text" name="kode_undang" class="form-control" value="KU-<?= sprintf("%03s", $kode_undang) ?>" readonly>
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
        <input type="hidden" name="user_sanggar_id" class="form-control" value="<?= $this->session->userdata('id_sanggar'); ?>">
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
      <form method="post" action="<?= base_url(); ?>sanggar/undang/cek_status/<?= $u['kode_undang']; ?>">
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


<!-- Cetak Add -->
<div class="modal fade" id="cetakdata" tabindex="-1" role="dialog" aria-labelledby="cetakdataLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cetakdataLabel">Cetak Data pengundang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url('sanggar/undang/filter/'.$user_sanggar['id_sanggar']); ?>" target="_blank">
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