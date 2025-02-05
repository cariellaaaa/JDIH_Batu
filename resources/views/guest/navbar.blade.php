<link rel="stylesheet" href="{{ asset('css/guest/navbar.css') }}">
<nav class="navbar navbar-expand-lg navbar-kesatu">
    <div class="container">
        <!-- Top Details-->
        <nav class="navbar navbar-expand-lg navbar-kesatu">
            <div class="container-navbar d-flex flex-row align-items-center justify-content-start">
                <a href="/"><img src="{{ asset('img\bg/LogoKotaBatu.png') }}" alt="Logo Kota Batu"
                        class="logo-batu"></a>
                <img src="{{ asset('img\bg/ikon_bangunan.png') }}" alt="Alamat" class="ikon-topnav">
                <p>Bagian Hukum Setda. Kota Wisata Batu</p>
                <img src="{{ asset('img\bg/ikon_mail.png') }}" alt="E-mail" class="ikon-topnav">
                <p>hukumkwb@gmail.com</p>
                <img src="{{ asset('img\bg/ikon_telepon.png') }}" alt="NoTelp" class="ikon-topnav">
                <p>(0341) 591032</p>
            </div>
        </nav>
    </div>
</nav>

<!-- Logo & Title -->
<header class="web-intro">
    <div class="container d-flex flex-column logo-title justify-content-center align-items-center">
        <img src="{{ asset('img\bg/ikon_simprokum.png') }}" alt="SIMPROKUM" class="logo-simprokum">
        <h2>SIMPROKUM</h2>
        <h3>Sistem Informasi Pengajuan Produk Hukum</h3>
    </div>
</header>

<nav id="navbar" class="navbar navbar-kedua justify-content-center align-items-start">
    <ul class="navbar-nav d-flex flex-row ">
        <li class="nav-item">
            <a class="nav-link" href="/simprokum">Beranda</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/">JDIH Kota Batu</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/inovasisimprokum">Inovasi SIMPROKUM</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/status">Status</a>
        </li>
    </ul>
</nav>

<script src="{{ asset('js/newhome.js') }}"></script>