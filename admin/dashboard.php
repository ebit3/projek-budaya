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

    div.row div.col-lg-4 div.small-box {
      border-radius: 3px;
      padding: 20px;
      margin-right: 40px;
      margin-left: 40px;
      box-shadow: 0 1px 5px rgba(0, 0, 0, 0.4);
      color: #fff;
      align-items: center;
      text-align: center;
    }

    div.row div.col-lg-4 div.small-box p {
      font-size: 20px;
      margin-top: 15px;
    }

    div.row div.col-lg-4 div.small-box p i {
      margin-right: 5px;
    }

    div.row div.col-lg-4 div.small-box-footer a.btn {
      background-color: rgba(0, 0, 0, 0.3);
      width: 85%;
      padding: 10px;
      margin-top: 40px;
      color: #fff;
    }

    div.row div.col-lg-4 div.small-box-footer a.btn:hover {
      width: 95%;
      transition: 0.4s;
      background-color: #0d6efd;
    }

    div.row div.col-lg-4 div.small-box-footer a i {
      margin-left: 10px;
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

      div.row div.col-lg-4 div.small-box {
        margin-left: 0;
        margin-right: 0;
      }
    }
  </style>
  <!-- Custom styles for this template -->
  <link href="../assets/css/dashboard.css" rel="stylesheet" type="text/css">
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
    <div class="row mb-5">
      <?php
      include 'layout/sidebar.php';
      ?>
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h2 class="h2"><i class="fas fa-tachometer-alt me-1"></i> Dashboard</h2>
        </div>
        <div class="row mb-5">
          <?php
          $cari_user = mysqli_query($koneksi, "SELECT COUNT(id_user) AS jumlah_user FROM users");
          $users = mysqli_fetch_assoc($cari_user);
          $cari_gambar = mysqli_query($koneksi, "SELECT COUNT(id_gambar) AS jumlah_gambar FROM gambar");
          $gambar = mysqli_fetch_assoc($cari_gambar);
          $cari_artikel = mysqli_query($koneksi, "SELECT COUNT(id_artikel) AS jumlah_artikel FROM artikel");
          $artikel = mysqli_fetch_assoc($cari_artikel);
          ?>
          <div class="col-lg-4 mt-3 mb-3">
            <div class="small-box bg-info">
              <h1 class="text-center"><?= $users['jumlah_user'] ?></h1>
              <p class="text-center"><i class="fas fa-users"></i> Data User</p>
              <div class="small-box-footer">
                <a class="btn" href="users.php">Info lebih lanjut<i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mt-3 mb-3">
            <div class="small-box bg-danger">
              <h1 class="text-center"><?= $artikel['jumlah_artikel'] ?></h1>
              <p class="text-center"><i class="fas fa-newspaper"></i> Data Artikel</p>
              <div class="small-box-footer">
                <a class="btn" href="budaya.php">Info lebih lanjut<i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mt-3 mb-3">
            <div class="small-box bg-warning">
              <h1 class="text-center"><?= $gambar['jumlah_gambar'] ?></h1>
              <p class="text-center"><i class="fas fa-image"></i> Data Galeri</p>
              <div class="small-box-footer">
                <a class="btn" href="galeri.php">Info lebih lanjut<i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>
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