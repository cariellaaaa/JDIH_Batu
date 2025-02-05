@extends('JDIH.layout.appdokumen')
@section('title','Produk Hukum - JDIH Kota Batu')

@section('css')
<link rel="stylesheet" href="{{ asset('css/JDIH/detailprodukhukum.css') }}">
@endsection

@section('content')
<div class="main-content">
    <div class="main">
        <div class="document">
            <div class="info">
                <span>Tanggal Terbit:</span> <span>1 Februari 2024</span>
            </div>
            <div class="info">
                <span>Nomor:</span> <span>Peraturan Wali Kota Batu Nomor 63 Tahun 2017</span>
            </div>
            <div class="info">
                <span>Jenis Dokumen:</span> <span>Peraturan Wali Kota</span>
            </div>
            <div class="info">
                <span>TE.U:</span> <span>Jawa Timur</span>
            </div>
            <div class="info">
                <span>Singkatan Jenis:</span> <span>PERWALI</span>
            </div>
            <div class="info">
                <span>Tahun:</span> <span>2017</span>
            </div>
            <div class="info">
                <span>Tempat Penetapan:</span> <span>-</span>
            </div>
            <div class="info">
                <span>Tanggal Penetapan:</span> <span>01/02/2004</span>
            </div>
            <div class="info">
                <span>Subjek:</span> <span>PERWALI</span>
            </div>
            <div class="info">
                <span>Status:</span> <span>Berlaku</span>
            </div>
            <div class="info">
                <span>Sumber:</span> <span>Bagian Hukum</span>
            </div>
            <div class="info">
                <span>Bidang Hukum:</span> <span>Hukum</span>
            </div>
            <div class="info">
                <span>Urusan Pemerintahan:</span> <span>Pemerintah Kota Batu</span>
            </div>
            <div class="info">
                <span>Bahasa:</span> <span>Indonesia</span>
            </div>
            <div class="info">
                <span>SKPD Pemrakarsa:</span> <span>INSPEKTORAT</span>
            </div>
            <div class="info">
                <span>Penandatanganan:</span> <span>Walikota</span>
            </div>
            <div class="info">
                <span>Lokasi:</span> <span>Kota Batu</span>
            </div>
            <div class="buttons">
                <button>Abstrak</button>
                <button>Unduh</button>
            </div>
        </div>

        <h2>Dokumen Terkait</h2>
        <div class="document">
            <div class="info">
                <span>Tanggal Terbit:</span> <span>19 Januari 2004</span>
            </div>
            <div class="info">
                <span>Nomor:</span> <span>PERWALI</span>
            </div>
            <h2>Pedoman Pelaksanaan Pemberian Bantuan Langsung Tunai</h2>
            <div class="description">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras fermentum erat hendrerit quam porta, quis laoreet lectus pellentesque. Suspendisse potenti. Aliquam quis ligula tempus, vulputate quam non, imperdiet elit.
            </div>
            <div class="buttons">
                <button>Lihat</button>
            </div>
        </div>
        <div class="document">
            <div class="info">
                <span>Tanggal Terbit:</span> <span>22 April 2024</span>
            </div>
            <div class="info">
                <span>Nomor:</span> <span>PERWALI</span>
            </div>
            <h2>Peraturan Wali Kota Batu Nomor 7 Tahun 2024</h2>
            <div class="description">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras fermentum erat hendrerit quam porta, quis laoreet lectus pellentesque. Suspendisse potenti. Aliquam quis ligula tempus, vulputate quam non, imperdiet elit.
            </div>
            <div class="buttons">
                <button>Lihat</button>
            </div>
        </div>
        <button>Lihat Semua</button>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/beranda.js') }}"></script>
@endsection