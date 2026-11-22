<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'menus';

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'price',
        'min_order',
        'image',
        'is_available',
    ];

    // Relasi Eloquent ORM: Menu dimiliki oleh satu Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relasi Eloquent ORM: Satu Menu bisa ada di banyak OrderItem
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}