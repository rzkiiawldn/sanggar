<body class="bg-gradient-light">
  <div class="container-fluid">
    <div class="row">

      <div class="col-md-6 mx-auto mt-5">
      	<?= $this->session->flashdata('message'); ?>
        <div class="card o-hidden border-0 shadow-lg mb-5 col-lg-12 mx-auto">
          <div class="card-header">
            <b>lupa password ?</b>
          </div>
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-4">
                  <form class="user" method="post" action="<?= base_url('auth/lupa_password_sanggar'); ?>">
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label for="email">Email</label>
                          <input type="text" class="form-control" id="email" placeholder="masukan email anda" value="<?= set_value('email'); ?>" name="email">
                          <?= form_error('email', '<small class="text-danger pl-3">','</small>'); ?>
                        </div> 
                      </div>
                    </div>                                     
                    
                    <div>
                      <button type="submit" class="btn btn-primary float-right mb-3">Reset password</button>
                      <a href="<?= base_url('auth/index'); ?>" class="btn btn-warning float-right mb-3 mr-3">Kembali</a>
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