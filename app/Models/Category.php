<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    // Nama tabel di database
    protected $table = 'categories';

    // Kolom yang boleh diisi (sesuai file migrasi)
    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    // Relasi Eloquent ORM: 1 Kategori memiliki banyak Menu (One-to-Many)
    public function menus()
    {
        return $this->hasMany(Menu::class);
    }
}