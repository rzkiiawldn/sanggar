<body class="bg-gradient-light">
  <div class="container-fluid">
    <div class="row mx-auto">
      <div class="col mx-auto my-3">
        <h2 style="text-align: center;">Tes Minat Bakat</h2><hr>
      </div>
    </div>
    <div class="row">

      <div class="col-md-8 mx-auto">
        <div class="card o-hidden border-0 shadow-lg mb-5 col-lg-12 mx-auto">
          <div class="card-header">
            <b>Jawablah pertanyaan singkat dibawah ini !</b>
          </div>
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-4">
                  <form class="user" method="post" action="<?= base_url('auth/tes_minat'); ?>">
                    
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="jenis_kelamin">Anda berminat dibidang kesenian apa ?</label>
                          <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                            <option value="">-- pilih --</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                          </select>
                        </div>  
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="jenis_kelamin">Anda berminat dibidang kesenian apa ?</label>
                          <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                            <option value="">-- pilih --</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                          </select>
                        </div>  
                      </div>
                    </div>                
                    
                    <div>
                      <button type="submit" class="btn btn-primary float-right mb-3">Simpan</button>
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