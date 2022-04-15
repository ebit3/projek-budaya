<div class="container-fluid bg-dark">
    <footer class="py-3">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="nav-item"><a href="index.php" class="nav-link px-2 text-muted">Beranda</a></li>
            <li class="nav-item"><a href="destinasi.php" class="nav-link px-2 text-muted">Destinasi</a></li>
            <li class="nav-item"><a href="galery.php" class="nav-link px-2 text-muted">Galeri</a></li>
            <li class="nav-item"><a href="about.php" class="nav-link px-2 text-muted">Tentang Kami</a></li>
        </ul>
        <p class="text-center text-muted">&copy; 2021 Company, Inc</p>
    </footer>
</div>
<!-- end footer -->

<!-- js -->
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/aos-master/dist/aos.js"></script>

<!-- main -->
<script>
    AOS.init();
</script>

<script>
    $(document).ready(function() {
        $('.showp').hide();
        $('.tampil').click(function() {
            $('.showp').fadeToggle('slow');
            // $('.showp').slideToggle("slow");
        });
    });
</script>