<?php
include '../koneksi.php';
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: login.php?gagal=1");
  exit;
}
$id = $_GET['id'];
$cari_gambar = mysqli_query($koneksi, "SELECT * FROM gambar WHERE id_gambar = '$id'");
$gambar = mysqli_fetch_assoc($cari_gambar);
if (isset($_POST['simpan'])) {
  $id_artikel = $_POST['id_artikel'];
  // input gambar
  $ekstensi_diperbolehkan = array('png', 'jpeg', 'jpg');
  $foto = $_FILES['foto']['name'];
  if ($foto != "") {
    $x = explode('.', $foto);
    $ekstensi = strtolower(end($x));
    $ukuran = $_FILES['foto']['size'];
    $file_tmp = $_FILES['foto']['tmp_name'];
    $fotobaru = date('H-i-s-d-m-Y') . " - " . $foto;
    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true  && move_uploaded_file($file_tmp, '../assets/images/artikel/gambarlain/' . $fotobaru)) {
      if (is_file("../assets/images/artikel/gambarlain/" . $gambar['foto'])) {
        unlink("../assets/images/artikel/gambarlain/" . $gambar['foto']);
      }
      $ubah = mysqli_query($koneksi, "UPDATE gambar SET id_artikel='$id_artikel', foto='$fotobaru' WHERE id_gambar='$id'");
      if ($ubah) {
        header('location: galeri.php?edit=1');
      }
    }
  } else if ($foto = "") {
    mysqli_query($koneksi, "UPDATE gambar SET id_artikel='$id_artikel' WHERE id_gambar='$id'");
    header('location: galeri.php?edit=1');
  } else {
    mysqli_query($koneksi, "UPDATE gambar SET id_artikel='$id_artikel' WHERE id_gambar='$id'");
    header('location: galeri.php?edit=1');
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

    div.form-group i.info {
      font-size: 13px;
      color: red;
    }

    main div h1.h1 {
      float: left;
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
          <h2 class="h2"><i class="fas fa-image me-1"></i> Edit Galeri</h2>
        </div>
        <div class="container mb-5">
          <form action="" method="POST" enctype="multipart/form-data">
            <?php
            $id = $_GET['id'];
            $cari_gambar = mysqli_query($koneksi, "SELECT * FROM gambar WHERE id_gambar = '$id'");
            $gambar = mysqli_fetch_assoc($cari_gambar);
            $cari_artikel = mysqli_query($koneksi, "SELECT * FROM artikel WHERE id_artikel = '$gambar[id_artikel]' ORDER BY artikel.id_artikel DESC");
            $artikel = mysqli_fetch_assoc($cari_artikel);
            ?>
            <div class="form-group mt-2">
              <label for="id_artikel">Artikel</label>
              <select name="id_artikel" id="id_artikel" class="form-control mt-1" required>
                <option value="<?= $artikel['id_artikel'] ?>"><?= $artikel['kategori'] . " - " . $artikel['judul'] . " - " . $artikel['asal'] ?></option>
                <?php
                $cari = mysqli_query($koneksi, "SELECT * FROM artikel ORDER BY id_artikel DESC");
                while ($data = mysqli_fetch_assoc($cari)) :
                ?>
                  <option value="<?= $data['id_artikel'] ?>"><?= $data['kategori'] . " - " . $data['judul'] . " - " . $data['asal'] ?></option>
                <?php
                endwhile;
                ?>
              </select>
            </div>
            <div class="form-group mt-2">
              <label for="foto">Gambar</label><br>
              <a class="MagicZoom" href="../assets/images/artikel/gambarlain/<?= $gambar['foto'] ?>" rel="zoom-id:zoom;opacity-reverse:true;"><img src="../assets/images/artikel/gambarlain/<?= $gambar['foto'] ?>" width="200" height="145" class="mt-1"></a><br>
              <i class="info">*Klik gambar untuk melihat lebih detail.</i><br>
              <input type="file" accept="image/*" name="foto" id="foto" class="form-control mt-2">
              <i class="info">*Abaikan jika tidak merubah gambar.</i>
            </div>
            <a href="galeri.php" class="btn btn-danger mt-4 mb-5"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
            <button class="btn btn-success mt-4 mb-5 ms-3" type="submit" name="simpan"><i class="fas fa-check-circle"></i> Simpan</button>
          </form>
        </div>
      </main>
      <?php
      include 'layout/footer.php';
      ?>
      <?php if (isset($_GET['gagal'])) { ?>
        <div class="flash-data fd-1" data-flashdata="<?= $_GET['gagal']; ?>"></div>
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
        text: 'Harap mengisi data artikel dengan benar!'
      })
    }
  </script>
</body>

</html>