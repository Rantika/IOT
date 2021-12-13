<?php

include '../../include/db.php';

if (isset($_GET['act'])) {
	if ($_GET['act'] == 'hapus') {
		$unik = $_POST['unik'];

		$cek = $koneksi->query("DELETE FROM karyawan WHERE unik = '$unik'");

		if ($cek) {
			echo 1;
		} else {
			echo 2;
		}
	} elseif ($_GET['act'] == 'post') {
		$unik = $_POST['unik'];
		$nama = $_POST['nama'];
		$telepon = $_POST['telepon'];
		$jenis = $_POST['jenis'];

		$cek = $koneksi->query("INSERT INTO karyawan (unik, nama, id_jenis, telepon) VALUES('$unik', '$nama', '$jenis', '$telepon')");
		
		if ($cek) {
			echo 1;
		} else {
			echo 2;
		}
	} elseif ($_GET['act'] == 'update') {
		$unik = $_POST['unik'];
		$nama = $_POST['nama'];
		$telepon = $_POST['telepon'];
		$jenis = $_POST['jenis'];

		$cek = $koneksi->query("UPDATE karyawan SET nama = '$nama', telepon = '$telepon', id_jenis = '$jenis' WHERE unik = '$unik'");
		
		if ($cek) {
			echo 1;
		} else {
			echo 2;
		}
	}
} else {
	$karyawan = $koneksi->query("SELECT * FROM karyawan JOIN jenis ON karyawan.id_jenis = jenis.id");

	$data = array();
	while ($k = $karyawan->fetch_assoc()) {
		$data[] = [
			'unik' => $k['unik'],
			'nama' => $k['nama'],
			'jenis' => $k['jenis'],
			'id_jenis' => $k['id_jenis'],
			'telepon' => $k['telepon'],
		];
	}

	echo json_encode($data);

	die;
}