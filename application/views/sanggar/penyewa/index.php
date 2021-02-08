<!-- Begin Page Content -->
<div class="container-fluid">
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Data Penyewa</h1>
<div class="row my-3">
  <div class="col-md-5">    
    <!-- <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#newPenyewaModal"><i class="fas fa-plus"></i> Tambah Penyewa</button> -->
    <div class="btn-group">
      <button type="button" class="btn btn-primary">Cetak data</button>
      <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="sr-only">Toggle Dropdown</span>
      </button>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="<?= base_url(); ?>sanggar/penyewa/cetak_penyewa/<?= $user_sanggar['id_sanggar']; ?>" target="_blank">Cetak seluruh data</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#cetakdata">cetak data pertanggal</a>
      </div>
    </div>
  </div>
<!--   <div class="col-md-7">
    <a href="#" class="btn btn-info btn-icon-split float-right">
      <span class="icon text-white-50">
        <i class="fas fa-chart-bar"></i>
      </span>
      <span class="text">Total penyewa : <?= $total_penyewa; ?></span>
    </a>
    <a href="#" class="btn btn-warning btn-icon-split float-right mr-2">
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
    </a>
  </div> -->
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
          <th>Kode</th>
          <th>Nama Penyewa</th>
          <th>Jenis Atribut</th>
          <th>Total Harga</th>
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
          <td>Rp <?= number_format($p['harga_sewa'],0,',','.'); ?></td>
          <td style="color:white">
            <?php if($p['status_sewa']==2){ ?>
                <a href="#" class="badge badge-danger" >Selesai</a>
            <?php }elseif($p['status_sewa']==1){?>
                <a href="#" class="badge badge-success" >Transaksi diterima</a>
            <?php }else{?>
                <a href="#" class="badge badge-warning" >Belum bayar</a>
            <?php } ?>
          <td class="text-center">
            <a href="<?= base_url(); ?>sanggar/penyewa/detail_penyewa/<?= $p['kode_sewa']; ?>" class="btn btn-circle btn-sm btn-primary"><i class="fas fa-fw fa-eye"></i></a>
            <!-- <a href="<?= base_url(); ?>sanggar/penyewa/edit_penyewa/<?= $p['kode_sewa']; ?>" class="btn btn-circle btn-sm btn-success"><i class="fas fa-fw fa-edit"></i></a> -->
            <a href="<?= base_url(); ?>sanggar/penyewa/hapus_penyewa/<?= $p['kode_sewa']; ?>" class="btn btn-circle btn-sm btn-danger" onclick="return confirm('Yakin ?');"><i class="fas fa-fw fa-trash"></i></a>
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
      <form method="post" action="<?= base_url('sanggar/penyewa/tambah_penyewa'); ?>">
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
            <select class="form-control" id="id_user" value="<?= set_value('id_user'); ?>" name="id_user" required>
              <option readonly>--Nama penyewa--</option>
              <?php foreach ($tb_user as $p): ?>
              <option value="<?= $p['id']; ?>"><?= $p['nama']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
          <div class="form-group">
            <input type="hidden" name="user_sanggar_id" class="form-control" value="<?= $this->session->userdata('id_sanggar'); ?>">
          </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Jenis Atribut Sanggar</label>
            <select class="form-control" id="mysewa" value="<?= set_value('id_atribut'); ?>" name="id_atribut" onchange="HargaSewa()" required>
              <option readonly>--Jenis atribut--</option>
              <?php foreach ($tb_atribut as $a): ?>
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
              <input type="hidden" name="tanggal_sewa" class="form-control" placeholder="<?= date('d F Y'); ?>" readonly>
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
      <form method="post" action="<?= base_url(); ?>sanggar/penyewa/cek_status/<?= $p['kode_sewa']; ?>">
        <div class="modal-body">
          <div class="form-group">
            <input type="hidden" name="" value="<?= $p['kode_sewa']; ?>">
            <label>Kelola status penyewaan</label>
            <select class="form-control" value="<?= $p['status_sewa']; ?>" name="status_sewa">
              <?php foreach ($status as $s): ?>
              <?php if($s['id'] == $p['status_sewa']) : ?>
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
        <h5 class="modal-title" id="cetakdataLabel">Cetak Data penyewa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url('sanggar/penyewa/filter/'.$user_sanggar['id_sanggar']); ?>" target="_blank">
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
  document.getElementById("demo").value = "<?= $a['harga_sewa']; ?>"*x;
}

function HargaSewa() {
  var x = document.getElementById("mysewa").value;
  document.getElementById("harga_sewa").value = "<?= $a['harga_sewa']; ?>" ;
}
</script>