@extends('JDIH.layout.app')
@section('title', 'Profil - JDIH Kota Batu')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/JDIH/profil.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="box-header">
            <h2>Tim Pengelola JDIH Kota Batu</h2>
            <div class="img-pengelola">
                <img src="{{ asset('/img/bg/tim_pengelola.png') }}" alt="tim_pengelola">
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/beranda.js') }}"></script>
@endsection
