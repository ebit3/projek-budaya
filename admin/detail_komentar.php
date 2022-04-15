<?php
include '../koneksi.php';
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: login.php?gagal=1");
  exit;
}
?>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Budaya Kita</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/fontawesome-free-5.15.4-web/css/all.min.css">
  <!--Bootstrap-->
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <!-- Icon -->
  <link rel="icon" href="../assets/images/iconbudayakita.png">
  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    nav ul li a.nav-link {
      font-size: 16px;
    }

    table tr {
      vertical-align: middle;
    }

    div.form-group label {
      font-size: 16px;
      font-weight: bold;
    }

    div.footer {
      position: fixed;
      bottom: 0;
      --bs-bg-opacity: 1;
      background-color: rgba(var(--bs-light-rgb), var(--bs-bg-opacity));
      border-top: solid 1px #ccc;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
  <!-- Custom styles for this template -->
  <link href="../assets/css/dashboard.css" rel="stylesheet">
</head>

<body>

  <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 text-center ml-0" href="#"><img src="../assets/images/logobudayakita.png" width="160"></a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark" style="background-color: rgba(255, 255, 255, .1);" readonly>
    <div class="navbar-nav">
      <div class="nav-item text-nowrap">
        <a class="nav-link px-3" href="logout.php"><i class="fas fa-home me-2"></i>Log out</a>
      </div>
    </div>
  </header>

  <div class="container-fluid">
    <div class="row">
      <?php
      include 'layout/sidebar.php';
      ?>
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h2 class="h2"><i class="fas fa-comments me-1"></i> Detail Komentar</h2>
        </div>
        <div class="container mb-5">
          <form action="" method="POST">
            <?php
            $id = $_GET['id'];
            $cari = mysqli_query($koneksi, "SELECT * FROM komentar, artikel WHERE komentar.id_artikel = artikel.id_artikel AND komentar.id_komentar = '$id'");
            $data = mysqli_fetch_assoc($cari);
            $tgl = date_create($data['tanggal_komentar']);
            $format_tgl = date_format($tgl, 'd');
            $format_thn = date_format($tgl, 'Y');
            if (date_format($tgl, 'F') == 'January') {
              $format_bln = 'Januari';
            } else if (date_format($tgl, 'F') == 'February') {
              $format_bln = 'Februari';
            } else if (date_format($tgl, 'F') == 'March') {
              $format_bln = 'Maret';
            } else if (date_format($tgl, 'F') == 'April') {
              $format_bln = 'April';
            } else if (date_format($tgl, 'F') == 'May') {
              $format_bln = 'Mei';
            } else if (date_format($tgl, 'F') == 'June') {
              $format_bln = 'Juni';
            } else if (date_format($tgl, 'F') == 'July') {
              $format_bln = 'Juli';
            } else if (date_format($tgl, 'F') == 'August') {
              $format_bln = 'Agustus';
            } else if (date_format($tgl, 'F') == 'September') {
              $format_bln = 'September';
            } else if (date_format($tgl, 'F') == 'October') {
              $format_bln = 'Oktober';
            } else if (date_format($tgl, 'F') == 'November') {
              $format_bln = 'November';
            } else if (date_format($tgl, 'F') == 'December') {
              $format_bln = 'Desember';
            } else {
              $format_bln = 'Tidak Ada';
            }
            ?>
            <div class="form-group">
              <label for="artikel">Artikel</label>
              <input type="text" class="form-control mt-1" name="artikel" id="artikel" value="<?= $data['kategori'] . " - " . $data['judul'] ?>" readonly>
            </div>
            <div class="form-group mt-2">
              <label for="nama">Nama Pengunjung</label>
              <input type="text" class="form-control mt-1" name="nama" id="nama" value="<?= $data['nama'] ?>" readonly>
            </div>
            <div class="form-group mt-2">
              <label for="tanggal">Tanggal</label>
              <input type="text" class="form-control mt-1" name="tanggal" id="tanggal" value="<?= $format_tgl . " " . $format_bln . " " . $format_thn ?>" readonly>
            </div>
            <div class="form-group mt-2">
              <label for="komentar">Isi Komentar</label>
              <textarea name="komentar" id="komentar" class="form-control mt-1" readonly><?= $data['komentar'] ?></textarea>
            </div>
            <a href="komentar.php" class="btn btn-danger mt-4 mb-5"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
          </form>
        </div>
      </main>
      <?php
      include 'layout/footer.php';
      ?>
    </div>
  </div>
  <script type="text/javascript" src="../assets/js/dashboard.js"></script>
  <!-- JQuery -->
  <script src="../assets/jquery/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="../assets/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/sweetalert/sweetalert2.all.min.js"></script>
  <script type="text/javascript">

  </script>
</body>

</html>