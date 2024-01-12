<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'quantity',
        'price',
        'order_id',
        'product_id',
    ];

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'id', 'order_id');
    }
}
