<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipeProdukHukum extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipe',
    ];

    public function TipeProdukHukum()
    {
        return $this->hasMany(User::class);
    }
}
