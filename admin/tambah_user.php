<?php
include '../koneksi.php';
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: login.php?gagal=1");
  exit;
}
if (isset($_POST['simpan'])) {
  $username = $_POST['username'];
  $nama = $_POST['nama'];
  $password = $_POST['password'];
  $cek = mysqli_query($koneksi, "SELECT * FROM users WHERE username = '$username'");
  if (mysqli_num_rows($cek)) {
    header("Location: tambah_user.php?duplikat=1");
  } else {
    $simpan = mysqli_query($koneksi, "INSERT INTO users VALUES ('','$username','$nama','$password')");
    if ($simpan) {
      header("Location: users.php?tambah=1");
    }
  }
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
          <h2 class="h2"><i class="fas fa-users me-1"></i> Tambah Users</h2>
        </div>
        <div class="container mb-5">
          <form action="" method="POST">
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control mt-1" name="username" id="username" placeholder="Username" required autocomplete="off">
            </div>
            <div class="form-group mt-2">
              <label for="nama">Nama</label>
              <input type="text" class="form-control mt-1" name="nama" id="nama" placeholder="Nama" required autocomplete="off">
            </div>
            <div class="form-group mt-2">
              <label for="password">Password</label>
              <input type="text" class="form-control mt-1" name="password" id="password" placeholder="Password" required autocomplete="off">
            </div>
            <a href="users.php" class="btn btn-danger mt-5"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
            <button class="btn btn-success mt-5 ms-3" type="submit" name="simpan"><i class="fas fa-check-circle"></i> Simpan</button>
          </form>
        </div>
      </main>
      <?php
      include 'layout/footer.php';
      ?>
      <?php if (isset($_GET['duplikat'])) { ?>
        <div class="flash-data fd-1" data-flashdata="<?= $_GET['duplikat']; ?>"></div>
      <?php } ?>
    </div>
  </div>
  <script type="text/javascript" src="../assets/js/dashboard.js"></script>
  <!-- JQuery -->
  <script src="../assets/jquery/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="../assets/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/sweetalert/sweetalert2.all.min.js"></script>
  <script type="text/javascript">
    const flashdata = $('.fd-1').data('flashdata')
    if (flashdata) {
      Swal.fire({
        icon: 'error',
        title: 'Gagal disimpan',
        text: 'Data User sudah ada!'
      })
    }
  </script>
</body>

</html>