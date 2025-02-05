<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffUndang extends Model
{
    use HasFactory;

    protected $fillable = [
        'revisi_produk_hukum',
        'npknd',
        'status',
        'keterangan',
        'keterangan_penolakan',
        'draft_id', // Tambahkan ini jika Anda perlu mengisi draft_id
        'user_id',  // Tambahkan ini jika Anda perlu mengisi user_id
        'validated',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function kasubagUndang() {
        return $this->hasOne(KasubagUndang::class, 'staff_undang_id');
    }
    
    public function draft()
    {
        return $this->belongsTo(Draft::class, 'draft_id'); // Jika ada relasi dengan draft
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // Menetapkan relasi dengan user
    }
}