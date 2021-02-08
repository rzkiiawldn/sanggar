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
</div>

<div class="row">
  <div class="col">
    <div id="mapid" style="height: 500px;"></div>
  </div>
</div>

</div>

<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script>
  navigator.geolocation.getCurrentPosition(function(location) {
    var latlng = new L.LatLng(location.coords.latitude, location.coords.longitude);

    console.log(location.coords.latitude, location.coords.longitude);

    var mymap = L.map('mapid').setView([-6.167662554809015, 106.76348441097255], 14);

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
      maxZoom: 18,
      attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
        '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
        'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
      id: 'mapbox/streets-v11',
      tileSize: 512,
      zoomOffset: -1
    }).addTo(mymap);

    // var icon_sanggar = L.icon({
    //   iconUrl : '<?= base_url('assets/img') ?>',
    //   iconSize : [45,50], 
    // });

    <?php foreach($sanggar as $s){ ?>
    L.marker([<?= $s['latitude']; ?> , <?= $s['longitude']; ?>]).addTo(mymap)
    .bindPopup(
      "<b>Nama Sanggar : <?= $s['nama_sanggar']; ?></b></br>"+
      "<b>Tipe Sanggar : <?= $s['tipe_sanggar']; ?></b></br>"+
      // "<a href='' class='btn btn-sm btn-primary'>Detail</a>" +
      "<a href='https://www.google.com/maps/dir/?api=1&origin=" + 
      location.coords.latitude + "," + location.coords.longitude + 
      "&destination=<?= $s['latitude'] ?>,<?= $s['longitude'] ?>' class='btn btn-sm btn-info' target='_blank'> Rute </a>"
      );
    <?php } ?>

    });

  
</script>
