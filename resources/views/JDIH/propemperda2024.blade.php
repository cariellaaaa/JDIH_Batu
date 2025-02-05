@extends('JDIH.layout.app')
@section('title','Informasi Hukum - JDIH Kota Batu')

@section('css')
<link rel="stylesheet" href="{{ asset('css/JDIH/informasihukum.css') }}">
@endsection

@section('content')
<div class="container">
    <div class="box-header">
        <h2>Program Pembentukan Peraturan Daerah Kota Batu Tahun 2024</h2>
        <div class="img-law">
            <img src="{{ asset('/img/bg/law.png') }}" alt="sop">
        </div>
        <div class="img-law">
            <img src="{{ asset('/img/bg/propemperda2024.png') }}" alt="propemperda2024">
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/beranda.js') }}"></script>
@endsection