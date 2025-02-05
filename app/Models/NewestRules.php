<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewestRules extends Model
{
    use HasFactory;
    protected $table = 'produk_hukums';

    protected $fillable = ['judul', 'tanggal_pengundangan', 'status_dokumen', 'jenis', 'abstrak'];
}
