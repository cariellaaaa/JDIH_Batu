@extends('JDIH.layout.app')
@section('title', 'Beranda - JDIH Kota Batu')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/JDIH/beranda.css') }}">
    <link rel="stylesheet" href="{{ asset('css/JDIH/sambutan.css') }}">    
    <link rel="stylesheet" href="{{ asset('css/JDIH/statistik.css') }}">
@endsection


@section('content')
    <div class="container">
        <!-- Search Bar -->
        <section class="search-column d-flex flex-column align-items-center justify-content-center">
            <form class="search-column-form w-100 justify-content-center align-items-center" method="GET"
                action="{{ route('cari.produk.hukum') }}">
                <div class="bagian-satu text-center">
                    <h3 class="exc-search-column">Cari Produk Hukum</h3>
                    <input type="text" class="form-control justify-content-center" id="cariKeyword" name="keyword"
                        placeholder="Judul Produk Hukum...">
                </div>
                <div class="d-flex flex-md-row justify-content-between bagian-dua">
                    <div class="bagian-dua-item mb-3 mb-md-0 text-center">
                        <h5 class="exc-search-column">Tipe Dokumen</h5>
                        <div class="dropdown-tipe">
                            <button id="dropdownTipe" class="dropdown-toggle custom-btn" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                - Pilih Tipe Dokumen -
                            </button>
                            <ul class="dropdown-menu drop-tipe-dokumen">
                                <li><a class="dropdown-item item-tipe-dokumen" href="#"
                                        data-value="Peraturan Perundang-Undangan">Peraturan Perundag-Undangan</a></li>
                                <li><a class="dropdown-item item-tipe-dokumen" href="#"
                                        data-value="Monografi Hukum">Monografi Hukum</a></li>
                                <li><a class="dropdown-item item-tipe-dokumen" href="#"
                                        data-value="Artikel Hukum">Artikel Hukum</a></li>
                                <li><a class="dropdown-item item-tipe-dokumen" href="#"
                                        data-value="Putusan Pengadilan">Putusan Pengadilan</a></li>
                            </ul>
                        </div>
                        <input type="hidden" name="tipeDokumen" id="tipeDokumen">
                    </div>
                    <div class="bagian-dua-item text-center">
                        <h5 class="exc-search-column">Jenis Dokumen</h5>
                        <div class="dropdown-jenis">
                            <button id="dropdownJenis" class="dropdown-toggle custom-btn" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                - Pilih Jenis Dokumen -
                            </button>
                            <ul class="dropdown-menu drop-jenis-dokumen">
                                @foreach ($jenisProdukHukum as $jenis)
                                    <li><a class="dropdown-item item-jenis-dokumen" href="javascript:void(0);"
                                            data-value="{{ $jenis }}">{{ $jenis }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <input type="hidden" name="jenisDokumen" id="jenisDokumen">
                    </div>
                </div>
                <div class="d-flex flex-md-row justify-content-between align-items-center bagian-tiga">
                    <div class="text-center flex-item">
                        <p class="exc-search-column">Tahun</p>
                        <input type="text" class="form-control" id="cariTahun" name="cariTahun" placeholder="Tahun...">
                    </div>
                    <div class="text-center flex-item">
                        <p class="exc-search-column">Nomor</p>
                        <input type="text" class="form-control" id="cariNomor" name="cariNomor" placeholder="Nomor...">
                    </div>
                    <div class="text-center flex-item">
                        <p class="exc-search-column">Status</p>
                        <div class="dropdown-status">
                            <button id="dropdownStatus" class="dropdown-toggle custom-btn" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                - Pilih Status Dokumen -
                            </button>
                            <ul class="dropdown-menu drop-status">
                                <li><a class="dropdown-item item-status" href="#" data-value="Semua">Semua</a></li>
                                <li><a class="dropdown-item item-status" href="#" data-value="Berlaku">Berlaku</a></li>
                                <li><a class="dropdown-item item-status" href="#" data-value="Tidak Berlaku">Tidak Berlaku</a></li>
                            </ul>
                        </div>
                        <input type="hidden" name="status" id="status">
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn custom-btn-cari">Cari</button>
                </div>
            </form>
        </section>

        <!-- Sambutan -->
        <section class="sambutan-section">
            <div class="sambutan-header">
                <h2>SAMBUTAN KEPALA BAGIAN HUKUM SETDA KOTA BATU</h2>
            </div>
            <div class="container-sambutan">
                <div class="sambutan-content">
                    <div class="sambutan-text">
                        <p>Puji Syukur Kehadirat Tuhan YME atas terwujudnya JDIH Kota Batu yang sudah lama dinantikan oleh seluruh ASN Pemerintah Kota Batu dan Seluruh Masyarakat Kota Batu.</p>
                        <p>JDIH Kota Batu yang saat ini hadir ditengah layanan publik di lingkungan Pemerintah Kota Batu semoga dapat menjawab kebutuhan informasi produk hukum yang ada di Kota Batu.</p>
                        <p>Kami dari bagian hukum sedang mengupayakan untuk dapat menyediakan seluruh informasi produk hukum yang telah ditetapkan oleh Pemerintah Kota Batu berupa Perda dan Perwali. Namun untuk sementara ini, belum dapat kami penuhi secara sepenuhnya. Oleh karena itu JDIH ini tentunya masih banyak kekurangan yang harus kami perbaiki dari waktu ke waktu untuk memberikan layanan yang cepat dan mudah diakses dan tampilan yang sesuai kebutuhan masyarakat. Untuk itu mohon kritikan, saran, dan pendapat guna kesempurnaan website JDIH Kota Batu ini.</p>
                        <p>Demikian sambutan ini kami sampaikan, atas perhatian dan dukungannya kami sampaikan terima kasih.</p>
                        <p>Hormat Kami,</p>
                        <p><strong>KEPALA BAGIAN HUKUM SETDA KOTA BATU</strong></p>
                        <p><strong> Marie Inge, S.S., S.H, M.H</strong></p>
                    </div>
                    <div class="sambutan-image">
                        <img src="/img/bg/setda-hukum.jpg" alt="Kepala Bagian Hukum SETDA Kota Batu">
                    </div>
                </div>
            </div>
        </section>

        <!-- Count of Documents -->
        <section class="doc-counts d-flex align-items-center justify-content-center">
            <div class="container d-flex align-items-center justify-content-center">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4 justify-content-center">
                    <div class="col">
                        <div class="custom-card peraturan d-flex justify-content-between">
                            <div class="card-content">
                                <div class="card-title">{{ $jumlahProdukHukum }}</div>
                                <p class="card-text">Peraturan</p>
                            </div>
                            <img src="{{ asset('/img/bg//ikon_timbangan.png') }}" alt="Peraturan">
                        </div>
                    </div>
                    <div class="col">
                        <div class="custom-card monografi-hukum d-flex justify-content-between">
                            <div class="card-content">
                                <div class="card-title">{{ $jumlahMonografiHukum }}</div>
                                <p class="card-text">Monografi Hukum</p>
                            </div>
                            <img src="{{ asset('/img/bg//ikon_buku.png') }}" alt="Monografi Hukum">
                        </div>
                    </div>
                    <div class="col">
                        <div class="custom-card artikel-hukum d-flex justify-content-between">
                            <div class="card-content">
                                <div class="card-title">{{ $jumlahArtikelHukum }}</div>
                                <p class="card-text">Artikel Hukum</p>
                            </div>
                            <img src="{{ asset('/img/bg//ikon_artikel.png') }}" alt="Artikel Hukum">
                        </div>
                    </div>
                    <div class="col">
                        <div class="custom-card putusan-pengadilan d-flex justify-content-between">
                            <div class="card-content">
                                <div class="card-title">{{ $jumlahPutusanPengadilan }}</div>
                                <p class="card-text">Putusan Pengadilan</p>
                            </div>
                            <img src="{{ asset('/img/bg//ikon_gavel.png') }}" alt="Putusan Pengadilan">
                        </div>
                    </div>
                </div>
            </div>
        </section>        

        <!-- New Rules -->
        <section class="new-rules d-flex align-items-center justify-content-center">
            <div class="container d-flex flex-column align-items-center">
                <h2>Peraturan Terbaru</h2>
                @foreach ($dokumenTerbaru as $item)
                    @php
                        $abstrak_words = str_word_count($item->abstrak, 2);
                        $abstrak_singkat = implode(' ', array_slice($abstrak_words, 0, 40)) . '...';
                    @endphp
                    <a href="/dashboard/readprodukhukum/{{ $item->id }}"
                        class="custom-card new-rules-card align-items-center justify-content-center">
                        <div class="card-content">
                            <div class="information d-flex flex-column align-items-start justify-content-center">
                                <h5>{{ $item->judul }}</h5>
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




                <a href="\simprokum" class="custom-btn-more">Lihat Semua di SIMPROKUM</a>
            </div>
        </section>

        {{-- Grafik Statistik Produk Hukum --}}
        <section class="grafik-beranda">
            <div class="card-body-beranda">
                <h2>Data Statistik Produk Hukum</h2>
                <h5>Jumlah Produk Hukum Setiap Tahun</h5>
                {!! $grafik->container() !!}
            </div>
        </section>
                                                                                                                                                            </section> -->
        <!-- News & Activity -->
        <section class="news-activity d-flex align-items-center justify-content-center">
        <div class="container d-flex flex-column align-items-center">
            <h2>Berita & Kegiatan</h2>

            <!-- 1st Row -->
            <div class="news-activity-container d-flex flex-row align-items-center justify-content-center">
                <!-- Card -->
                <div class="custom-card news-activity-card">
                    <img src="{{asset('/img/bg/berita-1.jpg')}}" alt="News & Activity">
                    <div class="custom-card-body">
                        <h3>KASI DATUN KEJARI Batu Pimpin Apel Kerja Pada Kejaksaan Negeri Batu</h3>
                        <div class="custom-card-body-bot-part">
                            <div class="bot-part d-flex flex-row align-items-start">
                                <p>28 Agustus 2024</p>
                                <div class="seen-counter d-flex flex-row">
                                    <img src="{{asset('/img/bg/ikon_mata.png')}}" alt="Dilihat">
                                    <p class="p-new-rules">5</p>
                                </div>
                            </div>
                            <a href="#">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>

                <div class="custom-card news-activity-card">
                    <img src="{{asset('/img/bg/berita-2.jpg')}}" alt="News & Activity">
                    <div class="custom-card-body">
                        <h3>KASI Intel KEJARI Batu Pimpin Apel Kerja Pada Kejaksaan Negeri Batu</h3>
                        <div class="custom-card-body-bot-part">
                            <div class="bot-part d-flex flex-row align-items-start">
                                <p>28 Agustus 2024</p>
                                <div class="seen-counter d-flex flex-row">
                                    <img src="{{asset('/img/bg/ikon_mata.png')}}" alt="Dilihat">
                                    <p class="p-new-rules">9</p>
                                </div>
                            </div>
                            <a href="#">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>

                <div class="custom-card news-activity-card">
                    <img src="{{asset('/img/bg/berita-3.jpg')}}" alt="News & Activity">
                    <div class="custom-card-body">
                        <h3>Pemaparan Permohonan Bantuan Hukum Dari Badan Pendapatan Daerah Kota Batu</h3>
                        <div class="custom-card-body-bot-part">
                            <div class="bot-part d-flex flex-row align-items-start">
                                <p>28 Agustus 2024</p>
                                <div class="seen-counter d-flex flex-row">
                                    <img src="{{asset('img/bg/ikon_mata.png')}}" alt="Dilihat">
                                    <p class="p-new-rules">76</p>
                                </div>
                            </div>
                            <a href="#">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <!-- End of Card -->
            </div>
            <button class="custom-btn-more">Lihat Semua</button>
        </div>
    </section>


        <!-- Link Portal -->
        <section class="link-portal d-flex flex-column justify-content-center align-items-center">
            <h2>Link Portal</h2>
            <div class="container d-flex flex-row align-items-center justify-content-around">
                <a href="{{ url('https://jdihn.go.id/') }}"
                    class="custom-card align-items-center justify-content-around">
                    <div class="card-content">
                        <img src="{{ asset('/img/bg/LogoJDIH.png') }}" alt="JDIH Nasional">
                        <h3>JDIH Nasional</h3>
                    </div>
                </a>
                <a href="{{ url('http://103.211.82.11/') }}"
                    class="custom-card align-items-center justify-content-around">
                    <div class="card-content">
                        <img src="{{ asset('/img/bg/LogoKotaBatu.png') }}" alt="PPID Kota Batu">
                        <h3>PPID Kota Batu</h3>
                    </div>
                </a>
                <a href="/simprokum" class="custom-card align-items-center justify-content-around">
                    <div class="card-content">
                        <img src="{{ asset('/img/bg/ikon_simprokum.png') }}" alt="Simprokum">
                        <h3>SIMPROKUM</h3>
                    </div>
                </a>
            </div>
        </section>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/beranda.js') }}"></script>
    <script src="{{ $grafik->cdn() }}"></script>
    {{ $grafik->script() }}
@endsection
