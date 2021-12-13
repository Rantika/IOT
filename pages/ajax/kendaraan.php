<?php

include '../../include/db.php';

$kendaraan = $koneksi->query("SELECT kendaraan.*, karyawan.nama, jenis.jenis, karyawan.telepon FROM kendaraan LEFT JOIN karyawan ON kendaraan.unik = karyawan.unik LEFT JOIN jenis ON karyawan.id_jenis = jenis.id;");

$data = array();

$no = 1;

while ($k = $kendaraan->fetch_assoc()) {
	$bulan = bulan(date("m", strtotime($k['waktu'])));
	$hari = hari(date("l", strtotime($k['waktu'])));
	$tanggal = date("d", strtotime($k['waktu']));
	$data[] = [
		'no' => $no++,
		'unik' => $k['unik'],
		'nama' => $k['nama'],
		'jenis' => $k['jenis'],
		'telepon' => $k['telepon'],
		'tanggal' => $hari.", ".$tanggal." ".$bulan." ".date("Y", strtotime($k['waktu'])),
		'waktu' => date("H:i:s a", strtotime($k['waktu'])),
		'aksi' => $k['aksi'],
	];
}

echo json_encode($data);

die;