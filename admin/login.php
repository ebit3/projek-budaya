<?php
include '../koneksi.php';
session_start();
if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $cari = mysqli_query($koneksi, "SELECT * FROM users WHERE username = '$username' AND password = '$password'");
  $cek = mysqli_num_rows($cari);
  if ($cek > 0) {
    $_SESSION['username'] = $_POST['username'];
    header("Location: dashboard.php");
  } else {
    header("Location: login.php?salah=1");
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

    .card {
      width: 100%;
      max-width: 350px;
      margin: auto;
      padding: 20px;
      border-radius: 20px;
      box-shadow: 0 1px 15px rgba(0, 0, 0, 0.5);
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
  <!-- Custom styles for this template -->
  <link href="../assets/css/login.css" rel="stylesheet">
</head>

<body class="text-center">
  <?php if (isset($_GET['gagal'])) { ?>
    <div class="flash-data fd-1" data-flashdata="<?= $_GET['gagal']; ?>"></div>
  <?php } else if (isset($_GET['salah'])) { ?>
    <div class="flash-data2 fd-2" data-flashdata2="<?= $_GET['salah']; ?>"></div>
  <?php } ?>
  <div class="card">
    <main class="form-signin">
      <form action="" method="POST">
        <img src="../assets/images/logobudayakita2.png" width="280">
        <div class="form-floating mt-4">
          <input type="text" class="form-control" name="username" id="floatingUsername" placeholder="Username" required autocomplete="off">
          <label for="floatingUsername">Username</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password" required autocomplete="off">
          <label for="floatingPassword">Password</label>
        </div>
        <button class="w-100 btn btn-lg btn-primary mt-3" type="submit" name="login">Login</button>
      </form>
    </main>
  </div>
  <!-- JQuery -->
  <script src="../assets/jquery/jquery.min.js"></script>
  <script src="../assets/sweetalert/sweetalert2.all.min.js"></script>
  <script type="text/javascript">
    const flashdata = $('.fd-1').data('flashdata')
    if (flashdata) {
      Swal.fire({
        icon: 'warning',
        title: 'Peringatan',
        text: 'Harap Login terlebih dahulu!'
      })
    }
    const flashdata2 = $('.fd-2').data('flashdata2')
    if (flashdata2) {
      Swal.fire({
        icon: 'error',
        title: 'Login gagal',
        text: 'Username atau Password salah!'
      })
    }
  </script>
</body>

</html>