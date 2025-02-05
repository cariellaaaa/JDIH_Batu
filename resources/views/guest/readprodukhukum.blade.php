@extends('guest.main')

@section('css')
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('/css/login.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('css/guest/readprodukhukum2.css') }}">
@endsection

@section('content')
    <div class="outer-container">
        <div class="metadata-container">
            <div class="metadata-content">
                <div class="table-header d-flex flex-row align-items-center justify-content-between">
                    <img src="{{ asset('img\bg/logo_jdih.png') }}" alt="logo_jdih" class="logo-table">
                    <h3>Detail Dokumen</h3>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="fs-6">
                            Nomor
                        </div>
                        <input type="text" class="form-control input mt-2 ps-3" value="{{ $draft->nomor }}" readonly>

                        <div class="fs-6 mt-3">
                            Tahun
                        </div>
                        <input type="text" class="form-control input mt-2 ps-3" value="{{ $draft->tahun }}" readonly>

                        <div class="fs-6 mt-3">
                            Judul
                        </div>
                        <input type="text" class="form-control input mt-2 ps-3" value="{{ $draft->judul }}" readonly>

                        <div class="fs-6 mt-3">
                            SKPD Pemrakarsa
                        </div>
                        <input type="text" class="form-control input mt-2 ps-3" value="{{ $draft->pemrakarsa }}"
                            readonly>

                        <div class="fs-6 mt-3">
                            Status Dokumen
                        </div>
                        <input type="text" class="form-control input mt-2 ps-3" value="{{ $draft->status_dokumen }}"
                            readonly>

                        <div class="fs-6 mt-3">
                            jenis / Bentuk Peraturan
                        </div>
                        <input type="text" class="form-control input mt-2 ps-3" value="{{ $draft->jenis }}" readonly>

                        @if (isset($draft->subjek))
                            <div class="fs-6 mt-3">
                                Subjek
                            </div>
                            <input type="text" class="form-control input mt-2" value="{{ $draft->subjek }}" readonly>
                        @endif

                        @if (isset($draft->sumber))
                            <div class="fs-6 mt-3">
                                Sumber
                            </div>
                            <input type="text" class="form-control input mt-2" value="{{ $draft->sumber }}" readonly>
                        @endif

                        @if (isset($draft->bidang_hukum))
                            <div class="fs-6 mt-3">
                                Bidang Hukum
                            </div>
                            <input type="text" class="form-control input mt-2 ps-3" value="{{ $draft->bidang_hukum }}"
                                readonly>
                        @endif

                        <div class="row">
                            <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-3">
                                <div class="fs-6 mt-3">
                                    Tanggal Pengundangan
                                </div>
                                <input type="date" class="form-control input mt-2 ps-3"
                                    value="{{ $draft->tanggal_pengundangan }}" readonly>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="fs-6 mt-3">
                                    TTD Walikota
                                </div>
                                <div class="row mt-2">
                                    <div class="col-11 col-sm-8 col-md-7 col-lg-8 col-xl-8 rounded-3 border-1 border border-dark px-2 py-2 ms-3"
                                        style="background-color: #e9ecef">
                                        <div class="row">
                                            <div class="col-1">
                                                <i class="fa-solid fa-file"></i>
                                            </div>
                                            <div class="col-10">
                                                <input class="ps-3" type="text"
                                                    value="{{ $draft->ttd_walikota_salinan }}"
                                                    style="border: none; background-color: #e9ecef; width: 105%;" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row-button-action">
                                        <div class="row">
                                            <a href="{{ asset('storage/' . $draft->ttd_walikota_salinan) }}"
                                                class="button-action"
                                                style="vertical-align: -webkit-baseline-middle">Abstrak</a>
                                        </div>
                                        <div class="row">
                                            <a href="{{ asset('storage/' . $draft->ttd_walikota_salinan) }}"
                                                class="button-action"
                                                style="vertical-align: -webkit-baseline-middle">Unduh</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-grid gap-2 mt-4 mb-4">
                            <a href="/produk-hukum" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
