<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Dinas;

class Dinas extends Model
{
    use HasFactory;

    protected $fillable = [
        'dinas',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function drafts()
    {
        return $this->hasMany(Draft::class);
    }
}