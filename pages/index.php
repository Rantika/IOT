<?php
session_start();

include '../include/db.php';

if (empty($_SESSION['logged'])) {
  echo "<script>alert('Anda harus login dulu!'); location.href = '/';</script>";
}

$email = $_SESSION['logged']['username'];

include './layout/header.php'; 
include './layout/navbar.php'; 
include './layout/sidebar.php'; 
include './layout/konten.php'; 
include './layout/footer.php'; 
?>