@extends('JDIH.layout.app')
@section('title','Kontak - JDIH Kota Batu')

@section('css')
<link rel="stylesheet" href="{{ asset('css/JDIH/kontak.css') }}">
@endsection

@section('content')
<div class="container">
    <div class="container contact-container">
        <h2>Kontak JDIH Kota Batu</h2>
        <div class="map-container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.2762093490123!2d112.51072697465818!3d-7.866137692155858!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7887481c10aaa3%3A0x72d1ee5fca449d5d!2sBalai%20Kota%20Among%20Tani%20Kota%20Batu!5e0!3m2!1sid!2sid!4v1722825761411!5m2!1sid!2sid" width="1155" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
        <div class="contact-info">
            <p><span>Alamat:</span> Bagian Hukum Setda Kota Batu Block Office Gedung A Lantai 3 Balai Kota Among Tani Jl. Panglima Sudirman 507 Kota Batu</p>
            <p><span>Telp:</span> Kantor (0341) 512555 <br> Admin JDIH 0812-3306-4124 (Wahyu)</p>
            <p><span>Email:</span> hukum@batukota.go.id <br> hukum.pemkotbatu@gmail.com</p>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/beranda.js') }}"></script>
@endsection