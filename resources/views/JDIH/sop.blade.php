@extends('JDIH.layout.app')
@section('title','Profil - JDIH Kota Batu')

@section('css')
<link rel="stylesheet" href="{{ asset('css/JDIH/profil.css') }}">
@endsection

@section('content')
<div class="container">
    <div class="box-header">
        <h2>SOP JDIH Kota Batu</h2>
        <div class="img-law">
            <img src="{{ asset('/img/bg/law.png') }}" alt="sop">
        </div>
        <a class="text" href="https://jdih.batukota.go.id/2024/06/04/sop-pengajuan-produk-hukum/">1. SOP Pengajuan Produk Hukum</a><br>
        <a class="text" href="https://jdih.batukota.go.id/2024/06/04/sop-dokumentasi-dan-pendataan-kearsipan/">2. SOP Dokumentasi dan Pendataan Kearsipan</a><br>
        <a class="text" href="https://jdih.batukota.go.id/2024/06/04/sop-bantuan-hukum/">3. SOP Bantuan Hukum</a><br>
        <a class="text" href="https://jdih.batukota.go.id/2024/06/04/sop-jdih-kota-batu/">4. SOP JDIH Kota Batu</a>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/beranda.js') }}"></script>
@endsection