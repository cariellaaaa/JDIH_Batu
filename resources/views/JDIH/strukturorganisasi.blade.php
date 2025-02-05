@extends('JDIH.layout.app')
@section('title','Profil - JDIH Kota Batu')

@section('css')
<link rel="stylesheet" href="{{ asset('css/JDIH/profil.css') }}">
@endsection

@section('content')
<div class="container">
    <div class="box-header">
        <h2>Struktur Organisasi JDIH Kota Batu</h2>
        <div class="img-struktur">
            <img src="{{ asset('/img/bg/struktur_organisasi.png') }}" alt="struktur">
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/beranda.js') }}"></script>
@endsection