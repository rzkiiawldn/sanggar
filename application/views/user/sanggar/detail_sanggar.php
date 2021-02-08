
<!-- ======= Counts Section ======= -->
    <section id="counts" class="counts my-4">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h3>Detail sanggar <?= $sanggar['nama_sanggar']; ?></h3>
        </div>

        <div class="row" data-aos="fade-up">
        	<div class="col mb-5">
    			  <div id="mapid" style="height: 200px;"></div>
    			</div>
        </div>

        <div class="row" data-aos="fade-up">
          <!-- / .main-navbar -->
              <div class="col-lg-4">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom text-center">
                    <div class="mb-3 mx-auto">
                      <img class="rounded-circle" src="<?= base_url(); ?>assets/img/sanggar/profile/<?= $sanggar['foto_sanggar']; ?>" alt="User Avatar" width="110"> </div>
                    <h4 class="mb-0"><?= $sanggar['nama_sanggar']; ?></h4>
                    <span class="text-muted d-block mb-2"><?= $sanggar['tipe_sanggar']; ?></span>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item px-4">
                      <div class="progress-wrapper">
                        <strong class="text-muted d-block mb-2">Pengunjung : <?= $total_pengunjung; ?></strong>
                        <div class="progress progress-sm">
                          <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="<?= $total_pendaftar; ?>" aria-valuemin="0" aria-valuemax="1000" style="width: <?= $total_pengunjung; ?>%;">
                            <span class="progress-value"><?= $total_pengunjung; ?></span>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="list-group-item p-4">
                      <strong class="text-muted d-block mb-2">Tentang sanggar</strong>
                      <span><?= $sanggar['deskripsi_seni']; ?></span>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-lg-8">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Informasi Sanggar</h6>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item p-3">
                      <div class="row">
                        <div class="col">
                            <div class="form-row">
                        	  <div class="form-group col-md-6">
		                        <img class="rounded-circle" src="<?= base_url(); ?>assets/img/sanggar/profile/<?= $sanggar['foto_sanggar']; ?>" alt="User Avatar" width="110"> </div>
		                          <div class="form-group col-md-6">
                                <label><b>Ketua Sanggar</b></label>
                                <p><?= $sanggar['nama_ketua']; ?></p>
                              </div>
                              <div class="form-group col-md-6">
                                <label><b>No Telepon</b></label>
                                <p><?= $sanggar['nomor_telepon']; ?></p>
                              </div>
                              <div class="form-group col-md-6">
                                <label><b>Email</b></label>
                                <p><?= $sanggar['email']; ?></p>
                              </div>
                              <div class="form-group col-md-12">
                              	<label><b>Alamat lengkap sanggar</b></label>
        				                <p><?= $sanggar['alamat']; ?></p>
        				              </div>
                              <!-- KATEGORI -->                              
                              <div class="form-group col-md-6" style="font-size: 14px">
                                <label><b>Kriteria Umur</b></label>
                                <ul>
                                <?php foreach ($n_umur as $value): ?>
                                  <li>
                                    <p><?= $value['umur']; ?></p>
                                  </li>
                                <?php endforeach; ?>
                                </ul>
                              </div>
                              <!-- 3 -->
                              <div class="form-group col-md-6" style="font-size: 14px">
                                <label><b>Biaya</b></label>
                                <ul>
                                <?php foreach ($n_biaya as $value): ?>
                                  <li>
                                    <p><?= $value['biaya']; ?></p>
                                  </li>
                                <?php endforeach; ?>
                                </ul>
                              </div>
                              <!-- 4 -->
                              <div class="form-group col-md-6" style="font-size: 14px">
                                <label><b>Sarana</b></label>
                                <ul>
                                <?php foreach ($n_sarana as $value): ?>
                                  <li>
                                    <p><?= $value['sarana']; ?></p>
                                  </li>
                                <?php endforeach; ?>
                                </ul>
                              </div>
                              <!-- 5 -->
                              <div class="form-group col-md-6" style="font-size: 14px">
                                <label><b>Prasarana</b></label>
                                <ul>
                                <?php foreach ($n_prasarana as $value): ?>
                                  <li>
                                    <p><?= $value['prasarana']; ?></p>
                                  </li>
                                <?php endforeach; ?>
                                </ul>
                              </div>
                              <!-- 6 -->
                            </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                          <?php if ($sanggar['pendaftaran'] == 1): ?>
                            <a href="<?= base_url('user/pendaftaran/index/'.$sanggar['id_sanggar']); ?>" class="mb-2 btn btn-sm btn-pill btn-outline-primary mr-2 float-right">Mendaftar ke sanggar</a>
                          <?php else: ?>
                            <button class="mb-2 btn btn-sm btn-pill btn-outline-danger mr-2 float-right">Pendaftaran tidak tersedia</button>
                          <?php endif ?>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            <!-- End Default Light Table -->
        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="row" data-aos="fade-up" data-aos-delay="200">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter=".filter-galeri" class="filter-active">Galeri Sanggar</li>
              <?php if ($sanggar['penyewaan'] == 1): ?>
              <li data-filter=".filter-atribut">Sewa Atribut Sanggar</li>                
              <?php endif ?>
              <?php if ($sanggar['undang_acara'] == 1): ?>
              <li data-filter=".filter-undang">Paket Undang Sanggar</li>                
              <?php endif ?>
              <li data-filter=".filter-jadwal">Jadwal Latihan Sanggar</li>
              <!-- <li data-filter=".filter-atribut">Daftar Sanggar</li> -->
            </ul>
          </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="400">

       	<?php foreach ($galeri as $g): ?>
       		<div class="col-lg-4 col-md-6 portfolio-item filter-galeri">
             <div class="portfolio-wrap">
               <img src="<?= base_url(); ?>assets/gambar_galeri_sanggar/<?= $g['foto']; ?>" class="img-fluid" alt="" style="width: 400px">
                <div class="portfolio-info">
                 <p>galeri</p>
                 <div class="portfolio-links">
                   <a href="<?= base_url(); ?>assets/gambar_galeri_sanggar/<?= $g['foto']; ?>" data-gall="portfolioGallery" class="venobox" title="App 1"><i class="bx bx-plus"></i></a>
                 </div>
               </div>
             </div>
            </div>
       	<?php endforeach ?>

       	<?php foreach ($atribut as $a): ?>
       		<div class="col-lg-3 col-md-6 portfolio-item filter-atribut team section-bg">
	            <div class="member" data-aos="fade-up" data-aos-delay="100">
	              <div class="member-img" style="height: 130px">
	                <img src="<?= base_url(); ?>assets/gambar_paket_sewa/<?= $a['gambar']; ?>" class="img-fluid" alt="">
	                <div class="social">
	                  <a href="<?= base_url(); ?>user/penyewaan/detail_sewa/<?= $a['id']; ?>">Detail | Sewa</a>
	                </div>
	              </div>
	              <div class="member-info">
	                <h4><?= $a['jenis_atribut']; ?></h4>
	                <span>Harga Sewa : Rp <?= number_format($a['harga'],0,',','.'); ?></span>
	                <span><?= word_limiter($a['keterangan_atribut'], 6);  ?></span>
	              </div>
	            </div>
	          </div>
       	<?php endforeach ?>

       	<?php foreach ($undang as $u): ?>
       		<div class="col-lg-3 col-md-6 portfolio-item filter-undang team section-bg">
	            <div class="member" data-aos="fade-up" data-aos-delay="100">
	              <div class="member-img" style="height: 130px">
	                <img src="<?= base_url(); ?>assets/gambar_paket_undang/<?= $u['gambar']; ?>" class="img-fluid" alt="">
	                <div class="social">
	                  <a href="<?= base_url(); ?>user/pengundang/detail_undang/<?= $u['id']; ?>">Detail | Undang</a>
	                </div>
	              </div>
	              <div class="member-info">
	                <h4><?= $u['nama_paket']; ?></h4>
	                <span>Biaya Undang : Rp <?= number_format($u['harga'],0,',','.'); ?></span>
	              </div>
	            </div>
	          </div>
       	<?php endforeach ?>

<!-- JADWAL LATIHAN -->
       		<div class="col-lg-12 col-md-6 portfolio-item filter-jadwal">
             <div class="table-responsive">
               <table class="table table-hover table-bordered">
	            <thead>
	              <tr>
	                <th scope="col">#</th>
	                <th scope="col">Kelas</th>
	                <th scope="col">Jenis Latihan</th>
	                <th scope="col">Hari Latihan</th>
	                <th scope="col">Jam Latihan</th>
	              </tr>
	            </thead>
	            <tbody>
	            <?php $no=1; foreach($jadwal as $j): ?>
	              <tr>
	                <th scope="row"><?= $no++; ?></th>
	                <td><?= $j['nama_kelas']; ?></td>
	                <td><?= $j['judul_latihan']; ?></td>
	                <td><?= $j['jadwal']; ?></td>
	                <td><?= $j['jam_latihan']; ?></td>
	              </tr>
	            <?php endforeach; ?>
	            </tbody>
	          </table>
             </div>
            </div>     	
                    
        </div>

      </div>
    </section><!-- End Portfolio Section -->
</main>

<script>
  navigator.geolocation.getCurrentPosition(function(location) {
    var latlng = new L.LatLng(location.coords.latitude, location.coords.longitude);

    console.log(location.coords.latitude, location.coords.longitude);

    var mymap = L.map('mapid').setView([-6.167662554809015, 106.76348441097255], 12);

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
      maxZoom: 18,
      attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
        '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
        'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
      id: 'mapbox/streets-v11',
      tileSize: 512,
      zoomOffset: -1
    }).addTo(mymap);

    L.marker([<?= $sanggar['latitude']; ?> , <?= $sanggar['longitude']; ?>]).addTo(mymap)
    .bindPopup(
      "<b>Nama Sanggar : <?= $sanggar['nama_sanggar']; ?></b></br>"+
      "<b>Tipe Sanggar : <?= $sanggar['tipe_sanggar_id']; ?></b></br>"+
      // "<a href='' class='btn btn-sm btn-primary'>Detail</a>" +
      "<a href='https://www.google.com/maps/dir/?api=1&origin=" + 
      location.coords.latitude + "," + location.coords.longitude + 
      "&destination=<?= $sanggar['latitude'] ?>,<?= $sanggar['longitude'] ?>' class='btn btn-sm btn-info' target='_blank'> Rute </a>"
      );

    });

  
</script>
