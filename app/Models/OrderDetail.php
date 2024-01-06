<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'quantity',
        'price',
        'order_id',
        'product_id',
    ];

    public function product(){
        return $this->hasOne(Product::class,'id','product_id');
    }
}
