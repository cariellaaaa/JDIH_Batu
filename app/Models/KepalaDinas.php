<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KepalaDinas extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'keterangan',
        'keterangan_penolakan',
    ];


    public function sekda(){
        return $this->hasOne(Sekda::class);
    }
    public function kabag() {
        return $this->belongsTo(Kabag::class, 'kabag_id');
    }

    public function draft() {
        return $this->belongsTo(Draft::class, 'draft_id');
    }
}