<div class="container-fluid">
<a href="<?= base_url('administrator/kriteria/lihat') ?>" class="btn btn-primary mb-2 float-right">Lihat Nilai</a>
<a href="#" data-toggle="modal" data-target="#ubahfaktor" class="btn btn-success mb-2 float-right mr-2">Ubah Faktor</a>
<h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>


<div class="card shadow mb-4">
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Kriteria</th>
            <th>Faktor</th>
            <th width="60px">Aksi</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <th>Pendidikan</th>
            <td>
              <?php if ($jk['pendidikan'] == 1): ?>
              Core Faktor (CF)
              <?php else: ?>
              Secondary Faktor (SF)
              <?php endif ?>              
            </td>
            <td><a href="<?= base_url() ?>administrator/kriteria/pendidikan" class="badge badge-primary"><i class="fa fa-plus"></i> Subkriteria</a></td>
          </tr>
          <tr>
            <th>Umur</th>
            <td>
              <?php if ($jk['umur'] == 1): ?>
              Core Faktor (CF)
              <?php else: ?>
              Secondary Faktor (SF)
              <?php endif ?>              
            </td>
            <td><a href="<?= base_url() ?>administrator/kriteria/umur" class="badge badge-primary"><i class="fa fa-plus"></i> Subkriteria</a></td>
          </tr>
          <tr>
            <th>Biaya</th>
            <td>
              <?php if ($jk['biaya'] == 1): ?>
              Core Faktor (CF)
              <?php else: ?>
              Secondary Faktor (SF)
              <?php endif ?>              
            </td>
            <td><a href="<?= base_url() ?>administrator/kriteria/biaya" class="badge badge-primary"><i class="fa fa-plus"></i> Subkriteria</a></td>
          </tr>
          <tr>
            <th>Sarana</th>
            <td>
              <?php if ($jk['sarana'] == 1): ?>
              Core Faktor (CF)
              <?php else: ?>
              Secondary Faktor (SF)
              <?php endif ?>              
            </td>
            <td><a href="<?= base_url() ?>administrator/kriteria/sarana" class="badge badge-primary"><i class="fa fa-plus"></i> Subkriteria</a></td>
          </tr>
          <tr>
            <th>Prasarana</th>
            <td>
              <?php if ($jk['prasarana'] == 1): ?>
              Core Faktor (CF)
              <?php else: ?>
              Secondary Faktor (SF)
              <?php endif ?>              
            </td>
            <td><a href="<?= base_url() ?>administrator/kriteria/prasarana" class="badge badge-primary"><i class="fa fa-plus"></i> Subkriteria</a></td>
          </tr>
          <tr>
            <th>Jadwal</th>
            <td>
              <?php if ($jk['jadwal'] == 1): ?>
              Core Faktor (CF)
              <?php else: ?>
              Secondary Faktor (SF)
              <?php endif ?>              
            </td>
            <td><a href="<?= base_url() ?>administrator/kriteria/jadwal" class="badge badge-primary"><i class="fa fa-plus"></i> Subkriteria</a></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

</div>
</div>

<!-- Modal Add -->
<div class="modal fade" id="ubahfaktor" tabindex="-1" role="dialog" aria-labelledby="ubahfaktorLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ubahfaktorLabel">Edit Faktor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= form_open_multipart('administrator/kriteria/ubah_faktor'); ?>
        <div class="modal-body">
          <input type="hidden" name="id" value="<?= $jk['id']; ?>">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Kriteria Pendidikan</label>
                <select name="pendidikan" value="<?= $jk['pendidikan']; ?>" class="form-control">
                  <?php if ($jk['pendidikan'] == 1): ?>
                  <option value="1" selected="">Core Faktor (CF)</option>
                  <?php else: ?>
                  <option value="0" selected="">Secondary Faktor (SF)</option>
                  <?php endif ?>
                  <option value="1">Core Faktor (CF)</option>
                  <option value="0">Secondary Faktor (SF)</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Kriteria umur</label>
                <select name="umur" value="<?= $jk['umur']; ?>" class="form-control">
                  <?php if ($jk['umur'] == 1): ?>
                  <option value="1" selected="">Core Faktor (CF)</option>
                  <?php else: ?>
                  <option value="0" selected="">Secondary Faktor (SF)</option>
                  <?php endif ?>
                  <option value="1">Core Faktor (CF)</option>
                  <option value="0">Secondary Faktor (SF)</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Kriteria biaya</label>
                <select name="biaya" value="<?= $jk['biaya']; ?>" class="form-control">
                  <?php if ($jk['biaya'] == 1): ?>
                  <option value="1" selected="">Core Faktor (CF)</option>
                  <?php else: ?>
                  <option value="0" selected="">Secondary Faktor (SF)</option>
                  <?php endif ?>
                  <option value="1">Core Faktor (CF)</option>
                  <option value="0">Secondary Faktor (SF)</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Kriteria sarana</label>
                <select name="sarana" value="<?= $jk['sarana']; ?>" class="form-control">
                  <?php if ($jk['sarana'] == 1): ?>
                  <option value="1" selected="">Core Faktor (CF)</option>
                  <?php else: ?>
                  <option value="0" selected="">Secondary Faktor (SF)</option>
                  <?php endif ?>
                  <option value="1">Core Faktor (CF)</option>
                  <option value="0">Secondary Faktor (SF)</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Kriteria prasarana</label>
                <select name="prasarana" value="<?= $jk['prasarana']; ?>" class="form-control">
                  <?php if ($jk['prasarana'] == 1): ?>
                  <option value="1" selected="">Core Faktor (CF)</option>
                  <?php else: ?>
                  <option value="0" selected="">Secondary Faktor (SF)</option>
                  <?php endif ?>
                  <option value="1">Core Faktor (CF)</option>
                  <option value="0">Secondary Faktor (SF)</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Kriteria jadwal</label>
                <select name="jadwal" value="<?= $jk['jadwal']; ?>" class="form-control">
                  <?php if ($jk['jadwal'] == 1): ?>
                  <option value="1" selected="">Core Faktor (CF)</option>
                  <?php else: ?>
                  <option value="0" selected="">Secondary Faktor (SF)</option>
                  <?php endif ?>
                  <option value="1">Core Faktor (CF)</option>
                  <option value="0">Secondary Faktor (SF)</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label>Persentase Core Faktor</label>
              <input type="number" name="percentace" value="<?= $jk['percentace']; ?>" class="form-control" max="100" min="0">
            </div>
            <div class="col-md-6">
              <label>Persentase Secondary Faktor</label>
              <input type="number" value="<?= 100-$jk['percentace']; ?>" class="form-control" readonly>
            </div>
          </div>     
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="tambah">Edit</button>
        </div>
      <?= form_close(); ?>
    </div>
  </div>
</div>