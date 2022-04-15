<?php

include 'koneksi.php';

// $query = mysqli_query($koneksi, "SELECT * FROM artikel");

$query2 = mysqli_query($koneksi, "SELECT * FROM gambar INNER JOIN artikel ON gambar.id_artikel = artikel.id_artikel ORDER BY RAND() LIMIT 18");

$data2 = mysqli_fetch_assoc($query2);

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
        <style type="text/css">
        .banner-destinasi img {
            height: 600px;
            transition: 0.5s;
        }
        .rating h5 i.khusus {
            color: gold;
            font-size: 20px;
        }
        .box-input {
            height: 50px;
        }

        .box-input .input-group-icon {
            width: 50px;
            height: 50px;
            background: #326e6c;
            border-radius: 0px;
        }

        .input-group-icon {
            border: 1px solid #326e6c;
        }

        .input-group-icon i {
            color: #eee;
        }

        .form-cari {
            height: 50px;
            border-radius: 0px;
            border: 1px solid #326e6c;
            /* border-left: 0px; */
        }

        .form-cari:focus {
            box-shadow: none;
        }

        @media screen and (max-width: 1200px) {
            .banner-destinasi img {
                height: 550px;
                transition: 0.5s;
            }
        }
        @media screen and (max-width: 1100px) {
            .banner-destinasi img {
                height: 525px;
                transition: 0.5s;
            }
        }
        @media screen and (max-width: 1000px) {
            .banner-destinasi img {
                height: 500px;
                transition: 0.5s;
            }
        }
        @media screen and (max-width: 900px) {
            .banner-destinasi img {
                height: 475px;
                transition: 0.5s;
            }
        }
        @media screen and (max-width: 800px) {
            .banner-destinasi img {
                height: 450px;
                transition: 0.5s;
            }
        }
        @media screen and (max-width: 700px) {
            .banner-destinasi img {
                height: 425px;
                transition: 0.5s;
            }
        }
        @media screen and (max-width: 600px) {
            .banner-destinasi img {
                height: 400px;
                transition: 0.5s;
            }
        }
        @media screen and (max-width: 500px) {
            .banner-destinasi img {
                height: 350px;
                transition: 0.5s;
            }
        }
        </style>
        <!-- navbar -->
        <?php include 'layouts/nav.php'; ?>

        <!-- carousel -->
        <!-- <div class="banner-destinasi">
            <img src="assets/images/hero-bg.jpg" alt="" srcset="">
        </div> -->

        <!--  -->
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item layer-destinasi banner-destinasi active">
                    <img src="assets/images/hasil/bg-18.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item layer-destinasi banner-destinasi">
                    <img src="assets/images/hasil/bg-8.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item layer-destinasi banner-destinasi">
                    <img src="assets/images/hasil/bg-6.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </header>
    <!-- end header -->

    <!-- main -->
    <main class="main">
        <div class="container">
            <section class="satu">
                <form method="POST" action="">
                    <div class="input-group box-input">
                        <span class="input-group-text input-group-icon" id="basic-addon1">
                            <i class="fas fa-search"></i>
                        </span>
                        <?php
                        if (isset($_POST['cari'])) {
                        ?>
                        <input type="text" class="form-control form-cari" placeholder="cari artikel..." name="cari" aria-describedby="basic-addon1" value="<?=$_POST['cari']?>">
                        <?php
                        } else { 
                        ?>
                        <input type="text" class="form-control form-cari" placeholder="cari artikel..." name="cari" aria-describedby="basic-addon1">
                        <?php
                        }
                        ?>
                    </div>
                </form>
            </section>

            <!--  -->
            <section class="empat mt-5">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <?php

                            if (isset($_POST['cari'])) {
                                # code...
                                $data = mysqli_query($koneksi, "SELECT * FROM artikel WHERE judul LIKE '%" . $_POST['cari'] . "%'  ");
                                $jumlah_data = mysqli_num_rows($data);
                            } else {
                                # code...
                                $data = mysqli_query($koneksi, "SELECT * FROM artikel");
                            }

                            while ($ambil = mysqli_fetch_assoc($data)) :
                                $preview_sebagian = substr($ambil['preview'], 0, 80);

                            ?>
                                <div class="col-md-6">
                                    <a href="single-destinasi.php?id=<?= $ambil['id_artikel']; ?>" style="text-decoration: none; color: #000;">
                                        <div class="card mb-3 card-article">
                                            <img src="assets/images/artikel/<?= $ambil['gambar']; ?>" class="card-img-top" alt="..." style="height: 250px;">
                                            <div class="card-body">
                                                <div class="rating">
                                                    <h5>
                                                    <?php
                                                    $hasil_rating = $ambil['rating'] / $ambil['perating'];
                                                    for ($i=0; $i < $hasil_rating; $i++) { ?>
                                                        <i class="fas fa-star khusus"></i>
                                                    <?php
                                                    } for ($x=$ambil['bintang']; $x > ceil($hasil_rating); $x--) { ?>
                                                        <i class="far fa-star khusus"></i>
                                                    <?php
                                                    }
                                                    ?>
                                                    </h5>
                                                </div>
                                                <h5 class="card-title"><?= $ambil['judul']; ?></h5>
                                                <div class="card-text">
                                                    <p class="text-muted mb-3"><?= $preview_sebagian;?>... <a href="single-destinasi.php?id=<?= $ambil['id_artikel']; ?>" style="color: #326e6c;">Lebih banyak</a></p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <?php while ($h = mysqli_fetch_assoc($query2)) : ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="banner-menu mb-4 text-center" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="500">
                                        <a href="single-destinasi.php?id=<?= $h['id_artikel'] ?>">
                                            <img src="assets/images/artikel/gambarlain/<?= $h['foto']; ?>" class="figure-img img-fluid rounded mb-4" alt="..." style="width: 100%; height: 250px;">
                                        </a>
                                    <?php
                                endwhile;
                                    ?>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </section>
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