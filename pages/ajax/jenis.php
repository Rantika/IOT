<?php

include '../../include/db.php';

if (isset($_GET['act'])) {
	if ($_GET['act'] == 'hapus') {
		$id = $_POST['id'];

		$cek = $koneksi->query("DELETE FROM jenis WHERE id = '$id'");

		if ($cek) {
			echo 1;
		} else {
			echo 2;
		}
	} elseif ($_GET['act'] == 'post') {
		$jenis = $_POST['jenis'];

		$cek = $koneksi->query("INSERT INTO jenis (jenis) VALUES('$jenis')");
		
		if ($cek) {
			echo 1;
		} else {
			echo 2;
		}
	} elseif ($_GET['act'] == 'update') {
		$id = $_POST['id'];
		$jenis = $_POST['jenis'];

		$cek = $koneksi->query("UPDATE jenis SET jenis = '$jenis' WHERE id = '$id'");
		
		if ($cek) {
			echo 1;
		} else {
			echo 2;
		}
	} elseif ($_GET['act'] == 'select') {
		$jenis = $koneksi->query("SELECT * FROM jenis");

		$data = array();

		while ($j = $jenis->fetch_assoc()) {
			echo "<option value=$j[id]>$j[jenis]</option>";
		}

		die;
	} elseif ($_GET['act'] == 'select-by-id') {
		$id_jenis = $_GET['jenis'];
		$jenis = $koneksi->query("SELECT * FROM jenis");

		$data = array();

		while ($j = $jenis->fetch_assoc()) {
			echo "<option ". ($id_jenis == $j['id']  ? "selected" : "") ." value=$j[id]>$j[jenis]</option>";
		}

		die;
	}
} else {
	$jenis = $koneksi->query("SELECT * FROM jenis");

	$data = array();
	while ($j = $jenis->fetch_assoc()) {
		$data[] = [
			'id' => $j['id'],
			'jenis' => $j['jenis']
		];
	}

	echo json_encode($data);

	die;
}