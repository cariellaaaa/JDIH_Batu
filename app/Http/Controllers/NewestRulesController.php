<?php

namespace App\Http\Controllers;

use App\Models\ProdukHukum;
use App\Models\MonografiHukum;
use App\Models\ArtikelHukum;
use App\Models\PutusanPengadilan;
use App\Charts\ProkumChart;
use App\Http\Controllers\StatistikController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewestRulesController extends Controller
{
    public function beranda(ProkumChart $chart)
    {
        $dokumenTerbaru = DB::table('produk_hukums')
            ->select(DB::raw("id as id"), DB::raw("CAST(judul AS CHAR) as judul"), DB::raw("CAST(tanggal_pengundangan AS CHAR) as tanggal_pengundangan"), DB::raw("CAST(created_at AS CHAR) as created_at"), DB::raw("COALESCE(CAST(abstrak AS CHAR), '') as abstrak"), DB::raw("CAST(jumlah_dilihat AS CHAR) as jumlah_dilihat"), DB::raw("CAST(jumlah_diunduh AS CHAR) as jumlah_diunduh"), DB::raw("'produk_hukum' as tipe"))
            ->union(DB::table('monografi_hukums')
                ->select(DB::raw("id as id"), DB::raw("CAST(judul AS CHAR) as judul"), DB::raw("CAST(tanggal_pengundangan AS CHAR) as tanggal_pengundangan"), DB::raw("CAST(created_at AS CHAR) as created_at"), DB::raw("'' as abstrak"), DB::raw("CAST(jumlah_dilihat AS CHAR) as jumlah_dilihat"), DB::raw("CAST(jumlah_diunduh AS CHAR) as jumlah_diunduh"), DB::raw("'monografi_hukum' as tipe")))
            ->union(DB::table('artikel_hukums')
                ->select(DB::raw("id as id"), DB::raw("CAST(judul AS CHAR) as judul"), DB::raw("CAST(tanggal_pengundangan AS CHAR) as tanggal_pengundangan"), DB::raw("CAST(created_at AS CHAR) as created_at"), DB::raw("'' as abstrak"), DB::raw("CAST(jumlah_dilihat AS CHAR) as jumlah_dilihat"), DB::raw("CAST(jumlah_diunduh AS CHAR) as jumlah_diunduh"), DB::raw("'artikel_hukum' as tipe")))
            ->union(DB::table('putusan_pengadilans')
                ->select(DB::raw("id as id"), DB::raw("CAST(judul AS CHAR) as judul"), DB::raw("CAST(tanggal_pengundangan AS CHAR) as tanggal_pengundangan"), DB::raw("CAST(created_at AS CHAR) as created_at"), DB::raw("'' as abstrak"), DB::raw("CAST(jumlah_dilihat AS CHAR) as jumlah_dilihat"), DB::raw("CAST(jumlah_diunduh AS CHAR) as jumlah_diunduh"), DB::raw("'putusan_pengadilan' as tipe")))
            ->orderBy('tanggal_pengundangan', 'desc')
            ->take(4)
            ->get();


        $jumlahProdukHukum = DB::table('produk_hukums')->count();
        $jumlahMonografiHukum = DB::table('monografi_hukums')->count();
        $jumlahArtikelHukum = DB::table('artikel_hukums')->count();
        $jumlahPutusanPengadilan = DB::table('putusan_pengadilans')->count();

        $jenisProdukHukum = DB::table('produk_hukums')
        ->distinct()
        ->pluck('jenis');

        $grafik = $chart->build();

        
        // foreach ($dokumenTerbaru as $item) {
        //     if ($item->tipe == 'produk_hukum') {
        //         $produkHukum = ProdukHukum::find($item->judul); // Ganti dengan kolom yang unik
        //         if ($produkHukum) {
        //             $produkHukum->jumlah_dilihat += 1;
        //             $produkHukum->save();
        //         }
        //     } elseif ($item->tipe == 'monografi_hukum') {
        //         $monografiHukum = MonografiHukum::find($item->judul); // Ganti dengan kolom yang unik
        //         if ($monografiHukum) {
        //             $monografiHukum->jumlah_dilihat += 1;
        //             $monografiHukum->save();
        //         }
        //     } elseif ($item->tipe == 'artikel_hukum') {
        //         $artikelHukum = ArtikelHukum::find($item->judul); // Ganti dengan kolom yang unik
        //         if ($artikelHukum) {
        //             $artikelHukum->jumlah_dilihat += 1;
        //             $artikelHukum->save();
        //         }
        //     } elseif ($item->tipe == 'putusan_pengadilan') {
        //         $putusanPengadilan = PutusanPengadilan::find($item->judul); // Ganti dengan kolom yang unik
        //         if ($putusanPengadilan) {
        //             $putusanPengadilan->jumlah_dilihat += 1;
        //             $putusanPengadilan->save();
        //         }
        //     }


        //     foreach ($dokumenTerbaru as $item) {
        //         if ($item->tipe == 'produk_hukum') {
        //             $produkHukum = ProdukHukum::find($item->judul); // Ganti dengan kolom yang unik
        //             if ($produkHukum) {
        //                 $produkHukum->jumlah_diunduh += 1;
        //                 $produkHukum->save();
        //             }
        //         } elseif ($item->tipe == 'monografi_hukum') {
        //             $monografiHukum = MonografiHukum::find($item->judul); // Ganti dengan kolom yang unik
        //             if ($monografiHukum) {
        //                 $monografiHukum->jumlah_diunduh += 1;
        //                 $monografiHukum->save();
        //             }
        //         } elseif ($item->tipe == 'artikel_hukum') {
        //             $artikelHukum = ArtikelHukum::find($item->judul); // Ganti dengan kolom yang unik
        //             if ($artikelHukum) {
        //                 $artikelHukum->jumlah_diunduh += 1;
        //                 $artikelHukum->save();
        //             }
        //         } elseif ($item->tipe == 'putusan_pengadilan') {
        //             $putusanPengadilan = PutusanPengadilan::find($item->judul); // Ganti dengan kolom yang unik
        //             if ($putusanPengadilan) {
        //                 $putusanPengadilan->jumlah_diunduh += 1;
        //                 $putusanPengadilan->save();
        //             }
        //         }
        //     }

        return view('JDIH.beranda', compact( 'dokumenTerbaru', 'jumlahProdukHukum', 'jumlahMonografiHukum', 'jumlahArtikelHukum', 'jumlahPutusanPengadilan', 'jenisProdukHukum', 'grafik'));
    }
}
