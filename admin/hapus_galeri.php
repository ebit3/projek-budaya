<?php
include '../koneksi.php';
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: login.php?gagal=1");
  exit;
}
$id = $_GET['id'];
$cari = mysqli_query($koneksi, "SELECT * FROM gambar WHERE id_gambar = '$id'");
$data = mysqli_fetch_assoc($cari);
if (is_file("../assets/images/artikel/gambarlain/".$data['foto'])) {
    unlink("../assets/images/artikel/gambarlain/".$data['foto']);
}
$hapus = mysqli_query($koneksi, "DELETE FROM gambar WHERE id_gambar = '$id'");
if ($hapus) {
	header('location: galeri.php?hapus=1');
}
?>