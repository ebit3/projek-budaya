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

    div.pag ul li.khusus {
      width: 90px;
      text-align: center;
    }

    div.footer {
      position: fixed;
      bottom: 0;
      --bs-bg-opacity: 1;
      background-color: rgba(var(--bs-light-rgb), var(--bs-bg-opacity));
      border-top: solid 1px #ccc;
    }

    div.bg-info p.info {
      color: red;
    }

    table tr td a.btn {
      width: 74px;
      margin-top: 2px;
      margin-bottom: 2px;
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
    <form action="" method="POST" class="w-100 mb-0">
      <?php
      if (isset($_POST['search'])) {
      ?>
        <input class="form-control form-control-dark" type="text" placeholder="Search" aria-label="Search" name="search" value="<?= $_POST['search'] ?>">
      <?php
      } else {
      ?>
        <input class="form-control form-control-dark" type="text" placeholder="Search" aria-label="Search" name="search">
      <?php } ?>
    </form>
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
          <h2 class="h2"><i class="fas fa-image me-1"></i> Galeri</h2>
        </div>
        <a href="tambah_galeri.php" class="btn btn-primary mt-2"><i class="fas fa-plus me-1"></i> Tambah</a>
        <div class="table-responsive mt-4">
          <table class="table table-striped table-bordered text-center">
            <tr>
              <th>No.</th>
              <th>Artikel</th>
              <th>Gambar</th>
              <th>Aksi</th>
            </tr>
            <?php
            include '../koneksi.php';
            $no = 1;
            $batas = 10;
            $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
            $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;
            $previous = $halaman - 1;
            $next = $halaman + 1;
            if (isset($_POST['search'])) {
              $data = mysqli_query($koneksi, "SELECT * FROM gambar, artikel WHERE gambar.id_artikel = artikel.id_artikel AND artikel.judul LIKE '%" . $_POST['search'] . "%' ORDER BY gambar.id_gambar DESC") or die(mysqli_error($koneksi));
              $jumlah_data = mysqli_num_rows($data);
              $total_halaman = ceil($jumlah_data / $batas);
              $syarat = mysqli_query($koneksi, "SELECT * FROM gambar, artikel WHERE gambar.id_artikel = artikel.id_artikel AND artikel.judul LIKE '%" . $_POST['search'] . "%' ORDER BY gambar.id_gambar DESC LIMIT $halaman_awal, $batas");
            } else {
              $data = mysqli_query($koneksi, "SELECT * FROM gambar, artikel WHERE gambar.id_artikel = artikel.id_artikel ORDER BY gambar.id_gambar DESC") or die(mysqli_error($koneksi));
              $jumlah_data = mysqli_num_rows($data);
              $total_halaman = ceil($jumlah_data / $batas);
              $syarat = mysqli_query($koneksi, "SELECT * FROM gambar, artikel WHERE gambar.id_artikel = artikel.id_artikel ORDER BY gambar.id_gambar DESC LIMIT $halaman_awal, $batas");
            }
            $nomor = $halaman_awal + 1;
            while ($data = mysqli_fetch_assoc($syarat)) :
            ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $data['kategori'] . " - " . $data['judul'] . " - " . $data['asal'] ?></td>
                <td><img src="../assets/images/artikel/gambarlain/<?= $data['foto'] ?>" width="100" height="80"></td>
                <td>
                  <a href="edit_galeri.php?id=<?= $data['id_gambar'] ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Edit</a>
                  <a href="hapus_galeri.php?id=<?= $data['id_gambar'] ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i> Hapus</a>
                </td>
              </tr>
            <?php
            endwhile;
            ?>
          </table>
        </div>
        <?php
        if ($jumlah_data == 0) {
          $info = "*Tidak ada data yang ditemukan";
        ?>
          <div class="bg-info mt-2 mb-4">
            <p class="text-center info"><i><?= $info; ?></i></p>
          </div>
        <?php } ?>
        <div class="mt-3 mb-5 pag">
          <ul class="pagination justify-content-center mt-2 mb-2">
            <li class="page-item khusus">
              <a class="page-link" <?php if ($halaman > 1) {
                                      echo "href='?halaman=$previous'";
                                    } ?>>Previous</a>
            </li>
            <?php
            for ($x = 1; $x <= $total_halaman; $x++) {
            ?>
              <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
            <?php
            }
            ?>
            <li class="page-item khusus">
              <a class="page-link" <?php if ($halaman < $total_halaman) {
                                      echo "href='?halaman=$next'";
                                    } ?>>Next</a>
            </li>
          </ul>
        </div>
      </main>
      <?php
      include 'layout/footer.php';
      ?>
      <?php if (isset($_GET['tambah'])) { ?>
        <div class="flash-data fd-1" data-flashdata="<?= $_GET['tambah']; ?>"></div>
      <?php } else if (isset($_GET['edit'])) { ?>
        <div class="flash-data2 fd-2" data-flashdata2="<?= $_GET['edit']; ?>"></div>
      <?php } else if (isset($_GET['hapus'])) { ?>
        <div class="flash-data3 fd-3" data-flashdata3="<?= $_GET['hapus']; ?>"></div>
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
        icon: 'success',
        title: 'Berhasil',
        text: 'Data Galeri sudah ditambahkan!'
      })
    }
    const flashdata2 = $('.fd-2').data('flashdata2')
    if (flashdata2) {
      Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: 'Data Galeri sudah diubah!'
      })
    }
    const flashdata3 = $('.fd-3').data('flashdata3')
    if (flashdata3) {
      Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: 'Data Galeri sudah dihapus!'
      })
    }
  </script>
</body>

</html>