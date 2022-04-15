<?php
include '../koneksi.php';
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: login.php?gagal=1");
  exit;
}
$id = $_GET['id'];
$cari = mysqli_query($koneksi, "SELECT * FROM artikel WHERE id_artikel = '$id'");
$data = mysqli_fetch_assoc($cari);
if (is_file("../assets/images/artikel/".$data['gambar'])) {
    unlink("../assets/images/artikel/".$data['gambar']);
}
$hapus = mysqli_query($koneksi, "DELETE FROM artikel WHERE id_artikel = '$id'");
if ($hapus) {
	header('location: wisata.php?hapus=1');
}
?>