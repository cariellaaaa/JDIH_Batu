<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Draft extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis',
        'judul',
        'tanggal_pengajuan',
        'keterangan',
        'surat_pengajuan',
        'draft_produk_hukum',
        'keterangan_penolakan',
        'status',
    ];

    // public function jenis()
    // {
    //     return $this->belongsTo(Jenis::class);
    // }
    public function jenis() {
        return $this->belongsTo(Jenis::class, 'jenis_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function draft_admins()
    // {
    //     return $this->hasOne(Admin::class);
    // }
    
    public function dinas()
    {
        return $this->belongsTo(Dinas::class, 'dinas_id'); // 'dinas_id' adalah nama kolom yang mengacu ke tabel dinas
    }

    public function admin() {
        return $this->hasOne(Admin::class, 'draft_id');
    }

    public function staffUndang() {
        return $this->hasOne(StaffUndang::class, 'draft_id');
    }

    public function kasubagUndang() {
        return $this->hasOne(KasubagUndang::class, 'draft_id');
    }

    public function kabag() {
        return $this->hasOne(Kabag::class, 'draft_id');
    }

    public function kepalaDinas() {
        return $this->hasOne(KepalaDinas::class, 'draft_id');
    }
}