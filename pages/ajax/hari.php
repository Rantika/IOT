<?php

include '../../include/db.php';

$ambil = $koneksi->query("SELECT * FROM kendaraan WHERE hari = 'senin'");
$hitung = $ambil->num_rows;
echo $hitung;