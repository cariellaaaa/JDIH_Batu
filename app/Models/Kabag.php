<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kabag extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'keterangan',
        'keterangan_penolakan',
    ];

    // public function kasubagUndang(){
    //     return $this->belongsTo(KasubagUndang::class);
    // }

    public function kasubagUndang() {
        return $this->belongsTo(KasubagUndang::class, 'kasubag_undang_id');
    }

    public function kepalaDinas() {
        return $this->hasOne(KepalaDinas::class, 'kabag_id');
    }

    public function draft() {
        return $this->belongsTo(Draft::class, 'draft_id');
    }
}