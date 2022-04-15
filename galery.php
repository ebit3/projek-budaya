<?php

include 'koneksi.php';

$query = mysqli_query($koneksi, "SELECT * FROM gambar INNER JOIN artikel ON gambar.id_artikel = artikel.id_artikel");

// 

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'layouts/head.php'; ?>

    <title>Galeri</title>
</head>

<body>
    <!-- header -->
    <header>
    <style type="text/css">
        .figure img:hover {
            box-shadow: 0 8px 8px rgba(0, 0, 0, 0.30);
        }
        .banner-about img {
            height: 600px;
            transition: 0.5s;
        }
        @media screen and (max-width: 1200px) {
            .banner-about img {
                height: 550px;
                transition: 0.5s;
            }
        }
        @media screen and (max-width: 1100px) {
            .banner-about img {
                height: 525px;
                transition: 0.5s;
            }
        }
        @media screen and (max-width: 1000px) {
            .banner-about img {
                height: 500px;
                transition: 0.5s;
            }
        }
        @media screen and (max-width: 900px) {
            .banner-about img {
                height: 475px;
                transition: 0.5s;
            }
        }
        @media screen and (max-width: 800px) {
            .banner-about img {
                height: 450px;
                transition: 0.5s;
            }
        }
        @media screen and (max-width: 700px) {
            .banner-about img {
                height: 425px;
                transition: 0.5s;
            }
        }
        @media screen and (max-width: 600px) {
            .banner-about img {
                height: 400px;
                transition: 0.5s;
            }
        }
        @media screen and (max-width: 500px) {
            .banner-about img {
                height: 350px;
                transition: 0.5s;
            }
        }
    </style>
        <!-- navbar -->
        <?php include 'layouts/nav.php'; ?>

        <!-- carousel -->
        <div class="banner-about">
            <img src="assets/images/hasil/bg-16.jpg" alt="" srcset="">
        </div>

        <!--  -->
    </header>
    <!-- end header -->

    <!-- main -->
    <main class="main">
        <div class="container">
            <div class="row">
                <?php while ($data = mysqli_fetch_assoc($query)) : ?>
                    <div class="col-md-4" data-aos="fade-up">
                        <figure class="figure">
                            <a href="single-destinasi.php?id=<?= $data['id_artikel'] ?>" style="text-decoration: none;">
                                <img src="assets/images/artikel/gambarlain/<?= $data['foto']; ?>" class="figure-img img-fluid rounded" alt="..." style="width: 400px;">
                                <figcaption class="figure-caption text-center"><?= $data['judul'] ?></figcaption>
                            </a>
                        </figure>
                    </div>
                <?php endwhile; ?>
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