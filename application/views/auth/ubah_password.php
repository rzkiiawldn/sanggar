<body class="bg-gradient-light">
  <div class="container-fluid">
    <div class="row">

      <div class="col-md-6 mx-auto mt-5"> 
        <div class="card o-hidden border-0 shadow-lg mb-5 col-lg-12 mx-auto">
          <div class="card-header">
            <b>Ubah password untuk <?= $this->session->userdata('reset_email'); ?></b>
          </div>
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-4">
                  <form class="user" method="post" action="<?= base_url('auth/ubah_password'); ?>">
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label for="password1">Password baru</label>
                          <input type="password" class="form-control" id="password1" name="password1">
                          <?= form_error('password1', '<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                        <div class="form-group">
                          <label for="password2">Ulangi password</label>
                          <input type="password" class="form-control" id="password2" name="password2">
                          <?= form_error('password2', '<small class="text-danger pl-3">','</small>'); ?>
                        </div> 
                      </div>
                    </div>                                     
                    
                    <div>
                      <button type="submit" class="btn btn-primary float-right mb-3">Ubah Password</button>
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