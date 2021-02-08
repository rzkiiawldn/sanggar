<!-- Begin Page Content -->
<div class="container-fluid">
<?= $this->session->flashdata('message'); ?>
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

<div class="row">
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-primary shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Member</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_user; ?></div>
        </div>
        <div class="col-auto">
          <a href="<?= base_url(); ?>administrator/user/index"><i class="fas fa-user fa-2x text-gray-300"></i></a>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-success shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Sanggar</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_sanggar; ?></div>
        </div>
        <div class="col-auto">
          <a href="<?= base_url(); ?>administrator/sanggar/index"><i class="fas fa-school fa-2x text-gray-300"></i></a>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-danger shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Total Pendaftar Sanggar</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_pendaftar; ?></div>
        </div>
        <div class="col-auto">
          <a href="<?= base_url(); ?>administrator/pendaftar/index"><i class="fas fa-users fa-2x text-gray-300"></i></a>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-warning shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Penyewaan Atribut</a></div>
          <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_penyewa; ?></div>
        </div>
        <div class="col-auto">
          <a href="<?= base_url(); ?>administrator/penyewa/index"><i class="fas fa-chart-bar fa-2x text-gray-300"></i></a>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-warning shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Undang Acara</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_pengundang; ?></div>
        </div>
        <div class="col-auto">
          <a href="<?= base_url(); ?>administrator/undang/index"><i class="fab fa-opencart fa-2x text-gray-300"></i></a>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-success shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Berita</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_berita; ?></div>
        </div>
        <div class="col-auto">
          <a href="<?= base_url(); ?>administrator/berita/index"><i class="fas fa-newspaper fa-2x text-gray-300"></i></a>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-primary shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Event</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_event; ?></div>
        </div>
        <div class="col-auto">
          <a href="<?= base_url(); ?>administrator/event/index"><i class="fas fa-calendar-alt fa-2x text-gray-300"></i></a>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-danger shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Total Pengunjung</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_transaksi; ?></div>
        </div>
        <div class="col-auto">
          <a><i class="fas fa-calendar-alt fa-2x text-gray-300"></i></a>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Data Sanggar</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="myAreaChart">
                    </canvas>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pie Chart -->
<!--             <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Tipe Sanggar</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
                  </div>
                  <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> Tari
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> Teater
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-info"></i> Musik
                    </span>
                  </div>
                </div>
              </div>
            </div> -->
          </div>

</div>

<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

