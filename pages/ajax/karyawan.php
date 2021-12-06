<?php

include '../../include/db.php';

if (isset($_GET['act'])) {
	if ($_GET['act'] == 'get') {
		$karyawan = $koneksi->query("SELECT * FROM karyawan JOIN jabatan ON karyawan.jabatan = jabatan.id");

		$data = array();
		while ($k = $karyawan->fetch_assoc()) {
			$data[] = [
				'no_unik' => $k['no_unik'],
				'nama' => $k['nama'],
				'jabatan' => $k['keterangan'],
				'telepon' => $k['telepon'],
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