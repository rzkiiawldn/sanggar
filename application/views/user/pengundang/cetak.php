<table style="width: 45%">
  <h2>Invoice Pembayaran Anda</h2>
     <tr>
         <td>Kode pengundang</td>
         <td>: <?= $pengundang['kode_undang']; ?></td>
     </tr>
     <tr>
         <td>Nama Penyewa</td>
         <td>: <?= $pengundang['nama']; ?></td>
     </tr>
     <tr>
         <td>Nama Sanggar</td>
         <td>: <?= $pengundang['nama_sanggar']; ?></td>
     </tr>
     <tr>
         <td>Atribut</td>
         <td>: <?= $pengundang['nama_paket']; ?></td>
     </tr>
     <tr>
         <td>Tanggal pengundang</td>
         <td>: <?= date('d F Y', strtotime($pengundang['tanggal_undang'])); ?></td>
     </tr>
     <tr>
         <td>Tanggal Acara</td>
         <td>: <?= date('d F Y', strtotime($pengundang['tanggal_acara'])); ?></td>
     </tr>
     <tr>
       <td>Status Pembayaran</td>
       <td>
          <?php if ($pengundang['status_undang'] == 0): ?>
            : Belum Lunas
          <?php else: ?>
            : Lunas
          <?php endif ?>
       </td>
     </tr>
     <tr style="font-weight: bold;color: red">
       <td>Total Biaya pengundang</td>
       <td>: Rp. <?= number_format($pengundang['biaya_undang'],0,',','.'); ?></td>
     </tr>
 </table>