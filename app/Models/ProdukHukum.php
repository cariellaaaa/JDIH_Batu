<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukHukum extends Model
{
    use HasFactory;

    protected $table = "produk_hukums";
    protected $primaryKey = "id";
    protected $fillable = ['id', 'judul', 'tanggal_pengundangan', 'status_dokumen', 'jenis', 'abstrak', 'jumlah_dilihat', 'jumlah_diunduh', 'file_path', 'file_name'];
}
