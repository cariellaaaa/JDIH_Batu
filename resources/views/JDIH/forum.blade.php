@extends('JDIH.layout.appdokumen')
@section('title','Forum - JDIH Kota Batu')

@section('css')
<link rel="stylesheet" href="{{ asset('css/JDIH/forum.css') }}">
@endsection

@section('content')
<div class="main-content">
    <div class="main">
        <div class="container">
            <h2>Forum</h2>
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
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/beranda.js') }}"></script>
@endsection