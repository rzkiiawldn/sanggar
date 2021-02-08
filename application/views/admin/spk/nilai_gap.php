<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>#</th>
              <th>GAP</th>
              <th>Bobot Nilai</th>
              <th>Keterangan</th>
            </tr>
          </thead>
          <tbody>
          <?php
          $no = 1;
          foreach ($nilai_ketetapan as $nk) :
           ?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= $nk['gap']; ?></td>
              <td><?= $nk['bobot_nilai']; ?></td>
              <td><?= $nk['keterangan']; ?></td>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>