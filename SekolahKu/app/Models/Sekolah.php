<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    use HasFactory;

    // Izinkan mass assignment untuk seluruh kolom
    protected $guarded = ['id'];

    // Relasi One-to-Many ke model Review
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}