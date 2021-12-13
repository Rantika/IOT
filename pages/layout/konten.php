<?php
if (isset($_GET['page'])) {
  if ($_GET['page']=="karyawan") {
    include 'include/karyawan.php';
  } elseif ($_GET['page']=="jenis") {
    include 'include/jenis.php';
  } elseif ($_GET['page']=="kendaraan") {
    include 'include/kendaraan.php';
  } else {
    include 'include/main.php';
  }
} else {
  include 'include/main.php';
}
?>