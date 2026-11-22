<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'payments';

    protected $fillable = [
        'order_id',
        'payment_type',
        'payment_method',
        'amount',
        'payment_proof',
        'status',
        'verified_at',
    ];

    // Relasi Eloquent ORM: Payment milik satu Order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}