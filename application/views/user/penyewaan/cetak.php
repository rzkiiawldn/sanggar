<table style="width: 45%">
  <h2>Invoice Pembayaran Anda</h2>
     <tr>
         <td>Kode Penyewaan</td>
         <td>: <?= $penyewaan['kode_sewa']; ?></td>
     </tr>
     <tr>
         <td>Nama Penyewa</td>
         <td>: <?= $penyewaan['nama']; ?></td>
     </tr>
     <tr>
         <td>Nama Sanggar</td>
         <td>: <?= $penyewaan['nama_sanggar']; ?></td>
     </tr>
     <tr>
         <td>Atribut</td>
         <td>: <?= $penyewaan['nama_atribut']; ?></td>
     </tr>
     <tr>
         <td>Tanggal Penyewaan</td>
         <td>: <?= date('d F Y', strtotime($penyewaan['tanggal_sewa'])); ?></td>
     </tr>
     <tr>
         <td>Tanggal Pengembalian</td>
         <td>: <?= date('d F Y', strtotime($penyewaan['tanggal_kembali'])); ?></td>
     </tr>
     <tr>
       <td>Lama Sewa</td>
       <td>: <?= $penyewaan['lama_sewa']; ?> Hari</td>
     </tr>
     <tr>
       <td>Status Pembayaran</td>
       <td>
          <?php if ($penyewaan['status_sewa'] == 0): ?>
            : Belum Lunas
          <?php else: ?>
            : Lunas
          <?php endif ?>
       </td>
     </tr>
     <tr style="font-weight: bold;color: red">
       <td>Total Biaya Penyewaan</td>
       <td>: Rp. <?= number_format($penyewaan['harga_sewa'],0,',','.'); ?></td>
     </tr>
 </table>