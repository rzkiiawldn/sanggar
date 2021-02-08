<body class="bg-gradient-light">
  <div class="container-fluid">
    <div class="row mx-auto">
      <div class="col mx-auto my-3">
        <h2 style="text-align: center;">Registrasi Pengguna Umum</h2><hr>
      </div>
    </div>
    <div class="row">

      <div class="col-md-8 mx-auto">
        <div class="card o-hidden border-0 shadow-lg mb-5 col-lg-12 mx-auto">
          <div class="card-header">
            <b>Masukan data pribadi</b>
          </div>
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-4">
                  <form class="user" method="post" action="<?= base_url('auth/registration'); ?>">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="nama">Nama</label>
                          <input type="text" class="form-control" id="nama" placeholder="" value="<?= set_value('nama'); ?>" name="nama">
                          <?= form_error('nama', '<small class="text-danger pl-3">','</small>'); ?>
                        </div> 
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="email">Email Aktif</label>
                          <input type="text" class="form-control" id="email" placeholder="" value="<?= set_value('email'); ?>" name="email">
                          <?= form_error('email', '<small class="text-danger pl-3">','</small>'); ?>
                        </div> 
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="tempat_lahir">Tempat Lahir</label>
                          <input type="text" class="form-control" id="tempat_lahir" placeholder="" value="<?= set_value('tempat_lahir'); ?>" name="tempat_lahir">
                        </div> 
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="tanggal_lahir">Tanggal Lahir</label>
                          <input type="date" class="form-control" id="tanggal_lahir" placeholder="" value="<?= set_value('tanggal_lahir'); ?>" name="tanggal_lahir">
                        </div> 
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="gambar">Foto</label>
                          <input type="file" class="form-control" id="gambar" name="gambar">
                        </div> 
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="jenis_kelamin">Jenis Kelamin</label>
                          <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                            <option value="">-- pilih --</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                          </select>
                        </div>  
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Alamat Lengkap</label>
                          <textarea name="alamat" class="form-control"></textarea>
                          <?= form_error('alamat', '<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="nomor_telepon">Nomor Telpon</label>
                          <input type="number" class="form-control" id="nomor_telepon" placeholder="" value="<?= set_value('nomor_telepon'); ?>" name="nomor_telepon">
                          <?= form_error('nomor_telepon', '<small class="text-danger pl-3">','</small>'); ?>
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
                    
                    <div>
                      <button type="submit" class="btn btn-primary float-right mb-3">Simpan</button>
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