<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtikelHukum extends Model
{
    use HasFactory;
    protected $table = 'artikel_hukums';
    protected $fillable = ['id', 'judul', 'tanggal_pengundangan', 'status_dokumen', 'jenis', 'abstrak', 'jumlah_dilihat', 'jumlah_diunduh', 'file_path', 'file_name'];
}
