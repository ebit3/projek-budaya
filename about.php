<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'layouts/head.php'; ?>

    <title>Tentang Kami</title>

    <style>
        body {
            background: #eee;
        }
    </style>
</head>

<body>
    <!-- header -->
    <header>
        <style type="text/css">
            ul li a i:hover {
                font-size: 32px;
                transition: 0.9s;
            }
            .card-about {
                width: 60rem;
                transition: 0.5s;
            }
            .layer-item img {
                height: 600px;
                transition: 0.5s;
            }
            @media screen and (max-width: 1200px) {
                .banner-about img {
                    height: 550px;
                    transition: 0.5s;
                }
                .card-about {
                    width: 50rem;
                    transition: 0.5s;
                } 
            }
            @media screen and (max-width: 1100px) {
                .banner-about img {
                    height: 525px;
                    transition: 0.5s;
                }
                .card-about {
                    width: 48rem;
                    transition: 0.5s;
                }
            }
            @media screen and (max-width: 1000px) {
                .banner-about img {
                    height: 500px;
                    transition: 0.5s;
                }
                .card-about {
                    width: 38rem;
                    transition: 0.5s;
                }
            }
            @media screen and (max-width: 900px) {
                .banner-about img {
                    height: 475px;
                    transition: 0.5s;
                }
                .card-about {
                    width: 37rem;
                    transition: 0.5s;
                }
            }
            @media screen and (max-width: 800px) {
                .banner-about img {
                    height: 450px;
                    transition: 0.5s;
                }   
            }
            @media screen and (max-width: 767px) {
                .card-about {
                    width: 33rem;
                    transition: 0.5s;
                }
                .banner-about img {
                    height: 450px;
                    transition: 0.5s;
                }
                .card-name h4 {
                    text-align: center;
                }
                .card-text-paragraf p {
                    text-align: center;
                }
                .nav-icon-profile {
                    justify-content: center;
                }
            }
            @media screen and (max-width: 700px) {
                .banner-about img {
                    height: 425px;
                    transition: 0.5s;
                }
                .card-about {
                    width: 32rem;
                    transition: 0.5s;
                }
                .card-name h4 {
                    text-align: center;
                }
                .card-text-paragraf p {
                    text-align: center;
                }
                .nav-icon-profile {
                    justify-content: center;
                }
            }
            @media screen and (max-width: 600px) {
                .banner-about img {
                    height: 400px;
                    transition: 0.5s;
                }
                .card-about {
                    width: 32rem;
                    transition: 0.5s;
                }
                .card-name h4 {
                    text-align: center;
                }
                .card-text-paragraf p {
                    text-align: center;
                }
                .nav-icon-profile {
                    justify-content: center;
                }
            }
            @media screen and (max-width: 550px) {
                .banner-about img {
                    height: 350px;
                    transition: 0.5s;
                }
                .card-about {
                    width: 30rem;
                    transition: 0.5s;
                }
            }
            @media screen and (max-width: 525px) {
                .banner-about img {
                    height: 350px;
                    transition: 0.5s;
                }
                .card-about {
                    width: 29rem;
                    transition: 0.5s;
                }
            }
            @media screen and (max-width: 500px) {
                .card-about {
                    width: 28.7rem;
                    transition: 0.5s;
                }
            }
        </style>
        <!-- navbar -->
        <?php include 'layouts/nav.php'; ?>

        <!-- carousel -->
        <div class="banner-about">
            <img src="assets/images/banner-about/hasil/banner-1.jpg" alt="" srcset="">
        </div>

        <!--  -->
    </header>
    <!-- end header -->

    <!-- main -->
    <main class="main">
        <div class="container">
            <section class="satu">
                <div class="row justify-content-center">
                    <div class="sub-title">
                        <h4> Tentang <span class="sub"> Kami</span></h4>
                    </div>
                    <div class="col-md-10">
                        <p class="text-center">Budaya Kita merupakan website berupa artikel yang menjelaskan tentang budaya dan wisata yang ada di Indonesia. Website ini dikerjakan oleh kami yang berasal dari sekolah <span> <a href="https://goo.gl/maps/BxyemUtopnKXexXb7" class="text-decoration-none fw-bold">SMKN 2 Kota Mojokerto.</a> </span> Kami merasa puas apabila pembaca dapat memberikan masukan atau kritik buat perkembangan website tersebut kami selaku pembuat mengucapkan terima kasih.</p>
                    </div>
                </div>
            </section>
            <section class="dua">
                <div class="sub-title">
                    <h4> Profil <span class="sub"> Tim</span></h4>
                </div>

                <!-- card-profile -->
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="card card-about">
                            <div class="row justify-content-center">
                                <div class="col-md-3">
                                    <div class="card-image-profile mt-3" align="center">
                                        <img src="assets/images/human/angga.jpeg" class="rounded-circle" alt="" srcset="">
                                    </div>
                                </div>
                                <div class="col-md-9 card-profile-name">
                                    <div class="card-profile-singgle">
                                        <div class="card-text-about">
                                            <div class="card-name">
                                                <h4 class="ms-3">Angga Cipta Pranata</h4>
                                            </div>
                                            <div class="card-text-paragraf">
                                                <p class="text-muted ms-3">Programmer</p>
                                            </div>
                                        </div>
                                        <!--  -->
                                        <ul class="nav nav-icon-profile">
                                            <li class="nav-item item-icon">
                                                <a class="nav-link" href="https://www.facebook.com/profile.php?id=100010133298502">
                                                    <i class="fab fa-facebook"></i>
                                                </a>
                                            </li>
                                            <li class="nav-item item-icon ms-3">
                                                <a class="nav-link" href="https://www.instagram.com/anggaciptapranata/">
                                                    <i class="fab fa-instagram"></i>
                                                </a>
                                            </li>
                                            <li class="nav-item item-icon ms-3">
                                                <a href="https://wa.link/0vmjx1" class="nav-link">
                                                    <i class="fab fa-whatsapp"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card card-about">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="card-image-profile mt-3" align="center">
                                        <img src="assets/images/human/ebit.jpg" class="rounded-circle" alt="" srcset="">
                                    </div>
                                </div>
                                <div class="col-md-9 card-profile-name">
                                    <div class="card-profile-singgle">
                                        <div class="card-text-about">
                                            <div class="card-name">
                                                <h4 class="ms-3">Ebit Gunawan</h4>
                                            </div>
                                            <div class="card-text-paragraf">
                                                <p class="text-muted ms-3">Programmer</p>
                                            </div>
                                        </div>
                                        <!--  -->
                                        <ul class="nav nav-icon-profile">
                                            <li class="nav-item item-icon">
                                                <a class="nav-link" href="https://m.facebook.com/profile.php?id=100026793755139&ref=content_filter">
                                                    <i class="fab fa-facebook"></i>
                                                </a>
                                            </li>
                                            <li class="nav-item item-icon ms-3">
                                                <a class="nav-link" href="https://www.instagram.com/ebit.6/">
                                                    <i class="fab fa-instagram"></i>
                                                </a>
                                            </li>
                                            <li class="nav-item item-icon ms-3">
                                                <a href="https://api.whatsapp.com/send?phone=6282232725312" class="nav-link">
                                                    <i class="fab fa-whatsapp"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card card-about">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="card-image-profile mt-3" align="center">
                                        <img src="assets/images/human/zidan.jpeg" class="rounded-circle" alt="" srcset="">
                                    </div>
                                </div>
                                <div class="col-md-9 card-profile-name">
                                    <div class="card-profile-singgle">
                                        <div class="card-text-about">
                                            <div class="card-name">
                                                <h4 class="ms-3">M. Zidan Amirulloh</h4>
                                            </div>
                                            <div class="card-text-paragraf">
                                                <p class="text-muted ms-3">Programmer</p>
                                            </div>
                                        </div>
                                        <!--  -->
                                        <ul class="nav nav-icon-profile">
                                            <li class="nav-item item-icon">
                                                <a class="nav-link" href="https://m.facebook.com/profile.php?id=100019205430952&ref=content_filter">
                                                    <i class="fab fa-facebook"></i>
                                                </a>
                                            </li>
                                            <li class="nav-item item-icon ms-3">
                                                <a class="nav-link" href="https://www.instagram.com/muchamad_zidan31/">
                                                    <i class="fab fa-instagram"></i>
                                                </a>
                                            </li>
                                            <li class="nav-item item-icon ms-3">
                                                <a href="https://api.whatsapp.com/send?phone=6285732488698" class="nav-link">
                                                    <i class="fab fa-whatsapp"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
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