<?php

include 'koneksi.php';

$query = mysqli_query($koneksi, "SELECT * FROM artikel ORDER BY RAND() LIMIT 6");

$tampil_komen = mysqli_query($koneksi, "SELECT * FROM komentar LEFT OUTER JOIN artikel ON komentar.id_artikel = artikel.id_artikel LIMIT 3");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'layouts/head.php'; ?>

    <title>Beranda</title>
</head>

<body>
    <!-- header -->
    <header>
    <style type="text/css">
        .card-singgle:hover {
            box-shadow: 0 8px 10px rgba(0, 0, 0, 0.25);
        }
        .card-title {
            cursor: default;
        }
        .card-text p {
            cursor: default;
        }
        .layer-item img {
            height: 600px;
            transition: 0.5s;
        }
        .card-singgle {
            border: 1px solid whitesmoke;
            width: 18rem;
            height: 19rem;
            /* border: 1px solid whitesmoke; */
            box-shadow: 0 2px 2px rgba(0, 0, 0, 0.25);
            padding: 2px;
            border-radius: 20px;
        }
        .card-image {
            width: 18rem;
            height: 15rem;
            border-radius: 20px;
            border: none;
            transition: 0.5s;
        }
        .card-image img {
            width: 18rem;
            height: 15rem;
            border-radius: 20px;
            transition: 0.5s;
        }
        @media screen and (max-width: 1200px) {
            .layer-item img {
                height: 550px;
                transition: 0.5s;
            }
        }
        @media screen and (max-width: 1100px) {
            .layer-item img {
                height: 525px;
                transition: 0.5s;
            }
        }
        @media screen and (max-width: 991.5px) {
            .card-singgle {
                margin-bottom: 20px;
                width: 14rem;
                height: 21rem;
            }
            .layer-item img {
                height: 500px;
                transition: 0.5s;
            }
            .card-image {
                width: 14rem;
                height: 11rem;
                transition: 0.5s;
            }
            .card-image img {
                width: 14rem;
                height: 11rem;
                transition: 0.5s;
            }
        }
        @media screen and (max-width: 900px) {
            .card-singgle {
                margin-bottom: 20px;
                width: 14rem;
                height: 21rem;
            }
            .layer-item img {
                height: 475px;
                transition: 0.5s;
            }
        }
        @media screen and (max-width: 800px) {
            .card-singgle {
                margin-bottom: 20px;
                width: 14rem;
                height: 21rem;
            }
        }
        @media screen and (max-width: 767px) {
            .layer-item img {
                height: 450px;
                transition: 0.5s;
            }
            .card-singgle {
                width: 21rem;
                height: 17rem;
                margin: 20px auto;
            }
            .card-image {
                width: 20rem;
                height: 17rem;
                margin: auto;
                transition: 0.5s;
            }
            .card-image img {
                width: 20rem;
                height: 17rem;
                transition: 0.5s;
            }
        }
        @media screen and (max-width: 700px) {
            .layer-item img {
                height: 425px;
                transition: 0.5s;
            }
            .card-singgle {
                width: 21rem;
                height: 17rem;
                margin: 20px auto;
            }
        }
        @media screen and (max-width: 600px) {
            .layer-item img {
                height: 400px;
                transition: 0.5s;
            }
        }
        @media screen and (max-width: 500px) {
            .layer-item img {
                height: 350px;
                transition: 0.5s;
            }
        }
    </style>
        <!-- navbar -->
        <?php include 'layouts/nav.php'; ?>

        <!-- carousel -->
        <!-- <div class="banner">
            <img src="assets/images/coursel/bg-7.jpg" alt="" srcset="">
        </div> -->

        <!--  -->
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item layer-item active">
                    <img src="assets/images/hasil/bg-11.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block" style="bottom: 250px;">
                        <h1>Selamat Datang di Website Budaya Kita</h1>
                    </div>
                </div>
                <div class="carousel-item layer-item">
                    <img src="assets/images/coursel/bg-5.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block" style="bottom: 250px;">
                        <h1>Melihat Kearifan Lokal dan Tempat Wisata</h1>
                    </div>
                </div>
                <div class="carousel-item layer-item">
                    <img src="assets/images/coursel/bg-3.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block" style="bottom: 250px;">
                        <h1>Tunggu Apa Lagi Jelajahi Sekarang!</h1>
                    </div>
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
        <section class="satu">
            <div class="container">
                <div class="sub-title">
                    <h4> Mengapa Memilih <span class="sub"> Kami</span></h4>
                </div>
                <div class="row justify-content-evenly">
                    <div class="col-md-4">
                        <div class="card card-singgle">
                            <div class="card-body">
                                <div class="card-icon">
                                    <i class="fas fa-map-marked-alt icon-bt"></i>
                                </div>
                                <div class="card-title">
                                    Destinasi
                                </div>
                                <div class="card-text">
                                    <p class="text-muted">Kami menyajikan informasi mengenai tempat-tempat wisata yang memiliki unsur budaya dan juga sejarah yang sangat bagus untuk dibaca maupun di kunjungi.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-singgle">
                            <div class="card-body">
                                <div class="card-icon">
                                    <i class="fas fa-handshake icon-bt"></i>
                                </div>
                                <div class="card-title">
                                    Budaya
                                </div>
                                <div class="card-text">
                                    <p class="text-muted">Kami menyajikan informasi mengenai budaya-budaya lama yang hampir ditinggalkan oleh masyarakat, kemudian kami menjelaskannya dalam bentuk artikel.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-singgle">
                            <div class="card-body">
                                <div class="card-icon">
                                    <i class="fas fa-clock icon-bt"></i>
                                </div>
                                <div class="card-title">
                                    Terbaru
                                </div>
                                <div class="card-text">
                                    <p class="text-muted">Kami mampu memberikan informasi berdasarkan fakta, baik lama, maupun yang terbaru. Dengan begitu pembaca dapat menentukan apa yang akan mereka baca.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="dua">
            <div class="container">
                <div class="sub-title">
                    <h4> Artikel <span class="sub"> Populer</span></h4>
                </div>
                <div class="row justify-content-center">
                    <?php while ($data = mysqli_fetch_assoc($query)) : ?>
                        <div class="col-md-4">
                            <a href="single-destinasi.php?id=<?= $data['id_artikel']; ?>">
                                <div class="card bg-dark text-white card-image mb-3" data-aos="fade-up">
                                    <img src="assets/images/artikel/<?= $data['gambar']; ?>" class="card-img" alt="...">
                                    <div class="card-img-overlay">
                                        <div class="layer">
                                            <h3 class="card-text text-center"><?= $data['judul']; ?></h3>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </section>

        <section class="tiga">
            <div class="container">
                <div class="sub-title">
                    <h4> Review <span class="sub"> Pembaca</span></h4>
                </div>
                <div class="row justify-content-center">
                    <?php while ($ambil = mysqli_fetch_assoc($tampil_komen)) : ?>
                        <div class="col-md-10">
                            <div class="card mb-4 card-coment-index" data-aos="fade-up">
                                <div class="card-body">
                                    <!-- <div class="card-title border-bottom p-3 mb-5">
                                        <h4 class="text-center">ULASAN <span class="sub"> ORANG </span> </h4>
                                    </div> -->

                                    <div class="row justify-content-center">
                                        <div class="col-md-6">
                                            <figure class="figure">
                                                <img src="assets/images/artikel/<?= $ambil['gambar']; ?>" class="figure-img img-fluid rounded" style="object-fit: cover; object-position: center;" alt="...">
                                                <figcaption class="figure-caption text-center"><?= $ambil['judul']; ?></figcaption>
                                            </figure>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="show-singgle">
                                                <ul class="list-group list-komen">
                                                    <li class="list-group-item list-komen-item one"><?= $ambil['nama']; ?></li>
                                                    <li class="list-group-item list-komen-item two"><?= $ambil['tanggal']; ?></li>
                                                    <li class="list-group-item list-komen-item three"><?= $ambil['komentar']; ?></li>
                                                    <li class="list-group-item list-komen-item four"><a href="single-destinasi.php?id=<?= $ambil['id_artikel']; ?>" class="btn btn mt-3 text-light" style="background-color: #326e6c">Baca artikel</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!--  -->
                                    <hr class="bg-secondary">
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </section>
    </main>
    <!-- end main -->

    <!-- footer -->
    <?php include 'layouts/footer.php'; ?>

    <!-- main js -->
    <!-- <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script> -->

    <script>
        window.addEventListener('scroll', function() {
            const header = document.querySelector('nav');
            header.classList.toggle("sticky", window.scrollY > 0);
        });
    </script>
</body>

</html>

<!-- w => 720 , h => 480 -->