<?php
if (isset($_GET['page'])) {
  if ($_GET['page']=="karyawan") {
    include 'include/karyawan.php';
  } elseif ($_GET['page']=="jabatan") {
    include 'include/jabatan.php';
  } else {
    include 'include/main.php';
  }
} else {
  include 'include/main.php';
}
?>