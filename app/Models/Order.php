<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'order_code',
        'delivery_date',
        'delivery_time',
        'delivery_address',
        'notes',
        'total_price',
        'status',
        'payment_status',
    ];

    // Relasi Eloquent ORM: Order dimiliki oleh satu User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi Eloquent ORM: Satu Order memiliki banyak OrderItem
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    // Relasi Eloquent ORM: Satu Order bisa memiliki banyak riwayat Payment (DP & Pelunasan)
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}