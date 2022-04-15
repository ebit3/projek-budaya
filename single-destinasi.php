<?php

include 'koneksi.php';
session_start();

$id = $_GET['id'];

$query = mysqli_query($koneksi, "SELECT * FROM artikel WHERE id_artikel = '$id' ");

$data = mysqli_fetch_assoc($query);

$query2 = mysqli_query($koneksi, "SELECT * FROM gambar WHERE id_artikel = '$id'");

$query3 = mysqli_query($koneksi, "SELECT * FROM artikel ORDER BY RAND() LIMIT 5");

if (isset($_POST['submit'])) {
    # code...
    $id_artikel = $_POST['id_artikel'];
    $nama = $_POST['nama'];
    $komen = $_POST['komen'];

    $tambah = mysqli_query($koneksi, "INSERT INTO komentar VALUES ('', '$id_artikel', '$nama', '" . date("Y-m-d") . "', '$komen') ");
}

$tampil_komen = mysqli_query($koneksi, "SELECT * FROM komentar LEFT OUTER JOIN artikel ON komentar.id_artikel = artikel.id_artikel WHERE komentar.id_artikel = '$id' ");

// select * from komentar inner join artikel on komentar.id_artikel = artikel.id_artikel where id_artikel = '$id' WHERE B.columnName IS NULL
if (isset($_POST['bintang1'])) {
    $rating = 1;
    $perating = 1;
    $ubah = mysqli_query($koneksi, "UPDATE artikel SET rating = rating + '$rating', perating = perating + '$perating' WHERE id_artikel = '$id'");
    if ($ubah) {
        $_SESSION['rating'] = $id;
        echo "<script>alert('Terima kasih atas rating anda'); document.location='single-destinasi.php?id=".$id."'</script>";
    }
} else if (isset($_POST['bintang2'])) {
    $rating = 2;
    $perating = 1;
    $ubah = mysqli_query($koneksi, "UPDATE artikel SET rating = rating + '$rating', perating = perating + '$perating' WHERE id_artikel = '$id'");
    if ($ubah) {
        $_SESSION['rating'] = $id;
        echo "<script>alert('Terima kasih atas rating anda'); document.location='single-destinasi.php?id=".$id."'</script>";
    }
} else if (isset($_POST['bintang3'])) {
    $rating = 3;
    $perating = 1;
    $ubah = mysqli_query($koneksi, "UPDATE artikel SET rating = rating + '$rating', perating = perating + '$perating' WHERE id_artikel = '$id'");
    if ($ubah) {
        $_SESSION['rating'] = $id;
        echo "<script>alert('Terima kasih atas rating anda'); document.location='single-destinasi.php?id=".$id."'</script>";
    }
} else if (isset($_POST['bintang4'])) {
    $rating = 4;
    $perating = 1;
    $ubah = mysqli_query($koneksi, "UPDATE artikel SET rating = rating + '$rating', perating = perating + '$perating' WHERE id_artikel = '$id'");
    if ($ubah) {
        $_SESSION['rating'] = $id;
        echo "<script>alert('Terima kasih atas rating anda'); document.location='single-destinasi.php?id=".$id."'</script>";
    }
} else if (isset($_POST['bintang5'])) {
    $rating = 5;
    $perating = 1;
    $ubah = mysqli_query($koneksi, "UPDATE artikel SET rating = rating + '$rating', perating = perating + '$perating' WHERE id_artikel = '$id'");
    if ($ubah) {
        $_SESSION['rating'] = $id;
        echo "<script>alert('Terima kasih atas rating anda'); document.location='single-destinasi.php?id=".$id."'</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'layouts/head.php'; ?>
    <!-- css main -->
    <link rel="stylesheet" href="assets/css/index.css">

    <!-- js -->
    <!-- <script src="assets/js/bootstrap.min.js"></script> -->

    <title>Destinasi</title>

</head>

<body>
    <!-- header -->
    <header>
        <!-- navbar -->
        <?php include 'layouts/nav.php'; ?>

        <!-- carousel -->
        <div class="banner-singgle">
            <img src="assets/images/artikel/<?= $data['gambar']; ?>" alt="" srcset="">
        </div>
    </header>
    <style type="text/css">
        iframe {
            width: 92%;
            height: 450px;
            border: 0;
        }
        .rating {
            text-align: center;
        }
        .rating .btn {
            background: transparent;
            text-align: center;
        }
        .rating .btn i {
            color: gold;
            font-size: 40px;
        }
        .rating i.khusus {
            color: gold;
            font-size: 42px;
            padding: 15px;
        }
        @media screen and (max-width: 900px) {
            iframe {
                height: 400px;
            }
        }
        @media screen and (max-width: 600px) {
            iframe {
                height: 350px;
            }
        }
    </style>
    <!-- end header -->

    <!-- main -->
    <main class="main">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card card-singgle-article">
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Detail</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Lokasi</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Gambar</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="jadwal-tab" data-bs-toggle="tab" data-bs-target="#jadwal" type="button" role="tab" aria-controls="jadwal" aria-selected="false">Jadwal</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="card mt-3 card-singgle-banner">
                                        <img src="assets/images/artikel/<?= $data['gambar']; ?>" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h4 class="card-title mt-4 mb-4"><?= $data['judul']; ?></h4>
                                            <p class="card-text card-text-single"><?= $data['isi']; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="text-center mt-3">
                                        <iframe src="<?= $data['link']; ?>" allowfullscreen="" loading="lazy"></iframe>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                    <div class="row">
                                        <?php while ($d = mysqli_fetch_array($query2)) : ?>
                                            <div class="col-md-6">
                                                <a class="MagicZoom" href="assets/images/artikel/gambarlain/<?= $d['foto']; ?>" rel="zoom-id:zoom;opacity-reverse:true;"><img src="assets/images/artikel/gambarlain/<?= $d['foto']; ?>" alt="" style="width: 340px; height: 200px;" class="mt-2"></a>
                                            </div>
                                        <?php
                                        endwhile;
                                        ?>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="jadwal" role="tabpanel" aria-labelledby="jadwal-tab">
                                    <div class="row ms-2 me-2">
                                        <div class="col-md-10 mt-2">
                                            <p><?=$data['jadwal']; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Rating -->
                     <div class="card card-coment p-2 mb-5">
                        <div class="card-body">
                            <?php
                            if (isset($_SESSION['rating'])) {
                                if ($_SESSION['rating']==$id) { ?>
                                    <div class="card-title border-bottom p-3">
                                        <h4 class="text-center">PENILAIAN <span class="sub"> ARTIKEL </span> </h4>
                                    </div>
                                    <div class="rating">
                                    <?php
                                    $hasil_rating = $data['rating'] / $data['perating'];
                                    for ($i=0; $i < $hasil_rating; $i++) { ?>
                                        <i class="fas fa-star khusus"></i>
                                <?php    
                                } ?>
                                    </div>
                                <?php } else {
                            ?>
                            <div class="card-title border-bottom p-3">
                                <h4 class="text-center">PENILAIAN <span class="sub"> KAMU </span> </h4>
                            </div>
                            <div class="card-item mt-3">
                                <form action="" method="POST">
                                    <div class="rating">
                                        <button class="btn" type="submit" name="bintang1"><i class="far fa-star"></i></button>
                                        <button class="btn" type="submit" name="bintang2"><i class="far fa-star"></i></button>
                                        <button class="btn" type="submit" name="bintang3"><i class="far fa-star"></i></button>
                                        <button class="btn" type="submit" name="bintang4"><i class="far fa-star"></i></button>
                                        <button class="btn" type="submit" name="bintang5"><i class="far fa-star"></i></button>
                                    </div>
                                </form>
                            </div>
                            <?php } } else { ?>
                            <div class="card-title border-bottom p-3">
                                <h4 class="text-center">PENILAIAN <span class="sub"> KAMU </span> </h4>
                            </div>
                            <div class="card-item mt-3">
                                <form action="" method="POST">
                                    <div class="rating">
                                        <button class="btn" type="submit" name="bintang1"><i class="far fa-star"></i></button>
                                        <button class="btn" type="submit" name="bintang2"><i class="far fa-star"></i></button>
                                        <button class="btn" type="submit" name="bintang3"><i class="far fa-star"></i></button>
                                        <button class="btn" type="submit" name="bintang4"><i class="far fa-star"></i></button>
                                        <button class="btn" type="submit" name="bintang5"><i class="far fa-star"></i></button>
                                    </div>
                                </form>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <!-- End Rating -->

                    <!-- komen -->
                    <div class="card card-coment p-2 mb-5">
                        <div class="card-body">
                            <div class="card-title border-bottom p-3">
                                <h4 class="text-center">ULASAN <span class="sub"> TUR </span> </h4>
                            </div>
                            <div class="card-item mt-5">
                                <div class="sub-coment mb-3">
                                    <h6>Komentar kamu</h6>
                                </div>
                                <form action="" method="post">
                                    <div class="mb-3">
                                        <input type="hidden" name="id_artikel" id="" value="<?= $id; ?>">
                                        <textarea name="komen" id="" cols="30" rows="10" class="form-control form-coment" placeholder="Komentar"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama kamu">
                                    </div>
                                    <div class="mb-3">
                                        <input type="submit" name="submit" class="form-control btn" placeholder="Kirim" style="background-color:  #326e6c; color: #eee;">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- show komen -->
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title border-bottom p-3 mb-5">
                                <h4 class="text-center">ULASAN <span class="sub"> ARTIKEL </span> </h4>
                            </div>

                            <!--  -->
                            <?php while ($ambil = mysqli_fetch_assoc($tampil_komen)) : ?>
                                <div class="show-singgle mb-5">
                                    <ul class="list-group list-komen">
                                        <li class="list-group-item list-komen-item one"><?= $ambil['nama']; ?></li>
                                        <li class="list-group-item list-komen-item two"><?= $ambil['tanggal']; ?></li>
                                        <li class="list-group-item list-komen-item three"><?= $ambil['komentar']; ?></li>
                                    </ul>
                                </div>
                                <hr class="bg-secondary">
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <?php while ($data3 = mysqli_fetch_assoc($query3)) : ?>
                                <div class="col-md-4">
                                    <a href="single-destinasi.php?id=<?= $data3['id_artikel']; ?>">
                                        <div class="card bg-dark text-white card-image mb-3" data-aos="fade-left">
                                            <img src="assets/images/artikel/<?= $data3['gambar']; ?>" class="card-img" alt="...">
                                            <div class="card-img-overlay">
                                                <div class="layer">
                                                    <h3 class="card-text text-center"><?= $data3['judul']; ?></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- end main -->

    <!-- footer -->
    <?php include 'layouts/footer.php'; ?>

    <!-- main js -->

    <script>
        window.addEventListener('scroll', function() {
            const header = document.querySelector('nav');
            header.classList.toggle("sticky", window.scrollY > 0);
        });
    </script>

</body>

</html>

<!-- w => 720 , h => 480 -->

<!-- w => 270 , h => 180 -->