@extends('JDIH.layout.app')
@section('title','Statistik - JDIH Kota Batu')

@section('css')
<link rel="stylesheet" href="{{ asset('css/JDIH/statistik.css') }}">
@endsection

@section('content')
<div class="card-body">
    <h2>Data Statistik Produk Hukum</h2>
    <h5>Jumlah Produk Hukum Setiap Tahun</h5>
    {!! $chart->container() !!}
</div>
@endsection

@section('js')
<script src="{{ asset('js/beranda.js') }}"></script>
<script src="{{ $chart->cdn() }}"></script>
{{ $chart->script() }}
@endsection