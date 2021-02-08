<div class="container-fluid">
<h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

<div class="card shadow mb-4">
<div class="card-body">
  <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th width="20">#</th>
          <th>Nama Sanggar</th>
          <?php foreach ($n_kriteria as $n) :?>
          <th width="50"><?= $n['kode']; ?></th>
          <?php endforeach; ?>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><?= $this->session->userdata('nama_sanggar'); ?></td>
          <td><b>
            <?php if ($total_pen == 6): ?>
               5
            <?php elseif ($total_pen == 5): ?>
               4
            <?php elseif ($total_pen == 4): ?>
               3
            <?php elseif ($total_pen == 3): ?>
               2
            <?php elseif ($total_pen <= 2): ?>
               1
            <?php else: ?>
              0
            <?php endif ?></b>
          </td>
          <td><b>
            <?php if ($total_u >= 4): ?>
               3
            <?php elseif ($total_u >= 2 ): ?>
               2
            <?php elseif ($total_u < 2): ?>
               1
            <?php else: ?>
               0
            <?php endif ?></b>
          </td>
          <td><b>
            <?php if ($total_j >= 9): ?>
               3
            <?php elseif ($total_j >= 4): ?>
               2
            <?php elseif ($total_j <= 3): ?>
               1
            <?php else: ?>
              0
            <?php endif ?></b>
          </td>
          <td><b>
            <?php if ($total_s >= 8): ?>
               3
            <?php elseif ($total_s >= 4): ?>
               2
            <?php elseif ($total_s <= 3): ?>
               1
            <?php else: ?>
              0
            <?php endif ?></b>
          </td>
          <td><b>
              <?php if ($total_pras >= 10): ?>
               3
            <?php elseif ($total_pras >= 5): ?>
               2
            <?php elseif ($total_pras <= 4): ?>
               1
            <?php else: ?>
              0
            <?php endif ?></b>
          </td>
          <td><b>
            <?php foreach ($n_biaya as $nb):  ?>
            <?php if ($nb['biaya'] == '<= 1 juta'): ?>
              5
            <?php elseif ($nb['biaya'] == '2 jt s/d 4 juta'): ?>
              4
            <?php elseif ($nb['biaya'] == '5 jt s/d 7 juta'): ?>
              3
            <?php elseif ($nb['biaya'] == '8 jt s/d 10 juta'): ?>
              2
            <?php elseif ($nb['biaya'] == '> 12 juta'): ?>
              1
            <?php else: ?>
              0
            <?php endif ?></b>
            <?php endforeach; ?>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
</div>

</div>
</div>