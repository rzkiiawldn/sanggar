<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

  <div class="row">
    <div class="col-lg-8">
      <?= $this->session->flashdata('message'); ?>
    </div>
  </div>

<?= form_open_multipart() ?>
  <div class="card mb-3 col-lg-12">

    <div class="row mt-3">
      <div class="col-md-6">
        <div class="form-group">
          <label>Email</label>
          <input type="text" name="email" class="form-control" value="<?= $user_sanggar['email']; ?>" readonly>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Nama Sanggar</label>
          <input type="text" name="nama_sanggar" class="form-control" value="<?= $user_sanggar['nama_sanggar']; ?>">
        </div>
      </div>
    </div>

    <div class="row mt-3">
      <div class="col-md-6">
        <div class="form-group">
          <label>Nama Ketua</label>
          <input type="text" name="nama_ketua" class="form-control" value="<?= $user_sanggar['nama_ketua']; ?>">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Telepon Sanggar</label>
          <input type="text" name="nomor_telepon" class="form-control" value="<?= $user_sanggar['nomor_telepon']; ?>">
        </div>
      </div>
    </div>
    
    <div class="row mt-3">
      <div class="col-md-6">
        <div class="form-group">
          <label>Tentang Sanggar</label>
          <textarea class="form-control" name="deskripsi_seni" style="height: 105px"><?= $user_sanggar['deskripsi_seni']; ?></textarea>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Alamat Sanggar</label>
          <textarea class="form-control" name="alamat" style="height: 105px"><?= $user_sanggar['alamat']; ?></textarea>
        </div>
      </div>
    </div>

    <div class="row mt-3">
      <div class="col-md-6">
        <div class="form-group">
          <label>Foto Profil</label>
            <div class="row">
              <div class="col-sm-3">
                <img src="<?= base_url('assets/img/sanggar/profile/'.$user_sanggar['foto_sanggar']); ?>" class="img-thumbnail">
              </div>
              <div class="col-sm-9">
                <div class="custom-file">
                  <input type="file" name="foto_sanggar" class="custom-file-input">
                  <label class="custom-file-label" for="custom-file">Choose file</label>
                </div>
              </div>
            </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Tipe Sanggar</label>
          <select name="tipe_sanggar_id" value="<?= $user_sanggar['tipe_sanggar_id']; ?>" class="form-control">
            <?php foreach ($tipe_sanggar as $ts): ?>
              <?php if ($ts['id'] == $user_sanggar['tipe_sanggar_id']): ?>
              <option value="<?= $ts['id']; ?>" selected=""><?= $ts['tipe_sanggar']; ?></option>
              <?php else: ?>  
              <option value="<?= $ts['id']; ?>"><?= $ts['tipe_sanggar']; ?></option>
              <?php endif ?>
            <?php endforeach ?>
          </select>
        </div>
      </div>
    </div>

    <div class="row mt-3">
      <div class="col-md-6">
        <div id="mapid" style="height: 400px;"></div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Latitude</label>
          <input id="Latitude" type="text" name="latitude" class="form-control" readonly="" value="<?= $user_sanggar['latitude']; ?>">
          <label>Longitude</label>
          <input id="Longitude" type="text" name="longitude" class="form-control" readonly="" value="<?= $user_sanggar['longitude']; ?>">
        </div>
      </div>
    </div>

      
      <div class="form-group row mt-3">
        <div class="col-md-6"></div>
        <div class="col-md-6">
          <button type="submit" class="btn btn-primary float-right">Edit</button>
          <a href="<?= base_url('sanggar/profile/'); ?>" class="btn btn-warning float-right mr-2">Kembali</a>
        </div>
      </div>
  </div>
<?= form_close(); ?>

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

