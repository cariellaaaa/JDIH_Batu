<link rel="stylesheet" href="{{ asset('css/JDIH/components/navbar.css') }}">
<!-- Top Details-->
<nav class="navbar navbar-expand-lg navbar-kesatu section-to-hide">
    <div class="container-navbar">
        <a href="{{ url('https://batukota.go.id/') }}"><img src="{{ asset('img/bg/LogoKotaBatu.png') }}"
                alt="Logo Kota Batu" class="logo-batu"></a>
        <img src="{{ asset('/img/bg/ikon_bangunan.png') }}" alt="Alamat" class="ikon-topnav">
        <p>Bagian Hukum Setda. Kota Wisata Batu</p>
        <img src="{{ asset('/img/bg/ikon_mail.png') }}" alt="E-mail" class="ikon-topnav">
        <p>hukumkwb@gmail.com</p>
        <img src="{{ asset('/img/bg/ikon_telepon.png') }}" alt="NoTelp" class="ikon-topnav">
        <p>(0341) 591032</p>
    </div>
</nav>

<!-- Logo & Title -->
<header class="web-intro">
    <div class="container logo-title">
        <div class="row justify-content-center logo">
            <div class="col-auto">
                <img src="{{ asset('/img/bg/LogoJDIH.png') }}" alt="Logo JDIH" class="logo-container-dua">
            </div>
            <div class="col-auto">
                <img src="{{ asset('/img/bg/LogoKotaBatu.png') }}" alt="Logo Kota Batu" class="logo-container-dua">
            </div>
        </div>
        <div class="text-center title">
            <div class="header-container">
                <h1 class="red-header">JDIH</h1>
                <h1>Kota Batu</h1>
            </div>
            <h2>Jaringan Dokumentasi dan Informasi Hukum Kota Batu</h2>
        </div>
    </div>
</header>

<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-kedua">
    <button class="navbar-toggler" onclick="toggleNavbar()">
        <i class="fas fa-bars"></i> Menu
    </button>

    <div class="collapse navbar-collapse" id="navbarMenu">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('beranda') }}">Beranda</a>
            </li>
            <li class="nav-item dropdown dropdown-navbar-kedua">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Produk Hukum
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item item-navbar-kedua" href="{{ route('produk-hukum') }}">Peraturan Perundang-Undangan</a></li>
                    <li><a class="dropdown-item item-navbar-kedua" href="{{ route('monografi-hukum') }}">Monografi Hukum</a></li>
                    <li><a class="dropdown-item item-navbar-kedua" href="{{ route('artikel-hukum') }}">Artikel Hukum</a></li>
                    <li><a class="dropdown-item item-navbar-kedua" href="{{ route('putusan-pengadilan') }}">Putusan Pengadilan</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Berita</a>
            </li>
            <li class="nav-item dropdown dropdown-navbar-kedua">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Statistik
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item item-navbar-kedua" href="{{ route('statistikprokum') }}">Produk Hukum</a></li>
                    <li><a class="dropdown-item item-navbar-kedua" href="#">Survei</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Forum</a>
            </li>
            <li class="nav-item dropdown dropdown-navbar-kedua">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Profil
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item item-navbar-kedua" href="{{ route('strukturorganisasi') }}">Struktur Organisasi</a></li>
                    <li><a class="dropdown-item item-navbar-kedua" href="{{ route('timpengelola') }}">Tim Pengelola</a></li>
                    <li><a class="dropdown-item item-navbar-kedua" href="{{ route('dasarhukum') }}">Dasar Hukum</a></li>
                    <li><a class="dropdown-item item-navbar-kedua" href="{{ route('sop') }}">SOP</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown dropdown-navbar-kedua">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Informasi Hukum
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item item-navbar-kedua" href="propemperda2023">Propemperda 2023</a></li>
                    <li><a class="dropdown-item item-navbar-kedua" href="propemperda2024">Propemperda 2024</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown dropdown-navbar-kedua">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Media
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item item-navbar-kedua" href="{{ route('media1') }}">YouTube</a></li>
                    <li><a class="dropdown-item item-navbar-kedua" href="{{ route('media2') }}">Galeri</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('faq') }}">FAQ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('kontak') }}">Kontak</a>
            </li>
        </ul>
    </div>
</nav>

<script>
    function toggleNavbar() {
        var navbar = document.getElementById("navbarMenu");
        navbar.classList.toggle("show");
    }
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const currentLocation = window.location.href;
        const menuItems = document.querySelectorAll('.navbar-nav .nav-link, .dropdown-item');
        menuItems.forEach(item => {
            if (item.href === currentLocation) {
                item.classList.add("active");
                if (item.classList.contains('dropdown-item')) {
                    item.closest('.nav-item').querySelector('.nav-link').classList.add("active");
                }
            }
        });
    });
</script>

<script src="{{ asset('js/newhome.js') }}"></script>