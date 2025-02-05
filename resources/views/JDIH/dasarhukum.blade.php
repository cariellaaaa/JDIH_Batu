@extends('JDIH.layout.app')
@section('title','Profil - JDIH Kota Batu')

@section('css')
<link rel="stylesheet" href="{{ asset('css/JDIH/profil.css') }}">
@endsection

@section('content')
<div class="container">
    <div class="box-header">
        <h2>Dasar Hukum JDIH Kota Batu</h2>
        <div class="img-law">
            <img src="{{ asset('/img/bg/law.png') }}" alt="dasar_hukum">
        </div>
        <a class="text" href="https://peraturan.bpk.go.id/Details/41277/perpres-no-33-tahun-2012">1. Peraturan Presiden Republik Indonesia Nomor 33 Tahun 2012 tentang Jaringan Dokumentasi dan Informasi Hukum Nasional</a><br>
        <a class="text" href="https://peraturan.bpk.go.id/Details/133122/permenkumham-no-8-tahun-2019">2. Peraturan Menteri Hukum dan Hak Asasi Manusia Nomor 8 Tahun 2019 tentang Standar Pengelolaan Dokumen dan Informasi Hukum</a><br>
        <a class="text" href="https://simprokum.batukota.go.id/dashboard/readprodukhukum/184">3. Peraturan Wali Kota Batu Nomor 30 Tahun 2020 tentang Jaringan Dokumentasi dan Informasi Hukum Kota Batu</a><br>
        <a class="text" href="https://jdih.batukota.go.id/2024/06/04/sop-jdih-kota-batu/">4. Keputusan Walikota Batu Nomor 52 Tahun 2024 tentang Pembentukan Tim JDIH Kota Batu</a>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/beranda.js') }}"></script>
@endsection