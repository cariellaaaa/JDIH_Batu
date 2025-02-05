@extends('JDIH.layout.app')
@section('title','FAQ - JDIH Kota Batu')

@section('css')
<link rel="stylesheet" href="{{ asset('css/JDIH/faq.css') }}">
@endsection

@section('content')
<div class="container">
    <div class="box-header container">
        <h2>Frequently Asked Questions (FAQ)</h2>
        <h3>Daftar pertanyaan yang sering diajukan.</h3>
    </div>
    <div class="custom-card new-rules-card align-items-center justify-content-center">
        <div class="information d-flex flex-column align-items-start justify-content-center">
            <h5>Apa itu Jaringan Dokumentasi dan Informasi Hukum Nasional?</h5>
            <p class="p-new-rules">Jaringan Dokumentasi dan Informasi Hukum Nasional adalah wadah pendayagunaan bersama atas dokumen hukum secara tertib, terpadu, dan berkesinambungan, serta merupakan sarana pemberian pelayanan informasi hukum secara lengkap, akurat, mudah, dan cepat.</p>
        </div>
    </div>
    <div class="custom-card new-rules-card align-items-center justify-content-center">
        <div class="information d-flex flex-column align-items-start justify-content-center">
            <h5>Apa Tugas Pusat Jaringan Dokumentasi Dan Informasi Hukum Nasional?</h5>
            <p class="p-new-rules">Tugas Pusat JDIHN adalah melakukan pembinaan, pengembangan, dan monitoring kepada anggota JDIHN yang meliputi: - Organisasi - Sumber Daya Manusia - Koleksi Dokumen Hukum - Teknis Pengelolaan - Sarana Prasarana dan - Pemanfaatan teknologi informasi dan komunikasi.</p>
        </div>
    </div>
    <div class="custom-card new-rules-card align-items-center justify-content-center">
        <div class="information d-flex flex-column align-items-start justify-content-center">
            <h5>Apa Fungsi Pusat Jaringan Dokumentasi Dan Informasi Hukum Nasional?</h5>
            <p class="p-new-rules">Perumusan kebijakan pembinaan dan pengembangan JDIHN - Penyusunan dan/ atau penyempurnaan pedoman/ standar pengelolaan teknis dokumentasi dan informasi hukum - Pemberian konsultasi terhadap permasalahan yang dihadapi oleh anggota JDIHN - Sosialisasi kebijakan dan pengelolaan teknis dokumentasi dan informasi hukum kepada anggota JDIHN - Pembinaan sumber daya manusia pengelola jaringan dokumentasi dan informasi hukum - Pusat rujukan dokumentasi dan informasi hukum dan - Monitoring dan evaluasi secara berkala setiap 6 (enam) bulan sekali terhadap pelaksanaan tugas dan fungsi anggota JDIHN.</p>
        </div>
    </div>
    <div class="custom-card new-rules-card align-items-center justify-content-center">
        <div class="information d-flex flex-column align-items-start justify-content-center">
            <h5>Siapakah Anggota Jaringan Dokumentasi Dan Informasi Hukum Nasional?</h5>
            <p class="p-new-rules">Anggota JDIHN terdiri dari - Kementerian negara - Sekretariat Lembaga Negara - Lembaga Pemerintah Non Kementerian - Pemerintah Provinsi - Pemerintah Kabupaten/ Kota, dan - Sekretariat Dewan perwakilan Rakyat Daerah Tingkat Provinsi dan Kabupaten/ Kota - Perpustakaan Hukum pada Perguruan Tinggi Negeri dan Perguruan Tinggi Swasta - Lembaga lain yang bergerak di bidang pengembangan dokumentasi dan informasi hukum yang ditetapkan oleh Menteri.</p>
        </div>
    </div>
    <div class="custom-card new-rules-card align-items-center justify-content-center">
        <div class="information d-flex flex-column align-items-start justify-content-center">
            <h5>Mengapa Anggota JDIHN Harus Memiliki Website JDIH?</h5>
            <p class="p-new-rules">Karena melalui website JDIH setiap anggota JDIHN dapat mempublikasikan Dokumen Hukum yang diterbitkannya, serta melalui website JDIH pula masyarakat maupun pencari informasi hukum dapat memperoleh Dokumen Hukum yang diterbitkan oleh instansi Anggota JDIHN tersebut, dan mempermudah proses integrasi dengan portal JDIHN sehingga Database Hukum Nasional cepat terwujud.</p>
        </div>
    </div>
    <div class="custom-card new-rules-card align-items-center justify-content-center">
        <div class="information d-flex flex-column align-items-start justify-content-center">
            <h5>Pelayanan apa saja yang disediakan JDIH Kota Batu untuk umum?</h5>
            <p class="p-new-rules">JDIH Kota Batu memberikan pelayanan kepada masyarakat umum diantaranya adalah penyediaan koleksi regulasi yang ada dapat dibaca dan/atau disalin dan buku-buku bertemakan hukum.</p>
        </div>
    </div>
    <div class="custom-card new-rules-card align-items-center justify-content-center">
        <div class="information d-flex flex-column align-items-start justify-content-center">
            <h5>Apa yang dimaksud dengan Dokumen Hukum?</h5>
            <p class="p-new-rules">Produk hukum yang berupa peraturan perundang-undangan atau produk hukum selain peraturan perundang-undangan yang meliputi namun tidak terbatas pada putusan pengadilan, yurisprudensi, monografi hukum, artikel majalah hukum, buku hukum, penelitian hukum, pengkajian hukum, naskah akademis, dan rancangan peraturan perundang-undangan.</p>
        </div>
    </div>
    <div class="custom-card new-rules-card align-items-center justify-content-center">
        <div class="information d-flex flex-column align-items-start justify-content-center">
            <h5>Apa yang dimaksud dengan Peraturan Perundang-undangan?</h5>
            <p class="p-new-rules">Peraturan Perundang-undangan adalah peraturan tertulis yang memuat norma hukum yang mengikat secara umum dan dibentuk atau ditetapkan oleh lembaga negara atau pejabat yang berwenang melalui prosedur yang ditetapkan dalam peraturan perundang-undangan.</p>
        </div>
    </div>
    <div class="custom-card new-rules-card align-items-center justify-content-center">
        <div class="information d-flex flex-column align-items-start justify-content-center">
            <h5>Bagaimana mencari Produk Hukum yang saya inginkan?</h5>
            <p class="p-new-rules">Untuk mencari produk hukum yang Anda inginkan, Anda dapat memasukkan kata kunci seperti judul atau nomor atau tahun peraturan yang anda ketahui pada tab pencarian, kemudian klik tombol cari.</p>
        </div>
    </div>
    <div class="custom-card new-rules-card align-items-center justify-content-center">
        <div class="information d-flex flex-column align-items-start justify-content-center">
            <h5>Mengapa file Produk Hukum tidak dapat dibuka?</h5>
            <p class="p-new-rules">File produk hukum tidak bisa dibuka, kemungkinan karena Anda belum menginstal aplikasi pembaca file pdf seperti adobe reader. Silahkan Anda download terlebih dahulu aplikasi adobe reader, kemudian instal file tersebut di komputer/laptop Anda.</p>
        </div>
    </div>
    <div class="custom-card-akhir new-rules-card align-items-center justify-content-center">
        <div class="information d-flex flex-column align-items-start justify-content-center">
            <h5>Bagaimana jika file Produk Hukum atau Informasi yang dicari tidak ada dalam website JDIH Kota Batu?</h5>
            <p class="p-new-rules">Anda dapat menghubungi kami melalui kontak pengelola JDIH sebagaimana tercantum pada menu “Kontak" untuk mengajukan permohonan informasi yang diinginkan.</p>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/beranda.js') }}"></script>
@endsection