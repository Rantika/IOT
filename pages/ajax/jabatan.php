<?php

include '../../include/db.php';

if (isset($_GET['act'])) {
	if ($_GET['act'] == 'get') {
		$jabatan = $koneksi->query("SELECT * FROM jabatan");

		$data = array();
		while ($j = $jabatan->fetch_assoc()) {
			$data[] = [
				'id' => $j['id'],
				'jabatan' => $j['keterangan']
			];
		}

		echo json_encode($data);

		die;
	} elseif ($_GET['act'] == 'hapus') {
		$id = $_POST['id'];

		$cek = $koneksi->query("DELETE FROM jabatan WHERE id = '$id'");

		if ($cek) {
			echo 1;
		} else {
			echo 2;
		}
	} elseif ($_GET['act'] == 'post') {
		$jabatan = $_POST['jabatan'];

		$cek = $koneksi->query("INSERT INTO jabatan (keterangan) VALUES('$jabatan')");
		
		if ($cek) {
			echo 1;
		} else {
			echo 2;
		}
	} elseif ($_GET['act'] == 'update') {
		$id = $_POST['id'];
		$jabatan = $_POST['jabatan'];

		$cek = $koneksi->query("UPDATE jabatan SET keterangan = '$jabatan' WHERE id = '$id'");
		
		if ($cek) {
			echo 1;
		} else {
			echo 2;
		}
	}
}