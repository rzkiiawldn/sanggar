

  <!-- ======= About Us Section ======= -->
    <section id="about" class="about my-5 counts">
      <div class="container"><br>

        <div class="section-title" data-aos="fade-up">
          <h3>Tentukan kriteria sanggar yang cocok untuk anda !</h3>
        </div>

        <div class="section-title" data-aos="fade-up">
          <h6 class="float-right"><b><u>total pencarian dengan profile matching : <?= $total_transaksi; ?></u></b></h6>
        </div>

        <div class="row">
          <div class="container">

          <form action="<?= base_url('user/cari_sanggar/kriteria'); ?>" method="post">
          <input type="hidden" name="id_user" value="<?= $user['id']; ?>">

          <div class="row"  data-aos="fade-up" data-aos-delay="100">          
            <div class="col-lg-4 col-md-6 mb-3">
              <table>
              <h5 style="font-size: 18px" class="text-primary">Tentukan program pendidikan sanggar yang anda inginkan</h5><hr>
              <tr style="color: red">
                <td style="font-size: 14px">Select all</td>
                <td><input type="checkbox" id="select_all_pendidikan"></td>
              </tr>
              <?php foreach ($k_pendidikan as $pen): ?>
                <tr>
                  <td style="font-size: 14px" width="300px"><?= $pen['pendidikan']; ?> </td>
                  <td><input class="form-check-input-pendidikan" type="checkbox" name="pendidikan[]" value="<?= $pen['id_pendidikan']; ?>"></input></td>
                </tr>
              <?php endforeach ?>
              </table>
            </div>

            <div class="col-lg-4 col-md-6 mb-3">
              <table>
              <h5 style="font-size: 18px" class="text-primary mb-3">Tentukan kriteria usia pendidikan yang anda inginkan</h5><hr>
              <tr style="color: red">
                <td style="font-size: 14px">Select all</td>
                <td><input type="checkbox" id="select_all_umur"></td>
              </tr>
              <?php foreach ($umur as $u): ?>
                <tr>
                  <td style="font-size: 14px" width="300px"><?= $u['umur']; ?> </td>
                  <td><input class="form-check-input-umur" type="checkbox" name="umur[]" value="<?= $u['id_umur']; ?>"></input></td>
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
                  <td><input class="form-check-input" type="radio" name="biaya" value="<?= $b['biaya']; ?>"></input></td>
                </tr>
              <?php endforeach ?>
              </table>
            </div>
            
          </div> <br><br>

         <div class="row"  data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-4 col-md-6 mb-3">
              <table>
              <h5 style="font-size: 18px" class="text-primary mb-3">Tentukan sarana sanggar apa saja yang anda inginkan</h5><hr>
              <tr style="color: red">
                <td style="font-size: 14px">Select all</td>
                <td><input type="checkbox" id="select_all_sarana"></td>
              </tr>
              <?php foreach ($sarana as $s): ?>
                <tr>
                  <td style="font-size: 14px" width="300px"><?= $s['sarana']; ?> </td>
                  <td><input class="form-check-input-sarana" type="checkbox" name="sarana[]" value="<?= $s['id_sarana']; ?>"></input></td>
                </tr>
              <?php endforeach ?>
              </table>
            </div>

            <div class="col-lg-4 col-md-6 mb-3">
              <table>
              <h5 style="font-size: 18px" class="text-primary mb-3">Tentukan prasarana sanggar apa saja yang anda inginkan</h5><hr>
              <tr style="color: red">
                <td style="font-size: 14px">Select all</td>
                <td><input type="checkbox" id="select_all_prasarana"></td>
              </tr>
              <?php foreach ($prasarana as $p): ?>
                <tr>
                  <td style="font-size: 14px" width="300px"><?= $p['prasarana']; ?> </td>
                  <td><input class="form-check-input-prasarana" type="checkbox" name="prasarana[]" value="<?= $p['id_prasarana']; ?>"></input></td>
                </tr>
              <?php endforeach ?>
              </table>
            </div>

            <div class="col-lg-4 col-md-6 mb-3">
              <table>
              <h5 style="font-size: 18px" class="text-primary mb-3">Tentukan jadwal sanggar yang anda inginkan</h5><hr>
              <tr style="color: red">
                <td style="font-size: 14px">Select all</td>
                <td><input type="checkbox" id="select_all_jadwal"></td>
              </tr>
              <?php foreach ($jadwal as $j): ?>
                <tr>
                  <td style="font-size: 14px" width="300px"><?= $j['jadwal']; ?> </td>
                  <td><input class="form-check-input-jadwal" type="checkbox" name="jadwal[]" value="<?= $j['id_jadwal']; ?>"></input></td>
                </tr>
              <?php endforeach ?>
              </table>
            </div>
          
          </div> 

        <div class="row mb-5">
          <div class="col">
            <div class="float-right">
                <button class="btn btn-primary float-right" type="submit">Temukan sanggar</button>
              </div>
          </div>
          </div>
          </form><hr>

        </div></div>

      </div>
    </section><!-- End About Us Section -->

</main><br><br><br><br><br>

<script>
    $(document).ready(function()
    {
      $('#select_all_pendidikan').click(function()
      {
        $('.form-check-input-pendidikan').prop('checked', $ (this).prop('checked'));
      });
    });
</script>
<script>
    $(document).ready(function()
    {
      $('#select_all_umur').click(function()
      {
        $('.form-check-input-umur').prop('checked', $ (this).prop('checked'));
      });
    });
</script>
<script>
    $(document).ready(function()
    {
      $('#select_all_sarana').click(function()
      {
        $('.form-check-input-sarana').prop('checked', $ (this).prop('checked'));
      });
    });
</script>
<script>
    $(document).ready(function()
    {
      $('#select_all_prasarana').click(function()
      {
        $('.form-check-input-prasarana').prop('checked', $ (this).prop('checked'));
      });
    });
</script>
<script>
    $(document).ready(function()
    {
      $('#select_all_jadwal').click(function()
      {
        $('.form-check-input-jadwal').prop('checked', $ (this).prop('checked'));
      });
    });
</script>