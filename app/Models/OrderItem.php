<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderItem extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'order_items';

    protected $fillable = [
        'order_id',
        'menu_id',
        'quantity',
        'unit_price',
        'subtotal',
        'item_notes',
    ];

    // Relasi Eloquent ORM: OrderItem milik satu Order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Relasi Eloquent ORM: OrderItem merujuk ke satu Menu
    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}