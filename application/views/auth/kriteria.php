<body class="bg-gradient-light">
  <div class="container-fluid">
    <div class="row mx-auto">
      <div class="col mx-auto my-3">
        <h2 style="text-align: center;">Kriteria Sanggar</h2><hr>
      </div>
    </div>
    <div class="row">
      <div class="col-md-11 mx-auto">
        <div class="card o-hidden border-0 shadow-lg mb-5 col-lg-12 mx-auto">
          <div class="card-header">
            <b>Sesuaikan data sanggar</b>
          </div>

          <div class="card-body p-0">
            <div class="p-4">
              <form class="user" method="post" action="<?= base_url('auth/kriteria'); ?>">
                <input type="hidden" name="id_sanggar[]" value="<?= $id_sanggar; ?>">
                <input type="hidden" name="email" value="<?= $email; ?>">
                <input type="hidden" name="tipe_sanggar_id" value="<?= $tipe_sanggar_id; ?>">

                <div class="row"  data-aos="fade-up" data-aos-delay="100">

                  <div class="col-lg-4 col-md-6 mb-3">
                    <table>
                    <h5 style="font-size: 18px" class="text-primary">Tentukan program pendidikan sanggar yang anda inginkan</h5><hr>
                      <?php foreach ($pendidikan_id as $pen): ?>
                      <tr>
                        <td style="font-size: 14px" width="300px"><?= $pen['pendidikan']; ?> </td>
                        <td>
                          <input class="form-check-input-umur" type="checkbox" name="pendidikan[]" value="<?= $pen['id_pendidikan']; ?>"></input>
                          <input type="hidden" name="id_sanggar_pendidikan[]" value="<?= $id_sanggar; ?>">
                        </td>
                      </tr>
                      <?php endforeach ?>
                    </table>
                  </div>

                  <div class="col-lg-4 col-md-6 mb-3">
                    <table>
                    <h5 style="font-size: 18px" class="text-primary mb-3">Tentukan kriteria usia pendidikan yang anda inginkan</h5><hr>
                    <?php foreach ($umur as $u): ?>
                      <tr>
                        <td style="font-size: 14px" width="300px"><?= $u['umur']; ?> </td>
                        <td>
                          <input class="form-check-input-umur" type="checkbox" name="umur[]" value="<?= $u['id_umur']; ?>"></input>
                          <input type="hidden" name="id_sanggar_umur[]" value="<?= $id_sanggar; ?>">
                        </td>
                      </tr>
                    <?php endforeach ?>
                    </table>
                  </div>

                  
                  <div class="col-lg-4 col-md-6 mb-3">
                    <table>
                    <h5 style="font-size: 18px" class="text-primary mb-3">Tentukan biaya sanggar yang anda inginkan</h5><hr>
                    <?php foreach ($biaya as $b): ?>
                      <tr>
                        <td style="font-size: 14px" width="300px"><?= $b['biaya']; ?> </td>
                        <td>
                          <input class="form-check-input-umur" type="radio" name="biaya" value="<?= $b['id_biaya']; ?>"></input>
                          <input type="hidden" name="id_sanggar_biaya" value="<?= $id_sanggar; ?>">
                        </td>
                      </tr>
                    <?php endforeach ?>
                    </table>
                  </div>
                  
                </div> <br><br>

               <div class="row"  data-aos="fade-up" data-aos-delay="100">
                  <div class="col-lg-4 col-md-6 mb-3">
                    <table>
                    <h5 style="font-size: 18px" class="text-primary mb-3">Tentukan sarana sanggar apa saja yang anda inginkan</h5><hr>
                    <?php foreach ($sarana as $s): ?>
                      <tr>
                        <td style="font-size: 14px" width="300px"><?= $s['sarana']; ?> </td>
                        <td>
                          <input class="form-check-input-umur" type="checkbox" name="sarana[]" value="<?= $s['id_sarana']; ?>"></input>
                          <input type="hidden" name="id_sanggar_sarana[]" value="<?= $id_sanggar; ?>">
                        </td>
                      </tr>
                    <?php endforeach ?>
                    </table>
                  </div>

                  <div class="col-lg-4 col-md-6 mb-3">
                    <table>
                    <h5 style="font-size: 18px" class="text-primary mb-3">Tentukan prasarana sanggar apa saja yang anda inginkan</h5><hr>
                    <?php foreach ($prasarana as $p): ?>
                      <tr>
                        <td style="font-size: 14px" width="300px"><?= $p['prasarana']; ?> </td>
                        <td>
                          <input class="form-check-input-umur" type="checkbox" name="prasarana[]" value="<?= $p['id_prasarana']; ?>"></input>
                          <input type="hidden" name="id_sanggar_prasarana[]" value="<?= $id_sanggar; ?>">
                        </td>
                      </tr>
                    <?php endforeach ?>
                    </table>
                  </div>

                  <div class="col-lg-4 col-md-6 mb-3">
                    <table>
                    <h5 style="font-size: 18px" class="text-primary mb-3">Tentukan jadwal sanggar yang anda inginkan</h5><hr>
                    <?php foreach ($jadwal as $j): ?>
                      <tr>
                        <td style="font-size: 14px" width="300px"><?= $j['jadwal']; ?> </td>
                        <td>
                          <input class="form-check-input-umur" type="checkbox" name="jadwal[]" value="<?= $j['id_jadwal']; ?>"></input>
                          <input type="hidden" name="id_sanggar_jadwal[]" value="<?= $id_sanggar; ?>">
                        </td>
                      </tr>
                    <?php endforeach ?>
                    </table>
                  </div>
                
                </div> 

              <div class="row mb-5">
                <div class="col-md-10">
                  <div class="float-right">
                      <button class="btn btn-primary float-right" type="submit">Simpan</button>
                      </form>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="float-left">
                      <form action="<?= base_url('auth/lewati_kriteria'); ?>" method="post">
                        <input type="hidden" name="nama" value="<?= $id_sanggar; ?>">
                        <input type="hidden" name="email" value="<?= $email; ?>">
                        <button class="btn btn-success float-right ml-2 mr-2" type="submit">Lewati</button>
                      </form>
                  </div>
                </div>
              </div>


                      

                </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
