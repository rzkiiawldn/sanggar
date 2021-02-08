<table style="width: 45%">
  <h2>Data pendaftaran</h2>
     <tr>
         <td>Kode pendaftaran</td>
         <td>: <?= $pendaftaran['kode_pendaftaran']; ?></td>
     </tr>
     <tr>
         <td>Nama Pendaftar</td>
         <td>: <?= $pendaftaran['nama']; ?></td>
     </tr>
     <tr>
         <td>Nama Sanggar</td>
         <td>: <?= $pendaftaran['nama_sanggar']; ?></td>
     </tr>
     <tr>
         <td>Kelas</td>
         <td>: <?= $pendaftaran['nama_kelas']; ?></td>
     </tr>
     <tr>
         <td>Tanggal pendaftaran</td>
         <td>: <?= date('d F Y', strtotime($pendaftaran['tanggal_pendaftaran'])); ?></td>
     </tr>
     <tr>
       <td>Status Pembayaran</td>
       <td>
          <?php if ($pendaftaran['status_pendaftaran'] == 0): ?>
            <p style="color: yellow">: Menunggu konfirmasi</p>
          <?php else: ?>
            <p style="color: red">: Dikonfirmasi</p>
          <?php endif ?>
       </td>
     </tr>
 </table>