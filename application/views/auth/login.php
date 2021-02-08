<body>
<section class="bg-login">
  <div class="container">

    <div class="row justify-content-center mt-5">
      <div class="col-lg-6"></div>

      <div class="col-lg-6">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg">
                  <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4"><?= $judul; ?></h1>
                  </div>

                  <?= $this->session->flashdata('message'); ?>

                  <form class="user" method="post" action="<?= base_url('auth'); ?>">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="email" placeholder="Masukan Alamat Email..." name="email" value="<?= set_value('email'); ?>">
                      <?= form_error('email', '<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password" placeholder="Kata sandi" name="password">
                      <?= form_error('password', '<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                    <div class="row mb-3">
                      <div class="col mx-auto">
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                          Masuk
                        </button>
                      </div>
                    </div>
                  </form>
                  <hr>

                  <div class="row mb-5">
                    <div class="col-md-6">
                      <div class="text-center">

                        <div class="dropdown">
                          <a class="small dropdown-toggle" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">Lupa kata sandi ?!</a>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="<?= base_url('auth/lupa_password_sanggar'); ?>">Lupa kata sandi Sanggar?</a>
                            <a class="dropdown-item" href="<?= base_url('auth/lupa_password'); ?>">Lupa kata sandi pengguna umum?</a>
                          </div>
                        </div>

                        <!-- <a class="small" href="<?= base_url('auth/lupa_password'); ?>">Lupa kata sandi?</a> -->
                      </div>
                    </div> 
                    <div class="col-md-6">
                      <div class="text-center">

                        <div class="dropdown">
                          <a class="small dropdown-toggle" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="<?= base_url('auth/registration'); ?>">Buat akun baru!</a>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="<?= base_url('auth/registration_sanggar'); ?>">Akun Sanggar</a>
                            <a class="dropdown-item" href="<?= base_url('auth/registration'); ?>">Akun Pengguna umum</a>
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
      </div>
    </div>
  </div>  
</section>