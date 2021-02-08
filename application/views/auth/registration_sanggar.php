<body class="bg-gradient-light">
  <div class="container-fluid">
    <div class="row mx-auto">
      <div class="col mx-auto my-3">
        <h2 style="text-align: center;">Registrasi Sanggar</h2><hr>
      </div>
    </div>
    <div class="row">
      <div class="col-md-7">
        <div class="card o-hidden border-0 shadow-lg mb-5 col-lg-12 mx-auto">
          <div class="card-header">
            <b>Lokasi sanggar </b>| geser marker untuk menandai lokasi sanggar anda
          </div>
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg">
                <div class="p-3">
                  <div id="mapid" style="height: 580px;"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-5">
        <div class="card o-hidden border-0 shadow-lg mb-5 col-lg-12 mx-auto">
          <div class="card-header">
            <b>Masukan data sanggar</b>
          </div>
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-4">
                  <form class="user" method="post" action="<?= base_url('auth/registration_sanggar'); ?>">
                    <div class="form-group">
                      <label for="nama_sanggar">Nama Sanggar</label>
                      <input type="text" class="form-control" id="nama_sanggar" placeholder="" value="<?= set_value('nama_sanggar'); ?>" name="nama_sanggar">
                      <?= form_error('nama_sanggar', '<small class="text-danger pl-3">','</small>'); ?>
                    </div> 
                    <div class="form-group">
                      <label for="alamat">Alamat Sanggar</label>
                      <textarea class="form-control" id="alamat" name="alamat"><?= set_value('alamat'); ?></textarea>
                    </div> 
                    <div class="form-group">
                      <label for="email">Email Aktif</label>
                      <input type="text" class="form-control" id="email" placeholder="" value="<?= set_value('email'); ?>" name="email">
                      <?= form_error('email', '<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                    
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="nomor_telepon">No Telp</label>
                          <input type="number" class="form-control" id="nomor_telepon" placeholder="" value="<?= set_value('nomor_telepon'); ?>" name="nomor_telepon">
                          <?= form_error('nomor_telepon', '<small class="text-danger pl-3">','</small>'); ?>
                        </div> 
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="tipe_sanggar">Tipe Sanggar</label>
                          <select name="tipe_sanggar_id" id="tipe_sanggar" class="form-control">
                            <option value="">-- pilih --</option>
                            <?php foreach ($tipe_sanggar as $tp): ?>
                            <option value="<?= $tp['id']; ?>"><?= $tp['tipe_sanggar']; ?></option>
                            <?php endforeach ?>
                          </select>
                        </div>  
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="password1">Password</label>
                          <input type="password" class="form-control" id="password1" placeholder="" value="<?= set_value('password1'); ?>" name="password1">
                          <?= form_error('password1', '<small class="text-danger pl-3">','</small>'); ?>
                        </div> 
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="password2">Ulangi Password</label>
                          <input type="password" class="form-control" id="password2" placeholder="" value="<?= set_value('password2'); ?>" name="password2">
                          <?= form_error('password2', '<small class="text-danger pl-3">','</small>'); ?>
                        </div> 
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="latitude">Latitude</label>
                          <input type="text" id="Latitude" class="form-control" id="latitude" value="<?= set_value('latitude'); ?>" placeholder="" name="latitude" readonly>
                          <?= form_error('latitude', '<small class="text-danger pl-3">','</small>'); ?>
                        </div> 
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="longitude">longitude</label>
                          <input type="text" id="Longitude" class="form-control" id="longitude" value="<?= set_value('longitude'); ?>" placeholder="" name="longitude" readonly>
                          <?= form_error('longitude', '<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">                        
                        <p style="color: red; font-size: 12px">*Geser maker</p>
                      </div>
                    </div>

                    
                    
                    <div>
                      <button type="submit" class="btn btn-primary float-right mb-3">Next</button>
                      <a href="<?= base_url('welcome'); ?>" class="btn btn-warning float-right mb-3 mr-2">Kembali</a>
                    </div>            
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <script>
var curLocation=[0,0];
if (curLocation[0]==0 && curLocation[1]==0) {
  curLocation =[-6.167662554809015, 106.76348441097255]; 
}

var mymap = L.map('mapid').setView([-6.167662554809015, 106.76348441097255], 14);
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