<html><head>
	<title><?= $judul; ?></title>

	<style type="text/css">
		table {
			border-style: double;
			border-width: 3px;
			border-color: white;
		}
		table tr .text2 {
			text-align: right;
			font-size: 14px;
		}
		table tr .text {
			text-align: center;
			font-size: 14px;
		}
		table tr td {
			font-size: 14px;
		}

		.besar{
				text-transform: uppercase;
			}

	</style>

</head><body>

	<center>
		<table width="500">
			<tr>
				<td width="60"><img src="<?= $gambar; ?>" width="70" height="70"></td>
				<td width="400">
				<center>
					<font size="5" class="besar"><b><?= $user_sanggar['nama_sanggar']; ?></b></font><br>
					<font size="2"><i><?= $user_sanggar['alamat']; ?></i></font>
				</center>
				</td>
			</tr>
			<tr>
				<td colspan="2"><hr></td>
			</tr>
		<table width="500">
			<tr>
				<td class="text2">Jakarta, <?= date('l d F Y'); ?></td>
			</tr>
		</table>
		</table>

		<table width="550" style="text-align: left;margin-top: 5px;">
			<tr style="margin-bottom: 5">
				<td width="20px"><b>No</b></td>
				<td width="200px"><b>Nama</b></td>
				<td><b>Kelas</b></td>
				<td><b>Tanggal Pendaftaran</b></td>
				<td><b>Status Pendaftaran</b></td>
			</tr>
			<?php $no=1; foreach ($data_filter as $p): ?>
			<tr>
				<td><?= $no++; ?></td>
				<td><?= $p['nama']; ?></td>
				<td><?= $p['nama_kelas']; ?></td>
				<td><?= date('d/m/Y',strtotime($p['tanggal_pendaftaran'])); ?></td>
				<td>
					<?php if ($p['status_pendaftaran'] == 1): ?>
					Menunggu Konfirmasi
					<?php else: ?>
					Diterima
					<?php endif ?>	
				</td>
			</tr>
			<?php endforeach ?>
		</table>
	</center>
</body></html>