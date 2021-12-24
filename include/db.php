<?php
// die(password_hash("admin", PASSWORD_DEFAULT));
$koneksi = new mysqli('localhost', 'root', '', 'iot');

function hari($value='')
{
	switch ($value) {
		case 'Sunday':
		return "Minggu";
		break;

		case 'Monday':
		return "Senin";
		break;

		case 'Tuesday':
		return"Selasa";
		break;

		case 'Wednesday':
		return"Rabu";
		break;

		case 'Thursday':
		return "Kamis";
		break;

		case 'Friday':
		return "Jum'at";
		break;

		case 'Saturday':
		return "Sabtu";
		break;

		default:
		return "Tidak ada hari yang dimaksud";
		break;
	}
}

function bulan($value='') {
	switch ($value) {
		case '01':
		return "Januari";
		break;

		case '02':
		return "Februari";
		break;

		case '03':
		return "Maret";
		break;

		case '04':
		return "April";
		break;

		case '05':
		return "Mei";
		break;

		case '06':
		return "Juni";
		break;

		case '07':
		return "Juli";
		break;

		case '08':
		return "Agustus";
		break;

		case '09':
		return "September";
		break;

		case '10':
		return "Oktober";
		break;

		case '11':
		return"November";
		break;

		case '12':
		return "Desember";
		break;

		default:
		return "Tidak ada bulan yang dimaksud";
		break;
	}
}
