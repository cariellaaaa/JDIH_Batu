<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KasubagUndang extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'keterangan',
        'keterangan_penolakan',
    ];

    public function staffUndang(){
        return $this->belongsTo(StaffUndang::class, 'staff_undang_id');
    }

    public function kabag() {
        return $this->hasOne(Kabag::class, 'kasubag_undang_id');
    }

    public function draft() {
        return $this->belongsTo(Draft::class, 'draft_id');
    }
    
}