<!-- Begin Page Content -->
<div class="container-fluid">
<?= $this->session->flashdata('message'); ?>
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

<!-- <?php foreach($user as $u): ?>
<?php if($u['is_active']==1){ ?>
<button type="submit" class="btn btn-success">Pendaftaran dibuka</button>
<?php }else{?>
<button type="submit" class="btn btn-danger">Pendaftaran diTutup</button>
<?php } ?>
<?php endforeach; ?> -->

<div class="row mt-4">
<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-4 col-md-6 mb-4">
  <div class="card border-left-success shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Pendaftar Sanggar</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_pendaftar; ?></div>
        </div>
        <div class="col-auto">
          <a href="<?= base_url(); ?>sanggar/pendaftar/index"><i class="fas fa-home fa-2x text-gray-300"></i></a>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="col-xl-4 col-md-6 mb-4">
  <div class="card border-left-primary shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><a href="<?= base_url(); ?>sanggar/penyewa/index">Total Penyewa Atribut</a></div>
          <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_penyewa; ?></div>
        </div>
        <div class="col-auto">
          <a href="<?= base_url(); ?>sanggar/penyewa/index"><i class="fas fa-home fa-2x text-gray-300"></i></a>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="col-xl-4 col-md-6 mb-4">
  <div class="card border-left-primary shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><a href="<?= base_url(); ?>sanggar/undang/index">Total Pengundang Acara</a></div>
          <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_pengundang; ?></div>
        </div>
        <div class="col-auto">
          <a href="<?= base_url(); ?>sanggar/undang/index"><i class="fas fa-home fa-2x text-gray-300"></i></a>
        </div>
      </div>
    </div>
  </div>
</div>

</div>

              <!-- Bar Chart -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Total Pengunjung <?= $user_sanggar['nama_sanggar']; ?></h6>
    </div>
    <div class="card-body">
      <div class="chart-area">
        <canvas id="myAreaChart">
        </canvas>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->






