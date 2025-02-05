@extends('auth.main')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Pengisian Metadata Monografi Hukum</h1>
</div>
<div class="row">
    <div class="col">
        <!-- <form action="/dashboard/staffd/addmonografihukum" method="post" enctype="multipart/form-data"> -->
        <form action="{{route('nambah')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="fs-6">
                Nomor
            </div>
            <input type="number" class="form-control input @error('nomor') is-invalid @enderror mt-2" name="nomor"
                id="nomor" value="{{ old('nomor') }}">

            @error('nomor')
                <div class="text-danger">
                    <small>{{ $message }}</small>
                </div>
            @enderror

            <div class="fs-6 mt-3">
                Tahun
            </div>
            <input type="number" class="form-control input @error('tahun') is-invalid @enderror mt-2" name="tahun"
                id="tahun" value="{{  old('tahun') }}">

            @error('tahun')
                <div class="text-danger">
                    <small>{{ $message }}</small>
                </div>
            @enderror

            <div class="fs-6 mt-3">
                Judul
            </div>
            <input type="text" class="form-control input @error('judul') is-invalid @enderror mt-2" name="judul"
                id="judul" value="{{ old('judul') }}">

            @error('judul')
                <div class="text-danger">
                    <small>{{ $message }}</small>
                </div>
            @enderror

            <div class="fs-6 mt-3">
                Penerbit
            </div>
            <input type="text" class="form-control input @error('penerbit') is-invalid @enderror mt-2" name="penerbit"
                id="penerbit" value="{{ old('penerbit') }}">

            @error('penerbit')
                <div class="text-danger">
                    <small>{{ $message }}</small>
                </div>
            @enderror

            <div class="fs-6 mt-3">
                Edisi
            </div>
            <input type="text" class="form-control input @error('edisi') is-invalid @enderror mt-2" name="edisi"
                id="edisi" value="{{ old('edisi') }}">

            @error('edisi')
                <div class="text-danger">
                    <small>{{ $message }}</small>
                </div>
            @enderror

            <div class="fs-6 mt-3">
                Abstrak
            </div>
            <textarea type="text" class="form-control input mt-2" name="abstrak" id="abstrak"
                style="height:100px">{{ old('abstrak') }}</Textarea>

            <div class="fs-6 mt-3">
                SKPD Pemrakarsa
            </div>
            <input type="text" class="form-control input @error('pemrakarsa') is-invalid @enderror mt-2"
                name="pemrakarsa" id="pemrakarsa" value="{{ old('pemrakarsa') }}">

            @error('pemrakarsa')
                <div class="text-danger">
                    <small>{{ $message }}</small>
                </div>
            @enderror

            <div class="fs-6 mt-3">
                Status Dokumen
            </div>
            <input type="text" class="form-control input mt-2" name="status_dokumen" id="status_dokumen"
                value="{{ old('status_dokumen') }}">

            @error('status_dokumen')
                <div class="text-danger">
                    <small>{{ $message }}</small>
                </div>
            @enderror

            <div class="fs-6 mt-3">
                Subjek
            </div>
            <input type="text" class="form-control input mt-2" name="subjek" id="subjek" value="{{ old('subjek') }}">

            @error('subjek')
                <div class="text-danger">
                    <small>{{ $message }}</small>
                </div>
            @enderror

            <div class="fs-6 mt-3">
                ISBN / ISSN
            </div>
            <input type="text" class="form-control input mt-2" name="isbn_issn" id="isbn_issn"
                value="{{ old('isbn_issn') }}">

            @error('isbn_issn')
                <div class="text-danger">
                    <small>{{ $message }}</small>
                </div>
            @enderror

            <div class="fs-6 mt-3">
                Bahasa
            </div>
            <input type="text" class="form-control input mt-2" name="bahasa" id="bahasa" value="{{ old('bahasa') }}">

            @error('bahasa')
                <div class="text-danger">
                    <small>{{ $message }}</small>
                </div>
            @enderror

            <div class="fs-6 mt-3">
                Lokasi Fisik
            </div>
            <input type="text" class="form-control input mt-2" name="lokasi" id="lokasi" value="{{ old('lokasi') }}">

            @error('lokasi')
                <div class="text-danger">
                    <small>{{ $message }}</small>
                </div>
            @enderror

            <div class="fs-6 mt-3">
                Deskripsi Fisik
            </div>
            <input type="text" class="form-control input mt-2" name="deskripsi_fisik" id="deskripsi_fisik"
                value="{{ old('deskripsi_fisik') }}">

            @error('deskripsi_fisik')
                <div class="text-danger">
                    <small>{{ $message }}</small>
                </div>
            @enderror

            <div class="fs-6 mt-3">
                Nomor Panggil
            </div>
            <input type="text" class="form-control input mt-2" name="nomor_panggil" id="nomor_panggil"
                value="{{ old('nomor_panggil') }}">

            @error('no_panggil')
                <div class="text-danger">
                    <small>{{ $message }}</small>
                </div>
            @enderror

            <div class="fs-6 mt-3">
                Nomor Induk Buku
            </div>
            <input type="text" class="form-control input mt-2" name="nomor_induk" id="nomor_induk"
                value="{{ old('no_induk') }}">

            @error('nomor_induk')
                <div class="text-danger">
                    <small>{{ $message }}</small>
                </div>
            @enderror

            <div class="fs-6 mt-3">
                Bidang Hukum
            </div>
            <input type="text" class="form-control input mt-2" name="bidang_hukum" id="bidang_hukum"
                value="{{ old('bidang_hukum') }}">

            @error('bidang_hukum')
                <div class="text-danger">
                    <small>{{ $message }}</small>
                </div>
            @enderror

            <div class="fs-6 mt-3">
                Tempat Penetapan
            </div>
            <input type="text" class="form-control input mt-2" name="tempat_penetapan" id="tempat_penetapan"
                value="{{ old('tempat_penetapan') }}">

            @error('tempat_penetapan')
                <div class="text-danger">
                    <small>{{ $message }}</small>
                </div>
            @enderror

            <div class="row">
                <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-3">
                    <div class="fs-6 mt-3">
                        Tanggal Penetapan
                    </div>
                    <input type="date" class="form-control input mt-2" name="tanggal_pengundangan"
                        id="tanggal_pengundangan" value="{{old('tanggal_pengundangan')}}">

                    @error('tanggal_pengundangan')
                        <div class="text-danger">
                            <small>{{ $message }}</small>
                        </div>
                    @enderror
                </div>
            </div>

            <div class="row justify-content-end mt-4 mb-4">
                <div class="col-3">
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary mt-2">Proses</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@section('js')
<script>
    $('#mengganti').hide();
    $('#text_mengganti').hide();
    $('#status_dokumen').on('change', function () {
        var jenis = $(this).val();
        if (jenis == 'mengganti') {
            $('#mengganti').show(400);
            $('#text_mengganti').show(400);
        } else {
            $('#mengganti').hide(400);
            $('#text_mengganti').hide(400);
        }
    })
</script>
@endsection

@endsection