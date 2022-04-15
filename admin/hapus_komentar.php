<?php
include '../koneksi.php';
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: login.php?gagal=1");
  exit;
}
$id = $_GET['id'];
$hapus = mysqli_query($koneksi, "DELETE FROM komentar WHERE id_komentar = '$id'");
if ($hapus) {
	header('location: komentar.php?hapus=1');
}
?>