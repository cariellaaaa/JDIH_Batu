@extends('JDIH.layout.appdokumen')
@section('title', 'Produk Hukum - JDIH Kota Batu')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/JDIH/produkhukum.css') }}">
@endsection

@section('content')
    <div class="main-content">
        <div class="main">
            <div class="container">
                <h2>Peraturan Perudang - undangan</h2>
                @foreach ($produkHukum as $item)
                    @php
                        $abstrak_words = str_word_count($item->abstrak, 2);
                        $abstrak_singkat = implode(' ', array_slice($abstrak_words, 0, 40)) . '...';
                    @endphp
                    <a href="/dashboard/readprodukhukum/{{ $item->id }}"
                        class="custom-card new-rules-card align-items-center justify-content-center">
                        <div class="card-content d-flex flex-row align-items-center justify-content-between">
                            <div class="information d-flex flex-column align-items-start justify-content-start">
                                <h5>{{ $item->judul }}</h5>
                                <div class="jenis-status-container d-flex align-items-center">
                                    <div class="jenis-produk">
                                        {{-- <span class="jenis-label">Jenis:</span> --}}
                                        <span class="jenis-value">{{ $item->jenis }}</span>
                                    </div>
                                    <span class="dot-separator">•</span>
                                    <div class="status-dokumen">
                                        {{-- <span class="status-label">Status:</span> --}}
                                        <span class="status-value {{ strtolower($item->status_dokumen) }}">
                                            {{ $item->status_dokumen }}
                                        </span>
                                    </div>
                                </div>
                                <p class="p-new-rules">{{ $abstrak_singkat }}</p>
                            </div>
                            <div class="new-rules-details">
                                <p class="p-new-rules">{{ $item->tanggal_pengundangan }}</p>
                                <div class="seen-counter">
                                    <i class="fas fa-eye"></i>
                                    <p class="p-new-rules"></p>
                                </div>
                                <div class="download-counter">
                                    <i class="fas fa-download"></i>
                                    <p class="p-new-rules"></p>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
                {{ $produkHukum->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/beranda.js') }}"></script>
@endsection
