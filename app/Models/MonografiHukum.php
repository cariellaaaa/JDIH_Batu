<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonografiHukum extends Model
{
    use HasFactory;

    protected $table = 'monografi_hukums';
    protected $primaryKey = "id";
    protected $fillable = ['id', 'nomor', 'tahun', 'judul', 'penerbit', 'edisi', 'abstrak', 'pemrakarsa', 'status_dokumen', 'subjek', 'isbn_issn', 'bahasa', 'lokasi', 'deskripsi_fisik', 'nomor_panggil', 'nomor_induk', 'bidang_hukum', 'tempat_penetapan', 'tanggal_pengundangan'];
}
