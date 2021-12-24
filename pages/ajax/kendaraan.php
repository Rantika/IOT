<?php

include '../../include/db.php';

if (isset($_POST['tglm'])) {
	$tglm = $_POST['tglm'];
	$tgls = $_POST['tgls'];
	$kendaraan = $koneksi->query("SELECT * FROM kendaraan WHERE waktu BETWEEN '$tglm' AND '$tgls'");
} else {
	$kendaraan = $koneksi->query("SELECT * FROM kendaraan");
}

$data = array();

$no = 1;

while ($k = $kendaraan->fetch_assoc()) { 
	$bulan = bulan(date("m", strtotime($k['waktu'])));
	$hari = hari(date("l", strtotime($k['waktu'])));
	$tanggal = date("d", strtotime($k['waktu']));
	?>
<tr>
	<th><?= $no++ ?></th>
	<td><?= $k['unik'] ?></td>
	<td><?= $hari.", ".$tanggal." ".$bulan." ".date("Y", strtotime($k['waktu'])) ?></td>
	<td><?= date("H:i:s a", strtotime($k['waktu'])) ?></td>
</tr>

<?php
}