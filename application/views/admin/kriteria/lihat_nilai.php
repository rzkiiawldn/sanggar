<div class="container-fluid">

<a href="<?= base_url() ?>administrator/kriteria/hitung" class="btn btn-primary mb-2 float-right ml-2">Hitung ranking</a>
<a href="<?= base_url() ?>administrator/kriteria/index" class="btn btn-success mb-2 float-right ml-2">Kembali</a>
<h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
<div class="card shadow mb-4">
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th width="5px">#</th>
            <th width="250px">Nama Sanggar</th>
            <th width="30px">K.Pendidikan</th>
            <th width="30px">K.Umur</th>
            <th width="30px">K.Biaya</th>
            <th width="30px">K.Sarana</th>
            <th width="30px">K.Prasarana</th>
            <th width="30px">K.Jadwal</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          ?>
          <?php foreach($pm as $s): ?>
          <tr>
            <td><?= $no++; ?></td>
            <td><?= $s['nama_sanggar']; ?></td>
            <td class="text-center"><?= $s['pendidikan']; ?></td>
            <td class="text-center"><?= $s['umur']; ?></td>
            <td class="text-center"><?= $s['biaya']; ?></td>
            <td class="text-center"><?= $s['sarana']; ?></td>
            <td class="text-center"><?= $s['prasarana']; ?></td>
            <td class="text-center"><?= $s['jadwal']; ?></td>
          </tr>        
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

</div>
</div>