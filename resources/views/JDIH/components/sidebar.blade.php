<link rel="stylesheet" href="{{ asset('css/JDIH/components/sidebar.css') }}">

<body>
    <main class="main-content sidebar">
        <div class="sidebar>
            <div class=" side-search">
            <form class="search-form" action="{{ route('cari.produk.hukum') }}" method="GET">
                <h1>Cari Produk Hukum</h1>
                <label for="judul">Judul</label>
                <input type="text" name="keyword" placeholder="Judul">
                <label for="tipe_dokumen">Tipe Dokumen</label>
                <select name="tipeDokumen">
                    <option value="">- Pilih Tipe Dokumen -</option>
                    <option value="Peraturan Perundang-Undangan">Peraturan Perundang-undangan</option>
                    <option value="Monografi Hukum">Monografi Hukum</option>
                    <option value="Artikel Hukum">Artikel Hukum</option>
                    <option value="Putusan Pengadilan">Putusan Pengadilan</option>
                </select>
                <label for="jenis_dokumen">Jenis Dokumen</label>
                <select name="jenisDokumen">
                    <option value="">- Pilih Jenis Dokumen -</option>
                    <option value="Keputusan Wali Kota">Keputusan Wali Kota</option>
                    <option value="Peraturan Daerah">Peraturan Daerah</option>
                    <option value="Peraturan Wali Kota">Peraturan Wali Kota</option>
                    <option value="Peraturan Walikota">Peraturan Walikota</option>
                </select>
                <label for="tahun">Tahun</label>
                <input type="text" name="cariTahun" placeholder="Tahun">
                <label for="nomor">Nomor</label>
                <input type="text" name="cariNomor" placeholder="Nomor">
                <label for="status">Status</label>
                <select name="status">
                    <option value="">- Pilih Status Dokumen -</option>
                    <option value="Semua">Semua</option>
                    <option value="Berlaku">Berlaku</option>
                    <option value="Tidak Berlaku">Tidak Berlaku</option>
                </select>
                <button type="submit">Cari</button>
            </form>
        </div>
        <div class="side-portal">
            <h2>Link Portal</h2>
            <div class="link-portal">
                <a href="{{ url('https://jdihn.go.id/') }}">
                    <div class="card-content">
                        <img src="{{ asset('/img/bg/LogoJDIH.png') }}" alt="JDIH Nasional">
                        <h3>Nasional</h3>
                    </div>
                </a>
            </div>

            <div class="link-portal">
                <a href="{{ url('http://103.211.82.11/') }}">
                    <div class="card-content">
                        <img src="{{ asset('/img/bg/LogoKotaBatu.png') }}" alt="PPID Kota Batu">
                        <h3>PPID Kota Batu</h3>
                    </div>
                </a>
            </div>
        </div>
        </div>
    </main>
</body>

</html>
