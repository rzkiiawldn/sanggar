<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

  <div class="row">
    <div class="col-lg-12">
      <?= $this->session->flashdata('message'); ?>
    </div>
  </div>

  <div class="card mb-3 col-lg-12">
    <div class="row no-gutters">
        <div class="col-md-3 mt-3">
          <img src="<?= base_url('assets/img/sanggar/profile/') . $user_sanggar['foto_sanggar']; ?>" class="card-img">
          <p class="card-text text-center"><small class="text-muted">Bergabung sejak <?= date('d F Y', $user_sanggar['date_created']); ?></small></p>
          <div id="mapid" style="height: 300px;"></div>
        </div>
        <div class="col-md-9">
          <div class="card-body">
            <table class="table">
              <tr>
                <th width="180px">Nama Sanggar</th>
                <td>: <?= $user_sanggar['nama_sanggar']; ?></td>
              </tr>
              <tr>
                <th width="180px">Nama Ketua</th>
                <td>: <?= $user_sanggar['nama_ketua']; ?></td>
              </tr>
              <tr>
                <th width="180px">Tipe Sanggar</th>
                <td>: <?php foreach ($tipe_sanggar as $ts): ?>
                    <?php if ($ts['id'] == $user_sanggar['tipe_sanggar_id']): ?>
                    <?= $ts['tipe_sanggar']; ?>
                    <?php endif ?>
                  <?php endforeach ?> 
                </td>
              </tr>
              <tr>
                <th width="180px">Email</th>
                <td>: <?= $user_sanggar['email']; ?></td>
              </tr>
              <tr>
                <th width="180px">Telepon</th>
                <td>: <?= $user_sanggar['nomor_telepon']; ?></td>
              </tr>
              <tr>
                <th width="180px">Tentang Sanggar</th>
                <td>: <?= $user_sanggar['deskripsi_seni']; ?></td>
              </tr>
              <tr>
                <th width="180px">Alamat Sanggar</th>
                <td>: <?= $user_sanggar['alamat']; ?></td>
              </tr>
            </table>            
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6"></div>
        <div class="col-md-6 mb-3">
          <a class="btn btn-warning float-right ml-2" href="<?= base_url('sanggar/profile/edit_password'); ?>">Edit Password</a>
          <a class="btn btn-success float-right" href="<?= base_url('sanggar/profile/edit'); ?>">Edit Profile</a>
        </div>
      </div>
  </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script>
var curLocation=[0,0];
if (curLocation[0]==0 && curLocation[1]==0) {
  curLocation =[<?= $user_sanggar['latitude']; ?>, <?= $user_sanggar['longitude']; ?>]; 
}

var mymap = L.map('mapid').setView([<?= $user_sanggar['latitude']; ?>, <?= $user_sanggar['longitude']; ?>], 14);
L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
      '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
      'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
      id: 'mapbox/streets-v11'
}).addTo(mymap);

mymap.attributionControl.setPrefix(false);
var marker = new L.marker(curLocation, {
  draggable:'true'
});

marker.on('dragend', function(event) {
var position = marker.getLatLng();
marker.setLatLng(position,{
  draggable : 'true'
  }).bindPopup(position).update();
  $("#Latitude").val(position.lat);
  $("#Longitude").val(position.lng).keyup();
});

$("#Latitude, #Longitude").change(function(){
  var position =[parseInt($("#Latitude").val()), parseInt($("#Longitude").val())];
  marker.setLatLng(position, {
  draggable : 'true'
  }).bindPopup(position).update();
  mymap.panTo(position);
});
mymap.addLayer(marker);

</script>


